<?php

class Model_Texto_Sistema extends ORM {
	
	function getLista($where = array(), $limit = null, $offset = null){
		
		foreach($where as $condition)
			$this->where($condition[0], $condition[1], $condition[2]);
		
		if($limit != null)
			$this->limit($limit);
		
		if($offset != null)
			$this->offset($offset);
		
		return $this->find_all()->as_array();
	}
	
	function get($chave) {
		
		$this->where("chave", "=", $chave);
		$this->limit(1);
		$res = $this->find_all()->as_array();
		return count($res)?$res[0]->texto:"";
	}
	
	function getCount($where = array()){
		foreach($where as $condition)
			$this->where($condition[0], $condition[1], $condition[2]);
		
		return $this->count_all();
	}
}