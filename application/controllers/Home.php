<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('CommonModel');
	}

	public function index()
	{
		$data['prod'] = $this->CommonModel->gt_homeproduct('4'); // for fetch Shop page ke lye category fetch 

		$this->load->view('index', $data);
	}

	public function index_2()
	{
		$this->load->view('index_2');
	}
	public function contact()
	{

		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[50]|regex_match[/^([a-z ])+$/i]');
		$this->form_validation->set_rules('email', 'Email Id', 'trim|required|valid_email');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|regex_match[/^[7-9][0-9]{9}$/]');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');

		if ($this->form_validation->run()) {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$mobile = $this->input->post('mobile');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');
			$created = date('d-m-Y H:i:s');

			$data = array(
				'name' => $name,
				'email' => $email,
				'mobile' => $mobile,
				'subject' => $subject,
				'message' => $message,
				'status' => '1',
				'created' =>  date('Y-m-d H:i:s'),

			);
			$send = $this->CommonModel->index('contactus', $data);
			if ($send) {
				$this->session->set_flashdata('csuccess', 'Your query has been submit successfully');
				redirect(base_url('contact'));
			} else {
				$this->session->set_flashdata('conerror', 'Somthing went wrong! Please contact your service provider');
				redirect(base_url('contact'));
			}
		} else {
			$this->load->view('contact');
		}
	}

	public function newsltr()
	{
		$this->form_validation->set_rules('nswemail', 'Email Id', 'trim|required|valid_email|is_unique[newsltr.nws_email]');
		$this->form_validation->set_message('is_unique', 'This email is already exists.');

		if ($this->form_validation->run()) {
			$email = $this->input->post('nswemail');

			$data = array(
				'nws_email' => $email,
				'created' => date('Y-m-d H:i:s'),

			);
			// print_r($data);
			// exit;
			$success = $this->CommonModel->index('newsltr', $data);
			if ($success) {
				$this->session->set_flashdata('success', 'Your request has been submit successfully.');
				echo json_encode(['success' => 'Your query has been submitted.']);
			} else {
				$errors = validation_errors();
				echo json_encode(['error' => $errors]);
			}
		} else {
			$errors = validation_errors();
			echo json_encode(['error' => $errors]);
		}
	}

	public function news()
	{
		$this->load->view('news');
	}
	public function product()
	{
		$this->load->view('product');
	}

	public function shop()
	{
		$data['cate'] = $this->CommonModel->gt_category();
		$pcat_id = 1; // for fetch home page ke lye category fetch 
		$data['prod'] = $this->CommonModel->gt_shop(); // for fetch home page ke lye category fetch 
		$this->load->view('shop', $data);
	}



	public function getperoduct()
	{
		$pcat_id = $this->input->post('category_id'); // fetch data for shop page
		$prod = $this->CommonModel->gt_shop($pcat_id); // 

		foreach ($prod as $list) { ?>
			<div class="col-lg-3 col-md-6 text-center <?= $list->cat_name ?>">
				<div class="single-product-item text-center">
					<div class="product-image">
						<a href="<?php echo base_url('product') ?>"><img src="<?php echo base_url("uploads/products/thumb_front/$list->prod_image") ?>" alt=""></a>
					</div>
					<h3><?= $list->scat_name ?></h3>
					<p class="product-price"><span>$<?= $list->prod_dist_price ?> /Kg </span> </p>
					<a href="javascript:void(0)" onclick="alert(<?= $list->prod_id ?>,<?= $list->prod_dist_price ?>,<?= $list->prod_dist_price ?>);" data-prodid="<?= $list->prod_id ?>" data-pprice="<?= $list->prod_dist_price ?>" data-pname="<?= $list->prod_name ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					<input type="hidden" name="quantity" id="qtty<?= $list->prod_id; ?>" value="1" class="quantity product-price form-control">
				</div>
			</div>
<?php
		}
	}

	public function userlogin()
	{
		$this->form_validation->set_rules('useremail', 'User Name', 'trim|required|valid_email');
		$this->form_validation->set_rules('userpassword', 'User Email', 'trim|required');
		if ($this->form_validation->run() == true) {
			$useremail = $this->input->post('useremail');
			$userpassword = $this->input->post('userpassword');

			$valid = $this->CommonModel->userlogin($useremail, $userpassword);

			if (isset($valid['0'])) {
				$status = $valid['0']->ur_status;
				$uname = $valid['0']->ur_name;
				$urid = $valid['0']->ur_id;
				if ($status == 1) {
					$this->session->set_userdata('enduser', $uname);
					$this->session->set_userdata('enduserid', $urid);
					$success = 'Your are now logged in';
					echo json_encode(['success' => $success]);
				} else {
					$errors = 'Your account deactivated';
					echo json_encode(['error' => $errors]);
				}
			} else {
				$errors = 'Please enter valid login details';
				echo json_encode(['error' => $errors]);
			}
		} else {
			$errors = validation_errors();
			echo json_encode(['error' => $errors]);
		}
	}
	public function user_regstration()
	{
		$this->form_validation->set_error_delimiters('<span class="invalid-feedback d-block">', '</span>');
		$this->form_validation->set_rules('username', 'User Name', 'trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('useremail', 'User Email', 'trim|required|valid_email|is_unique[user_registration.ur_email]');
		$this->form_validation->set_rules('usermobile', 'User Mobile', 'trim|required|min_length[10]|max_length[10]|numeric');
		$this->form_validation->set_rules('usercity', 'City', 'trim|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('userstreet1', 'Address', 'trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('userstate', 'State', 'trim|required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('usercountry', 'Country', 'trim|required|min_length[3]|max_length[10]');
		$this->form_validation->set_rules('userpin', 'Pin', 'trim|required|min_length[6]|max_length[10]');
		$this->form_validation->set_rules('userpass', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[userpass]');
		$this->form_validation->set_message('is_unique', 'This Email Already Registerd');

		if ($this->form_validation->run() == true) {
			$userdata['ur_name'] = $this->input->post('username');
			$userdata['ur_email '] = $this->input->post('useremail');
			$userdata['ur_mobile'] = $this->input->post('usermobile');
			$userdata['ur_city'] = $this->input->post('usercity');
			$userdata['ur_address'] = $this->input->post('userstreet1');
			$userdata['ur_address2'] = $this->input->post('userstreet2');
			$userdata['ur_state'] = $this->input->post('userstate');
			$userdata['ur_country'] = $this->input->post('usercountry');
			$userdata['ur_pin'] = $this->input->post('userpin');
			$userdata['ur_passward'] = $this->input->post('userpass');
			$userdata['ur_created'] = date('Y-m-d H:i:s');

			// send data to model
			$added = $this->CommonModel->add_record('user_registration', $userdata);
			if ($added) {
				$this->session->set_flashdata('usrregister', 'Registration successfull, Now you can login.');
				redirect(base_url());
			} else {
				$this->session->set_flashdata('usrerror', 'Something went wrong. Please try again.');
				redirect('user-registration');
			}
		} else {
			$this->load->view('registration');
		}
	}


	public function usrlogout()
	{
		$this->session->unset_userdata('enduser');
		// $this->session->unset_userdata('username');
		$this->session->sess_destroy();
		redirect(base_url());
	}


	public function single_news()
	{
		$this->load->view('single_news');
	}

	public function about()
	{
		$this->load->view('about');
	}
	public function error404()
	{
		$this->load->view('error404');
	}
	public function err404()
	{
		$this->load->view('404');
	}
}
