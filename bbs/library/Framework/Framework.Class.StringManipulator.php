<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * An interface for string manipulation classes
 * @package Framework
 */
class StringFormatter {
	// You can optionally pass this formatter a collection of other formatters and it will sequentially call the parse method on all of them.
	var $ChildFormatters;

	function AddChildFormatter($Formatter) {
		$this->ChildFormatters[] = $Formatter;
	}

	function Constructor() {
		$this->ChildFormatters = array();
	}

	/**
	 * Parse a string; mainly used for output filter.
	 * @param string $String The string to parse.
	 * @param mixed $Object Object is an object related to the string in some way
	 * (in case you want to pass in some kind of object to perform other manipulations,
	 * like the comment object to retrieve author information).
	 * @param string $FormatPurpose indicating what the purpose of formatting
	 * the string is; ie, are you formatting for database input or screen display?
	 * @return string
	 */
	function Parse($String, $Object, $FormatPurpose) {
		$String = $this->ParseChildren($String, $Object, $FormatPurpose);
		return $String;
	}

	function ParseChildren($String, $Object, $FormatPurpose) {
		$ChildFormatterCount = count($this->ChildFormatters);
		$i = 0;
		for ($i = 0; $i < $ChildFormatterCount; $i++) {
			$Formatter = $this->ChildFormatters[$i];
			$String = $Formatter->Parse($String, $Object, $FormatPurpose);
		}
		return $String;
	}
}


/**
 * An implementation of the string filter interface for plain text strings
 * @package Framework
 */
class TextFormatter extends StringFormatter {
	function Parse ($String, $Object, $FormatPurpose) {
		$sReturn = $String;
		// Only format plain text strings if they are being displayed (save in database as is)
		if ($FormatPurpose == FORMAT_STRING_FOR_DISPLAY) {
			$sReturn = htmlspecialchars($sReturn);
			$sReturn = str_replace("\r\n", '<br />', $sReturn);
		} else {
			// You'd think I should be formatting the string for safe database
			// input here, but I don't want to leave that in the hands of plugin
			// authors. So, I perform that in the validation call on the comment
			// object when it is being saved (CommentManager->SaveComment)
		}
		$sReturn = $this->ParseChildren($sReturn, $Object, $FormatPurpose);
		return $sReturn;
	}
}

/**
 * A class for managing string manipulator classes (globally)
 * @package Framework
 */
class StringManipulator {
	var $Formatters; // An associative array of string formatters
	var $GlobalFormatters; // An associative array of global string formatters (these are applied to all comments without users selecting them)
	var $Configuration;  // The configuration properties of the application

	// Constructor
	function StringManipulator(&$Configuration) {
		$this->Formatters = array();
		$this->GlobalFormatters = array();
		$this->Configuration = &$Configuration;
	}

	function AddGlobalManipulator($ObjectName, $Object) {
		$this->GlobalFormatters[$ObjectName] = $Object;
	}

	function AddManipulator($ObjectName, $Object) {
		$this->Configuration['FORMAT_TYPES'][] = $ObjectName;
		$this->Formatters[$ObjectName] = $Object;
	}

	function Parse($String, $Object, $Format, $FormatPurpose) {
		if (array_key_exists($Format, $this->Formatters)) {
			$Formatter = $this->Formatters[$Format];
		} else {
			// If the requested formatter wasn't found, use the default
			$Formatter = $this->Formatters[$this->Configuration['DEFAULT_FORMAT_TYPE']];
		}
		return $Formatter->Parse($String, $Object, $FormatPurpose);
	}

	function GlobalParse($String, $Object, $FormatPurpose) {
		$sReturn = $String;
		while (list($Name, $Formatter) = each($this->GlobalFormatters)) {
			$sReturn = $Formatter->Parse($sReturn, $Object, $FormatPurpose);
		}
		reset($this->GlobalFormatters);
		return $sReturn;
	}
}

?>