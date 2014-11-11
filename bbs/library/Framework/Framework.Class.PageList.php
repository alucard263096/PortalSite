<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * Class that handles drawing a pagelist of data.
 * @package Framework
 */
class PageList {

	// PUBLIC PROPERTIES
	var $RecordsPerPage;		// Number of records per page.
	var $TotalRecords;			// Total number of records in dataset.
	var $PagesToDisplay;		// Maximum number of pages links to display per page.
	var $PageParameterName; 	// Name to be used for the page parameter in the querystring.
	var $QueryStringParams;
	var $CssClass;				// Name of the stylesheet class to be applied to the pagelist.
	var $RewriteRules;
	var $PageListID;
	var $Totalled;				// Is there going to be a total records value provided (required for numeric list)
	var $UrlIdName;
	var $UrlIdValue;
	var $UrlSuffix;
	var $Context;

	// PRIVATE PROPERTIES
	var $CurrentPage;			// The page currently being displayed.
	var $FirstRecord;			// First record of the current page.
	var $LastRecord;			// Last record of the current page.
	var $PageCount;				// Total number of pages.
	var $isPropertiesDefined; 	// Has the DefineParameters function been called yet?

	// Based on the current page number and the middle position, figure out which page number to start on
	/*
	function CalculateFirstPage($MiddlePosition, $CurrentPageNumber) {
		$iReturn = $CurrentPageNumber - $MiddlePosition;
		if ($iReturn < 1) $iReturn = 1;
		return $iReturn;
	}
	*/

	// Define all required parameters to create the PageList and PageListDetails
	function DefineProperties() {
		if (!$this->isPropertiesDefined) {
			if ($this->CurrentPage == 0) $this->CurrentPage = ForceIncomingInt($this->PageParameterName, 1);
			if ($this->Totalled) {
				$this->PageCount = CalculateNumberOfPages($this->TotalRecords, $this->RecordsPerPage);
				if ($this->CurrentPage > $this->PageCount) $this->CurrentPage = $this->PageCount;
				if ($this->CurrentPage < 1) $this->CurrentPage = 1;
				$this->FirstRecord = (($this->CurrentPage - 1) * $this->RecordsPerPage) + 1;
				$this->LastRecord = $this->FirstRecord + $this->RecordsPerPage - 1;
				if ($this->LastRecord > $this->TotalRecords) $this->LastRecord = $this->TotalRecords;
			} else {
				if ($this->CurrentPage < 1) $this->CurrentPage = 1;
				$this->PageCount = $this->CurrentPage;
				if ($this->TotalRecords > $this->RecordsPerPage) $this->PageCount++;
				$this->FirstRecord = (($this->CurrentPage - 1) * $this->RecordsPerPage) + 1;
				$this->LastRecord = $this->FirstRecord + $this->TotalRecords-1;
				if ($this->LastRecord < $this->FirstRecord) $this->LastRecord = $this->FirstRecord;
				if ($this->PageCount > $this->CurrentPage) $this->LastRecord = $this->LastRecord - 1;
			}
			$this->isPropertiesDefined = 1;
		}
	}

