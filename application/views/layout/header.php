<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="exchangesoftware.info">
  <meta name="description" content="<?php echo 'description'; ?>">
  <meta name="keywords" content="<?php echo 'keywords'; ?>">
  <meta property="og:image" content="<?php echo base_url(); ?>assets/images/logo.png" />
<!--   <script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/5d31a6859b94cd38bbe83abb/default';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" >
  <link rel="icon" href="<?php echo base_url(); ?>/assets/icon/ficon.jpg" type="image/x-icon"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.scrollbar.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css?v1.0.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/owlcarousel/assets/owl.theme.default.min.css">
</head>
<body style="width: 100%;overflow-x: hidden!important;">
<header id="header" class="bg-light">
  <div class="row">
    <div class="col-md-12">
      <center> 
        <div class="top-header">
          <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"class="scrolling">
            <b class="text-info">Notice : <?php $d=json_decode($setting->data);  ?><span class="text-white"><?php echo $d->notice ?></span> </b>
          </marquee>  
        </div>
      </center>
    </div>
    <div class="col-md-12 text-center officeinfobar">
      <img width="23px" src="<?php echo base_url()."assets/images/icon/clock.png"; ?>" alt=""> Office Time: <?php echo $d->start_time ?> - <?php echo $d->end_time ?>
      <img width="20px" src="<?php echo base_url()."assets/images/icon/operator.png"; ?>" alt=""> Operator:
      <?php if($d->is_online){ ?>
        <button class="btn btn-success btn-sm"> Online</button>
      <?php }else{ ?>
        <button class="btn btn-danger btn-sm"> Offline</button>
      <?php } ?>
    </div>
  </div>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="<?php echo base_url() ?>">
        <img class="img-responsive nav-image" src="<?php echo base_url(); ?>assets/images/logo.png" alt="Logo"><br>
        
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php if($this->uri->segment(2)=='about')echo 'active'; ?>">
            <a style="border-radius: 15px;" class="nav-link btn-danger m-1 text-white text-center" href="<?php echo base_url().'home/about' ?>">About</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='faq')echo 'active'; ?>">
            <a style="border-radius: 15px;" class="nav-link btn-danger m-1 text-white text-center" href="<?php echo base_url().'home/faq' ?>">FAQ</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='tutorial')echo 'active'; ?>">
            <a style="border-radius: 15px;" class="nav-link btn-danger m-1 text-white text-center" href="<?php echo base_url().'home/tutorial' ?>">Tutorial</a>
          </li>
          <li style="width: 47%" class="nav-item <?php if($this->uri->segment(2)=='paymentproff')echo 'active'; ?>">
            <a style="border-radius: 15px;" class="nav-link text-center btn-danger m-1 text-white text-center" href="<?php echo base_url().'home/paymentproff' ?>">PaymentProof</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='contact')echo 'active'; ?>">
            <a style="border-radius: 15px;" class="nav-link text-center btn-danger m-1 text-white" href="<?php echo base_url().'home/contact' ?>">Contact</a>
          </li>
        </ul>
        <div class="mr-0 dropdown">
          <?php if ($this->ion_auth->logged_in()): ?>
              <a style="display: flex;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <div class="username"> <?php echo $user_login['username']; ?></div>
             
              <div class="userprofile">
                <?php if ($user_login['profile']): ?>
                  <img src="<?php echo base_url().'assets/images'.$user_login['profile']; ?>" class="user-image rounded-circle" alt="User Image" width="55px">
                <?php else: ?>
                  <img src="<?php echo base_url().'assets/images'.'/avatar.jpg'; ?>" class="user-image rounded-circle" alt="User Image" width="55px">
                <?php endif ?>
              </div>
               </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item py-2" href="<?php echo base_url(); ?>profile"><img width="20px" src="<?php echo base_url().'assets/svgicon/user.svg' ?>" alt=""> My Profile</a>
              <a class="dropdown-item py-2" href="<?php echo base_url(); ?>profile/exchanges"><img width="20px" src="<?php echo base_url().'assets/svgicon/exchange.svg' ?>" alt=""> My Exchanges</a>
              <a class="dropdown-item py-2" href="<?php echo base_url(); ?>profile/testimonials"><img width="20px" src="<?php echo base_url().'assets/svgicon/commend.svg' ?>" alt=""> My Feedback</a>
              <a style="display: none;" class="dropdown-item" href="<?php echo base_url(); ?>account/referrals"><i class="fa fa-users"></i> Referrals</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>profile/change_password"><img width="20px" src="<?php echo base_url().'assets/svgicon/setting.svg' ?>" alt=""> Settings</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>profile/verification"><img width="20px" src="<?php echo base_url().'assets/svgicon/checkmark.svg' ?>" alt="">Account verification</a>
              <div class="dropdown-divider"></div>
              <h6 class="text-center"><a href="<?php echo site_url('auth/logout'); ?>">Sign Out</a></h6>
            </div>
          <?php else: ?>
           <div class="desktopdddd">
               <a data-toggle="modal" data-target="#logins" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Login 
            </a>/
            <a href="<?php echo base_url().'home/regirter' ?>">
              Register 
            </a>
           </div>
          <?php endif ?>
        </div>

      </div>
      <?php if (!$this->ion_auth->logged_in()): ?>
       <div class="mobilessss">
               <a data-toggle="modal" data-target="#logins" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Login 
            </a>/
            <a href="<?php echo base_url().'home/regirter' ?>">
              Register 
            </a>
           </div>
        <?php endif ?>
         <?php if ($this->ion_auth->logged_in()): ?>
        <b class="ddddddddddddd">

          <?php if ($user_login['profile']): ?>
            <img src="<?php echo base_url().'assets/images'.$user_login['profile']; ?>" class="pr-2 user-image rounded-circle" alt="User Image" width="55px">
          <?php else: ?>
            <img src="<?php echo base_url().'assets/images'.'/avatar.jpg'; ?>" class="pr-2 user-image rounded-circle" alt="User Image" width="55px">
          <?php endif ?>
          <a class="btn-danger mr-1 p-1" style="font-size: 11px;" href="<?php echo base_url(); ?>profile"><img width="20px" src="<?php echo base_url().'assets/svgicon/user.svg' ?>" alt=""> My Profile</a>
          <a class="btn-danger mr-1 p-1" style="font-size: 11px;" href="<?php echo base_url(); ?>profile/exchanges"><img width="20px" src="<?php echo base_url().'assets/svgicon/exchange.svg' ?>" alt=""> My Exchanges</a>
          <a class="btn-danger mr-1 p-1" style="font-size: 11px;" href="<?php echo base_url(); ?>profile/testimonials"><img width="20px" src="<?php echo base_url().'assets/svgicon/commend.svg' ?>" alt=""> My Feedback</a>
          <a class="btn-danger mr-1 p-1" style="font-size: 11px;" href="<?php echo base_url(); ?>profile/change_password"><img width="20px" src="<?php echo base_url().'assets/svgicon/setting.svg' ?>" alt="">  Settings</a>
          <a class="btn-danger mr-1 p-1" style="font-size: 11px;" href="<?php echo base_url(); ?>profile/verification"><img width="20px" src="<?php echo base_url().'assets/svgicon/checkmark.svg' ?>" alt="">Account verification</a>
          <a class="btn-danger mr-1 p-1" style="font-size: 11px;" href="<?php echo site_url('auth/logout'); ?>"><img width="20px" src="<?php echo base_url().'assets/svgicon/logout.svg' ?>" alt=""> Sign Out</a>
        </b>
      <?php endif ?>
    </nav>
  </div><!-- container -->
