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
									<h3 class="box-title"><?php echo anchor('admin/gateways/create', '<i class="fa fa-plus"></i> '. ('New Gateways Create'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
								</div>
								<div class="box-body">
									<table class="table table-striped table-hover table-bordered table-responsive">
										<thead>
											<tr>
                        <th>Icon</th>
                        <th>Gateway name</th>
												<th>Currency</th>
												<th>Min. amount</th>
												<th>Min received</th>
												<th>Max. amount</th>
												<th>Reserve</th>
                        <th>Fee</th>
                        <th>Allow send</th>
                        <th>Allow receive</th>
                        <th>Buy Price</th>
                        <th>Sales Price</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
                    <?php if($results) foreach ($results as $v):?>
  											<tr>
                          <th><img src="<?php echo base_url().$v->external_icon ?>" alt="" width="50px"></th>
                          <td><?php echo htmlspecialchars($v->name, ENT_QUOTES, 'UTF-8'); ?></td>
                          <td><?php echo htmlspecialchars($v->currency_name); ?></td>
                          <td><?php echo htmlspecialchars($v->min_amount.' '.$v->currency_name, ENT_QUOTES, 'UTF-8'); ?></td>
                          <td><?php echo htmlspecialchars($v->min_received.' '.$v->currency_name, ENT_QUOTES, 'UTF-8'); ?></td>
                          <td><?php echo htmlspecialchars($v->max_amount.' '.$v->currency_name, ENT_QUOTES, 'UTF-8'); ?></td>
                          <td><?php echo htmlspecialchars($v->reserve.' '.$v->currency_name, ENT_QUOTES, 'UTF-8'); ?></td>
                          <td><?php echo htmlspecialchars($v->fee.'%', ENT_QUOTES, 'UTF-8'); ?></td>
                          <td><?php if($v->allow_send){?><i class="fa fa-check text-success"></i><?php } else {?><i class="fa fa-times text-danger"></i><?php } ?></td>
                          <td><?php if($v->allow_receive){?><i class="fa fa-check text-success"></i><?php } else {?><i class="fa fa-times text-danger"></i><?php } ?></td>
                          <td><?php echo htmlspecialchars($v->buy_price, ENT_QUOTES, 'UTF-8'); ?></td>
                          <td><?php echo htmlspecialchars($v->sales_price, ENT_QUOTES, 'UTF-8'); ?></td>
                          <td>
                            <a class="btn btn-sm btn-success" href="<?php echo base_url().'admin/gateways/edit/'.$v->id ?>" title="Edit"><i class="fa fa-pencil"></i></a> 
                            <a onclick="return confirm('Are your sure to delete??')" class="btn btn-sm btn-danger" href="<?php echo base_url().'admin/gateways/delete/'.$v->id ?>" title="Delete"><i class="fa fa-times"></i></a>
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
