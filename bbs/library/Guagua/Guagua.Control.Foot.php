<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * Writes the page footer.
 * @package Guagua
 */
class Foot extends Control {
	var $CssClass;
	var $Links;

	function AddLink($Url, $Text, $Target, $Position, $ForcePosition = '0') {
		$this->AddItemToCollection($this->Links,
			array('Url' => $Url, 'Text' => $Text, 'Target' => $Target),
			$Position,
			$ForcePosition);
	}

	function Foot(&$Context, $CssClass = '') {
		$this->Name = 'Foot';
		$this->Control($Context);
		if ($CssClass != '') $this->CssClass = ' '.$CssClass;
		$this->Links = array();
		// Add the default links
		$this->AddLink('javascript:PopTermsOfService();',
			$this->Context->GetDefinition('TermsOfService'),
			'',
			100);

		$this->AddLink('http://www.weentech.com/bbs/',
			$this->Context->GetDefinition('Documentation'),
			'_blank',
			200);

		$this->CallDelegate('PostConstructor');
	}

	function Render() {
		$this->CallDelegate('PreRender');
		include(ThemeFilePath($this->Context->Configuration, 'foot.php'));
		$this->CallDelegate('PostRender');
	}
}
?>