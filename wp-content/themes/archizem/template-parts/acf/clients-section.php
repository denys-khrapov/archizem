<?php
$section_classes = 'clients-section full-width';
$title = get_field('title');
$text = get_field('text');
$image_id  = get_field('image_id', false, false);
?>

<?php if ($title || $text || $image_id || have_rows('clients_group')) : ?>
    <section class="<?php echo $section_classes; ?>">
        <div class="container">
            <?php if ($image_id) : ?>
                <div class="col-left">
                    <div class="image-holder"><?php echo wp_get_attachment_image($image_id, 'thumbnail_clients_img'); ?></div>
                </div>
            <?php endif; ?>

            <?php if ($title || $text || have_rows('clients_group')) : ?>
                <div class="col-right">

                    <?php if ($title || $text) : ?>
                        <div class="clients-top-desc">
                            <?php if ($title) : ?>
                                <h2 class="section-title"><?php echo wp_kses_post($title); ?></h2>
                            <?php endif; ?>

                            <?php if ($text) : ?>
                                <div class="text-holder"><?php echo esc_html($text); ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (have_rows('clients_group')) : ?>
                        <div class="swiper clients-swiper">
                            <div class="swiper-wrapper">
                                <?php while (have_rows('clients_group')): the_row();
                                ?>
                                    <div class="swiper-slide clients-slide">

                                        <?php if (have_rows('clients_logo')) : ?>
                                            <?php while (have_rows('clients_logo')): the_row();
                                                $client_logo_id = get_sub_field('client_logo_id');
                                                $client_link = get_sub_field('client_link');
                                            ?>

                                                <?php if ($client_link):
                                                    $link_url = $client_link['url'];
                                                    $link_title = $client_link['title'];
                                                    $link_target = $client_link['target'] ? $client_link['target'] : '_self';
                                                ?>
                                                    <a class="client-logo" href="<?php echo esc_url($link_url); ?>"
                                                        target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?>
                                                        <?php echo wp_get_attachment_image($client_logo_id); ?>
                                                    </a>
                                                <?php endif; ?>

                                            <?php endwhile; ?>

                                        <?php endif; ?>

                                    </div>
                                <?php endwhile; ?>
                            </div>
                            <div class="swiper-pagination"></div>

                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>
        </div>


    </section>
<?php endif; ?>