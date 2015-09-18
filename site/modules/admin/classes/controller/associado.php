<?php
class Controller_Associado extends ControllerAdmin {

		private $controller_name = "associado",
		$url_path = "associado",
		$model_name = "associado",
		$id_field = "id_associado",
		$titulo_pagina = "Associados",
		
		$column_label = array("ID","Marca","Nome","Categoria"),
		$column_fields = array("id_associado"),
		$field_set = array("id_associado","nome","marca","contato","contato_telefone", "contato_email","endereco","id_categoria","descricao","projetos","coordenadas");
        
        function __construct($request, $response){
                parent::__construct($request, $response);
                $this->obj = ORM::factory($this->model_name,$this->request->param("id",$this->request->post("id")));
        }
        
        public function action_listar()
        {
                $paginacao = new Paginacao("admin/".$this->url_path."/", 15, $this->obj->getCount());
                
                $rows = $this->obj->getLista(array(),$paginacao->limit,$paginacao->offset,array(array($this->id_field, "asc")));
                
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
                		$view->tpl->categoria = $row->categoria;
                        
                        foreach($this->column_fields as $column) {
                        	$view->tpl->table_field = $row->$column;
                        	$view->tpl->$column = $row->$column;
                        	$view->tpl->parseBlock("BODY");
                        }
                        
                        foreach($this->field_set as $field) {
                        	$view->tpl->$field = $row->$field;
                        }
                        
                        $view->tpl->marca = Utils::getScaledPath("associado", $row->$id_field);
                        
                        $view->tpl->parseBlock("LISTAR");
                }
                $this->response->body($view);
                
        }
        
        public function action_adicionar() {
                $view= ViewTemplateAdmin::factory($this->controller_name."/form",$this->usuario);
                $view->tpl->titulo_pagina = $this->titulo_pagina;
                $view->tpl->url_path = $this->url_path;
                
                $associado_categoria = ORM::factory("associado_categoria");
                foreach($associado_categoria->getLista() as $categoria) {
                	$view->tpl->label = $categoria->nome;
                	$view->tpl->value = $categoria->id_associado_categoria;
                	$view->tpl->selected = $categoria->id_associado_categoria == $this->obj->id_categoria ? "selected='selected'" : "";
                	$view->tpl->parseBlock("CATEGORIA");
                }
                
                $this->response->body($view);
        }
        
        public function action_editar() {
                
                $view = ViewTemplateAdmin::factory($this->controller_name."/form",$this->usuario);
                $view->tpl->titulo_pagina = $this->titulo_pagina;
                $view->tpl->url_path = $this->url_path;
                
                $id_field = $this->id_field;
                $view->tpl->id = $this->obj->$id_field;
                
        
                $associado_categoria = ORM::factory("associado_categoria");
                foreach($associado_categoria->getLista() as $categoria) {
                	$view->tpl->label = $categoria->nome;
                	$view->tpl->value = $categoria->id_associado_categoria;
                	$view->tpl->selected = $categoria->id_associado_categoria == $this->obj->id_categoria ? "selected='selected'" : "";
                	$view->tpl->parseBlock("CATEGORIA");
                }
                
                foreach($this->field_set as $column) {
	                $view->tpl->$column = $this->obj->$column;
                }
                
                $this->response->body($view);
        }
        
        public function action_salvar() {
                unset($_POST["id"]);
                
                $this->obj->values($_POST);
                $this->obj->save();
                
                @Utils::generateScaled($this->obj->marca, 'associado', $this->obj->id_associado, 220, 130);
                
                $this->request->redirect("admin/".$this->url_path);
        }
        
        public function action_deletar()
        {
                $this->obj->delete();
                
                $this->request->redirect("admin/".$this->url_path);
        
        }
}

