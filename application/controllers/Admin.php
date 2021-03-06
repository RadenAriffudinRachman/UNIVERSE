<?php
defined('BASEPATH') or exit('No direct script access allowed');

class  Admin extends CI_Controller{
    public function index(){
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email'=> $this->session->userdata('email')])->row_array();

        
        $this->load->view('template/header_admin' );
        $this->load->view('template/sidebar_admin' );
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer_admin' );
        
    }

    public function logout(){
        $this->session->unset_userdata('email');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
                redirect('auth');
    }
}
