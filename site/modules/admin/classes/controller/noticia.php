<?php
class Controller_noticia extends ControllerAdmin {

		private $controller_name = "noticia",
		$url_path = "noticia",
		$model_name = "noticia",
		$id_field = "id_noticia",
		$titulo_pagina = "Not&iacute;cias",
		
		$column_label = array("ID",'Data',"Título","Texto da Chamada", "Imagem"),
		$column_fields = array("id_noticia",),
		$field_set = array("id_noticia","data","titulo","texto","texto_lista","imagem"),
                $ordem = "";
        function __construct($request, $response){
                parent::__construct($request, $response);
                $this->obj = ORM::factory($this->model_name,$this->request->param("id",$this->request->post("id")));
                $this->ordem = $this->request->query("ordem");
        }
        
        public function action_listar()
        {
                $paginacao = new Paginacao("admin/".$this->url_path."/", 15, $this->obj->getCount());
                if($this->ordem == "01") {
                        $rows = $this->obj->getLista(array(),$paginacao->limit,$paginacao->offset,array(array("data", "asc")));
                        $options = "<option value = '01' selected>Da mais antiga para a mais recente</option><option value = '10' >Da mais recente para a mais antiga</option>";
                }
                if($this->ordem == "10") {
                        $rows = $this->obj->getLista(array(),$paginacao->limit,$paginacao->offset,array(array("data", "desc")));
                        $options = "<option value = '01'>Da mais recente para a mais antiga</option><option value = '10' selected>Da mais recente para a mais antiga</option>";
                }
                if($this->ordem != "01" && $this->ordem != "10") {
                        $rows = $this->obj->getLista(array(),$paginacao->limit,$paginacao->offset,array(array($this->id_field, "asc")));
                        $options = "<option value = '01' >Da mais recente para a mais antiga</option><option value = '10' >Da mais antiga para a mais recente</option>";
                }

                $view = ViewTemplateAdmin::factory($this->controller_name."/listar", $this->usuario);
                
                $view->tpl->titulo_pagina = $this->titulo_pagina;
                $view->tpl->url_path = $this->url_path;
                $view->tpl->paginacao = $paginacao;
                $view->tpl->options = $options;
                
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
                        
                        $phpdate = strtotime( $row->data );
						$mysqldate = date( 'd/m/Y', $phpdate );
                        
                        $view->tpl->data = $mysqldate;
                        
                        $view->tpl->imagem_lista = Utils::getScaledPath($this->model_name, $row->$id_field);
                        
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
                
                $phpdate = strtotime( $this->obj->data );
				$mysqldate = date( 'd/m/Y', $phpdate );
                        
                $view->tpl->data = $mysqldate;
                
                $this->response->body($view);
        }
        
        public function action_salvar() {
                unset($_POST["id"]);
                
                $this->obj->values($_POST);
                
                $phpdate = DateTime::createFromFormat ( "d/m/Y" , $this->obj->data );
				$mysqldate = $phpdate->format("Y-m-d");
                $this->obj->data = $mysqldate;
                
                $this->obj->save();
                @Utils::generateScaled($this->obj->imagem, 'noticia', $this->obj->id_noticia, 220, 130);
                
                $this->request->redirect("admin/".$this->url_path);
        }
        
        public function action_deletar()
        {
                $this->obj->delete();
                
                $this->request->redirect("admin/".$this->url_path);
        
        }
}

