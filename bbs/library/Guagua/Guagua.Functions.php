<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+




function DiscussionPrefix(&$Context, &$Discussion) {
	// Call the Discussion object's method directly, this call is depreciated.
	return $Discussion->DiscussionPrefix();
}

function GetLastCommentQuerystring(&$Discussion, &$Configuration) {
	$Suffix = '';
	if ($Configuration['URL_BUILDING_METHOD']) $Suffix = CleanupString($Discussion->Name).'/';
	$JumpToItem = $Discussion->CountComments - (($Discussion->LastPage - 1) * $Configuration['COMMENTS_PER_PAGE']);
	if ($JumpToItem < 0) $JumpToItem = 0;
	$LastPage = $Discussion->LastPage;
	if ($LastPage == 0) $LastPage = '';
	return GetUrl($Configuration, 'comments.php', '', 'DiscussionID', $Discussion->DiscussionID, $LastPage, '#Item_'.$JumpToItem, $Suffix);
}

function GetUnreadQuerystring(&$Discussion, &$Configuration, $CurrentUserJumpToLastCommentPref = '0') {
	$Suffix = '';
	if ($Configuration['URL_BUILDING_METHOD']) $Suffix = CleanupString($Discussion->Name).'/';
	if ($CurrentUserJumpToLastCommentPref) {
		$UnreadCommentCount = $Discussion->CountComments - $Discussion->NewComments + 1;
		$ReadCommentCount = $Discussion->CountComments - $Discussion->NewComments;
		$PageNumber = CalculateNumberOfPages($ReadCommentCount, $Configuration['COMMENTS_PER_PAGE']);
		$JumpToItem = $ReadCommentCount - (($PageNumber-1) * $Configuration['COMMENTS_PER_PAGE']);
		if ($JumpToItem <= 0) {
			$JumpToItem = '';
		}else{
			$JumpToItem = '#Item_'.$JumpToItem;
		}
		if ($PageNumber == 0) $PageNumber = '';
		return GetUrl($Configuration, 'comments.php', '', 'DiscussionID', $Discussion->DiscussionID, $PageNumber, $JumpToItem, $Suffix);
	} else {
		return GetUrl($Configuration, 'comments.php', '', 'DiscussionID', $Discussion->DiscussionID, '', '', $Suffix);
	}
}

function HighlightTrimmedString($Haystack, $Needles, $TrimLength = '') {
	$Highlight = '<span class="Highlight">\1</span>';
	$Pattern = '#(?!<.*?)(%s)(?![^<>]*?>)#i';
	$TrimLength = ForceInt($TrimLength, 0);
	if ($TrimLength > 0) $Haystack = SliceString($Haystack, $TrimLength);
	$WordsToHighlight = count($Needles);
	if ($WordsToHighlight > 0) {
		$i = 0;
		for ($i = 0; $i < $WordsToHighlight; $i++) {
			if (strlen($Needles[$i]) > 2) {
				$CurrentWord = preg_quote($Needles[$i]);
				$Regex = sprintf($Pattern, $CurrentWord);
				$Haystack = preg_replace($Regex, $Highlight, $Haystack);
			}
		}
	}
	return $Haystack;
}


function ParseQueryForHighlighting(&$Context, $Query) {
	if ($Query != '') {
		$Query = DecodeHtmlEntities($Query);
		$Query = preg_replace('/"/i', '', $Query);
		$Query = preg_replace('/ '.$Context->GetDefinition('And').' /i', ' ', $Query);
		$Query = preg_replace('/ '.$Context->GetDefinition('Or').' /i', ' ', $Query);
		return explode(' ', $Query);
	} else {
		return array();
	}
}

/**
 * Create a form to select the category of discussion.
 *
 * Return an empty string if there is less than two categories available.
 *
 * @param Context $Context
 * @param string $SessionPostBackKey
 * @param int $DiscussionID
 * @return string
 */
function MoveDiscussionForm(&$Context, $SessionPostBackKey, $DiscussionID) {
	$CategoryManager = $Context->ObjectFactory->NewContextObject($Context, 'CategoryManager');
	$CategoryData = $CategoryManager->GetCategories(0, 1);
	if ($Context->Database->RowCount($CategoryData) < 2) {
		return '';
	}
	else {
		$Select = $Context->ObjectFactory->NewObject($Context, 'Select');
		$Select->Name = 'CategoryID';
		$Select->SelectedValue = ForceIncomingInt('MoveDiscussionDropdown', 0);
		$Select->Attributes .= " id=\"MoveDiscussionDropdown\" onchange=\"if (confirm('".$Context->GetDefinition("ConfirmMoveDiscussion")."')) DiscussionSwitch('".$Context->Configuration['WEB_ROOT']."ajax/switch.php', 'Move', '".$DiscussionID."', ''+this.options[this.selectedIndex].value+'', 'MoveDiscussion', '".$SessionPostBackKey."'); return false;\"";
		$Select->AddOption(0, $Context->GetDefinition('SelectCategoryToMoveTo'));
		$cat = $Context->ObjectFactory->NewObject($Context, 'Category');
		$Row = $Context->Database->GetRow($CategoryData);
		while ($Row) {
			$cat->Clear();
			$cat->GetPropertiesFromDataSet($Row);
			$Select->AddOption($cat->CategoryID, $cat->Name);
			$Row = $Context->Database->GetRow($CategoryData);
		}
		return "<form id=\"frmMoveDiscussion\"
				name=\"frmMoveDiscussion\"
				method=\"post\"
				action=\"".$Context->Configuration['WEB_ROOT']."post.php\">".
      			$Select->Get()."
	     		</form>";
	}
}

?>