<?php
class verify_Model extends Model {
	function __construct() {
		parent::__construct ();
	}
	function verify_user($email, $mdvarify) {
		$return = array ();
		$return ['error'] = 1;
		$return ['msg'] = NULL;
		
		if (! empty ( $email ) && ! empty ( $mdvarify )) {
			
			$varify_query = $this->db->query ( "SELECT * FROM `user` WHERE `email` = '" . $email . "' AND `md5` = '" . $mdvarify . "'" );
			if ($varify_query) {
				$varify = $varify_query->fetch ();
				if (! empty ( $varify ['id'] )) {
					if ($varify ['active'] == 0) {
						if ($this->db->query ( "UPDATE `user` SET `active` = 1 WHERE `email` = '" . $email . "'" )) {
							$return ['error'] = 0;
							$return ['msg'] = '<h2 class="success">Account varified. Go to <a href="login">Login Page</a></h2>';
						}
					} else {
						$return ['error'] = 1;
						$return ['msg'] = '<h2 class="error">This link already varified. Go to <a href="login">Login Page</a></h2>';
					}
				} else {
					$return ['error'] = 1;
					$return ['msg'] = '<h2 class="error">currept link.Go to <a href="recover">Recover Page</a> and verify your account again.</h2>';
				}
			}
		}
		
		return $return;
	}
}