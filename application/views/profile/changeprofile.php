<section class="my-4 py-4">
    <div class="container">
        <div class="ads-info text-center" style="display: block;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="my-ads section" style="display: block;">
                        <div class="ad-profile section">
                            <div class="user-profile">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="user">
                                            <h2>Hello, <a href="<?php echo base_url().'/profile' ?>"><?php echo $user->username ?></a></h2>
                                            <h5>You last logged in at: <?php echo date("Y-m-d",$user->last_login) ?></h5>    
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="text-align: right;">
                                        <?php if ($user->profile): ?>
                                          <img src="<?php echo base_url().'assets/temp'.$user->profile; ?>" class="user-image" alt="User Image" width="100%">
                                        <?php else: ?>
                                          <img src="<?php echo base_url().'assets/temp'.'/avatar-placeholder.svg'; ?>" class="user-image" alt="User Image" width="100%">
                                        <?php endif ?>
                                    </div>
                                    <div class="col-md-8" style="text-align: right; padding-top: 10px;">
                                     <h3 class="text-left">
                                        <?php if (isset($message)): ?>
                                          <?php echo($message['error']) ?>
                                        <?php endif ?>
                                     </h3>
                                        <div class="profile">
                                            <div style="padding-top: 20px;">
                                                <form action="<?php echo base_url().'profile/changeprofile/'.$user->id ?>" method="post" enctype="multipart/form-data">
                                                    <div class="col-md-8">
                                                        <input type="file" name="userfile" id="userfile" class="form-control">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="submit" value="Upload Image" name="submit" class="btn btn-primary btn-lg">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>