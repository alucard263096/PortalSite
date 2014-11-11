<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


/**
 * The PasswordForm control allows users to change their password in Guagua.
 * @package Guagua
 */
class PasswordForm extends PostBackControl {
	var $UserManager;
	var $User;

	function PasswordForm (&$Context, &$UserManager, $UserID) {
		$this->Name = 'PasswordForm';
		if ($Context->Configuration['ALLOW_PASSWORD_CHANGE']) $this->ValidActions = array('ProcessPassword', 'Password');
		$this->Constructor($Context);
		if ($this->IsPostBack) {
			$this->UserManager = &$UserManager;
			$this->User = $this->Context->ObjectFactory->NewContextObject($Context, 'User');
			$this->User->GetPropertiesFromForm();
			$this->User->UserID = $UserID;
			if ($this->PostBackAction == 'ProcessPassword' && $this->IsValidFormPostBack()) {
				if ($this->UserManager->ChangePassword($this->User)) {
					$this->CallDelegate('PostPasswordChange');
					$Url = GetUrl($this->Context->Configuration, $this->Context->SelfUrl, '', '','','','Success=1');
					Redirect($Url, '302', '', 0);
				}
			}
		}
		$this->CallDelegate('Constructor');
	}

	function Render() {
		if ($this->IsPostBack) {
			$this->CallDelegate('PreRender');
			include(ThemeFilePath($this->Context->Configuration, 'account_password_form.php'));
			$this->CallDelegate('PostRender');
		}
	}
}
?>