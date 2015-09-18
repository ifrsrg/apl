<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Autenticar extends Controller {

	/**
	 * @var ORM
	 * */
	public $usuario;
	
	function __construct($request, $response){
		parent::__construct($request, $response);
		
		loadSessionCookies();
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
			echo "1";
		}
		else{
			echo "E-mail ou Senha não conferem";
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
		if($_POST["email"]){
			if($usuario->validaEmail($_POST["email"])){
				echo "0|E-mail não cadastrado na base";
			}
			else {
				echo "1|".$usuario->esqueciSenha($_POST["email"]);
			}
		} else {
			echo "0|O campo E-mail deve ser preenchido";
		}
	}
	
	

} 
