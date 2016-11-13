<div class="col-md-8 animated fadeInRight">
<div class="well">

<?php if(!empty($this->msg_error_right) ): ?>
    <div id="" class="alert alert-danger"><?php echo $this->msg_error_right;?></div>
<?php endif ?>

<?php if(!empty($this->msg_success_right)): ?>
    <div class="alert alert-success"><?php echo $this->msg_success_right;?></div>
<?php endif ?>

<h1 class="pH0"><?php echo lang('create_user_heading');?></h1>
<div class="form-group"><?php echo lang('create_user_subheading');?></div>

<?php echo form_open('user/register');?>

      <div class="form-group">
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </div>

      <div class="form-group">
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Sex</label>
            <select class="form-control" name='sex'>
                  <option value="male"  >Male</option>
                  <option value="female" >Female</option>
            </select>
        </div>

      <div class="form-group">
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
      </div>

      <div class="form-group">
            <?php echo lang('create_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </div>

      <div class="form-group">
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </div>

      <div class="form-group">
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
      </div>


      <div class="form-group"><?php echo form_submit('submit', 'Register','class="btn btn-default"');?></div>

<?php echo form_close();?>
</div>
</div>