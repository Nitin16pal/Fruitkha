<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CartModel extends CI_Model
{
    public function adddata($table, $data)
    {
        $query = $this->db->insert($table, $data);
        return $query;
    }

    public function checkcart($usrcol, $usrid, $table, $pdcol = '', $pdid = '')
    {
        $this->db->select('*');
        $this->db->from($table);
        if (!empty($pdid)) {
            $this->db->where($pdcol, $pdid);
        }
        $this->db->where($usrcol, $usrid);
        $query = $this->db->get();
        return $query->result();
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

    public function countproduct($table, $userid, $uid)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($userid, $uid);
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

    // Update Cart

    public function updatecart($colidname, $id, $data, $table, $userid, $uid)
    {

        $this->db->where($colidname, $id);
        $this->db->where($userid, $uid);
        $query = $this->db->update($table, $data);
        // print_r($this->db->last_query());
        return $query;
    }

    public function delete_data($table, $colid, $id, $userid, $uid)
    {
        $this->db->where($userid, $uid);
        $this->db->where($colid, $id);
        $query = $this->db->delete($table);
        // print_r($this->db->last_query());
        return $query;
    }

    // Apply Coupon Code

    public function checkcoupon($table,$coupcol,$coupval,$status)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($coupcol, $coupval);
        $this->db->where($status, '1');
        $query = $this->db->get();
        return $query->result();
    }
}
