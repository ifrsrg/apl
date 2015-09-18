<?php
class Controller_newsletter extends ControllerAdmin {

		private $controller_name = "newsletter",
		$url_path = "newsletter",
		$model_name = "newsletter",
		$id_field = "id_newsletter",
		$titulo_pagina = "Newsletter",
		
		$column_label = array("ID","Data"),
		$column_fields = array("id_newsletter"),
		$field_set = array("id_newsletter","data","corpo");
        
        function __construct($request, $response){
                parent::__construct($request, $response);
                $this->obj = ORM::factory($this->model_name,$this->request->param("id",$this->request->post("id")));
        }
        
        public function action_listar()
        {
                $paginacao = new Paginacao("admin/".$this->url_path."/", 15, $this->obj->getCount());
                
                $rows = $this->obj->getLista(array(),$paginacao->limit,$paginacao->offset,array(array($this->id_field, "desc")));
                
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
                        $view->tpl->imagem_lista = Utils::getScaledPath($this->model_name, $row->$id_field);
                        
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
			
                
			$noticias = ORM::factory("noticia")->getLista(array());
			$eventos = ORM::factory("evento")->getLista(array());
			$usuarios = ORM::factory("usuario")->getLista(array(), false, false, array(array('nome','asc')));
			$associados = ORM::factory("associado")->getLista(array(array('contato_email',"!=",""),array('contato',"!=","")), false, false, array(array('contato','asc')));
			$fornecedores = ORM::factory("fornecedor")->getLista(array(array('contato_email',"!=",""),array('contato',"!=","")), false, false, array(array('contato','asc')));
			$emails = ORM::factory("email")->getLista(array(),false,false, array(array("email_categoria.nome","asc"),array("email.nome","asc")));
                
			$index = 0;
			foreach($noticias as $noticia) {
                $view->tpl->noticia_id = $noticia->id_noticia;
                $view->tpl->noticia_titulo = $noticia->titulo;
                $view->tpl->noticia_texto = $noticia->texto_lista;
                $view->tpl->noticia_imagem = Utils::getScaledPath("noticia", $noticia->id_noticia);
				
                if($index < 3) {
                	$view->tpl->noticia_atributos = "checked='checked'";
                } else {
                	$view->tpl->noticia_atributos = "";
                }
                
				$view->tpl->parseBlock("NOTICIA");
				$index++;
			}
			
        	$index = 0;
			foreach($eventos as $evento) {
				
                $view->tpl->evento_id = $evento->id_evento;
                $view->tpl->evento_nome = $evento->nome;
                $view->tpl->evento_texto = $evento->texto_lista;
                $view->tpl->evento_imagem = Utils::getScaledPath("evento", $evento->id_evento);
				
                if($index < 3) {
                	$view->tpl->evento_atributos = "checked='checked'";
                } else {
                	$view->tpl->evento_atributos = "";
                }
				
				$view->tpl->parseBlock("EVENTO");
				$index++;
			}
			
			foreach($usuarios as $usuario) {
                $view->tpl->usuario_id = $usuario->id_usuario;
                $view->tpl->usuario_nome = $usuario->nome;
                $view->tpl->usuario_email = $usuario->email;
				
                $view->tpl->usuario_atributos = "checked='checked'";
                
				$view->tpl->parseBlock("USUARIO");
			}
			foreach($associados as $associado) {
                $view->tpl->associado_id = $associado->id_associado;
                $view->tpl->associado_nome = $associado->contato;
                $view->tpl->associado_email = $associado->contato_email;
				
                $view->tpl->associado_atributos = "checked='checked'";
                
				$view->tpl->parseBlock("ASSOCIADOS");
			}
			foreach($fornecedores as $fornecedor) {
                $view->tpl->fornecedor_id = $fornecedor->id_fornecedor;
                $view->tpl->fornecedor_nome = $fornecedor->contato;
                $view->tpl->fornecedor_email = $fornecedor->contato_email;
				
                $view->tpl->fornecedor_atributos = "checked='checked'";
                
				$view->tpl->parseBlock("FORNECEDORES");
			}
			
			$last = false;
			foreach($emails as $email) {
				$view->tpl->email_id = $email->id_email;
				$view->tpl->email_nome = $email->nome;
				$view->tpl->email_email = $email->email;
                $view->tpl->email_atributos = "checked='checked'";
				
				$view->tpl->parseBlock("EMAIL");
				if($last != $email->nome_categoria) {
					$view->tpl->nome_categoria = $email->nome_categoria;
					$view->tpl->parseBlock("EMAIL_HOLDERS");
					$last = $email->nome_categoria;
				}
			}
                
			$this->response->body($view);
        }
        
