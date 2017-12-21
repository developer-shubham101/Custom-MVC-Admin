<?php
class Questions extends Controller{
	function __construct() {
		parent::__construct ();
		$this->view->title = "News";
		$this->view->news = array ();
	}
	function index() {
		if (Help::isLogedin()) {
			/**
			 * get user informaion header and sidebar
			 */
			$this->view->render ( 'questions/index' );
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function create() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'createquestion') {
				echo json_encode ( $this->model->inseartQuestions ( $_POST ) );
			} else {
				/**
				 * get user informaion header and sidebar
				 */
				$this->view->render ( 'questions/create' );
			}
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function edit() {
		if (Help::isAdminLogedin ()) {
			if (isset ( $_REQUEST['id'] ) && ! empty ( $_REQUEST ['id'] )) {
				$this->view->news = $this->model->getSingleNews ( $_REQUEST ['id'] );
				if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'editnews') {
					echo json_encode ( $this->model->updateNews ( $_REQUEST ['id'], $_POST ) );
				} else {
					$this->view->render ( 'news/edit' );
				}
			}
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
}