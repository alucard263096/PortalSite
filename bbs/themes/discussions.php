<?php
// Note: This file is included from the library/Guagua/Guagua.Control.DiscussionGrid.php class.

echo '<div class="ContentInfo Top">
	<h1>
		' . ($this->Category? '<a href="'.GetUrl($this->Context->Configuration, 'index.php').'">'.$this->Context->GetDefinition('SiteMainPage').'</a> <span class="grey">&raquo;</span> ' : '') . $this->Context->PageTitle.'
	</h1>
	<div class="PageInfo">
		<p>'.($PageDetails == '' ? $this->Context->GetDefinition('NoDiscussionsFound') : $PageDetails).'</p>
		'.$PageList.'
	</div>
</div>
<div id="ContentBody">
	<ol id="Discussions">';

$Discussion = $this->Context->ObjectFactory->NewContextObject($this->Context, 'Discussion');
$FirstRow = 1;
$CurrentUserJumpToLastCommentPref = $this->Context->Session->User->Preference('JumpToLastReadComment');
$DiscussionList = '';
$ThemeFilePath = ThemeFilePath($this->Context->Configuration, 'discussion.php');
$Alternate = 0;
$RowNumber = 0;
while ($Row = $this->Context->Database->GetRow($this->DiscussionData)) {
	$RowNumber++;
	$this->DelegateParameters['RowNumber'] = &$RowNumber;
	$Discussion->Clear();
	$Discussion->GetPropertiesFromDataSet($Row);
	$Discussion->FormatPropertiesForDisplay();
	// Prefix the discussion name with the whispered-to username if this is a whisper
	if ($Discussion->WhisperUserID > 0) {
		$Discussion->Name = @$Discussion->WhisperUsername.': '.$Discussion->Name;
	}
	$this->DelegateParameters['Discussion'] = &$Discussion;
	$this->CallDelegate( 'PreSingleDiscussionRender' );
	// Discussion search results are identical to regular discussion listings, so include the discussion search results template here.
	include($ThemeFilePath);

	$FirstRow = 0;
	$Alternate = FlipBool($Alternate);
}
echo $DiscussionList.'
	</ol>
</div>';
if ($this->DiscussionDataCount > 0) {
	echo '<div class="ContentInfo Bottom">
		<div class="PageInfo">
			<p>'.$pl->GetPageDetails($this->Context).'</p>
			'.$PageList.'
		</div>
	</div>';
}

echo '<div id="Footer">Copyright &copy; '.date("Y").' <a href="./">'.$this->Context->Configuration['BANNER_TITLE'].'</a> - <a href="#" >'.$this->Context->Configuration['WEB_ICPBEIAN'].'</a> - <a href="mailto:'.$this->Context->Configuration['SUPPORT_EMAIL'].'">'.$this->Context->GetDefinition('ContactUs').'</a>- <a id="TopOfPage" href="'.GetRequestUri().'#pgtop">TOP</a>↑</div>';
?>