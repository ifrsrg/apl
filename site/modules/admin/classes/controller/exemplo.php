<?php defined("SYSPATH") or die("No direct script access.");


class Controller_Exemplo extends ControllerAdmin {

	
	function __construct($request, $response){
		parent::__construct($request, $response);
		$this->obj = ORM::factory("materia_categoria",$this->request->param("id",$this->request->post("id")));
		$this->objSegmento = ORM::factory("segmento");
	}
	
	public function action_listar()
	{

		$query = $this->obj->find_all();
		
		$rows = $query->as_array();
		
		$view = ViewTemplateAdmin::factory("exemplo/listar", $this->usuario);
		
		foreach ($rows as $row){
			$view->tpl->id_materia_categoria = $row->id_materia_categoria;
			$view->tpl->materia_categoria = $row->materia_categoria;
			$view->tpl->parseBlock("LISTAR");
		}

		$this->response->body($view);
		
	}
	
	public function action_editar()
	{
		$view = ViewTemplateAdmin::factory("exemplo/form", $this->usuario);
		$view->tpl->id_materia_categoria = $this->obj->id_materia_categoria;
		$view->tpl->materia_categoria = $this->obj->materia_categoria;

		foreach($this->objSegmento->getArray() as $id => $segmento) {
			$view->tpl->id_segmento = $id;
			$view->tpl->segmento = $segmento;
			$this->obj->id_segmento == $id ? $view->tpl->selected = 'SELECTED' : $view->tpl->selected = '';
			$view->tpl->parseBlock('SEGMENTO');
		} 
		
		$this->response->body($view);
		
	}
	
	public function action_salvar()
	{
	
		unset($_POST["id"]);
		 
		$this->obj->values($_POST);
		$this->obj->save();
		
		$this->request->redirect("admin/exemplo");
	}
	
	public function action_deletar()
	{
		$this->obj->delete();
		
		$this->request->redirect("admin/exemplo");
	
	}
	

} 
