<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * Default help text when the page is loaded.
 * @package Guagua
 */
class SettingsHelp extends Control {

	function SettingsHelp(&$Context) {
		$this->Name = 'SettingsHelp';
		$this->Control($Context);
		$this->CallDelegate('Constructor');
	}

	function Render() {
		if ($this->PostBackAction == '') {
			$this->CallDelegate('PreRender');
			include(ThemeFilePath($this->Context->Configuration, 'settings_help.php'));
			$this->CallDelegate('PostRender');
		}
	}
}
?>