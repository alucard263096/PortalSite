<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * The Filler control can be used to dump any custom template in the page.
 * @package Framework
 */
class Filler extends PostBackControl {
	var $TemplateFile;
	var $Properties;

	function Filler(&$Context, $templateFile = '', $ValidActions = '') {
		$this->Name = 'Filler';
		$this->ValidActions = $ValidActions;
		$this->Constructor($Context);
		if ($ValidActions == '') $this->IsPostBack = 1;
		$this->Properties = array();
		if ($templateFile != '') $this->TemplateFile = $templateFile;
	}

	function Render() {
		if ($this->TemplateFile != '' && $this->IsPostBack) {
			$Template = ThemeFilePath($this->Context->Configuration, $this->TemplateFile);
			if (file_exists($Template)) {
				$this->CallDelegate('PreRender');
				include($Template);
				$this->CallDelegate('PostRender');
			}
		}
	}
}
?>