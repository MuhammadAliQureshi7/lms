<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Work extends CI_Controller {

    

    public function index()

	{

        $data['title']="Our Work";

		$this->load->view('users/work',$data);
    }
    
    public function clients()

	{

        $data['title']="Our Clients";

		$this->load->view('users/clients',$data);

    }

    public function projects()

	{

        $data['title']="Our Projects";

		$this->load->view('users/projects',$data);

    }
}