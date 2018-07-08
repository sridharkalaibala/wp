<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package unite-child
 */

get_header(); ?>

<section id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
    <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : ?>

            <header class="page-header">
		       <h1> Films List </h1>
            </header>
            <?php while ( have_posts() ) : the_post(); ?>

                <?php
                get_template_part( 'content-film', get_post_format() );
                ?>

            <?php endwhile; ?>

            <?php unite_paging_nav(); ?>

        <?php else : ?>

            <?php get_template_part( 'content', 'none' ); ?>

        <?php endif; ?>

    </main>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>


