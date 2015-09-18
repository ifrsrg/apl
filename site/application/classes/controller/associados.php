<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Associados extends ControllerFront {
		
	private function preencheConceituais($view) {
		$conceituais = ORM::factory("conceitual")->getLista();
		
		foreach ($conceituais as $conceitual) {
			$view->tpl->conceitual_imagem = $conceitual->imagem;
			$view->tpl->conceitual_titulo = $conceitual->titulo;
			$view->tpl->parseBlock("CONCEITUAIS");
		}
		
	}
	
	private function preencheAssociados($view) {
		$associados = ORM::factory("associado")->getLista(array(),6,0,array(array("id_associado", "asc")));
		$i = 1;
		foreach($associados as $associado) {
			$view->tpl->associado_nome = $associado->nome;
			$view->tpl->associado_marca = Utils::getScaledPath("associado", $associado->id_associado);
			$view->tpl->associado_texto = $associado->descricao;
			$view->tpl->associado_projetos = $associado->projetos;
			$view->tpl->associado_contato = $associado->contato;
			$view->tpl->associado_categoria = $associado->categoria;
			$view->tpl->associado_contato_telefone = $associado->contato_telefone;
			$view->tpl->associado_contato_email = $associado->contato_email;
			$view->tpl->associado_coordenadas = $associado->coordenadas;
			$view->tpl->associado_endereco = $associado->endereco;
			$view->tpl->associado_index = $i++;
			
			if($associado->projetos)
				$view->tpl->parseBlock("HAS_PROJETO");
				
			$view->tpl->parseBlock("ASSOCIADOS");
			$view->tpl->parseBlock("ASSOCIADO_MODAL");
		}
		
		$c = ORM::factory("associado")->getCount();
		
		if($c > 6) {
			$view->tpl->parseBlock("MORE_ASSOCIADO");
		}
	}

	private function preencheTextoLayout($view) {
		$ts = ORM::factory("texto_sistema");
		$view->tpl->texto_subtitulo_associado = $ts->get("subtitulo_associado");
		$view->tpl->texto_subtitulo_projeto = $ts->get("subtitulo_projeto");
		$view->tpl->texto_subtitulo_download = $ts->get("subtitulo_download");
		$view->tpl->texto_subtitulo_contato = $ts->get("subtitulo_contato");
	}
	
	public function action_index(){
		$view = ViewTemplateFront::factory("associado/lista", $this->info);
        $view->tpl->url = 'http%3A%2F%2F'.$_SERVER['HTTP_HOST'].str_replace('/', '%2F', $_SERVER['REQUEST_URI']);
        
        $this->preencheAssociados($view);
        $this->preencheConceituais($view);
        $this->preencheTextoLayout($view);
        
        
		$this->response->body($view);
	}
	
	public function action_paging() {
		$offset = $_POST["offset"];
		
		$resultset = array(
			"affiliates" => array(),
			"remaining" => ORM::factory("associado")->getCount()-$offset
		);
		
		$associados = ORM::factory("associado")->getLista(array(),1000,$offset,array(array("id_associado", "asc")));
		
		foreach ($associados as $associado) {
			$resultset["affiliates"][] = array(
				"id_associado" => $associado->id_associado,
				"nome" => $associado->nome,
				"marca" => Utils::getScaledPath("associado", $associado->id_associado),
				"contato" => $associado->contato,
				"contato_telefone" => $associado->contato_telefone,
				"contato_email" => $associado->contato_email,
				"endereco" => $associado->endereco,
				"categoria" => $associado->categoria,
				"descricao" => $associado->descricao,
				"projetos" => $associado->projetos,
				"coordenadas" => $associado->coordenadas
			);
		}
		
		exit(json_encode($resultset));
	}
	
	public function loadInformacoes()
	{
		$this->info->tipo = ViewTemplateFront::$INTERNA_GERAL;
	}
	
} 
