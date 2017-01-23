<input style="display:none;visibility:hidden;" id="base" type="hidden" value="<?= base_url(); ?>">
<?php
		if (isset($_SESSION['username'])):
			$user = $_SESSION['username'];
			$session_user = $this->user->get_session_user($user);
			if (!empty($session_user)):
				foreach ($session_user as $editProfile): ?>
				<div class="modal fade edit" id="edit_profile">
				    <div class="modal-dialog">
				      <div class="modal-content">

				        <div class="modal-body" id="sign_upModalBody">
				        <div class="container-fluid">
				          <div class="col-sm-10 col-sm-offset-1" id="sign_upModal">
				                  <h4 align="center" class="">UPDATE PROFILE <i class="fa fa-pencil-square-o"></i></h4>
				                  	<svg height="15" width="100%">
										<g fill="none" stroke="#333" stroke-width="10">
											<path stroke-dasharray="5,5" d="M0 2 l600 0" />
										</g>
									</svg>
				                <form action="<?= base_url(); ?>shop/edit_profile" method="post" id="editProfile_form">
									<div class="row" id="sg_up_main_div">
										<div class="col-sm-12 col-xs-12" align="center">
											<label for="">UPLOAD YOUR AVATAR</label>
										</div>
										<div align="center" class="row col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-4" id="sg_up_upload_avatar_e" data-toggle="tooltip" data-placement="left" title="Click to upload avatar">
											<?php if (!empty($editProfile['profile'])): ?>
												<img style="display: inline;" id="sg_avatar_img_e" src="<?php echo base_url(); ?>images/users/<?= $editProfile['profile']; ?>"  class="img-responsive img-thumbnail" alt="">
											<?php else: ?>
												<img id="sg_avatar_img_e" src=""  class="img-responsive img-thumbnail" alt="">
												<i id="sg_avatar_icon_e" class="fa fa-user"></i>
											<?php endif ?>
											<img id="avatar_loader_e" class="img-responsive center-block" src="<?php echo base_url(); ?>images/default_img/default (7).svg">
										</div>
										<div class="col-sm-12 col-xs-12" align="center">
											<span id="sg_avatar_error_e"></span>
										</div>
									</div>
									<input style="visibility:hidden;display:none;" value="<?= $editProfile['profile'] ?>" type="file" name="users_avatar_e" id="users_avatar_e">
				                    <div class="form-group has-success has-feedback">
				                      <label for="first_name">FIRST NAME</label>
				                      <input type="text" name="first_name_e" class="form-control" value="<?= $editProfile['first_name']; ?>" id="first_name_e" placeholder="Please Enter Your First Name">
				                      <span id="fn_ck_e" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
				                      <span id="fn_x_e" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
				                      <span class="signError_e" id="sign_up_fname_error_e"></span>
				                    </div>
				                    <div class="form-group has-success has-feedback">
				                      <label for="last_name">LAST NAME</label>
				                      <input type="text" name="last_name_e" class="form-control" value="<?= $editProfile['last_name']; ?>" id="last_name_e" placeholder="Please Enter Your Last Name">
				                      <span id="ln_ck_e" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
				                      <span id="ln_x_e" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
				                      <span class="signError_e" id="sign_up_lname_error_e"></span>
				                    </div>
				                    <div class="form-group has-success has-feedback">
				                      <label for="middle_name">MIDDLE NAME</label>
				                      <input type="text" name="middle_name_e" class="form-control" value="<?= $editProfile['middle_name']; ?>" id="middle_name_e" placeholder="Please Enter Your Middle Name">
				                      <span id="mn_ck_e" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
				                      <span id="mn_x_e" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
				                      <span class="signError_e" id="sign_up_mname_error_e"></span>
				                    </div>
				                    <div class="form-group has-success has-feedback">
				                      <label for="username">USERNAME</label>
				                      <input type="text" name="username_e" class="form-control" value="<?= $editProfile['username']; ?>" id="username_e" placeholder="Please Enter Your Userame">
				                      <span id="username_ck_e" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
				                      <span id="username_x_e" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
				                      <span class="signError_e" id="sign_up_username_error_e"></span>
				                    </div>
				                    <div class="form-group has-success has-feedback">
				                      <label for="user_email">EMAIL</label>
				                      <input type="email" name="user_email_e" class="form-control" value="<?= $editProfile['email']; ?>" id="user_email_e" placeholder="Please Enter Your Email">
				                      <span id="e_ck_e" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
				                      <span id="e_x_e" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
				                      <span class="signError_e" id="sign_up_email_error_e"></span>
				                    </div>
				                    <div class="form-group">
										<div class="">
											<label for="password">NEW PASSWORD</label> <span class="pull-right" id="sign_up_password_error_e"></span>
										</div>
				                      <div class="input-group" id="signUpEyeOPen_e">
				                          <input onclick="focusPass_e()" onblur="outFocus_e()" type="password" name="password_e" class="form-control" id="password_e" placeholder="Please Enter Your Password">
				                          <span id="eyeSpan_e" class="input-group-addon"><i id="unlockKeyAddon_e" class="fa fa-unlock-alt" aria-hidden="true"></i> </span>
				                      </div>
										<div class="progress" id="progress_indicator_e">
											<div id="color_indicator_e" class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100">

											</div>
										</div>
				                    </div>
				                    <div class="form-group">
				                      <label for="re_type_pass">RE-TYPE NEW PASSWORD</label>
				                      <div class="input-group" id="signUpEyeOPen_e">
				                          <input onclick="focusPassREtype_e()" onblur="outFocusREtype_e()" type="password" name="re_type_pass_e" class="form-control" id="re_type_pass_e" placeholder="Please Re-Type Your Password">
				                          <span id="eyeSpanReType_e" class="input-group-addon"><i id="unlockRETYPEKeyAddon_e" class="fa fa-unlock-alt" aria-hidden="true"></i> </span>
				                      </div>
										<span class="signError_e" id="sign_up_retype_password_error_e"></span>
				                    </div>
				                    <div class="form-group has-feedback">
				                      <label for="phone">PHONE NUMBER</label>
				                      <div class="input-group">
				                      	<span id="sign_upPhoneAddOn_e" class="input-group-addon">+63</span>
					                      <input type="text" name="phone_e" value="<?= $editProfile['phone']; ?>" class="form-control" id="phone_e" placeholder="Please Enter Your Phone Number">
					                      <span id="p_ck_e" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
					                      <span id="p_x_e" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
				                      </div>
				                      <span class="signError_e" id="sign_up_phone_error_e"></span>
				                    </div>
				                    <div class="row">
				                        <input type="hidden" name="gender_e" id="gender_e" value="<?= $editProfile['gender']; ?>">
				                        <div class="radio col-sm-12" id="genderMale">
				                          <label>
				                            <input <?php if ($editProfile['gender'] == 'male'): ?> checked <?php endif; ?> onclick="genderVal_e($(this))" type="radio" name="optionsRadios" id="optionsRadios2" value="male">
				                            MALE
				                          </label>
				                          &nbsp; &nbsp; &nbsp;
				                          <label>
				                            <input <?php if ($editProfile['gender'] == 'female'): ?> checked <?php endif; ?> onclick="genderVal_e($(this))" type="radio" name="optionsRadios" id="optionsRadios2" value="female">
				                            FEMALE
				                          </label>
											<p id="genderErrror_e"></p>
				                        </div>
				                    </div>
				                    <div class="">
				                      <button id="registerNow_e" type="button" class="btn btn-sm pull-right">UPDATE NOW <i class="fa fa-angle-double-right"></i></button>
				                      <button class="btn btn-lg" class="close" data-dismiss="modal" aria-label="Close" id="cancelReg"><i class="fa fa-angle-double-left"></i> CANCEL</button>
				                    </div>


				                </form>
				          </div>
				        </div><!-- end of container -->
				        </div><!-- end of modal-body -->

				      </div><!-- end of modal-content -->
				    </div><!-- end of modal-dialog -->
				  </div><!-- end of modal -->
			<?php
				endforeach;
			endif;
		endif;

?>

