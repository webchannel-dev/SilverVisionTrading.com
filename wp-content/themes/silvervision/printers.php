<?php
/*
Single Post Template: Printer
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
 <?php $values_array = get_post_custom_values('shipping_1');
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
  <tr>
    <td class="left_colum" width="190"><strong>Functions <small>(Print, copy, scan, web)</small></strong></td>
    <td>&nbsp;</td>
  </tr> <?php  if(get_post_custom_values('aio_multitasking_supported')!=null){ ?>
  <tr>
    <td class="left_colum">AIO multitasking supported</td>
    <td><?php 
$values_array = get_post_custom_values('aio_multitasking_supported');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('printing_specifications_print_speed_black_draft_a4')!=null){ ?>
  <tr>
    <td class="left_colum">Printing specifications
Print speed black
(draft, A4)</td>
    <td><?php 
$values_array = get_post_custom_values('printing_specifications_print_speed_black_draft_a4');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('print_speed_colour_draft_a4')!=null){ ?>
  <tr>
    <td class="left_colum">Print speed colour
(draft, A4)</td>
    <td><?php 
$values_array = get_post_custom_values('print_speed_colour_draft_a4');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('print_speed_black_laser_comparable')!=null){ ?>
  <tr>
    <td class="left_colum">Print speed black (laser comparable)</td>
    <td><?php 
$values_array = get_post_custom_values('print_speed_black_laser_comparable');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('print_speed_color_laser_comparable')!=null){ ?>
  <tr>
    <td class="left_colum">Print speed color (laser comparable)</td>
    <td><?php 
$values_array = get_post_custom_values('print_speed_color_laser_comparable');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('print_speed_colour_draft_10x15_photo')!=null){ ?>
  <tr>
    <td class="left_colum">Print speed colour (draft, 10x15 photo)</td>
    <td><?php 
$values_array = get_post_custom_values('print_speed_colour_draft_10x15_photo');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('print_speed_footnote')!=null){ ?>
  <tr>
    <td class="left_colum">Print speed footnote</td>
    <td><?php 
$values_array = get_post_custom_values('print_speed_footnote');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('duty_cycle_monthly_a4')!=null){ ?>
  <tr>
    <td class="left_colum">Duty cycle (monthly, A4)</td>
    <td><?php 
$values_array = get_post_custom_values('duty_cycle_monthly_a4');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('print_technology')!=null){ ?>
  <tr>
    <td class="left_colum">Print technology</td>
    <td><?php 
$values_array = get_post_custom_values('print_technology');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('print_quality_black_best')!=null){ ?>
  <tr>
    <td class="left_colum">Print quality black (best)</td>
    <td><?php 
$values_array = get_post_custom_values('print_quality_black_best');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('print_quality_colour_best')!=null){ ?>
  <tr>
    <td class="left_colum">Print quality colour (best)</td>
    <td><?php 
$values_array = get_post_custom_values('print_quality_colour_best');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('number_of_print_cartridges_')!=null){ ?>
  <tr>
    <td class="left_colum">Number of print cartridges</td>
    <td><?php 
$values_array = get_post_custom_values('number_of_print_cartridges_');
echo $values_array[0];
?></td>
  </tr><?php }  ?>
  
  <tr>
    <td class="left_colum">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="left_colum"><strong>Paper handling</strong></td>
    <td>&nbsp;</td>
  </tr><?php  if(get_post_custom_values('paper_handling')!=null){ ?>
  <tr>
    <td class="left_colum">Paper handling </td>
    <td><?php 
$values_array = get_post_custom_values('paper_handling');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('paper_handling_standardoutput')!=null){ ?>
  <tr>
    <td class="left_colum">Paper handling standard/output </td>
    <td><?php 
$values_array = get_post_custom_values('paper_handling_standardoutput');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('maximum_input_capacity_envelopes')!=null){ ?>
  <tr>
    <td class="left_colum">Maximum input capacity (envelopes) </td>
    <td><?php 
$values_array = get_post_custom_values('maximum_input_capacity_envelopes');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('envelope_feeder')!=null){ ?>
  <tr>
    <td class="left_colum">Envelope feeder</td>
    <td><?php 
$values_array = get_post_custom_values('envelope_feeder');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('duplex_print_options')!=null){ ?>
  <tr>
    <td class="left_colum">Duplex print options</td>
    <td><?php 
$values_array = get_post_custom_values('duplex_print_options');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('finished_output_handling')!=null){ ?>
  <tr>
    <td class="left_colum">Finished output handling</td>
    <td><?php 
$values_array = get_post_custom_values('finished_output_handling');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('media_sizes_supported')!=null){ ?>
  <tr>
    <td class="left_colum">Media sizes supported</td>
    <td><?php 
$values_array = get_post_custom_values('media_sizes_supported');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('custom_media_sizes')!=null){ ?>
  <tr>
    <td class="left_colum">Custom media sizes</td>
    <td><?php 
$values_array = get_post_custom_values('custom_media_sizes');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('media_types_supported')!=null){ ?>
  <tr>
    <td class="left_colum">Media types supported</td>
    <td><?php 
$values_array = get_post_custom_values('media_types_supported');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('recommended_media_weight')!=null){ ?>
  <tr>
    <td class="left_colum">Recommended media weight</td>
    <td><?php 
$values_array = get_post_custom_values('recommended_media_weight');
echo $values_array[0];
?></td>
  </tr><?php }  ?>
  <tr>
    <td class="left_colum">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="left_colum"><strong>Additional specifications</strong></td>
    <td>&nbsp;</td>
  </tr><?php  if(get_post_custom_values('standard_memory')!=null){ ?>
  <tr>
    <td class="left_colum">Standard memory</td>
    <td><?php 
$values_array = get_post_custom_values('standard_memory');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('standard_printer_languages')!=null){ ?>
  <tr>
    <td class="left_colum">Standard printer languages</td>
    <td><?php 
$values_array = get_post_custom_values('standard_printer_languages');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('scanner_specifications')!=null){ ?>
  <tr>
    <td class="left_colum">Scanner specifications</td>
    <td><?php $values_array = get_post_custom_values('scanner_specifications');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('scan_type')!=null){ ?>
  <tr>
    <td class="left_colum">Scan type</td>
    <td><?php 
$values_array = get_post_custom_values('scan_type');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('optical_scanning_resolution')!=null){ ?>
  <tr>
    <td class="left_colum">Optical scanning resolution</td>
    <td><?php 
$values_array = get_post_custom_values('optical_scanning_resolution');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('bit_depth')!=null){ ?>
  <tr>
    <td class="left_colum">Bit depth</td>
    <td><?php 
$values_array = get_post_custom_values('bit_depth');
echo $values_array[0];
?></td>
  </tr><?php }  ?>
  
  
  
  
   <tr>
    <td class="left_colum">&nbsp;</td>
    <td>&nbsp;</td>
  </tr><?php  if(get_post_custom_values('color')!=null){ ?>
  <tr>
    <td class="left_colum"><strong>Copier specifications</strong></td>
    <td><?php 
$values_array = get_post_custom_values('color');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('color')!=null){ ?>
  <tr>
    <td class="left_colum">Copy speed (black, draft quality, A4)</td>
    <td><?php 
$values_array = get_post_custom_values('color');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('copy_resolution_black_text')!=null){ ?>
  <tr>
    <td class="left_colum">Copy resolution (black text)</td>
    <td><?php 
$values_array = get_post_custom_values('copy_resolution_black_text');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('copy_resolution_colour_text_and_graphic')!=null){ ?>
  <tr>
    <td class="left_colum">Copy resolution (colour text and graphics)</td>
    <td><?php 
$values_array = get_post_custom_values('copy_resolution_colour_text_and_graphics');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('maximum_copies')!=null){ ?>
  <tr>
    <td class="left_colum">Maximum copies</td>
    <td><?php 
$values_array = get_post_custom_values('maximum_copies');
echo $values_array[0];
?></td>
  </tr><?php }  ?>
  
  <tr>
    <td class="left_colum">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="left_colum"><strong>Photo printing </strong></td>
    <td>&nbsp;</td>
  </tr><?php if(get_post_custom_values('photo_display')!=null){ ?>
  <tr>
    <td class="left_colum">Photo Display</td>
    <td><?php 
$values_array = get_post_custom_values('photo_display');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('borderless_printing')!=null){ ?>
  <tr>
    <td class="left_colum">Borderless printing</td>
    <td><?php 
$values_array = get_post_custom_values('borderless_printing');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('Standard connectivity')!=null){ ?>
  <tr>
    <td class="left_colum">Standard connectivity</td>
    <td><?php 
$values_array = get_post_custom_values('Standard connectivity');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('Compatible operating systems')!=null){ ?>
  <tr>
    <td class="left_colum">Compatible operating systems</td>
    <td><?php 
$values_array = get_post_custom_values('Compatible operating systems');
echo $values_array[0];
?></td>
  </tr><?php } ?>
  
  
  <tr>
    <td class="left_colum">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="left_colum"><strong>Dimensions and weight</strong></td>
    <td>&nbsp;</td>
  </tr><?php if(get_post_custom_values('product_printer_dimensions_w_x_d_x_h')!=null){ ?>
  <tr>
    <td class="left_colum">Product dimensions (W x D x H) </td>
    <td><?php 
$values_array = get_post_custom_values('product_printer_dimensions_w_x_d_x_h');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('product_weight')!=null){ ?>
  <tr>
    <td class="left_colum">Product weight</td>
    <td><?php 
$values_array = get_post_custom_values('product_weight');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('whats_in_the_box')!=null){ ?>
  <tr>
    <td class="left_colum">What's in the box</td>
    <td><?php 
$values_array = get_post_custom_values('whats_in_the_box');
echo $values_array[0];
?></td>
  </tr><?php } if(get_post_custom_values('warranty')!=null){ ?>
  <tr>
    <td class="left_colum">Warranty</td>
    <td><?php 
$values_array = get_post_custom_values('warranty');
echo $values_array[0];
?></td>
  </tr><?php } ?>
  <tr>
    <td class="left_colum">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
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


