<?php
if (!empty($_SERVER['HTTP_REFERER'])) :
	$referer = $_SERVER['HTTP_REFERER'];
else:
	$referer = base_url();
endif;
?>
<input style="display:none;visibility:hidden;" id="base" type="hidden" value="<?= base_url(); ?>">
<div class="container">
	<div id="btnShipBag" class="row">
		<a href="<?= $referer; ?>" id="shopBagShopping" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-menu-left"></span> 
			BACK TO SHOPPING
		</a>
		<?php if (isset($_SESSION["cart_array"])):  ?>
		<a id="shopBagProcced" class="btn btn-default btn-lg pull-right" onclick="chk_shippingForm($(this))">PROCEED TO CHECKOUT <span class="glyphicon glyphicon-menu-right"></span></a>
		<?php endif; ?>
	</div>
	<div class="col-sm-7">
	<div class="panel col-sm-12" id="shipping_panel_main">
		<div class="panel-body" id="shipping_panel_body">
			<div class="col-sm-10 col-sm-offset-1" id="shipping_address_real">
				<h4 class="" align="center">YOUR SHIPPING ADDRESS</h4>
				<form id="shipping_form" method="post">
                    <div class="form-group has-success has-feedback">
                      <label for="firstName">FIRST NAME</label>
                      <input <?php if (isset($_SESSION['shippers_fname'])): ?> style="border-top:2px solid #00e676;" <?php endif; ?> type="text" id="firstName" name="firstName" value="<?php if (isset($_SESSION['shippers_fname'])): echo $_SESSION['shippers_fname']; endif; ?>" class="form-control" placeholder="Please Enter Your First Name"  onblur="chkFname($(this))">
                      <span <?php if (!isset($_SESSION['shippers_fname'])): ?> style="display:none;color:#00e676" <?php else: ?> style="color:#00e676" <?php endif; ?> id="fnameChkIcon" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                      <span style="display:none;color:#ff5252" id="fnameXIcon" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                      <span id="ship_fname_error"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="lastName">LAST NAME</label>
                      <input <?php if (isset($_SESSION['shippers_lname'])): ?> style="border-top:2px solid #00e676;" <?php endif; ?> type="text" name="lastName" value="<?php if (isset($_SESSION['shippers_lname'])): echo $_SESSION['shippers_lname']; endif; ?>" class="form-control" id="lastName" placeholder="Please Enter Your Last Name" onblur="chkLname($(this))">
                      <span <?php if (!isset($_SESSION['shippers_lname'])): ?> style="display:none;color:#00e676" <?php else: ?> style="color:#00e676" <?php endif; ?> id="lnameChkIcon" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                      <span style="display:none;color:#ff5252" id="lnameXIcon" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                      <span id="ship_lname_error"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="middleName">MIDDLE NAME</label>
                      <input <?php if (isset($_SESSION['shippers_mname'])): ?> style="border-top:2px solid #00e676;" <?php endif; ?> type="text" name="middleName" value="<?php if (isset($_SESSION['shippers_mname'])): echo $_SESSION['shippers_mname']; endif; ?>" class="form-control" id="middleName" placeholder="Please Enter Your Middle Name" onblur="chkMname($(this))">
                      <span <?php if (!isset($_SESSION['shippers_mname'])): ?> style="display:none;color:#00e676" <?php else: ?> style="color:#00e676" <?php endif; ?> id="mnameChkIcon" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                      <span style="display:none;color:#ff5252" id="mnameXIcon" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                      <span id="ship_mname_error"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="complete_address">COMPLETE ADDRESS</label>
                      <textarea  <?php if (isset($_SESSION['shippers_address'])): ?> style="border-top:2px solid #00e676;" <?php endif; ?> rows="4" id="complete_address" name="complete_address" class="form-control" placeholder="Please Enter Your Complete Address" onblur="chkAddress()"><?php if (isset($_SESSION['shippers_address'])): echo $_SESSION['shippers_address']; endif; ?></textarea>
                      <span <?php if (!isset($_SESSION['shippers_address'])): ?> style="display:none;color:#00e676" <?php else: ?> style="color:#00e676" <?php endif; ?> id="addnameChkIcon" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                      <span style="display:none;color:#ff5252" id="addnameXIcon" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                      <span id="ship_address_error"></span>
                    </div>
                    <div class="form-group">
                      <label for="province">PROVINCE</label>
                      <select <?php if (isset($_SESSION['province'])): ?> style="border-top:2px solid #00e676" <?php endif; ?> id="province" class="form-control" onchange="chk_province($(this))" onblur="chk_province_blur($(this))">
                      	<option id="province_frst_option">
                      		<?php if (isset($_SESSION['province'])): echo $_SESSION['province']; else: ?> Select <?php endif; ?>
                      	</option>
                      	<option value="42,nl">Abra</option>
                      	<option value="43,m">Agusan Del Norte</option>
						<option value="44,m">Agusan Del Sur</option>
						<option value="45,v">Aklan</option>
						<option value="46,sl">Albay</option>
						<option value="47,v">Antique</option>
						<option value="2990,nl">Aurora</option>
						<option value="50,m">Basilan</option>
						<option value="3372,sl">Bataan</option>
						<option value="53,sl">Batangas</option>
						<option value="54,nl">Benguet</option>
						<option value="55,v">Biliran</option>
						<option value="56,v">Bohol</option>
						<option value="57,m">Bukidnon</option>
						<option value="6819,sl">Bulacan</option>
						<option value="7412,nl">Cagayan</option>
						<option value="60,sl">Camarines Norte</option>
						<option value="61,sl">Camarines Sur</option>
						<option value="62,m">Camiguin</option>
						<option value="63,v">Capiz</option>
						<option value="64,sl">Catanduanes</option>
						<option value="65,sl">Cavite</option>
						<option value="66,v">Cebu</option>
						<option value="12832,m">Compostela Valley</option>
						<option value="68,m">Cotabato</option>
						<option value="69,m">Davao Del Norte</option>
						<option value="70,m">Davao Del Sur</option>
						<option value="71,m">Davao Oriental</option>
						<option value="221,m">Dinagat Islands</option>
						<option value="72,v">Eastern Samar</option>
						<option value="73,v">Guimaras</option>
						<option value="74,nl">Ifugao</option>
						<option value="75,nl">Ilocos Norte</option>
						<option value="76,nl">Ilocos Sur</option>
						<option value="77,v">Iloilo</option>
						<option value="78,nl">Isabela</option>
						<option value="79,nl">Kalinga</option>
						<option value="19693,nl">La Union</option>
						<option value="20290,sl">Laguna</option>
						<option value="82,m">Lanao Del Norte</option>
						<option value="83,m">Lanao Del Sur</option>
						<option value="84,v">Leyte</option>
						<option value="24428,m">Maguindanao</option>
						<option value="86,sl">Marinduque</option>
						<option value="87,sl">Masbate</option>
						<option value="8262,ml">Metro Manila~Caloocan</option>
						<option value="22722,ml">Metro Manila~Las Pinas</option>
						<option value="24972,ml">Metro Manila~Makati</option>
						<option value="25007,ml">Metro Manila~Malabon</option>
						<option value="25030,ml">Metro Manila~Mandaluyong</option>
						<option value="88,ml">Metro Manila~Manila</option>
						<option value="25059,ml">Metro Manila~Marikina</option>
						<option value="27973,ml">Metro Manila~Muntinlupa</option>
						<option value="27984,ml">Metro Manila~Navotas</option>
						<option value="34589,ml">Metro Manila~Paranaque</option>
						<option value="34607,ml">Metro Manila~Pasay</option>
						<option value="34810,ml">Metro Manila~Pasig</option>
						<option value="34842,ml">Metro Manila~Pateros</option>
						<option value="36138,ml">Metro Manila~Quezon City</option>
						<option value="36861,ml">Metro Manila~San Juan</option>
						<option value="39826,ml">Metro Manila~Taguig</option>
						<option value="40599,ml">Metro Manila~Valenzuela</option>
						<option value="91,m">Misamis Occidental</option>
						<option value="92,m">Misamis Oriental</option>
						<option value="93,nl">Mountain Province</option>
						<option value="94,v">Negros Occidental</option>
						<option value="95,v">Negros Oriental</option>
						<option value="29275,m">North Cotabato</option>
						<option value="96,v">Northern Samar</option>
						<option value="97,nl">Nueva Ecija</option>
						<option value="98,nl">Nueva Vizcaya</option>
						<option value="89,sl">Occidental Mindoro</option>
						<option value="90,sl">Oriental Mindoro</option>
						<option value="32177,sl">Palawan</option>
						<option value="32616,sl">Pampanga</option>
						<option value="101,nl">Pangasinan</option>
						<option value="34854,sl">Quezon</option>
						<option value="36282,nl">Quirino</option>
						<option value="36421,sl">Rizal</option>
						<option value="36624,sl">Romblon</option>
						<option value="36884,m">Sarangani</option>
						<option value="108,v">Siquijor</option>
						<option value="109,sl">Sorsogon</option>
						<option value="110,m">South Cotabato</option>
						<option value="111,v">Southern Leyte</option>
						<option value="38453,m">Sultan Kudarat</option>
						<option value="113,m">Sulu</option>
						<option value="114,m">Surigao Del Norte</option>
						<option value="115,m">Surigao Del Sur</option>
						<option value="116,nl">Tarlac</option>
						<option value="40384,m">Tawi~Tawi</option>
						<option value="40634,v">Western Samar</option>
						<option value="118,nl">Zambales</option>
						<option value="119,m">Zamboanga Del Norte</option>
						<option value="120,m">Zamboanga Del Sur</option>
						<option value="121,m">Zamboanga Sibugay</option>
                      </select>
                      <span id="ship_province_error"></span>
                    </div>
                    <div class="form-group">
                    	<label for="city">CITY / MUNICIPALITY</label>
                    	<select <?php if (isset($_SESSION['city'])): ?> style="border-top:2px solid #00e676" <?php endif; ?> id="city" class="form-control" onchange="chk_cityChange($(this))" onblur="chk_cityBlur($(this))">
                    		<option id="city_first_select"><?php if (isset($_SESSION['city'])): echo $_SESSION['city']; else: ?> Select <?php endif; ?></option>
                    	</select>
                    	<span id="ship_city_error"></span>
                    </div>
                    <div class="form-group has-feedback">
                    	<label for="barangay">BARANGAY</label><span style="font-size:9px;color:#333;margin-left:58px;">SHIPPING FEE APPLIES</span>
                    	<input <?php if (isset($_SESSION['brgy'])): ?> style="border-top:2px solid #00e676;" <?php endif; ?> onblur="chk_barangay($(this))" type="text" id="barangay" name="barangay" value="<?php if (isset($_SESSION['brgy'])): echo $_SESSION['brgy']; endif; ?>" class="form-control" placeholder="Please Enter Your Barangay" >
                    	<span <?php if (!isset($_SESSION['brgy'])): ?> style="display:none;color:#00e676" <?php else: ?> style="color:#00e676" <?php endif; ?> id="brgyChkIcon" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                      	<span style="display:none;color:#ff5252" id="brgyXIcon" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                    	<span id="ship_barangay_error"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="phoneNumber">PHONE NUMBER</label><span style="font-size:9px;color:#333;margin-left:30px;">TO ENSURE DELIVERY</span>
                      <div class="input-group" id="ship_addon_div">
                      	<span id="ship_phonE_addOn" class="input-group-addon">+63</span>
                      	<input <?php if (isset($_SESSION['shippers_phone'])): ?> style="border-top:2px solid #00e676;" <?php endif; ?> onblur="chkPhoneNumber($(this))" type="text" name="phone" value="<?php if (isset($_SESSION['shippers_phone'])): echo $_SESSION['shippers_phone']; endif; ?>" class="form-control" id="phoneNumber" placeholder="Please Enter Your Phone Number">
                      </div>
                      <span <?php if (!isset($_SESSION['shippers_phone'])): ?> style="display:none;color:#00e676" <?php else: ?> style="color:#00e676" <?php endif; ?> id="phoneChkIcon" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                      <span style="display:none;color:#ff5252" id="phoneXIcon" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                      <span id="ship_phone_error"></span>
                    </div>
                    <!-- <div class="">
                      <input id="shipping_continue" type="button" onclick="chk_shippingForm($(this))" class="btn btn-lg btn-default pull-right" value="CONTINUE">
                    </div> -->

                </form>
            </div><!-- end of form div -->
		</div><!-- end of panel-body -->
	</div><!-- end of panel -->
	</div><!-- end of primary form div -->
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

					


			


</div><!-- end of container -->


<script>

var base = $("#base").attr("value");

