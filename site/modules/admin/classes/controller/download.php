<?php
class Controller_Download extends ControllerAdmin {

		private $controller_name = "download",
		$url_path = "download",
		$model_name = "download",
		$id_field = "id_download",
		$titulo_pagina = "Downloads",
		
		$column_label = array("ID","Nome", "Categoria","Restrição"),
		$column_fields = array("id_download","nome"),
		$field_set = array("id_download","nome", "arquivo", "id_download_categoria", "restricao");
        
        function __construct($request, $response){
                parent::__construct($request, $response);
                $this->obj = ORM::factory($this->model_name,$this->request->param("id",$this->request->post("id")));
        }
        
        public function action_listar()
        {
                $paginacao = new Paginacao("admin/".$this->url_path."/", 15, $this->obj->getCount());
                
                $rows = $this->obj->getLista(array(),$paginacao->limit,$paginacao->offset);
                
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
                        $view->tpl->categoria_nome = $row->categoria_nome . ($row->categoria_restricao?" (Acesso Privado)":"");
                        $view->tpl->restricao = $row->restricao ? "Acesso Privado" : "Acesso Público";
                        
                        $view->tpl->parseBlock("LISTAR");
                }
                $this->response->body($view);
                
        }
        
        public function action_adicionar() {
                $view= ViewTemplateAdmin::factory($this->controller_name."/form",$this->usuario);
                $view->tpl->titulo_pagina = $this->titulo_pagina;
                $view->tpl->url_path = $this->url_path;
                
                $download_categorias = ORM::factory("download_categoria")->getLista();
                
        	foreach ($download_categorias as $categoria) {
                	
                	$view->tpl->selected = $this->obj->id_download_categoria == $categoria->id_download_categoria ? "selected='selected'":"";
                	$view->tpl->value = $categoria->id_download_categoria;
                	$view->tpl->label = $categoria->nome.($categoria->restricao?" (Acesso Privado)" : "");
                	$view->tpl->parseBlock("CATEGORIAS");
                }
                
                $view->tpl->restricao_checked2  = "checked='checked'";
                
                $this->response->body($view);
        }
        
        public function action_editar() {
                
                $view = ViewTemplateAdmin::factory($this->controller_name."/form",$this->usuario);
                $view->tpl->titulo_pagina = $this->titulo_pagina;
                $view->tpl->url_path = $this->url_path;
                
                $download_categorias = ORM::factory("download_categoria")->getLista();
                
                foreach ($download_categorias as $categoria) {
                	
                	$view->tpl->selected = $this->obj->id_download_categoria == $categoria->id_download_categoria ? "selected='selected'":"";
                	$view->tpl->value = $categoria->id_download_categoria;
                	$view->tpl->label = $categoria->nome.($categoria->restricao?" (Acesso Privado)" : "");
                	$view->tpl->parseBlock("CATEGORIAS");
                }
                
                
                $id_field = $this->id_field;
                $view->tpl->id = $this->obj->$id_field;
                
                
                $view->tpl->restricao_checked1  = $this->obj->restricao ? "checked='checked'" : "";
    
                $view->tpl->restricao_checked2  = !$this->obj->restricao ? "checked='checked'" : "";
                
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
                $this->obj->delete();
                
                $this->request->redirect("admin/".$this->url_path);
        
        }
}

