<?php
/**
 * Template part for displaying single posts.
 *
 * @package Hassium
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col hoverable'); ?>>
	<div class="breadcrumb mdl-color-text--grey-500" xmlns:v="http://rdf.data-vocabulary.org/#"><?php hassium_breadcrumb(); ?></div>
	<header class="entry-header">
		<?php
		_e(' in ', 'hassium');
		$category = get_the_category();
		echo '<span class="category"><a class="chip" href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "hassium" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a></span>';
		the_title( '<h1 class="entry-title post-title">', '</h1>' ); ?>
		<?php hassium_post_meta(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hassium' ),
				'after'  => '</div>',
			) ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
<?php hassium_related_posts(); ?>
<?php hassium_next_prev_post(); ?>
<?php hassium_author_box(); ?>
