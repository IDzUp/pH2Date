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



<h1><?=lang('upload_video')?></h1>
<div class="clr"></div>
</br>


<form enctype="multipart/form-data" action="<?php echo site_url('user/upload_video');?>"  method="POST">

  <div class="form-group" style="padding-top:20px;">
    <label for="name"><?=lang('video_name')?></label>
    <input required="required" type="text" class="form-control" id="video_name" name="video_name" value="">
  </div>

  <div class="form-group">
    <label for="icon_URL"><?=lang('video_desc')?></label>
    <textarea required="required" class="form-control" id="video_desc" name="video_desc"></textarea>
  </div>

  <div class="form-group">
    <label for="businessLine"><?=lang('video_file')?></label>
    <input required="required" type="file" class="form-control" id="video_file" name="video_file" value="">
  </div>

  <div class="form-group">
    <label for="description"><?=lang('video_img')?></label>
    <input required="required" type="file" class="form-control" id="video_img" name="video_img" value="">
  </div>


  <button type="submit" class="btn btn-default"><?=lang('edit_user_submit_btn')?></button>
</form>

</div>
</div>
<?php
$this->load->view('footer');
?>
