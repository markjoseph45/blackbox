<?php
	if (!isset($_SESSION['admin'])) :
		redirect('/');
	endif;
?>

<input style="display:none;visibility:hidden;" id="base" type="hidden" value="<?= base_url(); ?>">

<?php
if (isset($_SESSION['admin'])) :
	$admin_ses = $_SESSION['admin'];
	$admin_avatar = $this->admin->get_avatar($admin_ses);
	$ad_avatar = $admin_avatar->profile;
	$this->load->helper('text');
endif;
?>
<!-- ////////////////////////////////  message popoovers  ////////////////////////////// -->
<?php if (isset($edit_ad)) : ?>
			<div class="col-sm-4 col-sm-offset-4 bg-danger" id="welcomeMsgNOUserEXIST">
				<p align="center" style="color: white;">Your profile was successfully been updated!</p>
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
<?php if (isset($edit_failed)) : ?>
			<div class="col-sm-4 col-sm-offset-4 bg-danger" id="welcomeMsgNOUserEXIST">
				<p align="center" style="color: white;">Sorry! your password did not match.</p>
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
<?php if (isset($add_admin)) : ?>
			<div class="col-sm-4 col-sm-offset-4 bg-danger" id="welcomeMsgNOUserEXIST">
				<p align="center" style="color: white;">You have succesfully added another admin!</p>
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
<?php if (isset($add_failed)) : ?>
			<div class="col-sm-4 col-sm-offset-4 bg-danger" id="welcomeMsgNOUserEXIST">
				<p align="center" style="color: white;">Sorry! your password did not match.</p>
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
<!-- //////////////////////////////// end of message popoovers  ////////////////////////////// -->

<body id="adminBody">

			<div style="bottom: 45px;display: none;" class="row bg-danger col-sm-3 col-xs-12 col-md-3" id="chat_interface">
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
				<div class="row" id="chat_admin_wrapper">
				  <div class="form-group">
				    <div class="input-group">
				      <div class="input-group-addon" id="admin_chatAddon">Send To:</div>
				      <input type="text" class="form-control input-sm" id="admin_chat_input" placeholder="Type username here...">
				    </div>
				    <span class="pull-right" id="chat_admin_err"></span>
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

<!-- ////////////////////////////////// edit profile //////////////////////////////////// -->
<?php
if (isset($_SESSION['admin'])) :
	$admin_this_ses = $_SESSION['admin'];
	$this_admin = $this->admin->get_admin($admin_this_ses);
	foreach ($this_admin as $manager) :
		$edit_ad_id = $manager['admin_id'];
		$edit_ad_username = $manager['username'];
		$edit_ad_profile = $manager['profile'];
	endforeach;
endif;
?>
<?php if (isset($_SESSION['admin'])) : ?>
<div class="modal fade" role="dialog" aria-labelledby="admin_edit_profile" id="admin_edit_profile">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container-fluid">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          	<div class="col-sm-10 col-sm-offset-1">
	           	<h4 align="center" class="">Edit Your Profile <i style="color: #ff6d00;" class="fa fa-pencil-square-o"></i></h4>
	            <svg height="15" width="100%">
					<g fill="none" stroke="#333" stroke-width="10">
						<path stroke-dasharray="5,5" d="M0 2 l600 0" />
					</g>
				</svg>
				<div class="row" id="sg_up_main_div">
						<div class="col-sm-12 col-xs-12" align="center">
							<label for="">UPLOAD YOUR AVATAR</label>
						</div>
						<div align="center" class="row col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-4" id="sg_up_upload_avatar" data-toggle="tooltip" data-placement="left" title="Click to upload avatar">
							<img id="sg_avatar_img" src="<?php echo base_url(); ?>images/users/<?= $edit_ad_profile; ?>"  class="img-responsive img-thumbnail" alt="">
							<i style="display: none;" id="sg_avatar_icon" class="fa fa-user"></i>
							<img id="avatar_loader" class="img-responsive center-block" src="<?php echo base_url(); ?>images/default_img/default (7).svg">
						</div>
						<div class="col-sm-12 col-xs-12" align="center">
							<span id="sg_avatar_error"></span>
						</div>
					</div>
				<form method="post" action="<?= base_url(); ?>shop/edit_admin">
				  <div class="form-group">
				    <label for="ad_username">USERNAME</label>
				    <input type="text" class="form-control" id="ad_username" name="ad_username" value="<?= $edit_ad_username; ?>" placeholder="Enter your username" required>
				  </div>
				  <div class="form-group">
				    <label for="ad_password">NEW PASSWORD</label>
				    <input type="password" class="form-control" id="ad_password" name="ad_password" placeholder="Enter your new password" required>
				  </div>
				  <div class="form-group">
				    <label for="ad_re_password">RE-TYPE NEW PASSWORD</label>
				    <input type="password" class="form-control" id="ad_re_password" name="ad_re_password" placeholder="Re-Type your new password" required>
				  </div>
				  <input style="visibility:hidden;display:none;" type="file" name="users_avatar" value="<?= $edit_ad_profile; ?>" id="users_avatar">
				  <input style="visibility:hidden;display:none;" type="text" name="ad_id" value="<?= $edit_ad_id; ?>">
				  <button id="edit_admin_submit" type="submit" class="btn btn-default btn-block">Edit Now
				  		<i class="fa fa-send"></i>
				  </button>
				</form>
			</div><!-- end of container -->
        </div><!-- end of container fluid -->
      </div><!-- end of modal body -->
    </div><!-- end of modal-content -->
  </div><!-- end of modal-dialog -->
