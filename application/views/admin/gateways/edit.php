<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                 <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo 'Gateways'; ?></h3>
                    </div>
                    <div class="box-body">
                        <form action="<?php echo base_url().'admin/gateways/update/'.$var->id ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Gateway name</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $var->name ?>" placeholder="Gateway name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Currency</label>
                                    <select name="currency" class="form-control">
                                      <option value="">Select a currency</option>
                                      <?php foreach ($currency as $key => $value): ?>
                                        <?php if ($var->currency==$value->currency_id): ?>
                                          <option value="<?php echo $value->currency_id ?>" selected><?php echo $value->currency_name ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo $value->currency_id ?>"><?php echo $value->currency_name ?></option>
                                        <?php endif ?>
                                      <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Reserve</label>
                                    <input type="text" class="form-control" value="<?php echo $var->reserve ?>" name="reserve" placeholder="Reserve amount">

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Minimum amount for exchange</label>
                                    <input type="text" class="form-control" value="<?php echo $var->min_amount ?>" name="min_amount" placeholder="Maximum amount for exchange">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Minimum amount for received</label>
                                    <input type="text" class="form-control" name="min_received" value="<?php echo $var->min_received ?>" placeholder="Minimum amount for received">
                                </div>
                            </div>
                            <div class="form-group">
                                 <div class="col-sm-12">
                                    <label for="">Minimal amount for exchange</label>
                                    <input type="text" class="form-control" value="<?php echo $var->max_amount ?>" name="max_amount" placeholder="Minimal amount for exchange">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Extra_fee</label>
                                    <input type="text" class="form-control" value="<?php echo $var->extra_fee ?>" name="extra_fee" placeholder="Extra fee">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">fee</label>
                                    <input type="text" class="form-control" value="<?php echo $var->fee ?>" name="fee">
                                </div>
                            </div>
                             <div class="form-group">
                                <div class="col-md-10">
                                  <div class="form-check">
                                    <?php if ($var->allow_send): ?>
                                      <input type="checkbox" class="form-check-input" name="allow_send" checked id="exampleCheck1">
                                    <?php else: ?>
                                      <input type="checkbox" class="form-check-input" name="allow_send" id="exampleCheck1">
                                    <?php endif ?>
                                    <label class="form-check-label" for="exampleCheck1">Allow customers to send money through this gateway</label>
                                  </div>
                                </div>
                            </div>
                              <div class="form-group">
                                <div class="col-md-10">
                                  <div class="form-check">
                                  <?php if ($var->allow_receive): ?>
                                    <input type="checkbox" class="form-check-input" checked name="allow_receive" id="exampleCheck2">
                                  <?php else: ?>
                                     <input type="checkbox" class="form-check-input" name="allow_receive" id="exampleCheck2">
                                  <?php endif ?>
                                  <label class="form-check-label" for="exampleCheck2">Allow customers to receive money to this gateway</label>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Account</label>
                                    <input type="text" class="form-control" value="<?php echo $var->account ?>" name="account" placeholder="Account">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">We Buy</label>
                                    <input type="text" class="form-control" value="<?php echo $var->buy_price ?>" name="buy_price" placeholder="We Buy">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">We Sales</label>
                                    <input type="text" class="form-control" name="sales_price" value="<?php echo $var->sales_price ?>" placeholder="We Sales">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Message</label>
                                    <input type="text" class="form-control" value="<?php echo $var->t_message ?>" name="t_message" placeholder="Message">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">icon</label>
                                    <input type="file" class="form-control" name="external_icon">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                  <br>
                                    <div class="btn-group">
                                        <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
                                        <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
                                        <?php echo anchor('admin/gateways/', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
             </div>
        </div>
    </section>
</div>
