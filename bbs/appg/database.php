<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


// Table References:
// Note that the User table does not implicitly use the TablePrefix that
// is added to all other table names by the SqlBuilder object.
$DatabaseTables['Category'] = 'Category';
$DatabaseTables['CategoryBlock'] = 'CategoryBlock';
$DatabaseTables['CategoryRoleBlock'] = 'CategoryRoleBlock';
$DatabaseTables['Comment'] = 'Comment';
$DatabaseTables['Discussion'] = 'Discussion';
$DatabaseTables['DiscussionUserWhisperFrom'] = 'DiscussionUserWhisperFrom';
$DatabaseTables['DiscussionUserWhisperTo'] = 'DiscussionUserWhisperTo';
$DatabaseTables['IpHistory'] = 'IpHistory';
$DatabaseTables['Role'] = 'Role';
$DatabaseTables['Style'] = 'Style';
$DatabaseTables['User'] = 'LUM_User';
$DatabaseTables['UserBookmark'] = 'UserBookmark';
$DatabaseTables['UserDiscussionWatch'] = 'UserDiscussionWatch';
$DatabaseTables['UserRoleHistory'] = 'UserRoleHistory';

// Tables which do not need concatenation with the Database prefix
$DatabasePrefixLessTables = array('User');

// Column References:

