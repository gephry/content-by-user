<?php 

/*
Plugin Name: Content By User
Plugin URI:  https://www.cassbarbour.com/wp-plugins/content-by-user.zip
Description: Filter Posts, Pages, and Comments by the author from a single place. Developed for Defiant Developer job application.
Version:     1.0
Author:      Cass Barbour
Author URI:  https://www.cassbarbour.com
License:     GPL2 etc
License URI: 
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



require_once 'include/CBU-main.php'; // main content
require_once 'include/CBU-TableData.php'; // main content




function Add_Menu_Pages()
{
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




?>