<section id="home" class="mainexchange py-5" style="background: #005455;">
  <div class="container">
    <div class="row">
      <input type="hidden" id="urlsssssssss" value="<?php echo base_url(); ?>">

      <div class="col-md-3">
          <h2 align="center" class="text-white">
            Send <span>To</span>
          </h2>
          <div class="fixed-height scrollbar-outer scrollbar-outer1">
            <multiselect @select="sendchange" v-model="send" label="name" placeholder="Select" track-by="name" :options="sendoptions" :option-height="104" :custom-label="customLabel" :show-labels="false">
              <template slot="singleLabel" slot-scope="props">
                <img width="30px" class="option__image px-1" :src="base_url+props.option.external_icon" :alt="props.option.name">
                {{ props.option.name }}
              </template>
              <template slot="option" slot-scope="props">
                <img width="30px" class="option__image px-1" :src="base_url+props.option.external_icon" :alt="props.option.name">{{ props.option.name }}
              </template>
            </multiselect>
          </div>
          <span class="text-white">Minimum : {{ send.min_amount }} {{ send.currency_name }}</span>
      </div>

      <div class="col-md-6 mt-5" v-if="confirmtransation">
        <div id="bit_transaction_results" class="selectedsend">
          <div class="row bg-white p-3">
            <div class="col-md-12">
              <div id="bit_transaction_results">
                <div class="alert alert-info">
                  <i class="fa fa-info-circle"></i>
                  You need to make payment manually, use the data below and enter the number of the account in the form below.
                </div>
              </div>
              <form id="bit_confirm_transaction">
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <td colspan="2">
                        <h4 class="text-center"><a href="" class="btn btn-success">Order Summery</a></h4>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <h4 class="text-center"><a href="" class="btn btn-success">Order ID : {{ gateways[0].id }}</a></h4>
                      </td>
                    </tr>
                    <tr style="background: #003E11;color: #fff;">
                        <td class="text-center">
                            <div>You send</div>
                            <p>{{ gateways[0].amount_send }}</p>
                        </td>
                        <td class="text-center">
                            <div>You receive</div>
                            <p><b>{{ gateways[0].amount_receive }}</b></p>
                            <p>To account</p>
                            <p><b>{{ gateways[0].gateway_account }}</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                    <tr class="text-center">
                      <td>
                        <span style="font-size: 10px;" class="pull-left">Our {{ gateways[0].name }} Address:</span>
                      </td>
                      <td>
                        <span class="pull-right">
                          <input type="text" disabled="" :value="gateways[0].account" id="myInput" desa=""><button>Copy</button></span>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="form-group">
                  <label></label>
                  <input type="text"  class="form-control" v-model="send_account" :placeholder="messsssss">
                </div>
                <div style="text-align: center;"> <button id="dddddddddd" type="button" @click="finalsubmit" class="btn btn-primary">Confirm Order</button></div>
                <h4 class="text-danger" v-if="me">Please enter account.</h4>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 mt-5" v-else>
        <div class="selectedsend" id="bit_transaction_results">
          <form v-if="send && receive" id="exchangeForm">
            <div class="row">
              <div class="col-md-6">
                <div id="sendCurrencyContainer">
                  <img alt="" :src="gatewaysendinfo.external_icon" class="getwayicon" width="30px">
                  <input type="text" @keyup="bit_calculator" id="sendAmount" v-model="rate_from" class="form-control from" style="text-align: right;">
                    <p class="text-white">
                      Exchange rate: {{ crate_from }} {{ currency_form }} = {{ crate_to  }} {{ currency_to }}
                    </p>
                </div>
              </div>
        
              <div class="col-md-6">
                <div id="receiveCurrencyContainer">
                  <input type="text" @keyup="bit_calculatorr" id="receiveAmount" v-model="rate_to" class="form-control" style="text-align: left;">
                  <img alt="" :src="gatewayreciveinfo.external_icon" class="getwayiconr" width="30px">
                   <p class="text-white">Reserve: {{ reserve }}</p>
                </div>
              </div>
              <div class="col-md-12 text-center">
                <div class="form-group" style="display: none;">
                  <label for="receiverID" style="visibility: hidden;"><span class="receiveEcurrencyName"><span class="receiveAccountType">{{ messagessss }}</span></label>
                  <input id="receiverID" name="receiverid" v-model="receiverid" class="form-control error" type="text" :placeholder="'Enter your '+ placeholdermessage" style="visibility: visible;">
                </div>

                <div class="form-group" style="display: none;">
                  <label for="exchangeEmail">Email</label>
                  <input id="exchangeEmail" type="email" name="email"  v-model="email" class="form-control error" type="text" placeholder="Enter your email" value="">
                </div>

                <div class="form-group">
                    <button id="" class="btn btn-primary btn-lg" type="button"  @click="submit" v-if="parseFloat(rate_to)<gatewayreciveinfo.min_received || parseFloat(rate_from)<gatewaysendinfo.min_amount || parseFloat(rate_to)>gatewayreciveinfo.max_amount || rate_to==''" disabled>Start Order</button>
                    <button id="startExchange" class="btn btn-primary btn-lg" type="button"  @click="submit" v-else>Start Order</button>
                </div>
                
                <div style="padding: 9px;color: #fff;background: #db2c36;" v-if="error.length>0">
                  <p style="margin: 0px;" v-for="e in error" v-html="e"></p>
                </div>

                <div style="padding: 9px;color: #fff;background: #db2c36;" v-if="parseFloat(rate_to)<gatewayreciveinfo.min_received">
                  <p style="margin: 0px;">{{ gatewayreciveinfo.name }} Min. Amount: {{ gatewayreciveinfo.min_received }}</p>
                </div>
            
                <div style="padding: 9px;color: #fff;background: #db2c36;" v-if="parseFloat(rate_from)<gatewaysendinfo.min_amount">
                  <p style="margin: 0px;">{{ gatewaysendinfo.name }} Min. Amount: {{ gatewaysendinfo.min_amount }}</p>
                </div>

                <div style="padding: 9px;color: #fff;background: #db2c36;" v-if="parseFloat(rate_to)>gatewayreciveinfo.max_amount">
                  <p style="margin: 0px;">{{ gatewayreciveinfo.name }} Max. Amount: {{ gatewayreciveinfo.max_amount }}</p>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="col-md-3">
        <h2 align="center" class="text-white">
          Receive
        </h2>
        <div class="fixed-height scrollbar-outer scrollbaroutertest">
          <div class="fixed-height scrollbar-outer scrollbar-outer1">
            <multiselect @select="recivechange" v-model="receive" label="name" placeholder="Select" track-by="name" :options="reciveoptions" :option-height="104" :custom-label="customLabel" :show-labels="false">
              <template slot="singleLabel" slot-scope="props">
                <img width="30px" class="option__image px-1" :src="base_url+props.option.external_icon" :alt="props.option.name">
                {{ props.option.name }}
              </template>
              <template slot="option" slot-scope="props">
                <img width="30px" class="option__image px-1" :src="base_url+props.option.external_icon" :alt="props.option.name">{{ props.option.name }}
              </template>
            </multiselect>
          </div>
          <span class="text-white">Minimum : {{ receive.min_amount }} {{ receive.currency_name }}</span>
        </div>
      </div>
    </div>
  </div>
