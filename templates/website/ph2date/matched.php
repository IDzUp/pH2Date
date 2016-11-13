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

<h1><?=lang('matched_users')?></h1>                                    
<div class="clr"></div>
</br>

<?php if(!empty($users)): ?>
    <?php foreach($users AS $user): ?>

<div class="row" style="border-bottom: 1px solid #ccc;margin-top:10px;">
<?php $profile_photo = ($user->profile_photo)?$user->profile_photo:'default_img.png';?>
<div class="col-md-4">
<img class="pic img-circle" src="<?php echo base_url('assets/uploads/member/'.$profile_photo);?>" width="150" height="150" alt="Profile Picture" />

<a style="margin-left:20px;" href="<?php echo site_url('user/profile/'.strip_tags($user->username)) ?>" class="btn btn-danger" ><?=lang('visit_profile')?></a>

</div>

<div class="col-md-8">

<table class="table table-striped">
<tr>
  <td class=""><?=lang('user_name')?></td>
  <td class=""><?php echo strip_tags(ucfirst($user->first_name) .' '. ucfirst($user->last_name)) ?></td>
</tr>
<tr>
  <td class=""><?=lang('user_sex')?></td>
  <td class=""><?php echo ucfirst(strip_tags($user->sex)) ?></td>
</tr>
<tr>
  <td class=""><?=lang('user_country')?></td>
  <td class=""><?php echo strip_tags($user->country) ?></td>
</tr>
<tr>
  <td class=""><?=lang('user_city')?></td>
  <td class=""><?php echo ucfirst(strip_tags($user->city)) ?></td>
</tr>

</table>

</div>
</div>
    <?php endforeach ?>
<?php endif ?>

</div>
</div>
<?php $this->load->view('footer') ?>