var regions = {"42":["Abra",[{"id":"246","name":"Bangued","address":"","is_gst_free":""},{"id":"278","name":"Boliney","address":"","is_gst_free":""},{"id":"287","name":"Bucay","address":"","is_gst_free":""},{"id":"309","name":"Bucloc","address":"","is_gst_free":""},{"id":"314","name":"Daguioman","address":"","is_gst_free":""},{"id":"319","name":"Danglas","address":"","is_gst_free":""},{"id":"327","name":"Dolores","address":"","is_gst_free":""},{"id":"343","name":"La Paz","address":"","is_gst_free":""},{"id":"356","name":"Lacub","address":"","is_gst_free":""},{"id":"363","name":"Lagangilang","address":"","is_gst_free":""},{"id":"381","name":"Lagayan","address":"","is_gst_free":""},{"id":"387","name":"Langiden","address":"","is_gst_free":""},{"id":"394","name":"Licuan~Baay","address":"","is_gst_free":""},{"id":"406","name":"Luba","address":"","is_gst_free":""},{"id":"415","name":"Malibcong","address":"","is_gst_free":""},{"id":"428","name":"Manabo","address":"","is_gst_free":""},{"id":"440","name":"Penarrubia","address":"","is_gst_free":""},{"id":"450","name":"Pidigan","address":"","is_gst_free":""},{"id":"466","name":"Pilar","address":"","is_gst_free":""},{"id":"486","name":"Sallapadan","address":"","is_gst_free":""},{"id":"496","name":"San Isidro","address":"","is_gst_free":""},{"id":"506","name":"San Juan","address":"","is_gst_free":""},{"id":"526","name":"San Quintin","address":"","is_gst_free":""},{"id":"533","name":"Tayum","address":"","is_gst_free":""},{"id":"545","name":"Tineg","address":"","is_gst_free":""},{"id":"556","name":"Tubo","address":"","is_gst_free":""},{"id":"567","name":"Villaviciosa","address":"","is_gst_free":""}]],"43":["Agusan Del Norte",[{"id":"576","name":"Buenavista","address":"","is_gst_free":""},{"id":"601","name":"Butuan City","address":"","is_gst_free":""},{"id":"688","name":"Cabadbaran City","address":"","is_gst_free":""},{"id":"719","name":"Carmen","address":"","is_gst_free":""},{"id":"728","name":"Jabonga","address":"","is_gst_free":""},{"id":"744","name":"Kitcharao","address":"","is_gst_free":""},{"id":"756","name":"Las Nieves","address":"","is_gst_free":""},{"id":"777","name":"Magallanes","address":"","is_gst_free":""},{"id":"786","name":"Nasipit","address":"","is_gst_free":""},{"id":"806","name":"Remedios T. Romualdez","address":"","is_gst_free":""},{"id":"815","name":"Santiago","address":"","is_gst_free":""},{"id":"825","name":"Tubay","address":"","is_gst_free":""}]],"44":["Agusan Del Sur",[{"id":"839","name":"Bayugan City","address":"","is_gst_free":""},{"id":"883","name":"Bunawan","address":"","is_gst_free":""},{"id":"894","name":"Esperanza","address":"","is_gst_free":""},{"id":"942","name":"La Paz","address":"","is_gst_free":""},{"id":"957","name":"Loreto","address":"","is_gst_free":""},{"id":"975","name":"Prosperidad","address":"","is_gst_free":""},{"id":"1007","name":"Rosario","address":"","is_gst_free":""},{"id":"1019","name":"San Francisco","address":"","is_gst_free":""},{"id":"1047","name":"San Luis","address":"","is_gst_free":""},{"id":"1073","name":"Santa Josefa","address":"","is_gst_free":""},{"id":"1085","name":"Sibagat","address":"","is_gst_free":""},{"id":"1110","name":"Talacogon","address":"","is_gst_free":""},{"id":"1127","name":"Trento","address":"","is_gst_free":""},{"id":"1144","name":"Veruela","address":"","is_gst_free":""}]],"45":["Aklan",[{"id":"1165","name":"Altavas","address":"","is_gst_free":""},{"id":"1180","name":"Balete","address":"","is_gst_free":""},{"id":"1191","name":"Banga","address":"","is_gst_free":""},{"id":"1222","name":"Batan","address":"","is_gst_free":""},{"id":"1243","name":"Buruanga","address":"","is_gst_free":""},{"id":"1259","name":"Ibajay","address":"","is_gst_free":""},{"id":"1295","name":"Kalibo","address":"","is_gst_free":""},{"id":"1312","name":"Lezo","address":"","is_gst_free":""},{"id":"1325","name":"Libacao","address":"","is_gst_free":""},{"id":"1350","name":"Madalag","address":"","is_gst_free":""},{"id":"1376","name":"Makato","address":"","is_gst_free":""},{"id":"1395","name":"Malay","address":"","is_gst_free":""},{"id":"1413","name":"Malinao","address":"","is_gst_free":""},{"id":"1437","name":"Nabas","address":"","is_gst_free":""},{"id":"1458","name":"New Washington","address":"","is_gst_free":""},{"id":"1475","name":"Numancia","address":"","is_gst_free":""},{"id":"1493","name":"Tangalan","address":"","is_gst_free":""}]],"46":["Albay",[{"id":"1509","name":"Bacacay","address":"","is_gst_free":""},{"id":"1566","name":"Camalig","address":"","is_gst_free":""},{"id":"1617","name":"Daraga","address":"","is_gst_free":""},{"id":"1672","name":"Guinobatan","address":"","is_gst_free":""},{"id":"1717","name":"Jovellar","address":"","is_gst_free":""},{"id":"1741","name":"Legazpi City","address":"","is_gst_free":""},{"id":"1809","name":"Libon","address":"","is_gst_free":""},{"id":"1857","name":"Ligao City","address":"","is_gst_free":""},{"id":"1913","name":"Malilipot","address":"","is_gst_free":""},{"id":"1932","name":"Malinao","address":"","is_gst_free":""},{"id":"1962","name":"Manito","address":"","is_gst_free":""},{"id":"1978","name":"Oas","address":"","is_gst_free":""},{"id":"2032","name":"Pio Duran","address":"","is_gst_free":""},{"id":"2066","name":"Polangui","address":"","is_gst_free":""},{"id":"2111","name":"Rapu~Rapu","address":"","is_gst_free":""},{"id":"2146","name":"Santo Domingo","address":"","is_gst_free":""},{"id":"2170","name":"Tabaco City","address":"","is_gst_free":""},{"id":"2218","name":"Tiwi","address":"","is_gst_free":""}]],"47":["Antique",[{"id":"2244","name":"Anini~Y","address":"","is_gst_free":""},{"id":"2268","name":"Barbaza","address":"","is_gst_free":""},{"id":"2308","name":"Belison","address":"","is_gst_free":""},{"id":"2320","name":"Bugasong","address":"","is_gst_free":""},{"id":"2348","name":"Caluya","address":"","is_gst_free":""},{"id":"2367","name":"Culasi","address":"","is_gst_free":""},{"id":"2412","name":"Hamtic","address":"","is_gst_free":""},{"id":"2460","name":"Laua~an","address":"","is_gst_free":""},{"id":"2501","name":"Libertad","address":"","is_gst_free":""},{"id":"2521","name":"Pandan","address":"","is_gst_free":""},{"id":"2556","name":"Patnongon","address":"","is_gst_free":""},{"id":"2592","name":"San Jose","address":"","is_gst_free":""},{"id":"2621","name":"San Remigio","address":"","is_gst_free":""},{"id":"2667","name":"Sebaste","address":"","is_gst_free":""},{"id":"2678","name":"Sibalom","address":"","is_gst_free":""},{"id":"2755","name":"Tibiao","address":"","is_gst_free":""},{"id":"2777","name":"Tobias Fornier","address":"","is_gst_free":""},{"id":"2828","name":"Valderrama","address":"","is_gst_free":""}]],"2990":["Aurora",[{"id":"2991","name":"Baler","address":"","is_gst_free":""},{"id":"3005","name":"Casiguran","address":"","is_gst_free":""},{"id":"3030","name":"Dilasag","address":"","is_gst_free":""},{"id":"3042","name":"Dinalungan","address":"","is_gst_free":""},{"id":"3052","name":"Dingalan","address":"","is_gst_free":""},{"id":"3064","name":"Dipaculao","address":"","is_gst_free":""},{"id":"3090","name":"Maria Aurora","address":"","is_gst_free":""},{"id":"3131","name":"San Luis","address":"","is_gst_free":""}]],"50":["Basilan",[{"id":"3150","name":"Akbar","address":"","is_gst_free":""},{"id":"3160","name":"Al~Barka","address":"","is_gst_free":""},{"id":"3177","name":"Hadji Mohammad Ajul","address":"","is_gst_free":""},{"id":"3189","name":"Hadji Muhtamad","address":"","is_gst_free":""},{"id":"43816","name":"Isabela City","address":"","is_gst_free":""},{"id":"3200","name":"Lamitan City","address":"","is_gst_free":""},{"id":"3246","name":"Lantawan","address":"","is_gst_free":""},{"id":"3272","name":"Maluso","address":"","is_gst_free":""},{"id":"3323","name":"Tabuan~Lasa","address":"","is_gst_free":""},{"id":"3348","name":"Tuburan","address":"","is_gst_free":""},{"id":"3359","name":"Ungkaya Pukan","address":"","is_gst_free":""}]],"3372":["Bataan",[{"id":"3373","name":"Abucay","address":"","is_gst_free":""},{"id":"3383","name":"Bagac","address":"","is_gst_free":""},{"id":"3398","name":"Balanga City","address":"","is_gst_free":""},{"id":"3424","name":"Dinalupihan","address":"","is_gst_free":""},{"id":"3471","name":"Hermosa","address":"","is_gst_free":""},{"id":"3495","name":"Limay","address":"","is_gst_free":""},{"id":"3508","name":"Mariveles","address":"","is_gst_free":""},{"id":"3527","name":"Morong","address":"","is_gst_free":""},{"id":"3533","name":"Orani","address":"","is_gst_free":""},{"id":"3563","name":"Orion","address":"","is_gst_free":""},{"id":"3587","name":"Pilar","address":"","is_gst_free":""},{"id":"3607","name":"Samal","address":"","is_gst_free":""}]],"53":["Batangas",[{"id":"3657","name":"Agoncillo","address":"","is_gst_free":""},{"id":"3679","name":"Alitagtag","address":"","is_gst_free":""},{"id":"3699","name":"Balayan","address":"","is_gst_free":""},{"id":"3748","name":"Balete","address":"","is_gst_free":""},{"id":"3762","name":"Batangas City","address":"","is_gst_free":""},{"id":"3868","name":"Bauan","address":"","is_gst_free":""},{"id":"3909","name":"Calaca","address":"","is_gst_free":""},{"id":"3950","name":"Calatagan","address":"","is_gst_free":""},{"id":"3976","name":"Cuenca","address":"","is_gst_free":""},{"id":"3998","name":"Ibaan","address":"","is_gst_free":""},{"id":"4025","name":"Laurel","address":"","is_gst_free":""},{"id":"4047","name":"Lemery","address":"","is_gst_free":""},{"id":"4094","name":"Lian","address":"","is_gst_free":""},{"id":"4114","name":"Lipa City","address":"","is_gst_free":""},{"id":"4187","name":"Lobo","address":"","is_gst_free":""},{"id":"4214","name":"Mabini","address":"","is_gst_free":""},{"id":"4248","name":"Malvar","address":"","is_gst_free":""},{"id":"4264","name":"Mataasnakahoy","address":"","is_gst_free":""},{"id":"4281","name":"Nasugbu","address":"","is_gst_free":""},{"id":"4324","name":"Padre Garcia","address":"","is_gst_free":""},{"id":"4343","name":"Rosario","address":"","is_gst_free":""},{"id":"4392","name":"San Jose","address":"","is_gst_free":""},{"id":"4426","name":"San Juan","address":"","is_gst_free":""},{"id":"4469","name":"San Luis","address":"","is_gst_free":""},{"id":"4496","name":"San Nicolas","address":"","is_gst_free":""},{"id":"4515","name":"San Pascual","address":"","is_gst_free":""},{"id":"4545","name":"Santa Teresita","address":"","is_gst_free":""},{"id":"4563","name":"Santo Tomas","address":"","is_gst_free":""},{"id":"4594","name":"Taal","address":"","is_gst_free":""},{"id":"4637","name":"Talisay","address":"","is_gst_free":""},{"id":"4659","name":"Tanauan City","address":"","is_gst_free":""},{"id":"4708","name":"Taysan","address":"","is_gst_free":""},{"id":"4729","name":"Tingloy","address":"","is_gst_free":""},{"id":"4745","name":"Tuy","address":"","is_gst_free":""}]],"54":["Benguet",[{"id":"4768","name":"Atok","address":"","is_gst_free":""},{"id":"4777","name":"Baguio City","address":"","is_gst_free":""},{"id":"4893","name":"Bakun","address":"","is_gst_free":""},{"id":"4901","name":"Bokod","address":"","is_gst_free":""},{"id":"4912","name":"Buguias","address":"","is_gst_free":""},{"id":"4927","name":"Itogon","address":"","is_gst_free":""},{"id":"4937","name":"Kabayan","address":"","is_gst_free":""},{"id":"4951","name":"Kapangan","address":"","is_gst_free":""},{"id":"4967","name":"Kibungan","address":"","is_gst_free":""},{"id":"4975","name":"La Trinidad","address":"","is_gst_free":""},{"id":"4992","name":"Mankayan","address":"","is_gst_free":""},{"id":"5005","name":"Sablan","address":"","is_gst_free":""},{"id":"5014","name":"Tuba","address":"","is_gst_free":""},{"id":"5028","name":"Tublay","address":"","is_gst_free":""}]],"55":["Biliran",[{"id":"5037","name":"Almeria","address":"","is_gst_free":""},{"id":"5051","name":"Biliran","address":"","is_gst_free":""},{"id":"5063","name":"Cabucgayan","address":"","is_gst_free":""},{"id":"5077","name":"Caibiran","address":"","is_gst_free":""},{"id":"5095","name":"Culaba","address":"","is_gst_free":""},{"id":"5113","name":"Kawayan","address":"","is_gst_free":""},{"id":"5134","name":"Maripipi","address":"","is_gst_free":""},{"id":"5150","name":"Naval","address":"","is_gst_free":""}]],"56":["Bohol",[{"id":"5177","name":"Alburquerque","address":"","is_gst_free":""},{"id":"5189","name":"Alicia","address":"","is_gst_free":""},{"id":"5205","name":"Anda","address":"","is_gst_free":""},{"id":"5222","name":"Antequera","address":"","is_gst_free":""},{"id":"5244","name":"Baclayon","address":"","is_gst_free":""},{"id":"5262","name":"Balilihan","address":"","is_gst_free":""},{"id":"5294","name":"Batuan","address":"","is_gst_free":""},{"id":"5310","name":"Bien Unido","address":"","is_gst_free":""},{"id":"5326","name":"Bilar","address":"","is_gst_free":""},{"id":"5346","name":"Buenavista","address":"","is_gst_free":""},{"id":"5382","name":"Calape","address":"","is_gst_free":""},{"id":"5416","name":"Candijay","address":"","is_gst_free":""},{"id":"5438","name":"Carmen","address":"","is_gst_free":""},{"id":"5468","name":"Catigbian","address":"","is_gst_free":""},{"id":"5491","name":"Clarin","address":"","is_gst_free":""},{"id":"5516","name":"Corella","address":"","is_gst_free":""},{"id":"5525","name":"Cortes","address":"","is_gst_free":""},{"id":"5540","name":"Dagohoy","address":"","is_gst_free":""},{"id":"5556","name":"Danao","address":"","is_gst_free":""},{"id":"5574","name":"Dauis","address":"","is_gst_free":""},{"id":"5587","name":"Dimiao","address":"","is_gst_free":""},{"id":"5623","name":"Duero","address":"","is_gst_free":""},{"id":"5645","name":"Garcia Hernandez","address":"","is_gst_free":""},{"id":"5676","name":"Getafe","address":"","is_gst_free":""},{"id":"5701","name":"Guindulman","address":"","is_gst_free":""},{"id":"5721","name":"Inabanga","address":"","is_gst_free":""},{"id":"5771","name":"Jagna","address":"","is_gst_free":""},{"id":"5805","name":"Lila","address":"","is_gst_free":""},{"id":"5824","name":"Loay","address":"","is_gst_free":""},{"id":"5849","name":"Loboc","address":"","is_gst_free":""},{"id":"5878","name":"Loon","address":"","is_gst_free":""},{"id":"5946","name":"Mabini","address":"","is_gst_free":""},{"id":"5969","name":"Maribojoc","address":"","is_gst_free":""},{"id":"5992","name":"Panglao","address":"","is_gst_free":""},{"id":"6003","name":"Pilar","address":"","is_gst_free":""},{"id":"6025","name":"Pres. Carlos P. Garcia","address":"","is_gst_free":""},{"id":"6049","name":"Sagbayan","address":"","is_gst_free":""},{"id":"6074","name":"San Isidro","address":"","is_gst_free":""},{"id":"6087","name":"San Miguel","address":"","is_gst_free":""},{"id":"6106","name":"Sevilla","address":"","is_gst_free":""},{"id":"6120","name":"Sierra Bullones","address":"","is_gst_free":""},{"id":"6143","name":"Sikatuna","address":"","is_gst_free":""},{"id":"6154","name":"Tagbilaran City","address":"","is_gst_free":""},{"id":"6170","name":"Talibon","address":"","is_gst_free":""},{"id":"6196","name":"Trinidad","address":"","is_gst_free":""},{"id":"6217","name":"Tubigon","address":"","is_gst_free":""},{"id":"6252","name":"Ubay","address":"","is_gst_free":""},{"id":"6297","name":"Valencia","address":"","is_gst_free":""}]],"57":["Bukidnon",[{"id":"6333","name":"Baungon","address":"","is_gst_free":""},{"id":"6350","name":"Cabanglasan","address":"","is_gst_free":""},{"id":"6366","name":"Damulog","address":"","is_gst_free":""},{"id":"6384","name":"Dangcagan","address":"","is_gst_free":""},{"id":"6399","name":"Don Carlos","address":"","is_gst_free":""},{"id":"6429","name":"Impasug~ong","address":"","is_gst_free":""},{"id":"6443","name":"Kadingilan","address":"","is_gst_free":""},{"id":"6461","name":"Kalilangan","address":"","is_gst_free":""},{"id":"6476","name":"Kibawe","address":"","is_gst_free":""},{"id":"6500","name":"Kitaotao","address":"","is_gst_free":""},{"id":"6536","name":"Lantapan","address":"","is_gst_free":""},{"id":"6551","name":"Libona","address":"","is_gst_free":""},{"id":"6566","name":"Malaybalay City","address":"","is_gst_free":""},{"id":"6613","name":"Malitbog","address":"","is_gst_free":""},{"id":"6625","name":"Manolo Fortich","address":"","is_gst_free":""},{"id":"6648","name":"Maramag","address":"","is_gst_free":""},{"id":"6669","name":"Pangantucan","address":"","is_gst_free":""},{"id":"6689","name":"Quezon","address":"","is_gst_free":""},{"id":"6721","name":"San Fernando","address":"","is_gst_free":""},{"id":"6746","name":"Sumilao","address":"","is_gst_free":""},{"id":"6757","name":"Talakag","address":"","is_gst_free":""},{"id":"6787","name":"Valencia City","address":"","is_gst_free":""}]],"6819":["Bulacan",[{"id":"6820","name":"Angat","address":"","is_gst_free":""},{"id":"6837","name":"Balagtas","address":"","is_gst_free":""},{"id":"6847","name":"Baliuag","address":"","is_gst_free":""},{"id":"6875","name":"Bocaue","address":"","is_gst_free":""},{"id":"6895","name":"Bulacan","address":"","is_gst_free":""},{"id":"6910","name":"Bustos","address":"","is_gst_free":""},{"id":"6925","name":"Calumpit","address":"","is_gst_free":""},{"id":"6954","name":"Dona Remedios Trinidad","address":"","is_gst_free":""},{"id":"6963","name":"Guiguinto","address":"","is_gst_free":""},{"id":"6978","name":"Hagonoy","address":"","is_gst_free":""},{"id":"7005","name":"Malolos City","address":"","is_gst_free":""},{"id":"7057","name":"Marilao","address":"","is_gst_free":""},{"id":"7074","name":"Meycauayan City","address":"","is_gst_free":""},{"id":"7101","name":"Norzagaray","address":"","is_gst_free":""},{"id":"7115","name":"Obando","address":"","is_gst_free":""},{"id":"7127","name":"Pandi","address":"","is_gst_free":""},{"id":"7150","name":"Paombong","address":"","is_gst_free":""},{"id":"7165","name":"Plaridel","address":"","is_gst_free":""},{"id":"7185","name":"Pulilan","address":"","is_gst_free":""},{"id":"7205","name":"San Ildefonso","address":"","is_gst_free":""},{"id":"7242","name":"San Jose Del Monte City","address":"","is_gst_free":""},{"id":"7302","name":"San Miguel","address":"","is_gst_free":""},{"id":"7352","name":"San Rafael","address":"","is_gst_free":""},{"id":"7387","name":"Santa Maria","address":"","is_gst_free":""}]],"7412":["Cagayan",[{"id":"7413","name":"Abulug","address":"","is_gst_free":""},{"id":"7434","name":"Alcala","address":"","is_gst_free":""},{"id":"7460","name":"Allacapan","address":"","is_gst_free":""},{"id":"7488","name":"Amulung","address":"","is_gst_free":""},{"id":"7536","name":"Aparri","address":"","is_gst_free":""},{"id":"7579","name":"Baggao","address":"","is_gst_free":""},{"id":"7628","name":"Ballesteros","address":"","is_gst_free":""},{"id":"7648","name":"Buguey","address":"","is_gst_free":""},{"id":"7679","name":"Calayan","address":"","is_gst_free":""},{"id":"7692","name":"Camalaniugan","address":"","is_gst_free":""},{"id":"7721","name":"Claveria","address":"","is_gst_free":""},{"id":"7763","name":"Enrile","address":"","is_gst_free":""},{"id":"7786","name":"Gattaran","address":"","is_gst_free":""},{"id":"7837","name":"Gonzaga","address":"","is_gst_free":""},{"id":"7863","name":"Iguig","address":"","is_gst_free":""},{"id":"7887","name":"Lal~Lo","address":"","is_gst_free":""},{"id":"7923","name":"Lasam","address":"","is_gst_free":""},{"id":"7954","name":"Pamplona","address":"","is_gst_free":""},{"id":"7973","name":"Penablanca","address":"","is_gst_free":""},{"id":"7998","name":"Piat","address":"","is_gst_free":""},{"id":"8017","name":"Rizal","address":"","is_gst_free":""},{"id":"8047","name":"Sanchez~Mira","address":"","is_gst_free":""},{"id":"8066","name":"Santa Ana","address":"","is_gst_free":""},{"id":"8083","name":"Santa Praxedes","address":"","is_gst_free":""},{"id":"8094","name":"Santa Teresita","address":"","is_gst_free":""},{"id":"8108","name":"Santo Nino","address":"","is_gst_free":""},{"id":"8140","name":"Solana","address":"","is_gst_free":""},{"id":"8179","name":"Tuao","address":"","is_gst_free":""},{"id":"8212","name":"Tuguegarao City","address":"","is_gst_free":""}]],"60":["Camarines Norte",[{"id":"8452","name":"Basud","address":"","is_gst_free":""},{"id":"8482","name":"Capalonga","address":"","is_gst_free":""},{"id":"8505","name":"Daet","address":"","is_gst_free":""},{"id":"8531","name":"Jose Panganiban","address":"","is_gst_free":""},{"id":"8559","name":"Labo","address":"","is_gst_free":""},{"id":"8612","name":"Mercedes","address":"","is_gst_free":""},{"id":"8639","name":"Paracale","address":"","is_gst_free":""},{"id":"8667","name":"San Lorenzo Ruiz","address":"","is_gst_free":""},{"id":"8680","name":"San Vicente","address":"","is_gst_free":""},{"id":"8690","name":"Santa Elena","address":"","is_gst_free":""},{"id":"8710","name":"Talisay","address":"","is_gst_free":""},{"id":"8726","name":"Vinzons","address":"","is_gst_free":""}]],"61":["Camarines Sur",[{"id":"8746","name":"Baao","address":"","is_gst_free":""},{"id":"8777","name":"Balatan","address":"","is_gst_free":""},{"id":"8795","name":"Bato","address":"","is_gst_free":""},{"id":"8829","name":"Bombon","address":"","is_gst_free":""},{"id":"8838","name":"Buhi","address":"","is_gst_free":""},{"id":"8877","name":"Bula","address":"","is_gst_free":""},{"id":"8911","name":"Cabusao","address":"","is_gst_free":""},{"id":"8921","name":"Calabanga","address":"","is_gst_free":""},{"id":"8970","name":"Camaligan","address":"","is_gst_free":""},{"id":"8984","name":"Canaman","address":"","is_gst_free":""},{"id":"9009","name":"Caramoan","address":"","is_gst_free":""},{"id":"9059","name":"Del Gallego","address":"","is_gst_free":""},{"id":"9092","name":"Gainza","address":"","is_gst_free":""},{"id":"9101","name":"Garchitorena","address":"","is_gst_free":""},{"id":"9125","name":"Goa","address":"","is_gst_free":""},{"id":"9160","name":"Iriga City","address":"","is_gst_free":""},{"id":"9197","name":"Lagonoy","address":"","is_gst_free":""},{"id":"9236","name":"Libmanan","address":"","is_gst_free":""},{"id":"9312","name":"Lupi","address":"","is_gst_free":""},{"id":"9351","name":"Magarao","address":"","is_gst_free":""},{"id":"9367","name":"Milaor","address":"","is_gst_free":""},{"id":"9388","name":"Minalabac","address":"","is_gst_free":""},{"id":"9414","name":"Nabua","address":"","is_gst_free":""},{"id":"9457","name":"Naga City","address":"","is_gst_free":""},{"id":"9485","name":"Ocampo","address":"","is_gst_free":""},{"id":"9511","name":"Pamplona","address":"","is_gst_free":""},{"id":"9529","name":"Pasacao","address":"","is_gst_free":""},{"id":"9549","name":"Pili","address":"","is_gst_free":""},{"id":"9576","name":"Presentacion","address":"","is_gst_free":""},{"id":"9595","name":"Ragay","address":"","is_gst_free":""},{"id":"9634","name":"Sagnay","address":"","is_gst_free":""},{"id":"9654","name":"San Fernando","address":"","is_gst_free":""},{"id":"9677","name":"San Jose","address":"","is_gst_free":""},{"id":"9707","name":"Sipocot","address":"","is_gst_free":""},{"id":"9754","name":"Siruma","address":"","is_gst_free":""},{"id":"9777","name":"Tigaon","address":"","is_gst_free":""},{"id":"9801","name":"Tinambac","address":"","is_gst_free":""}]],"62":["Camiguin",[{"id":"9846","name":"Catarman","address":"","is_gst_free":""},{"id":"9861","name":"Guinsiliban","address":"","is_gst_free":""},{"id":"9869","name":"Mahinog","address":"","is_gst_free":""},{"id":"9883","name":"Mambajao","address":"","is_gst_free":""},{"id":"9899","name":"Sagay","address":"","is_gst_free":""}]],"63":["Capiz",[{"id":"9909","name":"Cuartero","address":"","is_gst_free":""},{"id":"9932","name":"Dao","address":"","is_gst_free":""},{"id":"9953","name":"Dumalag","address":"","is_gst_free":""},{"id":"9973","name":"Dumarao","address":"","is_gst_free":""},{"id":"10007","name":"Ivisan","address":"","is_gst_free":""},{"id":"10023","name":"Jamindan","address":"","is_gst_free":""},{"id":"10087","name":"Mambusao","address":"","is_gst_free":""},{"id":"10054","name":"Ma~ayon","address":"","is_gst_free":""},{"id":"10114","name":"Panay","address":"","is_gst_free":""},{"id":"10157","name":"Panitan","address":"","is_gst_free":""},{"id":"10184","name":"Pilar","address":"","is_gst_free":""},{"id":"10209","name":"Pontevedra","address":"","is_gst_free":""},{"id":"10236","name":"President Roxas","address":"","is_gst_free":""},{"id":"10259","name":"Roxas City","address":"","is_gst_free":""},{"id":"10307","name":"Sapi~an","address":"","is_gst_free":""},{"id":"10318","name":"Sigma","address":"","is_gst_free":""},{"id":"10340","name":"Tapaz","address":"","is_gst_free":""}]],"64":["Catanduanes",[{"id":"10399","name":"Bagamanoc","address":"","is_gst_free":""},{"id":"10418","name":"Baras","address":"","is_gst_free":""},{"id":"10448","name":"Bato","address":"","is_gst_free":""},{"id":"10476","name":"Caramoran","address":"","is_gst_free":""},{"id":"10504","name":"Gigmoto","address":"","is_gst_free":""},{"id":"10514","name":"Pandan","address":"","is_gst_free":""},{"id":"10541","name":"Panganiban","address":"","is_gst_free":""},{"id":"10565","name":"San Andres","address":"","is_gst_free":""},{"id":"10604","name":"San Miguel","address":"","is_gst_free":""},{"id":"10629","name":"Viga","address":"","is_gst_free":""},{"id":"10661","name":"Virac","address":"","is_gst_free":""}]],"65":["Cavite",[{"id":"10725","name":"Alfonso","address":"","is_gst_free":""},{"id":"10758","name":"Amadeo","address":"","is_gst_free":""},{"id":"10785","name":"Bacoor","address":"","is_gst_free":""},{"id":"10859","name":"Carmona","address":"","is_gst_free":""},{"id":"10874","name":"Cavite City","address":"","is_gst_free":""},{"id":"10959","name":"Dasmarinas City","address":"","is_gst_free":""},{"id":"11035","name":"Gen. Mariano Alvarez","address":"","is_gst_free":""},{"id":"11063","name":"General Emilio Aguinaldo","address":"","is_gst_free":""},{"id":"11078","name":"General Trias","address":"","is_gst_free":""},{"id":"11112","name":"Imus","address":"","is_gst_free":""},{"id":"11210","name":"Indang","address":"","is_gst_free":""},{"id":"11247","name":"Kawit","address":"","is_gst_free":""},{"id":"11271","name":"Magallanes","address":"","is_gst_free":""},{"id":"11288","name":"Maragondon","address":"","is_gst_free":""},{"id":"11316","name":"Mendez","address":"","is_gst_free":""},{"id":"11341","name":"Naic","address":"","is_gst_free":""},{"id":"11372","name":"Noveleta","address":"","is_gst_free":""},{"id":"11389","name":"Rosario","address":"","is_gst_free":""},{"id":"11410","name":"Silang","address":"","is_gst_free":""},{"id":"11475","name":"Tagaytay City","address":"","is_gst_free":""},{"id":"11510","name":"Tanza","address":"","is_gst_free":""},{"id":"11552","name":"Ternate","address":"","is_gst_free":""},{"id":"11563","name":"Trece Martires City","address":"","is_gst_free":""}]],"66":["Cebu",[{"id":"11577","name":"Alcantara","address":"","is_gst_free":""},{"id":"11587","name":"Alcoy","address":"","is_gst_free":""},{"id":"11596","name":"Alegria","address":"","is_gst_free":""},{"id":"11606","name":"Aloguinsan","address":"","is_gst_free":""},{"id":"11622","name":"Argao","address":"","is_gst_free":""},{"id":"11668","name":"Asturias","address":"","is_gst_free":""},{"id":"11696","name":"Badian","address":"","is_gst_free":""},{"id":"11726","name":"Balamban","address":"","is_gst_free":""},{"id":"11755","name":"Bantayan","address":"","is_gst_free":""},{"id":"11781","name":"Barili","address":"","is_gst_free":""},{"id":"11824","name":"Bogo City","address":"","is_gst_free":""},{"id":"11854","name":"Boljoon","address":"","is_gst_free":""},{"id":"11866","name":"Borbon","address":"","is_gst_free":""},{"id":"11886","name":"Carcar City","address":"","is_gst_free":""},{"id":"11902","name":"Carmen","address":"","is_gst_free":""},{"id":"11924","name":"Catmon","address":"","is_gst_free":""},{"id":"11945","name":"Cebu City","address":"","is_gst_free":""},{"id":"12026","name":"Compostela","address":"","is_gst_free":""},{"id":"12044","name":"Consolacion","address":"","is_gst_free":""},{"id":"12066","name":"Cordoba","address":"","is_gst_free":""},{"id":"12080","name":"Daanbantayan","address":"","is_gst_free":""},{"id":"12101","name":"Dalaguete","address":"","is_gst_free":""},{"id":"12135","name":"Danao City","address":"","is_gst_free":""},{"id":"12178","name":"Dumanjug","address":"","is_gst_free":""},{"id":"12216","name":"Ginatilan","address":"","is_gst_free":""},{"id":"12231","name":"Lapu~Lapu City","address":"","is_gst_free":""},{"id":"12262","name":"Liloan","address":"","is_gst_free":""},{"id":"12277","name":"Madridejos","address":"","is_gst_free":""},{"id":"12292","name":"Malabuyoc","address":"","is_gst_free":""},{"id":"12307","name":"Mandaue City","address":"","is_gst_free":""},{"id":"12335","name":"Medellin","address":"","is_gst_free":""},{"id":"12355","name":"Minglanilla","address":"","is_gst_free":""},{"id":"12375","name":"Moalboal","address":"","is_gst_free":""},{"id":"12391","name":"Naga City","address":"","is_gst_free":""},{"id":"12420","name":"Oslob","address":"","is_gst_free":""},{"id":"12442","name":"Pilar","address":"","is_gst_free":""},{"id":"12456","name":"Pinamungahan","address":"","is_gst_free":""},{"id":"12483","name":"Poro","address":"","is_gst_free":""},{"id":"12501","name":"Ronda","address":"","is_gst_free":""},{"id":"12516","name":"Samboan","address":"","is_gst_free":""},{"id":"12532","name":"San Fernando","address":"","is_gst_free":""},{"id":"12554","name":"San Francisco","address":"","is_gst_free":""},{"id":"12569","name":"San Remigio","address":"","is_gst_free":""},{"id":"12597","name":"Santa Fe","address":"","is_gst_free":""},{"id":"12608","name":"Santander","address":"","is_gst_free":""},{"id":"12619","name":"Sibonga","address":"","is_gst_free":""},{"id":"12645","name":"Sogod","address":"","is_gst_free":""},{"id":"12664","name":"Tabogon","address":"","is_gst_free":""},{"id":"12690","name":"Tabuelan","address":"","is_gst_free":""},{"id":"12703","name":"Talisay City","address":"","is_gst_free":""},{"id":"12726","name":"Toledo City","address":"","is_gst_free":""},{"id":"12765","name":"Tuburan","address":"","is_gst_free":""},{"id":"12820","name":"Tudela","address":"","is_gst_free":""}]],"12832":["Compostela Valley",[{"id":"12833","name":"Compostela","address":"","is_gst_free":""},{"id":"12850","name":"Laak","address":"","is_gst_free":""},{"id":"12891","name":"Mabini","address":"","is_gst_free":""},{"id":"12903","name":"Maco","address":"","is_gst_free":""},{"id":"12941","name":"Maragusan","address":"","is_gst_free":""},{"id":"12966","name":"Mawab","address":"","is_gst_free":""},{"id":"12978","name":"Monkayo","address":"","is_gst_free":""},{"id":"13000","name":"Montevista","address":"","is_gst_free":""},{"id":"13021","name":"Nabunturan","address":"","is_gst_free":""},{"id":"13050","name":"New Bataan","address":"","is_gst_free":""},{"id":"13067","name":"Pantukan","address":"","is_gst_free":""}]],"68":["Cotabato",[{"id":"13081","name":"Cotabato City","address":"","is_gst_free":""}]],"69":["Davao Del Norte",[{"id":"13119","name":"Asuncion","address":"","is_gst_free":""},{"id":"13140","name":"Braulio E. Dujali","address":"","is_gst_free":""},{"id":"13146","name":"Carmen","address":"","is_gst_free":""},{"id":"13167","name":"Island Garden City Of Samal","address":"","is_gst_free":""},{"id":"13214","name":"Kapalong","address":"","is_gst_free":""},{"id":"13229","name":"New Corella","address":"","is_gst_free":""},{"id":"13250","name":"Panabo City","address":"","is_gst_free":""},{"id":"13291","name":"San Isidro","address":"","is_gst_free":""},{"id":"13305","name":"Santo Tomas","address":"","is_gst_free":""},{"id":"13325","name":"Tagum City","address":"","is_gst_free":""},{"id":"13349","name":"Talaingod","address":"","is_gst_free":""}]],"70":["Davao Del Sur",[{"id":"13353","name":"Bansalan","address":"","is_gst_free":""},{"id":"13379","name":"Davao City","address":"","is_gst_free":""},{"id":"13561","name":"Digos City","address":"","is_gst_free":""},{"id":"13588","name":"Don Marcelino","address":"","is_gst_free":""},{"id":"13604","name":"Hagonoy","address":"","is_gst_free":""},{"id":"13626","name":"Jose Abad Santos","address":"","is_gst_free":""},{"id":"13653","name":"Kiblawan","address":"","is_gst_free":""},{"id":"13684","name":"Magsaysay","address":"","is_gst_free":""},{"id":"13707","name":"Malalag","address":"","is_gst_free":""},{"id":"13723","name":"Malita","address":"","is_gst_free":""},{"id":"13753","name":"Matanao","address":"","is_gst_free":""},{"id":"13787","name":"Padada","address":"","is_gst_free":""},{"id":"13805","name":"Santa Cruz","address":"","is_gst_free":""},{"id":"13824","name":"Santa Maria","address":"","is_gst_free":""},{"id":"107","name":"Sarangani","address":"","is_gst_free":""},{"id":"13859","name":"Sulop","address":"","is_gst_free":""}]],"71":["Davao Oriental",[{"id":"13885","name":"Baganga","address":"","is_gst_free":""},{"id":"13904","name":"Banaybanay","address":"","is_gst_free":""},{"id":"13919","name":"Boston","address":"","is_gst_free":""},{"id":"13928","name":"Caraga","address":"","is_gst_free":""},{"id":"13946","name":"Cateel","address":"","is_gst_free":""},{"id":"13963","name":"Governor Generoso","address":"","is_gst_free":""},{"id":"13984","name":"Lupon","address":"","is_gst_free":""},{"id":"14006","name":"Manay","address":"","is_gst_free":""},{"id":"14024","name":"Mati City","address":"","is_gst_free":""},{"id":"14051","name":"San Isidro","address":"","is_gst_free":""},{"id":"14068","name":"Tarragona","address":"","is_gst_free":""}]],"221":["Dinagat Islands",[{"id":"14079","name":"Basilisa","address":"","is_gst_free":""},{"id":"14107","name":"Cagdianao","address":"","is_gst_free":""},{"id":"14121","name":"Dinagat","address":"","is_gst_free":""},{"id":"14134","name":"Libjo","address":"","is_gst_free":""},{"id":"14151","name":"Loreto","address":"","is_gst_free":""},{"id":"14162","name":"San Jose","address":"","is_gst_free":""},{"id":"14175","name":"Tubajon","address":"","is_gst_free":""}]],"72":["Eastern Samar",[{"id":"14185","name":"Arteche","address":"","is_gst_free":""},{"id":"14206","name":"Balangiga","address":"","is_gst_free":""},{"id":"14220","name":"Balangkayan","address":"","is_gst_free":""},{"id":"14236","name":"Borongan City","address":"","is_gst_free":""},{"id":"14298","name":"Can~Avid","address":"","is_gst_free":""},{"id":"14327","name":"Dolores","address":"","is_gst_free":""},{"id":"14374","name":"General Macarthur","address":"","is_gst_free":""},{"id":"14405","name":"Giporlos","address":"","is_gst_free":""},{"id":"14424","name":"Guiuan","address":"","is_gst_free":""},{"id":"14485","name":"Hernani","address":"","is_gst_free":""},{"id":"14499","name":"Jipapad","address":"","is_gst_free":""},{"id":"14513","name":"Lawaan","address":"","is_gst_free":""},{"id":"14530","name":"Llorente","address":"","is_gst_free":""},{"id":"14564","name":"Maslog","address":"","is_gst_free":""},{"id":"14577","name":"Maydolong","address":"","is_gst_free":""},{"id":"14598","name":"Mercedes","address":"","is_gst_free":""},{"id":"14615","name":"Oras","address":"","is_gst_free":""},{"id":"14658","name":"Quinapondan","address":"","is_gst_free":""},{"id":"14684","name":"Salcedo","address":"","is_gst_free":""},{"id":"14726","name":"San Julian","address":"","is_gst_free":""},{"id":"14743","name":"San Policarpo","address":"","is_gst_free":""},{"id":"14761","name":"Sulat","address":"","is_gst_free":""},{"id":"14780","name":"Taft","address":"","is_gst_free":""}]],"73":["Guimaras",[{"id":"14805","name":"Buenavista","address":"","is_gst_free":""},{"id":"14842","name":"Jordan","address":"","is_gst_free":""},{"id":"14857","name":"Nueva Valencia","address":"","is_gst_free":""},{"id":"14880","name":"San Lorenzo","address":"","is_gst_free":""},{"id":"14893","name":"Sibunag","address":"","is_gst_free":""}]],"74":["Ifugao",[{"id":"14908","name":"Aguinaldo","address":"","is_gst_free":""},{"id":"14925","name":"Alfonso Lista","address":"","is_gst_free":""},{"id":"14946","name":"Asipulo","address":"","is_gst_free":""},{"id":"14956","name":"Banaue","address":"","is_gst_free":""},{"id":"14975","name":"Hingyon","address":"","is_gst_free":""},{"id":"14988","name":"Hungduan","address":"","is_gst_free":""},{"id":"14998","name":"Kiangan","address":"","is_gst_free":""},{"id":"15013","name":"Lagawe","address":"","is_gst_free":""},{"id":"15034","name":"Lamut","address":"","is_gst_free":""},{"id":"15053","name":"Mayoyao","address":"","is_gst_free":""},{"id":"15081","name":"Tinoc","address":"","is_gst_free":""}]],"75":["Ilocos Norte",[{"id":"15094","name":"Adams","address":"","is_gst_free":""},{"id":"15096","name":"Bacarra","address":"","is_gst_free":""},{"id":"15140","name":"Badoc","address":"","is_gst_free":""},{"id":"15172","name":"Bangui","address":"","is_gst_free":""},{"id":"15188","name":"Banna","address":"","is_gst_free":""},{"id":"15209","name":"Batac City","address":"","is_gst_free":""},{"id":"15253","name":"Burgos","address":"","is_gst_free":""},{"id":"15265","name":"Carasi","address":"","is_gst_free":""},{"id":"15269","name":"Currimao","address":"","is_gst_free":""},{"id":"15293","name":"Dingras","address":"","is_gst_free":""},{"id":"15325","name":"Dumalneg","address":"","is_gst_free":""},{"id":"15327","name":"Laoag City","address":"","is_gst_free":""},{"id":"15408","name":"Marcos","address":"","is_gst_free":""},{"id":"15422","name":"Nueva Era","address":"","is_gst_free":""},{"id":"15434","name":"Pagudpud","address":"","is_gst_free":""},{"id":"15451","name":"Paoay","address":"","is_gst_free":""},{"id":"15483","name":"Pasuquin","address":"","is_gst_free":""},{"id":"15517","name":"Piddig","address":"","is_gst_free":""},{"id":"15541","name":"Pinili","address":"","is_gst_free":""},{"id":"15567","name":"San Nicolas","address":"","is_gst_free":""},{"id":"15592","name":"Sarrat","address":"","is_gst_free":""},{"id":"15617","name":"Solsona","address":"","is_gst_free":""},{"id":"15640","name":"Vintar","address":"","is_gst_free":""}]],"76":["Ilocos Sur",[{"id":"15674","name":"Alilem","address":"","is_gst_free":""},{"id":"15684","name":"Banayoyo","address":"","is_gst_free":""},{"id":"15699","name":"Bantay","address":"","is_gst_free":""},{"id":"15734","name":"Burgos","address":"","is_gst_free":""},{"id":"15761","name":"Cabugao","address":"","is_gst_free":""},{"id":"15795","name":"Candon City","address":"","is_gst_free":""},{"id":"15838","name":"Caoayan","address":"","is_gst_free":""},{"id":"15856","name":"Cervantes","address":"","is_gst_free":""},{"id":"15870","name":"Galimuyod","address":"","is_gst_free":""},{"id":"15895","name":"Gregorio Del Pilar","address":"","is_gst_free":""},{"id":"15903","name":"Lidlidda","address":"","is_gst_free":""},{"id":"15915","name":"Magsingal","address":"","is_gst_free":""},{"id":"15946","name":"Nagbukel","address":"","is_gst_free":""},{"id":"15959","name":"Narvacan","address":"","is_gst_free":""},{"id":"15994","name":"Quirino","address":"","is_gst_free":""},{"id":"16004","name":"Salcedo","address":"","is_gst_free":""},{"id":"16026","name":"San Emilio","address":"","is_gst_free":""},{"id":"16035","name":"San Esteban","address":"","is_gst_free":""},{"id":"16046","name":"San Ildefonso","address":"","is_gst_free":""},{"id":"16062","name":"San Juan","address":"","is_gst_free":""},{"id":"16095","name":"San Vicente","address":"","is_gst_free":""},{"id":"16103","name":"Santa","address":"","is_gst_free":""},{"id":"16130","name":"Santa Catalina","address":"","is_gst_free":""},{"id":"16140","name":"Santa Cruz","address":"","is_gst_free":""},{"id":"16190","name":"Santa Lucia","address":"","is_gst_free":""},{"id":"16227","name":"Santa Maria","address":"","is_gst_free":""},{"id":"16261","name":"Santiago","address":"","is_gst_free":""},{"id":"16286","name":"Santo Domingo","address":"","is_gst_free":""},{"id":"16323","name":"Sigay","address":"","is_gst_free":""},{"id":"16331","name":"Sinait","address":"","is_gst_free":""},{"id":"16376","name":"Sugpon","address":"","is_gst_free":""},{"id":"16383","name":"Suyo","address":"","is_gst_free":""},{"id":"16392","name":"Tagudin","address":"","is_gst_free":""},{"id":"16436","name":"Vigan City","address":"","is_gst_free":""}]],"77":["Iloilo",[{"id":"16476","name":"Ajuy","address":"","is_gst_free":""},{"id":"16511","name":"Alimodian","address":"","is_gst_free":""},{"id":"16563","name":"Anilao","address":"","is_gst_free":""},{"id":"16585","name":"Badiangan","address":"","is_gst_free":""},{"id":"16617","name":"Balasan","address":"","is_gst_free":""},{"id":"16641","name":"Banate","address":"","is_gst_free":""},{"id":"16660","name":"Barotac Nuevo","address":"","is_gst_free":""},{"id":"16690","name":"Barotac Viejo","address":"","is_gst_free":""},{"id":"16717","name":"Batad","address":"","is_gst_free":""},{"id":"16742","name":"Bingawan","address":"","is_gst_free":""},{"id":"16757","name":"Cabatuan","address":"","is_gst_free":""},{"id":"16826","name":"Calinog","address":"","is_gst_free":""},{"id":"16886","name":"Carles","address":"","is_gst_free":""},{"id":"16920","name":"Concepcion","address":"","is_gst_free":""},{"id":"16946","name":"Dingle","address":"","is_gst_free":""},{"id":"16980","name":"Duenas","address":"","is_gst_free":""},{"id":"17027","name":"Dumangas","address":"","is_gst_free":""},{"id":"17073","name":"Estancia","address":"","is_gst_free":""},{"id":"17099","name":"Guimbal","address":"","is_gst_free":""},{"id":"17133","name":"Igbaras","address":"","is_gst_free":""},{"id":"17180","name":"Iloilo City","address":"","is_gst_free":""},{"id":"17361","name":"Janiuay","address":"","is_gst_free":""},{"id":"17422","name":"Lambunao","address":"","is_gst_free":""},{"id":"17496","name":"Leganes","address":"","is_gst_free":""},{"id":"17515","name":"Lemery","address":"","is_gst_free":""},{"id":"17547","name":"Leon","address":"","is_gst_free":""},{"id":"17633","name":"Maasin","address":"","is_gst_free":""},{"id":"17684","name":"Miagao","address":"","is_gst_free":""},{"id":"17804","name":"Mina","address":"","is_gst_free":""},{"id":"17827","name":"New Lucena","address":"","is_gst_free":""},{"id":"17849","name":"Oton","address":"","is_gst_free":""},{"id":"17887","name":"Passi City","address":"","is_gst_free":""},{"id":"17939","name":"Pavia","address":"","is_gst_free":""},{"id":"17958","name":"Pototan","address":"","is_gst_free":""},{"id":"18009","name":"San Dionisio","address":"","is_gst_free":""},{"id":"18039","name":"San Enrique","address":"","is_gst_free":""},{"id":"18068","name":"San Joaquin","address":"","is_gst_free":""},{"id":"18154","name":"San Miguel","address":"","is_gst_free":""},{"id":"18179","name":"San Rafael","address":"","is_gst_free":""},{"id":"18189","name":"Santa Barbara","address":"","is_gst_free":""},{"id":"18250","name":"Sara","address":"","is_gst_free":""},{"id":"18293","name":"Tigbauan","address":"","is_gst_free":""},{"id":"18346","name":"Tubungan","address":"","is_gst_free":""},{"id":"18395","name":"Zarraga","address":"","is_gst_free":""}]],"78":["Isabela",[{"id":"18442","name":"Alicia","address":"","is_gst_free":""},{"id":"18477","name":"Angadanan","address":"","is_gst_free":""},{"id":"18537","name":"Aurora","address":"","is_gst_free":""},{"id":"18571","name":"Benito Soliven","address":"","is_gst_free":""},{"id":"18601","name":"Burgos","address":"","is_gst_free":""},{"id":"18616","name":"Cabagan","address":"","is_gst_free":""},{"id":"18643","name":"Cabatuan","address":"","is_gst_free":""},{"id":"18666","name":"Cauayan City","address":"","is_gst_free":""},{"id":"18732","name":"Cordon","address":"","is_gst_free":""},{"id":"18759","name":"Delfin Albano","address":"","is_gst_free":""},{"id":"18789","name":"Dinapigue","address":"","is_gst_free":""},{"id":"18796","name":"Divilacan","address":"","is_gst_free":""},{"id":"18809","name":"Echague","address":"","is_gst_free":""},{"id":"18874","name":"Gamu","address":"","is_gst_free":""},{"id":"18891","name":"Ilagan","address":"","is_gst_free":""},{"id":"18983","name":"Jones","address":"","is_gst_free":""},{"id":"19026","name":"Luna","address":"","is_gst_free":""},{"id":"19046","name":"Maconacon","address":"","is_gst_free":""},{"id":"19057","name":"Mallig","address":"","is_gst_free":""},{"id":"19076","name":"Naguilian","address":"","is_gst_free":""},{"id":"19102","name":"Palanan","address":"","is_gst_free":""},{"id":"19120","name":"Quezon","address":"","is_gst_free":""},{"id":"19136","name":"Quirino","address":"","is_gst_free":""},{"id":"19158","name":"Ramon","address":"","is_gst_free":""},{"id":"19178","name":"Reina Mercedes","address":"","is_gst_free":""},{"id":"19199","name":"Roxas","address":"","is_gst_free":""},{"id":"19226","name":"San Agustin","address":"","is_gst_free":""},{"id":"19250","name":"San Guillermo","address":"","is_gst_free":""},{"id":"19276","name":"San Isidro","address":"","is_gst_free":""},{"id":"19290","name":"San Manuel","address":"","is_gst_free":""},{"id":"19310","name":"San Mariano","address":"","is_gst_free":""},{"id":"19347","name":"San Mateo","address":"","is_gst_free":""},{"id":"19381","name":"San Pablo","address":"","is_gst_free":""},{"id":"19399","name":"Santa Maria","address":"","is_gst_free":""},{"id":"19420","name":"Santiago City","address":"","is_gst_free":""},{"id":"19458","name":"Santo Tomas","address":"","is_gst_free":""},{"id":"19486","name":"Tumauini","address":"","is_gst_free":""}]],"79":["Kalinga",[{"id":"19533","name":"Balbalan","address":"","is_gst_free":""},{"id":"19548","name":"Lubuagan","address":"","is_gst_free":""},{"id":"19558","name":"Pasil","address":"","is_gst_free":""},{"id":"19573","name":"Pinukpuk","address":"","is_gst_free":""},{"id":"19597","name":"Rizal","address":"","is_gst_free":""},{"id":"19612","name":"Tabuk City","address":"","is_gst_free":""},{"id":"19655","name":"Tanudan","address":"","is_gst_free":""},{"id":"19672","name":"Tinglayan","address":"","is_gst_free":""}]],"19693":["La Union",[{"id":"19694","name":"Agoo","address":"","is_gst_free":""},{"id":"19744","name":"Aringay","address":"","is_gst_free":""},{"id":"19769","name":"Bacnotan","address":"","is_gst_free":""},{"id":"19817","name":"Bagulin","address":"","is_gst_free":""},{"id":"19828","name":"Balaoan","address":"","is_gst_free":""},{"id":"19865","name":"Bangar","address":"","is_gst_free":""},{"id":"19899","name":"Bauang","address":"","is_gst_free":""},{"id":"19939","name":"Burgos","address":"","is_gst_free":""},{"id":"19952","name":"Caba","address":"","is_gst_free":""},{"id":"19970","name":"Luna","address":"","is_gst_free":""},{"id":"20011","name":"Naguilian","address":"","is_gst_free":""},{"id":"20049","name":"Pugo","address":"","is_gst_free":""},{"id":"20064","name":"Rosario","address":"","is_gst_free":""},{"id":"20098","name":"San Fernando City","address":"","is_gst_free":""},{"id":"20158","name":"San Gabriel","address":"","is_gst_free":""},{"id":"20174","name":"San Juan","address":"","is_gst_free":""},{"id":"20216","name":"Santo Tomas","address":"","is_gst_free":""},{"id":"20241","name":"Santol","address":"","is_gst_free":""},{"id":"20253","name":"Sudipen","address":"","is_gst_free":""},{"id":"20271","name":"Tubao","address":"","is_gst_free":""}]],"20290":["Laguna",[{"id":"20291","name":"Alaminos","address":"","is_gst_free":""},{"id":"20307","name":"Bay","address":"","is_gst_free":""},{"id":"20323","name":"Binan City","address":"","is_gst_free":""},{"id":"20348","name":"Cabuyao","address":"","is_gst_free":""},{"id":"20367","name":"Calamba City","address":"","is_gst_free":""},{"id":"20422","name":"Calauan","address":"","is_gst_free":""},{"id":"20440","name":"Cavinti","address":"","is_gst_free":""},{"id":"20460","name":"Famy","address":"","is_gst_free":""},{"id":"20481","name":"Kalayaan","address":"","is_gst_free":""},{"id":"20485","name":"Liliw","address":"","is_gst_free":""},{"id":"20519","name":"Los Banos","address":"","is_gst_free":""},{"id":"20534","name":"Luisiana","address":"","is_gst_free":""},{"id":"20558","name":"Lumban","address":"","is_gst_free":""},{"id":"20575","name":"Mabitac","address":"","is_gst_free":""},{"id":"20591","name":"Magdalena","address":"","is_gst_free":""},{"id":"20616","name":"Majayjay","address":"","is_gst_free":""},{"id":"20657","name":"Nagcarlan","address":"","is_gst_free":""},{"id":"20710","name":"Paete","address":"","is_gst_free":""},{"id":"20720","name":"Pagsanjan","address":"","is_gst_free":""},{"id":"20737","name":"Pakil","address":"","is_gst_free":""},{"id":"20751","name":"Pangil","address":"","is_gst_free":""},{"id":"20760","name":"Pila","address":"","is_gst_free":""},{"id":"20778","name":"Rizal","address":"","is_gst_free":""},{"id":"20790","name":"San Pablo City","address":"","is_gst_free":""},{"id":"20871","name":"San Pedro","address":"","is_gst_free":""},{"id":"20892","name":"Santa Cruz","address":"","is_gst_free":""},{"id":"20919","name":"Santa Maria","address":"","is_gst_free":""},{"id":"20945","name":"Santa Rosa City","address":"","is_gst_free":""},{"id":"20964","name":"Siniloan","address":"","is_gst_free":""},{"id":"20985","name":"Victoria","address":"","is_gst_free":""}]],"82":["Lanao Del Norte",[{"id":"20995","name":"Bacolod","address":"","is_gst_free":""},{"id":"21012","name":"Baloi","address":"","is_gst_free":""},{"id":"21034","name":"Baroy","address":"","is_gst_free":""},{"id":"21058","name":"Iligan City","address":"","is_gst_free":""},{"id":"21103","name":"Kapatagan","address":"","is_gst_free":""},{"id":"21137","name":"Kauswagan","address":"","is_gst_free":""},{"id":"21151","name":"Kolambugan","address":"","is_gst_free":""},{"id":"21178","name":"Lala","address":"","is_gst_free":""},{"id":"21206","name":"Linamon","address":"","is_gst_free":""},{"id":"21215","name":"Magsaysay","address":"","is_gst_free":""},{"id":"21240","name":"Maigo","address":"","is_gst_free":""},{"id":"21254","name":"Matungao","address":"","is_gst_free":""},{"id":"21267","name":"Munai","address":"","is_gst_free":""},{"id":"21294","name":"Nunungan","address":"","is_gst_free":""},{"id":"21320","name":"Pantao Ragat","address":"","is_gst_free":""},{"id":"21341","name":"Pantar","address":"","is_gst_free":""},{"id":"21363","name":"Poona Piagapo","address":"","is_gst_free":""},{"id":"21390","name":"Salvador","address":"","is_gst_free":""},{"id":"21416","name":"Sapad","address":"","is_gst_free":""},{"id":"21434","name":"Sultan Naga Dimaporo","address":"","is_gst_free":""},{"id":"21471","name":"Tagoloan","address":"","is_gst_free":""},{"id":"21479","name":"Tangcal","address":"","is_gst_free":""},{"id":"21498","name":"Tubod","address":"","is_gst_free":""}]],"83":["Lanao Del Sur",[{"id":"21523","name":"Bacolod~Kalawi","address":"","is_gst_free":""},{"id":"21550","name":"Balabagan","address":"","is_gst_free":""},{"id":"21578","name":"Balindong","address":"","is_gst_free":""},{"id":"21617","name":"Bayang","address":"","is_gst_free":""},{"id":"21667","name":"Binidayan","address":"","is_gst_free":""},{"id":"21694","name":"Buadiposo~Buntong","address":"","is_gst_free":""},{"id":"21728","name":"Bubong","address":"","is_gst_free":""},{"id":"21765","name":"Bumbaran","address":"","is_gst_free":""},{"id":"21783","name":"Butig","address":"","is_gst_free":""},{"id":"21800","name":"Calanogas","address":"","is_gst_free":""},{"id":"21818","name":"Ditsaan~Ramain","address":"","is_gst_free":""},{"id":"21854","name":"Ganassi","address":"","is_gst_free":""},{"id":"21887","name":"Kapai","address":"","is_gst_free":""},{"id":"21908","name":"Kapatagan","address":"","is_gst_free":""},{"id":"21963","name":"Lumbaca~Unayan","address":"","is_gst_free":""},{"id":"21973","name":"Lumbatan","address":"","is_gst_free":""},{"id":"21995","name":"Lumbayanague","address":"","is_gst_free":""},{"id":"21924","name":"Lumba~Bayabao","address":"","is_gst_free":""},{"id":"22018","name":"Madalum","address":"","is_gst_free":""},{"id":"22056","name":"Madamba","address":"","is_gst_free":""},{"id":"22081","name":"Maguing","address":"","is_gst_free":""},{"id":"22116","name":"Malabang","address":"","is_gst_free":""},{"id":"22154","name":"Marantao","address":"","is_gst_free":""},{"id":"22189","name":"Marawi City","address":"","is_gst_free":""},{"id":"22286","name":"Marogong","address":"","is_gst_free":""},{"id":"22311","name":"Masiu","address":"","is_gst_free":""},{"id":"22347","name":"Mulondo","address":"","is_gst_free":""},{"id":"22374","name":"Pagayawan","address":"","is_gst_free":""},{"id":"22393","name":"Piagapo","address":"","is_gst_free":""},{"id":"22431","name":"Picong","address":"","is_gst_free":""},{"id":"22451","name":"Poona Bayabao","address":"","is_gst_free":""},{"id":"22477","name":"Pualas","address":"","is_gst_free":""},{"id":"22501","name":"Saguiaran","address":"","is_gst_free":""},{"id":"22532","name":"Sultan Dumalondong","address":"","is_gst_free":""},{"id":"22540","name":"Tagoloan Ii","address":"","is_gst_free":""},{"id":"22560","name":"Tamparan","address":"","is_gst_free":""},{"id":"22605","name":"Taraka","address":"","is_gst_free":""},{"id":"22649","name":"Tubaran","address":"","is_gst_free":""},{"id":"22671","name":"Tugaya","address":"","is_gst_free":""},{"id":"22695","name":"Wao","address":"","is_gst_free":""}]],"84":["Leyte",[{"id":"22744","name":"Abuyog","address":"","is_gst_free":""},{"id":"22808","name":"Alangalang","address":"","is_gst_free":""},{"id":"22863","name":"Albuera","address":"","is_gst_free":""},{"id":"22880","name":"Babatngon","address":"","is_gst_free":""},{"id":"22906","name":"Barugo","address":"","is_gst_free":""},{"id":"22944","name":"Bato","address":"","is_gst_free":""},{"id":"22977","name":"Baybay City","address":"","is_gst_free":""},{"id":"23070","name":"Burauen","address":"","is_gst_free":""},{"id":"23202","name":"Capoocan","address":"","is_gst_free":""},{"id":"23224","name":"Carigara","address":"","is_gst_free":""},{"id":"23274","name":"Dagami","address":"","is_gst_free":""},{"id":"23340","name":"Dulag","address":"","is_gst_free":""},{"id":"23386","name":"Hilongos","address":"","is_gst_free":""},{"id":"23438","name":"Hindang","address":"","is_gst_free":""},{"id":"23459","name":"Inopacan","address":"","is_gst_free":""},{"id":"23480","name":"Isabel","address":"","is_gst_free":""},{"id":"23505","name":"Jaro","address":"","is_gst_free":""},{"id":"23552","name":"Javier","address":"","is_gst_free":""},{"id":"23581","name":"Julita","address":"","is_gst_free":""},{"id":"23608","name":"Kananga","address":"","is_gst_free":""},{"id":"23632","name":"La Paz","address":"","is_gst_free":""},{"id":"23668","name":"Leyte","address":"","is_gst_free":""},{"id":"23699","name":"Macarthur","address":"","is_gst_free":""},{"id":"23731","name":"Mahaplag","address":"","is_gst_free":""},{"id":"23760","name":"Matag~Ob","address":"","is_gst_free":""},{"id":"23782","name":"Matalom","address":"","is_gst_free":""},{"id":"23813","name":"Mayorga","address":"","is_gst_free":""},{"id":"23830","name":"Merida","address":"","is_gst_free":""},{"id":"23853","name":"Ormoc City","address":"","is_gst_free":""},{"id":"23964","name":"Palo","address":"","is_gst_free":""},{"id":"23998","name":"Palompon","address":"","is_gst_free":""},{"id":"24049","name":"Pastrana","address":"","is_gst_free":""},{"id":"24079","name":"San Isidro","address":"","is_gst_free":""},{"id":"24099","name":"San Miguel","address":"","is_gst_free":""},{"id":"24121","name":"Santa Fe","address":"","is_gst_free":""},{"id":"24142","name":"Tabango","address":"","is_gst_free":""},{"id":"24156","name":"Tabontabon","address":"","is_gst_free":""},{"id":"24173","name":"Tacloban City","address":"","is_gst_free":""},{"id":"24312","name":"Tanauan","address":"","is_gst_free":""},{"id":"24367","name":"Tolosa","address":"","is_gst_free":""},{"id":"24383","name":"Tunga","address":"","is_gst_free":""},{"id":"24392","name":"Villaba","address":"","is_gst_free":""}]],"24428":["Maguindanao",[{"id":"24429","name":"Ampatuan","address":"","is_gst_free":""},{"id":"24441","name":"Barira","address":"","is_gst_free":""},{"id":"24456","name":"Buldon","address":"","is_gst_free":""},{"id":"24472","name":"Buluan","address":"","is_gst_free":""},{"id":"24480","name":"Datu Abdullah Sangki","address":"","is_gst_free":""},{"id":"24491","name":"Datu Anggal Midtimbang","address":"","is_gst_free":""},{"id":"24499","name":"Datu Blah T. Sinsuat","address":"","is_gst_free":""},{"id":"24513","name":"Datu Hoffer Ampatuan","address":"","is_gst_free":""},{"id":"24525","name":"Datu Odin Sinsuat","address":"","is_gst_free":""},{"id":"24560","name":"Datu Paglas","address":"","is_gst_free":""},{"id":"24584","name":"Datu Piang","address":"","is_gst_free":""},{"id":"24601","name":"Datu Salibo","address":"","is_gst_free":""},{"id":"24619","name":"Datu Saudi~Ampatuan","address":"","is_gst_free":""},{"id":"24628","name":"Datu Unsay","address":"","is_gst_free":""},{"id":"24637","name":"Gen. S. K. Pendatun","address":"","is_gst_free":""},{"id":"24657","name":"Guindulungan","address":"","is_gst_free":""},{"id":"24669","name":"Kabuntalan","address":"","is_gst_free":""},{"id":"24687","name":"Mamasapano","address":"","is_gst_free":""},{"id":"24702","name":"Mangudadatu","address":"","is_gst_free":""},{"id":"24711","name":"Matanog","address":"","is_gst_free":""},{"id":"24720","name":"Northern Kabuntalan","address":"","is_gst_free":""},{"id":"24732","name":"Pagagawan","address":"","is_gst_free":""},{"id":"24744","name":"Pagalungan","address":"","is_gst_free":""},{"id":"24757","name":"Paglat","address":"","is_gst_free":""},{"id":"24766","name":"Pandag","address":"","is_gst_free":""},{"id":"24775","name":"Parang","address":"","is_gst_free":""},{"id":"24801","name":"Rajah Buayan","address":"","is_gst_free":""},{"id":"24813","name":"Shariff Aguak","address":"","is_gst_free":""},{"id":"24827","name":"Shariff Saydona Mustapha","address":"","is_gst_free":""},{"id":"24844","name":"South Upi","address":"","is_gst_free":""},{"id":"112","name":"Sultan Kudarat","address":"","is_gst_free":""},{"id":"24895","name":"Sultan Mastura","address":"","is_gst_free":""},{"id":"24909","name":"Sultan Sa Barongis","address":"","is_gst_free":""},{"id":"24922","name":"Talayan","address":"","is_gst_free":""},{"id":"24938","name":"Talitay","address":"","is_gst_free":""},{"id":"24948","name":"Upi","address":"","is_gst_free":""}]],"86":["Marinduque",[{"id":"25077","name":"Boac","address":"","is_gst_free":""},{"id":"25139","name":"Buenavista","address":"","is_gst_free":""},{"id":"25155","name":"Gasan","address":"","is_gst_free":""},{"id":"25181","name":"Mogpog","address":"","is_gst_free":""},{"id":"25219","name":"Santa Cruz","address":"","is_gst_free":""},{"id":"25275","name":"Torrijos","address":"","is_gst_free":""}]],"87":["Masbate",[{"id":"25301","name":"Aroroy","address":"","is_gst_free":""},{"id":"25343","name":"Baleno","address":"","is_gst_free":""},{"id":"25368","name":"Balud","address":"","is_gst_free":""},{"id":"25401","name":"Batuan","address":"","is_gst_free":""},{"id":"25416","name":"Cataingan","address":"","is_gst_free":""},{"id":"25453","name":"Cawayan","address":"","is_gst_free":""},{"id":"25491","name":"Claveria","address":"","is_gst_free":""},{"id":"25514","name":"Dimasalang","address":"","is_gst_free":""},{"id":"25535","name":"Esperanza","address":"","is_gst_free":""},{"id":"25556","name":"Mandaon","address":"","is_gst_free":""},{"id":"25583","name":"Masbate City","address":"","is_gst_free":""},{"id":"25614","name":"Milagros","address":"","is_gst_free":""},{"id":"25642","name":"Mobo","address":"","is_gst_free":""},{"id":"25672","name":"Monreal","address":"","is_gst_free":""},{"id":"25684","name":"Palanas","address":"","is_gst_free":""},{"id":"25709","name":"Pio V. Corpuz","address":"","is_gst_free":""},{"id":"25728","name":"Placer","address":"","is_gst_free":""},{"id":"25764","name":"San Fernando","address":"","is_gst_free":""},{"id":"25791","name":"San Jacinto","address":"","is_gst_free":""},{"id":"25813","name":"San Pascual","address":"","is_gst_free":""},{"id":"25836","name":"Uson","address":"","is_gst_free":""}]],"8262":["Metro Manila~Caloocan",[{"id":"8263","name":"Caloocan City","address":"","is_gst_free":""}]],"22722":["Metro Manila~Las Pinas",[{"id":"22723","name":"Las Pinas City","address":"","is_gst_free":""}]],"24972":["Metro Manila~Makati",[{"id":"24973","name":"Makati City","address":"","is_gst_free":""}]],"25007":["Metro Manila~Malabon",[{"id":"25008","name":"Malabon City","address":"","is_gst_free":""}]],"25030":["Metro Manila~Mandaluyong",[{"id":"25031","name":"Mandaluyong City","address":"","is_gst_free":""}]],"88":["Metro Manila~Manila",[{"id":"25872","name":"Binondo","address":"","is_gst_free":""},{"id":"25883","name":"Ermita","address":"","is_gst_free":""},{"id":"25897","name":"Intramuros","address":"","is_gst_free":""},{"id":"25903","name":"Malate","address":"","is_gst_free":""},{"id":"25961","name":"Paco","address":"","is_gst_free":""},{"id":"26005","name":"Pandacan","address":"","is_gst_free":""},{"id":"26044","name":"Port Area","address":"","is_gst_free":""},{"id":"26050","name":"Quiapo","address":"","is_gst_free":""},{"id":"26067","name":"Sampaloc","address":"","is_gst_free":""},{"id":"26311","name":"San Miguel","address":"","is_gst_free":""},{"id":"26324","name":"San Nicolas","address":"","is_gst_free":""},{"id":"26340","name":"Santa Ana","address":"","is_gst_free":""},{"id":"26440","name":"Santa Cruz","address":"","is_gst_free":""},{"id":"43887","name":"Santa Mesa","address":"","is_gst_free":""},{"id":"26523","name":"Tondo I \/ Ii","address":"","is_gst_free":""}]],"25059":["Metro Manila~Marikina",[{"id":"25060","name":"Marikina City","address":"","is_gst_free":""}]],"27973":["Metro Manila~Muntinlupa",[{"id":"27974","name":"Muntinlupa City","address":"","is_gst_free":""}]],"27984":["Metro Manila~Navotas",[{"id":"27985","name":"Navotas City","address":"","is_gst_free":""}]],"34589":["Metro Manila~Paranaque",[{"id":"34590","name":"Paranaque City","address":"","is_gst_free":""}]],"34607":["Metro Manila~Pasay",[{"id":"34608","name":"Pasay City","address":"","is_gst_free":""}]],"34810":["Metro Manila~Pasig",[{"id":"34811","name":"Pasig City","address":"","is_gst_free":""}]],"34842":["Metro Manila~Pateros",[{"id":"34843","name":"Pateros","address":"","is_gst_free":""}]],"36138":["Metro Manila~Quezon City",[{"id":"36139","name":"Quezon City","address":"","is_gst_free":""}]],"36861":["Metro Manila~San Juan",[{"id":"36862","name":"San Juan City","address":"","is_gst_free":""}]],"39826":["Metro Manila~Taguig",[{"id":"39827","name":"Taguig City","address":"","is_gst_free":""}]],"40599":["Metro Manila~Valenzuela",[{"id":"40600","name":"Valenzuela City","address":"","is_gst_free":""}]],"91":["Misamis Occidental",[{"id":"26783","name":"Aloran","address":"","is_gst_free":""},{"id":"26821","name":"Baliangao","address":"","is_gst_free":""},{"id":"26837","name":"Bonifacio","address":"","is_gst_free":""},{"id":"26866","name":"Calamba","address":"","is_gst_free":""},{"id":"26886","name":"Clarin","address":"","is_gst_free":""},{"id":"26916","name":"Concepcion","address":"","is_gst_free":""},{"id":"26935","name":"Don Victoriano Chiongbian","address":"","is_gst_free":""},{"id":"26947","name":"Jimenez","address":"","is_gst_free":""},{"id":"26972","name":"Lopez Jaena","address":"","is_gst_free":""},{"id":"27001","name":"Oroquieta City","address":"","is_gst_free":""},{"id":"27049","name":"Ozamis City","address":"","is_gst_free":""},{"id":"27101","name":"Panaon","address":"","is_gst_free":""},{"id":"27118","name":"Plaridel","address":"","is_gst_free":""},{"id":"27152","name":"Sapang Dalaga","address":"","is_gst_free":""},{"id":"27181","name":"Sinacaban","address":"","is_gst_free":""},{"id":"27199","name":"Tangub City","address":"","is_gst_free":""},{"id":"27255","name":"Tudela","address":"","is_gst_free":""}]],"92":["Misamis Oriental",[{"id":"27289","name":"Alubijid","address":"","is_gst_free":""},{"id":"27306","name":"Balingasag","address":"","is_gst_free":""},{"id":"27337","name":"Balingoan","address":"","is_gst_free":""},{"id":"27347","name":"Binuangan","address":"","is_gst_free":""},{"id":"27356","name":"Cagayan De Oro City","address":"","is_gst_free":""},{"id":"27437","name":"Claveria","address":"","is_gst_free":""},{"id":"27462","name":"El Salvador City","address":"","is_gst_free":""},{"id":"27478","name":"Gingoog City","address":"","is_gst_free":""},{"id":"27558","name":"Gitagum","address":"","is_gst_free":""},{"id":"27570","name":"Initao","address":"","is_gst_free":""},{"id":"27587","name":"Jasaan","address":"","is_gst_free":""},{"id":"27603","name":"Kinoguitan","address":"","is_gst_free":""},{"id":"27619","name":"Lagonglong","address":"","is_gst_free":""},{"id":"27630","name":"Laguindingan","address":"","is_gst_free":""},{"id":"27642","name":"Libertad","address":"","is_gst_free":""},{"id":"27652","name":"Lugait","address":"","is_gst_free":""},{"id":"27661","name":"Magsaysay","address":"","is_gst_free":""},{"id":"27687","name":"Manticao","address":"","is_gst_free":""},{"id":"27701","name":"Medina","address":"","is_gst_free":""},{"id":"27721","name":"Naawan","address":"","is_gst_free":""},{"id":"27732","name":"Opol","address":"","is_gst_free":""},{"id":"27747","name":"Salay","address":"","is_gst_free":""},{"id":"27766","name":"Sugbongcogon","address":"","is_gst_free":""},{"id":"27777","name":"Tagoloan","address":"","is_gst_free":""},{"id":"27788","name":"Talisayan","address":"","is_gst_free":""},{"id":"27807","name":"Villanueva","address":"","is_gst_free":""}]],"93":["Mountain Province",[{"id":"27819","name":"Barlig","address":"","is_gst_free":""},{"id":"27831","name":"Bauko","address":"","is_gst_free":""},{"id":"27854","name":"Besao","address":"","is_gst_free":""},{"id":"27869","name":"Bontoc","address":"","is_gst_free":""},{"id":"27886","name":"Natonin","address":"","is_gst_free":""},{"id":"27898","name":"Paracelis","address":"","is_gst_free":""},{"id":"27908","name":"Sabangan","address":"","is_gst_free":""},{"id":"27924","name":"Sadanga","address":"","is_gst_free":""},{"id":"27933","name":"Sagada","address":"","is_gst_free":""},{"id":"27953","name":"Tadian","address":"","is_gst_free":""}]],"94":["Negros Occidental",[{"id":"27999","name":"Bacolod City","address":"","is_gst_free":""},{"id":"28061","name":"Bago City","address":"","is_gst_free":""},{"id":"28086","name":"Binalbagan","address":"","is_gst_free":""},{"id":"28103","name":"Cadiz City","address":"","is_gst_free":""},{"id":"28126","name":"Calatrava","address":"","is_gst_free":""},{"id":"28167","name":"Candoni","address":"","is_gst_free":""},{"id":"28177","name":"Cauayan","address":"","is_gst_free":""},{"id":"28203","name":"Enrique B. Magalona","address":"","is_gst_free":""},{"id":"28227","name":"Escalante City","address":"","is_gst_free":""},{"id":"28249","name":"Himamaylan City","address":"","is_gst_free":""},{"id":"28269","name":"Hinigaran","address":"","is_gst_free":""},{"id":"28294","name":"Hinoba~an","address":"","is_gst_free":""},{"id":"28308","name":"Ilog","address":"","is_gst_free":""},{"id":"28324","name":"Isabela","address":"","is_gst_free":""},{"id":"28355","name":"Kabankalan City","address":"","is_gst_free":""},{"id":"28388","name":"La Carlota City","address":"","is_gst_free":""},{"id":"28403","name":"La Castellana","address":"","is_gst_free":""},{"id":"28417","name":"Manapla","address":"","is_gst_free":""},{"id":"28430","name":"Moises Padilla","address":"","is_gst_free":""},{"id":"28446","name":"Murcia","address":"","is_gst_free":""},{"id":"28470","name":"Pontevedra","address":"","is_gst_free":""},{"id":"28491","name":"Pulupandan","address":"","is_gst_free":""},{"id":"28512","name":"Sagay City","address":"","is_gst_free":""},{"id":"28538","name":"Salvador Benedicto","address":"","is_gst_free":""},{"id":"28546","name":"San Carlos City","address":"","is_gst_free":""},{"id":"28565","name":"San Enrique","address":"","is_gst_free":""},{"id":"28576","name":"Silay City","address":"","is_gst_free":""},{"id":"28593","name":"Sipalay City","address":"","is_gst_free":""},{"id":"28611","name":"Talisay City","address":"","is_gst_free":""},{"id":"28639","name":"Toboso","address":"","is_gst_free":""},{"id":"28649","name":"Valladolid","address":"","is_gst_free":""},{"id":"28666","name":"Victorias City","address":"","is_gst_free":""}]],"95":["Negros Oriental",[{"id":"28693","name":"Amlan","address":"","is_gst_free":""},{"id":"28702","name":"Ayungon","address":"","is_gst_free":""},{"id":"28727","name":"Bacong","address":"","is_gst_free":""},{"id":"28750","name":"Bais City","address":"","is_gst_free":""},{"id":"28786","name":"Basay","address":"","is_gst_free":""},{"id":"28797","name":"Bayawan City","address":"","is_gst_free":""},{"id":"28826","name":"Bindoy","address":"","is_gst_free":""},{"id":"28849","name":"Canlaon City","address":"","is_gst_free":""},{"id":"28862","name":"Dauin","address":"","is_gst_free":""},{"id":"28886","name":"Dumaguete City","address":"","is_gst_free":""},{"id":"28917","name":"Guihulngan City","address":"","is_gst_free":""},{"id":"28951","name":"Jimalalud","address":"","is_gst_free":""},{"id":"28980","name":"La Libertad","address":"","is_gst_free":""},{"id":"29010","name":"Mabinay","address":"","is_gst_free":""},{"id":"29043","name":"Manjuyod","address":"","is_gst_free":""},{"id":"29071","name":"Pamplona","address":"","is_gst_free":""},{"id":"29088","name":"San Jose","address":"","is_gst_free":""},{"id":"29103","name":"Santa Catalina","address":"","is_gst_free":""},{"id":"29126","name":"Siaton","address":"","is_gst_free":""},{"id":"29153","name":"Sibulan","address":"","is_gst_free":""},{"id":"29169","name":"Tanjay City","address":"","is_gst_free":""},{"id":"29194","name":"Tayasan","address":"","is_gst_free":""},{"id":"29223","name":"Valencia","address":"","is_gst_free":""},{"id":"29248","name":"Vallehermoso","address":"","is_gst_free":""},{"id":"29264","name":"Zamboanguita","address":"","is_gst_free":""}]],"29275":["North Cotabato",[{"id":"29276","name":"Alamada","address":"","is_gst_free":""},{"id":"29294","name":"Aleosan","address":"","is_gst_free":""},{"id":"29314","name":"Antipas","address":"","is_gst_free":""},{"id":"29328","name":"Arakan","address":"","is_gst_free":""},{"id":"29357","name":"Banisilan","address":"","is_gst_free":""},{"id":"29378","name":"Carmen","address":"","is_gst_free":""},{"id":"29407","name":"Kabacan","address":"","is_gst_free":""},{"id":"29432","name":"Kidapawan City","address":"","is_gst_free":""},{"id":"29473","name":"Libungan","address":"","is_gst_free":""},{"id":"29494","name":"Magpet","address":"","is_gst_free":""},{"id":"29527","name":"Makilala","address":"","is_gst_free":""},{"id":"29566","name":"Matalam","address":"","is_gst_free":""},{"id":"29601","name":"Midsayap","address":"","is_gst_free":""},{"id":"29659","name":"Pigkawayan","address":"","is_gst_free":""},{"id":"29700","name":"Pikit","address":"","is_gst_free":""},{"id":"29743","name":"President Roxas","address":"","is_gst_free":""},{"id":"29769","name":"Tulunan","address":"","is_gst_free":""}]],"96":["Northern Samar",[{"id":"29799","name":"Allen","address":"","is_gst_free":""},{"id":"29820","name":"Biri","address":"","is_gst_free":""},{"id":"29829","name":"Bobon","address":"","is_gst_free":""},{"id":"29848","name":"Capul","address":"","is_gst_free":""},{"id":"29861","name":"Catarman","address":"","is_gst_free":""},{"id":"29917","name":"Catubig","address":"","is_gst_free":""},{"id":"29965","name":"Gamay","address":"","is_gst_free":""},{"id":"29992","name":"Laoang","address":"","is_gst_free":""},{"id":"30049","name":"Lapinig","address":"","is_gst_free":""},{"id":"30065","name":"Las Navas","address":"","is_gst_free":""},{"id":"30119","name":"Lavezares","address":"","is_gst_free":""},{"id":"30146","name":"Lope De Vega","address":"","is_gst_free":""},{"id":"30169","name":"Mapanas","address":"","is_gst_free":""},{"id":"30183","name":"Mondragon","address":"","is_gst_free":""},{"id":"30208","name":"Palapag","address":"","is_gst_free":""},{"id":"30241","name":"Pambujan","address":"","is_gst_free":""},{"id":"30268","name":"Rosario","address":"","is_gst_free":""},{"id":"30280","name":"San Antonio","address":"","is_gst_free":""},{"id":"30291","name":"San Isidro","address":"","is_gst_free":""},{"id":"30306","name":"San Jose","address":"","is_gst_free":""},{"id":"30323","name":"San Roque","address":"","is_gst_free":""},{"id":"30340","name":"San Vicente","address":"","is_gst_free":""},{"id":"30348","name":"Silvino Lobos","address":"","is_gst_free":""},{"id":"30375","name":"Victoria","address":"","is_gst_free":""}]],"97":["Nueva Ecija",[{"id":"30392","name":"Aliaga","address":"","is_gst_free":""},{"id":"30419","name":"Bongabon","address":"","is_gst_free":""},{"id":"30448","name":"Cabanatuan City","address":"","is_gst_free":""},{"id":"30538","name":"Cabiao","address":"","is_gst_free":""},{"id":"30562","name":"Carranglan","address":"","is_gst_free":""},{"id":"30580","name":"Cuyapo","address":"","is_gst_free":""},{"id":"30632","name":"Gabaldon","address":"","is_gst_free":""},{"id":"30649","name":"Gapan City","address":"","is_gst_free":""},{"id":"30673","name":"General Mamerto Natividad","address":"","is_gst_free":""},{"id":"30694","name":"General Tinio","address":"","is_gst_free":""},{"id":"30708","name":"Guimba","address":"","is_gst_free":""},{"id":"30773","name":"Jaen","address":"","is_gst_free":""},{"id":"30801","name":"Laur","address":"","is_gst_free":""},{"id":"30819","name":"Licab","address":"","is_gst_free":""},{"id":"30831","name":"Llanera","address":"","is_gst_free":""},{"id":"30854","name":"Lupao","address":"","is_gst_free":""},{"id":"30879","name":"Nampicuan","address":"","is_gst_free":""},{"id":"30901","name":"Palayan City","address":"","is_gst_free":""},{"id":"30921","name":"Pantabangan","address":"","is_gst_free":""},{"id":"30936","name":"Penaranda","address":"","is_gst_free":""},{"id":"30947","name":"Quezon","address":"","is_gst_free":""},{"id":"30964","name":"Rizal","address":"","is_gst_free":""},{"id":"30991","name":"San Antonio","address":"","is_gst_free":""},{"id":"31008","name":"San Isidro","address":"","is_gst_free":""},{"id":"31018","name":"San Jose City","address":"","is_gst_free":""},{"id":"31057","name":"San Leonardo","address":"","is_gst_free":""},{"id":"31073","name":"Santa Rosa","address":"","is_gst_free":""},{"id":"31107","name":"Santo Domingo","address":"","is_gst_free":""},{"id":"31132","name":"Science City Of Munoz","address":"","is_gst_free":""},{"id":"31170","name":"Talavera","address":"","is_gst_free":""},{"id":"31224","name":"Talugtug","address":"","is_gst_free":""},{"id":"31253","name":"Zaragoza","address":"","is_gst_free":""}]],"98":["Nueva Vizcaya",[{"id":"31273","name":"Alfonso Castaneda","address":"","is_gst_free":""},{"id":"31280","name":"Ambaguio","address":"","is_gst_free":""},{"id":"31289","name":"Aritao","address":"","is_gst_free":""},{"id":"31312","name":"Bagabag","address":"","is_gst_free":""},{"id":"31330","name":"Bambang","address":"","is_gst_free":""},{"id":"31356","name":"Bayombong","address":"","is_gst_free":""},{"id":"31382","name":"Diadi","address":"","is_gst_free":""},{"id":"31402","name":"Dupax Del Norte","address":"","is_gst_free":""},{"id":"31418","name":"Dupax Del Sur","address":"","is_gst_free":""},{"id":"31438","name":"Kasibu","address":"","is_gst_free":""},{"id":"31469","name":"Kayapa","address":"","is_gst_free":""},{"id":"31500","name":"Quezon","address":"","is_gst_free":""},{"id":"31513","name":"Santa Fe","address":"","is_gst_free":""},{"id":"31530","name":"Solano","address":"","is_gst_free":""},{"id":"31553","name":"Villaverde","address":"","is_gst_free":""}]],"89":["Occidental Mindoro",[{"id":"31563","name":"Abra De Ilog","address":"","is_gst_free":""},{"id":"31573","name":"Calintaan","address":"","is_gst_free":""},{"id":"31581","name":"Looc","address":"","is_gst_free":""},{"id":"31591","name":"Lubang","address":"","is_gst_free":""},{"id":"31608","name":"Magsaysay","address":"","is_gst_free":""},{"id":"31621","name":"Mamburao","address":"","is_gst_free":""},{"id":"31637","name":"Paluan","address":"","is_gst_free":""},{"id":"31650","name":"Rizal","address":"","is_gst_free":""},{"id":"31662","name":"Sablayan","address":"","is_gst_free":""},{"id":"31685","name":"San Jose","address":"","is_gst_free":""},{"id":"31724","name":"Santa Cruz","address":"","is_gst_free":""}]],"90":["Oriental Mindoro",[{"id":"31736","name":"Baco","address":"","is_gst_free":""},{"id":"31764","name":"Bansud","address":"","is_gst_free":""},{"id":"31778","name":"Bongabong","address":"","is_gst_free":""},{"id":"31815","name":"Bulalacao","address":"","is_gst_free":""},{"id":"31831","name":"Calapan City","address":"","is_gst_free":""},{"id":"31894","name":"Gloria","address":"","is_gst_free":""},{"id":"31922","name":"Mansalay","address":"","is_gst_free":""},{"id":"31940","name":"Naujan","address":"","is_gst_free":""},{"id":"32011","name":"Pinamalayan","address":"","is_gst_free":""},{"id":"32049","name":"Pola","address":"","is_gst_free":""},{"id":"32073","name":"Puerto Galera","address":"","is_gst_free":""},{"id":"32087","name":"Roxas","address":"","is_gst_free":""},{"id":"32108","name":"San Teodoro","address":"","is_gst_free":""},{"id":"32117","name":"Socorro","address":"","is_gst_free":""},{"id":"32144","name":"Victoria","address":"","is_gst_free":""}]],"32177":["Palawan",[{"id":"32178","name":"Aborlan","address":"","is_gst_free":""},{"id":"32198","name":"Agutaya","address":"","is_gst_free":""},{"id":"32209","name":"Araceli","address":"","is_gst_free":""},{"id":"32223","name":"Balabac","address":"","is_gst_free":""},{"id":"32244","name":"Bataraza","address":"","is_gst_free":""},{"id":"43865","name":"Brooke's Point","address":"","is_gst_free":""},{"id":"32267","name":"Busuanga","address":"","is_gst_free":""},{"id":"32282","name":"Cagayancillo","address":"","is_gst_free":""},{"id":"32295","name":"Coron","address":"","is_gst_free":""},{"id":"32319","name":"Culion","address":"","is_gst_free":""},{"id":"32334","name":"Cuyo","address":"","is_gst_free":""},{"id":"32352","name":"Dumaran","address":"","is_gst_free":""},{"id":"32369","name":"El Nido","address":"","is_gst_free":""},{"id":"32388","name":"Kalayaan","address":"","is_gst_free":""},{"id":"32390","name":"Linapacan","address":"","is_gst_free":""},{"id":"32401","name":"Magsaysay","address":"","is_gst_free":""},{"id":"32413","name":"Narra","address":"","is_gst_free":""},{"id":"32437","name":"Puerto Princesa City","address":"","is_gst_free":""},{"id":"32504","name":"Quezon","address":"","is_gst_free":""},{"id":"32519","name":"Rizal","address":"","is_gst_free":""},{"id":"32531","name":"Roxas","address":"","is_gst_free":""},{"id":"32563","name":"San Vicente","address":"","is_gst_free":""},{"id":"32574","name":"Sofronio Espanola","address":"","is_gst_free":""},{"id":"32584","name":"Taytay","address":"","is_gst_free":""}]],"32616":["Pampanga",[{"id":"32617","name":"Angeles City","address":"","is_gst_free":""},{"id":"32651","name":"Apalit","address":"","is_gst_free":""},{"id":"32664","name":"Arayat","address":"","is_gst_free":""},{"id":"32695","name":"Bacolor","address":"","is_gst_free":""},{"id":"32717","name":"Candaba","address":"","is_gst_free":""},{"id":"32751","name":"Floridablanca","address":"","is_gst_free":""},{"id":"32785","name":"Guagua","address":"","is_gst_free":""},{"id":"32817","name":"Lubao","address":"","is_gst_free":""},{"id":"32862","name":"Mabalacat","address":"","is_gst_free":""},{"id":"32890","name":"Macabebe","address":"","is_gst_free":""},{"id":"32916","name":"Magalang","address":"","is_gst_free":""},{"id":"32944","name":"Masantol","address":"","is_gst_free":""},{"id":"32971","name":"Mexico","address":"","is_gst_free":""},{"id":"33015","name":"Minalin","address":"","is_gst_free":""},{"id":"33031","name":"Porac","address":"","is_gst_free":""},{"id":"33061","name":"San Fernando City","address":"","is_gst_free":""},{"id":"33097","name":"San Luis","address":"","is_gst_free":""},{"id":"33115","name":"San Simon","address":"","is_gst_free":""},{"id":"33130","name":"Santa Ana","address":"","is_gst_free":""},{"id":"33145","name":"Santa Rita","address":"","is_gst_free":""},{"id":"33156","name":"Santo Tomas","address":"","is_gst_free":""},{"id":"33164","name":"Sasmuan","address":"","is_gst_free":""}]],"101":["Pangasinan",[{"id":"33177","name":"Agno","address":"","is_gst_free":""},{"id":"33195","name":"Aguilar","address":"","is_gst_free":""},{"id":"33212","name":"Alaminos City","address":"","is_gst_free":""},{"id":"33252","name":"Alcala","address":"","is_gst_free":""},{"id":"33274","name":"Anda","address":"","is_gst_free":""},{"id":"33293","name":"Asingan","address":"","is_gst_free":""},{"id":"33315","name":"Balungao","address":"","is_gst_free":""},{"id":"33336","name":"Bani","address":"","is_gst_free":""},{"id":"33364","name":"Basista","address":"","is_gst_free":""},{"id":"33378","name":"Bautista","address":"","is_gst_free":""},{"id":"33397","name":"Bayambang","address":"","is_gst_free":""},{"id":"33475","name":"Binalonan","address":"","is_gst_free":""},{"id":"33500","name":"Binmaley","address":"","is_gst_free":""},{"id":"33534","name":"Bolinao","address":"","is_gst_free":""},{"id":"33565","name":"Bugallon","address":"","is_gst_free":""},{"id":"33590","name":"Burgos","address":"","is_gst_free":""},{"id":"33605","name":"Calasiao","address":"","is_gst_free":""},{"id":"33630","name":"Dagupan City","address":"","is_gst_free":""},{"id":"33662","name":"Dasol","address":"","is_gst_free":""},{"id":"33681","name":"Infanta","address":"","is_gst_free":""},{"id":"33695","name":"Labrador","address":"","is_gst_free":""},{"id":"33706","name":"Laoac","address":"","is_gst_free":""},{"id":"33729","name":"Lingayen","address":"","is_gst_free":""},{"id":"33762","name":"Mabini","address":"","is_gst_free":""},{"id":"33779","name":"Malasiqui","address":"","is_gst_free":""},{"id":"33853","name":"Manaoag","address":"","is_gst_free":""},{"id":"33880","name":"Mangaldan","address":"","is_gst_free":""},{"id":"33911","name":"Mangatarem","address":"","is_gst_free":""},{"id":"33994","name":"Mapandan","address":"","is_gst_free":""},{"id":"34010","name":"Natividad","address":"","is_gst_free":""},{"id":"34029","name":"Pozorrubio","address":"","is_gst_free":""},{"id":"34064","name":"Rosales","address":"","is_gst_free":""},{"id":"34102","name":"San Carlos City","address":"","is_gst_free":""},{"id":"34189","name":"San Fabian","address":"","is_gst_free":""},{"id":"34224","name":"San Jacinto","address":"","is_gst_free":""},{"id":"34244","name":"San Manuel","address":"","is_gst_free":""},{"id":"34259","name":"San Nicolas","address":"","is_gst_free":""},{"id":"34293","name":"San Quintin","address":"","is_gst_free":""},{"id":"34315","name":"Santa Barbara","address":"","is_gst_free":""},{"id":"34345","name":"Santa Maria","address":"","is_gst_free":""},{"id":"34369","name":"Santo Tomas","address":"","is_gst_free":""},{"id":"34380","name":"Sison","address":"","is_gst_free":""},{"id":"34409","name":"Sual","address":"","is_gst_free":""},{"id":"34429","name":"Tayug","address":"","is_gst_free":""},{"id":"34451","name":"Umingan","address":"","is_gst_free":""},{"id":"34510","name":"Urbiztondo","address":"","is_gst_free":""},{"id":"34532","name":"Urdaneta City","address":"","is_gst_free":""},{"id":"34567","name":"Villasis","address":"","is_gst_free":""}]],"34854":["Quezon",[{"id":"34855","name":"Agdangan","address":"","is_gst_free":""},{"id":"34868","name":"Alabat","address":"","is_gst_free":""},{"id":"34888","name":"Atimonan","address":"","is_gst_free":""},{"id":"34931","name":"Buenavista","address":"","is_gst_free":""},{"id":"34969","name":"Burdeos","address":"","is_gst_free":""},{"id":"34984","name":"Calauag","address":"","is_gst_free":""},{"id":"35066","name":"Candelaria","address":"","is_gst_free":""},{"id":"35092","name":"Catanauan","address":"","is_gst_free":""},{"id":"35139","name":"Dolores","address":"","is_gst_free":""},{"id":"35156","name":"General Luna","address":"","is_gst_free":""},{"id":"35184","name":"General Nakar","address":"","is_gst_free":""},{"id":"35204","name":"Guinayangan","address":"","is_gst_free":""},{"id":"35259","name":"Gumaca","address":"","is_gst_free":""},{"id":"35319","name":"Infanta","address":"","is_gst_free":""},{"id":"35356","name":"Jomalig","address":"","is_gst_free":""},{"id":"35362","name":"Lopez","address":"","is_gst_free":""},{"id":"35458","name":"Lucban","address":"","is_gst_free":""},{"id":"35491","name":"Lucena City","address":"","is_gst_free":""},{"id":"35525","name":"Macalelon","address":"","is_gst_free":""},{"id":"35556","name":"Mauban","address":"","is_gst_free":""},{"id":"35597","name":"Mulanay","address":"","is_gst_free":""},{"id":"35626","name":"Padre Burgos","address":"","is_gst_free":""},{"id":"35649","name":"Pagbilao","address":"","is_gst_free":""},{"id":"35677","name":"Panukulan","address":"","is_gst_free":""},{"id":"35690","name":"Patnanungan","address":"","is_gst_free":""},{"id":"35697","name":"Perez","address":"","is_gst_free":""},{"id":"35712","name":"Pitogo","address":"","is_gst_free":""},{"id":"35752","name":"Plaridel","address":"","is_gst_free":""},{"id":"35762","name":"Polillo","address":"","is_gst_free":""},{"id":"35783","name":"Quezon","address":"","is_gst_free":""},{"id":"35808","name":"Real","address":"","is_gst_free":""},{"id":"35826","name":"Sampaloc","address":"","is_gst_free":""},{"id":"35841","name":"San Andres","address":"","is_gst_free":""},{"id":"35849","name":"San Antonio","address":"","is_gst_free":""},{"id":"35870","name":"San Francisco","address":"","is_gst_free":""},{"id":"35887","name":"San Narciso","address":"","is_gst_free":""},{"id":"35912","name":"Sariaya","address":"","is_gst_free":""},{"id":"35956","name":"Tagkawayan","address":"","is_gst_free":""},{"id":"36002","name":"Tayabas City","address":"","is_gst_free":""},{"id":"36069","name":"Tiaong","address":"","is_gst_free":""},{"id":"36101","name":"Unisan","address":"","is_gst_free":""}]],"36282":["Quirino",[{"id":"36283","name":"Aglipay","address":"","is_gst_free":""},{"id":"36309","name":"Cabarroguis","address":"","is_gst_free":""},{"id":"36327","name":"Diffun","address":"","is_gst_free":""},{"id":"36361","name":"Maddela","address":"","is_gst_free":""},{"id":"36394","name":"Nagtipunan","address":"","is_gst_free":""},{"id":"36411","name":"Saguday","address":"","is_gst_free":""}]],"36421":["Rizal",[{"id":"36422","name":"Angono","address":"","is_gst_free":""},{"id":"36433","name":"Antipolo City","address":"","is_gst_free":""},{"id":"36450","name":"Baras","address":"","is_gst_free":""},{"id":"36461","name":"Binangonan","address":"","is_gst_free":""},{"id":"36502","name":"Cainta","address":"","is_gst_free":""},{"id":"36510","name":"Cardona","address":"","is_gst_free":""},{"id":"36529","name":"Jala~Jala","address":"","is_gst_free":""},{"id":"36541","name":"Morong","address":"","is_gst_free":""},{"id":"36550","name":"Pililla","address":"","is_gst_free":""},{"id":"36560","name":"Rodriguez","address":"","is_gst_free":""},{"id":"36572","name":"San Mateo","address":"","is_gst_free":""},{"id":"36588","name":"Tanay","address":"","is_gst_free":""},{"id":"36608","name":"Taytay","address":"","is_gst_free":""},{"id":"36614","name":"Teresa","address":"","is_gst_free":""}]],"36624":["Romblon",[{"id":"36625","name":"Alcantara","address":"","is_gst_free":""},{"id":"36638","name":"Banton","address":"","is_gst_free":""},{"id":"36656","name":"Cajidiocan","address":"","is_gst_free":""},{"id":"36671","name":"Calatrava","address":"","is_gst_free":""},{"id":"36679","name":"Concepcion","address":"","is_gst_free":""},{"id":"36689","name":"Corcuera","address":"","is_gst_free":""},{"id":"36705","name":"Ferrol","address":"","is_gst_free":""},{"id":"36712","name":"Looc","address":"","is_gst_free":""},{"id":"36725","name":"Magdiwang","address":"","is_gst_free":""},{"id":"36735","name":"Odiongan","address":"","is_gst_free":""},{"id":"36761","name":"Romblon","address":"","is_gst_free":""},{"id":"36793","name":"San Agustin","address":"","is_gst_free":""},{"id":"36809","name":"San Andres","address":"","is_gst_free":""},{"id":"36823","name":"San Fernando","address":"","is_gst_free":""},{"id":"36836","name":"San Jose","address":"","is_gst_free":""},{"id":"36842","name":"Santa Fe","address":"","is_gst_free":""},{"id":"36854","name":"Santa Maria","address":"","is_gst_free":""}]],"36884":["Sarangani",[{"id":"36885","name":"Alabel","address":"","is_gst_free":""},{"id":"36898","name":"Glan","address":"","is_gst_free":""},{"id":"36930","name":"Kiamba","address":"","is_gst_free":""},{"id":"36950","name":"Maasim","address":"","is_gst_free":""},{"id":"36967","name":"Maitum","address":"","is_gst_free":""},{"id":"36987","name":"Malapatan","address":"","is_gst_free":""},{"id":"37000","name":"Malungon","address":"","is_gst_free":""}]],"108":["Siquijor",[{"id":"37031","name":"Enrique Villanueva","address":"","is_gst_free":""},{"id":"37046","name":"Larena","address":"","is_gst_free":""},{"id":"37070","name":"Lazi","address":"","is_gst_free":""},{"id":"37089","name":"Maria","address":"","is_gst_free":""},{"id":"37112","name":"San Juan","address":"","is_gst_free":""},{"id":"37128","name":"Siquijor","address":"","is_gst_free":""}]],"109":["Sorsogon",[{"id":"37171","name":"Barcelona","address":"","is_gst_free":""},{"id":"37197","name":"Bulan","address":"","is_gst_free":""},{"id":"37261","name":"Bulusan","address":"","is_gst_free":""},{"id":"37286","name":"Casiguran","address":"","is_gst_free":""},{"id":"37312","name":"Castilla","address":"","is_gst_free":""},{"id":"37347","name":"Donsol","address":"","is_gst_free":""},{"id":"37399","name":"Gubat","address":"","is_gst_free":""},{"id":"37442","name":"Irosin","address":"","is_gst_free":""},{"id":"37471","name":"Juban","address":"","is_gst_free":""},{"id":"37497","name":"Magallanes","address":"","is_gst_free":""},{"id":"37532","name":"Matnog","address":"","is_gst_free":""},{"id":"37573","name":"Pilar","address":"","is_gst_free":""},{"id":"37623","name":"Prieto Diaz","address":"","is_gst_free":""},{"id":"37647","name":"Santa Magdalena","address":"","is_gst_free":""},{"id":"37662","name":"Sorsogon City","address":"","is_gst_free":""}]],"110":["South Cotabato",[{"id":"37723","name":"Banga","address":"","is_gst_free":""},{"id":"37746","name":"General Santos City","address":"","is_gst_free":""},{"id":"37773","name":"Koronadal City","address":"","is_gst_free":""},{"id":"37801","name":"Lake Sebu","address":"","is_gst_free":""},{"id":"37821","name":"Norala","address":"","is_gst_free":""},{"id":"37836","name":"Polomolok","address":"","is_gst_free":""},{"id":"37860","name":"Santo Nino","address":"","is_gst_free":""},{"id":"37871","name":"Surallah","address":"","is_gst_free":""},{"id":"37889","name":"Tampakan","address":"","is_gst_free":""},{"id":"37904","name":"Tantangan","address":"","is_gst_free":""},{"id":"37918","name":"Tupi","address":"","is_gst_free":""}]],"111":["Southern Leyte",[{"id":"37934","name":"Anahawan","address":"","is_gst_free":""},{"id":"37949","name":"Bontoc","address":"","is_gst_free":""},{"id":"37990","name":"Hinunangan","address":"","is_gst_free":""},{"id":"38031","name":"Hinundayan","address":"","is_gst_free":""},{"id":"38049","name":"Libagon","address":"","is_gst_free":""},{"id":"38064","name":"Liloan","address":"","is_gst_free":""},{"id":"38089","name":"Limasawa","address":"","is_gst_free":""},{"id":"38096","name":"Maasin City","address":"","is_gst_free":""},{"id":"38167","name":"Macrohon","address":"","is_gst_free":""},{"id":"38198","name":"Malitbog","address":"","is_gst_free":""},{"id":"38236","name":"Padre Burgos","address":"","is_gst_free":""},{"id":"38248","name":"Pintuyan","address":"","is_gst_free":""},{"id":"38272","name":"Saint Bernard","address":"","is_gst_free":""},{"id":"38303","name":"San Francisco","address":"","is_gst_free":""},{"id":"38326","name":"San Juan","address":"","is_gst_free":""},{"id":"38345","name":"San Ricardo","address":"","is_gst_free":""},{"id":"38361","name":"Silago","address":"","is_gst_free":""},{"id":"38377","name":"Sogod","address":"","is_gst_free":""},{"id":"38423","name":"Tomas Oppus","address":"","is_gst_free":""}]],"38453":["Sultan Kudarat",[{"id":"38454","name":"Bagumbayan","address":"","is_gst_free":""},{"id":"38474","name":"Columbio","address":"","is_gst_free":""},{"id":"38491","name":"Esperanza","address":"","is_gst_free":""},{"id":"38511","name":"Isulan","address":"","is_gst_free":""},{"id":"38528","name":"Kalamansig","address":"","is_gst_free":""},{"id":"38544","name":"Lambayong","address":"","is_gst_free":""},{"id":"38571","name":"Lebak","address":"","is_gst_free":""},{"id":"38599","name":"Lutayan","address":"","is_gst_free":""},{"id":"38611","name":"Palimbang","address":"","is_gst_free":""},{"id":"38652","name":"President Quirino","address":"","is_gst_free":""},{"id":"38672","name":"Sen. Ninoy Aquino","address":"","is_gst_free":""},{"id":"38693","name":"Tacurong City","address":"","is_gst_free":""}]],"113":["Sulu",[{"id":"38713","name":"Hadji Panglima Tahil","address":"","is_gst_free":""},{"id":"38719","name":"Indanan","address":"","is_gst_free":""},{"id":"38754","name":"Jolo","address":"","is_gst_free":""},{"id":"38763","name":"Kalingalan Caluang","address":"","is_gst_free":""},{"id":"38773","name":"Lugus","address":"","is_gst_free":""},{"id":"38791","name":"Luuk","address":"","is_gst_free":""},{"id":"38804","name":"Maimbung","address":"","is_gst_free":""},{"id":"38832","name":"Old Panamao","address":"","is_gst_free":""},{"id":"38864","name":"Omar","address":"","is_gst_free":""},{"id":"38873","name":"Pandami","address":"","is_gst_free":""},{"id":"38890","name":"Panglima Estino","address":"","is_gst_free":""},{"id":"38903","name":"Pangutaran","address":"","is_gst_free":""},{"id":"38920","name":"Parang","address":"","is_gst_free":""},{"id":"38961","name":"Pata","address":"","is_gst_free":""},{"id":"38976","name":"Patikul","address":"","is_gst_free":""},{"id":"39007","name":"Siasi","address":"","is_gst_free":""},{"id":"39058","name":"Talipao","address":"","is_gst_free":""},{"id":"39111","name":"Tapul","address":"","is_gst_free":""},{"id":"39127","name":"Tongkil","address":"","is_gst_free":""}]],"114":["Surigao Del Norte",[{"id":"39142","name":"Alegria","address":"","is_gst_free":""},{"id":"39155","name":"Bacuag","address":"","is_gst_free":""},{"id":"39165","name":"Burgos","address":"","is_gst_free":""},{"id":"39172","name":"Claver","address":"","is_gst_free":""},{"id":"39187","name":"Dapa","address":"","is_gst_free":""},{"id":"39217","name":"Del Carmen","address":"","is_gst_free":""},{"id":"39238","name":"General Luna","address":"","is_gst_free":""},{"id":"39258","name":"Gigaquit","address":"","is_gst_free":""},{"id":"39272","name":"Mainit","address":"","is_gst_free":""},{"id":"39294","name":"Malimono","address":"","is_gst_free":""},{"id":"39309","name":"Pilar","address":"","is_gst_free":""},{"id":"39325","name":"Placer","address":"","is_gst_free":""},{"id":"39346","name":"San Benito","address":"","is_gst_free":""},{"id":"39353","name":"San Francisco","address":"","is_gst_free":""},{"id":"39365","name":"San Isidro","address":"","is_gst_free":""},{"id":"39378","name":"Santa Monica","address":"","is_gst_free":""},{"id":"39390","name":"Sison","address":"","is_gst_free":""},{"id":"39403","name":"Socorro","address":"","is_gst_free":""},{"id":"39418","name":"Surigao City","address":"","is_gst_free":""},{"id":"39473","name":"Tagana~an","address":"","is_gst_free":""},{"id":"39488","name":"Tubod","address":"","is_gst_free":""}]],"115":["Surigao Del Sur",[{"id":"39498","name":"Barobo","address":"","is_gst_free":""},{"id":"39520","name":"Bayabas","address":"","is_gst_free":""},{"id":"39528","name":"Bislig City","address":"","is_gst_free":""},{"id":"39553","name":"Cagwait","address":"","is_gst_free":""},{"id":"39565","name":"Cantilan","address":"","is_gst_free":""},{"id":"39583","name":"Carmen","address":"","is_gst_free":""},{"id":"39592","name":"Carrascal","address":"","is_gst_free":""},{"id":"39607","name":"Cortes","address":"","is_gst_free":""},{"id":"39620","name":"Hinatuan","address":"","is_gst_free":""},{"id":"39645","name":"Lanuza","address":"","is_gst_free":""},{"id":"39659","name":"Lianga","address":"","is_gst_free":""},{"id":"39673","name":"Lingig","address":"","is_gst_free":""},{"id":"39692","name":"Madrid","address":"","is_gst_free":""},{"id":"39707","name":"Marihatag","address":"","is_gst_free":""},{"id":"39720","name":"San Agustin","address":"","is_gst_free":""},{"id":"39734","name":"San Miguel","address":"","is_gst_free":""},{"id":"39753","name":"Tagbina","address":"","is_gst_free":""},{"id":"39779","name":"Tago","address":"","is_gst_free":""},{"id":"39804","name":"Tandag City","address":"","is_gst_free":""}]],"116":["Tarlac",[{"id":"39856","name":"Anao","address":"","is_gst_free":""},{"id":"39875","name":"Bamban","address":"","is_gst_free":""},{"id":"39891","name":"Camiling","address":"","is_gst_free":""},{"id":"39953","name":"Capas","address":"","is_gst_free":""},{"id":"39973","name":"Concepcion","address":"","is_gst_free":""},{"id":"40019","name":"Gerona","address":"","is_gst_free":""},{"id":"40064","name":"La Paz","address":"","is_gst_free":""},{"id":"40086","name":"Mayantoc","address":"","is_gst_free":""},{"id":"40111","name":"Moncada","address":"","is_gst_free":""},{"id":"40149","name":"Paniqui","address":"","is_gst_free":""},{"id":"40185","name":"Pura","address":"","is_gst_free":""},{"id":"40202","name":"Ramos","address":"","is_gst_free":""},{"id":"40212","name":"San Clemente","address":"","is_gst_free":""},{"id":"40225","name":"San Jose","address":"","is_gst_free":""},{"id":"40239","name":"San Manuel","address":"","is_gst_free":""},{"id":"40255","name":"Santa Ignacia","address":"","is_gst_free":""},{"id":"40280","name":"Tarlac City","address":"","is_gst_free":""},{"id":"40357","name":"Victoria","address":"","is_gst_free":""}]],"40384":["Tawi~Tawi",[{"id":"40385","name":"Bongao","address":"","is_gst_free":""},{"id":"40421","name":"Languyan","address":"","is_gst_free":""},{"id":"40442","name":"Mapun","address":"","is_gst_free":""},{"id":"40458","name":"Panglima Sugala","address":"","is_gst_free":""},{"id":"40476","name":"Sapa~Sapa","address":"","is_gst_free":""},{"id":"40500","name":"Sibutu","address":"","is_gst_free":""},{"id":"40517","name":"Simunul","address":"","is_gst_free":""},{"id":"40533","name":"Sitangkai","address":"","is_gst_free":""},{"id":"40543","name":"South Ubian","address":"","is_gst_free":""},{"id":"40575","name":"Tandubas","address":"","is_gst_free":""},{"id":"40596","name":"Turtle Islands","address":"","is_gst_free":""}]],"40634":["Western Samar",[{"id":"40635","name":"Almagro","address":"","is_gst_free":""},{"id":"40659","name":"Basey","address":"","is_gst_free":""},{"id":"40711","name":"Calbayog City","address":"","is_gst_free":""},{"id":"40869","name":"Calbiga","address":"","is_gst_free":""},{"id":"40911","name":"Catbalogan City","address":"","is_gst_free":""},{"id":"40969","name":"Daram","address":"","is_gst_free":""},{"id":"41028","name":"Gandara","address":"","is_gst_free":""},{"id":"41098","name":"Hinabangan","address":"","is_gst_free":""},{"id":"41120","name":"Jiabong","address":"","is_gst_free":""},{"id":"41155","name":"Marabut","address":"","is_gst_free":""},{"id":"41180","name":"Matuguinao","address":"","is_gst_free":""},{"id":"41201","name":"Motiong","address":"","is_gst_free":""},{"id":"41232","name":"Pagsanghan","address":"","is_gst_free":""},{"id":"41246","name":"Paranas","address":"","is_gst_free":""},{"id":"41291","name":"Pinabacdao","address":"","is_gst_free":""},{"id":"41316","name":"San Jorge","address":"","is_gst_free":""},{"id":"41358","name":"San Jose De Buan","address":"","is_gst_free":""},{"id":"41373","name":"San Sebastian","address":"","is_gst_free":""},{"id":"41388","name":"Santa Margarita","address":"","is_gst_free":""},{"id":"41425","name":"Santa Rita","address":"","is_gst_free":""},{"id":"41464","name":"Santo Nino","address":"","is_gst_free":""},{"id":"41478","name":"Tagapul~An","address":"","is_gst_free":""},{"id":"41493","name":"Talalora","address":"","is_gst_free":""},{"id":"41505","name":"Tarangnan","address":"","is_gst_free":""},{"id":"41547","name":"Villareal","address":"","is_gst_free":""},{"id":"41586","name":"Zumarraga","address":"","is_gst_free":""}]],"118":["Zambales",[{"id":"41612","name":"Botolan","address":"","is_gst_free":""},{"id":"41644","name":"Cabangan","address":"","is_gst_free":""},{"id":"41667","name":"Candelaria","address":"","is_gst_free":""},{"id":"41684","name":"Castillejos","address":"","is_gst_free":""},{"id":"41699","name":"Iba","address":"","is_gst_free":""},{"id":"41714","name":"Masinloc","address":"","is_gst_free":""},{"id":"41728","name":"Olongapo City","address":"","is_gst_free":""},{"id":"41746","name":"Palauig","address":"","is_gst_free":""},{"id":"41766","name":"San Antonio","address":"","is_gst_free":""},{"id":"41781","name":"San Felipe","address":"","is_gst_free":""},{"id":"41793","name":"San Marcelino","address":"","is_gst_free":""},{"id":"41812","name":"San Narciso","address":"","is_gst_free":""},{"id":"41830","name":"Santa Cruz","address":"","is_gst_free":""},{"id":"41856","name":"Subic","address":"","is_gst_free":""}]],"119":["Zamboanga Del Norte",[{"id":"41873","name":"Bacungan","address":"","is_gst_free":""},{"id":"41892","name":"Baliguian","address":"","is_gst_free":""},{"id":"41910","name":"Dapitan City","address":"","is_gst_free":""},{"id":"41961","name":"Dipolog City","address":"","is_gst_free":""},{"id":"41983","name":"Godod","address":"","is_gst_free":""},{"id":"42001","name":"Gutalac","address":"","is_gst_free":""},{"id":"42035","name":"Jose Dalman","address":"","is_gst_free":""},{"id":"42054","name":"Kalawit","address":"","is_gst_free":""},{"id":"42069","name":"Katipunan","address":"","is_gst_free":""},{"id":"42100","name":"La Libertad","address":"","is_gst_free":""},{"id":"42114","name":"Labason","address":"","is_gst_free":""},{"id":"42135","name":"Liloy","address":"","is_gst_free":""},{"id":"42173","name":"Manukan","address":"","is_gst_free":""},{"id":"42196","name":"Mutia","address":"","is_gst_free":""},{"id":"42213","name":"Pinan","address":"","is_gst_free":""},{"id":"42236","name":"Polanco","address":"","is_gst_free":""},{"id":"42267","name":"Pres. Manuel A. Roxas","address":"","is_gst_free":""},{"id":"42299","name":"Rizal","address":"","is_gst_free":""},{"id":"42322","name":"Salug","address":"","is_gst_free":""},{"id":"42346","name":"Sergio Osmena Sr.","address":"","is_gst_free":""},{"id":"42386","name":"Siayan","address":"","is_gst_free":""},{"id":"42409","name":"Sibuco","address":"","is_gst_free":""},{"id":"42438","name":"Sibutad","address":"","is_gst_free":""},{"id":"42455","name":"Sindangan","address":"","is_gst_free":""},{"id":"42508","name":"Siocon","address":"","is_gst_free":""},{"id":"42535","name":"Sirawai","address":"","is_gst_free":""},{"id":"42570","name":"Tampilisan","address":"","is_gst_free":""}]],"120":["Zamboanga Del Sur",[{"id":"42591","name":"Aurora","address":"","is_gst_free":""},{"id":"42636","name":"Bayog","address":"","is_gst_free":""},{"id":"42665","name":"Dimataling","address":"","is_gst_free":""},{"id":"42690","name":"Dinas","address":"","is_gst_free":""},{"id":"42721","name":"Dumalinao","address":"","is_gst_free":""},{"id":"42752","name":"Dumingag","address":"","is_gst_free":""},{"id":"42797","name":"Guipos","address":"","is_gst_free":""},{"id":"42815","name":"Josefina","address":"","is_gst_free":""},{"id":"42830","name":"Kumalarang","address":"","is_gst_free":""},{"id":"42849","name":"Labangan","address":"","is_gst_free":""},{"id":"42875","name":"Lakewood","address":"","is_gst_free":""},{"id":"42890","name":"Lapuyan","address":"","is_gst_free":""},{"id":"42917","name":"Mahayag","address":"","is_gst_free":""},{"id":"42947","name":"Margosatubig","address":"","is_gst_free":""},{"id":"42965","name":"Midsalip","address":"","is_gst_free":""},{"id":"42999","name":"Molave","address":"","is_gst_free":""},{"id":"43025","name":"Pagadian City","address":"","is_gst_free":""},{"id":"43080","name":"Pitogo","address":"","is_gst_free":""},{"id":"43096","name":"Ramon Magsaysay","address":"","is_gst_free":""},{"id":"43124","name":"San Miguel","address":"","is_gst_free":""},{"id":"43143","name":"San Pablo","address":"","is_gst_free":""},{"id":"43172","name":"Sominot","address":"","is_gst_free":""},{"id":"43191","name":"Tabina","address":"","is_gst_free":""},{"id":"43207","name":"Tambulig","address":"","is_gst_free":""},{"id":"43239","name":"Tigbao","address":"","is_gst_free":""},{"id":"43258","name":"Tukuran","address":"","is_gst_free":""},{"id":"43284","name":"Vincenzo A. Sagun","address":"","is_gst_free":""},{"id":"43299","name":"Zamboanga City","address":"","is_gst_free":""}]],"121":["Zamboanga Sibugay",[{"id":"43398","name":"Alicia","address":"","is_gst_free":""},{"id":"43426","name":"Buug","address":"","is_gst_free":""},{"id":"43454","name":"Diplahan","address":"","is_gst_free":""},{"id":"43477","name":"Imelda","address":"","is_gst_free":""},{"id":"43496","name":"Ipil","address":"","is_gst_free":""},{"id":"43524","name":"Kabasalan","address":"","is_gst_free":""},{"id":"43554","name":"Mabuhay","address":"","is_gst_free":""},{"id":"43573","name":"Malangas","address":"","is_gst_free":""},{"id":"43599","name":"Naga","address":"","is_gst_free":""},{"id":"43623","name":"Olutanga","address":"","is_gst_free":""},{"id":"43643","name":"Payao","address":"","is_gst_free":""},{"id":"43673","name":"Roseller Lim","address":"","is_gst_free":""},{"id":"43700","name":"Siay","address":"","is_gst_free":""},{"id":"43730","name":"Talusan","address":"","is_gst_free":""},{"id":"43745","name":"Titay","address":"","is_gst_free":""},{"id":"43776","name":"Tungawan","address":"","is_gst_free":""}]]};

