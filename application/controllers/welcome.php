<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends  MY_Controller {

    // load helper
	    function __construct()
	{
		parent::__construct();		
	}
             
          public function form() {
           // $this->body = 'form'; // passing middle to function. change this for different views.
            //$this->layout();
            redirect('form'); 
          }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */