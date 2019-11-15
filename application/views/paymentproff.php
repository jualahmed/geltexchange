<section id="sechange" class="pb-2 bg-color pt-5 p-0">
  <div class="container">
    <div id="put">
      <div class="section box-shadow p-3 bg-white">
        <h3 class="text-center">Latest Exchanges</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm w-100" align="center">
              <thead>
                <tr>
                  <th><span><?php echo 'username'; ?></span></th>
                  <th><span><?php echo 'send'; ?></span></th>
                  <th><span><?php echo 'receive'; ?></span></th>
                  <th><span><?php echo 'Send amount'; ?></span></th>
                  <th><span><?php echo 'Recive amount'; ?></span></th>
                  <th class="al"><span> <?php echo 'status'; ?></span></th>
                  <th class="al"><span> Date</span></th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(count($results)) {
                  foreach ($results as $key => $row) {
                    $this->db->where('id', $row->gateway_receive);
                    $this->db->join('currency', 'currency.currency_id = gateways.currency');
                    $reciveamoutn=$this->db->get('gateways')->row();
                    ?>
                    <tr>
                      <td><?php echo $row->username ?></td>
                      <td>
                        <img src="<?php echo base_url().''.$row->external_icon ?>" width="20px" height="20">
                        <span class="pl-2"><?php echo $row->name; ?></span>
                      </td>
                      <td>
                        <?php if(isset($reciveamoutn->external_icon)){?><img src="<?php echo base_url().''.$reciveamoutn->external_icon ?>" width="20px" height="20"><?php } ?>
                        <span class="pl-2"><?php if(isset($reciveamoutn->name)) echo $reciveamoutn->name; else echo "Deleted"; ?></span>
                      </td>
                      <td><?php if(isset($reciveamoutn->external_icon)) echo sprintf('%0.2f',$row->amount_send);?><?php if(isset($reciveamoutn->external_icon)) echo " ".$row->currency_name ?></td>
                      <td><?php if(isset($reciveamoutn->external_icon)) echo sprintf('%0.2f',$row->amount_receive);?> <span><?php if(isset($reciveamoutn->external_icon)) echo " ".$reciveamoutn->currency_name ?></span></td>
                      <td align="center">
                        <?php if ($row->statuss==0): ?>
                           <span class="badge badge-sm badge-info d-inline">Waiting for payment</span>
                        <?php elseif($row->statuss==1): ?>
                            <span class="badge badge-sm badge-primary d-inline">Processing</span>
                        <?php elseif($row->statuss==2): ?>
                            <span class="badge badge-sm badge-success d-inline">Completed</span>
                        <?php elseif($row->statuss==3): ?>
                          <span class="badge badge-sm badge-danger d-inline">Rejected</span>
                        <?php elseif($row->statuss==4): ?>
                          <span class="badge badge-sm badge-primary d-inline">Processing</span>
                        <?php endif ?>
                      </td>
                      <td><?php echo date("Y-m-d g:i:s A",strtotime($row->created_at)); ?></td>
                    </tr>
                          <?php
                        }
                      } else {
                        echo '<tr><td colspan="5">'.'still_no_exchanges'.'</td></tr>';
                      }
                  ?>
              </tbody>
            </table>
             <p><?php echo $links; ?></p>

        </div>
      </div>
    </div>
  </div>
</section>

<section class="home-default py-5 bg-color pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="section box-shadow p-3 bg-white">
                  <div class="row">
                    <div class="col-md-8 col-sm-8">
                      <h3 class="text-center"><strong>Reserve</strong></h3>
                      <div class="row">
                          <?php
                            $this->db->join('currency', 'currency.currency_id = gateways.currency');
                            $query2 = $this->db->get('gateways')->result();
                            if(count($query2)) {
                              foreach ($query2 as $key => $row) {
                          ?>
                        <div class="col-md-3 col-sm-3 mb-3">
                            <div class="card text-center box-shadow">
                               <div class="p-1">
                                 <img src="<?php echo base_url().''.$row->external_icon ?>" alt="" class="rounded-circle" height="50px;" width="50px">
                               </div>
                              <div class="p-1">
                                <p class="card-title text-center">
                                     <?php echo $row->name; ?>
                                </p>
                                <a href="#" class="badge badge-primary p-2 m-2">
                                  <strong>
                                     <?php echo sprintf('%0.2f',$row->reserve)?> <span><?php echo $row->currency_name ?></span>
                                  </strong>
                                </a>
                              </div>
                            </div>
                        </div>
                        <?php
                              }
                            }else{
                          ?>
                              <div class="col-md-12 col-sm-12">
                                <?php echo $lang['no_have_gateways']; ?>
                              </div>
                          <?php } ?>    
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                      <h3 class="text-center"><strong>Today's Buy-Sell Price</strong></h3>
                      <div class="table-responsive">
                          <table class="table table-sm table-bordered">
                              <tbody>
                                  <tr>
                                      <th>
                                          <strong>We Accept</strong>
                                      </th>
                                      <th class="text-center">
                                          <strong>We Buy</strong>
                                      </th>
                                      <th class="text-center">
                                          <strong>We Sell</strong>
                                      </th>
                                  </tr>
                                     <?php
                                        $this->db->where('buy_price>0');
                                        $query2 = $this->db->get('gateways')->result();
                                      if(count($query2)) {
                                       foreach ($query2 as $key => $row) {
                                      ?>
                                  <tr>
                                     <td>
                                      <img src="<?php echo base_url().''.$row->external_icon ?>" alt="" class="rounded-circle" height="30px;" width="30px">
                                        <strong><?php echo $row->name; ?></strong>
                                      </td>
                                      <td class="text-center">
                                          <strong><?php echo $row->buy_price; ?></strong>
                                      </td>
                                      <td class="text-center">
                                        <strong><?php echo $row->sales_price; ?></strong>
                                      </td>
                                  </tr>
                                   <?php
                                      }
                                    }else{
                                    ?>
                                      <div class="col-md-12">
                                       <b> <?php echo 'no_have_gateways'; ?></b>
                                      </div>
                                    <?php } ?>   
                              </tbody>
                          </table>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
</section>