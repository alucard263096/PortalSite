<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


/*
* ATTENTION: !DO NOT CHANGE ANYTHING IN THIS FILE!
*
* If you wish to override any configuration setting, do it in the
* conf/settings.php file. This file will be overwritten when you apply upgrades
* to Guagua. The conf/settings.php file will NOT be overwritten.
*/

ob_start();

$Configuration = array();

// Database Settings
$Configuration['DATABASE_SERVER'] = 'MySQL';
$Configuration['DATABASE_TABLE_PREFIX'] = 'GuaGua_';
$Configuration['DATABASE_HOST'] = 'localhost';
$Configuration['DATABASE_NAME'] = 'your_guagua_database_name';
$Configuration['DATABASE_USER'] = 'your_guagua_database_user_name';
$Configuration['DATABASE_PASSWORD'] = 'your_guagua_database_password';
$Configuration['FARM_DATABASE_HOST'] = '';
$Configuration['FARM_DATABASE_NAME'] = 'your_farm_database_name';
$Configuration['FARM_DATABASE_USER'] = 'your_farm_database_user_name';
$Configuration['FARM_DATABASE_PASSWORD'] = 'your_farm_database_password';
$Configuration['DATABASE_CHARACTER_ENCODING'] = '';
$Configuration['DATABASE_VERSION'] = '1';

// Path Settings
$Configuration['APPLICATION_PATH'] = '/path/to/guagua/';
$Configuration['DATABASE_PATH'] = '/path/to/your/database/file.php';
$Configuration['LIBRARY_PATH'] = '/path/to/your/library/';
$Configuration['EXTENSIONS_PATH'] = '/path/to/your/extensions/';
$Configuration['LANGUAGES_PATH'] = '/path/to/your/languages/';
$Configuration['THEME_PATH'] = '/path/to/guagua/themes/guagua/';
$Configuration['BASE_URL'] = 'http://your.base.url/to/guagua/';
$Configuration['DEFAULT_STYLE'] = '/guagua/themes/guagua/styles/default/';
$Configuration['WEB_ROOT'] = '/guagua/';
$Configuration['SIGNIN_URL'] = 'people.php';
$Configuration['SIGNOUT_URL'] = 'people.php?PostBackAction=SignOutNow';

// People Settings
$Configuration['AUTHENTICATION_MODULE'] = 'People/People.Class.Authenticator.php';
$Configuration['AUTHENTICATION_CLASS'] = 'Authenticator';
$Configuration['SESSION_NAME'] = '';
$Configuration['COOKIE_USER_KEY'] = 'guaguacookieone';
$Configuration['COOKIE_VERIFICATION_KEY'] = 'guaguacookietwo';
$Configuration['ENCRYPT_COOKIE_USER_KEY'] = '0';
$Configuration['SESSION_USER_IDENTIFIER'] = 'GuaguaUserID';
$Configuration['COOKIE_DOMAIN'] = '.domain.com';
$Configuration['COOKIE_PATH'] = '/';
$Configuration['HTTP_ONLY_COOKIE'] = '0';
$Configuration['SUPPORT_EMAIL'] = 'support@domain.com';
$Configuration['SUPPORT_NAME'] = 'Support';
$Configuration['LOG_ALL_IPS'] = '0';
$Configuration['FORWARD_VALIDATED_USER_URL'] = './';
$Configuration['ALLOW_IMMEDIATE_ACCESS'] = '0';
$Configuration['DEFAULT_ROLE'] = '0';
$Configuration['APPROVAL_ROLE'] = '3';
$Configuration['SAFE_REDIRECT'] = 'people.php?PageAction=SignOutNow';
$Configuration['PEOPLE_USE_EXTENSIONS'] = '1';
$Configuration['DEFAULT_EMAIL_VISIBLE'] = '0';
$Configuration['PASSWORD_HASH_ITERATION'] = '8';
$Configuration['PASSWORD_HASH_PORTABLE'] = '1';

