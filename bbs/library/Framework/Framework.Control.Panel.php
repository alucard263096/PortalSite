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
class Panel extends Control {
	var $CssClass;			// The CSS Class to be applied to the containing panel element
	var $BodyCssClass;	// The CSS Class to be applied to the adjacent body element
	var $Lists;				// A collection of list items to be placed in the panel
	var $Strings;			// A collection of customized strings to be placed in the panel
	var $PanelElements;	// A collection of elements to be placed in the panel (strings, lists, etc)
	var $Template;			// Allows a custom template to be used in the panel on different pages

	function Panel(&$Context, $Template = '') {
		$this->Name = 'Panel';
		$this->Control($Context);
		$this->Lists = array();
		$this->Strings = array();
		$this->PanelElements = array();
		$this->NewDiscussionText = '';
		$this->NewDiscussionAttributes = '';
		$this->Template = $Template != '' ? $Template : 'panel.php';
	}

	function AddList($ListName, $Position = '0', $ForcePosition = '0') {
		$this->CallDelegate('AddList');
		$Position = ForceInt($Position, 0);
		if (!array_key_exists($ListName, $this->Lists)) {
			$this->AddItemToCollection($this->PanelElements,
				array('Type' => 'List', 'Key' => $ListName),
				$Position,
				$ForcePosition);
			$this->Lists[$ListName] = array();
		}
	}

	// ListName is the name of the list you want to add this item to (if the list does not exist, it will be created)
	function AddListItem($ListName, $Item, $Link, $Suffix = '', $LinkAttributes = '', $Position = '0', $ForcePosition = '0') {
		$this->CallDelegate('AddListItem');
		$this->AddList($ListName);
		$Position = is_numeric($Position) ? $Position : -1;
		$ListItem = array('Item' => $Item, 'Link' => $Link, 'Suffix' => $Suffix, 'LinkAttributes' => $LinkAttributes);
		$this->AddItemToCollection($this->Lists[$ListName], $ListItem, $Position, $ForcePosition);
	}

	function AddString($String, $Position = '0', $ForcePosition = '0') {
		$this->CallDelegate('AddString');
		$Position = ForceInt($Position, 0);
		$StringKey = count($this->Strings);
		$this->Strings[] = $String;
		$this->AddItemToCollection($this->PanelElements,
			array('Type' => 'String', 'Key' => $StringKey),
			$Position,
			$ForcePosition);
	}

	function Render() {
		if (is_array($this->PanelElements)) ksort($this->PanelElements);
		if ($this->CssClass != '') $this->CssClass = ' '.$this->CssClass;
		$this->CallDelegate('PreRender');
		include(ThemeFilePath($this->Context->Configuration, $this->Template));
		$this->CallDelegate('PostRender');
	}
}
?>