
<div class="container-fluid" id="footer_wrapper">
    <svg height="15" width="100%">
		<g fill="none" stroke="#333" stroke-width="10">
			<path stroke-dasharray="5,5" d="M0 2 4000 0" />
		</g>
	</svg>
	<div class="container">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="row" id="footer_row_wrapper">

				<div class="col-sm-2" id="footer_like_us">
					<h4 align="center">LIKE US ON</h4>
					<hr style="width: 50px;border: 1px solid #ccc;">
					<div class="">
						<a href="https://www.facebook.com/blackboxteeshop" target="_blank" onmouseover="clearImg(this)" onmouseout="unclearImg(this)">
							<img src="<?php echo base_url(); ?>images/default_img/fb.jpg" class="img-responsive img-circle" alt="">
							<span>facebook</span>
						</a>
					</div>
					<div class="">
						<a href="https://www.twitter.com/blackboxteeshop" target="_blank" onmouseover="clearImg(this)" onmouseout="unclearImg(this)">
							<img src="<?php echo base_url(); ?>images/default_img/twitter.png" class="img-responsive img-circle" alt="">
							<span>twitter</span>
						</a>
					</div>
					<div class="">
						<a href="https://www.instagram.com/blackboxteeshop" target="_blank" onmouseover="clearImg(this)" onmouseout="unclearImg(this)">
							<img src="<?php echo base_url(); ?>images/default_img/insta.jpg" class="img-responsive img-circle" alt="">
							<span>instagram</span>
						</a>
					</div>
					<div class="">
						<a href="https://www.youtube.com/blackboxteeshop" target="_blank" onmouseover="clearImg(this)" onmouseout="unclearImg(this)">
							<img src="<?php echo base_url(); ?>images/default_img/youtube.png" class="img-responsive img-circle" alt="">
							<span>youtube</span>
						</a>
					</div>
				</div>
				<div class="col-sm-2" align="center" id=footer_help>
					<h4>HELP</h4>
					<hr style="width: 50px;border: 1px solid #ccc;">
					<p><a href="" data-toggle="modal" data-target="#modal_howtobuy">How to buy?</a></p>
					<p><a href="" data-toggle="modal" data-target="#modal_shipping">Shipping</a></p>
					<p><a href="" data-toggle="modal" data-target="#modal_buy">Payment</a></p>
					<p><a href="" data-toggle="modal" data-target="#modal_return">Returns</a></p>
				</div>
				<div class="col-sm-4" id="footer_email">
					<div class="" align="center">
						<i class="fa fa-envelope" id="footer_env"></i>
						<h4 id="footer_h4">BLACKBOX NEWS</h4>
						<p id="footer_p">Sign up for the newsletter and discover the latest arrivals and promotions</p>
						<form action="<?= base_url(); ?>/shop/news" method="post" role="form">
							  <div class="form-group">
							    <input required type="email" name="news_email" class="form-control input-lg" id="footer_input" placeholder="Enter your email address">
							  </div>
							  <div class="row radio col-sm-8 col-sm-offset-2">
							    <label class="pull-left"><input type="radio" name="optradio" value="Woman" required>Woman</label>
							    <label class="pull-right"><input type="radio" name="optradio" value="Man" required>Man</label>
							  </div>
							  <button type="submit" class="btn btn-default btn-lg btn-block">Submit</button>
						</form>
					</div>
				</div>
				<div class="col-sm-2" align="center" id="footer_blackbx">
					<h4>BLACKBOX</h4>
					<hr style="width: 50px;border: 1px solid #ccc;">
					<p><a href="<?= base_url() ?>shop/testimonials">View Feedbacks</a></p>
					<p style="margin-bottom:0px">Contact Us</p>
               <p style="margin-top:0px;margin-bottom: 0px">0906 529 8922</p>
               <p style="margin-top:0px">321 4081</p>
					<p><a href="<?= base_url() ?>shop">Home</a></p>
				</div>
				<div class="col-sm-2" align="center" id="footer_about">
					<h4>ABOUT US</h4>
					<hr style="width: 50px;border: 1px solid #ccc;">
					<p><a href="" data-toggle="modal" data-target="#modal_about">About Blackbox</a></p>
					<!-- <p><a href="">Terms & Conditions</a></p> -->
					<p><a href="" data-toggle="modal" data-target="#modal_privacy">Privacy Policy</a></p>
					<p><a href="" data-toggle="modal" data-target="#modal_directory">Store Directory</a></p>
				</div>
			</div>
			<div class="" id="footer_connect">
				CONNECT WITH US
			</div>
		</div>
	</div>
