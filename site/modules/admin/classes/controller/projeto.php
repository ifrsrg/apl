<?php
class Controller_Projeto extends ControllerAdmin {

		private $controller_name = "projeto",
		$url_path = "projeto",
		$model_name = "projeto",
		$id_field = "id_projeto",
		$titulo_pagina = "Projetos",
		
		$column_label = array("ID","Marca","Nome","Texto Chamada"),
		$column_fields = array("id_projeto"),
		$field_set = array("id_projeto","nome","data_inicio","data_termino","status", "executor_marca","financiador_marca","marca","arquivo","arquivo_restrito","texto_lista","texto");
        
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
                        
                        foreach($this->column_fields as $column) {
                        	$view->tpl->table_field = $row->$column;
                        	$view->tpl->$column = $row->$column;
                        	$view->tpl->parseBlock("BODY");
                        }
                        
                        foreach($this->field_set as $field) {
                        	$view->tpl->$field = $row->$field;
                        }
                        
                        $view->tpl->marca = Utils::getScaledPath($this->model_name, $row->$id_field);
                        
                        $view->tpl->parseBlock("LISTAR");
                }
                $this->response->body($view);
                
        }
        
        public function action_adicionar() {
                $view= ViewTemplateAdmin::factory($this->controller_name."/form",$this->usuario);
                $view->tpl->titulo_pagina = $this->titulo_pagina;
                $view->tpl->url_path = $this->url_path;
                                
                $this->response->body($view);
        }
        
        public function action_editar() {
                
                $view = ViewTemplateAdmin::factory($this->controller_name."/form",$this->usuario);
                $view->tpl->titulo_pagina = $this->titulo_pagina;
                $view->tpl->url_path = $this->url_path;
                
                $id_field = $this->id_field;
                $view->tpl->id = $this->obj->$id_field;
                                
                foreach($this->field_set as $column) {
	                $view->tpl->$column = $this->obj->$column;
                }
                
                if($this->obj->data_inicio) {
	                $phpdate = strtotime( $this->obj->data_inicio );
					$mysqldate = date( 'd/m/Y', $phpdate );
                        
                	$view->tpl->data_inicio = $mysqldate;
                }
                
                if($this->obj->data_termino) {
	                $phpdate = strtotime( $this->obj->data_termino );
					$mysqldate = date( 'd/m/Y', $phpdate );
	                        
	                $view->tpl->data_termino = $mysqldate;
                }
                
                $this->response->body($view);
        }
        
        public function action_salvar() {
                unset($_POST["id"]);
                
                $this->obj->values($_POST);
                
                if($this->obj->data_inicio) {
	                $phpdate = DateTime::createFromFormat ( "d/m/Y" , $this->obj->data_inicio );
					$mysqldate = $phpdate->format("Y-m-d");
	                $this->obj->data_inicio = $mysqldate;
                } else {
	                $this->obj->data_inicio = null;
                }
                
                if($this->obj->data_termino) {
	                $phpdate = DateTime::createFromFormat ( "d/m/Y" , $this->obj->data_termino );
					$mysqldate = $phpdate->format("Y-m-d");
	                $this->obj->data_termino = $mysqldate;
                } else {
	                $this->obj->data_termino = null;
                }
                
                $this->obj->save();
                
                @Utils::generateScaled($this->obj->marca, 'projeto', $this->obj->id_projeto, 272, 272);
                @Utils::generateScaled($this->obj->marca, 'projeto', $this->obj->id_projeto.'_full', 537, 537, true);
                @Utils::generateScaled($this->obj->executor_marca, 'projeto', $this->obj->id_projeto.'_executor', 220, 130);
                @Utils::generateScaled($this->obj->financiador_marca, 'projeto', $this->obj->id_projeto.'_financiador', 220, 130);
                
                $this->request->redirect("admin/".$this->url_path);
        }
        
        public function action_deletar()
        {
                $this->obj->delete();
                
                $this->request->redirect("admin/".$this->url_path);
        
        }
}

