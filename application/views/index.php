<section id="home" class="mainexchange py-2">
  <div class="container">
    <div class="row">
      <input type="hidden" id="urlsssssssss" value="<?php echo base_url(); ?>">

      <div class="col-md-3">
        <h2 align="center" class="text-white">
          <img src="<?php echo base_url().'assets/svgicon/arrowup.svg' ?>" alt="" width="30px;"> Send <span>To</span>
        </h2>
        <div class="fixed-height scrollbar-outer scrollbar-outer1">
          <form action="">
            <?php
              $this->db->where('allow_send', 1);
              $this->db->where('status', 1);
              $gateways = $this->db->get('gateways')->result();
              if(count($gateways)) {?>
                <?php foreach ($gateways as $key => $g): ?>
                   <div class="inputGroup">
                    <img src="<?php echo base_url().$g->external_icon; ?>" class="imgages">
                    <input @click="sendchange" v-model="send" id="<?php echo $g->id; ?>" name="send" value="<?php echo $g->id; ?>"  type="radio"/>
                    <label for="<?php echo $g->id; ?>"><div> <?php echo $g->name; ?></div></label>
                  </div>
                <?php endforeach ?>
              <?php
              }else {
                echo 'no_have_gateways';
              }
            ?>
          </form>
        </div>
        <div id="clickforscroll">Show More</div>
      </div>
    
      <div class="col-md-3" id="atmobile">
        <h2 align="center" class="text-white">
          <img src="<?php echo base_url().'assets/svgicon/arrouwdown.svg' ?>" alt="" width="30px;"> Receive
        </h2>
        <div class="fixed-height scrollbar-outer scrollbaroutertest">
          <form action="">
          <?php
            $this->db->where('allow_receive', 1);
            $this->db->where('status', 1);
            $gatewaysrevive = $this->db->get('gateways')->result();
            if(count($gatewaysrevive)) {?>
              <?php foreach ($gatewaysrevive as $key => $g): ?>
                <div class="inputGroup">
                  <img src="<?php echo base_url().$g->external_icon; ?>" class="imgages">
                  <input @click="recivechange" v-model="receive" id="receive<?php echo $g->id; ?>" name="receive" value="<?php echo $g->id; ?>" type="radio"/>
                  <label for="receive<?php echo $g->id; ?>"><div> <?php echo $g->name; ?></div></label>
                </div> 
              <?php endforeach ?>
            <?php
              } else {
                echo 'no_have_gateways';
              }
            ?>

          </form>
        </div>
          <div id="scrollbaroutertestddd">Show More</div>
      </div>

      <div class="col-md-6" v-if="confirmtransation">
        <div id="bit_transaction_results" class="selectedsend">
          <div class="row">
              <div class="col-md-12">
                  <div id="bit_transaction_results">
                    <div class="alert alert-info">
                      <i class="fa fa-info-circle"></i>
                      You need to make payment manually, use the data below and enter the number of the account in the form below.
                    </div>
                  </div>
                  <form id="bit_confirm_transaction">
                      <table class="table table-striped table-responsive">
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

      <div class="col-md-6" v-else>
          <br>
          <div class="selectedsend" id="bit_transaction_results">
            <form v-if="send && receive" id="exchangeForm">
                <div class="row">
                  <div class="col-md-5">
                    <div id="sendCurrencyContainer">
                      <p style="padding: 0px;margin: 0px;text-align: center;">Fee:  {{ sendfee }} {{ currency_form }} </p>
                      <img alt="" :src="gatewaysendinfo.external_icon" class="getwayicon">
                      <input type="text" @keyup="bit_calculator" id="sendAmount" v-model="rate_from" class="form-control from" style="text-align: right;">
                        <p style="text-align: center;font-size: 12px;">Exchange rate: {{ crate_from }} {{ currency_form }} = {{ crate_to  }} {{ currency_to }}</p>

                    </div>
                  </div>
            
                  <div class="col-md-2" style="text-align: center;">
                    <i class="fa fa-exchange fa-2x" style="margin-top: 26px;"></i>
                  </div>

                  <div class="col-md-5">
                    <div id="receiveCurrencyContainer">
                      <p style="padding: 0px;margin: 0px;text-align: center;">Fee: {{ recivefee }}{{ currency_to }}
                        <span style="font-size: 11px;" v-if="extranandskill>0">Extra: {{extranandskill}} BDT</span></p>
                            <input type="text" @keyup="bit_calculatorr" id="receiveAmount" v-model="rate_to" class="form-control" style="text-align: left;">
                            <img alt="" :src="gatewayreciveinfo.external_icon" class="getwayiconr">
                             <p style="text-align: center;font-size: 12px;">Reserve: {{ reserve }}</p>
                          </div>
                        </div>
                        <div class="col-md-12" style="color: red;text-align: center;">
                          <div v-if="currency_to=='Wallet'" style="width: 220px!important;color: blue;background: #003E11;padding: 10px;
                          text-align: center;
                          min-width: 232px;
                          margin: auto;">You will get : {{ parseFloat(rate_to)-(parseFloat(recivefee)+(parseFloat(sendfee)+parseFloat(extranandskill))/crate_from) }} {{ currency_to }}</div><div v-else style="width: 203px;border-radius: 35px;;color: red;background: #003E11;padding: 10px;
                          text-align: center;
                          
                          margin: auto;">You will get:  {{ rate_to-recivefee }} {{ currency_to }}</div> <br><p style="min-width: 320px;" class="box-shadow">Messsage: <span style="color: black;"> <?php  $d=json_decode($setting->data); if($d->exchangemessage) echo $d->exchangemessage; ?></span></p>
                        </div>
                      </div>
                      <hr>

                <div class="form-group">
                  <label for="receiverID" style="visibility: visible;"><span class="receiveEcurrencyName"><span class="receiveAccountType">{{ messagessss }}</span></label>
                  <input id="receiverID" name="receiverid" v-model="receiverid" class="form-control error" type="text" :placeholder="'Enter your '+ placeholdermessage" style="visibility: visible;">
                </div>

                <div class="form-group" style="display: none;">
                  <label for="exchangeEmail">Email</label>
                  <input id="exchangeEmail" type="email" name="email"  v-model="email" class="form-control error" type="text" placeholder="Enter your email" value="">
                </div>

                <div class="form-group" style="text-align: center;">
                    <label class="checkbox">
                    <input name="terms" type="checkbox" v-model="tos" value="1" id="term" required style="width: 20px;margin-left: -31px;">
                    <?php if($d->importentmessage) echo $d->importentmessage; ?>
                    <a style="text-decoration: underline;" href="<?php echo base_url().'home/termsofservices'; ?>" target="_blank">TOS</a>
                </label>
                  <button id="" class="btn btn-primary btn-sm" type="button"  @click="submit" v-if="parseFloat(rate_to)<gatewayreciveinfo.min_received || parseFloat(rate_from)<gatewaysendinfo.min_amount || parseFloat(rate_to)>gatewayreciveinfo.max_amount || rate_to==''" disabled>Start Order</button>
                  <button id="startExchange" class="btn btn-primary btn-sm" type="button"  @click="submit" v-else>Start Order</button>
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
            </form>
          </div>
      </div>

      <div class="col-md-3" id="atdesktop">
        <h2 align="center" class="text-white">
          <img src="<?php echo base_url().'assets/svgicon/arrouwdown.svg' ?>" alt="" width="30px;"> Receive
        </h2>
        <div class="fixed-height scrollbar-outer scrollbaroutertest">
          <form action="">
          <?php
            $this->db->where('allow_receive', 1);
            $this->db->where('status', 1);
            $gatewaysrevive = $this->db->get('gateways')->result();
            if(count($gatewaysrevive)) {?>
              <?php foreach ($gatewaysrevive as $key => $g): ?>
                <div class="inputGroup">
                  <img src="<?php echo base_url().$g->external_icon; ?>" class="imgages">
                  <input @click="recivechange" v-model="receive" id="receive<?php echo $g->id; ?>" name="receive" value="<?php echo $g->id; ?>" type="radio"/>
                  <label for="receive<?php echo $g->id; ?>"><div> <?php echo $g->name; ?></div></label>
                </div> 
              <?php endforeach ?>
            <?php
              } else {
                echo 'no_have_gateways';
              }
            ?>

          </form>
        </div>
          <div id="scrollbaroutertestddd">Show More</div>
      </div>

    </div>
  </div>