</div>

<div class="container-fluid bg-danger" id="footer_bottom">
	<p>Powered by BLACKBOX TEE SHOP - Copyright © 2016 - All Rights Reserved</p>
</div>



<!-- //////////////////////////////////////// MODAL PRIVACY POLICY ///////////////////////////////////  -->

<div id="modal_privacy" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body" id="modal_body_privacy">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h3 class="modal-title" style="color:maroon">PRIVACY POLICY <i class="fa fa-lock" style="color:#ffab00;font-size:25px;"></i> </h3>
        <p>
           We take our customer’s privacy seriously and we will only collect,
           record, hold, store, disclose, transfer and use your personal
           information as outlined below. Data protection is a matter of
           trust and your privacy is important to us. We shall therefore
           only use your name and other information which relates to you
           in the manner set out in this Privacy Policy. We will only collect
           information where it is necessary for us to do so and we will only collect
           information if it is relevant to our dealings with you.
        </p>
        <p>
           We will only keep your information for as long as we are either
           required to by law or as is relevant for the purposes for which it was collected.
           You can visit the Platform (as defined in the Terms of Use) and
           browse without having to provide personal details.
           During your visit to the Platform you remain anonymous
           and at no time can we identify you unless you have an
           account on the Platform and log on with your user name and password.
        </p>
        <h3 style="color:maroon">Collection of Personal Information</h3>
        <p>
           When you create a Blackbox account, or otherwise provide us with your
           personal information through the Platform, the personal information we collect may include your:
        </p>
        <ul>
           <li>* Name</li>
           <li>* Shipping Address</li>
           <li>* Email Acount</li>
           <li>* Mobile Number</li>
           <li>* Gender</li>
        </ul>
        <p>
           You must only submit to us,
           information which is accurate and complete and not misleading and
           you must keep it up to date and inform us of changes.
           We reserve the right to request for documentation to verify the information provided by you.
        </p>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- //////////////////////////////////////// END OF MODAL PRIVACY POLICY ///////////////////////////////////  -->

<!-- //////////////////////////////////////// MODAL RETURN ///////////////////////////////////  -->

<div id="modal_return" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body" id="modal_body_return">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h3 style="color:maroon">RETURN POLICY</h3>
         <p>
            Refunds are issued within 7 days of the date the customer's order is received.
            Merchandise and packaging MUST be in the same condition as when received.
            Items may be subject to a restocking fee up to 20%.
         </p>
         <p>
            Blackbox Tee Shop
            reserves the right to refuse any return if it appears the item has been used.
            The customer is responsible for return shipping costs. If the customer's
            order included free shipping, the customer will be refunded order amount,
            less Blackbox Tee Shop's original shipping cost.
         </p>
         <p>
            If you have any questions or concerns regarding this policy, please feel free to contact us.
         </p>
         <p>
            Email: <a href="#">blackboxteeshop@gmail.com</a> or call <a href="#">88888888888</a>
         </p>

         <h3 style="color:maroon">HOURS:</h3>
         <p>
            (M-F) 10:00am - 8:00pm | (Sat) 10:00am - 6:00pm |<br/> (Sun) 11:00am - 5:00pm
         </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- //////////////////////////////////////// END OF MODAL RETURN ///////////////////////////////////  -->

<!-- //////////////////////////////////////// MODAL SHIPPING POLICY ///////////////////////////////////  -->

