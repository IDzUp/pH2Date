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


<?php if($page_content){ ?>
<h1><?php echo $page_content->page_name;?></h1>
<?php echo $page_content->page_content;?>
<?php
}else {
    echo lang('not_found');
}
?>
</div>
</div>
<?php
$this->load->view('footer');
?>