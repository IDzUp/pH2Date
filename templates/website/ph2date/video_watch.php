<?php
$this->load->view('header');
$this->load->view('loged_in_side');
?>
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
<div class="col-md-8">
<div class="well">

<h1><?=$video->video_name?></h1>
<div class="clr"></div>
<hr/>
<p><?=$video->video_desc?></p>


<video width="100%" controls>
  <source src="<?=base_url('assets/uploads/files/video/video/'.$video->converted_name.".webm")?>" type="video/webm">
  Your browser does not support the video tag.
</video>

<h1><?=$user->first_name.' '.lang('videos');?></h1>
<hr/>
  <div class="row">


<?php if(!empty($videos)): ?>
    <?php foreach ($videos as $video): ?>
    <div class="col-xs-4">
     <h4><?=strip_tags($video->video_name) ?></h4>

             <img src="<?=base_url('assets/uploads/files/video/thum/'.$video->converted_name.".jpg")?>" class="img-responsive imageClip">

        <a class="btn btn-default" href="<?=site_url('user/video_watch/'.$video->id)?>"><?=lang('watch')?></a>
        <?php if($video->user_id == $user->user_id ): ?>
            <a class="btn btn-default" href="<?=site_url('user/video_edit/'.$video->id)?>"><?=lang('edit')?></a>
            <a onclick="return confirm_delete();" class="btn btn-default" href="<?=site_url('user/video_delete/'.$video->id)?>"><?=lang('delete')?></a>
        <?php endif ?>
    </div>
        <?php endforeach ?>
    <?php endif ?>

  </div>
</div>
</div>
<?php $this->load->view('footer') ?>