</section>  

<section class="home-default bg-color py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section box-shadow p-5">
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
   
<!-- Latest Exchanges -->
<section id="sechange" class="pb-2 bg-color p-0">
  <div class="container">
    <div class="section box-shadow p-5">
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
              $this->db->select('currency.*,users.*,gateways.*,exchanges.*,exchanges.status as statuss');
              $this->db->limit(10);
              $this->db->order_by('exchanges.id', 'desc');
              $this->db->join('users', 'users.id = exchanges.user_id');
              $this->db->join('gateways', 'gateways.id = exchanges.gateway_send');
              $this->db->where('exchanges.status', 1);
              $this->db->join('currency', 'currency.currency_id = gateways.currency');
              $query = $this->db->get('exchanges')->result();
              if(count($query)) {
                foreach ($query as $key => $row) {
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
                      <img src="<?php echo base_url().''.$reciveamoutn->external_icon ?>" width="20px" height="20">
                      <span class="pl-2"><?php echo $reciveamoutn->name; ?></span>
                    </td>
                    <td><?php echo sprintf('%0.2f',$row->amount_send);?><?php echo " ".$row->currency_name ?></td>
                    <td><?php echo sprintf('%0.2f',$row->amount_receive);?> <span><?php echo " ".$reciveamoutn->currency_name ?></span></td>
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
      </div>
    </div>
  </div>
</section>

<!-- Latest Completed -->
<section id="sechange" class="pb-2 bg-color p-0 my-5">
  <div class="container">
    <div class="section box-shadow p-5">
      <h3 class="text-center">Latest Completed</h3>
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
              $this->db->select('currency.*,users.*,gateways.*,exchanges.*,exchanges.status as statuss');
              $this->db->limit(10);
              $this->db->order_by('exchanges.id', 'desc');
              $this->db->join('users', 'users.id = exchanges.user_id');
              $this->db->join('gateways', 'gateways.id = exchanges.gateway_send');
              $this->db->where('exchanges.status', 2);
              $this->db->join('currency', 'currency.currency_id = gateways.currency');
              $query = $this->db->get('exchanges')->result();
              if(count($query)) {
                foreach ($query as $key => $row) {
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
                      <img src="<?php echo base_url().''.$reciveamoutn->external_icon ?>" width="20px" height="20">
                      <span class="pl-2"><?php echo $reciveamoutn->name; ?></span>
                    </td>
                    <td><?php echo sprintf('%0.2f',$row->amount_send);?><?php echo " ".$row->currency_name ?></td>
                    <td><?php echo sprintf('%0.2f',$row->amount_receive);?> <span><?php echo " ".$reciveamoutn->currency_name ?></span></td>
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
      </div>
    </div>
  </div>
</section>

<!-- Latest Rejected -->
<section id="sechange" class="pb-2 bg-color p-0">
  <div class="container">
    <div class="section box-shadow p-5">
      <h3 class="text-center">Latest Rejected</h3>
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
              $this->db->select('currency.*,users.*,gateways.*,exchanges.*,exchanges.status as statuss');
              $this->db->limit(10);
              $this->db->order_by('exchanges.id', 'desc');
              $this->db->join('users', 'users.id = exchanges.user_id');
              $this->db->join('gateways', 'gateways.id = exchanges.gateway_send');
              $this->db->where('exchanges.status', 3);
              $this->db->join('currency', 'currency.currency_id = gateways.currency');
              $query = $this->db->get('exchanges')->result();
              if(count($query)) {
                foreach ($query as $key => $row) {
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
                      <img src="<?php echo base_url().''.$reciveamoutn->external_icon ?>" width="20px" height="20">
                      <span class="pl-2"><?php echo $reciveamoutn->name; ?></span>
                    </td>
                    <td><?php echo sprintf('%0.2f',$row->amount_send);?><?php echo " ".$row->currency_name ?></td>
                    <td><?php echo sprintf('%0.2f',$row->amount_receive);?> <span><?php echo " ".$reciveamoutn->currency_name ?></span></td>
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
      </div>
    </div>
  </div>
</section>


<?php
  $this->db->join('users', 'users.id = testimonials.user_id');
  $this->db->order_by('testimonials.id', 'desc');
  $query = $this->db->get('testimonials')->result();
?>
<section id="feedback" class="pb-2 bg-color p-0 my-5">
  <div class="container">
    <div class="section box-shadow p-5">
      <h3 class="text-center"><strong>Customers Feedback</strong></h3>
        <div class="owl-carousel feedback">
            <?php if(count($query)>1) { ?>
                <?php foreach ($query as $key => $var): ?>
                <div class="item box-shadow p-3 m-2" style="border: 1px solid;text-align: center;">
                  <div class="ad-info">
                    <div class="text-center">
                         <?php if($var->profile!=null){ ?>
                          <img class="rounded-circle d-inline" style="width:150px;height: 150px" src="<?php echo base_url()?>assets/temp/<?php echo $var->profile; ?>" alt="ssssss">
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
            <?php }
            ?>
        </div>
        <?php if(count($query)>3){ ?>
          <div class="text-right mt-3">
            <a class="btn btn-success" href="<?php echo base_url().'home/allfeedback' ?>">All Feedback</a>
          </div>
        <?php } ?>
    </div>
  </div>
</section>


<section class="service_area mb-5">
  <div class="container text-center">
    <div class="section box-shadow p-5">
     <h3 class="text-center"><strong>Service</strong></h3>
    <div class="row">
      <div class="col-md-3">
        <div class="service_box box-shadow p-3"  style="min-height: 310px;">
          <div class="service-icon">
            <img src="<?php echo base_url()."assets/temp/svgicon/like.svg" ?>" alt="facebook" class="m-3" width="50px;">
          </div>
          <h5 class="text-success">Account sale</h5>
          <p>Skrill&gt;Neteller&gt;paypal&gt; Payza&gt;PM account for sell . Account charge 2000-2500 Tk . Accounts are 100% safe from hacking </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="service_box box-shadow p-3" style="min-height: 310px;">
          <div class="service-icon">
              <img src="<?php echo base_url()."assets/temp/svgicon/circle.svg" ?>" alt="facebook" class="m-3" width="50px;">
          </div>
          <h5 class="text-success">Documents Sale</h5>
          <p>if you will need Utility Bill &amp; Bank Statement, then you can contact with us . Our Documents charge 500 tk only </p>
      </div>
    </div>
    <div class="col-md-3">
      <div class="service_box box-shadow p-3" style="min-height: 310px;">
          <div class="service-icon">
            <img src="<?php echo base_url()."assets/temp/svgicon/smot.svg" ?>" alt="facebook" class="m-3" width="50px;">
        </div>
        <h5 class="text-success">Account verification</h5>
        <p>If you will need any Account verification,then you can contact with us . Our Account verification charge 1000 tk only </p>
      </div>
    </div>
    <div class="col-md-3">
        <div class="service_box box-shadow p-3"  style="min-height: 310px;">
         <div class="service-icon">
              <img src="<?php echo base_url()."assets/temp/svgicon/verify.svg" ?>" alt="facebook" class="m-3" width="50px;">
          </div>
          <h5 class="text-success">Accounts problem solution</h5>
          <p>If you will need any types help,then you can contact with us . Our Account verification charge</p>
      </div>
    </div>
    </div>
  </div>
  </div>
</section>

     