<?php defined('SYSPATH') or die('No direct script access.');

class ControllerFront extends Controller {

	
	/**
	 * @var Model_Cliente
	 * */
	
	/**
	 * @var FrontInformacao
	 * */
	public $info;
	
	function __construct($request, $response){
		parent::__construct($request, $response);
		
		loadSessionCookies();
		
		$uri = substr($this->request->detect_uri(), 1);
		$qs = $_SERVER["QUERY_STRING"];
		
		
		$this->info = new FrontInformacao();
		$this->info->urlCorrente = $uri.(($qs)?"?".$qs:"");
		
		$this->loadInformacoes();
		
		if($this->info->paginaHTTPS===NULL){
			$this->info->paginaHTTPS = $this->info->paginaLogada;
		}
		
		if(isHTTPS()){
			if(!$this->info->paginaHTTPS){
				$this->request->redirect(URL::site($this->info->urlCorrente,"http",false));
				exit;
			}
		}
		else{
			if(($this->info->paginaHTTPS)&&(HTTPS_HABILITADO)){
				$this->request->redirect(URL::site($this->info->urlCorrente,"https",false));
				exit;
			}
		}
		
		if (((($this->request->controller()=="acesso")&&(($this->request->action()=="index")||($this->request->action()=="arearestrita")))||(($this->request->controller()=="anunciarindividualidentificacao")&&($this->request->action()=="index")))&&($this->cliente->isLogado())){
			if($this->request->query("redirect")){
				$this->request->redirect(urldecode($this->request->query("redirect")));
			} else {
				$this->request->redirect("");
			}	
			
		}
		
	}
	
	public function action_emconstrucao()
	{
		$view = ViewTemplateFront::factory("emconstrucao/index", $this->info);
		$this->response->body($view);
	}
	
	public function action_sempermissao()
	{
		$view = ViewTemplateFront::factory("sempermissao/index", $this->info);
		$this->response->body($view);
	}
	
	public function action_index()
	{
		$this->action_listar();
	}
	
	public function action_listar()
	{
		$this->action_emconstrucao();
	}
	
	public function action_adicionar()
	{
		$this->action_editar();
	}
	
	public function action_editar()
	{
		$this->action_emconstrucao();
	}
	
	public function loadInformacoes()
	{
		
	}

} 
