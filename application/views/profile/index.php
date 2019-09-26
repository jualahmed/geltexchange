<section id="profile" class="my-4 py-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form method="post">
                    <div class="row">
                        <div class="col-md-4">
                          <div class="profile-img">
                            <?php if ($user->profile): ?>
                              <img src="<?php echo base_url().'assets/images'.$user->profile; ?>" class="user-image" alt="User Image" width="100%">
                            <?php else: ?>
                              <img src="<?php echo base_url().'assets/images'.'/avatar.jpg'; ?>" class="user-image" alt="User Image" width="100%">
                            <?php endif ?>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="profile-head">
                                <ul id="myTab" role="tablist" class="nav nav-tabs">
                                    <li class="nav-item active w-100">
                                      <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" class="nav-link active">Personal Information</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content profile-tab">
                                    <div role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade show active in">
                                      <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>User Name :</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?php echo $user->username ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Name :</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?php echo $user->first_name ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Email :</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p class="text-lowercase"><?php echo $user->email ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Phone :</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?php echo $user->phone ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Referrals :</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p class="text-lowercase"><?php echo base_url().$user->username ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4"><a href="<?php echo base_url().'profile/editprofile' ?>" name="btnAddMore" class="btn btn-success">Edit Profile</a> <a href="<?php echo base_url().'/profile/changeprofile' ?>" name="btnAddMore" class="btn btn-success">Change Profile Image</a></div>
                        <div class="col-md-12">
                            <br>
                            <br>
                            <br>
                            <div class="table-responsive">
                              <table class="table table-bordered">
                                  <tbody>
                                      <tr>
                                          <th>Status</th>
                                          <th>Email verified</th>
                                          <th>Document verified</th>
                                          <th>Mobile verified</th>
                                      </tr>
                                      <tr>
                                          <td>
                                            <?php if ($user->final_verified): ?>
                                              <span class="btn btn-success">Verified</span>
                                            <?php else: ?>
                                              <span class="btn btn-danger">Not varified</span>
                                            <?php endif ?>
                                          </td>
                                          <td>
                                            <?php if ($user->email_verified): ?>
                                              <span class="btn btn-success">Yes</span>
                                            <?php else: ?>
                                              <span class="btn btn-danger">Not</span>
                                            <?php endif ?>
                                          </td>
                                          <td>
                                            <?php if ($user->document_verified): ?>
                                              <span class="btn btn-success">Yes</span>
                                            <?php else: ?>
                                              <span class="btn btn-danger">Not</span>
                                            <?php endif ?>
                                          </td>
                                          <td>
                                            <?php if ($user->phone_verified): ?>
                                              <span class="btn btn-success">Yes</span>
                                            <?php else: ?>
                                              <span class="btn btn-danger">Not</span>
                                            <?php endif ?>
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>
                            </div>
                            <div>
                              <?php if(!$user->final_verified || !$user->email_verified || !$user->document_verified || !$user->phone_verified){ ?>
                                <h1>
                                  Your Account Is Not Fully Varified  <a href="<?php echo base_url().'/profile/verification' ?>"> Please Varify Now</a>
                                </h1>
                              <?php }else{ ?>
                                Your Account Is Fully Varified
                              <?php } ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>