    </div>
</div>

<div class="footer">
    <div class="container">
      <p class="text-muted">
         Direct <a href="http://flirtme.biz">Date and Flirt</a> Right Now! &nbsp;&bull;&nbsp;
      <?php foreach($pages AS $page): ?>
          <a href="<?php echo site_url('main/page/'.$page->page_url) ?>"><?php echo $page->page_name ?></a> &nbsp;&bull;&nbsp;
      <?php endforeach ?>
        <?php if($this->session->userdata('site_lang') != 'french' ): ?>
        <a href='<?php echo site_url('main/switchLanguage/french') ?>'>French</a>
        <?php else: ?>
            <a href='<?php echo site_url('main/switchLanguage/english') ?>'>English</a>
        <?php endif ?>
      </p>
    <p class="small right">Powered by <strong><abbr title="pH2Date.com is an exclusive Professional Web Dating Solution for e-Business">pH2Date</abbr></strong>, <em>Intelligent <a href="http://ph2date.com">Web Dating Solution</a> Designed for Smart Businesses</em></p>
    </div>
</div>

</body>
</html>