        public function action_visualizar() {
        	$data = explode("data=", $_SERVER["REQUEST_URI"], 2);
        	$data = $data[1];
        	$data = json_decode(base64_decode($data));
			$view = ViewTemplateAdmin::factory($this->controller_name."/news",$this->usuario);
			$view->tpl->server_path = path::normalize(URL::base());
        	
			$index = 0;
			foreach ($data->noticia as $idnoticia) {
				$noticia = ORM::factory("noticia", $idnoticia);
				$view->tpl->noticia_id = $noticia->id_noticia;
				$view->tpl->noticia_titulo = $noticia->titulo;
				$view->tpl->noticia_texto = $noticia->texto_lista;
				$view->tpl->noticia_img = Utils::getScaledPath("noticia", $noticia->id_noticia);
                        
                $phpdate = strtotime( $noticia->data );
				$mysqldate = date( 'd.m.Y', $phpdate );
                        
				$view->tpl->noticia_data = $mysqldate;
				
				if($index != count($data->noticia)-1)
					$view->tpl->parseBlock("NOTICIA_BREAK");
				$index++;
				
				$view->tpl->parseBlock("NOTICIA");
			}
        	
			$index = 0;
			foreach ($data->evento as $idevento) {
				$evento = ORM::factory("evento", $idevento);
				$view->tpl->evento_id = $evento->id_evento;
				$view->tpl->evento_titulo = $evento->nome;
				$view->tpl->evento_texto = $evento->texto_lista;
				$view->tpl->evento_img = Utils::getScaledPath("evento", $evento->id_evento);
                        
                $phpdate = strtotime( $evento->data );
				$mysqldate = date( 'd.m.Y', $phpdate );
                        
				$view->tpl->evento_data = $mysqldate;
				
				if($index != count($data->evento)-1)
					$view->tpl->parseBlock("EVENTO_BREAK");
				$index++;
				
				$view->tpl->parseBlock("EVENTO");
			}
        	
			echo $view->tpl->getContent();
        }
        
        public function action_editar() {

        	$view = ViewTemplateAdmin::factory($this->controller_name."/visualizar",$this->usuario);
			$view->tpl->titulo_pagina = $this->titulo_pagina;
			$view->tpl->url_path = $this->url_path;
                
        	$view->tpl->corpo = base64_encode($this->obj->corpo);
        	
        	$envios = ORM::factory("envio")->getLista(array(array("id_newsletter",'=',$this->obj->id_newsletter)));
			
			foreach($envios as $envio) {
                $view->tpl->usuario_nome = $envio->nome;
                $view->tpl->usuario_email = $envio->email;
                $view->tpl->sucesso = $envio->sucesso? "Sim" : "Não";
				
                $view->tpl->usuario_atributos = "checked='checked'";
                
				$view->tpl->parseBlock("ENVIO");
			}
                
			$this->response->body($view);
        }
        
