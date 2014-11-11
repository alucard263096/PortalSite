<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * The ExtensionForm control is used to turn extensions on and off in Guagua.
 * @package Framework
 */
class ExtensionForm extends PostBackControl {

	var $Extensions;

	function SwitchExtension($ExtensionKey) {
		// Don't do anything unless this user has permission to do so...
		if (!$this->Context->Session->User->Permission("PERMISSION_MANAGE_EXTENSIONS")) {
			$this->Context->WarningCollector->Add($this->Context->GetDefinition("ErrPermissionInsufficient"));
		} else {
			$this->Extensions = DefineExtensions($this->Context);
			$Extension = false;

			// Grab that extension from the extension array
			if (array_key_exists($ExtensionKey, $this->Extensions)) {
				$Extension = $this->Extensions[$ExtensionKey];
				$this->DelegateParameters["ExtensionName"] = $ExtensionKey;
				if ($Extension->Enabled) {
					$this->CallDelegate("PreExtensionDisable");
				} else {
					$this->CallDelegate("PreExtensionEnable");
				}
			} else {
				$this->Context->WarningCollector->Add($this->Context->GetDefinition("ErrExtensionNotFound"));
			}
			if ($Extension) {
				// Open the extensions file for editing
				$ExtensionsFile = $this->Context->Configuration["APPLICATION_PATH"]."conf/extensions.php";
				$CurrentExtensions = @file($ExtensionsFile);
				if (!$CurrentExtensions) {
					$this->Context->WarningCollector->Add($this->Context->GetDefinition("ErrReadFileExtensions")." ".$this->Context->Configuration["APPLICATION_PATH"]."conf/extensions.php");
				} else {
					// Loop trough the lines to remove the extension include statement,
					// or add it att the end.
					$IncludeString = 'include($Configuration[\'EXTENSIONS_PATH\']."'.$Extension->FileName.'");';
					if ($Extension->Enabled) {
						for($i=0, $c=count($CurrentExtensions); $i < $c; $i++) {
							if (trim($CurrentExtensions[$i]) == $IncludeString) {
								// If the extension is currently in use, remove it
								array_splice($CurrentExtensions, $i, 1);
								break;
							}
						}
					} else {
						for($i=0, $c=count($CurrentExtensions); $i < $c; $i++) {
							if (trim($CurrentExtensions[$i]) == "?>") {
								array_splice($CurrentExtensions, $i);
								break;
							}
						}
						$CurrentExtensions[] = $IncludeString . "\r\n";
					}

					// Save the extensions file
					// Open for writing only.
					// Place the file pointer at the beginning of the file and truncate the file to zero length.
					$FileHandle = @fopen($ExtensionsFile, "wb");
					$FileContents = implode("", $CurrentExtensions);
					if (!$FileHandle) {
						$this->Context->WarningCollector->Add(str_replace("//1", $ExtensionsFile, $this->Context->GetDefinition("ErrOpenFile")));
					} else {
						if (!@fwrite($FileHandle, $FileContents)) $this->Context->WarningCollector->Add($this->Context->GetDefinition("ErrWriteFile"));
					}
					@fclose($FileHandle);
				}
			}
		}
		// If everything was successful, return true;
		if ($this->Context->WarningCollector->Iif()) {
			return true;
		} else {
			return false;
		}
	}

	function ExtensionForm(&$Context) {
		$this->Name = "ExtensionForm";
		$this->ValidActions = array("Extensions", "ProcessExtension");
		$this->Constructor($Context);
		if (!$this->Context->Session->User->Permission("PERMISSION_MANAGE_EXTENSIONS")) {
			$this->IsPostBack = 0;
		} elseif ($this->IsPostBack) {
			$this->Context->PageTitle = $this->Context->GetDefinition('ManageExtensions');
			$this->Extensions = DefineExtensions($this->Context);
		}
		$this->CallDelegate("Constructor");
	}

	function Render() {
		if ($this->IsPostBack) {
			$this->CallDelegate("PreRender");
			include(ThemeFilePath($this->Context->Configuration, 'settings_extensions.php'));
			$this->CallDelegate("PostRender");
		}
	}
}
?>