<input style="display:none;visibility:hidden;" id="base" type="hidden" value="<?= base_url(); ?>">
<?php
if (!empty($_SERVER['HTTP_REFERER'])) :
	$referer = $_SERVER['HTTP_REFERER'];
else:
	$referer = base_url();
endif;
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 1 (if user attempts to add something to the cart from the product page)
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($prod_id)):
    $pid = $prod_id;
    $prod_color = $color;
    $prod_size = $size;
	 $wasFound = false;
	 $i = 0;
	// If the cart session variable is not set or cart array is empty
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1):
	    // RUN IF THE CART IS EMPTY OR NOT SET
		$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "color" => $prod_color, "size" => $prod_size, "quantity" => 1));
	else:
		// RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
		foreach ($_SESSION["cart_array"] as $each_item):
		      $i++;
		      while (list($key, $value) = each($each_item)):

				  if ($key == "item_id" && $value == $pid):
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "color" => $prod_color, "size" => $prod_size, "quantity" => $each_item['quantity'] + 1)));
					  $wasFound = true;
				  endif; // close if condition
		      endwhile; // close while loop
	     endforeach; // close foreach loop
		 if ($wasFound == false):
			   array_push($_SESSION["cart_array"], array("item_id" => $pid, "color" => $prod_color, "size" => $prod_size, "quantity" => 1));
		 endif;
	endif;
	redirect('/shop/cart_view');
endif;

?>


<?php
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 3 (if user chooses to adjust item quantity)																		////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($item_to_adjust) && $item_to_adjust != "" && isset($quantity)):
    // execute some code
    $qty_status = true;
	$qty_negative_status = true;
    foreach ($num_of_stocks as $row):
    	$stocks = $row['prod_stocks'];
    endforeach;
    if ($quantity > $stocks):
    	$quantity = $stocks;
    	$qty_status = false;
    ?>
    	<div class="col-sm-4 bg-danger" id="exceededQuantityEntered">
    		<span class="glyphicon glyphicon-plus" id="spanExceededQuantityEntered" onclick="hideSpanExceededQty()"></span>
    		<h4>Important!</h4>
    		<p>
    			The quantity you entered exceeded to the total stocks of this product,
    			so what we place now is the total stocks of this product which is <b><?= $stocks ?></b>.
    		</p>
    	</div>
    	<script type="text/javascript">
			$('#exceededQuantityEntered').slideDown('slow');
		</script>
    <?php
    endif;
    if ($quantity <= 0):
    	$quantity = 1;
    	$qty_negative_status = false;
    ?>
    	<div class="col-sm-4 bg-danger" id="exceededQuantityEntered">
    		<span class="glyphicon glyphicon-plus" id="spanExceededQuantityEntered" onclick="hideSpanExceededQty()"></span>
    		<h4>Important!</h4>
    		<p>
    			The quantity you entered was a negative number which is invalid,
    			so what we place now is the default quantity which is <b>1</b>.
    		</p>
    	</div>
    	<script type="text/javascript">
			$('#exceededQuantityEntered').slideDown('slow');
		</script>
    <?php
    endif;
	$i = 0;
	foreach ($_SESSION["cart_array"] as $each_item):
		      $i++;
		      while (list($key, $value) = each($each_item)):
				  if ($key == "item_id" && $value == $item_to_adjust):
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "color" => $prod_color, "size" => $prod_size,"quantity" => $quantity)));
				  endif; // close if condition
		      endwhile; // close while loop
	endforeach; // close foreach loop
	if ($qty_status == true && $qty_negative_status == true):
	?>
		<div align="center" class="bg-danger col-sm-3" id="successMsgUpdate">
			<p><span class="glyphicon glyphicon-thumbs-up"></span> Successfully updated item quantity.</p>
		</div>
		<script type="text/javascript">
			$('#successMsgUpdate').slideDown('slow');
			setTimeout(function(){
				$('#successMsgUpdate').fadeOut('slow');
			},3000);
		</script>
<?php
	endif;
endif;
?>


<?php
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 4 (if user wants to remove an item from cart)                                                                   /////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($index_to_remove) && isset($_SESSION["cart_array"])):
    // Access the array and run code to remove that array index
 	$key_to_remove = $index_to_remove;
	if (count($_SESSION["cart_array"]) <= 1):
		unset($_SESSION["cart_array"]);
	else:
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]);
		?>
		<div align="center" class="bg-danger col-sm-3" id="successMsgUpdate">
			<p><span class="glyphicon glyphicon-thumbs-up"></span> Successfully removed one item.</p>
		</div>
		<script type="text/javascript">
			$('#successMsgUpdate').slideDown('slow');
			setTimeout(function(){
				$('#successMsgUpdate').fadeOut('slow');
			},3000);
		</script>
		<?php
	endif;
	redirect('/shop/cart_view');
endif;
?>


<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 5  (render the cart for the user to view on the page)                                                       //////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1): ?>
	<div class="container" id="shoppingBagContainerEmptyCart">
		<br/>
		<div class="" align="center" id="shopBagHeader">
			<h3>MY SHOPPING CART</h3>
		</div>
		<div class="col-sm-1 col-sm-offset-5" id="loaderIndicator">
			<img src="<?php echo base_url(); ?>images/default_img/ring.svg" class="img-responsive" alt="">
		</div>
		<br/><br/>

		<div class="col-sm-10 col-sm-offset-1" id="shopBagMainDivider" style="height:300px;">
			<div id="btnShopBag" class="row">
				<a href="<?= $referer; ?>" id="shopBagShopping" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-menu-left"></span>
					BACK TO SHOPPING
				</a>
				<a href="<?= base_url(); ?>shop/shipping" id="shopBagProcced" class="btn btn-default btn-lg pull-right disabled">PROCEED WITH YOUR ORDER <span class="glyphicon glyphicon-menu-right"></span></a>
			</div>
			<div class="" id="shopBagH4">
				<div class="col-sm-6" id="animationCartDivH4">
					<h4>ITEM(S) ADDED TO YOUR SHOPPING CART</h4>
				</div>
				<div class="col-sm-6" id="animationCartDiv">
					<span id="animationCart" class="glyphicon glyphicon-shopping-cart"></span>
					<span id="realCartBadge" class="badge">0</span>
				</div>
			</div>
			<div class="alert alert-warning" align="center" style="height:100px;padding-top:30px">
					<h4 id="cartEmptyErRORmSG">Your cart is empty <i class="fa fa-warning"></i> </h4>
			</div>
		</div>
	</div>
		<script>
			var myVar = setInterval(function(){hideMsg()},1500);
			function hideMsg(){
				var msg = document.getElementById('shopBagShopping');
				var cartEmptyErRORmSG = document.getElementById('cartEmptyErRORmSG');
				msg.style.backgroundColor = "white";
				msg.style.color = '#333';
				$(cartEmptyErRORmSG).fadeOut('slow');
				setTimeout(function(){
					var cartEmptyErRORmSG = document.getElementById('cartEmptyErRORmSG');
					var msg = document.getElementById('shopBagShopping');
					msg.style.backgroundColor = "#333";
					msg.style.color = '#eee';
					$(cartEmptyErRORmSG).fadeIn('slow');
				},700);
			}

		</script>

