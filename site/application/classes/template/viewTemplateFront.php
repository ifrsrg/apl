<?php defined("SYSPATH") or die("No direct script access.");

class ViewTemplateFront extends ViewTemplate {

	/**
	 * @var FrontInformacao
	 * */
	public $info;
	public static $HOME = 0;
	public static $INTERNA_GERAL = 11;

	public function __construct($tpl, $info, $tplEstrutura){
		parent::__construct($tpl, $tplEstrutura);
		$this->info = $info;
	}

	public static function factory($tpl, $info=null){
		switch ($info->tipo){
			case ViewTemplateFront::$HOME:
				$tplEstrutura = "template/home";
				break;
			default:
				$tplEstrutura = "template/interna";
				break;
		}
		return new ViewTemplateFront($tpl, $info, $tplEstrutura);

	}

	public function addEstruturaContent(){

		$this->tplEstrutura->title = $this->info->title;
		$this->tplEstrutura->metaDescription = $this->info->metaDescription;
		$this->tplEstrutura->metaKeywords = $this->info->metaKeywords;


		$tplRodape = new Template(Kohana::find_file("views", "template/fragmentos/rodape"));
		$this->setTplVars($tplRodape);
		$tplRodape->ano = date('Y');
		$this->tplEstrutura->rodape = $tplRodape->getContent();
		

		$tplConceitual = null;
		$tplTopo = new Template(Kohana::find_file("views", "template/fragmentos/topoInterna"));

		switch ($this->info->tipo){
			case ViewTemplateFront::$HOME:
				$tplTopo = new Template(Kohana::find_file("views", "template/fragmentos/topoHome"));
				break;
			case ViewTemplateFront::$INTERNA_GERAL:
				$tplConceitual = new Template(Kohana::find_file("views/template/fragmentos", "conceitualInterna"));
				break;
			default:
				$this->tplEstrutura->conceitual = "";
				break;
		}

		if($tplConceitual){
			$this->setTplVars($tplConceitual);
			$this->tplEstrutura->conceitual = $tplConceitual->getContent();
		}

		$usuario = ORM::factory("usuario");
		$usuario->loadLogado();
		if($usuario->isLogado()) {
			if($usuario->admin)
				$tplTopo->parseBlock("ADMIN");
			$tplTopo->parseBlock("LOGADO");
		} else {
			$tplTopo->parseBlock("DESLOGADO");
		}

		$this->setTplVars($tplTopo);
		$this->tplEstrutura->topo = $tplTopo->getContent();
	}

}
