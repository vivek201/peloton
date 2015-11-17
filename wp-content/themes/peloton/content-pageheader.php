	<section class="pageBanner">
		<?php 
			$use_ft_image = get_post_meta($post->ID, 'pt_use_ft_image', true);	
			if ($use_ft_image == "yes" && has_post_thumbnail()): ?>
			<div class="fullBlock">
				<?php the_post_thumbnail();?>
			</div>
		<?php else: ?>
			<div class="custom-head-banner"></div>
		<?php endif; ?>
		<div class="bannerText">
			<div class="container">
				<div class="text-center">
					<div class="captionWrap">
						<h1>
						<?php
						$alt_heading = get_post_meta($post->ID, 'pt_alt_heading', true);
							$sub_heading = get_post_meta($post->ID, 'pt_sub_heading', true);	
							
							echo (empty($alt_heading)) ? get_the_title(): $alt_heading;
						?>
						</h1>
						<?php
							echo (empty($sub_heading)) ? "": "<p>" . $sub_heading . "</p>";
						?>
					</div>
				</div>
			</div>
		</div>
	</section>