<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * Object representation of an error.
 * @package Framework
 */
class Error {
	var $AffectedElement;	// The element (class) that has encountered the error
	var $AffectedFunction;	// The function or method that has encountered the error
	var $Message;				// Actual error message
	var $Code;					// Any related code to help identify the error
}

/**
 * Manage major errors resulting in page not functioning properly.
 * @package Framework
 */
class ErrorManager {
	// Public Variables
	var $StyleSheet;		// A custom stylesheet may be supplied for the error display

	// Public, Read Only Variables
	var $ErrorCount;		// Number of errors encountered

	// Private Variables
	var $Errors;			// Collection of error objects

	function AddError(&$Context, $AffectedElement, $AffectedFunction, $Message, $Code = "", $WriteAndKill = 1) {
		if ($Context) {
			$Error = $Context->ObjectFactory->NewObject($Context, "Error");
		} else {
			$Error = new Error();
		}
		$Error->AffectedElement = $AffectedElement;
		$Error->AffectedFunction = $AffectedFunction;
		$Error->Message = $Message;
		$Error->Code = $Code;
		$this->Errors[] = $Error;
		$this->ErrorCount += 1;
		if ($WriteAndKill == 1) $this->Write($Context);
	}

	function Clear() {
		$this->ErrorCount = 0;
		$this->Errors = array();
	}

	function ErrorManager() {
		$this->Clear();
	}

	function Iif($True = "1", $False = "0") {
		if ($this->ErrorCount == 0) {
			return $True;
		} else {
			return $False;
		}
	}

	function Write(&$Context) {

		@include(ThemeFilePath($Context->Configuration, 'fatal_error.php'));
		// Cleanup
		if ($Context) $Context->Unload();
		die();
	}
	function GetSimple() {
		$sReturn = "";
		$ErrorCount = count($this->Errors);
		for ($i = 0; $i < $ErrorCount; $i++) {
			$sReturn .= ForceString($this->Errors[$i]->Message, "No error message supplied\r\n");
		}
		return $sReturn;
	}
}
?>