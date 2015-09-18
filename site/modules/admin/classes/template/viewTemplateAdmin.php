<?php defined("SYSPATH") or die("No direct script access.");

class ViewTemplateAdmin extends ViewTemplate {

	/**
	 * @var Model_Usuario
	 * */
	public $usuario;

	public function __construct($tpl, $usuario, $tplEstrutura){
		parent::__construct($tpl, $tplEstrutura);
		$this->usuario = $usuario;
	}

	public static function factory($tpl, $usuario=null, $tplEstrutura="template/default")
	{
		return new ViewTemplateAdmin($tpl, $usuario, $tplEstrutura);
	}

	public function addEstruturaContent()
	{
		$this->montaMenu();
		$this->tplEstrutura->id_usuario_logado = $this->usuario->id_usuario;
	}

	public function montaMenu () {
		/*
		$menu = new StdClass();
		$menu->link = "admin/dashboard";
		$menu->titulo = "Dashboard";
		$menu->submenu = false;
		if($this->usuario->verificaPermissao("dashboard")){
			$this->blocoMenu($menu);
		}
		*/
		
		
		$menu = new StdClass();
		$menu->link = "admin/conceitual";
		$menu->titulo = "Conceitual";
		$menu->submenu = false;
		if($this->usuario->verificaPermissao("usuario")){
			$this->blocoMenu($menu);
		}
	
		$menu = new StdClass();
		$menu->link = "admin/apresentacao";
		$menu->titulo = "Apresentação";
		$menu->submenu = false;
		if($this->usuario->verificaPermissao("usuario")){
			$this->blocoMenu($menu);
		}
		
		$menu = new StdClass();
		$menu->link = "admin/noticia";
		$menu->titulo = "Not&iacute;cias";
		$menu->submenu = false;
		if($this->usuario->verificaPermissao("usuario")){
			$this->blocoMenu($menu);
		}
		
		$submenus = array();
		$menu = new StdClass();
		$menu->link = "admin/download";
		$menu->titulo = "Cadastro";
		$menu->submenu = false;
		$submenus[] = $menu;
	
		$menu = new StdClass();
		$menu->link = "admin/download-categoria";
		$menu->titulo = "Categorias de Download";
		$menu->submenu = false;
		$submenus[] = $menu;
		
		$menu = new StdClass();
		$menu->link = "admin/download";
		$menu->titulo = "Download";
		$menu->submenu = $submenus;
		if($this->usuario->verificaPermissao("usuario")){
			$this->blocoMenu($menu);
		}
		
		$menu = new StdClass();
		$menu->link = "admin/evento";
		$menu->titulo = "Eventos";
		$menu->submenu = false;
		if($this->usuario->verificaPermissao("usuario")){
			$this->blocoMenu($menu);
		}
		
		$submenus = array();
		$menu = new StdClass();
		$menu->link = "admin/associado";
		$menu->titulo = "Cadastro";
		$menu->submenu = false;
		$submenus[] = $menu;
		
		$menu = new StdClass();
		$menu->link = "admin/associado-categoria";
		$menu->titulo = "Categorias";
		$menu->submenu = false;
		$submenus[] = $menu;
		
		$menu = new StdClass();
		$menu->link = "admin/associado";
		$menu->titulo = "Associados";
		$menu->submenu = $submenus;
		if($this->usuario->verificaPermissao("usuario")){
			$this->blocoMenu($menu);
		}
		
		$submenus = array();
		$menu = new StdClass();
		$menu->link = "admin/fornecedor";
		$menu->titulo = "Cadastro";
		$menu->submenu = false;
		$submenus[] = $menu;
		
		$menu = new StdClass();
		$menu->link = "admin/fornecedor-categoria";
		$menu->titulo = "Categorias";
		$menu->submenu = false;
		$submenus[] = $menu;
		
		
		$menu = new StdClass();
		$menu->link = "admin/fornecedor";
		$menu->titulo = "Fornecedores";
		$menu->submenu = $submenus;
		if($this->usuario->verificaPermissao("usuario")){
			$this->blocoMenu($menu);
		}
		
		$menu = new StdClass();
		$menu->link = "admin/projeto";
		$menu->titulo = "Projetos";
		$menu->submenu = false;
		if($this->usuario->verificaPermissao("usuario")){
			$this->blocoMenu($menu);
		}
		
		$submenus = array();
		$menu = new StdClass();
		$menu->link = "admin/newsletter";
		$menu->titulo = "Enviar Newsletter";
		$menu->submenu = false;
		$submenus[] = $menu;
		
		$menu = new StdClass();
		$menu->link = "admin/email-categoria";
		$menu->titulo = "Categorias de Email";
		$menu->submenu = false;
		$submenus[] = $menu;
		
		$menu = new StdClass();
		$menu->link = "admin/email";
		$menu->titulo = "Emails Cadastrados";
		$menu->submenu = false;
		$submenus[] = $menu;
		
		$menu = new StdClass();
		$menu->link = "admin/newsletter";
		$menu->titulo = "Newsletter";
		$menu->submenu = $submenus;
		if($this->usuario->verificaPermissao("usuario")){
			$this->blocoMenu($menu);
		}
		
		$submenus = array();
		$menu = new StdClass();
		$menu->link = "admin/usuario";
		$menu->titulo = "Usuários";
		$menu->submenu = false;
		$submenus[] = $menu;
		
		$menu = new StdClass();
		$menu->link = "admin/texto-sistema";
		$menu->titulo = "Texto de Layout";
		$menu->submenu = false;
		$submenus[] = $menu;
	
		
		$menu = new StdClass();
		$menu->link = "admin/#";
		$menu->titulo = "Sistema";
		$menu->submenu = $submenus;
		if($this->usuario->verificaPermissao("usuario")){
			$this->blocoMenu($menu);
		}
	}

	public function blocoMenu ($menu) {

		$menuAtivo = false;

		if ($menu->link)
			$this->tplEstrutura->link_n1 = $menu->link;
		else
			$this->tplEstrutura->link_n1 = "#";

		$this->tplEstrutura->titulo_n1 = $menu->titulo;

		if (($menu->submenu) and (count($menu->submenu) > 0)) {
			
			foreach ($menu->submenu as $k => $submenu) {
				if ($submenu->link)
					$this->tplEstrutura->link_n2 = $submenu->link;
				else
					$this->tplEstrutura->link_n2 = "#";

				$this->tplEstrutura->titulo_n2 = $submenu->titulo;

				if (($_SERVER["REQUEST_URI"]==$submenu->link)||(strpos($_SERVER["REQUEST_URI"]."/acao/", $submenu->link."/acao/") > 0)) {
					$this->tplEstrutura->classe_ativo_li = 'class = "sub_show"';
					$menuAtivo = true;
				} else {
					$this->tplEstrutura->classe_ativo_li = '';
				}
				$this->tplEstrutura->parseBlock("MENU_N2_ITEM");
			}

			if ($menuAtivo)
				$this->tplEstrutura->classe_ativo_div = "show";
			else
				$this->tplEstrutura->classe_ativo_div = "";

			$this->tplEstrutura->parseBlock("MENU_N2");
		}

		if ($menuAtivo)
			$this->tplEstrutura->class_ativo_n1 = "current";
		else
			$this->tplEstrutura->class_ativo_n1 = "select";

		$this->tplEstrutura->parseBlock("MENU_N1");
	}

}
