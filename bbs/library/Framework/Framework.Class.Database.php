<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


/**
 * A database interface.
 * @package Framework
 */
class Database {
	// Public
	var $DatabaseType;      // The type of database to connect to and use (currently only handles mysql)

	// Private
	var $Name;              // The name of this class
	var $Context;				// A reference to the context object
	var $Connection;        // A connection to the default database
	var $FarmConnection;		// A connection to a farm database (for inserting, updating, and deleting)


	function CloseConnection() {}

	function ConnectionError() {}

	function Database(&$Context) {
		$this->Name = 'Database';
		$Context->ErrorManager->AddError($Context, $this->Name, 'Constructor', 'You can not generate a database object with the database interface. You must use an implementation of the interface like the MySQL implementation.');
	}

	// Returns the affected rows if successful (kills page execution if there is an error)
	function Delete($SqlBuilder, $SenderObject, $SenderMethod, $ErrorMessage, $KillOnFail = '1') {}

	// Executes a string of sql
	function Execute($Sql, $SenderObject, $SenderMethod, $ErrorMessage, $KillOnFail = '1') {}

	function GetConnection() {}

	function GetFarmConnection() {}

	function GetRow($DataSet) {}

	// Returns the inserted ID (kills page execution if there is an error)
	function Insert($SqlBuilder, $SenderObject, $SenderMethod, $ErrorMessage, $KillOnFail = '1') {}

	function RewindDataSet(&$DataSet, $Position = '0') {}

	function RowCount($DataSet) {}

	// Returns a dataset (kills page execution if there is an error)
	function Select($SqlBuilder, $SenderObject, $SenderMethod, $ErrorMessage, $KillOnFail = '1') {}

	// Returns the affected rows if successful (kills page execution if there is an error)
	function Update($SqlBuilder, $SenderObject, $SenderMethod, $ErrorMessage, $KillOnFail = '1') {}

}
?>