<?php
// Note: This file is included from the library/Guagua/Guagua.Control.DiscussionForm.php class.

echo '<div id="PostForm" class="StartDiscussion">
	<fieldset>
		<legend>'.$this->Title.'</legend>'
		.$this->Get_Warnings()
		.$this->Get_PostBackForm('frmPostDiscussion', 'post', 'post.php')
		.'<ul>';
	if ($this->Context->Configuration['USE_CATEGORIES']) {
		$this->DelegateParameters['CategorySelect'] = &$cs;
		$this->CallDelegate('DiscussionForm_PreCategoryRender');
		$cs->Attributes .= ' id="ddCategories"';
		echo '<li>
			<label for="ddCategories">'.$this->Context->GetDefinition('SelectDiscussionCategory').'</label>
			'.$cs->Get()
		.'</li>';
	} else {
		echo '<input type="hidden" name="CategoryID" value="'.$cs->aOptions[0]['IdValue'].'" />';
	}
	$this->CallDelegate('DiscussionForm_PreTopicRender');
	echo '<li>
		<label for="txtTopic">'.$this->Context->GetDefinition('EnterYourDiscussionTopic').'</label>
		<input id="txtTopic" type="text" name="Name" class="DiscussionBox" maxlength="100" value="'.$Discussion->Name.'" />
	</li>';

	if ($this->Context->Configuration['ENABLE_WHISPERS'] && $Discussion->DiscussionID == 0) {
		echo '<li>
			<label for="WhisperUsername">'.$this->Context->GetDefinition('WhisperYourCommentsTo').'</label>
			<input id="WhisperUsername" name="WhisperUsername" type="text" value="'.FormatStringForDisplay($Discussion->WhisperUsername, 0).'" class="Whisper AutoCompleteInput" maxlength="20" />
			<script type="text/javascript">
				var WhisperAutoComplete = new AutoComplete("WhisperUsername", false);
				WhisperAutoComplete.TableID = "WhisperAutoCompleteResults";
				WhisperAutoComplete.KeywordSourceUrl = "'.$this->Context->Configuration['WEB_ROOT'].'ajax/getusers.php?Search=";
			</script>
		</li>
		';
	}

	$this->CallDelegate('DiscussionForm_PreCommentRender');

	if (!$this->Context->Session->User->Permission('PERMISSION_HTML_ALLOWED')){
	echo '<li>
		<label for="CommentBox">
			<a href="./" id="CommentBoxController" onclick="'
				."ToggleCommentBox('".$this->Context->Configuration['WEB_ROOT']."ajax/switch.php', '".$this->Context->GetDefinition('SmallInput')."', '".$this->Context->GetDefinition('BigInput')."', '". $this->Context->Session->GetCsrfValidationKey()."'); return false;".'">'.$this->Context->GetDefinition($this->Context->Session->User->Preference('ShowLargeCommentBox')?'SmallInput':'BigInput').'</a>';

				$this->CallDelegate('DiscussionForm_PostCommentToggle');

				echo $this->Context->GetDefinition('EnterYourDiscussion').'
		</label>
		<textarea name="Body" class="'
		.($this->Context->Session->User->Preference('ShowLargeCommentBox') ? 'LargeCommentBox' : 'SmallCommentBox')
		.'" id="CommentBox" rows="10" cols="85"'.$this->DiscussionFormAttributes.'>'
		.$Discussion->Comment->Body
		.'</textarea>
	</li></ul>';

	} else {

	echo '<li>
	<label for="CommentBox">'.$this->Context->GetDefinition('EnterYourDiscussion').'
		</label>
	<div class="CommentBoxDiv">
	<textarea name="Body" style="width:800px;height:280px;" id="CommentBox">'
		.$Discussion->Comment->Body
		.'</textarea>
	</div></li></ul>';

	}

	$this->CallDelegate('DiscussionForm_PreButtonsRender');

	echo '<div class="Submit">
		<input type="submit" id="btnSave" name="btnSave" value="'.$this->Context->GetDefinition(($Discussion->DiscussionID > 0) ? 'SaveYourChanges' : 'StartYourDiscussion').'" class="Button SubmitButton StartDiscussionButton" /><span class="CtrlEnterSubmit">'.$this->Context->GetDefinition('CtrlEnterSubmit').'</span>';
		$this->CallDelegate('DiscussionForm_PostSubmitRender');
		echo '<a href="'.(!$this->IsPostBack?'javascript:history.back();':'./').'" class="CancelButton">'.$this->Context->GetDefinition('Cancel').'</a>
	</div>';

	$this->CallDelegate('DiscussionForm_PostButtonsRender');

	echo'</form>
	</fieldset>
</div>';

echo '<div id="Footer">Copyright &copy; '.date("Y").' <a href="./">'.$this->Context->Configuration['BANNER_TITLE'].'</a> - <a href="http://www.miibeian.gov.cn/" target="_blank">'.$this->Context->Configuration['WEB_ICPBEIAN'].'</a> - <a href="mailto:'.$this->Context->Configuration['SUPPORT_EMAIL'].'">'.$this->Context->GetDefinition('ContactUs').'</a> - Po'.'wered b'.'y <a hr'.'ef="ht'.'tp:/'.'/w'.'ww.w'.'gushuini.c'.'om/" tar'.'get="_bl'.'ank">雷德睦华 '.APPLICATION_VERSION.'</a> - <a id="TopOfPage" href="'.GetRequestUri().'#pgtop">TOP</a>↑</div>';

?>	

