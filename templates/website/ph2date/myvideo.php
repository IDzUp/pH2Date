<?php
$this->load->view('header');
$this->load->view('loged_in_side');
?>
<div class="col-md-8">
<div class="well">


  <h1><?=lang('my_videos')?></h1>
  <hr>
  		<a class="btn btn-default" href="<?=site_url('user/upload_video')?>"><?=lang('upload_video')?></a>
<br/>
<br/>

  <div class="row">
<script>
    function confirm_delete()
    {
      var x = confirm('Are you sure to delete it?');
      if (x)
          return true;
      else
        return false;
    }
</script>   

<?php if(!empty($videos)): ?>
	<?php foreach ($videos as $video): ?>
	<div class="col-xs-4">
     <h4><?=strip_tags($video->video_name)?></h4>
        
             <img src="<?=base_url('assets/uploads/files/video/thum/'.$video->converted_name."jpg")?>" class="img-responsive imageClip">
        
        <a class="btn btn-default" href="<?=site_url('user/video_watch/'.$video->id)?>"><?=lang('watch')?></a>
        <a class="btn btn-default" href="<?=site_url('user/video_edit/'.$video->id)?>"><?=lang('edit')?></a>
		<a onclick="return confirm_delete();" class="btn btn-default" href="<?=site_url('user/video_delete/'.$video->id)?>"><?=lang('delete')?></a>

    </div>
		<?php endforeach ?>
	<?php endif ?>
    



  </div>
</div>
</div>
<?php $this->load->view('footer') ?>