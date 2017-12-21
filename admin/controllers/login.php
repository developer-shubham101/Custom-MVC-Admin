<?php
class Login extends Controller {
	function __construct() {
		parent::__construct ();
	}
	function index($print_valus = array()) {
		if (! Help::isLogedin ()) {
			if (isset ( $_POST ['email'] )) {
				$type = (isset ( $_POST ['type'] )) ? $_POST ['type'] : "";
				$redirect_to = (isset ( $_REQUEST ['redirect_to'] )) ? $_REQUEST ['redirect_to'] : "";
				
				$get_return = $this->model->run ( $type, $redirect_to );
				echo json_encode ( $get_return );
			} else {
				$this->view->redirect_to = $this->get ( 'to' );
				$this->view->render ( 'login/index', false, 'second' );
			}
		} else {
			header ( 'location: ' . URL );
		}
	}
}