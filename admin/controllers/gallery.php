<?php
class Gallery extends Controller{
	function __construct() {
		parent::__construct ();
		$this->view->title = "Team's list";
		$this->view->gallery = array ();
	}
	function index() {
		if (Help::isLogedin ()) {
			/**
			 * get user informaion header and sidebar
			 */
			$this->view->render ( 'gallery/index' );
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function create() {
		if (Help::isLogedin ()) {
			if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'creatimage') {
				echo json_encode ( $this->model->inseartGallery ( $_POST ) );
			} else {
				/**
				 * get user informaion header and sidebar
				 */
				$this->view->render ( 'gallery/create' );
			}
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function edit() {
		if (Help::isLogedin ()) {
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

	function action() {
		if (Help::isAdminLogedin ()) {

			if(isset($_POST ['select'])){
				if (isset ( $_POST['action'] ) &&  $_POST ['action'] == "trash" ) {

					$result = $this->model->moveTo ( $_POST ['select'], 'trash' );
				}else if (isset ( $_POST['action'] ) &&  $_POST ['action']  == "restore" ) {
					$result = $this->model->moveTo ( $_POST ['select'], 'live' );
				}else if (isset ( $_POST['action'] ) &&  $_POST ['action']  == "remove" ) {
					$result = $this->model->remove ( $_POST ['select'], 'live' );
				}

				 
			}
			header ( 'location: ' . URL . 'gallery/' );
			die;
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
}