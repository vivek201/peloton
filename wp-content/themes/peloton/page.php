<?php get_header(); ?>
<?php the_post(); ?>
<?php get_template_part('content', 'pageheader'); ?>
<?php $page_details = get_post_meta($post->ID, 'pt_page_details', true); if (!empty($page_details)): ?>
<section class="aboutDetail">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<div class="about">
					<p>
						<?php echo $page_details; ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif;
	// ==============================================================
	// CHECK TO SEE IF PAGE IS USED FOR CPTS
	// ==============================================================
	$page_type = get_field('use_as');
	switch ($page_type) {
		case "page":
			get_template_part('content', 'page');
			break;
		case "trans":
			get_template_part('content', 'cpt_corp_transactions');
			break;
		case "people":
			get_template_part('content', 'cpt_people');
			break;
	}
	get_footer();
?>