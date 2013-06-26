<?php
/*
Plugin Name: Basic Jquery Slider For Wordpress
Plugin URI: http://pizzli.com
Description: A basic Jquery Slider For WordPress
Version: 1.0
Author: Alexander C. Block
Author URI: http://pizzli.com
License: GPLv2
*/
/*  Copyright 2013 Alexander C. Block  (email : ablock@pizzli.com)

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

function AddBJQSScripts(){
wp_register_script('bjqs-js', plugins_url('/js/bjqs-1.3.min.js',__FILE__));
wp_register_style('bjqs-demo-stylesheet', plugins_url('/css/demo.css',__FILE__));
wp_register_style('bjqs-stylesheet', plugins_url('/css/bjqs.css',__FILE__));
wp_enqueue_script('jquery');
wp_enqueue_script('jquery-ui');
wp_enqueue_script('jquery-ui-tabs');
wp_enqueue_script('bjqs-js');
wp_enqueue_style('bjqs-demo-stylesheet');
wp_enqueue_style('bjqs-stylesheet');
}
add_action( 'wp_enqueue_scripts', 'AddBJQSScripts' );

function SliderJS(){
echo "<script class='secret-source'>
var r = jQuery.noConflict();
r(document).ready(function($) {
          r('#banner-fade').bjqs({
            height      : 320,
            width       : 620,
            responsive  : true
          });
        });
      </script>";
}

add_action('init', 'register_basicslider_post_type');
function register_basicslider_post_type() {
	register_post_type('BasicSlider',array(
		'labels' => array(
			'name' => _x('BasicSlider', 'post type general name'),
			'singular_name' => _x('BasicSlider', 'post type singular name')
		),
		'public' => true,
		'menu_icon' => get_stylesheet_directory_uri().'img/movie_icon.png',
		'supports'      => array( 'title', 'editor', 'thumbnail')
	));
}

function OutputBasicSlider(){
SliderJS();
echo '<div id="banner-fade"><ul class="bjqs">';
$x=0;
query_posts('showposts=6&post_type=basicslider');
while (have_posts()) : the_post();
$x++;
echo '<li>';
the_post_thumbnail(array(620,320),array('title' => get_the_title()));
echo '</li>';
endwhile;
echo '</ul></div><!-- End outer wrapper -->';
wp_reset_query();
}
add_shortcode('BasicSlider','OutputBasicSlider');
?>