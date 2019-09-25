<section id="sechange" class="mt-3 py-3">
  <div class="container">
    <div id="put">
      <div class="section box-shadow p-3">
        <h3>Latest Exchanges</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm w-100" align="center">
              <thead>
                <tr>
                  <th><?php echo 'username'; ?></th>
                  <th><?php echo 'send'; ?></th>
                  <th><?php echo 'receive'; ?></th>
                  <th><?php echo 'amount'; ?></th>
                  <th class="al"><?php echo 'status'; ?></th>
                  <th class="al">Date</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $this->db->select('users.*,gateways.*,exchanges.*,exchanges.status as statuss');
                $this->db->limit(10);
                $this->db->order_by('exchanges.id', 'desc');
                $this->db->join('users', 'users.id = exchanges.user_id');
                $this->db->join('gateways', 'gateways.id = exchanges.gateway_send');
                $query = $this->db->get('exchanges')->result();
                if(count($query)) {
                  foreach ($query as $key => $row) {
                    $this->db->where('id', $row->gateway_receive);
                    $reciveamoutn=$this->db->get('gateways')->row();
                    ?>
                    <tr>
                      <td><?php echo $row->username ?></td>
                      <td>
                        <img src="<?php echo base_url().''.$row->external_icon ?>" width="20px" height="20">
                        <span class="pl-2"><?php echo $row->name; ?></span>
                      </td>
                      <td>
                        <img src="<?php echo base_url().''.$reciveamoutn->external_icon ?>" width="20px" height="20">
                        <span class="pl-2"><?php echo $reciveamoutn->name; ?></span>
                      </td>
                      <td><?php echo $row->amount_send;?></td>
                      <td align="center">
                        <?php if ($row->statuss==0): ?>
                                 <span class="btn btn-sm btn-info">Waiting for payment</span>
                              <?php elseif($row->statuss==1): ?>
                                  <span class="btn btn-sm btn-primary">Pending</span>
                              <?php elseif($row->statuss==2): ?>
                                  <span class="btn btn-sm btn-success">completed</span>
                              <?php elseif($row->statuss==3): ?>
                                <span class="btn btn-sm btn-danger">rejected</span>
                              <?php endif ?>
                      </td>
                      <td><?php echo date("Y-m-d g:i:s A",strtotime($row->created_at)); ?></td>
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
        <div><?php echo $this->pagination->create_links(); ?></div>
      </div>
    </div>
  </div>
</section>

<section id="reserve" class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section box-shadow p-3">
          <h3><strong>Reserve</strong></h3>
            <div class="row">
              <?php
                $query2 = $this->db->get('gateways')->result();
                if(count($query2)) {
                  foreach ($query2 as $key => $row) {
                  ?>
                  <div class="col-md-2 col-sm-2">
                    <div class="card text-center box-shadow fixed-heights">
                      <img src="">
                      <div class="card-body">
                        <img src="<?php echo base_url().''.$row->external_icon ?>" alt="" class="rounded-circle" height="50px;" width="50px">
                        <h5 class="card-title text-center">
                          <strong>
                            <?php echo $row->name; ?>
                          </strong>
                        </h5>
                        <a href="#" class="btn-block">
                          <strong>
                            <?php echo $row->reserve?>
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
</section>