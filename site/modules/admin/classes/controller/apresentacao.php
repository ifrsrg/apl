<?php
class Controller_Apresentacao extends ControllerAdmin {

		private $controller_name = "apresentacao",
		$url_path = "apresentacao",
		$model_name = "apresentacao",
		$id_field = "id_apresentacao",
		$titulo_pagina = "Apresentação",
		
		$column_label = array("ID","Título","Imagem", "É Destaque?"),
		$column_fields = array(),
		$field_set = array("id_apresentacao","titulo","texto","destaque","imagem","subtitulo","titulo_formatado");
        
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
                        
                        $view->tpl->imagem = Utils::getScaledPath("apresentacao", $row->$id_field);
                        $view->tpl->titulo = strip_tags($row->titulo, "<b><i><u><strong>");
                        $view->tpl->destaque = $row->destaque ? "Sim" : "Não";
                        	
                        
                        $view->tpl->parseBlock("LISTAR");
                }
                $this->response->body($view);
                
        }
        
        public function action_adicionar() {
                $view= ViewTemplateAdmin::factory($this->controller_name."/form",$this->usuario);
                $view->tpl->titulo_pagina = $this->titulo_pagina;
                $view->tpl->url_path = $this->url_path;
                
                $view->tpl->destaque_checked2 = "checked='checked'";
                
                $this->response->body($view);
        }
        
        public function action_editar() {
                
                $view = ViewTemplateAdmin::factory($this->controller_name."/form",$this->usuario);
                $view->tpl->titulo_pagina = $this->titulo_pagina;
                $view->tpl->url_path = $this->url_path;
                
                $id_field = $this->id_field;
                $view->tpl->id = $this->obj->$id_field;
                
                $view->tpl->destaque_checked1 = $this->obj->destaque ? "checked='checked'" : "";
                $view->tpl->destaque_checked2 = !$this->obj->destaque ? "checked='checked'" : "";
                
                foreach($this->field_set as $column) {
	                $view->tpl->$column = $this->obj->$column;
                }
                
                $this->response->body($view);
        }
        
        public function action_salvar() {
        		$id = $_POST["id"];
                unset($_POST["id"]);
                
                $apresentacao = ORM::factory("apresentacao");
                
                if($_POST["destaque"]) {
                	$apresentacao->unsetDestaques($id);
                }
                
                $this->obj->values($_POST);
                $this->obj->save();
                
                @Utils::generateScaled($this->obj->imagem, 'apresentacao', $this->obj->id_apresentacao, 460, 290);
                
                $this->request->redirect("admin/".$this->url_path);
        }
        
        public function action_deletar()
        {
                $this->obj->delete();
                
                $this->request->redirect("admin/".$this->url_path);
        
        }
}