<?php $null_cart=true;
else:
	$cart_session_count = count($_SESSION["cart_array"]); ?>
		<div class="container" id="shoppingBagContainer">
		<br/>
		<div class="col-sm-2 col-xs-4" id="loadingCartImg">
			<div align="center">
				<img src="<?php echo base_url(); ?>images/default_img/default (7).svg" class="img-responsive img-circle" width="60px">
			</div>
			<p align="center" id="updateQtyTextHTML">Updating Quantity...</p>
		</div>
		<div class="" align="center" id="shopBagHeader">
			<h3>MY SHOPPING CART</h3>
		</div>
		<div class="col-sm-1 col-sm-offset-5" id="loaderIndicator">
			<img src="<?php echo base_url(); ?>images/default_img/ring.svg" class="img-responsive" alt="">
		</div>
		<br/><br/>

		<div class="col-sm-10 col-sm-offset-1" id="shopBagMainDivider">
			<div id="btnShopBag" class="row">
				<a href="<?= $referer; ?>" id="shopBagShopping" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-menu-left"></span> BACK TO SHOPPING</a>
				<a href="<?= base_url(); ?>shop/shipping" id="shopBagProcced" class="btn btn-default btn-lg pull-right">PROCEED WITH YOUR ORDER <span class="glyphicon glyphicon-menu-right"></span></a>
			</div>
			<div class="" id="shopBagH4">
				<div class="col-sm-6" id="animationCartDivH4">
					<h4>ITEM(S) ADDED TO YOUR SHOPPING CART</h4>
				</div>
				<div class="col-sm-6" id="animationCartDiv">
					<span onmouseenter="stop_cart()" id="animationCart" class="glyphicon glyphicon-shopping-cart"></span>
					<span id="realCartBadge" class="badge"><?= $cart_session_count; ?></span>
				</div>
			</div>
<?php $i = 0; $t = 0; $grandTotal = 0; $loop_count = 1;
	foreach ($_SESSION["cart_array"] as $each_item):
    	if (isset($each_item['item_id'])):
    		$item_id = $each_item['item_id'];
    		$quantity = $each_item['quantity'];
    		$color = $each_item['color'];
    		$size = $each_item['size'];
    		$cart_products = $this->user->get_item($item_id);

			if (isset($cart_products) && !empty($cart_products)):
				$loop = 1; $modal = 0;
				foreach ($cart_products as $row):
					$image = $row['image0'];
					$name = $row['prod_name'];
          if ($row['price_discount'] != 0.00 && !empty($row['price_discount'])):
            $price = $row['price_discount'];
          else:
            $price = $row['prod_price'];
          endif;
					$prod_id = $row['prod_id'];
					$subtotal = $quantity * $price;
					$sub = number_format($subtotal, 2);
?>
							<div class="row" id="shoppingBagRow">
								<div data-container="body" data-toggle="tooltip" data-placement="top" title="Remove this item" onclick="removeProduct($(this))" data-id="<?= $t ?>" id="removeShopBag" class="bg-primary" align="center">
									<span class="glyphicon glyphicon-trash" id="cartTrash"></span>
								</div>
								<div class="col-sm-4" id="shopBagItem">
									<h5>ITEM</h5>
									<div class="row">
										<div class="col-sm-4" id="shopBagImgHolder">
											<img id="img<?= $loop_count; ?>" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $image ?>" data-zoom-image="<?php echo base_url(); ?>images/products/<?= $image ?>">
											<a data-toggle="modal" data-target="#view_item<?= $loop_count ?>">VIEW ITEM</a>
										</div>
										<div class="col-sm-8" id="shopBagName">
											<p><?= $name ?></p>
										</div>
									</div>
								</div>
								<div class="col-sm-1" id="shopBagColor">
									<h5>COLOR</h5>
									<p><?= $color ?></p>
								</div>
								<div class="col-sm-1" id="shopBagSize">
									<h5>SIZE</h5>
									<p><?= $size ?></p>
								</div>
								<div class="col-sm-2" id="shopBagQTY">
									<h5>QUANTITY</h5>
									<div class="row" id="dhopBagQtyRow">
									<form id="formQty<?= $loop_count ?>" action="<?= base_url(); ?>shop/update_qty" method="post">
										<div class="col-sm-5">
											<input id="qtyValue<?= $loop_count ?>" type="number" name="qty" class="form-control" value="<?= $quantity ?>">
											<input type="hidden" name="prod_id" value="<?= $prod_id ?>">
											<input type="hidden" name="color" value="<?= $color ?>">
											<input type="hidden" name="size" value="<?= $size ?>">
										</div>
										<a onclick="formSubmit($(this))" data_id="<?= $loop_count ?>" id="updateLoop" class="pull-left"><span class="glyphicon glyphicon-pencil"></span> UPDATE</a>
									</form>
									</div>
								</div>
								<div class="col-sm-2" id="shopBagPrice">
									<h5>PRICE</h5>
									<p>&#8369; <?= $price ?></p>
								</div>
								<div class="col-sm-2" id="shopBagRemove">
									<h5>SUBTOTAL</h5>
									<p>&#8369; <?= $sub ?></p>
								</div>
							</div>


							<div class="modal fade" id="view_item<?= $loop_count ?>">
							    <div class="modal-dialog modal-lg">
							      <div class="modal-content">
							        <div class="modal-body">
							          <div align="center">
							          	<h3><?= $row['prod_name']; ?></h3>
							          </div>
							          <div class="row" align="center">
							          		<?php if ($row['image1'] != " " && !empty($row['image1'])): ?>
										          	<div class="col-sm-2 col-sm-offset-2" id="secondaryImagesProdView">
												          <?php if ($row['image1'] != " " && !empty($row['image1'])): ?>
												          		<img id="view_miniImg<?= $t ?>" data="<?= $t ?>" onmouseenter="swap_view_Img($(this))" onmouseleave="swap_view_Img($(this))" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $row['image1']; ?>">
												          <?php endif; ?>
												          <?php if ($row['image2'] != " " && !empty($row['image2'])): ?>
												          		<img id="view_thirdImage<?= $t ?>" data="<?= $t ?>" onmouseenter="swap_view_Img($(this))" onmouseleave="swap_view_Img($(this))" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $row['image2']; ?>">
												          <?php endif; ?>
												          <?php if ($row['image3'] != " " && !empty($row['image3'])): ?>
												          		<img id="view_frthImage<?= $t ?>" data="<?= $t ?>" onmouseenter="swap_view_Img($(this))" onmouseleave="swap_view_Img($(this))" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $row['image3']; ?>">
												          <?php endif; ?>
												          <?php if ($row['image4'] != " " && !empty($row['image4'])): ?>
												          		<img id="view_fifImage<?= $t ?>" data="<?= $t ?>" onmouseenter="swap_view_Img($(this))" onmouseleave="swap_view_Img($(this))" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $row['image4']; ?>">
												          <?php endif; ?>
											          </div>
											          <div class="col-sm-4 col-md-5" id="mainImageViewProduct">
									          			<img id="view_mainModalImage<?= $t ?>" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $row['image0']; ?>">
									          		</div>
									          <?php else: ?>
										          		<div class="col-sm-4 col-md-6 col-sm-offset-3" id="mainImageViewProduct">
										          			<img id="mainModalImage<?= $modal ?>" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $row['image0']; ?>">
										          		</div>
									          <?php endif; ?>
							          </div>
							          <div class="row" id="forPriceProductView">
							          		<?php if ($row['price_discount'] != 0.00 && !empty($row['price_discount'])): ?>
							          		<div class="col-sm-offset-6">
							          			<h3 style="display:inline;padding-right:15px" id="priceForNowProdView">&#8369; <?= $row['price_discount'] ?></h3>
							          			<h4 id="priceDiscountProdView">&#8369; <?= $row['prod_price'] ?></h4> &nbsp;
								          		<h4 id="priceOffProdView">-<?= $row['price_off'] ?>% Off</h4>
								          	</div>
							          		<?php else: ?>
							          		<div class="col-sm-offset-8">
							          			<h3 style="display:inline;" id="priceForNowProdView">&#8369; <?= $row['prod_price'] ?></h3>
							          		</div>
							          		<?php endif; ?>
							          </div>
							          <div class="row" id="mainRowProductSpecView">
							          		  <div class="col-sm-6">
										          <div class="col-sm-12" id="detailsProductView">
										          			<h4>Product Details</h4>
										          			<div class="" id="detailsProductViewOrig">
											          			<p><?= $row['prod_details'] ?></p>
										          			</div>
										          </div>
									          </div>
									          <div class="col-sm-6">
									          	<div class="col-sm-12" id="specProductView">
									          		<h4>Product Specification</h4>
														  <?php $prod = 'prod_spec';
																for ($i=0; $i < 10; $i++) {
																	if ($row["prod_spec$i"] != " " && !empty($row["prod_spec$i"])):
																		$prod_spec = $row["prod_spec$i"]; ?>
																		<ul>
																			<li><?= $prod_spec; ?></li>
																		</ul>
														<?php endif; } ?>
									          	</div>
									          </div>
							          </div>
							        </div>
							      </div>
							    </div>
							</div>


		<?php
			$grandTotal = $subtotal + $grandTotal;  $loop++; $modal++;
			endforeach; $grand = number_format($grandTotal, 2);
		?>
		<a style="display:none" id="removEAnCHOR"></a>
		<?php else: ?>
			<div align="center" style="color:red">
				<h3>Your cart is empty!</h3>
			</div>
	 	<?php endif; ?>