var province = _('province').value;
var shipping_city = _('city').value;
var ship_barangay = _('barangay').value;
var ship_fname = "";
var ship_lname = "";
var ship_mname = "";
var ship_address = "";
var ship_mobilephone = "";
var prov_name = "";
var prov_id = "";

	for (var i = 1; i < 10; i++) {
		$("#img"+i).elevateZoom({scrollZoom : true});
	};
	$('document').ready(function(){
    	$('[data-toggle="tooltip"]').tooltip(); 
	});
	function _(id){
		return document.getElementById(id);
	}
	function chkFname($scope){
		var name = _('firstName').value;
		var fname = _('firstName');
		var chkIcon = _('fnameChkIcon');
		var x_icon  = _('fnameXIcon');
		if (name.length <= 0) {
			_('ship_fname_error').innerHTML = 'Please enter your first name';
			fname.style.borderTop = '2px solid #ff5252';
			$(chkIcon).fadeOut('fast');
			$(x_icon).fadeIn('slow');
			$.ajax({
                    type: "POST",
                    url: base+"shop/shippers_fname",
                    cache: false,
                });
		}
		else{
			var nameLength = name.length;
			var num = false;
			for (var i = 0; i < nameLength; i++) {
				if (!isNaN(name[i]) && name[i] != ' ') {
					var num = true;
				}
			}
			if (num == false) {
				var trimName = name.trim();
				var getFirstLetter = trimName.charAt(0);
				var firstLetterToUpperCase = getFirstLetter.toUpperCase();
				var resultprodName = name.replace(getFirstLetter, firstLetterToUpperCase);
				_('firstName').value = resultprodName.trim();
				_('ship_fname_error').innerHTML = '';
				fname.style.borderTop = '2px solid #00e676';
				$(x_icon).fadeOut('fast');
				$(chkIcon).fadeIn('slow');
				ship_fname = resultprodName.trim();

				$.ajax({
                    type: "POST",
                    url: base+"shop/shippers_fname",
                    data: ({
                        name: ship_fname
                    }),
                    cache: false,
                });
			}else{
				_('ship_fname_error').innerHTML = 'Please enter your valid first name';
				fname.style.borderTop = '2px solid #ff5252';
				$(chkIcon).fadeOut('fast');
				$(x_icon).fadeIn('slow');
				$.ajax({
                    type: "POST",
                    url: base+"shop/shippers_fname",
                    cache: false,
                });
			}
			
		}
	}
	function chkLname($scope){
		var name = _('lastName').value;
		var lname = _('lastName');
		var chkIcon = _('lnameChkIcon');
		var x_icon  = _('lnameXIcon');
		if (name.length <= 0) {
			_('ship_lname_error').innerHTML = 'Please enter your last name';
			lname.style.borderTop = '2px solid #ff5252';
			$(chkIcon).fadeOut('fast');
			$(x_icon).fadeIn('slow');
			$.ajax({
                    type: "POST",
                    url: base+"shop/shippers_lname",
                    cache: false,
                });
		}
		else{
			var nameLength = name.length;
			var num = false;
			for (var i = 0; i < nameLength; i++) {
				if (!isNaN(name[i]) && name[i] != ' ') {
					var num = true;
				}
			}
			if (num == false) {
				var trimName = name.trim();
				var getFirstLetter = trimName.charAt(0);
				var firstLetterToUpperCase = getFirstLetter.toUpperCase();
				var resultprodName = name.replace(getFirstLetter, firstLetterToUpperCase);
				_('lastName').value = resultprodName.trim();
				_('ship_lname_error').innerHTML = '';
				lname.style.borderTop = '2px solid #00e676';
				$(x_icon).fadeOut('fast');
				$(chkIcon).fadeIn('slow');
				ship_lname = resultprodName.trim();
				$.ajax({
                    type: "POST",
                    url: base+"shop/shippers_lname",
                    data: ({
                        name: ship_lname
                    }),
                    cache: false,
                });
			}else{
				_('ship_lname_error').innerHTML = 'Please enter your valid last name';
				lname.style.borderTop = '2px solid #ff5252';
				$(chkIcon).fadeOut('fast');
				$(x_icon).fadeIn('slow');
				$.ajax({
                    type: "POST",
                    url: base+"shop/shippers_lname",
                    cache: false,
                });
			}
			
		}
	}
	function chkMname($scope){
		var name = _('middleName').value;
		var mname = _('middleName');
		var chkIcon = _('mnameChkIcon');
		var x_icon  = _('mnameXIcon');
		if (name.length <= 0) {
			_('ship_mname_error').innerHTML = 'Please enter your middle name';
			mname.style.borderTop = '2px solid #ff5252';
			$(chkIcon).fadeOut('fast');
			$(x_icon).fadeIn('slow');
			$.ajax({
                    type: "POST",
                    url: base+"shop/shippers_mname",
                    cache: false,
                });
		}
		else{
			var nameLength = name.length;
			var num = false;
			for (var i = 0; i < nameLength; i++) {
				if (!isNaN(name[i]) && name[i] != ' ') {
					var num = true;
				}
			}
			if (num == false) {
				var trimName = name.trim();
				var getFirstLetter = trimName.charAt(0);
				var firstLetterToUpperCase = getFirstLetter.toUpperCase();
				var resultprodName = name.replace(getFirstLetter, firstLetterToUpperCase);
				_('middleName').value = resultprodName.trim();
				_('ship_mname_error').innerHTML = '';
				mname.style.borderTop = '2px solid #00e676';
				$(x_icon).fadeOut('fast');
				$(chkIcon).fadeIn('slow');
				ship_mname = resultprodName.trim();
				$.ajax({
                    type: "POST",
                    url: base+"shop/shippers_mname",
                    data: ({
                        name: ship_mname
                    }),
                    cache: false,
                });
			}else{
				_('ship_mname_error').innerHTML = 'Please enter your valid middle name';
				mname.style.borderTop = '2px solid #ff5252';
				$(chkIcon).fadeOut('fast');
				$(x_icon).fadeIn('slow');
				$.ajax({
                    type: "POST",
                    url: base+"shop/shippers_mname",
                    cache: false,
                });
			}
			
		}
	}
	function chkAddress(){
		var address = _('complete_address').value;
		var com_address = _('complete_address')
		var chkIcon = _('addnameChkIcon');
		var x_icon  = _('addnameXIcon');
		if (address.length > 0) {
			_('ship_address_error').innerHTML = '';
			com_address.style.borderTop = '2px solid #00e676';
			$(x_icon).fadeOut('fast');
			$(chkIcon).fadeIn('slow');
			ship_address = address;
			$.ajax({
                    type: "POST",
                    url: base+"shop/shippers_address",
                    data: ({
                        address: ship_address
                    }),
                    cache: false,
                });
		}
		else{
			_('ship_address_error').innerHTML = 'Please enter your complete address';
			com_address.style.borderTop = '2px solid #ff5252';
			$(chkIcon).fadeOut('fast');
			$(x_icon).fadeIn('slow');
			$.ajax({
                    type: "POST",
                    url: base+"shop/shippers_address",
                    cache: false,
                });
		}
	}
	function chkPhoneNumber($scope){
		var phone = _('phoneNumber').value;
		var ship_phone = _('phoneNumber');
		var chkIcon = _('phoneChkIcon');
		var x_icon  = _('phoneXIcon');	
		if (phone.length <= 0) {
			_('ship_phone_error').innerHTML = 'Please enter your phone number';
			ship_phone.style.borderTop = '2px solid #ff5252';
			$(chkIcon).fadeOut('fast');
			$(x_icon).fadeIn('slow');
			$.ajax({
                    type: "POST",
                    url: base+"shop/shippers_phone",
                    cache: false,
                });
		}
		else if (phone.length < 9){
			_('ship_phone_error').innerHTML = 'Your phone number is too short, please lengthen this text to 9 characters';
			ship_phone.style.borderTop = '2px solid #ff5252';
			$(chkIcon).fadeOut('fast');
			$(x_icon).fadeIn('slow');
			$.ajax({
                    type: "POST",
                    url: base+"shop/shippers_phone",
                    cache: false,
                });
		}
		else if (phone.length > 9){
			_('ship_phone_error').innerHTML = 'Your phone number is too long, please shorten this text to 9 characters';
			ship_phone.style.borderTop = '2px solid #ff5252';
			$(chkIcon).fadeOut('fast');
			$(x_icon).fadeIn('slow');
			$.ajax({
                    type: "POST",
                    url: base+"shop/shippers_phone",
                    cache: false,
                });
		}
		else if (phone.length > 0) {
			var num = false;
			for (var i = 0; i < phone.length; i++) {
				if (isNaN(phone[i]) || phone[i] == ' ') {
					var num = true;
				}
			}
			if (num == true) {
				_('ship_phone_error').innerHTML = 'Only digits are accepted';
				ship_phone.style.borderTop = '2px solid #ff5252';
				$(chkIcon).fadeOut('fast');
				$(x_icon).fadeIn('slow');
				$.ajax({
                    type: "POST",
                    url: base+"shop/shippers_phone",
                    cache: false,
                });
			}
			else if (num == false) {
				_('ship_phone_error').innerHTML = '';
				ship_phone.style.borderTop = '2px solid #00e676';
				$(x_icon).fadeOut('fast');
				$(chkIcon).fadeIn('slow');
				ship_mobilephone = phone;
				$.ajax({
                    type: "POST",
                    url: base+"shop/shippers_phone",
                    data: ({
                        phone: ship_mobilephone
                    }),
                    cache: false,
                });
			}
		}
	}

	function chk_province_blur($scope){
		var province = _('province').value;
		var ship_province = _('province');
		var total_pay = _('shipping_total');
		var total_payment = $(total_pay).attr('data-total');
		var total_pay_finale = parseInt(total_payment);
		if (province == " " || province == 'Select') {
			_('ship_province_error').innerHTML = 'Please select your province';
			ship_province.style.borderTop = '2px solid #ff5252';
			_('ship_city_error').innerHTML = '';
			_('city').style.borderTop = '2px solid white';
			_('ship_barangay_error').innerHTML = '';
			_('barangay').style.borderTop = '2px solid white';
			_('barangay').value = '';
			$('#brgyChkIcon').fadeOut('fast');
			$('#brgyXIcon').fadeOut('fast');
			province = "";
			$.ajax({
                    type: "POST",
                    url: base+"shop/shipping_fee",
                    data: ({
                        total_pay: total_pay_finale,
                    }),
                    cache: false,
                    success: function(html) {
                    	_('shipping_charge_finale').innerHTML = '&#8369; 0.00';                  	
                    	$('#ship_total_finale').html(html);
                    }
                });
		}
	}

	function chk_province($scope){
		var prov_val = _('province').value;
		var ship_province = _('province');
		var whereComaExists = prov_val.lastIndexOf(",");
		var prov_id = prov_val.slice(0,whereComaExists);
		var prov_name = prov_val.slice(whereComaExists+1);
		var total_pay = _('shipping_total');
		var total_payment = $(total_pay).attr('data-total');
		var total_pay_finale = parseInt(total_payment);
		if (prov_val == "" || prov_val == 'Select') {
			_('ship_province_error').innerHTML = 'Please select your province';
			ship_province.style.borderTop = '2px solid #ff5252';
			var all_option = $("#city").children();
			$(all_option).not("#city_first_select").remove();
			_('city').style.borderTop = '';
			_('ship_barangay_error').innerHTML = '';
			_('barangay').value = '';
			_('barangay').style.borderTop = '2px solid white';
			$('#brgyChkIcon').fadeOut('fast');
			$('#brgyXIcon').fadeOut('fast');
			ship_barangay = "";
			province = "";
			$.ajax({
                    type: "POST",
                    url: base+"shop/shipping_fee",
                    data: ({
                        total_pay: total_pay_finale,
                    }),
                    cache: false,
                    success: function(html) {
                    	_('shipping_charge_finale').innerHTML = '&#8369; 0.00';                  	
                    	$('#ship_total_finale').html(html);
                    }
                });
		}
		else{
			_('ship_barangay_error').innerHTML = '';
			_('barangay').value = '';
			_('barangay').style.borderTop = '';
			$('#brgyChkIcon').fadeOut('fast');
			$('#brgyXIcon').fadeOut('slow');
			var city = document.getElementById('city');
			var province_length = regions[prov_id][1].length;
			var all_option = $("#city").children();
			$(all_option).not("#city_first_select").remove();
			for (var i = 0; i < province_length; i++) {
				var id = regions[prov_id][1][i]['id'];
				var name = regions[prov_id][1][i]['name'];
				var opt = document.createElement("option");
				var node = document.createTextNode(name);
				opt.appendChild(node);
				$(opt).attr("value",id+','+name);
				city.appendChild(opt);
			}

			_('ship_province_error').innerHTML = '';
			ship_province.style.borderTop = '2px solid #00e676';
			_('city_first_select').innerHTML = 'Loading...';
			setTimeout(function(){
				_('city_first_select').innerHTML = 'Select';
			},1000);
			_('ship_city_error').innerHTML = '';
			_('city').style.borderTop = '2px solid white';
			province = regions[prov_id][0];
		}
				$.ajax({
                    type: "POST",
                    url: base+"shop/shipping_fee",
                    data: ({
                        total_pay: total_pay_finale,
                    }),
                    cache: false,
                    success: function(html) {
                    	_('shipping_charge_finale').innerHTML = '&#8369; 0.00';                  	
                    	$('#ship_total_finale').html(html);
                    }
                });
	}

	function chk_cityBlur($scope){
		var city = _('city').value;
		var ship_city = _('city');
		var prov = _('province').value;
		if (prov == "") {
			_('ship_city_error').innerHTML = 'Please select your province first';
			ship_city.style.borderTop = '2px solid #ff5252';
		}
		else if (city == " " || city == 'Select') {
			_('ship_city_error').innerHTML = 'Please select your city';
			ship_city.style.borderTop = '2px solid #ff5252';
		}
	}
	function chk_cityChange($scope){
		var city = _('city').value;
		var ship_city = _('city');
		if (city == " " || city == 'Select') {
			_('ship_city_error').innerHTML = 'Please select your province';
			ship_city.style.borderTop = '2px solid #ff5252';
			shipping_city = "";
			ship_barangay = "";
			_('barangay').style.borderTop = '2px solid #fff';
		}else{
			_('barangay').focus();
			_('barangay').style.borderTop = '2px solid #2196f3';
			_('ship_city_error').innerHTML = '';
			ship_city.style.borderTop = '2px solid #00e676';
			var whereComaExists = city.lastIndexOf(",");
			var city_id = city.slice(0,whereComaExists);
			var city_name = city.slice(whereComaExists+1);
			shipping_city = city_name;
		}
		_('barangay').value = '';
		_('ship_barangay_error').innerHTML = '';
		var brgyChkIcon = _('brgyChkIcon');
		var brgyXIcon = _('brgyXIcon');
		$(brgyChkIcon).fadeOut('fast');
		$(brgyXIcon).fadeOut('fast');
	}
	function chk_barangay($scope){
		var chkIcon = _('brgyChkIcon');
		var x_icon  = _('brgyXIcon');
		var barangay = _('barangay').value;
		var city = _('city').value;
		if (city == " " || city == 'Select') {
			_('ship_barangay_error').innerHTML = 'Please select your city first';
			_('barangay').style.borderTop = '2px solid #ff5252';
			$(chkIcon).fadeOut('fast');
			$(x_icon).fadeIn('slow');
			_('barangay').value = '';
			ship_barangay = "";
		}
		else if (barangay.length <= 0) {
			_('ship_barangay_error').innerHTML = 'Please enter your barangay';
			_('barangay').style.borderTop = '2px solid #ff5252';
			$(chkIcon).fadeOut('fast');
			$(x_icon).fadeIn('slow');
		}
		else if (barangay.length > 0) {
			var prov_val = _('province').value;
			var whereComaExists = prov_val.lastIndexOf(",");
			if (whereComaExists >= 0) {
				prov_id = prov_val.slice(0,whereComaExists);
				prov_name = prov_val.slice(whereComaExists+1);
			}else{
				var shipping_data_charge = _('shipping_data_charge');
				var shipping_feess = $(shipping_data_charge).attr('value');
				if (shipping_feess == 'FREE') {
					var shipping_fee = 'FREE';
				}else{
					var shipping_fee = parseInt(shipping_feess);
				}
			}
			var total_pay = _('shipping_total');
			var total_payment = $(total_pay).attr('data-total');
			var total_pay_finale = parseInt(total_payment)
			
			var shipping_data_counter = _('shipping_data_counter');
			var counter_loop = $(shipping_data_counter).attr('data-count');
			var total_qty = 0;
			var category = [];
			for (var i = 0; i < counter_loop; i++) { var x=i+1;
				var shipping_data_item = _('shipping_data_item'+x);
				var shipping_category =  $(shipping_data_item).attr('data-category');
				category[category.length] = shipping_category;
				var shipping_qty =  $(shipping_data_item).attr('data-qty');
				var ship_qty = parseInt(shipping_qty);
				var total_qty = parseInt(total_qty);
				var total_qty = ship_qty + total_qty;
			};
			var finding_shoes = category.indexOf("Shoes");
			var finding_bags = category.indexOf("Bags");
			var finding_sports = category.indexOf("Sports");
			var finding_acc = category.indexOf("Accesories");
			if (whereComaExists >= 0) {
					if (finding_shoes >= 0 || finding_bags >= 0 || finding_sports >= 0) {
							if (prov_name == 'v' && shipping_city == 'Tacloban City') {
								var shipping_fee = 'FREE';
							}
							else if (prov_name == 'ml') {
								var shipping_fee = 270;
							}
							else if (prov_name == 'nl') {
								var shipping_fee = 275;
							}
							else if (prov_name == 'sl') {
								var shipping_fee = 275;
							}
							else if (prov_name == 'v') {
								var shipping_fee = 255;
							}
							else if (prov_name == 'm') {
								var shipping_fee = 275;
							}
							else if (shipping_city == 'Tacloban City') {
								var shipping_fee = 'FREE';
							}
					}else{
						if (total_qty >= 5 && finding_acc < 0) {
							var shipping_fee = 'FREE';
						}else{
							if (prov_name == 'v' && shipping_city == 'Tacloban City') {
								var shipping_fee = 'FREE';
							}
							else if (prov_name == 'ml') {
								var shipping_fee = 150;
							}
							else if (prov_name == 'nl') {
								var shipping_fee = 160;
							}
							else if (prov_name == 'sl') {
								var shipping_fee = 160;
							}
							else if (prov_name == 'v') {
								var shipping_fee = 145;
							}
							else if (prov_name == 'm') {
								var shipping_fee = 160;
							}
						}
					}
			}

			_('ship_barangay_error').innerHTML = '';
			_('barangay').style.borderTop = '2px solid #00e676';
			var total_finale = total_pay_finale + shipping_fee;
			$(chkIcon).fadeIn('slow');
			$(x_icon).fadeOut('fast');
			ship_barangay = barangay;
			var loader_shipping = _('order_summarylOADER_IMG');
			$(loader_shipping).fadeIn('fast');
			setTimeout(function(){
                    	$(loader_shipping).fadeOut('fast');
                    	/*_('shipping_charge_finale').innerHTML = '&#8369; '+shipping_fee+'.00';
                    	_('ship_total_finale').innerHTML = total_finale;*/
              	  	  },2000);
			$.ajax({
                    type: "POST",
                    url: base+"shop/shipping_fee",
                    data: ({
                        total: total_finale,
                        ship_fee: shipping_fee,
                        subtotal: total_pay_finale,
                        province: province,
                        city: shipping_city,
                        brgy: ship_barangay
                    }),
                    cache: false,
                    success: function(html) {
                    	if (shipping_fee == 'FREE') {
                    		_('shipping_charge_finale').innerHTML = 'FREE';
                    	}
                    	else{
                    		_('shipping_charge_finale').innerHTML = '&#8369; '+shipping_fee+'.00';
                    	}
                    	_('province_frst_option').innerHTML = province;
                    	_('city_first_select').innerHTML = shipping_city;
                    	$('#ship_total_finale').html(html);
                    }
                });
		}
	}

	function chk_shippingForm($scope){
		var proceed_to_payment = true;
		var firstName = _('firstName').value;
			var nameLength = firstName.length;
			var num = false;
			for (var i = 0; i < nameLength; i++) {
				if (!isNaN(firstName[i]) && firstName[i] != ' ') {
					var num = true;
				}
			}
			if (num == true) {
				_('ship_fname_error').innerHTML = 'Please enter a valid first name';
				_('firstName').style.borderTop = '2px solid #ff5252';
				$('#fnameChkIcon').fadeOut('fast');
				$('#fnameXIcon').fadeIn('slow');
				proceed_to_payment = false;
			}
			if (firstName == "") {
				_('ship_fname_error').innerHTML = 'Please enter your first name';
				_('firstName').style.borderTop = '2px solid #ff5252';
				$('#fnameChkIcon').fadeOut('fast');
				$('#fnameXIcon').fadeIn('slow');
				proceed_to_payment = false;
			}
		var lastName = _('lastName').value;
			var lnameLength = lastName.length;
			var lnum = false;
			for (var i = 0; i < lnameLength; i++) {
				if (!isNaN(lastName[i]) && lastName[i] != ' ') {
					var lnum = true;
				}
			}
			if (lnum == true) {
				_('ship_lname_error').innerHTML = 'Please enter a valid last name';
				_('lastName').style.borderTop = '2px solid #ff5252';
				$('#lnameChkIcon').fadeOut('fast');
				$('#lnameXIcon').fadeIn('slow');
				proceed_to_payment = false;
			}
			if (lastName == "") {
				_('ship_lname_error').innerHTML = 'Please enter your last name';
				_('lastName').style.borderTop = '2px solid #ff5252';
				$('#lnameChkIcon').fadeOut('fast');
				$('#lnameXIcon').fadeIn('slow');
				proceed_to_payment = false;
			}
		var middleName = _('middleName').value;
			var mnameLength = middleName.length;
			var mnum = false;
			for (var i = 0; i < mnameLength; i++) {
				if (!isNaN(middleName[i]) && middleName[i] != ' ') {
					var mnum = true;
				}
			}
			if (mnum == true) {
				_('ship_mname_error').innerHTML = 'Please enter a valid middle name';
				_('middleName').style.borderTop = '2px solid #ff5252';
				$('#mnameChkIcon').fadeOut('fast');
				$('#mnameXIcon').fadeIn('slow');
				proceed_to_payment = false;
			}
			if (middleName == "") {
				_('ship_mname_error').innerHTML = 'Please enter your middle name';
				_('middleName').style.borderTop = '2px solid #ff5252';
				$('#mnameChkIcon').fadeOut('fast');
				$('#mnameXIcon').fadeIn('slow');
				proceed_to_payment = false;
			}
		var complete_address = _('complete_address').value;
			if (complete_address == "") {
				_('ship_address_error').innerHTML = 'Please enter your complete address';
				_('complete_address').style.borderTop = '2px solid #ff5252';
				$('#addnameChkIcon').fadeOut('fast');
				$('#addnameXIcon').fadeIn('slow');
				proceed_to_payment = false;
			}
		var phone = _('phoneNumber').value;
		var ship_phone = _('phoneNumber');
		var chkIcon = _('phoneChkIcon');
		var x_icon  = _('phoneXIcon');	
		if (phone.length <= 0) {
			_('ship_phone_error').innerHTML = 'Please enter your phone number';
			ship_phone.style.borderTop = '2px solid #ff5252';
			$(chkIcon).fadeOut('fast');
			$(x_icon).fadeIn('slow');
			proceed_to_payment = false;
		}
		else if (phone.length < 9){
			_('ship_phone_error').innerHTML = 'Your phone number is too short, please lengthen this text to 9 characters';
			ship_phone.style.borderTop = '2px solid #ff5252';
			$(chkIcon).fadeOut('fast');
			$(x_icon).fadeIn('slow');
			proceed_to_payment = false;
		}
		else if (phone.length > 9){
			_('ship_phone_error').innerHTML = 'Your phone number is too long, please shorten this text to 9 characters';
			ship_phone.style.borderTop = '2px solid #ff5252';
			$(chkIcon).fadeOut('fast');
			$(x_icon).fadeIn('slow');
			proceed_to_payment = false;
		}
		else if (phone.length > 0) {
			var num = false;
			for (var i = 0; i < phone.length; i++) {
				if (isNaN(phone[i]) || phone[i] == ' ') {
					var num = true;
				}
			}
			if (num == true) {
				_('ship_phone_error').innerHTML = 'Only digits are accepted';
				ship_phone.style.borderTop = '2px solid #ff5252';
				$(chkIcon).fadeOut('fast');
				$(x_icon).fadeIn('slow');
				proceed_to_payment = false;
			}
		}
		var provincial = _('province').value;
		if (provincial == "" || provincial == 'Select') {
			_('ship_province_error').innerHTML = 'Please select your province';
			_('province').style.borderTop = '2px solid #ff5252';
			proceed_to_payment = false;
		}
		var city_municipality = _('city').value;
		if (city_municipality == "" || city_municipality == 'Select') {
			_('ship_city_error').innerHTML = 'Please select your city or municipality';
			_('city').style.borderTop = '2px solid #ff5252';
			proceed_to_payment = false;
		}
		var brngy = _('barangay').value;
		if (brngy == "" || brngy.length <= 0) {
			_('ship_barangay_error').innerHTML = 'Please enter your barangay';
			_('barangay').style.borderTop = '2px solid #ff5252';
			proceed_to_payment = false;
		}
		if (proceed_to_payment == true) {
			var shipping_form = _('shopBagProcced');
			shipping_form.href = base+'shop/payment';
		}
	}
	
</script>