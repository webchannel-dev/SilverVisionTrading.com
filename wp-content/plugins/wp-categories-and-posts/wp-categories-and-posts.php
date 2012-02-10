<?php 
/*
Plugin Name:WP Categories and Posts
Plugin URI:http://www.philmcdonnell.com/projects/wp-categories-and-posts/
Description:Displays the categories and posts in a sitemap
Version:1.0.0
Author:Phil McDonnell
Author URI:http://www.philmcdonnell.com/

This plugin is based off of the original WP Categories and Posts written by Ronald Huereca

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY
KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR
PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS
OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR
OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
/* EXAMPLE OF PLUGIN USAGE 
<!-- START EXAMPLE OF SITEMAP USAGE -->			
<h3>Categories and Posts</h3>
		 
<div class="sitemap-list">
<?php if (function_exists("ronalfy_list_categories_and_posts")) { ronalfy_list_categories_and_posts(); }?>						
</div>
<!-- END EXAMPLE OF SITEMAP USAGE -->
</div>
*/
/* Plugin Author TODOS based on user feedback
1.  Create an admin menu with user-definable settings.  Ideally a user shouldn't have to program in a function, but include something like <!--cats_and_posts(args)--> in a page or post.
2.  Maybe an AJAX implementation which could collapse/expand the index for posts older than a certain date?
3.  A parameter to limit the number of post displayed (like the last N posts) ?
4.  Suppress the category name/link and just show the list items of the category
5.  Is it possible to say only show the 3 most recent posts from each category?
*/

//This is a modification of a WP_CORE function
class Ronalfy_Sitemap_Category extends Walker {
	var $tree_type = 'category';
	var $db_fields = array ('parent' => 'category_parent', 'id' => 'cat_ID'); //TODO: decouple this

	function start_lvl($output, $depth, $args) {
		if ( 'list' != $args['style'] )
			return $output;

		$indent = str_repeat("\t", $depth);
		$output .= "$indent<ul class='children'>\n";
		return $output;
	}

	function end_lvl($output, $depth, $args) {
		if ( 'list' != $args['style'] )
			return $output;

		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
		return $output;
	}

	function start_el($output, $category, $depth, $args) {
		extract($args);

		$cat_name = attribute_escape( $category->cat_name);
		$link = '<a href="' . get_category_link( $category->cat_ID ) . '" ';
		if ( $use_desc_for_title == 0 || empty($category->category_description) )
			$link .= 'title="' . sprintf(__( 'View all posts filed under %s' ), $cat_name) . '"';
		else
			$link .= 'title="' . attribute_escape( apply_filters( 'category_description', $category->category_description, $category )) . '"';
		$link .= '>';
		$link .= apply_filters( 'list_cats', $category->cat_name, $category ).'</a>';

		if ( (! empty($feed_image)) || (! empty($feed)) ) {
			$link .= ' ';

			if ( empty($feed_image) )
				$link .= '(';

			$link .= '<a href="' . get_category_rss_link( 0, $category->cat_ID, $category->category_nicename ) . '"';

			if ( empty($feed) )
				$alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
			else {
				$title = ' title="' . $feed . '"';
				$alt = ' alt="' . $feed . '"';
				$name = $feed;
				$link .= $title;
			}

			$link .= '>';

			if ( empty($feed_image) )
				$link .= $name;
			else
				$link .= "<img src='$feed_image'$alt$title" . ' />';
			$link .= '</a>';
			if ( empty($feed_image) )
				$link .= ')';
		}
	
		if ( isset($show_count) && $show_count )
			$link .= ' (' . intval($category->category_count) . ')';
	
		if ( isset($show_date) && $show_date ) {
			$link .= ' ' . gmdate('Y-m-d', $category->last_update_timestamp);
		}

		if ( $current_category )
			$_current_category = get_category( $current_category );

			//Output the Parents (Articles (seperator) Sub Cat (seperator) Another Sub Cat
			$parents = explode('|', get_category_parents($category->cat_ID, true, '|', false));
			$catParents = '';
			for ($i = 0; $i < sizeof($parents)-1; $i++) {
				$catParents .= $parents[$i];
				if ($i + 2 != sizeof($parents)) {
					$catParents .= " &raquo; ";
				}
			}
			$parent = "\t<h4>" . $catParents . "</h4>\n";
			$parentPosts = "";
			$parentPostsCount = 0;
			//Get all children 
			$children = get_category_children($category->cat_ID, '|','');
			if ($children != '') { 
				$children = explode("|",$children);
			}
			//Get all posts
			$posts = get_posts('numberposts=10000&category=' . $category->cat_ID);
			if (sizeof($posts) > 0) { 
				global $blog_id, $category_cache;
				foreach ($posts as $p) {
				//Exclude certain children
					$postPresent = false;
					if (sizeof($children) > 1) { 
						foreach ($children as $child) {
							if ( isset( $category_cache[$blog_id][$p->ID][$child] ) ) { $postPresent = true; }
						}
					}
					if ($postPresent) { continue; }
					$parentPostsCount += 1;
					$parentPosts .= '<li><a href="' . get_permalink($p->ID) . '">' . $p->post_title . ' - <span class="date">' . mysql2date("F jS, Y", $p->post_date) . '</span></a></li>';
				}
				if ($parentPostsCount > 0) {
				$output .= $parent . "\n<ul>" . $parentPosts . "\n</ul>";
				}
			}
		

		return $output;
	}

