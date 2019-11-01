<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
  
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
    </section>

    <section class="content" style="min-height: 100px">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-maroon"><i class="fa fa-legal"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Exchanges</span>
                        <span class="info-box-number"><?php echo $exchanges ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">gateways</span>
                        <span class="info-box-number"><?php echo $gateways; ?></span>
                    </div>
                </div>
            </div>

            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Users</span>
                        <span class="info-box-number"><?php echo $count_users; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-shield"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Feedback</span>
                        <span class="info-box-number"><?php echo $testimonials; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- pending exchange -->
    <section class="content">
          <div class="row">
            <div class="col-md-12">
               <div class="box">
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                      <thead>
                        <tr>
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
                </div>
              </div>
             </div>
          </div>
    </section>

    <!-- pending users -->
    <section class="content">
    <div class="row">
      <div class="col-md-12">
         <div class="box">
          <div class="box-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th><?php echo lang('users_firstname');?></th>
                  <th><?php echo lang('users_lastname');?></th>
                  <th><?php echo lang('users_email');?></th>
                  <th><?php echo lang('users_status');?></th>
                  <th><?php echo lang('users_action');?></th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($pendinguser as $user):?>
                <tr>
                  <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                  <td>
                 
                  </td>
                  <td><?php echo ($user->active) ? anchor('admin/users/deactivate/'.$user->id, '<span class="label label-success">'.lang('users_active').'</span>') : anchor('admin/users/activate/'. $user->id, '<span class="label label-default">'.lang('users_inactive').'</span>'); ?></td>
                  <td>
                   <a href="<?php echo 'users/edit/'.$user->id ?>" class="btn btn-sm btn-success">Edit</a>
                   <a href="<?php echo 'users/profile/'.$user->id ?>" class="btn btn-sm btn-success">See</a>
                  </td>
                </tr>
                  <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
       </div>
    </div>
  </section>
</div>