<body id="homeBody">
<div class="container-fluid" data-spy="affix" data-offset-top="800" id="storeLogoDiv">
	<div class="row" id="homelogo_menuOnTop">
		<div class="" style="display: inline;">
			<a href="<?= base_url(); ?>shop" class="btn btn-xs" onmouseover="color_menu($(this))" onmouseout="color_off($(this))">
				<span class="glyphicon glyphicon-home this_span"></span>
				Home
			</a>
			<p href="" class="btn btn-xs" onmouseover="color_menu($(this))" onmouseout="color_off($(this))">
				<span class="glyphicon glyphicon-phone this_span"></span>
				Contact Us: <span class="this_span">0906 529 8922</span>
			</p>
			<div style="display: inline;" id="home_opt_cart_view">
				<a href="<?= base_url(); ?>shop/cart_view" class="btn btn-xs" onmouseover="color_menu($(this))" onmouseout="color_off($(this))">
					<span class="glyphicon glyphicon-shopping-cart this_span"></span>
					View Cart
					<?php if(isset($_SESSION['cart_array']) && count($_SESSION['cart_array']) >= 1 && !isset($remitance)) : $num_crt = count($_SESSION['cart_array']) ?>
						<span class="badge" id="cart_badge"><?= $num_crt; ?></span>
					<?php endif; ?>
				</a>
				<div class="col-sm-3 col-xs-9" id="cart_indicator_main">
					<?php
						if (isset($_SESSION['cart_array']) && !isset($remitance)) :
							$count_cart = count($_SESSION['cart_array']);
					?>
					<p style="font-size: 12px;color:#333;border-bottom: 1px solid #e0e0e0">Recently added item(s)</p>
					<?php
								foreach ($_SESSION["cart_array"] as $each_item):
							    	if (isset($each_item['item_id'])):
							    		$item_id = $each_item['item_id'];
							    		$pr_quantity = $each_item['quantity'];
							    		$cart_products = $this->user->get_item($item_id);

										if (isset($cart_products) && !empty($cart_products)):
											foreach ($cart_products as $row):
												$pr_image = $row['image0'];
												$pr_name = $row['prod_name'];
										          if ($row['price_discount'] != 0.00 && !empty($row['price_discount'])):
										            $pr_price = $row['price_discount'];
										          else:
										            $pr_price = $row['prod_price'];
										          endif;
					?>

					<div class="row" id="cart_badge_indicator_sec">
							<div class="col-sm-3" id="badge_img_wrapper">
								<img id="" src="<?php echo base_url(); ?>images/products/<?= $pr_image; ?>" class="img-responsive">
							</div>
							<div class="col-sm-9" id="badge_cart_details">
								<p><?= $pr_name; ?></p>
								<p>&#8369; <?= $pr_price; ?></p>
								<p>QTY: <?= $pr_quantity; ?></p>
							</div>
					</div>

					<?php
								  endforeach;
							    endif;
							  endif;
							endforeach;
						else:
					?>
						<div class="" id="cart_badge_indicator_empty">
							Your shopping cart is currrently empty!
						</div>
					<?php
						endif;
					?>
				</div>
			</div>
		</div>
		<div class="pull-right" style="display: inline;">
			<a id="login_button" class="btn btn-xs" id="login_button" onmouseover="color_menu($(this))" onmouseout="color_off($(this))">
				<span class="glyphicon glyphicon-user this_span"></span>
				Login
			</a>
			<a class="btn btn-xs" data-toggle="modal" data-target="#sign_up" id="sg" onmouseover="color_menu($(this))" onmouseout="color_off($(this))">
				<span class="glyphicon glyphicon-pencil this_span"></span>
				Register
			</a>
		</div>
		<div class="bg-info col-sm-3" id="login_mainContainer">
		<div class="">
			<div id="close_login_icon">
				<i class="fa fa-times"></i>
			</div>
			 <h4 align="center" class="">LOGIN <i class="fa fa-user-circle-o"></i></h4>
                 <svg height="15" width="100%">
					<g fill="none" stroke="#333" stroke-width="10">
						<path stroke-dasharray="5,5" d="M0 2 l600 0" />
					</g>
				</svg>
				<div id="login_error_container" class="alert alert-warning alert-dismissible" role="alert">
				  <button id="loginAlert" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Sorry!</strong>
				  <p id="loginErrorMsg"></p>
				</div>
				<form action="<?= base_url(); ?>shop/login" id="login_form" method="post">
					<div class="form-group has-success has-feedback">
                      <label for="login_username">USERNAME</label>
                      <input type="text" name="login_username" class="form-control" id="login_username" placeholder="Please Enter Your Userame">
                      <span id="user_ck" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                      <span id="user_x" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                      <span style="color: #ff5252;" class="loginerror" id="login_username_error"></span>
                    </div>
                    <div class="form-group">
                      <label for="login_password">PASSWORD</label>
                      <div class="input-group" id="signUpEyeOPen">
                        <input type="password" name="login_password" class="form-control" aria-describedby="sizing-addon3" id="login_password" placeholder="Please enter your password">
                        <span id="loginEyePassViewer" class="input-group-addon">
                        	<i style="font-size: 15px;" id="unlockKeyLoginAddon" class="fa fa-unlock-alt" aria-hidden="true"></i>
                        </span>
                      </div>
						<span style="color: #ff5252;" class="loginerror" id="login_password_error"></span>
                    </div>
                    <button id="loginNow" type="button" class="btn btn-block btn-sm pull-right">LOGIN NOW <i style="font-size:15px;color:#ff9800;" class="fa fa-sign-in"></i></button>
                </form>
		</div>
	</div>
	</div>
	<div class="row" style="padding-left: 15px;padding-right: 15px;">
	<a href="<?= base_url(); ?>shop" style="text-decoration:none;"><h3 id="storeLogo">Blackbox Tee Shop</h3></a>
	<div class="col-sm-6 pull-right" id="searchMainDiv">
		<!-- <div class="navbar-header pull-right" id="menuIconBar">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#homemenus">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	    </div> -->

	    <?php if (isset($_SESSION['username'])):
	    	$user = $_SESSION['username'];
	    	$usersImg_avatar = $this->user->get_users_avatar_for_logo($user);
	    	foreach ($usersImg_avatar as $row_avatar):
	    		$avatar_images = $row_avatar['profile'];
	    	endforeach;

	    ?>
			<div class="pull-right" id="user_menu_options_container">
	        	<span class="pull-right" id="searchAdmin"><?= $_SESSION['username']; ?> <span class="caret"></span></span>
	        	<?php if (!empty($avatar_images)): ?>
					<img id="login_logo_img" src="<?php echo base_url(); ?>images/users/<?= $avatar_images; ?>" class="img-responsive img-circle pull-right" width="30px">
				<?php else: ?>
					<i id="user_default_img" class="fa fa-user-circle-o"></i>
				<?php endif; ?>
				<div class="list-group" id="user_menuMainDiv" data-status="on">
				  <a data-toggle="modal" data-target="#edit_profile" class="list-group-item"><i class="fa fa-pencil"></i> Edit Profile</a>
				  <a class="list-group-item" id="chat_show"><i class="fa fa-commenting"></i> Chat with us</a>
				  <a href="<?= base_url(); ?>shop/orders" class="list-group-item"><i class="fa fa-shopping-bag"></i> View Orders</a>
				  <a class="list-group-item" data-toggle="modal" data-target="#feedback_modal" ><i class="fa fa-feed"></i> Create feedback</a>
				  <a href="<?= base_url(); ?>shop/logout" id="user_logout_button" href="#" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
				</div>
			</div>
		<?php endif; ?>

			<form action="<?= base_url(); ?>shop/search" method="post" id="searchForm">
				<div class="input-group col-sm-7 col-xs-12 pull-right" id="seacrhInputDiv">

					<input onblur="searchBoxLessen()" onclick="searchBoxWiden()" type="text" class="form-control input-sm" name="search" placeholder="Search for..." id="searchInput" required="">
	        		<div id="searchAddon" type="submit" class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>

				</div>
			</form>
	</div>



	<!-- ////////////////// prompt messages ///////////////////// -->

	<!-- prompt for news email -->
	<?php if (isset($msg) && !empty($msg)): ?>
		<div class="col-sm-4 col-sm-offset-4 bg-danger" id="ty_feedback">
			<p align="center"><?= $msg; ?></p>
		</div>
		<script>
			(function(){
        		var ty_feedback = document.getElementById('ty_feedback');
        		$(ty_feedback).fadeIn('slow');
        		setTimeout(function(){
        			$(ty_feedback).fadeOut('slow');
        		},5000);
        	}());
		</script>
	<?php endif; ?>
	<!-- end of prompt for news email -->

	<?php if (isset($user_failed) && !empty($user_failed)): ?>
		<div class="col-sm-4 col-sm-offset-4 bg-danger" id="welcomeMsgNOUserEXIST">
			<p align="center">SORRY, Username or Password is incorrect!</p>
		</div>
		<script>
			(function(){
        		var welcomeMsgNOUserEXIST = document.getElementById('welcomeMsgNOUserEXIST');
        		$(welcomeMsgNOUserEXIST).fadeIn('slow');
        		setTimeout(function(){
        			$(welcomeMsgNOUserEXIST).fadeOut('slow');
        		},5000);
        	}());
		</script>
	<?php endif; ?>

	<!-- welcome msg for user -->
	<?php if (isset($user_login) && !empty($user_login)): ?>
		<div class="col-sm-2" id="welcomeMsgUser">
				<i id="wlcomUserClose" onclick="$('#welcomeMsgUser').fadeOut('slow')" class="fa fa-times"></i>
				<div align="center" class="col-sm-3" id="welcome_user_img_container">
					<?php if (isset($avatar) && !empty($avatar)): ?>
						<img id="welcome_user_img" class="img-responsive" src="<?php echo base_url(); ?>images/users/<?= $avatar; ?>">
					<?php else: ?>
						<i class="fa fa-user-circle-o"></i>
					<?php endif; ?>
				</div>
				<div class="col-sm-9" id="wlcm_user_msg">
					<strong>Welcome!</strong>
					<p><?= $user_login; ?></p>
					<p>Enjoy our website...<i style="color:#ffd600" class="fa fa-smile-o"></i></p>
				</div>
		</div>
		<script>
			(function(){
        		var welcomeMsgUser = document.getElementById('welcomeMsgUser');
        		$(welcomeMsgUser).slideDown(2000);
        		$(welcomeMsgUser).animate({right:'20px'},2000);
        	}());
		</script>
	<?php endif; ?>

	<!-- end of welcome msg for user -->

	<!-- prompt for user feedback -->
	<?php if (isset($user_feedback) && !empty($user_feedback)): ?>
		<div class="col-sm-4 col-sm-offset-4 bg-danger" id="ty_feedback">
			<p align="center">Your feedback was been sent succesfully, Thank You!</p>
		</div>
		<script>
			(function(){
        		var ty_feedback = document.getElementById('ty_feedback');
        		$(ty_feedback).fadeIn('slow');
        		setTimeout(function(){
        			$(ty_feedback).fadeOut('slow');
        		},5000);
        	}());
		</script>
	<?php endif; ?>
	<!-- end of prompt for user feedback -->

	<!-- prompt for news email -->
	<?php if (isset($news_email) && !empty($news_email)): ?>
		<div class="col-sm-4 col-sm-offset-4 bg-danger" id="ty_feedback">
			<p align="center">Your email address was succesfully sent, Thank You!</p>
		</div>
		<script>
			(function(){
        		var ty_feedback = document.getElementById('ty_feedback');
        		$(ty_feedback).fadeIn('slow');
        		setTimeout(function(){
        			$(ty_feedback).fadeOut('slow');
        		},5000);
        	}());
		</script>
	<?php endif; ?>
	<!-- end of prompt for news email -->

	<!-- ////////////////// end of prompt messages ///////////////////// -->

	</div>
	<div class="row" style="margin-top: 15px;" id="my_homemenus_wrapper">
		<nav class="navbar-inverse">
		    <div class="" id="homemenus_button_wrapper">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#my_homemenus_navbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>
		    <div class="col-sm-offset-4 collapse navbar-collapse" id="my_homemenus_navbar">
		      <ul class="nav navbar-nav">
		        <li><a href="<?= base_url(); ?>shop/view/0/1/12/Clothing">CLOTHING</a></li>
		        <li><a href="<?= base_url(); ?>shop/view/0/1/12/Shoes">SHOES</a></li>
		        <li><a href="<?= base_url(); ?>shop/view/0/1/12/Bags">BAGS</a></li>
		        <li><a href="<?= base_url(); ?>shop/view/0/1/12/Sports">SPORTS</a></li>
		        <li><a href="<?= base_url(); ?>shop/view/0/1/12/Accesories">ACCESORIES</a></li>
		      </ul>
		    </div>
		</nav>
	</div>

