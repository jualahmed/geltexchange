<section id="home" class="mainexchange py-5" style="background: #005455;">
	<div class="container">
		<div class="row">
			<div class="col-md-8 bg-white py-3">
				<div class="row">
					<div class="col-md-12" v-if="confirmtransation==0">
						<p><p><span style="color: #ff0000;"><strong>Send</strong></span>= আপনি যা দিবেন,<span style="color: #339966;"><strong>Receive</strong></span>=আপনি যা পেতে চান(Submit পেজে Total due তে যে পরিমান টাকা/ডলার আসে তা পরিশোধ করতে হবে ) <strong>&nbsp; <span style="color: #ff6600;">১০০ এর উপর অর্ডারে প্রতি ডলারে ১ টাকা &nbsp;, ৩০০ উপর অর্ডারে প্রতি ডলারে ২ টাকা Discount দেওয়া হচ্ছে।অর্ডার করার পর এই Discount&nbsp;পাবেন ।তাই দেরি না করে এখনি অর্ডার করুন </p>
						<input type="hidden" id="urlsssssssss" value="<?php echo base_url(); ?>">
					</div>

					<div class="col-md-6" v-if="confirmtransation==0">
						<h3><img src="<?php echo base_url() ?>assets/temp/images/arrow-up.png" width="27" height="27"> Send</h3>
						<div class="fixed-height scrollbar-outer scrollbar-outer1">
							<multiselect @select="sendchange" v-model="send" label="name" placeholder="Select" track-by="name" :options="sendoptions" :option-height="104" :custom-label="customLabel" :show-labels="false">
								<template slot="singleLabel" slot-scope="props">
									<img width="30px" class="option__image px-1" :src="base_url+props.option.external_icon" :alt="props.option.name">
									{{ props.option.name }}
								</template>
								<template slot="option" slot-scope="props">
									<img width="30px" class="option__image px-1" :src="base_url+props.option.external_icon" :alt="props.option.name">{{ props.option.name }}
								</template>
							</multiselect>
						</div>
						<span class="text-black">Minimum : {{ send.min_amount }} {{ send.currency_name }}</span>
						<div id="sendCurrencyContainer">
							<img alt="" :src="gatewaysendinfo.external_icon" class="getwayicon" width="30px">
							<input type="text" @keyup="bit_calculator" id="sendAmount" v-model="rate_from" class="form-control from" style="text-align: right;">
							<p class="text-black">
								Exchange rate: {{ crate_from }} {{ currency_form }} = {{ crate_to  }} {{ currency_to }}
							</p>
						</div>
					</div>

					<div class="col-md-6" v-if="confirmtransation==0">
						<h3><img src="<?php echo base_url() ?>assets/temp/images/arrow-down.png" width="27" height="27"> Receive</h3>
						<div class="fixed-height scrollbar-outer scrollbar-outer1">
							<multiselect @select="recivechange" v-model="receive" label="name" placeholder="Select" track-by="name" :options="reciveoptions" :option-height="104" :custom-label="customLabel" :show-labels="false">
								<template slot="singleLabel" slot-scope="props">
									<img width="30px" class="option__image px-1" :src="base_url+props.option.external_icon" :alt="props.option.name">
									{{ props.option.name }}
								</template>
								<template slot="option" slot-scope="props">
									<img width="30px" class="option__image px-1" :src="base_url+props.option.external_icon" :alt="props.option.name">{{ props.option.name }}
								</template>
							</multiselect>
						</div>
						<span class="text-black">Minimum : {{ receive.min_amount }} {{ receive.currency_name }}</span>
						<div id="receiveCurrencyContainer">
							<img alt="" :src="gatewayreciveinfo.external_icon" class="getwayiconr" width="30px">
							<input type="text" @keyup="bit_calculatorr" id="receiveAmount" v-model="rate_to" class="form-control" style="text-align: left;">
							<p class="text-black">Reserve: {{ gatewayreciveinfo.reserve }}</p>
						</div>
					</div>

					<div class="col-md-12 mt-5" v-if="confirmtransation==0">
						<div class="selectedsend" id="bit_transaction_results">
							<form v-if="send && receive" id="exchangeForm">
								<div class="row">
									<div class="col-md-12 text-center">
										<div class="form-group" style="display: none;">
											<label for="receiverID" style="visibility: hidden;"><span class="receiveEcurrencyName"><span class="receiveAccountType">{{ messagessss }}</span></label>
											<input id="receiverID" name="receiverid" v-model="receiverid" class="form-control error" type="text" :placeholder="'Enter your '+ placeholdermessage" style="visibility: visible;">
										</div>

										<div class="form-group" style="display: none;">
											<label for="exchangeEmail">Email</label>
											<input id="exchangeEmail" type="email" name="email"  v-model="email" class="form-control error" type="text" placeholder="Enter your email" value="">
										</div>

										<div class="form-group">
												<button id="" class="btn btn-primary btn-lg" type="button"  @click="submit" v-if="parseFloat(rate_to)<gatewayreciveinfo.min_received || parseFloat(rate_from)<gatewaysendinfo.min_amount || parseFloat(rate_to)>gatewayreciveinfo.max_amount || rate_to==''" disabled>Start Order</button>
												<button id="startExchange" class="btn btn-primary btn-lg" type="button"  @click="submit" v-else>Start Order</button>
										</div>
										
										<div style="padding: 9px;color: #fff;background: #db2c36;" v-if="error.length>0">
											<p style="margin: 0px;" v-for="e in error" v-html="e"></p>
										</div>

										<div style="padding: 9px;color: #fff;background: #db2c36;" v-if="parseFloat(rate_to)<gatewayreciveinfo.min_received">
											<p style="margin: 0px;">{{ gatewayreciveinfo.name }} Min. Amount: {{ gatewayreciveinfo.min_received }}</p>
										</div>
								
										<div style="padding: 9px;color: #fff;background: #db2c36;" v-if="parseFloat(rate_from)<gatewaysendinfo.min_amount">
											<p style="margin: 0px;">{{ gatewaysendinfo.name }} Min. Amount: {{ gatewaysendinfo.min_amount }}</p>
										</div>

										<div style="padding: 9px;color: #fff;background: #db2c36;" v-if="parseFloat(rate_to)>gatewayreciveinfo.max_amount">
											<p style="margin: 0px;">{{ gatewayreciveinfo.name }} Max. Amount: {{ gatewayreciveinfo.max_amount }}</p>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="col-md-12 mt-5" v-if="confirmtransation==1">
						<h3>Additional Information</h3>
							<h4 class="font-weight-bold">Your/Receiver {{ receive.name }} Account</h4>
							<p>(Submit/Next পেজে Total due তে যে পরিমান টাকা/ডলার আসে তা পরিশোধ করতে হবে )</p>
							<div class="form-group">
								<label></label>
								<input type="text"  class="form-control" v-model="send_account" :placeholder="messsssss">
							</div>
							<div style="text-align: center;"> <button id="dddddddddd" type="button" @click="cancelsubmit" class="btn btn-danger">Cancel Order</button> <button id="dddddddddd" type="button" @click="secendsubmit" class="btn btn-primary">Next</button></div>
							<h4 class="text-danger" v-if="me">Please enter Your Receiver account.</h4>
					</div>

					<div class="col-md-12 mt-5" v-if="confirmtransation==2">
						<div class="col-md-12">
								<h2>Review Order</h2>
								<table class="table table-striped">
										<tbody>
												<tr style="width: 50%">
														<td style="width: 50%;"><b>Order Id</b></td>
														<td>#{{ gateways[0].id }}</td>
												</tr>
												<tr>
														<td style="width: 50%;"><b>Send</b></td>
														<td>{{ send.name }}</td>
												</tr>
												<tr>
														<td style="width: 50%;"><b>Sending Amount</b></td>
														<td>{{ gateways[0].amount_send }}</td>
												</tr>
												<tr>
														<td style="width: 50%;"><b>Receive</b></td>
														<td>{{ receive.name }}</td>
												</tr>
												<tr>
														<td style="width: 50%;"><b>Receiving Amount</b></td>
														<td>{{ gateways[0].amount_receive }}</td>
												</tr>

												<tr>
														<td style="width: 50%;"><b>Your/Receiver {{ receive.name }} ID</b></td>
														<td>{{ send_account }}</td>
												</tr>

												<tr>
														<td colspan="2" style="height: 70px;"></td>
												</tr>
												<tr>
														<td style="width: 50%;"><b>Due</b></td>
														<td>{{ gateways[0].amount_send }} ({{ send.name }})</td>
												</tr>

												<tr>
														<td colspan="2" style="text-align: right;"><b>Total Due: </b>
																<div class="modal fade" id="totalDueAlert" tabindex="-1" role="dialog" style="display: none;">
																		<div class="modal-dialog" role="document">
																				<div class="modal-content modal-info">
																						<div class="modal-header">
																								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																										<span aria-hidden="true">×</span>
																								</button>
																								<h1 class="modal-title">Attention Please</h1>
																						</div>
																						<div class="modal-body modal-spa">
																								Remember! You need to pay
																								<mark style="//font-size: 30px;">
																										{{ gateways[0].amount_send }} ({{ send.name }})
																								</mark>
																						</div>
																						<div class="modal-footer">
																								<a style="position: relative; top: 0; right: 0;" data-dismiss="modal" class="btn btn-primary pull-right">Ok</a>
																						</div>
																				</div>
																		</div>
																</div>
																<mark style="font-size: 20px;">
																		{{ gateways[0].amount_send }} ({{ send.name }})
																</mark>
														</td>
												</tr>

												<tr>
														<td colspan="2">
																<h2>Payment</h2>
																<p>Our {{ send.name }} details ( {{ send.account }} )</p>
																<p>
																	<label for="a5dc6277b940c5">Enter Your {{ send.name }} Account details </label>
																	<input placeholder="" type="text" name="data[0]" id="a5dc6277b940c4" class="form-control" required="">
																</p>
																<label for="a5dc6277b940c5">Note (if you want)</label>
																<p></p>
																<p>
																		<input placeholder="Note (if you want)" type="text" name="data[1]" id="a5dc6277b940c5" class="form-control">
																</p>
														</td>
												</tr>
										</tbody>
								</table>
								<div style="text-align: center;"> <button id="dddddddddd" type="button" @click="cancelsubmit" class="btn btn-danger">Cancel Order</button> <button id="dddddddddd" type="button" @click="finalsubmit" class="btn btn-primary">Confirm Order</button></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 mt-2">
				<div class="bg-white p-1">
					<h4 class="text-center py-3"><strong>Today's Buy-Sell Price</strong></h4>
					<div class="table-responsive">
						<table class="table table-bordered table-sm" style="font-size: 12px;">
							<tbody>
								<tr>
									<th>
										<strong>We Accept</strong>
									</th>
									<th class="text-center">
										<strong>We Buy</strong>
									</th>
									<th class="text-center">
										<strong>We Sell</strong>
									</th>
								</tr>
									<?php
										$this->db->where('buy_price>0');
										$query2 = $this->db->get('gateways')->result();
									if(count($query2)) {
									 foreach ($query2 as $key => $row) {
									?>
								<tr>
									<td width="60%">
										<img src="<?php echo base_url().''.$row->external_icon ?>" alt="" class="rounded-circle m-1" height="25px;" width="25px">
										<strong><?php echo $row->name; ?></strong>
									</td>
									<td class="text-center">
										<strong><?php echo $row->buy_price; ?></strong>
									</td>
									<td class="text-center">
										<strong><?php echo $row->sales_price; ?></strong>
									</td>
								</tr>
								<?php
									}
								}else{
								?>
									<div class="col-md-12">
									 <b> <?php echo 'no_have_gateways'; ?></b>
									</div>
								<?php } ?>   
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>  

