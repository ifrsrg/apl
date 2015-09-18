<?php

class Model_Newsletter extends ORM {
	
	function getLista($where = array(), $limit = null, $offset = null, $order_by = array()){
		
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