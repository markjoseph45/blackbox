<div class="col-sm-7 container-fluid">
<div class="panel panel-default">

  <div class="panel-heading" id="addProdHeaderH4">
    <div class="row">
      <div class="col-sm-4 panel-title">
        <h4>Add Products</h4>
      </div>
      <div class="pull-right col-sm-8" id="addHeaderRefresh">
          <button class="btn btn-success btn-xs pull-right" onclick="reload()"> <span class="glyphicon glyphicon-refresh"></span> Refresh</button>
          <a data-toggle="collapse" href="#collapseAddProd" class="pull-right" id="aCollapsePanel">
            <button class="btn btn-primary btn-xs"> <span class="glyphicon glyphicon-align-justify"></span> 
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

  <input style="display:none;visibility:hidden;" id="base" type="hidden" value="<?= base_url(); ?>">

  <form action="<?= base_url(); ?>shop/preview/add/0" id="addProdSubmit" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
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
      		<img id="dropzone" data-toggle="tooltip" data-placement="left" title="Main Product Image" src="<?php echo base_url(); ?>images/default_img/circleDrop.jpg" class="img-responsive pull-left" alt="Drop Main Image Here...">
          <img id="sec_image" data-container="body" data-toggle="tooltip" data-placement="right" title="Left Side View" src="<?php echo base_url(); ?>images/default_img/circleDrop.jpg" class="img-responsive pull-left" style="margin-bottom:5px" alt="Image 2">
      		<img id="third_image" data-container="body" data-toggle="tooltip" data-placement="right" title="Right Side View" src="<?php echo base_url(); ?>images/default_img/circleDrop.jpg" class="img-responsive pull-left" style="margin-bottom:5px" alt="Image 3">
      		<img id="fourth_image" data-container="body" data-toggle="tooltip" data-placement="right" title="Top View" src="<?php echo base_url(); ?>images/default_img/circleDrop.jpg" class="img-responsive pull-left" style="margin-bottom:5px" alt="Image 4">
      		<img id="fifth_image" data-container="body" data-toggle="tooltip" data-placement="right" title="Back View" src="<?php echo base_url(); ?>images/default_img/circleDrop.jpg" class="img-responsive pull-left" alt="Image 5">
          <span id="imageError" data-container="body" style="color:#FF5050;"></span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-1">
        <label class="labelAddStyle" for="prod_name">Product Name *</label>
        <input onblur="checkAddProducts()" onkeypress="checkProdName()" type="text" class="form-control" id="prod_name" name="prod_name" placeholder="Please Enter Product Name">
        <span id="prod_nameError" style="color:#FF5050;"></span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-1">
        <label class="labelAddStyle">Product Details *</label>
      	<textarea onblur="checkDetails()" onkeypress="checkProdDetails()" rows="4" id="details" name="details" class="form-control" placeholder="Type Product Details Here..."></textarea>
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
      <label class="labelAddStyle">Product Category *</label>
      	<select onchange="checkCategory()" class="form-control" id="category" name="category">
      	<option style="display:none;">Select</option>
  			<option value="Clothing">Clothing</option>
  			<option value="Shoes">Shoes</option>
  			<option value="Bags">Bags</option>
  			<option value="Sports">Sports & Outdoors</option>
  			<option value="Accesories">Accesories</option>
		    </select>
		    <span id="categoryError" style="color:#FF5050;"></span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-1">
      <label class="labelAddStyle">Product Subcategory *</label>
      	<select onclick="firstSubOption()" class="form-control" id="firstSubcategoryOption"><option style="display:none;">Select</option></select>
      	<select onchange="prodSubcategory()" id="clothing" class="form-control" name="subcategory" style="display:none;">
  			<option style="display:none;">Select</option>
  			<option value="Mens Clothing">Men's Clothing</option>
  			<option value="Womens Clothing">Women's Clothing</option>
		</select>
		<select onchange="prodSubcategory()" id="shoes" class="form-control" name="subcategory" style="display:none">
			<option style="display:none;">Select</option>
  			<option value="Mens Shoes">Men's Shoes</option>
  			<option value="Womens Shoes">Women's Shoes</option>
		</select>
		<select onchange="prodSubcategory()" id="bags" class="form-control" name="subcategory" style="display:none">
			<option style="display:none;">Select</option>
  			<option value="Backpack">Backpack</option>
  			<option value="Sling Bag">Sling Bag</option>
		</select>
		<select onchange="prodSubcategory()" id="sports" class="form-control" name="subcategory" style="display:none">
			<option style="display:none;">Select</option>
  			<option value="Skateboard">Skateboard</option>
  			<option value="Longboards">Longboards</option>
		</select>
		<select onchange="prodSubcategory()" id="accesories" class="form-control" name="subcategory" style="display:none">
			<option style="display:none;">Select</option>
  			<option value="Anime Merchandise">Anime Merchandise</option>
  			<option value="Caps">Caps</option>
  			<option value="Mugs">Mugs</option>
  			<option value="Wallets">Wallets</option>
  			<option value="Necklace">Necklace</option>
  			<option value="Lanyards">Lanyards</option>
		</select>
		<span id="subcategoryError" style="color:#FF5050;"></span>
      </div>
    </div>
    <div class="form-group" id="productSize" style="display:none">
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

    <div class="form-group" id="productSizeForShoes" style="display:none">
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
        <input onblur="checkBrandName()" onkeypress="checkProdBrandName()" type="text" class="form-control" id="brand" name="brand" placeholder="Please Enter Brand Name">
      	<span id="brandNameError" style="color:#FF5050;"></span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6 col-sm-offset-1">
        <label class="labelAddStyle" for="price">Product Price *</label>
        <div class="input-group">
        <div class="input-group-addon">&#8369;</div>
        <input onkeyup="prodPrice()" onblur="prodPriceEmpty()" type="text" class="form-control" id="price" name="price" placeholder="Please Enter Product Price">
        </div>
        <span id="priceError" style="color:#FF5050;"></span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6 col-sm-offset-1">
        <label class="labelAddStyle" for="priceDiscount">Discounted Price &nbsp; &nbsp; <em style="font-size:11px;">* For discounted products only</em></label>
        <div class="input-group">
        <div class="input-group-addon">&#8369;</div>
        <input onkeyup="checkDiscount()" onblur="discountGreaterThanPrice()" ="text" class="form-control" id="priceDiscount" name="priceDiscount" placeholder="Discounted Price">
        </div>
        <span id="discountError" style="color:#FF5050;"></span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6 col-sm-offset-1">
        <label class="labelAddStyle" for="pricePercentOff">Percent Off &nbsp; &nbsp; <em style="font-size:11px;">* For discounted products only</em></label>
        <div class="input-group">
        <input readonly type="text" class="form-control" id="pricePercentOff" name="pricePercentOff" placeholder="Percent Off">
        <div class="input-group-addon">%</div>
        </div>
        <span id="priceError" style="color:#FF5050;"></span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6 col-sm-offset-1">
        <label class="labelAddStyle" for="stocks">Number of Stocks *</label>
        <input onblur="prodStocks()" onchange="prodStocksNegative()" type="number" name="stocks" class="form-control" id="stocks" placeholder="Number of Stocks">
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
