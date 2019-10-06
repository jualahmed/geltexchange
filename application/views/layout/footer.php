  
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
           <img class="logoddd" src="http://localhost/exchange/assets/temp/img/logo1.png" alt="" width="350px">
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
          <p class="text-right"><a class="text-white" href="">@ 2019-2019</a></p>
        </div>
        <div class="col-md-2">
          <h4 class="text-white">Follow Us</h4>
          <img src="http://localhost/exchange/assets/temp/img/images/allinco_05.png" alt="" width="40px">
          <img src="http://localhost/exchange/assets/temp/img/images/allinco_07.png" alt="" width="40px">
        </div>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="http://localhost/exchange/assets/temp/scripts/owl.carousel.min.js"></script>
  <script src="http://localhost/exchange/assets/temp/scripts/App.js"></script>
  <?php if (isset($vuecomp)): ?>
    <script src="<?php echo base_url(); ?>assets/vue/vuecom/<?php echo $vuecomp ?>"></script>
  <?php endif ?>
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
