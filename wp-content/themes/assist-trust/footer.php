<footer class="page-footer py-3 py-sm-5">
  <div class="container-xl">
    <div class="row">
      <div class="col col-12 col-sm-4 mt-3 mt-sm-0">
        <nav aria-labelledby="footer-navigation-heading">
          <h2 id="footer-navigation-heading" class="visually-hidden">Footer menu</h2>

          <?php wp_nav_menu(array('menu' => 'Footer')); ?>
        </nav>
      </div>

      <div class="col col-12 col-sm-8 mt-3 mt-sm-0 order-first order-sm-last">
        <div class="page-footer--right">
          <a href="" class="button button__secondary link__animated-inner">
            <span>Click here to join our mailing list</span>
          </a>

          <div class="mt-3">
            <a href="" class="button button__primary">Donate</a>
          </div>

          <div class="mt-3">
            <div>Call 01603 230200</div>
            <a href="mailto:office@assist.trust.co.uk" class="link__animated">office@assist.trust.co.uk</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>