<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('id')){
            return redirect('login/index');
        }
    }
    public function index(){
        return redirect('admin/dashboard');
    }
    public function dashboard(){
        $this->load->model('loginmodel');
        $data['userinfo']=$this->loginmodel->get_userinfo();
        // $data['count']=$this->loginmodel->getcount();
        // $data['teamcount']=$this->loginmodel->getteamcount();
        // $data['clients']=$this->loginmodel->getclientcount();
        // $data['projects']=$this->loginmodel->getprojectcount();
        // $data['ongoing']=$this->loginmodel->getongoingprojectscount();
        // $data['request']=$this->loginmodel->getpendingrequestcount();
        $data['title']="Welcome To The Dashboard";
        $this->load->view('admin/index',$data);
    }

    public function logout(){
        $this->session->unset_userdata('id');
        return redirect('login');
    }

    public function subjects(){
        $this->load->model('loginmodel');
        $data['userinfo']=$this->loginmodel->get_userinfo();
        $data['title']="Subjects";
        $this->load->view('admin/subjects/manage',$data);
    }
    public function get_subjects()
    {
       $draw = intval($this->input->get("draw"));
       $start = intval($this->input->get("start"));
       $length = intval($this->input->get("length"));
 
 
       $query = $this->db->get("subjects");
 
 
       $data = [];
 
 
       foreach($query->result() as $r) {
            $data[] = array(
                '<img src="" alt="'.$r->image.'">',
                $r->id,                
                $r->title,
                $r->description,
                $r->created_at
            );
       }
 
       $result = array(
                "draw" => $draw,
                  "recordsTotal" => $query->num_rows(),
                  "recordsFiltered" => $query->num_rows(),
                  "data" => $data
             );
 
 
       echo json_encode($result);
       exit();
    }

}