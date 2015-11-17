<?php
/**
* Template Name: Contact Us Page Template
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
?>
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
<?php endif; ?>
<section class="contactBlocks">
	<div class="container">
		<div class="row">
			<?php for ($i = 1; $i <= 2; $i++): ?>
			<?php $contact_details = get_option('pt_contact_details' . $i); ?>
			<div class="col-md-6 col-sm-6">
				<div class="contactC">
					<div class="contInfo">
						<h3><?php echo strtoupper($contact_details['location']) ?></h3>
						<ul>
							<li><?php echo $contact_details['address1'] ?></li>
							<li><?php echo $contact_details['address2'] ?></li>
							<li>T: <?php echo $contact_details['contact_no'] ?></li>
							<li>F: <?php echo $contact_details['fax_no'] ?></li>
						</ul>
						<span>E: <?php echo $contact_details['email'] ?></span>
					</div>
					<div class="locMap">
						<?php echo $contact_details['google_map'] ?>
					</div>
				</div>
			</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>