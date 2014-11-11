<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * Panel control collection.
 * @package Framework
 */
class NoticeCollector extends Control {
	var $CssClass;			// The CSS Class to be applied to the containing div element (default is "Notices")
	var $Notices;			// A collection of customized strings to be echoed

	function NoticeCollector(&$Context) {
		$this->Name = 'NoticeCollector';
		$this->Control($Context);
		$this->Notices = array();
		$this->CssClass = "Notices";
	}

	function AddNotice($Notice, $Position = '0', $ForcePosition = '0') {
		$this->CallDelegate('AddNotice');
		$Position = ForceInt($Position, 0);
		$this->AddItemToCollection($this->Notices,
			$Notice,
			$Position,
			$ForcePosition);
	}

	function Render() {
		if (is_array($this->Notices)) ksort($this->Notices);
		$this->CallDelegate('PreRender');
		include(ThemeFilePath($this->Context->Configuration, 'notices.php'));
		$this->CallDelegate('PostRender');
	}
}
?>