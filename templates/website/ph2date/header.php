<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?=strip_tags($setting->site_title)?></title>
  <link rel="stylesheet" href="<?php echo $this->current_template_url ;?>bootstrap.css" />
  <link rel="stylesheet" href="<?php echo $this->current_template_url ;?>ph2fun.css" />
  <link rel="stylesheet" href="<?php echo $this->current_template_url ;?>color.css" />
  <link rel="stylesheet" href="<?php echo $this->current_template_url ;?>custom.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="author" content="pH2Date.com, IDzUp's Lab" />
  <meta name="creator" content="pH2Date.com, IDzUp's Lab" />
  <meta name="designer" content="pH2Date.com, IDzUp's Lab" />
  <meta name="generator" content="pH2Date.com, IDzUp's Lab" />

<?php if(isset($output) AND isset($output->css_files) AND !empty($output->css_files)): ?>
    <?php foreach($output->css_files as $file): ?>
      <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach ?>
<?php endif ?>

<?php if(isset($output) AND isset($output->js_files) AND !empty($output->js_files)): ?>
    <?php foreach($output->js_files as $file): ?>
      <script src="<?php echo $file; ?>"></script>
    <?php endforeach ?>
<?php endif ?>

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

<?php if ($this->ion_auth->logged_in()): ?>
    <script type="text/javascript" src="<?php echo $this->current_template_url ;?>/chat_assets/js/chat.js"></script>
<?php endif ?>

  <script>var base_template = "<?php echo $this->current_template_url ?>";</script>
  <link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->current_template_url ;?>/chat_assets/css/chat.css" />
  <link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->current_template_url ;?>/chat_assets/css/screen.css" />

    <!--[if lte IE 7]>
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo $this->current_template_url ;?>/chat_assets/css/screen_ie.css" />
    <![endif]-->

  <?php echo $setting->header_html_code_injection ?>
</head>
<body >
<div class="content">
<div class="container" >

<div class="page-header">
  <a href="<?=site_url()?>"><img src="<?php echo $this->current_template_url ?>images/logo.png" alt="<?=strip_tags($setting->site_title)?>" title="<?=strip_tags($setting->site_title)?>" /></a>
</div>

<?php if(isset($message_top) AND !empty($message_top)): ?>
    <div class="alert alert-success"><?php echo $message_top ?></div>
<?php endif ?>

<?php if(isset($message_top_err) AND !empty($message_top_err)): ?>
    <div class="alert alert-danger"><?php echo $message_top_err;?></div>
<?php endif ?>