// Framework Settings
$Configuration['SMTP_HOST'] = '';
$Configuration['SMTP_EMAIL'] = '';
$Configuration['SMTP_USER'] = '';
$Configuration['SMTP_PASSWORD'] = '';
$Configuration['DEFAULT_EMAIL_MIME_TYPE'] = 'text/plain';
$Configuration['LANGUAGE'] = "Chinese";
$Configuration['URL_BUILDING_METHOD'] = '0';
$Configuration['CHARSET'] = 'utf-8';
$Configuration['PAGE_EVENTS'] = array('Page_Init', 'Page_Render', 'Page_Unload');
$Configuration['LIBRARY_NAMESPACE_ARRAY'] = array('Framework', 'People', 'Guagua');
$Configuration['LIBRARY_INCLUDE_PATH'] = '%LIBRARY%';
$Configuration['DEFAULT_FORMAT_TYPE'] = 'Html';
$Configuration['FORMAT_TYPES'] = array('Html','Text');
$Configuration['APPLICATION_TITLE'] = 'Guagua';
$Configuration['BANNER_TITLE'] = 'Guagua';
$Configuration['WEB_ICPBEIAN'] = '京ICP备6868号';
$Configuration['UPDATE_REMINDER'] = 'Monthly';
$Configuration['LAST_UPDATE'] = '';
$Configuration['HTTP_METHOD'] = 'http'; // Could alternately be https

// Guagua Settings
$Configuration['ENABLE_WHISPERS'] = '0';
$Configuration['DISCUSSIONS_PER_PAGE'] = '10';
$Configuration['COMMENTS_PER_PAGE'] = '10';
$Configuration['SEARCH_RESULTS_PER_PAGE'] = '10';
$Configuration['ALLOW_NAME_CHANGE'] = '1';
$Configuration['ALLOW_EMAIL_CHANGE'] = '1';
$Configuration['ALLOW_PASSWORD_CHANGE'] = '1';
$Configuration['USE_REAL_NAMES'] = '1';
$Configuration['PUBLIC_BROWSING'] = '1';
$Configuration['USE_CATEGORIES'] = '1';
$Configuration['MAX_COMMENT_LENGTH'] = '5000';
$Configuration['MAX_TOPIC_WORD_LENGTH'] = '60';
$Configuration['DISCUSSION_POST_THRESHOLD'] = '3';
$Configuration['DISCUSSION_TIME_THRESHOLD'] = '60';
$Configuration['DISCUSSION_THRESHOLD_PUNISHMENT'] = '120';
$Configuration['COMMENT_POST_THRESHOLD'] = '5';
$Configuration['COMMENT_TIME_THRESHOLD'] = '60';
$Configuration['COMMENT_THRESHOLD_PUNISHMENT'] = '120';
$Configuration['UPDATE_URL'] = 'http://localhost/guagua/getversion.php';

// Guagua Control Positions
$Configuration['CONTROL_POSITION_HEAD'] = '100';
$Configuration['CONTROL_POSITION_MENU'] = '200';
$Configuration['CONTROL_POSITION_BANNER'] = '200';
$Configuration['CONTROL_POSITION_PANEL'] = '300';
$Configuration['CONTROL_POSITION_NOTICES'] = '400';
$Configuration['CONTROL_POSITION_BODY_ITEM'] = '500';
$Configuration['CONTROL_POSITION_FOOT'] = '600';
$Configuration['CONTROL_POSITION_PAGE_END'] = '700';

// Guagua Tab Positions
$Configuration['TAB_POSITION_DISCUSSIONS'] = '10';
$Configuration['TAB_POSITION_CATEGORIES'] = '20';
$Configuration['TAB_POSITION_SEARCH'] = '30';
$Configuration['TAB_POSITION_SETTINGS'] = '40';
$Configuration['TAB_POSITION_ACCOUNT'] = '50';