</div><!-- end of modal -->
<?php endif; ?>
<!-- ////////////////////////////////// end of edit profile //////////////////////////////////// -->

<!-- ////////////////////////////////// add profile //////////////////////////////////// -->
<?php if (isset($_SESSION['admin'])) : ?>
<div class="modal fade" role="dialog" aria-labelledby="admin_edit_profile" id="admin_add_profile">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container-fluid">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          	<div class="col-sm-10 col-sm-offset-1">
	           	<h4 align="center" class="">Add Another Admin <i style="color: #ff6d00;" class="fa fa-plus-square"></i></h4>
	            <svg height="15" width="100%">
					<g fill="none" stroke="#333" stroke-width="10">
						<path stroke-dasharray="5,5" d="M0 2 l600 0" />
					</g>
				</svg>
				<div class="row" id="sg_up_main_div">
					<div class="col-sm-12 col-xs-12" align="center">
						<label for="">UPLOAD YOUR AVATAR</label>
					</div>
					<div align="center" class="row col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-4" id="add_upload_avatar" data-toggle="tooltip" data-placement="left" title="Click to upload avatar">
						<img style="display: none;" id="add_avatar_img" src=""  class="img-responsive img-thumbnail" alt="">
						<i id="add_avatar_icon" class="fa fa-user"></i>
						<img id="add_avatar_loader" class="img-responsive center-block" src="<?php echo base_url(); ?>images/default_img/default (7).svg">
					</div>
					<div class="col-sm-12 col-xs-12" align="center">
						<span id="add_avatar_error"></span>
					</div>
				</div>
				<form method="post" action="<?= base_url(); ?>shop/add_admin">
				  <div class="form-group">
				    <label for="ad_username">USERNAME</label>
				    <input type="text" class="form-control" id="ad_username" name="ad_username" placeholder="Enter your username" required>
				  </div>
				  <div class="form-group">
				    <label for="ad_password">PASSWORD</label>
				    <input type="password" class="form-control" id="ad_password" name="ad_password" placeholder="Enter your password" required>
				  </div>
				  <div class="form-group">
				    <label for="ad_re_password">RE-TYPE PASSWORD</label>
				    <input type="password" class="form-control" id="ad_re_password" name="ad_re_password" placeholder="Re-type your password" required>
				  </div>
				  <input style="visibility:hidden;display:none;" type="file" name="users_avatar" id="add_users_avatar" required>
				  <button id="edit_admin_submit" type="submit" class="btn btn-default btn-block">ADD NOW
				  		<i class="fa fa-send"></i>
				  </button>
				</form>
			</div><!-- end of container -->
        </div><!-- end of container fluid -->
      </div><!-- end of modal body -->
    </div><!-- end of modal-content -->
  </div><!-- end of modal-dialog -->
</div><!-- end of modal -->
<?php endif; ?>
<!-- ////////////////////////////////// end of add profile //////////////////////////////////// -->



<div class="container-fluid" data-spy="affix" data-offset-top="800" id="storeLogoAdminDiv">
	<h3 id="storeLogo">Blackbox Tee Shop</h3>
	<div class="col-sm-6 pull-right" id="searchMainDiv">
		<div class="pull-right" id="admin_menusOpt">
        	<span class="pull-right" id="searchAdmin"><?= $_SESSION['admin']; ?> <span class="caret"></span></span>
			<img src="<?php echo base_url(); ?>images/users/<?= $ad_avatar; ?>" class="img-responsive img-circle pull-right" id="searchAdminImage">
			<div class="pull-right" id="user_menu_options_container">
				<div class="list-group" id="user_menuMainDiv" data-status="on">
				  <a data-toggle="modal" data-target="#admin_edit_profile" class="list-group-item"><i class="fa fa-pencil"></i> Edit Profile</a>
				  <a data-toggle="modal" data-target="#admin_add_profile" class="list-group-item"><i class="fa fa-plus" style="color: #00bfa5;"></i> Add Admin</a>
				  <a class="list-group-item" id="open_chat"><i class="fa fa-commenting" style="color: #76ff03;"></i> Open Chatbox</a>
				  <a class="list-group-item" onclick="openNav()"><i class="fa fa-envelope" style="color: #ffab00;"></i> View Emails</a>
				  <a id="user_logout_button" href="<?= base_url(); ?>shop/logoutAd" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
				</div>
			</div>
		</div>

