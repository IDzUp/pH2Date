<?php
$this->load->view('header');
$this->load->view('loged_in_side');
?>
<div class="col-md-8">
<div class="well">

<h1><?=lang('search_form')?></h1>                                    
<div class="clr"></div>
</br>

<?php $this->load->view('right_msg') ?>

<?php echo form_open("user/search");?>

      <div class="form-group">
            <?php echo lang('search_label', 'search');?> <br />
            <?php echo form_input($search);?>
      </div>

      <div class="form-group">
          <?php echo form_submit('submit', lang('search_submit_btn'),'class="btn btn-default"');?>
      </div>

<?php echo form_close();?>

</div>
</div>
<?php $this->load->view('footer') ?>
