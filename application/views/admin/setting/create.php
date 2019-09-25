<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle; ?>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                 <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo 'Setting create'; ?></h3>
                    </div>
                    <div class="box-body">
                       <form action="<?php echo base_url().'admin/setting/create' ?>" method="post">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Key</label>
                                    <input type="text" class="form-control" name="key">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Value</label>
                                    <input type="text" class="form-control" name="value">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                  <br>
                                    <div class="btn-group">
                                        <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
                                        <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
                                        <?php echo anchor('admin/setting', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
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
