<div class="container py-4 my-4" style="min-height: 400px">
    <h1><?php echo lang('forgot_password_heading');?></h1>
  <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

  <div id="infoMessage" class="text-danger"><?php echo $message;?></div>

  <?php echo form_open("home/forgerpassword");?>

        <p>
          <label for="email"><?php echo sprintf(lang('forgot_password_email_label'), $identity_label);?></label> <br />
          <input type="text" name="email" class="text-lowercase">
        </p>

        <p><?php echo form_submit('submit', "Send Code");?></p>

  <?php echo form_close();?>
</div>