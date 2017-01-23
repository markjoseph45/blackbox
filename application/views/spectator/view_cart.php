<?php if (isset($buy_item) && !empty($buy_item)): ?>
<?php foreach ($buy_item as $row): ?>
  
<div class="container ">
	<div class="panel panel-default">
		<div class="panel-heading" id="cartPanelHeaderForTitle">
			<h4><?= $row['prod_name']; ?></h4>
			<a href="" class="pull-right"><span class="glyphicon glyphicon-pencil"></span> Comment</a>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-2" id="cartImages">
					<?php for ($i=1; $i < 5; $i++) {  
								if (isset($row["image$i"]) && $row["image$i"] != " "): ?>
									<img id="modalImage" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $row["image$i"] ?>">
						<?php	endif;	?>	
					<?php } /*end of forloop*/?>
				</div>
				<div class="col-sm-6" id="cartPrimaryImg">
					<img id="modalImage" class="img-responsive" src="<?php echo base_url(); ?>images/products/<?= $row['image0']; ?>">
				</div>
				<div class=" col-sm-4">
					<h4>Fashion / Men / Clothing / <a href=""> T-Shirts</a></h4>
					<div class="">
						<button <?php if ($row["prod_color0"] != " "): ?> onclick="chooseColor($(this))" onblur="hideColor($(this))" <?php elseif ($row["prod_color0"] == " "): ?> role="button" data-toggle="popover" data-trigger="focus" title="Sorry!" data-content="No color was stated!" <?php endif; ?> id="chooseColorProdView" class="btn btn-danger">
			          		<span class="glyphicon glyphicon-tint"></span>
			          		Color
			          	</button>
			          	<canvas id="myResultCanvas" style="border:1px solid #ccc;vertical-align:middle;display:none;" width="30" height="28"></canvas>
			          	<span id="colorGuide" style="font-size:12px;vertical-align:bottom;">Available Color</span>
			          	<?php if ($row["prod_color0"] != " "): ?>
			          		<div id="canvasColorsProdView" class="col-sm-8">
			          		 		 <?php for ($i=0; $i < 5; $i++) { 
											if ($row["prod_color$i"] != " "): 
												$prod_color = $row["prod_color$i"]; ?>
												<canvas onclick="canvasGetColor($(this))" value="<?= $prod_color; ?>" id="myCanvas" class="" width="30" height="28" style="border:1px solid #ccc;background-color:<?= $prod_color; ?>"></canvas>
									<?php endif; }/*end of for_loop */?>
				          	</div>
		        		<?php endif; ?>
			          

			        </div>
			        <br/><br/>
			        <div class="">
			        	<button onclick="showSizes($(this))" onblur="hideSizes($(this))" id="chooseSizeProdView" class="btn btn-danger">
		          		<span class="glyphicon glyphicon-cog"></span>
		          		Choose Size
		          		</button>
		          		<span id="sizeChoosen"></span>
		          		<span id="sizeClothGuide" style="font-size:12px;vertical-align:bottom">Size Guide</span>
		          		<div id="clothSizeOptions" class="col-sm-7">
				          	<?php if ($row['cloth_size0'] == 'XS' || $row['cloth_size1'] == 'XS' || $row['cloth_size2'] == 'XS' || $row['cloth_size3'] == 'XS' || $row['cloth_size4'] == 'XS'): ?>
				          				<span onclick="checkSizeChoosen($(this))" id="" value="XS">XS</span>
				          	<?php else: ?>
				          				<span id="clothSizeForBeingFalse" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available">XS</span>
				          	<?php endif; ?>
				          	<?php if ($row['cloth_size0'] == 'S' || $row['cloth_size1'] == 'S' || $row['cloth_size2'] == 'S' || $row['cloth_size3'] == 'S' || $row['cloth_size4'] == 'S'): ?>
				          				<span  onclick="checkSizeChoosen($(this))" id="" value="S" id="sizeSmall">S</span>
				          	<?php else: ?>
				          				<span id="clothSizeForBeingFalse" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available">S</span>
				          	<?php endif; ?>
				          	<?php if ($row['cloth_size0'] == 'M' || $row['cloth_size1'] == 'M' || $row['cloth_size2'] == 'M' || $row['cloth_size3'] == 'M' || $row['cloth_size4'] == 'M'): ?>
				          				<span onclick="checkSizeChoosen($(this))" id="" value="M" id="sizeMeduim">M</span>
				          	<?php else: ?>
				          				<span id="clothSizeForBeingFalse" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available">M</span>
				          	<?php endif; ?>
				          	<?php if ($row['cloth_size0'] == 'L' || $row['cloth_size1'] == 'L' || $row['cloth_size2'] == 'L' || $row['cloth_size3'] == 'L' || $row['cloth_size4'] == 'L'): ?>
				          				<span onclick="checkSizeChoosen($(this))" id="" value="L" id="sizeLarge">L</span>
				          	<?php else: ?>
				          				<span id="clothSizeForBeingFalse" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available">L</span>
				          	<?php endif; ?>
				          	<?php if ($row['cloth_size0'] == 'XL' || $row['cloth_size1'] == 'XL' || $row['cloth_size2'] == 'XL' || $row['cloth_size3'] == 'XL' || $row['cloth_size4'] == 'XL'): ?>
				          				<span onclick="checkSizeChoosen($(this))" id="" value="XL" >XL</span>
				          	<?php else: ?>
				          				<span id="clothSizeForBeingFalse" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available">XL</span>
				          	<?php endif; ?>		          		
		          	</div>
			        </div>
			        <br/>
			        <div class="">
			        <?php if (isset($row['price_discount']) && $row['price_discount'] != 0.00): ?>
				        	<h3 id="priceForNowProdView">&#8369; <?= $row['price_discount']; ?></h3>
		          			<h4 id="priceDiscountProdView">&#8369; <?= $row['prod_price']; ?></h4> &nbsp; 
			          		<h4 id="priceOffProdView">-<?= $row['price_off']; ?> Off</h4>
		          	<?php else: ?>
		          			<h3 id="priceForNowProdView">&#8369; <?= $row['prod_price']; ?></h3>
		          	<?php endif; ?>
			        </div>
			        <br/><br/>
			        <div class="" id="checkoutButton">
			        	<a href="/blackbox/shop/shipping/<?= $row['prod_id']; ?>" id="addToCartBtnBUYNOW" class="btn btn-md btn-success bg-warning">
	          				<span class="glyphicon glyphicon-shopping-cart"></span>
	          				PROCEED TO CHECKOUT
	          			</a>
			        </div>

				</div>
			</div><!-- end of row -->
			<br/>
			<div class="row" id="cartProdSpecRow">
				<div class="col-sm-5" id="cartDetSpecMainRow">
					<div class="" id="cartdetailsProductView">
						<h4>Product Details</h4>
						<div id="detailsProductViewOrig">
							<p><?= $row['prod_details']; ?></p>
						</div>
					</div>
					<br/>
					<div class="" id="cartSpecProductView">
						<h4>Product Specification</h4>
						<div id="detailsProductViewOrig">
							<ul>
								<?php if (isset($row['prod_spec0']) && $row['prod_spec0'] != " "):
											for ($i=0; $i < 10; $i++) { 
											 	if ($row["prod_spec$i"] != " "): ?>
											 		<li><?= $row["prod_spec$i"] ?></li>
										<?php 	endif;
											 } /*end of forloop*/ ?>
											
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-7 bg-success" id="myShoppingCart">
					<div class="row bg-primary" id="cartHeaderMyShoopingCart">
						<h4 class="panel-title">My Shopping Cart</h4>
						<div class="pull-right" id="added1NewItem">
							<em>Added <span>1</span> new item</em>
						</div>
						<div class="pull-right col-sm-4" id="cartBadgeAndIcon">
							<span id="cartLogoShoppingCart" class="glyphicon glyphicon-shopping-cart"></span>
							<span id="cartBadge" class="badge">1</span>
						</div>
					</div>
					<div class="row" id="cartMyCartBody">
						<div class="col-sm-12">
							<h4><?= $row['prod_name']; ?></h4>
						</div>
						<div class="col-sm-5 col-sm-offset-1" id="cartTable">
							<img id="modalImage" class="img-responsive img-thumbnail" src="<?php echo base_url(); ?>images/products/<?= $row['image0']; ?>">
						</div>
						<div class="col-sm-6">
							<a class="pull-right clearfix" href=""><span class="glyphicon glyphicon-pencil"></span> Write a review</a><br/>
							<a class="pull-right clearfix" href="">
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							<span class="glyphicon glyphicon-star"></span>
							Rate this product
							</a><br/>
							<?php if (isset($row['price_discount']) && $row['price_discount'] != 0.00): $grand = 'discount';  ?>
										<h4 id="priceForNowProdView"><span>UNIT PRICE:</span> &#8369; <?= $row['price_discount']; ?></h4>
										<h4 id="priceForNowProdView"><span>QUANTITY:</span> 1</h4>
										<h4 id="priceForNowProdView"><span>SUBTOTAL:</span> &#8369; <?= $row['price_discount']; ?></h4>
							<?php else: $grand = 'price'; ?>
										<h4 id="priceForNowProdView"><span>UNIT PRICE:</span> &#8369; <?= $row['prod_price']; ?></h4>
										<h4 id="priceForNowProdView"><span>QUANTITY:</span> 1</h4>
										<h4 id="priceForNowProdView"><span>SUBTOTAL:</span> &#8369; <?= $row['prod_price']; ?></h4>
							<?php endif; ?>							
							
							
						</div>
						<div class="col-sm-12 pull-right">
							<?php if ($grand == 'discount') { ?>
									<h4 class="pull-right" id="priceForNowProdView"><span>GRAND TOTAL:</span> &#8369; <?= $row['price_discount']; ?></h4>
							<?php }else{ ?>
									<h4 class="pull-right" id="priceForNowProdView"><span>GRAND TOTAL:</span> &#8369; <?= $row['prod_price']; ?></h4>
							<?php } ?>
						</div>
					</div><!-- end of row -->
		    	</div><!-- end of col -->
			</div><!-- end of row -->
			<div class="">
				<div class="panel panel-default">
					<div class="panel-header" id="cartReLATEDhEADER">
						<h3 class="panel-title">Related Products</h3>
					</div>
					<div class="panel-body" id="cartRelatedPanelBody">
						<div class="row" id="cartRelatedMainRow">
							<div class="col-sm-6 col-md-3" id="cartRelatedProdMainDiv">
							    <div class="thumbnail bg-info" id="cartRelatedThumb" onmouseenter="showBuyBtn($(this))" onmouseleave="hideBuyBtn($(this))">

							      	<span id="cartRelatedQuickView"></span>
							      	<img src="<?php echo base_url(); ?>images/products/gallery-4.jpg" class="img-responsive">
							      	<div class="col-sm-12 col-xs-12" id="cartRelatedBUYNOW">
							      		<a href="" class="btn btn-block">
							      			<span class="glyphicon glyphicon-shopping-cart"></span>
							      			BUY NOW
							      		</a>
							      	</div>
							   
							      <div class="caption" id="cartRelatedCaption">
							       <h4>Mettalica</h4>
							       	<p id="cartRelatedProdPrice">&#8369; 555.00</p>&nbsp; &nbsp; &nbsp; 
							        <p class="" id="cartRelatedProdPriceDiscount">&#8369; 955.00</p>
							        <p class="" id="cartRelatedProdPriceOff">-55%</p>
							      </div>
							    </div>
							</div>
							<div class="col-sm-6 col-md-3" id="cartRelatedProdMainDiv">
							    <div class="thumbnail bg-info" id="cartRelatedThumb" onmouseenter="showBuyBtn($(this))" onmouseleave="hideBuyBtn($(this))">

							      	<span id="cartRelatedQuickView"></span>
							      	<img src="<?php echo base_url(); ?>images/products/gallery-8.jpg" class="img-responsive">
							      	<div class="col-sm-12 col-xs-12" id="cartRelatedBUYNOW">
							      		<a href="" class="btn btn-block">
							      			<span class="glyphicon glyphicon-shopping-cart"></span>
							      			BUY NOW
							      		</a>
							      	</div>
							   
							      <div class="caption" id="cartRelatedCaption">
							       <h4>Mettalica</h4>
							       	<p id="cartRelatedProdPrice">&#8369; 555.00</p>&nbsp; &nbsp; &nbsp; 
							        <p class="" id="cartRelatedProdPriceDiscount">&#8369; 955.00</p>
							        <p class="" id="cartRelatedProdPriceOff">-55%</p>
							      </div>
							    </div>
							</div>
							<div class="col-sm-6 col-md-3" id="cartRelatedProdMainDiv">
							    <div class="thumbnail bg-info" id="cartRelatedThumb" onmouseenter="showBuyBtn($(this))" onmouseleave="hideBuyBtn($(this))">

							      	<span id="cartRelatedQuickView"></span>
							      	<img src="<?php echo base_url(); ?>images/products/gallery-2.jpg" class="img-responsive">
							      	<div class="col-sm-12 col-xs-12" id="cartRelatedBUYNOW">
							      		<a href="" class="btn btn-block">
							      			<span class="glyphicon glyphicon-shopping-cart"></span>
							      			BUY NOW
							      		</a>
							      	</div>
							   
							      <div class="caption" id="cartRelatedCaption">
							       <h4>Mettalica</h4>
							       	<p id="cartRelatedProdPrice">&#8369; 555.00</p>&nbsp; &nbsp; &nbsp; 
							        <p class="" id="cartRelatedProdPriceDiscount">&#8369; 955.00</p>
							        <p class="" id="cartRelatedProdPriceOff">-55%</p>
							      </div>
							    </div>
							</div>
							<div class="col-sm-6 col-md-3" id="cartRelatedProdMainDiv">
							    <div class="thumbnail bg-info" id="cartRelatedThumb" onmouseenter="showBuyBtn($(this))" onmouseleave="hideBuyBtn($(this))">

							      	<span id="cartRelatedQuickView"></span>
							      	<img src="<?php echo base_url(); ?>images/products/gallery-3.jpg" class="img-responsive">
							      	<div class="col-sm-12 col-xs-12" id="cartRelatedBUYNOW">
							      		<a href="" class="btn btn-block">
							      			<span class="glyphicon glyphicon-shopping-cart"></span>
							      			BUY NOW
							      		</a>
							      	</div>
							   
							      <div class="caption" id="cartRelatedCaption">
							       <h4>Mettalica</h4>
							       	<p id="cartRelatedProdPrice">&#8369; 555.00</p>&nbsp; &nbsp; &nbsp; 
							        <p class="" id="cartRelatedProdPriceDiscount">&#8369; 955.00</p>
							        <p class="" id="cartRelatedProdPriceOff">-55%</p>
							      </div>
							    </div>
							</div>
						</div><!-- end of row -->
					</div><!-- end of panel-body -->
				</div><!-- end of panel -->
			</div><!-- end of container -->

			<div class="">
				<div class="panel panel-default">
					<div class="panel-header" id="cartReLATEDhEADER">
						<h3 class="panel-title">Top Sellers</h3>
					</div>
					<div class="panel-body" id="cartRelatedPanelBody">
						<div class="row">
							<div class="col-sm-6 col-md-3" id="cartRelatedProdMainDiv">
							    <div class="thumbnail bg-info" id="cartRelatedThumb" onmouseenter="showTopSellersButton($(this))" onmouseleave="hideTopSellersButton($(this))">

							      	<span id="cartRelatedQuickView"></span>
							      	<img src="<?php echo base_url(); ?>images/products/gallery-9.jpg" class="img-responsive">
							      	<div style="" class="bg-danger col-xs-12" id="cartTopSellersBUYNOW">
							      		<a href="" class="btn btn-block">
							      			<span class="glyphicon glyphicon-shopping-cart"></span>
							      			BUY NOW
							      		</a>
							      	</div>
							   
							      <div class="caption" id="cartTopSellersCaption">
							       <h4>Mettalica</h4>
							       	<p id="cartRelatedProdPrice">&#8369; 555.00</p>&nbsp; &nbsp; &nbsp; 
							        <p class="" id="cartRelatedProdPriceDiscount">&#8369; 955.00</p>
							        <p class="" id="cartRelatedProdPriceOff">-55%</p>
							      </div>
							    </div>
							</div>
							<div class="col-sm-6 col-md-3" id="cartRelatedProdMainDiv">
							    <div class="thumbnail bg-info" id="cartRelatedThumb" onmouseenter="showTopSellersButton($(this))" onmouseleave="hideTopSellersButton($(this))">

							      	<span id="cartRelatedQuickView"></span>
							      	<img src="<?php echo base_url(); ?>images/products/gallery-5.jpg" class="img-responsive">
							      	<div style="" class="bg-danger col-xs-12" id="cartTopSellersBUYNOW">
							      		<a href="" class="btn btn-block">
							      			<span class="glyphicon glyphicon-shopping-cart"></span>
							      			BUY NOW
							      		</a>
							      	</div>
							   
							      <div class="caption" id="cartTopSellersCaption">
							       <h4>Mettalica</h4>
							       	<p id="cartRelatedProdPrice">&#8369; 555.00</p>&nbsp; &nbsp; &nbsp; 
							        <p class="" id="cartRelatedProdPriceDiscount">&#8369; 955.00</p>
							        <p class="" id="cartRelatedProdPriceOff">-55%</p>
							      </div>
							    </div>
							</div>
							<div class="col-sm-6 col-md-3" id="cartRelatedProdMainDiv">
							    <div class="thumbnail bg-info" id="cartRelatedThumb" onmouseenter="showTopSellersButton($(this))" onmouseleave="hideTopSellersButton($(this))">

							      	<span id="cartRelatedQuickView"></span>
							      	<img src="<?php echo base_url(); ?>images/products/gallery-7.jpg" class="img-responsive">
							      	<div style="" class="bg-danger col-xs-12" id="cartTopSellersBUYNOW">
							      		<a href="" class="btn btn-block">
							      			<span class="glyphicon glyphicon-shopping-cart"></span>
							      			BUY NOW
							      		</a>
							      	</div>
							   
							      <div class="caption" id="cartTopSellersCaption">
							       <h4>Mettalica</h4>
							       	<p id="cartRelatedProdPrice">&#8369; 555.00</p>&nbsp; &nbsp; &nbsp; 
							        <p class="" id="cartRelatedProdPriceDiscount">&#8369; 955.00</p>
							        <p class="" id="cartRelatedProdPriceOff">-55%</p>
							      </div>
							    </div>
							</div>
							<div class="col-sm-6 col-md-3" id="cartRelatedProdMainDiv">
							    <div class="thumbnail bg-info" id="cartRelatedThumb" onmouseenter="showTopSellersButton($(this))" onmouseleave="hideTopSellersButton($(this))">

							      	<span id="cartRelatedQuickView"></span>
							      	<img src="<?php echo base_url(); ?>images/products/gallery-10.jpg" class="img-responsive">
							      	<div style="" class="bg-danger col-xs-12" id="cartTopSellersBUYNOW">
							      		<a href="" class="btn btn-block">
							      			<span class="glyphicon glyphicon-shopping-cart"></span>
							      			BUY NOW
							      		</a>
							      	</div>
							   
							      <div class="caption" id="cartTopSellersCaption">
							       <h4>Mettalica</h4>
							       	<p id="cartRelatedProdPrice">&#8369; 555.00</p>&nbsp; &nbsp; &nbsp; 
							        <p class="" id="cartRelatedProdPriceDiscount">&#8369; 955.00</p>
							        <p class="" id="cartRelatedProdPriceOff">-55%</p>
							      </div>
							    </div>
							</div>
							
						</div><!-- end of row -->
					</div><!-- end of panel-body -->
				</div><!-- end of panel -->
			</div><!-- end of container -->

			
			
		</div><!-- end of panel-body -->
	</div><!-- end of panel -->
