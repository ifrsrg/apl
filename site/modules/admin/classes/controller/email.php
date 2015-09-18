<?php
class Controller_Email extends ControllerAdmin {

		private $controller_name = "email",
		$url_path = "email",
		$model_name = "email",
		$id_field = "id_email",
		$titulo_pagina = "E-Mails",
		
		$column_label = array("ID","Nome", "E-Mail", "Categoria"),
		$column_fields = array("id_email","nome", "email"),
		$field_set = array("id_email","nome", "email");
        
        function __construct($request, $response){
                parent::__construct($request, $response);
                $this->obj = ORM::factory($this->model_name,$this->request->param("id",$this->request->post("id")));
        }
        
        public function action_listar()
        {
                $paginacao = new Paginacao("admin/".$this->url_path."/", 15, $this->obj->getCount());
                
                $rows = $this->obj->getLista(array(),$paginacao->limit,$paginacao->offset, array(array("email_categoria.nome","asc"),array("email.nome","asc")));
                
                $view = ViewTemplateAdmin::factory($this->controller_name."/listar", $this->usuario);
                
                $view->tpl->titulo_pagina = $this->titulo_pagina;
                $view->tpl->url_path = $this->url_path;
                $view->tpl->paginacao = $paginacao;
                
        		foreach ($this->column_label as $k => $column) {
        				if($k == 0) {
        					$view->tpl->table_header_class = "table-header-check";
                        $view->tpl->table_header_name = $column;
        				} else {
        					$view->tpl->table_header_class = "table-header-repeat line-left minwidth-1";
                        $view->tpl->table_header_name = "<span>$column</span>";
        				}
        				
                        $view->tpl->parseBlock("HEADER");
                }
                        
                foreach ($rows as $row){
                		$id_field = $this->id_field;
                        $view->tpl->id = $row->$id_field;
                        
                        foreach($this->column_fields as $column) {
                        	$view->tpl->table_field = $row->$column;
                        	$view->tpl->$column = $row->$column;
                        	$view->tpl->parseBlock("BODY");
                        }
                        
                        foreach($this->field_set as $field) {
                        	$view->tpl->$field = $row->$field;
                        }
                        
                        $view->tpl->parseBlock("LISTAR");
                }
                $this->response->body($view);
                
        }
        
        public function action_adicionar() {
                $view= ViewTemplateAdmin::factory($this->controller_name."/form",$this->usuario);
                $view->tpl->titulo_pagina = $this->titulo_pagina;
                $view->tpl->url_path = $this->url_path;
                
                $email_categoria = ORM::factory("email_categoria");
                foreach($email_categoria->getLista() as $categoria) {
                	$view->tpl->label = $categoria->nome;
                	$view->tpl->value = $categoria->id_email_categoria;
                	$view->tpl->selected = $categoria->id_email_categoria == $this->obj->id_email_categoria ? "selected='selected'" : "";
                	$view->tpl->parseBlock("CATEGORIA");
                }
                
                $this->response->body($view);
        }
        
        public function action_editar() {
                
                $view = ViewTemplateAdmin::factory($this->controller_name."/form",$this->usuario);
                $view->tpl->titulo_pagina = $this->titulo_pagina;
                $view->tpl->url_path = $this->url_path;
                
                $email_categoria = ORM::factory("email_categoria");
                foreach($email_categoria->getLista() as $categoria) {
                	$view->tpl->label = $categoria->nome;
                	$view->tpl->value = $categoria->id_email_categoria;
                	$view->tpl->selected = $categoria->id_email_categoria == $this->obj->id_email_categoria ? "selected='selected'" : "";
                	$view->tpl->parseBlock("CATEGORIA");
                }
                
                $id_field = $this->id_field;
                $view->tpl->id = $this->obj->$id_field;
                
                
                foreach($this->field_set as $column) {
	                $view->tpl->$column = $this->obj->$column;
                }
                
                $this->response->body($view);
        }
        
        public function action_salvar() {
                unset($_POST["id"]);
                
                $this->obj->values($_POST);
                $this->obj->save();
                
                $this->request->redirect("admin/".$this->url_path);
        }
        
        public function action_deletar()
        {
        		$associado = ORM::factory("associado");
        		
                $this->obj->delete();
                
                $this->request->redirect("admin/".$this->url_path);
        
        }
}

