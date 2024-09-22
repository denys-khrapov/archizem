<?php
$section_classes = 'projects-section full-width';
$title = get_field('title');
$link = get_field('link');
$image_id  = get_field('image_id', false, false);
?>

<?php if ($title || $link || $image_id) : ?>
    <section class="<?php echo $section_classes; ?>">
        <?php if ($title) : ?>
            <h2 class="section-title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if ($image_id) : ?>
            <div class="image-holder"><?php echo wp_get_attachment_image($image_id, 'thumbnail_projects_bg'); ?></div>
        <?php endif; ?>

        <?php if ($link):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
            <a class="link" href="<?php echo esc_url($link_url); ?>"
                target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
        <?php endif; ?>
    </section>
<?php endif; ?>