<?php 
	$num_stocks	= $this->admin->getNUmOfStocks();
	$count_num_stocks = count($num_stocks);
?>
		<div class="pull-right">
			<div class="dropdown" id="admin_notify_bell">
				<i class="fa fa-bell dropdown-toggle" data-toggle="dropdown"></i>
				<?php if ($count_num_stocks > 0): ?>
							<span class="badge" id="notify_bell_badge"><?= $count_num_stocks ?></span>
				<?php endif ?>

				  <?php if (!empty($num_stocks)): ?>
				  		<ul class="dropdown-menu dropdown-menu-right" id="notify_bell_ul">
				  		<?php foreach($num_stocks as $remaining_stocks): ?>
				  			<?php $rem_stocks = $remaining_stocks['prod_name']; ?>
				  			<li class="notify_bell_lists">
				  				<a href="<?= base_url() ?>shop/update_now/<?= $remaining_stocks['prod_id'] ?>" data-toggle="tooltip" data-placement="left" data-container="body" title="<?= $remaining_stocks['prod_stocks'] ?> PCS">
				  				<img src="<?php echo base_url(); ?>images/products/<?= $remaining_stocks['image0'] ?>" class="">
				  				<?=  ellipsize($rem_stocks, 25, 1) ?>
				  				</a>
				  			</li>		
				  		<?php endforeach ?>
				  		</ul>
				  <?php else: ?>
				  		<ul class="dropdown-menu dropdown-menu-right" id="notify_bell_empty">
				  			<li>Notification is empty!</li>
				  		</ul>
				  <?php endif ?>
				 
			</div>
		</div>
 
		<form id="searchForm" action="<?=  base_url(); ?>shop/searchAd" method="post">

			<div class="input-group col-sm-7 col-xs-12 pull-right" id="seacrhInputDiv">
		 		<input onblur="searchBoxLessen()" onclick="searchBoxWiden()" type="text" class="form-control input-sm" name="search" placeholder="Search for..." id="searchInput" required="">
	        	<div id="searchAddon" class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
	      </div>

		</form>

		<?php if (isset($admin)): ?>
        <div class="col-sm-5 col-xs-10" id="popoverMsgAdmin">
        	<div class="row">
        		<div class="col-sm-4" id="popoverMsgAdminImg">
        			<img src="<?php echo base_url(); ?>images/users/user-12.jpg" class="img-responsive img-rounded" width="60px">
        		</div>
        		<div>
					<?php $dateWElcome = getDate();
							$y = $dateWElcome['year'];
							$m = $dateWElcome['mday'];
							$mn = $dateWElcome['month'];
							$hr = $dateWElcome['hours'];
							$mi = $dateWElcome['minutes'];
							$time = date("h:ia",mktime($hr,$mi,0,0,0,0));
					?>
        			<p class="">Welcome back, Admin!</p>
        			<p id="dateNow">Have a nice day.</p>
        			<span id="dateNow"><?= $mn ?> <?= $m ?>, <?= $y ?></span>
        			<span><?= $time ?></span>
        		</div>
        	</div>
        </div>
        <script>
        	(function(){
        		var popoverMsgAdmin = document.getElementById('popoverMsgAdmin');
        		$(popoverMsgAdmin).slideDown('slow');
        		$(popoverMsgAdmin).animate({right:'0px'},3000);
        		$(popoverMsgAdmin).fadeOut(5000);
        	}());
        </script>
        <?php endif; ?>
	</div>
