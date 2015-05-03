<?php

// Check if uninstall call is valid
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) 
    exit();
    
$globalSettings = array(
	'revision',
	'last_settings_update',
	'piwik_mode',
	'piwik_url',
	'piwik_path',
	'piwik_user',
	'piwik_token',
	'auto_site_config',
	'default_date',
	'stats_seo',
	'dashboard_widget',
	'dashboard_chart',
	'dashboard_seo',
	'toolbar',
	'capability_read_stats',
	'perpost_stats',
	'plugin_display_name',
	'piwik_shortcut',
	'shortcodes',
	'track_mode',
	'track_codeposition',
	'track_noscript',
	'track_nojavascript',
	'proxy_url',
	'track_search',
	'track_404',
	'add_post_annotations',
	'add_customvars_box',
	'add_download_extensions',
	'disable_cookies',
	'limit_cookies',
	'limit_cookies_visitor',
	'limit_cookies_session',
	'track_admin',
	'capability_stealth',
	'track_across',
	'track_across_alias',
	'track_feed',
	'track_feed_addcampaign',
	'track_feed_campaign',
	'cache',
	'disable_timelimit',
	'connection_timeout',
	'disable_ssl_verify',
	'piwik_useragent',
	'piwik_useragent_string',
	'track_datacfasync',
	'track_cdnurl',
	'track_cdnurlssl',
	'force_protocol'
);

$settings = array (
	'name',
	'site_id',
	'noscript_code',
	'tracking_code',
	'last_tracking_code_update',
	'dashboard_revision'
);

global $wpdb;

if (function_exists('is_multisite') && is_multisite()) {
	$aryBlogs = $wpdb->get_results('SELECT blog_id FROM '.$wpdb->blogs.' ORDER BY blog_id');
	if (is_array($aryBlogs))
		foreach ($aryBlogs as $aryBlog)
			foreach ($settings as $key)
				delete_blog_option($aryBlog->blog_id, 'wp-piwik-'.$key);
	foreach ($globalSettings as $key)
		delete_site_option($aryBlog->blog_id, 'wp-piwik_global-'.$key);
	delete_site_option('wp-piwik-manually');
}

foreach ($settings as $key)
	delete_option($aryBlog->blog_id, 'wp-piwik_global-'.$key);
	
foreach ($globalSettings as $key)
	delete_option($aryBlog->blog_id, 'wp-piwik-'.$key);

delete_option('wp-piwik-manually');
