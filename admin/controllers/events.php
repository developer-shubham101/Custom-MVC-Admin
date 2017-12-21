<?php
class Events extends Controller{
	function __construct() {
		parent::__construct ();
		$this->view->title = "Events List";
		$this->view->event = array();
	}
	function index() {
		if (Help::isAdminLogedin ()) {
			/**
			 * get user informaion header and sidebar
			 */
			$this->view->render ( 'event/index' );
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function create() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'createevent') {
				echo json_encode ( $this->model->inseartEvent ( $_POST ) );
			} else {
				/**
				 * get user informaion header and sidebar
				 */
				$this->view->title = "Create Events";
				$this->view->render ( 'event/create' );
			}
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	
	function edit() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_REQUEST['id'] ) && ! empty ( $_REQUEST ['id'] )) {
				$this->view->event = $this->model->getSingleEvent ( $_REQUEST ['id'] );
				if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'editevent') {
					echo json_encode ( $this->model->updateEvent ( $_REQUEST ['id'], $_POST ) );
				} else {
					$this->view->title = "Edit Events";
					$this->view->render ( 'event/edit' );
				}
			}
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
}