// Category Table
$DatabaseColumns['Category']['CategoryID'] = 'CategoryID';
$DatabaseColumns['Category']['Name'] = 'Name';
$DatabaseColumns['Category']['Description'] = 'Description';
$DatabaseColumns['Category']['Priority'] = 'Priority';
// CategoryBlock Table
$DatabaseColumns['CategoryBlock']['CategoryID'] = 'CategoryID';
$DatabaseColumns['CategoryBlock']['UserID'] = 'UserID';
$DatabaseColumns['CategoryBlock']['Blocked'] = 'Blocked';
// CategoryRoleBlock Table
$DatabaseColumns['CategoryRoleBlock']['CategoryID'] = 'CategoryID';
$DatabaseColumns['CategoryRoleBlock']['RoleID'] = 'RoleID';
$DatabaseColumns['CategoryRoleBlock']['Blocked'] = 'Blocked';
// Comment Table
$DatabaseColumns['Comment']['CommentID'] = 'CommentID';
$DatabaseColumns['Comment']['DiscussionID'] = 'DiscussionID';
$DatabaseColumns['Comment']['AuthUserID'] = 'AuthUserID';
$DatabaseColumns['Comment']['DateCreated'] = 'DateCreated';
$DatabaseColumns['Comment']['EditUserID'] = 'EditUserID';
$DatabaseColumns['Comment']['DateEdited'] = 'DateEdited';
$DatabaseColumns['Comment']['WhisperUserID'] = 'WhisperUserID';
$DatabaseColumns['Comment']['Body'] = 'Body';
$DatabaseColumns['Comment']['FormatType'] = 'FormatType';
$DatabaseColumns['Comment']['Deleted'] = 'Deleted';
$DatabaseColumns['Comment']['DateDeleted'] = 'DateDeleted';
$DatabaseColumns['Comment']['DeleteUserID'] = 'DeleteUserID';
$DatabaseColumns['Comment']['RemoteIp'] = 'RemoteIp';
// Discussion Table
$DatabaseColumns['Discussion']['DiscussionID'] = 'DiscussionID';
$DatabaseColumns['Discussion']['AuthUserID'] = 'AuthUserID';
$DatabaseColumns['Discussion']['WhisperUserID'] = 'WhisperUserID';
$DatabaseColumns['Discussion']['FirstCommentID'] = 'FirstCommentID';
$DatabaseColumns['Discussion']['LastUserID'] = 'LastUserID';
$DatabaseColumns['Discussion']['Active'] = 'Active';
$DatabaseColumns['Discussion']['Closed'] = 'Closed';
$DatabaseColumns['Discussion']['Sticky'] = 'Sticky';
$DatabaseColumns['Discussion']['Sink'] = 'Sink';
$DatabaseColumns['Discussion']['Name'] = 'Name';
$DatabaseColumns['Discussion']['DateCreated'] = 'DateCreated';
$DatabaseColumns['Discussion']['DateLastActive'] = 'DateLastActive';
$DatabaseColumns['Discussion']['CountComments'] = 'CountComments';
$DatabaseColumns['Discussion']['CategoryID'] = 'CategoryID';
$DatabaseColumns['Discussion']['WhisperToLastUserID'] = 'WhisperToLastUserID';
$DatabaseColumns['Discussion']['WhisperFromLastUserID'] = 'WhisperFromLastUserID';
$DatabaseColumns['Discussion']['DateLastWhisper'] = 'DateLastWhisper';
$DatabaseColumns['Discussion']['TotalWhisperCount'] = 'TotalWhisperCount';
// DiscussionUserWhisperFrom Table
$DatabaseColumns['DiscussionUserWhisperFrom']['DiscussionID'] = 'DiscussionID';
$DatabaseColumns['DiscussionUserWhisperFrom']['WhisperFromUserID'] = 'WhisperFromUserID';
$DatabaseColumns['DiscussionUserWhisperFrom']['LastUserID'] = 'LastUserID';
$DatabaseColumns['DiscussionUserWhisperFrom']['CountWhispers'] = 'CountWhispers';
$DatabaseColumns['DiscussionUserWhisperFrom']['DateLastActive'] = 'DateLastActive';
// DiscussionUserWhisperTo Table
$DatabaseColumns['DiscussionUserWhisperTo']['DiscussionID'] = 'DiscussionID';
$DatabaseColumns['DiscussionUserWhisperTo']['WhisperToUserID'] = 'WhisperToUserID';
$DatabaseColumns['DiscussionUserWhisperTo']['LastUserID'] = 'LastUserID';
$DatabaseColumns['DiscussionUserWhisperTo']['CountWhispers'] = 'CountWhispers';
$DatabaseColumns['DiscussionUserWhisperTo']['DateLastActive'] = 'DateLastActive';
// IpHistory Table
$DatabaseColumns['IpHistory']['IpHistoryID'] = 'IpHistoryID';
$DatabaseColumns['IpHistory']['RemoteIp'] = 'RemoteIp';
$DatabaseColumns['IpHistory']['UserID'] = 'UserID';
$DatabaseColumns['IpHistory']['DateLogged'] = 'DateLogged';
// Role Table
$DatabaseColumns['Role']['RoleID'] = 'RoleID';
$DatabaseColumns['Role']['Name'] = 'Name';
$DatabaseColumns['Role']['Icon'] = 'Icon';
$DatabaseColumns['Role']['Description'] = 'Description';
$DatabaseColumns['Role']['Active'] = 'Active';
$DatabaseColumns['Role']['PERMISSION_SIGN_IN'] = 'PERMISSION_SIGN_IN';
$DatabaseColumns['Role']['PERMISSION_HTML_ALLOWED'] = 'PERMISSION_HTML_ALLOWED';
$DatabaseColumns['Role']['PERMISSION_RECEIVE_APPLICATION_NOTIFICATION'] = 'PERMISSION_RECEIVE_APPLICATION_NOTIFICATION';
$DatabaseColumns['Role']['Permissions'] = 'Permissions';
$DatabaseColumns['Role']['Priority'] = 'Priority';
$DatabaseColumns['Role']['Unauthenticated'] = 'Unauthenticated';
// Style Table
$DatabaseColumns['Style']['StyleID'] = 'StyleID';
$DatabaseColumns['Style']['AuthUserID'] = 'AuthUserID';
$DatabaseColumns['Style']['Name'] = 'Name';
$DatabaseColumns['Style']['Url'] = 'Url';
$DatabaseColumns['Style']['PreviewImage'] = 'PreviewImage';
// User Table
$DatabaseColumns['User']['UserID'] = 'UserID';
$DatabaseColumns['User']['RoleID'] = 'RoleID';
$DatabaseColumns['User']['StyleID'] = 'StyleID';
$DatabaseColumns['User']['CustomStyle'] = 'CustomStyle';
$DatabaseColumns['User']['FirstName'] = 'FirstName';
$DatabaseColumns['User']['LastName'] = 'LastName';
$DatabaseColumns['User']['Name'] = 'Name';
$DatabaseColumns['User']['Password'] = 'Password';
$DatabaseColumns['User']['VerificationKey'] = 'VerificationKey';
$DatabaseColumns['User']['EmailVerificationKey'] = 'EmailVerificationKey';
$DatabaseColumns['User']['Email'] = 'Email';
$DatabaseColumns['User']['UtilizeEmail'] = 'UtilizeEmail';
$DatabaseColumns['User']['ShowName'] = 'ShowName';
$DatabaseColumns['User']['Icon'] = 'Icon';
$DatabaseColumns['User']['Picture'] = 'Picture';
$DatabaseColumns['User']['Attributes'] = 'Attributes';
$DatabaseColumns['User']['CountVisit'] = 'CountVisit';
$DatabaseColumns['User']['CountDiscussions'] = 'CountDiscussions';
$DatabaseColumns['User']['CountComments'] = 'CountComments';
$DatabaseColumns['User']['DateFirstVisit'] = 'DateFirstVisit';
$DatabaseColumns['User']['DateLastActive'] = 'DateLastActive';
$DatabaseColumns['User']['RemoteIp'] = 'RemoteIp';
$DatabaseColumns['User']['LastDiscussionPost'] = 'LastDiscussionPost';
$DatabaseColumns['User']['DiscussionSpamCheck'] = 'DiscussionSpamCheck';
$DatabaseColumns['User']['LastCommentPost'] = 'LastCommentPost';
$DatabaseColumns['User']['CommentSpamCheck'] = 'CommentSpamCheck';
$DatabaseColumns['User']['UserBlocksCategories'] = 'UserBlocksCategories';
$DatabaseColumns['User']['DefaultFormatType'] = 'DefaultFormatType';
$DatabaseColumns['User']['Discovery'] = 'Discovery';
$DatabaseColumns['User']['Preferences'] = 'Preferences';
$DatabaseColumns['User']['SendNewApplicantNotifications'] = 'SendNewApplicantNotifications';
// UserBookmark Table
$DatabaseColumns['UserBookmark']['UserID'] = 'UserID';
$DatabaseColumns['UserBookmark']['DiscussionID'] = 'DiscussionID';
// UserDiscussionWatch Table
$DatabaseColumns['UserDiscussionWatch']['UserID'] = 'UserID';
$DatabaseColumns['UserDiscussionWatch']['DiscussionID'] = 'DiscussionID';
$DatabaseColumns['UserDiscussionWatch']['CountComments'] = 'CountComments';
$DatabaseColumns['UserDiscussionWatch']['LastViewed'] = 'LastViewed';
// UserRoleHistory Table
$DatabaseColumns['UserRoleHistory']['UserID'] = 'UserID';
$DatabaseColumns['UserRoleHistory']['RoleID'] = 'RoleID';
$DatabaseColumns['UserRoleHistory']['Date'] = 'Date';
$DatabaseColumns['UserRoleHistory']['AdminUserID'] = 'AdminUserID';
$DatabaseColumns['UserRoleHistory']['Notes'] = 'Notes';
$DatabaseColumns['UserRoleHistory']['RemoteIp'] = 'RemoteIp';

$DatabaseTables['Attachment'] = 'Attachment';
$DatabaseColumns['Attachment']['AttachmentID'] = 'AttachmentID';
$DatabaseColumns['Attachment']['UserID'] = 'UserID';
$DatabaseColumns['Attachment']['DiscussionID'] = 'DiscussionID';
$DatabaseColumns['Attachment']['CommentID'] = 'CommentID';
$DatabaseColumns['Attachment']['Title'] = 'Title';
$DatabaseColumns['Attachment']['Name'] = 'Name';
$DatabaseColumns['Attachment']['Path'] = 'Path';
$DatabaseColumns['Attachment']['Size'] = 'Size';
$DatabaseColumns['Attachment']['MimeType'] = 'MimeType';
$DatabaseColumns['Attachment']['DateCreated'] = 'DateCreated';

?>