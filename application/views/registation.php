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
    <img src="<?php echo base_url().'assets/temp/img/logo12.png' ?>" alt="" width="357px">
    <h4 class="thistext mt-3 pt-0">Account Registation</h4>
    <form id="resisterform" action="<?php echo base_url() ?>auth/ajaxcreate" class="m-5">
      <div class="row">
        <div class="col-md-6 my-2">
          <input type="text" id="first_name" placeholder="Enter First Name" class="form-control" name="first_name">
        </div>
        <div class="col-md-6 my-2">
          <input type="text" placeholder="Enter Last Name" class="form-control" name="last_name" id="last_name">
        </div>
        <div class="col-md-6 my-2">
          <input type="text" placeholder="Enter Username" class="form-control" name="username" id="username">
        </div>
        <div class="col-md-6 my-2">
          <input type="text" placeholder="Enter Email" class="form-control" name="email" id="email">
        </div>
        <div class="col-md-6 my-2">
          <input type="text" placeholder="Enter password" class="form-control" name="passwords" id="passwords">
        </div>
        <div class="col-md-6 my-2">
          <input type="text" placeholder="Confirm password" class="form-control" name="password_confirm" id="password_confirm">
        </div>
        <div class="col-md-6 my-2">
          <input type="text" placeholder="Enter Address" class="form-control" name="address" id="address">
        </div>
        <div class="col-md-6 my-2">
          <input type="text" placeholder="Enter Phone Number" class="form-control" name="phone" id="phone">
        </div>
        <div class="col-md-12 my-2 text-center">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">I have read this project <a href="<?php echo base_url() ?>home/" class="thistext">rules</a> and accept</label>
          </div>
        </div>
        
        <div class="col-md-12 my-2">
          <input type="submit" class="btn thisbtn text-white py-2 px-5 roundeddd" value="Sign up">
        </div>
        <div class="col-md-12">
          <p>Maybe you already <a href="<?php echo base_url() ?>home/login" class="thistext">have an</a> account</p>
        </div>
      </div>
    </form>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/temp/scripts/vuecom/loginregister.js"></script>

</body>
</html>
