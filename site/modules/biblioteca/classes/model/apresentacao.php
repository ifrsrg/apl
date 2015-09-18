<?php

class Model_Apresentacao extends ORM {
	
	function getLista($where = array(), $limit = null, $offset = null){
		
		foreach($where as $condition)
			$this->where($condition[0], $condition[1], $condition[2]);
		
		if($limit != null)
			$this->limit($limit);
		
		if($offset != null)
			$this->offset($offset);
		
		return $this->find_all()->as_array();
	}
	
	function getCount($where = array()){
		foreach($where as $condition)
			$this->where($condition[0], $condition[1], $condition[2]);
		
		return $this->count_all();
	}
	
	function unsetDestaques($id) {
		foreach($this->getLista(array(array("destaque","=","1"),array("id_apresentacao","<>",$id))) as $destacado) {
			$destacado->destaque = 0;
			$destacado->save();	
		}		
	}
}