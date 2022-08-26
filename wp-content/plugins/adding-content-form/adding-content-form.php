<?php
/*
Plugin Name: Adding Content Form
Description: Creating form for adding content
Version: 1.0.0
Author: Anna Stefanova
Author URI: https://t.me/annastefanova
License: GPLv2 or later
Text Domain: adding-content-form
*/

/*  Copyright 2022  Anna Stefanova  (email: astefanova267@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class TtAddingContentForm
{
	//method

	public function __construct() {
		add_shortcode('textshortcode', 'wpschool_text_shortcode');
	}


	function wpschool_text_shortcode() {
		return 'Привет, WPSchool!';
	}
}

if (class_exists('TtAddingContentForm')) {
	new TtAddingContentForm();
}


