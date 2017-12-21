<?php
class President extends Controller{
	function __construct() {
		parent::__construct ();
		$this->view->title = "Presidents";
		$this->view->news = array ();
	}
	function index() {
		if (Help::isAdminLogedin ()) {
			$this->view->title = "Presidents List";
			/**
			 * get user informaion header and sidebar
			 */
			$this->view->render ( 'president/index' );
		} else {
			$this->login ();
		}
	}
	function create() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'createnews') {
				echo json_encode ( $this->model->inseartNews ( $_POST ) );
			} else {
				/**
				 * get user informaion header and sidebar
				 */
				$this->view->title = "Create News";
				$this->view->render ( 'news/create' );
			}
		} else {
			$this->login ();
		}
	}
	function edit() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_REQUEST['id'] ) && ! empty ( $_REQUEST ['id'] )) {
				$this->view->news = $this->model->getSingleNews ( $_REQUEST ['id'] );
				if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'editpresident') {
					echo json_encode ( $this->model->updateNews ( $_REQUEST ['id'], $_POST ) );
				} else {
					$this->view->title = "Edit News";
					$this->view->render ( 'president/edit' );
				}
			}
		} else {
			$this->login ();
		}
	}
}