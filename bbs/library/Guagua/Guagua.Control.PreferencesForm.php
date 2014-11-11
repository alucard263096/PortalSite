<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * The PreferencesForm control allows users to alter their customizable forum preferences.
 * @package Guagua
 */
class PreferencesForm extends PostBackControl {
	var $UserManager;
	var $User;
	var $Preferences;		// An array of preference options

	function PreferencesForm(&$Context, &$UserManager, $User) {
		$this->Name = 'PreferencesForm';
		$this->ValidActions = array('Functionality');
		$this->Constructor($Context);
		if ($this->IsPostBack) {
			$this->Preferences = array();
			$this->UserManager = &$UserManager;
			$this->User = $User;

			// Add the default preferences
			$this->AddPreference('DiscussionIndex', 'JumpToLastReadComment', 'JumpToLastReadComment');
			$this->AddPreference('CommentsForm', 'ShowFormatTypeSelector', 'ShowFormatSelector');

			if ($this->Context->Session->User->Permission('PERMISSION_RECEIVE_APPLICATION_NOTIFICATION')) {
				$this->AddPreference('NewUsers', 'NewApplicantNotifications', 'SendNewApplicantNotifications', 0, 1);
			}
			if ($this->Context->Session->User->Permission('PERMISSION_VIEW_HIDDEN_DISCUSSIONS')) $this->AddPreference('HiddenInformation', 'DisplayHiddenDiscussions', 'ShowDeletedDiscussions', 0);
			if ($this->Context->Session->User->Permission('PERMISSION_VIEW_HIDDEN_COMMENTS')) $this->AddPreference('HiddenInformation', 'DisplayHiddenComments', 'ShowDeletedComments', 0);
		}
		$this->CallDelegate('Constructor');
	}

	function AddPreference($SectionLanguageCode, $PreferenceLanguageCode, $PreferenceName, $RefreshPageAfterSetting = '0', $IsUserProperty = '0') {
		if (!array_key_exists($SectionLanguageCode, $this->Preferences)) $this->Preferences[$SectionLanguageCode] = array();
		$Preference = array();
		$Preference['LanguageCode'] = $PreferenceLanguageCode;
		$Preference['Name'] = $PreferenceName;
		$Preference['RefreshPageAfterSetting'] = $RefreshPageAfterSetting;
		$Preference['IsUserProperty'] = $IsUserProperty;
		$this->Preferences[$SectionLanguageCode][] = $Preference;
	}

	function Render() {
		if ($this->IsPostBack) {
			$this->CallDelegate('PreRender');
			include(ThemeFilePath($this->Context->Configuration, 'account_preferences_form.php'));
			$this->CallDelegate('PostRender');
		}
	}
}
?>