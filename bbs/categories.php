<?php
/*

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+

/*
* Description: Display and manipulate discussions
*/

include("appg/settings.php");
$Configuration['SELF_URL'] = 'categories.php';
include("appg/init_guagua.php");

// 1. DEFINE VARIABLES AND PROPERTIES SPECIFIC TO THIS PAGE

	// Ensure the user is allowed to view this page
	$Context->Session->Check($Context);
	if (!$Configuration["USE_CATEGORIES"]) {
		//@todo: Should the process die here?
		Redirect(GetUrl($Configuration, "index.php"), '302', '', 0);
	}

	// Define properties of the page controls that are specific to this page
	$Head->BodyId = 'CategoryPage';
	$Menu->CurrentTab = "categories";
	$Panel->CssClass = "CategoryPanel";
	$Panel->BodyCssClass = "Categories";
	$Context->PageTitle = $Context->GetDefinition("Categories");

// 2. BUILD PAGE CONTROLS

	// Add the category list to the body
	$CategoryList = $Context->ObjectFactory->CreateControl($Context, "CategoryList");

// 3. ADD CONTROLS TO THE PAGE

	$Page->AddRenderControl($Head, $Configuration["CONTROL_POSITION_HEAD"]);
	$Page->AddRenderControl($Menu, $Configuration["CONTROL_POSITION_MENU"]);
	$Page->AddRenderControl($Panel, $Configuration["CONTROL_POSITION_PANEL"]);
	$Page->AddRenderControl($NoticeCollector, $Configuration['CONTROL_POSITION_NOTICES']);
	$Page->AddRenderControl($CategoryList, $Configuration["CONTROL_POSITION_BODY_ITEM"]);
	$Page->AddRenderControl($Foot, $Configuration["CONTROL_POSITION_FOOT"]);
	$Page->AddRenderControl($PageEnd, $Configuration["CONTROL_POSITION_PAGE_END"]);

// 4. FIRE PAGE EVENTS

	$Page->FireEvents();

?>