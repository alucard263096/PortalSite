<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 *  A mysql implementation of the database interface.
 * @package Framework
 */
class MySQL extends Database {
	function CloseConnection() {
		if ($this->Connection) @mysql_close($this->Connection);
	}

	function ConnectionError() {
		// Check the connection for errors and return them
		return mysql_error($this->Connection);
	}

	// Returns the affected rows if successful (kills page execution if there is an error)
	function Delete($SqlBuilder, $SenderObject, $SenderMethod, $ErrorMessage, $KillOnFail = '1') {
		$Connection = $this->GetFarmConnection();
		$KillOnFail = ForceBool($KillOnFail, 0);
		if (!mysql_query($SqlBuilder->GetDelete(), $Connection)) {
			$this->Context->ErrorManager->AddError($SqlBuilder->Context, $SenderObject, $SenderMethod, $ErrorMessage, mysql_error($Connection), $KillOnFail);
			return false;
		} else {
			return mysql_affected_rows($Connection);
		}
	}

	function Execute($Sql, $SenderObject='', $SenderMethod='', $ErrorMessage='', $KillOnFail = '1') {
		if (strtolower(substr($Sql, 0, 6)) == 'select') {
			$Connection = $this->GetConnection();
		} else {
			$Connection = $this->GetFarmConnection();
		}
		$KillOnFail = ForceBool($KillOnFail, 0);
		$DataSet = mysql_query($Sql, $Connection);
		if (!$DataSet) {
			$this->Context->ErrorManager->AddError($this->Context, $SenderObject, $SenderMethod, $ErrorMessage, mysql_error($Connection), $KillOnFail);
			return false;
		} else {
			return $DataSet;
		}
	}

	function GetConnection() {
		if (!$this->Connection) {
			if (!function_exists('mysql_connect')) $this->Context->ErrorManager->AddError($this->Context, $this->Name, 'GetConnection', 'You do not appear to have MySQL enabled for PHP.');
			$this->Connection = @mysql_connect($this->Context->Configuration['DATABASE_HOST'],
				$this->Context->Configuration['DATABASE_USER'],
				$this->Context->Configuration['DATABASE_PASSWORD']);

			if (!$this->Connection) $this->Context->ErrorManager->AddError($this->Context, $this->Name, 'OpenConnection', 'The connection to the database failed:', $php_errormsg);

			if (!@mysql_select_db($this->Context->Configuration['DATABASE_NAME'], $this->Connection)) $this->Context->ErrorManager->AddError($this->Context, $this->Name, 'OpenConnection', 'Failed to connect to the "'.$this->Context->Configuration['DATABASE_NAME'].'" database.');
			// Set the character encoding if it is defined in the configuration.
			if ($this->Context->Configuration['DATABASE_CHARACTER_ENCODING'] != '') {
				mysql_query('SET NAMES "'.$this->Context->Configuration['DATABASE_CHARACTER_ENCODING'].'"', $this->Connection);
			}
		}
		return $this->Connection;
	}

	function GetFarmConnection() {
		if ($this->FarmConnection) {
			return $this->FarmConnection;
		} elseif ($this->Context->Configuration['FARM_DATABASE_HOST'] != '') {
			if (!function_exists('mysql_connect')) $this->Context->ErrorManager->AddError($this->Context, $this->Name, 'GetConnection', 'You do not appear to have MySQL enabled for PHP.');
			$this->FarmConnection = @mysql_connect($this->Context->Configuration['FARM_DATABASE_HOST'],
			$this->Context->Configuration['FARM_DATABASE_USER'],
			$this->Context->Configuration['FARM_DATABASE_PASSWORD']);

			if (!$this->FarmConnection) $this->Context->ErrorManager->AddError($this->Context, $this->Name, 'GetFarmConnection', 'The connection to the database farm failed.', $php_errormsg);

			if (!@mysql_select_db($this->Context->Configuration['FARM_DATABASE_NAME'], $this->FarmConnection)) $this->Context->ErrorManager->AddError($this->Context, $this->Name, 'GetFarmConnection', 'Failed to connect to the "'.$this->Context->Configuration['FARM_DATABASE_NAME'].'" database.');

			// Set the character encoding if it is defined in the configuration.
			if ($this->Context->Configuration['DATABASE_CHARACTER_ENCODING'] != '') {
				mysql_query('SET NAMES "'.$this->Context->Configuration['DATABASE_CHARACTER_ENCODING'].'"', $this->Connection);
			}

			return $this->FarmConnection;
		} else {
			return $this->GetConnection();
		}
	}

	function GetRow($DataSet) {
		return mysql_fetch_array($DataSet);
	}

	// Returns the inserted ID (kills page execution if there is an error)
	function Insert($SqlBuilder, $SenderObject, $SenderMethod, $ErrorMessage, $UseIgnore = '0', $KillOnFail = '1') {
		$KillOnFail = ForceBool($KillOnFail, 0);
		$Connection = $this->GetFarmConnection();
		if (!mysql_query($SqlBuilder->GetInsert($UseIgnore), $Connection)) {
			$this->Context->ErrorManager->AddError($SqlBuilder->Context, $SenderObject, $SenderMethod, $ErrorMessage, mysql_error($Connection), $KillOnFail);
			return false;
		} else {
			return ForceInt(mysql_insert_id($Connection), 0);
		}
	}

	function MySql(&$Context) {
		$this->Name = 'MySQL';
		$this->Context = &$Context;
	}

	function RewindDataSet(&$DataSet, $Position = '0') {
		$Position = ForceInt($Position, 0);
		if (mysql_num_rows($DataSet) > 0) mysql_data_seek($DataSet, $Position);
	}

	function RowCount($DataSet) {
		return mysql_num_rows($DataSet);
	}

	// Returns a dataset (kills page execution if there is an error)
	function Select($SqlBuilder, $SenderObject, $SenderMethod, $ErrorMessage, $KillOnFail = '1') {
		$KillOnFail = ForceBool($KillOnFail, 0);
		$Connection = $this->GetConnection();
		$DataSet = mysql_query($SqlBuilder->GetSelect(), $Connection);
		if (!$DataSet) {
			$this->Context->ErrorManager->AddError($SqlBuilder->Context, $SenderObject, $SenderMethod, $ErrorMessage, mysql_error($Connection), $KillOnFail);
			return false;
		} else {
			return $DataSet;
		}
	 }

	// Returns the affected rows if successful (kills page execution if there is an error)
	function Update($SqlBuilder, $SenderObject, $SenderMethod, $ErrorMessage, $KillOnFail = '1') {
		$KillOnFail = ForceBool($KillOnFail, 0);
		$Connection = $this->GetFarmConnection();
		if (!mysql_query($SqlBuilder->GetUpdate(), $Connection)) {
			$this->Context->ErrorManager->AddError($SqlBuilder->Context, $SenderObject, $SenderMethod, $ErrorMessage, mysql_error($Connection), $KillOnFail);
			return false;
		} else {
			return ForceInt(mysql_affected_rows($Connection), 0);
		}
	}
}
?>