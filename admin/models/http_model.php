<?php
class Http_Model extends Model {
	public function __construct() {
		parent::__construct ();
	}
	function update($id, $data) {
		$new_data = Array (
				"code" => parent::getValue ( $data, "code" ),
				"title" => parent::getValue ( $data, "title" ),
				"description" => parent::getValue ( $data, "description" ) ,
				"type" => parent::getValue ( $data, "type" ) 
				
		);
		if ($this->db != null) {
			$this->db->where ( 'id = ' . $id );
			if ($this->db->update ( Help::TABLE_HTTP_RESONSE, $new_data )) {
				$output = array (
						"error" => 0,
						"msg" => "Category updated" 
				);
			} else {
				$output = array (
						"error" => 1,
						"msg" => "Error to updating News.." 
				);
			}
		} else {
			$output = array (
					"error" => 1,
					"msg" => "database error.." 
			);
		}
		return $output;
	}
	function inseart($data) {
		if (isset ( $data ["values"] )) {
			foreach ( $data ["values"] as $key => $boxvalue ) {
				$sqlBoxarray = Array (
						"code" => parent::getValue ( $boxvalue, "code" ),
						"title" => parent::getValue ( $boxvalue, "title" ),
						"description" => parent::getValue ( $boxvalue, "description" ) ,
						"type" => parent::getValue ( $data, "type" ) 
				);
				$this->db->insert ( Help::TABLE_HTTP_RESONSE, $sqlBoxarray );
			}
			
			if ($this->db != null) {
				
				$output = array (
						"error" => 0,
						"msg" => "Category created" 
				);
			} else {
				$output = array (
						"error" => 1,
						"msg" => "database error.." 
				);
			}
		} else {
			$output = array (
					"error" => 1,
					"msg" => "Please add row.." 
			);
		}
		return $output;
	}
	function getSingle($id) {
		if (! empty ( $id )) {
			$this->db->where ( "id = " . $id );
			return $this->db->getOne ( Help::TABLE_HTTP_RESONSE );
		} else {
			return array ();
		}
	}
	function updateCol($id, $colName, $newValue) {
		$new_data = Array (
				$colName => trim($newValue) 
		);
		if ($this->db != null) {
			$this->db->where ( 'id = ' . $id );
			if ($this->db->update ( Help::TABLE_HTTP_RESONSE, $new_data )) {
				$output = array (
						"error" => 0,
						"msg" => "Category updated" 
				);
			} else {
				$output = array (
						"error" => 1,
						"msg" => "Error to updating News.." 
				);
			}
		} else {
			$output = array (
					"error" => 1,
					"msg" => "database error.." 
			);
		}
		return $output;
	}
}