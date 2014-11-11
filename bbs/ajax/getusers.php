<?php
/*

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+

/*
* Description: File used by Dynamic Data Management object to fill autocomplete data on user input field
*/

include('../appg/settings.php');
include('../appg/init_ajax.php');

$Search = ForceIncomingString('Search', '');
$Search = urldecode($Search);
$Search = FormatStringForDatabaseInput($Search);
if ($Search != '') {
	$s = $Context->ObjectFactory->NewContextObject($Context, 'SqlBuilder');
	$s->SetMainTable('User', 'u');
	$s->AddSelect('Name', 'u');
	$s->AddWhere('u', 'Name', '', $Search.'%', 'like');
	$s->AddOrderBy('Name', 'u', 'asc');
	$s->AddLimit(0,10);
	$ResultSet = $Context->Database->Select($s, 'Ajax', 'AutoComplete', 'An error occurred while retrieving autocomplete items.', 0);
	$Name = '';
	$Loop = 1;
	if ($ResultSet) {
		while ($row = $Context->Database->GetRow($ResultSet)) {
			if ($Loop > 1) echo ',';
			$Name = FormatStringForDisplay($row['Name'], 1);
			echo $Name;
			$Loop++;
		}
	}
}
$Context->Unload();
?>
