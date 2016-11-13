<?php
$this->load->view('header');
$this->load->view('loged_in_side');
?>
<div class="col-md-8">
<div class="well">

<h1><?=lang('edit_password')?></h1>                                    
<div class="clr"></div>
</br>

<?php $this->load->view('right_msg') ?>

<?php echo form_open("user/change_password");?>

      <div class="form-group">
            <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
            <?php echo form_input($old_password);?>
      </div>

      <div class="form-group">
            <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
            <?php echo form_input($new_password);?>
      </div>

      <div class="form-group">
            <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
            <?php echo form_input($new_password_confirm);?>
      </div>

      <?php echo form_input($user_id);?>
      <div class="form-group">
      <?php echo form_submit('submit', lang('change_password_submit_btn'),'class="btn btn-default"');?>
      </div>

<?php echo form_close();?>

</div>
</div>
<?php $this->load->view('footer') ?>