<?php
$section_classes = 'hero-section full-width';
$title = get_field('title');
$link = get_field('link');
$image_id  = get_field('background_image_id', false, false);
$image_url = wp_get_attachment_url($image_id);
$background_style = $image_url ? "background-image: url('" . esc_url($image_url) . "'); background-size: cover; background-position: center;" : '';
?>

<?php if ($title || $link || $image_id) : ?>
  <section class="<?php echo $section_classes; ?>" style="<?php echo esc_attr($background_style); ?>">
    <div class="container">
      <h1 class="main-title"><?php echo esc_html($title); ?></h1>

      <?php if ($link):
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
      ?>
        <a class="btn" href="<?php echo esc_url($link_url); ?>"
          target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>