<!DOCTYPE xhtml>
<html>
    
    <head>
        <meta charset="UTF-8" />
        <title>pH2Date - Login to the Admin Panel</title>
        
        <!-- CSSs -->
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/reset.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/960.css" />
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/icons.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/tipsy.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/formalize.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/prettyPhoto.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/jquery-ui-1.8.18.custom.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/chosen.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/ui.spinner.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/jquery.jqplot.min.css" />
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/fullcalendar.css" />
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/jquery.miniColors.css" />
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/elrte.min.css" />
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/elfinder.css" />
        <link rel="stylesheet" href="<?=base_url();?>assets/theme_files/admin/css/main.css" />

        <!-- JAVASCRIPTs -->
        <!--[if lt IE 9]>
            <script language="javascript" type="text/javascript" src="<?=base_url();?>assets/theme_files/admin/js/jqPlot/excanvas.min.js"></script>
            <script language="javascript" type="text/javascript" src="<?=base_url();?>assets/theme_files/admin/js/html5shiv.js"></script>
        <![endif]-->
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery-ui-1.8.18.custom.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery.tipsy.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery.formalize.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery.modal.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/prefixfree.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/datables/<?=base_url();?>assets/theme_files/admin/js/jquery.dataTables.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery.prettyPhoto.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery.autogrowtextarea.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery.easing.1.3.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery.fileinput.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/chosen.jquery.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/ui.checkBox.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/ui.spinner.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery.loading.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery.path.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jqPlot/jquery.jqplot.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jqPlot/plugins/jqplot.pieRenderer.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jqPlot/plugins/jqplot.cursor.min.js"></script>
        <!-- # -->
        <script src="<?=base_url();?>assets/theme_files/admin/js/jqPlot/plugins/jqplot.highlighter.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jqPlot/plugins/jqplot.dragable.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jqPlot/plugins/jqplot.dateAxisRenderer.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jqPlot/plugins/jqplot.ohlcRenderer.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jqPlot/plugins/jqplot.trendline.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jqPlot/plugins/jqplot.barRenderer.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jqPlot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jqPlot/plugins/jqplot.pointLabels.min.js"></script>
        <!-- /# -->
        <script src="<?=base_url();?>assets/theme_files/admin/js/fullcalendar.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery.miniColors.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery.maskedinput-1.3.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery-ui-timepicker-addon.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/elrte.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/elfinder.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery.validate.min.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/jquery.metadata.js"></script>
        <script src="<?=base_url();?>assets/theme_files/admin/js/main.js"></script>
       
    </head>
    <body>
        <!-- show loading until the all page scripts are fully loaded and cached (use this only on login page) -->
        <div id="loading">
            <div class="inner">
                <div>
                    <div class="ajax-loader"></div>
                    <p>.....<span>Loading ..</span></p>
                </div>
            </div>
        </div>
        <script>document.getElementById('loading').style.display = 'block';</script>

        <!-- wrapper -->
        <div id="wrapper">

            <section id="main">
                <div class="container_12">
                    <div id="content" class="compact-page">
                        <div class="min">
                            <div id="logo" style="padding:5px;">
                                <img src="<?=base_url();?>assets/theme_files/admin/img/logo.png" alt="logo" />
                            </div>
                            <div class="main-box">
                                <!-- If you don't want that the theme opens that fancy menu through ajax, remove "jmenu" class -->
                                <!-- If you want the fancy menu, the "action" must return the dashboard html (or similar page), so that we can extract menu informations. A AJAX request will be made
                                     with the form data (without the X-Request-With header), if the response is a valid successfully logged-user page, the fancy menu will appear, otherwise the form will procced normally -->
                                <form action="<?=base_url();?>admin/login" method="post">
                                    <header class="head">
                                        <h1>Login</h1>
                                        
                                        <div class="alignleft">
                                            <div class="note small">
                                                <input id="ck" type="checkbox" /> <label for="ck">Remember Me</label>
                                            </div>
                                        </div>
                                        <span class="divider"></span>
                                    </header>

                                    <div class="field fullwidth">
                                        <input type="text" name="identity" placeholder="email" data-icon="user" />
                                    </div>
                                    <div class="field fullwidth">
                                        <input type="password" name="password" placeholder="password" data-icon="closed-lock" />
                                    </div>

                                    <span class="divider"></span>

                                    <div class="field fullwidth last">
                                        <input type="submit" class="bt blue large" value="Login" />
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /wrapper -->
    </body>
</html>
