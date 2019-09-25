<section class="py-3 my-3">
    <div class="container">
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="section">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Contact</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12"></div>
                                    <div class="col-md-3"><b><i class="fa fa-skype"></i> Skype</b>
                                      <?php $d=json_decode($setting->data); ?>
                                        <br> Mobile Number: <?php echo $d->contactnumber ?> / Facebook:
                                        <span class="text-lowercase">
                                          <?php echo $d->facebook ?>
                                        </span>
                                        <br>
                                        <br> <b><i class="fa fa-whatsapp"></i> Whatsapp</b>
                                        <br> <?php echo $d->contactnumber ?>
                                        <br>
                                        <br> <b><i class="fa fa-at"></i> Support email</b>
                                        <br> <span class="text-lowercase"> <?php echo $d->supportemail ?></span>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-md-9">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <label>Your name</label>
                                                <input type="text" name="name" class="form-control input-lg form_style_1">
                                            </div>
                                            <div class="form-group">
                                                <label>Your email address</label>
                                                <input type="text" name="email" class="form-control input-lg form_style_1">
                                            </div>
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input type="text" name="subject" class="form-control input-lg form_style_1">
                                            </div>
                                            <div class="form-group">
                                                <label>Message</label>
                                                <textarea name="message" rows="3" class="form-control input-lg form_style_1"></textarea>
                                            </div>
                                            <button type="submit" name="bit_send" class="btn btn-primary">Send message</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>