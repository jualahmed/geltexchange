<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
      <div class="content-wrapper">
        <section class="content-header">
          <?php echo $pagetitle; ?>
          <?php echo $breadcrumb; ?>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-md-12">
               <div class="box">
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>User Name</th>
                          <th>Send</th>
                          <th>Receive</th>
                          <th>Amount Send</th>
                          <th>Amount Receive</th>
                          <th>Account Send</th>
                          <th>Account Receive</th>
                          <th>Date</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if($results) foreach ($results as $key => $v):?>
                            <?php
                              $this->db->where('id', $v->gateway_receive);
                              $this->db->join('currency', 'gateways.currency = currency.currency_id');
                              $gateway_r=$this->db->get('gateways')->row();
                            ?>
                              <tr>
                                <td><?php echo $start+$key+1; ?></td>
                                <td>
                                  <?php if($v->profile): ?><img src="<?php echo $v->profile ?>" alt="" width="25px;">
                                  <?php else: ?><img src="<?php echo base_url().'assets/images/avatar.jpg' ?>" alt="" width="25px;">
                                  <?php endif ?>
                                 <span> <?php echo htmlspecialchars($v->username, ENT_QUOTES, 'UTF-8'); ?></span>
                                </td>
                                <td>
                                  <?php if($v->external_icon): ?><img src="<?php echo base_url().$v->external_icon ?>" alt="" width="25px;">
                                  <?php else: ?><img src="<?php echo base_url().'assets/images/avatar.jpg' ?>" alt="" width="25px;">
                                  <?php endif ?>
                                  <span> <?php echo htmlspecialchars($v->name); ?></span>
                                </td>
                                <td><?php echo htmlspecialchars($v->amount_send.' '.$v->currency_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td>
                                  <?php if($gateway_r->external_icon): ?><img src="<?php echo base_url().$gateway_r->external_icon ?>" alt="" width="25px;">
                                  <?php else: ?><img src="<?php echo base_url().'assets/images/avatar.jpg' ?>" alt="" width="25px;">
                                  <?php endif ?>
                                  <?php echo htmlspecialchars($gateway_r->name); ?>
                                </td>
                                <td><?php echo htmlspecialchars($v->amount_receive.' '.$gateway_r->currency_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($v->send_account, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($v->gateway_account, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($v->created_at, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td>
                                  <?php if ($v->statuss==0): ?>
                                      <span class="btn btn-sm btn-info btn-block">Waiting for payment</span>
                                  <?php elseif($v->statuss==1): ?>
                                      <span class="btn btn-sm btn-primary btn-block">Processing</span>
                                  <?php elseif($v->statuss==2): ?>
                                      <span class="btn btn-sm btn-success btn-block">completed</span>
                                  <?php elseif($v->statuss==3): ?>
                                    <span class="btn btn-sm btn-danger btn-block">rejected</span>
                                  <?php endif ?>
                                </td>
                                <td>
                                  <a class="btn btn-sm btn-warning" href="<?php echo base_url().'admin/exchanges/view/'.$v->id ?>" title="Edit">View</i></a> 
                                </td>
                            </tr>
                      <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                  <br>
                  <div class="text-right"><?php echo $this->pagination->create_links(); ?></div>
                </div>
              </div>
             </div>
          </div>
        </section>
      </div>
