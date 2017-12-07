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
				   <div class="text-center">
							<a href="https://www.facebook.com/DifferentThanFitness/" target="_blank" ><i class="fa fa-facebook-square" aria-hidden="true" data-toggle="tooltip" title="Facebook" data-placement="left"></i></a>
				   			<a href="https://www.instagram.com/differentthanfitness/" target="_blank" ><i class="fa fa-instagram" aria-hidden="true" data-toggle="tooltip" title="Instagram" data-placement="top"></i></a>
				   			<a href="https://twitter.com/differentthantn" target="_blank" ><i class="fa fa-twitter-square" aria-hidden="true" data-toggle="tooltip" title="Twitter" data-placement="right"></i></a>
					</div>
				<?php endwhile; ?>
				<?php endif; ?>

			</div>
		</div>
	</div>
</div>
</main>
<?php get_footer(); ?>
