<input style="display:none;visibility:hidden;" id="base" type="hidden" value="<?= base_url(); ?>">

<div class="col-sm-7 container-fluid">
	<div class="panel panel-default">
		<div class="panel-header" id="fashionHeader">
			<h3 class="panel-title">Delete Fashion</h3>
		</div>
	<div class="panel-body" id="fashionPanelBody">

	<?php if(isset($fashion) && !empty($fashion)) : ?>

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
						<button data-toggle="modal" data-target="#modalDelete" onclick="del($(this))" onkeyup="<?php echo $row['prod_id']; ?>" onchange="<?php echo $row['prod_name']; ?>" src="<?php echo base_url(); ?>images/products/<?php echo $row['image0']; ?>" type="button" class="btn btn-danger btn-xs pull-right">
							<span class="glyphicon glyphicon-trash"></span> Delete
						</button>
					</div>
				</div>
			</div>
		<?php if ($x == $counter || $setRow == true): ?>
			</div> <!-- end of row -->
		<?php endif; ?>
	<?php $x = $x + 1; endforeach; ?>

<?php else: ?>
	<div class="alert alert-warning" align="center">
		<h5>Sorry! there is no products to display. <i class="fa fa-warning"></i> </h5>
	</div>
<?php endif; ?>

	</div> <!-- end of panel-body -->
	<div class="panel-footer" id="panelFooterPager">
			<?php if ($fashionRow > 0 && !empty($fashionRow)): $countRow = $fashionRow / 9; ?>
		<div class="row" id="pagerRow" align="center">
			<ul class="pagination" id="ulPager">
			    <li id="previousPager" <?php if ($activePage == 1 || $activePage == 0): ?> class="disabled" <?php endif; ?>>
			      <a <?php if ($activePage != 1 && $activePage != 0): ?> onclick="previous($(this))" <?php endif; ?> data-cat="<?= $category; ?>" id="<?php echo $activePage; ?>" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <?php $offset = 0; for ($i=0; $i < $countRow; $i++) { $x = $i + 1; ?>
			    <li id="pageNum">
			    	<a <?php if ($x == $activePage): ?> style="background-color:#f44336;color:white" <?php endif; ?> id="page<?php echo $x; ?>" class="<?php echo $offset;  ?>" href="<?= base_url(); ?>shop/fashion_del/<?php echo $offset;  ?>/<?php echo $x;  ?>/9/<?= $category; ?> "><?php echo $x;  ?></a>
			    </li>
			    <?php $offset = $offset + 9;  } //end of for_loop ?>
				<li id="nextPager" <?php if ($activePage == $x || $activePage == 0): ?> class="disabled" <?php endif; ?>>
			      <a <?php if ($activePage != $x && $activePage != 0): ?> onclick="next($(this))" <?php endif; ?> data-cat="<?= $category; ?>" id="<?php echo $activePage; ?>" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			    &nbsp; &nbsp; &nbsp; &nbsp;

			      <a <?php if ($activePage == 0): ?> style="background-color:#f44336;color:white" <?php endif; ?> id="viewAll" class="pull-right" href="<?= base_url(); ?>shop/fashion_del/0/0/0/<?= $category; ?>">
			      	View All <span class="glyphicon glyphicon-fire"></span>
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

  <div class="modal fade" id="modalDelete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#ff5252;border-top-right-radius:3px;border-top-left-radius:3px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 id="modalprodName" class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <img id="modalDeleteImage" class="img-responsive img-thumbnail center-block">
        </div>
        <div class="modal-footer"  id="modalDeleteFooter">
          <span class="pull-left"><em style="color:#f44336 ">Do you really want to delete this product?</em></span>
          <a id="deleteNow" href="" data-container="body" data-toggle="tooltip" data-placement="top" title="Warning, this product will be deleted permanently!" class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> Delete</a>
          <a href="" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
        </div>
      </div>
    </div>
  </div>

<script>
var base = $("#base").attr("value");

function del($scope){
	var prod_name = $($scope).attr('onchange');
	var prod_id = $($scope).attr('onkeyup');
	var image = $($scope).attr('src');
	var deleteNow = document.getElementById('deleteNow');
	var deleteProdImage = document.getElementById('modalDeleteImage');
	document.getElementById('modalprodName').innerHTML = prod_name;
	deleteProdImage.src = image;
	deleteNow.href = base+'shop/delete_now/'+prod_id+'/'+prod_name;
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
function previous($scope){
	var pagerId = $($scope).attr('id');
	var cat = $($scope).attr('data-cat');
	var id = '#page'+pagerId;
	var off = $(id).attr('class');
	var offset = off - 9;
	var x = pagerId - 1;
	var href = base+'shop/fashion_del/'+offset+'/'+x+'/9/'+cat;
	$($scope).attr('href',href);
}
function next($scope){
	var pagerId = $($scope).attr('id');
	var cat = $($scope).attr('data-cat');
	var id = '#page'+pagerId;
	var off = $(id).attr('class');
	var offset = parseInt(off) + 9;
	var x = parseInt(pagerId) + 1;
	var href = base+'shop/fashion_del/'+offset+'/'+x+'/9/'+cat;
	$($scope).attr('href',href);

}
$('document').ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