</div>
<br/>


  <div class="modal fade" id="sign_up">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body" id="sign_upModalBody">
        <div class="container-fluid">
          <div class="col-sm-10 col-sm-offset-1" id="sign_upModal">
                  <h4 align="center" class="">REGISTER <i class="fa fa-pencil-square-o"></i></h4>
                  	<svg height="15" width="100%">
							<g fill="none" stroke="#333" stroke-width="10">
									<path stroke-dasharray="5,5" d="M0 2 l600 0" />
							</g>
										</svg>
                <form action="<?= base_url(); ?>shop/sign_up" method="post" id="signup_form">
					<div class="row" id="sg_up_main_div">
						<div class="col-sm-12 col-xs-12" align="center">
							<label for="">UPLOAD YOUR AVATAR</label>
						</div>
						<div align="center" class="row col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-4" id="sg_up_upload_avatar" data-toggle="tooltip" data-placement="left" title="Click to upload avatar">
							<img style="display: none;" id="sg_avatar_img" src=""  class="img-responsive img-thumbnail" alt="Avatar">
							<i id="sg_avatar_icon" class="fa fa-user"></i>
							<img id="avatar_loader" class="img-responsive center-block" src="<?php echo base_url(); ?>images/default_img/default (7).svg">
						</div>
						<div class="col-sm-12 col-xs-12" align="center">
							<span id="sg_avatar_error"></span>
						</div>
					</div>
					<input style="visibility:hidden;display:none;" type="file" name="users_avatar" id="users_avatar">
                    <div class="form-group has-success has-feedback">
                      <label for="first_name">FIRST NAME</label>
                      <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Please Enter Your First Name">
                      <span id="fn_ck" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                      <span id="fn_x" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                      <span class="signError" id="sign_up_fname_error"></span>
                    </div>
                    <div class="form-group has-success has-feedback">
                      <label for="last_name">LAST NAME</label>
                      <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Please Enter Your Last Name">
                      <span id="ln_ck" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                      <span id="ln_x" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                      <span class="signError" id="sign_up_lname_error"></span>
                    </div>
                    <div class="form-group has-success has-feedback">
                      <label for="middle_name">MIDDLE NAME</label>
                      <input type="text" name="middle_name" class="form-control" id="middle_name" placeholder="Please Enter Your Middle Name">
                      <span id="mn_ck" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                      <span id="mn_x" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                      <span class="signError" id="sign_up_mname_error"></span>
                    </div>
                    <div class="form-group has-success has-feedback">
                      <label for="username">USERNAME</label>
                      <input type="text" name="username" class="form-control" id="username" placeholder="Please Enter Your Userame">
                      <span id="username_ck" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                      <span id="username_x" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                      <span class="signError" id="sign_up_username_error"></span>
                    </div>
                    <div class="form-group has-success has-feedback">
                      <label for="user_email">EMAIL</label>
                      <input type="email" name="user_email" class="form-control" id="user_email" placeholder="Please Enter Your Email">
                      <span id="e_ck" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                      <span id="e_x" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                      <span class="signError" id="sign_up_email_error"></span>
                    </div>
                    <div class="form-group">
											<div class="">
												<label for="password">PASSWORD</label> <span class="pull-right" id="sign_up_password_error"></span>
											</div>
                      <div class="input-group" id="signUpEyeOPen">
                          <input onclick="focusPass()" onblur="outFocus()" type="password" name="password" class="form-control" id="password" placeholder="Please Enter Your Password">
                          <span id="eyeSpan" class="input-group-addon"><i id="unlockKeyAddon" class="fa fa-unlock-alt" aria-hidden="true"></i> </span>
                      </div>
											<div class="progress" id="progress_indicator">
											  <div id="color_indicator" class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100">

											  </div>
											</div>
                    </div>
                    <div class="form-group">
                      <label for="re_type_pass">RE-TYPE PASSWORD</label>
                      <div class="input-group" id="signUpEyeOPen">
                          <input onclick="focusPassREtype()" onblur="outFocusREtype()" type="password" name="re_type_pass" class="form-control" id="re_type_pass" placeholder="Please Re-Type Your Password">
                          <span id="eyeSpanReType" class="input-group-addon"><i id="unlockRETYPEKeyAddon" class="fa fa-unlock-alt" aria-hidden="true"></i> </span>
                      </div>
											<span class="signError" id="sign_up_retype_password_error"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="phone">PHONE NUMBER</label>
                      <div class="input-group">
                      	<span id="sign_upPhoneAddOn" class="input-group-addon">+63</span>
	                      <input type="text" name="phone" class="form-control" id="phone" placeholder="Please Enter Your Phone Number">
	                      <span id="p_ck" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
	                      <span id="p_x" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                      </div>
                      <span class="signError" class="signError" id="sign_up_phone_error"></span>
                    </div>
                    <div class="row">
                        <input type="hidden" name="gender" id="gender" value="">
                        <div class="radio col-sm-12" id="genderMale">
                          <label>
                            <input onclick="genderVal($(this))" type="radio" name="optionsRadios" id="optionsRadios2" value="male">
                            MALE
                          </label>
                          &nbsp; &nbsp; &nbsp;
                          <label>
                            <input onclick="genderVal($(this))" type="radio" name="optionsRadios" id="optionsRadios2" value="female">
                            FEMALE
                          </label>
													<p id="genderErrror"></p>
                        </div>
                    </div>
                    <div class="">
                      <button id="registerNow" type="button" class="btn btn-sm pull-right">SIGN UP NOW <i class="fa fa-angle-double-right"></i></button>
                      <button class="btn btn-lg" class="close" data-dismiss="modal" aria-label="Close" id="cancelReg"><i class="fa fa-angle-double-left"></i> CANCEL</button>
                    </div>


                </form>
          </div>
        </div><!-- end of container -->
        </div><!-- end of modal-body -->

      </div><!-- end of modal-content -->
    </div><!-- end of modal-dialog -->
  </div><!-- end of modal -->

<!-- for user feedback -->
<?php
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) :
	$user_sesssion = $_SESSION['username'];
	$user_profile_exist = $this->user->get_user_profile($user_sesssion);
	foreach ($user_profile_exist as $feed_users) :
		$feed_profile = $feed_users['profile'];
		$feed_username = $feed_users['username'];
	endforeach;
endif;

?>

<div class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel" id="feedback_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="container-fluid">
          	<h4 align="center" class="">Create Your Feedback <i class="fa fa-feed" style="color: #ff6d00;"></i></h4>
            <svg height="15" width="100%">
				<g fill="none" stroke="#333" stroke-width="10">
					<path stroke-dasharray="5,5" d="M0 2 l600 0" />
				</g>
			</svg>
			<div>
				<form method="post" action="<?= base_url(); ?>shop/feedback">
				  <div class="form-group">
				    <label for="feedback_title" class="pull-right">Feedback Title</label>
				    <input type="text" class="form-control" name="feedback_title" id="feedback_title" placeholder="Type your feedback title">
				  </div>
				  <div class="">
				  	<div class="row">
				  		<div class="col-sm-12">
				  			<label for="feedback_details" class="pull-right">Feedback Details</label>
				  		</div>
				  		<div class="col-sm-3" align="center">
				  		<?php if (isset($feed_profile) && !empty($feed_profile)) : ?>
				  				<img src="<?php echo base_url(); ?>images/users/<?= $feed_profile; ?>" alt="" class="img-responsive img-thumbnail" id="feedback_user_img">
				  		<?php else: ?>
				  				<i class="fa fa-user-circle-o" id="feedback_icon"></i>
				  		<?php endif?>
				  		</div>
				  		<div class="col-sm-9 form-group" id="textarea_wrapper">
				  			<textarea class="form-control" placeholder="Type your feedback details here..." name="feedback_details" rows="3" id="feedback_details" required></textarea>
				  		</div>
				  	</div>
				  	<input type="hidden" name="user_profile" value="<?= $feed_profile; ?>">
				  	<input type="hidden" name="feed_username" value="<?= $feed_username; ?>">
				  </div>
				  <button id="submit_feedback" type="submit" class="btn btn-default pull-right">Submit Your Feeedback <i class="fa fa-send"></i></button>
				</form>
			</div>
        </div><!-- end of container-fluid -->
      </div><!-- end of modal body -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- end for user feedback -->

<div class="row bg-danger col-sm-3 col-xs-12 col-md-3" id="chat_interface" style="display:none;">
	<div class="" id="chat_img_loader">
		<img class="img-responsive center-block" src="<?php echo base_url(); ?>images/default_img/default (7).svg">
	</div>
	<div class="row" id="chat_label">
		<p>Chat with us</p>
		<img id="chat_comment_icon" src="<?php echo base_url(); ?>images/default_img/comment.svg" class="img-responsive" alt="">
		<span id="chat_noti_msg" class="label label-info"></span>
		<div class="" id="chat_minimizer">
			<i id="chat_minimize" class="fa fa-window-minimize"></i>
			<i id="chat_myCanvas" class="fa fa-window-maximize"></i>
			<i id="chat_close" style="font-size:9px;" class="fa fa-remove"></i>
		</div>
	</div>
	<div class="row" id="chatBodymAINdIV">

	</div>
	<div class="row" id="chat_box_div">
		<div class="form-group">
			<div class="input-group">
		      <input type="text" class="form-control input-sm" id="chat_box_input" placeholder="Enter your message here.">
		      <div id="chatAddon" class="input-group-addon">Send <span class="glyphicon glyphicon-send"></span></div>
		  </div>
			<span id="chat_error" > </span> <i id="chat_error_icon" class="fa fa-warning"></i>
		</div>
	</div>
</div>


<!-- <a href="/blackbox/shop/unsetCart">Unset</a> -->

