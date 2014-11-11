<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * Object representation of a file.
 * @package Framework
 */
class File {
	var $Name;
	var $Extension;
	var $Path;					// Directory path to the file
	var $Body;
	var $Size;
}


/**
 * Handles retrieving and saving files to the filesystem.
 * @package Framework
 */
class FileManager {
	var $ErrorManager;
	var $Name;

	function FileExtension($File) {
		if (strstr($File->Name, '.')) {
			return substr(strrchr($File->Name, '.'), 1, strlen($File->Name));
		} else {
			return "";
		}
	}

	function FileManager() {
		$this->Name = "FileManager";
	}

	function FilePath($File) {
		if (substr($File->Path, strlen($File->Path) - 1, strlen($File->Path)) != "/") $File->Path .= "/";
		return $File->Path.$File->Name;
	}

	function Get($File) {
		// Ensure required properties are set
		$FauxContext = 0;
		if ($File->Name == "") $this->ErrorManager->AddError($FauxContext, $this->Name, "Get", "You must supply a file name.", "", 0);
		if ($File->Path == "") $this->ErrorManager->AddError($FauxContext, $this->Name, "Get", "You must supply a file path.", "", 0);
		if ($this->ErrorManager->ErrorCount == 0) {
			$File->Extension = $this->FileExtension($File);
			$FilePath = $this->FilePath($File);
			$FileHandle = @fopen($FilePath, "r");
			if (!$FileHandle) {
				$this->ErrorManager->AddError($FauxContext, $this->Name, "Get", "The file could not be opened.", $FilePath, 0);
			} else {
				$File->Size = filesize($FilePath);
				$File->Body = @fread($FileHandle, $File->Size);
				if (!$File->Body) $this->ErrorManager->AddError($FauxContext, $this->Name, "Get", "The file could not be read.", "", 0);
				@fclose($FileHandle);
			}
		}
		return $this->ErrorManager->Iif($File, false);
	}
}
?>