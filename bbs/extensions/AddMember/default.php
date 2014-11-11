<?php
/*
Extension Name: 添加新会员
Extension Url: http://www.weentech.com/bbs/
Description: 此插件允许管理员在其控制面板中添加新会员, 启用后需要设置管理员用户组具有添加新用户的权限.
Version: 2.0
Author: 闻泰网络
Author Url: http://www.weentech.com/
Extension Key: AddMember
*/

$Context->SetDefinition('AddMember', '添加新会员');
$Context->SetDefinition('AddMemberSuccess', '新会员添加成功: {UserName}');
$Context->SetDefinition('UserExtensions', '其它设置');
$Context->SetDefinition('PERMISSION_CREATE_MEMBER', '允许添加新会员');
$Context->Configuration['PERMISSION_CREATE_MEMBER'] = '0';


if ($Context->SelfUrl == "account.php" && $Context->Session->User->Permission('PERMISSION_CREATE_MEMBER')) {

	class CreateMemberForm extends PostBackControl {

		function CreateMemberForm(&$Context) {
		
			$this->Name = 'CreateMemberForm';
			$this->ValidActions = array('AddMember', 'ProcessNewMember');
			$this->Constructor($Context);
			if (!$this->Context->Session->User->Permission('PERMISSION_CREATE_MEMBER')) {
				$this->IsPostBack = 0;
			} elseif( $this->IsPostBack ) {
				if ($this->PostBackAction == 'ProcessNewMember') {
				
					//Create the new member

					//Create User Object
					$newuser = $this->Context->ObjectFactory->NewContextObject($this->Context, 'User');
					$newuser->Clear();
					
					$newuser->Name            = ForceIncomingString("Username", "");
					$newuser->NewPassword     = ForceIncomingString("NewPassword", "");
					$newuser->ConfirmPassword = ForceIncomingString("ConfirmPassword", "");
					$newuser->Email           = ForceIncomingString("Email", ""); 
			 
					$newuser->AgreeToTerms = 1;
						
					
					//Create UserManager
					$usermanager= $this->Context->ObjectFactory->NewContextObject($this->Context, 'UserManager');
        
					//Save User
					if ($usermanager->CreateUser($newuser)) 
					{	
						$thisUserID   = $usermanager->GetUserIdByName($newuser->Name);
						$thisRoleID   = ForceIncomingString("NewRole", "0");

						$s = $this->Context->ObjectFactory->NewContextObject($this->Context, 'SqlBuilder');
						$s->SetMainTable('User', 'u');
						$s->AddFieldNameValue('RoleID', $thisRoleID);
						$s->AddWhere('u', 'UserID', '', $thisUserID, '=');
						$this->Context->Database->Update($s, $this->Name, 'AssignRole', 'An error occurred while assigning the user to a role.');
						  
						Redirect(GetUrl($this->Context->Configuration, 'account.php', '', '', '', '', 'PostBackAction=AddMember&Success=1&u='.$newuser->UserID).'&name='.$newuser->Name);
					} else {
						$this->PostBackAction = 'AddMember';
					}
			}
			$this->CallDelegate('Constructor');
		}
    }
    
    function Render() {
			if ($this->IsPostBack) {
				$this->CallDelegate('PreRender');
				$this->PostBackParams->Clear();
				if ($this->PostBackAction == 'AddMember') {
					$this->PostBackParams->Set('PostBackAction', 'ProcessNewMember');
					
					$name        = ForceIncomingString("Username", "");
					$password    = ForceIncomingString("NewPassword", "");
					$confirm     = ForceIncomingString("ConfirmPassword", "");
					$email       = ForceIncomingString("Email", "");
					$newrole     = ForceIncomingString("NewRole", "0");
					$Required = ' '.$this->Context->GetDefinition('Required');

					echo '
					<div id="Form" class="Account Identity">';
					if (ForceIncomingInt('Success', 0)) {
					    $newuserurl = '<a href="'.GetUrl($this->Context->Configuration, 'account.php', '', '', '', '', 'u='.ForceIncomingInt('u', 0)).'">'.ForceIncomingString("name", "").'</a>';
						$successtext = str_replace("{UserName}", $newuserurl, $this->Context->GetDefinition('AddMemberSuccess'));
						echo '<div id="Success">'.$successtext.'</div>';
					}
					echo '
						<fieldset>
							<legend>'.$this->Context->GetDefinition("AddMember").'</legend>
							'.$this->Get_Warnings().'
							'.$this->Get_PostBackForm('frmAddMember');
							
							
							echo '<h2>'.$this->Context->GetDefinition("DefineYourAccountProfile").'</h2>
							<ul>
             <li>
      						<label for="txtUsername">
      							'.$this->Context->GetDefinition("YourUsername").'<small>'.$Required.'</small></label>
     	 						<input id="txtUsername" type="text" name="Username" class="PanelInput" maxlength="20" value="'.$name.'" />
     	 					<span class="Description">'.$this->Context->GetDefinition('YourUsernameNotes').'</span>
   						</li>
   						
							<li>
      						<label for="txtEmail">
      							'.$this->Context->GetDefinition("YourEmailAddress").'<small>'.$Required.'</small>
      						</label>
     	 						<input id="txtEmail" type="text" name="Email" class="PanelInput" maxlength="200" value="'.$email.'" />
     	 						<span class="Description">'.$this->Context->GetDefinition('YourEmailAddressNotes').'</span>	
   						</li>  
   						
							<li>
      						<label for="txtPassword">
      							'.$this->Context->GetDefinition("Password").'<small>'.$Required.'</small>
      						</label>
     	 						<input id="txtPassword" type="text" name="NewPassword" class="PanelInput" maxlength="50" value="'.$password.'" />
   						</li> 

							<li>
      						<label for="txtPassword2">
      							'.$this->Context->GetDefinition("PasswordAgain").'<small>'.$Required.'</small>
      						</label>
     	 					 <input id="txtPassword2" type="text" name="ConfirmPassword" class="PanelInput" maxlength="50" value="'.$confirm.'" />
   						</li>'; 

				//Get and display the roles
				if ($this->Context->Session->User->Permission('PERMISSION_APPROVE_APPLICANTS') and $this->Context->Session->User->Permission('PERMISSION_CHANGE_USER_ROLE')){
				echo '<li><label for="lstRoles">'.$this->Context->GetDefinition("Roles").'<small>'.$Required.'</small></label><select name="NewRole" class="PanelInput" id="lstRoles">';
				$RoleMng = $this->Context->ObjectFactory->NewContextObject($this->Context, 'RoleManager');
				$RoleData = $RoleMng->GetRoles('2');
				if($RoleData)
				{
					while($Row = $this->Context->Database->GetRow($RoleData)) {
						echo '<option value="'.$Row['RoleID'].'" ';
						if ($newrole == $Row['RoleID']) echo 'selected';
						echo '>'.FormatStringForDisplay($Row['Name']).'</option>';
						}
				}
				echo '</select>
				     </li>'; 	
   			}			     


  				echo '</ul>
   							<div class="Submit">
								<input type="submit" name="btnSave" value="'.$this->Context->GetDefinition('Save').'" class="Button SubmitButton" />
								<a href="'.GetUrl($this->Context->Configuration, $this->Context->SelfUrl).'" class="CancelButton">'.$this->Context->GetDefinition('Cancel').'</a>
							  </div>
						
							</form>
						</fieldset>
					</div>
					';
				}
				$this->CallDelegate('PostRender');
			}
		}
	}
	
}


if (in_array($Context->SelfUrl, array('account.php'))) {
	if ($Context->Session->User && $Context->Session->User->Permission("PERMISSION_CREATE_MEMBER")){
			
		$CreateMemberForm = $Context->ObjectFactory->NewContextObject($Context, 'CreateMemberForm');
		$Page->AddRenderControl($CreateMemberForm, $Configuration["CONTROL_POSITION_BODY_ITEM"] + 1);
	  	
		$UserExtensions = $Context->GetDefinition("UserExtensions");
		$Panel->AddList($UserExtensions, $Position = '15', $ForcePosition = '1');
		$Panel->AddListItem($UserExtensions, $Context->GetDefinition('AddMember'), GetUrl($Configuration, $Context->SelfUrl, "", "", "", "", "PostBackAction=AddMember"), "", "", 93);	
						
	}
}

?>