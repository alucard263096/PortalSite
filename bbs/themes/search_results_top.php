<?php
// Note: This file is included from the library/Guagua/Guagua.Control.SearchForm.php class.
$SearchID = "Discussions";
switch ($this->Search->Type) {
	case "Comments":
		$SearchID = "CommentResults";
		break;
	case "Users":
		$SearchID = "UserResults";
		break;
	}

echo '<div class="ContentInfo Top">
	<h1>'.$this->Context->GetDefinition('Search').$this->Context->GetDefinition($this->Search->Type).': '.$this->SearchQuery.'</h1>
	<div class="PageInfo">
		<p>'.$this->PageDetails.'</p>
		'.$this->PageList.'
	</div>
</div>
<div id="ContentBody">
	<ol id="'.$SearchID.'">';

?>