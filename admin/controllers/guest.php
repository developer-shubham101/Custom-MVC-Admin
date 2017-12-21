<?php
class Guest extends Controller{
	function __construct() {
		parent::__construct ();
		$this->view->title = "Guest's list";
		$this->view->gallery = array ();
	}
	function index() {
		if (Help::isAdminLogedin ()) {
			/**
			 * get user informaion header and sidebar
			 */
			$this->view->render ( 'guest/index' );
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function create() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'createguest') {
				echo json_encode ( $this->model->inseartGuest ( $_POST ) );
				

			} else {
				/**
				 * get user informaion header and sidebar
				 */
				$this->view->render ( 'guest/create' );
				header ( 'location: ' . URL . 'guest/create' );
			}
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function edit() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_REQUEST['id'] ) && ! empty ( $_REQUEST ['id'] )) {
				$this->view->gallery = $this->model->getSingleGallery ( $_REQUEST ['id'] );
				if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'editgallery') {
					echo json_encode ( $this->model->updateGallery ( $_REQUEST ['id'], $_POST ) );
				} else {
					$this->view->render ( 'gallery/edit' );
				}
			}
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
}