</section>  

<section id="reserve" class="py-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section box-shadow p-3">
          <h3 class="text-center"><strong><a class="btn btn-success btn-block" href="">Reserve</a></strong></h3>
            <div class="row">
              <?php
                $this->db->join('currency', 'currency.currency_id = gateways.currency');
                $query2 = $this->db->get('gateways')->result();
                if(count($query2)) {
                  foreach ($query2 as $key => $row) {
                  ?>
                  <div class="col-md-4 col-lg-2 col-sm-4 col-xs-4">
                    <div class="card text-center box-shadow fixed-heights">
                      <img src="">
                      <div class="card-body">
                        <img src="<?php echo base_url().''.$row->external_icon ?>" alt="" class="rounded-circle" height="50px;" width="50px">
                        <h5 class="card-title text-center">
                          <strong>
                            <?php echo $row->name; ?>
                          </strong>
                        </h5>
                        <a href="#" class="btn-success btn-block">
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
      </div>
    </div>
  </div>
</section>

<section id="todayprice" class="pb-2">
  <div class="container">
    <div class="row">
       <div class="col-md-12">
        <div class="box-shadow p-3">
          <div class="my-2 text-center">
            <h2><button class="btn btn-success btn-block pl-0 ml-0">Today's Buy-Sell Price</button></h2>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm table-worw">
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
</section>

<section id="sechange" class="pb-2">
  <div class="container">
    <div id="put">
      <div class="section box-shadow p-3">
        <h2 class="text-center"><button class="btn btn-success btn-block pl-0 ml-0">Latest Exchanges</button></h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm w-100" align="center">
              <thead>
                <tr>
                  <th><span class="btn btn-success"><?php echo 'username'; ?></span></th>
                  <th><span class="btn btn-success"><?php echo 'send'; ?></span></th>
                  <th><span class="btn btn-success"><?php echo 'receive'; ?></span></th>
                  <th><span class="btn btn-success"><?php echo 'Send amount'; ?></span></th>
                  <th><span class="btn btn-success"><?php echo 'Recive amount'; ?></span></th>
                  <th class="al"><span class="btn btn-success"> <?php echo 'status'; ?></span></th>
                  <th class="al"><span class="btn btn-success"> Date</span></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $this->db->select('currency.*,users.*,gateways.*,exchanges.*,exchanges.status as statuss');
                $this->db->limit(10);
                $this->db->order_by('exchanges.id', 'desc');
                $this->db->join('users', 'users.id = exchanges.user_id');
                $this->db->join('gateways', 'gateways.id = exchanges.gateway_send');
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
                                 <span class="btn btn-sm btn-info">Waiting for payment</span>
                              <?php elseif($row->statuss==1): ?>
                                  <span class="btn btn-sm btn-primary">Pending</span>
                              <?php elseif($row->statuss==2): ?>
                                  <span class="btn btn-sm btn-success">completed</span>
                              <?php elseif($row->statuss==3): ?>
                                <span class="btn btn-sm btn-danger">rejected</span>
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
  </div>
</section>


<?php
    $this->db->join('users', 'users.id = testimonials.user_id');
    $this->db->order_by('testimonials.id', 'desc');
    $query = $this->db->get('testimonials')->result();
?>
<section id="" class="pb-5">                
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="section box-shadow p-3">
        <h2 class="text-center"><button class="btn btn-success btn-block pl-0 ml-0">Customers Feedback</button></h2>
            <div class="owl-carousel">
                <?php if(count($query)) { ?>
                  <?php foreach ($query as $key => $var): ?>
                      <div class="ad-info box-shadow m-1 mr-3 p-3 text-center">
                        <div class="text-center my-3">
                          <?php if($var->profile!=null){ ?>
                            <img class="rounded-circle d-inline" style="width:150px;height: 150px" src="<?php echo base_url()?>assets/images/<?php echo $var->profile; ?>" alt="ssssss">
                          <?php }else{ ?>
                            <img class="rounded-circle d-inline" style="width:150px;height: 150px" src="<?php echo base_url()?>assets/images/avatar.jpg" alt="ssssss">
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
                      </div><!-- ad-info -->
                <?php endforeach ?>
                <?php } else { ?>
                  <h2> no_have_testimonials </h2>
              <?php   }
              ?>
            </div>
              <?php if(count($query)>3){ ?>
                <div class="text-right"><a class="btn btn-info" href="<?php echo base_url().'home/allfeedback' ?>">All Feedback</a></div>
              <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
