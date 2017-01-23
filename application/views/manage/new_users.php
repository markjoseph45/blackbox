<?php
    $all_users = $this->admin->get_all_users();
    $num_users = count($all_users);
?>

            <div class="col-sm-3 col-xs-12" id="mainDivnewUsers">
            <div class="panel panel-default" id="newUsersMainPanel">
                <div class="panel-heading" id="newRegisteredUsersH4">
                    <h5>Registered Users <span style="background-color:teal;padding-top: 3px;" class="label pull-right"> <?= $num_users; ?> users</span></h5>
                </div>
                <div class="panel-body" id="newUsersBody" style="overflow-y: scroll;height: 260px;">
                <ul class="list-group" style="list-style-type: none;">
                <?php
                    if (isset($all_users) && !empty($all_users)):
                        foreach ($all_users as $all):
                            $this->load->helper('text');
                            $user_profile = $all['profile'];
                            $username = $all['username'];
        
                            $new_username = ellipsize($username, 8, 1);
                ?>

                                <li class="pull-left newUsers">
                                    <a href="" data-toggle="tooltip" data-placement="top" title="<?= $username; ?>">
                                    <?php if (!empty($user_profile)): ?>
                                            <img src="<?php echo base_url(); ?>images/users/<?= $user_profile; ?>" alt="" class="img-responsive img-rounded" id="new_users_image">
                                    <?php else: ?>
                                            <i class="fa fa-user-circle-o" id="new_users_icon_user"></i>
                                    <?php endif ?>
                                    </a>
                                    <h4 class="username text-ellipsis" style="margin-top: 3px;">
                                        <?= $new_username; ?>
                                        <!-- <small>Algerian</small> -->
                                    </h4>
                                </li>

                <?php
                        endforeach;
                    else:
                ?>
                    <div class="col-sm-12" style="font-size: 12px;">
                        <div class="alert alert-warning" role="alert">
                            There are no users yet!
                        </div>
                    </div>
                <?php    
                    endif;
                ?>
                </ul>
                </div>
                <div class="panel-footer text-center" style="font-size: 12px;color: gray;">
                    <em>Blackbox</em>
                </div>
            </div>
            </div>
            <!-- end panel -->

        <!-- ///////////// read user feedback ///////////// -->
<?php
    $user_feed = $this->admin->get_feedback();
    $user_feed_num = count($user_feed);
?>
            <div class="panel panel-default col-sm-3 col-xs-12 pull-right" id="panelMain">
                    <div class="panel-heading" id="readCommentsHeader">
                        <h5>Read User Feedbacks <span style="background-color:teal;padding-top: 5px;" class="label pull-right"> <?= $user_feed_num; ?> feedbacks</span></h5>
                    </div>
                    <div class="panel-body" id="readCommentsPanelBody">
                    <?php
                        if (isset($user_feed) && !empty($user_feed)) :
                            foreach ($user_feed as $feed) :
                                $feed_username = $feed['username'];
                                $feed_title = $feed['title'];
                                $feed_details = $feed['details'];
                                $feed_profile = $feed['profile'];
                                $feed_date_created = $feed['date_created'];
                                //for chat date only vey long code...
                                $yr = substr($feed_date_created, 0,4);
                                $mnth = substr($feed_date_created, 5,2);
                                $dy = substr($feed_date_created, 8,2);
                                $hr = substr($feed_date_created, 11,2);
                                $min = substr($feed_date_created, 14,2);
                                $date_full_year = substr($feed_date_created, 0,10);
                                $todays_date = date("Y-m-d");
                                $date_full = date_create($date_full_year);
                                $today = date_create($todays_date);
                                $date_diff = date_diff($date_full, $today);
                                $date_difference = $date_diff->format("%a");
                                if ($date_difference == 0):
                                    $chatting_date = 'Today';
                                elseif ($date_difference == 1):
                                    $chatting_date = 'Yesterday';
                                else:
                                    $chatting_date = date("M d, Y",mktime(0,0,0,$mnth,$dy,$yr));
                                endif;
                                $chat_time = date("h:ia",mktime($hr,$min,0,0,0,0));
                                //end of chat date code....
                    ?>
                            <div class="row" id="commentsRow">
                                <li class="readCommentsLists">
                                    <div class="col-sm-2 pull-left" id="readCommentsImageDiv" align="center">
                                        <a href="javascript:;" data-container="body" data-toggle="tooltip" data-placement="left" title="<?= $feed_username; ?>" >
                                        <?php if (!empty($feed_profile)) : ?>
                                                <img src="<?php echo base_url(); ?>images/users/<?= $feed_profile; ?>" alt="" id="feed_img" class="img-responsive img-circle">
                                        <?php else: ?>
                                                <i class="fa fa-user-circle-o" id="feed_userIcon"></i>
                                        <?php endif; ?>
                                        </a>                            
                                    </div>
                                    <div class="col-sm-10" id="readCommentsText">
                                        <?php if (!empty($feed_title)) : ?>
                                            <div align="center">
                                                <b><?= $feed_title; ?></b>
                                            </div>
                                        <?php endif; ?>
                                        <?= $feed_details; ?>
                                       <br/> 
                                       <!-- <span id="readCommentsTime">Today 5:60 pm - 12.06.2014</span> -->
                                       <span class="pull-right" id="readCommentsMinutesAgo">
                                            <?= $chatting_date; ?> <?= $chat_time; ?>
                                        </span>
                                    </div>
                                </li>
                            </div>
                    <?php
                            endforeach;
                        endif;
                    ?>
                        
                    </div>
                <div class="panel-footer text-center" style="font-size: 12px;color: gray;">
                    <em>Blackbox</em>
                </div>
            </div>

       <!-- ///////////// end of read user feedback ///////////// -->     

<script type="text/javascript">
    $('document').ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
