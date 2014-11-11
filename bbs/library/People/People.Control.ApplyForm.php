<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * The ApplyForm control allows new users to apply for membership.
 * @package People
 */
class ApplyForm extends PostBackControl {
	var $Applicant;			// A user object for the applying user
	var $FormName;				// The name of this form

	function ApplyForm(&$Context, $FormName = '') {
		$this->Name = 'ApplyForm';
		$this->ValidActions = array('ApplyForm', 'Apply');
		$this->Constructor($Context);

		if ($this->IsPostBack) {
			// Set up the page
			global $Banner, $Foot;
			$Banner->Properties['CssClass'] = 'Apply';
			$Foot->CssClass = 'Apply';
			$this->Context->PageTitle = $this->Context->GetDefinition('ApplyForMembership');
			$this->FormName = $FormName;

			$this->Applicant = $Context->ObjectFactory->NewContextObject($Context, 'User');
			$this->Applicant->GetPropertiesFromForm();
			$this->CallDelegate('Constructor');

			if ($this->PostBackAction == 'Apply') {
				$um = $this->Context->ObjectFactory->NewContextObject($this->Context, 'UserManager');

				$this->CallDelegate('PreCreateUser');

				$this->PostBackValidated = $um->CreateUser($this->Applicant);

				$this->CallDelegate('PostCreateUser');

				// Sign them in
				if ($this->PostBackValidated && $this->Applicant->UserID > 0) {
					if ($this->Context->Configuration['ALLOW_IMMEDIATE_ACCESS']) {
						$this->Context->Authenticator->AssignSessionUserID($this->Applicant->UserID);
						Redirect($this->Context->Configuration['FORWARD_VALIDATED_USER_URL']);
					} else {
						// Do nothing and let the postbackvalidated template be displayed
					}
				}
			}
			$this->CallDelegate('LoadData');
		}
	}

	function Render_NoPostBack() {
		$this->Applicant->FormatPropertiesForDisplay();
		$this->PostBackParams->Add('PostBackAction', 'Apply');
		$this->PostBackParams->Add('ReadTerms', $this->Applicant->ReadTerms);
		$this->CallDelegate('PreNoPostBackRender');
		include(ThemeFilePath($this->Context->Configuration, 'people_apply_form_nopostback.php'));
		$this->CallDelegate('PostNoPostBackRender');
	}

	function Render_ValidPostBack() {
		$this->CallDelegate('PreValidPostBackRender');
		include(ThemeFilePath($this->Context->Configuration, 'people_apply_form_validpostback.php'));
		$this->CallDelegate('PostValidPostBackRender');
	}
}
?>