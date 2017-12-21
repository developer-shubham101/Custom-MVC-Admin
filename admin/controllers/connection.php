<?php
class Connection extends Controller{
	
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
			$this->view->render ( 'connection/index' );
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function create()
	{
		if (Help::isLogedin()) {
		
			($this->model->createConnection( ));
			header ( 'location: ' . URL . 'connection/index' );
			/**
			 * get user informaion header and sidebar
			 */
			//$this->view->render ( 'connection/index' );
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
		
		
	}
	function delete()
	{
		if (Help::isLogedin()) {
		
			$this->model->deleteConnection( );
			header ( 'location: ' . URL . 'connection/index' );
			
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	
}