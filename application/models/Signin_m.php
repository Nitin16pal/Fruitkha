<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Signin_m extends CI_Model
{
    public function index($username, $password)
    {
        $data = array(
            'username' => $username,
            'password' => $password
        );
        $query = $this->db->where($data);
        $query = $this->db->get('admin_login');
        if ($query != NULL) {
            return $query->row();
        }
    }
}