<div id="modal_shipping" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body" id="modal_body_privacy">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h3 class="modal-title" style="color:maroon">SHIPPING POLICY <i class="fa fa-truck" style="color:#ffab00;font-size:25px;"></i> </h3>
        <p>
          The Blackbox shipping and delivery is quite a useful and downright needed concept for online shopping in general. Many brands have to deliver the items that the customers have ordered, all to fulfill the idea that they no longer need to go to a physical store, or travel varying distances to get the products that they want. 
        </p>
        <p>
          Blackbox shipping is through the LBC company, which is a proven carrier service in the Philippines. And now that BLACKBOX is offering free shipping, it is now much eaiser now to shop online. 
        </p>
        <p>
           Today, regardless of how much items you buy, 
           or how small the price you are getting, you get free shipping if you live within 
           Tacloban Area or for those customers who purchased (5) five t-shirts or more. 
        </p>
        <p>   
           This idea truly makes effortless shopping a great bonus 
           for those who are fans of Blackbox, and provides a wonderful experience for the first time buyers!
        </p>
        <p>
           Shipments are being delivered by our service courier LBC.
        </p>
        <h3 style="color:maroon">HOURS:</h3>
         <p>
            (M-F) 10:00am - 8:00pm | (Sat) 10:00am - 6:00pm |<br/> (Sun) 11:00am - 5:00pm
         </p>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- //////////////////////////////////////// END OF MODAL SHIPPING POLICY ///////////////////////////////////  -->


<!-- //////////////////////////////////////// MODAL BUY POLICY ///////////////////////////////////  -->

<div id="modal_buy" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body" id="modal_body_privacy">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h3 class="modal-title" style="color:maroon">PAYMENT POLICY <i class="fa fa-opencart" style="color:#ffab00;font-size:25px;"></i> </h3>
        
         <div class="row buy_row">

           <div class="col-md-4">
              <img src="<?php echo base_url(); ?>images/default_img/paypa_logo.png" class="img-responsive" alt="" style="border:1px solid #ccc">
           </div>
           <div class="col-md-8">
             <p>
               Click the “PayPal” button upon arrival on the Payment Information check out page.
               You will be redirected to the PayPal Gateway wherein you may choose to create or log-in to your PayPal account.
               Select which debit / credit card account to use for payment.
               Confirm the transaction.
             </p>
           </div>

         </div>

         <div class="row buy_row">
           
           <div class="col-md-4">
              <img src="<?php echo base_url(); ?>images/default_img/palawan.png" class="img-responsive" alt="" style="border:1px solid #ccc">
           </div>
           <div class="col-md-8">
             <p>
               If you choose to pay via Palawan Remittance Center just click
               the Palawan save button upon arrival on the Payment Information check out page.
               You will be redirected to the blackbox success page and you may see your order
               details.
             </p>
           </div>

         </div>

         <div class="row buy_row">
           
           <div class="col-md-4">
              <img src="<?php echo base_url(); ?>images/default_img/cebuana.jpg" class="img-responsive" alt="" style="border:1px solid #ccc">
           </div>
           <div class="col-md-8">
             <p>
               If you choose to pay via Cebuana Pawnshop just click
               the Cebuana save button upon arrival on the Payment Information check out page.
               You will be redirected to the blackbox success page and you may see your order
               details.
             </p>
           </div>

         </div>

         <div class="row buy_row">
           
           <div class="col-md-4">
              <img src="<?php echo base_url(); ?>images/default_img/lbc.jpg" class="img-responsive" alt="" style="border:1px solid #ccc">
           </div>
           <div class="col-md-8">
             <p>
               If you choose to pay via LBC just click
               the LBC save button upon arrival on the Payment Information check out page.
               You will be redirected to the blackbox success page and you may see your order
               details.
             </p>
           </div>

         </div>

        <div class="row buy_row">
           
           <div class="col-md-4">
              <img src="<?php echo base_url(); ?>images/default_img/wu.png" class="img-responsive" alt="" style="border:1px solid #ccc">
           </div>
           <div class="col-md-8">
             <p>
               If you choose to pay via Western Union just click
               the Western Union save button upon arrival on the Payment Information check out page.
               You will be redirected to the blackbox success page and you may see your order
               details.
             </p>
           </div>

         </div>


      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- //////////////////////////////////////// END OF MODAL SHIPPING POLICY ///////////////////////////////////  -->

<!-- //////////////////////////////////////// MODAL SHIPPING POLICY ///////////////////////////////////  -->

