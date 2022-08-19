<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function display_productm()
    {

        $query = $this->db->get('products');
        return $query;
    }

    public function add_productm($prod_title, $prod_keywords, $prod_discription, $product_cat,$product_sbcat, $prod_name, $act_price, $best_price, $prod_image, $prod_seq)
    {
        $data = array(
            'prod_title' => $prod_title,
            'prod_keywords' => $prod_keywords,
            'prod_discription' => $prod_discription,
            'prod_category' => $product_cat,
            'prod_sub_category' => $product_sbcat,
            'prod_name' => $prod_name,
            'prod_act_price' => $act_price,
            'prod_dist_price' => $best_price,
            'prod_image' => $prod_image,
            'prod_seq' => $prod_seq,

        );
        $query = $this->db->insert('products', $data);
        if ($query) {
            $this->session->set_flashdata('success', 'Your request has been submit successfully. We will contact you as soon.');
            redirect('admin/addproduct');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
            redirect('admin/addproduct');
        }
    }

    public function add_categorym($cat_types, $cat_name, $cat_discription, $d)
    {
        $data = array(
            'cat_type' => $cat_types,
            'cat_name' => $cat_name,
            'cat_discription' => $cat_discription,
            'cat_date' => $d,


        );
        $query = $this->db->insert('product_category', $data);
        if ($query) {
            $this->session->set_flashdata('success', 'Category Successfully');
            redirect('admin/add_category');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
            redirect('admin/add_category');
        }
    }

    public function display_categorym()
    {

        $query = $this->db->get('product_category');
        return $query;
    }

    public function signup($table,$data)
    {
       
        $query = $this->db->insert($table, $data);
        if ($query) {
            $this->session->set_flashdata('success', 'You are register successfully.');
            redirect('admin/signup');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
            redirect('admin/signup');
        }
    }
}
