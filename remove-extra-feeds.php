<?php

/**
 * Remove Extra Feeds
 *
 * @package     RemoveExtraFeeds
 * @author      Goce Mitevski
 * @copyright   2016 Keitaro AB
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Remove Extra Feeds
 * Plugin URI:  https://example.com/plugin-name
 * Description: Remove all extra syntication feeds and serve only the main WordPress feed
 * Version:     20170313
 * Author:      Goce Mitevsk
 * Author URI:  https://example.com
 * Text Domain: plugin-slug
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

function remove_extra_feeds() {

  // Automatically add feed links in <head> if not already added by the theme
  if (!current_theme_supports('automatic-feed-links')) {
    add_theme_support('automatic-feed-links');
  }

  remove_action('wp_head', 'feed_links_extra', 3);
  add_action('feed_links_show_comments_feed', '__return_false');
}

add_action('after_setup_theme', 'remove_extra_feeds');
