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
                    </div>
                    <div class="box-body">
                        <h3 class="text-info"><?php echo $message;?></h3>
                        <form action="<?php echo base_url().'admin/faqandtutirial/create' ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Title">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Content</label>
                                    <input type="text" class="form-control" name="content" placeholder="content">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="">Status</label>
                                    <select name="status" class="form-control">
                                      <option value="">Select a Status</option>
                                      <option value="1">FAQ</option>
                                      <option value="2">Tutorila</option>
                                    </select>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <div class="col-sm-12">
                                  <br>
                                    <div class="btn-group">
                                        <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
                                        <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
                                        <?php echo anchor('admin/faqandtutirial', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
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
