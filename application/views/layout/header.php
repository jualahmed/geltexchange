<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="exchangesoftware.info">
  <meta name="description" content="Skrill, Neteller, Perfectmoney, skrill to bkash, bkash to skrill, neteller to bkash, bkash to neteller">
   <meta name="keywords" content="Dollar buy sell bd, bd dollar buy sell, dollar buy sell in bangladesh, USD Buy-Sell : Trusted Dollar Buy, Sell Website in Bangladesh. Skrill, Neteller, Perfectmoney">
   <meta property="og:image" content="<?php echo base_url() ?>temp/images/logo.png" />
   <meta property="og:image" content="<?php echo base_url() ?>temp/images/logo.png" />
   <meta property="og:image" content="<?php echo base_url() ?>temp/images/logo.png" />
   <meta property="og:image" content="<?php echo base_url() ?>temp/images/logo.png" />
   <meta property="og:image" content="<?php echo base_url() ?>temp/images/logo.png" />
   <meta property="og:image" content="<?php echo base_url() ?>temp/images/logo.png" />
   <meta property="og:image" content="<?php echo base_url() ?>temp/images/logo.png" />
   <meta property="og:image" content="<?php echo base_url() ?>temp/images/logo.png" />
  <title>USD Buy Sell : Trusted Website for Dollar Buy Sell in Bangladesh</title>
  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5a81a11dd7591465c7079831/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
  </script>
  <!--End of Tawk.to Script-->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/temp/styles/styles.css" >
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/temp/css/main.css"> 
  <link rel="icon" href="<?php echo base_url() ?>/assets/temp/images/favicon.ico" type="image/x-icon"/>
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/temp/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/temp/css/icofont.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/temp/css/owl.carousel.css">  
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/temp/css/slidr.css">     
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/temp/css/responsive.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/temp/css/jquery.scrollbar.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/temp/css/style.css?v1.0.0">
  <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'>
</head>
<body>

<header id="header" class="bg-light">
  <div class="row">
    <div class="col-md-12">
      <center> 
        <div class="btn btn top-header">
          <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" id="MARQUEE1" class="scrolling">  
            <b class="text-info">Notice : <?php $d=json_decode($setting->data);?>
              <span class="text-white"><?php echo $d->notice ?></span>
            </b>
          </marquee>  
        </div>

      </center>
    </div>
    <div class="col-md-12 text-center" style="background: #005455;color: #fff;">
      <img width="23px" src="<?php echo base_url()."assets/temp/uploads/clock.png"; ?>" alt=""> Office Time: <?php echo $d->start_time ?> - <?php echo $d->end_time ?>
      <img width="20px" src="<?php echo base_url()."assets/temp/uploads/operator.png"; ?>" alt=""> Operator:
      <?php if($d->is_online){ ?>
        <button class="btn btn-success btn-sm"> Online</button>
      <?php }else{ ?>
        <button class="btn btn-danger btn-sm"> Offline</button>
      <?php } ?>
    </div>
    </div>
  </div>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
      <a class="navbar-brand p-1" href="<?php echo base_url() ?>"><img class="img-responsive" src="<?php echo base_url() ?>assets/temp/images/logo.png" alt="Logo"     width="170px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav">
            <li class="<?php if($this->uri->segment(1)=='') echo 'active' ?>"><a href="<?php echo base_url() ?>">Home</a></li>
            <li class="<?php if($this->uri->segment(1)=='about') echo 'active' ?>"><a href="<?php echo base_url() ?>about">About</a></li>
            <li class="<?php if($this->uri->segment(1)=='faq') echo 'active' ?>"><a href="<?php echo base_url() ?>faq">FAQ</a></li>
            <li class="<?php if($this->uri->segment(1)=='tutorial') echo 'active' ?>"><a href="<?php echo base_url() ?>tutorial">Tutorial</a></li>
            <li class="<?php if($this->uri->segment(1)=='affiliate') echo 'active' ?>"><a href="<?php echo base_url() ?>index.php?a=affiliate">Affiliate</a></li> 
            <li class="<?php if($this->uri->segment(1)=='home') echo 'active' ?>"><a href="<?php echo base_url() ?>home/paymentproff">Payment Proof</a></li> 
            <li class="<?php if($this->uri->segment(1)=='contact') echo 'active' ?>"><a href="<?php echo base_url() ?>contact">Contact</a></li>
        </ul>
        <div>
          <ul class="nav navbar-nav">
            <?php if ($this->ion_auth->logged_in()): ?>
            <div class="dropdown">
              <a style="display: flex;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="username" style="margin-top: 13px;margin-right: 4px;font-weight: 700;"> <?php echo substr($user_login['username'], 0,10); ?></div>
                  <div class="userprofile">
                    <?php if ($user_login['profile']): ?>
                      <img src="<?php echo base_url().'assets/temp'.$user_login['profile']; ?>" class="user-image rounded-circle" alt="User Image" width="55px">
                    <?php else: ?>
                      <img src="<?php echo base_url().'assets/temp'.'/avatar-placeholder.svg'; ?>" class="user-image rounded-circle" alt="User Image" width="55px">
                    <?php endif ?>
                  </div>
                 </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item py-2" href="<?php echo base_url(); ?>profile">
                  <img width="20px" class="mr-3" src="<?php echo base_url().'assets/temp/svgicon/user.svg' ?>" alt="">
                  My Profile
                </a>
                <a class="dropdown-item py-2" href="<?php echo base_url(); ?>profile/exchanges">
                  <img width="20px" class="mr-3" src="<?php echo base_url().'assets/temp/svgicon/exchange.svg' ?>" alt="">
                  My Exchanges
                </a>
                <a class="dropdown-item py-2" href="<?php echo base_url(); ?>profile/testimonials">
                  <img width="20px" class="mr-3" src="<?php echo base_url().'assets/temp/svgicon/commend.svg' ?>" alt="">
                  My Feedback
                </a>
                <a style="display: none;" class="dropdown-item" href="<?php echo base_url(); ?>account/referrals"><i class="fa fa-users"></i> Referrals</a>
                <a class="dropdown-item" href="<?php echo base_url(); ?>profile/change_password">
                  <img width="20px" class="mr-3" src="<?php echo base_url().'assets/temp/svgicon/setting.svg' ?>" alt=""> Settings</a>
                <a class="dropdown-item" href="<?php echo base_url(); ?>profile/verification">
                  <img width="20px" class="mr-3" src="<?php echo base_url().'assets/temp/svgicon/checkmark.svg' ?>" alt="">Account verification</a>
                <div class="dropdown-divider"></div>
                <h6 class="text-center"><a href="<?php echo site_url('auth/logout'); ?>">Sign Out</a></h6>
              </div>
            </div>
            <?php else: ?>
              <li class="<?php if($this->uri->segment(1)=='login') echo 'active' ?>"><a href="<?php echo base_url() ?>login">Login</a></li>
              <li class="beforeicon <?php if($this->uri->segment(1)=='regirter') echo 'active' ?>"><a href="<?php echo base_url() ?>regirter">Register</a></li>
            <?php endif ?>
          </ul><!-- sign-in --> 
        </div>
      </div>
    </nav>
  </div>
</header><!-- header -->
