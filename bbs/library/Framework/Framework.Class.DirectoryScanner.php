<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


/**
 * Directory scanner.
 *
 * Beta version! the protocol may change.
 *
 * @package Framework
 */
class DirectoryScanner {

	var $Reporter;
	var $BlackList = array('.', '..', '.svn');

	function DirectoryScanner(&$Reporter) {
		$this->Reporter =& $Reporter;
	}

	function Scan($DirPath) {
		$Handler = opendir($DirPath);
		$File = false;
		$FilePath = '';

		if ($Handler !== false) {
			while(($File = readdir($Handler)) !== false) {
				 if (!in_array($File, $this->BlackList)) {
				 	$FilePath = $DirPath . '/' . $File;
				 	if (is_dir($FilePath)) {
				 		$this->Scan($FilePath);
				 	} else {
				 		$this->Reporter->Add($FilePath);
				 	}
				 }
			}
			closedir($Handler);
			return true;
		} else {
			// @todo: add error message;
			return false;
		}
	}
}

/**
 * Generic Reporter for the directory scanner
 *
 * Beta version! the protocol may change.
 *
 * @package Framework
 */
class Reporter {

	var $Reader;

	function Reporter($Reader) {
		if (!$Reader) {
			$Reader = new FileReader();
		}
		$this->Reader= clone($Reader);
	}

	function Add($FilePath) {
		echo $FilePath . ":\n" . $this->GetFile($FilePath) . "\n-----------\n";
	}

	function GetFile($FilePath) {
		return $this->Reader->Read($FilePath);
	}
}

/**
 * Generic File Reader for the directory scanner
 *
 * Beta version! the protocol may change.
 *
 * @package Framework
 */
Class FileReader {
	function Read($FilePath) {
		$Handle = @fopen($FilePath, "r");
		if($Handle !== false) {
			$Content = @fread($Handle, filesize($FilePath));
			fclose($Handle);
			return $Content;
		} else {
			return false;
		}
	}
}
