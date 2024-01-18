<?php 
class Admin_model extends CI_Model{
    public function add_subject($post){
        $post['created_by'] = $this->session->userdata('id');
        $post['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('subjects', $post);
        return true;
    }
    public function get_subjects() {
        $this->db->select()
                 ->from('subjects')
                 ->join('admin', 'subjects.created_by = admin.id');
        $result = $this->db->get();
        return $result;
    }
}
?>