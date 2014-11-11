<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


/**
 * The Leave control is used to sign a user out of an application
 * and present them with a "good bye" screen.
 * @package People
 */
class Leave extends PostBackControl {

	function Leave(&$Context) {
		$this->Name = 'Leave';
		$this->ValidActions = array('SignOutNow', 'SignOut');
		$this->Constructor($Context);

		if ($this->IsPostBack) {
			// Set up the page
			global $Banner, $Foot;
			$Banner->Properties['CssClass'] = 'SignOut';
			$Foot->CssClass = 'SignOut';
			$this->Context->PageTitle = $this->Context->GetDefinition('SignOut');

			// Occassionally cookies cannot be removed, and rather than
			// cause an infinite loop where the page continually refreshes
			// until it crashes (attempting to remove the cookies over and
			// over again), I just fail out and treat the user as if s/he
			// has been signed out successfully.
			$this->PostBackValidated = 1;
			if ($this->PostBackAction == 'SignOutNow'
				&& $this->IsValidFormPostBack('ErrPostBackKeySignOutInvalid')
			) {
				$this->Context->Session->End($this->Context->Authenticator);
			} else {
				$this->PostBackValidated = 0;
			}
		}
	}

	function Render_ValidPostBack() {
		$this->CallDelegate('PreValidPostBackRender');
		include(ThemeFilePath($this->Context->Configuration, 'people_signout_form_validpostback.php'));
		$this->CallDelegate('PostValidPostBackRender');
	}

	function Render_NoPostBack() {
		$this->CallDelegate('PreNoPostBackRender');
		$this->PostBackParams->Add('PostBackAction', 'SignOutNow');
		include(ThemeFilePath($this->Context->Configuration, 'people_signout_form_nopostback.php'));
		$this->CallDelegate('PostNoPostBackRender');
	}
}
?>