<?php
/*
Plugin Name: RSS Icon Widget
Description: The idea is to have a widget to display a link to any rss feed with a <a href="http://www.feedicons.com">standard feed icon</a>.
Plugin URI: http://pixeljar.com
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=3497105
Author: Pixel Jar
Author URI: http://www.pixeljar.com
Contributors: brandondove, jeffreyzinn
Version: 5.1
License: GPL2
Text Domain: rssiw
Domain Path: /i18n

    Copyright (C) Jul 24, 2017  Pixel Jar  info@pixeljar.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define( 'RSSIW_URL',	plugin_dir_url( __FILE__ ) );
define( 'RSSIW_ABS',	plugin_dir_path( __FILE__ ) );
define( 'RSSIW_REL',	basename( dirname( __FILE__ ) ) );
define( 'RSSIW_SLUG',	plugin_basename( __FILE__ ) );
define( 'RSSIW_LANG',	RSSIW_ABS.'i18n/' );

// INTERNATIONALIZATION
load_plugin_textdomain( 'rssiw', null, RSSIW_REL );

class RSSIconWidget extends WP_Widget {

	var $icon_sizes = array(
		'10' => '10 x 10',
		'12' => '12 x 12',
		'14' => '14 x 14',
		'16' => '16 x 16',
		'24' => '24 x 24',
		'32' => '32 x 32'
	);

    /** constructor */
    function __construct() {
		parent::__construct(
			false,
			$name = __( 'RSS Icon Widget', 'rssiw' ),
			$widget_options = array(
				'description' => __( 'Display a link with the standard RSS Feed Icon linked to an RSS feed of your choice.', 'rssiw' )
			)
		);
    }

    /** @see WP_Widget::widget */
    function widget( $args, $instance) {
        extract( $args );

		echo $before_widget;
		// URL
		echo '<a href="'.esc_url( $instance['feed_url'] ).'" ';

			echo ( isset( $instance['new_window'] ) && $instance['new_window'] == 1 ? 'target="_blank" ' : '' );

			// Styles
			echo 'style="'.

				// Color
				'color: '.$instance['link_color'].'; '.

				// Padding
				'padding: '.( $instance['image_size'] / 2 ).'px 0px '.
								 ( $instance['image_size'] / 2 ).'px '.
								 ( $instance['image_size'] + 5 ).'px; '.
				// Image
				'background: url(\''.RSSIW_URL.'icons/feed-icon-'.$instance['image_size'].'x'.$instance['image_size'].'.png\') no-repeat 0 50%;">';
			echo esc_html( $instance['link_text'] );
		echo '</a>';
		echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update( $new_instance, $old_instance ) {
		$updated_instance = $new_instance;
		return $updated_instance;
    }

    /** @see WP_Widget::form */
    function form( $instance = array() ) {
		$defaults = array(
			'image_size'	=> '10',
			'link_text'		=> __( 'Subscribe via RSS', 'rssiw' ),
			'link_color'	=> '#ff0000',
			'new_window'	=> '0',
			'feed_url'		=> trailingslashit( get_bloginfo( 'rss2_url' ) ),
		);
		extract( wp_parse_args( $instance, $defaults ) );
		?>
			<p><label for="<?php echo $this->get_field_id( 'image_size' ); ?>"><?php _e( 'Icon Size:', 'rssiw' ) ?><br />
				<select id="<?php echo $this->get_field_id( 'image_size' ); ?>" name="<?php echo $this->get_field_name( 'image_size' ); ?>" style="width: 100%;">
					<?php
						foreach( $this->icon_sizes as $size_key => $size_name) :
							echo '  <option value="'.$size_key.'"'.selected( $image_size, $size_key, true ).'>'.$size_name.'</option>';
						endforeach;
					?>
				</select>
			</label></p>

			<p><label for="<?php echo $this->get_field_id( 'link_text' ); ?>"><?php _e( 'Link Text:', 'rssiw' ) ?><br />
				<input id="<?php echo $this->get_field_id( 'link_text' ); ?>" name="<?php echo $this->get_field_name( 'link_text' ); ?>" type="text" style="width: 100%;" value="<?php echo esc_attr( $link_text ) ?>" />
			</label></p>

			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$('#<?php
						echo $this->get_field_id( 'link_color' );
					?>_colorpicker').farbtastic('#<?php
						echo $this->get_field_id( 'link_color' );
					?>');
				});
			</script>
			<p><label for="rssicon_link_color"><?php _e( 'Link Color:', 'rssiw' ); ?><br />
				<div id="<?php echo $this->get_field_id( 'link_color' ); ?>_colorpicker"></div>
				<input id="<?php echo $this->get_field_id( 'link_color' ); ?>" name="<?php echo $this->get_field_name( 'link_color' ); ?>" type="text" style="width: 100%;" value="<?php echo esc_attr( $link_color ); ?>" />
			</label></p>


			<p><label for="<?php echo $this->get_field_id( 'feed_url' ); ?>"><?php _e( 'Feed URL:', 'rssiw' ); ?><br />
				<input id="<?php echo $this->get_field_id( 'feed_url' ); ?>" name="<?php echo $this->get_field_name( 'feed_url' ); ?>" type="text" style="width: 100%;" value="<?php echo esc_attr( esc_url( $feed_url ) ); ?>" />
			</label></p>

			<p><input id="<?php echo $this->get_field_id( 'new_window' ); ?>" name="<?php echo $this->get_field_name( 'new_window' ); ?>" type="checkbox" value="1" <?php checked( 1, $new_window ) ?> />
			<label for="<?php echo $this->get_field_id( 'new_window' ); ?>"><?php _e( 'Open in a new window?', 'rssiw' ) ?></label></p>
		<?php
    }

} // class RSSIconWidget

