<?php
class Action_model extends Model {
	public function __construct() {
		parent::__construct ();
	}
	function deleteRow($data, $table) {
		$this->db->where ( "id", parent::getValue ( $data, "id", 0 ) );
		if ($this->db->delete ( $table )) {
			$output = array (
					"error" => 0,
					"msg" => "Delted" 
			);
		} else {
			$output = array (
					"error" => 1,
					"msg" => "Error Delete" 
			);
		}
		return $output;
// 		echo json_encode ( $output );
	}
}