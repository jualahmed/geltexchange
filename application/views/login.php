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
  <div class="contentr bg-white">
    <h4 class="thistext mt-5 pt-3">Account Login</h4>
    <form action="<?php echo base_url() ?>auth/loginajax" class="m-5" id="login">
      <div class="row">
        <div class="col-md-12 my-2">
          <input type="text" placeholder="Enter Email" name="identity" class="form-control text-none" id="identity">
        </div>
        <div class="col-md-12 my-2">
          <input type="text" placeholder="Enter Passsword" name="password" class="form-control text-none" id="password">
        </div>
        <div id="message" class="text-center text-danger"></div>
        <div class="col-md-12 my-2">
          <input type="submit" class="btn thisbtn text-white py-2 px-5 roundeddd" value="Sign up">
        </div>
        <div class="col-md-12">
          <p><a href="<?php echo base_url() ?>home/forgerpassword" class="thistext">Forget Passsword</a> | <a href="<?php echo base_url() ?>home/regirter" class="thistext">Create an account</a></p>
        </div>
      </div>
    </form>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/temp/scripts/vuecom/loginregister.js"></script>
</body>
</html>
