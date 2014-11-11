<?php
// Note: This file is included from the library/People/People.Control.CompleteRegistration.php class.

echo '<div class="FormComplete">
	<h2>'.$this->Context->GetDefinition('ThankYouEmailCheck').'</h2>
	<ul>
		<li>' . $this->Context->GetDefinition('ApplicationEmailCheckComplete') .'</li>
		<p><a href="'.GetUrl($this->Context->Configuration, 'index.php').'">'.$this->Context->GetDefinition('BackToMainPage').'</a></p>
	</ul>
</div>';

echo '<script  language="JavaScript">setTimeout("window.location.href=\'' .GetUrl($this->Context->Configuration, 'index.php'). '\'",  3000);</script>';

?>