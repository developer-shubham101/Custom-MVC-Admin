<?php
class Events_Model extends Model {
	public function __construct() {
		parent::__construct ();
	}
	function updateEvent($id, $data) {
		$image_data = serialize ( $data ["images"] );
		
		$data = Array (
				"name" => parent::getValue ( $data, "eventname" ),
				"location" => parent::getValue ( $data, "location" ),
				"date" => parent::getValue ( $data, "eventdate" ),
				"category" => parent::getValue ( $data, "eventcategory" ),
				"description" => parent::getValue ( $data, "eventdesc" ),
				"images" => $image_data,
				"readmore" => parent::getValue ( $data, "readmore" ),
				"status" => parent::getValue ( $data, "status" )
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
	function inseartEvent($data) {
		$image_data = serialize ( $data ["images"] );
		$eventName = parent::getValue ( $data, "eventname" );
		$data = Array (
				"name" => $eventName,
				"location" => parent::getValue ( $data, "location" ),
				"date" => parent::getValue ( $data, "eventdate" ),
				"category" => parent::getValue ( $data, "eventcategory" ),
				"description" => parent::getValue ( $data, "eventdesc" ),
				"images" => $image_data,
				"readmore" => parent::getValue ( $data, "readmore" ), 
				"create_date" => date('Y-m-d'),
				"status" => parent::getValue ( $data, "status" )
		);
		if ($this->db != null) {
			$id = $this->db->insert ( Help::EVENTS_TABLE, $data );
		}
		
		if ($id) {
			$output = array (
					"error" => 0,
					"msg" => "Event created",
					"eventid" => $id 
			);
			$this->setMessage ( $eventName , json_encode ( new NotificationObject ( $id, "event", $eventName  ) )  );
			$this->sendMessage ();
		} else {
			$output = array (
					"error" => 1,
					"msg" => "Error to creating Event.." 
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