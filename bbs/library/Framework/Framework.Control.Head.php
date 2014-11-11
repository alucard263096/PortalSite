<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * Writes out the page head.
 * @package Framework
 */
class Head extends Control {
	var $Scripts;			// Script collection
	var $StyleSheets;		// Stylesheet collection
	var $Strings;			// String collection
	var $BodyId;			// identifier assigned to the body tag
	var $Meta;				// An associative array of meta tags/content to be added to the head.

	function AddScript($ScriptLocation, $ScriptRoot = '~') {
		if (!is_array($this->Scripts)) $this->Scripts = array();
		if ($ScriptRoot == '~') $ScriptRoot = $this->Context->Configuration['WEB_ROOT'];
		$ScriptPath = $ScriptLocation;
		if ($ScriptRoot != '') $ScriptPath = ConcatenatePath($ScriptRoot, $ScriptLocation);
		if (!in_array($ScriptPath, $this->Scripts)) $this->Scripts[] = $ScriptPath;
	}

	function AddStyleSheet($StyleSheetLocation, $Media = '', $Position = '100', $StyleRoot = '~') {
		if ($StyleRoot == '~') $StyleRoot = $this->Context->Configuration['WEB_ROOT'];
		if (!is_array($this->StyleSheets)) $this->StyleSheets = array();
		$StylePath = $StyleSheetLocation;
		if ($StyleRoot != '') $StylePath = ConcatenatePath($StyleRoot, $StyleSheetLocation);
		$this->InsertItemAt($this->StyleSheets,
			array('Sheet' => $StylePath, 'Media' => $Media),
			$Position);
	}

	function AddString($String) {
		if (!is_array($this->Strings)) $this->Strings = array();
		$this->Strings[] = $String;
	}

	function Clear() {
		$this->ClearStrings();
		$this->ClearStyleSheets();
		$this->ClearScripts();
	}

	function ClearStrings() {
		$this->Strings = array();
	}

	function ClearStyleSheets() {
		$this->StyleSheets = array();
	}

	function ClearScripts() {
		$this->Scripts = array();
	}

	function Head(&$Context) {
		$this->Name = 'Head';
		$this->BodyId = '';
		$this->Control($Context);
		$this->Meta = array();
	}

	function Render() {
		// First sort the stylesheets by key
		if (is_array($this->StyleSheets)) ksort($this->StyleSheets);
		$this->CallDelegate('PreRender');
		include(ThemeFilePath($this->Context->Configuration, 'head.php'));
		$this->CallDelegate('PostRender');
	}
}
?>
