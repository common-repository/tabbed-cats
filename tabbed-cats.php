<?php
/*
Plugin Name: Tabbed Cats
Plugin URI: http://wordpress.org/plugins/tabbed-cats
Description: tabbed cats is plugin to tab categories usage [tabbed_cats top="0"]  
Author: emojized
Version: 0.4
Author URI: https://emojized.com

This Plugin is licensed under GPL

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

*/

/**
* Class and Function List:
* Function list:
* - __construct()
* - shortcode()
* - styles()
* Classes list:
* - Tabbed_Cats
*/


class Tabbed_Cats
{
	public function __construct()
	{

		add_shortcode('tabbed_cats', array(&$this,
			'shortcode'
		));
		add_action('wp_enqueue_scripts', array(&$this,
			'styles'
		));
	}

	public function shortcode($atts)
	{
		ob_start();
		include "tab_loop.php";

		$output_string = ob_get_contents();;
		ob_end_clean();
		return $output_string;
	}

	public function styles()
	{

        wp_enqueue_script('jquery');
        // remove this, if you have your own tab styles
        wp_enqueue_style('tabbed_cats-styles', plugin_dir_url(__FILE__) . 'tabs.css');
        
        wp_enqueue_script("jquery-ui-tabs");
     
	}

}

$tabbedCats = new Tabbed_Cats;

?>
