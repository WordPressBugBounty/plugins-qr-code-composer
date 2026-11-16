<?php

/**
 * Fired when the plugin is uninstalled.
 *

 *
 * @link       https://sharabindu.com
 * @since      4.0.0
 *
 * @package    Qrc_composer
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Remembered default picks for the free limit.
delete_option( 'qrc_free_default_ids' );
