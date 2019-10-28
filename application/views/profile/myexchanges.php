<section id="exchanges" class="my-4 py-4" style="min-height: 460px;">
    <div class="container">
        <div class="ads-info box-shadow p-3" style="display: block;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="my-ads section" style="display: block;">
                        <h3>My Exchanges</h3>
                        <hr>
                        <?php foreach ($myexchange as $key => $var): ?>
                          <?php
                          $this->db->join('gateways', 'gateways.id = exchanges.gateway_receive');
                          $this->db->join('currency', 'currency.currency_id = gateways.currency');
                          $this->db->where('gateways.id', $var->gateway_receive);
                          $recive=$this->db->get('exchanges')->row();
                          ?>
                          <div class="panel-body table-responsive">
                              <table class="table table-striped">
                                  <tbody>
                                      <tr>
                                        <td colspan="4">
                                            Exchange ID:
                                            <a href="<?php echo base_url().'profile/singleexchange/'.$var->id ?>">
                                              <?php echo $var->id ?>
                                            </a>
                                            <span class="pull-right">
                                              <span class="px-2">from</span>
                                              <img src="<?php echo base_url().$var->external_icon ?>" width="24px" height="24px" class="img-circle"> <b>
                                                <?php echo $var->name.' '.$var->currency_name ?></b>
                                              <span class="px-2">To</span>
                                               <img src="<?php echo base_url().$recive->external_icon ?>" width="24px" height="24px" class="img-circle"> <b> <?php echo $recive->name.' '.$recive->currency_name ?></b></b>
                                           </span>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Send: <?php echo $var->amount_send.' '.$var->currency_name ?></b></td>
                                        <td>Receive: <?php echo $var->amount_receive.' '.$recive->currency_name ?></td>
                                        <td><span class="pull-right">
                                            Process type: 
                                            <span class="label label-info">Manually</span></span>
                                        </td>
                                        <td>
                                          <span class="pull-right">
                                          <span class="p-2">Status:</span> 
                                          <span class="label label-danger"><i class="fa fa-times"></i>
                                                     <?php if ($var->statuss==0): ?>
                                                       <span class="btn btn-sm btn-info">Waiting for payment</span>
                                                    <?php elseif($var->statuss==1): ?>
                                                        <span class="btn btn-sm btn-primary">Pending</span>
                                                    <?php elseif($var->statuss==2): ?>
                                                        <span class="btn btn-sm btn-success">completed</span>
                                                    <?php elseif($var->statuss==3): ?>
                                                      <span class="btn btn-sm btn-danger">rejected</span>
                                                    <?php endif ?>
                                          </span></span>
                                        </td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>