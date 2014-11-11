<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+




/**
 * The SearchForm control is used to render a search form and search results.
 * @package Guagua
 */
class SearchForm extends PostBackControl {
	var $FormName;				// The name of this form
	var $Search;            // A search object (contains all parameters related to the search: keywords, etc)
	var $SearchID;          // The id of the search to load
	var $Data;              // Search result data
	var $DataCount;			// The number of records returned by a search

	// Search form controls
	var $CategorySelect;
	var $OrderSelect;
	var $TypeRadio;
	var $RoleSelect;

	function SearchForm(&$Context, $FormName = '') {
		$this->Name = 'SearchForm';
		$this->ValidActions = array('Search', 'SaveSearch');
		$this->FormName = $FormName;
		$this->SearchID = ForceIncomingInt('SearchID', 0);
		$this->DataCount = 0;
		$this->Constructor($Context);
		if ($this->PostBackAction == '') $this->IsPostBack = 1;
		$this->Context->BodyAttributes .= ' onload="Focus(\'txtKeywords\');"';

		$CurrentPage = ForceIncomingInt('page', 1);

		// Load a search object
		$this->Search = $this->Context->ObjectFactory->NewObject($this->Context, 'Search');
		$this->Search->GetPropertiesFromForm();

		$this->CallDelegate('PostDefineSearchFromForm');

		// Load selectors
		// Category Filter
		$cm = $this->Context->ObjectFactory->NewContextObject($this->Context, 'CategoryManager');
		$CategorySet = $cm->GetCategories();
		$this->CategorySelect = $this->Context->ObjectFactory->NewObject($this->Context, 'Select');
		$this->CategorySelect->Name = 'Categories';
		$this->CategorySelect->CssClass = 'SearchSelect';
		$this->CategorySelect->AddOption('', $this->Context->GetDefinition('AllCategories'));
		$this->CategorySelect->AddOptionsFromDataSet($this->Context->Database, $CategorySet, 'Name', 'Name');
		$this->CategorySelect->SelectedValue = $this->Search->Categories;

		// UserOrder
		$this->OrderSelect = $this->Context->ObjectFactory->NewObject($this->Context, 'Select');
		$this->OrderSelect->Name = 'UserOrder';
		$this->OrderSelect->CssClass = 'SearchSelect';
		$this->OrderSelect->Attributes = ' id="UserOrder"';
		$this->OrderSelect->AddOption('', $this->Context->GetDefinition('SearchUsername'));
		$this->OrderSelect->AddOption('Date', $this->Context->GetDefinition('DateLastActive'));
		$this->OrderSelect->SelectedValue = $this->Search->UserOrder;

		// Type
		$this->TypeRadio = $this->Context->ObjectFactory->NewObject($this->Context, 'Radio');
		$this->TypeRadio->Name = 'Type';
		$this->TypeRadio->CssClass = 'SearchType';
		$this->TypeRadio->AddOption('Topics', $this->Context->GetDefinition('Topics'));
		$this->TypeRadio->AddOption('Comments', $this->Context->GetDefinition('Comments'));
		$this->TypeRadio->AddOption('Users', $this->Context->GetDefinition('Users'));
		$this->TypeRadio->SelectedID = $this->Search->Type;

		$rm = $this->Context->ObjectFactory->NewContextObject($this->Context, 'RoleManager');
		$RoleSet = $rm->GetRoles();
		$this->RoleSelect = $this->Context->ObjectFactory->NewObject($this->Context, 'Select');
		$this->RoleSelect->Name = 'Roles';
		$this->RoleSelect->CssClass = 'SearchSelect';
		$this->RoleSelect->Attributes = ' id="RoleFilter"';
		$this->RoleSelect->AddOption('', $this->Context->GetDefinition('AllRoles'));
		if ($this->Context->Session->User->Permission('PERMISSION_APPROVE_APPLICANTS')) {
			$this->RoleSelect->AddOption($this->Context->GetDefinition('Applicant'), $this->Context->GetDefinition('Applicant'));
			$this->RoleSelect->AddOption($this->Context->GetDefinition('WaitingEmailCheck'), $this->Context->GetDefinition('WaitingEmailCheck'));
		}
		$this->RoleSelect->AddOptionsFromDataSet($this->Context->Database, $RoleSet, 'Name', 'Name');
		$this->RoleSelect->SelectedValue = $this->Search->Roles;

		$this->CallDelegate('PreSearchQuery');

		// Handle Searching
		if ($this->PostBackAction == 'Search') {
			$this->Data = false;
			// Because of PHP's new handling of objects in PHP 5, when I passed
			// in $this->Search directly, it passed by reference instead of
			// byval. I DO NOT want this because the keywords get formatted for
			// db input in the search query and it makes them display
			// incorrectly on the screen later down the page. Hence this kludge:
			$OriginalKeywords = $this->Search->Keywords;
			$OriginalQuery = $this->Search->Query;
			// Handle searches
			if ($this->Search->Type == 'Users') {
				$um = $this->Context->ObjectFactory->NewContextObject($this->Context, 'UserManager');
				$this->Data = $um->GetUserSearch($this->Search, $this->Context->Configuration['SEARCH_RESULTS_PER_PAGE'], $CurrentPage);
				$this->Search->Keywords = $OriginalKeywords;
				$this->Search->Query = $OriginalQuery;
				$this->Search->FormatPropertiesForDisplay();
				if ($this->Data) $this->DataCount = $this->Context->Database->RowCount($um->GetUserSearchCount($this->Search));

			} else if ($this->Search->Type == 'Topics') {
				$dm = $this->Context->ObjectFactory->NewContextObject($this->Context, 'DiscussionManager');
				$this->Data = $dm->GetDiscussionSearch($this->Context->Configuration['SEARCH_RESULTS_PER_PAGE'], $CurrentPage, $this->Search);
				$this->Search->Keywords = $OriginalKeywords;
				$this->Search->Query = $OriginalQuery;
				$this->Search->FormatPropertiesForDisplay();
				if ($this->Data) $this->DataCount = $this->Context->Database->RowCount($dm->GetDiscussionSearchCount($this->Search));

			} else if ($this->Search->Type == 'Comments') {
				$cm = $this->Context->ObjectFactory->NewContextObject($this->Context, 'CommentManager');
				$this->Data = $cm->GetCommentSearch($this->Context->Configuration['SEARCH_RESULTS_PER_PAGE'], $CurrentPage, $this->Search);
				$this->Search->Keywords = $OriginalKeywords;
				$this->Search->Query = $OriginalQuery;
				$this->Search->FormatPropertiesForDisplay();
				if ($this->Data) $this->DataCount = $this->Context->Database->RowCount($cm->GetCommentSearchCount($this->Search));
			}


			$pl = $this->Context->ObjectFactory->NewContextObject($this->Context, 'PageList');
			$pl->CssClass = 'PageList';
			$pl->TotalRecords = $this->DataCount;
			$pl->PageParameterName = 'page';
			$pl->CurrentPage = $CurrentPage;
			$pl->RecordsPerPage = $this->Context->Configuration['SEARCH_RESULTS_PER_PAGE'];
			$pl->PagesToDisplay = 10;
			$this->PageList = $pl->GetNumericList();
			if ($this->Search->Query != '') {
				$Query = $this->Search->Query;
			} else {
				$Query = $this->Context->GetDefinition('nothing');
			}
			if ($this->DataCount == 0) {
				$this->PageDetails = $this->Context->GetDefinition('NoSearchResultsMessage');
			} else {
				$this->PageDetails = str_replace(array('//1', '//2', '//3'), array($pl->FirstRecord, $pl->LastRecord, $pl->TotalRecords), $this->Context->GetDefinition('PageDetailsMessageFull'));
			}
			$this->SearchQuery = '<font style="color:#c00;">'.$Query.'</font>';
		}
		$this->CallDelegate('PostLoadData');
		// Make sure to remove the FormPostBackKey from the form so that it isn't
		// present in the querystring
		$this->PostBackParams->Remove('FormPostBackKey');
	}

