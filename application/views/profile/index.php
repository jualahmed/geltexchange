<section id="profilesetting" class="py-5">
	<div class="bg-light">
		<div class="container">
			<h3 class="p-2 text-info">Settings</h3>
		</div>
	</div>
		<div class="text-center">
			<?php if (isset($message)): ?>
				<div class="text-danger"><?php echo $message; ?></div>
			<?php endif ?>
		</div>
		<form action="<?php echo base_url().'profile/editprofile/'.$user->id ?>" method="post" enctype="multipart/form-data">
			<div class="container">
				 <div class="row py-4">
						<div class="col-md-2">
							<p class="pt-4 font-weight-bold">Incarnction: </p>
						</div>
						<div class="col-md-10">
							<?php if ($user->profile): ?>
								<img src="<?php echo base_url() ?>assets/temp<?php echo $user->profile ?>" width="80px" alt=""> 
							<?php else: ?>
								<img src="<?php echo base_url() ?>assets/temp/img/images/allinco_19.png" width="80px" alt=""> 
							<?php endif ?>
						</div>
					</div>
					<div class="row py-2">
						<div class="col-md-2">
							<p class="font-weight-bold">User name: </p>
						</div>
						<div class="col-md-10">
							<?php echo $user->username ?>
						</div>
					</div>
					<div class="row py-2">
						<div class="col-md-2">
							<p class="font-weight-bold">User Code:</p>
						</div>
						<div class="col-md-10">
							<?php echo $user->id ?>
						</div>
					</div>
					 <div class="row py-2">
						<div class="col-md-2">
							<p class="font-weight-bold">Your Name: </p>
						</div>
						<div class="col-md-10"> 
							<input type="hidden" name="last_name" value="<?php echo $user->last_name ?>">
							<input class="form-control" name="first_name" value="<?php echo $user->first_name ?>" type="text" placeholder="">
						</div>
					</div>
					 <div class="row py-2">
						<div class="col-md-2">
							<p class="font-weight-bold">Email: </p>
						</div>
						<div class="col-md-10">
							<input class="form-control" name="email" value="<?php echo $user->email ?>" type="text" placeholder="">
						</div>
					</div>
					<div class="row py-2">
						<div class="col-md-2">
							<p class="font-weight-bold">Address: </p>
						</div>
						<div class="col-md-10">
							<input class="form-control" value="<?php echo $user->address ?>" name="address" type="text" placeholder="">
						</div>
					</div>
					<div class="row py-2">
						<div class="col-md-2">
							<p class="font-weight-bold">Phone: </p>
						</div>
						<div class="col-md-10">
							<input class="form-control" name="phone" value="<?php echo $user->phone ?>" type="text" placeholder="">
						</div>
					</div>
					 <div class="row py-2">
						<div class="col-md-12 text-right">
							<button class="btn btn-primary px-5">Save</button>
							<a class="btn btn-primary px-5 ml-2" href="<?php echo base_url()."profile/changeprofile" ?>">Change Your Profle Photo</a>
						</div>
					</div>
			</div>
		</form>
	<div class="bg-light">
		<div class="container">
			<h3 class="p-2 text-info">Security</h3>
		</div>
	</div>

	<form action="<?php echo base_url().'profile/change_password' ?>" method="post">
		<div class="container">
			<div class="row py-2">
				<div class="col-md-2">
					<p class="font-weight-bold">Old password: </p>
				</div>
				<div class="col-md-10">
					<input class="form-control" name="old" type="password" placeholder="">
				</div>
			</div>
			<div class="row py-2">
				<div class="col-md-2">
					<p class="font-weight-bold">New password: </p>
				</div>
				<div class="col-md-10">
					<input class="form-control" name="new" type="password" placeholder="">
				</div>
			</div>
				<div class="row py-2">
				<div class="col-md-2">
					<p class="font-weight-bold">Confirm new password: </p>
				</div>
				<div class="col-md-10">
					<input class="form-control" name="new_confirm" type="password" placeholder="">
				</div>
			</div>
			<div class="row py-2">
				<div class="col-md-12 text-right">
					<button class="btn btn-primary px-5">Save</button>
				</div>
			</div>
		</div>
	</form>
</section>