<?php
else:
    echo "This item do not exist!";
endif;
$i++; $t++; $loop_count++;
endforeach;
if (isset($cart_products) && !empty($cart_products)):
?>
		<div class="col-sm-10 col-sm-offset-1">
			<h4 class="pull-right">GRAND TOTAL: &#8369; <?= $grand ?></h4>
		</div>
	</div>
</div>



<?php $category = $this->user->get_category($prod_id);
		if (isset($category) && !empty($category)):
			foreach ($category as $row):
				$category = $row['prod_category'];
			endforeach;
		?>
		<div class="container" id="cartRELATEDMANFUCKINGdiv">
			<div class="row button-group filter-button-group" id="cartRELATEDmaiNpAGER">
				<div id="cartRELATEDpAGER" class="cartPrevPager">
					<span id="cartRELATEDpAGERLeft" data-filter="1" class="glyphicon glyphicon-menu-left"></span>
				</div>
				<div id="cartRELATEDRIGHTpAGER" class="cartPrevNextPager">
					<span id="cartRELATEDpAGERRight" data-filter="1" class="glyphicon glyphicon-menu-right"></span>
				</div>
			</div>
			<div class="" id="cartRelH4CART">
				<h4>RELATED PRODUCTS</h4>
			</div>
			<?php $random_item = $this->user->random_item($category);
				$count_item = count($random_item);
				$count_divided = $count_item / 4;
				$count_roundedOff = ceil($count_divided);
				if (!empty($random_item) && $count_item > 0): ?>
					<div class="grid"><!-- start of grid -->
						<?php $a = 1; $b = 1; $c = 1; $modal_view = 1;
						 foreach ($random_item as $row_item):
					  		$prod_name = $row_item['prod_name'];
					  		if (strlen($prod_name) > 20) {
								$new_name = substr($prod_name, 0, 19);
								$prod_name = $new_name . '<b>....</b>';
							}
					  		$productName = strtoupper($prod_name);
					  		$price_f =  $row_item['prod_price'];
					  		$price_discount_f =  $row_item['price_discount'];
					  		$price_off =  $row_item['price_off'];
					  		$price_discount_go = false;
							$price_off_go = false;
							$price = number_format($price_f, 2);
							if (!empty($price_discount_f) && $price_discount_f != 0.00):
								$price_discount = number_format($price_discount_f, 2);
								$price_discount_go = true;
								if (!empty($price_off) && $price_off != 0):
									$price_off_go = true;
								endif;
							endif;
							if ($a == $b):?>
						 	 	<div class="col-sm-12 element-item related_item<?= $c ?>">
					  		<?php $b = $b + 4; $c++;
					  		endif;
		 					 ?>
									<div class="col-sm-3" id="cartRELATEDWrapperdiv" data-count="<?= $count_roundedOff; ?>">
										<div id="cartRELATED_SECONDWrapperdiv" onmouseenter="prodHover($(this))" onmouseleave="prodOutQuickView($(this))">
											<button type="button" class="btn btn-danger" id="relatedItemsQuickView" data-toggle="modal" data-target="#viewProductModal<?= $modal_view ?>"></button>
											<img src="<?php echo base_url(); ?>images/products/<?= $row_item['image0']?>" class="img-responsive" alt="">
											<div class="" id="cartRELATEDSEcondFUCKINGdiv">
												<span id="cartRELATEDnAMe" class=""><?= $productName; ?></span>
												<div align="center">
													<span class="cartRelaTEDCartPRICE">&#8369;
														<?php if ($price_discount_go == false): echo $price; else: echo $price_discount; endif ?>
													</span>
													<?php if ($price_discount_go == true): ?>
													<span class="cartRelaTEDCartPRICE" style="text-decoration: line-through;color:#616161">&#8369; <?php echo $price; ?></span>
														<?php if ($price_off_go == true): ?>
															<span class="cartRelaTEDCartOFF"><?= '-'.$price_off.'%'; ?></span>
														<?php endif ?>
													<?php endif ?>
												</div>
											</div>
										</div>
									</div>

							<?php if ($a == $b-1 || $a == $count_item): ?>
								</div>
							<?php endif; ?>
						<?php $a++; $modal_view++; endforeach; ?>
					</div><!-- end of grid -->

					<?php $modal = 1;; foreach ($random_item as $row): ?>
					<div class="modal fade" id="viewProductModal<?= $modal ?>">
					    <div class="modal-dialog modal-lg">
					      <div class="modal-content">
					        <div class="modal-header" id="viewProdModalHead">
					          <div class="row" id="headerModalROW">
						          <button type="button" class="close" id="modalCloseAsterisk" data-dismiss="modal">&times;</button>
						          <h4 id="modalHeaderProductView" class="modal-title"><?= $row['prod_name']; ?></h4>
						          <a href="" class="pull-right"> <span class="glyphicon glyphicon-pencil"></span> Write a review</a>
						          <!-- <a href="" class="pull-right"><span class="glyphicon glyphicon-star"></span> Add to wishlist &nbsp; </a> -->
					          </div>
					        </div>
					        <div class="modal-body">
					          <div class="row col-sm-offset-1">
						          <div class="col-sm-2" id="secondaryImagesProdView">
							          <?php if ($row['image1'] != " " && !empty($row['image1'])): ?>
							          		<img style="height:65px;width: 100%;margin-bottom: 5px;" id="miniImg<?= $modal ?>" data="<?= $modal ?>" onmouseenter="swapImg($(this))" onmouseleave="swapImg($(this))" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $row['image1']; ?>">
							          <?php endif; ?>
							          <?php if ($row['image2'] != " " && !empty($row['image2'])): ?>
							          		<img style="height:65px;width: 100%;margin-bottom: 5px;" id="thirdImage<?= $modal ?>" data="<?= $modal ?>" onmouseenter="swapImg($(this))" onmouseleave="swapImg($(this))" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $row['image2']; ?>">
							          <?php endif; ?>
							          <?php if ($row['image3'] != " " && !empty($row['image3'])): ?>
							          		<img style="height:65px;width: 100%;margin-bottom: 5px;" id="frthImage<?= $modal ?>" data="<?= $modal ?>" onmouseenter="swapImg($(this))" onmouseleave="swapImg($(this))" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $row['image3']; ?>">
							          <?php endif; ?>
							          <?php if ($row['image4'] != " " && !empty($row['image4'])): ?>
							          		<img style="height:65px;width: 100%;margin-bottom: 5px;" id="fifImage<?= $modal ?>" data="<?= $modal ?>" onmouseenter="swapImg($(this))" onmouseleave="swapImg($(this))" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $row['image4']; ?>">
							          <?php endif; ?>
						          </div>
						          <div class="col-sm-4 col-md-5" id="mainImageViewProduct">
						          		<img style="height: 275px;" id="mainModalImage<?= $modal ?>" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $row['image0']; ?>">
						          </div>
						          <div class="col-sm-5" id="sideCaptionProdView">
						          	<?php if ($category == 'Clothing'): ?>
						          			<h4>Fashion / Men / Clothing / <a href=""> T-Shirts</a></h4>
						          	<?php else: ?>
						          			<h4>Fashion / <a href=""> Shoes</a></h4>
						          	<?php endif; ?>

						          	<?php if ($category == 'Clothing' || $category == 'Shoes'): ?>
						          	<div id="colorDivMain">

							          	<button <?php if ($row["prod_color0"] != " "): ?> onclick="chooseColor($(this))" onblur="hideColor($(this))" <?php elseif ($row["prod_color0"] == " "): ?> role="button" data-toggle="popover" data-trigger="focus" title="Sorry!" data-content="No color was stated!" <?php endif; ?> id="chooseColorProdView" class="btn btn-danger">
							          		<span class="glyphicon glyphicon-tint"></span>
							          		Color
							          	</button>
							          	<canvas id="myResultCanvas<?= $modal ?>" style="border:1px solid #ccc;vertical-align:middle;display:none;" width="30" height="28"></canvas>
						          		<span style="font-size:12px;vertical-align:bottom;" id="sizeGuide<?= $modal ?>"><em>Available Color</em></span>

						          	<?php if ($row["prod_color0"] != " "): ?>
							          		<div id="canvasColorsProdView" class="col-sm-8">
							          		 		 <?php for ($i=0; $i < 5; $i++) {
															if ($row["prod_color$i"] != " "):
																$prod_color = $row["prod_color$i"]; ?>
																<canvas onclick="canvasGetColor($(this))" value="<?= $prod_color; ?>" id="myCanvas" class="<?= $modal ?>" width="30" height="28" style="border:1px solid #ccc;background-color:<?= $prod_color; ?>"></canvas>
													<?php endif; }/*end of for_loop */?>
								          	</div>
							        <?php endif; ?>
							        </div>

						          	<div class="row" id="rowForSize">
							          	<button onclick="showSizes($(this))" onblur="hideSizes($(this))" data="<?= $modal ?>" id="chooseSizeProdView" class="btn btn-danger">
							          		<span class="glyphicon glyphicon-cog"></span>
							          		Choose Size
							          	</button>
							          	<span id="sizeChoosen<?= $modal ?>"></span>
							          	<span id="sizeClothGuide<?= $modal ?>" style="font-size:12px;vertical-align:bottom">Size Guide</span>
							          	<div id="clothSizeOptions" <?php if ($category == 'Clothing'): ?> class="col-sm-8" <?php else: ?> class="col-sm-11" <?php endif; ?>>
							          	<?php if ($category == 'Clothing'): ?>
									          	<?php if ($row['cloth_size0'] == 'XS' || $row['cloth_size1'] == 'XS' || $row['cloth_size2'] == 'XS' || $row['cloth_size3'] == 'XS' || $row['cloth_size4'] == 'XS'): ?>
									          				<span onclick="checkSizeChoosen($(this))" id="<?= $modal ?>" value="XS">XS</span>
									          	<?php else: ?>
									          				<span id="clothSizeForBeingFalse" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available">XS</span>
									          	<?php endif; ?>
									          	<?php if ($row['cloth_size0'] == 'S' || $row['cloth_size1'] == 'S' || $row['cloth_size2'] == 'S' || $row['cloth_size3'] == 'S' || $row['cloth_size4'] == 'S'): ?>
									          				<span  onclick="checkSizeChoosen($(this))" id="<?= $modal ?>" value="S" id="sizeSmall">S</span>
									          	<?php else: ?>
									          				<span id="clothSizeForBeingFalse" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available">S</span>
									          	<?php endif; ?>
									          	<?php if ($row['cloth_size0'] == 'M' || $row['cloth_size1'] == 'M' || $row['cloth_size2'] == 'M' || $row['cloth_size3'] == 'M' || $row['cloth_size4'] == 'M'): ?>
									          				<span onclick="checkSizeChoosen($(this))" id="<?= $modal ?>" value="M" id="sizeMeduim">M</span>
									          	<?php else: ?>
									          				<span id="clothSizeForBeingFalse" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available">M</span>
									          	<?php endif; ?>
									          	<?php if ($row['cloth_size0'] == 'L' || $row['cloth_size1'] == 'L' || $row['cloth_size2'] == 'L' || $row['cloth_size3'] == 'L' || $row['cloth_size4'] == 'L'): ?>
									          				<span onclick="checkSizeChoosen($(this))" id="<?= $modal ?>" value="L" id="sizeLarge">L</span>
									          	<?php else: ?>
									          				<span id="clothSizeForBeingFalse" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available">L</span>
									          	<?php endif; ?>
									          	<?php if ($row['cloth_size0'] == 'XL' || $row['cloth_size1'] == 'XL' || $row['cloth_size2'] == 'XL' || $row['cloth_size3'] == 'XL' || $row['cloth_size4'] == 'XL'): ?>
									          				<span onclick="checkSizeChoosen($(this))" id="<?= $modal ?>" value="XL" >XL</span>
									          	<?php else: ?>
									          				<span id="clothSizeForBeingFalse" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available">XL</span>
									          	<?php endif; ?>
									    <?php else: ?>
									    		<?php if ($row['shoe_size0'] == 5 || $row['shoe_size1'] == 5 || $row['shoe_size2'] == 5 || $row['shoe_size3'] == 5 || $row['shoe_size4'] == 5 || $row['shoe_size5'] == 5 || $row['shoe_size6'] == 5 || $row['shoe_size6'] == 5): ?>
									          				<span onclick="checkSizeChoosen($(this))" id="<?= $modal ?>" value="5">5</span>
									          	<?php else: ?>
									          				<span id="clothSizeForBeingFalse" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available">5</span>
									          	<?php endif; ?>
									          	<?php if ($row['shoe_size0'] == 6 || $row['shoe_size1'] == 6 || $row['shoe_size2'] == 6 || $row['shoe_size3'] == 6 || $row['shoe_size4'] == 6 || $row['shoe_size5'] == 6 || $row['shoe_size6'] == 6 || $row['shoe_size6'] == 6): ?>
									          				<span  onclick="checkSizeChoosen($(this))" id="<?= $modal ?>" value="6" id="sizeSmall">6</span>
									          	<?php else: ?>
									          				<span id="clothSizeForBeingFalse" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available">6</span>
									          	<?php endif; ?>
									          	<?php if ($row['shoe_size0'] == 7 || $row['shoe_size1'] == 7 || $row['shoe_size2'] == 7 || $row['shoe_size3'] == 7 || $row['shoe_size4'] == 7 || $row['shoe_size5'] == 7 || $row['shoe_size6'] == 7 || $row['shoe_size6'] == 7): ?>
									          				<span onclick="checkSizeChoosen($(this))" id="<?= $modal ?>" value="7" id="sizeMeduim">7</span>
									          	<?php else: ?>
									          				<span id="clothSizeForBeingFalse" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available">M</span>
									          	<?php endif; ?>
									          	<?php if ($row['shoe_size0'] == 8 || $row['shoe_size1'] == 8 || $row['shoe_size2'] == 8 || $row['shoe_size3'] == 8 || $row['shoe_size4'] == 8 || $row['shoe_size5'] == 8 || $row['shoe_size6'] == 8 || $row['shoe_size6'] == 8): ?>
									          				<span onclick="checkSizeChoosen($(this))" id="<?= $modal ?>" value="8" id="sizeLarge">8</span>
									          	<?php else: ?>
									          				<span id="clothSizeForBeingFalse" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available">8</span>
									          	<?php endif; ?>
									          	<?php if ($row['shoe_size0'] == 9 || $row['shoe_size1'] == 9 || $row['shoe_size2'] == 9 || $row['shoe_size3'] == 9 || $row['shoe_size4'] == 9 || $row['shoe_size5'] == 9 || $row['shoe_size6'] == 9 || $row['shoe_size6'] == 9): ?>
									          				<span onclick="checkSizeChoosen($(this))" id="<?= $modal ?>" value="9" >9</span>
									          	<?php else: ?>
									          				<span id="clothSizeForBeingFalse" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available">9</span>
									          	<?php endif; ?>
									          	<?php if ($row['shoe_size0'] == 10 || $row['shoe_size1'] == 10 || $row['shoe_size2'] == 10 || $row['shoe_size3'] == 10 || $row['shoe_size4'] == 10 || $row['shoe_size5'] == 10 || $row['shoe_size6'] == 10 || $row['shoe_size6'] == 10): ?>
									          				<span onclick="checkSizeChoosen($(this))" id="<?= $modal ?>" value="10" >10</span>
									          	<?php else: ?>
									          				<span id="clothSizeForBeingFalse" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available">10</span>
									          	<?php endif; ?>
									          	<?php if ($row['shoe_size0'] == 11 || $row['shoe_size1'] == 11 || $row['shoe_size2'] == 11 || $row['shoe_size3'] == 11 || $row['shoe_size4'] == 11 || $row['shoe_size5'] == 11 || $row['shoe_size6'] == 11 || $row['shoe_size6'] == 11): ?>
									          				<span onclick="checkSizeChoosen($(this))" id="<?= $modal ?>" value="11" >11</span>
									          	<?php else: ?>
									          				<span id="clothSizeForBeingFalse" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available">11</span>
									          	<?php endif; ?>
									          	<?php if ($row['shoe_size0'] == 12 || $row['shoe_size1'] == 12 || $row['shoe_size2'] == 12 || $row['shoe_size3'] == 12 || $row['shoe_size4'] == 12 || $row['shoe_size5'] == 12 || $row['shoe_size6'] == 12 || $row['shoe_size6'] == 12): ?>
									          				<span onclick="checkSizeChoosen($(this))" id="<?= $modal ?>" value="12" >12</span>
									          	<?php else: ?>
									          				<span id="clothSizeForBeingFalse" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available">12</span>
									          	<?php endif; ?>
									    <?php endif; ?>
							          	</div>
						          	</div>
						          <?php endif; ?>
						          	<div style="display:none">
						          		<input type="hidden" name="cart_view" id="cart_view" data-color="" data-size="">
						          	</div>
						          	<div class="row" id="forPriceProductView">
						          		<?php if ($row['price_discount'] != 0.00 && !empty($row['price_discount'])): ?>
						          			<h3 id="priceForNowProdView">&#8369; <?= $row['price_discount'] ?></h3>
						          			<h4 id="priceDiscountProdView">&#8369; <?= $row['prod_price'] ?></h4> &nbsp;
							          		<h4 id="priceOffProdView">-<?= $row['price_off'] ?>% Off</h4>
						          		<?php else: ?>
						          			<h3 id="priceForNowProdView">&#8369; <?= $row['prod_price'] ?></h3>
						          		<?php endif; ?>
						          	</div>

						          	<a onclick="validate($(this))" data-track="<?= $modal ?>" data-id="<?php echo $row['prod_id']; ?>" data-category="<?= $category; ?>" id="addToCartBtnProdView" class="btn btn-md btn-success">
						          		<span class="glyphicon glyphicon-shopping-cart"></span>
						          		ADD TO CART
						          	</a>
						          	<p id="errorMsgClick<?= $modal ?>"></p>
						          </div>
					          </div> <!-- end of row -->
					          <br/>
					          <div class="row" id="mainRowProductSpecView">
					          	  <div class="col-sm-6">
							          <div class="col-sm-12" id="detailsProductView">
							          			<h4>Product Details</h4>
							          			<div class="" id="detailsProductViewOrig">
								          			<p><?= $row['prod_details'] ?></p>
							          			</div>
							          </div><!-- end of row -->
						          </div>
						          <div class="col-sm-6">
						          	<div class="bg-success col-sm-12" id="specProductView">
						          		<h4>Product Specification</h4>

											  <?php $prod = 'prod_spec';
													for ($i=0; $i < 10; $i++) {
														if ($row["prod_spec$i"] != " " && !empty($row["prod_spec$i"])):
															$prod_spec = $row["prod_spec$i"]; ?>
															<ul>
																<li><?= $prod_spec; ?></li>
															</ul>
													<?php endif; } ?>
						          	</div>
						          </div>
					          </div>

					          <?php
          $product_rating = $this->user->get_rating($row["prod_id"]);
          if (!empty($product_rating)):
          	$prod_rating_count = count($product_rating);
          	$delighted = 0;
          	$expectations = 0;
          	$satisfied = 0;
          	$average = 0;
          	$disappointed = 0;
          	$deligth = 0;
          	$expect = 0;
          	$satis = 0;
          	$ave = 0;
          	$disappoint = 0;

          	foreach ($product_rating as $item_rating):
          		$pr_rating = $item_rating['rating'];
          		if ($pr_rating == 'Absolutely Delighted'):
          			$delighted += 10;
          			if ($delighted >= 100):
          				$delighted = 100;
          			endif;
          			$deligth += 1;
          		endif;
          		if ($pr_rating == 'Above Expectations'):
          			$expectations += 10;
          			if ($expectations >= 100):
          				$expectations = 100;
          			endif;
          			$expect += 1;
          		endif;
          		if ($pr_rating == 'Satisfied'):
          			$satisfied += 10;
          			if ($satisfied >= 100):
          				$satisfied = 100;
          			endif;
          			$satis += 1;
          		endif;
          		if ($pr_rating == 'Below Average'):
          			$average += 10;
          			if ($average >= 100):
          				$average = 100;
          			endif;
          			$ave += 1;
          		endif;
          		if ($pr_rating == 'Disappointed'):
          			$disappointed += 10;
          			if ($disappointed >= 100):
          				$disappointed = 100;
          			endif;
          			$disappoint += 1;
          		endif;
          	endforeach;
          	else:
          		$prod_rating_count = 0;
	          	$delighted = 0;
	          	$expectations = 0;
	          	$satisfied = 0;
	          	$average = 0;
	          	$disappointed = 0;
	          	$deligth = 0;
	          	$expect = 0;
	          	$satis = 0;
	          	$ave = 0;
	          	$disappoint = 0;
          endif;
          ?>

          <div class="container-fluid" id="prod_reviews_container">
          	<div class="row" id="row_wrapper">
	          	<h4 class="rating_title">Rating & Reviews on Wild Dandelion</h4>
	          	<div class="col-sm-6">
	          		<h5>Customer Reviews on Product</h5>
	          		<p>Based on <?= $prod_rating_count ?> ratings and reviews</p>
	          		<div class="row" id="rating_row_wrapper">
	          			<div class="row">
		          			<div class="col-sm-5">
		          				<label>Delighted</label>
		          			</div>
		          			<div class="col-sm-7 reviews_progress_bar">
				          		<div class="progress">
								  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?= $delighted.'%'; ?>">
								    <?= $deligth; ?>
								  </div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-5">
		          				<label>Above Expectations</label>
		          			</div>
		          			<div class="col-sm-7 reviews_progress_bar">
				          		<div class="progress">
								  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?= $expectations.'%'; ?>">
								    <?= $expect; ?>
								  </div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-5">
		          				<label>Satisfied</label>
		          			</div>
		          			<div class="col-sm-7 reviews_progress_bar">
				          		<div class="progress">
								  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?= $satisfied.'%'; ?>">
								    <?= $satis; ?>
								  </div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-5">
		          				<label>Below Average </label>
		          			</div>
		          			<div class="col-sm-7 reviews_progress_bar">
				          		<div class="progress">
								  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?= $average.'%'; ?>">
								    <?= $ave; ?>
								  </div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-5">
		          				<label>Disappointed</label>
		          			</div>
		          			<div class="col-sm-7 reviews_progress_bar">
				          		<div class="progress">
								  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?= $disappointed.'%'; ?>">
								    <?= $disappoint; ?>
								  </div>
								</div>
							</div>
						</div>
					</div>
	          	</div>
	          	<div class="col-sm-6">
	          		<div class="row bg-info" id="comments_row_wrapper">
	          			<div class="col-sm-2 col-xs-4 review_rating_MainContainer" id="review_rating_MainContainer<?= $modal; ?>">
	          				<img class="img-responsive center-block" src="<?php echo base_url(); ?>images/default_img/default (7).svg">
	          				<p>Submitting...</p>
	          			</div>
	          			<h5>Please make your review about this product</h5>
	          			<div id="review_container_success" class="alert alert-success alert-dismissible" role="alert">
						  <button id="loginAlert" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Success!</strong>
						  <span id="reviewSuccessMsg">Your review was successfully been sent.</span>
						</div>
	          			<label>Rate this product*</label>
	          			<div class="">
	          				<i id="star1" data-id="1" data-loop="<?= $modal; ?>" data-status="Disappointed" onmouseenter="rate($(this))" class="fa fa-star five_star"></i>
	          				<i id="star2" data-id="2" data-loop="<?= $modal; ?>" data-status="Below Average" onmouseenter="rate($(this))" class="fa fa-star five_star"></i>
	          				<i id="star3" data-id="3" data-loop="<?= $modal; ?>" data-status="Satisfied" onmouseenter="rate($(this))" class="fa fa-star five_star"></i>
	          				<i id="star4" data-id="4" data-loop="<?= $modal; ?>" data-status="Above Expectations" onmouseenter="rate($(this))" class="fa fa-star five_star"></i>
	          				<i id="star5" data-id="5" data-loop="<?= $modal; ?>" data-status="Absolutely Delighted" onmouseenter="rate($(this))" class="fa fa-star five_star"></i>
	          				<span id="rating_result<?= $modal ?>" class="rating_result">Hover on this stars to rate</span>
	          				<p id="review_rating_error<?= $modal ?>" style="color:red;"></p>
	          			</div>
	          			<div id="form_reviews">
	          				<form id="form_rev">
							  <div class="form-group">
							    <label for="rev_description">Review Details*</label>
							    <textarea id="rev_details<?= $modal ?>" class="form-control"></textarea>
							    <span id="review_details_error<?= $modal ?>" style="color: red;"></span>
							  </div>
							  <div class="form-group">
							    <label for="rev_title">Review Title</label>
							    <input type="text" class="form-control" id="rev_title<?= $modal ?>" placeholder="Review Title">
							  </div>
							  <input type="hidden" name="rating" id="input_rating<?= $modal ?>" value="" style="visibility: hidden;display: none;">
							  <input type="hidden" name="review_item_id" id="review_item_id<?= $modal ?>" value="<?= $row['prod_id'] ?>" style="visibility: hidden;display: none;">
							  <button onclick="rev_submit($(this))" data-loop="<?= $modal; ?>" type="button" id="review_submit_button<?= $modal ?>"  class="btn btn-default">Submit Your Review</button>
							  <p style="color: red;" id="review_error<?= $modal ?>"></p>
							</form>
	          			</div>
	          		</div>
	          	</div>
	          	<div class="col-sm-12" id="cust_reviews_container">
	    <?php $reviews = $this->user->get_reviews($row["prod_id"]);
	    		 $review_num = count($reviews);
		         if (!empty($reviews)): ?>
	          		<h4>Customer Reviews Total <?= $review_num; ?></h4>
	          	  <?php
		          	foreach ($reviews as $rev):
		          		$rev_date = $rev['date_created'];
						$yr = substr($rev_date, 0,4);
						$mnth = substr($rev_date, 5,2);
						$dy = substr($rev_date, 8,2);
						$hr = substr($rev_date, 11,2);
						$min = substr($rev_date, 14,2);
						$rev_item_date = date("M d, Y",mktime(0,0,0,$mnth,$dy,$yr));
						$rev_item_time = date("h:ia",mktime($hr,$min,0,0,0,0));
		          ?>
          			<div class="row" id="reviews_row_wrapper">
          				<div class="col-sm-10">
          					<label><?= $rev['title'] ?></label>
          					<p><?= $rev['details'] ?></p>
          					<div class="" id="user_reviews_img_wrapper">
          						<?php if (!empty($rev['profile'])): ?>
          							<img class="img-responsive" src="<?php echo base_url(); ?>images/users/<?= $rev['profile']; ?>">
          						<?php else: ?>
          							<i id="review_user_icon" class="fa fa-user-circle"></i>
          						<?php endif; ?>
          						<span id="review_username"><?= $rev['username'] ?></span>
          					</div>
          				</div>
          				<div class="col-sm-2 review_date">
          					<p><?= $rev_item_date ?> <?= $rev_item_time ?></p>
          				</div>
          			</div>
          			<?php
			          endforeach;
			          else: ?>
	          			<h4>Customer Reviews Total 0</h4>
			          <div align="center" style="border-radius: 0px;" id="review_container" class="alert alert-warning" role="alert">
						  <strong>Sorry!</strong>
						  <span id="reviewSuccessMsg">There is no review for this product.</span>
					  </div>
			        <?php
			         endif;
			        ?>
          		</div><!-- end of row wrapper customer reviews -->
          	</div><!-- end of row wrapper -->
          </div><!-- end of container -->

					        </div><!-- end of modal-body -->
					        <div class="panel-footer">
					        	<h5 style="color:gray;"><em>Blackbox Tee Shop</em></h5>
					        </div>
					      </div><!-- end of modal-content -->
					    </div><!-- end of modal-dialog -->
					  </div><!-- end of modal -->
					<?php $modal++; endforeach; ?>
			<?php else: ?>
				<div class="alert alert-warning" align="center">
					<h5>Sorry! there is no related products.</h5>
				</div>
			<?php endif; ?>
		</div><!-- end of container -->
