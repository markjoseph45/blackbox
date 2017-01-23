<?php
	if (!isset($_SESSION['admin'])) :
		redirect('/');
	endif;
?>

<div class="col-sm-7">
	<div class="panel panel-default">
		<div class="panel-header" id="adminHomeHeader">
			<h3 class="panel-title" style="color: #9e9e9e;letter-spacing: 1px"><em>Shop with our great stuffs!</em></h3>
		</div>
		<div class="panel-body">
		<div id="message">
			<?php echo $this->session->flashdata('message'); ?>
		</div>
				<div id="slideshow" class="cycle-slideshow"
						data-cycle-fx = "fade"
						data-cycle-speed = "600"
						data-cycle-timeout = "3000"
						data-cycle-pager = "#pager"
						data-cycle-pager-template ="<a href='#'><img src='{{src}}' height=60px width=100px/>"
						data-cycle-next = "#next"
						data-cycle-prev = "#prev"
						data-cycle-manual-fx = "scrollHorz"
						data-cycle-manual-speed = "400"
						data-cycle-pager-fx = "fade">
						 <img src="<?php echo base_url(); ?>images/default_img/blckbx.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/default_img/21.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/default_img/4.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/default_img/9.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/default_img/skate.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/default_img/shoes.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/default_img/17.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/default_img/bags.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/default_img/12.jpg" class="img-responsive" alt="">
				</div>
		</div>
			<div class="panel-footer">
				<h5><em style="color:gray">Blackbox Tee Shop.</em></h5>
			</div>
	</div>
</div>
<script>
function _(id){
	return document.getElementById(id);
}
(function(){
	setTimeout(function(){
		var msg = _('message');
		$(msg).fadeOut('slow');
	},3000)
}());
</script>