        public function action_salvar() {
                
        		
			$view = ViewTemplateAdmin::factory($this->controller_name."/news",$this->usuario);
			$view->tpl->server_path = 'http://'.path::normalize($_SERVER['HTTP_HOST'].'/'.live());
                
			$data = new stdClass();
			$data->noticia = $_POST["noticias"];
			$data->evento = $_POST["eventos"];
			
			$index = 0;
			foreach ($data->noticia as $idnoticia) {
				$noticia = ORM::factory("noticia", $idnoticia);
				$view->tpl->noticia_id = $noticia->id_noticia;
				$view->tpl->noticia_titulo = $noticia->titulo;
				$view->tpl->noticia_texto = $noticia->texto_lista;
				$view->tpl->noticia_img = Utils::getScaledPath("noticia", $noticia->id_noticia);
                        
                $phpdate = strtotime( $noticia->data );
				$mysqldate = date( 'd.m.Y', $phpdate );
                        
				$view->tpl->noticia_data = $mysqldate;
				
				if($index != count($data->noticia)-1)
					$view->tpl->parseBlock("NOTICIA_BREAK");
				$index++;
				
				$view->tpl->parseBlock("NOTICIA");
			}
        	
			$index = 0;
			foreach ($data->evento as $idevento) {
				$evento = ORM::factory("evento", $idevento);
				$view->tpl->evento_id = $evento->id_evento;
				$view->tpl->evento_titulo = $evento->nome;
				$view->tpl->evento_texto = $evento->texto_lista;
				$view->tpl->evento_img = Utils::getScaledPath("evento", $evento->id_evento);
                        
                $phpdate = strtotime( $evento->data );
				$mysqldate = date( 'd.m.Y', $phpdate );
                        
				$view->tpl->evento_data = $mysqldate;
				
				if($index != count($data->evento)-1)
					$view->tpl->parseBlock("EVENTO_BREAK");
				$index++;
				
				$view->tpl->parseBlock("EVENTO");
			}
			
			$html = $view->tpl->getContent();
            
			$news = ORM::factory("newsletter");
            $news->corpo = $html;
            $news->data = date("Y-m-d");
            $data_agora =  date('d/m/Y');
            $news->save();
                
            $index = 0;
            
            if(isset($_POST["usuarios"]))
	            foreach($_POST["usuarios"] as $id_usuario) {
					$usuario = ORM::factory("usuario", $id_usuario);
					
					$envio = ORM::factory("envio");
					$envio->nome = $usuario->nome;
					$envio->email = $usuario->email;
					$envio->id_newsletter = $news->id_newsletter;
					$envio->sucesso = 0;
					
					$envio->save();
	            }
            if(isset($_POST["associados"]))
	            foreach($_POST["associados"] as $id_associado) {
					$associado = ORM::factory("associados", $id_associado);
					
					$envio = ORM::factory("envio");
					$envio->nome = $associado->contato;
					$envio->email = $associado->contato_email;
					$envio->id_newsletter = $news->id_newsletter;
					$envio->sucesso = 0;
					
					$envio->save();
	            }
            if(isset($_POST["fornecedores"]))
	            foreach($_POST["fornecedores"] as $id_fornecedor) {
					$fornecedor = ORM::factory("fornecedor", $id_fornecedor);
					
					$envio = ORM::factory("envio");
					$envio->nome = $fornecedor->contato;
					$envio->email = $fornecedor->contato_email;
					$envio->id_newsletter = $news->id_newsletter;
					$envio->sucesso = 0;
					
					$envio->save();
	            }
            
            if(isset($_POST["emails"]))
	            foreach ($_POST["emails"] as $id_email) {
					$email = ORM::factory("email", $id_email);
					
					$envio = ORM::factory("envio");
					$envio->nome = $email->nome;
					$envio->email = $email->email;
					$envio->id_newsletter = $news->id_newsletter;
					$envio->sucesso = 0;
					
					$envio->save();
	            }
            
            echo $news->id_newsletter;
        }
        
        public function action_enviarnews() {
        	$id_news = $_POST["id_newsletter"];
        	$newsletter = ORM::factory("newsletter",$id_news);
        	
        	$phpdate = strtotime( $newsletter->data );
			$mysqldate = date( 'd/m/Y', $phpdate );
        	
			$envios = ORM::factory("envio")->getLista(array(array('id_newsletter','=',$id_news),array('sucesso','=','0')),1);
			$envio = $envios[0];
			
	        $email_sender = new Email($newsletter->corpo, "Newsletter - APL do Polo Naval - ".$mysqldate);
			$email_sender->addDestinatario($envio->email);
						
			if ($email_sender->smtpSend()) {
				$envio->sucesso = 1;
			} else {
				$envio->sucesso = 0;
			}
			
			$envio->save();
			
			echo ORM::factory("envio")->getCount(array(array('sucesso','=','1'),array('id_newsletter','=',$id_news)));
        }
        
        public function action_deletar()
        {
                $this->obj->delete();
                $this->request->redirect("admin/".$this->url_path);
        }
}

