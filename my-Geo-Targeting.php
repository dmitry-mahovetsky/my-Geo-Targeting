<?php
/*
 * Plugin Name: my-Geo-Targeting
 * Author:      Dmitry
 * Version:     Plugin version 1.0
 *
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 */

define('PLUG_DIR', plugin_dir_path( __FILE__ ));

add_action( 'wp_enqueue_scripts', 'geo_targeting_scripts' );
function geo_targeting_scripts() {
    wp_enqueue_style( 'geo-targeting', plugins_url( '/resource/css/geo-targeting.css', __FILE__ ) );
    wp_enqueue_style( 'flag-geo-targeting', plugins_url( '/resource/css/flag-icon.css', __FILE__ ) );
}

include PLUG_DIR . 'class/ParserCountry.php';
include PLUG_DIR . 'class/GeoTargeting.php';
include PLUG_DIR . 'class/MainGeoTargeting.php';

$parserCountry = new ParserCountry(PLUG_DIR . 'resource/Country.xml');

$geoTargeting = new GeoTargeting($parserCountry);

$MainGeoTargeting = new MainGeoTargeting();


$geoTargeting->setCountry($MainGeoTargeting->country());

$MainGeoTargeting->setCountry($geoTargeting->getCountry());


add_shortcode( 'Country', array( 'MainGeoTargeting', 'shortcodeCountry' ) );
