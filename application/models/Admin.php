<?php
class Admin extends CI_Model {

///////////////////////////////// FOR USER DATA //////////////////////////////////
	function buy_now($prod_id){
		$this->db->where('prod_id', $prod_id);
		return $this->db->get('products')->result_array();
	}
	function cart($prod_id){
		$this->db->where('prod_id', $prod_id);
		return $this->db->get('products')->result_array();
	}
	function cart_count_row($prod_id){
		$this->db->where('prod_id', $prod_id);
		return $this->db->get('products')->num_rows();
	}
	function cartInsert($datacart){
		$this->db->insert('cart', $datacart);
	}
	function getCart(){
		return $this->db->get('orders')->result_array();
	}
	function upQty($data, $prod_id){
		$this->db->where('prod_id', $prod_id);
		return $this->db->update('cart', $data);
	}
	function remove_item($prod_id){
		$this->db->where('prod_id', $prod_id);
		$this->db->delete('cart');
	}
	function insert_user($data){
		$this->db->insert('users', $data);
	}
	function seeUser($data){
		$this->db->where($data);
		return $this->db->get('users')->num_rows();
	}


///////////////////////////////// END OF USER DATA //////////////////////////////////
	function insert_product($data){
		$this->db->insert('products', $data);
	}
	function update($data, $prod_id){
		$this->db->where('prod_id', $prod_id);
		return $this->db->update('products', $data);
	}
	function get_clothing($offset, $limit, $category){
		$this->db->where('prod_category', $category);
		$this->db->limit($limit);
		$this->db->offset($offset);
		$this->db->order_by('date_added', 'DESC');
		return $this->db->get('products')->result_array();
	}
	function get_clothing_row($category){
		$this->db->where('prod_category', $category);
		return $this->db->get('products')->num_rows();
	}
	function page($offset){
		$this->db->select('prod_id');
		$category = 'Clothing';
		$this->db->where('prod_category', $category);
		$this->db->limit(1);
		$this->db->offset($offset);
		$this->db->order_by('date_added', 'ASC');
		return $this->db->get('products')->row();
	}
	function pagination($off){
		$category = 'Clothing';
		$this->db->select('prod_id');
		$this->db->where('prod_category', $category);
		$this->db->limit(1);
		$this->db->offset($off);
		$this->db->order_by('date_added', 'ASC');
		return $this->db->get('products')->row();
	}
	function delete($prod_id){
		$this->db->where('prod_id', $prod_id);
		return $this->db->delete('products');
	}
	function update_get_data($prod_id){
		$this->db->where('prod_id', $prod_id);
		return $this->db->get('products')->result_array();
	}
	function logs($activity, $status){
		$admin = $_SESSION['admin'];
		$data = array('username' => $admin, 'activity' => $activity, 'status' => $status);
		$this->db->insert('admin_logs', $data);
	}
	function checkAdmin($data){
		$this->db->where($data);
		return $this->db->get('admin_supervisor', $data)->num_rows();
	}
	function getNumberOfLogs(){
		return $this->db->get('admin_logs')->num_rows();
	}
	function getNumberOfStatusLogs($status){
		$this->db->where('status', $status);
		return $this->db->get('admin_logs')->num_rows();
	}
	function get_logs($offset, $limit){
		$this->db->limit($limit);
		$this->db->offset($offset);
		$this->db->order_by('activity_date', 'DESC');
		return $this->db->get('admin_logs')->result_array();
	}
	function get_logs_status($status, $offset, $limit){
		$this->db->where('status', $status);
		$this->db->limit($limit);
		$this->db->offset($offset);
		$this->db->order_by('activity_date', 'DESC');
		return $this->db->get('admin_logs')->result_array();
	}
	function deleteLogs($log_id){
		$this->db->where('log_id', $log_id);
		return $this->db->delete('admin_logs');
	}
	function get_all_users(){
		$this->db->order_by('date_reg', 'DESC');
		return $this->db->get('users')->result_array();
	}
	function get_feedback(){
		$this->db->order_by('date_created', 'DESC');
		return $this->db->get('feedback')->result_array();
	}
	function get_admin($admin){
		$this->db->where('username', $admin);
		$this->db->limit(1);
		return $this->db->get('admin_supervisor')->result_array();
	}
	function update_admin($data, $ad_id){
		$this->db->where('admin_id', $ad_id);
		$this->db->update('admin_supervisor', $data);
	}
	function get_avatar($admin_ses){
		$this->db->select('profile');
		$this->db->where('username', $admin_ses);
		return $this->db->get('admin_supervisor')->row();
	}
	function add_admin($data){
		$this->db->insert('admin_supervisor', $data);
	}
	function getOrderDay($day){
		$this->db->like('date_ordered', $day);
		//$this->db->order_by('date_ordered', 'DESC');
		return $this->db->get('orders')->result_array();
	}
	function getShipTo($order_id){
		$this->db->where('order_id', $order_id);
		$this->db->limit(1);
		return $this->db->get('shipping')->result_array();
	}

	function getUserImg($data){
		$this->db->where($data);
		$this->db->limit(1);
		return $this->db->get('users')->result_array();
	}
	function getWeek($date_array){
		foreach ($date_array as $row) :
			$this->db->or_like('date_ordered', "$row");
		endforeach;
		return $this->db->get('orders')->result_array();
	}
	function getLstMnth($yrmnth){
		$this->db->like('date_ordered', $yrmnth);
		$this->db->order_by('date_ordered', 'DESC');
		return $this->db->get('orders')->result_array();
	}
	function upstatus($id, $status){
		$this->db->set('payment_status', $status);
		$this->db->where('shipping_id', $id);
		$this->db->update('shipping');
	}
	function geAdmintImage($loggedInUsername)
	{
		$this->db->select('profile');
		$this->db->where('username', $loggedInUsername);
		$this->db->limit(1);
		return $this->db->get('admin_supervisor')->row();
	}
	function getEmails()
	{
		return $this->db->get('tbl_emails')->result_array();
	}
	function getNUmOfStocks(){
		$this->db->where('prod_stocks <=', 5);
		return $this->db->get('products')->result_array();
	}



}
?>
