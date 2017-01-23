<input style="display:none;visibility:hidden;" id="base" type="hidden" value="<?= base_url(); ?>">

<?php
if (isset($_GET['tx']) && isset($_GET['st'])):
	$trx_number = $_GET['tx'];
	$status = $_GET['st'];
	$payment_gross = $_GET['amt'];
endif;


if (isset($_SESSION["cart_array"]) && ($_SESSION["cart_array"]) >= 1 && isset($_SESSION["shippers_fname"])):
	$shippers_fname = $_SESSION["shippers_fname"];
	$shippers_lname = $_SESSION["shippers_lname"];
	$shippers_mname = $_SESSION["shippers_mname"];
	$shippers_address = $_SESSION["shippers_address"];
	$province = $_SESSION["province"];
	$city = $_SESSION["city"];
	$brgy = $_SESSION["brgy"];
	$shippers_phone = $_SESSION["shippers_phone"];
	$shipping_fee = $_SESSION["shipping_fee"];
	$order_id = mt_rand();
	if (isset($_GET['tx']) && isset($_GET['st'])):
			$trx_number = $_GET['tx'];
			$status = $_GET['st'];
			$payment_gross = $_GET['amt'];
			$method = 'Paypal';
	else:
		if (isset($_SESSION["method"])) :
			$method = $_SESSION["method"];
			$status = $_SESSION["status"];
		else:
			$method = 'Paypal';
			$status = 'Completed';
		endif;
			$trx_number = $_SESSION["trx_number"];
	endif;
	$data_shippers = array('fname' => $shippers_fname, 'lname' => $shippers_lname, 'mname' => $shippers_mname,
											'province' => $province, 'city' => $city, 'barangay' => $brgy, 'phone_number' => $shippers_phone,
											'shipping_charge' => $shipping_fee, 'payment_status' => $status, 'payment_method' => $method,
											'trx_id' => $trx_number, 'order_id' => $order_id);
	$this->user->insert_shippers($data_shippers);

	foreach ($_SESSION["cart_array"] as $each_item):
    	if (isset($each_item['item_id'])):
    		$item_id = $each_item['item_id'];
    		$quantity = $each_item['quantity'];
    		$color = $each_item['color'];
    		$size = $each_item['size'];
    		$cart_products = $this->user->get_item($item_id);

			if (isset($cart_products) && !empty($cart_products)):
				foreach ($cart_products as $row):
					$image = $row['image0'];
					$name = $row['prod_name'];
					if ($row['price_discount'] != 0.00 && !empty($row['price_discount'])):
						$price = $row['price_discount'];
					else:
						$price = $row['prod_price'];
					endif;
					$prod_id = $row['prod_id'];
					$data = array('item_name' => $name, 'item_qty' => $quantity, 'item_color' => $color, 'item_size' => $size, 'item_prize' => $price, 'item_image' => $image,
								  'trx_id' => $trx_number, 'item_id' => $item_id, 'order_id' => $order_id);
					$this->user->insert_order($data);

					$prod_qty = $row['prod_stocks'];
					$balance = $prod_qty - $quantity;
					$upstocks = array('prod_stocks' => $balance);
					$this->user->updateStocks($upstocks, $prod_id);//this line is for subtracting stocks when user buys

				endforeach;
			endif;
    	endif;
    endforeach;
    if (isset($_SESSION["cart_array"]) && ($_SESSION["cart_array"]) >= 1 && isset($_SESSION["shippers_fname"])):
    	unset($_SESSION["cart_array"]);
    	unset($_SESSION["total"]);
    	unset($_SESSION["shipping_fee"]);
    	unset($_SESSION["province"]);
    	unset($_SESSION["city"]);
    	unset($_SESSION["brgy"]);
    	unset($_SESSION["shippers_fname"]);
    	unset($_SESSION["shippers_lname"]);
    	unset($_SESSION["shippers_mname"]);
    	unset($_SESSION["shippers_address"]);
    	unset($_SESSION["shippers_phone"]);
    	unset($_SESSION["method"]);
    	unset($_SESSION["status"]);
    endif;
endif;
?>







		<?php if (isset($remitance) || isset($_POST['payment_status']) || isset($_GET['st'])): ?>
			<div class="row col-sm-offset-3" id="thank_you_prompt">
				<span id="thank_you_close">&times;</span>
				<h1>Thank You For Shopping !</h1>
				<p>You may view your orders by clicking orders button.</p>
				<p>Leave a message to BlackBox Tee Shop by using our chat box.</p>
				<div class="alert alert-warning">
					<i class="fa fa-warning"></i>
					<?php 
							$datenow = date("h:i:sa");
							$startdate=strtotime("Today $datenow");
							$enddate=strtotime("+3 days",$startdate);
							echo date("M d h:i:sa", $enddate);
					 ?>
				</div>
			</div>

			<div class="row col-sm-3" id="order_main_div">
				<a id="success_order_view" class="btn btn-danger btn-block"><span id="order_chevron" class="glyphicon glyphicon-menu-left pull-left	"></span> View my orders
					<i class="fa fa-shopping-bag" aria-hidden="true"></i>
				</a>
				<span id="order_but_close">&times;</span>
				<p id="order_errorMsg" style="color:#eee;font-size: 12px;"></p>
			</div>
		<?php endif ?>

