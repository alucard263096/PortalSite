<?php
/*

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+

/*
* Description: File used by Dynamic Data Management object to change the order of categories
*/

include('../appg/settings.php');
include('../appg/init_ajax.php');

$PostBackKey = ForceIncomingString('PostBackKey', '');
if ($PostBackKey == ''
	|| $PostBackKey !== $Context->Session->GetCsrfValidationKey()
) {
	die($Context->GetDefinition('ErrPostBackKeyInvalid'));
}

if (!$Context->Session->User->Permission('PERMISSION_SORT_CATEGORIES')) {
	die($Context->GetDefinition('ErrPermissionSortCategories'));
}

$Sql = 'update '. GetTableName('Category', $DatabaseTables, $Configuration["DATABASE_TABLE_PREFIX"])
	. ' set ' . $DatabaseColumns['Category']['Priority'] . " = '//1' where "
	. $DatabaseColumns['Category']['CategoryID'] ." = '//2';";

$SortOrder = ForceIncomingArray('CategoryID', array());
$ItemCount = count($SortOrder);
for ($i = 0; $i < $ItemCount; $i++) {
	$CatID = ForceInt($SortOrder[$i], null);
	if ($CatID !== null) {
		$ExecSql = str_replace(array('//1', '//2'), array($i, $CatID), $Sql);
		$Context->Database->Execute($ExecSql, 'AJAX', 'ReorderCategories', 'Failed to reorder categories', 0);
	}
}
$Context->Unload();
?>