<?php
class Answers_Model extends Model {
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
	function inseartAnswer($data,$files = "") {
		$dst_file_name = "";
		
		if ($files != ""){
			
 
			
			$upload_dir = BASE_PATH . "files/attachments/answers";
// 			$md_dir = parent::getValue ( $data, "qid" ) . "/" . Help::getUserId ();
			$md_dir = parent::getValue ( $data, "qid" );
			$pathname = $upload_dir . "/" . $md_dir;
				
			if (! file_exists ( $pathname )) {
				mkdir ( $pathname );
			}
			
			$md_dir = parent::getValue ( $data, "qid" ) . "/" . Help::getUserId ();
			$pathname = $upload_dir . "/" . $md_dir;
			
			if (! file_exists ( $pathname )) {
				mkdir ( $pathname );
			}
			
			$upload_file = new upload (  parent::getValue ( $files, "files" ) );
				
			if ($upload_file->uploaded) {
				$upload_file->file_new_name_body = "attachment";
			
				 
// 				$upload_file->file_auto_rename = false;
// 				$upload_file->file_overwrite = true;
// 				$upload_file->file_max_size = "300K";
// 				$upload_file->allowed = "image/*";
				$upload_file->Process ( $pathname . "/" );
				if ($upload_file->processed) {
					
					/* file_dst_path Destination file path
					file_dst_name_body Destination file name body
					file_dst_name_ext Destination file extension
					file_dst_name Destination file name
					file_dst_pathname Destination file complete path and name */
						
					$dst_file_name = URL . "files/attachments/answers" . "/" . $md_dir . "/" . $upload_file->file_dst_name_body . "." . $upload_file->file_dst_name_ext; 

					$dst_file_name = str_replace ( '\\', "/", $dst_file_name );
						
					/* $photo = "photos/profiles/" . $md_dir . "/avatar2.jpg";
						
			
					$photo = str_replace ( '\\', "/", $photo );
					$upload_file->Clean ();
					$return ['src'] = $photo;
					return $return; */
				} else {
// 					echo "file upload";
					$dst_file_name = "";
					/* $return ['err'] = 1;
					$return ['msg'] = $upload_file->error;
						
					return $return; */
				}
			}
			
// 			print_r($files);
		}
	 
// 		die;
	 
		$data = Array (
				"answer" => parent::getValue ( $data, "answer" ),
				"attachments" => $dst_file_name,
				"que_id" => parent::getValue ( $data, "qid" ),
				"user_id" => Help::getUserId () 
		);
		if ($this->db != null) {
			$id = $this->db->insert ( Help::ANSWERS_TABLE, $data );
		}
		
		if ($id) {
			$output = array (
					"error" => 0,
					"msg" => "Answer posted",
					"answerid" => $id 
			);
		} else {
			$output = array (
					"error" => 1,
					"msg" => "Error to making answer.." 
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