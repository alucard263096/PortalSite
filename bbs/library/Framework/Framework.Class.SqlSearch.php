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
class SqlSearch extends SqlBuilder {
	var $UserQuery; // The string being queried by the user
	var $SearchFields;   // This is an array containing the names of the database fields that will be queried
	var $LastElementWasOperator;
	var $Operators;
	var $Phrases;
	var $Keywords;

	function BreakKeywords() {
		$Keywords = explode(' ', $this->UserQuery);
		$CurrentKeywords = '';
		$KeywordCount = count($Keywords);
		$i = 0;
		for ($i = 0; $i < $KeywordCount; $i++) {
			$CurrentKeyword = ForceString($Keywords[$i], '');
			if ($CurrentKeyword != '') {
				if (in_array($CurrentKeyword, $this->Operators)) {
					if ($i+1 < count($Keywords)) {
						$i++;
						$NextKeyword = ForceString($Keywords[$i], '');
						$this->Keywords[] = array('Operator' => $CurrentKeyword, 'Keyword' => $NextKeyword);
					}
				} else {
					$this->Keywords[] = array('Operator' => 'and', 'Keyword' => $CurrentKeyword);
				}
			}
		}
	}

	function DefineSearch() {
		$this->GetPhrase();
		$this->BreakKeywords();
		$SearchFieldCount = count($this->SearchFields);
		$KeywordCount = count($this->Keywords);
		$CurrentKeyword = '';
		$CurrentPhrase = 0;
		$CurrentOperator = '';

		if ($KeywordCount > 0 && $SearchFieldCount > 0) {
			if (count($this->Wheres) > 0) $this->Wheres[] = ' and ';
			$this->StartWhereGroup();
			for ($i = 0; $i < $KeywordCount; $i++) {
				$CurrentKeyword = $this->Keywords[$i]['Keyword'];
				if ($CurrentKeyword == "[#phrase#]" && count($this->Phrases) > $CurrentPhrase) {
					$CurrentKeyword = $this->Phrases[$CurrentPhrase];
					$CurrentPhrase++;
				}
				$SearchField = '';
				for ($j = 0; $j < $SearchFieldCount; $j++) {
					// Need to manipulate the operator to allow the different fields being searched to return results.
					// So if this is the beginning of the search for this keyword, use the assigned operator, otherwise use "or".
					$CurrentOperator = ($j == 0) ? $this->Keywords[$i]['Operator'] : 'or';
					$SearchField = explode('.', $this->SearchFields[$j]);
					$this->AddWhere($SearchField[0], $SearchField[1], '', '%'.$CurrentKeyword.'%', 'like', $CurrentOperator, '', '1', ($j == 0));
				}
				$this->EndWhereGroup();
			}
			$this->EndWhereGroup();
		}
	}

	function GetPhrase() {
		$this->UserQuery = str_replace("\\\"", "\"", $this->UserQuery);
		// Check for a quote as the first character
		$FirstQuotePosition = strpos($this->UserQuery, "\"");
		$SecondQuotePosition = 0;

		// If a quote was found, then find the second quote
		if ($FirstQuotePosition !== false) {
			$SecondQuotePosition = strpos($this->UserQuery, "\"", $FirstQuotePosition + 1);
		}

		if ($FirstQuotePosition !== false && $SecondQuotePosition !== false) {
			$Phrase = substr($this->UserQuery, $FirstQuotePosition, ($SecondQuotePosition - $FirstQuotePosition + 1));
			$this->UserQuery = str_replace($Phrase, '[#phrase#]', $this->UserQuery);
			$this->Phrases[] = str_replace("\"", '', $Phrase);
			$this->GetPhrase();
		}
	}

	function SqlSearch(&$Context) {
		$this->Fields = '';
		$this->FieldValues = array();
		$this->MainTable = array();
		$this->Joins = '';
		$this->Wheres = array();
		$this->GroupBys = '';
		$this->OrderBys = '';
		$this->Limit = '';
		$this->Name = 'SqlSearch';
		// New properties for this derived class of the SqlBuilder class
		$this->UserQuery = '';
		$this->SearchField = array();
		$this->LastElementWasOperator = 0;
		$this->Operators = array('and', 'or');
		$this->Phrases = array();
		$this->Keywords = array();
		$this->Context = &$Context;
		$this->TablePrefix = $this->Context->Configuration['DATABASE_TABLE_PREFIX'];
	}
}
?>