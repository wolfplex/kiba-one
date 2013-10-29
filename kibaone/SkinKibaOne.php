<?php
/**
 * Skin file for skin Kiba One
 *
 * @file
 * @ingroup Skins
 */

class SkinKibaOne extends SkinTemplate {
	public $skinname = 'kibaone', $stylename = 'kibaone', $template = 'TemplateKibaOne', $useHeadElement = true;

	public function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
		$out->addHeadItem( 'ie-meta', '<meta http-equiv="X-UA-Compatible" content="IE=edge" />' );
		$out->addModuleStyles( 'skins.kibaone' );
	}

	public function initPage( OutputPage $out ) {
		global $wgLocalStylePath;
		parent::initPage( $out );

		$viewport_meta = 'width=device-width, user-scalable=yes, initial-scale=1.0';
		$out->addMeta( 'viewport', $viewport_meta );
		$out->addModuleScripts( 'skins.kibaone' );
	}

}