<script>
	var base = $("#base").attr("value");

	var signup_fname = "";
	var signup_lname = "";
	var signup_mname = "";
	var signup_username = "";
	var signup_email = "";
	var pass_score = "";
	var signup_password = "";
	var signup_retype_password = "";
	var signup_phone = "";
	var signup_gender = "";

	function _(id){
		return document.getElementById(id);
	}
	$(function () {
  	$('[data-toggle="tooltip"]').tooltip()
	})

	function color_menu($scope){
		$($scope).css('color','black');
		var icon = $($scope).children("span.this_span");
		$(icon).css('color','black');
	}
	function color_off($scope){
		$($scope).css('color','');
		var icon = $($scope).children("span.this_span");
		$(icon).css('color','');
	}

	function searchBoxWiden(){
		var expandDiv = document.getElementById('searchMainDiv');
		var seacrhInputDiv = document.getElementById('seacrhInputDiv');
		$(seacrhInputDiv).animate({paddingLeft:'0px'});
	}
	function searchBoxLessen(){
		var seacrhInputDiv = document.getElementById('seacrhInputDiv');
		$(seacrhInputDiv).animate({paddingLeft:'100px'});
	}

	$(document).ready(function(){
		$('#searchAddon').click(function(){
			var searchInput = $("#searchInput").val().length;
			if (searchInput >= 1) {
					$('#searchForm').submit();
			}
		})
	})

	$(document).ready(function(){
	 	$('#user_menu_options_container').click(function(){
	 		var status = $('#user_menuMainDiv').attr('data-status');
	 		if (status == 'on') {
	 			$('#user_menuMainDiv').fadeIn('fast',function(){
	 				$("#user_menuMainDiv").animate({right:'5px'},1000);
	 			});
	 			$('#user_menuMainDiv').attr('data-status','off');
	 		}else{
	 			$('#user_menuMainDiv').fadeOut('slow',function(){
	 				$("#user_menuMainDiv").animate({right:'35px'},1000);
	 			});
	 			$('#user_menuMainDiv').attr('data-status','on');
	 		}
	 	})
	 })
	/*function hoverMenu($scope){
		$($scope).css({backgroundColor:'white'});
		var span = $($scope).children('span');
		$(span).css({borderBottom:'4px solid teal', color:'teal', cursor:'pointer'});
	}
	function hoverOut($scope){
		$($scope).css({backgroundColor:''});
		var span = $($scope).children('span');
		$(span).css({borderBottom:'', color:''});
	}*/
	$(document).ready(function(){
	 	$('#home_opt_cart_view').mouseenter(function(){
	 		$("#cart_indicator_main").fadeIn('fast');
	 	})
	 	$('#home_opt_cart_view').mouseleave(function(){
	 		$("#cart_indicator_main").fadeOut('fast');
	 	})
	 })

	function addon(){
		var eyeopen = document.getElementById('eyeopen');
		eyeopen.style.borderTop = '2px solid #ccc';
		eyeopen.style.borderLeft = 'transparent';
	}
	function hideaddon(){
		var eyeopen = document.getElementById('eyeopen');
		eyeopen.style.border = '';
	}
	function showPassword(){
		var pass = document.getElementById('password');
		$(pass).attr('type','text');
		setTimeout(function(){$(pass).attr('type','password');},1000);
	}
	function encryptPass(){
		var pass = document.getElementById('password');
		$(pass).attr('type','password');
	}
	 function focusPass(){
	    var span = _('eyeSpan');
	    var unlockKeyAddon = _('unlockKeyAddon');
	    span.style.backgroundColor = '#333';
	    span.style.border = '1px solid #333';
	    unlockKeyAddon.style.color = 'white';

	 }
	 function outFocus(){
	    var span = _('eyeSpan');
	    var unlockKeyAddon = _('unlockKeyAddon');
	    span.style.backgroundColor = '';
	    span.style.border = '';
	    unlockKeyAddon.style.color = '';
	 }
	 function focusPassREtype(){unlockRETYPEKeyAddon
	    var span = _('eyeSpanReType');
	    var unlockRETYPEKeyAddon = _('unlockRETYPEKeyAddon');
	    span.style.backgroundColor = '#333';
	    span.style.border = '1px solid #333';
	    unlockRETYPEKeyAddon.style.color = 'white';
	 }
	 function outFocusREtype(){
	    var span = document.getElementById('eyeSpanReType');
	    var unlockRETYPEKeyAddon = _('unlockRETYPEKeyAddon');
	    span.style.backgroundColor = '';
	    span.style.border = '';
	    unlockRETYPEKeyAddon.style.color = '';
	 }
	 function genderVal($scope){
	    var gender = $($scope).attr('value');
	    var genderSet = document.getElementById('gender');
	    $(genderSet).attr('value', gender);
			$('#genderErrror').text('');
			signup_gender = gender;
	 }
	 $(document).ready(function(){
	 	$('#login_button').click(function(){
	 		$('#login_mainContainer').fadeIn('fast',function(){
	 			$("#login_mainContainer").animate({top:'78px'},2000);
	 		});
	 	})
	 })
	 $(document).ready(function(){
	 	$('#close_login_icon').click(function(){
	 		$('#login_mainContainer').slideUp('slow',function(){
	 			$("#login_mainContainer").animate({top:'0px'},2000);
	 		});
	 	})
	 })
	 $(document).ready(function(){
	 	$('#login_username').keyup(function(){
	 		$('#login_username_error').text('');
	 		$('#login_username').css('borderTop','');
	 	})
	 	$('#login_username').blur(function(){
	 		var login_username = $('#login_username').val();
	 		if (login_username.length <= 0) {
	 			$('#login_username_error').text('Please enter your username.');
	 			$('#login_username').css('borderTop','2px solid #ff5252');
	 		}
	 	})
	 	$('#login_password').keyup(function(){
	 		$('#login_password_error').text('');
	 		$('#login_password').css('borderTop','');
	 		$('#loginEyePassViewer').css('borderTop','');
	 	})
	 	$('#login_password').blur(function(){
	 		var login_password = $('#login_password').val();
	 		if (login_password.length <= 0) {
	 			$('#login_password_error').text('Please enter your password.');
	 			$('#login_password').css('borderTop','2px solid #ff5252');
	 			$('#loginEyePassViewer').css('borderTop','2px solid #ff5252');
	 		}
	 	})
	 })
	 $(document).ready(function(){
	 	$('#loginNow').click(function(){
	 		var login_username = $('#login_username').val();
	 		var login_password = $('#login_password').val();
	 		var go = true;
	 		if (login_username.length <= 0) {
	 			$('#login_username_error').text('Please enter your username.');
	 			$('#login_username').css('borderTop','2px solid #ff5252');
	 			var go = false;
	 		}
	 		if (login_password.length <= 0) {
	 			$('#login_password_error').text('Please enter your password.');
	 			$('#login_password').css('borderTop','2px solid #ff5252');
	 			$('#loginEyePassViewer').css('borderTop','2px solid #ff5252');
	 			var go = false;
	 		}
	 		if (go == true){
	 			var login_form = _('login_form');
	 			login_form.submit();
	 		}
	 	})
	 	$('#loginEyePassViewer').click(function(){
			$('#login_password').attr('type','text');
			setTimeout(function(){$('#login_password').attr('type','password');},500);
	 	})
	 })
	 $(document).ready(function(){
	 	$('#first_name').blur(function(){
	 		var fname = $('#first_name').val();
	 		var frname= _('first_name');
	 		var xicon = _('fn_x');
	 		var ckicon= _('fn_ck');
	 		if (fname.length <= 0) {
	 			_('sign_up_fname_error').innerHTML = 'Please enter your first name.'
	 			frname.style.borderTop = "2px solid #f44336";
	 			$(ckicon).fadeOut('fast');
	 			$(xicon).fadeIn('slow');
				signup_fname = "";
	 		}
			else if (fname.length > 0) {
				var trimName = fname.trim();
				var getFirstLetter = trimName.charAt(0);
				var firstLetterToUpperCase = getFirstLetter.toUpperCase();
				var resultprodName = fname.replace(getFirstLetter, firstLetterToUpperCase);
				_('first_name').value = resultprodName.trim();
				var firstName = resultprodName.trim();
				$.ajax({
                    type: "POST",
                    url: base+"shop/signup_chk_name",
                    data: ({
                        name: firstName
                    }),
                    cache: false,
                    success: function(html) {
                    	if ((html) == 'bad') {
                    		_('sign_up_fname_error').innerHTML = 'Only letters and white space are allowed.'
									 			frname.style.borderTop = "2px solid #f44336";
									 			$(ckicon).fadeOut('fast');
									 			$(xicon).fadeIn('slow');
												signup_fname = "";
                    	}
                    	if ((html) == 'good') {
                    		_('sign_up_fname_error').innerHTML = ''
									 			frname.style.borderTop = "2px solid #00c853";
									 			$(xicon).fadeOut('fast');
									 			$(ckicon).fadeIn('slow');
												signup_fname = firstName;
                    	}
                    }
                });
			}
	 	})
	 })
	 $(document).ready(function(){
	 	$('#last_name').blur(function(){
	 		var lname = $('#last_name').val();
	 		var lstname= _('last_name');
	 		var xicon = _('ln_x');
	 		var ckicon= _('ln_ck');
	 		if (lname.length <= 0) {
	 			_('sign_up_lname_error').innerHTML = 'Please enter your last name.'
	 			lstname.style.borderTop = "2px solid #f44336";
	 			$(ckicon).fadeOut('fast');
	 			$(xicon).fadeIn('slow');
				signup_lname = "";
	 		}
			else if (lname.length > 0) {
				var trimName = lname.trim();
				var getFirstLetter = trimName.charAt(0);
				var firstLetterToUpperCase = getFirstLetter.toUpperCase();
				var resultprodName = lname.replace(getFirstLetter, firstLetterToUpperCase);
				_('last_name').value = resultprodName.trim();
				var lastName = resultprodName.trim();
				$.ajax({
                    type: "POST",
                    url: base+"shop/signup_chk_name",
                    data: ({
                        name: lastName
                    }),
                    cache: false,
                    success: function(html) {
                    	if ((html) == 'bad') {
                    		_('sign_up_lname_error').innerHTML = 'Only letters and white space are allowed.'
									 			lstname.style.borderTop = "2px solid #f44336";
									 			$(ckicon).fadeOut('fast');
									 			$(xicon).fadeIn('slow');
												signup_lname = "";
                    	}
                    	if ((html) == 'good') {
                    		_('sign_up_lname_error').innerHTML = ''
									 			lstname.style.borderTop = "2px solid #00c853";
									 			$(xicon).fadeOut('fast');
									 			$(ckicon).fadeIn('slow');
												signup_lname = lastName;
                    	}
                    }
                });
			}
	 	})
	 })

	 $(document).ready(function(){
	 	$('#middle_name').blur(function(){
	 		var mname = $('#middle_name').val();
	 		var midname= _('middle_name');
	 		var xicon = _('mn_x');
	 		var ckicon= _('mn_ck');
	 		if (mname.length <= 0) {
	 			_('sign_up_mname_error').innerHTML = 'Please enter your middle name.'
	 			midname.style.borderTop = "2px solid #f44336";
	 			$(ckicon).fadeOut('fast');
	 			$(xicon).fadeIn('slow');
				signup_mname = "";
	 		}
			else if (mname.length > 0) {
					var trimName = mname.trim();
					var getFirstLetter = trimName.charAt(0);
					var firstLetterToUpperCase = getFirstLetter.toUpperCase();
					var resultprodName = mname.replace(getFirstLetter, firstLetterToUpperCase);
					_('middle_name').value = resultprodName.trim();
					var midlleName = resultprodName.trim();
						$.ajax({
		    				type: "POST",
		                    url: base+"shop/signup_chk_name",
		                    data: ({
		                        name: midlleName
		                    }),
		                    cache: false,
		                    success: function(html) {
		                      if ((html) == 'bad') {
		                        _('sign_up_mname_error').innerHTML = 'Only letters and white space are allowed.'
							              midname.style.borderTop = "2px solid #f44336";
							              $(ckicon).fadeOut('fast');
							              $(xicon).fadeIn('slow');
														signup_mname = "";
		                      }
		                      if ((html) == 'good') {
		                        _('sign_up_mname_error').innerHTML = ''
							              midname.style.borderTop = "2px solid #00c853";
							              $(xicon).fadeOut('fast');
							              $(ckicon).fadeIn('slow');
														signup_mname = midlleName;
		                      }
		                    }
		                });
			}
	 	})
	 })

	 $(document).ready(function(){
	 	$('#username').blur(function(){
	 		var username = $('#username').val();
	 		var user_style = _('username');
	 		var xicon = _('username_x');
	 		var ckicon= _('username_ck');
	 		if (username.length <= 0) {
	 			_('sign_up_username_error').innerHTML = 'Please enter your username.'
	 			user_style.style.borderTop = "2px solid #f44336";
	 			$(ckicon).fadeOut('fast');
	 			$(xicon).fadeIn('slow');
				signup_username = "";
	 		}
			else if (username.length > 0) {
				var user_name = username.trim();
				_('username').value = username.trim();
				$.ajax({
                    type: "POST",
                    url: base+"shop/username_signup_chk",
                    data: ({
                        username: user_name
                    }),
                    cache: false,
                    success: function(html) {
                    	if ((html) == 'bad') {
                    		_('sign_up_username_error').innerHTML = 'Sorry! this username is already in use, please choose another.'
									 			user_style.style.borderTop = "2px solid #f44336";
									 			$(ckicon).fadeOut('fast');
									 			$(xicon).fadeIn('slow');
												signup_username = "";
                    	}
                    	if ((html) == 'good') {
                    		_('sign_up_username_error').innerHTML = ''
									 			user_style.style.borderTop = "2px solid #00c853";
									 			$(xicon).fadeOut('fast');
									 			$(ckicon).fadeIn('slow');
												signup_username = user_name;
                    	}
                    }
                });
			}
	 	})
	 })

	 $(document).ready(function(){
	 	$('#user_email').blur(function(){
	 		var email = $('#user_email').val();
	 		var user_email = _('user_email');
	 		var xicon = _('e_x');
	 		var ckicon= _('e_ck');
	 		if (email.length == "") {
	 			_('sign_up_email_error').innerHTML = 'Please enter your email address.'
	 			user_email.style.borderTop = "2px solid #f44336";
	 			$(ckicon).fadeOut('fast');
	 			$(xicon).fadeIn('slow');
				signup_email = "";
	 		}
			else if (email.length > 0) {
					var userEmail = email.trim();
					_('user_email').value = email.trim();
						$.ajax({
		    				type: "POST",
		                    url: base+"shop/signup_chk_email",
		                    data: ({
		                        user_email: userEmail
		                    }),
		                    cache: false,
		                    success: function(html) {
		                      if ((html) == 'bad') {
		                        _('sign_up_email_error').innerHTML = 'Invalid email format.'
							              user_email.style.borderTop = "2px solid #f44336";
							              $(ckicon).fadeOut('fast');
							              $(xicon).fadeIn('slow');
														signup_email = "";
		                      }
		                      if ((html) == 'good') {
		                        _('sign_up_email_error').innerHTML = ''
							              user_email.style.borderTop = "2px solid #00c853";
							              $(xicon).fadeOut('fast');
							              $(ckicon).fadeIn('slow');
														signup_email = userEmail;
		                      }
		                    }
		                });
			}
	 	})
	 })
	 $(document).ready(function(){
	 	$('#phone').blur(function(){
		var phone = _('phone').value;
		var ship_phone = _('phone');
		var chkIcon = _('p_ck');
		var x_icon  = _('p_x');
		if (phone.length <= 0) {
			_('sign_up_phone_error').innerHTML = 'Please enter your phone number';
			ship_phone.style.borderTop = '2px solid #f44336';
			$(chkIcon).fadeOut('fast');
			$(x_icon).fadeIn('slow');
			signup_phone = "";
		}
		else if (phone.length < 9){
			_('sign_up_phone_error').innerHTML = 'Your phone number is too short, please lengthen this text to 9 characters';
			ship_phone.style.borderTop = '2px solid #ff5252';
			$(chkIcon).fadeOut('fast');
			$(x_icon).fadeIn('slow');
			signup_phone = "";
		}
		else if (phone.length > 9){
			_('sign_up_phone_error').innerHTML = 'Your phone number is too long, please shorten this text to 9 characters';
			ship_phone.style.borderTop = '2px solid #ff5252';
			$(chkIcon).fadeOut('fast');
			$(x_icon).fadeIn('slow');
			signup_phone = "";
		}
		else if (phone.length > 0) {
			var num = false;
			for (var i = 0; i < phone.length; i++) {
				if (isNaN(phone[i]) || phone[i] == ' ') {
					var num = true;
				}
			}
			if (num == true) {
				_('sign_up_phone_error').innerHTML = 'Only digits are accepted';
				ship_phone.style.borderTop = '2px solid #ff5252';
				$(chkIcon).fadeOut('fast');
				$(x_icon).fadeIn('slow');
				signup_phone = "";
			}
			else if (num == false) {
				_('sign_up_phone_error').innerHTML = '';
				ship_phone.style.borderTop = '2px solid #00e676';
				$(x_icon).fadeOut('fast');
				$(chkIcon).fadeIn('slow');
				signup_phone = phone;
			}
		}
	  })
	})
	 $(document).ready(function(){
		 		$('#password').keyup(function(){
					$('#progress_indicator').fadeIn('fast');
					var pass_val = $('#password').val();
					var pass_length = $('#password').val().length;
					var pass_value = pass_val.trim();
					_('password').value = pass_value;
					if (pass_value.length >= 1) {
					$('#sign_up_password_error').text('');
					$('#password').css('borderTop','');
					$('#eyeSpan').css('borderTop','2px solid #333');
					var special_chracters = '~!@#$%^&*_+?';
					pass_score = 0;
					var strength = "";
					var color_indicator = "";
					var progress_bar = "";
					for (var i = 0; i < pass_length; i++) {
						if (special_chracters.indexOf(pass_value.charAt(i)) > -1) {
							pass_score += 10;
						}
						if (/[a-z]/.test(pass_value)) {
							pass_score += 5;
						}
						if (/[A-Z]/.test(pass_value)) {
							pass_score += 5;
						}
						if (/[\d]/.test(pass_value)) {
							pass_score += 5;
						}
						if (pass_length >= 8) {
							pass_score += 2;
						}
					}//end of for loop
					if (pass_score >= 100) {
						strength = 'STRONG';
						color_indicator_width = '100%';
						progress_bar = 'progress-bar progress-bar-success progress-bar-striped active';
					}
					else if (pass_score >= 80) {
						strength = 'MEDIUM';
						color_indicator_width = '75%';
						progress_bar = 'progress-bar progress-bar-info progress-bar-striped active';
					}
					else if (pass_score >= 60) {
						strength = 'WEAK';
						color_indicator_width = '50%';
						progress_bar = 'progress-bar progress-bar-warning progress-bar-striped active';
					}else{
						strength = 'VERY WEAK';
						color_indicator_width = '25%';
						progress_bar = 'progress-bar progress-bar-danger progress-bar-striped active';
					}
					$('#color_indicator').css('width',color_indicator_width);
					$('#color_indicator').attr('class',progress_bar);
					$('#color_indicator').text(strength);

				}//end of if
				else{
					$('#color_indicator').css('width','');
					$('#color_indicator').attr('class','');
					$('#color_indicator').text('');
					$('#progress_indicator').fadeOut('fast');
				}
				})

				$('#password').blur(function(){
					var pass_value = $('#password').val();
					var pass_length = $('#password').val().length;
					if (pass_length <= 0) {
						$('#sign_up_password_error').text('Please enter your password');
						$('#password').css('borderTop','2px solid #ff5252');
						$('#eyeSpan').css('borderTop','2px solid #ff5252');
						return false;
					}
					else if (pass_score < 100) {
						$('#sign_up_password_error').text('Please strengthen your password');
						$('#password').css('borderTop','2px solid #ff5252');
						$('#eyeSpan').css('borderTop','2px solid #ff5252');
						return false;
					}else{
						$('#eyeSpan').css('borderTop','2px solid #00e676');
						$('#password').css('borderTop','2px solid #00e676');
						$('#sign_up_password_error').text('');
					}
				})

				$('#eyeSpan').click(function(){
					$('#password').attr('type','text');
					setTimeout(function(){$('#password').attr('type','password');},600);
				})

	})

	$(document).ready(function(){
		$('#re_type_pass').blur(function(){
			var re_type_pass = $('#re_type_pass').val();
			var retype_password = $('#re_type_pass');
			var pass_word = $('#password').val();
			var password_reType = re_type_pass.trim();
			_('re_type_pass').value = password_reType;
			if (password_reType != pass_word) {
				$('#eyeSpanReType').css('borderTop','2px solid #ff5252');
				$('#re_type_pass').css('borderTop','2px solid #ff5252');
				$('#sign_up_retype_password_error').text('Password did not match!');
				signup_retype_password = "";
			}
			else if (password_reType.length <= 0) {
				$('#eyeSpanReType').css('borderTop','2px solid #ff5252');
				$('#re_type_pass').css('borderTop','2px solid #ff5252');
				$('#sign_up_retype_password_error').text('Please re-type your password');
				signup_retype_password = "";
			}else {
				$('#eyeSpanReType').css('borderTop','2px solid #00e676');
				$('#re_type_pass').css('borderTop','2px solid #00e676');
				$('#sign_up_retype_password_error').text('');
				signup_retype_password = password_reType;
			}
		})

		$('#eyeSpanReType').click(function(){
			$('#re_type_pass').attr('type','text');
			setTimeout(function(){$('#re_type_pass').attr('type','password');},600);
		})

		$('#re_type_pass').keyup(function(){
			var re_type_pass = $('#re_type_pass').val();
			var password_reType = re_type_pass.trim();
			_('re_type_pass').value = password_reType;
			$('#eyeSpanReType').css('borderTop','2px solid #333');
			$('#re_type_pass').css('borderTop','');
			$('#sign_up_retype_password_error').text('');
		})

	})

	$(document).ready(function(){
		$('#sg_up_upload_avatar').mouseover(function(){
			$('#sg_up_upload_avatar').css('backgroundColor', '#03a9f4');
			$('#sg_up_upload_avatar').css('cursor', 'pointer');
			$('#sg_avatar_icon').css('color', '#fff');
		})
		$('#sg_up_upload_avatar').mouseleave(function(){
			$('#sg_up_upload_avatar').css('backgroundColor', '');
			$('#sg_up_upload_avatar').css('cursor', '');
			$('#sg_avatar_icon').css('color', '');
		})

		$('#sg_up_upload_avatar').click(function(e){
			e.preventDefault();
			var users_avatar = _('users_avatar');
			users_avatar.click();
			users_avatar.onchange = function(e){
				upload(e.target.files);
			}
		var upload = function(files){
			var imageType = files[0].type;
			var imageSize = files[0].size;
			var typeImg = imageType.substring(imageType.lastIndexOf("/") + 1).toLowerCase();
			if (files.length > 1) {
				$('#sg_avatar_error').text('Please upload only one image.');
				$('#sg_avatar_img').fadeOut('fast');
				$('#sg_avatar_icon').fadeIn('fast');
				$('#sg_up_upload_avatar').css('border','1px solid #f44336');
				$('#users_avatar').attr('value','');
			}
			else if (typeImg != 'jpeg' && typeImg != 'jpg' && typeImg != 'png' && typeImg != 'gif' && typeImg != 'bmp') {
				$('#sg_avatar_error').text('Only images are accepted');
				$('#sg_avatar_img').fadeOut('fast');
				$('#sg_avatar_icon').fadeIn('fast');
				$('#sg_up_upload_avatar').css('border','1px solid #f44336');
				$('#users_avatar').attr('value','');
			}
			else if (imageSize > 1000000) {
				$('#sg_avatar_error').text('Sorry, this file is too large.');
				$('#sg_avatar_img').fadeOut('fast');
				$('#sg_avatar_icon').fadeIn('fast');
				$('#sg_up_upload_avatar').css('border','1px solid #f44336');
				$('#users_avatar').attr('value','');
			}
			else{
				var formData = new FormData();
				var xhr = new XMLHttpRequest();
				for (var x = 0; x < files.length; x++) {
						formData.append('file[]', files[x]);
					 }
				xhr.onload = function(){
													var data = JSON.parse(this.responseText);
													displayUploads(data);
											}
				xhr.open('post', base+'shop/upload_avatar');
				xhr.send(formData);
				}
			}//end of upload
			var displayUploads = function(data){
									$('#avatar_loader').fadeIn('fast');
									$('#sg_up_upload_avatar').css('border','transparent');
                  $('#sg_avatar_error').text('');
									$('#sg_avatar_icon').fadeOut('fast');
									$('#sg_avatar_img').attr('src',base+'images/users/'+data[0].name);
									$('#sg_avatar_img').fadeIn('fast');
									$('#users_avatar').attr('value',data[0].name);
									setTimeout(function(){
											$('#avatar_loader').fadeOut('slow');
										},3000);
					}//end of displayUploads
			})//end of avatar click
	})


