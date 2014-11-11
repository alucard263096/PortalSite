<?php
/*

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+

/*
* Description: File used by Dynamic Data Management object to block/unblock categories
*/

include('../appg/settings.php');
include('../appg/init_ajax.php');
$PostBackKey = ForceIncomingString('PostBackKey', '');
$ExtensionKey = ForceIncomingString('ExtensionKey', '');
if ($PostBackKey != '' && $PostBackKey == $Context->Session->GetCsrfValidationKey()) {
	$Block = ForceIncomingBool('Block', 0);
	$BlockCategoryID = ForceIncomingInt('BlockCategoryID', 0);

	if ($BlockCategoryID > 0) {
		$um = $Context->ObjectFactory->NewContextObject($Context, 'UserManager');
		if ($Block) {
			$um->AddCategoryBlock($BlockCategoryID);
		} else {
			$um->RemoveCategoryBlock($BlockCategoryID);
		}
	}

	// Report success
	echo 'Complete';
} else {
	echo $Context->GetDefinition('ErrPostBackKeyInvalid');
}
$Context->Unload();
?>