// register RSSIconWidget widget
add_action( 'widgets_init', create_function( '', 'return register_widget("RSSIconWidget");' ) );

// add jquery and the color_picker
add_action( 'admin_print_scripts-widgets.php', 'rssiconwidget_admin_scripts' );
function rssiconwidget_admin_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'farbtastic' );
	wp_enqueue_style( 'farbtastic' );
}

class DynamicRSSIconWidget extends WP_Widget {

	var $icon_sizes = array(
		'10' => '10 x 10',
		'12' => '12 x 12',
		'14' => '14 x 14',
		'16' => '16 x 16',
		'24' => '24 x 24',
		'32' => '32 x 32'
	);

    /** constructor */
    function __construct() {
		parent::__construct(
			false,
			$name = __( 'Dynamic RSS Icon Widget', 'rssiw' ),
			$widget_options = array(
				'description' => __( 'Display a link with the standard RSS Feed Icon linked to the RSS feed for the archive page you\'re viewing. Note: This widget will only display on archive pages like the main blog list.', 'rssiw' )
			)
		);
    }

    /** @see WP_Widget::widget */
    function widget( $args, $instance) {

    	if ( ! is_archive() && ! is_home() ) {
    		return;
    	}

        extract( $args );

		echo $before_widget;
		// URL
		$url = trailingslashit( home_url( $_SERVER['REQUEST_URI'] ) ) . 'feed/';

		echo '<a href="'.esc_url( $url ).'" ';

			echo ( isset( $instance['new_window'] ) && $instance['new_window'] == 1 ? 'target="_blank" ' : '' );

			// Styles
			echo 'style="'.

				// Color
				'color: '.$instance['link_color'].'; '.

				// Padding
				'padding: '.( $instance['image_size'] / 2 ).'px 0px '.
								 ( $instance['image_size'] / 2 ).'px '.
								 ( $instance['image_size'] + 5 ).'px; '.
				// Image
				'background: url(\''.RSSIW_URL.'icons/feed-icon-'.$instance['image_size'].'x'.$instance['image_size'].'.png\') no-repeat 0 50%;">';
			echo esc_html( $instance['link_text'] );
		echo '</a>';
		echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update( $new_instance, $old_instance ) {
		$updated_instance = $new_instance;
		return $updated_instance;
    }

    /** @see WP_Widget::form */
    function form( $instance = array() ) {
		$defaults = array(
			'image_size'	=> '10',
			'link_text'		=> __( 'Subscribe via RSS', 'rssiw' ),
			'link_color'	=> '#ff0000',
			'new_window'	=> '0',
		);
		extract( wp_parse_args( $instance, $defaults ) );
		?>
			<p><label for="<?php echo $this->get_field_id( 'image_size' ); ?>"><?php _e( 'Icon Size:', 'rssiw' ) ?><br />
				<select id="<?php echo $this->get_field_id( 'image_size' ); ?>" name="<?php echo $this->get_field_name( 'image_size' ); ?>" style="width: 100%;">
					<?php
						foreach( $this->icon_sizes as $size_key => $size_name) :
							echo '  <option value="'.$size_key.'"'.selected( $image_size, $size_key, true ).'>'.$size_name.'</option>';
						endforeach;
					?>
				</select>
			</label></p>

			<p><label for="<?php echo $this->get_field_id( 'link_text' ); ?>"><?php _e( 'Link Text:', 'rssiw' ) ?><br />
				<input id="<?php echo $this->get_field_id( 'link_text' ); ?>" name="<?php echo $this->get_field_name( 'link_text' ); ?>" type="text" style="width: 100%;" value="<?php echo esc_attr( $link_text ) ?>" />
			</label></p>

			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$('#<?php
						echo $this->get_field_id( 'link_color' );
					?>_colorpicker').farbtastic('#<?php
						echo $this->get_field_id( 'link_color' );
					?>');
				});
			</script>
			<p><label for="rssicon_link_color"><?php _e( 'Link Color:', 'rssiw' ); ?><br />
				<div id="<?php echo $this->get_field_id( 'link_color' ); ?>_colorpicker"></div>
				<input id="<?php echo $this->get_field_id( 'link_color' ); ?>" name="<?php echo $this->get_field_name( 'link_color' ); ?>" type="text" style="width: 100%;" value="<?php echo esc_attr( $link_color ); ?>" />
			</label></p>

			<p><input id="<?php echo $this->get_field_id( 'new_window' ); ?>" name="<?php echo $this->get_field_name( 'new_window' ); ?>" type="checkbox" value="1" <?php checked( 1, $new_window ) ?> />
			<label for="<?php echo $this->get_field_id( 'new_window' ); ?>"><?php _e( 'Open in a new window?', 'rssiw' ) ?></label></p>
		<?php
    }

} // class DynamicRSSIconWidget

// register DynamicRSSIconWidget widget
add_action( 'widgets_init', create_function( '', 'return register_widget("DynamicRSSIconWidget");' ) );
