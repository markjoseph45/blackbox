<?php
	if (isset($_SESSION['username'])):
		$user = $_SESSION['username'];
		$orders_names = $this->user->get_orders_names($user);
			if (!empty($orders_names)):
				$fname = $orders_names->first_name;
				$lname = $orders_names->last_name;
				$mname = $orders_names->middle_name;
				$data = array('fname' => $fname, 'lname' => $lname, 'mname' => $mname);
				$shiper = $this->user->get_shipper($data);
			endif;
	if (isset($shiper) && !empty($shiper)):
		$grand = 1; $img_loop = 1;
		foreach ($shiper as $order_details):
			$order_id_db = $order_details['order_id'];
			$trx_id_db = $order_details['trx_id'];
			/*$item_name_db = $order_details['item_name'];
			$item_qty_db = $order_details['item_qty'];
			$item_color_db = $order_details['item_color'];
			$item_size_db = $order_details['item_size'];
			$item_prize_db = $order_details['item_prize'];
			$item_image_db = $order_details['item_image'];
*/			$fname_db = $order_details['fname'];
			$lname_db = $order_details['lname'];
			$mname_db = $order_details['mname'];
			$province_db = $order_details['province'];
			$city_db = $order_details['city'];
			$barangay_db = $order_details['barangay'];
			$phone_number_db = $order_details['phone_number'];
			$shipping_charge_db = $order_details['shipping_charge'];
			$payment_status_db = $order_details['payment_status'];
			$payment_method_db = $order_details['payment_method'];
			$date_ordered_db = $order_details['date_ordered'];
			$yr = substr($date_ordered_db, 0,4);
			$mnth = substr($date_ordered_db, 5,2);
			$dy = substr($date_ordered_db, 8,2);
			$time_ord = substr($date_ordered_db, 11);
			$date_ord = date("M d Y",mktime(0,0,0,$mnth,$dy,$yr))
			/*$sub = $item_prize_db * $item_qty_db;
			$grand = $sub + $grand;
			$total = $grand + $shipping_charge_db;
			$order_diff = false;	*/	 ?>

				<div class="container" id="order_container">
					<div class="" id="orderH4">
						<h4>ORDER #<?= $grand; ?></h4>
					</div>
					<div class="row" style="border:1px solid #ccc;margin:15px;background-color:white">
						<div class="bg-info col-sm-12" id="ordered_trx_idDiv">
							<p><b>Transaction ID:</b> <?= $trx_id_db; ?></p>
							<p><b>Payment Status:</b> <?= $payment_status_db; ?></p>
							<p><b>Date Ordered:</b> <?= $date_ord; ?> <span><?= $time_ord; ?></span></p>
							<p><b>Payment Through:</b> <?= $payment_method_db; ?></p>
						</div>
						<div class="col-sm-6" id="order_ship_info">
							<h4 align="center" class="">YOUR SHIPPING INFORMATION</h4>
							<div class="col-sm-offset-1 col-sm-10">
								<p><b>First Name:</b> <?= $fname_db; ?></p>
								<p><b>Last Name:</b> <?= $lname_db; ?></p>
								<p><b>Middle Name:</b> <?= $mname_db; ?></p>
								<p><b>Province:</b> <?= $province_db; ?></p>
								<p><b>City / Municipality:</b> <?= $city_db; ?></p>
								<p><b>Barangay:</b> <?= $barangay_db; ?></p>
								<p><b>Phone Number:</b> 09<?= $phone_number_db; ?></p>
							</div>
						</div>
					<div class="col-sm-6 bg-danger" id="ship_OrderSumarryMainDiv" style="padding-bottom:10px;">
						<div class="col-sm-2 bg-danger" id="order_summarylOADER_IMG">
							<img class="img-responsive center-block" src="<?php echo base_url(); ?>images/default_img/default (7).svg">
						</div>
							<div id="orderSummary">
									<h4 class="" style="padding-top:10px;">PURCHASED ITEM(S)</h4>
							</div>
							<div class="table-responsive" id="ship_table">
								<table class="table">
									<thead id="ship_table_thead">
										<tr>
											<td>PRODUCT</td>
											<td>COLOR</td>
											<td>SIZE</td>
											<td align="center">QUANTITY</td>
											<td align="center" width="90px;">PRICE</td>
										</tr>
									</thead>
									<tbody>
									<?php $purchased_item = $this->user->get_purchased($order_id_db);
											if (isset($purchased_item) && !empty($purchased_item)):
												$order_subTtL = 0;
											 foreach ($purchased_item as $purch_item):
											 	$order_prz = $purch_item['item_prize'];
											 	$order_qnty = $purch_item['item_qty'];
											 	$order_sub = $order_prz * $order_qnty;
											 	$order_subTtL = $order_subTtL + $order_sub;
											 	$ord_subtotal = number_format($order_subTtL, 2); ?>
										<tr>
											<td>
												<div class="col-sm-4 col-xs-10" id="shipping_imgDiv">
													<img id="img<?= $img_loop; ?>" data-zoom-image="<?php echo base_url(); ?>images/products/<?= $purch_item['item_image']; ?>" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $purch_item['item_image']; ?>" />
												</div>
												<div class="col-sm-8 col-xs-12" id="ship_spanName_Div">
													<span><?= $purch_item['item_name']; ?></span>
												</div>
											</td>
											<td><?= $purch_item['item_color']; ?></td>
											<td><?= $purch_item['item_size']; ?></td>
											<td align="center"><?= $purch_item['item_qty']; ?></td>
											<td align="center">&#8369; <?= $purch_item['item_prize']; ?></td>

										</tr>
									<?php $img_loop++; endforeach;
											$total_pay = $shipping_charge_db + $order_subTtL;
											$total_payment = number_format($total_pay, 2); endif; ?>
									</tbody>
								</table>

								<?php if (isset($purchased_item) && !empty($purchased_item)): ?>

								<div id="ship_subTotal_Item" class="">
									<span>Subtotal</span>
									<span class="pull-right">&#8369; <?= $ord_subtotal; ?></span>
								</div>
								<div id="shippingCharges_Item" class="">
									<span>Shipping Charges</span>
									<span id="shipping_charge_finale" class="pull-right">
										<?php if ($shipping_charge_db != 'FREE'): ?>
											&#8369;
										<?php endif; ?>
										<?= $shipping_charge_db; ?>
									</span>
								</div>
								<div id="ship_total_priceItem" class="bg-info">
									<h4 class="pull-left">TOTAL</h4>
									<h4 id="ship_total_finale" class="pull-right">&#8369; <?= $total_payment; ?></h4>
								</div>

							<?php endif; ?>

							</div>
					</div>
					</div>
				</div>

<?php $grand++;
		endforeach;
	else: ?>
		<div align="center" class="container alert alert-danger" id="order_container">
			<h4>You have not purchased any item yet !</h4>
		</div>
<?php
	endif;
	endif;
?>

<script type="text/javascript">
	for (var i = 1; i < 50; i++) {
		$("#img"+i).elevateZoom({scrollZoom : true});
	};
	$('document').ready(function(){
    	$('[data-toggle="tooltip"]').tooltip();
	});
</script>
