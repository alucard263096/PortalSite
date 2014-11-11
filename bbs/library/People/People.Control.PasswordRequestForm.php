<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * The PasswordRequestForm control is used to send password request emails
 * to users who have potentially lost their password.
 * @package People
 */
class PasswordRequestForm extends PostBackControl {
	var $FormName;				// The name of this form
	var $EmailSentTo;			// The email address to which the password reset request was sent

	// Form Properties
	var $Username;

	function PasswordRequestForm(&$Context, $FormName = '') {
		$this->Name = 'PasswordRequestForm';
		$this->ValidActions = array('PasswordRequestForm', 'RequestPasswordReset');
		$this->Constructor($Context);

		if ($this->IsPostBack) {
			$this->FormName = $FormName;
			$this->Username = ForceIncomingString('Username', '');
			// Set up the page
			global $Banner, $Foot;
			$Banner->Properties['CssClass'] = 'PasswordRequest';
			$Foot->CssClass = 'PasswordRequest';
			$this->Context->PageTitle = $this->Context->GetDefinition('SendRequest');

			$this->UserManager = $this->Context->ObjectFactory->NewContextObject($this->Context, 'UserManager');

			if ($this->PostBackAction == 'RequestPasswordReset') {
				$this->EmailSentTo = $this->UserManager->RequestPasswordReset($this->Username);
				$aEmailSentTo = explode('@', $this->EmailSentTo);
				if (count($aEmailSentTo) > 1) {
					$this->EmailSentTo = $aEmailSentTo[1];
				}
				if ($this->EmailSentTo) $this->PostBackValidated = 1;
			}
			$this->CallDelegate('LoadData');
		}
	}

	function Render_ValidPostBack() {
		$this->CallDelegate('PreValidPostBackRender');
		include(ThemeFilePath($this->Context->Configuration, 'people_password_request_form_validpostback.php'));
		$this->CallDelegate('PostValidPostBackRender');
	}

	function Render_NoPostBack() {
		$this->CallDelegate('PreNoPostBackRender');
		$this->PostBackParams->Add('PostBackAction', 'RequestPasswordReset');
		include(ThemeFilePath($this->Context->Configuration, 'people_password_request_form_nopostback.php'));
		$this->CallDelegate('PostNoPostBackRender');
	}
}
?>