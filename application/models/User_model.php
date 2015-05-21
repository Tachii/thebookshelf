<?php
class User_model extends CI_Model{
    public function register(){
        $data = array(
            'first_name'=> $this->input->post('first_name'),
            'last_name'=> $this->input->post('last_name'),
            'email'=> $this->input->post('email'),
            'username'=> $this->input->post('username'),
            'password'=> md5($this->input->post('password'))
        );
        $insert = $this->db->insert('shop_users',$data);
        return $insert;
    }
    
    public function login($username, $password){
        //Validate
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        
        $result = $this->db->get('shop_users');
        foreach ($result->result() as $row) {
            return $row->id;
        }
    }
}
?>