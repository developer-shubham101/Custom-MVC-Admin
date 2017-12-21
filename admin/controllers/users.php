<?php
class users extends Controller {
	function __construct() {
		parent::__construct ();
		$this->view->title = "Users";
		$this->view->user = array ();
	}
	function index() {
		if (Help::isAdminLogedin ()) {
			$this->view->render ( 'users/index' );
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function create() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'createusers') {
				echo json_encode ( $this->model->inseartUser ( $_POST ) );
			} else {
				$this->view->render ( 'users/create' );
			}
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function edit() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_REQUEST['id'] ) && ! empty ( $_REQUEST ['id'] )) {
				$this->view->user = $this->model->getSingleUser ( $_REQUEST ['id'] );
				if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'editusers') {
					echo json_encode ( $this->model->updateUser ( $_REQUEST ['id'], $_POST ) );
				} else {
					$this->view->render ( 'users/edit' );
				}
			}
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
}