</div>
<br>
<div class="container col-sm-2 col-md-2" id="adminlists">
	<div id="adminProfile">
		<img src="<?php echo base_url(); ?>images/users/<?= $ad_avatar; ?>" class="img-responsive img-circle">
		<span><?= $_SESSION['admin']; ?></span></br>
		<span style="font-size:12px">Blackbox Administrator</span>
	</div>
	<div class="list-group" id="lists_menu">
		<li class="list-group-item" style="font-size:12px">Navigation</li>
		<a href="<?= base_url(); ?>shop/admin_home" class="list-group-item"><span class="glyphicon glyphicon-home"></span> &nbsp;&nbsp; Admin Home</a>
		<a href="<?= base_url(); ?>shop/view_products" class="list-group-item"><span class="glyphicon glyphicon-picture"></span> &nbsp;&nbsp; View Products</a>
		<a href="<?= base_url(); ?>shop/add_products" class="list-group-item"><span class="glyphicon glyphicon-plus"></span> &nbsp;&nbsp; Add Products</a>
		<a href="<?= base_url(); ?>shop/update" class="list-group-item"><span class="glyphicon glyphicon-pencil"></span> &nbsp;&nbsp; Update Products</a>
		<a href="<?= base_url(); ?>shop/delete" class="list-group-item"><span class="glyphicon glyphicon-trash"></span> &nbsp;&nbsp; Delete Products</a>
		<a href="<?= base_url(); ?>shop/logs/All/0/1/15" class="list-group-item"><span class="glyphicon glyphicon-list"></span> &nbsp;&nbsp; View Logs</a>
		<a href="<?= base_url(); ?>shop/edit" data-toggle="modal" data-target="#admin_edit_profile" class="list-group-item"><i class="fa fa-user-circle-o" style="font-size: 18px;"></i> &nbsp;&nbsp; Edit Your Profile</a>
	</div>
	<div class="list-group" id="lists_menu">
		<a href="<?= base_url(); ?>shop/order_details" class="list-group-item"><i class="fa fa-shopping-bag" style="font-size: 17px;"></i> &nbsp;&nbsp; View Order Details</a>
	</div>
	<div class="list-group" id="lists_menu">
		<a href="<?= base_url(); ?>shop/logoutAd" class="list-group-item"><span class="glyphicon glyphicon-log-out"></span> &nbsp;&nbsp; Logout</a>
	</div>
</div>

<div id="mySidenav" class="sidenav">
	<?php $resultEmails = $this->admin->getEmails(); ?>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php foreach ($resultEmails as $allemails) : ?>
  	<p><?= $allemails['email']; ?></p>
  <?php endforeach; ?>
</div>


