<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
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
		$result['products'] = $this->ProductModel->getproducts('products', 'prod_id');
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

			$hm_show = 0;

			if ($this->input->post('hm_show')) {
				$hm_show = 1;
			}

			$dealofmonth = 0;

			if ($this->input->post('dealofmonth')) {
				$dealofmonth = 1;
			}

			$formArray['prod_title'] = $this->input->post('meta_title');
			$formArray['prod_keywords'] = $this->input->post('meta_keyword');
			$formArray['prod_discription'] = $this->input->post('meta_desc');
			$formArray['prod_type'] = $this->input->post('category_type');
			$formArray['prod_category'] = $this->input->post('category');
			$formArray['prod_sub_category'] = $this->input->post('sub_category');
			$formArray['prod_name'] = $this->input->post('main_heading');
			$formArray['prod_urls'] = $slug_url;
			$formArray['prod_decs'] = $this->input->post('description');

			$formArray['weight'] = $this->input->post('weight');
			$formArray['brand'] = $this->input->post('brand');
			$formArray['specialty_vegan'] = $this->input->post('specialty_vegan');
			$formArray['diet_tyoe_vegan'] = $this->input->post('diet_tyoe_vegan');
			$formArray['Package_weight'] = $this->input->post('Package_weight');
			$formArray['no_of_piece'] = $this->input->post('no_of_piece');
			$formArray['temprature'] = $this->input->post('temprature');
			$formArray['whole_form'] = $this->input->post('whole_form');
			$formArray['no_items'] = $this->input->post('no_items');
			$formArray['dealofmonth'] = $dealofmonth;
			$formArray['prod_seq'] = $this->input->post('prod_seq');
			$formArray['hm_show'] = $hm_show;


			$formArray['prod_act_price'] = $this->input->post('initial_price');
			$formArray['prod_dist_price'] = $this->input->post('discount_price');
			$formArray['byteam'] = $this->input->post('byteam');


			if (!empty($_FILES['image']['name'])) {
				if ($this->upload->do_upload('image')) {
					// image successfully uploaded here
					$data = $this->upload->data();
					// create thumbnails
					resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb_front/' . $data['file_name'], 1200, 900);
					resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb_admin/' . $data['file_name'], 300, 250);

					$formArray['prod_image'] = $data['file_name'];

					// send data to modal

					if (!empty($productid)) {
						$send = $this->ProductModel->updateproduct($formArray, $productid);
						if ($send) {
							$this->session->set_flashdata('success', 'Product Updated succefully');
							redirect(base_url('accounts/products'));
						}
					} else {
						$formArray['created'] = date('Y-m-d H:i:s');
						$send = $this->ProductModel->addproducts('products', $formArray);
						if ($send) {
							$this->session->set_flashdata('success', 'Product added succefully');
							redirect(base_url('accounts/products'));
						}
					}
				} else {
					// selected image has some errors // upload time error in image
					if (empty($productid)) {

						$result['meta_title'] = '';
						$result['meta_keyword'] = '';
						$result['meta_desc'] = '';
						$result['mainheading'] = '';
						$result['discription'] = '';
						$result['auther'] = '';
						$result['cat_type'] = '';
						$result['cat_id'] = '';

						$result['weight'] = '';
						$result['brand'] = '';
						$result['specialty_vegan'] = '';
						$result['diet_tyoe_vegan'] = '';
						$result['Package_weight'] = '';
						$result['no_of_piece'] = '';
						$result['temprature'] = '';
						$result['whole_form'] = '';
						$result['no_items'] = '';
						$result['prod_seq'] = '';
						$result['hm_show'] = '';
						$result['dealofmonth'] = '';

						$result['initial_price'] = '';
						$result['discount_price'] = '';
						$result['productid'] = '';
						$result['section'] = 'Add';

						$errors = $this->upload->display_errors('<span class="invalid-feedback">', '</span>');
						$result['imageError'] = $errors;
						$this->load->view('admin/header');
						$this->load->view('admin/sidebar');
						$result['gtcat'] = $this->load->AdminModel->get_active_category('product_category', 'cat_id', 'catstatus');
						$this->load->view('admin/products/add_products', $result);
						$this->load->view('admin/footer');
					} else {
						$errors = $this->upload->display_errors('<span class="invalid-feedback">', '</span>');
						$result['imageError'] = $errors;
						redirect(base_url('accounts/edit_products/' . $productid, $result));
					}
				}
			} else {
				//  if image empty then and product id is empty we can validate the image
				if (empty($productid)) {
					$result['meta_title'] = '';
					$result['meta_keyword'] = '';
					$result['meta_desc'] = '';
					$result['mainheading'] = '';
					$result['discription'] = '';
					$result['auther'] = '';
					$result['cat_type'] = '';
					$result['cat_id'] = '';

					$result['weight'] = '';
					$result['brand'] = '';
					$result['specialty_vegan'] = '';
					$result['diet_tyoe_vegan'] = '';
					$result['Package_weight'] = '';
					$result['no_of_piece'] = '';
					$result['temprature'] = '';
					$result['whole_form'] = '';
					$result['no_items'] = '';
					$result['dealofmonth'] = '';
					$result['prod_seq'] = '';
					$result['hm_show'] = '';
					$result['initial_price'] = '';
					$result['discount_price'] = '';
					$result['productid'] = '';
					$result['section'] = 'Add';

					$errors = '<span class="invalid-feedback">Please Select Image</span>';
					$result['imageError'] = $errors;
					$this->load->view('admin/header');
					$this->load->view('admin/sidebar');
					$result['gtcat'] = $this->load->AdminModel->get_active_category('product_category', 'cat_id', 'catstatus');
					$this->load->view('admin/products/add_products', $result);
					$this->load->view('admin/footer');
				} else {

					// send data to modal

					if (!empty($productid)) {
						//its not proper update we can create the after all connection
						$send = $this->ProductModel->update_data('products', $formArray, $productid, 'prod_id');
						if ($send) {
							$this->session->set_flashdata('success', 'Product Updated succefully');
							redirect(base_url('accounts/products'));
						}
					}
				}
			}
		} else {
			if (!empty($pid)) {
				$result = $this->ProductModel->fetch_data('products', 'prod_id', $pid);

				$result['meta_title'] = $result['0']->prod_title;
				$result['meta_keyword'] = $result['0']->prod_keywords;
				$result['meta_desc'] = $result['0']->prod_discription;
				$result['mainheading'] = $result['0']->prod_name;
				$result['discription'] = $result['0']->prod_decs;
				$result['auther'] = $result['0']->byteam;
				$result['cat_type'] = $result['0']->prod_type;
				$result['cat_id'] = $result['0']->prod_category;

				$result['weight'] = $result['0']->weight;
				$result['brand'] = $result['0']->brand;
				$result['specialty_vegan'] = $result['0']->specialty_vegan;
				$result['diet_tyoe_vegan'] = $result['0']->diet_tyoe_vegan;
				$result['Package_weight'] = $result['0']->Package_weight;
				$result['no_of_piece'] = $result['0']->no_of_piece;
				$result['temprature'] = $result['0']->temprature;
				$result['whole_form'] = $result['0']->whole_form;
				$result['no_items'] = $result['0']->no_items;
				$result['dealofmonth'] = $result['0']->dealofmonth;
				$result['prod_seq'] = $result['0']->prod_seq;
				$result['hm_show'] = $result['0']->hm_show;
				$result['initial_price'] = $result['0']->prod_act_price;
				$result['discount_price'] = $result['0']->prod_dist_price;
				$result['productid'] = $result['0']->prod_id;
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

				$result['weight'] = '';
				$result['brand'] = '';
				$result['specialty_vegan'] = '';
				$result['diet_tyoe_vegan'] = '';
				$result['Package_weight'] = '';
				$result['no_of_piece'] = '';
				$result['temprature'] = '';
				$result['whole_form'] = '';
				$result['no_items'] = '';
				$result['dealofmonth'] = '';
				$result['prod_seq'] = '';
				$result['hm_show'] = '';

				$result['initial_price'] = '';
				$result['discount_price'] = '';
				$result['productid'] = '';
				$result['section'] = 'Add';
			}
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$result['gtcat'] = $this->load->AdminModel->get_active_category('product_category', 'cat_id', 'catstatus');
			$this->load->view('admin/products/add_products', $result);
			$this->load->view('admin/footer');
		}
	}

	//Get Product Type
	public function getsubcat()
	{
		$cat_id = $this->input->post('cat_id');
		$tablename = $this->input->post('tablename');
		$col_id = $this->input->post('col_id');
		$col_status = $this->input->post('col_status');
		$result = $this->ProductModel->fetch_data($tablename, $col_id, $cat_id, $col_status);
		if ($result) {
			echo '<option value="">Select sub category</option>';
			print_r($result);
			foreach ($result as $list) {
				echo '<option value=' . $list->scat_id . '>' . $list->scat_name . '</option>';
			}
		} else {
			echo '<option value="">No result found</option>';
		}
	}

	public function delete($table, $id, $colidname, $pagename)
	{
		$result = $this->ProductModel->fetch_data($table, $colidname, $id);
		$blgimg = $result['0']->prod_image;
		// echo $blgimg;
		// exit;
		if (!empty($blgimg)) {
			@unlink('./uploads/' . $table . '/thumb_admin/' . $blgimg);
			@unlink('./uploads/' . $table . '/thumb_front/' . $blgimg);
			@unlink('./uploads/' . $table . '/' . $blgimg);
		}

		$delete = $this->ProductModel->delete_data($table, $id, $colidname);
		if ($delete) {
			$this->session->set_flashdata('error', "Product has been deleted successfully");
			redirect(base_url() . 'accounts/' . $pagename);
		}
	}

	public function copun()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$result['data'] = $this->ProductModel->fetch_data('promocode', 'id');
		$this->load->view('admin/copun', $result);
		$this->load->view('admin/footer');
	}

	public function add_copun($id = '')
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('product_name', 'Product Name', 'trim|required');
		$this->form_validation->set_rules('promo_name', 'Promocode Name', 'trim|required');
		$this->form_validation->set_rules('promo_price', 'Promocode Price', 'trim|required');

		if ($this->form_validation->run()) {
			$product_name = $this->input->post('product_name');
			$promo_name = $this->input->post('promo_name');
			$promo_price = $this->input->post('promo_price');
			$promo_id = $this->input->post('promo_id');
			$date = date('Y-m-d H:i:s');
			$data['prod_id'] = $product_name;
			$data['promo_name'] = $promo_name;
			$data['promo_price'] = $promo_price;
			$data['created'] = $date;
			if ($promo_id > 0) {
				$result = $this->AdminModel->update_data('promocode', $data, $promo_id, 'id');
				if ($result) {
					$this->session->set_flashdata('success', 'Your Data Updated Successfully');
					redirect('accounts/coupon');
				} else {
					$this->session->set_flashdata('cerror', 'Something went wrong');
					redirect('accounts/coupon');
				}
			} else {
				$result = $this->AdminModel->add_data('promocode', $data);
				$this->session->set_flashdata('success', 'Your Data Added Successfully');
				redirect('accounts/coupon');
			}
		} else {
			if ($id != '') {
				$result = $this->AdminModel->get_category('promocode', 'id', $id);
				$data['product_name'] = $result['0']->prod_id;
				$data['promo_name'] = $result['0']->promo_name;
				$data['promo_price'] = $result['0']->promo_price;
				$data['section'] = 'Edit';
				$data['id'] = $id;
			} else {
				$data['product_name'] = '';
				$data['promo_name'] = '';
				$data['promo_price'] = '';
				$data['section'] = 'Add';
				$data['id'] = '';
			}
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$data['product'] = $this->load->AdminModel->get_active_category('products', 'prod_id', 'status');
			$this->load->view('admin/add_copun', $data);
			$this->load->view('admin/footer');
		}
	}
}