<div class="container" id="home_main_container">
<div class="row">
	<div class="col-sm-1 col-sm-offset-5" id="loaderIndicator">
		<img src="<?php echo base_url(); ?>images/default_img/ring.svg" class="img-responsive" alt="">
	</div>
		<div class="col-sm-7" id="homeMainColumn">
		<div id="homeimageSlide">
			<div id="homeslideshow" class="cycle-slideshow"
						data-cycle-fx = "fade"
						data-cycle-speed = "600"
						data-cycle-timeout = "3000"
						data-cycle-pager = "#pager"
						data-cycle-pager-template ="<a href='#'><img src='{{src}}' height=60px width=100px/>"
						data-cycle-next = "#next"
						data-cycle-prev = "#prev"
						data-cycle-manual-fx = "scrollHorz"
						data-cycle-manual-speed = "400"
						data-cycle-pager-fx = "fade">
						 <img src="<?php echo base_url(); ?>images/default_img/blckbx.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/default_img/21.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/default_img/4.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/default_img/9.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/default_img/skate.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/default_img/shoes.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/default_img/17.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/default_img/bags.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/default_img/12.jpg" class="img-responsive" alt="">
			</div>
		</div>
			<div class="bg-success" id="homeBanner">
				<p>Shop with our great stuff's...</p>
			</div>
		</div>
		<div class="col-sm-5 " id="mainDivCategories">
			<div class="row">
					<a href="<?= base_url(); ?>shop/view/0/1/12/Clothing">
						<div class="col-sm-12" id="homeCloth" onclick="clothing()" onmouseenter="zoomIn($(this))" onmouseleave="zoomOut($(this))">
							<span class="col-sm-12 col-xs-12" id="homeclothSpan">clothing</span>
							<img src="<?php echo base_url(); ?>images/default_img/5.jpg" class="img-responsive" alt="">
						</div>
					</a>

					<div class="col-sm-6" id="shoesMainDiv">
						<a href="<?= base_url(); ?>shop/view/0/1/12/Shoes">
							<div class="col-sm-12" id="homeShoes" onmouseover="zoomIn($(this))" onmouseout="zoomOut($(this))">
								<span class="col-sm-12 col-xs-12" id="homeshoesSpan">shoes</span>
								<img src="<?php echo base_url(); ?>images/default_img/shoes.jpg" class="img-responsive" alt="">
							</div>
						</a>
					</div>
					<div class="col-sm-6 " id="bagsMainDiv">
						<a href="<?= base_url(); ?>shop/view/0/1/12/bags">
							<div class="col-sm-12" id="homeBags" onmouseover="zoomIn($(this))" onmouseout="zoomOut($(this))">
								<span class="col-sm-12 col-xs-12" id="homebagsSpan">bags</span>
								<img src="<?php echo base_url(); ?>images/default_img/bags.jpg" class="img-responsive" alt="">
							</div>
						</a>
					</div>


					<div class="col-sm-6" id="sportsMainDiv">
						<a href="<?= base_url(); ?>shop/view/0/1/12/Shoes">
							<div class="col-sm-12" id="homeSports" onmouseover="zoomIn($(this))" onmouseout="zoomOut($(this))">
								<span class="col-sm-12 col-xs-12" id="homeshoesSpan">sports</span>
								<img src="<?php echo base_url(); ?>images/default_img/skate.jpg" class="img-responsive" alt="">
							</div>
						</a>
					</div>
					<div class="col-sm-6" id="accMainDiv">
						<a href="<?= base_url(); ?>shop/view/0/1/12/Shoes">
							<div class="col-sm-12" id="homeAcc" onmouseover="zoomIn($(this))" onmouseout="zoomOut($(this))">
								<span class="col-sm-12 col-xs-12" id="homeAccSpan">accesories</span>
								<img src="<?php echo base_url(); ?>images/default_img/accesories.jpg" class="img-responsive" alt="">
							</div>
						</a>
					</div>
			</div>
		</div>
	</div>
</div>

<script>
var base = $("#base").attr("value");

function _(id){
	return document.getElementById(id);
}
function zoomIn($scope) {
    var thisImage = $($scope).children("img");
    $(thisImage).css("transform","scale(1.08)");
    $(thisImage).animate({opacity:"1"},0);
}
function zoomOut($scope) {
    var thisImage = $($scope).children("img");
    $(thisImage).css("transform","scale(1)");
    $(thisImage).animate({opacity:"1"},0);
}
$(document).ready(function(){
  $("#thank_you_close").click(function(){
    $("#thank_you_prompt").fadeOut("slow");
  });
});

$(document).ready(function(){
  $("#order_but_close").click(function(){
    $("#order_main_div").animate({width:'0px'});
    $("#order_main_div").fadeOut(100);
  });
});


$(document).ready(function(){
  $("#order_main_div").click(function(){
    			$.ajax({
                    type: "POST",
                    url: base+"shop/order_view",
                    cache: false,
                    success: function(html) {
						if ((html) == 'good') {
							var success_order_view = _('success_order_view');
							success_order_view.href = base+"shop/orders";
							success_order_view.click();
						}else{
							$('#order_errorMsg').text('Please login first in order to view your orders');
						}
					}//end of success
              });//end of ajax
  });
});


</script>
