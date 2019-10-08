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

<header id="header" class="header2 exchanges">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/temp/img/logo1.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <img src="<?php echo base_url() ?>assets/temp/img/svgicon/toggle.svg" alt="" width="20px;">
      </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto marginh text-center">
          <li class="nav-item <?php if($this->uri->segment(2)=='')echo 'active'; ?>">
            <a class="nav-link" href="<?php echo base_url() ?>home/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='exchange')echo 'active'; ?>">
            <a class="nav-link" href="<?php echo base_url() ?>home/exchange">Exchange</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='contact') echo 'active'; ?> ">
            <a class="nav-link" href="<?php echo base_url() ?>home/contact">Contect</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='review')echo 'active'; ?> ">
            <a class="nav-link" href="<?php echo base_url() ?>home/review">Review</a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=='faq')echo 'active'; ?> ">
            <a class="nav-link" href="<?php echo base_url() ?>home/faq">FAQ</a>
          </li>
        </ul>
        <?php if (!$this->ion_auth->logged_in()): ?>
        <div>
          <a href="<?php echo base_url() ?>home/login" class="px-3 mr-3 margin1rem btn btn-sm thisbtn">Login</a>
          <a href="<?php echo base_url() ?>home/regirter">Register</a>
        </div>
        <?php else: ?>
          <div class="dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="<?php echo base_url() ?>assets/temp/img/images/allinco_19.png" width="25px" class="rounded-circle" alt=""> <?php echo $user_login['username'] ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">
                  <img src="<?php echo base_url() ?>assets/temp/img/images/allinco_19.png" width="25px" class="rounded-circle" alt=""> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><img src="<?php echo base_url() ?>assets/temp/img/images/eh.png" width="25px" class="rounded-circle" alt=""> Exchange History</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><img src="<?php echo base_url() ?>assets/temp/img/images/ap.png" width="25px" class="rounded-circle" alt=""> Affiliate Program </a>
                 <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><img src="<?php echo base_url() ?>assets/temp/img/images/about.png" width="25px" class="rounded-circle" alt=""> About </a>
                 <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url() ?>auth/logout"><img src="<?php echo base_url() ?>assets/temp/img/images/lw.png" width="25px" class="rounded-circle" alt=""> Logout </a>
              </div>
          </div>
        <?php endif ?>
      </div>
    </nav>
    <div class="content py-2" v-if="!confirmtransation">
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
                <div style="display: flex;">
                  <multiselect @select="sendchange" v-model="send" label="name" placeholder="Select" track-by="name" :options="sendoptions" :option-height="104" :custom-label="customLabel" :show-labels="false" style="width: 80px;">
                    <template slot="singleLabel" slot-scope="props">
                      <img width="30px" class="option__image" :src="base_url+props.option.external_icon" :alt="props.option.name">
                    </template>
                    <template slot="option" slot-scope="props">
                      <img width="30px" class="option__image" :src="base_url+props.option.external_icon" :alt="props.option.name">
                    </template>
                  </multiselect>
                  <div>
                    <input type="text" v-model="rate_from" class="form-control"  @change="bit_calculator" style="padding: 24px;">
                  </div>
                </div>
                <span>Minimum : {{ send.min_amount }} {{ send.currency_name }}</span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="from-group text-white">
              <label for="">I GET</label>
              <div style="display: flex;">
                <multiselect @select="recivechange" style="width: 80px;" v-model="receive" placeholder="Select" label="name" track-by="name" :options="reciveoptions" :option-height="104" :custom-label="customLabel" :show-labels="false">
                  <template slot="singleLabel" slot-scope="props">
                    <span v-if="props.option.external_icon">
                      <img width="30px" class="option__image" :src="base_url+props.option.external_icon" :alt="props.option.name">
                    </span>
                    <span v-else>
                       <img width="30px" class="option__image" :src="base_url+props.option.external_icon" :alt="props.option.name">
                    </span>
                  </template>
                  <template slot="option" slot-scope="props">
                    <img width="30px" class="option__image" :src="base_url+props.option.external_icon" :alt="props.option.name">
                  </template>
                </multiselect>
                <div>
                  <input type="text" class="form-control" v-model="rate_to" @change="bit_calculatorr" style="padding: 24px;">
                </div>
              </div>
              <span> Reserve amount : {{ receive.reserve }} {{ receive.currency_name }}</span>
            </div>
          </div>
        </div>
        <br>
        <button type="button" class="btn btn-primary" @click="submit">Exchange</button> <p v-if="error" v-html="error[0]"></p>
      </form>
    </div>
    <div class="content py-2" v-else>
      <div class="w-75 m-auto text-white">
        <h5 class="bg-dark text-center m-0 p-1">{{ send.name }} {{ send.currency_name }} = {{ gateways.amount_receive }} {{ receive.currency_name }}</h5>
        <div>
          <div class="bg-light text-white">
            <table class="table table-sm mt-0 text-center text-white">
              <tr>
                <th>
                  <button class="btn tbtn border-r25 bg-white">Exchange ID</button>
                </th>
                <th></th>
                <th><button class="btn tbtn border-r25 bg-white">{{ gateways[0].id }}</button></th>
              </tr>
              <tr>
                <td>Amount send <br>( {{ send.name }} {{ send.currency_name }})</td>
                <td></td>
                <td>{{ gateways[0].amount_send }} {{ send.currency_name }}</td>
              </tr>
              <tr>
                <td>Amount send <br>( {{ receive.name }} {{ receive.currency_name }})</td>
                <td></td>
                <td>{{ gateways[0].amount_receive }} {{ receive.currency_name }}</td>
              </tr>
              <tr>
                <td>Fee</td>
                <td></td>
                <td>0 BDT</td>
              </tr>
              <tr class="bordertop">
                <td>You Total Payment</td>
                <td></td>
                <td> {{ send.name }}  {{ gateways[0].amount_send }} {{ send.currency_name }}</td>
              </tr>
            </table>
            <p>Attention: This exchange id done manyally by and admin or operator . Work time only 30-60 minute (Any Problems Call Us)</p>
            <h4 class="text-center">Send: {{ gateways[0].name }} Account : "{{ gateways[0].account }}"</h4>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Your {{ send.name }}</label>
                <input type="text" v-model="send_account" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Your E-mail</label>
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Your Phone Number</label>
                <input type="text" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Your {{ send.name }} Transaction ID</label>
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="col-md-10">
              <label for="">Note</label>
              <textarea name="" id="" cols="10" rows="1" class="form-control"></textarea>
            </div>
            <div class="col-md-2">
              <br>
              <button class="btn btn-primary" @click="finalsubmit">Confirm Pay</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>


