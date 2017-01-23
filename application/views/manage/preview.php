<?php

if (isset($_POST['prod_name'])) {
    $prod_name = $_POST['prod_name'];
    $details = $_POST['details'];
    $category = $_POST['category'];
    $subcategory = $_POST['forSubcategory'];
    $brand = $_POST['brand'];
    $price_f = $_POST['forPrice'];
    $price = number_format($price_f, 2);
    $stocks = $_POST['stocks'];
    $priceOff = $_POST['forPriceOff'];
    $priceDiscount = $_POST['forPriceDiscount'];
    if (!empty($priceDiscount)) {
        $priceDiscount_num = number_format($priceDiscount, 2);
    }
    /////////////////// This is for Product Specification ///////////////////
    $prod_specification = array();
    for ($i=0; $i < 50; $i++) { 
      $spec = "spec$i";
      if (isset($_POST[$spec])) {
        $insert_specification = $_POST[$spec];
        array_push($prod_specification, $insert_specification);
      }
    }
    $specification = count($prod_specification);
    for ($i=$specification; $i < 10; $i++) { 
          $insert_spec = " ";
          array_push($prod_specification, $insert_spec);
    }
    /////////////////// End of Product Specification ///////////////////

    /////////////////// This is for Product Color ///////////////////
    $prod_color = array();
    for ($i=0; $i < 50; $i++) { 
      $color = "color$i";
      if (isset($_POST[$color])) {
            $insert_color = $_POST[$color];
            array_push($prod_color, $insert_color);
      }
    }
    $colorLength = count($prod_color);
    for ($i=$colorLength; $i < 10; $i++) { 
          $colorEmpty = " ";
          array_push($prod_color, $colorEmpty);
    }
    /////////////////// End of Product Color ///////////////////

    /////////////////// This is for Product Clothing Size ///////////////////
    if ($category == 'Clothing') {
        $prod_cloth_size = array();
        for ($i=0; $i < 50; $i++) { 
              $clothSize = "clothName$i";
              if (isset($_POST[$clothSize])) {
                  $insert_clothSize = $_POST[$clothSize];
                  array_push($prod_cloth_size, $insert_clothSize);
              }
        }
        $clothLength = count($prod_cloth_size);
        for ($i=$clothLength; $i < 5; $i++) { 
              $clothEmpty = " ";
              array_push($prod_cloth_size, $clothEmpty);
        }
    }
    /////////////////// End of Product Clothing Category ///////////////////

    /////////////////// This is for Product Shoe Size ///////////////////
    if ($category == 'Shoes') {
        $prod_shoe_size = array();
        for ($i=0; $i < 50; $i++) { 
            $shoeSize = "shoeName$i";
            if (isset($_POST[$shoeSize])) {
                $insert_shoeSize = $_POST[$shoeSize];
                array_push($prod_shoe_size, $insert_shoeSize);
            }
        }
        $shoesLength = count($prod_shoe_size);
        for ($i=$shoesLength; $i < 8; $i++) { 
            $shoesEmpty = " ";
            array_push($prod_shoe_size, $shoesEmpty);
        }
        sort($prod_shoe_size);
    }
/////////////////// End of Product Shoe Category ///////////////////

/////////////////// This is for Product Image ///////////////////   
if (!empty($_POST['mainImage']) && isset($_POST['mainImage'])) {
    $image = array();
    $image1 = $_POST['mainImage'];
    array_push($image, $image1);
}else{
    $image1 = " ";
    array_push($image, $image1);
}
if (!empty($_POST['image2'])) {
    $image2 = $_POST['image2'];
    array_push($image, $image2);
}else{
    $image2 = " ";
    array_push($image, $image2);
}
if (!empty($_POST['image3'])) {
    $image3 = $_POST['image3'];
    array_push($image, $image3);
}else{
    $image3 = " ";
    array_push($image, $image3);
}
if (!empty($_POST['image4'])) {
    $image4 = $_POST['image4'];
    array_push($image, $image4);
}else{
    $image4 = " ";
    array_push($image, $image4);
}
if (!empty($_POST['image5'])) {
    $image5 = $_POST['image5'];
    array_push($image, $image5);
}else{
    $image5 = " ";
    array_push($image, $image5);
}

/////////////////// End of Product Image ///////////////////
if ($category == 'Clothing') {
$save_clothing = array($prod_name, $details,
                      $prod_specification[0], $prod_specification[1], $prod_specification[2], $prod_specification[3], $prod_specification[4],
                      $prod_specification[5],$prod_specification[6],$prod_specification[7],$prod_specification[8],$prod_specification[9],
                      $prod_color[0], $prod_color[1], $prod_color[2], $prod_color[3], $prod_color[4],
                      $prod_color[5], $prod_color[6], $prod_color[7], $prod_color[8], $prod_color[9],
                      $category, $subcategory,
                      $prod_cloth_size[0], $prod_cloth_size[1], $prod_cloth_size[2], $prod_cloth_size[3], $prod_cloth_size[4],
                      $brand, $price, $priceDiscount, $priceOff, $stocks,
                      $image[0], $image[1], $image[2], $image[3], $image[4]);
}
?>

<form id="save" <?php if ($action == 'update'): ?> action="/blackbox/shop/save_update/<?= $id ?>" <?php else: ?> action="/blackbox/shop/save" <?php endif; ?>action="/blackbox/shop/save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="prod_name" value="<?php echo $prod_name; ?>" >
    <input type="hidden" name="details" value="<?php echo $details; ?>" >
    <input type="hidden" name="prod_specification0" value="<?php echo $prod_specification[0]; ?>" >
    <input type="hidden" name="prod_specification1" value="<?php echo $prod_specification[1]; ?>" >
    <input type="hidden" name="prod_specification2" value="<?php echo $prod_specification[2]; ?>" >
    <input type="hidden" name="prod_specification3" value="<?php echo $prod_specification[3]; ?>" >
    <input type="hidden" name="prod_specification4" value="<?php echo $prod_specification[4]; ?>" >
    <input type="hidden" name="prod_specification5" value="<?php echo $prod_specification[5]; ?>" >
    <input type="hidden" name="prod_specification6" value="<?php echo $prod_specification[6]; ?>" >
    <input type="hidden" name="prod_specification7" value="<?php echo $prod_specification[7]; ?>" >
    <input type="hidden" name="prod_specification8" value="<?php echo $prod_specification[8]; ?>" >
    <input type="hidden" name="prod_specification9" value="<?php echo $prod_specification[9]; ?>" >
    <input type="hidden" name="prod_color0" value="<?php echo $prod_color[0]; ?>" >
    <input type="hidden" name="prod_color1" value="<?php echo $prod_color[1]; ?>" >
    <input type="hidden" name="prod_color2" value="<?php echo $prod_color[2]; ?>" >
    <input type="hidden" name="prod_color3" value="<?php echo $prod_color[3]; ?>" >
    <input type="hidden" name="prod_color4" value="<?php echo $prod_color[4]; ?>" >
    <input type="hidden" name="prod_color5" value="<?php echo $prod_color[5]; ?>" >
    <input type="hidden" name="prod_color6" value="<?php echo $prod_color[6]; ?>" >
    <input type="hidden" name="prod_color7" value="<?php echo $prod_color[7]; ?>" >
    <input type="hidden" name="prod_color8" value="<?php echo $prod_color[8]; ?>" >
    <input type="hidden" name="prod_color9" value="<?php echo $prod_color[9]; ?>" >
    <input type="hidden" name="category" value="<?php echo $category; ?>" >
    <input type="hidden" name="subcategory" value="<?php echo $subcategory; ?>" >
    <?php if ($category == 'Clothing'): ?>
    <input type="hidden" name="prod_cloth_size0" value="<?php echo $prod_cloth_size[0]; ?>" >
    <input type="hidden" name="prod_cloth_size1" value="<?php echo $prod_cloth_size[1]; ?>" >
    <input type="hidden" name="prod_cloth_size2" value="<?php echo $prod_cloth_size[2]; ?>" >
    <input type="hidden" name="prod_cloth_size3" value="<?php echo $prod_cloth_size[3]; ?>" >
    <input type="hidden" name="prod_cloth_size4" value="<?php echo $prod_cloth_size[4]; ?>" >
    <?php endif;   
          if ($category == 'Shoes'): ?>
    <input type="hidden" name="prod_shoe_size0" value="<?php echo $prod_shoe_size[0]; ?>" >
    <input type="hidden" name="prod_shoe_size1" value="<?php echo $prod_shoe_size[1]; ?>" >
    <input type="hidden" name="prod_shoe_size2" value="<?php echo $prod_shoe_size[2]; ?>" >
    <input type="hidden" name="prod_shoe_size3" value="<?php echo $prod_shoe_size[3]; ?>" >
    <input type="hidden" name="prod_shoe_size4" value="<?php echo $prod_shoe_size[4]; ?>" >    
    <input type="hidden" name="prod_shoe_size5" value="<?php echo $prod_shoe_size[5]; ?>" >   
    <input type="hidden" name="prod_shoe_size6" value="<?php echo $prod_shoe_size[6]; ?>" >   
    <input type="hidden" name="prod_shoe_size7" value="<?php echo $prod_shoe_size[7]; ?>" >   
    <?php endif; ?>
    <input type="hidden" name="brand" value="<?php echo $brand; ?>" >
    <input type="hidden" name="price" value="<?php echo $price_f; ?>" >
    <input type="hidden" name="priceDiscount" value="<?php echo $priceDiscount; ?>" >
    <input type="hidden" name="priceOff" value="<?php echo $priceOff; ?>" >
    <input type="hidden" name="stocks" value="<?php echo $stocks; ?>" >
    <input type="hidden" name="image0" value="<?php echo $image[0]; ?>" >
    <input type="hidden" name="image1" value="<?php echo $image[1]; ?>" >
    <input type="hidden" name="image2" value="<?php echo $image[2]; ?>" >
    <input type="hidden" name="image3" value="<?php echo $image[3]; ?>" >
    <input type="hidden" name="image4" value="<?php echo $image[4]; ?>" >
    
</form>

<div class="col-sm-7 container-fluid" id="previewContainer">
<div class="panel panel-default" style="padding-bottom: 30px;">
    <div class="panel-heading" id="previewHeader">
        <h4 align="center">Product Preview</h4>
    </div>
    <div class="panel-body" id="previewPanelBody">
    <div class="col-sm-12">
        <h3 id="previewProdName"><?php echo $prod_name; ?></h3>
    </div>
    <?php if ($image2 == " ") { ?>
        <div class="col-sm-8 col-sm-offset-3" id="imageDiv">
            <img id="mainImage" data-toggle="tooltip" data-placement="left" title="Main Product Image" src='<?php echo base_url(); ?><?php echo "images/products/$image1"; ?>' class="img-responsive pull-left" style="margin-right:5px" alt="Drop Main Image Here...">
        </div>
    <?php }else{ ?>
        <div class="col-sm-8 col-sm-offset-2" id="imageDiv">
            <img id="mainImage" src='<?php echo base_url(); ?><?php echo "images/products/$image1"; ?>' data-toggle="tooltip" data-placement="left" title="Main Product Image" class="img-responsive pull-left" style="margin-right:5px" alt="Drop Main Image Here...">
            <?php if ($image2 != " ") { ?>
                <img id="secImage" onmouseover="changeImage($(this))" onmouseleave="changeImage($(this))" data-toggle="tooltip" data-placement="right" title="Left Side View" src='<?php echo base_url(); ?><?php echo "images/products/$image2"; ?>' class="img-responsive pull-left" style="margin-bottom:5px" alt="Image 2">
            <?php } ?>
            <?php if ($image3 != " ") { ?>
            <img id="thirdImage" onmouseover="changeImage($(this))" onmouseleave="changeImage($(this))" data-toggle="tooltip" data-placement="right" title="Right Side View" src='<?php echo base_url(); ?><?php echo "images/products/$image3"; ?>' class="img-responsive pull-left" style="margin-bottom:5px" alt="Image 3">
            <?php } ?>
            <?php if ($image4 != " ") { ?>
            <img id="fourthImage" onmouseover="changeImage($(this))" onmouseleave="changeImage($(this))" data-toggle="tooltip" data-placement="right" title="Top View" src='<?php echo base_url(); ?><?php echo "images/products/$image4"; ?>' class="img-responsive pull-left" style="margin-bottom:5px" alt="Image 4">
            <?php } ?>
            <?php if ($image5 != " ") { ?>
            <img id="fifthImage" onmouseover="changeImage($(this))" onmouseleave="changeImage($(this))" data-toggle="tooltip" data-placement="right" title="Back View" src='<?php echo base_url(); ?><?php echo "images/products/$image5"; ?>' class="img-responsive pull-left" alt="Image 5">
            <?php } ?>
        </div>
    <?php } ?>
    <div class="col-sm-12">
    <div id="stocksAndPrice" class="pull-left">
        <div class="form-group pull-left forPrice" >
            <label>Available Stocks <span class="glyphicon glyphicon-menu-right" style="font-size:11px"></span> </label>
            <span id="stocksPreview"><?php echo $stocks; ?> <span id="stocksSpan">PCS.</span></span>
        </div>
        <?php if (!empty($priceDiscount)) { ?>
        <div class="form-group pull-left forPrice">
            <label>Old Price <span class="glyphicon glyphicon-menu-right" style="font-size:11px"></span> </label>
             <span class="clothSizes" id="priceDisable">&#8369; &nbsp; <?php echo $price; ?></span>
        </div>
        <div class="form-group pull-left forPrice">
            <label>New Price <span class="glyphicon glyphicon-menu-right" style="font-size:11px"></span> </label>
             <span class="clothSizes">&#8369; &nbsp; <?php echo $priceDiscount_num; ?></span>
        </div>
        <div class="form-group pull-left forPrice">
            <label>Discount <span class="glyphicon glyphicon-menu-right" style="font-size:11px"></span> </label>
             <span class="clothSizes" id="priceColorOff"><?php echo $priceOff; ?> %</span>
        </div>
        <?php }else{ ?>
        <div class="form-group pull-left">
            <label>Price <span class="glyphicon glyphicon-menu-right" style="font-size:11px"></span> </label>
             <span class="clothSizes">&#8369; &nbsp; <?php echo $price; ?></span>
        </div>
        <?php } ?>
    </div>
    </div>
    <div class="col-sm-12 col-xs-12">
        <div class="form-group">
            <label>Brand<span class="glyphicon glyphicon-menu-right" style="font-size:11px"></span></label>
            <span class="brndCatSub"><?php echo $brand; ?></span>
            <label>Category<span class="glyphicon glyphicon-menu-right" style="font-size:11px"></span></label>
            <span class="brndCatSub"><?php echo $category; ?></span>
            <label>Sucbcategory<span class="glyphicon glyphicon-menu-right" style="font-size:11px"></span></label>
            <span><?php echo $subcategory; ?></span>
        </div>
    </div>
    <div class="pull-left col-sm-12">
    <?php if (count($prod_color) > 0) { ?>
        <div class="form-group">
            <label class="control-label" id="colorsLabel">Available Colors <span class="glyphicon glyphicon-menu-right" style="font-size:11px"></span></label>
            <?php if ($prod_color[0] != " ") { ?>
                <canvas style="background-color:<?php echo $prod_color[0] ?>" class="previewCanvas"></canvas>
            <?php } ?>
            <?php if ($prod_color[1] != " ") { ?>
                <canvas style="background-color:<?php echo $prod_color[1] ?>" class="previewCanvas"></canvas>
            <?php } ?>
            <?php if ($prod_color[2] != " ") { ?>
                <canvas style="background-color:<?php echo $prod_color[2] ?>" class="previewCanvas"></canvas>
            <?php } ?>
            <?php if ($prod_color[3] != " ") { ?>
                <canvas style="background-color:<?php echo $prod_color[3] ?>" class="previewCanvas"></canvas>
            <?php } ?>
            <?php if ($prod_color[4] != " ") { ?>
                <canvas style="background-color:<?php echo $prod_color[4] ?>" class="previewCanvas"></canvas>
            <?php } ?>
            <?php if ($prod_color[5] != " ") { ?>
                <canvas style="background-color:<?php echo $prod_color[5] ?>" class="previewCanvas"></canvas>
            <?php } ?>
            <?php if ($prod_color[6] != " ") { ?>
                <canvas style="background-color:<?php echo $prod_color[6] ?>" class="previewCanvas"></canvas>
            <?php } ?>
            <?php if ($prod_color[7] != " ") { ?>
                <canvas style="background-color:<?php echo $prod_color[7] ?>" class="previewCanvas"></canvas>
            <?php } ?>
            <?php if ($prod_color[8] != " ") { ?>
                <canvas style="background-color:<?php echo $prod_color[8] ?>" class="previewCanvas"></canvas>
            <?php } ?>
            <?php if ($prod_color[9] != " ") { ?>
                <canvas style="background-color:<?php echo $prod_color[9] ?>" class="previewCanvas"></canvas>
            <?php } ?>
        </div>
    <?php } ?>
            <?php if ($category == 'Clothing') { if (count($prod_cloth_size) > 0) { ?>
            <div class="form-group">
            <label>Available Sizes <span class="glyphicon glyphicon-menu-right" style="font-size:11px"></span> </label>
            <?php if ($prod_cloth_size[0] != " ") { ?>
                         <span class="clothSizes"><?php echo $prod_cloth_size[0]; ?></span>
            <?php } ?>
            <?php if ($prod_cloth_size[1] != " ") { ?>
                         <span class="clothSizes"><?php echo $prod_cloth_size[1]; ?></span>
            <?php } ?>
            <?php if ($prod_cloth_size[2] != " ") { ?>
                         <span class="clothSizes"><?php echo $prod_cloth_size[2]; ?></span>
            <?php } ?>
            <?php if ($prod_cloth_size[3] != " ") { ?>
                         <span class="clothSizes"><?php echo $prod_cloth_size[3]; ?></span>
            <?php } ?>
            <?php if ($prod_cloth_size[4] != " ") { ?>
                         <span class="clothSizes"><?php echo $prod_cloth_size[4]; ?></span>
            <?php } ?>
            </div>
        <?php } } ?>
        <?php if ($category == 'Shoes') { ?>
        <div class="form-group">
            <label>Available Sizes <span class="glyphicon glyphicon-menu-right" style="font-size:11px"></span> </label>
            <?php if ($prod_shoe_size[0] != " ") { ?>
                <span class="clothSizes"><?php echo $prod_shoe_size[0] ?></span>
            <?php } ?>
            <?php if ($prod_shoe_size[1] != " ") { ?>
                <span class="clothSizes"><?php echo $prod_shoe_size[1] ?></span>
            <?php } ?>
            <?php if ($prod_shoe_size[2] != " ") { ?>
                <span class="clothSizes"><?php echo $prod_shoe_size[2] ?></span>
            <?php } ?>
            <?php if ($prod_shoe_size[3] != " ") { ?>
                <span class="clothSizes"><?php echo $prod_shoe_size[3] ?></span>
            <?php } ?>
            <?php if ($prod_shoe_size[4] != " ") { ?>
                <span class="clothSizes"><?php echo $prod_shoe_size[4] ?></span>
            <?php } ?>
            <?php if ($prod_shoe_size[5] != " ") { ?>
                <span class="clothSizes"><?php echo $prod_shoe_size[5] ?></span>
            <?php } ?>
            <?php if ($prod_shoe_size[6] != " ") { ?>
                <span class="clothSizes"><?php echo $prod_shoe_size[6] ?></span>
            <?php } ?>
            <?php if ($prod_shoe_size[7] != " ") { ?>
                <span class="clothSizes"><?php echo $prod_shoe_size[7] ?></span>
            <?php } ?>
            <span id="shoeSizeByInches"> * by inches</span>
        </div>
        <?php } ?>
        
    </div>

    <div class="col-sm-12">
        
        <div class="form-group">
            <div class="col-sm-6 col-xs-12" id="prodDetailsLabel">
                <label>Product Details</label>
                <p><?php echo $details; ?></p>
            </div>
            <?php if (count($prod_specification) > 0) { ?>
            <div class="col-sm-6 col-xs-12">
            <label>Product Specification</label>
                <ul>
                <?php if ($prod_specification[0] != " ") { ?>
                            <li><?php echo $prod_specification[0]; ?></li>
                <?php } ?>
                <?php if ($prod_specification[1] != " ") { ?>
                            <li><?php echo $prod_specification[1]; ?></li>
                <?php } ?>
                <?php if ($prod_specification[2] != " ") { ?>
                            <li><?php echo $prod_specification[2]; ?></li>
                <?php } ?>
                <?php if ($prod_specification[3] != " ") { ?>
                            <li><?php echo $prod_specification[3]; ?></li>
                <?php } ?>
                <?php if ($prod_specification[4] != " ") { ?>
                            <li><?php echo $prod_specification[4]; ?></li>
                <?php } ?>
                <?php if ($prod_specification[5] != " ") { ?>
                            <li><?php echo $prod_specification[5]; ?></li>
                <?php } ?>
                <?php if ($prod_specification[6] != " ") { ?>
                            <li><?php echo $prod_specification[6]; ?></li>
                <?php } ?>
                <?php if ($prod_specification[7] != " ") { ?>
                            <li><?php echo $prod_specification[7]; ?></li>
                <?php } ?>
                <?php if ($prod_specification[8] != " ") { ?>
                            <li><?php echo $prod_specification[8]; ?></li>
                <?php } ?>
                <?php if ($prod_specification[9] != " ") { ?>
                            <li><?php echo $prod_specification[9]; ?></li>
                <?php } ?>
                </ul>
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="col-sm-12 col-xs-12 col-sm-offset-3">
        <button onclick="save()" data-toggle="modal" data-target="#modal-1" style="margin-right:10px" class="btn btn-success col-sm-3">Save <span class="glyphicon glyphicon-save"></span> </button>
        <button class="btn btn-danger col-sm-3">Cancel <span class="glyphicon glyphicon-remove"></span> </button>
    </div>
    </div>
</div>
</div>

<script>
$('document').ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
function changeImage($scope){
    var mainImage = $("#mainImage").attr("src");
    var subImage = $($scope).attr("src");
    $("#mainImage").attr("src",subImage);
    $($scope).attr("src",mainImage);
}
function save(){
    setTimeout(function(){
        document.getElementById('save').submit();
    },5000);    
    setInterval(function () {
        var extend = document.getElementById('modal_preview_span').innerHTML;
        var setDot = extend[extend.length] = '.';
        document.getElementById('modal_preview_span').innerHTML = extend + setDot;
        if (extend.length >= 9) {
            document.getElementById('modal_preview_span').innerHTML = 'Saving';
            }
        }, 800);
  
}
</script>

<div class="modal fade" id="modal-1" data-backdrop="static">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
<!--         <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Preview</h3>
        </div> -->
        <div class="modal-body" id="modalPreview">
        <div align="center">
          <img src="<?php echo base_url(); ?>images/default_img/loader1.gif" class="img-responsive" >
          <span style="color:red" class="glyphicon glyphicon-save"></span>
          <span id="modal_preview_span">Saving</span>
        </div>
        </div>
<!--         <div class="modal-footer">
          <a href="" class="btn btn-default" data-dismiss="modal">Close</a>
          <a href="" class="btn btn-primary">Save
          </a>
        </div> -->
      </div>
    </div>
  </div>




<?php
/*  
if ($category == 'Clothing') {

  global $pdo;
  $sql= $pdo->prepare("INSERT INTO products SET prod_name = ?,
                                                prod_details = ?,
                                                prod_spec0 = ?,
                                                prod_spec1 = ?,
                                                prod_spec2 = ?,
                                                prod_spec3 = ?,
                                                prod_spec4 = ?,
                                                prod_spec5 = ?,
                                                prod_spec6 = ?,
                                                prod_spec7 = ?,
                                                prod_spec8 = ?,
                                                prod_spec9 = ?,
                                                prod_color0 = ?,
                                                prod_color1 = ?,
                                                prod_color2 = ?,
                                                prod_color3 = ?,
                                                prod_color4 = ?,
                                                prod_color5 = ?,
                                                prod_color6 = ?,
                                                prod_color7 = ?,
                                                prod_color8 = ?,
                                                prod_color9 = ?,
                                                prod_category = ?,
                                                prod_subcategory = ?,
                                                cloth_size0 = ?,
                                                cloth_size1 = ?,
                                                cloth_size2 = ?,
                                                cloth_size3 = ?,
                                                cloth_size4 = ?,
                                                prod_brand = ?,
                                                prod_price = ?,
                                                price_discount = ?,
                                                price_off = ?,
                                                prod_stocks = ?,
                                                image0 = ?,
                                                image1 = ?,
                                                image2 = ?,
                                                image3 = ?,
                                                image4 = ? ");
    $sql->execute(array($prod_name, $details,
                      $prod_specification[0], $prod_specification[1], $prod_specification[2], $prod_specification[3], $prod_specification[4],
                      $prod_specification[5],$prod_specification[6],$prod_specification[7],$prod_specification[8],$prod_specification[9],
                      $prod_color[0], $prod_color[1], $prod_color[2], $prod_color[3], $prod_color[4],
                      $prod_color[5], $prod_color[6], $prod_color[7], $prod_color[8], $prod_color[9],
                      $category, $subcategory,
                      $prod_cloth_size[0], $prod_cloth_size[1], $prod_cloth_size[2], $prod_cloth_size[3], $prod_cloth_size[4],
                      $brand, $price, $priceDiscount, $priceOff, $stocks,
                      $image[0], $image[1], $image[2], $image[3], $image[4]));
}
else if ($category == 'Shoes') {
    global $pdo;
  $sql= $pdo->prepare("INSERT INTO products SET prod_name = ?,
                                                prod_details = ?,
                                                prod_spec0 = ?,
                                                prod_spec1 = ?,
                                                prod_spec2 = ?,
                                                prod_spec3 = ?,
                                                prod_spec4 = ?,
                                                prod_spec5 = ?,
                                                prod_spec6 = ?,
                                                prod_spec7 = ?,
                                                prod_spec8 = ?,
                                                prod_spec9 = ?,
                                                prod_color0 = ?,
                                                prod_color1 = ?,
                                                prod_color2 = ?,
                                                prod_color3 = ?,
                                                prod_color4 = ?,
                                                prod_color5 = ?,
                                                prod_color6 = ?,
                                                prod_color7 = ?,
                                                prod_color8 = ?,
                                                prod_color9 = ?,
                                                prod_category = ?,
                                                prod_subcategory = ?,
                                                shoe_size0 = ?,
                                                shoe_size1 = ?,
                                                shoe_size2 = ?,
                                                shoe_size3 = ?,
                                                shoe_size4 = ?,
                                                shoe_size5 = ?,
                                                shoe_size6 = ?,
                                                shoe_size7 = ?,
                                                prod_brand = ?,
                                                prod_price = ?,
                                                price_discount = ?,
                                                price_off = ?,
                                                prod_stocks = ?,
                                                image0 = ?,
                                                image1 = ?,
                                                image2 = ?,
                                                image3 = ?,
                                                image4 = ? ");
    $sql->execute(array($prod_name, $details,
                      $prod_specification[0], $prod_specification[1], $prod_specification[2], $prod_specification[3], $prod_specification[4],
                      $prod_specification[5],$prod_specification[6],$prod_specification[7],$prod_specification[8],$prod_specification[9],
                      $prod_color[0], $prod_color[1], $prod_color[2], $prod_color[3], $prod_color[4],
                      $prod_color[5], $prod_color[6], $prod_color[7], $prod_color[8], $prod_color[9],
                      $category, $subcategory,
                      $prod_shoe_size[0], $prod_shoe_size[1], $prod_shoe_size[2], $prod_shoe_size[3], $prod_shoe_size[4],
                      $prod_shoe_size[5], $prod_shoe_size[6], $prod_shoe_size[7],
                      $brand, $price, $priceDiscount, priceOff, $stocks,
                      $image[0], $image[1], $image[2], $image[3], $image[4]));
  }*/
  
}else{
    echo "failed";
}

?>

