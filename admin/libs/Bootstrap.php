<?php
class Bootstrap {
	function __construct() {
		Session::init ();
		$url = isset ( $_GET ['url'] ) ? $_GET ['url'] : null;
		$url = rtrim ( $url, '/' );
		$url = filter_var ( $url, FILTER_SANITIZE_URL );
		$url = explode ( '/', $url );
		
		// print_r($url);
		
		if (empty ( $url [0] )) {
			require 'controllers/index.php';
			$controller = new Index ();
			$controller->loadModel ( "index" );
			$controller->index ();
			return false;
		}
		
		$file = 'controllers/' . $url [0] . '.php';
		if (file_exists ( $file )) {
			require $file;
		} else {
			$this->error ();
			return FALSE;
		}
		
		$controller = new $url [0] ();
		$controller->loadModel ( $url [0] );
		
		// calling methods
		if (isset ( $url [2] )) {
			if (method_exists ( $controller, $url [1] )) {
				$controller->{$url [1]} ( $url [2] );
			} else {
				$this->error ();
			}
		} else {
			if (isset ( $url [1] )) {
				if (method_exists ( $controller, $url [1] )) {
					$controller->{$url [1]} ();
				} else {
					$this->error ();
				}
			} else {
				$controller->index ();
			}
		}
	}
	function error() {
		require 'controllers/wrong.php';
		$controller = new Wrong ();
		// echo "asdasd";
		// die();
		$controller->index ();
		
		return false;
	}
}