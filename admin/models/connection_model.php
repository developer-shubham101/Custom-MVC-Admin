<?php
class Connection_Model extends Model {
	public function __construct() {
		parent::__construct();
	}
	function createConnection() {
		$userId = parent::getValue($_POST, "users", 0);

		if ($userId != 0) {

			$insertNewData = Array(
				"admin_id" => parent::getValue($_POST, "admins"),
				"user_id" => $userId
				);

			if ($this->db != null)
				$id = $this->db->insert(Help::TERMS_TABLE, $insertNewData);

			if ($id) {
				$output = array(
					"error" => 0,
					"msg" => "user created",
					"userid" => $id
					);
			} else {
				$output = array(
					"error" => 1,
					"msg" => "Error to creating user.."
					);
			}
		}else {
			$output = array(
				"error" => 1,
				"msg" => "Pleaes select user.."
				);
		}
		return $output;
	}
	function deleteConnection() {

		$id = parent::getValue($_GET, "termsid");
								//echo $id;
		$this->db->where('id', $id);
		if ($this->db->delete('bjp_terms')) {
			echo "successfully deleted";
		}

	}

}