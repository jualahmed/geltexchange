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
                       <form action="<?php echo base_url().'admin/setting/update/'.$sssssss->id ?>" method="POST">
                         <textarea name="content" id="trumbowyg-demo" cols="30" rows="10">
                           <?php echo $sssssss->data ?>
                         </textarea>
                         <div class="text-right">
                           <input type="submit" class="btn btn-primary">
                         </div>
                       </form>
                    </div>
                </div>
             </div>
        </div>
    </section>
</div>