<?php endif; ?>


<br/>
<br/>

<?php endif; endif; ?>


<script>
var base = $("#base").attr("value");
var data_size = " ";
var data_color = " ";
	// init Isotope
	var $grid = $('.grid').isotope({
	  // options
	});
	// filter items on button click
	$('.cartPrevPager').on( 'click', 'span', function() {
	  var filterValue = $(this).attr('data-filter');
	  if (filterValue <= 1) {
	  	 filterValue = filterValue;
	  }else{
	  	var filter = parseInt(filterValue);
	  	filterValue = filter - 1;
	  	var cartRELATEDpAGERLeft = _('cartRELATEDpAGERLeft');
	  	var cartRELATEDpAGERRight = _('cartRELATEDpAGERRight')
	  	$(cartRELATEDpAGERLeft).attr('data-filter',filterValue);
	  	$(cartRELATEDpAGERRight).attr('data-filter',filterValue);
	  }
	  $grid.isotope({ filter: '.related_item'+filterValue });
	});

	$('.cartPrevNextPager').on( 'click', 'span', function() {
	  var filterValue = $(this).attr('data-filter');
	  var max_item = _('cartRELATEDWrapperdiv');
	  var maximum_item = $(max_item).attr('data-count');
	  var maximum = parseInt(maximum_item);
	  if (filterValue >= maximum) {
	  	 filterValue = filterValue;
	  }else{
	  	var filter = parseInt(filterValue);
	  	filterValue = filter + 1;
	  	var cartRELATEDpAGERLeft = _('cartRELATEDpAGERLeft');
	  	var cartRELATEDpAGERRight = _('cartRELATEDpAGERRight')
	  	$(cartRELATEDpAGERLeft).attr('data-filter',filterValue);
	  	$(cartRELATEDpAGERRight).attr('data-filter',filterValue);
	  }
	  $grid.isotope({ filter: '.related_item'+filterValue });
	});

	(function(){
		$grid.isotope({ filter: '.related_item1' });
	}());

	function _(id){
		return document.getElementById(id);
	}
	for (var i = 1; i < 10; i++) {
		$("#img"+i).elevateZoom({scrollZoom : true});
	};
	$('document').ready(function(){
    	$('[data-toggle="tooltip"]').tooltip();
	});

	function getQty($scope) {
		var valueQty =	$($scope).attr('value');
	}
	function formSubmit($scope){
		$('#loadingCartImg').fadeIn('fast');
		setTimeout(function(){
                    var loopNum = $($scope).attr('data_id');
					document.getElementById('formQty'+loopNum).submit();
              	  },2000);

	}
	function removeProduct($scope){
		$('#loadingCartImg').fadeIn('fast');
		document.getElementById('updateQtyTextHTML').innerHTML = 'Removing Item...'
		var prod_id = $($scope).attr('data-id');
		var remove = document.getElementById('removEAnCHOR');
		var hrefRemove = base+'shop/remove_item/'+prod_id;
		remove.href = hrefRemove;
		document.getElementById('removEAnCHOR').click();
	}
	function hideSpanExceededQty(){
		$('#exceededQuantityEntered').fadeOut('slow');
	}
	var myVar=setInterval(function(){cart()},1000);
	function cart(){
		var cart = _('animationCartDiv');
		$(cart).animate({paddingLeft:'400px'},5000);
		$(cart).fadeOut('fast');
		returnPadding();
	};
	function returnPadding(){
		var cart = _('animationCartDiv');
		$(cart).animate({paddingLeft:'0px'},'fast');
		$(cart).fadeIn('slow');
	}
	function swapImg($scope){
		var miniImg = $($scope).attr('src');
		var image_id = $($scope).attr('data');
		var id = $($scope).attr('id');
		var new_id = _(id);
		var main = '#mainModalImage'+image_id;
		var primaryImg = _('mainModalImage'+image_id);
		var mainImg = $(main).attr('src');
		primaryImg.src = miniImg;
		new_id.src = mainImg;
	}
	function swap_view_Img($scope){
		var miniImg = $($scope).attr('src');
		var image_id = $($scope).attr('data');
		var id = $($scope).attr('id');
		var new_id = _(id);
		var main = '#view_mainModalImage'+image_id;
		var primaryImg = _('view_mainModalImage'+image_id);
		var mainImg = $(main).attr('src');
		primaryImg.src = miniImg;
		new_id.src = mainImg;
	}
	function stop_cart(){
		$("#animationCartDiv").stop(true);
	}

	function prodHover($scope){
		var quickViewSpan = $($scope).children("button#relatedItemsQuickView");
		$($scope).children("img").css({opacity:'0.8'})
		$scope.css({boxShadow:'2px -2px 8px #616161 , -2px 2px 8px #616161'});
		$(quickViewSpan).css({visibility:'visible'});
		$(quickViewSpan).animate({width:'130px',},'fast');
		$(quickViewSpan).text('Quick View');
	}
	function prodOutQuickView($scope){
		var quickViewSpan = $($scope).children("button#relatedItemsQuickView");
		/*var quickViewButton = $($scope).children("a");*/
		$($scope).children("img").css({opacity:'1'})
		/*$(quickViewButton).fadeOut();*/
		$(quickViewSpan).text('');
		$scope.css({boxShadow:''});
		$(quickViewSpan).animate({width:'0px',},'fast');
	}
	  function showSizes($scope){
  	var id = $($scope).attr('data');
  	var div = $($scope).siblings('div');
  	$(div).slideDown("fast");
  }
  function hideSizes($scope){
  	var id = $($scope).attr('data');
  	var div = $($scope).siblings('div');
  	$(div).slideUp("slow");
  }
  function checkSizeChoosen($scope){
  	var choosenSize = $($scope).attr('value');
  	var sizeDis = $($scope).attr('id');
  	var displaySize = 'sizeChoosen'+sizeDis;
  	var size = document.getElementById(displaySize);
  	var guideSize = 'sizeClothGuide'+sizeDis;
  	$(size).css({"padding":"9px","padding-top":"8px","padding-bottom":"10px","color":"white","background-color":"#81d4fa"});
  	document.getElementById(displaySize).innerHTML = choosenSize;
  	document.getElementById(guideSize).innerHTML = 'Selected Size';
  	var cart_view = document.getElementById('cart_view');
  	$('#cart_view').attr('data-size',choosenSize);
  	data_size = choosenSize;
  	document.getElementById('errorMsgClick'+sizeDis).innerHTML = '';
  }
  function chooseColor($scope){
  	var divShow = $($scope).siblings("div");
  	$(divShow).slideDown("fast");
  }
  function hideColor($scope){
  	var divShow = $($scope).siblings("div");
  	$(divShow).slideUp("slow");
  }
  function canvasGetColor($scope){
  	var canvasColor = $($scope).attr("value");
  	var canvasDisplayId = $($scope).attr("class");
  	var resultDisplay = 'myResultCanvas'+canvasDisplayId;
  	var sizeGuideDisplay = 'sizeGuide'+canvasDisplayId;
  	document.getElementById(sizeGuideDisplay).innerHTML = 'Selected Color';
  	var color = document.getElementById(resultDisplay);
  	$(color).fadeIn('fast');
  	$(color).css({"backgroundColor":canvasColor,"border":"1px solid #ccc","vertical-align":"middle"});
  	var cart_view = document.getElementById('cart_view');
  	$('#cart_view').attr('data-color',canvasColor);
  	data_color = canvasColor;
  	document.getElementById('errorMsgClick'+canvasDisplayId).innerHTML = '';
  }
  function validate($scope){
  	var id = $($scope).attr('data-id');
  	var track = $($scope).attr('data-track');
  	var category = $($scope).attr('data-category');
  	var data_track = 'errorMsgClick'+track;
  	if (category == 'Clothing' || category == 'Shoes') {
  		if (data_color != " " && data_size != " ") {
  			var hreflocation = base+'shop/cart/'+id+'/'+data_color+'/'+data_size;
  			$($scope).attr('href',hreflocation);
  		}
  		else{
  			var data = document.getElementById(data_track);
  			data.style.fontSize = '12px';
  			data.style.color = 'red';
  			document.getElementById(data_track).innerHTML = 'Please select product color and size';
  		}
  	}else{
  		var hreflocation = base+'shop/cart/'+id+'/NA/NA';
  		$($scope).attr('href',hreflocation);
  	}
  }


  function rate($scope){
  		var data_id = $($scope).attr('data-id');
  		var data_loop = $($scope).attr('data-loop');
  		var data_status = $($scope).attr('data-status');
  		for (var i = 0; i < 5; i++) { var x = i + 1;
			if (x <= data_id) {
				var star_behind = $($scope).prevAll("i");
				var star_span = $($scope).siblings("span");
				$($scope).css('color','#fdd835');
				$(star_behind).css('color','#fdd835');
				$(star_span).text(data_status);
				$('#input_rating'+data_loop).attr('value',data_status);
			}else{
				var star_next = $($scope).nextAll("i");
				$(star_next).css('color','#bdbdbd');
			}
  		}
  	}
  	/*function unrate($scope){
  		var data_id = $($scope).attr('data-id');
  		var data_status = $($scope).attr('data-status');
  		if (star_rating == false) {
  			for (var i = 0; i < 5; i++) { var x = i + 1;
  				var all_stars = $($scope).siblings("i");
  				var star_span = $($scope).siblings("span");
  				$($scope).css('color','#bdbdbd');
  				$(all_stars).css('color','#bdbdbd');
  				$(star_span).text('Click to rate');
  				var star = '#star'+x;
				$(star).css('color','#bdbdbd');
				$('#rating_result').text('Click to rate');
  			}
  		}else{
  			for (var i = 0; i < 5; i++) { var x = i + 1;
				if (x <= set_star_num) {
					var star_back = $($scope).prevAll("i");
					var rev_star_span = $($scope).siblings("span");
					$($scope).css('color','#fdd835');
					$(star_back).css('color','#fdd835');
					$(rev_star_span).text(data_status);
					var star = '#star'+x;
					$(star).css('color','#fdd835');
					$('#rating_result').text(set_star_rating);
				}else{
					var star_next = $($scope).nextAll("i");
					$(star_next).css('color','#bdbdbd');
					var star = '#star'+x;
					$(star).css('color','#bdbdbd');
				}
  			}//end of for
  		}
  	}*/

