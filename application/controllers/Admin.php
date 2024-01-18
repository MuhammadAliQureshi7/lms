<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('id')){
            return redirect('login/index');
        }
        $this->load->model('admin/admin_model');
    }
    public function index(){
        return redirect('admin/dashboard');
    }
    public function dashboard(){
        $this->load->model('admin/loginmodel');
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
        $this->load->model('admin/loginmodel');
        $data['userinfo']=$this->loginmodel->get_userinfo();
        $data['title']="Subjects";
        $this->load->view('admin/subjects/manage',$data);
    }
    public function get_subjects()
    {
       $draw = intval($this->input->get("draw"));
       $start = intval($this->input->get("start"));
       $length = intval($this->input->get("length"));
 
 
       $query = $this->admin_model->get_subjects();
        // echo "<pre>"; print_r($query); exit();
        
       $data = [];
 
 
       foreach($query->result() as $r) {
            $data[] = array(
                '<img src="'.$r->image.'" alt="">',              
                $r->title,
                $r->description,
                $r->created_at,
                $r->full_name
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
    public function add_subject(){
        $filename=$this->input->post('title');

        $config['upload_path']='./assets/images/subjects/';

        $config['allowed_types']='jpg|png|jpeg|PNG|gif';

        $config['file_name']=$filename;
        $this->load->library('upload', $config);
        
        if($this->upload->do_upload('image')){
            

            $post = $this->input->post();
            $data=$this->upload->data();
            $image_path=base_url("assets/images/subjects/".$data['raw_name'].$data['file_ext']);
            $post['image']=$image_path;
            $success = $this->admin_model->add_subject($post);
            if($success){
                $this->session->set_flashdata('msg','Subject Added Successfully');
                $this->session->set_flashdata('msg_class','alert-success');
                
            }
            else{
                $this->session->set_flashdata('msg','Category Not Added, Please Try Again!');
                $this->session->set_flashdata('msg_class','alert-danger');
            }
            redirect('admin/subjects');
        }
        else{
            // echo "<pre>"; print_r($config); exit();
            $upload_error = $this->upload->display_errors();
            print_r($upload_error);

        }
    }

}