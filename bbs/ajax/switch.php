<?php
/*

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+

/*
* Description: File used by Dynamic Data Management object to handle any type of boolean switch
*/

include('../appg/settings.php');
include('../appg/init_ajax.php');

$PostBackKey = ForceIncomingString('PostBackKey', '');
$ExtensionKey = ForceIncomingString('ExtensionKey', '');
if ($PostBackKey != '' && $PostBackKey == $Context->Session->GetCsrfValidationKey()) {
	$Type = ForceIncomingString('Type', '');
	if ($Type == 'Move') {
		$Switch = ForceIncomingInt('Switch', 0);
	} else {
		$Switch = ForceIncomingBool('Switch', 0);
	}
	$DiscussionID = ForceIncomingInt('DiscussionID', 0);
	$CommentID = ForceIncomingInt('CommentID', 0);

	// Don't create unnecessary objects
	if (in_array($Type, array('Active', 'Closed', 'Sticky', 'Sink', 'Move'))) {
		$dm = $Context->ObjectFactory->NewContextObject($Context, 'DiscussionManager');
	} elseif ($Type == 'Comment') {
		$cm = $Context->ObjectFactory->NewContextObject($Context, 'CommentManager');
	} else {
		// This will allow the switch class to be used to add new custom user settings
		$um = $Context->ObjectFactory->NewContextObject($Context, 'UserManager');
	}
	// Handle the switches
	if ($Type == 'Bookmark' && $DiscussionID > 0) {
		if ($Context->Session->UserID == 0) die();
		if ($Switch) {
			$um->AddBookmark($Context->Session->UserID, $DiscussionID);
		} else {
			$um->RemoveBookmark($Context->Session->UserID, $DiscussionID);
		}
	} elseif ($DiscussionID > 0 && (
		($Type == 'Active' && $Context->Session->User->Permission('PERMISSION_HIDE_DISCUSSIONS'))
		|| ($Type == 'Closed' && $Context->Session->User->Permission('PERMISSION_CLOSE_DISCUSSIONS'))
		|| ($Type == 'Sticky' && $Context->Session->User->Permission('PERMISSION_STICK_DISCUSSIONS'))
		|| ($Type == 'Sink' && $Context->Session->User->Permission('PERMISSION_SINK_DISCUSSIONS'))
		)) {
		$dm->SwitchDiscussionProperty($DiscussionID, $Type, $Switch);
	} elseif ($Type == 'Move') {
		$Discussion = $dm->GetDiscussionById($DiscussionID);
		if ($Context->Session->User->Permission('PERMISSION_MOVE_ANY_DISCUSSIONS')
			|| $Discussion->AuthUserID == $Context->Session->UserID
		) {
			$Result = $dm->MoveDiscussion($DiscussionID, $Switch);
		}
	} elseif ($Type == 'Comment' && $CommentID > 0 && $DiscussionID > 0 && $Context->Session->User->Permission('PERMISSION_HIDE_COMMENTS')) {
		$cm->SwitchCommentProperty($CommentID, $DiscussionID, $Switch);
	} elseif ($Type == 'SendNewApplicantNotifications') {
		$um->SwitchUserProperty($Context->Session->UserID, $Type, $Switch);
	} elseif ($Type != '') {
		$um->SwitchUserPreference($Type, $Switch);
	}

	echo 'Complete';
} else {
	echo $Context->GetDefinition('ErrPostBackKeyInvalid');
}
$Context->Unload();
?>
