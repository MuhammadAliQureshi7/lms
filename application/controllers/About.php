<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class About extends CI_Controller {

    

    public function index()

	{

        $data['title']="About Dekode";

		$this->load->view('users/about',$data);

    }
}