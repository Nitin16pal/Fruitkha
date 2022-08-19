<?php
defined('BASEPATH') or exit('No direct script access allowed');

class U_signup_m extends CI_Model
{
    public function index($uusername, $uemail,$umobile,$password,$d)
    {
        $data = array(
            'user_name' => $uusername,
            'user_email' => $uemail,
            'user_mobile' => $umobile,
            'user_password' => $password,
           
        );
        $query = $this->db->insert('user', $data);
        if ($query) {
            $this->session->set_flashdata('success', 'Your request has been submit successfully. We will contact you as soon.');
            redirect('contact');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
            redirect('contact');
        }
    }
}
