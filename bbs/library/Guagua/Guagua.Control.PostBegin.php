<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * The PostBegin control renders the post page title to the screen.
 * @package Guagua
 */
class PostBegin extends Control {
	var $Title;

	function Post(&$Context) {
		$this->Name = 'Post';
		$this->Constructor($Context);
	}

	function Render() {
		$this->CallDelegate('PreRender');
		include(ThemeFilePath($this->Context->Configuration, 'post_begin.php'));
		$this->CallDelegate('PostRender');
	}
}
?>