	function end_el($output, $page, $depth, $args) {
		if ( 'list' != $args['style'] )
			return $output;

		$output .= "</li>\n";
		return $output;
	}

}

//ronalfy_list_categories_and_posts is a modification of wp_list_categories - It shows the actual posts underneath each category
//It takes the same args, but outputs differently
//If you are going to add admin options, I would update the list of args (below) and use that to modify the output.
function ronalfy_list_categories_and_posts($args = '') {
	if ( is_array($args) )
		$r = &$args;
	else
		parse_str($args, $r);

	$defaults = array('show_option_all' => '', 'orderby' => 'name',
		'order' => 'ASC', 'show_last_update' => 0, 'style' => 'none',
		'show_count' => 0, 'hide_empty' => 1, 'use_desc_for_title' => 1,
		'child_of' => 0, 'feed' => '', 'feed_image' => '', 'exclude' => '',
		'hierarchical' => true, 'title_li' => __('Categories'));
	$r = array_merge($defaults, $r);
	if ( !isset($r['pad_counts']) && $r['show_count'] && $r['hierarchical'] )
		$r['pad_counts'] = true;
	if ( isset($r['show_date']) )
		$r['include_last_update_time'] = $r['show_date'];
	extract($r);

	$categories = get_categories($r);

	$output = '';
	if ( $title_li && 'list' == $style )
			$output = '<li class="categories">' . $r['title_li'] . '<ul>';

	if ( empty($categories) ) {
		if ( 'list' == $style )
			$output .= '<li>' . __("No categories") . '</li>';
		else
			$output .= __("No categories");
	} else {
		global $wp_query;
		
		if ( is_category() )
			$r['current_category'] = $wp_query->get_queried_object_id();

		if ( $hierarchical )
			$depth = 0;  // Walk the full depth.
		else
			$depth = -1; // Flat.

		$output .= ronalfy_walk_category_tree($categories, $depth, $r);
	}

	if ( $title_li && 'list' == $style )
		$output .= '</ul></li>';

	echo apply_filters('wp_list_categories', $output);
}

//
// Helper functions
//
//Modified slightly from the core WP to include my own modified class
function ronalfy_walk_category_tree() {
	$walker = new Ronalfy_Sitemap_Category;
	$args = func_get_args();
	return call_user_func_array(array(&$walker, 'walk'), $args);
}
?>