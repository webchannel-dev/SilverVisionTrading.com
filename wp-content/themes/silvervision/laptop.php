<?php
/*
Single Post Template: Laptop
Description: This part is optional, but helpful for describing the Post Template
*/

get_header(); ?>
<div id="inner_banner_container">
<div class="title"><img width="1000" height="58" alt="" src="<?php bloginfo('stylesheet_directory');?>/common/images/haeding.png"></div>
<div class="banner"> <a href="#"><img width="184" height="64" class="delivery_banner" alt="" src="<?php bloginfo('stylesheet_directory');?>/common/images/delivery_banner2_small.png"></a>
<a href="#"><img width="185" height="65" class="delivery_banner" alt="" src="<?php bloginfo('stylesheet_directory');?>/common/images/delivery_banner_small.png"></a>
<h1>Product</h1>
</div>
</div>

<div id="body_container">
<div id="right_container">
<img src="<?php bloginfo('stylesheet_directory');?>/common/images/right_top_curve.png" width="680" height="8" alt="" class="left" />
<div class="right_container_inner">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<h2><a href="?cat=5" class="back">Back to products page</a><?php the_title(); ?></h2>
<div class="product_detail">

<div class="product_box">
<img src="<?php bloginfo('stylesheet_directory');?>/common/images/frame.png" width="242" height="268" alt="" class="product_frame" />
<table width="242" height="268" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle"><img src="<?php 
$values_array = get_post_custom_values('image');
echo $values_array[0];
?>" width="232" alt="" /></td>
  </tr>
</table>


</div>
<div class="description">
<p><strong>PRICE</strong> <span>: <?php 
$values_array = get_post_custom_values('price');
echo $values_array[0];
?></span></p>


<p><strong>DISCOUNT PRICE</strong>	<span>: <?php 
$values_array = get_post_custom_values('discountprice');
echo $values_array[0];
?></span></p>

<p><strong>Brand</strong>	<span>: <?php 
$values_array = get_post_custom_values('brand');
echo $values_array[0];
?></span></p>

<p><strong>AVAILABLE IN STOCK</strong>	<span>: <?php 
$values_array = get_post_custom_values('available_in_stock');
echo $values_array[0];
?></span></p>

<p><strong>Shipping</strong>	<span>: <?php 
$values_array = get_post_custom_values('shipping');
echo $values_array[0];
?></span></p>

<div class="likebox">
<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=standard&amp;show_faces=false&amp;
width=330&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:330px; height:60px;">
</iframe>
</div>
<div class="rating" style="margin:26px 0 0; width:250px; float:left; font-size:11px">
<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
</div>
<a href="?page_id=15" class="order">Order Now</a>
</div>



<div style="clear:both;"></div>
<div class="tab_container">
<div class="buttons_outer">
<ul class="tabs">
<li class="first"><a id="li_anchor2_1" onclick="showDisplayDivsTwo('1')" href="javascript:void(0);" class="active">Description</a></li>
<li><a id="li_anchor2_2" onclick="showDisplayDivsTwo('2')" href="javascript:void(0);">Warranty</a></li>
<li><a id="li_anchor2_3" onclick="showDisplayDivsTwo('3')" href="javascript:void(0);">Reviews</a></li>
</ul>

  <img src="<?php bloginfo('stylesheet_directory');?>/common/images/tab_right_curve.gif" alt="" class="right" /></div>
<div class="tab_box">
 <div class="desc" id="li_ul_anchor2_1" style="display: block;">
  <?php the_content(); ?>
  </div>
  
<div class="desc" id="li_ul_anchor2_2" style="display: none;">
 <?php $values_array = get_post_custom_values('warranty');
echo $values_array[0];
?>
  </div>
  
 <div class="desc" id="li_ul_anchor2_3" style="display: none;">
  <?php comments_template( '', true ); ?>
  </div>
  
  
  <input type="hidden" value="3" id="frmTotalLiCountTwo">
</div>
<img src="<?php bloginfo('stylesheet_directory');?>/common/images/tab_bottom_curve.gif" width="648" height="6" alt="" class="left" /></div>

