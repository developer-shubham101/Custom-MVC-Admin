<?php
class Mandal_Model extends Model {
	public function __construct() {
		parent::__construct ();
	}

	function inseartBoothMember() {

		$data = Array (
			"constituency" => parent::getValue ( $_POST, "constituency" ),
			"mandal_no" => parent::getValue ( $_POST, "mandalno" ),
			"mandal_name" => parent::getValue ( $_POST, "mandalname" ),

			"ward_no" => parent::getValue ( $_POST, "wardno" ),
			"ward_name" => parent::getValue ( $_POST, "wardname" ),
			);
		if ($this->db != null) {
			$id = $this->db->insert ( Help::MANDAL_TABLE, $data );
			if ($id) {
				$output = array (
					"error" => 0,
					"msg" => "Member created",
					"booth_id" => $id
					);
			} else {
				$output = array (
					"error" => 1,
					"msg" => "Error to creating Member.."
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

	function deleteBoothMember()
	{

		$id = parent::getValue($_GET, "mandalid");
			//echo $id;
		$this->db->where('id', $id);
		if ($this->db->delete( Help::MANDAL_TABLE))
		{
			echo "successfully deleted";
		}

	}
}
