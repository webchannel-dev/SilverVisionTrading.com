<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<div id="inner_banner_container">
<div class="title"><img width="1000" height="58" alt="" src="<?php bloginfo('stylesheet_directory');?>/common/images/haeding.png"></div>
<div class="banner"> <a href="#"><img width="184" height="64" class="delivery_banner" alt="" src="<?php bloginfo('stylesheet_directory');?>/common/images/delivery_banner2_small.png"></a>
<a href="#"><img width="185" height="65" class="delivery_banner" alt="" src="<?php bloginfo('stylesheet_directory');?>/common/images/delivery_banner_small.png"></a>
<h1><?php printf(  '<span>' . single_cat_title( '', false ) . '</span>' );?></h1>
</div>
</div>

<div id="body_container">

				
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'cat_loop', 'category' );
				?>


<?php
// Inspired by a snippet by Justin Tadlock (http://justintadlock.com/) posted here: http://elliotjaystocks.com/blog/tutorial-multiple-singlephp-templates-in-wordpress/#comment-2383

add_filter( 'category_template', 'my_category_template' );
// I believe *_template hooks exist for just about every type of template so it's easy to apply to other templates as well

function my_category_template( $template ) {

if( is_category( 1 ) ) // We can search for categories by ID
$template = locate_template( array( 'template_id_A.php', 'category.php' ) );
elseif( is_category( array( 21, 32 ) ) ) // We can search for multiple categories by ID by passing an array
$template = locate_template( array( 'template_id_B.php', 'category.php' ) );
elseif( is_category( 'food' ) ) // We can search for categories by their slug
$template = locate_template( array( 'template_slug_A.php', 'category.php' ) );
elseif( is_category( array( 'music', 'movies' ) ) ) // We can search for multiple categories by slug as well
$template = locate_template( array( 'template_slug_A.php', 'category.php' ) );

return $template;
}
?>





<?php get_sidebar(); ?>
			</div><!-- #content -->
<?php get_footer(); ?>
