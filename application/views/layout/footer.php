<footer id="footer" class="box-shadow bg-footer pt-3">
	<div class="footer bg-black">
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-3 col-md-6">
					<h6 class="text-white ml--1">xchangs</h6>
					<ul class="pl-0">
						<li><a class="text-white" href="<?php echo base_url() ?>">Buy & Sell</a></li>
						<li><a class="text-white" href="<?php echo base_url() ?>allfeedback">Reviews</a></li>
					</ul>
					<?php $var=json_decode($setting->data);?>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 ">
					<ul class="pl-0">
						<li><a class="text-white" href="<?php echo base_url() ?>/tutorial">Tutorial</a></li>
						<li><a class="text-white" href="<?php echo base_url() ?>about">About Us</a></li>
						<li><a class="text-white" href="<?php echo base_url() ?>/faq">FAQS</a></li>
					</ul>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 ">
					<ul class="pl-0">
						<li><a class="text-white" href="<?php echo base_url() ?>/contact">Contact</a></li>
						<li>
							<a class="text-white" href="<?php echo base_url() ?>termsofservices">
								<span>Terms & Conditions</span>
							</a>
						</li>
						<li>
							<a class="text-white" href="<?php echo base_url() ?>privacypolicy" class="link gray4 hover-white dib v-mid hide-child"><span>Privacy Policy</span></a>
						</li>
					</ul>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 text-white">
					<ul class="pl-0">
						<li><?php echo $var->supportemail ?></li>
						<li>Mobile Number: <?php echo $var->contactnumber ?>  / <?php echo $var->facebook ?></li>
						<li><div><p><?php echo $var->siteabout ?></p></div></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div style="border-top: 1px solid #3ca97c;" class="bg-white">
		<div class="container mt-2 footerbottom">
				<div class="row">
					<div class="col-md-4" style="text-align: left;">
						<a target="_blanck" href="<?php echo $var->facebook ?>" style="margin-right: 10px;">
							<img src="<?php echo base_url()."assets/temp/svgicon/facebook.svg" ?>" alt="facebook" width="30px;">
						</a>
						<a target="_blanck" href="<?php echo $var->twtter ?>" style="margin-right: 10px;">
							<img src="<?php echo base_url()."assets/temp/svgicon/tw.svg" ?>" alt="facebook" width="30px;">
						</a>
						<a target="_blanck" href="<?php echo $var->linkedin ?>" >
							 <img src="<?php echo base_url()."assets/temp/svgicon/in.svg" ?>" alt="facebook" width="30px;">
						</a>
						<a target="_blanck" href="<?php echo $var->youtube ?>" >
							<img src="<?php echo base_url()."assets/temp/svgicon/yo.svg" ?>" alt="facebook" style="width: 44px;margin: 6px;">
						</a>
					</div>
					<div class="col-md-8 textalign">
						<p style="margin-top: 10px;text-transform: uppercase;font-size: 10px;">Copyright © 2017 by 
							<span class="text-uppercase mx-2"><?php echo $var->name ?></span>
							<i class="fa fa-cog fa-spin fa-lg fa-fw"></i>
								 Developed by 
								<a href="https://www.facebook.com/md.jual.ah" target="_blank" class="px-2" id="companyTitle" style="font-size: 10px;text-transform: uppercase;"> 
									Jual Ahmed
								</a>
							</p>
					</div>        
				</div>
		</div>
	</div>
</footer>
<!-- footer -->
<!-- footer -->
	 
<script>var base_url ="<?php echo base_url() ?>"</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script src="<?php echo base_url() ?>assets/temp/js/vue/vue.js"></script>
<script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
<link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
<script src="<?php echo base_url() ?>assets/temp/js/vue/vuebit.js"></script>
<script src="<?php echo base_url() ?>assets/temp/js/custom.js"></script>
	</body>
</html>