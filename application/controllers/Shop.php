<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//////////////////////////////////////////////////  USER AREA SECURED /////////////////////////////////////////////////////////

class Shop extends CI_Controller {

	public function index(){
		$this->load->model('user');
		$this->load->view('spectator/header');
		$this->load->view('spectator/homelogo');
		$this->load->view('spectator/home');
		$this->load->view('spectator/footer');
	}

	public function unset_all(){
		session_destroy();
		redirect('/');
	}

	public function view($offset, $x, $limit, $category){
		$this->load->model('admin');
		$this->load->model('user');
		$fashionRowCount = $this->admin->get_clothing_row($category); // rowcount
		$data['fashionRow'] = $fashionRowCount;
		$data['activePage'] = $x;
		$data['category'] = $category;
		if ($fashionRowCount > 0 && !empty($fashionRowCount)): //if row count is greater than 9 and not empty
				$data['fashion'] = $this->admin->get_clothing($offset, $limit, $category);
		endif;
		$this->load->view('spectator/header');
		$this->load->view('spectator/homelogo');
		$this->load->view('spectator/view', $data);
		$this->load->view('spectator/footer');
	}

	public function search()
	{
		$this->load->model('user');
		if (isset($_POST['search'])) :
			$search = $this->user->protect($_POST['search']);
			$searchResult = $this->user->getSearch($search);
			$data['fashionRow'] = count($searchResult);
			$data['searchtext'] = $search;
			$data['fashion'] = $searchResult;
			$data['search'] = true;
			$this->load->view('spectator/header');
			$this->load->view('spectator/homelogo');
			$this->load->view('spectator/search', $data);
			$this->load->view('spectator/footer');
		endif;
	}

