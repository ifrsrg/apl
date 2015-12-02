<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Noticias extends ControllerFront {
		
	private function preencheConceituais($view) {
		$conceituais = ORM::factory("conceitual")->getLista();
		
		foreach ($conceituais as $conceitual) {
			$view->tpl->conceitual_imagem = $conceitual->imagem;
			$view->tpl->conceitual_titulo = $conceitual->titulo;
			$view->tpl->parseBlock("CONCEITUAIS");
		}
		
	}
	
	private function preencheNoticias($view) {
		
        $q = $this->request->query("q");
        $view->tpl->q = $q;


		$noticias = ORM::factory("noticia")->where("titulo",  "like", "%$q%")->getLista(array(),6,0,array(array("data","desc")));
		$i = 1;
		foreach($noticias as $k => $noticia) {
			$view->tpl->noticia_id = $noticia->id_noticia;
			$view->tpl->noticia_nome = $noticia->titulo;
			$view->tpl->noticia_marca = Utils::getScaledPath("noticia", $noticia->id_noticia);
			$view->tpl->noticia_texto = $noticia->texto_lista;
			$view->tpl->data = date("d/m/Y",strtotime($noticia->data));
			if(!(($k+1)%3))
				$view->tpl->parseBlock("NOTICIA_BREAK");


			$view->tpl->parseBlock("NOTICIAS");
		}
		
		$c = ORM::factory("noticia")->getCount();
		
		if($c > 6) {
			$view->tpl->parseBlock("MORE_NEWS");
		}
	}

	private function preencheTextoLayout($view) {
		$ts = ORM::factory("texto_sistema");
		$view->tpl->texto_subtitulo_evento = $ts->get("subtitulo_evento");
		$view->tpl->texto_subtitulo_associado = $ts->get("subtitulo_associado");
		$view->tpl->texto_subtitulo_projeto = $ts->get("subtitulo_projeto");
		$view->tpl->texto_subtitulo_download = $ts->get("subtitulo_download");
		$view->tpl->texto_subtitulo_contato = $ts->get("subtitulo_contato");
		$view->tpl->texto_subtitulo_noticia = $ts->get("subtitulo_contato");
		$view->tpl->texto_agenda_acoes = $ts->get("agenda_acoes");
		$view->tpl->texto_agenda_completa = $ts->get("agenda_completa");
	}
	
	public function action_index(){
		$view = ViewTemplateFront::factory("noticia/lista", $this->info);
        $view->tpl->url = 'http%3A%2F%2F'.$_SERVER['HTTP_HOST'].str_replace('/', '%2F', $_SERVER['REQUEST_URI']);
        
        $this->preencheNoticias($view);
        $this->preencheConceituais($view);
        $this->preencheTextoLayout($view);
        
		$this->response->body($view);

		
	}
	
	public function action_paging() {
		$offset = $_POST["offset"];
		$q = $_POST["q"];
		//echo var_dump($q);
		$resultset = array(
			"news" => array(),
			"remaining" => ORM::factory("noticia")->getCount()-$offset
		);
		
		$noticias = ORM::factory("noticia")->where("titulo",  "like", "%$q%")->getLista(array(),6,$offset,array(array("data","desc")));
		
		foreach ($noticias as $noticia) {
			$resultset["news"][] = array(
				"id" => $noticia->id_noticia,
				"nome" => $noticia->titulo,
				"marca" => Utils::getScaledPath("noticia", $noticia->id_noticia),
				"texto" => $noticia->texto_lista
			);
		}
		
		exit(json_encode($resultset));
	}
	
	public function loadInformacoes()
	{
		$this->info->tipo = ViewTemplateFront::$INTERNA_GERAL;
	}

	public function action_detalhe() {

		$noticia = ORM::factory("noticia", $this->request->param("id"));
		
		$view = ViewTemplateFront::factory("noticia/detalhe", $this->info);
        $view->tpl->url = 'http%3A%2F%2F'.$_SERVER['HTTP_HOST'].str_replace('/', '%2F', $_SERVER['REQUEST_URI']);
        
        $this->preencheTextoLayout($view);
        
        $view->tpl->titulo = $noticia->titulo;
        $view->tpl->imagem = $noticia->imagem;
        $view->tpl->texto = $noticia->texto;
        $view->tpl->data = date("d/m/Y",strtotime($noticia->data));

        
        $usuario = ORM::factory("usuario");
        $usuario->loadLogado();
        /*
		$phpdate = strtotime( $evento->data );
		$mysqldate = date( 'd.m.Y', $phpdate );
        $view->tpl->data = $mysqldate;*/

		$this->response->body($view);
	}
	
} 
