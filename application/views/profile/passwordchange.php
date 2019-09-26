<section id="main" class="py-4 my-4" style="min-height: 460px;">
    <div class="container">
        <div class="ads-info box-shadow p-4" style="display: block;">
            <div class="row">
                <div class="col-sm-12">
                    <?php if (isset($message)): ?>
                      <div class="text-danger"><?php echo $message; ?></div>
                    <?php endif ?>
                    <div class="my-ads section" style="display: block;">
                        <h3>Settings</h3>
                        <hr>
                        <form action="<?php echo base_url().'profile/change_password' ?>" method="POST">
                            <div class="form-group">
                                <label>Currenct password</label>
                                <input type="password" name="old" class="form-control input-lg form_style_1">
                            </div>
                            <div class="form-group">
                                <label>New password</label>
                                <input type="password" name="new" class="form-control input-lg form_style_1">
                            </div>
                            <div class="form-group">
                                <label>Re-type new password</label>
                                <input type="password" name="new_confirm" class="form-control input-lg form_style_1">
                            </div>
                            <button type="submit" name="bit_save" class="btn btn-primary"><i class="fa fa-check"></i> Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>