<?php
  $this->db->where('buy_price >', 0);
  $this->db->where('sales_price >', 0);
  $this->db->join('currency', 'currency.currency_id = gateways.currency');
  $data=$this->db->get('gateways')->result();
?>
<section id="todayrate" class="py-5">
  <div class="container">
    <h3 class="text-center pb-4"><button class="btn btn-lg thisbtn color11 text-white ">Today USD Rate:</button></h3>
    <div class="row">
      <div class="col-md-4">
        <div class="single-box py-4 text-center">
          <?php foreach ($data as $key => $var): ?>
          <div class="singlegetway">
               <?php if ($var->external_icon): ?>
                  <img src="<?php echo base_url() ?><?php echo $var->external_icon ?>" alt="" width="50px" height="50px">
                <?php else: ?>
                  <img src="<?php echo base_url() ?>assets/temp/img/av.jpg" alt="" width="50px" height="50px">
                <?php endif ?>
              <p>buy:<?php echo $var->buy_price ?> <?php echo $var->currency_name ?>,sale:<?php echo $var->sales_price ?> <?php echo $var->currency_name ?></p>
            </div>
            <?php if ($key==2)break; ?>
          <?php endforeach ?>
        </div>
      </div>
      <div class="col-md-4">
        <div class="single-box py-4 text-center">
          <?php foreach ($data as $key => $var): ?>
            <?php if ($key<3)continue;?>
              <div class="singlegetway">
                <?php if ($var->external_icon): ?>
                  <img src="<?php echo base_url() ?><?php echo $var->external_icon ?>" alt="" width="50px" height="50px">
                <?php else: ?>
                  <img src="<?php echo base_url() ?>assets/temp/img/av.jpg" alt="" width="50px" height="50px">
                <?php endif ?>
                <p>buy:<?php echo $var->buy_price ?> <?php echo $var->currency_name ?>,sale:<?php echo $var->sales_price ?> <?php echo $var->currency_name ?></p>
              </div>
            <?php if ($key==5)break;  ?>
          <?php endforeach ?>
        </div>
      </div>
      <div class="col-md-4">
          <div class="single-box py-4 text-center">
          <?php foreach ($data as $key => $var): ?>
            <?php if ($key<5)continue;?>
              <div class="singlegetway">
                <?php if ($var->external_icon): ?>
                  <img src="<?php echo base_url() ?><?php echo $var->external_icon ?>" alt="" width="50px" height="50px">
                <?php else: ?>
                  <img src="<?php echo base_url() ?>assets/temp/img/av.jpg" alt="" width="50px" height="50px">
                <?php endif ?>
                <p>buy:<?php echo $var->buy_price ?> <?php echo $var->currency_name ?>,sale:<?php echo $var->sales_price ?> <?php echo $var->currency_name ?></p>
              </div>
            <?php if ($key==7)break; ?>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  $this->db->order_by('testimonials.id', 'desc');
  $this->db->limit(6);
  $this->db->join('users', 'users.id = testimonials.user_id');
  $data=$this->db->get('testimonials')->result();