<script>
	var base = $("#base").attr("value");

	function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
	}

	/* Set the width of the side navigation to 0 */
	function closeNav() {
	    document.getElementById("mySidenav").style.width = "0";
	}

	$(document).ready(function(){
		$('#searchAddon').click(function(){
			var searchInput = $("#searchInput").val().length;
			if (searchInput >= 1) {
					$('#searchForm').submit();
			}
		})
	})

	function _(id){
		return document.getElementById(id);
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
	  $("#chatAddon").click(function(){
		var chat_value = $("#chat_box_input").val();
		var chat_user = $("#admin_chat_input").val();
		chat_value.trim();
		chat_user.trim();
		if (chat_value.length <= 0) {
			$('#chat_error').text('Please enter your chat message')
			$('#chat_error').fadeIn('fast');
			$('#chat_error_icon').fadeIn('fast');
		}
		else if (chat_user.length <= 0) {
			$('#chat_admin_err').text('Please enter message recepient.')
		}
		else{
			_('chat_box_input').value = "";
			$('#chat_img_loader').fadeIn('fast');
				$.ajax({
                    type: "POST",
                    url: base+"shop/admin_chat",
                    data: ({
                        msg: chat_value,
                        user: chat_user
                    }),
                    cache: false,
                    success: function(html) {
                    	if ((html) == 'do_not_exist') {
                    		$('#chat_admin_err').text('Sorry, this username do not exist.');
                    		$('#chat_img_loader').fadeOut('fast');
                    	}else{
                    		$('#chat_img_loader').fadeOut('slow');
                    		$('#chat_admin_err').text('');
							setTimeout(function(){
								$('#chatBodymAINdIV').scrollTop(1000000);
							},2000);
                    	}

					}//end of success
              });//end of ajax
		}
	  });

	  $("#chat_box_input").keyup(function(){
		$('#chat_error').text('')
		$('#chat_error_icon').fadeOut('fast');
		$('#chat_error').fadeOut('slow');
	  });
	  $("#admin_chat_input").keyup(function(){
		$('#chat_admin_err').text('')
	  });

	  $(document).ready(function(){

	  	$("#chat_minimize").click(function(){
	      $("#chat_interface").animate({height:"50px"});
	      $("#chat_interface").css({bottom:"0px"});
	    });

	    $("#chat_myCanvas").click(function(){
	      $("#chat_interface").animate({height:"440px"});
	      $("#chat_interface").css({bottom:"45px"});
	    });

	    $("#chat_close").click(function(){
	      $("#chat_interface").animate({height:"0px"},1500);
	      $("#chat_interface").css({border:"none"});
	      $("#chat_interface").css({bottom:"0px"});
	    });

	    $("#open_chat").click(function(){
	      $("#chat_interface").fadeIn('fast');
	      $("#chat_interface").animate({height:"440px"},1500);
	      $("#chat_interface").css({bottom:"45px"});
	    });

	  });

	  $(setInterval(function(){
		  $('#chatBodymAINdIV').load(base+'shop/chat_admin_display');
		  $('#chat_noti_msg').load(base+'shop/admin_notify_msg');
	  }, 5000))
	});

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
			}
			else if (typeImg != 'jpeg' && typeImg != 'jpg' && typeImg != 'png' && typeImg != 'gif' && typeImg != 'bmp') {
				$('#sg_avatar_error').text('Only images are accepted');
				$('#sg_avatar_img').fadeOut('fast');
				$('#sg_avatar_icon').fadeIn('fast');
				$('#sg_up_upload_avatar').css('border','1px solid #f44336');
			}
			else if (imageSize > 1000000) {
				$('#sg_avatar_error').text('Sorry, this file is too large.');
				$('#sg_avatar_img').fadeOut('fast');
				$('#sg_avatar_icon').fadeIn('fast');
				$('#sg_up_upload_avatar').css('border','1px solid #f44336');
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
									$('#sg_avatar_img').attr('src','<?php echo base_url(); ?>'+data[0].file);
									$('#sg_avatar_img').fadeIn('fast');
									$('#users_avatar').attr('value',data[0].name);
									setTimeout(function(){
											$('#avatar_loader').fadeOut('slow');
										},3000);
					}//end of displayUploads
			})//end of avatar click
	})

	$(document).ready(function(){
		$('#add_upload_avatar').mouseover(function(){
			$('#add_upload_avatar').css('backgroundColor', '#03a9f4');
			$('#add_upload_avatar').css('cursor', 'pointer');
			$('#add_avatar_icon').css('color', '#fff');
		})
		$('#add_upload_avatar').mouseleave(function(){
			$('#add_upload_avatar').css('backgroundColor', '');
			$('#add_upload_avatar').css('cursor', '');
			$('#add_avatar_icon').css('color', '');
		})

		$('#add_upload_avatar').click(function(e){
			e.preventDefault();
			var users_avatar = _('add_users_avatar');
			users_avatar.click();
			users_avatar.onchange = function(e){
				upload(e.target.files);
			}
		var upload = function(files){
			var imageType = files[0].type;
			var imageSize = files[0].size;
			var typeImg = imageType.substring(imageType.lastIndexOf("/") + 1).toLowerCase();
			if (files.length > 1) {
				$('#add_avatar_error').text('Please upload only one image.');
				$('#add_avatar_img').fadeOut('fast');
				$('#add_avatar_icon').fadeIn('fast');
				$('#add_upload_avatar').css('border','1px solid #f44336');
				$('#add_users_avatar').attr('value','');
			}
			else if (typeImg != 'jpeg' && typeImg != 'jpg' && typeImg != 'png' && typeImg != 'gif' && typeImg != 'bmp') {
				$('#add_avatar_error').text('Only images are accepted');
				$('#add_avatar_img').fadeOut('fast');
				$('#add_avatar_icon').fadeIn('fast');
				$('#add_upload_avatar').css('border','1px solid #f44336');
				$('#add_users_avatar').attr('value','');
			}
			else if (imageSize > 1000000) {
				$('#add_avatar_error').text('Sorry, this file is too large.');
				$('#add_avatar_img').fadeOut('fast');
				$('#add_avatar_icon').fadeIn('fast');
				$('#add_upload_avatar').css('border','1px solid #f44336');
				$('#add_users_avatar').attr('value','');
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
									$('#add_avatar_loader').fadeIn('fast');
									$('#add_upload_avatar').css('border','transparent');
                  					$('#add_avatar_error').text('');
									$('#add_avatar_icon').fadeOut('fast');
									$('#add_avatar_img').attr('src','<?php echo base_url(); ?>'+data[0].file);
									$('#add_avatar_img').fadeIn('fast');
									$('#add_users_avatar').attr('value',data[0].name);
									setTimeout(function(){
											$('#add_avatar_loader').fadeOut('slow');
										},3000);
					}//end of displayUploads
			})//end of avatar click
	})

	$(document).ready(function(){
	 	$('#admin_menusOpt').click(function(){
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

</script>
