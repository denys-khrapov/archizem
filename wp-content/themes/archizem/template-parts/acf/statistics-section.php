<?php
$section_classes = 'statistics-section full-width';
$title = get_field('title');
$link = get_field('link');
$image_id  = get_field('image_id', false, false);
?>

<?php if ($title || $link || $image_id || have_rows('statistics')) : ?>
    <section class="<?php echo $section_classes; ?>">
        <div class="container">
            <?php if ($title) : ?>
                <h2 class="section-title"><?php echo wp_kses_post($title); ?></h2>
            <?php endif; ?>

            <?php if ($image_id || $link || have_rows('statistics')) : ?>
                <div class="content">
                    <?php if ($image_id) : ?>
                        <div class="col-left">
                            <div class="image-holder"><?php echo wp_get_attachment_image($image_id, 'thumbnail_statistics_img'); ?></div>
                        </div>
                    <?php endif; ?>

                    <?php if (have_rows('statistics') || $link): ?>
                        <div class="col-right">
                            <?php if (have_rows('statistics')): ?>
                                <div class="statistics-items">
                                    <?php while (have_rows('statistics')): the_row();
                                        $statistic_number = get_sub_field('statistic_number');
                                        $statistic_subtitle = get_sub_field('statistic_subtitle');
                                        $statistic_text = get_sub_field('statistic_text');
                                    ?>
                                        <div class="statistics-item">
                                            <?php if ($statistic_number) : ?>
                                                <div class="number"><?php echo esc_html($statistic_number); ?></div>
                                            <?php endif; ?>

                                            <?php if ($statistic_subtitle) : ?>
                                                <h3 class="title"><?php echo esc_html($statistic_subtitle); ?></h3>
                                            <?php endif; ?>

                                            <?php if ($statistic_text) : ?>
                                                <div class="text-holder"><?php echo esc_html($statistic_text); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($link):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                                <a class="link _icon-arrow-right" href="<?php echo esc_url($link_url); ?>"
                                    target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>