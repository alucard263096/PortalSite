<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


class CommentFoot extends Control {

	function CommentFoot(&$Context) {
		$this->Name = 'CommentFoot';
		$this->Control($Context);
		$this->CallDelegate('Constructor');
	}

	function Render() {
		$this->CallDelegate('PreRender');
		include(ThemeFilePath($this->Context->Configuration, 'comments_foot.php'));
		$this->CallDelegate('PostRender');
	}
}
?>