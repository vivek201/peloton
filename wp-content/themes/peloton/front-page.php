<?php get_header(); ?>
<?php the_post(); ?>
<?php get_template_part('content', 'pageheader'); ?>
<?php
	if (get_field('show_service_banner') && have_rows('home_service')):
		?>
		<section class="ourServices">
			<div class="container">
				<div class="row">
					<h2><?php the_field('service_banner_heading') ?></h2>
					<div class="blockWraps">
						<?php while (have_rows('home_service')): the_row(); ?>
						<div class="col-md-3 col-sm-6">
							<div class="serviceBlock">
								<img src="<?php the_sub_field('image_home_service') ?>" />
								<h3><?php the_sub_field('title_home_serve') ?></h3>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
					<a class="btn btn-default" href="<?php the_field('services_page') ?>">Find out more</a>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<?php if (get_field('show_recent_trans')): 
		$trans_page = get_field('recent_trans_page');
	?>
	<section class="corporateTrans">

		<div class="container">
			<div class="row">
				<h2><?php the_field('recent_trans_banner_heading'); ?></h2>
				<p><?php the_field('recent_trans_banner_subtext'); ?></p>
				<div class="blockWraps">
					<?php 
					set_query_var('num_posts_per_page', get_field('recent_trans_num'));
					set_query_var('front_page', true); 
					get_template_part('content', 'cpt_corp_transactions'); ?>
				<a class="btn btn-default" href="<?php echo $trans_page?>">See all transactions</a>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
<?php get_footer(); ?>
	