<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


include("appg/settings.php");
$Configuration['SELF_URL'] = 'people.php';
include("appg/init_people.php");

// Define properties of the page controls that are specific to this page
$SignInForm = $Context->ObjectFactory->CreateControl($Context, "SignInForm", "frmSignIn");
$Leave = $Context->ObjectFactory->CreateControl($Context, "Leave");
$ApplyForm = $Context->ObjectFactory->CreateControl($Context, "ApplyForm", "ApplicationForm");
$PasswordRequestForm = $Context->ObjectFactory->CreateControl($Context, "PasswordRequestForm", "PasswordRequestForm");
$PasswordResetForm = $Context->ObjectFactory->CreateControl($Context, "PasswordResetForm", "PasswordResetForm");
$CompleteRegistration = $Context->ObjectFactory->CreateControl($Context, "CompleteRegistration", "CompleteRegistration");

// Add the controls to the page
$Page->AddRenderControl($Head, $Configuration["CONTROL_POSITION_HEAD"]);
$Page->AddRenderControl($Banner, $Configuration["CONTROL_POSITION_BANNER"]);
$Page->AddRenderControl($SignInForm, $Configuration["CONTROL_POSITION_BODY_ITEM"]);
$Page->AddRenderControl($Leave, $Configuration["CONTROL_POSITION_BODY_ITEM"]);
$Page->AddRenderControl($ApplyForm, $Configuration["CONTROL_POSITION_BODY_ITEM"]);
$Page->AddRenderControl($PasswordRequestForm, $Configuration["CONTROL_POSITION_BODY_ITEM"]);
$Page->AddRenderControl($PasswordResetForm, $Configuration["CONTROL_POSITION_BODY_ITEM"]);
$Page->AddRenderControl($CompleteRegistration, $Configuration["CONTROL_POSITION_BODY_ITEM"]);
$Page->AddRenderControl($Foot, $Configuration["CONTROL_POSITION_FOOT"]);
$Page->AddRenderControl($PageEnd, $Configuration["CONTROL_POSITION_PAGE_END"]);

// 4. FIRE PAGE EVENTS
$Page->FireEvents();
?>
