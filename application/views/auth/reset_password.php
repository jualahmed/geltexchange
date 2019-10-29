<div class="container py-4 my-4 text-center">
  <div class="w-50 m-auto box-shadow p-5">
      <h1><?php echo lang('reset_password_heading');?></h1>
      <div id="infoMessage"><?php echo $message;?></div>

      <?php echo form_open('home/reset_password/' . $code);?>

        <p>
          <label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
         <input type="password" placeholder="New password" name="new" value="" class="form-control text-none" id="new" pattern="^.{8}.*$">
        </p>

        <p>
          <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
         <input type="password"  placeholder="Confirm New password" name="new_confirm" value="" id="new_confirm" class="form-control text-none" pattern="^.{8}.*$">
        </p>

        <?php echo form_input($user_id);?>
        <?php echo form_hidden($csrf); ?>

        <input type="submit" name="submit" value="reset_password" class="btn btn-success text-white py-2 px-5 roundeddd">

      <?php echo form_close();?>
  </div>
</div>