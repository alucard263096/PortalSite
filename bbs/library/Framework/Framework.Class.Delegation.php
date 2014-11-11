<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * A standard control
 * @package Framework
 */
class Delegation {

	/**
	 * Request context (for global context objects)
	 * @var Context
	 */
	var $Context;
	
	/**
	 * The name of this control
	 * @var string
	 */
	var $Name;

	// Private
	var $Delegates;			// An array of delegates & their associated functions
	var $DelegateParameters;// An associative array of Variable => Values that is used to allow delegate functions to change local, method-level variable values

	// Adds a function to the specified delegate
	function AddToDelegate($DelegateName, $FunctionName) {
		if (!array_key_exists($DelegateName, $this->Delegates)) $this->Delegates[$DelegateName] = array();
		$this->Delegates[$DelegateName][] = $FunctionName;
	}

	// Executes all functions associated with the specified delegate
	function CallDelegate($DelegateName) {
		if (array_key_exists($DelegateName, $this->Delegates)) {
			$FunctionCount = count($this->Delegates[$DelegateName]);
			for ($i = 0; $i < $FunctionCount; $i++) {
				$this->Delegates[$DelegateName][$i]($this);
			}
		}
	}

	function Delegation(&$Context) {
		$this->Delegates = array();
		$this->DelegateParameters = array();
		$this->Context = &$Context;
		$this->GetDelegatesFromContext();
	}

	function GetDelegatesFromContext() {
		// Get delegates from the context object that were added before this object was instantiated
		if (array_key_exists($this->Name, $this->Context->DelegateCollection)) {
			$this->Delegates = array_merge($this->Delegates, $this->Context->DelegateCollection[$this->Name]);
		}
	}

}
?>