$(document).ready(function(){
		$('#registerNow').click(function(){
				var go = true;
				if (signup_fname == "") {
					go = false;
					$('#sign_up_fname_error').text('Please enter your first name.')
				}
				if (signup_lname == "") {
					go = false;
					$('#sign_up_lname_error').text('Please enter your last name.')
				}
				if (signup_mname == "") {
					go = false;
					$('#sign_up_mname_error').text('Please enter your middle name.')
				}
				if (signup_username == "") {
					go = false;
					$('#sign_up_username_error').text('Please enter your username.')
				}
				if (signup_email == "") {
					go = false;
					$('#sign_up_email_error').text('Please enter your email account.')
				}
				if (pass_score < 100) {
					go = false;
					$('#sign_up_password_error').text('Please strengthen your password.')
				}
				if ($('#password').val().length <= 0) {
					go = false;
					$('#sign_up_password_error').text('Please enter your password.')
				}
				if (signup_retype_password == "") {
					go = false;
					$('#sign_up_retype_password_error').text('Please re-type your password.')
				}
				if (signup_phone == "") {
					go = false;
					$('#sign_up_phone_error').text('Please enter your phone number.')
				}
				if (signup_gender == "") {
					go = false;
					$('#genderErrror').text('Please select your gender.')
				}
				if (go == true) {
					var signup_form = document.getElementById('signup_form');
					signup_form.submit();
				}
	})

})







