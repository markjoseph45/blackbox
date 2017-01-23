<input style="display:none;visibility:hidden;" id="base" type="hidden" value="<?= base_url(); ?>">

<div class="col-sm-7 container-fluid">
	<div class="panel panel-default">
		<div class="panel-header" id="headerOrderDetails">

			<div class="dropdown" style="display: inline;">
			  <button class="btn btn-default btn-sm dropdown-toggle" type="button" onclick="$('#order_filter_ul_wrapper').slideToggle('fast')">FILTER BY
			  		<span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" id="order_filter_ul_wrapper">
					<form action="<?= base_url(); ?>shop/orderdate" method="post">
							<input type="date" name="order_date" class="form-control input-sm" placeholder="yyyy-mm-dd">
							<input type="submit" name="submit_order" class="btn btn-info btn-xs" value="Submit">
					</form>
					<br/>
			    	<li><a href="<?= base_url(); ?>shop/wkorder">Last Week's Order</a></li>

					<div class="dropdown">
					  	  <a class="dropdown-toggle" data-toggle="dropdown" id="order_lst_mnt">Last Month's Order</a>
						  <ul class="dropdown-menu">
							  <?php $todays_date = date("Y-m-d");
									  $startdate = strtotime("$todays_date");
									  $enddate = strtotime("-7 months",$startdate);
									  $m = 1;
									  while ($startdate >  $enddate) :
										  $mnth = date("F", $startdate);
										  $month = date("Y-m", $startdate);
										  if ($m != 1) : ?>
										  			<li id="order_mnth"><a href="<?= base_url(); ?>shop/lstmnth/<?= $month; ?>"><?= $mnth; ?></a></li>
									  	  <?php endif; ?>
								<?php
 									   $startdate = strtotime("-1 months", $startdate);
										$m++;
									  endwhile;
  								?>

						  </ul>
					</div>

						<li><a href="<?= base_url(); ?>shop/lstmnth/2016">Last Year's Order</a></li>
			  </ul>
			</div>
			<h3 class="panel-title pull-right">ORDER DETAILS</h3>
		</div>
		<div class="panel-body">
		<?php if(isset($orderdata) && !empty($orderdata)) : ?>
			<div class="table-responsive">
			 <table class="table table-condensed" id="order_table">
					<thead id="theadOrderDetails">
						<tr id="theadForTH">
							<td>CUSTOMER</td>
							<td>ITEM</td>
							<td>QTY</td>
							<td>PRICE</td>
							<td>SUBTOTAL</td>
							<td>DATE ORDERED</td>
						</tr>
					</thead>

						<?php if (isset($orderdata)) : $loop = 1; ?>
								<?php foreach($orderdata as $userorder) :
											$price = number_format($userorder['item_prize'], 2);
											$sub = $userorder['item_prize'] * $userorder['item_qty'];
											$subtotal = number_format($sub, 2);
											$order_id = $userorder['order_id'];
											$shipping = $this->admin->getShipTo($order_id);
											foreach ($shipping as $shiperImg) :
														$fname = $shiperImg['fname'];
														$lname = $shiperImg['lname'];
														$mname = $shiperImg['mname'];
														$data = array('first_name' => $fname, 'last_name' => $lname, 'middle_name' => $mname);
											endforeach;

											$date_purchased = $userorder['date_ordered'];
											$yr = substr($date_purchased, 0,4);
											$mnth = substr($date_purchased, 5,2);
											$dy = substr($date_purchased, 8,2);
											$hr = substr($date_purchased, 11,2);
											$min = substr($date_purchased, 14,2);
											$date_full_year = substr($date_purchased, 0,10);
											$todays_date = date("Y-m-d");
											$date_full = date_create($date_full_year);
											$today = date_create($todays_date);
											$date_diff = date_diff($date_full, $today);
											$date_difference = $date_diff->format("%a");
											// if ($date_difference == 0):
											// 	$chatting_date = 'Today';
											// elseif ($date_difference == 1):
											// 	$chatting_date = 'Yesterday';
											// else:
											$date_real = date("M d, Y",mktime(0,0,0,$mnth,$dy,$yr));
											//endif;
											$order_time = date("h:ia",mktime($hr,$min,0,0,0,0));


										 $userImg =	$this->admin->getUserImg($data);
										 foreach ($userImg as $usr) :
										 				$profile = $usr['profile'];
														$orderUsername = $usr['username'];
										 endforeach;

								?>
											<tbody class="tbodyOrderDetails">
												<tr>
															<td align="center" class="">
																<?php if(empty($profile)) : ?>
																<i id="order_detailsIcon" class="fa fa-user-circle" data-container="body" data-toggle="tooltip" data-placement="top" title="Size not available"></i>
															<?php else: ?>
																<img id="order_user_image" src="<?php echo base_url(); ?>images/users/<?= $profile; ?>" class=
																"img-responsive img-circle" data-container="body" data-toggle="tooltip" data-placement="left" title="<?= $orderUsername ?>">
															<?php endif; ?>
															</td>
															<td class="order_first_tr">
																<img id="order_detailsImg" src="<?php echo base_url(); ?>images/products/<?= $userorder['item_image'] ?>" class="img-responsive" width="60px">
															</td>
															<td class="order_first_tr"><?= $userorder['item_qty']; ?></td>
															<td class="order_first_tr">&#8369; <?= $price; ?></td>
															<td class="order_first_tr">&#8369; <?= $subtotal; ?></td>
															<td class="order_first_tr"><?= $date_real; ?> &nbsp;<span id="logsSpan"><?= $order_time; ?></span></td>

												</tr>

												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td><a onclick="slideOrder($(this))" id="order_seemore" data-loop="<?= $loop; ?>">see more...<span class="caret"></span></a> </td>
												</tr>

									<?php if(!empty($shipping)):
											foreach ($shipping as $shipper) : ?>
													<tr class="details_row" id="det_row<?= $loop; ?>">
															<td colspan="2" class="order_sec_tr">
																<label>First Name:</label> <span><?= $shipper['fname'] ?></span><br/>
																<label>Last Name:</label> <span><?= $shipper['lname'] ?></span><br/>
																<label>Middle Name:</label> <span><?= $shipper['mname'] ?></span><br/>
															</td>
															<td colspan="3" class="order_sec_tr">
																<label>Province:</label> <span><?= $shipper['province'] ?></span><br/>
																<label>City/Municipality:</label> <span><?= $shipper['city'] ?></span><br/>
																<label>Barangay:</label> <span><?= $shipper['barangay'] ?></span><br/>
															</td>
															<td class="order_sec_tr">
																<label>Transaction ID:</label> <br/>
																	<span><?= $shipper['trx_id'] ?></span> <br/>
																<label>Payment Through: </label> <br/>
																	<span><?= $shipper['payment_method'] ?></span> <br/>
																<label>Payment Status: </label> <br/>
																	<span id="viewStatus<?= $loop ?>"><?= $shipper['payment_status'] ?></span>

																	<div class="dropdown">
																		<button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Update Status
																		  	<span class="caret"></span>
																		 </button>
																		 <ul class="dropdown-menu" style="font-size: 12px">
																		     <li><a data-id="<?= $shipper['shipping_id'] ?>" looper="<?= $loop; ?>" id="status_comp" onclick="statCompleted($(this))">Completed</a></li>
																		     <li><a data-id="<?= $shipper['shipping_id'] ?>" looper="<?= $loop; ?>" id="status_pend" onclick="statPending($(this))">Pending</a></li>
																		 </ul>
																	</div>
															</td>
													</tr>
								<?php endforeach; ?>
									<?php endif; ?>
								</tbody>

								<td></td>
						<?php $loop++; endforeach; ?>
				<?php endif; ?>

			</table>
			</div>
			<?php else : ?>
			<div align="center" class="alert alert-warning">
				<p>Sorry! there is no order.</p>
			</div>
			<?php endif; ?>
		</div>
		<div class="panel-footer" id="orderDetailsFooter">
			<h5><em>Shop with our great stuff's...</em></h5>
		</div>
	</div>
</div>


<script type="text/javascript">

var base = $('#base').attr('value');

function _(id) {
	return document.getElementById(id);
}
function slideOrder($scope) {
	var loop = $($scope).attr('data-loop');
	$("#det_row"+loop).slideToggle("fast");
}


function statCompleted($scope) {
	var id = $($scope).attr("data-id");
	var looper = $($scope).attr("looper");
	$.ajax({
			  type: "POST",
			  url: base+"shop/paystatus",
			  data: ({
					id: id,
					status: 'Completed'
			  }),
			  cache: false,
			  success: function(html) {
				 $('#viewStatus'+looper).text('Completed');
			  }
	 })
}

function statPending($scope) {
	var id = $($scope).attr("data-id");
	var looper = $($scope).attr("looper");
	$.ajax({
			  type: "POST",
			  url: base+"shop/paystatus",
			  data: ({
					id: id,
					status: 'Pending'
			  }),
			  cache: false,
			  success: function(html) {
				 $('#viewStatus'+looper).text('Pending');
			  }
	 })
}

</script>
