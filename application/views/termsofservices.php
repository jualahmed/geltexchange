<section class="my-3 py-3">
    <div class="container">
        <div class="main-content" style="min-height: 400px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="section box-shadow p-3">
                        <div class="row">
                          <div class="col-md-12">
                            <h2 class="text-center pb-3"><b> <a href="" class="btn btn-success">Terms & Conditions</a> </b></h2>
                            <?php
                              $this->db->where('id', 3);
                              $d=$this->db->get('settings')->row();
                              echo $d->data;
                            ?>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>