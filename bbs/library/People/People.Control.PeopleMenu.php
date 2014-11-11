<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


/**
 * Body frame for pages outside the forum (sign in, apply, forgotten password, etc)
 * @package People
 */
class PeopleMenu extends Control {
	var $CssClass;

	function PeopleMenu (&$Context) {
		$this->Name = 'PeopleBody';
		$this->Control($Context);
	}

	function Render() {
		if ($this->CssClass != '') $this->CssClass = ' '.$this->CssClass;
		$this->CallDelegate('PreRender');
		include(ThemeFilePath($this->Context->Configuration, 'people_menu.php'));
		$this->CallDelegate('PostRender');
	}
}
?>