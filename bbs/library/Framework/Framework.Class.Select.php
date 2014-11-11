<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * Builds and maintains a select list.
 * @package Framework
 */
class Select {
	var $Name;			// Name of the select list
	var $SelectedValue; // The value to be selected in the list (you can pass an array of ids for multiselects)
	var $CssClass;		// Stylesheet class name
	var $Attributes;	// Additional attributes for select element
	var $aOptions;		// Array for holding select options

	function AddOption($IdValue, $DisplayValue, $Attributes = '') {
		$this->aOptions[] = array('IdValue' => $IdValue, 'DisplayValue' => $DisplayValue, 'Attributes' => $Attributes);
	}

	function AddOptionsFromAssociativeArray($Array, $KeyPrefix) {
		while (list($key, $val) = each($Array)) {
			$this->AddOption($KeyPrefix.$key, $val);
		}
	}

	function AddOptionsFromDataSet(&$Database, $DataSet, $IdField, $DisplayField) {
		while ($rows = $Database->GetRow($DataSet)) {
			$this->AddOption($rows[$IdField], $rows[$DisplayField]);
		}
	}

	function Clear() {
		$this->Name = '';
		$this->CssClass = 'LargeSelect';
		$this->Attributes = '';
		$this->aOptions = array();
	}

	function ClearOptions() {
		$this->aOptions = array();
	}

	function Count() {
		return count($this->aOptions);
	}

	function Get() {
		$sReturn = '<select name="'.$this->Name.'" class="'.$this->CssClass.'" '.$this->Attributes.'>
		';
		$OptionCount = count($this->aOptions);
		$i = 0;
		for ($i = 0 ; $i < $OptionCount; $i++) {
			$sReturn .= '<option value="'.FormatStringForDisplay($this->aOptions[$i]['IdValue']).'" ';

			if (is_array($this->SelectedValue)) {
				$numrows = count($this->SelectedValue);
				for ($j = 0; $j < $numrows; $j++) {
					if ($this->aOptions[$i]['IdValue'] == $this->SelectedValue[$j]) {
						$sReturn .= ' selected="selected"';
						$j = $numrows; // If you've found a match, don't bother looping anymore
					}
				}
			} else {
				if ($this->aOptions[$i]['IdValue'] == $this->SelectedValue) $sReturn .= ' selected="selected"';
			}
			if ($this->aOptions[$i]['Attributes'] != '') $sReturn .= $this->aOptions[$i]['Attributes'];
			$sReturn .= '>'.FormatStringForDisplay($this->aOptions[$i]['DisplayValue']).'</option>
			';
		}
		$sReturn .= '</select>
		';
		return $sReturn;
	}

	function RemoveOption($IdValue) {
		if ($IdValue == $this->SelectedValue) $this->SelectedValue = '';
		$OptionCount = count($this->aOptions);
		$i = 0;
		for($i = 0; $i < $OptionCount; $i++) {
			if ($this->aOptions[$i]['IdValue'] == $IdValue) {
				array_splice($this->aOptions, $i, 1);
				break;
			}
		}
	}

	function Select() {
		$this->Clear();
	}

	function Write() {
		echo($this->Get());
	}
}
?>