<?php
// Note: This file is included from the library/Framework/Framework.Control.UpdateCheck.php control.

echo '<div id="Form" class="Account UpdateCheck">';
	if (ForceIncomingBool('Checked', 0)) {
		
		echo '<div id="Success">'.$this->Context->GetDefinition('PleaseUpdateYourInstallation').'</div>';

		echo '<script language="javascript" type="text/javascript" src="http://www.weentech.com/guagua_version/guagua_versioninfo.js?temp='.rand().'"></script>
		<script type="text/javascript">
		if(typeof(v) == "undefined"){
			document.getElementById("guagua_latest_versioninfo").innerHTML = "'.$this->Context->GetDefinition('ErrUpdateCheckFailure').'";
		}else{
			var guagua_old_version = parseInt("' . APPLICATION_VERSION . '".replace(/\./g,""));
			var guagua_latest_version = parseInt(v.replace(/\./g,""));

			if(guagua_old_version < guagua_latest_version ){
				document.getElementById("guagua_latest_versioninfo").innerHTML = v;
			}else{
				document.getElementById("guagua_latest_versioninfo").innerHTML = "'.$this->Context->GetDefinition('ApplicationStatusGood').'";
			}

		}
		</script>';
	}

echo '<fieldset>
		<legend>'.$this->Context->GetDefinition('UpdateCheck').'</legend>
		'.$this->Get_Warnings().'
		'.$this->Get_PostBackForm('frmUpdateCheck').'
		<p>'.$this->Context->GetDefinition('UpdateCheckNotes').'</p>
		<p><input type="submit" name="btnCheck" value="'.$this->Context->GetDefinition('CheckForUpdates').'" class="Button SubmitButton Update" /></p>
		</form>
	</fieldset>';

	$this->PostBackParams->Set('PostBackAction', 'ProcessUpdateReminder');

	if (ForceIncomingBool('Saved', 0)) echo '<div id="Success">'.$this->Context->GetDefinition('ReminderChangesSaved').'</div>';

	echo '
	<fieldset>
		<legend>'.$this->Context->GetDefinition('UpdateReminders').'</legend>
		'.$this->Get_PostBackForm('frmUpdateReminders').'
		<p>'.$this->Context->GetDefinition('UpdateReminderNotes').'</p>
		<ul>
			<li>
				<label for="dReminder">'.$this->Context->GetDefinition('ReminderLabel').'</label>
				'.$this->ReminderSelect->Get().'
			</li>
		</ul>
		<p>
			<input type="submit" name="btnCheck" value="'.$this->Context->GetDefinition('Save').'" class="Button SubmitButton UpdateReminder" />
		</p>
		</form>
	</fieldset>
</div>';
?>