<section class="home-default bg-color py-5">
		<div class="container">
				<div class="row">
						<div class="col-md-12 col-sm-12">
								<div class="section box-shadow p-2">
										<div class="row">
											<div class="col-md-12 col-sm-12">
												<h4 class="text-center"><strong>Reserve</strong></h4>
												<div class="row">
														<?php
															$this->db->join('currency', 'currency.currency_id = gateways.currency');
															$query2 = $this->db->get('gateways')->result();
															if(count($query2)) {
																foreach ($query2 as $key => $row) {
														?>
													<div class="col-md-3 col-sm-3 mb-3">
														<div class="card text-center box-shadow">
															 <div class="p-1">
																 <img src="<?php echo base_url().''.$row->external_icon ?>" alt="" class="rounded-circle" height="40px;" width="40px">
															 </div>
															<div class="p-1">
																<p class="card-title text-center">
																		 <?php echo $row->name; ?>
																</p>
																<a href="#" class="badge badge-primary p-2 m-2">
																	<strong>
																		 <?php echo sprintf('%0.2f',$row->reserve)?> <span><?php echo $row->currency_name ?></span>
																	</strong>
																</a>
															</div>
														</div>
													</div>
													<?php
																}
															}else{
														?>
																<div class="col-md-12 col-sm-12">
																	<?php echo $lang['no_have_gateways']; ?>
																</div>
														<?php } ?>    
												</div>
											</div>
										</div>
								</div>
						</div>
				</div>
		</div>
