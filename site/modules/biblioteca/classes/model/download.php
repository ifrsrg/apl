<?php

class Model_Download extends ORM {
	
	function getLista($where = array(), $limit = null, $offset = null){
		$this->select(array("download_categoria.nome","categoria_nome"),
						array("download_categoria.restricao","categoria_restricao"),
						array("download_categoria.icone","categoria_icone"));
		$this->join("download_categoria","inner")->on("download.id_download_categoria","=","download_categoria.id_download_categoria");
		
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
}