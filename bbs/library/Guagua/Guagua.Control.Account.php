<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * Displays a user's account information.
 * @package Guagua
 */
class Account extends Control {
	var $User;	// The user object to be displayed
	var $FatalError; // Boolean value indicating if there were any fatal errors before any delegates were reached (ie, a fatal error in the core code).

	function Account(&$Context, &$User) {
		$this->FatalError = 0;
		$this->Name = 'Account';
		$this->PostBackAction = ForceIncomingString('PostBackAction', '');
		$this->Control($Context);
		$this->User = &$User;
		if ($this->Context->WarningCollector->Count() > 0) $this->FatalError = 1;
		$this->CallDelegate('Constructor');
	}

	function Render() {
		$this->CallDelegate('PreRender');
		// Don't render anything but warnings if there are any warnings or if there is a postback
		if ($this->PostBackAction == '') {
			if ($this->FatalError) {
				echo($this->Get_Warnings());
			} else {
				$this->User->FormatPropertiesForDisplay();
				include(ThemeFilePath($this->Context->Configuration, 'account_profile.php'));
			}
		}
		$this->CallDelegate('PostRender');
	}
}
?>