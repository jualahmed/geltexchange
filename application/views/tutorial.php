<section class="py-5 bg-color">
  <div class="container">
    <div class="faq-page box-shadow bg-white p-3" style="min-height: 300px">
      <div class="accordion">
          <div id="accordion" class="panel-group text-center">
            <h2 class="title"><button class="btn btn-lg pb-3">Frequently asked questions</button></h2>
          </div>
          <?php foreach ($info as $var): ?>
            <div class="panel panel-default panel-faq p-1" style="border: 1px solid">
                <div class="panel-heading">
                  <a data-toggle="collapse" data-parent="#accordion" href="#faq-<?php echo $var->id ?>">
                  <p class="panel-title">
                    <?php echo $var->title ?>
                  <span class="pull-right"><i class="fa fa-plus"></i></span></p></a>
                </div>
                <div id="faq-<?php echo $var->id ?>" class="panel-collapse collapse collapse px-4">
                    <div class="panel-body">
                      <?php echo $var->content ?>
                    </div>
                </div>
            </div>
            <br>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</section>