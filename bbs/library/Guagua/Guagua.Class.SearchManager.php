<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


/**
 * Search management classes (handles manipulation of saved searches).
 * @package Guagua
 */
class SearchManager {
	var $Name;				// The name of this class
	var $Context;			// The context object that contains all global objects (database, error manager, warning collector, session, etc)

	function DeleteSearch($SearchID) {
		$s = $this->Context->ObjectFactory->NewContextObject($this->Context, 'SqlBuilder');
		$s->SetMainTable('UserSearch', 'us');
		$s->AddWhere('us', 'SearchID', '', $SearchID, '=');
		$s->AddWhere('us', 'UserID', '', $this->Context->Session->UserID, '=');
		$this->Context->Database->Delete($s, $this->Name, 'DeleteSearch', 'An error occurred while deleting your search.');
		return true;
	}

	// Returns a SqlBuilder object with all of the topic properties already defined in the select
	function GetSearchBuilder() {
		$s = $this->Context->ObjectFactory->NewContextObject($this->Context, 'SqlBuilder');
		$s->SetMainTable('UserSearch', 'us');
		$s->AddSelect(array('SearchID', 'Label', 'UserID', 'Type', 'Keywords'), 'us');
		return $s;
	}

	function GetSearchById($SearchID) {
		$Search = $this->Context->ObjectFactory->NewObject($this->Context, 'Search');
		$s = $this->GetSearchBuilder();
		$s->AddWhere('us', 'SearchID', '', $SearchID, '=');
		$s->AddWhere('us', 'UserID', '', $this->Context->Session->UserID, '=');
		$result = $this->Context->Database->Select($s, $this->Name, 'GetSearchById', 'An error occurred while attempting to retrieve the requested search.');
		if ($this->Context->Database->RowCount($result) == 0) $this->Context->WarningCollector->Add($this->Context->GetDefinition('NoSearchResultsMessage'));
		while ($rows = $this->Context->Database->GetRow($result)) {
			$Search->GetPropertiesFromDataSet($rows, 1);
		}
		return $this->Context->WarningCollector->Iif($Search, false);
	}

	function GetSearchCount($UserID) {
		$UserID = ForceInt($UserID, 0);
		$TotalNumberOfRecords = 0;

		$s = $this->Context->ObjectFactory->NewContextObject($this->Context, 'SqlBuilder');
		$s->AddSelect('SearchID', 'us', 'Count', 'count');
		$s->SetMainTable('GuaguaUserSearch', 'us');
		$s->AddWhere('us', 'UserID', '', $UserID, '=');

		$result = $this->Context->Database->Select($s, $this->Name, 'GetSearchCount', 'An error occurred while retrieving search summary data.');
		while ($rows = $this->Context->Database->GetRow($result)) {
			$TotalNumberOfRecords = $rows['Count'];
		}
		return $TotalNumberOfRecords;
	}

	function GetSearchList($RecordsToRetrieve = '0', $UserID) {
		$RecordsToRetrieve = ForceInt($RecordsToRetrieve, 0);

		$s = $this->Context->ObjectFactory->NewContextObject($this->Context, 'SqlBuilder');
		$s = $this->GetSearchBuilder();
		$s->AddWhere('us', 'UserID', '', $UserID, '=');
		if ($RecordsToRetrieve > 0) $s->AddLimit(0, $RecordsToRetrieve);

		return $this->Context->Database->Select($s, $this->Name, 'GetSearchList', 'An error occurred while retrieving saved searches.');
	}

	function SaveSearch(&$Search) {
		// Validate the topic properties
		if ($Search->Label == '') $this->Context->WarningCollector->Add($this->Context->GetDefinition('ErrSearchLabel'));
		// If validation was successful, then reset the properties to db safe values for saving
		if ($this->Context->WarningCollector->Count() == 0) {
			$SearchToSave = $Search;
			$SearchToSave->FormatPropertiesForDatabaseInput();
			$s = $this->Context->ObjectFactory->NewContextObject($this->Context, 'SqlBuilder');

			// Proceed with the save if there are no warnings
			if ($this->Context->WarningCollector->Count() == 0) {
				$s->SetMainTable('UserSearch', 'us');
				$s->AddFieldNameValue('Label', $SearchToSave->Label);
				$s->AddFieldNameValue('UserID', $this->Context->Session->UserID);
				$s->AddFieldNameValue('Type', $SearchToSave->Type);
				$s->AddFieldNameValue('Keywords', $SearchToSave->Keywords);
				if ($SearchToSave->SearchID > 0) {
					$s->AddWhere('us', 'SearchID', '', $SearchToSave->SearchID, '=');
					$this->Context->Database->Update($s, $this->Name, 'SaveSearch', 'An error occurred while saving your search.');
				} else {
					$Search->SearchID = $this->Context->Database->Insert($s, $this->Name, 'SaveSearch', 'An error occurred while creating your search.');
				}
			}

		}
		return $this->Context->WarningCollector->Iif();
	}

	function SearchManager(&$Context) {
		$this->Name = 'SearchManager';
		$this->Context = &$Context;
	}
}
?>