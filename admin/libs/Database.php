<?php
class Database extends MysqliDb{
	function __construct() {
		parent::__construct( DB_HOST, DB_USER, DB_PASS, DB_NAME );
	}
}