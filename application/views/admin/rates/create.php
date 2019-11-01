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
                        <h3 class="text-info"><?php if(isset($message)) echo $message;?></h3>
                        <form action="<?php echo base_url().'admin/rates/create' ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="">Gateway From</label>
                                    <select name="gateway_from" class="form-control" required>
                                      <option value="">Select a gateways</option>
                                      <?php foreach ($gateways as $key => $value): ?>
                                        <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                      <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Gateway To</label>
                                    <select name="gateway_to" class="form-control" required>
                                      <option value="">Select a gateways</option>
                                      <?php foreach ($gateways as $key => $value): ?>
                                        <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                      <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Rates From</label>
                                    <input type="text" name="rate_from" class="form-control" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Rates To</label>
                                    <input type="text" name="rate_to" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                  <br>
                                    <div class="btn-group">
                                        <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
                                        <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
                                        <?php echo anchor('admin/rates', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
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
