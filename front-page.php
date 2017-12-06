<?php get_header(); ?>
<main>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
	<!--front-page.php-->
						<div id="content" class="regularpage">
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<div class="usercontentitem">
						<?php the_content(); ?>
				   </div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div> 
		</div>
	</div>
</div>
</main>
<?php get_footer(); ?> 