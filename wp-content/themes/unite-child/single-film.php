<?php get_header(); ?>

    <div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
        <main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single-film' ); ?>

				<?php unite_post_nav(); ?>

				<?php
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
				?>

			<?php endwhile;  ?>

        </main>
    </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>