</header><!-- header -->

<!-- login model -->
<!-- Modal -->
<div class="modal fade" id="logins" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <?php echo form_open('auth/loginajax','id=login');?>
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title btn btn-success text-cente" id="exampleModalLabel">Sign in</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                   <div class="login-box-body">
                  <p class="login-box-msg"><?php echo lang('auth_sign_session'); ?></p>
                      <div class="form-group has-feedback">
                          <input type="text" class="form-control text-lowercase" id="identity" name="identity" placeholder="Enter Your Email">
                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                          <input type="password" class="form-control text-lowercase" autocomplete="on" id="password" name="password" placeholder="Enter Your Password">
                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                      </div>
                      <div class="row">
                          <div class="col-md-8">
                              <div class="checkbox icheck form-group" >
                                  <label class="form-label">
                                      <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?><?php echo "Remember me"; ?>
                                  </label>
                              </div>
                          </div>
                      </div>
                      <div class="message text-center text-danger">
                        
                      </div>

  <?php if ($auth_social_network == true): ?>
                  <div class="social-auth-links text-center">
                      <p>- <?php echo lang('auth_or'); ?> -</p>
                      <?php echo anchor('#', '<i class="fa fa-facebook"></i>' . lang('auth_sign_facebook'), array('class' => 'btn btn-block btn-social btn-facebook btn-flat')); ?>
                      <?php echo anchor('#', '<i class="fa fa-google-plus"></i>' . lang('auth_sign_google'), array('class' => 'btn btn-block btn-social btn-google btn-flat')); ?>
                  </div>
  <?php endif; ?>
  <?php if ($forgot_password == false): ?>
                  <?php echo anchor('home/forgerpassword', lang('auth_forgot_password'),array('class' => 'btn btn-primary btn-social btn-facebook btn-flat')); ?><br /><br />
                  <?php echo anchor('home/regirter', "Register",array('class' => 'btn btn-primary btn-social btn-facebook btn-flat')); ?><br />
  <?php endif; ?>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <?php echo form_submit('submit', lang('auth_login'), array('class' => 'btn btn-primary btn-flat'));?>
        </div>
      </div>
  </div>
  <?php echo form_close();?>
</div>
<!-- resister model -->

