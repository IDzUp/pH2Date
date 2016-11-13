<?php if(!empty($this->msg_error_left) ): ?>
    <div id="" class="alert alert-danger"><?=$this->msg_error_left?></div>
<?php endif ?>

<?php if(!empty($this->msg_success_left)): ?>
    <div class="alert alert-success"><?=$this->msg_success_left?></div>
<?php endif ?>