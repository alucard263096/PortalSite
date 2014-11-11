<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



include("appg/settings.php");
$Configuration['SELF_URL'] = 'comments.php';
include("appg/init_guagua.php");

// 1. DEFINE VARIABLES AND PROPERTIES SPECIFIC TO THIS PAGE
$SessionPostBackKey = $Context->Session->GetCsrfValidationKey();

// Ensure the user is allowed to view this page
$Context->Session->Check($Context);
$enableEditor = 0;

// Instantiate data managers to be used in this page
$DiscussionManager = $Context->ObjectFactory->NewContextObject($Context, "DiscussionManager");

// Create the comment grid
$DiscussionID = ForceIncomingInt("DiscussionID", 0);
$CommentGrid = $Context->ObjectFactory->CreateControl($Context, "CommentGrid", $DiscussionManager, $DiscussionID);
// Create the comment form
if ($CommentGrid->ShowForm) {
	$CommentForm = $Context->ObjectFactory->CreateControl($Context, 'DiscussionForm');
	$CommentForm->Discussion = &$CommentGrid->Discussion;
}

// Define properties of the page controls that are specific to this page
$Head->BodyId = 'CommentsPage';
$Menu->CurrentTab = "discussions";
$Panel->CssClass = "CommentPanel";
$Panel->BodyCssClass = "Comments";
if ($CommentGrid->Discussion) {
	$Context->PageTitle = $CommentGrid->Discussion->Name;
} else {
	$Context->PageTitle = $Context->GetDefinition('ErrDiscussionNotFound');
}

