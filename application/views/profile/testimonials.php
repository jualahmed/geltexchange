<section class="my-3 py-3" style="min-height: 460px;">
    <div class="container">
        <div class="ads-info box-shadow p-3">
            <div class="row">
                <div class="col-sm-12">
                    <div class="my-ads section" style="display: block;">
                        <h3 class="pb-3">
                          <span class="pull-right">
                            <a href="<?php echo base_url()?>profile/submit_testimonial" class="btn btn-info btn-xs"><i class="fa fa-plus"></i> give us a feedback</a>
                          </span>
                          </h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="40%">Feedback</th>
                                    <th width="40%">Exchange ID</th>
                                    <th width="40%">Type</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($testmo as $key => $var): ?>
                                <tr>
                                    <td><?php echo $var->content ?></td>
                                    <td>
                                        <a href="https://usdbuysell.com/account/exchange/"></a>
                                    </td>
                                    <td><?php echo $var->content ?></td>
                                    <td>
                                      <a href="https://usdbuysell.com/account/delete_testimonial/69"><i class="fa fa-times"></i> Delete</a>
                                    </td>
                                </tr>
                              <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>