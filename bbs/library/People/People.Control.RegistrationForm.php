<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


/**
 * The RegistrationForm control is used to define how registration roles are applied to new members.
 * @package People
 */
class RegistrationForm extends PostBackControl {
	var $RoleManager;
	var $RoleSelect;

	function RegistrationForm (&$Context) {
		$this->Name = 'RegistrationForm';
		$this->ValidActions = array('ProcessRegistrationChange', 'RegistrationChange');
		$this->Constructor($Context);
		if (!$this->Context->Session->User->Permission('PERMISSION_MANAGE_REGISTRATION')) {
			$this->IsPostBack = 0;
		} elseif ($this->IsPostBack) {
			$this->Context->PageTitle = $this->Context->GetDefinition('RegistrationManagement');
			$RoleID = ForceIncomingString('RoleID', '');
			if ($RoleID == '') $RoleID = $this->Context->Configuration['DEFAULT_ROLE'];
			$this->RoleManager = $this->Context->ObjectFactory->NewContextObject($this->Context, 'RoleManager');
			$this->RoleSelect = $this->Context->ObjectFactory->NewObject($this->Context, 'Select');
			$this->RoleSelect->Name = 'RoleID';
			// Add the applicant faux-role
			$this->RoleSelect->AddOption(0, $this->Context->GetDefinition('AdminCheckApplicant'));
			$this->RoleSelect->AddOption(-1, $this->Context->GetDefinition('EmailCheck'));
			// Add all other roles
			$this->RoleSelect->AddOptionsFromDataSet($this->Context->Database, $this->RoleManager->GetRoles(), 'RoleID', 'Name');
			$this->RoleSelect->SelectedValue = $RoleID;
			$this->RoleSelect->Attributes = ' id="ddRoleID"';

			$ApprovedRoleID = ForceIncomingInt('ApprovedRoleID', $this->Context->Configuration['APPROVAL_ROLE']);
			$this->ApprovedRoleSelect = $this->Context->ObjectFactory->NewObject($this->Context, 'Select');
			$this->ApprovedRoleSelect->Name = 'ApprovedRoleID';
			$this->ApprovedRoleSelect->AddOptionsFromDataSet($this->Context->Database, $this->RoleManager->GetRoles(), 'RoleID', 'Name');
			$this->ApprovedRoleSelect->SelectedValue = $ApprovedRoleID;
			$this->ApprovedRoleSelect->Attributes = ' id="ddApprovedRoleID"';

			if ($this->PostBackAction == 'ProcessRegistrationChange' && $this->IsValidFormPostBack()) {
				// Make the immediate access option default to '0' if the 'default' role
				// for new members is '0' (applicant)
				$AllowImmediateAccess = 0;
				if ($RoleID > 0) {
					$Role = $this->RoleManager->GetRoleById($RoleID);
					$AllowImmediateAccess = $Role->PERMISSION_SIGN_IN?'1':'0';
				}

				$ConstantsFile = $this->Context->Configuration['APPLICATION_PATH'].'conf/settings.php';
				$ConstantManager = $this->Context->ObjectFactory->NewContextObject($this->Context, 'ConfigurationManager');
				// Set the constants to their new values
				$ConstantManager->DefineSetting('DEFAULT_ROLE', $RoleID);
				$ConstantManager->DefineSetting('ALLOW_IMMEDIATE_ACCESS', $AllowImmediateAccess);
				$ConstantManager->DefineSetting('APPROVAL_ROLE', $ApprovedRoleID);

				$this->DelegateParameters['ConstantManager'] = &$ConstantManager;
				$this->CallDelegate('PreSaveSettings');

				// Save the settings file
				$ConstantManager->SaveSettingsToFile($ConstantsFile);

				if ($this->Context->WarningCollector->Iif()) $this->PostBackValidated = 1;
			}
		}
		$this->CallDelegate('Constructor');
	}

	function Render() {
		if ($this->IsPostBack) {
			$this->CallDelegate('PreRender');
			include(ThemeFilePath($this->Context->Configuration, 'settings_registration_form.php'));
			$this->CallDelegate('PostRender');
		}
	}
}
?>