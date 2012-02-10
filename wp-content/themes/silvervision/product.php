<?php 
/* Template Name: Product Page */

get_header(); ?>

<div id="inner_banner_container">
<div class="title"><img width="1000" height="58" alt="" src="<?php bloginfo('stylesheet_directory');?>/common/images/haeding.png"></div>
<div class="banner"> <a href="#"><img width="184" height="64" class="delivery_banner" alt="" src="<?php bloginfo('stylesheet_directory');?>/common/images/delivery_banner2_small.png"></a>
<a href="#"><img width="185" height="65" class="delivery_banner" alt="" src="<?php bloginfo('stylesheet_directory');?>/common/images/delivery_banner_small.png"></a>
<h1>Product</h1>
</div>
</div>




<div id="body_container">
<div id="right_container_outer">
<div id="right_container">
<img src="<?php bloginfo('stylesheet_directory');?>/common/images/right_top_curve.png" width="680" height="8" alt="" class="left" />
<div class="right_container_inner">
<h2><?php the_title(); ?></h2>


<ul class="product_list">

 <?php 

$paged = get_query_var('paged'); 
if( !$paged )
	$paged = 1;
?>  
<?php query_posts('category_name=Products&showposts=20&paged='.$paged); ?>        
<?php while (have_posts()) : the_post(); ?>

  
  
  <li>
  <div class="product"><a href="<?php the_permalink() ?>"><img src="<?php 
$values_array = get_post_custom_values('image');
echo $values_array[0];
?>" alt="" height="125" border="1" /></a></div>
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
 <?php wp_pagenavi(); ?>
 </div>




<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>