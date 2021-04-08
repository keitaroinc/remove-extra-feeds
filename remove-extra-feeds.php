<?php

/*
  Plugin Name: Remove Extra Feeds
  Plugin URI:  https://github.com/keitaroinc/remove-extra-feeds
  Description: Remove all extra syntication feeds and serve only the main WordPress feed
  Version:     20170313
  Author:      Goce Mitevski
  Author URI:  https://github.com/gocemitevski
  License:     GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Copyright:   Copyright (c) 2016 Keitaro AB
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
