<?php
class Help {
	CONST TABLE_PREFIX = 'api_';
	CONST USER_SESSION_PREFIX = 'userid';
	CONST TABLE_ADMIN = Help::TABLE_PREFIX . 'users';


	CONST TABLE_WORLD_CITIES = Help::TABLE_PREFIX . 'world_cities';
	
	CONST TABLE_HTTP_RESONSE = Help::TABLE_PREFIX . 'http_resonse';
 
	CONST TABLE_PRESIDENT = Help::TABLE_PREFIX . 'india_president';

CONST TABLE_GALLERY = Help::TABLE_PREFIX . 'images';
	 
	 
 
	static function isAdminLogedin() {
		if(! Help::isLogedin()){
return false;
		}
		$id = Help::getUserId ();
		$db = new Database ();
		$db->where ( " id = " . $id );
		$user = $db->getOne ( Help::TABLE_ADMIN );
		 
		if ($user['role'] != "admin")
			return false;
		else
			return true;
	}
	static function setUserId($id) {
		Session::set ( Help::USER_SESSION_PREFIX, $id );
	}
	static function getUserId() {
		return Session::get ( Help::USER_SESSION_PREFIX );
	}
	 
	static function isLogedin() {
		if ( empty ( Session::get ( Help::USER_SESSION_PREFIX ) ))
			return false;
		else
			return true;
	}
	static function getUserType() {
		$id = Help::getUserId ();
		$db = new Database ();
		$db->where ( " id = " . $id );
		$user = $db->getOne ( Help::TABLE_ADMIN );
		return $user['role'];
	}
	 
	static function getUserDetails($id = null) {
		if ($id == null) {
			$id = Help::getUserId ();
		}
		if (empty ( $id )) {
			return;
		} else {
			$db = new Database ();
			$db->where ( " id = " . $id );
			return $db->getOne ( Help::TABLE_ADMIN );
		}
	}
 
}
function sanitize_output($buffer) {
	$search = array(
			'/\>[^\S ]+/s',  // strip whitespaces after tags, except space
			'/[^\S ]+\</s',  // strip whitespaces before tags, except space
			'/(\s)+/s'       // shorten multiple whitespace sequences
			);
	$replace = array(
		'>',
		'<',
		'\\1'
		);
	$buffer = preg_replace($search, $replace, $buffer);
	return $buffer;
}