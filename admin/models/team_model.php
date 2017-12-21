<?php
class Team_Model extends Model {
	public function __construct() {
		parent::__construct ();
	}
	function getStates($id) {
		if (! empty ( $id )) {
			$this->db->where ( "parent_id = " . $id );
			
			return array("data" =>$this->db->get ( Help::TABLE_WORLD_CITIES ,null ,array("id","name","state_shorname")));
		} else {
			return array ();
		}
	}
	function getCities($id) {
		if (! empty ( $id )) {
			$this->db->where ( "parent_id = " . $id );
			
			return array("data" => $this->db->get ( Help::TABLE_WORLD_CITIES ,null ,array("id","name")));
		} else {
			return array ();
		}
	}
}