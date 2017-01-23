<input style="display:none;visibility:hidden;" id="base" type="hidden" value="<?= base_url(); ?>">

<!--
	<input type="hidden" name="custom" value="' . $product_id_array . '">
	<input type="hidden" name="notify_url" value="https://www.blackbox/shop/success">
	<input type="hidden" name="rm" value="2">
	<input type="hidden" name="lc" value="Peso">
-->

<?php
//This is for paypal checkout
$pp_checkout_btn = '';
$product_id_array = ' ';

if (isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) >= 1):
	// Start PayPal Checkout Button
	$pp_checkout_btn .= '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" target="_blank" method="post">
					    <input type="hidden" name="cmd" value="_cart">
					    <input type="hidden" name="upload" value="1">
					    <input type="hidden" name="business" value="09brylle11@gmail.com">';
	// Start the For Each loop
	$x = 0;
    foreach ($_SESSION["cart_array"] as $each_item_cart) :
    		$ted = count($_SESSION['cart_array']);

    		$item_identifier = $each_item_cart['item_id'];
			$paypal_items = $this->user->get_item_for_paypal($item_identifier);
			if (!empty($paypal_items)):
				foreach ($paypal_items as $paypal_var):
						$product_id_spec = $paypal_var['prod_id'];
						$product_name = $paypal_var['prod_name'];
						if ($paypal_var['price_discount'] == 0.00) :
							$product_presyo = $paypal_var['prod_price'];
						else:
							$product_presyo = $paypal_var['price_discount'];
						endif;
				endforeach;
					// Dynamic Checkout Btn Assembly
						$x = $x + 1;
						$pp_checkout_btn .= '<input type="hidden" name="item_name_' . $x . '" value="' . $product_name . '">
									        <input type="hidden" name="amount_' . $x . '" value="' . $product_presyo . '">
									        <input type="hidden" name="quantity_' . $x . '" value="' . $each_item_cart['quantity'] . '">  ';
											// Create the product array variable
						$product_id_array .= "$item_identifier-".$each_item_cart['quantity'].",";
						// Dynamic table row assembly
			endif;
    endforeach;
    // Finish the Paypal Checkout Btn
	$pp_checkout_btn .= '<input type="hidden" name="shipping_1" value="' . $_SESSION["shipping_fee"]  . '">
						<input type="hidden" name="return" value="' . base_url() . 'shop/success">
						<input type="hidden" name="cbt" value="Return to The Store">
						<input type="hidden" name="cancel_return" value="' . base_url() . 'shop/cancel">
						<input type="hidden" name="currency_code" value="Peso">
						<input type="image" src="../images/default_img/checkout-logo-medium.png" name="submit" alt="Make payments with PayPal - its fast, free and secure!">
						</form>';
endif;
?>







