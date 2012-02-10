<?php 
/* Template Name: Home */

get_header(); ?>
<center>
<iframe src="http://silvervisiontrading.com/wp-content/flashBanner/product-viewer-fx/" width="1000px" height="420px" scrolling="no" frameborder="0" align="middle"></iframe>
</center>


<div id="body_container">
  <div id="right_container"><img src="<?php bloginfo('stylesheet_directory');?>/common/images/delivery_banner3.jpg" alt="" class="left" /> <img src="<?php bloginfo('stylesheet_directory');?>/common/images/delivery_banner4.jpg" alt="" class="right" />
    <div class="grey_panel"> <img src="<?php bloginfo('stylesheet_directory');?>/common/images/seller_top_curve.jpg" class="left" alt="" />
      <div class="grey_panel_inner">
        <h2><img src="<?php bloginfo('stylesheet_directory');?>/common/images/best_seller.jpg" width="153" height="27" alt="" /></h2>
        <ul>
          <?php $recent = new WP_Query("cat=7&showposts=10"); while($recent->have_posts()) :
$recent->the_post();?>
          <li>
            <div class="product"><a href="<?php the_permalink() ?>"><img src="<?php 
$values_array = get_post_custom_values('image');
echo $values_array[0];
?>" alt="" /></a></div>
            <div class="detail">
              <h3 class="title">
                <?php the_title(); ?>
              </h3>
              <h4 class="brand">
                <?php 
$values_array = get_post_custom_values('brand');
echo $values_array[0];
?>
              </h4>
              <p class="price"><strong>PRICE</strong>:
                <?php 
$values_array = get_post_custom_values('price');
echo $values_array[0];
?>
              </p>
              <a href="<?php the_permalink() ?>" class="view_details">view details</a> </div>
          </li>
          <?php endwhile; ?>
        </ul>
      </div>
      <img src="<?php bloginfo('stylesheet_directory');?>/common/images/seller_bottom_curve.jpg" class="left" alt="" /> </div>
    <div class="grey_panel right_align"> <img src="<?php bloginfo('stylesheet_directory');?>/common/images/seller_top_curve.jpg" class="left" alt="" />
      <div class="grey_panel_inner">
        <h2><img src="<?php bloginfo('stylesheet_directory');?>/common/images/new_arrivals.jpg" width="181" height="27" alt="" /></h2>
        <ul>
          <?php $recent = new WP_Query("cat=8&showposts=10"); while($recent->have_posts()) :
$recent->the_post();?>
          <li>
            <div class="product"><a href="<?php the_permalink() ?>"><img src="<?php 
$values_array = get_post_custom_values('image');
echo $values_array[0];
?>" alt="" /></a></div>
            <div class="detail">
              <h3 class="title">
                <?php the_title(); ?>
              </h3>
              <h4 class="brand">
                <?php 
$values_array = get_post_custom_values('brand');
echo $values_array[0];
?>
              </h4>
              <p class="price"><strong>PRICE</strong>:
                <?php 
$values_array = get_post_custom_values('price');
echo $values_array[0];
?>
              </p>
              <a href="<?php the_permalink() ?>" class="view_details">view details</a> </div>
          </li>
          <?php endwhile; ?>
        </ul>
      </div>
      <img src="<?php bloginfo('stylesheet_directory');?>/common/images/seller_bottom_curve.jpg" class="left" alt="" /> </div>
    <div class="brands_footer"> <img src="<?php bloginfo('stylesheet_directory');?>/common/images/htc_logo.png" alt="" /> <img src="<?php bloginfo('stylesheet_directory');?>/common/images/apple_logo.gif" alt="" /> <img src="<?php bloginfo('stylesheet_directory');?>/common/images/blackberry_logo.gif" alt="" /> <img src="<?php bloginfo('stylesheet_directory');?>/common/images/motorola_logo.gif" alt="" /> <img src="<?php bloginfo('stylesheet_directory');?>/common/images/nokia_logo.gif" alt="" /> <img src="<?php bloginfo('stylesheet_directory');?>/common/images/samsung_logo.gif" alt="" /> <img src="<?php bloginfo('stylesheet_directory');?>/common/images/sony_ericsson_logo.gif" alt="" class="last" /> </div>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
