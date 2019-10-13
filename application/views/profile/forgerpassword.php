
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/temp/styles/styles.css">
</head>
<body style="width: 100%;overflow-x: hidden!important;">
<!--[if lte IE 9]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<section id="register">
  <div class="contentr bg-white p-3" style="width: 400px;">
    <img src="<?php echo base_url().'assets/temp/img/logo12.png' ?>" alt="" width="357px">
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
        <input type="text" name="email" class="text-lowercase form-control">
      </p>

      <p>
        <input type="submit" class="btn thisbtn text-white py-2 px-5 roundeddd" value="Forget Passsword">
      </p>
    <?php echo form_close();?>
</section>

</body>
</html>
