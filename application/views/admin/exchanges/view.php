<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="content-wrapper">
	<section class="content-header">
		<?php echo $pagetitle; ?>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				 <div class="box">
					<div class="box-body">
							<?php
								$this->db->join('currency', 'gateways.currency = currency.currency_id');
								$this->db->where('id', $stinglegetway->gateway_receive);
								$ddddddd=$this->db->get('gateways')->row();
							?>
						<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					Explore
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tbody>
							<tr>
								<td colspan="4">
									<h2 class="text-center">
										<img src="<?php echo base_url().$stinglegetway->external_icon ?>" width="36px" height="36px" class="img-circle"> <b><?php echo $stinglegetway->name;?></b>                    &nbsp;&nbsp;&nbsp;<i class="fa fa-refresh"></i>&nbsp;&nbsp;&nbsp;
										<img src="<?php echo base_url().$ddddddd->external_icon ?>" width="36px" height="36px" class="img-circle"> <b><?php echo $ddddddd->name;?></b>
									</h2><br>
									Exchange ID: <?php echo $stinglegetway->id ?>               </td>
							</tr>
							<tr>
								<td colspan="2">Send: <?php echo $stinglegetway->amount_send.' '.$stinglegetway->currency_name ?></td>
								<td colspan="2">Receive: <?php echo $stinglegetway->amount_receive .' '.$ddddddd->currency_name?></td>
							</tr>
							<tr>
								<td colspan="2"> Exchange rate :  <?php echo $stinglegetway->rate_from.' '.$stinglegetway->currency_name ?> = <?php echo $stinglegetway->rate_to .' '.$ddddddd->currency_name?></td>
								<td colspan="2">Transaction ID: <?php echo $stinglegetway->transactionid ?></td>
							</tr>
							<tr>
								<td colspan="2">
										Process type: 
										<span class="label label-info">Manually</span>                </td>
								<td colspan="2">
										Status:
																<?php if($stinglegetway->statuss==1): ?>
																		<span class="btn btn-sm btn-primary">Processing</span>
																<?php elseif($stinglegetway->statuss==2): ?>
																		<span class="btn btn-sm btn-success">completed</span>
																<?php elseif($stinglegetway->statuss==3): ?>
																	<span class="btn btn-sm btn-danger">rejected</span>
																<?php endif ?>
							</tr>
							<tr>
								<td colspan="2">
									Created on 
										<span class="label label-default"><?php echo $stinglegetway->created_at; ?></span>                </td>
																<td colspan="2">
									Expired on 
										<span class="label label-default"><?php echo $stinglegetway->expired ?></span>                </td>
																							</tr>
							</tbody>
					</table>
					<br>
					<table class="table table-striped">
						<tbody>
							<tr>
								<td colspan="2">
									<h3 class="text-center">
										Data about transfer
									</h3>
								</td>
							</tr>
							<tr>
								<td><span class="pull-left"> <b>Send Account</b> </span></td>
								<td><span class="pull-right"> <b>Recive Account</b> </span></td>
							</tr>
							<tr>
								<td><span class="pull-left"><span></span><br><?php echo $stinglegetway->senderid ?></span></td>
								<td><span class="pull-right"><span><?php echo $stinglegetway->receiverid ?></td>
							</tr>
						</tbody>
					</table>

					<table class="table table-striped">
						<tbody>
							<tr>
								<td colspan="3">
									<h3 class="text-center">
										User Info
									</h3>
								</td>
							</tr>
							<tr>
								<td><span> <b>Email:</b> </span></td>
								<td><span> <b>Profle</b> </span></td>
								<td><span> <b>Name</b> </span></td>
							</tr>
							<tr>
								<td><span><span></span><br><?php echo $stinglegetway->email ?></span></td>
								<td>
									<?php if(isset($stinglegetway->profile)) { ?>
									<img src="<?php echo $stinglegetway->profile ?>" alt="">
									<?php } else { ?>
										<img src="<?php echo base_url().'assets/images/avatar.jpg' ?>" alt="" width="30px">
									<?php } ?>
								</td>
								<td><span><span><?php echo $stinglegetway->username ?></td>
							</tr>
						</tbody>
					</table>
					
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					Exchange status
				</div>
				<form action="<?php echo base_url().'admin/exchanges/update' ?>" method="POST">
				<div class="panel-body">
					<input type="hidden" name="exid" value="<?php echo $stinglegetway->id; ?>">
						<div class="form-group">
							<label>Status</label>
							<select class="form-control" name="status" onchange="show_field(this.value);">
								<?php if($stinglegetway->statuss==1): ?>
										<option value="1" selected>Processing</option>
										<option value="3">rejected</option>
										<option value="2">completed</option>
								<?php elseif($stinglegetway->statuss==2): ?>
										<option value="2" selected>completed</option>
										<option value="1">Processing</option>
										<option value="3">rejected</option>
								<?php elseif($stinglegetway->statuss==3): ?>
										<option value="3" selected>rejected</option>
										<option value="1">Processing</option>
										<option value="2">completed</option>
								<?php endif ?>
							</select>
						</div>
								<textarea name="note" id="" cols="33" rows="5" placeholder="Note"><?php echo $stinglegetway->note; ?></textarea>
								<button type="submit" class="btn btn-primary" name="btn_update"><i class="fa fa-check"></i> Update</button>
				</div></form>
			</div>

				<p>Note: <?php echo $stinglegetway->note; ?></p>


					</div>

					</div>
				</div>
			 </div>
		</div>
	</section>
</div>
