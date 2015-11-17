<?php
    $temp = $wp_query;
    $front_page = get_query_var('front_page', false);
    $args = array(
        'post_type' => 'corp_trans', 
        'posts_per_page' => get_query_var('num_posts_per_page', 2),
        'meta_key' => 'transaction_date', 
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'paged' => get_query_var('paged' , 1)
    );
    $wp_query = new WP_Query($args);
    if ($wp_query->have_posts()): ?>
        <section class="corporateTrans">
            <div class="container">
                <div class="row">
                    <div class="blockWraps">
                    <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="coTrans">
                                <div class="imgContainer">
                                <?php the_post_thumbnail(); ?>
                                </div>
                                <ul>
                                    <li><?php echo get_the_title(); ?></li>
                                    <li><strong><?php the_field('transaction_amount'); ?></strong></li>
                                    <li><?php the_field('transaction_type'); ?></li>
                                    <li><?php the_field('role'); ?></li>
                                    <?php if (!$front_page): ?>
                                    <li class="date">
                                        <?php 
                                        $date = DateTime::createFromFormat('Ymd', get_field('transaction_date'));
                                        echo $date->format('M Y');
                                        ?>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        
                    <?php endwhile; ?>
                    </div>
                    <?php if (!$front_page): ?>
                    <nav>
                        <ul class="pager">
                        <li class="previous">
                        <?php previous_posts_link( '<span aria-hidden="true">&larr;</span> Previous' );?>
                        </li>
                        <li class="next">
                        <?php next_posts_link( 'Next <span aria-hidden="true">&rarr;</span>');  ?>
                        </li>
                        </ul>
                    </nav>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php 
    endif;
    wp_reset_postdata(); 
    $wp_query = $temp;
?>