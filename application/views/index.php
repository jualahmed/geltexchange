

<!-- Completed Exchanges -->
<section id="sechange" class="pb-2 mt-5 p-0">
	<div class="container">
		<div class="section box-shadow bg-light p-2">
		    
		    <div style="padding: 9px;color: #fff;background: #db2c36;" v-if="parseFloat(rate_to)>gatewayreciveinfo.max_amount">
			<h5 class="text-center">Pending Exchanges</h5>
			</div>
			<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover table-sm w-100" align="center">
						<thead>
							<tr>
								<th><span><?php echo 'send'; ?></span></th>
								<th><span><?php echo 'receive'; ?></span></th>
								<th><span><?php echo 'Amount'; ?></span></th>
								<th class="al"><span> <?php echo 'status'; ?></span></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$this->db->select('currency.*,users.*,gateways.*,exchanges.*,exchanges.status as statuss');
							$this->db->limit(10);
							$this->db->order_by('exchanges.id', 'desc');
							$this->db->where('exchanges.status = ',0);
							$this->db->or_where('exchanges.status = ',1);
							$this->db->or_where('exchanges.status = ',4);
							$this->db->join('users', 'users.id = exchanges.user_id');
							$this->db->join('gateways', 'gateways.id = exchanges.gateway_send');
							$this->db->join('currency', 'currency.currency_id = gateways.currency');
							$query = $this->db->get('exchanges')->result();
							if(count($query)) {
								foreach ($query as $key => $row) {
									$this->db->where('id', $row->gateway_receive);
									$this->db->join('currency', 'currency.currency_id = gateways.currency');
									$reciveamoutn=$this->db->get('gateways')->row();
									?>
									<tr>
										<td width="25%">
											<img src="<?php echo base_url().''.$row->external_icon ?>" width="20px" height="20">
											<span class="pl-2"><?php echo $row->name; ?></span>
										</td>
										<td width="25%">
											<?php if(isset($reciveamoutn->external_icon)){?><img src="<?php echo base_url().''.$reciveamoutn->external_icon ?>" width="20px" height="20"><?php } ?>
											<span class="pl-2"><?php if(isset($reciveamoutn->name)) echo $reciveamoutn->name; else echo "Deleted"; ?></span>
										</td>
										<td width="25%"><?php if(isset($reciveamoutn->external_icon)) echo sprintf('%0.2f',$row->amount_send);?><?php if(isset($reciveamoutn->external_icon)) echo " ".$row->currency_name ?> (<?php if(isset($reciveamoutn->external_icon)) echo sprintf('%0.2f',$row->amount_receive);?> <span><?php if(isset($reciveamoutn->external_icon)) echo " ".$reciveamoutn->currency_name ?></span>)</td>
										<td align="center" width="25%">
											<?php if ($row->statuss==0): ?>
												
                                             <span class="badge badge-sm badge-info d-inline">Waiting</span>
												 
											<?php elseif($row->statuss==1): ?>
													<span class="badge badge-sm badge-primary d-inline">Processing</span>
											<?php elseif($row->statuss==2): ?>
													<span class="badge badge-sm badge-success d-inline">
														<i class="fa fa-check"></i>Accept
													</span>
											<?php elseif($row->statuss==3): ?>
												<span class="badge badge-sm badge-danger d-inline">Rejected</span>
											<?php elseif($row->statuss==4): ?>
												<span class="badge badge-sm badge-primary d-inline">Processing</span>
											<?php endif ?>
										</td>
									</tr>
											<?php
										}
									} else {
										echo '<tr><td colspan="5">'.'still_no_exchanges'.'</td></tr>';
									}
								?>
						</tbody>
					</table>
			</div>
		</div>
	</div>
</section>
	 
<!-- Completed Exchanges -->
 
