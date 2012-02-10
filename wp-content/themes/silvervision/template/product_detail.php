<?php 
/* Template Name: Product Detail */

get_header(); ?>






<div id="body_container">
<div id="right_container">
<img src="<?php bloginfo('stylesheet_directory');?>/common/images/right_top_curve.png" width="680" height="8" alt="" class="left" />
<div class="right_container_inner">
<h2>Desire</h2>
<div class="product_detail">

<div class="product_box">
<img src="<?php bloginfo('stylesheet_directory');?>/common/images/frame.png" width="242" height="268" alt="" class="product_frame" />
<img src="<?php bloginfo('stylesheet_directory');?>/common/images/desire.jpg" width="242" height="268" alt="" /></div>
<div class="description">
<h3>Description</h3>
<p>web with Flash 5 megapixels, autofocus HTC Sense 1GHz Qualcomm Snapdragon processor</p>
</div>
<div class="price">
<a href="#" class="order">Order Now</a>
<p><strong>PRICE</strong>		<span>: AED 1,000.01</span></p>
<p><strong>DISCOUNT PRICE</strong>	<span>: AED 990.01</span></p>

</div>
<h3 class="top_space">Specifications</h3>
<div class="specs_table">
<span class="topcurve"></span>
<div class="table_bg">
<table width="648" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="left_colum" width="190">Size</td>
    <td>web with Flash 5 megapixels, autofocus HTC Sense 1GHz Qualcomm Snapdragon processor</td>
  </tr>
  <tr>
    <td class="left_colum">Weight</td>
    <td>web with Flash 5 megapixels, autofocus HTC Sense 1GHz Qualcomm Snapdragon processor</td>
  </tr>
  <tr>
    <td class="left_colum">Display</td>
    <td>web with Flash 5 megapixels, autofocus HTC Sense 1GHz Qualcomm Snapdragon processor</td>
  </tr>
  <tr>
    <td class="left_colum">Camera</td>
    <td>web with Flash 5 megapixels, autofocus HTC Sense 1GHz Qualcomm Snapdragon processor</td>
  </tr>
  <tr>
    <td class="left_colum">Storage</td>
    <td>web with Flash 5 megapixels, autofocus HTC Sense 1GHz Qualcomm Snapdragon processor</td>
  </tr>
</table>








<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="nav-above" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
				</div><!-- #nav-above -->

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-meta">
						<?php twentyten_posted_on(); ?>
					</div><!-- .entry-meta -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php printf( esc_attr__( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyten' ), get_the_author() ); ?>
								</a>
							</div><!-- #author-link	-->
						</div><!-- #author-description -->
					</div><!-- #entry-author-info -->
<?php endif; ?>

					<div class="entry-utility">
						<?php twentyten_posted_in(); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->
				</div><!-- #post-## -->

				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div>
				</div><!-- #nav-below -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>


</div>
<span class="bottomcurve"></span>
</div>
</div>
 
 
 
 
 
</div>
<img src="<?php bloginfo('stylesheet_directory');?>/common/images/right_bottom_curve.jpg" width="680" height="6" alt="" class="left" /></div>




<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>