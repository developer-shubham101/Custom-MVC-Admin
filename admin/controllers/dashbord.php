<?php
class Dashbord extends Controller{
	function __construct() {
		parent::__construct ();
		$this->view->title = "News";
		$this->view->news = array ();
	}
	function index() {
		
		if (Help::isUserSuperAdmin()) {		 
			/**
			 * get user informaion header and sidebar
			 */
			$this->view->render ( 'dashbord/index' );
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function status() {
		if (Help::isUserSuperAdmin()) {
			/**
			 * get user informaion header and sidebar
			 */
			$this->view->render ( 'dashbord/status' );
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
}