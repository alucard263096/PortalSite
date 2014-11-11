<?php
// Note: This file is included from the library/Guagua/Guagua.Control.DiscussionForm.php class.

echo '<div id="PostForm" class="AddComments">
	<fieldset>
		<legend>'.$this->Title.'</legend>'
		.$this->Get_Warnings()
		.$this->Get_PostBackForm('frmPostComment', 'post', 'post.php')
	.'<ul>';

		$this->CallDelegate('CommentForm_PreWhisperInputRender');

		if ($this->Context->Configuration['ENABLE_WHISPERS']) {
			if ($this->Discussion->WhisperUserID > 0) {
				echo '<li><label for="WhisperUsername">'.str_replace('//1', (($this->Discussion->WhisperUserID == $this->Context->Session->UserID) ? $this->Discussion->AuthUsername : $this->Discussion->WhisperUsername), $this->Context->GetDefinition('YourCommentsWillBeWhisperedToX')).'</label></li>';
			} else {
				echo '<li>
					<label for="WhisperUsername">'.$this->Context->GetDefinition('WhisperYourCommentsTo').'</label>
					<input id="WhisperUsername" name="WhisperUsername" type="text" value="'.$Comment->WhisperUsername.'" class="Whisper AutoCompleteInput" maxlength="20" />
					<script type="text/javascript">
						var WhisperAutoComplete = new AutoComplete("WhisperUsername", false);
						WhisperAutoComplete.TableID = "WhisperAutoCompleteResults";
						WhisperAutoComplete.KeywordSourceUrl = "'.$this->Context->Configuration['WEB_ROOT'].'ajax/getusers.php?Search=";
					</script>
				</li>
				';
			}
		}

		$this->CallDelegate('CommentForm_PreCommentsInputRender');

	if (!$this->Context->Session->User->Permission('PERMISSION_HTML_ALLOWED')){
		echo '<li>
			<label for="CommentBox">
				<a href="./" id="CommentBoxController" onclick="'
					."ToggleCommentBox('".$this->Context->Configuration['WEB_ROOT']."ajax/switch.php', '".$this->Context->GetDefinition('SmallInput')."', '".$this->Context->GetDefinition('BigInput')."', '". $this->Context->Session->GetCsrfValidationKey() ."'); return false;".'">'.$this->Context->GetDefinition($this->Context->Session->User->Preference('ShowLargeCommentBox')?'SmallInput':'BigInput').'</a>';

				$this->CallDelegate('CommentForm_PostCommentToggle');

				echo $this->Context->GetDefinition('EnterYourComments').'
			</label>
			<textarea name="Body" class="'
			.($this->Context->Session->User->Preference('ShowLargeCommentBox') ? 'LargeCommentBox' : 'SmallCommentBox')
			.'" id="CommentBox" rows="10" cols="85"'.$this->CommentFormAttributes.'>'
			.$Comment->Body
			.'</textarea>
		</li>
		'.$this->GetPostFormatting($Comment->FormatType)
	.'</ul>';

	} else {

	echo '<li>
	<label for="CommentBox">'.$this->Context->GetDefinition('EnterYourComments').'
		</label>
	<div class="CommentBoxDiv">
	<textarea name="Body" style="width:800px;height:180px;" id="CommentBox">'
		.$Comment->Body
		.'</textarea>
	</div></li></ul>';

	}

	$this->CallDelegate('CommentForm_PreButtonsRender');

	echo '<div class="Submit">
		<input type="submit" id="btnSave" name="btnSave" value="'.($Comment->CommentID > 0 ? $this->Context->GetDefinition('SaveYourChanges') : $this->Context->GetDefinition('AddYourComments'))
			.'" class="Button SubmitButton AddCommentsButton" /><span class="CtrlEnterSubmit">'.$this->Context->GetDefinition('CtrlEnterSubmit').'</span>';
		$this->CallDelegate('CommentForm_PostSubmitRender');

		echo '&nbsp;';

		if ($this->PostBackAction == 'SaveComment' || ($this->PostBackAction == '' && $Comment->CommentID > 0)) {
			if ($this->Comment->DiscussionID > 0) {
				echo '<a href="'.GetUrl($this->Context->Configuration, 'comments.php', '', 'DiscussionID', $this->Comment->DiscussionID).'" class="CancelButton">'.$this->Context->GetDefinition('Cancel').'</a>';
			} else {
				echo '<a href="'.GetUrl($this->Context->Configuration, 'index.php').'" class="CancelButton">'.$this->Context->GetDefinition('Cancel').'</a>';
			}
		}
	echo '</div>';

	$this->CallDelegate('CommentForm_PostButtonsRender');

	echo '
	</form>
	</fieldset>
</div>';
?>