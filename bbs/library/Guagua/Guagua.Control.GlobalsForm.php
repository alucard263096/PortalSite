<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * The GlobalsForm control is used to alter global configuration settings defined in appg/settings.php;
 * Changes are saved to conf/settings.php.
 * @package Guagua
 */
class GlobalsForm extends PostBackControl {

	var $ConfigurationManager;

	function GlobalsForm(&$Context) {
		$this->Name = 'GlobalsForm';
		$this->ValidActions = array('Globals', 'ProcessGlobals');
		$this->Constructor($Context);
		if (!$this->Context->Session->User->Permission('PERMISSION_CHANGE_APPLICATION_SETTINGS')) {
			$this->IsPostBack = 0;
		} elseif ($this->IsPostBack) {
			$this->Context->PageTitle = $this->Context->GetDefinition('ApplicationSettings');

			$SettingsFile = $this->Context->Configuration['APPLICATION_PATH'].'conf/settings.php';

			$this->ConfigurationManager = $this->Context->ObjectFactory->NewContextObject($this->Context, 'ConfigurationManager');
			if ($this->PostBackAction == 'ProcessGlobals' && $this->IsValidFormPostBack()) {
				$this->ConfigurationManager->GetSettingsFromForm($SettingsFile);
				// Checkboxes aren't posted back if unchecked, so make sure that they are saved properly
				$this->ConfigurationManager->DefineSetting('URL_BUILDING_METHOD', ForceIncomingBool('URL_BUILDING_METHOD', 0), 0);
				$this->ConfigurationManager->DefineSetting('ENABLE_WHISPERS', ForceIncomingBool('ENABLE_WHISPERS', 0), 0);
				$this->ConfigurationManager->DefineSetting('ALLOW_NAME_CHANGE', ForceIncomingBool('ALLOW_NAME_CHANGE', 0), 0);
				$this->ConfigurationManager->DefineSetting('PUBLIC_BROWSING', ForceIncomingBool('PUBLIC_BROWSING', 0), 0);
				$this->ConfigurationManager->DefineSetting('USE_CATEGORIES', ForceIncomingBool('USE_CATEGORIES', 0), 0);
				$this->ConfigurationManager->DefineSetting('LOG_ALL_IPS', ForceIncomingBool('LOG_ALL_IPS', 0), 0);

				//Validate cookie domain.
				//The pattern is loose; eg, It won't stop  "domain.tld" or ".co.uk" to be saved
				//(the "domain.tld" can be set by the browser, the 2nd won't).
				Validate(
					$this->Context->GetDefinition('CookieDomain'),
					0,
					ForceIncomingString('COOKIE_DOMAIN', ''),
					255,
					'/^[\.-_~a-zA-Z0-9]*\.?[-_~a-zA-Z0-9]+\.[-_~a-zA-Z0-9]+$/i',
					$this->Context
				);
				// And save everything
				if ($this->ConfigurationManager->SaveSettingsToFile($SettingsFile)) {
					header('Location: '.GetUrl($this->Context->Configuration, 'settings.php', '', '', '', '', 'PostBackAction=Globals&Success=1'));
				} else {
					$this->PostBackAction = 'Globals';
				}
			}
		}
		$this->CallDelegate('Constructor');
	}

	function Render() {
		if ($this->IsPostBack) {
			$this->CallDelegate('PreRender');
			$this->PostBackParams->Clear();
			$this->PostBackParams->Set('PostBackAction', 'ProcessGlobals');
			include(ThemeFilePath($this->Context->Configuration, 'settings_globals_form.php'));
			$this->CallDelegate('PostRender');
		}
	}
}
?>