

<section id="register">
  <div class="contentr box-shadow bg-light text-center p-2 bg-white my-5 min-h-screen" style="max-width: 450px;">
    <h4 class="thistext mt-5 pt-1">Account Login</h4>
    <form action="<?php echo base_url() ?>auth/loginajax" class="m-5" id="login">
      <div class="row">
        <div class="col-md-12 my-2">
          <input type="text" placeholder="Enter Email" name="identity" class="form-control text-none" id="identity">
        </div>
        <div class="col-md-12 my-2">
          <input type="password" placeholder="Enter Passsword" name="password" class="form-control text-none" id="password">
        </div>
        <div id="message" class="text-center text-danger"></div>
        <div class="col-md-12 my-2">
          <input type="submit" class="btn btn-success text-white py-2 px-5 roundeddd" value="Login">
        </div>
        <div class="col-md-12">
          <p><a href="<?php echo base_url() ?>forgerpassword" class="thistext">Forget Passsword</a> | <a href="<?php echo base_url() ?>regirter" class="thistext">Create an account</a></p>
        </div>
      </div>
    </form>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/temp/js/vue/vuecom/loginregister.js"></script>