// FOR EDIT PROFILE ONLY

function genderVal_e($scope){
	    var gender = $($scope).attr('value');
	    var genderSet = document.getElementById('gender_e');
	    $(genderSet).attr('value', gender);
			$('#genderErrror_e').text('');
			signup_gender_e = gender;
	 }
 function focusPass_e(){
	    var span = _('eyeSpan_e');
	    var unlockKeyAddon = _('unlockKeyAddon_e');
	    span.style.backgroundColor = '#333';
	    span.style.border = '1px solid #333';
	    unlockKeyAddon.style.color = 'white';

	 }
	 function outFocus_e(){
	    var span = _('eyeSpan_e');
	    var unlockKeyAddon = _('unlockKeyAddon_e');
	    span.style.backgroundColor = '';
	    span.style.border = '';
	    unlockKeyAddon.style.color = '';
	 }
	 function focusPassREtype_e(){unlockRETYPEKeyAddon
	    var span = _('eyeSpanReType_e');
	    var unlockRETYPEKeyAddon = _('unlockRETYPEKeyAddon_e');
	    span.style.backgroundColor = '#333';
	    span.style.border = '1px solid #333';
	    unlockRETYPEKeyAddon.style.color = 'white';
	 }
	 function outFocusREtype_e(){
	    var span = document.getElementById('eyeSpanReType_e');
	    var unlockRETYPEKeyAddon = _('unlockRETYPEKeyAddon_e');
	    span.style.backgroundColor = '';
	    span.style.border = '';
	    unlockRETYPEKeyAddon.style.color = '';
	 }

