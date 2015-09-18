<?php defined("SYSPATH") or die("No direct script access.");

class Controller_Ajax extends ControllerAdmin {

	public function action_cidade()
	{
		$id = $this->request->post('id_estado');
		
		exit(listaCidades($id));
	}
        
        public function action_categoria()
	{
		$sub = ORM::factory('categoria');
		$html = '<option value="">Selecione</option>';
		foreach($sub->where('id_segmento', '=', $this->request->post('id_segmento'))->find_all()->as_array('id_categoria', 'categoria') as $id => $categoria)
			$html .= '<option value="'.$id.'">'.$categoria.'</option>';
		exit($html);
	}
	
	public function action_subcategoria()
	{
		$sub = ORM::factory('subcategoria');
		$html = '<option value="">Selecione</option>';
		foreach($sub->where('id_categoria', '=', $this->request->post('id_categoria'))->find_all()->as_array('id_subcategoria', 'subcategoria') as $id => $subcategoria)
			$html .= '<option value="'.$id.'">'.$subcategoria.'</option>';
		exit($html);
	}
        
        public function action_marca()
	{
		$sub = ORM::factory('veiculo_marca');
		$html = '<option value="">Selecione</option>';
		foreach($sub->where('id_veiculo_tipo', '=', $this->request->post('id_veiculo_tipo'))->find_all()->as_array('id_veiculo_marca', 'veiculo_marca') as $id => $marca)
			$html .= '<option value="'.$id.'">'.$marca.'</option>';
		exit($html);
	}

}