// 2. BUILD PAGE CONTROLS

	// Add discussion options to the panel
	if ($CommentGrid->Discussion
		&& $Context->Session->UserID > 0
	) {
		$Options = $Context->GetDefinition("Options");
		$Panel->AddList($Options, 6);
		$BookmarkText = $Context->GetDefinition($CommentGrid->Discussion->Bookmarked ? "UnbookmarkThisDiscussion" : "BookmarkThisDiscussion");
		$Panel->AddListItem($Options,
			$BookmarkText,
			"./",
			"",
			"id=\"SetBookmark\" onclick=\"SetBookmark('".$Configuration['WEB_ROOT']."ajax/switch.php', ".$CommentGrid->Discussion->Bookmarked.", '".$CommentGrid->Discussion->DiscussionID."', '".$Context->GetDefinition("BookmarkText")."', '".$Context->GetDefinition("UnbookmarkThisDiscussion")."', '".$SessionPostBackKey."'); ".$Context->PassThruVars['SetBookmarkOnClick']."return false;\"");

		if ($Context->Session->User->Permission('PERMISSION_HTML_ALLOWED')) {
			$enableEditor = 1;
		}

		if ($Context->Session->User->Permission("PERMISSION_HIDE_DISCUSSIONS")) {
			$HideText = $Context->GetDefinition(($CommentGrid->Discussion->Active?"Hide":"Unhide")."ThisDiscussion");
			$Panel->AddListItem($Options,
				$HideText,
				"./",
				"",
				"id=\"HideDiscussion\" onclick=\"if (confirm('".$Context->GetDefinition($CommentGrid->Discussion->Active?"ConfirmHideDiscussion":"ConfirmUnhideDiscussion")."')) DiscussionSwitch('".$CommentGrid->Context->Configuration['WEB_ROOT']."ajax/switch.php', 'Active', '".$CommentGrid->Discussion->DiscussionID."', '".FlipBool($CommentGrid->Discussion->Active)."', 'HideDiscussion', '".$SessionPostBackKey."'); return false;\"");
		}
		if ($Context->Session->User->Permission("PERMISSION_CLOSE_DISCUSSIONS")) {
			$CloseText = $Context->GetDefinition(($CommentGrid->Discussion->Closed?"ReOpen":"Close")."ThisDiscussion");
			$Panel->AddListItem($Options,
				$CloseText,
				"./",
				"",
				"id=\"CloseDiscussion\" onclick=\"if (confirm('".$Context->GetDefinition($CommentGrid->Discussion->Closed?"ConfirmReopenDiscussion":"ConfirmCloseDiscussion")."')) DiscussionSwitch('".$CommentGrid->Context->Configuration['WEB_ROOT']."ajax/switch.php', 'Closed', '".$CommentGrid->Discussion->DiscussionID."', '".FlipBool($CommentGrid->Discussion->Closed)."', 'CloseDiscussion', '".$SessionPostBackKey."'); return false;\"");
		}
		if ($Context->Session->User->Permission("PERMISSION_STICK_DISCUSSIONS")) {
			header('CanSink: true');
			$StickyText = $Context->GetDefinition("MakeThisDiscussion".($CommentGrid->Discussion->Sticky?"Unsticky":"Sticky"));
			$Panel->AddListItem($Options,
				$StickyText,
				"./",
				"",
				"id=\"StickDiscussion\" onclick=\"if (confirm('".$Context->GetDefinition($CommentGrid->Discussion->Sticky?"ConfirmUnsticky":"ConfirmSticky")."')) DiscussionSwitch('".$CommentGrid->Context->Configuration['WEB_ROOT']."ajax/switch.php', 'Sticky', '".$CommentGrid->Discussion->DiscussionID."', '".FlipBool($CommentGrid->Discussion->Sticky)."', 'StickDiscussion', '".$SessionPostBackKey."'); return false;\"");
		}
		if ($Context->Session->User->Permission("PERMISSION_SINK_DISCUSSIONS")) {
			$SinkText = $Context->GetDefinition("MakeThisDiscussion".($CommentGrid->Discussion->Sink?"UnSink":"Sink"));
			$Panel->AddListItem($Options,
				$SinkText,
				"./",
				"",
				"id=\"SinkDiscussion\" onclick=\"if (confirm('".$Context->GetDefinition($CommentGrid->Discussion->Sink?"ConfirmUnSink":"ConfirmSink")."')) DiscussionSwitch('".$CommentGrid->Context->Configuration['WEB_ROOT']."ajax/switch.php', 'Sink', '".$CommentGrid->Discussion->DiscussionID."', '".FlipBool($CommentGrid->Discussion->Sink)."', 'SinkDiscussion', '".$SessionPostBackKey."'); return false;\"");
		}
		if ($Configuration['USE_CATEGORIES']
			&& ($Context->Session->User->Permission("PERMISSION_MOVE_ANY_DISCUSSIONS")
				|| $Context->Session->UserID == $CommentGrid->Discussion->AuthUserID)
		) {
			$MoveDiscussionForm = MoveDiscussionForm($Context, $SessionPostBackKey, $DiscussionID);
			if ($MoveDiscussionForm) {
				$MoveText = $Context->GetDefinition("MoveText");
				$Panel->AddListItem($Options,
					$MoveText,
					"javascript:void(0);",
					"",
					"id=\"MoveDiscussion\" onclick=\"showById('MoveDiscussionDropdown');\"");
				$Panel->AddListItem($Options,$MoveDiscussionForm, '');
			}
		}
	}

	// Create the comment footer
	$CommentFoot = $Context->ObjectFactory->CreateControl($Context, "CommentFoot");

// 3. ADD CONTROLS TO THE PAGE

	$Page->AddRenderControl($Head, $Configuration["CONTROL_POSITION_HEAD"]);
	$Page->AddRenderControl($Menu, $Configuration["CONTROL_POSITION_MENU"]);
	$Page->AddRenderControl($Panel, $Configuration["CONTROL_POSITION_PANEL"]);
	$Page->AddRenderControl($NoticeCollector, $Configuration['CONTROL_POSITION_NOTICES']);
	$Page->AddRenderControl($CommentGrid, $Configuration["CONTROL_POSITION_BODY_ITEM"]);
	if ($CommentGrid->ShowForm) {
		$Page->AddRenderControl($CommentForm, $Configuration["CONTROL_POSITION_BODY_ITEM"] + 10);
	}
	$Page->AddRenderControl($CommentFoot, $Configuration["CONTROL_POSITION_BODY_ITEM"] + 11);
	$Page->AddRenderControl($Foot, $Configuration["CONTROL_POSITION_FOOT"]);
	$Page->AddRenderControl($PageEnd, $Configuration["CONTROL_POSITION_PAGE_END"]);

// 4. FIRE PAGE EVENTS
	$Page->FireEvents();

if ($enableEditor){
	echo '<script type="text/javascript">KISSY.Editor("CommentBox")</script>';
}

?>