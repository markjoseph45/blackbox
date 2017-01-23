<input style="display:none;visibility:hidden;" id="base" type="hidden" value="<?= base_url(); ?>">

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default" id="viewPanel">
		<!-- <div class="panel-header" id="adminHomeHeader">
			<h3 class="panel-title"><?= $category; ?></h3>
		</div> -->
	<div class="panel-body" id="viewPanelBody">

	<?php if (isset($fashion) && !empty($fashion)) : ?>


	<?php $x = 1; $counter = 4; $modal = 1;
	foreach ($fashion as $row):

		if ( $row['image1'] != " " && !empty($row['image1'])):
			$image1 = $row['image1'];
		else: $image1 = false;
		endif;
		if ( $row['image2'] != " " && !empty($row['image2'])):
			$image2 = $row['image2'];
		else: $image2 = false;
		endif;
		if ( $row['image3'] != " " && !empty($row['image3'])):
			$image3 = $row['image3'];
		else: $image3 = false;
		endif;
		if ( $row['image4'] != " " && !empty($row['image4'])):
			$image4 = $row['image4'];
		else: $image4 = false;
		endif;

		$productStocks = $row['prod_stocks'];

		$price_f =  $row['prod_price'];
		$price_discount_f =  $row['price_discount'];
		$price_off =  $row['price_off'];
		$prod_name = $row['prod_name'];
		if (strlen($prod_name) > 20) {
			$new_name = substr($prod_name, 0, 19);
			$prod_name = $new_name . '<b>....</b>';
		}
		$prod_name = strtoupper($prod_name);
		$price = number_format($price_f, 2);
		$price_discount_go = false;
		$price_off_go = false;
		if (!empty($price_discount_f) && $price_discount_f != 0.00):
			$price_discount = number_format($price_discount_f, 2);
			$price_discount_go = true;
			if (!empty($price_off) && $price_off != 0):
				$price_off_go = true;
			endif;
		endif;


		if ($x == $counter): //x=6 , counter = 6
			$counter = $x + 4; //counter = 9
			$setRow = true;
		else:
			$setRow = false;
		endif;
		if ($x == $counter || $setRow == true): ?>
			<div class="row">
		<?php endif;?>
				<div class="col-sm-6 col-md-3" id="thumbDiv">
			    	<div class="thumbnail" id="thumbnailImg" onmouseenter="prodHover($(this))" onmouseleave="prodOutQuickView($(this))">
			    		<!-- <span id="viewQuickSpan" data-toggle="modal" data-target="#viewProductModal<?= $modal ?>"></span> -->
			    		<div id="quick_view_real_wrapper" data-toggle="modal" data-target="#viewProductModal<?= $modal ?>"  onmouseenter="prod_quickView_hover($(this))" onmouseleave="prod_quickView_unhover($(this))" class="col-sm-offset-4 col-xs-offset-4 col-md-offset-4">
			    			<span>Quick View</span>
			    		</div>
			      		<img src="<?php echo base_url(); ?>images/products/<?php echo $row['image0']; ?>" class="img-responsive">
			      		<div style="height: 60px" class="caption">
					      <div class="row" id="viewRow">
					        <p id="productNameView"><?php echo $prod_name; ?></p>
					        	<p id="pForPrice">&#8369;
					        		<?php if ($price_discount_go == false): echo $price; else: echo $price_discount; endif ?> &nbsp; &nbsp;
					        	</p>
								<?php if ($price_discount_go == true): ?>
					        	<span id="h5Price">&#8369; <?php echo $price; ?></span> &nbsp;
					        		<?php if ($price_off_go == true): ?>
										<span id="spanOffPercent"><?= '-'.$price_off.'%'; ?></span>
									<?php endif ?>
					        <?php endif ?>
					       </div>
			      		</div><!-- end of caption -->
			    	</div><!-- end of thumnail -->
			  	</div><!-- end of main Div -->



