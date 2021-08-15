<footer class="page-footer py-3 py-sm-5">
  <div class="container-xl">
    <div class="row">
      <div class="col col-12 col-sm-4 mt-3 mt-sm-0">
        <nav aria-labelledby="footer-navigation-heading" class="mb-3">
          <h2 id="footer-navigation-heading" class="visually-hidden">Footer menu</h2>

          <?php wp_nav_menu(array('menu' => 'Footer')); ?>
        </nav>

        <small>
          Registered charity no.<?php echo get_field('charity_number', 'option'); ?><br />
          Registered company no.<?php echo get_field('company_number', 'option'); ?>
        </small>
      </div>

      <div class="col col-12 col-sm-8 mt-3 mt-sm-0 order-first order-sm-last">
        <div class="page-footer--right">
          <div>
        	  <a href="javascript:Boxzilla.show(<?php echo get_field('mailing_list_box_id', 'option'); ?>)" class="button button__secondary" class="button button__primary button_small">
              <span>Click here to join our mailing list</span>
            </a>
          </div>

          <div class="mt-3">
            <a href="<?php echo get_field('donate_url', 'option'); ?>" target="_blank" rel="noreferrer noopener" class="button button__primary button_small">Donate</a>
          </div>

          <div class="my-3">
            <div>Call <?php echo get_field('phone_number', 'option'); ?></div>
            <a href="mailto:<?php echo get_field('email_address', 'option'); ?>"><?php echo get_field('email_address', 'option'); ?></a>
          </div>

          <div class="social-icons social-icons__right mt-auto">
            <?php include get_theme_file_path('/includes/social-icons.php'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
