<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


include('appg/settings.php');
$Configuration['SELF_URL'] = 'extension.php';
include('appg/init_guagua.php');

// 1. DEFINE VARIABLES AND PROPERTIES SPECIFIC TO THIS PAGE

	// Ensure the user is allowed to view this page
	$Context->Session->Check($Context);

	$Head->BodyId = 'ExtensionPage';

// 2. BUILD PAGE CONTROLS
	$PostBackAction = ForceIncomingString('PostBackAction', '');
	if ($PostBackAction == '') {
		$NoticeCollector->AddNotice($Context->GetDefinition('AboutExtensionPage'));
	}

// 3. ADD CONTROLS TO THE PAGE

	$Page->AddRenderControl($Head, $Configuration['CONTROL_POSITION_HEAD']);
	$Page->AddRenderControl($Menu, $Configuration['CONTROL_POSITION_MENU']);
	$Page->AddRenderControl($Panel, $Configuration['CONTROL_POSITION_PANEL']);
	$Page->AddRenderControl($NoticeCollector, $Configuration['CONTROL_POSITION_NOTICES']);
	$Page->AddRenderControl($Foot, $Configuration['CONTROL_POSITION_FOOT']);
	$Page->AddRenderControl($PageEnd, $Configuration['CONTROL_POSITION_PAGE_END']);

// 4. FIRE PAGE EVENTS

	$Page->FireEvents();

?>