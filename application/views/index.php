
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
