<?php
// Note: This file is included from the library/Guagua/Guagua.Control.Menu.php class.

echo '<div id="Guaua_Logo"><a href="./">'.$this->Context->Configuration['BANNER_TITLE'].'</a></div>';

echo '<div id="Session">';
	if ($this->Context->Session->UserID > 0) {
		echo str_replace('//1',	'<b>'.$this->Context->Session->User->Name, $this->Context->GetDefinition('SignedInAsX').'</b>')
			. ' [ <a href="'
			. FormatStringForDisplay(AppendUrlParameters(
				$this->Context->Configuration['SIGNOUT_URL'],
				'FormPostBackKey=' . $this->Context->Session->GetCsrfValidationKey() ))
			. '">'.$this->Context->GetDefinition('SignOut').'</a>]';
	} else {
		echo '<a href="people.php?PostBackAction=ApplyForm">'.$this->Context->GetDefinition('NotSignedIn') .'</a> [ <a href="'
			. FormatStringForDisplay(AppendUrlParameters(
				$this->Context->Configuration['SIGNIN_URL'],
				'ReturnUrl='. urlencode(GetRequestUri(0))))
			. '">'.$this->Context->GetDefinition('SignIn').'</a>]';
	}
	echo '&nbsp;&nbsp;&nbsp;'.$this->Context->GetDefinition('Today').show_time(time(), 'Y-m-d').'&nbsp;&nbsp;'.ChineseWeek(show_time(time(), 'w')) . '</div>';

	$this->CallDelegate('PreHeadRender');
	echo '<div id="Header">
			<ul>';
				while (list($Key, $Tab) = each($this->Tabs)) {
					echo '<li'.$this->TabClass($this->CurrentTab, $Tab['Value']).'><a href="'.$Tab['Url'].'" '.$Tab['Attributes'].'>'.$Tab['Text'].'</a></li>';
				}
			echo '</ul>
	</div>';
	$this->CallDelegate('PreBodyRender');
	echo '<div id="Body">';
?>