$(document).ready(function(){
	 	$('#first_name_e').blur(function(){
	 		var fname = $('#first_name_e').val();
	 		var frname= _('first_name_e');
	 		var xicon = _('fn_x_e');
	 		var ckicon= _('fn_ck_e');
	 		if (fname.length <= 0) {
	 			_('sign_up_fname_error_e').innerHTML = 'Please enter your first name.'
	 			frname.style.borderTop = "2px solid #f44336";
	 			$(ckicon).fadeOut('fast');
	 			$(xicon).fadeIn('slow');
				signup_fname_e = "";
	 		}
			else if (fname.length > 0) {
				var trimName = fname.trim();
				var getFirstLetter = trimName.charAt(0);
				var firstLetterToUpperCase = getFirstLetter.toUpperCase();
				var resultprodName = fname.replace(getFirstLetter, firstLetterToUpperCase);
				_('first_name_e').value = resultprodName.trim();
				var firstName = resultprodName.trim();
				$.ajax({
                    type: "POST",
                    url: base+"shop/signup_chk_name",
                    data: ({
                        name: firstName
                    }),
                    cache: false,
                    success: function(html) {
                    	if ((html) == 'bad') {
                    		_('sign_up_fname_error_e').innerHTML = 'Only letters and white space are allowed.'
									 			frname.style.borderTop = "2px solid #f44336";
									 			$(ckicon).fadeOut('fast');
									 			$(xicon).fadeIn('slow');
												signup_fname_e = "";
                    	}
                    	if ((html) == 'good') {
                    		_('sign_up_fname_error_e').innerHTML = ''
									 			frname.style.borderTop = "2px solid #00c853";
									 			$(xicon).fadeOut('fast');
									 			$(ckicon).fadeIn('slow');
												signup_fname_e = firstName;
                    	}
                    }
                });
			}
	 	})
	 })
	 $(document).ready(function(){
	 	$('#last_name_e').blur(function(){
	 		var lname = $('#last_name_e').val();
	 		var lstname= _('last_name_e');
	 		var xicon = _('ln_x_e');
	 		var ckicon= _('ln_ck_e');
	 		if (lname.length <= 0) {
	 			_('sign_up_lname_error_e').innerHTML = 'Please enter your last name.'
	 			lstname.style.borderTop = "2px solid #f44336";
	 			$(ckicon).fadeOut('fast');
	 			$(xicon).fadeIn('slow');
				signup_lname_e = "";
	 		}
			else if (lname.length > 0) {
				var trimName = lname.trim();
				var getFirstLetter = trimName.charAt(0);
				var firstLetterToUpperCase = getFirstLetter.toUpperCase();
				var resultprodName = lname.replace(getFirstLetter, firstLetterToUpperCase);
				_('last_name_e').value = resultprodName.trim();
				var lastName = resultprodName.trim();
				$.ajax({
                    type: "POST",
                    url: base+"shop/signup_chk_name",
                    data: ({
                        name: lastName
                    }),
                    cache: false,
                    success: function(html) {
                    	if ((html) == 'bad') {
                    		_('sign_up_lname_error_e').innerHTML = 'Only letters and white space are allowed.'
									 			lstname.style.borderTop = "2px solid #f44336";
									 			$(ckicon).fadeOut('fast');
									 			$(xicon).fadeIn('slow');
												signup_lname_e = "";
                    	}
                    	if ((html) == 'good') {
                    		_('sign_up_lname_error_e').innerHTML = ''
									 			lstname.style.borderTop = "2px solid #00c853";
									 			$(xicon).fadeOut('fast');
									 			$(ckicon).fadeIn('slow');
												signup_lname_e = lastName;
                    	}
                    }
                });
			}
	 	})
	 })

	 $(document).ready(function(){
	 	$('#middle_name_e').blur(function(){
	 		var mname = $('#middle_name_e').val();
	 		var midname= _('middle_name_e');
	 		var xicon = _('mn_x_e');
	 		var ckicon= _('mn_ck_e');
	 		if (mname.length <= 0) {
	 			_('sign_up_mname_error_e').innerHTML = 'Please enter your middle name.'
	 			midname.style.borderTop = "2px solid #f44336";
	 			$(ckicon).fadeOut('fast');
	 			$(xicon).fadeIn('slow');
				signup_mname_e = "";
	 		}
			else if (mname.length > 0) {
					var trimName = mname.trim();
					var getFirstLetter = trimName.charAt(0);
					var firstLetterToUpperCase = getFirstLetter.toUpperCase();
					var resultprodName = mname.replace(getFirstLetter, firstLetterToUpperCase);
					_('middle_name_e').value = resultprodName.trim();
					var midlleName = resultprodName.trim();
						$.ajax({
		    				type: "POST",
		                    url: base+"shop/signup_chk_name",
		                    data: ({
		                        name: midlleName
		                    }),
		                    cache: false,
		                    success: function(html) {
		                      if ((html) == 'bad') {
		                        _('sign_up_mname_error_e').innerHTML = 'Only letters and white space are allowed.'
							              midname.style.borderTop = "2px solid #f44336";
							              $(ckicon).fadeOut('fast');
							              $(xicon).fadeIn('slow');
														signup_mname_e = "";
		                      }
		                      if ((html) == 'good') {
		                        _('sign_up_mname_error_e').innerHTML = ''
							              midname.style.borderTop = "2px solid #00c853";
							              $(xicon).fadeOut('fast');
							              $(ckicon).fadeIn('slow');
														signup_mname_e = midlleName;
		                      }
		                    }
		                });
			}
	 	})
	 })

	 $(document).ready(function(){
	 	$('#username_e').blur(function(){
	 		var username = $('#username_e').val();
	 		var user_style = _('username_e');
	 		var xicon = _('username_x_e');
	 		var ckicon= _('username_ck_e');
	 		if (username.length <= 0) {
	 			_('sign_up_username_error_e').innerHTML = 'Please enter your username.'
	 			user_style.style.borderTop = "2px solid #f44336";
	 			$(ckicon).fadeOut('fast');
	 			$(xicon).fadeIn('slow');
				signup_username_e = "";
	 		}
			else if (username.length > 0) {
				var user_name = username.trim();
				_('username_e').value = username.trim();
				$.ajax({
                    type: "POST",
                    url: base+"shop/username_signup_chk",
                    data: ({
                        username: user_name
                    }),
                    cache: false,
                    success: function(html) {
                    	if ((html) == 'bad') {
                    		_('sign_up_username_error_e').innerHTML = 'Sorry! this username is already in use, please choose another.'
									 			user_style.style.borderTop = "2px solid #f44336";
									 			$(ckicon).fadeOut('fast');
									 			$(xicon).fadeIn('slow');
												signup_username_e = "";
                    	}
                    	if ((html) == 'good') {
                    		_('sign_up_username_error_e').innerHTML = ''
									 			user_style.style.borderTop = "2px solid #00c853";
									 			$(xicon).fadeOut('fast');
									 			$(ckicon).fadeIn('slow');
												signup_username_e = user_name;
                    	}
                    }
                });
			}
	 	})
	 })

	 $(document).ready(function(){
	 	$('#user_email_e').blur(function(){
	 		var email = $('#user_email_e').val();
	 		var user_email = _('user_email_e');
	 		var xicon = _('e_x_e');
	 		var ckicon= _('e_ck_e');
	 		if (email.length == "") {
	 			_('sign_up_email_error_e').innerHTML = 'Please enter your email address.'
	 			user_email.style.borderTop = "2px solid #f44336";
	 			$(ckicon).fadeOut('fast');
	 			$(xicon).fadeIn('slow');
				signup_email_e = "";
	 		}
			else if (email.length > 0) {
					var userEmail = email.trim();
					_('user_email_e').value = email.trim();
						$.ajax({
		    				type: "POST",
		                    url: base+"shop/signup_chk_email",
		                    data: ({
		                        user_email: userEmail
		                    }),
		                    cache: false,
		                    success: function(html) {
		                      if ((html) == 'bad') {
		                        _('sign_up_email_error_e').innerHTML = 'Invalid email format.'
							              user_email.style.borderTop = "2px solid #f44336";
							              $(ckicon).fadeOut('fast');
							              $(xicon).fadeIn('slow');
														signup_email_e = "";
		                      }
		                      if ((html) == 'good') {
		                        _('sign_up_email_error_e').innerHTML = ''
							              user_email.style.borderTop = "2px solid #00c853";
							              $(xicon).fadeOut('fast');
							              $(ckicon).fadeIn('slow');
														signup_email_e = userEmail;
		                      }
		                    }
		                });
			}
	 	})
	 })
	 $(document).ready(function(){
	 	$('#phone_e').blur(function(){
		var phone = _('phone_e').value;
		var ship_phone = _('phone_e');
		var chkIcon = _('p_ck_e');
		var x_icon  = _('p_x_e');
		if (phone.length <= 0) {
			_('sign_up_phone_error_e').innerHTML = 'Please enter your phone number';
			ship_phone.style.borderTop = '2px solid #f44336';
			$(chkIcon).fadeOut('fast');
			$(x_icon).fadeIn('slow');
			signup_phone_e = "";
		}
		else if (phone.length < 9){
			_('sign_up_phone_error_e').innerHTML = 'Your phone number is too short, please lengthen this text to 9 characters';
			ship_phone.style.borderTop = '2px solid #ff5252';
			$(chkIcon).fadeOut('fast');
			$(x_icon).fadeIn('slow');
			signup_phone_e = "";
		}
		else if (phone.length > 9){
			_('sign_up_phone_error_e').innerHTML = 'Your phone number is too long, please shorten this text to 9 characters';
			ship_phone.style.borderTop = '2px solid #ff5252';
			$(chkIcon).fadeOut('fast');
			$(x_icon).fadeIn('slow');
			signup_phone_e = "";
		}
		else if (phone.length > 0) {
			var num = false;
			for (var i = 0; i < phone.length; i++) {
				if (isNaN(phone[i]) || phone[i] == ' ') {
					var num = true;
				}
			}
			if (num == true) {
				_('sign_up_phone_error_e').innerHTML = 'Only digits are accepted';
				ship_phone.style.borderTop = '2px solid #ff5252';
				$(chkIcon).fadeOut('fast');
				$(x_icon).fadeIn('slow');
				signup_phone_e = "";
			}
			else if (num == false) {
				_('sign_up_phone_error_e').innerHTML = '';
				ship_phone.style.borderTop = '2px solid #00e676';
				$(x_icon).fadeOut('fast');
				$(chkIcon).fadeIn('slow');
				signup_phone_e = phone;
			}
		}
	  })
	})
	 $(document).ready(function(){
		 		$('#password_e').keyup(function(){
					$('#progress_indicator_e').fadeIn('fast');
					var pass_val = $('#password_e').val();
					var pass_length = $('#password_e').val().length;
					var pass_value = pass_val.trim();
					_('password_e').value = pass_value;
					if (pass_value.length >= 1) {
					$('#sign_up_password_error_e').text('');
					$('#password_e').css('borderTop','');
					$('#eyeSpan_e').css('borderTop','2px solid #333');
					var special_chracters = '~!@#$%^&*_+?';
					pass_score_e = 0;
					var strength = "";
					var color_indicator = "";
					var progress_bar = "";
					for (var i = 0; i < pass_length; i++) {
						if (special_chracters.indexOf(pass_value.charAt(i)) > -1) {
							pass_score_e += 10;
						}
						if (/[a-z]/.test(pass_value)) {
							pass_score_e += 5;
						}
						if (/[A-Z]/.test(pass_value)) {
							pass_score_e += 5;
						}
						if (/[\d]/.test(pass_value)) {
							pass_score_e += 5;
						}
						if (pass_length >= 8) {
							pass_score_e += 2;
						}
					}//end of for loop
					if (pass_score_e >= 100) {
						strength = 'STRONG';
						color_indicator_width = '100%';
						progress_bar = 'progress-bar progress-bar-success progress-bar-striped active';
					}
					else if (pass_score_e >= 80) {
						strength = 'MEDIUM';
						color_indicator_width = '75%';
						progress_bar = 'progress-bar progress-bar-info progress-bar-striped active';
					}
					else if (pass_score_e >= 60) {
						strength = 'WEAK';
						color_indicator_width = '50%';
						progress_bar = 'progress-bar progress-bar-warning progress-bar-striped active';
					}else{
						strength = 'VERY WEAK';
						color_indicator_width = '25%';
						progress_bar = 'progress-bar progress-bar-danger progress-bar-striped active';
					}
					$('#color_indicator_e').css('width',color_indicator_width);
					$('#color_indicator_e').attr('class',progress_bar);
					$('#color_indicator_e').text(strength);

				}//end of if
				else{
					$('#color_indicator_e').css('width','');
					$('#color_indicator_e').attr('class','');
					$('#color_indicator_e').text('');
					$('#progress_indicator_e').fadeOut('fast');
				}
				})

				$('#password_e').blur(function(){
					var pass_value = $('#password_e').val();
					var pass_length = $('#password_e').val().length;
					if (pass_length <= 0) {
						$('#sign_up_password_error_e').text('Please enter your password');
						$('#password_e').css('borderTop','2px solid #ff5252');
						$('#eyeSpan_e').css('borderTop','2px solid #ff5252');
						return false;
					}
					else if (pass_score_e < 100) {
						$('#sign_up_password_error_e').text('Please strengthen your password');
						$('#password_e').css('borderTop','2px solid #ff5252');
						$('#eyeSpan_e').css('borderTop','2px solid #ff5252');
						return false;
					}else{
						$('#eyeSpan_e').css('borderTop','2px solid #00e676');
						$('#password_e').css('borderTop','2px solid #00e676');
						$('#sign_up_password_error_e').text('');
					}
				})

				$('#eyeSpan_e').click(function(){
					$('#password_e').attr('type','text');
					setTimeout(function(){$('#password_e').attr('type','password');},600);
				})

	})

	$(document).ready(function(){
		$('#re_type_pass_e').blur(function(){
			var re_type_pass = $('#re_type_pass_e').val();
			var retype_password = $('#re_type_pass_e');
			var pass_word = $('#password_e').val();
			var password_reType = re_type_pass.trim();
			_('re_type_pass_e').value = password_reType;
			if (password_reType != pass_word) {
				$('#eyeSpanReType_e').css('borderTop','2px solid #ff5252');
				$('#re_type_pass_e').css('borderTop','2px solid #ff5252');
				$('#sign_up_retype_password_error_e').text('Password did not match!');
				signup_retype_password_e = "";
			}
			else if (password_reType.length <= 0) {
				$('#eyeSpanReType_e').css('borderTop','2px solid #ff5252');
				$('#re_type_pass_e').css('borderTop','2px solid #ff5252');
				$('#sign_up_retype_password_error_e').text('Please re-type your password');
				signup_retype_password_e = "";
			}else {
				$('#eyeSpanReType_e').css('borderTop','2px solid #00e676');
				$('#re_type_pass_e').css('borderTop','2px solid #00e676');
				$('#sign_up_retype_password_error_e').text('');
				signup_retype_password_e = password_reType;
			}
		})

		$('#eyeSpanReType_e').click(function(){
			$('#re_type_pass_e').attr('type','text');
			setTimeout(function(){$('#re_type_pass_e').attr('type','password');},600);
		})

		$('#re_type_pass').keyup(function(){
			var re_type_pass = $('#re_type_pass_e').val();
			var password_reType = re_type_pass.trim();
			_('re_type_pass_e').value = password_reType;
			$('#eyeSpanReType_e').css('borderTop','2px solid #333');
			$('#re_type_pass_e').css('borderTop','');
			$('#sign_up_retype_password_error_e').text('');
		})

	})

	$(document).ready(function(){
		$('#sg_up_upload_avatar_e').mouseover(function(){
			$('#sg_up_upload_avatar_e').css('backgroundColor', '#03a9f4');
			$('#sg_up_upload_avatar_e').css('cursor', 'pointer');
			$('#sg_avatar_icon_e').css('color', '#fff');
		})
		$('#sg_up_upload_avatar_e').mouseleave(function(){
			$('#sg_up_upload_avatar_e').css('backgroundColor', '');
			$('#sg_up_upload_avatar_e').css('cursor', '');
			$('#sg_avatar_icon_e').css('color', '');
		})

		$('#sg_up_upload_avatar_e').click(function(e){
			e.preventDefault();
			var users_avatar = _('users_avatar_e');
			users_avatar.click();
			users_avatar.onchange = function(e){
				upload(e.target.files);
			}
		var upload = function(files){
			var imageType = files[0].type;
			var imageSize = files[0].size;
			var typeImg = imageType.substring(imageType.lastIndexOf("/") + 1).toLowerCase();
			if (files.length > 1) {
				$('#sg_avatar_error_e').text('Please upload only one image.');
				$('#sg_avatar_img_e').fadeOut('fast');
				$('#sg_avatar_icon_e').fadeIn('fast');
				$('#sg_up_upload_avatar_e').css('border','1px solid #f44336');
				$('#users_avatar_e').attr('value','');
			}
			else if (typeImg != 'jpeg' && typeImg != 'jpg' && typeImg != 'png' && typeImg != 'gif' && typeImg != 'bmp') {
				$('#sg_avatar_error_e').text('Only images are accepted');
				$('#sg_avatar_img_e').fadeOut('fast');
				$('#sg_avatar_icon_e').fadeIn('fast');
				$('#sg_up_upload_avatar_e').css('border','1px solid #f44336');
				$('#users_avatar_e').attr('value','');
			}
			else if (imageSize > 1000000) {
				$('#sg_avatar_error_e').text('Sorry, this file is too large.');
				$('#sg_avatar_img_e').fadeOut('fast');
				$('#sg_avatar_icon_e').fadeIn('fast');
				$('#sg_up_upload_avatar_e').css('border','1px solid #f44336');
				$('#users_avatar_e').attr('value','');
			}
			else{
				var formData = new FormData();
				var xhr = new XMLHttpRequest();
				for (var x = 0; x < files.length; x++) {
						formData.append('file[]', files[x]);
					 }
				xhr.onload = function(){
													var data = JSON.parse(this.responseText);
													displayUploads(data);
											}
				xhr.open('post', base+'shop/upload_avatar');
				xhr.send(formData);
				}
			}//end of upload
			var displayUploads = function(data){
									$('#avatar_loader_e').fadeIn('fast');
									$('#sg_up_upload_avatar_e').css('border','transparent');
                  					$('#sg_avatar_error_e').text('');
									$('#sg_avatar_icon_e').fadeOut('fast');
									$('#sg_avatar_img_e').attr('src',data[0].file);
									$('#sg_avatar_img_e').fadeIn('fast');
									$('#users_avatar_e').attr('value',data[0].name);
									setTimeout(function(){
											$('#avatar_loader_e').fadeOut('slow');
										},3000);
					}//end of displayUploads
			})//end of avatar click
	})