<div class="container">
	<div class="col-sm-7">
		<div class="panel" id="payment_Mainpanel">
			<div class="panel-heading" id="payment_Header">
				<h4 class="">PAYMENT OPTIONS</h4>
			</div>
			<div class="panel-body">
				<div class="row" id="payment_classRow">
					<div class="col-sm-3">
						<div onclick="clickPayPal($(this))" class="col-sm-12" id="payment_options_paypal">
							<p align="center">PayPal</p>
							<div align="center">
								<i id="faPaypal" class="fa fa-paypal" aria-hidden="true"></i>
							</div>
							<div align="center">
							    <span style="font-size:15px;" class="glyphicon glyphicon-record"></span>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="col-sm-12" align="center" onclick="clickRemitance($(this))" id="payment_options_remittance">
							<p align="center">Remittance Center</p>
							<!-- <img id=""  class="img-responsive center-block" src="<?php echo base_url(); ?>images/default_img/youtube.png"> -->
							<i class="fa fa-home" id="remitance_Centre_home"></i>
							<div align="center">
							    <span style="font-size:15px;" class="glyphicon glyphicon-record"></span>
							</div>
						</div>
					</div>

				</div>
				<div class="" id="chooseremitance">
						<p>Choose from one of this remitance centers <span style="font-size:15px;" class="glyphicon glyphicon-hand-down"></span></p>
					</div>

					<div class="row" id="checkoutPAYPAL">
						<div class="col-sm-8" >
							<p>Paypal the fastest and safer way to pay online.</p>
							<?php if (isset($_SESSION['total'])): ?>
							<p style="font-size:11px;">Your payable amount is &#8369; <?= $_SESSION['total']; ?> and that includes the shipping fee.</p>
							<?php endif; ?>
							<a onclick="$('#paypalWhatIS').slideToggle('slow')">What is PayPal ?</a>
							<br/>
							<br/>
							<div id="pyapal_checkout_btn">
								<?= $pp_checkout_btn; ?>
							</div>
							<div id="pAYPALClickThis" class="">
								<span style="font-size:20px;" class="glyphicon glyphicon-hand-left"></span>
								<span>Click this to pay with PayPal</span>
							</div>
						</div>
						<div class="col-sm-4 bg-danger" id="paypalWhatIS">
								<p>PayPal Holdings, Inc. is an American company operating a worldwide online payments system.
								Online money transfers serve as electronic alternatives to traditional paper methods like checks and money orders.
								</p>
						</div>
					</div>
					<div class="grid" id="remitGroup">
					<div class="row" data-remit="palawan" id="checkoutRemittance" onmouseenter="chkRemittance($(this))" onmouseleave="chkRemittanceLeave($(this))">
						<div class="col-sm-2 palawan" id="paymentPalawanlOADER_IMG">
							<img class="img-responsive center-block" src="<?php echo base_url(); ?>images/default_img/default (7).svg">
							<p>Saving Order...</p>
						</div>
						<div class="col-sm-8" id="palawanSec_dIV">
							<p>Send your payment through Palawan Pawnshop.</p>
							<?php if (isset($_SESSION['total'])): ?>
							<p style="font-size:11px;">Your payable amount is &#8369; <?= $_SESSION['total']; ?> and that includes the shipping fee.</p>
							<?php endif; ?>
							<img id=""  class="img-responsive" src="<?php echo base_url(); ?>images/default_img/palawan.png">
							<a onclick="$('#palawanWhatIS').slideToggle('slow')">What is Palawan Pawnshop ?</a>
							<br/>
							<br/>
							<div id="paymentButtonWRapper" class="">
								<a onclick="save_order('palawan')" type="button" class="btn btn-danger">
									<span class="glyphicon glyphicon-save"></span>
									Save Order
								</a>
								<div id="paypalClickThis" class="">
									<span style="font-size:18px;" class="glyphicon glyphicon-hand-left"></span>
									<span>Click this to pay with Palawan</span>
								</div>
							</div>
						</div>
						<div class="col-sm-4" id="palawanWhatIS">
							<p>Palawan Express Pera Padala (PEPP) is a money remittance service operated by Eight Under Par (Pawnshop Operator) Inc.
							Palawan Pawnshop has the lowest interest rates in the industry. It continues to be your Matatag,
							Maaasahan and Mapagkakatiwalaan pawnshop nationwide!
							</p>
						</div>
					</div>
					<div class="row" data-remit="cebuana" id="checkoutRemittance" onmouseenter="chkRemittance($(this))" onmouseleave="chkRemittanceLeave($(this))">
						<div class="col-sm-2 cebuana" id="paymentPalawanlOADER_IMG">
							<img class="img-responsive center-block" src="<?php echo base_url(); ?>images/default_img/default (7).svg">
							<p>Saving Order...</p>
						</div>
						<div class="col-sm-8" id="cebuanaSec_dIV">
							<p>Send your payment through Cebuana Lhullier.</p>
							<?php if (isset($_SESSION['total'])): ?>
							<p style="font-size:11px;">Your payable amount is &#8369; <?= $_SESSION['total']; ?> and that includes the shipping fee.</p>
							<?php endif; ?>
							<img id=""  class="img-responsive" src="<?php echo base_url(); ?>images/default_img/cebuana.jpg">
							<a onclick="$('#cebuanaWhatIS').slideToggle('slow')">What is Cebuana Lhullier ?</a>
							<br/>
							<br/>
							<div onclick="save_order('cebuana')" id="paymentButtonWRapper" class="">
								<a onclick="save_order('cebuana')" type="button" class="btn btn-danger">
									<span class="glyphicon glyphicon-save"></span>
									Save Order
								</a>
								<div id="paypalClickThis" class="">
									<span style="font-size:18px;" class="glyphicon glyphicon-hand-left"></span>
									<span>Click this to pay with Cebuana</span>
								</div>
							</div>
						</div>
						<div class="col-sm-4 bg-danger" id="cebuanaWhatIS">
							<p>Pera Padala. Cebuana Lhuillier's money transfer service is an easy, quick, and safe way to send and receive money. ...
							All transactions are real time, which enables clients to claim the money as soon
							as the sender completes the sending process in the branch.
							</p>
						</div>
					</div>
					<div class="row" data-remit="lbc" id="checkoutRemittance" onmouseenter="chkRemittance($(this))" onmouseleave="chkRemittanceLeave($(this))">
						<div class="col-sm-2 lbc" id="paymentPalawanlOADER_IMG">
							<img class="img-responsive center-block" src="<?php echo base_url(); ?>images/default_img/default (7).svg">
							<p>Saving Order...</p>
						</div>
						<div class="col-sm-8" id="lbcSec_dIV">
							<p>Send your payment through LBC.</p>
							<?php if (isset($_SESSION['total'])): ?>
							<p style="font-size:11px;">Your payable amount is &#8369; <?= $_SESSION['total']; ?> and that includes the shipping fee.</p>
							<?php endif; ?>
							<img id=""  class="img-responsive" src="<?php echo base_url(); ?>images/default_img/lbc.jpg">
							<a onclick="$('#lbcWhatIS').slideToggle('slow')">What is LBC ?</a>
							<br/>
							<br/>
							<div id="paymentButtonWRapper" class="">
								<a onclick="save_order('lbc')" type="button" class="btn btn-danger">
									<span class="glyphicon glyphicon-save"></span>
									Save Order
								</a>
								<div id="paypalClickThis" class="">
									<span style="font-size:18px;" class="glyphicon glyphicon-hand-left"></span>
									<span>Click this to pay with LBC</span>
								</div>
							</div>
						</div>
						<div class="col-sm-4 bg-danger" id="lbcWhatIS">
							<p>One exception are groups which only contain a single control
							(for instance the justified button groups with elements)
							or a dropdown.
							In addition, groups and toolbars should be given an explicit label,
							as most assistive technologies will otherwise not announce them.
							</p>
						</div>
					</div>
					<div class="row" data-remit="western_union" id="checkoutRemittance" onmouseenter="chkRemittance($(this))" onmouseleave="chkRemittanceLeave($(this))">
						<div class="col-sm-2 western_union" id="paymentPalawanlOADER_IMG">
							<img class="img-responsive center-block" src="<?php echo base_url(); ?>images/default_img/default (7).svg">
							<p>Saving Order...</p>
						</div>
						<div class="col-sm-8" id="wuSec_dIV">
							<p>Send your payment through Western Union.</p>
							<?php if (isset($_SESSION['total'])): ?>
							<p style="font-size:11px;">Your payable amount is &#8369; <?= $_SESSION['total']; ?> and that includes the shipping fee.</p>
							<?php endif; ?>
							<img id=""  class="img-responsive" src="<?php echo base_url(); ?>images/default_img/wu.png">
							<a onclick="$('#westernWhatIS').slideToggle('slow')">What is Western Union ?</a>
							<br/>
							<br/>
							<div id="paymentButtonWRapper" class="">
								<a onclick="save_order('western_union')" type="button" class="btn btn-danger">
									<span class="glyphicon glyphicon-save"></span>
									Save Order
								</a>
								<div id="paypalClickThis" class="">
									<span style="font-size:18px;" class="glyphicon glyphicon-hand-left"></span>
									<span>Click this to pay with western union</span>
								</div>
							</div>
						</div>
						<div class="col-sm-4 bg-danger" id="westernWhatIS">
							<p>Western Union then provides the sender a 10-digit Money Transfer Control Number (MTCN) that the sender must provide to the recipient.
							The recipient then proceeds to a Western Union agent office in the designated payment location, presents the 10-digit MTCN, and a photo ID.
							Money is then paid out to the recipient.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-5" id="payment_mainDiv_editShipping">
		<div class="" id="edit_shippingMainDiv">
			<h4>YOUR SHIPPING ADDRESS</h4>
			<a href="<?= base_url(); ?>shop/shipping" class="btn btn-xs pull-right">
				<span class="glyphicon glyphicon-pencil"></span>
				EDIT
			</a>
		</div>
		<div id="payment_edit_shipping_info">
		<?php if (isset($_SESSION['shippers_fname'])):  ?>
			<p><?= $_SESSION['shippers_lname']?> , <?= $_SESSION['shippers_fname']?> <?= $_SESSION['shippers_mname']?></p>
			<p><?= $_SESSION['province']?></p>
			<p><?= $_SESSION['city']?> , <?= $_SESSION['brgy']?></p>
			<p>Mobile Number: 09<?= $_SESSION['shippers_phone']?></p>
		<?php else: ?>
			<p style="color:red">Shipping address was not stated!</p>
		<?php endif; ?>
		</div>
	</div>


	<div class="col-sm-5 bg-danger" id="ship_OrderSumarryMainDiv">
		<div class="col-sm-2 bg-danger" id="order_summarylOADER_IMG">
			<img class="img-responsive center-block" src="<?php echo base_url(); ?>images/default_img/default (7).svg">
		</div>
			<div class="" id="orderSummary">
				<?php if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1): ?>
					<h4 class="">ORDER SUMMARY 0 ITEM(S)</h4>
				<?php else: $countCartArray = count($_SESSION["cart_array"]) ?>

					<h4 class="">ORDER SUMMARY <?= $countCartArray; ?> ITEM(S)</h4>
				<?php endif; ?>
			</div>
			<?php if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1): ?>
				<div id="ship_cartEmpty">
					<h4 align="center">Your cart is empty!</h4>
				</div>
				<script>
				var myVar = setInterval(function(){hideMsg()},1500);
				function hideMsg(){
					var msg = document.getElementById('ship_cartEmpty');
					msg.style.backgroundColor = "#ff5252";
					setTimeout(function(){
						var msg = document.getElementById('ship_cartEmpty');
						msg.style.backgroundColor = "#ff8a80";
					},700);
				}
				</script>
			<?php else: ?>
			<div class="table-responsive" id="ship_table">
				<table class="table">
					<thead id="ship_table_thead">
						<tr>
							<td>PRODUCT</td>
							<td align="center">QUANTITY</td>
							<td align="center" width="90px;">PRICE</td>
						</tr>
					</thead>
					<tbody>
					<?php $i = 0; $grandTotal = 0; $loop_count = 1;
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
										$ship_prod_category = $row['prod_category'];
										$prod_id = $row['prod_id'];
										if ($row['price_discount'] != 0.00 && !empty($row['price_discount'])):
											$price = $row['price_discount'];
										else:
											$price = $row['prod_price'];
										endif;
										$subtotal = $quantity * $price;
										$sub = number_format($subtotal, 2);
					?>
						<input style="display:none;visibility:hidden;" type="hidden" data-count="<?= $countCartArray; ?>" id="shipping_data_counter" />
						<input style="display:none;visibility:hidden;" type="hidden" id="shipping_data_item<?= $loop_count; ?>" data-category="<?= $ship_prod_category; ?>" data-qty="<?= $quantity; ?>" data-id="<?= $item_id; ?>" />
						<tr>
							<td>
								<div class="col-sm-4 col-xs-10" id="shipping_imgDiv">
									<img id="img<?= $loop_count; ?>" data-zoom-image="<?php echo base_url(); ?>images/products/<?= $image ?>" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $image ?>">
								</div>
								<div class="col-sm-8 col-xs-12" id="ship_spanName_Div">
									<span><?= $name ?></span>
								</div>
							</td>
							<td align="center"><?= $quantity ?></td>
							<?php if ($row['price_discount'] != 0.00 && !empty($row['price_discount'])): $ship_Price = number_format($price, 2); ?>
								<td align="center">&#8369; <?= $ship_Price; ?></td>
							<?php else: $ship_ProdPrice = number_format($price, 2); ?>
								<td align="center">&#8369; <?= $ship_ProdPrice; ?></td>
							<?php endif; ?>

						</tr>
					<?php
						$grandTotal = $subtotal + $grandTotal;
						endforeach; $grand = number_format($grandTotal, 2);
						endif;
					?>
					<?php
						else:
						    echo "This item does not exist!";
						endif;
						$i++; $loop_count++;
						endforeach;
					?>
					</tbody>
				</table>

				<?php
					if (isset($_SESSION['shipping_fee'])):
						$shipping_charge = $_SESSION['shipping_fee'];
						if ($shipping_charge != 'FREE'):
							$shipping_charge = number_format($shipping_charge, 2);
						endif;
						$total_ship_pay = $grandTotal + $shipping_charge;
						$total = number_format($total_ship_pay, 2);
				?>
				<input type="hidden" value="<?= $_SESSION['shipping_fee']; ?>" id="shipping_data_charge" style="display:none;visibility:hidden" />
				<?php
					else:
						$shipping_charge = '0.00';
						$total = $grand;
					endif;
				?>
				<input style="display:none;visibility:hidden;" type="hidden" data-total="<?= $grandTotal; ?>" id="shipping_total" />
				<div id="ship_subTotal_Item" class="">
					<span>Subtotal</span>
					<span class="pull-right">&#8369; <?= $grand; ?></span>
				</div>
				<div id="shippingCharges_Item" class="">
					<span>Shipping Charges</span>
					<span id="shipping_charge_finale" class="pull-right">
						<?php if ($shipping_charge != 'FREE'): ?>
							&#8369;
						<?php endif; ?>
						<?= $shipping_charge; ?>
					</span>
				</div>
				<div id="ship_total_priceItem" class="bg-info">
					<h4 class="pull-left">TOTAL</h4>
					<h4 id="ship_total_finale" class="pull-right">&#8369; <?= $total; ?></h4>
				</div>
			</div>
			<?php endif; ?>
	</div>
