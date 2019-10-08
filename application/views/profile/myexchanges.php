<section id="profilesetting" class="py-5">
  <div class="bg-light">
    <div class="container">
      <h3 class="p-2 text-info">Exchange history</h3>
    </div>
  </div>
  <div class="container pt-3">
    <div class="table-responsive">
      <table class="table table-sm table-bordered">
        <thead>
          <th>Send</th>
          <th>Receive</th>
          <th>Amount</th>
          <th>Status</th>
          <th>Exchanges id</th>
        </thead>
        <tbody>
         <?php foreach ($myexchange as $key => $value): ?>
            <tr>
              <td><img src="<?php echo base_url() ?>assets/temp/img/images/allinco_01.png" alt="" width="30px;"> Bkash (Personal)</td>
              <td><img src="<?php echo base_url() ?>assets/temp/img/images/allinco_02.png" alt="" width="30px;"> Bkash (Personal)</td>
              <td>30 USD (20555 BDT)</td>
              <td>Waiting</td>
              <td align="center"><a href="" class="btn g-btn thisbtn1 p-0 w-50">Details</a></td>
            </tr>
         <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <div>
      <h3 class="text-danger">Attantion place</h3>
      <p class="text-primary py-2">Complete: Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution</p>
      <p class="text-danger py-2">Wating: Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution Ready to go Beyond? Start today with our free payment solution</p>
      <p class="text-secondary">Wating: Ready to go Beyond? Start today with our free</p>
      <p class="text-info">Wating: Ready to go Beyond? Start today with our free</p>
    </div>
  </div>

  <div class="bg-light">
    <div class="container">
      <h3 class="p-2 text-info">Review this site work</h3>
    </div>
  </div>
    <div class="container">
    
      <div class="row py-2">
        <div class="col-md-12">
          <textarea name="" id="" class="form-control w" cols="50" rows="10"></textarea>
        </div>
      </div>
      <div class="row py-2">
        <div class="col-md-12 text-right">
          <button class="btn btn-primary px-5">Save</button>
        </div>
      </div>
    </div>
</section>