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
}
