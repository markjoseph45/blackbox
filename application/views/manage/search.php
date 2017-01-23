<input style="display:none;visibility:hidden;" id="base" type="hidden" value="<?= base_url(); ?>">

<div class="col-sm-7 container-fluid">
	<div class="panel panel-default">
		<div class="panel-header" id="fashionHeader">
			<h3 class="panel-title">Search results for "<em><?= $searchText; ?></em>"</h3>
		</div>
	<div class="panel-body" id="fashionPanelBody">

		<?php if (!empty($fashion)) : ?>

	<div id="message">
			<?php echo $this->session->flashdata('message'); ?>
	</div>
	<?php $x = 1; $counter = 3; foreach ($fashion as $row):
		$price_f =  $row['prod_price'];
		$prod_name = $row['prod_name'];
		if (strlen($prod_name) > 20) {
			$new_name = substr($prod_name, 0, 19);
			$prod_name = $new_name . '<b>....</b>';
		}
		$price = number_format($price_f, 2);

		if ($x == $counter): //x=6 , counter = 6
			$counter = $x + 3; //counter = 9
			$setRow = true;
		else:
			$setRow = false;
		endif;
		if ($x == $counter || $setRow == true): ?>
			<div class="row">
		<?php endif;?>

			<div class="col-sm-12 col-md-4 pull-left" id="fashionForPadding">
				<div class="thumbnail" onmouseenter="appearView($(this))" onmouseleave="disappearView($(this))" id="fashionViewDivImg">
						<span data-toggle="modal" data-target="#modalFashion" onclick="quickViewFast($(this))" onmouseenter="quickOver($(this))" onmouseleave="quickOut($(this))" onchange="<?php echo $row['prod_name']; ?>" class="<?php echo base_url(); ?>images/products/<?php echo $row['image0']; ?>" id="quick_viewUpdate">QUICK VIEW</span>
						<img data-toggle="tooltip" data-placement="top" title="Stocks : <?php echo $row['prod_stocks']; ?>" onmouseleave="backToOrig($(this))" onmouseenter="imageBlur($(this))" src="<?php echo base_url(); ?>images/products/<?php echo $row['image0']; ?>" class="img-responsive img-thumbnail fashionIMG">
					<div class="caption">
						<p><?php echo $prod_name; ?></p>
						<p id="fashionPrice">&#8369; &nbsp; <?php echo $price; ?></p>
						<button data-toggle="modal" data-target="#modalDelete" onclick="view($(this))" onkeyup="<?php echo $row['prod_id']; ?>" onchange="<?php echo $row['prod_name']; ?>" src="<?php echo base_url(); ?>images/products/<?php echo $row['image0']; ?>" type="button" class="btn btn-danger btn-xs pull-right">
							<span class="glyphicon glyphicon-eye-open"></span> View
						</button>
					</div>
				</div>
			</div>
		<?php if ($x == $counter || $setRow == true): ?>
			</div> <!-- end of row -->
		<?php endif; ?>
	<?php $x = $x + 1; endforeach; ?>

	<?php else : ?>
		<div class="alert alert-danger" align="center">
			No search results found for "<em><?= $searchText; ?></em>."
		</div>
	<?php endif; ?>

	</div> <!-- end of panel-body -->
	<div class="panel-footer" id="panelFooterPager">

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

  <div class="modal fade" id="modalDelete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#222;border-top-right-radius:3px;border-top-left-radius:3px;color:gray;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 id="modalprodName" class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <img id="modalDeleteImage" class="img-responsive img-thumbnail center-block">
        </div>
        <div class="modal-footer"  id="modalDeleteFooter">
          <span class="pull-left"><em>Do you want to update or delete this product?</em></span>
          <a id="updateNow" href="" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Update</a>
          <a id="deleteNow" href="" data-container="body" data-toggle="tooltip" data-placement="top" title="Do you really want to delete this product?" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
        </div>
      </div>
    </div>
  </div>

<script>
var base = $("#base").attr("value");

function view($scope){
	var prod_name = $($scope).attr('onchange');
	var prod_id = $($scope).attr('onkeyup');
	var image = $($scope).attr('src');
	var deleteNow = document.getElementById('deleteNow');
	var updateNow = document.getElementById('updateNow');
	var deleteProdImage = document.getElementById('modalDeleteImage');
	document.getElementById('modalprodName').innerHTML = prod_name;
	deleteProdImage.src = image;
	deleteNow.href = base+'shop/delete_now/'+prod_id+'/'+prod_name;
	updateNow.href = base+'shop/update_now/'+prod_id;
}
function appearView($scope){
	var spanAppear = $($scope).children('span');
	$(spanAppear).fadeIn('slow');
	$(spanAppear).css('backgroundColor','rgba(255,255,255,0.5)');
}
function disappearView($scope){
	var spanAppear = $($scope).children('span');
	$(spanAppear).fadeOut('slow');
}
function imageBlur($scope){
	var quick_view = $scope.prev();
	$(quick_view).css('backgroundColor','rgba(255,0,0,0.5)');
  	$($scope).animate({
   		 opacity:'0.4'},20);
}
function backToOrig($scope){
	 $($scope).animate({
   		 opacity:'1'},20);
}
function quickOver($scope){
	$($scope).css('backgroundColor','rgba(255,0,0,1)');
	var img = $scope.next();
	 $(img).animate({
   		 opacity:'0.2'},0);
}
function quickOut($scope){
	$($scope).fadeIn(0);
}
function quickViewFast($scope){
	var thisImg = $($scope).attr("class");
	var prod_Name = $($scope).attr("onchange");
	var imgSrc = document.getElementById('modalImage');
	document.getElementById('modalHeader').innerHTML = prod_Name;
	imgSrc.src = thisImg;
}

$('document').ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
