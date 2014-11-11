<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


/**
 * Discussion Comment class.
 * @package Guagua
 */
class Comment extends Delegation {
	var $CommentID;
	var $DiscussionID;
	var $Discussion;				// Display purposes only
	var $CategoryID;
	var $Category;
	var $AuthUserID;
	var $AuthUsername;		// Display purposes only - User's username
	var $AuthIcon;
	var $AuthRoleID;
	var $AuthRole;
	var $AuthRoleIcon;
	var $AuthCanPostHtml;	// Is this author in a role where posting html is allowed
	var $AuthBlocked;			// Is this author blocked from posting html by the viewing user?
	var $CommentBlocked;		// Is this comment blocked from visible html by the viewing user?
	var $EditUserID;
	var $EditUsername;		// Display purposes only - Editing user's username
	var $DateCreated;
	var $DateEdited;
	var $Body;				// Actual body of the comment
	var $FormatType;		// How should the comment be formatted for display?
	var $Deleted;			// Boolean value indicating if the comment shows up to users
	var $DateDeleted;
	var $DeleteUserID;
	var $DeleteUsername;	// Display purposes only - Deleting user's username
	var $RemoteIp;
	var $Status;
	// Used to prevent double posts and "back button" posts
	var $UserCommentCount;
	var $ShowHtml;
	var $WhisperUserID;	// The user being whispered to
	var $WhisperUsername;
	var $DiscussionWhisperUserID;

	// Clears all properties
	function Clear() {
		$this->CommentID = 0;
		$this->DiscussionID = 0;
		$this->Discussion = '';
		$this->CategoryID = 0;
		$this->Category = '';
		$this->AuthUserID = 0;
		$this->AuthUsername = '';
		$this->AuthIcon = '';
		$this->AuthRoleID = 0;
		$this->AuthRole = '';
		$this->AuthRoleIcon = '';
		$this->AuthCanPostHtml = 0;
		$this->AuthBlocked = 0;
		$this->CommentBlocked = 0;
		$this->EditUserID = 0;
		$this->EditUsername = '';
		$this->DateCreated = '';
		$this->DateEdited = '';
		$this->Body = '';
		$this->FormatType = 'Text';
		$this->Deleted = 0;
		$this->DateDeleted = '';
		$this->DeleteUserID = 0;
		$this->DeleteUsername = '';
		$this->RemoteIp = '';
		$this->Status = '';
		$this->UserCommentCount = 0;
		$this->ShowHtml = 1;
		$this->WhisperUserID = 0;
		$this->WhisperUsername = '';
		$this->DiscussionWhisperUserID = 0;
	}

	function Comment(&$Context) {
		$this->Name = 'Comment';
		$this->Delegation($Context);
		$this->Clear();
	}

	function FormatPropertiesForDatabaseInput() {
		// Pass the body into a formatter for db input
		$this->Body = $this->Context->FormatString($this->Body, $this, $this->FormatType, FORMAT_STRING_FOR_DATABASE);
		$this->Body = FormatStringForDatabaseInput($this->Body);
		$this->WhisperUsername = FormatStringForDatabaseInput($this->WhisperUsername);
	}

	function FormatPropertiesForDisplay($ForFormDisplay = '0') {
		$this->CallDelegate('PreFormatPropertiesForDisplay');

		if ($this->Deleted) $this->ShowHtml = 0;
		if (!$this->AuthCanPostHtml) $this->ShowHtml = 0;
		if ($this->AuthBlocked) $this->ShowHtml = 0;
		if ($this->CommentBlocked) $this->ShowHtml = 0;

		$this->AuthUsername = FormatStringForDisplay($this->AuthUsername);
		$this->EditUsername = FormatStringForDisplay($this->EditUsername);
		$this->DeleteUsername = FormatStringForDisplay($this->DeleteUsername);
		$this->WhisperUsername = FormatStringForDisplay($this->WhisperUsername);
		$this->Discussion = FormatStringForDisplay($this->Discussion);
		$this->Category = FormatStringForDisplay($this->Category);
		//$this->Body = htmlspecialchars($this->Body);  //for display html
		$this->AuthIcon = FormatStringForDisplay($this->AuthIcon, 1, 0);
		return $this->ShowHtml;
	}

	function FormatPropertiesForSafeDisplay() {
		// Make sure to pass the body through global string formatters
		$this->Body = $this->Context->StringManipulator->GlobalParse($this->Body, $this, FORMAT_STRING_FOR_DISPLAY);

		$this->AuthUsername = FormatStringForDisplay($this->AuthUsername);
		$this->EditUsername = FormatStringForDisplay($this->EditUsername);
		$this->DeleteUsername = FormatStringForDisplay($this->DeleteUsername);
		$this->WhisperUsername = FormatStringForDisplay($this->WhisperUsername);
		$this->Discussion = FormatStringForDisplay($this->Discussion);
		$this->Category = FormatStringForDisplay($this->Category);
		$this->Body = FormatHtmlStringInline($this->Body, 0, 1);
		$this->AuthIcon = FormatStringForDisplay($this->AuthIcon, 1, 0);
		$this->CallDelegate('PostFormatPropertiesForSafeDisplay');
	}