	// Builds a numeric page list (ie. "prev 1 2 3 next").
	function GetNumericList() {

		$PreviousText =  '&nbsp;&#60;&#60;&nbsp;';
		$NextText = '&nbsp;&#62;&#62;&nbsp;';

		$this->DefineProperties();
		// Optimization: place commonly used object properties in local variables
		$PageCount = $this->PageCount;
		$CurrentPage = $this->CurrentPage;
		$PageParameterName = $this->PageParameterName;
		$QSParams = $this->QueryStringParams->GetQueryString();

		// Variables that help define which page numbers to display:
		// Subtract the first and last page from the number of pages to display
		$iPagesToDisplay = $this->PagesToDisplay - 2;
		if ($iPagesToDisplay <= 8) $iPagesToDisplay = 8;
		// Middle navigation point for the pagelist
		$MidPoint = ($iPagesToDisplay / 2);
		// First page number to display (Based on the current page number and the middle position, figure out which page number to start on)
		$FirstPage = $CurrentPage - $MidPoint;
		if ($FirstPage < 1) $FirstPage = 1;

		// Last page number to display
		$LastPage = $FirstPage + ($iPagesToDisplay - 1);
		if ($LastPage > $PageCount) {
			$LastPage = $PageCount;
			$FirstPage = $PageCount - $iPagesToDisplay;
			if ($FirstPage < 1) $FirstPage = 1;
		}

		$sReturn = '
			<ol class="'.$this->CssClass.($PageCount > 1?'':' PageListEmpty').'"';
		if (!empty($this->PageListID) && $this->PageListID != '') $sReturn .= ' id="'.$this->PageListID.'"';
		$sReturn .= '>
		';
		$Loop = 0;
		$iTmpPage = 0;

		$Url = GetUrl($this->Context->Configuration,
			$this->Context->SelfUrl,
			'',
			$this->UrlIdName,
			$this->UrlIdValue,
			'$$1',
			$QSParams,
			$this->UrlSuffix);

		if ($PageCount > 1) {
			if ($CurrentPage > 1) {
				$iTmpPage = $CurrentPage - 1;
				$sReturn .= '	<li><a href="'.str_replace('$$1',
					$iTmpPage,
					$Url).'" class="PagePrev">'.$PreviousText.'</a></li>
					';
			} else {
				$sReturn .= '	<li><span class="NoPagePrev">'.$PreviousText.'</span></li>
				';
			}

			// Display first page & elipsis if we have moved past the second page
			if ($FirstPage > 2) {
				$sReturn .= '	<li><a href="'.str_replace('$$1',
					1,
					$Url).'">1</a></li>
					<li> ... </li>
					';
			} elseif ($FirstPage == 2) {
				$sReturn .= '	<li><a href="'.str_replace('$$1',
					1,
					$Url).'">1</a></li>
					';
			}

			$Loop = 0;

			for ($Loop = 1; $Loop <= $PageCount; $Loop++) {
				if (($Loop >= $FirstPage) && ($Loop <= $LastPage)) {
					if ($Loop == $CurrentPage) {
						$sReturn .= '	<li><span class="CurrentPage">'.$Loop.'</span></li>
						';
					} else {
						$sReturn .= '	<li><a href="'.str_replace('$$1',
							$Loop,
							$Url).'">'.$Loop.'</a></li>
							';
					}
				}
			}

			// Display last page & elipsis if we are not yet at the second last page
			if ($CurrentPage < ($PageCount - $MidPoint) && $PageCount > $this->PagesToDisplay - 1) {
				$sReturn .= '<li> ... </li>
				<li><a href="'.str_replace('$$1',
					$PageCount,
					$Url).'">'.$PageCount.'</a></li>
					';
			} else if ($CurrentPage == ($PageCount - $MidPoint) && ($PageCount > $this->PagesToDisplay)) {
				$sReturn .= '<li><a href="'.str_replace('$$1',
					$PageCount,
					$Url).'">'.$PageCount.'</a></li>
					';
			}

			if ($CurrentPage != $PageCount) {
				$iTmpPage = $CurrentPage + 1;
				$sReturn .= '<li><a href="'.str_replace('$$1',
					$iTmpPage,
					$Url).'" class="PageNext">'.$NextText.'</a></li>
					';
			} else {
				$sReturn .= '<li><span class="NoPageNext">'.$NextText.'</span></li>
				';
			}
		} else {
			$sReturn .= '<li>&nbsp;</li>
			';
		}

		$sReturn .= '</ol>
		';
		return $sReturn;
	}

	// Builds a string with information about the page list's current position (ie. "1 to 15 of 56").
	// Returns the built string.
	function GetPageDetails($Context, $IncludeTotal = '1') {
		$IncludeTotal = ForceBool($IncludeTotal, 0);
		$this->DefineProperties();
		$sReturn = '';
		if ($this->TotalRecords > 0) {
			if ($IncludeTotal) {
				$sReturn = str_replace(array('//1', '//2', '//3'), array($this->FirstRecord, $this->LastRecord, $this->TotalRecords), $Context->GetDefinition('PageDetailsMessageFull'));
			} else {
				$sReturn = str_replace(array('//1', '//2'), array($this->FirstRecord, $this->LastRecord), $Context->GetDefinition('PageDetailsMessage'));
			}
		} else {
			$sReturn = 0;
		}
		return $sReturn;
	}

	function PageList(&$Context, $urlIdName = '', $urlIdValue = '', $urlSuffix = '') {
		$this->UrlIdName = $urlIdName;
		$this->UrlIdValue = $urlIdValue;
		$this->UrlSuffix = $urlSuffix;
		$this->CurrentPage = 0;
		$this->isPropertiesDefined = 0;
		$this->QueryStringParams = $Context->ObjectFactory->NewObject($Context, 'Parameters');
		$this->QueryStringParams->DefineCollection($_GET);
		$this->QueryStringParams->Remove($this->UrlIdName);
		$this->QueryStringParams->Remove('page');
		$this->PageListID = '';
		$this->Totalled = 1;
		$this->Context = &$Context;
	}
}
?>