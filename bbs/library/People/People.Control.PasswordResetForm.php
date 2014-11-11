<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


/**
 * The PasswordResetForm control is used by people who have successfully retrieve
 * password reset request emails to reset their password.
 * @package People
 */
class PasswordResetForm extends PostBackControl {
	var $FormName;						// The name of this form
	var $ValidatedCredentials;		// Are the user's password retrieval credentials valid

	// Form properties
	var $UserID;
	var $EmailVerificationKey;
	var $NewPassword;
	var $ConfirmPassword;

	function FormatPropertiesForDisplay() {
		$this->UserID = ForceInt($this->UserID, 0);
		$this->EmailVerificationKey = ForceString($this->EmailVerificationKey, '');
		$this->CallDelegate('FormatPropertiesForDisplay');
	}

	function PasswordResetForm(&$Context, $FormName = '') {
		$this->Name = 'PasswordResetForm';
		$this->ValidActions = array('PasswordResetForm', 'ResetPassword');
		$this->Constructor($Context);

		if ($this->IsPostBack) {
			$this->FormName = $FormName;
			$this->ValidatedCredentials = 0;

			// Set up the page
			global $Banner, $Foot;
			$Banner->Properties['CssClass'] = 'PasswordReset';
			$Foot->CssClass = 'PasswordReset';
			$this->Context->PageTitle = $this->Context->GetDefinition('ResetYourPassword');

			// Form properties
			$this->UserID = ForceIncomingInt('u', 0);
			$this->EmailVerificationKey = ForceIncomingString('k', '');
			$this->NewPassword = ForceIncomingString('NewPassword', '');
			$this->ConfirmPassword = ForceIncomingString('ConfirmPassword', '');
			$this->CallDelegate('Constructor');

			$um = $this->Context->ObjectFactory->NewContextObject($this->Context, 'UserManager');
			if ($this->IsPostBack && $this->PostBackAction == 'ResetPassword') {
				$this->ValidatedCredentials = 1;
			} else {
				$this->ValidatedCredentials = $um->VerifyPasswordResetRequest($this->UserID, $this->EmailVerificationKey);
			}

			if ($this->ValidatedCredentials && $this->PostBackAction == 'ResetPassword') {
				$this->PostBackValidated = $um->ResetPassword($this->UserID, $this->EmailVerificationKey, $this->NewPassword, $this->ConfirmPassword);
			}
			$this->CallDelegate('LoadData');
		}
	}

	function Render_ValidPostBack() {
		$this->CallDelegate('PreValidPostBackRender');
		include(ThemeFilePath($this->Context->Configuration, 'people_password_reset_form_validpostback.php'));
		$this->CallDelegate('PostValidPostBackRender');
	}

	function Render_NoPostBack() {
		$this->CallDelegate('PreNoPostBackRender');

		$this->FormatPropertiesForDisplay();
		$this->PostBackParams->Add('PostBackAction', 'ResetPassword');
		$this->PostBackParams->Add('u', $this->UserID);
		$this->PostBackParams->Add('k', $this->EmailVerificationKey);

		if ($this->ValidatedCredentials) {
			include(ThemeFilePath($this->Context->Configuration, 'people_password_reset_form_nopostback.php'));
		} else {
			$this->Render_Warnings();
		}
		$this->CallDelegate('PostNoPostBackRender');
	}
}
?>