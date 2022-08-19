<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('uid'))
            redirect('admin/dashboard');
    }

    

    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Username', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('iagree', 'I agree', 'required');

        if ($this->form_validation->run()) {
            $username = $this->input->post('email');
            $password = $this->input->post('password');
            $this->load->model('Signin_m');
            $validate = $this->Signin_m->index($username, $password);
            if ($validate) {
                $this->session->set_userdata('uid', $validate->uid);
                $this->session->set_userdata('uname', $validate->name);
                $this->session->set_userdata('username', $validate->username);
                redirect('admin/dashboard');
            } else {
                $this->load->view('admin/signin');
            }
        } else {
            $this->load->view('admin/signin');
        }
    }
}
