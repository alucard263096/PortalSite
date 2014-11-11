<?php
/*

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+

/*
* Description: Web form that handles creating & editing discussion topics & comments
*/

include("appg/settings.php");
$Configuration['SELF_URL'] = 'post.php';
include("appg/init_guagua.php");

// 1. DEFINE VARIABLES AND PROPERTIES SPECIFIC TO THIS PAGE

	// Ensure the user is allowed to view this page
	$Context->Session->Check($Context);

	// Create the comment form
	$CommentForm = $Context->ObjectFactory->CreateControl($Context, "DiscussionForm");

	// Only people with active sessions can post
	if ($Context->Session->UserID == 0) {
		$Context->WarningCollector->Add($Context->GetDefinition("ErrSignInToDiscuss"));
		$CommentForm->FatalError = 1;
	} else if ($Context->Session->User->Permission('PERMISSION_HTML_ALLOWED')) {
		$enableEditor = 1;
	}

	// Define properties of the page controls that are specific to this page
	$Head->BodyId = 'PostPage';
	$Menu->CurrentTab = "discussions";
	$Panel->CssClass = "PostPanel";
	$Panel->BodyCssClass = "StartDiscussion";

// 2. BUILD PAGE CONTROLS

	// Build the control panel
	$Panel->AddList($Context->GetDefinition("Options"), 10);
	$Panel->AddListItem($Context->GetDefinition("Options"), $Context->GetDefinition("BackToMainPage"), GetUrl($Configuration, "index.php"));

// 3. ADD CONTROLS TO THE PAGE

	$Page->AddRenderControl($Head, $Configuration["CONTROL_POSITION_HEAD"]);
	$Page->AddRenderControl($Menu, $Configuration["CONTROL_POSITION_MENU"]);
	$Page->AddRenderControl($Panel, $Configuration["CONTROL_POSITION_PANEL"]);
	$Page->AddRenderControl($NoticeCollector, $Configuration['CONTROL_POSITION_NOTICES']);
	$Page->AddRenderControl($CommentForm, $Configuration["CONTROL_POSITION_BODY_ITEM"]);
	$Page->AddRenderControl($Foot, $Configuration["CONTROL_POSITION_FOOT"]);
	$Page->AddRenderControl($PageEnd, $Configuration["CONTROL_POSITION_PAGE_END"]);


// 4. FIRE PAGE EVENTS

	$Page->FireEvents();

if ($enableEditor){
	echo '<script type="text/javascript">KISSY.Editor("CommentBox")</script>';
}
?>