<div class="modal fade" id="viewProductModal<?= $modal ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- <div class="modal-header" id="viewProdModalHead"> -->
          <div class="row" align="center" id="headerModalROW">
				 <?php if ($productStocks <= 0): ?>
				 	<div class="alert alert-warning" align="center">
				 		<p>Sorry! this product is no longer available.</p>
				 	</div>
				 <?php endif; ?>
	          <button type="button" class="close" id="modalCloseAsterisk" data-dismiss="modal">&times;</button>
	          <h4 id="modalHeaderProductView" class="modal-title"><?= $row['prod_name']; ?></h4>
	          <a href="#prod_reviews_container" class="btn-success pull-right"> <span class="glyphicon glyphicon-pencil"></span> Write a review</a>
	          <!-- <a href="" class="btn-danger pull-right"><span class="glyphicon glyphicon-star"></span> Add to wishlist &nbsp; </a> -->
          </div>
        <!-- </div> -->
        <div class="modal-body">
          <div class="row col-sm-offset-1">
	          <div class="col-sm-2" id="secondaryImagesProdView">
		          <?php if ($row['image1'] != " " && !empty($row['image1'])): ?>
		          		<img id="miniImg<?= $modal ?>" data="<?= $modal ?>" onmouseenter="swapImg($(this))" onmouseleave="swapImg($(this))" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $row['image1']; ?>">
		          <?php endif; ?>
		          <?php if ($row['image2'] != " " && !empty($row['image2'])): ?>
		          		<img id="thirdImage<?= $modal ?>" data="<?= $modal ?>" onmouseenter="swapImg($(this))" onmouseleave="swapImg($(this))" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $row['image2']; ?>">
		          <?php endif; ?>
		          <?php if ($row['image3'] != " " && !empty($row['image3'])): ?>
		          		<img id="frthImage<?= $modal ?>" data="<?= $modal ?>" onmouseenter="swapImg($(this))" onmouseleave="swapImg($(this))" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $row['image3']; ?>">
		          <?php endif; ?>
		          <?php if ($row['image4'] != " " && !empty($row['image4'])): ?>
		          		<img id="fifImage<?= $modal ?>" data="<?= $modal ?>" onmouseenter="swapImg($(this))" onmouseleave="swapImg($(this))" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $row['image4']; ?>">
		          <?php endif; ?>
	          </div>
	          <div class="col-sm-4 col-md-5" id="mainImageViewProduct">
	          		<img id="mainModalImage<?= $modal ?>" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $row['image0']; ?>">
	          </div>
	          <div class="col-sm-5" id="sideCaptionProdView">
	          	<?php if ($category == 'Clothing'): ?>
	          			<h4>Fashion / Men / Clothing / <a href=""> T-Shirts</a></h4>
	          	<?php endif; ?>
	          	<?php if ($category == 'Shoes'): ?>
	          			<h4>Fashion / <a href=""> Shoes</a></h4>
	          	<?php endif; ?>
	          	<?php if ($category == 'Bags'): ?>
	          			<h4>Fashion / <a href=""> Bags</a></h4>
	          	<?php endif; ?>
	          	<?php if ($category == 'Sports' || $category == 'Accesories'): ?>
	          			<h4>Blackbox / <a href=""> <?= $category; ?></a></h4>
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
		    	</div><!-- end of colorDivMain -->

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
	          	</div><!-- end of rowForSize -->
	          	<?php endif;?>

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

	          	<a <?php if ($productStocks >= 1 ): ?> onclick="validate($(this))"
	          	<?php endif; ?> data-track="<?= $modal ?>" data-id=
					"<?php echo $row['prod_id']; ?>" data-category="<?= $category; ?>" id="addToCartBtnProdView" class=
					"btn btn-md btn-success">
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
          </div><!-- end of prod details and specification -->

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
	          			<div style="display: none;" id="review_container<?= $modal; ?>" class="alert alert-success alert-dismissible review_container" role="alert">
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
							    <textarea id="rev_details<?= $modal ?>" placeholder="Type your review details here..." class="form-control"></textarea>
							    <span id="review_details_error<?= $modal ?>" style="color: red;"></span>
							  </div>
							  <div class="form-group">
							    <label for="rev_title">Review Title</label>
							    <input type="text" class="form-control" id="rev_title<?= $modal ?>" placeholder="Type your review title here...">
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




		<?php if ($x == $counter || $setRow == true): ?>
			</div> <!-- end of row -->
		<?php endif; ?>
	<?php $x = $x + 1; $modal++; endforeach; ?> <!--end fo main foreach-->

	<?php else: ?>
		<div class="alert alert-warning" align="center" style="height: 400px;">
			<h4>Sorry! there is no products to display!</h4>
		</div>
	<?php endif; ?>
	</div> <!-- end of panel-body -->

	<div class="panel-footer" id="panelFooterPager">
	<?php if ($fashionRow > 0 && !empty($fashionRow)): $countRow = $fashionRow / 12; ?>
		<div class="row" id="pagerRow" align="center">
			<ul class="pagination" id="ulPager">
			    <li id="previousPager" <?php if ($activePage == 1 || $activePage == 0): ?> class="disabled" <?php endif; ?>>
			      <a <?php if ($activePage != 1 && $activePage != 0): ?> onclick="previous($(this))" <?php endif; ?> id="<?php echo $activePage; ?>" data-category="<?= $category; ?>" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <?php $offset = 0; for ($i=0; $i < $countRow; $i++) { $x = $i + 1; ?>
			    <li id="pageNum">
			    	<a <?php if ($x == $activePage): ?> style="background-color:#f44336;color:white" <?php endif; ?> id="page<?php echo $x; ?>" class="<?php echo $offset;  ?>" href="<?= base_url(); ?>shop/view/<?php echo $offset;  ?>/<?php echo $x;  ?>/12/<?= $category; ?>"><?php echo $x;  ?></a>
			    </li>
			    <?php $offset = $offset + 12;  } //end of for_loop ?>
				<li id="nextPager" <?php if ($activePage == $x || $activePage == 0): ?> class="disabled" <?php endif; ?>>
			      <a <?php if ($activePage != $x && $activePage != 0): ?> onclick="next($(this))" <?php endif; ?> id="<?php echo $activePage; ?>" data-category="<?= $category; ?>" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			    &nbsp; &nbsp; &nbsp; &nbsp;

			      <a <?php if ($activePage == 0): ?> style="background-color:#f44336;color:white" <?php endif; ?> id="viewAll" class="pull-right" href="<?= base_url(); ?>shop/view/0/0/0/<?= $category; ?>">
			      	View All
			      </a>

  			</ul>
  		</div> <!-- end of row -->
  		<?php endif; ?>
	</div> <!-- end of panel-footer -->




	</div> <!-- end of panel -->
