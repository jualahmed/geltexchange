
<section id="register">
  <div class="contentr bg-white p-3 text-center box-shadow" style="width: 400px;">
    <h4 class="thistext mt-2">Forget Password</h4>
       <h1><?php echo lang('forgot_password_heading');?></h1>
  <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
 <div class="col-md-12">
          <p class="text-info">Enter your email we will send you an email with instruction for resetting your password.</p>
        </div>
  <div id="infoMessage" class="text-danger"><?php echo $message;?></div>
    <?php echo form_open("home/forgerpassword");?>
      <p>
        <label for="email"><?php echo sprintf(lang('forgot_password_email_label'), $identity_label);?></label> <br />
        <input type="text" placeholder="Enter Passsword" name="email" class="text-lowercase form-control">
      </p>

      <p>
        <input type="submit" class="btn btn-success text-white py-2 px-5 roundeddd" value="Forget Passsword">
      </p>
    <?php echo form_close();?>
</section>

