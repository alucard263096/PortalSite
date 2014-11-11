<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


/**
 * Update check control.
 * @package Framework
 */
class UpdateCheck extends PostBackControl {

	var $ReminderSelect;

	function UpdateCheck(&$Context) {
		$this->Name = 'UpdateCheck';
		$this->ValidActions = array('UpdateCheck', 'ProcessUpdateCheck', 'ProcessUpdateReminder');
		$this->Constructor($Context);

		if (!$this->Context->Session->User->Permission('PERMISSION_CHECK_FOR_UPDATES')) {
			$this->IsPostBack = 0;
		}

		if ($this->IsPostBack) {
			$this->Context->PageTitle = $this->Context->GetDefinition('UpdatesAndReminders');
			$this->ReminderSelect = $this->Context->ObjectFactory->NewObject($this->Context, 'Select');
			$this->ReminderSelect->Name = 'ReminderRange';
			$this->ReminderSelect->AddOption('', $this->Context->GetDefinition('Never'));
			$this->ReminderSelect->AddOption('Weekly', $this->Context->GetDefinition('Weekly'));
			$this->ReminderSelect->AddOption('Monthly', $this->Context->GetDefinition('Monthly'));
			$this->ReminderSelect->AddOption('Quarterly', $this->Context->GetDefinition('Quarterly'));
			$this->ReminderSelect->SelectedValue = $this->Context->Configuration['UPDATE_REMINDER'];

			$SettingsFile = $this->Context->Configuration['APPLICATION_PATH'].'conf/settings.php';
		}

		if ($this->IsPostBack && $this->PostBackAction == 'ProcessUpdateCheck') {
				// If everything was successful, Redirect back with saved changes message

			$ConfigurationManager = $this->Context->ObjectFactory->NewContextObject($this->Context, "ConfigurationManager");
			$ConfigurationManager->DefineSetting('LAST_UPDATE', time(), 1);
			$ConfigurationManager->SaveSettingsToFile($SettingsFile);

			if ($this->Context->WarningCollector->Iif()) {
				$Url = GetUrl(
					$this->Context->Configuration, $this->Context->SelfUrl, "", "", "", "",
					"PostBackAction=UpdateCheck&Checked=1");
				Redirect($Url);
			}

		} elseif ($this->IsPostBack && $this->PostBackAction == 'ProcessUpdateReminder' && $this->IsValidFormPostBack()) {
			$ReminderRange = ForceIncomingString('ReminderRange', '');
			if (!in_array($ReminderRange, array('Weekly','Monthly','Quarterly'))) $ReminderRange = '';

			// Set the Reminder configuration option
			$ConfigurationManager = $this->Context->ObjectFactory->NewContextObject($this->Context, "ConfigurationManager");
			$ConfigurationManager->DefineSetting('UPDATE_REMINDER', $ReminderRange, 1);
			if ($ConfigurationManager->SaveSettingsToFile($SettingsFile)) {
				// If everything was successful, Redirect back with saved changes message
				if ($this->Context->WarningCollector->Iif()) {
					$Url = GetUrl(
						$this->Context->Configuration, $this->Context->SelfUrl, "", "", "", "",
						"PostBackAction=UpdateCheck&Saved=1");
					Redirect($Url);
				}
			}
		}
		$this->CallDelegate('Constructor');
	}

	function Render() {
		if ($this->IsPostBack) {
			$this->CallDelegate('PreRender');
			// Call different render methods based on the PostBack state.
			if ($this->PostBackValidated) {
				$this->Render_ValidPostBack();
			} else {
				$this->Render_NoPostBack();
			}
			$this->CallDelegate('PostRender');
		}
	}

	function Render_ValidPostBack() {
	}

	function Render_NoPostBack() {
		if ($this->IsPostBack) {
			$this->CallDelegate('PreNoPostBackRender');
			$this->PostBackParams->Clear();
			$this->PostBackParams->Set('PostBackAction', 'ProcessUpdateCheck');
			include(ThemeFilePath($this->Context->Configuration, 'settings_update_check_nopostback.php'));
			$this->CallDelegate('PostNoPostBackRender');
		}
	}
}
?>