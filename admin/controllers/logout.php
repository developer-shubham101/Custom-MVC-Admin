<?php
class Logout extends Controller {
	function __construct() {
		parent::__construct ();
	}
	function index($print_valus = array()) {
		if (Help::isLogedin()) {
			Session::destroy ();
			
			header ( 'location: ' . URL .'login/' );
		} else {
			header ( 'location: ' . URL );
		}
	}
}