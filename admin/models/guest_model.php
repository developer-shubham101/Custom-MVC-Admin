<?php
class Guest_Model extends Model {
	public function __construct() {
		parent::__construct ();
	}
	function updateGallery($id, $data) {
		$youtube_id = "";
		if (parent::getValue ( $data, "type" ) == "v") {
			$url = parent::getValue ( $data, "image" );
			parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
			$youtube_id = $my_array_of_vars['v'];
		}

			
		$new_data = Array (
				"image" => parent::getValue ( $data, "image" ),
				"discription" => parent::getValue ( $data, "discription" ),
				"type" => parent::getValue ( $data, "type" ), 
				"youtube_id" => $youtube_id
		);
		if ($this->db != null) {
			$this->db->where ( "id = $id" );
			
			if ($this->db->update ( Help::GALLERY_TABLE, $new_data )) {
				$output = array (
						"error" => 0,
						"msg" => "Image updated",
						"updated" => 1 
				);
			} else {
				$output = array (
						"error" => 1,
						"msg" => "Error to updating gallery.." 
				);
			}
		} else {
			$output = array (
					"error" => 1,
					"msg" => "database error.." 
			);
		}
		
		return $output;
		// echo json_encode ( $output );
		// echo 'user was created. Id=' . $id;
	}
	function inseartGuest($data) {		 
		$title = parent::getValue ( $data, "title" );
		$link = parent::getValue ( $data, "link" );
		$data = Array (
				"title" => $title,
				"description" => parent::getValue ( $data, "discription" ),
				"link" => $link		 
		);
		if ($this->db != null) {
			$id = $this->db->insert ( Help::GUEST_TABLE, $data );
			if ($id) {
				$output = array (
						"error" => 0,
						"msg" => "Guest created",						 
						"id" => $id
				);

				$this->setMessage ( $title, json_encode ( new NotificationObject ( parent::getValue ( $data, "link" ), "guest", $title  ) )  );
				$this->sendMessage ();

			} else {
				$output = array (
						"error" => 1,
						"msg" => "Error to creating Guest.." 
				);
			}
		} else {
			$output = array (
					"error" => 1,
					"msg" => "database error.." 
			);
		}
		
		return $output;
		// echo json_encode ( $output );
		// echo 'user was created. Id=' . $id;
	}
	
	function getSingleGallery($id) {
		if (! empty ( $id )) {
			$this->db->where ( "id = " . $id );
			return $this->db->getOne ( Help::GALLERY_TABLE );
		} else {
			return array ();
		}
	}
	
}