<div class="container" id="home_main_container">
	<?php if (isset($ty_signup) && $ty_signup == 'sign_up'): ?>
		<div class="col-sm-4 col-sm-offset-3" id="ty_signup">
			<div class="well" align="center">
				Thank you for signing up on our website!
			</div>
		</div>

		<script type="text/javascript">
			$('#ty_signup').fadeIn('slow');
			setTimeout(function(){
				$('#ty_signup').fadeOut('slow');
			},6000)
		</script>
	<?php endif; ?>

	<?php if (isset($profile_update) && $profile_update == 'profile_update'): ?>
		<div class="col-sm-4 col-sm-offset-3" id="edit_ty">
			<div class="well" align="center">
				Your profile was successfully been updated!
			</div>
		</div>

		<script type="text/javascript">
			$('#edit_ty').fadeIn('slow');
			setTimeout(function(){
				$('#edit_ty').fadeOut('slow');
			},6000)
		</script>
	<?php endif; ?>

	<div class="row">
	<div class="col-sm-1 col-sm-offset-5" id="loaderIndicator">
		<img src="<?php echo base_url(); ?>images/default_img/ring.svg" class="img-responsive" alt="">
	</div>
		<div class="col-sm-7" id="homeMainColumn">
		<div id="homeimageSlide">
			<div id="homeslideshow" class="cycle-slideshow"
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
						 <img src="<?php echo base_url(); ?>images/products/4.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/products/23.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/products/conversee all star.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/products/kwintas.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/products/Shorty's Doh Doh bushings.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/products/COmro shirts.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/products/SAITAMA.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/products/blanko yards.jpg" class="img-responsive" alt="">
						 <img src="<?php echo base_url(); ?>images/products/12.jpg" class="img-responsive" alt="">
			</div>
		</div>
			<div class="bg-success" id="homeBanner">
				<p>Shop with our great stuff's...</p>
			</div>
		</div>
		<div class="col-sm-5 " id="mainDivCategories">
			<div class="row">
					<a href="<?= base_url(); ?>shop/view/0/1/12/Clothing">
						<div class="col-sm-12" id="homeCloth" onclick="clothing()" onmouseenter="zoomIn($(this))" onmouseleave="zoomOut($(this))">
							<span class="col-sm-12 col-xs-12" id="homeclothSpan">clothing</span>
							<img src="<?php echo base_url(); ?>images/products/1.jpg" class="img-responsive" alt="">
						</div>
					</a>

					<div class="col-sm-6" id="shoesMainDiv">
						<a href="<?= base_url(); ?>shop/view/0/1/12/Shoes">
							<div class="col-sm-12" id="homeShoes" onmouseover="zoomIn($(this))" onmouseout="zoomOut($(this))">
								<span class="col-sm-12 col-xs-12" id="homeshoesSpan">shoes</span>
								<img src="<?php echo base_url(); ?>images/products/adidas superstar 2.jpg" class="img-responsive" alt="">
							</div>
						</a>
					</div>
					<div class="col-sm-6 " id="bagsMainDiv">
						<a href="<?= base_url(); ?>shop/view/0/1/12/bags">
							<div class="col-sm-12" id="homeBags" onmouseover="zoomIn($(this))" onmouseout="zoomOut($(this))">
								<span class="col-sm-12 col-xs-12" id="homebagsSpan">bags</span>
								<img src="<?php echo base_url(); ?>images/products/TRFALGAR-DEATH.jpg" class="img-responsive" alt="">
							</div>
						</a>
					</div>


					<div class="col-sm-6" id="sportsMainDiv">
						<a href="<?= base_url(); ?>shop/view/0/1/12/Shoes">
							<div class="col-sm-12" id="homeSports" onmouseover="zoomIn($(this))" onmouseout="zoomOut($(this))">
								<span class="col-sm-12 col-xs-12" id="homeshoesSpan">sports</span>
								<img src="<?php echo base_url(); ?>images/products/bamboo skate boards.jpg" class="img-responsive" alt="">
							</div>
						</a>
					</div>
					<div class="col-sm-6" id="accMainDiv">
						<a href="<?= base_url(); ?>shop/view/0/1/12/Shoes">
							<div class="col-sm-12" id="homeAcc" onmouseover="zoomIn($(this))" onmouseout="zoomOut($(this))">
								<span class="col-sm-12 col-xs-12" id="homeAccSpan">accesories</span>
								<img src="<?php echo base_url(); ?>images/products/bracelets handcrafted.jpg" class="img-responsive" alt="">
							</div>
						</a>
					</div>
			</div>
		</div>
	</div>
</div>

<script>
	var signup_fname_e = "";
	var signup_lname_e = "";
	var signup_mname_e = "";
	var signup_username_e = "";
	var signup_email_e = "";
	var pass_score_e = "";
	var signup_password_e = "";
	var signup_retype_password_e = "";
	var signup_phone_e = "";
	var signup_gender_e = "";

function _(id){
	return document.getElementById(id);
}
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
