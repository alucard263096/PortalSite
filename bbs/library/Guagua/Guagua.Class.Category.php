<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


/**
 * Object representation of a category.
 * @package Guagua
 */
class Category {
	var $CategoryID;
	var $Name;
	var $Description;
	var $Blocked; // Is this category blocked by the viewing user
	var $RoleBlocked; // Is this category blocked to the role of the viewing user
	var $AllowedRoles; // Contains the roles that are allowed to take part in this category
	var $DiscussionCount; // aggregate - display only

	function Category() {
		$this->Clear();
	}

	// Clears all properties
	function Clear() {
		$this->CategoryID = 0;
		$this->Name = '';
		$this->Description = '';
		$this->DiscussionCount = 0;
		$this->Blocked = 0;
		$this->RoleBlocked = 0;
		$this->AllowedRoles = array();
	}

	function FormatPropertiesForDatabaseInput() {
		$this->Name = FormatStringForDatabaseInput($this->Name, 1);
		$this->Description = FormatStringForDatabaseInput($this->Description, 1);
	}

	function FormatPropertiesForDisplay() {
		$this->Name = FormatStringForDisplay($this->Name, 1);
		$this->Description = FormatStringForDisplay($this->Description, 1);
	}

	function GetPropertiesFromDataSet($DataSet) {
		$this->CategoryID = ForceInt(@$DataSet['CategoryID'], 0);
		$this->Name = ForceString(@$DataSet['Name'], '');
		$this->Description = ForceString(@$DataSet['Description'], '');
		$this->DiscussionCount = ForceInt(@$DataSet['DiscussionCount'], 0);
		$this->Blocked = ForceBool(@$DataSet['Blocked'], 0);
		$this->RoleBlocked = ForceBool(@$DataSet['RoleBlocked'], 0);
	}

	function GetPropertiesFromForm(&$Context) {
		$this->CategoryID = ForceIncomingInt('CategoryID', 0);
		$this->Name = ForceIncomingString('Name', '');
		$this->Description = ForceIncomingString('Description', '');
		$this->AllowedRoles = ForceIncomingArray('CategoryRoleBlock', array());
	}
}
?>