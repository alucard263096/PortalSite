<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


/**
 * Displays a comment grid.
 * @package Guagua
 */
class CommentGrid extends Control {
	var $CurrentPage;
	var $Discussion;
	var $CommentData;
	var $CommentDataCount;
	var $pl;
	var $ShowForm;

	function CommentGrid(&$Context, $DiscussionManager, $DiscussionID) {
		$this->Name = 'CommentGrid';
		$this->Control($Context);
		$this->CurrentPage = ForceIncomingInt('page', 1);

		// Load information about this discussion
		$RecordDiscussionView = 1;
		if ($this->Context->Session->UserID == 0) $RecordDiscussionView = 0;
		$this->Discussion = $DiscussionManager->GetDiscussionById($DiscussionID, $RecordDiscussionView);
		if ($this->Discussion) {
			$this->Discussion->FormatPropertiesForDisplay();
			if (!$this->Discussion->Active && !$this->Context->Session->User->Permission('PERMISSION_VIEW_HIDDEN_DISCUSSIONS')) {
				$this->Discussion = false;
				$this->Context->WarningCollector->Add($this->Context->GetDefinition('ErrDiscussionNotFound'));
			}

			if ($this->Context->WarningCollector->Count() > 0) {
				$this->CommentData = false;
				$this->CommentDataCount = 0;
			} else {
				// Load the data
				$CommentManager = $Context->ObjectFactory->NewContextObject($Context, 'CommentManager');
				$this->CommentDataCount = $CommentManager->GetCommentCount($DiscussionID);

				// If trying to focus on a particular comment, make sure to look at the correct page
				$Focus = ForceIncomingInt('Focus', 0);
				$PageCount = CalculateNumberOfPages($this->CommentDataCount, $this->Context->Configuration['COMMENTS_PER_PAGE']);
				if ($Focus > 0 && $PageCount > 1) {
					$this->CurrentPage = 0;
					$FoundComment = 0;
					while ($this->CurrentPage <= $PageCount && !$FoundComment) {
                  $this->CurrentPage++;
						$this->CommentData = $CommentManager->GetCommentList($this->Context->Configuration['COMMENTS_PER_PAGE'], $this->CurrentPage, $DiscussionID);
						while ($Row = $this->Context->Database->GetRow($this->CommentData)) {
							if (ForceInt($Row['CommentID'], 0) == $Focus) {
								$FoundComment = 1;
								break;
							}
						}
					}
					$this->Context->Database->RewindDataSet($this->CommentData);
				} else {
					$this->CommentData = $CommentManager->GetCommentList($this->Context->Configuration['COMMENTS_PER_PAGE'], $this->CurrentPage, $DiscussionID);
				}
			}

			// Set up the pagelist
			$this->pl = $this->Context->ObjectFactory->NewContextObject($this->Context, 'PageList', 'DiscussionID', $this->Discussion->DiscussionID, CleanupString($this->Discussion->Name).'/');
			$this->pl->CssClass = 'PageList';
			$this->pl->TotalRecords = $this->CommentDataCount;
			$this->pl->CurrentPage = $this->CurrentPage;
			$this->pl->RecordsPerPage = $this->Context->Configuration['COMMENTS_PER_PAGE'];
			$this->pl->PagesToDisplay = 10;
			$this->pl->PageParameterName = 'page';
			$this->pl->DefineProperties();
			$this->pl->QueryStringParams->Remove('Focus');

			$this->ShowForm = 0;
			if ($this->Context->Session->UserID > 0
				&& ((!$this->Discussion->Closed && $this->Discussion->Active) || $this->Context->Session->User->Permission('PERMISSION_ADD_COMMENTS_TO_CLOSED_DISCUSSION'))
				&& $this->CommentData
				&& $this->Context->Session->User->Permission('PERMISSION_ADD_COMMENTS')) $this->ShowForm = 1;
		}
		$this->CallDelegate('Constructor');
	}

	function Render() {
		$this->CallDelegate('PreRender');
		include(ThemeFilePath($this->Context->Configuration, 'comments.php'));
		$this->CallDelegate('PostRender');
	}
}

?>