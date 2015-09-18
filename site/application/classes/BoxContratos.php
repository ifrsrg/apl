<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Classe para exibição dos blocos de contratos dos parceiros comerciais
 *
 * <note>O método output() só retornará o html dos boxes de contratos,
 * caso o <code>$idCliente</code> informado na chamada da classe seja de um cliente PJ
 * e esteja marcado como Parceiro Comercial, caso contrário irá retornar <code>false</code></note>
 */
class BoxContratos {

	private $objCliente;

	protected $local;
	protected $pathView = 'views/minhaconta';
	protected $fileView = 'boxContratos';
	protected $objContrato;
	protected $countSelecionaveis;
	protected $selected;

	/**
	 * Contrutor da classe
	 *
	 * @param int		ID do cliente
	 * @param string	Valor de identificação de onde os boxes serão mostrados
	 */
	public function __construct($idCliente, $local = 'conteudo', $selected = null) {
		$this->objCliente = ORM::factory('cliente', $idCliente);
		$this->objContrato = ORM::factory('contrato');
		$this->local = $local;
		$this->countSelecionaveis = 0;
		$this->selected = $selected;
	}

	/**
	 * Contrutor da classe
	 *
	 * @param int		ID do cliente
	 * @param string	Valor de identificação de onde os boxes serão mostrados
	 */
	public static function factory($idCliente, $local = 'conteudo', $selected = null) {
		return new BoxContratos($idCliente, $local, $selected);
	}

	/**
	 * Retorna os boxes de contratos
	 *
	 * @return mixed
	 */
	public function output() {
		if($this->isParceiroComercial()) {
			$viewContratos = new Template(Kohana::find_file($this->pathView, $this->fileView));
			marcacoesPadrao($viewContratos);

			$contratos = $this->objContrato->getContratosCliente($this->objCliente->id_cliente);

			if(!$contratos->count() && $this->local == 'conteudo')
				$viewContratos->parseBlock('SEM_CONTRATOS');

			if($this->local == 'form')
				$viewContratos->parseBlock('INC_JS');

			$countSelecionaveis = 0;
			foreach($contratos as $i => $objContrato) {
				$classes = array();

				if(in_array($this->local, array('form', 'menu')) && $objContrato->expirado) {
					continue;
				} elseif($this->local == 'form') {
					if(is_null($this->selected) && $i == 0) {
						$viewContratos->selected = $objContrato->id_contrato;
					} elseif(!is_null($this->selected) && $this->selected == $objContrato->id_contrato) {
						$viewContratos->selected = $objContrato->id_contrato;
					} else {
						$classes[] = 'not-selected';
					}
					
					
					$classes[] = 'pointer';
				}

				if($objContrato->expirado)
					$classes[] = 'expired';

				$viewContratos->classes = implode(' ', $classes);
				$viewContratos->expired = ($objContrato->expirado)? 'class="expired"' : '';
				$viewContratos->id_contrato = $objContrato->id_contrato;
				$viewContratos->data_expiracao = formatData($objContrato->data_expiracao, true, '/', false);
				$viewContratos->num_anuncios = $objContrato->num_anuncios;
				$viewContratos->anuncios_disponiveis = $objContrato->num_anuncios - $objContrato->anuncios_utilizados;
				$viewContratos->bar_anuncios = ($objContrato->anuncios_utilizados * 200) / $objContrato->num_anuncios;
				$viewContratos->parseBlock('BOX_CONTRATOS', true);

				$countSelecionaveis++;
			}

			$this->countSelecionaveis = $countSelecionaveis;

			return $viewContratos->getContent();
		}
		return '';
	}

	/**
	 * Retorna se o cliente é parceiro comercial
	 *
	 * @return boolean
	 */
	public function isParceiroComercial() {
		return ($this->objCliente->loaded() && $this->objCliente->parceiro_comercial);
	}


	public function getCountSelecionaveis() {
		return $this->countSelecionaveis;
	}

	public function __toString() {
		return $this->output();
	}

}

