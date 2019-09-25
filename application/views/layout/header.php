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
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" >
  <link rel="icon" href="<?php echo base_url(); ?>/assets/images/favicon.ico" type="image/x-icon"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/owl.carousel.css">  
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery.scrollbar.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css?v1.0.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/responsive.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/owlcarousel/assets/owl.theme.default.min.css">
</head>
<body style="width: 100%;overflow-x: hidden;">
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
        <img class="img-responsive nav-image" src="<?php echo base_url(); ?>assets/images/logo.png" alt="Logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php if($this->uri->segment(2)=='')echo 'active'; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='about')echo 'active'; ?>">
            <a class="nav-link" href="<?php echo base_url().'home/about' ?>">About</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='faq')echo 'active'; ?>">
            <a class="nav-link" href="<?php echo base_url().'home/faq' ?>">FAQ</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='tutorial')echo 'active'; ?>">
            <a class="nav-link" href="<?php echo base_url().'home/tutorial' ?>">Tutorial</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='affiliate')echo 'active'; ?>">
            <a class="nav-link" href="<?php echo base_url().'home/affiliate' ?>">Affiliate</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='paymentproff')echo 'active'; ?>">
            <a class="nav-link" href="<?php echo base_url().'home/paymentproff' ?>">Payment Proof</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='contact')echo 'active'; ?>">
            <a class="nav-link" href="<?php echo base_url().'home/contact' ?>">Contact</a>
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
              <a class="dropdown-item" href="<?php echo base_url(); ?>profile"><i class="fa fa-user"></i>My Profile</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>profile/exchanges"><i class="fa fa-refresh"></i> My Exchanges</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>profile/testimonials"><i class="fa fa-comments-o"></i> My Feedback</a>
              <a style="display: none;" class="dropdown-item" href="<?php echo base_url(); ?>account/referrals"><i class="fa fa-users"></i> Referrals</a>
              <a style="display: none;" class="dropdown-item" href="<?php echo base_url(); ?>account/settings"><i class="fa fa-cogs"></i> Settings</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>profile/verification"><i class="fa fa-check"></i> Account verification</a>
              <div class="dropdown-divider"></div>
              <h6 class="text-center"><a href="<?php echo site_url('auth/logout'); ?>">Sign Out</a></h6>
            </div>
          <?php else: ?>
             <a data-toggle="modal" data-target="#logins" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Login 
            </a>/
            <a href="#" id="navbarDropdown" data-toggle="modal" data-target="#exampleModal" aria-expanded="false">
              Register 
            </a>
          <?php endif ?>
        </div>
      </div>
    </nav>
  </div><!-- container -->
</header><!-- header -->

<!-- login model -->
<!-- Modal -->
<div class="modal fade" id="logins" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?php echo form_open('auth/loginajax','id=login');?>

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sign in</h5>
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
                            <?php echo anchor('#', lang('auth_forgot_password')); ?><br />
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <form action="<?php echo base_url().'auth/ajaxcreate' ?>" id="resisterform">
  <div class="modal-dialog rmodal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h3 class="box-title"><?php echo lang('users_create_user'); ?></h3>
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
                                        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                      <?php echo lang('users_email', 'email', array('class' => 'col-sm-12 col-md-12 control-label')); ?>
                                      <div class="col-sm-12 col-md-12">
                                        <input type="text" id="email" name="email" placeholder="Email" class="form-control text-lowercase">
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <?php echo lang('users_password', 'password', array('class' => 'col-sm-12 col-md-12 control-label')); ?>
                                      <div class="col-sm-12 col-md-12">
                                          <input type="password" id="passwords" autocomplete="on" name="passwords" placeholder="passwords" class="form-control">
                                      </div>
                                  </div>

                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <?php echo lang('users_lastname', 'last_name', array('class' => 'col-sm-12 col-md-12 control-label')); ?>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <?php echo lang('users_phone', 'phone', array('class' => 'col-sm-12 col-md-12 control-label')); ?>
                                    <div class="col-sm-12 col-md-12">
                                      <input type="text" id="phone" placeholder="Phone" name="phone" class="form-control">
                                    </div>
                                  </div>

                                    <div class="form-group">
                                        <?php echo lang('users_password_confirm', 'password_confirm', array('class' => 'col-sm-12 col-md-12 control-label')); ?>
                                        <div class="col-sm-12 col-md-12">
                                            <input type="password" id="users_password_confirm" placeholder="Confirm Password" name="password_confirm" class="form-control text-lowercase">
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => "Submit")); ?>
      </div>
    </div>
  </div>
  </form>
</div>


 