?>
<section id="rating" class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
         <div class="owl-carousel owl-theme">
          <?php foreach ($data as $key => $var): ?>
            <div class="item">
              <div class="content m-3 p-3 single-review bg-white text-center">
                <div class="text-center">
                  <?php if ($var->profile): ?>
                     <img src="<?php echo base_url() ?>assets/temp/img<?php echo $var->profile ?>" class="rounded-circle m-auto" style="width:100px;" alt="">
                  <?php else: ?>
                     <img src="<?php echo base_url() ?>assets/temp/img/av.jpg" class="rounded-circle m-auto" style="width:100px;" alt="">
                  <?php endif ?>
                </div>
                <p class="p-1"><?php echo $var->content ?></p>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
      <div class="right col-md-8 pl-4">
        <div class="ml-5">
          <h3 class="text-white">Our Inovaton are chaning the world</h3>
          <img src="<?php echo base_url() ?>assets/temp/img/starsretins.png" alt="" width="250px;">
          <br>
          <span class="text-white">Excellent</span>
          <br>
          <br>
          <a href="" class="btn thisbtn text-white border-r25">Place your revirw Sumbit</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="startsections">
 <div id="startsection">
  </div> 
   <div class="startcontent">
      <h6>Ready to go Beyond? Start today with our free payment solution</h6>
      <div>
        <a href="<?php echo base_url().'home/login' ?>" class="px-3 m-3 btn btn-outline-primary">Login</a>
        <a href="<?php echo base_url().'home/regirter' ?>" class="btn btn-primary thisbtn">Register</a>
      </div>
  </div>
</section>


<section id="service" class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-0 col-lg-1"></div>
      <div class="col-md-2 col-lg-1 col-6 col-sm-3 text-center">
        <img src="<?php echo base_url() ?>assets/temp/img/images/allinco_01.png" alt="" width="80px">
      </div>
       <div class="col-md-2 col-lg-1 col-6 col-sm-3 text-center">
        <img src="<?php echo base_url() ?>assets/temp/img/images/allinco_02.png" alt="" width="80px">
      </div>
       <div class="col-md-2 col-lg-1 col-6 col-sm-3 text-center">
        <img src="<?php echo base_url() ?>assets/temp/img/images/allinco_03.png" alt="" width="80px">
      </div>
      <div class="col-md-2 col-lg-1 col-6 col-sm-3 text-center">
        <img src="<?php echo base_url() ?>assets/temp/img/images/allinco_04.png" alt="" width="80px">
      </div> <div class="col-md-2 col-lg-1 col-6 col-sm-3 text-center">
        <img src="<?php echo base_url() ?>assets/temp/img/images/allinco_16.png" alt="" width="80px">
      </div> <div class="col-md-2 col-lg-1 col-6 col-sm-3 text-center">
        <img src="<?php echo base_url() ?>assets/temp/img/images/allinco_06.png" alt="" width="80px">
      </div> <div class="col-md-2 col-lg-1 col-6 col-sm-3 text-center">
        <img src="<?php echo base_url() ?>assets/temp/img/images/allinco_13.png" alt="" width="80px">
      </div> <div class="col-md-2 col-lg-1 col-6 col-sm-3 text-center">
        <img src="<?php echo base_url() ?>assets/temp/img/images/allinco_15.png" alt="" width="80px">
      </div> <div class="col-md-2 col-lg-1 col-6 col-sm-3 text-center">
        <img src="<?php echo base_url() ?>assets/temp/img/images/allinco_09.png" alt="" width="80px">
      </div> <div class="col-md-2 col-lg-1 col-6 col-sm-3 text-center">
        <img src="<?php echo base_url() ?>assets/temp/img/images/allinco_11.png" alt="" width="80px">
      </div>
      <div class="col-md-2 col-lg-1"></div>
    </div>
  </div>
</section>

  
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
         <img class="logoddd" src="<?php echo base_url() ?>assets/temp/img/logo1.png" alt="" width="350px">
         <div class="lists">
            <a href="#">EHT</a>
            <a href="#">Exchange</a>
            <a href="#">Contect</a>
            <a href="#">Review</a>
            <a href="#">Rules</a>
            <a href="#">Help</a>
            <a href="#">FAQS</a>
            <a href="#">Privacy & Policy</a>
        </div>
        <p class="text-right"><a class="text-white" href="">@2019-2019</a></p>
      </div>
      <div class="col-md-2">
        <h4 class="text-white">Follow Us</h4>
        <img src="<?php echo base_url() ?>assets/temp/img/images/allinco_05.png" alt="" width="40px">
        <img src="<?php echo base_url() ?>assets/temp/img/images/allinco_07.png" alt="" width="40px">
      </div>
    </div>
  </div>
</footer>
<script>  var base_url = "<?php echo base_url() ?>"; </script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/temp/scripts/vue.js"></script>
<script src="<?php echo base_url() ?>assets/temp/scripts/owl.carousel.min.js"></script>
<script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
<link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="<?php echo base_url() ?>assets/temp/scripts/vuebit.js"></script>
<script>
  $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
      }
  })
</script>
</body>
</html>

