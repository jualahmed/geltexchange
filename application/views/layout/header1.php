<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

<header id="header" class="header2">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="#"><img src="<?php echo base_url() ?>assets/temp/img/logo1.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <img src="<?php echo base_url() ?>assets/temp/img/svgicon/toggle.svg" alt="" width="20px;">
      </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto marginh text-center">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>home/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>home/exchange">Exchange</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="<?php echo base_url() ?>home/contact">Contect</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#">Review</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#">FAQ</a>
          </li>
        </ul>
        <div>
          <a href="<?php echo base_url() ?>home/login" class="px-3 margin1rem btn btn-sm thisbtn mr-3">Login</a>
          <a href="<?php echo base_url() ?>home/regirter">Register</a>
        </div>
      </div>
    </nav>
    <div class="content py-2">
      <marquee class="text-white btn g-btn btn-sm border-r15">NOTE:Your Registered email and number must be verified then your account automatically actavited and you can set up the exchange, you do not have to pay the transfer fee if you buy above $20</marquee>
      <h1 class="text-white">Internationa currency exchange</h1>
      <ul class="text-white">
        <li class="py-1">Quentity of service if our advantage</li>
        <li class="py-1">Working 24 hours a day 24/7</li>
      </ul>
      <form action="">
        <div class="row">
          <div class="col-md-4">
            <div class="from-group text-white">
                <label class="typo__label">I GIVE</label>
                <multiselect v-model="value" placeholder="Fav No Man’s Sky path" label="title" track-by="title" :options="options" :option-height="104" :custom-label="customLabel" :show-labels="false">
                  <template slot="singleLabel" slot-scope="props">
                    <img width="30px" class="option__image" :src="props.option.img" alt="No Man’s Sky">
                    <span class="option__desc">
                      <span class="option__title">{{ props.option.title }}</span>
                    </span>
                  </template>
                  <template slot="option" slot-scope="props">
                    <img width="30px" class="option__image" :src="props.option.img" alt="No Man’s Sky">
                    <span class="option__title">{{ props.option.title }}</span>
                    <span class="option__small">{{ props.option.desc }}</span>
                  </template>
                </multiselect>
                <span>Minimum : 5 USD</span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="from-group text-white">
              <label for="">I GET</label>
              <multiselect v-model="value" placeholder="Fav No Man’s Sky path" label="title" track-by="title" :options="options" :option-height="104" :custom-label="customLabel" :show-labels="false">
                <template slot="singleLabel" slot-scope="props">
                  <span v-if="props.option.img">
                    <img width="30px" class="option__image" :src="props.option.img" alt="No Man’s Sky">
                  </span>
                  <span v-else>
                     <img width="30px" class="option__image" :src="props.option.img" alt="No Man’s Sky">
                  </span>
                  <span class="option__desc">
                    <span class="option__title">{{ props.option.title }}</span>
                  </span>
                </template>
                <template slot="option" slot-scope="props">
                  <img width="30px" class="option__image" :src="props.option.img" alt="No Man’s Sky">
                  <span class="option__title">{{ props.option.title }}</span>
                  <span class="option__small">{{ props.option.desc }}</span>
                </template>
              </multiselect>
              <span> Reserve amount : 5 USD</span>
            </div>
          </div>
        </div>
        <br>
        <button type="sumbit" class="btn btn-primary">Exchange</button>
      </form>
    </div>
  </div>
</header>