// end of star rating//
	function rev_submit($scope){
		var loop = $($scope).attr('data-loop');
		var rev_details = $('#rev_details'+loop).val();
  		var rev_title = $('#rev_title'+loop).val();
  		var input_rating = $('#input_rating'+loop).val();
  		var review_item_id = $('#review_item_id'+loop).val();
  		if (input_rating == "") {
  			$('#review_rating_error'+loop).text('Please rate this item');
  		}
  		else if (rev_details == "") {
  			$('#review_details_error'+loop).text('Please type your review');
  		}else{
  			$('#review_rating_MainContainer'+loop).fadeIn('fast');
  			$.ajax({
                    type: "POST",
                    url: base+"shop/review",
                    data: ({
                        details: rev_details,
                        title: rev_title,
                        rating: input_rating,
                        prod_id: review_item_id
                    }),
                    cache: false,
                    success: function(html) {
                    	$('#review_rating_MainContainer'+loop).fadeOut('fast');
                    	$('#review_rating_error'+loop).text('');
                    	$('#review_details_error'+loop).text('');
                    	if ((html) == 'good') {
                    		$('#review_container_success').slideDown('fast');
                    		_('rev_details'+loop).value = ""
                    		_('rev_details'+loop).value = "";
                    		_('input_rating'+loop).value = "";
                    		_('rev_title'+loop).value = "";
                    		for (var i = 0; i < 5; i++) { var x = i + 1;
				  				var star = '#star'+x;
								$('.five_star').css('color','#bdbdbd');
								$('#rating_result'+loop).text(' Hover on this stars to rate');
				  			}
                    	}else{
                    		$('#review_error'+loop).text((html));
                    		_('rev_details'+loop).value = ""
                    		_('rev_details'+loop).value = "";
                    		_('input_rating'+loop).value = "";
                    		_('rev_title'+loop).value = "";
                    		for (var i = 0; i < 5; i++) { var x = i + 1;
				  				var star = '#star'+x;
								$('.five_star').css('color','#bdbdbd');
								$('#rating_result'+loop).text(' Hover on this stars to rate');
				  			}
                    	}
                    }
                });
  		}
	}

</script>
