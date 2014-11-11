<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * Ends the page body.
 * @package Framework
 */
class PageEnd extends Control {
	function PageEnd(&$Context) {
		$this->Name = 'PageEnd';
		$this->Control($Context);
	}
	function Render() {
		$this->CallDelegate('PreRender');
		include(ThemeFilePath($this->Context->Configuration, 'page_end.php'));
		$this->CallDelegate('PostRender');
	}
}
?>