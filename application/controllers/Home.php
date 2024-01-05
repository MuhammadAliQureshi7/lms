<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends CI_Controller {

    

    public function index()

	{

        $data['title']="Learning Management System";

		$this->load->view('users/index',$data);

    }

    public function packages()

	{

        $data['title']="Packages";

		$this->load->view('users/packages',$data);

    }

    public function assign_request(){
        $data=$this->input->post();
            $this->load->library('email');
            $this->email->from('dss@dekodesolutions.com');
            $this->email->to('info@dekodesolutions.com');
            $this->email->subject("Assign Request");

            $message="
            <h2>Personal Information</h2> 
            <label>full Name: </label>" .$data['full_name'].";<br> 
            <label>Phone: </label>" .$data['phone'].";<br> 
            <label>Email: </label>" .$data['email'].";<br> 
            <label>Country: </label>" .$data['country'].";<br> 
            <label>State: </label>" .$data['state'].";<br>
            <label>City: </label>" .$data['city'].";<br>  
            <label>Solution: </label>" .$data['solutions'].";<br> 
            <label>Packages: </label>" .$data['packages'].";<br>
            <h2>Company Information</h2> 
            <label>MS: </label>" .$data['company_name'].";<br> 
            <label>Location: </label>" .$data['location'].";<br> 
            <label>URL: </label>" .$data['url'].";<br> 
            <label>Budget: </label>" .$data['budget'].";<br> 
            <label>Duration: </label>" .$data['duration'].";<br> 
            
        ";

            $this->email->message($message);
            $this->email->set_newline('\r\n');
            $this->email->send();

            if(!$this->email->send()){
                show_error($this->email->print_debugger());
            }
            else{
                $this->session->set_flashdata('msg','Request Successfully');
                return redirect('Home/index');
            }
       /* $this->load->library('email');

        $config=array();
        $config['protocol']="smtp";
        $config['smtp_host']="mail.dekodesolutions.com";
        $config['smtp_user']="info@dekodesolutions.com";
        $config['smtp_pass']="Dekode@123";
        $config['smtp_port']="143";
        $this->email->initialize($config);

        $this->email->set_newline("\r\n");


        $this->email->from($data['email']);
        $this->email->to('info@dekodesolutions.com');
        $this->email->subject('Assign Request');
        $this->email->message($message);
        if($this->email->send()){
            $this->session->set_flashdata('success','Contacted Successfully');
            return redirect('home/index');
        }*/
    }
}