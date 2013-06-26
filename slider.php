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

function AddScripts(){
wp_register_script('bjqs-js', plugins_url('/js/bjqs-1.3.min.js',__FILE__));
wp_register_style('bjqs-stylesheet', plugins_url('/css/bjqs.css',__FILE__));
wp_enqueue_script('jquery');
wp_enqueue_script('bjqs-js');
wp_enqueue_style('bjqs-stylesheet');
}
add_action( 'wp_enqueue_scripts', 'AddScripts' );

function SliderJS(){
echo "<script class='secret-source'>
var j = jQuery.noConflict();
j(document).ready(function($) {
          j('#banner-fade').bjqs({
            height      : 320,
            width       : 620,
            responsive  : true
          });
        });
      </script>";
}
?>