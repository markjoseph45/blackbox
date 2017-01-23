<input style="display:none;visibility:hidden;" id="base" type="hidden" value="<?= base_url(); ?>">

<div class="bg-danger col-sm-5 col-sm-offset-3" align="center" id="confirmationMsg">
	<p>
		Do you really want to delete this admin log? &nbsp;
		<a id="logsHrefDelete" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
		<button onclick="cancel()" id="logsCancel" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-share-alt"></span> Cancel</button>
	</p>
</div>

<div class="col-sm-7">
	<div class="panel panel-default">
		<div class="panel-header bg-danger" id="logsHeader">
			<h3 class="panel-title">VIEW LOGS</h3>
		</div>

		<div class="panel-body">
		<div class="col-sm-2 col-xs-4" id="loadingLogsImg">
			<div align="center">
				<img src="<?php echo base_url(); ?>images/default_img/ring.svg" class="img-responsive img-circle" width="40px">
			</div>
			<p align="center">Deleting...</p>
		</div>
		<div class="col-sm-6 col-sm-offset-3 col-xs-9 bg-danger" id="successLogsMsg" align="center">
			<p><span class="glyphicon glyphicon-thumbs-up"></span> Succesfully deleted one admin logs.</p>
		</div>
		<div class="row" id="dropdownLogsRow">
			<div class="dropdown col-sm-6" id="dropdownLogs">
				  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				    FILTER BY
				    <span class="caret"></span>
				  </button>
				  <span id="logsFilteredBy">Filtered by <?= $status; ?></span>
				  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				    <li><a href="<?= base_url(); ?>shop/logs/Logged_in/0/1/15"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Logged In</a></li>
				    <li><a href="<?= base_url(); ?>shop/logs/Logged_out/0/1/15"><span class="glyphicon glyphicon-log-out"></span> &nbsp; Logged Out</a></li>
				    <li><a href="<?= base_url(); ?>shop/logs/Added/0/1/15"><span class="glyphicon glyphicon-plus"></span> &nbsp; Added Products</a></li>
				    <li><a href="<?= base_url(); ?>shop/logs/Updated/0/1/15"><span class="glyphicon glyphicon-open"></span> &nbsp; Updated Products</a></li>
				    <li><a href="<?= base_url(); ?>shop/logs/Deleted/0/1/15"><span class="glyphicon glyphicon-trash"></span> &nbsp; Deleted Products</a></li>
				    <li><a href="<?= base_url(); ?>shop/logs/All/0/1/15"><span class="glyphicon glyphicon-eye-open"></span> &nbsp; View All</a></li>
				  </ul>
			</div>

		<?php if (isset($numOfLogs) && !empty($numOfLogs)): ?>
			<div class=" col-sm-6" id="logsPageResults">
				<?php if ($activePage == 0): ?>
					<span class="pull-right">Showing page <b>1</b> of <b>1</b> pages</span>
				<?php else: ?>
					<span class="pull-right">Showing page <b><?= $activePage; ?></b> of <b><?= $num_of_pages; ?></b> pages</span>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		</div>

	<?php if (isset($numOfLogs) && !empty($numOfLogs)): ?>
		<div class="table-responsive" style="margin-top:5px">
			<table class="table table-striped table-condensed table-bordered">
				<thead>
					<tr id="theadForTH">
						<td>USERNAME</td>
						<td>ACTIVITY</td>
						<td>ACTIVITY DATE</td>
						<td>ACTION</td>
					</tr>
				</thead>
				<tbody id="logstbody">
				<?php $count = 1; foreach ($logs as $row): $time = $row['activity_date'];
					$loggedInUsername = $row['username'];
					$resultImage = $this->admin->geAdmintImage($loggedInUsername);
					$imageADmin = $resultImage->profile;
					$date = substr($time, 0, 10);
					$yearFull = str_replace("-","/",$date);
				 	$minutes = substr($time, 11); ?>
					<tr id="deleteRow<?= $count; ?>">
						<td> &nbsp; <?= $row['username']; ?><img src="<?php echo base_url(); ?>images/users/<?= $imageADmin; ?>" class="img-responsive img-circle pull-left"></td>
						<td><?= $row['activity']; ?></td>
						<td><?= $yearFull; ?> &nbsp; <span id="logsSpan"><?= $minutes; ?></span></td>
						<td> <button onclick="deleteThis($(this))" data-count="<?= $count; ?>" id="<?= $row['log_id']; ?>" data-status="<?= $status ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button></td>
					</tr>
				<?php $count++; endforeach; ?>
				</tbody>
			</table>
		</div>
	<?php endif; ?>
		</div> <!-- end panel-body -->

	<?php if (isset($numOfLogs) && !empty($numOfLogs)): ?>

	<div class="panel-footer" id="panelFooterPager">
	<?php if ($numOfLogs > 0 && !empty($numOfLogs)): $countRow = $numOfLogs / 15; ?>
		<div class="row" id="pagerRow" align="center">
			<ul class="pagination" id="ulPager">
			    <li id="previousPager" <?php if ($activePage == 1 || $activePage == 0): ?> class="disabled" <?php endif; ?>>
			      <a <?php if ($activePage != 1 && $activePage != 0): ?> onclick="previous($(this))" <?php endif; ?> id="<?php echo $activePage; ?>" data-status="<?= $status; ?>" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>

		  <?php if (isset($activePage)):
				    $offset = 0;
				    $pageNUMbEr = 1;
				    $pageLastNumber = 1;
				    for ($i=0; $i < $countRow; $i++): $x = $i + 1;
				    	$lowestPage = $activePage - 2;
				    	$highestPage = $activePage + 2;
				    	if ($highestPage > $num_of_pages):
				    		if ($activePage == $num_of_pages):
				    			if ($lowestPage-2 <= $x && $highestPage >= $x):
						    		if ($pageLastNumber <= 5): ?>
						    			<li id="pageNum">
								    		<a <?php if ($x == $activePage): ?> style="background-color:#f44336;color:white" <?php endif; ?> id="page<?php echo $x; ?>" class="<?php echo $offset;  ?>" href="<?= base_url(); ?>shop/logs/<?php echo $status; ?>/<?php echo $offset;  ?>/<?php echo $x;  ?>/15"><?php echo $x;  ?></a>
								    	</li>
						      <?php $pageLastNumber++;
						    		else:
							  			break;
						    		endif;
					    		endif;
					    	else:
					    		if ($lowestPage-1 <= $x && $highestPage >= $x):
						    		if ($pageLastNumber <= 5): ?>
						    			<li id="pageNum">
								    		<a <?php if ($x == $activePage): ?> style="background-color:#f44336;color:white" <?php endif; ?> id="page<?php echo $x; ?>" class="<?php echo $offset;  ?>" href="<?= base_url(); ?>shop/logs/<?php echo $status; ?>/<?php echo $offset;  ?>/<?php echo $x;  ?>/15"><?php echo $x;  ?></a>
								    	</li>
						      <?php $pageLastNumber++;
						    		else:
							  			break;
						    		endif;
					    		endif;
					    	endif;
					    elseif ($lowestPage < 1):
					        if ($x <= 5): ?>
					    	<li id="pageNum">
						    	<a <?php if ($x == $activePage): ?> style="background-color:#f44336;color:white" <?php endif; ?> id="page<?php echo $x; ?>" class="<?php echo $offset;  ?>" href="<?= base_url(); ?>shop/logs/<?php echo $status; ?>/<?php echo $offset;  ?>/<?php echo $x;  ?>/15"><?php echo $x;  ?></a>
						    </li>
				  	  <?php else:
								break;
							endif;
					    elseif ($lowestPage <= $x && $highestPage >= $x):
					    	if ($pageNUMbEr <= 5): ?>
					    		<li id="pageNum">
						    		<a <?php if ($x == $activePage): ?> style="background-color:#f44336;color:white" <?php endif; ?> id="page<?php echo $x; ?>" class="<?php echo $offset;  ?>" href="<?= base_url(); ?>shop/logs/<?php echo $status; ?>/<?php echo $offset;  ?>/<?php echo $x;  ?>/15"><?php echo $x;  ?></a>
						    	</li>
					  <?php $pageNUMbEr++;
					  		else:
					  			break;
					  		endif;
						endif;
				     	$offset = $offset + 15;
				     endfor; //end of for_loop
			    endif; ?>
				<li id="nextPager" <?php if ($activePage == $x || $activePage == 0): ?> class="disabled" <?php endif; ?>>
			      <a <?php if ($activePage != $x && $activePage != 0): ?> onclick="next($(this))" <?php endif; ?> id="<?php echo $activePage; ?>" data-status="<?= $status; ?>" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			    &nbsp; &nbsp; &nbsp; &nbsp;

			      <a <?php if ($activePage == 0): ?> style="background-color:#f44336;color:white" <?php endif; ?> id="viewAll" class="pull-right" href="<?= base_url(); ?>shop/logs/<?php echo $status; ?>/0/0/0">
			      	View All
			      </a>

  			</ul>
  		</div> <!-- end of row -->
  		<?php endif; ?>
	</div> <!-- end of panel-footer -->
	<?php else: ?>
		<div class="" align="center" style="padding:30px;padding-top:10px;color:#f44336">
			<h4 id="logsEmptyMsg">This Admin Logs is Empty <span class="glyphicon glyphicon-exclamation-sign"></span></h4>
		</div>

		<script>
		var my = setInterval(function(){hideMsg()},500);
		function hideMsg(){
			var msg = document.getElementById('logsEmptyMsg');
			$(msg).fadeOut(500);
			showMsg();
		}
		function showMsg(){
			var msg = document.getElementById('logsEmptyMsg');
			$(msg).fadeIn(500);
		}
		</script>
	<?php endif; ?>
	</div>
