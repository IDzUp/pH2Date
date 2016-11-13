<?php
$this->load->view('header');
$this->load->view('loged_in_side');
?>
<div class="col-md-8">
<div class="well">

<?php $this->load->view('right_msg') ?>

<h1><?=lang('my_messages')?></h1>
<div class="clr"></div>
</br>
<?php foreach($users AS $user): ?>
    <div style="display:inline-block;padding:15px;">
        <?php $profile_photo = ($user->profile_photo)?$user->profile_photo:'default_img.png';?>
        <img class="pic img-circle" src="<?php echo base_url('assets/uploads/member/'.$profile_photo);?>" width="150" height="150" alt="Profile Picture" />
        <h2><?=ucfirst(strip_tags($user->first_name))?></h2>
        <a href="#" class="btn btn-danger" onclick="javascript:chatWith('<?=strip_tags($user->username)?>');"><?=lang('send_message')?></a>
        <a href="<?=site_url('user/message_box/'.strip_tags($user->username))?>" class="btn btn-danger"><?=lang('view_message')?></a>
    </div>
<?php endforeach ?>

</div>
</div>
<?php $this->load->view('footer') ?>