<?php
/**
 * @package unite-child
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header page-header">

		<?php
		if ( of_get_option( 'single_post_image', 1 ) == 1 ) :
			the_post_thumbnail( 'unite-featured', array( 'class' => 'thumbnail' ) );
		endif;
		?>

        <h1 class="entry-title "><?php the_title(); ?></h1>

        <div class="entry-meta">
			<?php unite_posted_on(); ?>
        </div>
    </header>

    <div class="entry-content">
		<?php the_content(); ?>

        <p><?php echo get_the_term_list( get_the_ID(), 'country', '<b>Country: </b>', ', ', '' ); ?></p>
        <p><?php echo get_the_term_list( get_the_ID(), 'genre', '<b>Genres: </b>', ', ', '' ); ?></p>
        <p>
			<?php
			if ( get_field( 'ticket_price' ) ):
				$field_name = "ticket_price";
				$field      = get_field_object( $field_name );
				echo '<b>' . $field['label'] . ': </b>' . $field['value'] . ' ' . $field['append'];
			endif;
			?>
        </p>
        <p>
			<?php
			if ( get_field( 'release_date' ) ):
				$field_name = "release_date";
				$field      = get_field_object( $field_name );
				echo '<b>' . $field['label'] . ': </b>' . $field['value'];
			endif;
			?>
        </p>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'unite' ),
			'after'  => '</div>',
		) );
		?>
    </div>

    <footer class="entry-meta">
		<?php
		$category_list = get_the_category_list( __( ', ', 'unite' ) );

		$tag_list = get_the_tag_list( '', __( ', ', 'unite' ) );

		if ( ! unite_categorized_blog() ) {
			if ( '' != $tag_list ) {
				$meta_text = '<i class="fa fa-folder-open-o"></i> %2$s. <i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">permalink</a>.';
			} else {
				$meta_text = '<i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">permalink</a>.';
			}

		} else {
			if ( '' != $tag_list ) {
				$meta_text = '<i class="fa fa-folder-open-o"></i> %1$s <i class="fa fa-tags"></i> %2$s. <i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">permalink</a>.';
			} else {
				$meta_text = '<i class="fa fa-folder-open-o"></i> %1$s. <i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">permalink</a>.';
			}

		} // end check for categories on this blog

		printf(
			$meta_text,
			$category_list,
			$tag_list,
			get_permalink()
		);
		?>

		<?php edit_post_link( __( 'Edit', 'unite' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>
		<?php unite_setPostViews( get_the_ID() ); ?>
        <hr class="section-divider">
    </footer><!-- .entry-meta -->
</article><!-- #post-## -->

