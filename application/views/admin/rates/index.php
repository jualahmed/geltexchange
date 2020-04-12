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
					<h3 class="text-info"><?php if(isset($message)) echo $message;?></h3>
					<div class="box-header with-border">
						<h3 class="box-title"><?php echo anchor('admin/rates/create', '<i class="fa fa-plus"></i> '. ('New Rates Create'), array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
					</div>
					<div class="box-body">
						<table class="table table-striped table-hover table-bordered">
							<tr>
								<th>SL</th>
								<th>Gateway from</th>
								<th>Gateway to</th>
								<th>Exchange rate</th>
								<th>Action</th>
							</tr>
							<?php foreach ($results as $key => $value): ?>
								<?php
									$this->db->where('id', $value->gateway_to);
									$this->db->join('currency', 'currency.currency_id = gateways.currency');
									$toinfo=$this->db->get('gateways')->row();
								?>
								<tr>
									<th><?php echo $key+$start+1; ?></th>
									<td> 
										<?php if(isset($value->external_icon)){ ?>
											<img src="<?php echo base_url().$value->external_icon ?>" alt="" width="20px;"><?php echo $value->name ?>
										<?php } ?>
									</td>
									<td>
										<?php if(isset($toinfo->external_icon)){ ?>
											<img src="<?php echo base_url().$toinfo->external_icon ?>" alt="" width="20px;"><?php echo $toinfo->name ?>
										<?php } ?>
									</td>
									<td>
										<?php echo $value->rate_from ?>
										<span> <?php if(isset($value->currency_name)) echo " ".$value->currency_name ?></span> = <?php echo $value->rate_to ?><?php if(isset($toinfo->currency_name)) echo " ".$toinfo->currency_name ?>
									</td>
									<td>
										<a class="btn btn-sm btn-success" href="<?php echo base_url()."admin/rates/edit/".$value->rid ?>" title="Edit"><i class="fa fa-pencil"></i></a> 
										<a class="btn btn-sm btn-danger" onclick="return confirm('Are your sure want to delete??')" href="<?php echo base_url()."admin/rates/delete/".$value->rid ?>" title="Delete"><i class="fa fa-times"></i></a>
									</td>
								</tr>
							<?php endforeach ?>
						</table>
						<div class="text-right"><?php echo $this->pagination->create_links(); ?></div>
					</div>
				</div>
			 </div>
		</div>
	</section>
</div>
