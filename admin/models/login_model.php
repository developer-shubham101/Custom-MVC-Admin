<?php
class Login_Model extends Model {
	public function __construct() {
		parent::__construct ();
	}
	public function run( ) {
		$return = array (
			"error" => NULL,
			"msg" => ""
			);
		$md_password = md5 ( $_POST ['password'] );

		$this->db->where ( " ( `username` = '" . $_POST ['email'] . "' OR `email` = '" . $_POST ['email'] . "') AND `password` = '" . $md_password . "' " );
		$admin = $this->db->get ( Help::TABLE_ADMIN );

		if ($this->db->count) {

			$return ['error'] = 0;
			Help::setUserId ( $admin [0] ['id'] );

		} else {
			$return ['error'] = 1;
			$return ['msg'] = "Error email or password is wrong";
		}
		return $return;
	}
}