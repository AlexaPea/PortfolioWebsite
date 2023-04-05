<?php
/*
 * The template for displaying all single posts.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com/wp-themes
 */
get_header();
?>
<div class="template-single-page">
	<div class="container-fluid ">
		<div class="row">
      <div class="col-lg-12">
				<?php
				if (have_posts()) : while (have_posts()) : the_post();
					the_content();
				endwhile;
				endif;
				?>
			</div>
		</div>			
	</div>
	<?php wp_reset_postdata(); ?>
</div>

<?php
get_footer();
