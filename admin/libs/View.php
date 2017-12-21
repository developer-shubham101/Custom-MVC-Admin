<?php
class View {
	public $title = "";
	public $body_class = "";
	public $scripts = array();
	public function render($name, $noInclude = false, $custom = NULL) {
		if ($noInclude == true) {
			require 'views/' . $name . '.php';
		} else if ($noInclude == false && $custom != NULL) {
			require 'templates/header-' . $custom . '.php';
			require 'views/' . $name . '.php';
			require 'templates/footer-' . $custom . '.php';
		} else {
			require 'templates/header.php';		
			require 'views/' . $name . '.php';
			require 'templates/footer.php';
		}
	}
}