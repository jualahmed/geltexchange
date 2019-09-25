<section class="my-3 py-3">
    <div class="container">
        <div class="ads-info box-shadow p-3" style="display: block;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="my-ads section" style="display: block;">
                        <h3>Submit testimonial</h3>
                        <p class="text-danger"><?php echo $message; ?></p>
                        <hr>
                        <form action="<?php echo base_url().'profile/submit_testimonial' ?>" method="POST">
                            <div class="form-group">
                                <label>Exchange</label>
                                <select name="exchange_id" class="form-control input-lg form_style_1">
                                    <option>Still no have exchanges.</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select name="type" class="form-control">
                                    <option value="1">Positive</option>
                                    <option value="2">Neutral</option>
                                    <option value="3">Negative</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Feedback</label>
                                <textarea name="content" rows="3" class="form-control input-lg form_style_1"></textarea>
                            </div>
                            <div class="text-right">
                              <button type="submit" name="bit_submit" class="btn btn-primary">sumbit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>