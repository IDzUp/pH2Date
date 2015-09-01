<?php
$this->load->view('header');
?>
<div id="infoMessage"><?php echo $message;?></div>

<div class="col-md-4">
<div class="well">
<h2>User login</h2>
<form role="form" action="auth/create_user" >
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
</div>

<div class="col-md-8">
<div class="well">
<h2>Register new user</h2>
<form role="form" action="auth/create_user" >
  <div class="form-group">
    <label for="exampleInputEmail1">first_name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first_name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">last_name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="last_name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">company</label>
    <input type="text" class="form-control" id="company" name="company" placeholder="company">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">phone</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="phone">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">password_confirm</label>
    <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="password_confirm">
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>


<?php echo form_open("auth/create_user");?>

      <p>
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>

      <p>
            <?php echo lang('create_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </p>

      <p>
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
      </p>

      <p>
            <?php echo lang('create_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </p>

      <p>
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
      </p>


      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

<?php echo form_close();?>

</div>
</div>


<?php
$this->load->view('footer');
?>