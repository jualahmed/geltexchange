    <footer id="footer" class="pt-4 box-shadow bg-light">
      <div class="footer">
        <div class="footer-bottom">
          <div class="container">
              <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6">
                  <div class="about-hoster"> 
                    <a class="" href="<?php echo base_url(); ?>">
                      <img width="100%" class="img-responsive" src="<?php echo base_url(); ?>assets/images/logo.png" alt="Logo">
                    </a>
                  </div>
                  <div>
                    <p><?php $d=json_decode($setting->data); echo $d->siteabout; ?></p>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                  <div class="usefull-link">
                      <h4>Useful Links</h4>
                      <ul class="list-group">
                          <li><a href="<?php echo base_url(); ?>">Home</a></li>
                          <li><a href="<?php echo base_url(); ?>home/about">About Us</a></li>
                          <li><a href="<?php echo base_url(); ?>home/affiliate">Affiliate</a></li>
                      </ul>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 ">
                  <div class="usefull-link">
                      <h4>Help &amp; Support</h4>
                      <ul class="list-group">
                          <li><a href="<?php echo base_url(); ?>home/faq">FAQ</a></li>
                          <li><a href="<?php echo base_url(); ?>home/contact">Contact</a></li>
                          <li><a href="<?php echo base_url(); ?>home/termsofservices"> <span style="font-size: 15px;">Terms & Conditions</span></a></li>
                          <li><a href="<?php echo base_url(); ?>home/privacypolicy" class="link gray4 hover-white dib v-mid hide-child"><span style="font-size: 15px;">Privacy Policy</span></a></li>
                      </ul>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="contact-hoster">
                        <h4>Contact Us</h4>
                        <ul class="list-group">
                            <li class="text-info">Supportemail:<span class="text-lowercase"> <?php echo $d->supportemail; ?></span></li>
                            <li class="text-info">Skype: <span><?php echo $d->skype; ?></span></li>
                        </ul>
                    </div>
                </div>
              </div>
          </div>
      </div>
    	<div class="container">
        <div class="row">
          <div class="col-md-4">
            <a target="_blanck" href="<?php echo $d->facebook ?>" class="mr-2">
              <img src="<?php echo base_url().'assets/svgicon/facebool.svg' ?>" alt="" width="30px">
            </a>
            <a target="_blanck" href="<?php echo $d->linkedin ?>" class="mr-2">
              <img src="<?php echo base_url().'assets/svgicon/in.svg' ?>" alt="" width="30px">
            </a>
            <a target="_blanck" href="<?php echo $d->twtter ?>" class="mr-2">
              <img src="<?php echo base_url().'assets/svgicon/tw.svg' ?>" alt="" width="30px">
            </a>
            <a target="_blanck" href="<?php echo $d->youtube ?>">
              <img src="<?php echo base_url().'assets/svgicon/yo.svg' ?>" alt="" width="30px">
            </a>
          </div>
          <div class="col-md-8">
            <p style="margin-top: 0px;">Copyright © 2017 by <?php echo $d->name; ?>.COM Developed by 
              <a href="https://www.facebook.com/md.jual.ah" target="_blank" id="companyTitle"> 
                Jual Ahmed
              </a>
            </p>
          </div>        
        </div>
    	</div>
    </footer>
    <!-- footer -->
		<!-- login and register modals-->
    <script>var base_url="<?php echo base_url() ?>";</script>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
	  <script src="<?php echo base_url(); ?>/assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vue/vue.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vue/vuebit.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.countdown.js"></script>   
    <script src="<?php echo base_url(); ?>assets/js/jquery.scrollbar.min.js"></script>   
    <script src="<?php echo base_url(); ?>assets/js/sweetalert2@8.js"></script>
    <script src="<?php echo base_url(); ?>assets/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/trumbowyg.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
    <?php if (isset($vuecomp)): ?>
      <script src="<?php echo base_url(); ?>assets/vue/vuecom/<?php echo $vuecomp ?>"></script>
    <?php endif ?>
  </body>
</html>