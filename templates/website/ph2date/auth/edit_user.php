<?php
$this->load->view('header');
?>
<div class="col-md-4">
<div class="well">
</div>
</div>
<div class="col-md-8">
<div class="well">

<?php if(!empty($this->msg_error_right) ){ ?>
<div id="" class="alert alert-danger"><?php echo $this->msg_error_right;?></div>
<?php } ?>
<?php if(!empty($this->msg_success_right)){ ?>
<div class="alert alert-success"><?php echo $this->msg_success_right;?></div>
<?php } ?>

<h1><?php echo lang('edit_user_heading');?></h1>
<div class="form-group"><?php echo lang('edit_user_subheading');?></div>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string());?>

      <div class="form-group">
            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </div>

      <div class="form-group">
            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </div>

      <div class="form-group">
            <?php echo lang('edit_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </div>

      <div class="form-group">
            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </div>



      

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <div class="form-group"><?php echo form_submit('submit', lang('edit_user_submit_btn'),'class="btn btn-default"');?></div>

<?php echo form_close();?>
</div>
</div>
<?php
$this->load->view('footer');
?>