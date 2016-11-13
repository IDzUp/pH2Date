<?php
$this->load->view('header');
$this->load->view('loged_in_side');
?>

<div class="col-md-8">
<div class="well">

<?php if(!empty($this->msg_error_right) ): ?>
    <div id="" class="alert alert-danger"><?php echo $this->msg_error_right;?></div>
<?php endif ?>

<?php if(!empty($this->msg_success_right)): ?>
    <div class="alert alert-success"><?php echo $this->msg_success_right;?></div>
<?php endif ?>


<h1><?=lang('recommended_users')?></h1>
<div class="clr"></div>
</br>
<?=lang('no_recommended_users')?>

</div>
</div>

<?php $this->load->view('footer') ?>