	// Retrieve a properties from current DataRowSet
	// Returns void
	function GetPropertiesFromDataSet($DataSet, $UserID) {
		$this->CommentID = ForceInt(@$DataSet['CommentID'], 0);
		$this->DiscussionID = ForceInt(@$DataSet['DiscussionID'], 0);
		$this->Discussion = ForceString(@$DataSet['Discussion'], '');
		$this->CategoryID = ForceInt(@$DataSet['CategoryID'], 0);
		$this->Category = ForceString(@$DataSet['Category'], '');
		$this->AuthUserID = ForceInt(@$DataSet['AuthUserID'], 0);
		$this->AuthUsername = ForceString(@$DataSet['AuthUsername'], '');
		$this->AuthIcon = ForceString(@$DataSet['AuthIcon'], '');
		$this->AuthRoleID = ForceInt(@$DataSet['AuthRoleID'], 0);
		$this->AuthRole = ForceString(@$DataSet['AuthRole'], '');
		$this->AuthRoleIcon = ForceString(@$DataSet['AuthRoleIcon'], '');
		$this->AuthCanPostHtml = ForceBool(@$DataSet['AuthCanPostHtml'], 0);
		$this->AuthBlocked = ForceBool(@$DataSet['AuthBlocked'], 0);
		$this->CommentBlocked = ForceBool(@$DataSet['CommentBlocked'], 0);
		$this->EditUserID = ForceInt(@$DataSet['EditUserID'], 0);
		$this->EditUsername = ForceString(@$DataSet['EditUsername'], '');
		$this->DateCreated = UnixTimestamp(@$DataSet['DateCreated']);
		$this->DateEdited = UnixTimestamp(@$DataSet['DateEdited']);
		$this->Body = ForceString(@$DataSet['Body'], '');
		$this->FormatType = ForceString(@$DataSet['FormatType'], $this->Context->Configuration['DEFAULT_FORMAT_TYPE']);
		if (!in_array($this->FormatType, $this->Context->Configuration['FORMAT_TYPES'])) $this->FormatType = $this->Context->Configuration['DEFAULT_FORMAT_TYPE'];
		$this->Deleted = ForceBool(@$DataSet['Deleted'], 0);
		$this->DateDeleted = UnixTimestamp(@$DataSet['DateDeleted']);
		$this->DeleteUserID = ForceInt(@$DataSet['DeleteUserID'], 0);
		$this->DeleteUsername = ForceString(@$DataSet['DeleteUsername'], '');
		$this->RemoteIp = ForceString(@$DataSet['RemoteIp'], '');

		$this->WhisperUserID = ForceInt(@$DataSet['WhisperUserID'], 0);
		$this->WhisperUsername = ForceString(@$DataSet['WhisperUsername'], '');
		$this->DiscussionWhisperUserID = ForceInt(@$DataSet['DiscussionWhisperUserID'], 0);

		$this->Status = $this->GetStatus($UserID);

		$this->DelegateParameters['DataSet'] = &$DataSet;
		$this->CallDelegate('PostGetPropertiesFromDataSet');

		if ($this->AuthRoleIcon != '') $this->AuthIcon = $this->AuthRoleIcon;
	}

	// Retrieve properties from incoming form variables
	// Returns void
	function GetPropertiesFromForm() {
		$this->CommentID = ForceIncomingInt('CommentID', 0);
		$this->DiscussionID = ForceIncomingInt('DiscussionID', 0);
		$this->FormatType = ForceIncomingString('FormatType', $this->Context->Configuration['DEFAULT_FORMAT_TYPE']);
		if (!in_array($this->FormatType, $this->Context->Configuration['FORMAT_TYPES'])) $this->FormatType = $this->Context->Configuration['DEFAULT_FORMAT_TYPE'];
		$this->Body = ForceIncomingString('Body', '');
		$this->UserCommentCount = ForceIncomingInt('UserCommentCount', 0);
		$this->AuthUserID = ForceIncomingInt('AuthUserID', 0);
		$this->WhisperUsername = ForceIncomingString('WhisperUsername', '');
	}


	function GetStatus($UserID) {
		$sReturn = '';
		if ($this->WhisperUserID > 0) {
			if ($this->AuthUserID == $UserID) {
				$sReturn = 'WhisperFrom';
			} else {
				$sReturn = 'WhisperTo';
			}
		} elseif ($this->DiscussionWhisperUserID > 0) {
			if ($this->AuthUserID == $this->DiscussionWhisperUserID) {
				$sReturn = 'WhisperFrom';
			} else {
				$sReturn = 'WhisperTo';
			}
			if ($this->DiscussionWhisperUserID != $UserID) {
				if ($sReturn == 'WhisperFrom') {
					$sReturn = 'WhisperTo';
				} else {
					$sReturn = 'WhisperFrom';
				}
			}
		}
		return $sReturn;
	}
}

?>