<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Eventos extends ControllerFront {
		
	private function preencheConceituais($view) {
		$conceituais = ORM::factory("conceitual")->getLista();
		
		foreach ($conceituais as $conceitual) {
			$view->tpl->conceitual_imagem = $conceitual->imagem;
			$view->tpl->conceitual_titulo = $conceitual->titulo;
			$view->tpl->parseBlock("CONCEITUAIS");
		}
		
	}
	
	private function preencheEventos($view, $data) {
		
		$filtro = array();
		
		if($data) {
			$filtro[] = array("data","=",$data);
		}
		
		$eventos = ORM::factory("evento")->getLista($filtro,6,0);
		$i = 1;
		foreach($eventos as $k => $evento) {
			$view->tpl->evento_id = $evento->id_evento;
			$view->tpl->evento_nome = $evento->nome;
			$view->tpl->evento_marca = Utils::getScaledPath("evento", $evento->id_evento);
			$view->tpl->evento_texto = $evento->texto_lista;

			if(!(($k+1)%3))
				$view->tpl->parseBlock("EVENTO_BREAK");


			$view->tpl->parseBlock("EVENTOS");
		}
		
		$c = ORM::factory("evento")->getCount($filtro);
		
		if($c > 6) {
			$view->tpl->parseBlock("MORE_EVENTO");
		}
	}

	private function preencheTextoLayout($view) {
		$ts = ORM::factory("texto_sistema");
		$view->tpl->texto_subtitulo_evento = $ts->get("subtitulo_evento");
		$view->tpl->texto_subtitulo_associado = $ts->get("subtitulo_associado");
		$view->tpl->texto_subtitulo_projeto = $ts->get("subtitulo_projeto");
		$view->tpl->texto_subtitulo_download = $ts->get("subtitulo_download");
		$view->tpl->texto_subtitulo_contato = $ts->get("subtitulo_contato");
		$view->tpl->texto_agenda_acoes = $ts->get("agenda_acoes");
		$view->tpl->texto_agenda_completa = $ts->get("agenda_completa");
        $view->tpl->subtitulo_evento_galeria = $ts->get("subtitulo_evento_galeria");
	}
	
	public function action_index(){
		$view = ViewTemplateFront::factory("evento/lista", $this->info);
        $view->tpl->url = 'http%3A%2F%2F'.$_SERVER['HTTP_HOST'].str_replace('/', '%2F', $_SERVER['REQUEST_URI']);
        
        $data = explode("data=", $_SERVER["REQUEST_URI"], 2);
        
        if(count($data) > 1)
        {
        	$data = $data[1];
        	$view->tpl->data = $data;
        }
        else 
        	$data = false;
        
        $this->preencheEventos($view, $data);
        $this->preencheConceituais($view);
        $this->preencheTextoLayout($view);
        
		$this->response->body($view);
	}
	
	public function action_paging() {
		$offset = $_POST["offset"];
		
		$data = false;
		if(isset($_POST["data"]))
			$data = $_POST["data"];
		
		$filtro = array();
		
		if($data) {
			$filtro[] = array("data","=",$data);
		}
			
		$resultset = array(
			"events" => array(),
			"remaining" => ORM::factory("evento")->getCount($filtro)-$offset
		);
		
		$eventos = ORM::factory("evento")->getLista($filtro,6,$offset);
		
		foreach ($eventos as $evento) {
			$resultset["events"][] = array(
				"id" => $evento->id_evento,
				"nome" => $evento->nome,
				"marca" => Utils::getScaledPath("evento", $evento->id_evento),
				"texto" => $evento->texto_lista
			);
		}
		
		exit(json_encode($resultset));
	}
	
	public function loadInformacoes()
	{
		$this->info->tipo = ViewTemplateFront::$INTERNA_GERAL;
	}

	public function action_detalhe() {

		$evento = ORM::factory("evento", $this->request->param("id"));
		$evento_fotos = ORM::factory("evento_foto")->getLista(array(array("id_evento",'=',$this->request->param("id"))));
		

		$view = ViewTemplateFront::factory("evento/detalhe", $this->info);
        $view->tpl->url = 'http%3A%2F%2F'.$_SERVER['HTTP_HOST'].str_replace('/', '%2F', $_SERVER['REQUEST_URI']);
        
        $this->preencheTextoLayout($view);
        
        $view->tpl->nome = $evento->nome;
        $view->tpl->local = $evento->local;
        $view->tpl->hora = $evento->hora;
        $view->tpl->marca = Utils::getScaledPath("evento", $evento->id_evento);
        $view->tpl->texto = $evento->informacoes_gerais;
        $view->tpl->coordenadas = $evento->coordenadas;
        $view->tpl->programacao = $evento->programa;
        $view->tpl->palestrantes = $evento->palestrantes;
        $view->tpl->parceiros = $evento->parceiros;
        
        
        foreach($evento_fotos as $k => $foto) {
        	$view->tpl->select = $k == 0 ? "class='selected'" : "";
        	$view->tpl->data_index = $k;
        	$view->tpl->data_page = floor($k/7)+1;
        	$view->tpl->imagem = Utils::getScaledPath("evento_foto", $foto->id_evento_foto.'_full');
        	$view->tpl->imagem_pequena = Utils::getScaledPath("evento_foto", $foto->id_evento_foto);
        	
        	$view->tpl->parseBlock("FOTO_PEQUENA");
        	$view->tpl->parseBlock("FOTO_GRANDE");
        }
        
        $usuario = ORM::factory("usuario");
        $usuario->loadLogado();
        
		$phpdate = strtotime( $evento->data );
		$mysqldate = date( 'd.m.Y', $phpdate );
        $view->tpl->data = $mysqldate;

		$this->response->body($view);
	}
	
} 
