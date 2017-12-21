<?php
class Team extends Controller{
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
			$this->view->render ( 'team/index' );
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function create() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'createmember') {
				echo json_encode ( $this->model->inseartMember ( $_POST ) );
			} else {
				/**
				 * get user informaion header and sidebar
				 */
				$this->view->title = "Create Team";
				$this->view->render ( 'team/create' );
			}
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function get() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_POST ['type'] ) && $_POST ['type'] == 'countries') {
				echo json_encode ( $this->model->getStates ( $_POST ['id'] ) );
			} else if (isset ( $_POST ['type'] ) && $_POST ['type'] == 'state') {
				echo json_encode ( $this->model->getCities ( $_POST ['id'] ) );
			} 
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function edit() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_REQUEST['id'] ) && ! empty ( $_REQUEST ['id'] )) {
				$this->view->member = $this->model->getSingleMember ( $_REQUEST ['id'] );
				if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'editmember') {
					echo json_encode ( $this->model->updateMember ( $_REQUEST ['id'], $_POST ) );
				} else {
					$this->view->title = "Edit Team";
					$this->view->render ( 'team/edit' );
				}
			}
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
}