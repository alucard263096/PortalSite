<?php
/*

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+

/*
* Description: File used by Dynamic Data Management object to change the order of roles
*/

include('../appg/settings.php');
include('../appg/init_ajax.php');

$PostBackKey = ForceIncomingString('PostBackKey', '');
if ($PostBackKey == ''
	|| $PostBackKey !== $Context->Session->GetCsrfValidationKey()
) {
	die($Context->GetDefinition('ErrPostBackKeyInvalid'));
}

if (!$Context->Session->User->Permission('PERMISSION_SORT_ROLES')) {
	die($Context->GetDefinition('ErrPermissionSortRoles'));
}

$Sql = 'update '. GetTableName('Role', $DatabaseTables, $Configuration["DATABASE_TABLE_PREFIX"])
	. ' set ' . $DatabaseColumns['Role']['Priority'] . " = '//1' where "
	. $DatabaseColumns['Role']['RoleID'] ." = '//2';";

$SortOrder = ForceIncomingArray('RoleID', array());
$ItemCount = count($SortOrder);
for ($i = 0; $i < $ItemCount; $i++) {
	$RoleID = ForceInt($SortOrder[$i], null);
	if ($RoleID !== null) {
		$ExecSql = str_replace(array('//1', '//2'), array($i, $RoleID), $Sql);
		$Context->Database->Execute($ExecSql, 'AJAX', 'ReorderRoles', 'Failed to reorder roles', 0);
	}
}
echo $SortOrder;
$Context->Unload();
?>