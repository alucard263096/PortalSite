<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * Validates user imput.
 * @package Framework
 */
class Validator {
	var $Context;
	var $InputName;
	var $isValid;
	var $isRequired;
	var $ValidationExpression;
	var $ValidationExpressionErrorMessage;
	var $Value;
	var $MaxLength;

	function Clear() {
		$this->InputName = 'Input';
		$this->isRequired = 0;
		$this->isValid = 1;
		$this->ValidationExpression = '';
		$this->MaxLength = 0;
		$this->Value = '';
	}

	// Compare the value of this input to the value of another input
	// Operator: [Equal|NotEqual|GreaterThan|GreaterThanEqualTo|LessThan|LessThanEqualTo]
	function CompareTo($InputToCompare, $Operator, $ErrorMessage) {
		switch($Operator) {
			case 'GreaterThan':
				if($InputToCompare->Value <= $this->Value) {
					$this->isValid = 0;
					$this->Context->WarningCollector->Add($ErrorMessage);
				}
				break;
			case 'GreaterThanEqualTo':
				if($InputToCompare->Value < $this->Value) {
					$this->isValid = 0;
					$this->Context->WarningCollector->Add($ErrorMessage);
				}
				break;
			case 'LessThan':
				if($InputToCompare->Value >= $this->Value) {
					$this->isValid = 0;
					$this->Context->WarningCollector->Add($ErrorMessage);
				}
				break;
			case 'LessThanEqualTo':
				if($InputToCompare->Value > $this->Value) {
					$this->isValid = 0;
					$this->Context->WarningCollector->Add($ErrorMessage);
				}
				break;
			case 'NotEqual':
				if($InputToCompare->Value == $this->Value) {
					$this->isValid = 0;
					$this->Context->WarningCollector->Add($ErrorMessage);
				}
				break;
			default:
				if($InputToCompare->Value != $this->Value) {
					$this->isValid = 0;
					$this->Context->WarningCollector->Add($ErrorMessage);
				}
				break;
		}
 	}

	// Validate all defined variables
	// Returns boolean value indicating un/successful validation
	function Validate() {
		// If a regexp was supplied, attempt to validate on it (empty strings allowed)
		if($this->ValidationExpression != '' && $this->Value != '') {
			if(!preg_match($this->ValidationExpression, $this->Value)) {
				$this->isValid = 0;
				$this->Context->WarningCollector->Add($this->ValidationExpressionErrorMessage);
			}
		}
		// If the value is required, ensure it's not empty
		if($this->isRequired) {
			$ForcedValue = ForceString($this->Value, '');
			if ($ForcedValue == '') {
				$this->isValid = 0;
				$this->Context->WarningCollector->Add(str_replace('//1', $this->InputName, $this->Context->GetDefinition('ErrRequiredInput')));
			}
		}
		// Ensure the value is not too long if maxlength is specified
		if (($this->MaxLength > 0) && (strlen($this->Value) > $this->MaxLength)) {
			$CharsToLong = (strlen($this->Value) - $this->MaxLength);
			$this->isValid = 0;
			$this->Context->WarningCollector->Add(str_replace(array('//1', '//2'),
				array($this->InputName, $CharsToLong),
				$this->Context->GetDefinition('ErrInputLength')));
		}
		return $this->isValid;
	}

	function Validator(&$Context) {
		$this->Context = &$Context;
	}
}
?>