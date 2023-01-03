<?php defined('BASEPATH') or exit('No direct script access allowed');

class ProductModel extends CI_Model
{

    public function addproducts($table,$formArray)
    {
        $this->db->insert($table, $formArray);
        return $this->db->insert_id();
    }

    // fatch category where status and id data N
    public function fetch_data($table, $colidname, $id = '', $status = '')
    {
        $this->db->select('*');
        $this->db->from($table);
        if ((!empty($id)) && (!empty($status))) {
            $this->db->where($colidname, $id);
            $this->db->where($status, '1');
        } else if (!empty($id)) {
            $this->db->where($colidname, $id);
        } else if (!empty($status)) {
            $this->db->where($status, '1');
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getproducts($table, $colidname)
    {
        $query = $this->db
                ->select('a.*, b.cat_url, b.cat_name, c.scat_name')
                ->from('products a')
                ->join('product_category b', 'b.cat_id = a.prod_category')
                ->join('sub_category c', 'c.scat_id = a.prod_sub_category')
                ->order_by('a.prod_id', 'DESC')
                // ->limit('6')
                ->get();
        return $query->result();
    }
    
    public function update_data($table, $data, $id, $colidname)
    {
        $this->db->where($colidname, $id);
        return $this->db->update($table, $data);
    }
    // Delete data
    public function delete_data($table, $id, $colidname)
    {
        $this->db->where($colidname, $id);
        return $this->db->delete($table);
    }
  
}
