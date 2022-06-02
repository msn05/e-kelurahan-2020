<?php
// $db->transaction();
$show = function ($table,$selected) use (&$db){

	try {
		if(!empty($selected)){
			$data = $db->table($table)->select($selected)->getAll();;
		}else{
			$data = $db->table($table)->getAll();;
		}

	} catch (PDOException $e) {

		// return $e->getMessage();
		return null;

	}

	return $data;
};


$filter_data = function ($table, $where_data) use (&$db){

	try {

		$data = $db->table($table)->where($where_data)->get();

	} catch (PDOException $e) {

		// return $e->getMessage();
		return null;

	}

	return $data;
};

$filter_data_all = function ($table, $where_data,$selected) use (&$db){

	try {
		// var_dump($selected);
		if(!empty($selected)){
			$data = $db->table($table)->where($where_data)->orderBy($selected)->getAll();
		}else{
			$data = $db->table($table)->where($where_data)->getAll();
		}
	} catch (PDOException $e) {

		// return $e->getMessage();
		return null;

	}

	return $data;
};



$joinData = function ($table, $where_data,$where_status,$id) use (&$db){
	// var_dump($where_status);die();
	try {

		$data = $db->table($table)->where($where_data)
		->notIn($id,$where_status)
		->getAll();

	} catch (PDOException $e) {

		// return $e->getMessage();
		return null;

	}

	return $data;
};


$join = function ($table,$primaryKey,$selected,$id) use (&$db){
	try {
		if(empty($selected)){
			$data = $db->table($table[0])
			// ->select([$selected[0],$selected[1],$selected[2]])
			->join($table[1],$table[0].'.'.$primaryKey[1],$table[1].'.'.$primaryKey[2])
			->where($id)
			->getAll();
		}else{
			$data = $db->table($table[0])
			->select([$selected[0],$selected[1],$selected[2]])
			->join($table[1],$table[0].'.'.$primaryKey[1],$table[1].'.'.$primaryKey[2])
			->getAll();
		}
		if(!empty($id)){
			$data = $db->table($table[0])
			->select([$selected[0],$selected[1],$selected[2]])
			->join($table[1],$table[0].'.'.$primaryKey[1],$table[1].'.'.$primaryKey[2])
			->where($id)
			->getAll();
		}

	} catch (PDOException $e) {

		// return $e->getMessage();
		return null;

	}

	return $data;
};


$joinSix = function ($table,$primaryKey,$selected,$id) use (&$db){
	try {
		// var_dump($id);die();
		if(!empty($id)){
			$data = $db->table($table[0])
			->select([$selected[0],$selected[2],$selected[3],$selected[4],$selected[5],$selected[6]])
			->join($table[1],$table[0].'.'.$primaryKey[1],$table[1].'.'.$primaryKey[2])
			->join($table[2],$table[1].'.'.$primaryKey[3],$table[2].'.'.$primaryKey[4])
			->join($table[3],$table[1].'.'.$primaryKey[5],$table[3].'.'.$primaryKey[6])
			->join($table[4],$table[1].'.'.$primaryKey[7],$table[4].'.'.$primaryKey[8])
			->join($table[5],$table[1].'.'.$primaryKey[10],$table[5].'.'.$primaryKey[9])
			->where($id)
			->get();
		}else{
			$data = $db->table($table[0])
			->select([$selected[0],$selected[2],$selected[3],$selected[4],$selected[5],$selected[6]])
			->join($table[1],$table[0].'.'.$primaryKey[1],$table[1].'.'.$primaryKey[2])
			->join($table[2],$table[1].'.'.$primaryKey[3],$table[2].'.'.$primaryKey[4])
			->join($table[3],$table[1].'.'.$primaryKey[5],$table[3].'.'.$primaryKey[6])
			->join($table[4],$table[1].'.'.$primaryKey[7],$table[4].'.'.$primaryKey[8])
			->join($table[5],$table[1].'.'.$primaryKey[10],$table[5].'.'.$primaryKey[9])
			->getAll();
		}
	} catch (PDOException $e) {

		// return $e->getMessage();
		return null;

	}

	return $data;
};


