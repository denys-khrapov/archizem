</main>
</div>
</div>
<?php
$footer_copyright = get_theme_mod('footer_copyright');
$footer_logo      = get_theme_mod('footer_logo');
?>



<?php if ($footer_logo || $footer_copyright || have_rows('social_links') || has_nav_menu('footer-navigation') || has_nav_menu('additional-navigation')) : ?>

  <footer class="footer full-width">
    <div class="container">

      <?php if ($footer_logo || has_nav_menu('footer-navigation') || have_rows('social_links')) : ?>
        <div class="footer-top">
          <?php if ($footer_logo) : ?>
            <div class="footer-logo" itemscope itemtype="http://schema.org/Brand">
              <a
                href="<?php echo home_url('/'); ?>"><?php echo wp_get_attachment_image($footer_logo, 'full'); ?></a>
            </div>
          <?php endif; ?>

          <?php if (has_nav_menu('footer-navigation')) : ?>
            <?php wp_nav_menu(array(
              'container' => false,
              'theme_location' => 'footer-navigation',
              'menu_id' => 'footer-navigation',
              'menu_class' => 'footer-navigation',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            )); ?>
          <?php endif; ?>

          <?php if (have_rows('social_links', 'option')): ?>
            <ul class="social-links">
              <?php while (have_rows('social_links', 'option')): the_row();

                $social_image_id = get_sub_field('social_image_id');
                $social_link = get_sub_field('social_link');

                if ($social_image_id && $social_link):
                  $link_url = $social_link['url'];
                  $link_target = $social_link['target'] ?: '_self';
              ?>
                  <li class="item">
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"
                      rel="noopener noreferrer">
                      <?php echo wp_get_attachment_image($social_image_id, 'full'); ?>
                    </a>
                  </li>
                <?php endif; ?>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>

        </div>
      <?php endif; ?>

      <?php if ($footer_copyright || has_nav_menu('additional-navigation')) : ?>
        <div class="footer-bottom">

          <?php if ($footer_copyright) : ?>
            <p class="copyright">
              <?php echo str_replace('[year]', date('Y'), $footer_copyright); ?>
            </p>
          <?php endif; ?>


          <?php if (has_nav_menu('additional-navigation')) : ?>
            <?php wp_nav_menu(array(
              'container' => false,
              'theme_location' => 'additional-navigation',
              'menu_id' => 'additional-navigation',
              'menu_class' => 'additional-navigation',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            )); ?>
          <?php endif; ?>

          <div class="developed">
            <span>Website developed:</span><a href="#"> megasite<span>.</span></a>
          </div>

        </div>
      <?php endif; ?>

    </div>

  </footer>
<?php endif; ?>

</div>

<?php wp_footer(); ?>

</body>

</html>