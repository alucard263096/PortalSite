<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * Displays a category list.
 * @package Guagua
 */
class CategoryList extends Control {
	var $Data;

	function CategoryList(&$Context) {
		$this->Name = 'CategoryList';
		$this->Control($Context);
		$CategoryManager = $this->Context->ObjectFactory->NewContextObject($this->Context, 'CategoryManager');
		$this->Data = $CategoryManager->GetCategories(1);
		$this->CallDelegate('Constructor');
	}

	function Render() {
		$this->CallDelegate('PreRender');
		include(ThemeFilePath($this->Context->Configuration, 'categories.php'));
		$this->CallDelegate('PostRender');
	}
}
?>