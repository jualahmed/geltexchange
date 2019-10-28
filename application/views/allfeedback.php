
<section id="feedback" class="pb-2 mt-4 p-0">
  <div class="container">
    <div class="section box-shadow">
      <h3 class="text-center"><strong>Customers Feedback</strong></h3>
      <div class="row">
         <?php if(count($results)) { ?>
              <?php foreach ($results as $key => $var): ?>
              <div class="col-md-4 box-shadow" style="border: 1px solid;text-align: center;">
                <div class="ad-info">
                  <div class="text-center">
                       <?php if($var->profile!=null){ ?>
                        <img class="rounded-circle d-inline" style="width:150px;height: 150px" src="<?php echo base_url()?>assets/temp/profile/<?php echo $var->profile; ?>" alt="ssssss">
                      <?php }else{ ?>
                        <img class="rounded-circle d-inline" style="width:120px;height: 120px" src="<?php echo base_url()?>assets/temp/avatar-placeholder.svg" alt="ssssss">
                      <?php } ?>
                  </div>
                  <h3 class="item-price"><span class="label label-success" style="color:#fff;"><i class="fa fa-smile-o"></i> Positive</span></h3>
                    <?php if($var->type == "1") { ?>
                    <h3 class="item-price">
                      <span class="btn text-white btn-sm btn-success"><i class="fa fa-smile-o"></i> positive</span>
                    </h3>
                    <?php } elseif($var->type == "2") { ?>
                    <h3 class="item-price">
                      <span class="btn btn-sm btn-warning text-white">
                        <i class="fa fa-meh-o"></i> neutral
                      </span>
                      </h3>
                    
                    <?php } elseif($var->type == "3") { ?>
                    <h3 class="item-price"><span class="btn text-white btn-sm btn-danger">
                      <i class="fa fa-frown-o"></i> negative</span>
                    </h3>
                    
                    <?php } else { ?>
                    <h3 class="item-price"><span class="btn text-white btn-sm btn-light"><i class="fa fa-meh-o"></i> Unknown</span></h3>
                    <?php } ?>
                  <h5 class="item-title">
                      <?php echo $var->content ?>
                  </h5>
                  <div class="item-cat">
                    <span><?php echo $var->username ?></span> 
                  </div>
                  <div><?php echo $var->date ?></div>
                </div><!-- ad-info -->
              </div><!-- featured -->
              <?php endforeach ?>
            <?php } else { ?>
              <h2> no_have_testimonials </h2>
          <?php   }
          ?>
      <div><?php echo $this->pagination->create_links(); ?></div>
      </div>
      </div>
    </div>
</section>