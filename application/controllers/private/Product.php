<?php defined('BASEPATH') or exit('No direct script access allowed');
class Product extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('uid'))
			redirect('admin');
		$this->load->model('admin/ProductModel');
		$this->load->model('admin/AdminModel');
	}
	// Blogs section
	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$result['data'] = $this->AdminModel->get_category('products', 'prod_id');
		$this->load->view('admin/products/list_products', $result);
		$this->load->view('admin/footer');
	}
	public function add_product($pid = '')
	{
		$this->load->helper('common_helper');
		$this->load->library('form_validation');

		$config['upload_path'] = './uploads/products/';
		$config['allowed_types'] = 'gif|png|jpg';
		$config['max_size'] = '5000';
		$config['encrypt_name'] = true;
		$this->load->library('upload', $config);
		$this->form_validation->set_error_delimiters('<span class="invalid-feedback">', '</span>');
		$this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required');
		$this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'trim|required');
		$this->form_validation->set_rules('meta_desc', 'Meta Description', 'trim|required');
		$this->form_validation->set_rules('category_type', 'Category Type', 'trim|required');
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		$this->form_validation->set_rules('sub_category', 'Sub Category', 'trim|required');
		$this->form_validation->set_rules('main_heading', 'Main Heading', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('initial_price', 'Initial price', 'trim|required');
		$this->form_validation->set_rules('discount_price', 'Discount Price', 'trim|required');
		$this->form_validation->set_rules('byteam', 'By Team', 'trim|required');
		$productid = $this->input->post('prodid');

		if ($this->form_validation->run() == true) {
			// Generate url slug
			$product_heading = $this->input->post('main_heading');
			$slug_url = url_title($product_heading, 'dash', true);
			if (isUrlExists('products', 'prod_urls', $slug_url)) {
				$slug_url = $slug_url . '-' . time();
			}
			if (!empty($_FILES['image']['name'])) {
				if ($this->upload->do_upload('image')) {
					// image successfully uploaded here
					$data = $this->upload->data();
					// create thumbnails
					resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb_front/' . $data['file_name'], 1200, 900);
					resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb_admin/' . $data['file_name'], 300, 250);

					$formArray['prod_image'] = $data['file_name'];

					$formArray['prod_title'] = $this->input->post('meta_title');
					$formArray['prod_keywords'] = $this->input->post('meta_keyword');
					$formArray['prod_discription'] = $this->input->post('meta_desc');
					$formArray['prod_category'] = $this->input->post('category');
					$formArray['prod_sub_category'] = $this->input->post('sub_category');
					$formArray['prod_name'] = $this->input->post('month_story');
					$formArray['prod_urls'] = $slug_url;
					$formArray['prod_act_price'] = $this->input->post('month_priority');
					$formArray['prod_dist_price'] = $this->input->post('trending');
					$formArray['added_on'] = date('Y-m-d H:i:s');
					// send data to modal
					$send = $this->ProductModel->addproducts($formArray);
					if ($send) {
						$this->session->set_flashdata('success', 'Product added succefully');
						redirect(base_url('accounts/Product'));
					}
				} else {
					// selected image has some errors
					$errors = $this->upload->display_errors('<span class="invalid-feedback">', '</span>');
					$result['imageError'] = $errors;
					$this->load->view('admin/header');
					$this->load->view('admin/sidebar');
					$this->load->view('admin/products/add_product', $result);
					$this->load->view('admin/footer');
				}
			}
		} else {
			if (!empty($pid)) {
				$result['meta_title'] = '';
				$result['meta_keyword'] = '';
				$result['meta_desc'] = '';
				$result['mainheading'] = '';
				$result['discription'] = '';
				$result['auther'] = '';
				$result['cat_type'] = '';
				$result['cat_id'] = '';
				$result['initial_price'] = '';
				$result['discount_price'] = '';
				$result['productid'] = '';
				$result['section'] = 'Edit';
			} else {
				$result['meta_title'] = '';
				$result['meta_keyword'] = '';
				$result['meta_desc'] = '';
				$result['mainheading'] = '';
				$result['discription'] = '';
				$result['auther'] = '';
				$result['cat_type'] = '';
				$result['cat_id'] = '';
				$result['initial_price'] = '';
				$result['discount_price'] = '';
				$result['productid'] = '';
				$result['section'] = 'Add';
			}
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');

			$result['gtcat'] = $this->load->AdminModel->get_active_category('product_category', 'cat_id', 'catstatus');
			$result['gtsbcat'] = $this->load->AdminModel->get_active_category('sub_category', 'scat_id', 'scat_status');

			$this->load->view('admin/products/add_products', $result);
			$this->load->view('admin/footer');
		}
	}

	//Get Product Type
	public function getsubcat()
	{
		$result = $this->ProductModel->getSubCategory($this->input->post('cat_id'));
		if ($result) {
			echo '<option value="">Select sub category</option>';
			foreach ($result as $list) {
				echo '<option' . set_select('sub_category', $list->scat_id, false) . ' value=' . $list->scat_id . '>' . $list->scat_name . '</option>';
			}
		} else {
			echo '<option value="">No result found</option>';
		}
	}
}
