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
                        <h3 class="text-info"><?php echo $message;?></h3>
                        <form action="<?php echo base_url().'admin/gateways/create' ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Gateway name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Gateway name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Currency</label>
                                    <select name="currency" class="form-control">
                                      <option value="">Select a currency</option>
                                      <?php foreach ($currency as $key => $value): ?>
                                        <option value="<?php echo $value->currency_id ?>"><?php echo $value->currency_name ?></option>
                                      <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Reserve</label>
                                    <input type="text" class="form-control" name="reserve" placeholder="Reserve amount">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Minimum amount for exchange</label>
                                    <input type="text" class="form-control" name="min_amount" placeholder="Maximum amount for exchange">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Minimum amount for received</label>
                                    <input type="text" class="form-control" name="min_received" placeholder="Minimum amount for received">
                                </div>
                            </div>
                            <div class="form-group">
                                 <div class="col-sm-12">
                                    <label for="">Minimal amount for exchange</label>
                                    <input type="text" class="form-control" name="max_amount" placeholder="Minimal amount for exchange">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Extra fee</label>
                                    <input type="text" class="form-control" name="extra_fee" placeholder="extra_fee">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">fee</label>
                                    <input type="text" class="form-control" name="fee">
                                </div>
                            </div>
                             <div class="form-group">
                                <div class="col-md-10">
                                  <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="allow_send" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Allow customers to send money through this gateway</label>
                                  </div>
                                </div>
                            </div>
                              <div class="form-group">
                                <div class="col-md-10">
                                  <div class="form-check">
                                  <input type="checkbox" class="form-check-input" name="allow_receive" id="exampleCheck2">
                                  <label class="form-check-label" for="exampleCheck2">Allow customers to receive money to this gateway</label>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Account</label>
                                    <input type="text" class="form-control" name="account" placeholder="Account">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">We Buy</label>
                                    <input type="text" class="form-control" name="buy_price" placeholder="We Buy">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">We Sales</label>
                                    <input type="text" class="form-control" name="sales_price" placeholder="We Sales">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Message</label>
                                    <input type="text" class="form-control" name="t_message" placeholder="Message">
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
                                        <?php echo anchor('admin/gateways', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
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
