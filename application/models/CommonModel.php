<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CommonModel extends CI_Model
{
    public function index($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }
    public function gt_category()
    {
        $query = $this->db
            ->select('*')
            ->from('product_category')
            ->where('catstatus', '1')
            ->get();
        return $query->result();
    }
    public function gt_shop($cat_id='', $limit = '')
    {
        $this->db->select('a.*, b.cat_url, b.cat_name, c.scat_url, c.scat_name');
        $this->db->from('products a');
        $this->db->join('product_category b', 'b.cat_id = a.prod_category');
        $this->db->join('sub_category c', 'c.scat_id = a.prod_sub_category');
        if (!empty($cat_id)) {
            $this->db->where("a.status='1' AND a.prod_category=$cat_id");
        }else{
            $this->db->where("a.status='1'");
        }
        if (!empty($limit)) {
            $this->db->limit($limit);
        }
        $this->db->order_by('a.modified', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function gt_homeproduct($limit = '')
    {
        $this->db->select('a.*, b.cat_url, b.cat_name, c.scat_url, c.scat_name');
        $this->db->from('products a');
        $this->db->join('product_category b', 'b.cat_id = a.prod_category');
        $this->db->join('sub_category c', 'c.scat_id = a.prod_sub_category');
        $this->db->where("a.status='1'");
        if (!empty($limit)) {
            $this->db->limit($limit);
        }
        $this->db->order_by('a.modified', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    // User Registration and Login

    public function add_record($urtable, $userdata)
    {
        return $query = $this->db->insert($urtable, $userdata);
    }

    public function userlogin($email, $password)
    {
        $this->db->select('ur_id,ur_status,ur_name');
        $this->db->from('user_registration');
        $this->db->where('ur_email', $email);
        $this->db->where('ur_passward', $password);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_record($urtable, $userdata, $usrid, $idcolnm)
    {
        return $query = $this->db->insert($urtable, $userdata);
    }
}
