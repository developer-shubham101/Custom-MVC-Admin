<?php
class Social extends Controller{
	function __construct() {
		parent::__construct ();
		$this->view->title = "Social";
		$this->view->member = array ();
	}
	function index() {		 
		$this->view->render ( 'team/index' );		 
	}
	function create() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'createmember') {
				echo json_encode ( $this->model->inseartMember ( $_POST ) );
			} else {
				/**
				 * get user informaion header and sidebar
				 */
				$this->view->render ( 'team/create' );
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
					$this->view->render ( 'team/edit' );
				}
			}
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
}