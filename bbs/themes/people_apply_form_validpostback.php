<?php
// Note: This file is included from the library/People/People.Control.ApplyForm.php class.

echo '<div class="FormComplete">
	<h2>'.$this->Context->GetDefinition('ThankYouForInterest').'</h2>
	<ul>
		<li>' . ($this->Context->Configuration['DEFAULT_ROLE'] == '-1' ? str_replace('//1',
			FormatStringForDisplay($this->Applicant->Email, 1),
			$this->Context->GetDefinition('ApplicationEmailCheck')) : $this->Context->GetDefinition('ApplicationWillBeReviewed')) .'</li>
		<p><a href="'.GetUrl($this->Context->Configuration, 'index.php').'">'.$this->Context->GetDefinition('BackToMainPage').'</a></p>
	</ul>
</div>';
?>