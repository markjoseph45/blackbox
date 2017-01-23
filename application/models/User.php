<?php
class User extends CI_Model {

	function get_item($item_id){
		$this->db->where('prod_id', $item_id);
		return $this->db->get('products')->result_array();
	}
	function getNumOfStocks($item_to_adjust){
		$this->db->where('prod_id', $item_to_adjust);
		$this->db->select('prod_stocks');
		return $this->db->get('products')->result_array();
	}
	function random_item($category){
		if (isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) > 0):
			$id = array();
			foreach ($_SESSION["cart_array"] as $each_item):
				if (isset($each_item['item_id'])):
					$item_id = $each_item['item_id'];
					array_push($id,"$item_id");
				endif;
			endforeach;
			$this->db->where_not_in('prod_id', $id);
			$this->db->where('prod_category', $category);
			$this->db->order_by('prod_category', 'RANDOM');
			return $this->db->get('products')->result_array();
		endif;
	}
	function get_category($prod_id){
		$this->db->select('prod_category');
		$this->db->where('prod_id', $prod_id);
		$this->db->limit(1);
		return $this->db->get('products')->result_array();
	}
	function insert_order($data){
		$this->db->insert('orders', $data);
	}
	function insert_shippers($data_shippers){
		$this->db->insert('shipping', $data_shippers);
	}
	function get_shipper($data){
		$this->db->where($data);
		$this->db->order_by('date_ordered', 'DESC');
		return $this->db->get('shipping')->result_array();
	}
	function get_purchased($order_id_db){
		$this->db->where('order_id', $order_id_db);
		return $this->db->get('orders')->result_array();
	}
	function get_item_for_paypal($item_identifier){
		$this->db->where('prod_id', $item_identifier);
		$this->db->limit(1);
		return $this->db->get('products')->result_array();
	}
	function chk_username_signup($username){
		$this->db->where('username', $username);
		$this->db->limit(1);
		return $this->db->get('users')->num_rows();
	}
	function get_chat_user($user){
		$this->db->where('username', $user);
		$this->db->limit(1);
		return $this->db->get('users')->result_array();
	}
	function insert_chat($data){
		$this->db->insert('chatbox', $data);
	}
	function protect($msg){
		$msg = trim($msg);
		$msg = stripslashes($msg);
		$msg = htmlspecialchars($msg);
		//$msg = mysql_real_escape_string($msg);
		return $msg;
	}
	function get_chat($user){
		$this->db->where('username', $user);
		return $this->db->get('chatbox')->result_array();
	}
	function num_of_msgs($user){
		$this->db->where('username', $user);
		return $this->db->get('chatbox')->num_rows();
	}
	function insert_user($data){
		$this->db->insert('users', $data);
	}
	function seeUser($data){
		$this->db->where($data);
		return $this->db->get('users')->num_rows();
	}
	function get_avatar($username){
		$this->db->where('username', $username);
		$this->db->limit(1);
		return $this->db->get('users')->row();
	}
	function get_orders_names($user){
		$this->db->select('first_name, last_name, middle_name');
		$this->db->where('username', $user);
		$this->db->limit(1);
		return $this->db->get('users')->row();
	}
	function get_users_avatar_for_logo($user){
		$this->db->where('username', $user);
		$this->db->limit(1);
		return $this->db->get('users')->result_array();
	}
	function get_review_user($user){
		$this->db->select('user_id, username, profile');
		$this->db->where('username', $user);
		$this->db->limit(1);
		return $this->db->get('users')->row();
	}
	function insert_prod_review($data){
		$this->db->insert('reviews', $data);
	}
	function get_reviews($prod_id){
		$this->db->where('prod_id', $prod_id);
		return $this->db->get('reviews')->result_array();
	}
	function get_rating($prod_id){
		$this->db->select('rating');
		$this->db->where('prod_id', $prod_id);
		return $this->db->get('reviews')->result_array();
	}
	function get_session_user($user){
		$this->db->where('username', $user);
		return $this->db->get('users')->result_array();
	}
	function edit_user_profile($data, $user){
		$this->db->where('username', $user);
		$this->db->update('users', $data);
	}
	function update_chatRoom($update_chatbox, $user){
		$this->db->where('username', $user);
		$this->db->update('chatbox', $update_chatbox);
	}
	function chk_user($this_user){
		$this->db->where('username', $this_user);
		return $this->db->get('users')->num_rows();
	}
	function get_recepient($this_user){
		$this->db->where('username', $this_user);
		return $this->db->get('users')->result_array();
	}
	function get_user_profile($user_sesssion){
		$this->db->limit(1);
		$this->db->where('username',$user_sesssion);
		return $this->db->get('users')->result_array();
	}
	function insert_feedback($data){
		$this->db->insert('feedback', $data);
	}
	function insert_email($data){
		$this->db->insert('tbl_emails', $data);
	}
	function getSearch($search){
		$this->db->like('prod_name', $search);
		$this->db->or_like('prod_category', $search);
		$this->db->order_by('date_added', 'DESC');
		return $this->db->get('products')->result_array();
	}

	function getTestimonials()
	{
		$this->db->order_by('date_created', 'DESC');
		return $this->db->get('feedback')->result_array();
	}
	function updateStocks($upstocks, $prod_id)
	{
		$this->db->where('prod_id', $prod_id);
		$this->db->update('products', $upstocks);
	}



}
?>
