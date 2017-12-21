<?php
class NotificationObject {
	public $id, $type, $message;
	/**
	 * create object
	 *
	 * @param integer $count
	 *        	Total number of data
	 * @param string $type        	
	 * @param array $message
	 *        	array or object
	 * @param array $pages
	 *        	Total number of pages
	 */
	function __construct($id, $type, $message) {
		$this->id = $id;
		$this->type = $type;
		$this->message = $message;
	}
}