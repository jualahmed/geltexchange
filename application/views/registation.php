

<section id="register">
  <div class="contentr bg-white text-center box-shadow w-75 p-2">
    <h4 class="thistext mt-3 pt-0">Account Registation</h4>
    <form id="resisterform" action="<?php echo base_url() ?>auth/ajaxcreate" class="m-5">
      <div class="row">
        <div class="col-md-6 my-2">
          <input type="text" id="first_name" placeholder="Enter First Name" class="form-control" name="first_name">
        </div>
        <div class="col-md-6 my-2">
          <input type="text" placeholder="Enter Last Name" class="form-control" name="last_name" id="last_name">
        </div>
        <div class="col-md-6 my-2">
          <input type="text" placeholder="Enter Username" class="form-control" name="username" id="username">
        </div>
        <div class="col-md-6 my-2">
          <input type="text" placeholder="Enter Email" class="form-control" name="email" id="email">
        </div>
        <div class="col-md-6 my-2">
          <input type="text" placeholder="Enter password" class="form-control" name="passwords" id="passwords">
        </div>
        <div class="col-md-6 my-2">
          <input type="text" placeholder="Confirm password" class="form-control" name="password_confirm" id="password_confirm">
        </div>
        <div class="col-md-6 my-2">
          <input type="text" placeholder="Enter Address" class="form-control" name="address" id="address">
        </div>
        <div class="col-md-6 my-2">
          <input type="text" placeholder="Enter Phone Number" class="form-control" name="phone" id="phone">
        </div>
        <div class="col-md-12 my-2 text-center">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
            <label class="form-check-label"  for="exampleCheck1">I have read this project <a href="<?php echo base_url() ?>home/" class="thistext">rules</a> and accept</label>
          </div>
        </div>
        
        <div class="col-md-12 my-2">
          <input type="submit" class="btn btn-success text-white py-2 px-5 roundeddd" value="Sign up">
        </div>
        <div class="col-md-12">
          <p>Maybe you already <a href="<?php echo base_url() ?>home/login" class="thistext">have an</a> account</p>
        </div>
      </div>
    </form>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/temp/scripts/vuecom/loginregister.js"></script>
