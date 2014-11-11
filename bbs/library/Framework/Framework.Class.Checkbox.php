<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


/**
 * builds and maintains a checkbox list.
 * @package Framework
 */
class Checkbox {
	var $Name;		      	// Name of the checkbox list
	var $aOptions;	      	// Array for holding checkbox options

	function AddOption($IdValue, $DisplayValue, $Checked, $FlipCheckedValue, $Attributes = '') {
		$this->aOptions[] = array('IdValue' => $IdValue,
			'DisplayValue' => $DisplayValue,
			'Checked' => ($FlipCheckedValue ? FlipBool($Checked) : $Checked),
			'Attributes' => $Attributes);
	}

	function AddOptionsFromDataSet(&$Database, $DataSet, $IdField, $DisplayField, $CheckedField, $FlipCheckedValue, $Attributes = '') {
		$FlipCheckedValue = ForceBool($FlipCheckedValue, 0);
		while ($rows = $Database->GetRow($DataSet)) {
			$this->AddOption($rows[$IdField], $rows[$DisplayField], $rows[$CheckedField], $FlipCheckedValue, $Attributes);
		}
	}

	function Checkbox() {
		$this->Clear();
	}

	function Clear() {
		$this->Name = '';
		$this->aOptions = array();
	}

	function ClearOptions() {
		$this->aOptions = array();
	}

	function Count() {
		return count($this->aOptions);
	}

	function Get() {
		$sReturn = '';
		$OptionCount = count($this->aOptions);
		for ($i = 0; $i < $OptionCount ; $i++) {
			$sReturn .= '<label>'
				.GetBasicCheckBox($this->Name,
					$this->aOptions[$i]['IdValue'],
					$this->aOptions[$i]['Checked'],
					$this->aOptions[$i]['Attributes'])
				.' '
				.$this->aOptions[$i]['DisplayValue']
				.'</label>';
		}
		return $sReturn;
	}

	function Write() {
		echo($this->Get());
	}
}
?>