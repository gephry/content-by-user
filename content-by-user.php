<?php 

/*
Plugin Name: Content By User
Plugin URI:  http://link to your plugin homepage
Description: Filter any and all user-added content by the author.
Version:     1.0
Author:      Cass Barbour
Author URI:  https://www.cassbarbour.com
License:     GPL2 etc
License URI: http://link to your plugin license
*/

/* Copyright 2021 Cass Barbour (email : your email address)
(Plugin Name) is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
(Plugin Name) is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with (Plugin Name). If not, see (http://link to your plugin license).
*/



require_once 'include/CBU-admin.php'; // main content




function Add_Menu_Pages()
{
    if (function_exists('add_pages_page')) {
        add_pages_page(
            __('Pages by User', 'pages-by-user'),
            __('Pages by User', 'pages-by-user'),
            'administrator',
            'Pages_By_User',
            'CBU_pages');
    }
    
    //if (function_exists('add_users_page')) {
    if (function_exists('add_menu_page')) {
        add_menu_page(
            __('Content by user', 'content-by-user'),
            __('Content by user', 'content-by-user'),
            'administrator',
            'Content_By_User',
            'CBU_main',
            'dashicons-list-view',
            30);
    }
    
}
add_action('admin_menu', 'Add_Menu_Pages');






// This just echoes the chosen line, we'll position it later.
function show_admin_notice() {

    
    $user_list = get_users( array( 'fields' => array( 'display_name', 'ID' ), 'role__in' => array( 'author', 'editor', 'contributor', 'administrator' ) ) ); 
    //var_dump( $user_list );

    /*echo "<ul>";
    foreach( $user_list as $user ) {
        echo "<li>".$user["ID"]." - ".$user["display_name"]."</li>";
    }
    echo "</ul>";
    
   /* $cu_id = get_current_user_id();
    $user_info = get_userdata( $cu_id );
    $username = $user_info->user_login;
    $first_name = $user_info->first_name;
    $last_name = $user_info->last_name;
    echo "$first_name $last_name logs into her WordPress site with the user name of $username.";
    */
    
    
    //$complete_url = wp_nonce_url( $bare_url, 'trash-post_'.$post->ID );
    //echo "Dolly CSS added";
}

// Now we set that function up to execute when the admin_notices action is called.
add_action( 'admin_notices', 'show_admin_notice' );






// We need some CSS to position the paragraph.
function dolly_css() {
    echo "
	<style type='text/css'>
	#dolly {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #dolly {
		float: left;
	}
	.block-editor-page #dolly {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#dolly,
		.rtl #dolly {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'dolly_css' );


?>