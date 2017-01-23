<div class="col-sm-7">
  <div class="col-sm-12" id="updateSecDiv">
  <div class="row" id="updateH3">
    <h4>Update Products</h4>
  </div>
    <div class="row" id="updateRowImages">
          <a href="<?= base_url(); ?>shop/fashion/0/1/9/Clothing">
            <div class="pull-left" id="updateFashion" onmouseover="zoomIn($(this))" onmouseout="zoomOut($(this))">
              <span id="spanFashion">fashion</span>
              <img src="<?php echo base_url(); ?>images/default_img/5.jpg" class="img-responsive" width="224px">
            </div>
          </a>
          <a href="<?= base_url(); ?>shop/fashion/0/1/9/Clothing">
            <div class="pull-left" id="updateFashion" onmouseover="zoomIn($(this))" onmouseout="zoomOut($(this))">
              <span id="spanFashion">shoes</span>
              <img src="<?php echo base_url(); ?>images/default_img/shoes.jpg" class="img-responsive" width="224px">
            </div>
          </a>
          <a href="<?= base_url(); ?>shop/fashion/0/1/9/Bags">
            <div class="pull-left" id="updateFashionBags" onmouseover="zoomIn($(this))" onmouseout="zoomOut($(this))">
            <span id="update_bags">bags</span>
              <img src="<?php echo base_url(); ?>images/default_img/bags.jpg" class="img-responsive" width="224px">
            </div>
          </a>
    </div><!-- end of row -->
    <div class="row" id="secindUpdateRow">
          <a href="<?= base_url(); ?>shop/fashion/0/1/9/Sports">
            <div class="pull-left" id="updateFashion" onmouseover="zoomIn($(this))" onmouseout="zoomOut($(this))">
              <span id="spanFashion">sports</span>
              <img src="<?php echo base_url(); ?>images/default_img/skate.jpg" class="img-responsive" width="224px">
            </div>
          </a>
          <a href="<?= base_url(); ?>shop/fashion/0/1/9/Accesories">
            <div class="pull-left" id="updateFashion" onmouseover="zoomIn($(this))" onmouseout="zoomOut($(this))">
              <span id="update_accesories">accesories</span>
              <img src="<?php echo base_url(); ?>images/default_img/accesories.jpg" class="img-responsive" width="224px">
            </div>
          </a>
    </div> <!-- end of row -->
    <div class="row" id="updateH5Footer">
      <h5><em>Just click on this product categories, and youre good to go.</em></h5>
    </div>
  </div>
</div>

<script>
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
</script>