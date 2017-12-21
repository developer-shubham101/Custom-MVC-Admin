<?php
class Index extends Controller {
	function __construct() {
		parent::__construct ();
		$this->view->title = "Get Started for Free";
	}
	function index() {
		if (Help::isLogedin ()) {
			$this->view->render ( 'index/index' );
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function check($param = "nothing") {
		 echo $param;
	}
}