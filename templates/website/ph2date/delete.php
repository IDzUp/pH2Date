<?php
$this->load->view('header');
$this->load->view('loged_in_side');
?>
<div class="col-md-8">
<div class="well">

<?php if(!empty($this->msg_error_right) ){ ?>
<div id="" class="alert alert-danger"><?php echo $this->msg_error_right;?></div>
<?php } ?>
<?php if(!empty($this->msg_success_right)){ ?>
<div class="alert alert-success"><?php echo $this->msg_success_right;?></div>
<?php } ?>

<h1><?=lang('delete_account')?></h1>
<div class="clr"></div>
</br>
<p><?=lang('delete_account_desc')?></p>
<a class="btn btn-default" href="<?=site_url('user/delete/do')?>"><?=lang('agree')?></a>


</div>
</div>
<?php
$this->load->view('footer');
?>
