<?php defined("SYSPATH") or die("No direct script access.");

class Controller_Usuario extends ControllerAdmin {

	function __construct($request, $response){
		parent::__construct($request, $response);
		$this->obj = ORM::factory("usuario",$this->request->param("id",$this->request->post("id")));
	}

	public function action_listar()
	{
		$view = ViewTemplateAdmin::factory("usuario/listar", $this->usuario);

		$where = array();

		$view->tpl->filtro_nome = $this->request->query('nome');
		if($this->request->query('nome'))
			$where[] = array('nome', 'LIKE', '%'.$this->request->query('nome').'%');

		$paginacao = new Paginacao('admin/usuario/', 15, $this->obj->getCount($where));

		foreach($this->obj->getLista($where, $paginacao->limit, $paginacao->offset) as $row){
			$view->tpl->id_usuario = $row->id_usuario;
			$view->tpl->nome = $row->nome;
			$view->tpl->email = $row->email;
			$view->tpl->admin = $row->admin ? 'Sim' : 'Não';
			$view->tpl->parseBlock('LISTAR');
		}
		$view->tpl->paginacao = $paginacao;

		$this->response->body($view);
	}
	
	public function action_adicionar() {
		$view = ViewTemplateAdmin::factory('usuario/form', $this->usuario);
		$view->tpl->valido = '1';
		$view->tpl->checked1 = "checked='checked'";
		$this->response->body($view);
	}

	public function action_editar()
	{
		$view = ViewTemplateAdmin::factory('usuario/form', $this->usuario);
		$view->tpl->id_usuario = $this->obj->id_usuario;
		$view->tpl->nome = $this->obj->nome;
		$view->tpl->email = $this->obj->email;
		$view->tpl->valido = $this->obj->loaded() ? '1' : '0';
		$view->tpl->checked1 = $this->obj->admin ? "checked='checked'" : "";
		$view->tpl->checked2 = !$this->obj->admin ? "checked='checked'" : "";
		

		$this->response->body($view);

	}

	public function action_salvar()
	{
		if($this->request->post('senha'))
			$this->obj->senha = md5($this->request->post('senha'));

		unset($_POST['senha']);

		$this->obj->values($_POST);
		$this->obj->save();

		if($this->usuario->admin==1){
			$this->request->redirect("admin/usuario");
		} else {
			$this->request->redirect("admin");
		}
	}
	
	public function action_email()
	{
		$email = $this->request->post('email');

		exit((validaEmail($email) && $this->obj->ValidaEmail($email, $this->request->post('id_usuario'))) ? '1' : '0');
	}

	public function action_remover()
	{
		$this->obj->delete();
		$this->request->redirect("admin/usuario");
	}
}
