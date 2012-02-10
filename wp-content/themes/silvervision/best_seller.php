<?php 
/* Template Name: Best Seller  */

get_header(); ?>






<div id="body_container">
<div id="right_container">
<img src="<?php bloginfo('stylesheet_directory');?>/common/images/right_top_curve.png" width="680" height="8" alt="" class="left" />
<div class="right_container_inner">
<h2><?php the_title(); ?></h2>
<ul class="product_list">

<?php $recent = new WP_Query("cat=7&showposts=10"); while($recent->have_posts()) :
$recent->the_post();?>

  <li>
  <div class="product"><a href="<?php the_permalink() ?>"><img src="<?php 
$values_array = get_post_custom_values('image');
echo $values_array[0];
?>" alt="" /></a></div>
  <div class="detail">
  <h3 class="title"><?php the_title(); ?></h3>
  <h4 class="brand"><?php 
$values_array = get_post_custom_values('brand');
echo $values_array[0];
?></h4>
  <p class="price"><strong>PRICE</strong>: <?php 
$values_array = get_post_custom_values('price');
echo $values_array[0];
?></p>
  <a href="<?php the_permalink() ?>" class="view_details">view details</a>
  </div>
  
  </li>
  

<?php endwhile; ?>
  </ul>



 
 
 
 
 
</div>
<img src="<?php bloginfo('stylesheet_directory');?>/common/images/right_bottom_curve2.jpg" width="680" height="6" alt="" class="left" /></div>





<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>