<section id="exchanges" class="my-4 py-4" style="min-height: 460px;">
	<div class="container">
		<div class="ads-info box-shadow p-3" style="display: block;">
			<div class="row">
				<div class="col-sm-12">
					<div class="my-ads section" style="display: block;">
						<h3>My Exchanges</h3>
						<hr>
						<?php foreach ($myexchange as $key => $var): ?>
							<?php
							$this->db->join('gateways', 'gateways.id = exchanges.gateway_receive');
							$this->db->join('currency', 'currency.currency_id = gateways.currency');
							$this->db->where('gateways.id', $var->gateway_receive);
							$recive=$this->db->get('exchanges')->row();
							?>
							<div class="panel-body table-responsive">
								<table class="table table-bordered">
									<tbody>
										<tr>
											<td colspan="4">
												Exchange ID:
												<a href="<?php echo base_url().'profile/singleexchange/'.$var->id ?>">
													<?php echo $var->id ?>
												</a>
												<span class="pull-right">
													<span class="px-2">from</span>
													<?php if(isset($var->external_icon)): ?>
														<img src="<?php echo base_url().$var->external_icon ?>" width="24px" height="24px" class="img-circle"/>
													<?php endif ?>
													<b class="px-2">
														<?php echo $var->name.' '.$var->currency_name ?>
													</b>
													<span class="px-2">To</span>
													<?php if(isset($recive->external_icon)): ?>
													<img src="<?php echo base_url().$recive->external_icon ?>" width="24px" height="24px" class="img-circle"/>
														<?php endif ?>
													<b class="px-2">
														<?php if (isset($recive->name)): ?>
															<?php echo $recive->name.' '.$recive->currency_name ?>
														<?php endif ?>
													</b>
											 	</span>
											</td>
										</tr>
										<tr>
											<td width="25%"> Send:
												<?php if (isset($var->amount_send)): ?>
													<?php echo $var->amount_send.' '.$var->currency_name ?>
												<?php endif ?>
											</td>
											<td width="25%">Receive:
												<?php if (isset($var->amount_receive) && isset($recive->currency_name)): ?>
													<?php echo $var->amount_receive.' '.$recive->currency_name ?>
												<?php endif ?>
											</td>
											<td width="25%">
												<span class="pull-right">
													Process type: 
													<span class="label label-info">Manually</span>
												</span>
											</td>
											<td width="25%">
												<span class="pull-right">
													<span class="p-2">Status:</span> 
													<span class="label label-danger"><i class="fa fa-times"></i>
														 <?php if ($var->statuss==0): ?>
															 <span class="btn btn-sm btn-info">Waiting for payment</span>
														<?php elseif($var->statuss==1): ?>
																<span class="btn btn-sm btn-secondary">Processing</span>
														<?php elseif($var->statuss==2): ?>
																<span class="btn btn-sm btn-success">completed</span>
														<?php elseif($var->statuss==3): ?>
															<span class="btn btn-sm btn-danger">rejected</span>
														<?php elseif($var->statuss==4): ?>
															<span class="badge badge-sm badge-primary d-inline">Processing</span>
														<?php elseif($var->statuss==5): ?>
															<span class="badge badge-sm badge-danger d-inline">Timeout</span>
														<?php endif ?>
													</span>
												</span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>