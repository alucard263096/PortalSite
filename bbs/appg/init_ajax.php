<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+

// Make sure this file was not accessed directly and prevent register_globals configuration array attack
if (!defined('IN_GUAGUA')) exit();

include_once($Configuration['APPLICATION_PATH'].'appg/headers.php');
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
include_once($Configuration['LIBRARY_PATH'].'Framework/Framework.Class.Control.php');
include_once($Configuration['LIBRARY_PATH'].$Configuration['AUTHENTICATION_MODULE']);
include_once($Configuration['LIBRARY_PATH'].'People/People.Class.Session.php');
include_once($Configuration['LIBRARY_PATH'].'People/People.Class.PasswordHash.php');
include_once($Configuration['LIBRARY_PATH'].'People/People.Class.User.php');

$Context = new Context($Configuration);
$Context->DatabaseTables = &$DatabaseTables;
$Context->DatabaseColumns = &$DatabaseColumns;

// Start the session management
$Context->StartSession();

$Context->Session->Check($Context);

// DEFINE THE LANGUAGE DICTIONARY
include($Configuration['LANGUAGES_PATH'].$Configuration['LANGUAGE'].'/definitions.php');
include($Configuration['APPLICATION_PATH'].'conf/language.php');

// INSTANTIATE THE PAGE OBJECT
$Page = $Context->ObjectFactory->NewContextObject($Context, 'Page', $Configuration['PAGE_EVENTS']);

// FIRE INITIALIZATION EVENT
$Page->FireEvent('Page_Init');

// INCLUDE EXTENSIONS
// 2006-06-16 - Extensions are no long included here because bad extensions were causing standard ajax features to break.
// include($Configuration['APPLICATION_PATH'].'conf/extensions.php');
?>