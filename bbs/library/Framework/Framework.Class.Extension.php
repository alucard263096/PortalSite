<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * Object representation of an extension in the Framework.
 * @package Framework
 */
class Extension {
	var $Name;
	var $Url;
	var $Description;
	var $Version;
	var $Author;
	var $AuthorUrl;
	var $Key;
	var $FileName;
	var $Enabled;

	function Clear() {
		$this->Name = '';
		$this->Url = '';
		$this->Description = '';
		$this->Version = '';
		$this->Author = '';
		$this->AuthorUrl = '';
		$this->FileName = '';
		$this->Enabled = 0;
	}

	function Extension() {
		$this->Clear();
	}

	function IsValid() {
		$Valid = 1;
		if ($this->Name == '') $Valid = 0;
		if ($this->Url == '') $Valid = 0;
		if ($this->Description == '') $Valid = 0;
		if ($this->Version == '') $Valid = 0;
		if ($this->Author == '') $Valid = 0;
		if ($this->AuthorUrl == '') $Valid = 0;
		return $Valid;
	}
}
?>