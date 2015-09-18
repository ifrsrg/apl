<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Controller {

	/**
	 * @var ORM
	 * */
	public $usuario;
	
	function __construct($request, $response){
		parent::__construct($request, $response);
		
		loadSessionCookies();
		
		if((!isHTTPS())&&(HTTPS_HABILITADO_ADMIN)){
			$this->request->redirect(URL::site("admin/login","https",false));
			exit;
		}
	}
	
	
	
	public function action_index()
	{
		$view = ViewTemplate::factory("login/form","template/login");
		$this->response->body($view);
	}
	
	public function action_autenticar()
	{
		$usuario = ORM::factory("usuario");
		if($usuario->login($_POST["email"],$_POST["senha"])){
			$this->request->redirect("admin");
		}
		else{
			$view = ViewTemplate::factory("login/form","template/login");
			$view->tpl->msg = "E-mail ou Senha não conferem";
			$this->response->body($view);
		}
	}
	
	public function action_deslogar()
	{
		$usuario = ORM::factory("usuario");
		$usuario->deslogar();
		$this->request->redirect("admin/login");
		
	}
	
	public function action_esqueciminhasenha()
	{
		$usuario = ORM::factory("usuario");
		$view = ViewTemplate::factory("login/form","template/login");
		if($_POST["email"]){
			if($usuario->validaEmail($_POST["email"])){
				$view->tpl->msg = "E-mail não cadastrado na base";
			}
			else {
				$view->tpl->msg = $usuario->esqueciSenha($_POST["email"]);
			}
		}
		else{
			$view->tpl->msg = "O campo E-mail deve ser preenchido";
		}
		$this->response->body($view);
	}
	
	

} 
