<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Projetos extends ControllerFront {
		
	private function preencheConceituais($view) {
		$conceituais = ORM::factory("conceitual")->getLista();
		
		foreach ($conceituais as $conceitual) {
			$view->tpl->conceitual_imagem = $conceitual->imagem;
			$view->tpl->conceitual_titulo = $conceitual->titulo;
			$view->tpl->parseBlock("CONCEITUAIS");
		}
		
	}
	
	private function preencheProjetos($view) {
		$projetos = ORM::factory("projeto")->getLista(array(),6,0);
		$i = 1;
		foreach($projetos as $k => $projeto) {
			$view->tpl->projeto_id = $projeto->id_projeto;
			$view->tpl->projeto_nome = $projeto->nome;
			$view->tpl->projeto_marca = Utils::getScaledPath("projeto", $projeto->id_projeto);
			$view->tpl->projeto_texto = $projeto->texto_lista;

			if(!(($k+1)%3))
				$view->tpl->parseBlock("PROJETO_BREAK");


			$view->tpl->parseBlock("PROJETOS");
		}
		
		$c = ORM::factory("projeto")->getCount();
		
		if($c > 6) {
			$view->tpl->parseBlock("MORE_PROJETO");
		}
	}

	private function preencheTextoLayout($view) {
		$ts = ORM::factory("texto_sistema");
		$view->tpl->texto_subtitulo_associado = $ts->get("subtitulo_associado");
		$view->tpl->texto_subtitulo_projeto = $ts->get("subtitulo_projeto");
		$view->tpl->texto_subtitulo_download = $ts->get("subtitulo_download");
		$view->tpl->texto_subtitulo_contato = $ts->get("subtitulo_contato");
		$view->tpl->texto_agenda_acoes = $ts->get("agenda_acoes");
		$view->tpl->texto_agenda_completa = $ts->get("agenda_completa");
	}
	
	public function action_index(){
		$view = ViewTemplateFront::factory("projeto/lista", $this->info);
        $view->tpl->url = 'http%3A%2F%2F'.$_SERVER['HTTP_HOST'].str_replace('/', '%2F', $_SERVER['REQUEST_URI']);
        
        $this->preencheProjetos($view);
        $this->preencheConceituais($view);
        $this->preencheTextoLayout($view);
        
		$this->response->body($view);
	}
	
	public function action_paging() {
		$offset = $_POST["offset"];
		
		$resultset = array(
			"projects" => array(),
			"remaining" => ORM::factory("projeto")->getCount()-$offset
		);
		
		$projetos = ORM::factory("projeto")->getLista(array(),6,$offset);
		
		foreach ($projetos as $projeto) {
			$resultset["projects"][] = array(
				"id" => $projeto->id_projeto,
				"nome" => $projeto->nome,
				"marca" => Utils::getScaledPath("projeto", $projeto->id_projeto),
				"texto" => $projeto->texto_lista
			);
		}
		
		exit(json_encode($resultset));
	}
	
	public function loadInformacoes()
	{
		$this->info->tipo = ViewTemplateFront::$INTERNA_GERAL;
	}

	public function action_detalhe() {

		$projeto = ORM::factory("projeto", $this->request->param("id"));

		$view = ViewTemplateFront::factory("projeto/detalhe", $this->info);
        $view->tpl->url = 'http%3A%2F%2F'.$_SERVER['HTTP_HOST'].str_replace('/', '%2F', $_SERVER['REQUEST_URI']);
        
        $this->preencheTextoLayout($view);
        
        $view->tpl->nome = $projeto->nome;
        $view->tpl->marca = Utils::getScaledPath("projeto", $projeto->id_projeto."_full");
        $view->tpl->texto = $projeto->texto;
        if($projeto->status) {
        	$view->tpl->status = $projeto->status;
        	$view->tpl->parseBlock("HAS_STATUS");
        }
        if($projeto->executor_marca) {
        	$view->tpl->execucao = Utils::getScaledPath("projeto", $this->request->param("id").'_executor');
        	$view->tpl->parseBlock("HAS_EXECUCAO");
        }
        
        if($projeto->financiador_marca) {
        	$view->tpl->financiamento = Utils::getScaledPath("projeto", $this->request->param("id").'_financiador');
        	$view->tpl->parseBlock("HAS_FINANCIAMENTO");
        }
        
        $view->tpl->arquivo = $projeto->arquivo;
        $view->tpl->arquivo_restrito = $projeto->arquivo_restrito;

        $usuario = ORM::factory("usuario");
        $usuario->loadLogado();
        
        if($projeto->arquivo || ( $projeto->arquivo_restrito && $usuario->isLogado() ) ){
    		if($projeto->arquivo)
    			$view->tpl->parseBlock("DOWNLOAD_PUBLICO");
    		if($projeto->arquivo_restrito && $usuario->isLogado())
    			$view->tpl->parseBlock("DOWNLOAD_PRIVADO");
			$view->tpl->parseBlock("DOWNLOADS");
        }
		
        if($projeto->data_inicio) {
			$phpdate = strtotime( $projeto->data_inicio );
			$mysqldate = date( 'd.m.Y', $phpdate );
	                
	        $view->tpl->data_inicio = $mysqldate;
	        $view->tpl->parseBlock("HAS_DATA_INICIO");
        }
        
        if($projeto->data_termino) {
			$phpdate = strtotime( $projeto->data_termino );
			$mysqldate = date( 'd.m.Y', $phpdate );
	                
	        $view->tpl->data_termino = $mysqldate;
	        
	        $view->tpl->parseBlock("HAS_DATA_TERMINO");
        }

        $projetos = ORM::factory("projeto")->getLista(array(array("id_projeto","<>",$projeto)),10,0,array(array("id_projeto","DESC")));

       	foreach($projetos as $proj) {
       		$view->tpl->projeto_id = $proj->id_projeto;
       		$view->tpl->projeto_nome = $proj->nome;
       		$view->tpl->projeto_marca = Utils::getScaledPath("projeto", $proj->id_projeto);
       		$view->tpl->projeto_texto = $proj->texto_lista;

       		$view->tpl->parseBlock("PROJETOS");
       	}

		$this->response->body($view);
	}
	
} 
