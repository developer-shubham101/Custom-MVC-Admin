<?php
class Answers extends Controller{
	function __construct() {
		parent::__construct ();
		$this->view->title = "Answers";
		$this->view->news = array ();
	}
	function index() {
		if (Help::isLogedin()) {
			
			//$this->model->getAnswersList(Model::getValue($_GET, "qid"));
			/**
			 * get user informaion header and sidebar
			 */
			$this->view->render ( 'answers/index' );
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function make() {
		if (Help::isLogedin ()) {
			if (isset ( $_POST ['action'] ) && $_POST ['action'] == 'makeanswer') {
// 				echo json_encode ( $this->model->inseartAnswer ( $_POST ) );
				$result= $this->model->inseartAnswer ( $_POST , $_FILES );
				if ($result['error'] != 1){
					header("Location: " . URL . "answers/?qid=" . $_POST['qid']);
				}
			} else {
				/**
				 * get user informaion header and sidebar
				 */
				$this->view->render ( 'news/create' );
			}
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function edit() {
		if (Help::isLogedin ()) {
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