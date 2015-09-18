<?php

class Model_Email extends ORM {
	
	function getLista($where = array(), $limit = null, $offset = null, $order_by = array()){
		$this->select("email.id_email",
						"email.nome",
						"email.email",
						"email.id_email_categoria",
						array("email_categoria.nome","nome_categoria"));
		$this->join("email_categoria","inner")->on('email.id_email_categoria','=','email_categoria.id_email_categoria');
		
		foreach($where as $condition)
			$this->where($condition[0], $condition[1], $condition[2]);
		
		if($limit != null)
			$this->limit($limit);
		
		if($offset != null)
			$this->offset($offset);
		
		foreach($order_by as $order)
			$this->order_by($order[0], $order[1]);
		
		return $this->find_all()->as_array();
	}
	
	function getCount($where = array()){
		foreach($where as $condition)
			$this->where($condition[0], $condition[1], $condition[2]);
		
		return $this->count_all();
	}
}