<?php
require_once ("secure_area.php");

class Home extends Secure_area 
{
	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		//$this->load->view("home");
                        $this->body = 'home';
                         $this->layout();
	}
	
	function logout()
	{
		$this->Employee->logout();
	}
}
?>