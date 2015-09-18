<?php
class Controller_evento extends ControllerAdmin {

		private $controller_name = "evento",
		$url_path = "evento",
		$model_name = "evento",
		$id_field = "id_evento",
		$titulo_pagina = "Eventos",
		
		$column_label = array("ID","Nome","Data","Marca"),
		$column_fields = array("id_evento","nome"),
		$field_set = array("id_evento","nome","marca","data","programa","palestrantes","informacoes_gerais","coordenadas","local","hora","parceiros","texto_lista");
        
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
                        
                        $phpdate = strtotime( $row->data );
						$mysqldate = date( 'd/m/Y', $phpdate );
                        
                        $view->tpl->data = $mysqldate;
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
                
                $fotosDb = ORM::factory("evento_foto")->getLista(array(array("id_evento","=",$this->obj->id_evento)));
                
				$fotos = array();
                foreach ($fotosDb as $foto) {
                	$fotos[] = array("titulo" => $foto->titulo, "arquivo" => $foto->arquivo);
                }
                $view->tpl->fotos = json_encode($fotos);
                        
                $this->response->body($view);
        }
        
        public function action_salvar() {
                unset($_POST["id"]);
                
                $this->obj->values($_POST);
                
                $phpdate = DateTime::createFromFormat ( "d/m/Y" , $this->obj->data );
				$mysqldate = $phpdate->format("Y-m-d");
                $this->obj->data = $mysqldate;
                
                $this->obj->save();
                
                @Utils::generateScaled($this->obj->marca, "evento", $this->obj->id_evento, 302, 132);
                
                DB::delete("evento_foto")->where("id_evento", "=", $this->obj->id_evento)->execute();
                
                if(isset($_POST["fotos_arquivo"])) {
	                foreach($_POST["fotos_arquivo"] as $k => $arquivo)
	                {
	                	$titulo = $_POST["fotos_titulo"][$k];
	                	DB::insert("evento_foto",array("id_evento","titulo","arquivo"))->values(array($this->obj->id_evento,$titulo,$arquivo))->execute();
	                	$result = DB::query(Database::SELECT, "select max(id_evento_foto) as id from evento_foto where id_evento = ".$this->obj->id_evento)->execute()->as_array();
	                	
	                	@Utils::generateScaled($arquivo, "evento_foto", $result[0]["id"], 105, 52);
	                	@Utils::generateScaled($arquivo, "evento_foto", $result[0]["id"].'_full', 940, 468);
	                }
                }
	            
                $this->request->redirect("admin/".$this->url_path);
        }
        
        public function action_deletar()
        {
                DB::delete("evento_foto")->where("id_evento", "=", $this->obj->id_evento)->execute();
                $this->obj->delete();
                
                $this->request->redirect("admin/".$this->url_path);
        
        }
}

