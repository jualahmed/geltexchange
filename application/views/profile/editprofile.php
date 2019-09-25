<section id="profile" class="my-4 py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="user">
            <h2>Hello, <a href="<?php echo base_url().'/profile' ?>"><?php echo $user->username ?></a></h2>
            <h5>You last logged in at: <?php echo date("Y-m-d",$user->last_login) ?></h5>
          </div>
        </div>
        <div class="col-md-12">
            <div class="profile">
                <div class="pt-3">
                    <h3 class="text-danger">
                      <?php if (isset($message)): ?>
                      <?php echo $message ?>
                    <?php endif ?>
                    </h3>
                    <form action="<?php echo base_url().'profile/editprofile/'.$user->id ?>" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" placeholder="firstname" value="<?php echo $user->first_name ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" placeholder="lastname" value="<?php echo $user->last_name ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" placeholder="Email" value="<?php echo $user->email ?>" class="form-control text-lowercase">
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Mobile Number</label>
                                    <input type="text" name="phone" placeholder="mobile_number" value="<?php echo $user->phone ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="submit" value="update profile" name="submit" class="btn btn-primary btn-lg">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="favorites-user"></div>
        </div>
    </div>
    </div>
</section>