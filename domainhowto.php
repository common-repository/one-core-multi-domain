<?php
/*
Plugin Name: Multi Domain
Plugin URI: http://beat-blogger.de/blog/wordpress_multi_domain_plugin.html
Description: Use a Wordpress installation with multiple Domains
Version: 1.0
Author: Alexej Kloos
Author URI: http://beat-blogger.de/

Copyright 2010  Alexej Kloos  (email : alexejkloos@online.de)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

add_action('admin_menu', 'domain_admin_menu');


function domain_admin_menu() {
  add_options_page('Multi Domain How-To', 'Multi Domain', 'manage_options', 'multidomain', 'domain_options');
}

function domain_options() {
	
	$languag	=	ABSPATH . 'wp-content/languages/';	
		if (file_exists($languag . 'de_DsE.po')) {
			$german	=	true;
		}
		
	if ($german) {
		include("german.php");
	}else {
		include("english.php");
	}
		
}
?>
