<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * Handle a user sign in.
 * @package Guagua
 */
class SignInManager {
	var $Context;				// The context object that contains all global objects (database, error manager, warning collector, session, etc)
	var $Username;
	var $Password;

	function FormatPropertiesForDatabaseInput() {
		$this->Username = FormatStringForDatabaseInput($this->Username, 1);
		$this->Password = FormatStringForDatabaseInput($this->Password, 1);
	}

	function FormatPropertiesForDisplay() {
		$this->Username = FormatStringForDisplay($this->Username, 1);
		$this->Password = '';
	}

	function GetPropertiesFromForm($FormElementPrefix = '') {
		$this->Username = ForceIncomingString($FormElementPrefix.'Username', '');
		$this->Password = ForceIncomingString($FormElementPrefix.'Password', '');
	}

	function SignInManager(&$Context) {
		$this->Context = &$Context;
	}

	function ValidateCredentials() {
		// Check for an already active session
		if ($this->Context->Session->UserID != 0) {
			return true;
		} else {
			$this->FormatPropertiesForDatabaseInput();

			// Attempt to create a new session for the user
			$UserManager = $this->Context->ObjectFactory->NewContextObject($this->Context, 'UserManager');
			return $UserManager->ValidateUserCredentials($this->Username, $this->Password);
		}
	}
}
?>