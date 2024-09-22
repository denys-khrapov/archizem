<!doctype html>
<html>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
</head>

<?php
$phone_button = get_field('phone_button', 'option');
$phone_main_link = get_field('phone_main_link', 'option');
?>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div class="page-holder">
    <div class="wrapper" id="wrapper">

      <header class="header" id="header">
        <div class="container">

          <?php if ($phone_main_link || has_nav_menu('header-navigation')): ?>
            <div class="header-menu">

              <?php if (has_nav_menu('header-navigation')) : ?>
                <?php wp_nav_menu(array(
                  'container' => false,
                  'theme_location' => 'header-navigation',
                  'menu_id' => 'header-navigation',
                  'menu_class' => 'header-navigation',
                  'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                  'walker' => new Custom_Walker_Nav_Menu
                )); ?>
              <?php endif; ?>

              <?php if ($phone_main_link): ?>
                <ul class="dropdown">
                  <li>
                    <?php if ($phone_main_link):
                      $link_url = $phone_main_link['url'];
                      $link_title = $phone_main_link['title'];
                      $link_target = $phone_main_link['target'] ? $phone_main_link['target'] : '_self';
                    ?>
                      <a class="link main-phone-link _icon-arrow-left" href="<?php echo esc_url($link_url); ?>"
                        target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php endif; ?>
                    <?php if (have_rows('phone_list', 'option')): ?>
                      <ul class="dropdown-content">
                        <?php while (have_rows('phone_list', 'option')): the_row();
                          $phone_link = get_sub_field('phone_link', 'option');
                        ?>
                          <li class="phone-item">
                            <?php if ($phone_link):
                              $link_url = $phone_link['url'];
                              $link_title = $phone_link['title'];
                              $link_target = $phone_link['target'] ? $phone_link['target'] : '_self';
                            ?>
                              <a class="link " href="<?php echo esc_url($link_url); ?>"
                                target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>
                          </li>
                        <?php endwhile; ?>
                      </ul>
                    <?php endif; ?>
                  </li>
                </ul>
              <?php endif; ?>

            </div>
          <?php endif; ?>

          <?php if (has_custom_logo()) : ?>
            <div class="logo" itemscope itemtype="http://schema.org/Brand">
              <?php the_custom_logo(); ?>
            </div>
          <?php endif; ?>

          <?php if ($phone_main_link || $phone_button): ?>
            <div class="header-contacts">
              <?php if ($phone_main_link): ?>
                <ul class="dropdown">
                  <li>
                    <?php if ($phone_main_link):
                      $link_url = $phone_main_link['url'];
                      $link_title = $phone_main_link['title'];
                      $link_target = $phone_main_link['target'] ? $phone_main_link['target'] : '_self';
                    ?>
                      <a class="link main-phone-link _icon-arrow-left" href="<?php echo esc_url($link_url); ?>"
                        target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php endif; ?>
                    <?php if (have_rows('phone_list', 'option')): ?>
                      <ul class="dropdown-content">
                        <?php while (have_rows('phone_list', 'option')): the_row();
                          $phone_link = get_sub_field('phone_link', 'option');
                        ?>
                          <li class="phone-item">
                            <?php if ($phone_link):
                              $link_url = $phone_link['url'];
                              $link_title = $phone_link['title'];
                              $link_target = $phone_link['target'] ? $phone_link['target'] : '_self';
                            ?>
                              <a class="link " href="<?php echo esc_url($link_url); ?>"
                                target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>
                          </li>
                        <?php endwhile; ?>
                      </ul>
                    <?php endif; ?>
                  </li>
                </ul>
              <?php endif; ?>

              <?php if ($phone_button) : ?>
                <?php if ($phone_button):
                  $link_url = $phone_button['url'];
                  $link_title = $phone_button['title'];
                  $link_target = $phone_button['target'] ? $phone_button['target'] : '_self';
                ?>
                  <a class="link btn-phone _icon-phone" href="<?php echo esc_url($link_url); ?>"
                    target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          <?php endif; ?>

          <?php if (has_nav_menu('header-navigation') || $phone_main_link) : ?>
            <div class="menu-burger"><span></span></div>
          <?php endif; ?>
        </div>
      </header>

      <main class="main" id="main">