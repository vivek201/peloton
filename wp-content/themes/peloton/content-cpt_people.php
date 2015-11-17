<?php
    $args = array(
        'post_type' => 'team', 
        'posts_per_page' => get_query_var('posts_per_page', 8),
        'orderby' => 'title',
        'order' => 'ASC'
    );
    $team = new WP_Query($args);
    if ($team->have_posts()):?>
        <section class="serviceTabs peopleTabs">
            <div class="container-fluid">
                <div class="row" id="team">
                    <?php while ($team->have_posts()): $team->the_post()?>
                        <div class="col-md-3 col-sm-4 col-xs-6 member">
                            <span class="memName"><?php echo get_the_title() ?></span>
                            <span class="memPos"><?php echo get_post_meta($post->ID, '_team_member_position', true); ?></span>
                            <div class="memImageContainer">
                            <?php the_post_thumbnail('custom-size', array('class' => 'img-responsive center-block')); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>  
    <?php endif;
    wp_reset_postdata();
?>