<?php
class President_Model extends Model {
	public function __construct() {
		parent::__construct ();
	}
	function updateNews($id, $data) {
		$image_data = serialize ( $data ["images"] );
		$media_data = serialize ( $data ["media"] );
		
		$new_data = Array (
				"title" => parent::getValue ( $data, "title" ),
				"description" => parent::getValue ( $data, "description" ),
				"images" => $image_data,
				"media" => $media_data,
				"readmore" => parent::getValue ( $data, "readmore" ),
				"status" => parent::getValue ( $data, "status" )
		);
		
		if ($this->db != null) {
			$this->db->where ( 'id = ' . $id );
			
			if ($this->db->update ( Help::TABLE_PRESIDENT, $new_data )) {
				$output = array (
						"error" => 0,
						"msg" => "News updated" 
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
		// echo json_encode ( $output );
		// echo 'user was created. Id=' . $id;
	}
	function inseartNews($data) {
		$image_data = serialize ( $data ["images"] );
		$media_data = serialize ( $data ["media"] );

		$newsTitle = parent::getValue ( $data, "title" );
		
		$data = Array (
				"title" => $newsTitle,
				"description" => parent::getValue ( $data, "description" ),
				"images" => $image_data,
				"media" => $media_data,
				"readmore" => parent::getValue ( $data, "readmore" ),
				"create_date" => date('Y-m-d'),
				"status" => parent::getValue ( $data, "status" )
		);
		if ($this->db != null) {
			$id = $this->db->insert ( Help::TABLE_PRESIDENT, $data );
			if ($id) {
				$output = array (
						"error" => 0,
						"msg" => "News created",
						"eventid" => $id 
				);
				$this->setMessage ( $newsTitle , json_encode ( new NotificationObject ( $id, "news", $newsTitle  ) )  );
				$this->sendMessage ();
			} else {
				$output = array (
						"error" => 1,
						"msg" => "Error to creating News.." 
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
	function getSingleNews($id) {
		if (! empty ( $id )) {
			$this->db->where ( "id = " . $id );
			return $this->db->getOne ( Help::TABLE_PRESIDENT );
		} else {
			return array ();
		}
	}
}