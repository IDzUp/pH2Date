<?php
    $this->load->view('header');
    $this->load->view('loged_in_side');
?>
    <div class="col-md-8">
        <div class="well">

            <?php if (!empty($this->msg_error_right)): ?>
                <div id="" class="alert alert-danger"><?php echo $this->msg_error_right; ?></div>
            <?php endif ?>

            <?php if (!empty($this->msg_success_right)): ?>
                <div class="alert alert-success"><?php echo $this->msg_success_right; ?></div>
            <?php endif ?>

            <h1><?= lang('my_messages') ?></h1>
            <div class="clr"></div>
            </br>

            <?php if (!empty($messages)): ?>
                <?php foreach ($messages as $message): ?>
                    <p><b><?= strip_tags(ucfirst($message->from) . ' ' . $message->sent) ?>
                            : </b><?= $message->message ?></p>
                <?php endforeach ?>
            <?php endif ?>

            <form action="<?php echo site_url('user/message_box/' . strip_tags($other_user->username)) ?>"
                  method="post">
                <div class="col-md-10">
                    <textarea class="form-control" id="message" name="message"></textarea>
                </div>
                <button type="submit" class="btn btn-default"
                        style="line-height:40px;margin-left:15px;margin-top:2px;"><?= lang('edit_user_submit_btn') ?></button>

        </div>
    </div>
<?php $this->load->view('footer') ?>
