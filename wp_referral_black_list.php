<?php
/**
 * Plugin Name: WP referrer spam blocklist
 * Plugin URI: https://simplemediacode.com/?utm_source=WPplugin%3Awp-referrer-spam-blocklist&utm_medium=wordpressplugin&utm_campaign=FreeWordPressPlugins&utm_content=v-1.3.1
 * Description: WordPress plugin to fight with referrer spammers (like semalt, buttons-for-website and many more) and do not mess Google Analytics
 * Version: pre-1.3.1
 * Stable tag: 1.3.0
 * Requires at least: 4.0
 * Tested up to: 5.6
 * Author: Rolands Umbrovskis
 * Author URI: https://umbrovskis.com
 * License: SimpleMediaCode
 * License URI: https://simplemediacode.com/license/gpl/
 */
/*
  Copyright 2015-2020  Rolands Umbrovskis (info at SimpleMediaCode dot COM)

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

/**
 * Exit if accessed directly (security)
 * @since 1.0.0
 */
if (!defined('ABSPATH'))
    exit;


/**
 * Double check. 
 * Are we in WordPress enabled site?
 * @since 1.0.0
 * @release 1.0.0
 */
if (!function_exists('add_action')) {
    echo "Hi! I'm nice WordPress plugin from Umbrovskis.com, but I am more useful if You are using WordPress. So, don't me call directly!.";
    exit;
}
 
/**
 * Define main file
 * @since 1.0.1
 */
define('WPRSBFILE', basename(dirname(__FILE__)) . '/' . basename(__FILE__));

/**
 * Locate  spammer list
 * @since 1.0.0
 */
include_once __DIR__ . '/blockList.php'; // in case someone need it somewhere else in WordPress site or PHP project

/**
 * Load main class
 * @since 1.0.0
 */
include_once __DIR__ . '/wpReferralBlockList.php';

try {
    
/**
 * Do wpReferralBlockList
 * @since 1.0.0
 */
     new wpReferralBlockList();

} catch (Exception $e) {

/**
 * Do Errors and debug
 * @since 1.0.0
 */
    $wp_referralblock_debug = 'Caught exception: wpReferralBlockList ' . $e->getMessage() . "\n";
 
    if (apply_filters('wp_referralblock_debug_log', defined('WP_DEBUG_LOG') && WP_DEBUG_LOG)) {
        error_log(print_r(compact('wp_referralblock_debug'), true));
    }
}