</div><!-- end of container -->
<?php endforeach; ?>	
<?php endif; ?>

<script>
$(function () {
  $('[data-toggle="popover"]').popover()
})
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
function _(el){
	return document.getElementById(el);
}
var myVar=setInterval(function(){cart()},1000);
function cart(){
	var cart = _('cartBadgeAndIcon');
	$(cart).animate({paddingLeft:'150px'},5000);
	$(cart).fadeOut('fast');
	returnPadding();
};
function returnPadding(){
	var cart = _('cartBadgeAndIcon');
	$(cart).animate({paddingLeft:'0px'},'fast');
	$(cart).fadeIn('slow');
}
function showBuyBtn($scope){
	var buyBttnDiv = $($scope).children('div#cartRelatedBUYNOW');
	var abuyButton = $(buyBttnDiv).children('a');
	$(abuyButton).css({visibility:'visible'});
	$scope.css({boxShadow:'2px -2px 8px #ccc, -2px 2px 8px #ccc'});
	var image = $($scope).children('img');
	$(image).animate({opacity:'0.4',});
	var quickViewSpan = $($scope).children("span#cartRelatedQuickView");
	$(quickViewSpan).css({visibility:'visible'});
	$(quickViewSpan).animate({width:'100px',},'fast');
	$(quickViewSpan).text('QuickView');
}
function hideBuyBtn($scope){
	var buyBttnDiv = $($scope).children('div#cartRelatedBUYNOW');
	var abuyButton = $(buyBttnDiv).children('a');
	$(abuyButton).css({visibility:'hidden'});
	$scope.css({boxShadow:''});
	var image = $($scope).children('img');
	$(image).animate({opacity:'1',});
	var quickViewSpan = $($scope).children("span#cartRelatedQuickView");
	$(quickViewSpan).animate({width:'0px',},'fast');
	$(quickViewSpan).text('');
}
function showTopSellersButton($scope){
	var buyBttnDiv = $($scope).children('div#cartTopSellersBUYNOW');
	var abuyButton = $(buyBttnDiv).children('a');
	$(buyBttnDiv).slideDown('fast');
	$scope.css({boxShadow:'2px -2px 8px #ccc, -2px 2px 8px #ccc'});
	var image = $($scope).children('img');
	$(image).animate({opacity:'0.4',});
	var quickViewSpan = $($scope).children("span#cartRelatedQuickView");
	$(quickViewSpan).css({visibility:'visible'});
	$(quickViewSpan).animate({width:'100px',},'fast');
	$(quickViewSpan).text('QuickView');
}
function hideTopSellersButton($scope){
	var buyBttnDiv = $($scope).children('div#cartTopSellersBUYNOW');
	var abuyButton = $(buyBttnDiv).children('a');
	$(buyBttnDiv).slideUp('fast');
	$scope.css({boxShadow:''});
	var image = $($scope).children('img');
	$(image).animate({opacity:'1',});
	var quickViewSpan = $($scope).children("span#cartRelatedQuickView");
	$(quickViewSpan).animate({width:'0px',},'fast');
	$(quickViewSpan).text('');
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
  	_('colorGuide').innerHTML = 'Selected Color';
  	$('#myResultCanvas').fadeIn('fast');
  	$('#myResultCanvas').css({"backgroundColor":canvasColor,"border":"1px solid #ccc","vertical-align":"middle"});
  }
  function showSizes($scope){
  	var div = $($scope).siblings('div');
  	$(div).slideDown("fast");
  }
  function hideSizes($scope){
  	var div = $($scope).siblings('div');
  	$(div).slideUp("slow");
  }
   function checkSizeChoosen($scope){
  	var choosenSize = $($scope).attr('value');
  	$('#sizeChoosen').css({"padding":"9px","padding-top":"8px","padding-bottom":"10px","color":"white","background-color":"#1de9b6"});
  	_('sizeChoosen').innerHTML = choosenSize;
  	_('sizeClothGuide').innerHTML = 'Selected Size';
  }
</script>