	function Render_NoPostBack() {
		$this->CallDelegate('PreSearchFormRender');
		include(ThemeFilePath($this->Context->Configuration, 'search_form.php'));

		if ($this->PostBackAction == 'Search') {

			$this->CallDelegate('PreSearchResultsRender');

			include(ThemeFilePath($this->Context->Configuration, 'search_results_top.php'));

			if ($this->DataCount > 0) {
				$Alternate = 0;
				$FirstRow = 1;
				$Counter = 0;
				if ($this->Search->Type == 'Topics') {
					$Discussion = $this->Context->ObjectFactory->NewContextObject($this->Context, 'Discussion');
					$CurrentUserJumpToLastCommentPref = $this->Context->Session->User->Preference('JumpToLastReadComment');
					$DiscussionList = '';
					$ThemeFilePath = ThemeFilePath($this->Context->Configuration, 'discussion.php');
					while ($Row = $this->Context->Database->GetRow($this->Data)) {
						$Discussion->Clear();
						$Discussion->GetPropertiesFromDataSet($Row);
						$Discussion->FormatPropertiesForDisplay();
						if ($Counter < $this->Context->Configuration['SEARCH_RESULTS_PER_PAGE']) {
							$this->DelegateParameters['Discussion'] = &$Discussion;
							$this->CallDelegate('PreSingleDiscussionRender');
							include($ThemeFilePath);
						}
						$FirstRow = 0;
						$Counter++;
						$Alternate = FlipBool($Alternate);
					}
					echo($DiscussionList);
				} elseif ($this->Search->Type == 'Comments') {
					$Comment = $this->Context->ObjectFactory->NewContextObject($this->Context, 'Comment');
					$HighlightWords = ParseQueryForHighlighting($this->Context, $this->Search->Query);
					$CommentList = '';
					$ThemeFilePath = ThemeFilePath($this->Context->Configuration, 'search_results_comments.php');
					while ($Row = $this->Context->Database->GetRow($this->Data)) {
						$Comment->Clear();
						$Comment->GetPropertiesFromDataSet($Row, $this->Context->Session->UserID);
						$Comment->FormatPropertiesForSafeDisplay();
						if ($Counter < $this->Context->Configuration['SEARCH_RESULTS_PER_PAGE']) {
							include($ThemeFilePath);
						}
						$FirstRow = 0;
						$Counter++;
						$Alternate = FlipBool($Alternate);
					}
					echo($CommentList);
				} elseif ($this->Search->Type == 'Users') {
					$u = $this->Context->ObjectFactory->NewContextObject($this->Context, 'User');
					$UserList = '';
					$ThemeFilePath = ThemeFilePath($this->Context->Configuration, 'search_results_users.php');
					while ($Row = $this->Context->Database->GetRow($this->Data)) {
						$u->Clear();
						$u->GetPropertiesFromDataSet($Row);
						$u->FormatPropertiesForDisplay();

						$this->DelegateParameters['User'] = &$u;
						$this->CallDelegate('PreRenderUserSearch');

						if ($Counter < $this->Context->Configuration['SEARCH_RESULTS_PER_PAGE']) {
							include($ThemeFilePath);
						}
						$FirstRow = 0;
						$Counter++;
						$Alternate = FlipBool($Alternate);
					}
					echo($UserList);
				} else {
					$this->CallDelegate('MidSearchResultsRender');
				}
			}
			include(ThemeFilePath($this->Context->Configuration, 'search_results_bottom.php'));
		}
	}

	function Render_ValidPostBack() {
	}
}
?>