<div class="specs_table" style="margin-top:20px;">
<h3 class="top_space">Specifications</h3>
<span class="topcurve"></span>
<div class="table_bg">
<table width="648" border="0" cellspacing="0" cellpadding="0">
   
  <tr><?php  if(get_post_custom_values('model')!=null){ ?>
    <td class="left_colum" width="190">Model</td>
    <td><?php 
$values_array = get_post_custom_values('model');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('processor_type')!=null){ ?>
  <tr>
    <td class="left_colum">Processor Type</td>
    <td><?php 
$values_array = get_post_custom_values('processor_type');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('ram')!=null){ ?>
  <tr>
    <td class="left_colum">Ram</td>
    <td><?php 
$values_array = get_post_custom_values('ram');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('hard_disc_drive')!=null){ ?>
   <tr>
    <td class="left_colum">Hard Drive</td>
    <td><?php 
$values_array = get_post_custom_values('hard_disc_drive');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('optical_drive')!=null){ ?>
    <tr>
    <td class="left_colum">Optical Drive</td>
    <td><?php 
$values_array = get_post_custom_values('optical_drive');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('graphics')!=null){ ?>
    <tr>
    <td class="left_colum">Graphics</td>
    <td><?php 
$values_array = get_post_custom_values('graphics');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('screen_size')!=null){ ?>
     <tr>
    <td class="left_colum">Screen Size</td>
    <td><?php 
$values_array = get_post_custom_values('screen_size');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('webcam')!=null){ ?>
    <tr>
    <td class="left_colum">Webcam</td>
    <td><?php 
$values_array = get_post_custom_values('webcam');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('os')!=null){ ?>
  <tr>
    <td class="left_colum">Operating System</td>
    <td><?php 
$values_array = get_post_custom_values('os');
echo $values_array[0];
?></td>
  </tr><?php }  if(get_post_custom_values('audio_out')!=null){ ?>
    <tr>
    <td class="left_colum">Audio Out</td>
    <td><?php 
$values_array = get_post_custom_values('audio_out');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('battery_information')!=null){ ?>
      <tr>
    <td class="left_colum">Battery Information</td>
    <td><?php 
$values_array = get_post_custom_values('battery_information');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('display')!=null){ ?>
  
  <tr>
    <td class="left_colum">Display</td>
    <td><?php 
$values_array = get_post_custom_values('display');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('resolution')!=null){ ?>
  <tr>
    <td class="left_colum">Display Resolution</td>
    <td><?php 
$values_array = get_post_custom_values('resolution');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('rj45_ethernet')!=null){ ?>
  <tr>
    <td class="left_colum">RJ45 Ethernet</td>
    <td><?php 
$values_array = get_post_custom_values('rj45_ethernet');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('wireless_lan')!=null){ ?>
  <tr>
    <td class="left_colum">Wireless LAN</td>
    <td><?php 
$values_array = get_post_custom_values('wireless_lan');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('dimensions')!=null){ ?>
  <tr>
    <td class="left_colum">Dimension</td>
    <td><?php 
$values_array = get_post_custom_values('dimensions');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('weight')!=null){ ?>
  <tr>
    <td class="left_colum">Weight</td>
    <td><?php 
$values_array = get_post_custom_values('weight');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('usb')!=null){ ?>
  <tr>
    <td class="left_colum">USB Port</td>
    <td><?php 
$values_array = get_post_custom_values('usb');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('sound')!=null){ ?>
  <tr>
    <td class="left_colum">Sound1</td>
    <td><?php 
$values_array = get_post_custom_values('sound');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('memory_card_reader')!=null){ ?>
  <tr>
    <td class="left_colum">Memory card reader</td>
    <td><?php 
$values_array = get_post_custom_values('memory_card_reader');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('keyboard_mouse')!=null){ ?>
  <tr>
    <td class="left_colum">Keyboard &amp; Mouse</td>
    <td><?php 
$values_array = get_post_custom_values('keyboard_mouse');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('videocard')!=null){ ?>
  <tr>
    <td class="left_colum">Videocard</td>
    <td><?php 
$values_array = get_post_custom_values('videocard');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('whats_in_the_box')!=null){ ?>
  
  <tr>
    <td class="left_colum">What's in the box---</td>
    <td><?php 
$values_array = get_post_custom_values('whats_in_the_box');
echo $values_array[0];
?></td>
  </tr><?php } ?>
  
</table>






</div>
<span class="bottomcurve"></span>
</div>

</div>
 
 
 
 </div>
 <?php endwhile; // end of the loop. ?>
 




 
 
 
 
</div>
<img src="<?php bloginfo('stylesheet_directory');?>/common/images/right_bottom_curve.jpg" width="680" height="6" alt="" class="left" /></div>
<?php get_sidebar(); ?>

<div id="right_container" style="margin:20px 0 0">
<img src="<?php bloginfo('stylesheet_directory');?>/common/images/right_top_curve.png" width="680" height="8" alt="" class="left" />
<div class="right_container_inner">
<h2>Related Products</h2>

<?php
$category = get_the_category($post->ID);
$catID = $category[0]->cat_ID;

query_posts('cat='.$catID.'posts_per_page=5');
if ( have_posts() ) while ( have_posts() ) : the_post();
?>

<?php endwhile; ?>
<ul class="product_list">
<?php query_posts('cat='.$catID); if(have_posts()) while ( have_posts() ) : the_post(); ?>
<li <?php if( $pageID==$post->ID ) {echo 'class="current-menu-item"'; } ?>>
<div class="product"><a href="<?php the_permalink() ?>"><img height="125" border="1" src="<?php 
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
<?php endwhile; // End the loop. Whew. ?>
</ul>
            





</div>



<img src="<?php bloginfo('stylesheet_directory');?>/common/images/right_bottom_curve2.jpg" width="680" height="6" alt="" class="left" />
</div>








</div>

<?php get_footer(); ?>

