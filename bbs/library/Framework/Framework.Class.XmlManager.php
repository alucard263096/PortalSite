<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+



/**
 * Object representation of of an XML node.
 * @package Framework
 */
class XmlNode {
	var $Name;				// The name of this element as defined by it's xml tag
	var $Type;				// Type of node (1. contains other nodes, 2. contains data)
	var $Attributes;		// Attributes in the current tag element
	var $Value;				// value of the current element
	var $Child;				// Array of child elements
}


/**
 * Retrieves values from xml.
 * @package Framework
 */
class XmlManager {
	var $ErrorManager;	// Error message collector
	var $Name;				// The name of this class

	// Searches through the given node to search for a child node with the supplied name
	// returns the node if found, returns false otherwise
	function GetNodeByName($NodeToSearch, $NodeName) {
		$Node = false;
		for ($i = 0; $i < count($NodeToSearch->Child); $i++) {
			if ($NodeToSearch->Child[$i]->Name == $NodeName) $Node = $NodeToSearch->Child[$i];
		}
		return $Node;
	}

	function GetNodeValueByName($NodeToSearch, $NodeName) {
		$Node = $this->GetNodeByName($NodeToSearch, $NodeName);
		if ($Node) {
			return $Node->Value;
		} else {
			return false;
		}
	}

	// Takes a string of xml and parses it recursively returning a fully descript root node
	function ParseNode($XmlString) {
		// Retrieve the first xml tag in the file
		$XmlString = trim($XmlString);
		$RootNodeStartTag = strpos($XmlString, "<");
		$RootNodeEndTag = strpos($XmlString, ">");
		$RootNodeName = "";
		$RootNodeAttributes = array();
		$FauxContext = "0";

		// If the opening tag exists, parse it out
		if ($RootNodeStartTag === false || $RootNodeEndTag === false) {

			$this->ErrorManager->AddError($FauxContext,$this->Name, "ParseNode", "A fatal error occurred while attempting to parse xml nodes. Syntax Error: xml not properly defined.");
		} else {
			$RootNodeName = trim(substr($XmlString, $RootNodeStartTag+1, $RootNodeEndTag-1));

			// Evaluate the tag for attributes
			$SpacePosition = strpos($RootNodeName, " ");
			if ($SpacePosition !== false) {
				$sAttributes = trim(substr($RootNodeName,$SpacePosition,strlen($RootNodeName)-$SpacePosition));
				$RootNodeName = trim(substr($RootNodeName,0,$SpacePosition));

				$tmpArray = explode("=",$sAttributes);
				$i = 0;
				$ArrayKeys = count($tmpArray)-1;
				$Name = "";
				while($i < $ArrayKeys) {
					if ($i+1 <= $ArrayKeys) {
						if ($Name == "") $Name = ForceString($tmpArray[$i],"");
						$Value = ForceString($tmpArray[$i+1],"");
						if (strpos($Value,"\"") === 0) $Value = substr($Value,1);
						$NextQuotePosition = strpos($Value,"\"");
						$NextName = "";
						if ($NextQuotePosition !== false) {
							$NextName = trim(substr($Value,$NextQuotePosition));
							$Value = substr($Value,0,$NextQuotePosition);
						}
						$RootNodeAttributes[$Name] = $Value;
						$Name = $NextName;
					}
					$i += 2;
				}
			}
		}

		// Double check to see that the root tag name has been properly defined
		if ($RootNodeName == "") $this->ErrorManager->AddError($FauxContext,$this->Name, "ParseNode", "Node name not defined.");

		$Node = new XmlNode();
		$Node->Name = $RootNodeName;
		$Node->Attributes = $RootNodeAttributes;

		// Get content from within the root tag
		$RootNodeStartCloseTag = strpos($XmlString,"</".$RootNodeName.">");
		$XmlString = substr($XmlString, $RootNodeEndTag+1, $RootNodeStartCloseTag-$RootNodeEndTag-1);

		// Check the inner content to define the current node type
		if (strpos($XmlString, "<") !== false && strpos($XmlString, ">") !== false) {
			$Node->Type = XmlNodeTypeContainer;
		} else {
			$Node->Type = XmlNodeTypeContent;
		}

		if ($Node->Type == XmlNodeTypeContent) {
			// If the current node holds content, return it
			$Node->Value = $XmlString;
		} else {
			// If the current node contains more nodes, parse it
			// Define nodes until entire xmlstring has been handled at this level
			$HandlerComplete = false;
			while(!$HandlerComplete) {
				// Defind the node name
				$NodeStartOpenTag = strpos($XmlString, "<");
				$NodeEndOpenTag = strpos($XmlString, ">");
				$NodeName = trim(substr($XmlString, $NodeStartOpenTag+1, $NodeEndOpenTag-1-$NodeStartOpenTag));

				// Check the Node Name for any spaces and remove anything if it exists
				$SpacePosition = strpos($NodeName," ");
				if ($SpacePosition !== false) $NodeName = substr($NodeName, 0, $SpacePosition);

				// Find the position of the closing tag for this node
				$NodeStartCloseTag = strpos($XmlString,"</".$NodeName.">");
				$NodeEndCloseTag = $NodeStartCloseTag+strlen($NodeName)+3;

				// If it wasn't found, throw an error and break the loop
				if ($NodeStartCloseTag === false) {
					$this->ErrorManager->AddError($FauxContext,$this->Name, "ParseNode", "Closing tag for \"$NodeName\" node not defined.");
					break;
				// If the tag was found, return everything from the beginning to the end and parse it into a child
				} else {
					$NewXmlNodeString = substr($XmlString,$NodeStartOpenTag,$NodeEndCloseTag);
					$Node->Child[] = $this->ParseNode($NewXmlNodeString);
				}

				if (strlen($XmlString) > $NodeEndCloseTag) {
					$XmlString = trim(substr($XmlString, $NodeEndCloseTag, strlen($XmlString)));
				} else {
					$XmlString = "";
				}
				if ($XmlString == "") $HandlerComplete = true;
			}
		}
		return $Node;
	}

	function XmlManager() {
		$this->Name = "XmlManager";
	}
}
?>