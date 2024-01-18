<?php 
class loginmodel extends CI_Model{
    
    public function isvalidate($username,$password){
        $q= $this->db->where('username',$username)
                    ->where('password',$password)
                    ->get('admin');
        if($q->num_rows()){
            return $q->row()->id;
        }
        else{
            return false;
        }
    }

    public function get_userinfo(){
        $id=$this->session->userdata('id');
        $q=$this->db->select()
                    ->from('admin')
                    ->where('id',$id)
                    ->get();                 
        return $q->result();
    }
    
    public function getcount(){
        $q=$this->db->get('admin')
                    ->num_rows();                                     
                 return $q;                   
    }
    public function getteamcount(){
        $q=$this->db->get('team')
                    ->num_rows();                                     
                 return $q;                   
    }
    public function getclientcount(){
        $q=$this->db->get('clients')
                    ->num_rows();                                     
                 return $q;                   
    }
    public function getprojectcount(){
        $q=$this->db->get('projects')
                    ->num_rows();                                     
                 return $q;                   
    }
    public function getongoingprojectscount(){
        $status="ongoing";
        $q=$this->db->where('status',$status)
                    ->get('projects')
                    ->num_rows();                                     
                 return $q;                   
    }
    public function getpendingrequestcount(){
        $status="pending";
        $q=$this->db->where('status',$status)
                    ->get('assign_request')
                    ->num_rows();                                     
                 return $q;                   
    }
    
    public function get_team_member(){
        $q=$this->db->select()
                 ->from('team')
                 ->get();                 
                 return $q->result();
    }
    public function add_team($array){
        return $this->db->insert('team',$array);
    }
    public function add_client($array){
        return $this->db->insert('clients',$array);
    }
    public function del_team($id){
        return $this->db->where('id', $id)
                        ->delete('team');
    }

     public function get_core_team_member(){
        $q=$this->db->select()
                 ->from('admin')
                 ->get();                 
                 return $q->result();
    }
    public function add_admin($array){
        return $this->db->insert('admin',$array);
    }
    public function del_admin($id){
        return $this->db->where('id', $id)
                        ->delete('admin');
    }
    public function find_admin($adminid){
        $q=$this->db->select()
                    ->where('id',$adminid)
                    ->get('admin');
                    return $q->row(); 
    }
}