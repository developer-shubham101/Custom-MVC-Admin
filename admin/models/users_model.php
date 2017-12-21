<?php
class Users_Model extends Model {
	public function __construct() {
		parent::__construct ();
	}
	function updateUser($id, $data) {
		$mobile = parent::getValue ( $data, "mobile" );
		if (isset ( $data ['mobile'] )) {
			if (! empty ( $data ['mobile'] )) {
				$mobile = "+91" . $data ['mobile'];
			}
		}
		$newData = Array (
				"name" => parent::getValue ( $data, "fname" ),
				"lname" => parent::getValue ( $data, "lname" ),
				"email" => parent::getValue ( $data, "email" ),
				"mobile" => $mobile,
				"gender" => parent::getValue ( $data, "gender" ),
				"dob" => "",
				"address" => parent::getValue ( $data, "address" ),
				"address2" => parent::getValue ( $data, "address2" ),
				"city" => parent::getValue ( $data, "city" ),
				"state" => parent::getValue ( $data, "state" ),
				"country" => parent::getValue ( $data, "country" ),
				"postcode" => parent::getValue ( $data, "postcode" ),
				"photo" => "" 
		);
		$this->db->where ( 'id', $id ); 
		if ($this->db->update ( Help::USERS_TABLE, $newData )) {
			$output = array (
					"error" => 0,
					"msg" => "user updated.." 
			);
		} else {
			$output = array (
					"error" => 1,
					"msg" => "Error to update user.." 
			);
		}
		return $output;
	}
	function inseartUser($data) {
		$id = 0;
		
		$mobile = parent::getValue ( $data, "mobile" );
		if (isset ( $data ['mobile'] )) {
			if (! empty ( $data ['mobile'] )) {
				$mobile = "+91" . $data ['mobile'];
			}
		}
		$newData = Array (
				"name" => parent::getValue ( $data, "fname" ),
				"lname" => parent::getValue ( $data, "lname" ),
				"email" => parent::getValue ( $data, "email" ),
				"mobile" => $mobile,
				"gender" => parent::getValue ( $data, "gender" ),
				"dob" => "",
				"address" => parent::getValue ( $data, "address" ),
				"address2" => parent::getValue ( $data, "address2" ),
				"city" => parent::getValue ( $data, "city" ),
				"state" => parent::getValue ( $data, "state" ),
				"country" => parent::getValue ( $data, "country" ),
				"postcode" => parent::getValue ( $data, "postcode" ),
				"photo" => "" 
		);
		if ($this->db != null)
			$id = $this->db->insert ( Help::USERS_TABLE, $newData );
		
		if ($id) {
			$output = array (
					"error" => 0,
					"msg" => "user created",
					"userid" => $id 
			);
		} else {
			$output = array (
					"error" => 1,
					"msg" => "Error to creating user.." 
			);
		}
		return $output;
		// echo json_encode ( $output );
		// echo 'user was created. Id=' . $id;
	}
	function getSingleUser($id) {
		if (! empty ( $id )) {
			$this->db->where ( "id = " . $id );
			return $this->db->getOne ( Help::USERS_TABLE );
		} else {
			return array ();
		}
	}
}