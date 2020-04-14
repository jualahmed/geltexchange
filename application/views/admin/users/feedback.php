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
								<div class="box-body">
                 				 <div class="table-responsive">
									<table class="table table-striped table-hover">
										<thead>
											<tr>
												<th><?php echo 'NO.'?></th>
												<th><?php echo 'Content';?></th>
												<th><?php echo 'Action';?></th>
											</tr>
										</thead>
										<tbody>
                        			<?php foreach ($feedback as $key => $feed):?>
										<tr>
											<td><?php echo $key+1 ?></td>
											<td><?php echo $feed->content ?></td>
											<td><?php echo ($feed->status) ? anchor('admin/users/deactivatef/'.$feed->id, '<span class="label label-success">'.lang('users_active').'</span>') : anchor('admin/users/activatef/'. $feed->id, '<span class="label label-default">'.lang('users_inactive').'</span>'); ?></td>
											<td>
											</td>
										</tr>
                            		<?php endforeach;?>
										</tbody>
									</table>
                				</div>
                    <br>
                  					<div class="text-right"><?php echo $this->pagination->create_links(); ?></div>
								</div>
							</div>
						 </div>
					</div>

				</section>
			</div>
