<?php
class Image extends Controller{
	function __construct() {
		parent::__construct ();
	}
	function index() {	 
		$this->view->render ( 'image/index', true);	 
	}
	 
}