<div id="modal_howtobuy" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body" id="modal_body_privacy">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h3 class="modal-title" style="color:maroon">HOW TO BUY <i class="fa fa-shopping-bag" style="color:#ffab00;font-size:25px;"></i> </h3>
          <p>
            So how do you buy from Blacbox Tee Shop? You can actually order through two different routes. 
            If you already know what you are buying, simply type the product at the search 
            bar and watch as the list of items that you searched for appear.
          </p>
          <ul>
            <li>Find your Product</li>
            <li>Choose your Product</li>
            <li>Check Product Information</li>
            <li>Confirm Shopping Cart</li>
            <li>Provide Delivery Information</li>
            <li>Choose your Payment</li>
            <li>Place your Order</li>
          </ul>
          <p>
             But if you are one to browse first and see what are the proper products available, you can use the different tabs and menus on the website and app’s interface to see the deals and other relevant items available at Blackbox. 
          </p>
          <p>
             Once done choosing and browsing, you can “add the items to your cart”, select the number of items you want, and “checkout” to see your order summary. Place delivery details and Finally, click the orange box to place your order, and Blackbox will do the rest. Now that you know how to order, you can now get the best items at the best prices possible through the top online shopping site in the Philippines today!
          </p>
        <h3 style="color:maroon">HOURS:</h3>
         <p>
            (M-F) 10:00am - 8:00pm | (Sat) 10:00am - 6:00pm |<br/> (Sun) 11:00am - 5:00pm
         </p>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- //////////////////////////////////////// END OF MODAL SHIPPING POLICY ///////////////////////////////////  -->


<!-- //////////////////////////////////////// MODAL SHIPPING POLICY ///////////////////////////////////  -->

<div id="modal_about" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body" id="modal_body_privacy">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h3 class="modal-title" style="color:maroon">ABOUT BLACKBOX <i class="fa fa-home" style="color:#ffab00;font-size:25px;"></i> </h3>
          
          <h3 id="about_h3">BLACKBOX TEE SHOP</h3>
          <br/>
          <h4 style="color:maroon">
            One-Stop Shopping Destination
          </h4>
          <p>
             With our shopping categories Clothing, Shoes, Bags, Sports, and Accesories. Blackboox is the place to visit for all your shopping needs. Besides an extensive selection of customize shirts and local brands, you’ll also find exciting products that are available exclusively on Blackbox. 
          </p>
          <br/>
          <h4 style="color:maroon">Easy and Accessible Shopping</h4>
          <p>
            No more traffic jams, crowds and long queues! Shop anytime, anywhere via your computer and mobile phone.
            With our quick and reliable delivery service, just sit back, relax and your package will come to you. 
          </p>
          <br/>
          <h4 style="color:maroon">Effortless Shopping in Blackbox Tee Shop</h4>
          <p>Get access to the newest shopping website in the philippines and an end-to-end selling solution. To find out more 
          <a href="<?= base_url() ?>shop">click here.</a></p>


          <h3 style="color:maroon">HOURS:</h3>
          <p>
            (M-F) 10:00am - 8:00pm | (Sat) 10:00am - 6:00pm |<br/> (Sun) 11:00am - 5:00pm
          </p>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- //////////////////////////////////////// END OF MODAL SHIPPING POLICY ///////////////////////////////////  -->

<!-- //////////////////////////////////////// MODAL DIRECTORY POLICY ///////////////////////////////////  -->

<div id="modal_directory" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body" id="modal_body_privacy">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h3 class="modal-title" style="color:maroon">STORE DIRECTORY <i class="fa fa-map-marker" style="color:#ffab00;font-size:25px;"></i> </h3>
          
          <div style="padding-bottom: 20px;padding-top: 20px;">
            <img src="<?php echo base_url(); ?>images/products/necro infectious.jpg" class="img-responsive" alt="" style="border:1px solid #ccc">
          </div>

          <p>
            For those who are interested you can come and visit our store
            located at Door #4, Village Center West Bldg.
            Brgy 44-A Salazar St., Quarry Dist.
            Tacloban City
          </p>
          <p>
            Or Contact Us at:<br/>
          <i class="fa fa-mobile"></i> Mobile No. 0906 529 8922 <br/>
          <i class="fa fa-phone"></i> Telephone No. 321 4081
          <h3 style="color:maroon">HOURS:</h3>
          <p>
            (M-F) 10:00am - 8:00pm | (Sat) 10:00am - 6:00pm |<br/> (Sun) 11:00am - 5:00pm
          </p>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- //////////////////////////////////////// END OF MODAL DIRECTORY ///////////////////////////////////  -->








<script type="text/javascript">

   function clearImg(scope) {
      var img = $(scope).children('img');
      $(img).css('opacity','1');
   }

   function unclearImg(scope) {
      var img = $(scope).children('img');
      $(img).css('opacity','.5');
   }

</script>
