<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


/**
 * Writes the People page footer
 * @package People
 */
class PeopleFoot extends Control {
	var $CssClass;

	function PeopleFoot(&$Context, $CssClass = '') {
		$this->Name = 'ExternalFoot';
		$this->Control($Context);
		$this->CssClass = $CssClass;
	}

	function Render() {
		if ($this->CssClass != '') $this->CssClass = ' '.$this->CssClass;
		$this->CallDelegate('PreRender');
		include(ThemeFilePath($this->Context->Configuration, 'people_foot.php'));
		$this->CallDelegate('PostRender');
	}
}
?>