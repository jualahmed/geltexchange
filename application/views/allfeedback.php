<section id="" class="py-4 my-4">                
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="section box-shadow p-3">
          <h3 class="ml-1"><strong>Customers Feedback</strong></h3>
            <div class="row">
                <?php if(count($results)) { ?>
                  <?php foreach ($results as $key => $var): ?>
                      <div class="col-md-4">
                        <div class="ad-info box-shadow m-1 p-3 text-center">
                        <div class="text-center my-3">
                          <?php if($var->profile!=null){ ?>
                            <img class="rounded-circle d-inline" style="height: 150px;width: 150px;" src="<?php echo base_url()?>assets/images/<?php echo $var->profile; ?>" alt="ssssss">
                          <?php }else{ ?>
                            <img class="rounded-circle d-inline" style="height: 150px;width: 150px;" src="<?php echo base_url()?>assets/images/avatar.jpg" alt="ssssss">
                          <?php } ?>
                        </div>
                        <?php if($var->type == "1") { ?>
                        <h3 class="item-price">
                          <span class="btn btn-sm btn-success"><i class="fa fa-smile-o"></i> positive</span>
                        </h3>
                        <?php } elseif($var->type == "2") { ?>
                        <h3 class="item-price">
                          <span class="badge badge-warning">
                            <i class="fa fa-meh-o"></i> neutral</span>
                          </h3>
                        
                        <?php } elseif($var->type == "3") { ?>
                        <h3 class="item-price"><span class="btn btn-sm btn-danger">
                          <i class="fa fa-frown-o"></i> negative</span>
                        </h3>
                        
                        <?php } else { ?>
                        <h3 class="item-price"><span class="btn btn-sm btn-light"><i class="fa fa-meh-o"></i> Unknown</span></h3>
                        
                        <?php } ?>
                        <h5 class="item-title" style="font-size: 15px;"><?php echo $var->content; ?></h5>
                        <div class="item-cat">
                          <span><?php echo $var->username ?></span> 
                          <p><span><?php echo $var->date ?></span> </p>
                        </div>
                        </div>
                      </div><!-- ad-info -->
                <?php endforeach ?>
                <?php } else { ?>
                  <h2> no_have_testimonials </h2>
              <?php   }
              ?>
            </div>
            <div class="my-4 text-right"><?php echo $this->pagination->create_links(); ?></div>
        </div>

      </div>
    </div>
  </div>
</section>