$joinFive = function ($table,$primaryKey,$id,$selected) use (&$db){
	try {
		// var_dump($id);die();
		if(!empty($id)){

			$data = $db->table($table[0])
			// ->select([$selected[0],$selected[1],$selected[2],$selected[3]])
			->join($table[1],$table[0].'.'.$primaryKey[0],$table[1].'.'.$primaryKey[1])
			->join($table[2],$table[0].'.'.$primaryKey[2],$table[2].'.'.$primaryKey[3])
			->join($table[3],$table[0].'.'.$primaryKey[4],$table[3].'.'.$primaryKey[5])
			->join($table[4],$table[0].'.'.$primaryKey[7],$table[4].'.'.$primaryKey[6])
			->where($id)
			->get();
		}else{
			$data = $db->table($table[0])
			->select([$selected[0],$selected[1],$selected[2],$selected[3],$selected[4]])
			->join($table[1],$table[0].'.'.$primaryKey[0],$table[1].'.'.$primaryKey[1])
			->join($table[2],$table[0].'.'.$primaryKey[2],$table[2].'.'.$primaryKey[3])
			->join($table[3],$table[0].'.'.$primaryKey[4],$table[3].'.'.$primaryKey[5])
			->join($table[4],$table[0].'.'.$primaryKey[7],$table[4].'.'.$primaryKey[6])
			->getAll();
		}

	} catch (PDOException $e) {

		// return $e->getMessage();
		return null;

	}

	return $data;
};



$join_request = function ($table,$primaryKey,$selected,$id) use (&$db){

	try {
		if(empty($id)){
			return null;
		}
		$data = $db->table($table[0])
		->select([$selected[0],$selected[1],$selected[2]])
		->join($table[1],$table[0].'.'.$primaryKey[1],$table[1].'.'.$primaryKey[2])
		->where($table[1].'.'.$selected[2],$id)
		->orWhere($table[0].'.'.$selected[0],$id)
		->getAll();

	} catch (PDOException $e) {
		// return $e->getMessage();
		return null;
	}

	return $data;
};

$show_by_id = function ($table, $where_field, $id, $selected ) use (&$db){
	// var_dump($selected);
	try {
		if(!empty($selected)){
			$data = $db->table($table)->select($selected)->where($where_field, $id)->get();
		}else{
			$data = $db->table($table)->where($where_field, $id)->get();

		}


	} catch (PDOException $e) {

		// return $e->getMessage();
		return null;

	}

	return $data;
};


$insert = function ($table, $data) use (&$db){

	try {
		$db->transaction($db->table($table)->insert($data));
		$id = $db->insertId();
		// var_dump($id);die();

		$db->commit();

	} catch (PDOException $e) {

		$db->rollBack();
		// return $e->getMessage();
		return null;

	}

	return (object)[
		'id'   => $id,
		'data' => $data
	];
};

$update = function ($table, $where_field, $id, $data) use (&$db){
	try {
		$result = $db->table($table)->where($where_field, $id)->get();

		if (empty($result)) {
			return null;
		}

		$db->transaction($db->table($table)->where($where_field, $id)->update($data));

		$db->commit();

		$result = $db->table($table)->where($where_field, $id)->get();

	} catch (PDOException $e) {

		$db->rollBack();
		// return $e->getMessage();
		return null;

	}

	return (object)[
		'id'   => $id,
		'data' => $result,
	];
};


$delete = function ($table, $where_field, $id) use (&$db){
	try {

		$result = $db->table($table)->where($where_field, $id)->get();

		if (empty($result)) {
			return null;
		}

		$db->table($table)->where($where_field, $id)->delete();

		$db->commit();

	} catch (PDOException $e) {

		$db->rollBack();
		// return $e->getMessage();
		return null;

	}

	return (object)[
		'id'   => $id,
		'data' => null,
	];
};