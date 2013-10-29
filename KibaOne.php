<?php

/**
 * Kiba One skin
 * Based on Foreground skin - http://foreground.wikiwonders.net/
 *
 * @file
 * @ingroup Skins
 */

if ( ! defined( 'MEDIAWIKI' ) ) {
	die( -1 );
}

$wgExtensionCredits['skin'][] = [
    'path'			 => __FILE__,
    'name'			 => 'KibaOne',
    'url'			 => 'http://www.wolfplex.org/wiki/Kiba',
    'author'		 => 'Sébastien Santoro aka Dereckson',
    'descriptionmsg' => 'kibaone-desc',
];

$wgValidSkinNames['kibaone'] = 'KibaOne';

$dir = __DIR__ . '/kibaone';
$wgAutoloadClasses['SkinKibaOne'] = $dir . '/SkinKibaOne.php';
$wgAutoloadClasses['TemplateKibaOne'] = $dir . '/TemplateKibaOne.php';

$wgExtensionMessagesFiles['SkinKibaOne'] = $dir . '/KibaOne.i18n.php';

$wgResourceModules['skins.kibaone'] = [
	'styles'         => [
    	'kibaone/assets/stylesheets/normalize.css',
    	'kibaone/assets/stylesheets/foundation.css',
    	'kibaone/assets/stylesheets/kibaone.css',
        'kibaone/assets/stylesheets/kibaone-print.css',
    	'kibaone/assets/stylesheets/jquery.autocomplete.css',
    	'kibaone/assets/stylesheets/responsive-tables.css',
    ],
    'scripts'        => [
        'kibaone/assets/scripts/vendor/custom.modernizr.js',
        'kibaone/assets/scripts/vendor/fastclick.js',
        'kibaone/assets/scripts/vendor/responsive-tables.js',
        'kibaone/assets/scripts/foundation/foundation.js',
        'kibaone/assets/scripts/foundation/foundation.topbar.js',
        'kibaone/assets/scripts/foundation/foundation.dropdown.js',
        'kibaone/assets/scripts/foundation/foundation.section.js',
        'kibaone/assets/scripts/foundation/foundation.clearing.js',
        'kibaone/assets/scripts/foundation/foundation.cookie.js',
        'kibaone/assets/scripts/foundation/foundation.placeholder.js',
        'kibaone/assets/scripts/foundation/foundation.forms.js',
        'kibaone/assets/scripts/foundation/foundation.alerts.js',
    ],
    'remoteBasePath' => &$GLOBALS['wgStylePath'],
    'localBasePath'  => &$GLOBALS['wgStyleDirectory'],
];
