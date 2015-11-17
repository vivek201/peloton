<?php
/**
* Template Name: Services Page Template
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
<section class="serviceTabs">
    <div class="fullWidthTabs">
        <div role="tabpanel">
			<?php if( have_rows('services') ): $i = 1;?>
				<ul class="nav nav-tabs responsive" role="tablist">
				    <?php while ( have_rows('services') ) : the_row(); ?>
                   		<li role="presentation" <?php echo ($i == 1) ? 'class="active"' : ""; ?>>
                   			<a href="#tab-<?php echo $i?>" aria-controls="tab-<?php echo $i?>" role="tab" data-toggle="tab">
                   				<img src="<?php the_sub_field('icon') ?>">
                   				<span class="hidden-xs"><?php the_sub_field('label'); ?></span>
                   			</a>
               			</li>

			        <?php $i++; endwhile; ?>
				</ul>
				<div class="container">
				   	<div class="row">
				       	<div class="col-md-10 col-md-offset-1">
				           	<div class="tab-content contentsTab">    
				    			<?php $i = 1; while ( have_rows('services') ) : the_row(); ?>
				    				<div role="tabpanel" class="tab-pane <?php echo ($i == 1) ? 'active' : ""; ?>" id="tab-<?php echo $i?>">
				    					<div class="tabContent">
				    						<?php the_sub_field('content'); ?>
				    					</div>
				    				</div>
				    			<?php $i++; endwhile; ?>
				    		</div>
				    	</div>
				    </div>
			   	</div>
			<?php else: ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>