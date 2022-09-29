<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');

        if (!$this->session->userdata('uid'))
            redirect('admin/signin');
    }

    public function index()
    {
        // $cdate=unix_to_human($now);
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[50]|alpha_numeric_space');
        $this->form_validation->set_rules('email', 'Username', 'required|valid_email|is_unique[admin_login.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|min_length[6]|matches[password]');
        $this->form_validation->set_rules('iagree', 'I agree', 'required');
        $this->form_validation->set_message('is_unique', 'This email is already exists.');


        if ($this->form_validation->run()) {
            $name = $this->input->post('name');
            $username = $this->input->post('email');
            $password = $this->input->post('password');
            $date = date('d-m-Y H:i:s');
            $data = array(
                'name' => $name,
                'username' => $username,
                'password' => $password,
                'created' => $date,

            );
            $this->Admin_model->signup('admin_login', $data);
        } else {
            $this->load->view('admin/signup');
        }
    }

    public function dashboard()
    {
        $uid = $this->session->userdata('uid');
        $uname = $this->session->userdata('uname');
        $usrname = $this->session->userdata('username');
        $this->load->view('admin/dashboard', ['usrname' => $usrname, 'uname' => $uname, 'usrid' => $uid]);
    }

    // public function add_category()
    // {
    //     $this->load->helper('form');
    //     $this->load->library('form_validation');
    //     $d = date("Y-m-d H:i:s");

    //     $this->form_validation->set_rules('cat_types', 'Product Title', 'trim|required');
    //     $this->form_validation->set_rules('cat_name', 'Product Keywords', 'trim|required|alpha');
    //     $this->form_validation->set_rules('cat_discription', 'Product discription', 'trim|required');
    //     if ($this->form_validation->run()) {
    //         $cat_types = $this->input->post('cat_types');
    //         $cat_name = $this->input->post('cat_name');
    //         $cat_discription = $this->input->post('cat_discription');
    //         $this->Admin_model->add_categorym($cat_types, $cat_name, $cat_discription, $d);
    //     } else {
    //         $this->load->view('admin/add_category');
    //     }
    // }


    public function display_category()
    {
        $data['c'] = $this->Admin_model->display_categorym();
        $this->load->view('admin/display_category', $data);
    }

    public function add_prodcut()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('prod_title', 'Product Title', 'trim');
        $this->form_validation->set_rules('prod_keywords', 'Product Keywords', 'trim');
        $this->form_validation->set_rules('prod_discription', 'Product discription', 'trim');
        $this->form_validation->set_rules('product_cat', 'Product Category', 'trim|required');
        $this->form_validation->set_rules('product_sbcat', 'Product Sub-Category', 'trim|required');
        $this->form_validation->set_rules('prod_name', 'Product Name', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('act_price', 'Actual Price', 'trim|required');
        $this->form_validation->set_rules('best_price', 'Best Price', 'trim|required');
        if ($this->form_validation->run()) {
            $prod_title = $this->input->post('prod_title');
            $prod_keywords = $this->input->post('prod_keywords');
            $prod_discription = $this->input->post('prod_discription');
            $product_cat = $this->input->post('product_cat');
            $product_sbcat = $this->input->post('product_sbcat');
            $prod_name = $this->input->post('prod_name');
            $act_price = $this->input->post('act_price');
            $best_price = $this->input->post('best_price');
            // $prod_image = $this->input->post('prod_image');
            $prod_seq = $this->input->post('prod_seq');
            $prod_image = mt_rand(1, 10000) . $_FILES['prod_image']['name'];

            //  image uploads
            $config = array(
                'upload_path' => "./uploads/products/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => false,
                // 'encrypt_name' => true,
                'remove_spaces' => true,
                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "900",
                'max_width' => "1200",
            );

            $this->load->library('upload', $config);
            // $path = $config['upload_path'];


            if ($this->upload->do_upload('prod_image')) {
                $data = $this->upload->data();
                $pimage = $data['file_name'];
                $this->Admin_model->add_productm($prod_title, $prod_keywords, $prod_discription, $product_cat, $product_sbcat, $prod_name, $act_price, $best_price, $pimage, $prod_seq);
            }
        } else {
            $this->load->view('admin/addproduct');
        }
    }

    public function display_product()
    {
        // $this->load->helper('common_helper');
        $data['h'] = $this->Admin_model->display_productm();
        $this->load->view('admin/display_product', $data);
    }
}