</div> <!-- end of container -->

<div class="modal fade" id="modalFashion">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" id="modalHead">
          <button type="button" class="close" style="color:white" data-dismiss="modal">&times;</button>
          <h4 id="modalHeader" class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <img id="modalImage" class="img-responsive img-thumbnail center-block">
        </div>
      </div>
    </div>
  </div>

<script>
var base = $("#base").attr("value");

var data_size = " ";
var data_color = " ";
function _(id){
	return document.getElementById(id);
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
function quickViewFast($scope){
	var thisImg = $($scope).attr("class");
	var prod_Name = $($scope).attr("onchange");
	var imgSrc = document.getElementById('modalImage');
	document.getElementById('modalHeader').innerHTML = prod_Name;
	imgSrc.src = thisImg;
}
function previous($scope){
	var pagerId = $($scope).attr('id');
	var id = '#page'+pagerId;
	var off = $(id).attr('class');
	var category = $($scope).attr('data-category');
	var offset = off - 12;
	var x = pagerId - 1;
	var href = base+'shop/view/'+offset+'/'+x+'/12/'+category;
	$($scope).attr('href',href);
}
function next($scope){
	var pagerId = $($scope).attr('id');
	var id = '#page'+pagerId;
	var off = $(id).attr('class');
	var category = $($scope).attr('data-category');
	var offset = parseInt(off) + 12;
	var x = parseInt(pagerId) + 1;
	var href = base+'shop/view/'+offset+'/'+x+'/12/'+category;
	$($scope).attr('href',href);

}
function checkDisabled($scope){
	var if_disabled = $($scope).attr('class');
	if (if_disabled != 'disabled') {
		var setColor = $($scope).children('a');
		$(setColor).css('background-color','#eeeeee');
	}
}
function prodHover($scope){
	var quickViewSpan = $($scope).children("div#quick_view_real_wrapper");
	$scope.css({boxShadow:'2px -2px 8px #424242, -2px 2px 8px #424242'});
	$(quickViewSpan).fadeIn('fast');
	$($scope).children("img").css({opacity:'0.4'})
}
function prodOutQuickView($scope){
	var quickViewSpan = $($scope).children("div#quick_view_real_wrapper");
	$($scope).children("img").css({opacity:'1'})
	$scope.css({boxShadow:''});
	$(quickViewSpan).fadeOut('fast');
}
function prod_quickView_hover($scope){
	$($scope).css('backgroundColor','#d50000');
}
function prod_quickView_unhover($scope){
	$($scope).css('backgroundColor','');
}


$('document').ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

<script>

$(function () {
  $('[data-toggle="popover"]').popover()
})
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
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

// for star rating//
  	/*var star_rating = false;
  	var set_star_num = "";
	var set_star_rating = "";

  	function set_star($scope){
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
				star_rating = true;
				set_star_num = data_id;
				set_star_rating = data_status;
				$('#input_rating'+data_loop).attr('value',data_status);
			}else{
				var star_next = $($scope).nextAll("i");
				$(star_next).css('color','#bdbdbd');
			}
  		}
  	}*/
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
                    		$('#review_container'+loop).slideDown('fast');
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
