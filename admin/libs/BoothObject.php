<?php 

 class Constituency {
 	public $constituency,$mandal; 	
 	function __construct($constituency,$mandal){
 		$this->constituency = $constituency;
 		$this->mandal = $mandal;
 	}
 } 
/*
  class Constituency {
 	public $constituency; 	
 	function __construct($constituency){
 		$this->constituency = $constituency;
 	}
 } 
*/
 class MandalObj {
 	public $mandal_no,$mandal_name,$ward;
 	function __construct($mandal_no,$mandal_name,$ward){
 		$this->mandal_no = $mandal_no;
 		$this->mandal_name = $mandal_name;
 		$this->ward = $ward; 		
 	}
 } 

 class Ward {
 	public $booth_no,$booth_name,$booth;
 	function __construct($booth_no,$booth_name,$booth){
 		$this->booth_no = $booth_no;
 		$this->booth_name = $booth_name;
 		$this->booth = $booth; 		
 	}
 } 



 class Booth {
 	public $booth_no,$booth_name,$booth;
 	function __construct($booth_no,$booth_name,$booth){
 		$this->booth_no = $booth_no;
 		$this->booth_name = $booth_name;
 		$this->booth = $booth; 		
 	}
 } 