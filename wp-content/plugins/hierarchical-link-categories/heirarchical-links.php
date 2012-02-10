<?php 
/*
Plugin Name: Hierarchical Link Categories
Version: 1.0
Plugin URI: http://www.seodenver.com/hierarchical-links/
Description: Convert WordPress' link categories to be hierarchical with this simple plugin.
Author: Katz Web Services, Inc.
Author URI: http://www.katzwebservices.com

Copyright 2011 Katz Web Services, Inc.  (email: info@katzwebservices.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/		

add_action( 'init', 'link_category_add_form_edit', 1 ); // Runs directly after create_initial_taxonomies in taxonomy.php
function link_category_add_form_edit($example) {
	global $wp_taxonomies;
	$wp_taxonomies['link_category']->hierarchical = 1;
	
	return;
}

add_action('admin_init', 'replace_link_categories_meta_box', 1);

function replace_link_categories_meta_box() { 
	// We add the linkcategorydiv metabox before WP does so we take over control
	add_meta_box('linkcategorydiv', __('Categories'), 'custom_link_categories_meta_box', 'link', 'normal', 'core');
}

function custom_link_categories_meta_box( $post, $box ) {
	global $post_ID;
	$backupPostID = $post_ID;
	$post_ID = $post->link_id;
	$defaults = array('taxonomy' => 'link_category');
	if ( !isset($box['args']) || !is_array($box['args']) )
		$args = array();
	else
		$args = $box['args'];
	extract( wp_parse_args($args, $defaults), EXTR_SKIP );
	$tax = get_taxonomy($taxonomy);
	?>
	<div id="taxonomy-category" class="categorydiv">
		<ul id="category-tabs" class="category-tabs">
			<li class="tabs"><a href="#categories-all" tabindex="3"><?php _e( 'All Categories' ); ?></a></li>
			<li class="hide-if-no-js"><a href="#categories-pop" tabindex="3"><?php _e( 'Most Used' ); ?></a></li>
		</ul>

		<div id="categories-all" class="tabs-panel">
			<ul id="categorychecklist" class="list:category categorychecklist form-no-clear">
				<?php 				
				ob_start();
					if ( isset($post->link_id) ) {
						$checked_categories = wp_get_link_cats( $post->link_id );
						// No selected categories, strange
						if ( ! count( $checked_categories ) )
							$checked_categories[] = $default;
					} else {
						$checked_categories[] = $default;
					}
				wp_terms_checklist($post->ID, array( 'taxonomy' => $taxonomy, 'popular_cats' => $popular_ids, 'selected_cats' => $checked_categories ) ) ;
				$checklist = ob_get_contents();
				ob_end_clean();
				$list = str_replace('tax_input[link_category][]', 'link_category[]', $checklist);
				$list = str_replace('link_category-', 'link-category-', $list);
				$list = str_replace(' class="popular-category"', '', $list);
				$list = preg_replace('/class\=\"selectit\"\>\<input\ value=\"([0-9]+)"/ism', 'for="in-link-category-$1" class="selectit"><input value="$1"', $list);
				echo $list;
				?>
			</ul>
		</div>
		
		<div id="categories-pop" class="tabs-panel" style="display: none;">
			<ul id="categorychecklist-pop" class="categorychecklist form-no-clear" >
				<?php $popular_ids = wp_popular_terms_checklist('link_category'); ?>
			</ul>
		</div>
	<?php if ( current_user_can($tax->cap->edit_terms) ) : ?>
			<div id="category-adder" class="wp-hidden-children">
				<h4>
					<a id="category-add-toggle" href="#category-add" class="hide-if-no-js" tabindex="3">
						<?php
							/* translators: %s: add new taxonomy label */
							printf( __( '+ %s' ), $tax->labels->add_new_item );
						?>
					</a>
				</h4>
				<p id="link-category-add" class="wp-hidden-child">
					<label class="screen-reader-text" for="newcat"><?php echo $tax->labels->add_new_item; ?></label>
					<input type="text" name="newcat" id="newcat" class="form-required form-input-tip" value="<?php echo esc_attr( $tax->labels->new_item_name ); ?>" tabindex="3" aria-required="true"/>
					<label class="screen-reader-text" for="newcategory_parent">
						<?php esc_attr_e( 'Category Parent' ); ?>
					</label>
					<?php wp_dropdown_categories( array( 'taxonomy' => $taxonomy, 'hide_empty' => 0, 'name' => 'new'.$taxonomy.'_parent', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => '&mdash; ' . $tax->labels->parent_item . ' &mdash;', 'tab_index' => 3 ) ); ?>
 					<input type="button" id="category-add-submit" class="add:categorychecklist:linkcategorydiv button" value="<?php esc_attr_e( 'Add' ); ?>" />
					<?php 
						wp_nonce_field( 'add-link-category', '_ajax_nonce', false ); // Doesn't allow nesting
						#wp_nonce_field( 'add-'.$taxonomy, '_ajax_nonce-add-'.$taxonomy, false );
						#wp_nonce_field( 'add-tag', '_ajax_nonce', false ); // Update later; allows nesting
					 ?>
					<span id="category-ajax-response"></span>
				</p>
			</div>
		<?php endif; ?>
 	</div>
	<?php
	$post_ID = $backupPostID;
}

?>