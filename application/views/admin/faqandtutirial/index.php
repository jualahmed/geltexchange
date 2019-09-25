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
                  <h3 class="box-title"><?php echo anchor('admin/faqandtutirial/create', '<i class="fa fa-plus"></i> '. ('New Faq and tutorial Create'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                </div>
                <div class="box-body">
                  <table class="table table-striped table-hover table-bordered table-responsive">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if($results) foreach ($results as $v):?>
                        <tr>
                          <td><?php echo htmlspecialchars($v->title); ?></td>
                          <td><?php echo htmlspecialchars($v->content); ?></td>
                          <td>
                            <?php if ($v->status==1): ?>
                              FAQ
                            <?php else: ?>
                              Tutorial
                            <?php endif ?>
                          </td>
                          <td>
                            <a class="btn btn-sm btn-success" href="<?php echo base_url().'admin/faqandtutirial/edit/'.$v->id ?>" title="Edit"><i class="fa fa-pencil"></i></a> 
                            <a onclick="return confirm('Are your sure to delete??')" class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/faqandtutirial/delete/'.$v->id ?>" title="Delete"><i class="fa fa-times"></i></a>
                          </td>
                      </tr>
                    <?php endforeach ?>
                    </tbody>
                  </table>
                  <br>
                  <div class="text-right"><?php echo $this->pagination->create_links(); ?></div>
                </div>
              </div>
             </div>
          </div>
        </section>
      </div>
