<?php
/*
Plugin Name: Sterner Stuff Builder
Plugin URI: https://sternerstuffdesign.com
Description: An Advanced Custom Fields- and Bootstrap-based layout builder for WordPress
Version: 1.0.0-beta.3
Author: Sterner Stuff Design
Author URI: https://sternerstuffdesign.com
*/

class SternerStuffBuilder {
	private static $self = false;

	function __construct() {
		/* Autoloader */
    //See https://github.com/afragen/autoloader/blob/master/plugin.php
    //Plugin namespace root
    $root = [
      'SternerStuffBuilder' => __DIR__.'/SternerStuffBuilder'
    ];
    $extra_classes = [];
    //Load autoloader
    require_once(__DIR__.'/SternerStuffBuilder/Autoloader.php');
    $loader = 'SternerStuffBuilder\\Autoloader';
    new $loader($root, $extra_classes);

		// Builder
		new SternerStuffBuilder\Builder;
	}

	//Keep this method at the bottom of the class
	public static function getInstance() {
		if(!self::$self) {
			self::$self = new self();
		}
		return self::$self;
	}
}

SternerStuffBuilder::getInstance();
