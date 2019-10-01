 <form action="<?php echo base_url().'auth/ajaxcreate' ?>" id="resisterform">
    <div class="modal-dialog rmodal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
           <h3 class="box-title"><a href="" class="btn btn-success">Create User</a></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <section class="content">
          <div class="row">
              <div class="col-md-12">
                   <div class="box">
                      <div class="box-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <?php echo lang('users_firstname', 'first_name', array('class' => 'col-sm-12 col-md-12 control-label')); ?>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="text" id="first_name" name="first_name" class="form-control text-none" placeholder="First Name">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <?php echo lang('users_lastname', 'last_name', array('class' => 'col-sm-12 col-md-12 control-label')); ?>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="text" id="last_name" name="last_name" class="form-control text-none" placeholder="Last Name">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6" style="display: none">
                                  <div class="form-group">
                                    <?php echo lang('users_username', 'username', array('class' => 'col-sm-12 col-md-12 control-label')); ?>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="text" id="username" name="username" class="form-control" placeholder="Last Name">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <?php echo lang('users_email', 'email', array('class' => 'col-sm-12 col-md-12 control-label')); ?>
                                      <div class="col-sm-12 col-md-12">
                                        <input type="text" id="email" name="email" placeholder="Email" class="form-control text-none">
                                      </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <?php echo lang('users_phone', 'phone', array('class' => 'col-sm-12 col-md-12 control-label')); ?>
                                    <div class="col-sm-12 col-md-12">
                                      <input type="text" id="phone" placeholder="Phone" name="phone" class="form-control text-none">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <?php echo lang('users_password', 'password', array('class' => 'col-sm-12 col-md-12 control-label')); ?>
                                      <div class="col-sm-12 col-md-12">
                                          <input type="password" id="passwords" autocomplete="on" name="passwords" placeholder="passwords" class="form-control text-none">
                                      </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo lang('users_password_confirm', 'password_confirm', array('class' => 'col-sm-12 col-md-12 control-label')); ?>
                                        <div class="col-sm-12 col-md-12">
                                            <input type="password" id="users_password_confirm" placeholder="Confirm Password" name="password_confirm" class="form-control text-none">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                     <div class="form-group">
                                      <div class="group">
                                        <label class="checkbox fffffffffffffff">
                                            <input name="terms" type="checkbox" value="1" id="term" required=""> I accept the <a href="<?php echo base_url().'home/termsofservices' ?>" target="_blank">Terms of service &amp;  </a><a href="<?php echo base_url().'home/privacypolicy' ?>" target="_blank">privacy policy</a>
                                        </label>
                                        <label class="checkbox fffffffffffffff">
                                            <input name="terms" type="checkbox" value="1" id="term" required=""> আমি এই সার্ভিস অনলাইন জুয়ার কাজে ব্যবহার করবো না এবং আমি মানতে রাজি সাইটের শর্তাবলি
                                        </label>
                                      </div>
                                    </div>
                                </div>
                              </div>
                      </div>
                  </div>
               </div>
          </div>
      </section>
        </div>
        <div class="modal-footer">
          <?php if ($forgot_password == false): ?>
              <?php echo anchor('home/forgerpassword', lang('auth_forgot_password'),array('class' => 'btn btn-lg btn-primary btn-social btn-facebook btn-flat')); ?><br />
          <?php endif; ?>
          <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
          <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-lg btn-flat', 'content' => "Submit")); ?>
        </div>
      </div>
    </div>
  </form>