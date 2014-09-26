<?php
/*
Plugin Name: Matbloggspriset Dashboard Feeds
Plugin URI: http://matbloggspriset
Description: Visar Matbloggsprisets senaste nyheter i din WordPress-Panel / Shows the latest news from The Swedish Food Blog Awards in your Dashboard.
Author: Christopher Anderton
Version: 1.0.0
Tags: widget, dashboard, feed, matbloggspriset
Author URI: http://matbloggspriset.se
Text Domain: matbloggspriset-dashboard-feeds
Domain Path: /languages/
License: GPLv2 or later
*/

/*
Copyright 2014 Christopher Anderton, Matbloggspriset

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
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


function wp_admin_dashboard_add_news_feed_widget() {
global $wp_meta_boxes;
wp_add_dashboard_widget( 'dashboard_matbloggspriset_feed', __("Nyheter från Matbloggspriset", "matbloggspriset-dashboard-feeds"), 'dashboard_matbloggspriset_feed_output' );
}
add_action('wp_dashboard_setup', 'wp_admin_dashboard_add_news_feed_widget');
function dashboard_matbloggspriset_feed_output() {
echo '<div class="matbloggspriset-feed">';
wp_widget_rss_output(array(
'url' => 'http://matbloggspriset.se/feed/',
'title' => __('Visar nyheter från Matbloggspriset i din WordPress-Panel', 'matbloggspriset-dashboard-feeds'),
'items' => 5,
'show_summary' => 0,
'show_author' => 1,
'show_date' => 1
));
echo '<p><hr>' . __('Visar senaste nytt från <a target=_blank" href="http://matbloggspriset.se">matbloggspriset.se</a> i din WordPress-Panel','matbloggspriset-dashboard-feeds') . '</p>';
echo "</div>";
}
// End //
function matbloggspriset_action_init() {
load_plugin_textdomain('matbloggspriset-dashboard-feeds', false, dirname(plugin_basename(__FILE__) ) . '/languages/' );
}
add_action('init', 'matbloggspriset_action_init');
?>