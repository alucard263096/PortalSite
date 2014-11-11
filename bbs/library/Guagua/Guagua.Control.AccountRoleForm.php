<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * The AccountRoleForm control allows administrators to alter a user's role in Guagua.
 * @package Guagua
 */
class AccountRoleForm extends PostBackControl {
	var $User;
	var $RoleSelect;

	function AccountRoleForm (&$Context, &$UserManager, $User) {
		$this->Name = 'AccountRoleForm';
		$this->ValidActions = array('ApproveUser', 'DeclineUser', 'Role', 'ProcessRole');
		$this->Constructor($Context);
		if ($this->IsPostBack) {
			$this->User = &$User;
			$Redirect = 0;
			if ($this->PostBackAction == 'ProcessRole' && $this->IsValidFormPostBack() && $this->Context->Session->UserID != $User->UserID && $this->Context->Session->User->Permission('PERMISSION_CHANGE_USER_ROLE')) {
				$urh = $this->Context->ObjectFactory->NewObject($this->Context, 'UserRoleHistory');
				$urh->GetPropertiesFromForm();
				if ($UserManager->AssignRole($urh, 1)) $Redirect = 1;
			}

			if ($Redirect) {
				$Url = GetUrl(
					$this->Context->Configuration, $this->Context->SelfUrl, '',
					'u', $User->UserID);
				Redirect($Url);
			} else {
				$this->PostBackAction = str_replace('Process', '', $this->PostBackAction);
			}

			if ($this->PostBackAction == 'Role') {
				$RoleManager = $this->Context->ObjectFactory->NewContextObject($this->Context, 'RoleManager');
				$RoleData = $RoleManager->GetRoles();

				$this->RoleSelect = $this->Context->ObjectFactory->NewObject($this->Context, 'Select');
				$this->RoleSelect->Name = 'RoleID';
				$this->RoleSelect->CssClass = 'PanelInput';
				if($this->User->RoleID == 0){
					$this->RoleSelect->AddOption(0, $this->Context->GetDefinition('Applicant'));
				}else if($this->User->RoleID == -1){
					$this->RoleSelect->AddOption(-1, $this->Context->GetDefinition('WaitingEmailCheck'));
				}
				$this->RoleSelect->AddOptionsFromDataSet($this->Context->Database, $RoleData, 'RoleID', 'Name');
				$this->RoleSelect->SelectedValue = $this->User->RoleID;
				$this->RoleSelect->Attributes = ' id="ddRoleID"';
			}
		}
		$this->CallDelegate('Constructor');
	}

	function Render() {
		if ($this->PostBackAction == 'Role') {
			$this->CallDelegate('PreRender');
			include(ThemeFilePath($this->Context->Configuration, 'account_role_form.php'));
			$this->CallDelegate('PostRender');
		}
	}
}
?>