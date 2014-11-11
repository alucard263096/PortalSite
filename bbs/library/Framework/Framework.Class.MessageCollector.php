<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * Class that builds and maintains a list of messages.
 * It is generally used for holding and then dumping user input errors.
 * @package Framework
 */
class MessageCollector {
	var $aMessages = array();
	var $CssClass = 'Error';

	function Add($sMessage) {
		$this->aMessages[] = $sMessage;
	}

	function Clear() {
		$this->aMessages = array();
	}

	function Count() {
		return count($this->aMessages);
	}

	function GetMessages() {
		$sReturn = '';
		$i = 0;
		$MessageCount = $this->Count();
		for($i = 0; $i < $MessageCount; $i++) {
			$sReturn .= '<div class="'.$this->CssClass.'">' . ($i+1) .'. '.$this->aMessages[$i].'</div>
			';
		}
		return $sReturn;
	}

	function GetPlainMessages() {
		$sReturn = '';
		$i = 0;
		$MessageCount = $this->Count();
		for($i = 0; $i < $MessageCount; $i++) {
			$sReturn .= $this->aMessages[$i].'
			';
		}
		return $sReturn;
	}

	function Iif($True = '1', $False = '0') {
		if ($this->Count() == 0) {
			return $True;
		} else {
			return $False;
		}
	}

	function Write() {
		echo $this->GetMessages();
	}

	function WritePlain() {
		echo $this->GetPlainMessages();
	}
}
?>