</div>

<script>
function _(id){
	return document.getElementById(id);
}

var base = $("#base").attr("value");

(function(){
	setTimeout(function(){
		var msg = _('message');
		$(msg).fadeOut('slow');
	},3000)
}());

function previous($scope){
	var pagerId = $($scope).attr('id');
	var status = $($scope).attr('data-status');
	var id = '#page'+pagerId;
	var off = $(id).attr('class');
	var offset = off - 15;
	var x = pagerId - 1;
	var href = base+'/shop/logs/'+status+'/'+offset+'/'+x+'/15';
	$($scope).attr('href',href);
}
function next($scope){
	var pagerId = $($scope).attr('id');
	var status = $($scope).attr('data-status');
	var id = '#page'+pagerId;
	var off = $(id).attr('class');
	var offset = parseInt(off) + 15;
	var x = parseInt(pagerId) + 1;
	var href = base+'/shop/logs/'+status+'/'+offset+'/'+x+'/15';
	$($scope).attr('href',href);
}
function deleteThis($scope){
	var log_id = $($scope).attr('id');
	var status = $($scope).attr('data-status');
	var data_count = $($scope).attr('data-count');
	var deleteHref = _('logsHrefDelete');
	$("#logsCancel").attr('data-count', data_count);
	$("#logsHrefDelete").attr('data-id', log_id);
	$("#logsHrefDelete").attr("data-status", status);
	$("#logsHrefDelete").attr('data-count', data_count);
	var deleteRow = _('deleteRow'+data_count);
	deleteRow.style.backgroundColor = '#ff8a80';
	var confirmMsg = _('confirmationMsg');
	$(confirmMsg).fadeIn('fast');
/*	deleteHref.href = base+'/shop/deleteLogs/'+status+'/'+log_id;*/
}
function cancel(){
	var confirmMsg = _('confirmationMsg');
	$(confirmMsg).fadeOut('fast');
	var data_count = $("#logsCancel").attr("data-count");
	var deleteRow = _("deleteRow" + data_count);
	deleteRow.style.backgroundColor = '';
}
$(document).ready(function() {
        $('#logsHrefDelete').click(function() {
        	var confirmMsg = _('confirmationMsg');
			$(confirmMsg).fadeOut('fast');
			$("#loadingLogsImg").fadeIn('fast');
            var log_id = $("#logsHrefDelete").attr("data-id");
            var status = $("#logsHrefDelete").attr('data-status');
            var data_count = $("#logsHrefDelete").attr('data-count');
                $.ajax({
                    type: "POST",
                    url: base+'/shop/deleteLogs/'+status+'/'+log_id,
                    data: ({
                        id: log_id
                    }),
                    cache: false,
                    success: function(html) {
                        $("#deleteRow" + data_count).fadeOut('slow');
                        $("#loadingLogsImg").fadeOut('fast');
                        $("#successLogsMsg").fadeIn('slow');
                        setTimeout(function(){
                     		$('#successLogsMsg').fadeOut('slow');
                  		},3000);
                    }
                });
     });
});

</script>
