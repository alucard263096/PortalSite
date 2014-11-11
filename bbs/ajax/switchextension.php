<?php
/*

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+

/*
* Description: File used by the Extension management form to handle turning extensions on and off
*/

include('../appg/settings.php');
include('../appg/init_ajax.php');

$PostBackKey = ForceIncomingString('PostBackKey', '');
$ExtensionKey = ForceIncomingString('ExtensionKey', '');
if ($PostBackKey != ''
	&& $PostBackKey == $Context->Session->GetCsrfValidationKey()
) {
	$ExtensionForm = $Context->ObjectFactory->CreateControl($Context, 'ExtensionForm');
	if ($ExtensionForm->SwitchExtension($ExtensionKey)) {
		echo $ExtensionKey;
	} else {
		$Context->WarningCollector->WritePlain();
	}
} else {
	echo $Context->GetDefinition('ErrPostBackKeyInvalid');
}
$Context->Unload();
?>