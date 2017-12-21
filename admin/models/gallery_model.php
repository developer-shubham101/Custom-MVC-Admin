<?php
class Gallery_Model extends Model {
	public function __construct() {
		parent::__construct ();
	}
	function updateGallery($id, $data) {
		$youtube_id = "";
		if (parent::getValue ( $data, "type" ) == "v") {
			$url = parent::getValue ( $data, "image" );
			parse_str ( parse_url ( $url, PHP_URL_QUERY ), $my_array_of_vars );
			$youtube_id = $my_array_of_vars ['v'];
			if ($youtube_id == null) {
				$output = array (
					"error" => 1,
					"msg" => "Please enter youtube url.."
					);
				return $output;
			}
		}

		$new_data = Array (
			"image" => parent::getValue ( $data, "image" ),
			"discription" => parent::getValue ( $data, "discription" ),
			"type" => parent::getValue ( $data, "type" ),
			"youtube_id" => $youtube_id ,
			"status" => parent::getValue ( $data, "status" )
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

	function inseartGallery($data) {
		 
		$cat = parent::getValue ( $data, "cat" );
		$data = Array (
			"links" => parent::getValue ( $data, "image" ),
			"cat" => $cat,
			"status" => parent::getValue ( $data, "status" ),
			"user_id" => Help::getUserId()
			);

		if ($this->db != null) {
			$id = $this->db->insert ( Help::TABLE_GALLERY, $data );
			if ($id) {
				$output = array (
					"error" => 0,
					"msg" => "Gallery created",					 
					"imageurl" => parent::getValue ( $data, "links" ),
					"id" => $id
					);
				/*$discription = (empty ( $discription ) || $discription == "") ? "Gallery" : $discription;
				if (parent::getValue ( $data, "type" ) == "v") {
					$this->setMessage ( $discription, json_encode ( new NotificationObject ( $youtube_id, "video", $discription ) ) );
				} else {
					$this->setMessage ( $discription, json_encode ( new NotificationObject ( parent::getValue ( $data, "image" ), "image", $discription ) ) );
				}
				$this->sendMessage ();*/
			} else {
				$output = array (
					"error" => 1, 
					"msg" => "Error to insert image.."
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
	/*function inseartGallery($data) {
		$youtube_id = "";

		if (parent::getValue ( $data, "type" ) == "v") {
			$url = parent::getValue ( $data, "image" );
			parse_str ( parse_url ( $url, PHP_URL_QUERY ), $my_array_of_vars );
			$youtube_id = $my_array_of_vars ['v'];
			if ($youtube_id == null) {
				$output = array (
					"error" => 1,
					"msg" => "Please enter youtube url.."
					);
				return $output;
			}
		}
		$discription = parent::getValue ( $data, "discription" );
		$data = Array (
			"image" => parent::getValue ( $data, "image" ),
			"discription" => $discription,
			"type" => parent::getValue ( $data, "type" ),
			"create_date" => date ( 'Y-m-d' ),
			"youtube_id" => $youtube_id ,
			"status" => parent::getValue ( $data, "status" )
			);

		if ($this->db != null) {
			$id = $this->db->insert ( Help::GALLERY_TABLE, $data );
			if ($id) {
				$output = array (
					"error" => 0,
					"msg" => "Gallery created",
					"type" => parent::getValue ( $data, "type" ),
					"imageurl" => parent::getValue ( $data, "image" ),
					"youtube_id" => $youtube_id,
					"id" => $id
					);
				$discription = (empty ( $discription ) || $discription == "") ? "Gallery" : $discription;
				if (parent::getValue ( $data, "type" ) == "v") {
					$this->setMessage ( $discription, json_encode ( new NotificationObject ( $youtube_id, "video", $discription ) ) );
				} else {
					$this->setMessage ( $discription, json_encode ( new NotificationObject ( parent::getValue ( $data, "image" ), "image", $discription ) ) );
				}
				$this->sendMessage ();
			} else {
				$output = array (
					"error" => 1,
					"youtube_id" => $youtube_id,
					"msg" => "Error to insert image.."
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
	}*/
	function getSingleGallery($id) {
		if (! empty ( $id )) {
			$this->db->where ( "id = " . $id );
			return $this->db->getOne ( Help::TABLE_GALLERY );
		} else {
			return array ();
		}
	}
	function moveTo($data, $status) { 
		$new_data = Array (
			"status" => $status
			);
		$this->db->where ( "id",$data,"IN" );

		if ($this->db->update ( Help::TABLE_GALLERY, $new_data )) {
			$output = array (
				"error" => 0,
				"msg" => "Image updated",
				"updated" => 1
				);
		}else {
			$output = array (
				"error" => 1,
				"msg" => "Error to updating gallery.."
				);
		}
		return $output;

	} 

	function remove($data, $status) { 
		
		$this->db->where ( "id",$data,"IN" );

		if ($this->db->delete ( Help::TABLE_GALLERY )) {
			$output = array (
				"error" => 0,
				"msg" => "Image updated",
				"updated" => 1
				);
		}else {
			$output = array (
				"error" => 1,
				"msg" => "Error to updating gallery.."
				);
		}
		return $output;

	} 
}