<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>pH2Date - Admin Control Panel</title>
        
        <!-- CSSs -->
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/reset.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/960.css" />
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/icons.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/tipsy.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/prettyPhoto.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/jquery-ui-1.8.18.custom.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/main.css" />

        <!-- JAVASCRIPTs -->
        <!--[if lt IE 9]>
            <script language="javascript" type="text/javascript" src="<?=base_url();?>assets/theme_files/admin/js/jqPlot/excanvas.min.js"></script>
            <script language="javascript" type="text/javascript" src="<?=base_url();?>assets/theme_files/admin/js/html5shiv.js"></script>
        <![endif]-->
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery-ui-1.8.18.custom.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery.tipsy.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery.loading.js"></script>

        <script src="<?=base_url();?>assets/theme_files/admin/js/main.js"></script>


        <?php 
      
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach ?>
<?php foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach ?>

    </head>
    <body>
        <!-- wrapper -->
        <div id="wrapper">
            <header>
                <div class="container_12">
                    <div class="grid_12">
                        <!-- navigation menu -->
                        <nav class="main-nav">
                            <ul>
                                <li class="active"><a href="<?=base_url('admin/users');?>" title="Users"><span class="glyph cloud"></span> Users</a>
                                <ul class="submenu">
                                        <li><a href="<?=base_url('admin/users');?>" title="Manage Users">Manage Users</a></li>
                                        <li><a href="<?=base_url('admin/users/add');?>" title="Add User">Add User</a></li>
                                    </ul>

                                </li>
                                <li><a href="<?=base_url('admin/page');?>" title="Pages"><span class="glyph movie"></span> Pages</a>
                                <ul class="submenu">
                                    <li><a href="<?=base_url('admin/page');?>" title="Manage sliders">Manage pages</a></li>
                                    <li><a href="<?=base_url('admin/page/add');?>" title="add page">Add page</a></li>
                                </ul>

                                </li>
                                <li><a href="<?=base_url('admin/photo');?>" title="Photos"><span class="glyph movie"></span> Photos</a>
                                <ul class="submenu">
                                    <li><a href="<?=base_url('admin/photo');?>" title="Manage sliders">Manage photos</a></li>
                                    <li><a href="<?=base_url('admin/photo/add');?>" title="add page">Add photo</a></li>
                                </ul>

                                </li>
                                <li>
                                <a href="<?=base_url('admin/video');?>" title="Videos"><span class="glyph movie"></span> Videos</a>
                                <ul class="submenu">
                                    <li><a href="<?=base_url('admin/video');?>" title="Manage sliders">Manage videos</a></li>
                                    <li><a href="<?=base_url('admin/video/add');?>" title="add page">Add video</a></li>
                                </ul>
                                </li>


                                
                                <li><a href="<?=base_url('admin/likes');?>" title="Likes"><span class="glyph logout"></span> Likes</a></li>

                                <li><a href="<?=base_url('admin/matches');?>" title="Matches"><span class="glyph logout"></span> Matched </a></li>
                                <li><a href="<?=base_url('admin/setting');?>" title="Settings"><span class="glyph logout"></span> Setting </a></li>

                                <li><a href="<?=base_url('admin/logout');?>" title="Logout"><span class="glyph logout"></span> Logout</a></li>
                            </ul>
                        </nav>
                        <!-- /navigation menu -->

                        <!-- bar -->
                        <ul class="bar">
                            <li>
                                <a href="<?=base_url();?>" title="Go to the Frontend Website" class="tooltip">
                                    <span class="glyph portrait-view"></span>
                                    <span class="text">My Website</span>
                                </a>
                            </li>
							
                            <li>
                                <a href="<?=base_url('user/edit_account');?>" title="Edit my Account" class="tooltip">
                                    <span class="glyph user"></span>
                                    <span class="text">Admin</span>
                                </a>
                            </li>
                        </ul>
                    </div>                
                </div>
            </header>

            <section id="main">
                <div class="container_12">
                    <div class="grid_12" id="content-top">
                        <div id="logo" style="padding:15px;display:inline-block;">
                            <img src="<?=base_url();?>assets/theme_files/admin/img/logo.png" alt="logo" />
                        </div>
                        <nav>
                            <ul>
                                <li>
                                    <a href="<?=base_url('admin/users/add');?>">
                                        <span class="glyph user"></span>
                                        Add User
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url('admin/page');?>" class="modal">
                                        <span class="glyph open-in-new-window"></span>
                                        Edit pages
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url('admin/video/add');?>">
                                        <span class="glyph movie"></span>
                                        Add video
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url('admin/matches');?>">
                                        <span class="glyph zoom-in"></span>
                                        Matched
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div id="content">

                    <!-- The modal -->
                    <div class="box grid_8" id="myModal" hidden>
                        <header>
                            <div class="inner">
                                <div class="left title">
                                    <h1>Modal</h1>
                                </div>
                                <div class="right">
                                    <a href="#" class="close">close</a>
                                </div>
                            </div>
                        </header>
                    
                        <div class="box-content">
                            <p>Lorem ipsum dolor sit amet, <a href="#">consectetuer</a> adipiscing elit, sed diam nonummy nibh euismod <em>tincidunt</em> ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation <strong>ullamcorper suscipit</strong> lobortis nisl ut aliquip ex ea commodo consequat.</p>
                            <footer class="pane">
                                <a href="#" class="close bt red">Close modal</a>
                                <a href="#" class="bt blue">Custom button</a>
                            </footer>
                        </div>
                    </div>

                        <div class="main-box">

                            <!-- # Dashboard -->
                            <header class="grid_12 head">
                                <h1>Dashboard</h1>
                                <span class="divider"></span>
                            </header>

                            <!-- Statistics -->
                            <div class="grid_12 simple-box">
                                
                            </div>
                            <!-- /Statistics -->

                            <!-- Latests users -->
                            <div class="box grid_12">
                                <header>
                                    <div class="inner">
                                        <div class="left title">
                                            <h1>Admin </h1>
                                            
                                        </div>
                                        <div class="right">
                                            <a href="#" class="close">close</a>
                                        </div>
                                    </div>
                                </header>

                                <div class="box-content no-inner-space">
                                   