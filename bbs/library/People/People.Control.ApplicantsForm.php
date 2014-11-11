<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * The ApplicantsForm control is used to accept or decline applicants in a batch process.
 * @package People
 */
class ApplicantsForm extends PostBackControl {

	var $ApplicantData;

	function ApplicantsForm(&$Context) {
		$this->Name = "ApplicantsForm";
		$this->ValidActions = array("Applicants", "ProcessApplicants");
		$this->Constructor($Context);
		if (!$this->Context->Session->User->Permission("PERMISSION_APPROVE_APPLICANTS")) {
			$this->IsPostBack = 0;
		} elseif ($this->IsPostBack) {
			$this->Context->PageTitle = $this->Context->GetDefinition('MembershipApplicants');

			// See if the form has been submitted
			if ($this->PostBackAction == 'ProcessApplicants' && $this->IsValidFormPostBack()) {
				$Action = ForceIncomingString('btnSubmit', '');
				// Compare to language dictionary to figure out exactly what should be done
				if ($Action != '') $Action = ($Context->GetDefinition('ApproveForMembership') == $Action) ? 'Approve' : 'Decline';
				// Retrieve the id's to manipulate
				$ApplicantIDs = ForceIncomingArray('ApplicantID', array());

				// Approve or decline the applicants
				if ($Action != '' && is_array($ApplicantIDs) && count($ApplicantIDs) > 0) {
					$um = $this->Context->ObjectFactory->NewContextObject($this->Context, 'UserManager');
					if ($Action == 'Approve') {
						$um->ApproveApplicant($ApplicantIDs);
					} else {
						$um->RemoveApplicant($ApplicantIDs);
					}
				}
			}

			// There is no need to load all of the applicants since they were already loaded by the settings.php page
			// $um = $this->Context->ObjectFactory->NewContextObject($this->Context, 'UserManager');
			// $this->ApplicantData = $um->GetUsersByRoleId(0);
		}
		$this->CallDelegate("Constructor");
	}

	function Render() {
		if ($this->IsPostBack) {
			$this->CallDelegate("PreRender");
			$this->PostBackParams->Set('PostBackAction', 'ProcessApplicants');
			include(ThemeFilePath($this->Context->Configuration, 'settings_applicants_form.php'));
			$this->CallDelegate("PostRender");
		}
	}
}
?>