</div>
<a id="remitance_checkout_anchor" href="" style="display: none;visibility: hidden;"></a>
<script>
	var base = $("#base").attr("value");

	for (var i = 1; i < 10; i++) {
		$("#img"+i).elevateZoom({scrollZoom : true});
	};
	$('document').ready(function(){
    	$('[data-toggle="tooltip"]').tooltip();
	});
	function _(id){
		return document.getElementById(id);
	}
	var myVarPay = setInterval(function(){hidePayPALMsg()},1800);
				var pAYPALClickThis =_('pAYPALClickThis');
				function hidePayPALMsg(){
					var msg = $(pAYPALClickThis);
					$(msg).fadeOut('fast');
					setTimeout(function(){
						var msg = $(pAYPALClickThis);
						$(msg).fadeIn('fast');
					},400);
				}

	function chkRemittance($scope){
		var clickThis = $($scope).find('div#paymentButtonWRapper');
		var clickThisIcon = $($scope).find('div#paypalClickThis');
		$($scope).css('backgroundColor','#eeeeee');
		$($scope).css('border','1px dashed #000000');
		$(clickThis).slideDown('fast');
		var myVarPay = setInterval(function(){hidePayMsg()},1800);
				function hidePayMsg(){
					var msg = $(clickThisIcon);
					$(msg).fadeOut('fast');
					setTimeout(function(){
						var msg = $(clickThisIcon);
						$(msg).fadeIn('fast');
					},400);
				}
	}
	function chkRemittanceLeave($scope){
		var clickThis = $($scope).find('div#paymentButtonWRapper');
		$(clickThis).slideUp('fast');
		$($scope).css('backgroundColor','#ffffff');
		$($scope).css('border','');
	}
	function clickPayPal($scope){
		var payment_options_remittance = _('payment_options_remittance');
		var spanRemit = $(payment_options_remittance).find('span');
		$(spanRemit).css('color','');
		$(payment_options_remittance).css('border','');
		$(payment_options_remittance).css('backgroundColor','');
		$(payment_options_remittance).css('boxShadow','');
		var span = $($scope).find('span');
		$(span).css('color','red');
		$($scope).css('border','1px solid #f44336');
		$($scope).css('backgroundColor','#fafafa ');
		$($scope).css('boxShadow','inset 1px -1px 8px #f44336,inset -1px 1px 8px #f44336');
		var remitGroup = _('remitGroup');
		var checkoutPAYPAL = _('checkoutPAYPAL');
		$(remitGroup).slideUp('fast');
		$(checkoutPAYPAL).slideDown('slow');
		$('#chooseremitance').fadeOut('fast');
	}
	function clickRemitance($scope){
		var payment_options_paypal = _('payment_options_paypal');
		var spanPaypal = $(payment_options_paypal).find('span');
		$(spanPaypal).css('color','');
		$(payment_options_paypal).css('border','');
		$(payment_options_paypal).css('backgroundColor','');
		$(payment_options_paypal).css('boxShadow','');
		var span = $($scope).find('span');
		$(span).css('color','red');
		$($scope).css('border','1px solid #f44336');
		$($scope).css('backgroundColor','#fafafa ');
		$($scope).css('boxShadow','inset 1px -1px 8px #f44336,inset -1px 1px 8px #f44336');
		var remitGroup = _('remitGroup');
		var checkoutPAYPAL = _('checkoutPAYPAL');
		$(checkoutPAYPAL).slideUp('fast');
		$(remitGroup).slideDown('slow');
		$('#chooseremitance').fadeIn('fast');
	}
	(function(){
		var payment_options_remittance = _('payment_options_remittance');
		var spanRemit = $(payment_options_remittance).find('span');
		$(spanRemit).css('color','');
		$(payment_options_remittance).css('border','');
		$(payment_options_remittance).css('backgroundColor','');
		$(payment_options_remittance).css('boxShadow','');
		var payment_options_paypal = _('payment_options_paypal');
		var spanPayment_options_paypal = $(payment_options_paypal).find('span');
		$(spanPayment_options_paypal).css('color','red');
		$(payment_options_paypal).css('border','1px solid #f44336');
		$(payment_options_paypal).css('backgroundColor','#fafafa ');
		$(payment_options_paypal).css('boxShadow','inset 1px -1px 8px #f44336,inset -1px 1px 8px #f44336');
		var remitGroup = _('remitGroup');
		var checkoutPAYPAL = _('checkoutPAYPAL');
		$(remitGroup).slideUp('fast');
		$(checkoutPAYPAL).slideDown('slow');
	}());
	function save_order($scope) {
		$('.'+$scope).fadeIn('fast');
		if ($scope == 'palawan') {
			var metod = 'Palawan';
		}
		else if ($scope == 'cebuana') {
			var metod = 'Cebuana';
		}
		else if ($scope == 'lbc') {
			var metod = 'LBC';
		}
		else if ($scope == 'western_union') {
			var metod = 'Western Union';
		}
		$.ajax({
                    type: "POST",
                    url: base+"shop/shippers_random",
                    data: ({
                        method: metod
                    }),
                    cache: false,
                    success: function(html){
                    	var anchor_remitance = _('remitance_checkout_anchor');
                    	anchor_remitance.href = base+'shop/success';
                    	anchor_remitance.click();
                    }
                });
	}
</script>
