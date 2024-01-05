<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Services extends CI_Controller {

    public function index()
	{

        $data['title']="Services We Provide";

		$this->load->view('users/services',$data);
    }
    
    public function development(){
        $data['title']="Development";
		$this->load->view('users/development',$data);
    }
    
    public function designing(){
        $data['title']="Designing";
		$this->load->view('users/designing',$data);
    }

    public function digital_marketing(){
        $data['title']="Digital Marketing";
		$this->load->view('users/digital_marketing',$data);
    }
    
    public function corporate_coverage(){
        $data['title']="Corporate Coverage";
		$this->load->view('users/corporate_coverage',$data);
    }
}