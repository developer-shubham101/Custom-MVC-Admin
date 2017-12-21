<?php
class Http extends Controller{
	function __construct() {
		parent::__construct ();
		$this->view->title = "Team's list";
		$this->view->member = array ();
		
	}
	function index() {
		if (Help::isAdminLogedin ()) {
			/**
			 * get user informaion header and sidebar
			 */
			$this->view->render ( 'http/index' );
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function create() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'createhttp') {
				echo json_encode ( $this->model->inseart ( $_POST ) );
			} else {
				/**
				 * get user informaion header and sidebar
				 */
				$this->view->title = "Create Team";
				$this->view->render ( 'http/create' );
			}
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function get() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_POST ['type'] ) && $_POST ['type'] == 'countries') {
				echo json_encode ( $this->model->getStates ( $_POST ['id'] ) );
			} 
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function update() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_REQUEST['pk'] ) && ! empty ( $_REQUEST ['pk'] )) {
				echo json_encode ( $this->model->updateCol ( $_REQUEST ['pk'], $_REQUEST ['name'], $_REQUEST ['value'] ) );
			}
		}
	}
	function edit() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_REQUEST['id'] ) && ! empty ( $_REQUEST ['id'] )) {
				$this->view->member = $this->model->getSingle ( $_REQUEST ['id'] );
				if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'edithttp') {
					echo json_encode ( $this->model->update ( $_REQUEST ['id'], $_POST ) );
				} else {
					$this->view->title = "Edit Team";
					$this->view->render ( 'http/edit' );
				}
			}
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
}