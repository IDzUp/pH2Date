<?php
$this->load->view('header');
$this->load->view('loged_in_side');
?>
<div class="col-md-8">
<div class="well">

<?php if(isset($message) AND !empty($message)){ ?>
<div class="alert alert-success"><?php echo $message;?></div>
<?php } ?>

<h1><?=lang('edit').' '.$video->video_name?></h1>                                    
<div class="clr"></div>
</br>

<form enctype="multipart/form-data" action="<?php echo site_url('user/video_edit/'.$video->id);?>"  method="POST">

  <div class="form-group" style="padding-top:20px;">
    <label for="name"><?=lang('video_name')?></label>
    <input required="required" type="text" class="form-control" id="video_name" name="video_name" value="<?=$video->video_name?>">
  </div>

  <div class="form-group">
    <label for="icon_URL"><?=lang('video_desc')?></label>
    <textarea required="required" class="form-control" id="video_desc" name="video_desc"><?=$video->video_desc?></textarea>

  </div>



  <button type="submit" class="btn btn-default"><?=lang('edit_user_submit_btn')?></button>
</form>

</div>
</div>
<?php
$this->load->view('footer');
?>