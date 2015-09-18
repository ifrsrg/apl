<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dashboard extends ControllerAdmin {

	public function __construct($request, $response) {
		parent::__construct($request, $response);
	}

	public function action_index() {
                
        $this->request->redirect("admin/usuario");
        /*
		$view = ViewTemplateAdmin::factory('dashboard/listar', $this->usuario);
		$this->response->body($view);
		*/
	}
}
