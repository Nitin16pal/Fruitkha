<?php defined('BASEPATH') or exit('No direct script access allowed');
class AdminModel extends CI_Model
{
    public function add_data($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function get_category($table, $colidname, $id = '',$status='')
    {
        $this->db->select('*');
        $this->db->from($table);
        if (!empty($id)) {
            $this->db->where($colidname, $id);
        }else if(!empty($status))
        {
            $this->db->where($status, '1');
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function get_active_category($table, $colidname,$status='')
    {
        $this->db->select('*');
        $this->db->from($table);
        if(!empty($status))
        {
            $this->db->where($status, '1');
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function get_category_name($table, $id = '')
    {
        $this->db->select('*');
        $this->db->from('product_category');
        $this->db->join($table, 'product_category.cat_id = sub_category.pcat_id');
        // if($id!=''){
        //     $this->db->where('id',$id);
        // }
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
        return $query->result();
    }
    //Fetch all data
    public function fetch_category_alldata($table)
    {
        $query = $this->db
            ->select()
            ->from($table)
            ->get();
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
    }
    public function update_data($table, $data, $id, $colidname)
    {
        $this->db->where($colidname, $id);
        $this->db->update($table, $data);
    }
    // Delete data
    public function delete_data($table, $id, $colidname)
    {
        $this->db->where($colidname, $id);
        $this->db->delete($table);
    }
    public function get_data($id)
    {
        $this->db->insert();
    }

    // Count all records
    public function all_row_count($table)
    {
        $count = $this->db->count_all_results($table);
        return $count;
    }
}
