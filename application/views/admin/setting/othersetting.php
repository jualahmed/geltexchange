<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                 <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo 'Setting'; ?></h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                          <tr>
                            <td width="10%">About</td>
                            <td>
                              <?php  $this->db->where('id',2);
                              $settiong1=$this->db->get('settings')->row(); ?> <?php echo $settiong1->data ?>
                            </td>
                            <td width="10%"><a href="<?php echo base_url()."admin/setting/edit/2" ?>" class="btn btn-success">Edit</a></td>
                          </tr>
                        </table>
                         <table class="table table-bordered">
                          <tr>
                            <td width="10%">Terms & Conditions</td>
                            <td>
                              <?php  $this->db->where('id',3);
                              $settiong1=$this->db->get('settings')->row(); ?> <?php echo $settiong1->data ?>
                            </td>
                            <td width="10%"><a href="<?php echo base_url()."admin/setting/edit/3" ?>" class="btn btn-success">Edit</a></td>
                          </tr>
                        </table>
                         <table class="table table-bordered">
                          <tr>
                            <td width="10%">Privacy Policy</td>
                            <td>
                              <?php  $this->db->where('id',4);
                              $settiong1=$this->db->get('settings')->row(); ?> <?php echo $settiong1->data ?>
                            </td>
                            <td width="10%"><a href="<?php echo base_url()."admin/setting/edit/4" ?>" class="btn btn-success">Edit</a></td>
                          </tr>
                        </table>
                    </div>
                </div>
             </div>
        </div>
    </section>
</div>
