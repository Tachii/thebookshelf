<?php
class Users extends  CI_Controller{
    
    //
    //Register Metthod
    //
    public function register(){
        //Validation Rules
        $this->form_validation->set_rules('first_name','First Name','required|trim|max_length[20]|min_length[2]');
        $this->form_validation->set_rules('last_name','Last Name','required|trim|max_length[20]|min_length[2]');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('username','Username','required|trim|max_length[10]|min_length[5]');
        $this->form_validation->set_rules('password','Password','required|trim|max_length[20]|min_length[5]');
        $this->form_validation->set_rules('password2','Repeat Password','required|trim|matches[password]');
        
        if($this->form_validation->run() == FALSE){
            //Show View
            $data['main_content']='register';
            $this->load->view('layouts/main',$data);
        }else{
            if($this->User_model->register()){
                $this->session->set_flashdata('registered','You are now registered and can login');
                redirect('products');
            }
        }
    }

    //
    //Login Metthod
    //
    public function login(){
        $this->form_validation->set_rules('username','Username','required|trim|max_length[10]|min_length[5]');
        $this->form_validation->set_rules('password','Password','required|trim|max_length[20]|min_length[5]');
        
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        $user_id = $this->User_model->login($username, $password);
        
        //Validate User
        if($user_id){
            //Create array of user data
            $data = array(
                'user_id'=>$user_id,
                'username'=>$username,
                'logged_in'=>true
            );
            //Set session userdata
            $this->session->set_userdata($data);
            
            //Set message
            $this->session->set_flashdata('pass_login','You are logged in');
            redirect('products');
        }else{
            //Set error
            $this->session->set_flashdata('fail_login','Sorry, the login info is incorrect');
            redirect('products');
        }
        
    }

    //
    //Logout
    //
    public function logout(){
        //Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        
        redirect('products');
    }

}
?>