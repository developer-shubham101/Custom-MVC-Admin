<?php
class Mandal extends Controller{
	function __construct() {
		parent::__construct ();
		$this->view->title = "Booth Team's list";
		$this->view->member = array ();
	}
	function index() {
		if (Help::isAdminLogedin ()) {
			/**
			 * get user informaion header and sidebar
			 */
			$this->view->render ( 'ward/index' );
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	
	function create() {
		if (Help::isAdminLogedin ()) {
			
			 
			($this->model->inseartBoothMember());
			// echo "successfully inserted";
			header ( 'location: ' . URL . 'mandal/' );
			
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	
	function delete()
	{
		if (Help::isLogedin()) {
		
			$this->model->deleteBoothMember( );
			header ( 'location: ' . URL . 'mandal/index' );
			
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
}

?>
	