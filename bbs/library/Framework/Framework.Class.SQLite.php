<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * A sqlite implementation of the database interface.
 * @package Framework
 */
class SQLite extends Database {
	function CloseConnection() {
		if ($this->Connection) @sqlite_close($this->Connection);
	}

	function ConnectionError() {
		// Check the connection for errors and return them
		return sqlite_error_string(sqlite_last_error($this->Connection));
	}

	// Returns the affected rows if successful (kills page execution if there is an error)
	function Delete($SqlBuilder, $SenderObject, $SenderMethod, $ErrorMessage, $KillOnFail = '1') {
		$Connection = $this->GetFarmConnection();
		$KillOnFail = ForceBool($KillOnFail, 0);
		if (!sqlite_query($SqlBuilder->GetDelete(), $Connection)) {
			$this->Context->ErrorManager->AddError($SqlBuilder->Context, $SenderObject, $SenderMethod, $ErrorMessage, sqlite_error_string(sqlite_last_error($this->Connection)), $KillOnFail);
			return false;
		} else {
			return 1;
		}
	}

	function Execute($Sql, $SenderObject, $SenderMethod, $ErrorMessage, $KillOnFail = '1') {
		if (strtolower(substr($Sql, 0, 6)) == 'select') {
			$Connection = $this->GetConnection();
		} else {
			$Connection = $this->GetFarmConnection();
		}
		$KillOnFail = ForceBool($KillOnFail, 0);
		$DataSet = sqlite_query($this->FixSQL($Sql), $Connection);
		if (!$DataSet) {
			$this->Context->ErrorManager->AddError($this->Context, $SenderObject, $SenderMethod, $ErrorMessage, sqlite_error_string(sqlite_last_error($this->Connection)), $KillOnFail);
			return false;
		} else {
			return $DataSet;
		}
	}

	function GetConnection() {
		if (!$this->Connection) {
			$this->Connection = sqlite_open($this->Context->Configuration['DATABASE_NAME']);
			if (!$this->Connection) {
				$this->Context->ErrorManager->AddError($this->Context, $this->Name, 'OpenConnection', 'Failed to connect to the "'.$this->Context->Configuration['DATABASE_NAME'].'" database.');
			} else {
				sqlite_query($this->Connection, 'PRAGMA short_column_names = ON');
			}
		}
		return $this->Connection;
	}

	function GetFarmConnection() {
		if ($this->FarmConnection) {
			return $this->FarmConnection;
		} elseif ($this->Context->Configuration['FARM_DATABASE_NAME'] != '' && $this->Context->Configuration['FARM_DATABASE_NAME'] != 'your_farm_database_name') {
			$this->FarmConnection = sqlite_open($this->Context->Configuration['FARM_DATABASE_NAME']);

			if (!$this->FarmConnection) {
				$this->Context->ErrorManager->AddError($this->Context, $this->Name, 'GetFarmConnection', 'Failed to connect to the "'.$this->Context->Configuration['FARM_DATABASE_NAME'].'" database.');
			} else {
				sqlite_query($this->FarmConnection, 'PRAGMA short_column_names = ON');
			}

			return $this->FarmConnection;
		} else {
			return $this->GetConnection();
		}
	}

	function GetRow($DataSet) {
		return sqlite_fetch_array($DataSet, SQLITE_ASSOC);
	}

	// Returns the inserted ID (kills page execution if there is an error)
	function Insert($SqlBuilder, $SenderObject, $SenderMethod, $ErrorMessage, $UseIgnore = '0', $KillOnFail = '1') {
		$KillOnFail = ForceBool($KillOnFail, 0);
		$Connection = $this->GetFarmConnection();
		if (!sqlite_query($SqlBuilder->GetInsert($UseIgnore), $Connection)) {
			$this->Context->ErrorManager->AddError($SqlBuilder->Context, $SenderObject, $SenderMethod, $ErrorMessage, sqlite_error_string(sqlite_last_error($this->Connection)), $KillOnFail);
			return false;
		} else {
			return ForceInt(sqlite_last_insert_rowid($Connection), 0);
		}
	}

	function RewindDataSet(&$DataSet, $Position = '0') {
		$Position = ForceInt($Position, 0);
		sqlite_seek($DataSet, $Position);
	}

	function RowCount($DataSet) {
		return sqlite_num_rows($DataSet);
	}

	// Returns a dataset (kills page execution if there is an error)
	function Select($SqlBuilder, $SenderObject, $SenderMethod, $ErrorMessage, $KillOnFail = '1') {
		$KillOnFail = ForceBool($KillOnFail, 0);
		$Connection = $this->GetConnection();
		$DataSet = sqlite_query($this->FixSQL($SqlBuilder->GetSelect()), $Connection);
		if (!$DataSet) {
			$this->Context->ErrorManager->AddError($SqlBuilder->Context, $SenderObject, $SenderMethod, $ErrorMessage, sqlite_error_string(sqlite_last_error($this->Connection)), $KillOnFail);
			return false;
		} else {
			return $DataSet;
		}
	 }

	function SQLite(&$Context) {
		$this->Name = 'SQLite';
		$this->Context = &$Context;
	}

	// Returns the affected rows if successful (kills page execution if there is an error)
	function Update($SqlBuilder, $SenderObject, $SenderMethod, $ErrorMessage, $KillOnFail = '1') {
		$KillOnFail = ForceBool($KillOnFail, 0);
		$Connection = $this->GetFarmConnection();
		if (!sqlite_exec($Connection, $SqlBuilder->GetUpdate())) {
			$this->Context->ErrorManager->AddError($SqlBuilder->Context, $SenderObject, $SenderMethod, $ErrorMessage, sqlite_error_string(sqlite_last_error($this->Connection)), $KillOnFail);
			return false;
		} else {
			return sqlite_changes($Connection);
		}
	}

	function FixSQL($Sql) {
		return str_replace('greatest(', 'max(', $Sql);
	}
}
?>