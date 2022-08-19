<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Logout extends CI_Controller
{
    public function index()
    {
        $this->session->unset_userdata('uid');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        return redirect('admin/signin');
    }
}
