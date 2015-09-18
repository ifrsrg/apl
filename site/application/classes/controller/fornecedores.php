<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Fornecedores extends ControllerFront {
		
	function __construct($request, $response){
		parent::__construct($request, $response);
		
		$usuario = ORM::factory("usuario");
		$usuario->loadLogado();
		if(!$usuario->isLogado()) {
			$this->request->redirect("/");
		}
    }
	
	private function preencheConceituais($view) {
		$conceituais = ORM::factory("conceitual")->getLista();
		
		foreach ($conceituais as $conceitual) {
			$view->tpl->conceitual_imagem = $conceitual->imagem;
			$view->tpl->conceitual_titulo = $conceitual->titulo;
			$view->tpl->parseBlock("CONCEITUAIS");
		}
		
	}
	
	private function preencheFornecedores($view) {
		$fornecedores = ORM::factory("fornecedor")->getLista(array(),6,0,array(array("id_fornecedor", "asc")));
		$i = 1;
		foreach($fornecedores as $fornecedor) {
			$view->tpl->fornecedor_nome = $fornecedor->nome;
			$view->tpl->fornecedor_marca = Utils::getScaledPath("fornecedor", $fornecedor->id_fornecedor);
			$view->tpl->fornecedor_texto = $fornecedor->descricao;
			$view->tpl->fornecedor_projetos = $fornecedor->projetos;
			$view->tpl->fornecedor_contato = $fornecedor->contato;
			$view->tpl->fornecedor_categoria = $fornecedor->categoria;
			$view->tpl->fornecedor_contato_telefone = $fornecedor->contato_telefone;
			$view->tpl->fornecedor_contato_email = $fornecedor->contato_email;
			$view->tpl->fornecedor_coordenadas = $fornecedor->coordenadas;
			$view->tpl->fornecedor_endereco = $fornecedor->endereco;
			$view->tpl->fornecedor_index = $i++;
			
			if($fornecedor->projetos)
				$view->tpl->parseBlock("HAS_PROJETO");
			
			$view->tpl->parseBlock("FORNECEDORES");
			$view->tpl->parseBlock("FORNECEDORES_MODAL");
		}
		
		$c = ORM::factory("fornecedor")->getCount();
		
		if($c > 6) {
			$view->tpl->parseBlock("MORE_FORNECEDOR");
		}
	}

	private function preencheTextoLayout($view) {
		$ts = ORM::factory("texto_sistema");
		$view->tpl->texto_subtitulo_fornecedor = $ts->get("subtitulo_fornecedor");
		$view->tpl->texto_subtitulo_projeto = $ts->get("subtitulo_projeto");
		$view->tpl->texto_subtitulo_download = $ts->get("subtitulo_download");
		$view->tpl->texto_subtitulo_contato = $ts->get("subtitulo_contato");
	}
	
	public function action_index(){
		$view = ViewTemplateFront::factory("fornecedor/lista", $this->info);
        $view->tpl->url = 'http%3A%2F%2F'.$_SERVER['HTTP_HOST'].str_replace('/', '%2F', $_SERVER['REQUEST_URI']);
        
        $this->preencheFornecedores($view);
        $this->preencheConceituais($view);
        $this->preencheTextoLayout($view);
        
        
		$this->response->body($view);
	}
	
	public function action_paging() {
		$offset = $_POST["offset"];
		
		$resultset = array(
			"affiliates" => array(),
			"remaining" => ORM::factory("fornecedor")->getCount()-$offset
		);
		
		$fornecedores = ORM::factory("fornecedor")->getLista(array(),1000,$offset,array(array("id_fornecedor", "asc")));
		
		foreach ($fornecedores as $fornecedor) {
			$resultset["fornecedores"][] = array(
				"id_fornecedor" => $fornecedor->id_fornecedor,
				"nome" => $fornecedor->nome,
				"marca" => Utils::getScaledPath("fornecedor", $fornecedor->id_fornecedor),
				"contato" => $fornecedor->contato,
				"contato_telefone" => $fornecedor->contato_telefone,
				"contato_email" => $fornecedor->contato_email,
				"endereco" => $fornecedor->endereco,
				"categoria" => $fornecedor->categoria,
				"descricao" => $fornecedor->descricao,
				"projetos" => $fornecedor->projetos,
				"coordenadas" => $fornecedor->coordenadas
			);
		}
		
		exit(json_encode($resultset));
	}
	
	public function loadInformacoes()
	{
		$this->info->tipo = ViewTemplateFront::$INTERNA_GERAL;
	}
	
} 
