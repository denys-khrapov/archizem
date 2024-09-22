<?php
$section_classes = 'services-section full-width';
$title = get_field('title');
?>

<?php if ($title || have_rows('services')) : ?>
    <section class="<?php echo $section_classes; ?>">

        <?php if ($title): ?>
            <h2 class="section-title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if (have_rows('services')): ?>

            <?php if (have_rows('services')): ?>
                <div class="services-content">
                    <?php while (have_rows('services')): the_row();
                        $services_title = get_sub_field('services_title');
                        $image_id = get_sub_field('image_id', false);
                        $video = get_sub_field('video');
                    ?>

                        <?php if ($image_id): ?>
                            <?php if ($video):
                            ?>
                                <a class="services-item _icon-video" data-fancybox="gallery-services" href="<?php echo esc_url($video); ?>">
                                    <?php if ($services_title): ?>
                                        <h3 class="services-title"><?php echo esc_html($services_title); ?></h3>
                                    <?php endif; ?>
                                    <div class="image-holder"><?php echo wp_get_attachment_image($image_id, 'thumbnail_services_img'); ?></div>
                                </a>
                            <?php else: ?>
                                <a class="services-item" data-fancybox="gallery-services" href="<?php echo wp_get_attachment_url($image_id); ?>">
                                    <?php if ($services_title): ?>
                                        <h3 class="services-title"><?php echo esc_html($services_title); ?></h3>
                                    <?php endif; ?>
                                    <div class="image-holder"><?php echo wp_get_attachment_image($image_id, 'thumbnail_services_img'); ?></div>
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>

                </div>
            <?php endif; ?>

        <?php endif; ?>

    </section>
<?php endif; ?>