$(document).ready(function(){
		$('#registerNow_e').click(function(){
				var go = true;
				if ($('#first_name_e').val().length <= 0) {
					go = false;
					$('#sign_up_fname_error_e').text('Please enter your first name.')
				}
				if ($('#last_name_e').val().length <= 0) {
					go = false;
					$('#sign_up_lname_error_e').text('Please enter your last name.')
				}
				if ($('#middle_name_e').val().length <= 0) {
					go = false;
					$('#sign_up_mname_error_e_e').text('Please enter your middle name.')
				}
				if ($('#username_e').val().length <= 0) {
					go = false;
					$('#sign_up_username_error_e_e').text('Please enter your username.')
				}
				if ($('#user_email_e').val().length <= 0) {
					go = false;
					$('#sign_up_email_error_e').text('Please enter your email account.')
				}
				if (pass_score_e < 100) {
					go = false;
					$('#sign_up_password_error_e').text('Please strengthen your password.')
				}
				if ($('#password_e').val().length <= 0) {
					go = false;
					$('#sign_up_password_error_e').text('Please enter your password.')
				}
				if (signup_retype_password_e == "") {
					go = false;
					$('#sign_up_retype_password_error_e').text('Please re-type your password.')
				}
				if ($('#phone_e').val().length <= 0) {
					go = false;
					$('#sign_up_phone_error_e').text('Please enter your phone number.')
				}
				if (go == true) {
					var editProfile_form = document.getElementById('editProfile_form');
					editProfile_form.submit();
				}
	})

})

$(document).ready(function(){

  $("#chat_minimize").click(function(){
    $("#chat_interface").animate({height:"50px"});
  });

  $("#chat_myCanvas").click(function(){
    $("#chat_interface").animate({height:"440px"});
  });

  $("#chat_close").click(function(){
    $("#chat_interface").animate({height:"0px"},1500);
    $("#chat_interface").css({border:"none"});
  });

  $("#chat_show").click(function(){
  	$("#chat_interface").fadeIn('fast');
    $("#chat_interface").animate({height:"440px"},1500);
  });
  
});

$(document).ready(function(){
  $("#chatAddon").click(function(){
    var msg = $("#chat_box_input").val();
    if (msg.length <= 0) {
    		$('#chat_error_icon').fadeIn('fast');
			$('#chat_error').fadeIn('fast');
			$('#chat_error').text('Please enter your message');
			$('#chat_box_input').css('border','1px solid #ef5350');
			return false;
    }else {
		var message =	msg.trim();
		_('chat_box_input').value = "";
		$('#chat_img_loader').fadeIn('fast');
				$.ajax({
                    type: "POST",
                    url: base+"shop/chat",
                    data: ({
                        msg: message
                    }),
                    cache: false,
                    success: function(html) {
                    	if ((html) == 'login_first') {
                    		$('#chat_error').fadeIn('fast');
                    		$('#chat_error_icon').fadeIn('fast');
                    		$('#chat_error').text('Please, login first in order to use our chatbox');
							$('#chat_box_input').css('border','1px solid #ef5350');
							$('#chat_img_loader').fadeOut('slow');
                    	}else{
                    		$('#chat_img_loader').fadeOut('slow');
                    		$('#chat_error_icon').fadeOut('fast');
							setTimeout(function(){
								$('#chatBodymAINdIV').scrollTop(1000000);
							},2000);
                    	}

					}//end of success
              });//end of ajax
    }
  });

	$("#chat_box_input").keyup(function(){
			$('#chat_error').fadeOut('fast');
			$('#chat_error_icon').fadeOut('fast');
			$('#chat_box_input').css('border','');
  });

//image upload on hover

});
$(setInterval(function(){
	$('#chatBodymAINdIV').load(base+'shop/chat_display');
	$('#chat_noti_msg').load(base+'shop/notify_msg');
}, 5000))




//END OF EDIT PROFILE






</script>
