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
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/temp/styles/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/temp/styles/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/temp/styles/styles.css">
</head>
<body style="width: 100%;overflow-x: hidden!important;">
<!--[if lte IE 9]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<header id="header1" class="header1">
  <div class="" id="navigation-sections">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/temp/img/logo1.png" alt="" width="183px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <img src="<?php echo base_url() ?>assets/temp/img/svgicon/toggle.svg" alt="" width="20px;">
        </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto marginh text-center">
            <li class="nav-item <?php if($this->uri->segment(1)=='')echo 'active'; ?>">
              <a class="nav-link" href="<?php echo base_url() ?>">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1)=='exchange')echo 'active'; ?>">
              <a class="nav-link" href="<?php echo base_url() ?>exchange">Exchange</a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1)=='contact') echo 'active'; ?> ">
              <a class="nav-link" href="<?php echo base_url() ?>contact">Contect</a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1)=='review')echo 'active'; ?> ">
              <a class="nav-link" href="<?php echo base_url() ?>review">Review</a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1)=='faq')echo 'active'; ?> ">
              <a class="nav-link" href="<?php echo base_url() ?>faq">FAQ</a>
            </li>
          </ul>
          <?php if (!$this->ion_auth->logged_in()): ?>
          <div>
            <a href="<?php echo base_url() ?>login" class="px-3 mr-3 margin1rem btn btn-sm thisbtn">Login</a>
            <a class="btn" href="<?php echo base_url() ?>register">Register</a>
          </div>
          <?php else: ?>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <img src="<?php echo base_url() ?>assets/temp/img/images/allinco_19.png" width="25px" class="rounded-circle" alt=""> <?php echo $user_login['username'] ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?php echo base_url() ?>profile/">
                    <img src="<?php echo base_url() ?>assets/temp/img/images/allinco_19.png" width="25px" class="rounded-circle" alt=""> Profile
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo base_url() ?>profile/myexchanges"><img src="<?php echo base_url() ?>assets/temp/img/images/eh.png" width="25px" class="rounded-circle" alt=""> Exchange History</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo base_url() ?>profile/referrals"><img src="<?php echo base_url() ?>assets/temp/img/images/ap.png" width="25px" class="rounded-circle" alt=""> Affiliate Program </a>
                   <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo base_url() ?>profile/myexchanges"><img src="<?php echo base_url() ?>assets/temp/img/images/about.png" width="25px" class="rounded-circle" alt=""> About </a>
                   <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo base_url() ?>auth/logout"><img src="<?php echo base_url() ?>assets/temp/img/images/lw.png" width="25px" class="rounded-circle" alt=""> Logout </a>
                </div>
            </div>
          <?php endif ?>
        </div>
      </nav>
    </div>
  </div>
</header>