</section>

<!-- Completed Exchanges -->
<section id="sechange" class="pb-2 bg-color p-0">
	<div class="container">
		<div class="section box-shadow p-2">
			<h4 class="text-center">Pending Exchanges</h4>
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
		<div class="section box-shadow p-2">
			<h4 class="text-center">Completed Exchanges</h4>
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
											<?php if(isset($reciveamoutn->external_icon)){?><img src="<?php echo base_url().''.$reciveamoutn->external_icon ?>" width="20px" height="20"><?php } ?>
											<span class="pl-2"><?php if(isset($reciveamoutn->name)) echo $reciveamoutn->name; else echo "Deleted"; ?></span>
										</td>
										<td width="25%"><?php if(isset($reciveamoutn->external_icon)) echo sprintf('%0.2f',$row->amount_send);?><?php if(isset($reciveamoutn->external_icon)) echo " ".$row->currency_name ?> (<?php if(isset($reciveamoutn->external_icon)) echo sprintf('%0.2f',$row->amount_receive);?> <span><?php if(isset($reciveamoutn->external_icon)) echo " ".$reciveamoutn->currency_name ?></span>)
										</td>
										<td align="center" width="25%">
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
	$this->db->join('users', 'users.id = testimonials.user_id');
	$this->db->order_by('testimonials.id', 'desc');
	$query = $this->db->get('testimonials')->result();
?>
<section id="feedback" class="pb-2 bg-color p-0 my-5">
	<div class="container">
		<div class="section box-shadow p-2">
			<h4 class="text-center"><strong>Customers Feedback</strong></h4>
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
										<h3 class="item-price"><span class="label label-success" style="color:#fff;"><i class="fa fa-smile-o"></i> Positive</span></h3>
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
											<span><?php echo $var->username ?></span> 
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

