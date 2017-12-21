<?php
class Booth_Team extends Controller{
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
			$this->view->render ( 'booth_team/index' );
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	
	function create() {
		if (Help::isAdminLogedin ()) {
			
			 
			($this->model->inseartBoothMember());
			// echo "successfully inserted";
			header ( 'location: ' . URL . 'booth_team/' );
			
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	function export(){
		if (Help::isLogedin()) {
		
			echo $this->model->export( );
			// header ( 'location: ' . URL . 'mandal/index' );
			
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	
	function delete()
	{
		if (Help::isLogedin()) {
		
			$this->model->deleteBoothMember( );
			header ( 'location: ' . URL . 'booth_team/index' );
			
		} else {
			header ( 'location: ' . URL . 'login/' );
		}
	}
	
	
}

?>
	