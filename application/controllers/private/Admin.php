<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('uid'))
			redirect('admin');
		$this->load->model('admin/AdminModel');
	}
	public function index()
	{
		$result = array();

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/index', $result);
		$this->load->view('admin/footer');
	}


	// main Categories
	public function category()
	{

		$result['data'] = $this->AdminModel->get_category('product_category', 'cat_id');
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/category', $result);
		$this->load->view('admin/footer');
	}

	//  add Category 

	public function add_category($id = '')
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('meta_title', 'Meta Title', 'trim');
		$this->form_validation->set_rules('meta_keyword', 'Meta Keywords', 'trim');
		$this->form_validation->set_rules('meta_desc', 'Meta Title', 'trim');
		$this->form_validation->set_rules('category_type', 'Category Type', 'trim|required');
		$this->form_validation->set_rules('product_desc', 'Category Description', 'trim|required');
		$upid = $this->input->post('cat_id');
		if (empty($id)) {
			$this->form_validation->set_rules('category', 'Category', 'trim|required|is_unique[product_category.cat_name]');
			$this->form_validation->set_message('is_unique', 'This Category is already exists.');
		}

		if ($this->form_validation->run()) {
			$meta_title = $this->input->post('meta_title');
			$meta_keyword = $this->input->post('meta_keyword');
			$meta_desc = $this->input->post('meta_desc');
			$category = $this->input->post('category');
			$category_type = $this->input->post('category_type');
			$product_desc = $this->input->post('category');
			$id = $this->input->post('cat_id');
			$date = date('Y-m-d H:i:s');
			$data['cat_title'] = $meta_title;
			$data['cat_keywords'] = $meta_keyword;
			$data['cat_desc'] = $meta_desc;
			$data['cat_type'] = $category_type;
			$data['cat_name'] = $category;
			$data['cat_discription'] = $product_desc;
			$data['cat_date'] = $date;

			// Generate url slug
			$slug_url = url_title($category, 'dash', true);
			// if (isUrlExists('product_category', 'cat_url', $slug_url)) {
			// 	$slug_url = $slug_url . '-' . time();
			// }
			$data['cat_url'] = $slug_url;
			if ($upid > 0) {
				$result = $this->AdminModel->update_data('product_category', $data, $upid, 'cat_id');
				if ($result) {
					$this->session->set_flashdata('success', 'Your Data Updated Successfully');
					redirect('accounts/category');
				} else {
					$this->session->set_flashdata('cerror', 'Something went wrong');
					redirect('accounts/category');
				}
			} else {
				$result = $this->AdminModel->add_data('product_category', $data);
				$this->session->set_flashdata('success', 'Your Data Added Successfully');

				redirect('accounts/category');
			}
		} else {
			if ($id != '') {
				$result = $this->AdminModel->get_category('product_category', 'cat_id', $id);
				$data['cat_title'] = $result['0']->cat_title;
				$data['cat_keyword'] = $result['0']->cat_keywords;
				$data['cat_desc'] = $result['0']->cat_desc;
				$data['category_name'] = $result['0']->cat_name;
				$data['product_desc'] = $result['0']->cat_name;
				$data['section'] = 'Edit';
				$data['id'] = $id;
			} else {
				$data['cat_title'] = '';
				$data['cat_keyword'] = '';
				$data['cat_desc'] = '';
				$data['cat_name'] = '';
				$data['category_name'] = '';
				$data['product_desc'] = '';
				$data['section'] = 'Add';
				$data['id'] = '';
			}
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/add_category', $data);
			$this->load->view('admin/footer');
		}
	}

	//  Display Sub category sub_category

	public function sub_category()
	{

		$result['data'] = $this->AdminModel->get_category('sub_category', 'scat_id');
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/sub_category', $result);
		$this->load->view('admin/footer');
	}

	//  add Category 

	public function add_sub_category($id = '')
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('meta_title', 'Meta Title', 'trim');
		$this->form_validation->set_rules('meta_keyword', 'Meta Keywords', 'trim');
		$this->form_validation->set_rules('meta_desc', 'Meta Description', 'trim');
		$this->form_validation->set_rules('category_type', 'Category Type', 'trim|required');
		$this->form_validation->set_rules('category_id', 'Category Name', 'trim|required');
		$this->form_validation->set_rules('sb_desc', 'Sub-Category Description', 'trim|required');
		$sbid = $this->input->post('subcat_id');
		if (empty($id)) {
			$this->form_validation->set_rules('sub_category', 'Sub-Category', 'trim|required|is_unique[product_category.cat_name]');
			$this->form_validation->set_message('is_unique', 'This Sub-Category is already exists.');
		}else{
			$this->form_validation->set_rules('sub_category', 'Sub-Category', 'trim|required');

		}

		if ($this->form_validation->run()) {
			$meta_title = $this->input->post('meta_title');
			$meta_keyword = $this->input->post('meta_keyword');
			$meta_desc = $this->input->post('meta_desc');
			$category_id = $this->input->post('category_id');
			$sub_category = $this->input->post('sub_category');
			$category_type = $this->input->post('category_type');
			$sb_desc = $this->input->post('sb_desc');
			$sbid = $this->input->post('subcat_id');
			$date = date('Y-m-d H:i:s');
			$data['scat_title'] = $meta_title;
			$data['scat_keywords'] = $meta_keyword;
			$data['scat_desc'] = $meta_desc;
			$data['pcat_id'] = $category_id;
			$data['scat_type'] = $category_type;
			$data['scat_name'] = $sub_category;
			$data['scat_discription'] = $sb_desc;
			$data['scat_date'] = $date;

			// Generate url slug
			$slug_url = url_title($sub_category, 'dash', true);
			// if (isUrlExists('product_category', 'cat_url', $slug_url)) {
			// 	$slug_url = $slug_url . '-' . time();
			// }
			$data['scat_url'] = $slug_url;
			if ($sbid > 0) {
				$result = $this->AdminModel->update_data('sub_category', $data, $sbid, 'scat_id');
				if ($result) {
					$this->session->set_flashdata('success', 'Your Data Updated Successfully');
					redirect('accounts/sub_category');
				} else {
					$this->session->set_flashdata('cerror', 'Something went wrong');
					redirect('accounts/sub_category');
				}
			} else {
				$result = $this->AdminModel->add_data('sub_category', $data);
				$this->session->set_flashdata('success', 'Your Data Added Successfully');
				redirect('accounts/sub_category');
			}
		} else {
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');

			if (!empty($id)) {
				$result = $this->AdminModel->get_category('sub_category', 'scat_id', $id);

				$data['scat_title'] = $result['0']->scat_title;
				$data['scat_keyword'] = $result['0']->scat_keywords;
				$data['scat_desc'] = $result['0']->scat_desc;
				$data['cat_id'] = $result['0']->pcat_id;
				$data['cat_type'] = $result['0']->scat_type;
				$data['sub_category'] = $result['0']->scat_name;
				$data['sbcat_desc'] = $result['0']->scat_discription;
				$data['section'] = 'Edit';
				$data['id'] = $id;
			} else {
				$data['scat_title'] = '';
				$data['scat_keyword'] = '';
				$data['scat_desc'] = '';
				$data['cat_id'] = '';
				$data['cat_type'] = '';
				$data['sub_category'] = '';
				$data['sbcat_desc'] = '';
				$data['section'] = 'Add';
				$data['id'] = '';
			}
			$data['gtcat'] = $this->load->AdminModel->get_active_category('product_category', 'cat_id', 'catstatus');
			$this->load->view('admin/add_sub_category', $data);
			$this->load->view('admin/footer');
		}
	}


	public function logout()
	{
		$this->session->unset_userdata('uid');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		return redirect('admin');
		// redirect(base_url('accounts/login'));
	}

	public function status($type, $table, $id, $colidname, $colname, $pagename)
	{
		$data[$colname] = $type;
		$this->AdminModel->update_data($table, $data, $id, $colidname);
		redirect(base_url() . 'accounts/' . $pagename);
	}

	public function delete($table, $id, $colidname, $pagename)
	{
		$this->AdminModel->delete_data($table, $id, $colidname);
		redirect(base_url() . 'accounts/' . $pagename);
	}


	// Display Contact Us query

	// main Categories
	public function contact_us()
	{

		$result['cdata'] = $this->AdminModel->get_category('contactus', 'id');
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/contact_queries', $result);
		$this->load->view('admin/footer');
	}
}
