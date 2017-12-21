<?php
class Controller {
	protected $view;
	protected $model;
	function __construct() {
		$this->view = new View ();
	}
	public function loadModel($name) {
		$path = 'models/' . $name . '_model.php';
		
		if (file_exists ( $path )) {
			require 'models/' . $name . '_model.php';
			
			$modelName = $name . '_Model';
			$this->model = new $modelName ();
		}
	}
	protected function login(){
		$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		header ( 'location: ' . URL . 'login/?to=' . urldecode($actual_link) );
	}
	protected function get($key){
		return isset($_GET[$key]) ? $_GET[$key] : "" ;
	}
}