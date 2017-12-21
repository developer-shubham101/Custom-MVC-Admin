<?php
class Questions_Model extends Model {
	public function __construct() {
		parent::__construct ();
	}
	function getAnswersList($queId) {
		
		if (! empty ( $id )) {
			if (Help::isUserLogedin()) {
				$this->db->where ( "id = " . $id );
				return $this->db->getOne ( Help::EVENTS_TABLE );
			}else if(Help::isAdminLogedin()){
				$this->db->where ( "id = " . $id );
			}
			
		} else {
			return array ();
		}
	}
	function updateEvent($id, $data) {
		$image_data = serialize ( $data ["images"] );
		
		$data = Array (
				"name" => parent::getValue ( $data, "eventname" ),
				"location" => parent::getValue ( $data, "location" ),
				"date" => parent::getValue ( $data, "eventdate" ),
				"category" => parent::getValue ( $data, "eventcategory" ),
				"description" => parent::getValue ( $data, "eventdesc" ),
				"images" => $image_data 
		);
		if ($this->db != null) {
			$this->db->where ( "id = $id" );
			
			if ($this->db->update ( Help::EVENTS_TABLE, $data )) {
				$output = array (
						"error" => 0,
						"msg" => "Event updated",
						"eventid" => $id 
				);
			} else {
				$output = array (
						"error" => 1,
						"msg" => "Error to updating Event.." 
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
	function inseartQuestions($data) {
		$data = Array (
				"question" => parent::getValue ( $data, "question" ),				 
				"admin_id" => Help::getAdminId()				
		);
		if ($this->db != null) {
			$id = $this->db->insert ( Help::QUESTIONS_TABLE, $data );
		}
		
		if ($id) {
			$output = array (
					"error" => 0,
					"msg" => "Question posted",
					"redect" => URL ."questions"
			);
		} else {
			$output = array (
					"error" => 1,
					"msg" => "Error to making Question.." 
			);
		}
		return $output;
		// echo json_encode ( $output );
		// echo 'user was created. Id=' . $id;
	}
	function getSingleEvent($id) {
		if (! empty ( $id )) {
			$this->db->where ( "id = " . $id );
			return $this->db->getOne ( Help::EVENTS_TABLE );
		} else {
			return array ();
		}
	}
}