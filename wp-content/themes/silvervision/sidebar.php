<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<div id="left_container">
    <img src="<?php bloginfo('stylesheet_directory'); ?>/common/images/left_top_curve.gif" alt="" class="left" />
    <div class="left_container_inner">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/common/images/featured_categories.png" width="241" height="29" alt="" class="featured_cat" />
        <div class="menu_outer">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/common/images/menu_top_curve.png" width="265" height="4" alt="" class="left" />
            <div class="menu_inner">
                <?php //wp_nav_menu( array('theme_location'=>'Navigation', 'menu'=>'Category', 'menu_class'=>'top_links', 'link_before' => '<span>' , 'link_after' => '</span>' ) ); ?>

                <ul>
                    <?php wp_list_categories('orderby=name&show_count=0&exclude=7,8,9,13&title_li='); ?>
                </ul>


            </div>
            <div class="followers">
                <a href="http://www.facebook.com/silvervisiontrading" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/common/images/followus.png" class="facebook" /></a>
                <div style="width:244px; float:left; background:#fff">
                    <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="http://www.facebook.com/silvervisiontrading" width="244" height="495" show_faces="true" border_color="" stream="false" header="false"></fb:like-box>

                </div>
            </div>
        </div>
     
        <div class="newsletter_box">
            <div class="newsletter_box_inner">
                <h3>our newsletter</h3>
                <?php wpsb_opt_in(); ?>
            </div>

            <img src="<?php bloginfo('stylesheet_directory'); ?>/common/images/newsletter_bottom_curve.gif" alt="" class="left" />
        </div> 
        <?php
        // A second sidebar for widgets, just because.
        if (is_active_sidebar('secondary-widget-area')) :
            ?>

            <!-- #secondary .widget-area -->

<?php endif; ?>
        <img src="<?php bloginfo('stylesheet_directory'); ?>/common/images/left_bottom_curve.gif" alt="" class="left" />
    </div>

    <!-- #primary .widget-area -->