// Url Rewriting Definitions
$Configuration['REWRITE_PageName_Array'] = array('./','index.php','categories.php','comments.php', 'search.php', 'extension.php');

// Default values for role permissions
// Standard Permissions
$Configuration['PERMISSION_SIGN_IN'] = '0';
$Configuration['PERMISSION_ADD_COMMENTS'] = '0';
$Configuration['PERMISSION_START_DISCUSSION'] = '0';
$Configuration['PERMISSION_HTML_ALLOWED'] = '0';
// Discussion Moderator Permissions
$Configuration['PERMISSION_SINK_DISCUSSIONS'] = '0';
$Configuration['PERMISSION_STICK_DISCUSSIONS'] = '0';
$Configuration['PERMISSION_HIDE_DISCUSSIONS'] = '0';
$Configuration['PERMISSION_CLOSE_DISCUSSIONS'] = '0';
$Configuration['PERMISSION_EDIT_DISCUSSIONS'] = '0';
$Configuration['PERMISSION_VIEW_HIDDEN_DISCUSSIONS'] = '0';
$Configuration['PERMISSION_MOVE_ANY_DISCUSSIONS'] = '0';
$Configuration['PERMISSION_EDIT_COMMENTS'] = '0';
$Configuration['PERMISSION_HIDE_COMMENTS'] = '0';
$Configuration['PERMISSION_VIEW_HIDDEN_COMMENTS'] = '0';
$Configuration['PERMISSION_ADD_COMMENTS_TO_CLOSED_DISCUSSION'] = '0';
$Configuration['PERMISSION_ADD_CATEGORIES'] = '0';
$Configuration['PERMISSION_EDIT_CATEGORIES'] = '0';
$Configuration['PERMISSION_REMOVE_CATEGORIES'] = '0';
$Configuration['PERMISSION_SORT_CATEGORIES'] = '0';
$Configuration['PERMISSION_VIEW_ALL_WHISPERS'] = '0';
// User Moderator Permissions
$Configuration['PERMISSION_APPROVE_APPLICANTS'] = '0';
$Configuration['PERMISSION_RECEIVE_APPLICATION_NOTIFICATION'] = '0';
$Configuration['PERMISSION_CHANGE_USER_ROLE'] = '0';
$Configuration['PERMISSION_EDIT_USERS'] = '0';
$Configuration['PERMISSION_IP_ADDRESSES_VISIBLE'] = '0';
$Configuration['PERMISSION_MANAGE_REGISTRATION'] = '0';
$Configuration['PERMISSION_SORT_ROLES'] = '0';
$Configuration['PERMISSION_ADD_ROLES'] = '0';
$Configuration['PERMISSION_EDIT_ROLES'] = '0';
$Configuration['PERMISSION_REMOVE_ROLES'] = '0';
// Administrative Permissions
$Configuration['PERMISSION_CHECK_FOR_UPDATES'] = '0';
$Configuration['PERMISSION_CHANGE_APPLICATION_SETTINGS'] = '0';
$Configuration['PERMISSION_MANAGE_EXTENSIONS'] = '0';
$Configuration['PERMISSION_MANAGE_LANGUAGE'] = '0';
$Configuration['PERMISSION_MANAGE_THEMES'] = '0';
$Configuration['PERMISSION_MANAGE_STYLES'] = '0';
$Configuration['PERMISSION_ALLOW_DEBUG_INFO'] = '0';

// Default values for User Preferences
$Configuration['PREFERENCE_HtmlOn'] = '1';
$Configuration['PREFERENCE_ShowAppendices'] = '1';
$Configuration['PREFERENCE_ShowSavedSearches'] = '1';
$Configuration['PREFERENCE_ShowTextToggle'] = '1';
$Configuration['PREFERENCE_JumpToLastReadComment'] = '1';
$Configuration['PREFERENCE_ShowLargeCommentBox'] = '0';
$Configuration['PREFERENCE_ShowFormatSelector'] = '1';
$Configuration['PREFERENCE_ShowDeletedDiscussions'] = '1';
$Configuration['PREFERENCE_ShowDeletedComments'] = '1';

