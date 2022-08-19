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
		$this->load->view('index');
	}
	public function cart()
	{
		$this->load->view('cart');
	}

	public function checkout()
	{
		$this->load->view('checkout');
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
				'created' => $created,

			);
			$this->CommonModel->index('contactus', $data);
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
				'created' => date('y-m-d'),

			);
			// print_r($data);
			// exit;
			$success=$this->CommonModel->index('newsltr', $data);
			if ($success) {
				$this->session->set_flashdata('success', 'Your request has been submit successfully.');
				redirect(base_url());
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Please try again.');
				redirect(base_url());
			}
		} else{
			redirect(base_url());

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
		$data['c'] = $this->CommonModel->gt_category();
		$this->load->view('shop',$data);
	}

	public function signup()
	{
		$d = date("Y-m-d H:i:s");

		$this->form_validation->set_rules('uusername', 'User Name', 'trim|required');
		$this->form_validation->set_rules('uemail', 'User Email', 'trim|required|alpha|is_unique[user.user_email]');
		$this->form_validation->set_rules('umobile', 'User Mobile', 'trim|required');
		$this->form_validation->set_rules('upassword', 'User Password', 'trim|required');
		$this->form_validation->set_message('is_unique', 'This email is already exists.');


		if ($this->form_validation->run()) {
			$uusername = $this->input->post('uusername');
			$uemail = $this->input->post('uemail');
			$umobile = $this->input->post('umobile');
			$password = $this->input->post('password');
			$this->load->model('U_signup_m');
			$this->U_signup_m->index($uusername, $uemail, $umobile, $password, $d);
		} else {
			$this->load->view('signup');
		}
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
