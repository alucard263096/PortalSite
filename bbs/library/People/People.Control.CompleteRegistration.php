<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


/**
 * The CompleteRegistration control is used by people who have successfully recieved
 * Registration check emails to complete their Registration.
 * @package People
 */
class CompleteRegistration extends PostBackControl {
	var $FormName;						// The name of this form
	var $ValidatedCredentials;		// Are the user's Registration retrieval credentials valid

	// Form properties
	var $UserID;
	var $EmailVerificationKey;


	function CompleteRegistration(&$Context, $FormName = '') {
		$this->Name = 'CompleteRegistration';
		$this->ValidActions = array('CompleteRegistration');
		$this->Constructor($Context);

		if ($this->IsPostBack) {
			$this->FormName = $FormName;
			$this->ValidatedCredentials = 0;

			// Set up the page
			global $Banner, $Foot;
			$Banner->Properties['CssClass'] = 'PasswordReset';
			$Foot->CssClass = 'PasswordReset';
			$this->Context->PageTitle = $this->Context->GetDefinition('EmailCheck');

			// Form properties
			$this->UserID = ForceIncomingInt('u', 0);
			$this->EmailVerificationKey = ForceIncomingString('k', '');
			$this->CallDelegate('Constructor');

			$um = $this->Context->ObjectFactory->NewContextObject($this->Context, 'UserManager');
			$this->ValidatedCredentials = $um->VerifyPasswordResetRequest($this->UserID, $this->EmailVerificationKey);

			if ($this->ValidatedCredentials) {
				$s = $this->Context->ObjectFactory->NewContextObject($this->Context, 'SqlBuilder');
				$s->SetMainTable('User', 'u');
				$s->AddFieldNameValue('RoleID', $this->Context->Configuration['APPROVAL_ROLE']);
				$s->AddFieldNameValue('EmailVerificationKey', '');
				$s->AddWhere('u', 'UserID', '', $this->UserID, '=');
				$this->Context->Database->Update($s, $this->Name, 'CompleteRegistration', 'An error occurred while assigning the user to a role.');
				$this->Context->Authenticator->AssignSessionUserID($this->UserID);
			}
			$this->CallDelegate('LoadData');
		}
	}

	function Render_ValidPostBack() {

	}

	function Render_NoPostBack() {
		$this->CallDelegate('PreNoPostBackRender');

		if ($this->ValidatedCredentials) {
			include(ThemeFilePath($this->Context->Configuration, 'people_email_check_nopostback.php'));
		} else {
			$this->Render_Warnings();
		}
		$this->CallDelegate('PostNoPostBackRender');
	}
}
?>