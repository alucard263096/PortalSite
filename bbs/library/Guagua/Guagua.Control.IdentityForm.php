<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


/**
 * A postback control that allows a user/admin to change user account info.
 * @package Guagua
 */
class IdentityForm extends PostBackControl {
	/**
	 * @var UserManager
	 */
	var $UserManager;
	/**
	 * @var User
	 */
	var $User;

	function IdentityForm (&$Context, &$UserManager, &$User) {
		$this->Name = 'IdentityForm';
		$this->ValidActions = array('ProcessIdentity', 'Identity');
		$this->Constructor($Context);
		if ($this->IsPostBack) {
			$this->UserManager = &$UserManager;
			$this->User = clone ($User);
			if ($this->PostBackAction == 'ProcessIdentity' && $this->IsValidFormPostBack()) {
				$this->User->Clear();
				$this->User->GetPropertiesFromForm();
				$this->User->Preferences = $User->Preferences;
				$this->CallDelegate('PreSaveIdentity');
				if ($this->UserManager->SaveIdentity($this->User) && $this->UserManager->SaveUserCustomizationsFromForm($this->User)) {
					$Url = GetUrl(
						$this->Context->Configuration, $this->Context->SelfUrl, '',
						'u', ($this->Context->Session->UserID == 0 ? '' : $this->User->UserID),
						'', 'Success=1');
					//@todo: should the process die here
					Redirect($Url, '302', '', 0);
				}
			}
		}
		$this->CallDelegate('Constructor');
	}

	function Render() {
		if ($this->IsPostBack) {
			$this->User->FormatPropertiesForDisplay();
			$this->CallDelegate('PreRender');
			include(ThemeFilePath($this->Context->Configuration, 'account_identity_form.php'));
			$this->CallDelegate('PostRender');
		}
	}
}
?>