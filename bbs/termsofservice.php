<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+

include('appg/settings.php');
include('conf/settings.php');
// Create a faux-context (don't need all that extra overhead for this simple page - just the dictionary)

class FauxContext {
	var $Dictionary;

	// Constructor
	function FauxContext() {
		$this->Dictionary = array();
	}

	function GetDefinition($Code) {
		if (array_key_exists($Code, $this->Dictionary)) {
			return $this->Dictionary[$Code];
		} else {
			return $Code;
		}
	}
}
$Context = new FauxContext();

header ('content-type: text/html; charset='.$Configuration['CHARSET']);

// DEFINE THE LANGUAGE DICTIONARY
include($Configuration['LANGUAGES_PATH'].$Configuration['LANGUAGE'].'/definitions.php');
include($Configuration['APPLICATION_PATH'].'conf/language.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $Context->GetDefinition('XMLLang'); ?>">
<head>
<title><?php echo $Context->GetDefinition('TermsOfService'); ?></title>
<style type="text/css">
body {
	background: #ffffff;
	margin: 10px;
	padding-bottom: 10px;
}
body, div, h1, h2, p {
	font-family: "Trebuchet MS", tahoma, arial, verdana;
	color: #000;
	line-height: 160%;
}
h1 {
	font-size: 22px;
}
h2 {
	color: #c00;
	font-size: 14px;
	margin-bottom: 20px;

}
strong {
	color: #c00;
	font-weight: normal;
}
p {
	font-size: 12px;
	padding: 0px;
	margin-left: 0px;
	margin-right: 0px;
	margin-top: 0px;
	margin-bottom: 10px;
	font-size: 12px;
	color: #333;
}
a, a:link, a:visited {
	color: #36f;
	background: #ffc;
	text-decoration: none;
}
a:hover {
	color: #3300FF;
	background: #ffa;
	text-decoration: none;
}
</style>
</head>
<body>
<?php echo $Context->GetDefinition('TermsOfServiceBody'); ?>
</body>
</html>