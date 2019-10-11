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
    <form action="<?php echo base_url().'profile/editprofile' ?>" method="post">
      <div class="container">
         <div class="row py-4">
            <div class="col-md-3 text-right text-right">
              <p class="pt-4 ">Incarnction: </p>
            </div>
            <div class="col-md-9">
              <?php if ($user->profile): ?>
                <img src="<?php echo base_url() ?>assets/temp/img/users/<?php echo $user->profile ?>" width="80px" alt=""> 
              <?php else: ?>
                <img src="<?php echo base_url() ?>assets/temp/img/images/allinco_19.png" width="80px" alt=""> 
              <?php endif ?>
            </div>
          </div>
          <div class="row py-2">
            <div class="col-md-3 text-right">
              <p>User name: </p>
            </div>
            <div class="col-md-9">
              <?php echo $user->username ?>
            </div>
          </div>
          <div class="row py-2">
            <div class="col-md-3 text-right">
              <p>User Code:</p>
            </div>
            <div class="col-md-9">
              <?php echo $user->id ?>
            </div>
          </div>
           <div class="row py-2">
            <div class="col-md-3 text-right">
              <p>Your Name: </p>
            </div>
            <div class="col-md-9"> 
              <input type="hidden" name="last_name" value="<?php echo $user->last_name ?>">
              <input class="form-control w-75" name="first_name" value="<?php echo $user->first_name ?>" type="text" placeholder="">
            </div>
          </div>
           <div class="row py-2">
            <div class="col-md-3 text-right">
              <p>Email: </p>
            </div>
            <div class="col-md-9">
              <input class="form-control w-75" name="email" value="<?php echo $user->email ?>" type="text" placeholder="">
            </div>
          </div>
          <div class="row py-2">
            <div class="col-md-3 text-right">
              <p>Address: </p>
            </div>
            <div class="col-md-9">
              <input class="form-control w-75" value="<?php echo $user->address ?>" type="text" placeholder="">
            </div>
          </div>
          <div class="row py-2">
            <div class="col-md-3 text-right">
              <p>Phone: </p>
            </div>
            <div class="col-md-9">
              <input class="form-control w-75" name="phone" value="<?php echo $user->phone ?>" type="text" placeholder="">
            </div>
          </div>
           <div class="row py-2">
            <div class="col-md-3 text-right">
              <button class="btn btn-primary px-5">Save</button>
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
        <div class="col-md-3 text-right">
          <p>Old password: </p>
        </div>
        <div class="col-md-9">
          <input class="form-control w-75" name="old" type="password" placeholder="">
        </div>
      </div>
      <div class="row py-2">
        <div class="col-md-3 text-right">
          <p>New password: </p>
        </div>
        <div class="col-md-9">
          <input class="form-control w-75" name="new" type="password" placeholder="">
        </div>
      </div>
        <div class="row py-2">
        <div class="col-md-3 text-right">
          <p>Confirm new password: </p>
        </div>
        <div class="col-md-9">
          <input class="form-control w-75" name="new_confirm" type="password" placeholder="">
        </div>
      </div>
      <div class="row py-2">
        <div class="col-md-3 text-right">
          <button class="btn btn-primary px-5">Save</button>
        </div>
      </div>
    </div>
  </form>
</section>