// Newbie settings
// Has Guagua been installed (this will be set to true in conf/settings.php when setup completes)
$Configuration['SETUP_COMPLETE'] = '0';
$Configuration['ADDON_NOTICE'] = '1';

// Application versions
include(dirname(__FILE__) . '/version.php');

// Application Mode Constants
define('MODE_DEBUG', 'DEBUG');
define('MODE_RELEASE', 'RELEASE');

// Format type definitions
define('FORMAT_STRING_FOR_DISPLAY', 'DISPLAY');
define('FORMAT_STRING_FOR_DATABASE', 'DATABASE');

// PHP Settings
define('MAGIC_QUOTES_ON', get_magic_quotes_gpc());

// Self Url (should be hard-coded by each page - this is here just in case it was forgotten)
$Configuration['SELF_URL'] = @$_SERVER['PHP_SELF'];

// Include custom settings
@include(dirname(__FILE__) . '/../conf/settings.php');
if ($Configuration['SETUP_COMPLETE'] == '0') {
	header('Location: ./setup/index.php');
	exit();
}

// Define a constant to prevent a register_globals attack on the configuration paths
define('IN_GUAGUA', '1');

//upgrade database
if ($Configuration['DATABASE_VERSION'] < 2) {
	include_once($Configuration['APPLICATION_PATH'].'appg/database.php');
	include_once($Configuration['DATABASE_PATH']);
	include_once($Configuration['LIBRARY_PATH'].'Framework/Framework.Functions.php');
	include_once($Configuration['LIBRARY_PATH'].'Framework/Framework.Class.Database.php');
	include_once($Configuration['LIBRARY_PATH'].'Framework/Framework.Class.'.$Configuration['DATABASE_SERVER'].'.php');
	include_once($Configuration['LIBRARY_PATH'].'Framework/Framework.Class.SqlBuilder.php');
	include_once($Configuration['LIBRARY_PATH'].'Framework/Framework.Class.MessageCollector.php');
	include_once($Configuration['LIBRARY_PATH'].'Framework/Framework.Class.ErrorManager.php');
	include_once($Configuration['LIBRARY_PATH'].'Framework/Framework.Class.ObjectFactory.php');
	include_once($Configuration['LIBRARY_PATH'].'Framework/Framework.Class.StringManipulator.php');
	include_once($Configuration['LIBRARY_PATH'].'Framework/Framework.Class.Context.php');
	include_once($Configuration['LIBRARY_PATH'].'Framework/Framework.Class.Delegation.php');
	include_once($Configuration['LIBRARY_PATH'].'Guagua/Guagua.Functions.php');
	include_once($Configuration['LIBRARY_PATH'].$Configuration['AUTHENTICATION_MODULE']);
	include_once($Configuration['LIBRARY_PATH'].'People/People.Class.Session.php');
	include_once($Configuration['LIBRARY_PATH'].'People/People.Class.PasswordHash.php');
	include_once($Configuration['LIBRARY_PATH'].'People/People.Class.User.php');

	$Context = new Context($Configuration);
	$Context->DatabaseTables = &$DatabaseTables;
	$Context->DatabaseColumns = &$DatabaseColumns;

	$Query = 'ALTER TABLE '
		. GetTableName('User', $DatabaseTables, $Configuration["DATABASE_TABLE_PREFIX"])
		. ' CHANGE ' . $DatabaseColumns['User']['Password'].' '
		. $DatabaseColumns['User']['Password'] . ' VARBINARY( 34 ) NULL DEFAULT NULL';
	if ($Context->Database->Execute($Query,'','','',0)) {
		AddConfigurationSetting($Context, 'DATABASE_VERSION', '2');
	}
	unset($Context, $Query);
}

?>