	public function cart($prod_id, $color, $size){
		$this->load->model('user');
		$data['prod_id'] = $prod_id;
		$data['color'] = $color;
		$data['size'] = $size;
		$this->load->view('spectator/header');
		$this->load->view('spectator/homelogo');
		$this->load->view('spectator/cart', $data);
		$this->load->view('spectator/footer');
	}
	public function cart_view(){
		$this->load->model('user');
		$this->load->view('spectator/header');
		$this->load->view('spectator/homelogo');
		$this->load->view('spectator/cart');
		$this->load->view('spectator/footer');
	}
	public function shipping_fee(){
		if (isset($_POST['ship_fee'])):
			$shipping_fee = $_POST['ship_fee'];
			if ($shipping_fee == 'FREE'):
				$province = $_POST['province'];
				$city = $_POST['city'];
				$brgy = $_POST['brgy'];
				$total_finale = $_POST['subtotal'];
				$total = number_format($total_finale, 2);
				$_SESSION['total'] = $total;
				$_SESSION['shipping_fee'] = $shipping_fee;
				$_SESSION['province'] = $province;
				$_SESSION['city'] = $city;
				$_SESSION['brgy'] = $brgy;
			else:
				$province = $_POST['province'];
				$city = $_POST['city'];
				$brgy = $_POST['brgy'];
				$total_finale = $_POST['total'];
				$total = number_format($total_finale, 2);
				$_SESSION['total'] = $total;
				$_SESSION['shipping_fee'] = $_POST['ship_fee'];
				$_SESSION['province'] = $province;
				$_SESSION['city'] = $city;
				$_SESSION['brgy'] = $brgy;
			endif;
		else:
			if (isset($_POST['total_pay'])):
				unset($_SESSION['shipping_fee']);
				$total_finale = $_POST['total_pay'];
				$total = number_format($total_finale, 2);
				$_SESSION['total'] = $total;
			else:
				$total_finale = $_POST['subtotal'];
				$total = number_format($total_finale, 2);
				$_SESSION['total'] = $total;
			endif;
		endif;
		echo "&#8369; ".$total;
	}
	public function ship_fee_default(){
		echo $_SESSION['shipping_fee'];
	}
	public function shippers_fname(){
		if (isset($_POST['name'])):
			$shippers_fname = $_POST['name'];
			$_SESSION['shippers_fname'] = $shippers_fname;
		else:
			unset($_SESSION['shippers_fname']);
		endif;
	}
	public function shippers_lname(){
		if (isset($_POST['name'])):
			$shippers_lname = $_POST['name'];
			$_SESSION['shippers_lname'] = $shippers_lname;
		else:
			unset($_SESSION['shippers_lname']);
		endif;
	}
	public function shippers_mname(){
		if (isset($_POST['name'])):
			$shippers_mname = $_POST['name'];
			$_SESSION['shippers_mname'] = $shippers_mname;
		else:
			unset($_SESSION['shippers_mname']);
		endif;
	}
	public function shippers_address(){
		if (isset($_POST['address'])):
			$shippers_address= $_POST['address'];
			$_SESSION['shippers_address'] = $shippers_address;
		else:
			unset($_SESSION['shippers_address']);
		endif;
	}
	public function shippers_phone(){
		if (isset($_POST['phone'])):
			$shippers_phone= $_POST['phone'];
			$_SESSION['shippers_phone'] = $shippers_phone;
		else:
			unset($_SESSION['shippers_phone']);
		endif;
	}
	public function shippers_random(){
		if (isset($_POST['method'])):
			$trx_number = mt_rand();
			$method = $_POST['method'];
			if ($method == 'Palawan' || $method == 'Cebuana' || $method == 'LBC' || $method == 'Western Union'):
				$_SESSION['method'] = $method;
				$_SESSION['status'] = 'Pending';
			else:
				$_SESSION['method'] = 'PayPal';
				$_SESSION['status'] = 'Completed';
			endif;
			$_SESSION['trx_number'] = $trx_number;
		endif;
	}
	public function payment(){
		if (isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) >= 1) :
			$this->load->model('user');
			$this->load->view('spectator/header');
			$this->load->view('spectator/homelogo');
			$this->load->view('spectator/payment');
			$this->load->view('spectator/footer');
		else:
			redirect('/');
		endif;
	}

	public function update_qty(){
		if (isset($_POST['qty'])):
			$item_to_adjust = $this->input->post('prod_id');
			$quantity = $this->input->post('qty');
			$prod_color = $this->input->post('color');
			$prod_size = $this->input->post('size');
			$this->load->model('user');
			$num_of_stocks = $this->user->getNumOfStocks($item_to_adjust);
			$data = array('quantity' => $quantity, 'item_to_adjust' => $item_to_adjust, 'prod_color' => $prod_color,
						  'prod_size' => $prod_size, 'num_of_stocks' => $num_of_stocks);
			$this->load->view('spectator/header');
			$this->load->view('spectator/homelogo');
			$this->load->view('spectator/cart', $data);
			$this->load->view('spectator/footer');
		endif;
	}

	public function remove_item($prod_id){
		$data['index_to_remove'] = $prod_id;
		$this->load->model('user');
		$this->load->view('spectator/header');
		$this->load->view('spectator/homelogo');
		$this->load->view('spectator/cart', $data);
		$this->load->view('spectator/footer');
	}
	public function shipping(){
		if (isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) >= 1) :
			$this->load->model('user');
			$this->load->view('spectator/header');
			$this->load->view('spectator/homelogo');
			$this->load->view('spectator/shipping');
			$this->load->view('spectator/footer');
		else:
			redirect('/');
		endif;
	}
	public function orders(){
		if (isset($_SESSION['username'])) :
			$this->load->model('user');
			$this->load->view('spectator/header');
			$this->load->view('spectator/homelogo');
			$this->load->view('spectator/orders');
			$this->load->view('spectator/footer');
		else:
			redirect('/');
		endif;
	}
	public function chat(){
		$this->load->model('user');
		if (isset($_SESSION['username'])):
			if (isset($_POST['msg'])):
			$this_msg =  $_POST['msg'];
			$msg = $this->user->protect($this_msg);
			$user = $_SESSION['username'];
			$user_result = $this->user->get_chat_user($user);
			if (!empty($user_result)):
				foreach ($user_result as $row):
						$user_id = $row['user_id'];
						$username = $row['username'];
						$gender = $row['gender'];
						$profile = $row['profile'];
				endforeach;
				$data = array('user_id' => $user_id, 'username' => $username, 'msg' => $msg, 'gender' => $gender, 'profile' => $profile);
				$this->user->insert_chat($data);
			endif;
		endif;
		else:
			echo "login_first";
		endif;
	}
	public function chat_display(){
		$this->load->model('user');
		if (isset($_SESSION['username'])):
			$user = $_SESSION['username'];
			$chat_logs = $this->user->get_chat($user);
			foreach ($chat_logs as $row):
				$chat_id = $row['chat_id'];
				$user_id = $row['user_id'];
				$username = $row['username'];
				$msg = $row['msg'];
				$gender = $row['gender'];
				$profile = $row['profile'];
				$status = $row['status'];
				if (strlen($username) > 20):
					$new_username = substr($username, 0,20);
					$username = "$new_username....";
				endif;
				//for chat date only vey long code...
				$chat_date = $row['chat_date'];
				$yr = substr($chat_date, 0,4);
				$mnth = substr($chat_date, 5,2);
				$dy = substr($chat_date, 8,2);
				$hr = substr($chat_date, 11,2);
				$min = substr($chat_date, 14,2);
				$date_full_year = substr($chat_date, 0,10);
				$todays_date = date("Y-m-d");
				$date_full = date_create($date_full_year);
				$today = date_create($todays_date);
				$date_diff = date_diff($date_full, $today);
				$date_difference = $date_diff->format("%a");
				if ($date_difference == 0):
					$chatting_date = 'Today';
				elseif ($date_difference == 1):
					$chatting_date = 'Yesterday';
				else:
					$chatting_date = date("M d, Y",mktime(0,0,0,$mnth,$dy,$yr));
				endif;
				$chat_time = date("h:ia",mktime($hr,$min,0,0,0,0));
				//end of chat date code....

				if ($status == 'user'):
					if (!empty($profile)):
						echo '<div class="row" id="chat_body">
									<div class="col-sm-12" id="user_nameAndDate">
										<p id="chat_user_name">' . $username . '</p>
										<span id="chat_user_date" class="pull-right">' . $chatting_date .' <span id="chat_user_time">' . $chat_time . '</span></span>
									</div>
									<div class="col-sm-3 col-xs-4" id="user_image_container">
										<div id="user_icon" align="center">
											<img src="' . base_url() . '/images/users/' . $profile . '" class="img-responsive" alt="">
										</div>
									</div>
									<div style="font-size:12px;" class="col-sm-9 col-xs-8" id="chat_msg_body">
										<p>' . $msg .'</p>
									</div>
									</div>';
					else:
						echo '<div class="row" id="chat_body">
									<div class="col-sm-12" id="user_nameAndDate">
										<p id="chat_user_name">' . $username . '</p>
										<span id="chat_user_date" class="pull-right">' . $chatting_date .' <span id="chat_user_time">' . $chat_time . '</span></span>
									</div>
									<div class="col-sm-3 col-xs-4" id="user_image_container">
										<div id="user_icon" align="center">
											<span class="glyphicon glyphicon-user"></span>
										</div>
									</div>
									<div style="font-size:12px;" class="col-sm-9 col-xs-8" id="chat_msg_body">
										<p>' . $msg .'</p>
									</div>
									</div>';
					endif;
				else:
					echo '<div class="row" id="chat_body">
								  <div class="col-sm-12" id="user_nameAndDate">
								    <span id="chat_user_date">' . $chatting_date .' <span id="chat_user_time">' . $chat_time . '</span></span>
								    <span id="chat_user_name"  class="pull-right">Store<span id="chat_we_label" class="label label-info pull-right">ADMIN</span></span>
								  </div>
								  <div class="col-sm-9 col-xs-8" id="chat_msg_admin_body">
								    <p>' . $msg .'</p>
								  </div>
								  <div class="col-sm-3 col-xs-4" id="us_image_container">
								    <img src="' . base_url() . '/images/users/user-12.jpg" class="img-responsive" alt="">
								  </div>
								</div>';
				endif;
			endforeach;
		endif;
	}
	public function notify_msg(){
		$this->load->model('user');
		if (isset($_SESSION['username'])):
			$user = $_SESSION['username'];
			$msg_indicator = $this->user->num_of_msgs($user);
			if ($msg_indicator >= 1):
				echo "$msg_indicator messages";
			else:
				echo "$msg_indicator messages";
			endif;
		else:
			echo "0 messages";
		endif;
	}

	public function success(){
		if (!isset($_SESSION['method']) || isset($_GET['tx']) || isset($_GET['st'])) :
			$this->load->model('user');
			$data['remitance'] = 'ok';
			$this->load->view('spectator/header');
			$this->load->view('spectator/homelogo', $data);
			$this->load->view('spectator/success', $data);
			$this->load->view('spectator/footer');
		else:
			redirect('/');
		endif;
	}
	public function order_view(){
		if (isset($_SESSION['username'])):
			echo "good";
		else:
			echo "bad";
		endif;
	}
	public function signup_chk_name(){
		if (isset($_POST['name'])):
			$name = $_POST['name'];
			if (!preg_match("/^[a-zA-Z ]*$/",$name)):
			  echo "bad";
			else:
			  echo "good";
			endif;
		endif;
	}
	public function signup_chk_email(){
		if (isset($_POST['user_email'])):
			$user_email = $_POST['user_email'];
			if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)):
			  echo "bad";
			else:
			  echo "good";
			endif;
		endif;
	}

	public function username_signup_chk(){
		if (isset($_POST['username'])):
			$username = $_POST['username'];
			$this->load->model('user');
			$userExist = $this->user->chk_username_signup($username);
			if ($userExist >= 1):
				echo "bad";
			else:
				echo "good";
			endif;
		endif;
	}

	public function sign_up(){
		$this->load->model('user');
		if (isset($_POST['first_name'])):
			if ($_POST['password'] != $_POST['re_type_pass']):
				redirect('/');
			else:
				$avatar = $this->user->protect($this->input->post('users_avatar'));

				$first_name = $this->user->protect($this->input->post('first_name'));
				$last_name = $this->user->protect($this->input->post('last_name'));
				$middle_name = $this->user->protect($this->input->post('middle_name'));
				$username = $this->user->protect($this->input->post('username'));
				$email = $this->user->protect($this->input->post('user_email'));
				$password = $this->user->protect($this->input->post('password'));
				$re_type_pass = $this->user->protect($this->input->post('re_type_pass'));
				$gender = $this->user->protect($this->input->post('gender'));
				$phone = $this->user->protect($this->input->post('phone'));
				$data = array('first_name' => $first_name, 'last_name' => $last_name, 'middle_name' => $middle_name, 'username' => $username, 'email' => $email, 'gender' => $gender, 'profile' => $avatar, 'phone' => $phone, 'password' => md5($password));
				$data_sg['ty_signup'] = 'sign_up';
				$this->user->insert_user($data);
				$this->load->view('spectator/header');
				$this->load->view('spectator/homelogo');
				$this->load->view('spectator/home',$data_sg);
				$this->load->view('spectator/footer');
			endif;
		else:
			redirect('/');
		endif;
	}

	public function edit_profile(){
		$this->load->model('user');
		if (isset($_POST['first_name_e'])):
			if ($_POST['password_e'] != $_POST['re_type_pass_e']):
				redirect('/');
			else:
				$avatar = $this->user->protect($this->input->post('users_avatar_e'));

				$first_name = $this->user->protect($this->input->post('first_name_e'));
				$last_name = $this->user->protect($this->input->post('last_name_e'));
				$middle_name = $this->user->protect($this->input->post('middle_name_e'));
				$username = $this->user->protect($this->input->post('username_e'));
				$email = $this->user->protect($this->input->post('user_email_e'));
				$password = $this->user->protect($this->input->post('password_e'));
				$re_type_pass = $this->user->protect($this->input->post('re_type_pass_e'));
				$gender = $this->user->protect($this->input->post('gender_e'));
				$phone = $this->user->protect($this->input->post('phone_e'));
				$data = array('first_name' => $first_name, 'last_name' => $last_name, 'middle_name' => $middle_name, 'username' => $username, 'email' => $email, 'gender' => $gender, 'profile' => $avatar, 'phone' => $phone, 'password' => md5($password));
				$update_chatbox = array('username' => $username, 'gender' => $gender, 'profile' => $avatar);
				$update_profile['profile_update'] = 'profile_update';
				$user = $_SESSION['username'];
				$_SESSION['username'] = $username;
				$this->user->edit_user_profile($data, $user);
				$this->user->update_chatRoom($update_chatbox, $user);
				$this->load->view('spectator/header');
				$this->load->view('spectator/homelogo');
				$this->load->view('spectator/home',$update_profile);
				$this->load->view('spectator/footer');
			endif;
		else:
			redirect('/');
		endif;
	}

	public function remove(){
		if (isset($_POST['ordered_id'])) {
			$ordered_id = $_POST['ordered_id'];
			$this->load->model('admin');
			$data['buy_item'] = $this->admin->buy_now($ordered_id);
			$index_to_remove = $_POST['index_to_remove'];
			$data['index_to_remove'] = $index_to_remove;
			$this->load->view('spectator/header');
			$this->load->view('spectator/logo');
			$this->load->view('spectator/testcart', $data);
		}
	}

	public function upload_avatar(){
		$uploaded = array();
				if (!empty($_FILES['file']['name'][0])):
					foreach ($_FILES['file']['name'] as $position => $name):
								$config['upload_path'] = APPPATH . "../images/users/$name";
								if (move_uploaded_file($_FILES['file']['tmp_name'][$position], $config['upload_path'])):
									$uploaded[] = array(
									'name' => $name,
									'file' => 'images/users/' . $name
									);
								endif;
					endforeach;
				endif;
		echo json_encode($uploaded);
	}

	public function review(){
		if (isset($_SESSION['username'])):
			$this->load->model('user');
			$user = $_SESSION['username'];
			$review_user = $this->user->get_review_user($user);
			$user_id = $review_user->user_id;
			$username = $review_user->username;
			$profile = $review_user->profile;
			if (isset($_POST['details'])):
				$details = $this->user->protect($_POST['details']);
				$title = $this->user->protect($_POST['title']);
				$rating = $this->user->protect($_POST['rating']);
				$prod_id = $this->user->protect($_POST['prod_id']);

				$data = array('details' => $details, 'title' => $title, 'rating' => $rating,
							  'prod_id' => $prod_id, 'user_id' => $user_id, 'username' => $username, 'profile' => $profile);
				$this->user->insert_prod_review($data);
			endif;
			echo "good";
		else:
			echo "Please login first in order to create your review.";
		endif;
	}

	public function profile(){
		$data['profile'] = 'edit';
		$this->load->model('user');
		$this->load->view('spectator/header');
		$this->load->view('spectator/homelogo');
		$this->load->view('spectator/home', $data);
		$this->load->view('spectator/footer');
	}

	public function feedback(){
		if (isset($_SESSION['username'])) :
			$this->load->model('user');
			if (isset($_POST['feedback_title'])) :
				$feedback_title = $_POST['feedback_title'];
				$feedback_details = $_POST['feedback_details'];
				$user_profile = $_POST['user_profile'];
				$feed_username = $_POST['feed_username'];
				$data = array('username' => $feed_username, 'title' => $feedback_title, 'details' => $feedback_details, 'profile' => $user_profile);
				$this->user->insert_feedback($data);
				$feed['user_feedback'] = 'user_feedback';
				$this->load->view('spectator/header');
				$this->load->view('spectator/homelogo', $feed);
				$this->load->view('spectator/home');
				$this->load->view('spectator/footer');
			endif;
		endif;
	}

	public function news(){
		if (isset($_POST['news_email'])) :
			$this->load->model('user');
			$news_email = $this->user->protect($_POST['news_email']);
			$gender = $this->user->protect($_POST['optradio']);
			$data = array('email' => $news_email, 'gender' => $gender);
			$this->user->insert_email($data);
			$news['news_email'] = 'success';
			$this->load->view('spectator/header');
			$this->load->view('spectator/homelogo', $news);
			$this->load->view('spectator/home');
			$this->load->view('spectator/footer');
		endif;
	}

	public function testimonials()
	{
		$this->load->model('user');
		$data['testimonials'] = $this->user->getTestimonials();
		$this->load->view('spectator/header');
		$this->load->view('spectator/homelogo', $data);
		$this->load->view('spectator/testimonials');
		$this->load->view('spectator/footer');
	}




	public function logout(){
		if (isset($_SESSION['username'])) :
			unset($_SESSION['username']);
		endif;
		redirect('/');
	}





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////															  ADMIN AREA OFF LIMITS	 																/////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





	public function errors($message, $succ = 'success', $paragraph)
	{
		$this->session->set_flashdata($message, $succ = "<div class='alert fade in alert-" . $succ . "'>" . $paragraph . "<button type='button' class='close fade in' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> </div>");
	}
	public function login(){
		$this->load->model('user');
		if (isset($_SESSION['username']) || isset($_SESSION['admin'])) :
			$data['msg'] = 'Sorry someone is currently logged in, Please logout first in order to login';
			$this->load->view('spectator/header');
			$this->load->view('spectator/homelogo', $data);
			$this->load->view('spectator/home');
			$this->load->view('spectator/footer');
		else:
			if (isset($_POST['login_username']) && isset($_POST['login_password'])):
					$this->load->model('admin');
					$username = $this->user->protect($this->input->post('login_username'));
					$password = $this->user->protect($this->input->post('login_password'));
					$data = array('username' => $username, 'password' => md5($password));
					$exist = $this->user->seeUser($data);
					if ($exist >= 1):
						$_SESSION['username'] = $username;
						$avatar = $this->user->get_avatar($username);
						$data['avatar'] = $avatar->profile;
						$data['user_login'] = $username;
						$this->load->view('spectator/header');
						$this->load->view('spectator/homelogo', $data);
						$this->load->view('spectator/home');
						$this->load->view('spectator/footer');
					else:
						$result = $this->admin->checkAdmin($data);
						$data['result'] = $result;
						if ($result >= 1):
							$_SESSION['admin'] = $username;
							$activity = 'Logged In';
							$status = 'Logged_in';
							$this->admin->logs($activity, $status);
							$this->errors('message', 'success', 'Welcome Back Admin " ' . $username . ' "');
							$data['admin'] = 'admin';
							$this->load->view('spectator/header');
							$this->load->view('manage/storename', $data);
							$this->load->view('manage/admin_home');
							$this->load->view('manage/new_users');
							$this->load->view('manage/footer');
						else:
							$data['user_failed'] = 'failed';
							$this->load->view('spectator/header');
							$this->load->view('spectator/homelogo', $data);
							$this->load->view('spectator/home');
							$this->load->view('spectator/footer');
						endif;
					endif;
			endif;
		endif;
	}

	public function admin_chat(){
		$this->load->model('user');
		if (isset($_SESSION['admin'])):
			if (isset($_POST['user'])):
				$this_user = $_POST['user'];
				$msg = $_POST['msg'];
				$chk_username = $this->user->chk_user($this_user);
				if ($chk_username <= 0):
					echo "do_not_exist";
					return;
				else:
					$get_user = $this->user->get_recepient($this_user);
					foreach ($get_user as $row):
						$user_id = $row['user_id'];
						$username = $row['username'];
						$gender = $row['gender'];
						$profile = $row['profile'];
					endforeach;
					$data = array('user_id' => $user_id, 'username' => $username, 'msg' => $msg, 'gender' => $gender, 'profile' => $profile, 'status' => 'admin');
					$this->user->insert_chat($data);
					$_SESSION['recepient'] = $this_user;
				endif;
			endif;
		else:
			echo "login_first";
		endif;
	}

	public function chat_admin_display(){
		$this->load->model('user');
		if (isset($_SESSION['admin']) && isset($_SESSION['recepient'])):
			$user = $_SESSION['recepient'];
			$chat_logs = $this->user->get_chat($user);
			foreach ($chat_logs as $row):
				$chat_id = $row['chat_id'];
				$user_id = $row['user_id'];
				$username = $row['username'];
				$msg = $row['msg'];
				$gender = $row['gender'];
				$profile = $row['profile'];
				$status = $row['status'];
				if (strlen($username) > 20):
					$new_username = substr($username, 0,20);
					$username = "$new_username....";
				endif;
				//for chat date only vey long code...
				$chat_date = $row['chat_date'];
				$yr = substr($chat_date, 0,4);
				$mnth = substr($chat_date, 5,2);
				$dy = substr($chat_date, 8,2);
				$hr = substr($chat_date, 11,2);
				$min = substr($chat_date, 14,2);
				$date_full_year = substr($chat_date, 0,10);
				$todays_date = date("Y-m-d");
				$date_full = date_create($date_full_year);
				$today = date_create($todays_date);
				$date_diff = date_diff($date_full, $today);
				$date_difference = $date_diff->format("%a");
				if ($date_difference == 0):
					$chatting_date = 'Today';
				elseif ($date_difference == 1):
					$chatting_date = 'Yesterday';
				else:
					$chatting_date = date("M d, Y",mktime(0,0,0,$mnth,$dy,$yr));
				endif;
				$chat_time = date("h:ia",mktime($hr,$min,0,0,0,0));
				//end of chat date code....

				if ($status == 'user'):
					if (!empty($profile)):
						echo '<div class="row" id="chat_body">
									<div class="col-sm-12" id="user_nameAndDate">
										<p id="chat_user_name">' . $username . '</p>
										<span id="chat_user_date" class="pull-right">' . $chatting_date .' <span id="chat_user_time">' . $chat_time . '</span></span>
									</div>
									<div class="col-sm-3 col-xs-4" id="user_image_container">
										<div id="user_icon" align="center">
											<img src="' . base_url() . '/images/users/' . $profile . '" class="img-responsive" alt="">
										</div>
									</div>
									<div style="font-size:12px;" class="col-sm-9 col-xs-8" id="chat_msg_body">
										<p>' . $msg .'</p>
									</div>
									</div>';
					else:
						echo '<div class="row" id="chat_body">
									<div class="col-sm-12" id="user_nameAndDate">
										<p id="chat_user_name">' . $username . '</p>
										<span id="chat_user_date" class="pull-right">' . $chatting_date .' <span id="chat_user_time">' . $chat_time . '</span></span>
									</div>
									<div class="col-sm-3 col-xs-4" id="user_image_container">
										<div id="user_icon" align="center">
											<span class="glyphicon glyphicon-user"></span>
										</div>
									</div>
									<div style="font-size:12px;" class="col-sm-9 col-xs-8" id="chat_msg_body">
										<p>' . $msg .'</p>
									</div>
									</div>';
					endif;
				else:
					echo '<div class="row" id="chat_body">
								  <div class="col-sm-12" id="user_nameAndDate">
								    <span id="chat_user_date">' . $chatting_date .' <span id="chat_user_time">' . $chat_time . '</span></span>
								    <span id="chat_user_name"  class="pull-right">Store<span id="chat_we_label" class="label label-info pull-right">ADMIN</span></span>
								  </div>
								  <div class="col-sm-9 col-xs-8" id="chat_msg_admin_body">
								    <p>' . $msg .'</p>
								  </div>
								  <div class="col-sm-3 col-xs-4" id="us_image_container">
								    <img src="' . base_url() . '/images/users/user-12.jpg" class="img-responsive" alt="">
								  </div>
								</div>';
				endif;
			endforeach;
		endif;
	}

	public function admin_notify_msg(){
		$this->load->model('user');
		if (isset($_SESSION['admin']) && isset($_SESSION['recepient'])):
			$user = $_SESSION['recepient'];
			$msg_indicator = $this->user->num_of_msgs($user);
			if ($msg_indicator >= 1):
				echo "$msg_indicator messages";
			else:
				echo "$msg_indicator messages";
			endif;
		else:
			echo "0 messages";
		endif;
	}


	public function add_products(){
		$this->load->model('admin');
		$this->load->view('spectator/header');
		$this->load->view('manage/storename');
		$this->load->view('manage/add_products');
		$this->load->view('manage/new_users');
		$this->load->view('javascript/add_products');
		$this->load->view('manage/footer');
	}
	public function admin_home(){
		$this->load->model('admin');
		$this->load->view('spectator/header');
		$this->load->view('manage/storename');
		$this->load->view('manage/admin_home');
		$this->load->view('manage/new_users');
		$this->load->view('manage/footer');
	}
	public function upload(){
		$uploaded = array();
				if (!empty($_FILES['file']['name'][0])):
					foreach ($_FILES['file']['name'] as $position => $name):
								$config['upload_path'] = APPPATH . "../images/products/$name";
								if (move_uploaded_file($_FILES['file']['tmp_name'][$position], $config['upload_path'])):
									$uploaded[] = array(
									'name' => $name,
									'file' => '../images/products/' . $name
									);
								endif;
					endforeach;
				endif;
		echo json_encode($uploaded);
	}
	public function preview($action, $id){
		$this->load->model('admin');
		$data['action'] = $action;
		$data['id'] = $id;
		$this->load->view('spectator/header');
		$this->load->view('manage/storename');
		$this->load->view('manage/preview', $data);
		$this->load->view('manage/new_users');
		$this->load->view('manage/footer');
	}
	public function save(){
		if (isset($_POST['category'])):
			$category = $this->input->post('category');
			$prod_name = $this->input->post('prod_name');
					$this->load->model('supervised');
					$this->load->model('admin');
					$data = $this->supervised->save($category);
					$this->admin->insert_product($data);
					$activity = 'Added "' . $prod_name . '"';
					$status = 'Added';
					$this->admin->logs($activity, $status);
					$this->errors('message', 'success', 'Added "' . $prod_name . '"');
					redirect('shop/admin_home');
		endif;
	}
	public function save_update($prod_id){
		if (isset($_POST['category'])):
			$category = $this->input->post('category');
			$prod_name = $this->input->post('prod_name');
					$this->load->model('supervised');
					$this->load->model('admin');
					$data = $this->supervised->save($category);
					$this->admin->update($data, $prod_id);
					$activity = 'Updated"' . $prod_name . '"';
					$status = 'Updated';
					$this->admin->logs($activity, $status);
					$this->errors('message', 'success', 'Updated "' . $prod_name . '"');
					redirect('shop/admin_home');
		endif;
	}
	public function update(){
		$this->load->model('admin');
		$this->load->view('spectator/header');
		$this->load->view('manage/storename');
		$this->load->view('manage/update');
		$this->load->view('manage/new_users');
		$this->load->view('manage/footer');
	}
	public function fashion($offset, $x, $limit, $category){
		$this->load->model('admin');
		$fashionRowCount = $this->admin->get_clothing_row($category); // rowcount
		$data['fashionRow'] = $fashionRowCount;
		$data['activePage'] = $x;
		if ($fashionRowCount > 0 && !empty($fashionRowCount)): //if row count is greater than 9 and not empty
				$data['fashion'] = $this->admin->get_clothing($offset, $limit, $category);
		endif;
		$this->load->view('spectator/header');
		$this->load->view('manage/storename');
		$this->load->view('manage/fashion', $data);
		$this->load->view('manage/new_users');
		$this->load->view('manage/footer');
	}
		public function clothing($offset){
		$this->load->model('admin');
		$data['fashion'] = $this->admin->get_clothing($offset);
		$this->load->view('spectator/header');
		$this->load->view('manage/storename');
		$this->load->view('manage/fashion', $data);
		$this->load->view('manage/new_users');
		$this->load->view('manage/footer');
	}
	public function delete(){
		$this->load->model('admin');
		$this->load->view('spectator/header');
		$this->load->view('manage/storename');
		$this->load->view('manage/delete');
		$this->load->view('manage/new_users');
		$this->load->view('manage/footer');
	}
	public function fashion_del($offset, $x, $limit, $category){
		$this->load->model('admin');
		$fashionRowCount = $this->admin->get_clothing_row($category); // rowcount
		$data['fashionRow'] = $fashionRowCount;
		$data['activePage'] = $x;
		$data['category'] = $category;
		if ($fashionRowCount > 0 && !empty($fashionRowCount)): //if row count is greater than 9 and not empty
				$data['fashion'] = $this->admin->get_clothing($offset, $limit, $category);
		endif;
		$this->load->view('spectator/header');
		$this->load->view('manage/storename');
		$this->load->view('manage/fashion_del', $data);
		$this->load->view('manage/new_users');
		$this->load->view('manage/footer');
	}
	public function delete_now($prod_id, $prod_name){
		$this->load->model('admin');
		$this->admin->delete($prod_id);
		$activity = 'Deleted "' . $prod_name . '"';
		$status = 'Deleted';
		$this->admin->logs($activity, $status);
		$this->errors('message', 'danger', 'Deleted "' . $prod_name . '"');
		redirect('shop/admin_home');
	}
	public function view_products(){
		$this->load->model('admin');
		$this->load->view('spectator/header');
		$this->load->view('manage/storename');
		$this->load->view('manage/view_prod');
		$this->load->view('manage/new_users');
		$this->load->view('manage/footer');
	}
	public function fashion_view($category, $offset, $x, $limit){
		$this->load->model('admin');
		$fashionRowCount = $this->admin->get_clothing_row($category); // rowcount
		$data['fashionRow'] = $fashionRowCount;
		$data['activePage'] = $x;
		$data['category'] = $category;
		if ($fashionRowCount > 0 && !empty($fashionRowCount)): //if row count is greater than 9 and not empty
				$data['fashion'] = $this->admin->get_clothing($offset, $limit, $category);
		endif;
		$this->load->view('spectator/header');
		$this->load->view('manage/storename');
		$this->load->view('manage/fashion_view', $data);
		$this->load->view('manage/new_users');
		$this->load->view('manage/footer');
	}
	public function searchAd()
	{
		$this->load->model('user');
		$this->load->model('admin');
		if (isset($_POST)) :
			$search = $this->user->protect($_POST['search']);
			$searchResult = $this->user->getSearch($search);
			$data['fashion'] = $searchResult;
			$data['searchText'] = $search;
			$this->load->view('spectator/header');
			$this->load->view('manage/storename');
			$this->load->view('manage/search', $data);
			$this->load->view('manage/new_users');
			$this->load->view('manage/footer');
		endif;
	}
	public function update_now($prod_id){
		$this->load->model('admin');
		$data['result'] = $this->admin->update_get_data($prod_id);
		$this->load->view('spectator/header');
		$this->load->view('manage/storename');
		$this->load->view('manage/update_now', $data);
		$this->load->view('manage/new_users');
		$this->load->view('manage/footer');
		$this->load->view('javascript/update_prod');
	}
	public function logs($status, $offset, $x, $limit){
		$this->load->model('admin');
		if ($status == 'All'):
			$resultNumLogs = $this->admin->getNumberOfLogs(); // rowcount
			if ($resultNumLogs > 0 && !empty($resultNumLogs)): //if row count is greater than 0 and not empty
				$data['logs'] = $this->admin->get_logs($offset, $limit);
			endif;
		else:
			$resultNumLogs = $this->admin->getNumberOfStatusLogs($status); // rowcount
			if ($resultNumLogs > 0 && !empty($resultNumLogs)): //if row count is greater than 0 and not empty
				$data['logs'] = $this->admin->get_logs_status($status, $offset, $limit);
			endif;
		endif;
		if ($resultNumLogs > 0 && !empty($resultNumLogs)):
			$data['numOfLogs'] = $resultNumLogs;
			$data['activePage'] = $x;
			$numPages = $resultNumLogs / 15;
			$data['num_of_pages'] = ceil($numPages);
			$data['status'] = $status;

			$this->load->view('spectator/header');
			$this->load->view('manage/storename');
			$this->load->view('manage/admin_logs', $data);
			$this->load->view('manage/new_users');
			$this->load->view('manage/footer');
		else:
			$data['status'] = $status;
			$this->load->view('spectator/header');
			$this->load->view('manage/storename');
			$this->load->view('manage/admin_logs', $data);
			$this->load->view('manage/new_users');
			$this->load->view('manage/footer');
		endif;


	}
	public function deleteLogs($status, $log_id){
		$this->load->model('admin');
		$this->admin->deleteLogs($log_id);
		$this->errors('message', 'danger', 'Succesfully deleted one admin logs');
		redirect("shop/logs/$status/0/1/20");
	}
	public function order_details(){
		$this->load->model('admin');
		$cart = $this->admin->getCart();
		if (!empty($cart)):
			$data['orderdata'] = $cart;
			$this->load->view('spectator/header');
			$this->load->view('manage/storename');
			$this->load->view('manage/order_details', $data);
			$this->load->view('manage/new_users');
			$this->load->view('manage/footer');
		else:
			$data['cart'] = $cart;
			$this->load->view('spectator/header');
			$this->load->view('manage/storename');
			$this->load->view('manage/order_details', $data);
			$this->load->view('manage/new_users');
			$this->load->view('manage/footer');
		endif;
	}

	public function edit_admin(){
		$this->load->model('user');
		$this->load->model('admin');
		if (isset($_SESSION['admin'])) :
			if (isset($_POST['ad_username'])) :
				$ad_username = $this->user->protect($this->input->post('ad_username'));
				$ad_password = $this->user->protect($this->input->post('ad_password'));
				$ad_re_password = $this->user->protect($this->input->post('ad_re_password'));
				$ad_users_avatar = $this->user->protect($this->input->post('users_avatar'));
				$ad_id = $this->user->protect($this->input->post('ad_id'));
				if ($ad_password == $ad_re_password) :
					$data = array('username' => $ad_username, 'password' => md5($ad_password), 'profile' => $ad_users_avatar);
					$this->admin->update_admin($data, $ad_id);
					$_SESSION['admin'] = $ad_username;
					$edit['edit_ad'] = 'success';
					$this->load->view('spectator/header');
					$this->load->view('manage/storename', $edit);
					$this->load->view('manage/admin_home');
					$this->load->view('manage/new_users');
					$this->load->view('manage/footer');
				else:
					$edit['edit_failed'] = 'failed';
					$this->load->view('spectator/header');
					$this->load->view('manage/storename', $edit);
					$this->load->view('manage/admin_home');
					$this->load->view('manage/new_users');
					$this->load->view('manage/footer');
				endif;

			endif;
		endif;
	}

	public function add_admin(){
		$this->load->model('user');
		$this->load->model('admin');
		if (isset($_SESSION['admin'])) :
			if (isset($_POST['ad_username'])) :
				$ad_username = $this->user->protect($this->input->post('ad_username'));
				$ad_password = $this->user->protect($this->input->post('ad_password'));
				$ad_re_password = $this->user->protect($this->input->post('ad_re_password'));
				$ad_users_avatar = $this->user->protect($this->input->post('users_avatar'));
				if ($ad_password == $ad_re_password) :
					$data = array('username' => $ad_username, 'password' => md5($ad_password), 'profile' => $ad_users_avatar);
					$this->admin->add_admin($data);
					$add['add_admin'] = 'success';
					$this->load->view('spectator/header');
					$this->load->view('manage/storename', $add);
					$this->load->view('manage/admin_home');
					$this->load->view('manage/new_users');
					$this->load->view('manage/footer');
				else:
					$add['add_failed'] = 'failed';
					$this->load->view('spectator/header');
					$this->load->view('manage/storename', $add);
					$this->load->view('manage/admin_home');
					$this->load->view('manage/new_users');
					$this->load->view('manage/footer');
				endif;

			endif;
		endif;
	}

	public function orderdate(){
		$this->load->model('admin');
		if (isset($_POST['order_date'])) :
			$dateordered = $this->input->post('order_date');
			$day = "$dateordered";
			$purchased = $this->admin->getOrderDay($day);
			$data['orderdata'] = $purchased;
			$this->load->view('spectator/header');
			$this->load->view('manage/storename');
			$this->load->view('manage/order_details', $data);
			$this->load->view('manage/new_users');
			$this->load->view('manage/footer');
		endif;
	}

	public function wkorder()
	{
		$this->load->model('admin');
		$todays_date = date("Y-m-d");
		$startdate = strtotime("$todays_date");
		$enddate = strtotime("-7 days",$startdate);
		$date_array = array();
		while ($startdate >  $enddate) {
		   $weekdays = date("Y-m-d", $startdate);
			array_push($date_array, "$weekdays");
		   $startdate = strtotime("-1 days", $startdate);
		}
		$purchased = $this->admin->getWeek($date_array);
		$data['orderdata'] = $purchased;
		$this->load->view('spectator/header');
		$this->load->view('manage/storename');
		$this->load->view('manage/order_details', $data);
		$this->load->view('manage/new_users');
		$this->load->view('manage/footer');
	}
	public function lstmnth($yrmnth)
	{
		$this->load->model('admin');
		$purchased = $this->admin->getLstMnth($yrmnth);
		$data['orderdata'] = $purchased;
		$this->load->view('spectator/header');
		$this->load->view('manage/storename');
		$this->load->view('manage/order_details', $data);
		$this->load->view('manage/new_users');
		$this->load->view('manage/footer');

	}

	public function paystatus()
	{
		$this->load->model('admin');
		if (isset($_POST['id'])) :
			$id = $_POST['id'];
			$status = $_POST['status'];
			$this->admin->upstatus($id, $status);
			echo "Completed";
			return;
		endif;
	}

	public function logoutAd(){
		$this->load->model('admin');
		if (isset($_SESSION['admin'])) :
			$activity = "Logged Out";
			$status = 'Logged_out';
			$this->admin->logs($activity, $status);
			unset($_SESSION['admin']);
		endif;
		redirect('/');
	}







} //end of function wrapper
