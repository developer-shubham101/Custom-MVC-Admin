<?php
class Model {
	protected $db = null;

	protected $firebase = NULL;
	protected $push = NULL;
	protected $push_type = "topic";
	function getDB() {
		return $this->db;
	}
	function __construct() {
		$this->db = new Database ();
		$this->firebase = new Firebase ();
		$this->push = new Push ();
		
		// optional payload
		$payload = array ();
		$payload ['team'] = 'India';
		$payload ['score'] = '5.6';
		
		$this->push->setPayload ( $payload );
		$this->push->setImage ( '' );
		$this->push->setIsBackground ( FALSE );	
	}	
	function setMessage($title, $message) {
		$this->push->setTitle ( $title );
		$this->push->setMessage ( $message );
	}
	function sendMessage() {
		if ($this->push_type == 'topic') {
			$json = $this->push->getPush ();
			$response = $this->firebase->sendToTopic ( 'global', $json );
		} else if ($this->push_type == 'individual') {
			// $json = $push->getPush();
			// $regId = isset($_GET['regId']) ? $_GET['regId'] : '';
			// $response = $firebase->send($regId, $json);
		}
	}
	function deleteRow($data, $table) {
		$this->db->where ( "id", JSONHelp::getValue ( $data, "id", 0 ) );
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
		echo json_encode ( $output );
	}
	public static function getValue($array, $key, $default = "") {
		return (isset ( $array [$key] )) ? $array [$key] : $default;
	}
	function convertFileArray($files) {
		$new_array = array ();
		$length = count ( $files ['name'] );
		$keyes_array = array_keys ( $files );
		for($i = 0; $i < $length; $i ++) {
			$tmpaa = array ();
			foreach ( $keyes_array as $key => $value ) {
				$tmpaa [$value] = $files [$value] [$i];
			}
			array_push ( $new_array, $tmpaa );
		}
		return $new_array;
	}
	function inseartEvent($data) {
		$image_data = serialize ( $data ["images"] );
		
		$data = Array (
				"name" => JSONHelp::getValue ( $data, "eventname" ),
				"location" => JSONHelp::getValue ( $data, "location" ),
				"images" => $image_data 
		);
		if ($this->db != null) {
			$id = $this->db->insert ( "events", $data );
		}
		
		if ($id) {
			$output = array (
					"error" => 0,
					"msg" => "Event created",
					"eventid" => $id 
			);
		} else {
			$output = array (
					"error" => 1,
					"msg" => "Error to creating Event.." 
			);
		}
		echo json_encode ( $output );
		// echo 'user was created. Id=' . $id;
	}
}