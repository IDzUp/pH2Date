<?php $this->load->view('header') ?>

<div class="col-md-12">
<div class="well">

<?php $this->load->view('right_msg') ?>

<h1><?php echo lang('forgot_password_heading');?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div id="infoMessage">
<?php if(!empty($message)) echo $message ?>
</div>

<?php echo form_open("user/forgot_password");?>

      <p>
          <label for="email"><?php echo sprintf(lang('forgot_password_email_label'), $identity_label);?></label> <br />
          <?php echo form_input($email);?>
      </p>

      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'),'class="btn btn-default"');?></p>

<?php echo form_close();?>

</div>
</div>

<?php $this->load->view('footer') ?>