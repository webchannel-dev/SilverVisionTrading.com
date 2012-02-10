<?php
/*
Template Name: Sitemap
*/
?>

<?php get_header(); ?>

<div id="wrap-content">

<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post">

<h2><?php the_title(); ?></h2>

<div class="entry">
<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>

<!-- START EXAMPLE OF SITEMAP USAGE -->			
<h3>Categories and Posts</h3>
		 
<div class="sitemap-list">
<?php if (function_exists("ronalfy_list_categories_and_posts")) { ronalfy_list_categories_and_posts(); }?>						
</div>
<!-- END EXAMPLE OF SITEMAP USAGE -->
</div>

<div class="postmetadata"><p><?php edit_post_link('Edit this page', '', ''); ?></p></div>

</div>

<?php endwhile; endif; ?>

</div> <!-- end div#content -->

<?php include (TEMPLATEPATH . '/left-sidebar.php'); ?>

</div> <!-- end div#wrap-content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>