<section id="sechange" class="pb-2 bg-color p-0 mt-2">
	<div class="container">
		<div class="section box-shadow bg-light p-2">
		    <div style="padding: 9px;color: #fff;background: #69EEEA;" v-if="parseFloat(rate_to)>gatewayreciveinfo.max_amount">
			<h5 class="text-center">Completed Exchanges</h5>
			</div>
			<div class="table-responsive">
			   
					<table class="table table-bordered table-striped table-hover table-sm w-100" align="center">
						<thead>
							<tr>
								<th><span><?php echo 'send'; ?></span></th>
								<th><span><?php echo 'receive'; ?></span></th>
								<th><span><?php echo 'Amount'; ?></span></th>
								<th class="al"><span> <?php echo 'status'; ?></span></th>
								
	
							</tr>
						</thead>
						<tbody>
							<?php
							$this->db->select('currency.*,users.*,gateways.*,exchanges.*,exchanges.status as statuss');
							$this->db->limit(10);
							$this->db->order_by('exchanges.id', 'desc');
							$this->db->where('exchanges.status = ',2);
							$this->db->join('users', 'users.id = exchanges.user_id');
							$this->db->join('gateways', 'gateways.id = exchanges.gateway_send');
							$this->db->join('currency', 'currency.currency_id = gateways.currency');
							$query = $this->db->get('exchanges')->result();
							if(count($query)) {
								foreach ($query as $key => $row) {
									$this->db->where('id', $row->gateway_receive);
									$this->db->join('currency', 'currency.currency_id = gateways.currency');
									$reciveamoutn=$this->db->get('gateways')->row();
									?>
									<tr>
										<td width="25%">
											<img src="<?php echo base_url().''.$row->external_icon ?>" width="20px" height="20">
											<span class="pl-2"><?php echo $row->name; ?></span>
										</td>
										<td width="25%">
											<?php if(isset($reciveamoutn->external_icon)){?><img src="<?php echo base_url().''.$reciveamoutn->external_icon ?>" width="22px" height="22"><?php } ?>
											<span class="pl-2"><?php if(isset($reciveamoutn->name)) echo $reciveamoutn->name; else echo "Deleted"; ?></span>
										</td>
										<td width="25%"><?php if(isset($reciveamoutn->external_icon)) echo sprintf('%0.2f',$row->amount_send);?><?php if(isset($reciveamoutn->external_icon)) echo " ".$row->currency_name ?> (<?php if(isset($reciveamoutn->external_icon)) echo sprintf('%0.2f',$row->amount_receive);?> <span><?php if(isset($reciveamoutn->external_icon)) echo " ".$reciveamoutn->currency_name ?></span>)
										</td>
										<td align="center" width="27%">
											<?php if ($row->statuss==0): ?>
												 <span class="badge badge-sm badge-info d-inline">Waiting for payment</span>
											<?php elseif($row->statuss==1): ?>
													<span class="badge badge-sm badge-primary d-inline">Processing</span>
											<?php elseif($row->statuss==2): ?>
													<span class="badge badge-sm badge-success d-inline">
														<i class="fa fa-check"></i>Accept
													</span>
											<?php elseif($row->statuss==3): ?>
												<span class="badge badge-sm badge-danger d-inline">Rejected</span>
											<?php elseif($row->statuss==4): ?>
												<span class="badge badge-sm badge-primary d-inline">Processing</span>
											<?php endif ?>
										</td>
									</tr>
												<?php
											}
										} else {
											echo '<tr><td colspan="5">'.'still_no_exchanges'.'</td></tr>';
										}
								?>
						</tbody>
					</table>
			</div>
		</div>
	</div>
</section>

<?php
	$this->db->join('users', 'users.id = testimonials.user_id','left');
	$this->db->order_by('testimonials.id', 'desc');
	$this->db->where('status', 1);
	$query = $this->db->get('testimonials')->result();
?>
<section id="feedback" class="pb-2 p-0 my-5">
	<div class="container">
		<div class="section box-shadow bg-light p-2">
			<h5 class="text-center"><strong>Customers Feedback</strong></h5>
				<div class="owl-carousel feedback">
						<?php if(count($query)>1) { ?>
								<?php foreach ($query as $key => $var): ?>
								<div class="item box-shadow p-3 m-2" style="border: 1px solid;text-align: center;">
									<div class="ad-info">
										<div class="text-center">
												 <?php if($var->profile!=null){ ?>
													<img class="rounded-circle d-inline" style="width:150px;height: 150px" src="<?php echo base_url()?>assets/temp/<?php echo $var->profile; ?>" alt="ssssss">
												<?php }else{ ?>
													<img class="rounded-circle d-inline" style="width:120px;height: 120px" src="<?php echo base_url()?>assets/temp/avatar-placeholder.svg" alt="ssssss">
												<?php } ?>
										</div>
											<?php if($var->type == "1") { ?>
											<h3 class="item-price">
												<span class="btn text-white btn-sm btn-success"><i class="fa fa-smile-o"></i> positive</span>
											</h3>
											<?php } elseif($var->type == "2") { ?>
											<h3 class="item-price">
												<span class="btn btn-sm btn-warning text-white">
													<i class="fa fa-meh-o"></i> neutral
												</span>
												</h3>
											
											<?php } elseif($var->type == "3") { ?>
											<h3 class="item-price"><span class="btn text-white btn-sm btn-danger">
												<i class="fa fa-frown-o"></i> negative</span>
											</h3>
											
											<?php } else { ?>
											<h3 class="item-price"><span class="btn text-white btn-sm btn-light"><i class="fa fa-meh-o"></i> Unknown</span></h3>
											<?php } ?>
										<h5 class="item-title">
												<?php echo $var->content ?>
										</h5>
										<div class="item-cat">
											<span><?php if(isset($var->username)) { echo $var->username;  }  else echo "-" ; ?></span> 
										</div>
										<div><?php echo $var->date ?></div>
									</div><!-- ad-info -->
								</div><!-- featured -->
								<?php endforeach ?>
							<?php } else { ?>
								<h2> no_have_testimonials </h2>
						<?php }
						?>
				</div>
				<?php if(count($query)>3){ ?>
					<div class="text-right mt-3">
						<a class="btn btn-success" href="<?php echo base_url().'home/allfeedback' ?>">All Feedback</a>
					</div>
				<?php } ?>
		</div>
	</div>
</section>


