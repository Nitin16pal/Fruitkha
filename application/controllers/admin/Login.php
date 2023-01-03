<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('uid'))
            redirect('accounts/dashboard');
    }



    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->load->model('admin/AdminModel');
            $validate = $this->AdminModel->check_admin($username, $password);

            if ($validate) {
                $this->session->set_userdata('uid', $validate['0']->uid);
                $this->session->set_userdata('uname', $validate['0']->name);
                $this->session->set_userdata('username', $validate['0']->username);
                redirect('accounts/dashboard');
            } else {
                $nitn = $this->session->set_flashdata('crederror', 'Invalid Credential Please Try Again');
                $this->load->view('admin/header');
                $this->load->view('admin/login', $nitn);
            }
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/login');
            // $this->load->view('admin/footer');
        }
    }
}
