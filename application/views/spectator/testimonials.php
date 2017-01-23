<div class="container">
   <div class="col-md-8 col-md-offset-2">
      <div class="row">

         <h2 align="center" id="headerTestimonials">User Feedbacks</h2>

         <?php if (isset($testimonials) && !empty($testimonials)): ?>

         <?php $i = 2; ?>
         <?php foreach ($testimonials as $row): ?>
         <?php $x = $i % 2; ?>
         <?php if ($x == 0): ?>

         <?php
               $date_created = $row['date_created'];
               $yr = substr($date_created, 0,4);
               $mnth = substr($date_created, 5,2);
               $dy = substr($date_created, 8,2);
               $hr = substr($date_created, 11,2);
               $min = substr($date_created, 14,2);
               $testimonial_date = date("M d, Y",mktime(0,0,0,$mnth,$dy,$yr));
               $testimonial_time = date("h:ia",mktime($hr,$min,0,0,0,0));
         ?>

               <div class="row col-md-12">
                  <div class="col-md-8 pull-left" id="testimonials_left">

                     <div class="col-md-2 col-xs-6" id="test_img_wrapper">
                        <?php if (!empty($row['profile'])): ?>
                           <img src="<?php echo base_url(); ?>images/users/<?= $row['profile'] ?>" class=
                           "img-responsive img-circle" alt="" data-container="body" data-toggle="tooltip" data-placement=
                           "left" title="<?= $row['username'] ?>" />
                        <?php else: ?>
                           <i class="fa fa-user-circle-o"></i>
                        <?php endif; ?>
                     </div>

                     <div class="col-md-10">
                        <div class="" align="center">
                           <label for=""><?= $row['title']?></label>
                        </div>
                        <p><?= $row['details'] ?></p>
                        <p>
                           <small><?= $testimonial_date ?> <?= $testimonial_time ?></small>
                        </p>
                     </div>
                  </div>
               </div>

         <?php else: ?>

               <div class="row col-md-12">
                  <div class="col-md-8 pull-right" id="testimonials_right">
                     <div class="col-md-10">
                        <div class="" align="center">
                           <label for=""><?= $row['title']?></label>
                        </div>
                        <p><?= $row['details'] ?></p>
                        <p>
                           <small><?= $testimonial_date ?> <?= $testimonial_time ?></small>
                        </p>
                     </div>
                     <div class="col-md-2 col-xs-6" id="testRight_img_wrapper">
                        <?php if (!empty($row['profile'])): ?>
                           <img src="<?php echo base_url(); ?>images/users/<?= $row['profile'] ?>" class=
                           "img-responsive img-circle" alt="" data-container="body" data-toggle="tooltip" data-placement=
                           "right" title="<?= $row['username'] ?>" />
                        <?php else: ?>
                           <i class="fa fa-user-circle-o"></i>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>

         <?php endif; ?>

         <?php $i++; endforeach; ?>

         <?php else: ?>

            <div class="alert alert-warning" align="center" style="height:400px">
               <h5>Sorry! there is no testimonials to display. <i class="fa fa-warning"></i> </h5>
            </div>

         <?php endif; ?>

      </div><!--end of row -->

      <div class="row bg-danger" id="testimonial_pls_login">
         <p>
            Please login to create your feedback.
         </p>
      </div>

   </div> <!--end of column8 -->
</div> <!--end of container -->


<script type="text/javascript">
   $('document').ready(function(){
       $('[data-toggle="tooltip"]').tooltip();
   });
</script>
