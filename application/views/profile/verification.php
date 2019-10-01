<section id="main" class="py-4 my-4" style="min-height: 460px;">
    <div class="container">
        <div class="ads-info box-shadow p-4" style="display: block;">
            <div class="row">
                <div class="col-sm-12">
                  <?php if (isset($error)): ?>
                    <?php var_dump($error); ?>
                  <?php endif ?>
                    <div class="my-ads section" style="display: block;">
                        <h3>Status</h3>
                        <?php if ($users_info->final_verified): ?>
                          <span class="btn btn-success">Verified</span>
                        <?php else: ?>
                          <span class="btn btn-danger">Not Verified</span> please Upload your document and Verify your email and phone to final Verify 
                        <?php endif ?>
                        <hr>
                        <h3>Document verification</h3>
                        <hr>
                        <?php if ($users_info->document_verified): ?>
                          <p><span class="text text-success"><i class="fa fa-check"></i> Your documents are accepted!</span></p>
                        <?php elseif($users_info->document_1 && $users_info->document_2): ?>
                            <h4 class="text-info">You have upload file for Verification. admin is checking.....</h4>
                        <?php else: ?>
                          <form action="<?php echo base_url().'profile/document_verified' ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label>Scanned copy or photo of your ID Card/Passport/Driving License front part (Accept: JPG,JPEG,PNG or PDF)</label>
                              <input type="file" class="form-control" name="document_1">
                            </div>
                            <div class="form-group">
                              <label>Scanned copy or photo of your ID Card/Passport/Driving License back part (Accept: JPG,JPEG,PNG or PDF)</label>
                              <input type="file" class="form-control" name="document_2">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" name="bit_upload"><i class="fa fa-upload"></i> Upload</button>
                          </form>
                        <?php endif ?>
                        <hr>
                        <h3>Email verification</h3>
                        <hr>
                        <?php if ($users_info->email_verified==1): ?>
                        <p><span class="text text-success"><i class="fa fa-check"></i> Your email address was verified!</span></p>
                        <?php else: ?>
                          <?php if (isset($emailmessage)): ?>
                            <?php echo $emailmessage ?>
                          <?php endif ?>
                          <form action="<?php echo base_url().'profile/send' ?>" method="POST">
                            <button type="submit" class="btn btn-primary btn-sm" name="bit_send_email"><i class="fa fa-reply"></i> Verify Now</button>
                          </form>
                         <?php endif ?>
                        <hr>
                        <!-- <h3>Mobile verification</h3> -->
                        <!-- <hr> -->
                        <?php if ($users_info->phone_verified): ?>
                          <!-- <p><span class="text text-success"><i class="fa fa-check"></i> Your Mobile Number was verified!</span></p> -->
                        <?php else: ?>
                        <!--   <form action="" method="POST">
                            <div class="form-group">
                              <label><?php echo "enter_sms_code" ?></label>
                              <input type="text" class="form-control" name="sms_code">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" name="bit_send_sms_code"><i class="fa fa-reply"></i> <?php echo "Verify Now"; ?></button> 
                            <button type="submit" class="btn btn-primary btn-sm" name="bit_verify_sms_code"><i class="fa fa-check"></i> <?php echo "btn_verify_sms_code"; ?></button>
                          </form> -->
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>