<?php
class Controller_TextoSistema extends ControllerAdmin {

        
        function __construct($request, $response){
                parent::__construct($request, $response);
                $this->obj = ORM::factory("texto_sistema",$this->request->param("id",$this->request->post("id")));
        }
        
        public function action_listar()
        {
                $paginacao = new Paginacao('admin/texto-sistema/', 15, $this->obj->getCount());
                
                $rows = $this->obj->getLista(array(),$paginacao->limit,$paginacao->offset);
                
                $view = ViewTemplateAdmin::factory("texto_sistema/listar", $this->usuario);
                $view->tpl->paginacao = $paginacao;
                
                foreach ($rows as $row){
                        $view->tpl->id_texto_sistema = $row->id_texto_sistema;
                        $view->tpl->chave = $row->chave;
                        $view->tpl->parseBlock("LISTAR");
                }
                $this->response->body($view);
                
        }
        
        public function action_adicionar() {
                $view= ViewTemplateAdmin::factory("texto_sistema/form",$this->usuario);
                
                $this->response->body($view);
        }
        
        public function action_editar() {
                
                $view = ViewTemplateAdmin::factory("texto_sistema/form",$this->usuario);
                
                $view->tpl->id_texto_sistema = $this->obj->id_texto_sistema;
                $view->tpl->chave = $this->obj->chave;
                $view->tpl->texto = $this->obj->texto;
                
                $this->response->body($view);
        }
        
        public function action_salvar() {
                unset($_POST["id"]);
                
                $this->obj->values($_POST);
                $this->obj->save();
                
                $this->request->redirect("admin/texto-sistema");
        }
        
        public function action_deletar()
        {
                $this->obj->delete();
                
                $this->request->redirect("admin/texto-sistema");
        
        }
}

