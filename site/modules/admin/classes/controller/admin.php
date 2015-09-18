<?php defined('SYSPATH') or die('No direct script access.');

class ControllerAdmin extends Controller {

	/**
	 * @var ORM
	 * */
	public $obj;
	
	/**
	 * @var Model_Usuario
	 * */
	public $usuario;
	
	function __construct($request, $response){
		parent::__construct($request, $response);
		
		loadSessionCookies();
		
		if((!isHTTPS())&&(HTTPS_HABILITADO_ADMIN)){
			$this->request->redirect(URL::site("admin/login","https",false));
			exit;
		}
		
		$this->usuario = ORM::factory("usuario");
			
		if(!$this->usuario->loadLogado()){
			$this->request->redirect("admin/login");
			exit;
		}
		else{
			$temPermissao = $this->usuario->verificaPermissao($this->request->controller(),$this->request->action(), $this->request->param("id",$this->request->post("id")));
			if(!$temPermissao){
				$this->request->action("sempermissao");
			}
		}
		
	}
	
	public function action_emconstrucao()
	{
		$view = ViewTemplateAdmin::factory("emconstrucao/index", $this->usuario);
		$this->response->body($view);
	}
	
	public function action_sempermissao()
	{
		$view = ViewTemplateAdmin::factory("sempermissao/index", $this->usuario);
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

} 
