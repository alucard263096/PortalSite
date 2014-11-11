<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * The Menu control handles building the main menu.
 * @package Guagua
 */
class Menu extends Control {
	var $Tabs;				// Tab collection
	var $CurrentTab;		// The current tab

	function AddTab($Text, $Value, $Url, $Attributes = '', $Position = '0', $ForcePosition = '0') {
		$this->AddItemToCollection($this->Tabs, array('Text' => $Text, 'Value' => $Value, 'Url' => $Url, 'Attributes' => $Attributes), $Position, $ForcePosition);
	}

	function ClearTabs() {
		$this->Tabs = array();
	}

	function Menu(&$Context) {
		$this->Name = 'Menu';
		$this->Control($Context);
		$this->ClearTabs();
	}

	function RemoveTab($TabUrl) {
		reset($this->Tabs);
		while (list($Key, $Tab) = each($this->Tabs)) {
			if ($Tab['Url'] == $TabUrl) unset ($this->Tabs[$Key]);
		}
	}

	function Render() {
		// First sort the tabs by key
		ksort($this->Tabs);
		// Now write the Menu
		$this->CallDelegate('PreRender');
		include(ThemeFilePath($this->Context->Configuration, 'menu.php'));
		$this->CallDelegate('PostRender');
	}

	function TabClass($CurrentTab, $ComparisonTab, $CssClass = '') {
		if ($CssClass == '') $CssClass = 'TabOn';
		return ($CurrentTab == $ComparisonTab) ? ' class="'.$CssClass.'"' : '';
	}
}
?>