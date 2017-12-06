<?php get_header(); ?>
<main>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
<!--index.php-->
						<div id="content" class="regularpage">
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<div class="usercontentitem">
						<h1>	<?php the_content(); ?> </h1>
				   </div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div> 
		</div>
	</div>
</div>
</main>
<?php get_footer(); ?> 