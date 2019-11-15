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
                  <table class="table table-striped table-hover table-bordered table-responsive">
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th>User Name</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($results)) foreach ($results as $key => $v):?>
                            <tr>
                              <td nowrap><?php echo $key+1; ?></td>
                              <th>User Name</th>
                              <td nowrap>
                                <?php echo $v->content; ?>
                              </td>
                              <td nowrap>
                                <?php if ($v->status==0): ?>
                                    <span class="btn btn-sm btn-info btn-block">Waiting</span>
                                <?php elseif($v->status==1): ?>
                                    <span class="btn btn-sm btn-primary btn-block">Approve</span>
                                <?php endif ?>
                              </td>
                              <td>
                                <form action="<?php echo base_url()."admin/feedback/update/".$v->id ?>" method="post">
                                  <select name="status" id="" class="form-control">
                                    <option value="0">Waiting</option>
                                    <option value="1">Approve</option>
                                  </select>
                                  <button>Update</button>
                                </form>
                              </td>
                          </tr>
                    <?php endforeach ?>
                    </tbody>
                  </table>
                  <br>
                </div>
              </div>
             </div>
          </div>
        </section>
      </div>
