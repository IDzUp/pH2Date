<?php if (!$this->ion_auth->logged_in()): ?>
    <div class="col-md-4">
        <div class="well">
        <?php if(!empty($this->msg_error_left) ): ?>
            <div id="" class="alert alert-danger"><?php echo $this->msg_error_left;?></div>
        <?php endif ?>

        <?php if(!empty($this->msg_success_left)): ?>
            <div class="alert alert-success"><?php echo $this->msg_success_left;?></div>
        <?php endif ?>

        <h1><?php echo lang('login_heading');?></h1>
        <p><?php echo lang('login_subheading');?></p>

        <?php echo form_open('user/login') ?>

          <div class="form-group">
            <label for="identity"><?php echo lang('login_identity_label');?></label>    <input type="email" name="identity" value="" id="identity" class="form-control">  </div>

          <div class="form-group">
            <label for="password"><?php echo lang('login_password_label');?></label>    <input type="password" name="password" value="" id="password" class="form-control">  </div>

          <div class="checkbox">
          <label>
              <input name="remember" id="remember" type="checkbox"><?php echo lang('login_remember_label');?></label>
          </div>

          <p><input type="submit" name="submit" value="<?php echo lang('login_submit_btn');?>" class="btn btn-default"></p>

        </form>
        <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
        </div>
    </div>
<?php else: ?>
    <div class="col-md-4">
        <div class="well">
            <?php if(!empty($this->msg_error_left) ): ?>
                <div id="" class="alert alert-danger"><?php echo $this->msg_error_left;?></div>
            <?php endif ?>

            <?php if(!empty($this->msg_success_left)): ?>
                <div class="alert alert-success"><?php echo $this->msg_success_left;?></div>
            <?php endif ?>

            <h1 class="pH1"><i class="fa fa-child"></i><?=lang('menu_user_area')?></h1>

            <div class="sidebar-nav">
              <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                    <span class="sr-only"><?=lang('menu_toggle')?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <span class="visible-xs navbar-brand"><?=lang('menu_user_menu')?></span>
                </div>
                <div class="navbar-collapse collapse sidebar-navbar-collapse">
                  <ul class="nav navbar-nav">
                    <li><a href="<?php echo site_url('user/recommend'); ?>"><i class="fa fa-search-plus"></i> <?=lang('menu_recommendition')?></a></li>
                    <li><a href="<?php echo site_url('user/matched'); ?>"><i class="fa fa-check-circle"></i> <?=lang('menu_match')?></a></li>
                    <li><a href="<?php echo site_url('user/profile'); ?>"><i class="fa fa-male"></i> <?=lang('menu_personal_info')?></a></li>
                    <li><a href="<?php echo site_url('user/edit_account'); ?>"><i class="fa fa-pencil-square-o"></i> <?=lang('menu_update_setting')?></a></li>
                    <li><a href="<?php echo site_url('user/change_password'); ?>"><i class="fa fa-shield"></i> <?=lang('menu_change_password')?></a></li>
                    <li><a href="<?php echo site_url('user/messages'); ?>"><i class="fa fa-file-text-o"></i> <?=lang('menu_my_messages')?></a></li>
                    <li><a href="<?php echo site_url('user/mypic'); ?>"><i class="fa fa-photo"></i> <?=lang('menu_manage_images')?></a></li>
                    <li><a href="<?php echo site_url('user/myvideo'); ?>"><i class="fa fa-play-circle-o"></i> <?=lang('menu_manage_videos')?></a></li>
                    <li><a href="<?php echo site_url('user/delete'); ?>"><i class="fa fa-remove"></i> <?=lang('menu_delete_account')?></a></li>
                    <li><a href="<?php echo site_url('user/logout'); ?>"><i class="fa fa-sign-out"></i> <?=lang('menu_logout')?></a></li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </div>
        </div>
    </div>
<?php endif ?>
