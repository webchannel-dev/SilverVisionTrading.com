<?php 
/* Template Name: Content Page */

get_header(); ?>

<div id="inner_banner_container">
<div class="title"><img width="1000" height="58" alt="" src="<?php bloginfo('stylesheet_directory');?>/common/images/haeding.png"></div>
<div class="banner"> <a href="#"><img width="184" height="64" class="delivery_banner" alt="" src="<?php bloginfo('stylesheet_directory');?>/common/images/delivery_banner2_small.png"></a>
<a href="#"><img width="185" height="65" class="delivery_banner" alt="" src="<?php bloginfo('stylesheet_directory');?>/common/images/delivery_banner_small.png"></a>
<h1><?php the_title(); ?></h1>
</div>
</div>




<div id="body_container">
<div id="right_container">
<img src="<?php bloginfo('stylesheet_directory');?>/common/images/right_top_curve.png" width="680" height="8" alt="" class="left" />
<div class="right_container_inner padding">
  <?php if (have_posts()) : while (have_posts()) : the_post();?>
 <div class="post">
  <div class="entrytext">
   <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
  </div>
 </div>
 <?php endwhile; endif; ?>
  
  
 
</div>
<img src="<?php bloginfo('stylesheet_directory');?>/common/images/right_bottom_curve.jpg" width="680" height="4" alt="" class="left" /></div>





<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>