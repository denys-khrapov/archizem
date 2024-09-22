<?php
$section_classes = 'about-section';
$title = get_field('title');
$text = get_field('text');
$link = get_field('link');
$image_top_left_id  = get_field('image_top_left_id', false, false);
$image_bottom_left_id  = get_field('image_bottom_left_id', false, false);
$image_bottom_right_id  = get_field('image_bottom_right_id', false, false);
?>




<?php if ($title || $text  || $link || $image_top_left_id  || $image_bottom_left_id || $image_bottom_right_id) : ?>
    <section class="<?php echo $section_classes; ?>">

        <?php if ($image_top_left_id || $image_bottom_left_id) : ?>
            <div class="col-left">

                <?php if ($image_top_left_id) : ?>
                    <div class="image-holder image-top-left"><?php echo wp_get_attachment_image($image_top_left_id, 'thumbnail_495x240'); ?></div>
                <?php endif; ?>

                <?php if ($image_bottom_left_id) : ?>
                    <div class="image-holder image-bottom-left"><?php echo wp_get_attachment_image($image_bottom_left_id, 'thumbnail_495x490'); ?></div>
                <?php endif; ?>

            </div>
        <?php endif; ?>

        <?php if ($title || $text || $link || $image_bottom_right_id) : ?>
            <div class="col-right">

                <?php if ($title) : ?>
                    <h2 class="section-title"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>

                <?php if ($text) : ?>
                    <div class="text-holder"><?php echo wp_kses_post($text); ?></div>
                <?php endif; ?>

                <?php if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                    <a class="link  _icon-arrow-right" href="<?php echo esc_url($link_url); ?>"
                        target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>

                <?php if ($image_bottom_right_id) : ?>
                    <div class="image-holder image-bottom-right"><?php echo wp_get_attachment_image($image_bottom_right_id, 'thumbnail_705x320'); ?></div>
                <?php endif; ?>

            </div>
        <?php endif; ?>

    </section>
<?php endif; ?>