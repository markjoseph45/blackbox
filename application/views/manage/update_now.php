<?php
if (isset($result) && !empty($result)):
  foreach ($result as $row): ?>

<input style="display:none;visibility:hidden;" id="base" type="hidden" value="<?= base_url(); ?>">

<div class="col-sm-7 container-fluid">
<div class="panel panel-default">

  <div class="panel-heading" id="addProdHeaderH4">
    <div class="row">
      <div class="col-sm-4 panel-title">
        <h4>Update Products</h4>
      </div>
      <div class="pull-right col-sm-8" id="addHeaderRefresh">
          <button class="btn btn-success btn-xs pull-right" onclick="reload()"> <span class="glyphicon glyphicon-refresh"></span> Refresh</button>
          <a data-toggle="collapse" href="#collapseAddProd" class="pull-right" id="aCollapsePanel">
            <button class="btn btn-primary btn-xs"> <span class="glyphicon glyphicon-sort"></span> 
              Collapse
            </button>
          </a>
      </div>
      </div>
  </div>
  <div id="collapseAddProd" class="collapse in">
  <div class="panel-body" >
    <div id="refresh" class="col-sm-offset-4 col-xs-offset-3 col-sm-3">
      <img src="<?php echo base_url(); ?>images/default_img/reload (4).svg" class="img-responsive center-block" >
      <p align="center" style="font-size:12px;">Reloading...</p>
    </div>
  
  <form action="<?= base_url(); ?>shop/preview/update/<?= $row['prod_id'] ?>" id="addProdSubmit" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
  	<input type="hidden" name="x" value="insertprod">
  	<input type="hidden" id="forProdSub" name="forSubcategory" value="">
  	<input type="hidden" id="forProdPrice" name="forPrice" value="">
    <input type="hidden" id="forPriceDiscount" name="forPriceDiscount" value="">
    <input type="hidden" id="forPriceOff" name="forPriceOff" value="">
    <input type="hidden" id="forMainImage" name="mainImage" value="">
    <input type="hidden" id="image2" name="image2" value="">
    <input type="hidden" id="image3" name="image3" value="">
    <input type="hidden" id="image4" name="image4" value="">
    <input type="hidden" id="image5" name="image5" value="">
    <input type="file" id="file" name="file" style="display:none">
    <input type="file" id="file2" name="file2" style="display:none">
    <input type="file" id="file3" name="file3" style="display:none">
    <input type="file" id="file4" name="file4" style="display:none">
    <input type="file" id="file5" name="file5" style="display:none">
    <span class="pull-right" id="requiredSpan">Required fields are marked with (*)</span>
    <br><br>
  	<div class="form-group">
      <label class="control-label col-sm-3" id="prodImageLabel" for="prod_image">Product Image *</label>
      <div class="col-sm-7">
          <span id="spanErrorImageUpload" class="glyphicon glyphicon-remove"></span>
          <span id="spanSuccessImageUpload" class="glyphicon glyphicon-ok"></span>
      		<img id="dropzone" data-toggle="tooltip" data-placement="left" title="Main Product Image" <?php $image0 = $row['image0']; if (!empty($image0)):?> src="<?php echo base_url(); ?>images/products/<?= $image0 ?>"  <?php else: ?> src="<?php echo base_url(); ?>images/default_img/circleDrop.jpg" <?php endif; ?> class="img-responsive pull-left" alt="Drop Main Image Here...">
          <img id="sec_image" data-container="body" data-toggle="tooltip" data-placement="right" title="Left Side View" onclick="alert(<?= $row['image1']; ?>)" <?php $image1 = $row['image1']; if (!empty($image1) && $image1 != " "):?> src="<?php echo base_url(); ?>images/products/<?= $image1 ?>"  <?php else: ?> src="<?php echo base_url(); ?>images/default_img/circleDrop.jpg" <?php endif; ?> class="img-responsive pull-left" style="margin-bottom:5px" alt="<?= $image1?>">
      		<img id="third_image" data-container="body" data-toggle="tooltip" data-placement="right" title="Right Side View" <?php $image2 = $row['image2']; if (!empty($image2) && $image2 != " "):?> src="<?php echo base_url(); ?>images/products/<?= $image2 ?>"  <?php else: ?> src="<?php echo base_url(); ?>images/default_img/circleDrop.jpg" <?php endif; ?> class="img-responsive pull-left" style="margin-bottom:5px" alt="Image 3">
      		<img id="fourth_image" data-container="body" data-toggle="tooltip" data-placement="right" title="Top View" <?php $image3 = $row['image3']; if (!empty($image3) && $image3 != " "):?> src="<?php echo base_url(); ?>images/products/<?= $image3 ?>"  <?php else: ?> src="<?php echo base_url(); ?>images/default_img/circleDrop.jpg" <?php endif; ?> class="img-responsive pull-left" style="margin-bottom:5px" alt="Image 4">
      		<img id="fifth_image" data-container="body" data-toggle="tooltip" data-placement="right" title="Back View" <?php $image4 = $row['image4']; if (!empty($image4) && $image4 != " "):?> src="<?php echo base_url(); ?>images/products/<?= $image4 ?>"  <?php else: ?> src="<?php echo base_url(); ?>images/default_img/circleDrop.jpg" <?php endif; ?> class="img-responsive pull-left" alt="Image 5">
          <span id="imageError" data-container="body" style="color:#FF5050;"></span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-1">
        <label class="labelAddStyle" for="prod_name">Product Name *</label>
        <input onblur="checkAddProducts()" onkeypress="checkProdName()" value="<?= $row['prod_name']; ?>" type="text" class="form-control" id="prod_name" name="prod_name" placeholder="Please Enter Product Name">
        <span id="prod_nameError" style="color:#FF5050;"></span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-1">
        <label class="labelAddStyle">Product Details *</label>
      	<textarea onblur="checkDetails()" onkeypress="checkProdDetails()" rows="4" id="details" name="details" class="form-control" placeholder="Type Product Details Here..."><?= $row['prod_details']; ?></textarea>
      	<span id="detailsError" style="color:#FF5050;"></span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-1">
        <label class="labelAddStyle" for="prod_specification">Product Specification</label>
        <input onblur="prodSpecification()" onkeyup="checkProdSpecification()" type="text" class="form-control" id="prod_specification" name="prod_specification" placeholder="Please Enter Product Specification">
       	<button id="addSpec" href="no" type="button" onblur="addProdSpecificationMax10()" onclick="addProdSpecification()" class="btn btn-xs btn-success" >
        	Add <span class="glyphicon glyphicon-plus-sign"></span>
    	  </button>
        <span id="prod_specificationError" style="color:#FF5050;"></span>
      </div>
    </div>
    <div class="form-group">
     	<ul class="col-sm-offset-1" style="list-style-type:disc;" id="prodSpecificationLists">
    	</ul>
    </div>
    <div class="form-group">
      <div class="col-sm-6 col-sm-offset-1">
          <label class="labelAddStyle" for="prod_color">Product Color</label>
        	<input onkeyup="checkColor()" onblur="toUpperCaseColor()" type="text" class="form-control" id="prod_color" name="prod_color" placeholder="Available Colors">
        	<button type="button" href="no" id="colorOnClick" onclick="checkProductColor()" onblur="maximumColorAllowed()" class="btn btn-xs btn-success" >
        		Add <span class="glyphicon glyphicon-plus-sign"></span>
    		  </button>
      		<span id="colorError" style="color:#FF5050;"></span>
      </div>
      <div class="col-sm-4" id="addProductColor">
      </div>
    </div>    
    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-1">
      <?php $category = $row['prod_category']; ?>
      <label class="labelAddStyle">Product Category *</label>
      	<select onchange="checkCategory()" class="form-control" id="category" name="category">
      	<option style="display:none;">Select</option>
  			<option <?php if ($category == 'Clothing'): ?> selected="selected" <?php endif; ?> value="Clothing">Clothing</option>
  			<option <?php if ($category == 'Shoes'): ?> selected="selected" <?php endif; ?> value="Shoes">Shoes</option>
  			<option <?php if ($category == 'Bags'): ?> selected="selected" <?php endif; ?> value="Bags">Bags</option>
  			<option <?php if ($category == 'Sports'): ?> selected="selected" <?php endif; ?> value="Sports">Sports & Outdoors</option>
  			<option <?php if ($category == 'Accesories'): ?> selected="selected" <?php endif; ?> value="Accesories">Accesories</option>
		    </select> 
		    <span id="categoryError" style="color:#FF5050;"></span>     
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-1">
      <label class="labelAddStyle">Product Subcategory *</label>
    <?php $subcategory = $row['prod_subcategory']; ?>
    
    <select onchange="prodSubcategory()" id="clothing" class="form-control" name="subcategory" <?php if ($category != 'Clothing'): ?>style="display:none;"<?php endif; ?>>
  			<option style="display:none;">Select</option>
  			<option <?php if ($subcategory == 'Mens Clothing'): ?>selected="selected"<?php endif; ?> value="Mens Clothing">Men's Clothing</option>
  			<option <?php if ($subcategory == 'Womens Clothing'): ?>selected="selected"<?php endif; ?> value="Womens Clothing">Women's Clothing</option>
		</select>
		<select onchange="prodSubcategory()" id="shoes" class="form-control" name="subcategory" <?php if ($category != 'Shoes'): ?>style="display:none;"<?php endif; ?>>
			  <option style="display:none;">Select</option>
  			<option <?php if ($subcategory == 'Mens Shoes'): ?>selected="selected"<?php endif; ?> value="Mens Shoes">Men's Shoes</option>
  			<option <?php if ($subcategory == 'Womens Shoes'): ?>selected="selected"<?php endif; ?> value="Womens Shoes">Women's Shoes</option>
		</select> 
		<select onchange="prodSubcategory()" id="bags" class="form-control" name="subcategory" <?php if ($category != 'Bags'): ?>style="display:none;"<?php endif; ?>>
			<option style="display:none;">Select</option>
  			<option <?php if ($subcategory == 'Backpack'): ?>selected="selected"<?php endif; ?> value="Backpack">Backpack</option>
  			<option <?php if ($subcategory == 'Sling Bag'): ?>selected="selected"<?php endif; ?> value="Sling Bag">Sling Bag</option>
		</select>
		<select onchange="prodSubcategory()" id="sports" class="form-control" name="subcategory" <?php if ($category != 'Sports'): ?>style="display:none;"<?php endif; ?>>
			<option style="display:none;">Select</option>
  			<option <?php if ($subcategory == 'Skateboard'): ?>selected="selected"<?php endif; ?> value="Skateboard">Skateboard</option>
  			<option <?php if ($subcategory == 'Longboards'): ?>selected="selected"<?php endif; ?> value="Longboards">Longboards</option>
		</select>
		<select onchange="prodSubcategory()" id="accesories" class="form-control" name="subcategory" <?php if ($category != 'Accesories'): ?>style="display:none;"<?php endif; ?>>
			<option style="display:none;">Select</option>
  			<option <?php if ($subcategory == 'Anime Merchandise'): ?>selected="selected"<?php endif; ?> value="Anime Merchandise">Anime Merchandise</option>
  			<option <?php if ($subcategory == 'Caps'): ?>selected="selected"<?php endif; ?> value="Caps">Caps</option>
  			<option <?php if ($subcategory == 'Mugs'): ?>selected="selected"<?php endif; ?> value="Mugs">Mugs</option>
  			<option <?php if ($subcategory == 'Wallets'): ?>selected="selected"<?php endif; ?> value="Wallets">Wallets</option>
  			<option <?php if ($subcategory == 'Necklace'): ?>selected="selected"<?php endif; ?> value="Necklace">Necklace</option>
  			<option <?php if ($subcategory == 'Lanyards'): ?>selected="selected"<?php endif; ?> value="Lanyards">Lanyards</option>
		</select>   
		<span id="subcategoryError" style="color:#FF5050;"></span> 
      </div> 
    </div> 
    
    <div class="form-group" id="productSize" <?php if ($category != 'Clothing'): ?> style="display:none" <?php endif; ?>>
      <div class="col-sm-6 col-sm-offset-1">
      <label class="labelAddStyle" for="prod_color">Available Sizes *</label>
      		<div id="sizeClothingDiv" class="checkbox" style="display:none">
      			<span id="clothingSizeError" style="color:#FF5050"></span>
      		</div>
      <div class="col-sm-offset-1">
      <div class="checkbox">
  				<label class="labelAddStyle"><input onclick="checkSize($(this))" type="checkbox" value="XS">Extra Small (XS)</label>
			</div>
			<div class="checkbox">
  				<label class="labelAddStyle"><input onclick="checkSize($(this))" type="checkbox" value="S">Small (S)</label>
			</div>
			<div class="checkbox">
  				<label class="labelAddStyle"><input onclick="checkSize($(this))" type="checkbox" value="M">Medium (M)</label>
			</div>
			<div class="checkbox">
  				<label class="labelAddStyle"><input onclick="checkSize($(this))" type="checkbox" value="L">Large (L)</label>
			</div>
			<div class="checkbox">
  				<label class="labelAddStyle"><input onclick="checkSize($(this))" type="checkbox" value="XL">Extra Large (XL)</label>
			</div>
      </div>
      </div>
    </div>
    
    
    <div class="form-group" id="productSizeForShoes" <?php if ($category != 'Shoes'): ?> style="display:none" <?php endif; ?>>
      <div class="col-sm-6 col-sm-offset-1">
      <label class="labelAddStyle" for="prod_color">Available Sizes *</label>
      	    <div id="sizeShoeDiv" class="checkbox" style="display:none">
      			     <span id="shoeSizeError" style="color:#FF5050"></span>
      		  </div>
      <div class="col-sm-offset-1">
      <div class="checkbox">
  				<label class="labelAddStyle"><input onclick="checkShoeSize($(this))" type="checkbox" value="5">5 inches</label>
			</div>
			<div class="checkbox">
  				<label class="labelAddStyle"><input onclick="checkShoeSize($(this))" type="checkbox" value="6">6 inches</label>
			</div>
			<div class="checkbox">
  				<label class="labelAddStyle"><input onclick="checkShoeSize($(this))" type="checkbox" value="7">7 inches</label>
			</div>
			<div class="checkbox">
  				<label class="labelAddStyle"><input onclick="checkShoeSize($(this))" type="checkbox" value="8">8 inches</label>
			</div>
			<div class="checkbox">
  				<label class="labelAddStyle"><input onclick="checkShoeSize($(this))" type="checkbox" value="9">9 inches</label>
			</div>
			<div class="checkbox">
  				<label class="labelAddStyle"><input onclick="checkShoeSize($(this))" type="checkbox" value="10">10 inches</label>
			</div>
			<div class="checkbox">
  				<label class="labelAddStyle"><input onclick="checkShoeSize($(this))" type="checkbox" value="11">11 inches</label>
			</div>
			<div class="checkbox">
  				<label class="labelAddStyle"><input onclick="checkShoeSize($(this))" type="checkbox" value="12">12 inches</label>
			</div>			
      </div>
      </div>
    </div>
    

    <div class="form-group">
      <div class="col-sm-6 col-sm-offset-1"> 
      <label class="labelAddStyle" for="brand">Brand Name *</label>
        <input onblur="checkBrandName()" onkeypress="checkProdBrandName()" value="<?= $row['prod_brand']; ?>" type="text" class="form-control" id="brand" name="brand" placeholder="Please Enter Brand Name">
      	<span id="brandNameError" style="color:#FF5050;"></span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6 col-sm-offset-1"> 
        <label class="labelAddStyle" for="price">Product Price *</label> 
        <div class="input-group">
        <div class="input-group-addon">&#8369;</div>       
        <input onkeyup="prodPrice()" onblur="prodPriceEmpty()" value="<?= $row['prod_price']; ?>" type="text" class="form-control" id="price" name="price" placeholder="Please Enter Product Price">
        </div>
        <span id="priceError" style="color:#FF5050;"></span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6 col-sm-offset-1"> 
        <label class="labelAddStyle" for="priceDiscount">Discounted Price &nbsp; &nbsp; <em style="font-size:11px;">* For discounted products only</em></label> 
        <div class="input-group">
        <div class="input-group-addon">&#8369;</div>       
        <input onkeyup="checkDiscount()" onblur="discountGreaterThanPrice()" <?php $price_discount = $row['price_discount'];  if (isset($price_discount) && !empty($price_discount)): ?> value="<?= $row['price_discount']; ?>" <?php endif; ?> type="text" class="form-control" id="priceDiscount" name="priceDiscount" placeholder="Discounted Price">
        </div>
        <span id="discountError" style="color:#FF5050;"></span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6 col-sm-offset-1"> 
        <label class="labelAddStyle" for="pricePercentOff">Percent Off &nbsp; &nbsp; <em style="font-size:11px;">* For discounted products only</em></label> 
        <div class="input-group">      
        <input readonly type="text" <?php $price_off = $row['price_off'];  if (isset($price_off) && !empty($price_off)): ?> value="<?= $row['price_off']; ?>" <?php endif; ?> class="form-control" id="pricePercentOff" name="pricePercentOff" placeholder="Percent Off">
        <div class="input-group-addon">%</div> 
        </div>
        <span id="priceError" style="color:#FF5050;"></span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6 col-sm-offset-1">
        <label class="labelAddStyle" for="stocks">Number of Stocks *</label>      
        <input onblur="prodStocks()" onchange="prodStocksNegative()" value="<?= $row['prod_stocks']; ?>" type="number" name="stocks" class="form-control" id="stocks" placeholder="Number of Stocks">
        <span id="stocksError" style="color:#FF5050;"></span>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-3 col-sm-6">
        <button onclick="previewProductData()" type="button" name="prod_submit" class="btn btn-block btn-success col-sm-4">Preview 
        <span class="glyphicon glyphicon-fire" style="color:#193200"></span> </button>
        <button style="display:none;" id="activateModal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-1">Activate Modal</button>
      </div>
    </div>
  </form>
  </div>
</div>
</div>
</div>

<?php  endforeach; endif; ?>

<!--   <div class="modal fade" id="modal-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Preview</h3>
        </div>
        <div class="modal-body">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
          Morbi id nunc non eros fermentum vestibulum ut id felis. 
          Nunc molestie libero eget urna aliquet, vitae laoreet felis ultricies. 
          Fusce sit amet massa malesuada, tincidunt augue vitae, gravida felis.
        </div>
        <div class="modal-footer">
          <a href="" class="btn btn-default" data-dismiss="modal">Close</a>
          <a href="" class="btn btn-primary">Save
          </a>
        </div>
      </div>
    </div>
  </div> -->




