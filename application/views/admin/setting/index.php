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
                        <h3 class="box-title"><?php echo 'Setting'; ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="text-right pr-3">
                          <a href="<?php echo base_url().'admin/setting/create' ?>" class="btn btn-success mr-3">Create A New Setting</a>
                        </div>
                          <?php foreach (json_decode($settiong->data) as $key => $var): ?>
                          <form action="<?php echo base_url().'admin/setting/udpate'?>" method="post">
                            <div class="form-group">
                                <div class="col-sm-12">
                                  <label for="" class="text-capitalize"><?php echo $key ?></label>
                                  <div style="display: flex;">

                                    <div style="width: 87%;"> <input type="hidden" class="form-control" name="key" value="<?php echo $key ?>"><input type="text" class="form-control" name="value" value="<?php echo $var ?>"></div>
                                    <div><?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => "update"));?> <a class="btn btn-danger" href="<?php echo base_url() ?>admin/setting/delete/<?php echo $key ?>">Delete</a></div>
                                  </div>
                                </div>
                            </div>
                          </form>
                          <?php endforeach ?>
                    </div>
                </div>
             </div>
        </div>
    </section>
</div>
