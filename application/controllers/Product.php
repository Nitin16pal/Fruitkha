<?php
class Product extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// if (!empty($this->session->userdata('enduserid')))
		// 	redirect(base_url());
		$this->load->model('CartModel');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('CommonModel');
	}

	public function cart()
	{
		$userid = $this->session->userdata('enduserid');
		$udata['cartdata'] = $this->CartModel->checkcart('user_id', $userid, 'cart');
		$this->load->view('cart', $udata);
	}

	function show_cart()
	{
		$subtotal = 0;
		$userid = $this->session->userdata('enduserid');
		$cartd = $this->CartModel->checkcart('user_id', $userid, 'cart');
		if (isset($cartd[0])) {
			foreach ($cartd as $items) {
				$total = $items->pd_price * $items->pd_quantity;
				$subtotal = $subtotal + $total;
			}
			echo $subtotal;
		}
	}

	public function checkout()
	{
		$userid = $this->session->userdata('enduserid');
		$udata['cartdata'] = $this->CartModel->checkcart('user_id', $userid, 'cart');
		$udata['couponcode'] = $this->CartModel->checkcart('shp_usrid', $userid, 'shipping_address');
		$this->load->view('checkout', $udata);
	}
	function add_to_cart()
	{
		$userid = $this->session->userdata('enduserid');
		$qty = $this->input->post('quantity');
		$price = $this->input->post('product_price');
		$subtotal = $qty * $price;
		$pd_id = $this->input->post('product_id');
		$udata['user_id'] = $userid;
		$udata['pd_id'] = $pd_id;
		$udata['pd_name'] = $this->input->post('product_name');
		$udata['pd_price'] = $price;
		$udata['pd_quantity'] = $qty;
		$udata['pd_total'] = $subtotal;
		$formArray['pd_created'] = date('Y-m-d H:i:s');

		$checkn = $this->CartModel->checkcart('user_id', $userid, 'cart', 'pd_id', $pd_id);
		if (isset($checkn[0])) {
			$updata['pd_quantity'] = $checkn[0]->pd_quantity + 1;
			$checkn = $this->CartModel->updatecart('crt_id', $checkn[0]->crt_id, $updata, 'cart');
		} else {
			$this->CartModel->adddata('cart', $udata);
			echo $this->show_cart();
		}
	}

	function updatecart()
	{
		$userid = $this->session->userdata('enduserid');
		$qty = $this->input->post('quantity');
		$price = $this->input->post('price');
		$pd_id = $this->input->post('product_id');
		$crt_id = $this->input->post('crt_id');

		$subtotal = $qty * $price;

		$udata['pd_quantity'] = $qty;
		$udata['pd_total'] = $subtotal;

		if (!empty($userid)) {
			$checkn = $this->CartModel->checkcart('user_id', $userid, 'cart', 'pd_id', $pd_id);
			if (isset($checkn[0])) {
				$checkn = $this->CartModel->updatecart('crt_id', $crt_id, $udata, 'cart', 'user_id', $userid);
				echo $this->show_cart();
			}
		}
	}

	function cartqtty()
	{
		$userid = $this->session->userdata('enduserid');
		if (!empty($userid)) {
			$cartdata = $this->CartModel->countproduct('cart', 'user_id', $userid);
			echo $cartdata;
		}
	}

	function getprice()
	{
		$userid = $this->session->userdata('enduserid');
		if (!empty($userid)) {
			$cartdata = $this->CartModel->countproduct('cart', 'user_id', $userid);
			echo $cartdata;
		}
	}

	// Apply Coupon Code

	function couponcode($couponid)
	{
		$checkn = $this->CartModel->checkcoupon('promocode', 'promo_name', $couponid, 'promo_status');
		if (isset($checkn[0])) {
			echo $couponprice = $checkn[0]->promo_price;
			$this->session->set_userdata('couponcode',$couponprice);
		} else {
			echo "Invalid Coupon or may be expired";
		}
	}

	// Insert Shipping Address

	public function shipping_address()
	{
		$this->form_validation->set_error_delimiters('<span class="invalid-feedback d-block">', '</span>');
		$this->form_validation->set_rules('shp_name', 'Name', 'trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('shp_email', 'Email', 'trim|required|valid_email|is_unique[shipping_address.shp_email]');
		$this->form_validation->set_rules('shp_mobile', 'Mobile', 'trim|required|min_length[10]|max_length[10]|numeric');
		$this->form_validation->set_rules('shp_city', 'City', 'trim|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('shp_state', 'State', 'trim|required');
		$this->form_validation->set_rules('shp_country', 'Country', 'trim|required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('shp_address', 'Address', 'trim|required|min_length[3]|max_length[10]');
		$this->form_validation->set_rules('shp_pin', 'Pin', 'trim|required|min_length[6]|max_length[10]');
		$this->form_validation->set_message('is_unique', 'This Shipping Addres Already Registerd');

		if ($this->form_validation->run() == true) {
			$userdata['shp_name'] = $this->input->post('shp_name');
			$userdata['shp_email '] = $this->input->post('shp_email');
			$userdata['shp_mobile'] = $this->input->post('shp_mobile');
			$userdata['shp_city'] = $this->input->post('shp_city');
			$userdata['shp_state'] = $this->input->post('shp_state');
			$userdata['shp_country'] = $this->input->post('shp_country');
			$userdata['shp_pin'] = $this->input->post('shp_pin');
			$userdata['shp_address'] = $this->input->post('shp_address');
			$userdata['shp_usrid'] = $this->session->userdata('enduserid');
			$userdata['created'] = date('Y-m-d H:i:s');

			// send data to model
			$added = $this->CommonModel->add_record('shipping_address', $userdata);
			if ($added) {
				echo json_encode(['success' => 'Address Added Successfully']);
			} else {
				echo json_encode(['error' => 'Somthing went Wrong Please Try again.']);
				redirect('user-registration');
			}
		} else {
			$errors = validation_errors();
			echo json_encode(['error' => $errors]);
		}
	}





	function delete_cart($table, $colid, $id, $userid, $uid)
	{
		$this->CartModel->delete_data($table, $colid, $id, $userid, $uid);
		echo $this->show_cart();
	}
}
