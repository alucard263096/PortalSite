<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


/**
 * Instantiates objects.
 *
 * Allows developer's to clone and change existing classes and
 * have their objects used throughout the application,
 * instead of the application default objects.
 *
 * @package Framework
 */
class ObjectFactory {
	var $ClassIndex;        // An array containing name/value pairs mapping labels to class names
	var $Path;

	// Private (used internally - should use NewObject or NewContextObject externally)
	function CreateObject(&$Context, $ClassLabel, $IsContextObject, $Param1 = '', $Param2 = '', $Param3 = '', $Param4 = '', $Param5 = '', $Param6 = '', $Param7 = '', $Param8 = '', $Param9 = '', $Param10 = '') {
		if (!array_key_exists($ClassLabel, $this->ClassIndex)) {
			// If the class has not yet been defined, assume the class label is the class name
			$ClassName = $ClassLabel;
		} else {
			$ClassName = $this->ClassIndex[$ClassLabel];
		}
		if (!class_exists($ClassName)) {
			$Found = false;
			$PrefixArray = $Context->Configuration['LIBRARY_NAMESPACE_ARRAY'];
			$Path = $this->Path;
			for ($i=0, $m=count($Path); $i < $m && !$Found; $i++) {
				for ($j=0, $n=count($PrefixArray); $j < $n && !$Found; $j++) {
					$File = $Path[$i] . '/' . $PrefixArray[$j]
						. '/'. $PrefixArray[$j] . '.Class.' . $ClassName . '.php';
					$Found = file_exists($File);
					if ($Found) {
						include($File);
					}
				}
			}

			// If it failed to find the class, throw a fatal error
			if (!class_exists($ClassName)) $Context->ErrorManager->AddError($Context, 'ObjectFactory', 'NewObject', 'The "'.$ClassName.'" class referenced by "'.$ClassLabel.'" does not appear to exist.');
		}
		if ($IsContextObject) {
			return new $ClassName($Context, $Param1, $Param2, $Param3, $Param4, $Param5, $Param6, $Param7, $Param8, $Param9, $Param10);
		} else {
			return new $ClassName($Param1, $Param2, $Param3, $Param4, $Param5, $Param6, $Param7, $Param8, $Param9, $Param10);
		}
	}

	function CreateControl(&$Context, $ClassLabel, $Param1 = '', $Param2 = '', $Param3 = '', $Param4 = '', $Param5 = '', $Param6 = '', $Param7 = '', $Param8 = '', $Param9 = '', $Param10 = '') {
		if (!array_key_exists($ClassLabel, $this->ClassIndex)) {
			// If the class has not yet been defined, assume the class label is the class name
			$ClassName = $ClassLabel;
		} else {
			$ClassName = $this->ClassIndex[$ClassLabel];
		}
		if (!class_exists($ClassName)) {
			$Found = false;
			$PrefixArray = $Context->Configuration['LIBRARY_NAMESPACE_ARRAY'];
			$Path = $this->Path;
			for ($i=0, $m=count($Path); $i < $m && !$Found; $i++) {
				for ($j=0, $n=count($PrefixArray); $j < $n && !$Found; $j++) {
					$File = $Path[$i] . '/' . $PrefixArray[$j]
						. '/'. $PrefixArray[$j] . '.Control.' . $ClassName . '.php';
					$Found = file_exists($File);
					if ($Found) {
						include($File);
					}
				}
			}
			// If it failed to find the class, throw a fatal error
			if (!class_exists($ClassName)) {
				$Context->ErrorManager->AddError($Context, 'ObjectFactory', 'CreateControl', 'The "'.$ClassName.'" control referenced by "'.$ClassLabel.'" does not appear to exist.');
			}
		}
		return new $ClassName($Context, $Param1, $Param2, $Param3, $Param4, $Param5, $Param6, $Param7, $Param8, $Param9, $Param10);
	}

	// Almost identical to NewObject, but passes the context by reference as the first variable in the constructor of the object
	function NewContextObject(&$Context, $ClassLabel, $Param1 = '', $Param2 = '', $Param3 = '', $Param4 = '', $Param5 = '', $Param6 = '', $Param7 = '', $Param8 = '', $Param9 = '', $Param10 = '') {
		return $this->CreateObject($Context, $ClassLabel, 1, $Param1, $Param2, $Param3, $Param4, $Param5, $Param6, $Param7, $Param8, $Param9, $Param10);
	}

	// Create a new object based on a class name. Will gracefully error out if the class does not exist
	function NewObject(&$Context, $ClassLabel, $Param1 = '', $Param2 = '', $Param3 = '', $Param4 = '', $Param5 = '', $Param6 = '', $Param7 = '', $Param8 = '', $Param9 = '', $Param10 = '') {
		return $this->CreateObject($Context, $ClassLabel, 0, $Param1, $Param2, $Param3, $Param4, $Param5, $Param6, $Param7, $Param8, $Param9, $Param10);
	}

	/**
	 * Constructor
	 *
	 * $Configuration added in Guagua Required for persistent object reference.
	 * 
	 * @uses $Configuration['OBJECT_FACTORY_REFERENCE_*']
	 * @uses $Configuration['LIBRARY_INCLUDE_PATH']
	 * @param array $Configuration
	 * @return ObjectFactory
	 */
	function ObjectFactory ($Configuration = array()) {
		$this->ClassIndex = array();
		$this->ControlStrings = array();
		
		foreach ($Configuration as $Key => $Value) {
			$Prefix = 'OBJECT_FACTORY_REFERENCE_';
			$Key = trim($Key);
			if (strpos($Key, $Prefix) === 0) {
				$Key = str_replace($Prefix, '', $Key);
				$Key = str_replace('_', ' ', $Key);
				$Key = ucwords(strtolower($Key));
				$Key = str_replace(' ', '', $Key);
				$this->SetReference($Key, $Value);
			}
		}
		
		$this->SetPath($Configuration);
	}

	// For debugging, allow the current references to be written
	function PrintReferences() {
		while (list($Label, $Name) = each($this->ClassIndex)) {
			echo('<div>'.$Label.': '.$Name.'</div>');
		}
	}
	
	function SetPath($Configuration) {
		$Path = ForceString($Configuration['LIBRARY_INCLUDE_PATH'], '%LIBRARY%');
		$Path = explode(';', $Path);
		for($i=0, $count=count($Path); $i < $count; $i++) {
			$Path[$i] = str_replace(
				array('%LIBRARY%', '%APPLICATION%', '%EXTENSIONS%'),
				array(
					$Configuration['LIBRARY_PATH'],
					$Configuration['APPLICATION_PATH'],
					$Configuration['EXTENSIONS_PATH']),
				$Path[$i]);
		}
		$this->Path = $Path;
	}

	function SetReference($ClassLabel, $ClassName = '') {
		if ($ClassName == '') $ClassName = $ClassLabel;
		$this->ClassIndex[$ClassLabel] = $ClassName;
	}
}
?>