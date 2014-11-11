<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * Displays a discussion grid.
 * @package Guagua
 */
class DiscussionGrid extends Control {
	var $CurrentPage;
	var $DiscussionData;
	var $DiscussionDataCount;
	var $Category;	// The category that this discussion grid belongs to (if viewing one category)

	function DiscussionGrid(&$Context) {
		$this->Name = "DiscussionGrid";
		$this->Control($Context);
		$this->Category = false;


		$DiscussionManager = $this->Context->ObjectFactory->NewContextObject($this->Context, "DiscussionManager");
		$this->CurrentPage = ForceIncomingInt("page", 1);
		$this->DiscussionData = false;
		$this->DiscussionDataCount = false;


		// Get the category if filtered
		$CategoryID = ForceIncomingInt("CategoryID", 0);
		if ($CategoryID > 0) {
			$cm = $this->Context->ObjectFactory->NewContextObject($this->Context, "CategoryManager");
			$this->Category = $cm->GetCategoryById($CategoryID);
		}

		$this->DelegateParameters['DiscussionManager'] = &$DiscussionManager;
		$this->CallDelegate('PreDataLoad');

		if (!$this->DiscussionData) {
			$this->DiscussionData = $DiscussionManager->GetDiscussionList($this->Context->Configuration['DISCUSSIONS_PER_PAGE'], $this->CurrentPage, $CategoryID);
			$this->DiscussionDataCount = $DiscussionManager->GetDiscussionCount($CategoryID);
			if ($this->Category) {
				if ($this->Context->PageTitle == '') $this->Context->PageTitle = htmlspecialchars($this->Category->Name);
			} else {
				if ($this->Context->Session->User->BlocksCategories) {
					if ($this->Context->PageTitle == '') $this->Context->PageTitle = $this->Context->GetDefinition('WatchedDiscussions');
				} else {
					if ($this->Context->PageTitle == '') $this->Context->PageTitle = $this->Context->GetDefinition('AllDiscussions');
				}
			}
		}

		$this->CallDelegate('Constructor');
	}

	function Render() {
		$this->CallDelegate('PreRender');
		// Set up the pagelist
		$CategoryID = ForceIncomingInt('CategoryID', 0);
		if ($CategoryID == 0) $CategoryID = '';
		$pl = $this->Context->ObjectFactory->NewContextObject($this->Context, 'PageList', 'CategoryID', $CategoryID);
		$pl->CssClass = 'PageList';
		$pl->TotalRecords = $this->DiscussionDataCount;
		$pl->CurrentPage = $this->CurrentPage;
		$pl->RecordsPerPage = $this->Context->Configuration['DISCUSSIONS_PER_PAGE'];
		$pl->PagesToDisplay = 10;
		$pl->PageParameterName = 'page';
		$pl->DefineProperties();
		$PageDetails = $pl->GetPageDetails($this->Context);
		$PageList = $pl->GetNumericList();


		include(ThemeFilePath($this->Context->Configuration, 'discussions.php'));
		$this->CallDelegate('PostRender');
	}
}
?>
