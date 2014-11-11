<?php
/*
Extension Name: 上传附件
Extension Url: http://www.weentech.com/bbs/
Description: 此插件允许发帖时上传附件, 启用后需要设置相关用户组具有上传附件的权限.
Version: 2.0
Author: 闻泰网络
Author Url: http://www.weentech.com/
Extension Key: Attachments
*/

$Context->Configuration['ATTACHMENTS_ALLOWED_FILETYPES'] = array (
	'image/gif'						=> array('gif', 'GIF'),
	'image/png'						=> array('png', 'PNG'),
	'image/x-png'						=> array('png', 'PNG'),
	'image/jpeg'					=> array('jpg', 'jpeg', 'JPG', 'JPEG'),
	'image/pjpeg'					=> array('jpg', 'jpeg', 'JPG', 'JPEG'),
	'application/pdf'				=> array('pdf', 'PDF'),
	'application/x-pdf'				=> array('pdf', 'PDF'),
	'application/msword'			=> array('doc', 'DOC', 'rtf', 'RTF'),
	'application/zip'				=> array('zip', 'ZIP'),
	'application/x-zip-compressed'	=> array('zip', 'ZIP'),
	'application/octet-stream'		=> array('rar', 'RAR', 'doc', 'DOC'),
	'application/x-download'		=> array('rar', 'RAR'),
	'text/plain'					=> array('txt', 'TXT'),
	'application/x-gzip'			=> array('gz', 'GZ', 'tar.gz', 'TAR.GZ'),
	'application/x-gzip-compressed'			=> array('gz', 'GZ', 'tar.gz', 'TAR.GZ'),
	'application/gzip'			=> array('gz', 'GZ', 'tar.gz', 'TAR.GZ'),
	'application/download'			=> array('rar', 'RAR')
);

// Language dictionary
$Context->Dictionary['Attachment'] = '附件';
$Context->Dictionary['Attachments'] = '上传附件:';
$Context->Dictionary['DeleteAttachments'] = '删除已有附件:';
$Context->Dictionary['DeleteAttachment'] = '删除';
$Context->Dictionary['ConfirmDeleteAttachment'] = '确定删除此附件吗?';
$Context->Dictionary['AttachmentSettings'] = '附件设置';
$Context->Dictionary['AttachmentUploadSettings'] = '上传附件设置';
$Context->Dictionary['AttachmentUploadSettingsInfo'] = '附件保存目录/%year%%month%/随月份变化, 如: /200908/, 可使用以下标签替代: %day%, %month%, %year%, %userid%<BR>允许上传的文件类型包括: txt, doc, jpg, gif, png, pdf, zip, rar, gz, rtf等.';
$Context->Dictionary['UploadPath'] = '附件保存路径:';
$Context->Dictionary['MaximumFilesize'] = '允许附件大小: <small>(字节)</small>';
$Context->Dictionary['MaximumUploadFiles'] = '每次上传允许附件的最大个数:';
$Context->Dictionary['RememberToSetAttachmentsPermissions'] = '请先设置相关用户组具有上传附件或管理附件的权限: <a href="'.GetUrl($Context->Configuration, 'settings.php', '', '', '', '', 'PostBackAction=Roles').'">设置用户组权限</a>.';
$Context->Dictionary['ErrCreateAttachmentFolder'] = '无法创建保存附件的文件夹, 请检查上传目录uploads的可写属性.';
$Context->Dictionary['ErrAttachmentNotFound'] = '未找到相关附件.';
$Context->Dictionary['ErrAttachmentsTooMuch'] = '同时上传的附件数不得超过: //1 个.';
$Context->Dictionary['PERMISSION_ADD_ATTACHMENTS'] = '允许上传附件';
$Context->Dictionary['PERMISSION_MANAGE_ATTACHMENTS'] = '允许管理附件';


/****** DO NOT EDIT BELOW THIS LINE ******/

// Default permissions
$Context->Configuration['PERMISSION_ADD_ATTACHMENTS'] = '0';
$Context->Configuration['PERMISSION_MANAGE_ATTACHMENTS'] = '0';

if (!array_key_exists('ATTACHMENTS_UPLOAD_PATH', $Configuration)) {
	AddConfigurationSetting($Context, 'ATTACHMENTS_UPLOAD_PATH', $Configuration['APPLICATION_PATH'] . 'uploads/%year%%month%/');
	AddConfigurationSetting($Context, 'ATTACHMENTS_MAXIMUM_FILESIZE', '512000');
	AddConfigurationSetting($Context, 'ATTACHMENTS_MAXIMUM_UPLOADFILES', '3');
} else {

	class Attachment {
		var $AttachmentID;
		var $UserID;
		var $DiscussionID;
		var $CommentID;
		var $Title;
		var $Name;
		var $Path;
		var $Size;
		var $MimeType;
		var $Extension;
		var $DateCreated;
		var $Url;

		// Constructor
		function Attachment() {
			$this->Clear();
		}

		function Clear() {
			$this->AttachmentID = 0;
			$this->UserID = 0;
			$this->DiscussionID = 0;
			$this->CommentID = 0;
			$this->Title = "";
			$this->Name = "";
			$this->Path = "";
			$this->Size = 0;
			$this->Extension = "";
			$this->MineType = "";
			$this->DateCreated = "";
			$this->Url = "";
		}

		function GetPropertiesFromDataSet(&$Configuration, $DataSet) {
			$this->AttachmentID = @$DataSet['AttachmentID'];
			$this->UserID = @$DataSet['UserID'];
			$this->DiscussionID = @$DataSet['DiscussionID'];
			$this->CommentID = @$DataSet['CommentID'];
			$this->Title = @$DataSet['Title'];
			$this->Name = @$DataSet['Name'];
			$this->Path = @$DataSet['Path'];
			$this->Size = @$DataSet['Size'];
			$this->MineType = @$DataSet['MineType'];
			$this->DateCreated = UnixTimestamp(@$DataSet['DateCreated']);
			$this->Url = GetUrl($Configuration, './', '', '', '', '', 'PostBackAction=Download&AttachmentID='. $this->AttachmentID);
			$this->Extension = strtolower(end(explode('.', $this->Name)));
		}

		function FormatPropertiesForDatabaseInput() {
			$this->Name = FormatStringForDatabaseInput($this->Name);
			$this->Title = FormatStringForDatabaseInput($this->Title);
			$this->Path = FormatStringForDatabaseInput($this->Path);
		}

		function FormatPropertiesForDisplay() {
			$this->Name = FormatStringForDisplay($this->Name);
			$this->Title = FormatStringForDisplay($this->Title);
			$this->Path = FormatStringForDisplay($this->Path);
		}
	}

	class AttachmentManager extends Delegation {
		var $FormName;
		var $Attachments;
		var $DiscussionID;
		var $Discussion;
		var $CommentID;
		var $Comment;
		var $FileIdentifier;

		// Constructor
		function AttachmentManager(&$Context) {
			$this->Name	= 'AttachmentManager';
			$this->Delegation($Context);
			$this->FormName = 'frmPostComment';
			$this->Attachments = array();
			$this->DiscussionID = ForceIncomingInt('DiscussionID', 0);
			$this->FileIdentifier = 'file';
			$this->CallDelegate('Constructor');
		}

		function GetAttachmentBuilder() {
			$s = $this->Context->ObjectFactory->NewContextObject($this->Context, 'SqlBuilder');
			$s->SetMainTable('Attachment', 'a');
			$s->AddSelect(array('AttachmentID', 'UserID', 'DiscussionID', 'CommentID', 'Title', 'Name', 'Path', 'Size', 'MimeType', 'DateCreated'), 'a');
			return $s;
		}

		function GetAttachmentById($AttachmentID) {
			$Attachment = $this->Context->ObjectFactory->NewObject($this->Context, 'Attachment');
			$s = $this->GetAttachmentBuilder();
			$s->AddWhere('a', 'AttachmentID', '', $AttachmentID, '=');
			$ResultSet = $this->Context->Database->Select($s, $this->Name, 'RetrieveAttachments', 'An error occurred while retrieving the attachment.');
			if ($this->Context->Database->RowCount($ResultSet) == 0)
				$this->Context->WarningCollector->Add($this->Context->GetDefinition('ErrAttachmentNotFound'));
			while ($rows = $this->Context->Database->GetRow($ResultSet)) {		
				$Attachment->GetPropertiesFromDataSet($this->Context->Configuration, $rows);
			}
			return $this->Context->WarningCollector->Iif($Attachment, false);
		}

		function RemoveAttachment($AttachmentID) {
			$s = $this->Context->ObjectFactory->NewContextObject($this->Context, 'SqlBuilder');
			$s->SetMainTable('Attachment', 'a');
			$s->AddWhere('a', 'AttachmentID', '', $AttachmentID, '=');
			$this->Context->Database->Delete($s, $this->Name, 'RemoveAttachment', 'An error occurred while removing attachment.');
		}

		function RetrieveAttachments() {
			$this->CallDelegate('PreRetrieveAttachments');
			if( $this->DiscussionID > 0 ) {
				$s = $this->GetAttachmentBuilder();
				$s->AddWhere('a', 'DiscussionID', '', $this->DiscussionID, '=');
				$ResultSet = $this->Context->Database->Select($s, $this->Name, 'RetrieveAttachments', 'An error occurred while retrieving attachments.');
				while ($rows = $this->Context->Database->GetRow($ResultSet)) {
					$Attachment = $this->Context->ObjectFactory->NewObject($this->Context, 'Attachment');
					$Attachment->GetPropertiesFromDataSet($this->Context->Configuration, $rows);
					$this->Attachments[$Attachment->CommentID][] = $Attachment;
				}
			}
			$this->CallDelegate('PostRetrieveAttachments');
		}

		function UploadAttachments() {
			$this->CallDelegate('PreUploadAttachments');
			$totalUploadFiles = $this->GetFilesFound();
			$maxUploadFiles = $this->Context->Configuration['ATTACHMENTS_MAXIMUM_UPLOADFILES'];
			if( $totalUploadFiles > 0 && $totalUploadFiles <= $maxUploadFiles) {
				$this->Attachments = array();
				$Uploader = $this->Context->ObjectFactory->NewContextObject($this->Context, 'Uploader');
				$Uploader->MaximumFileSize = $this->Context->Configuration['ATTACHMENTS_MAXIMUM_FILESIZE'];
				$Uploader->AllowedFileTypes = $this->Context->Configuration['ATTACHMENTS_ALLOWED_FILETYPES'];
				foreach( $_FILES as $Key => $File ) {
					if( substr($Key, 0, strlen($this->FileIdentifier)) == $this->FileIdentifier && basename($File['name']) !== "" ) {
						$UploadPath = $this->CreateAttachmentFolder();
						if( $UploadPath ) {
							$NewFileName = $Uploader->Upload($Key, $UploadPath, $File['name']);
							if( $this->Context->WarningCollector->Count() == 0 ) {
								$FilePath = $UploadPath.$NewFileName;
								// Change file permissions
								@chmod($FilePath, 0777);
								// Remember uploaded attachment
								$this->Attachments[] = array('Path' => $FilePath, 'Size' => $File['size'], 'Type' => $File['type']);
							}
						} else {
							$this->Context->WarningCollector->Add($this->Context->GetDefinition('ErrCreateAttachmentFolder'));
						}
					}
				}
			}elseif ($totalUploadFiles > $maxUploadFiles){
				$this->Context->WarningCollector->Add(str_replace('//1',$maxUploadFiles,$this->Context->GetDefinition('ErrAttachmentsTooMuch')));
			}
			$this->CallDelegate('PostUploadAttachments');
			return $this->Context->WarningCollector->Count();
		}

		function SaveAttachments() {
			$this->CallDelegate('PreSaveAttachments');

			// If there are warning messages, delete the attachments
			// because the comment hasn't been created
			if( $this->Context->WarningCollector->Count() > 0 ) {
				foreach( $this->Attachments as $File ) {
					$FileName = basename($File['Path']);
					$FilePieces = explode('.', $FileName);
					$FileExtension = $FilePieces[count($FilePieces)-1];
					$FileNameOnly = str_replace('.'.$FileExtension, '', $FileName);
					@unlink( str_replace($FileName, '', $File['Path']).md5($FileNameOnly).'.'.$FileExtension );
				}
			} else {
				$Attachment = $this->Context->ObjectFactory->NewObject($this->Context, 'Attachment');			
				foreach( $this->Attachments as $File ) {
					$FileName = basename($File['Path']);
					$FilePieces = explode('.', $FileName);
					$FileExtension = $FilePieces[count($FilePieces)-1];
					$FileNameOnly = str_replace('.'.$FileExtension, '', $FileName);

					$Attachment->UserID = $this->Context->Session->UserID;
					$Attachment->DiscussionID = $this->DiscussionID;
					$Attachment->CommentID = $this->Comment->CommentID;
					$Attachment->Title = $FileName;
					$Attachment->Name = $FileName;
					$Attachment->Path = str_replace($FileName, '', $File['Path']).md5($FileNameOnly).'.'.$FileExtension;
					$Attachment->Size = $File['Size'];
					$Attachment->MimeType = $File['Type'];
					$Attachment->DateCreated = MySqlDateTime();

					$this->DelegateParameters['SaveAttachment'] = &$Attachment;
					$this->CallDelegate('PreSaveAttachment');
					
					// Save the attachment to database
					$this->SaveAttachment($Attachment);

					$this->DelegateParameters['ResultAttachment'] = &$Attachment;
					$this->CallDelegate('PostSaveAttachment');
				}
			}
			$this->CallDelegate('PostSaveAttachments');
		}

		function SaveAttachment(&$Attachment) {
			$Attachment->FormatPropertiesForDatabaseInput();
			$s = $this->Context->ObjectFactory->NewContextObject($this->Context, 'SqlBuilder');
			$s->SetMainTable('Attachment', 'a');
			$s->AddFieldNameValue('UserID', $Attachment->UserID);
			$s->AddFieldNameValue('DiscussionID', $Attachment->DiscussionID);
			$s->AddFieldNameValue('CommentID', $Attachment->CommentID);
			$s->AddFieldNameValue('Title', $Attachment->Title);
			$s->AddFieldNameValue('Name', $Attachment->Name);
			$s->AddFieldNameValue('Path', $Attachment->Path);
			$s->AddFieldNameValue('Size', $Attachment->Size);
			$s->AddFieldNameValue('MimeType', $Attachment->MimeType);
			$s->AddFieldNameValue('DateCreated', $Attachment->DateCreated);
			$Attachment->AttachmentID = $this->Context->Database->Insert($s, $this->Name, 'SaveAttachments', 'An error occurred while saving an attachment');
		}

		function DownloadAttachment($AttachmentID) {
			$this->CallDelegate('PreDownloadAttachment');
			$Attachment = $this->Context->ObjectFactory->NewObject($this->Context, 'Attachment');
			$s = $this->GetAttachmentBuilder();
			$s->AddWhere('a', 'AttachmentID', '', $AttachmentID, '=');
			$ResultSet = $this->Context->Database->Select($s, $this->Name, 'RetrieveAttachments', 'An error occurred while retrieving attachments.');
			while ($rows = $this->Context->Database->GetRow($ResultSet)) {
				$Attachment->GetPropertiesFromDataSet($this->Context->Configuration, $rows);
			}
			if( $Attachment->AttachmentID > 0 ) {
				// If this attachment belongs to a discussion, check if we can view this discussion, else 
				// we should not be able to download the attachment file either! (Thanks to jaz)
				if ($Attachment->DiscussionID > 0) {
					$DiscussionManager = $this->Context->ObjectFactory->NewContextObject($this->Context, 'DiscussionManager');
					$DiscussionData = $DiscussionManager->GetDiscussionById($Attachment->DiscussionID);
					if (!$DiscussionData) die();
				}
				$this->DelegateParameters['DownloadAttachment'] = &$Attachment;
				$this->CallDelegate('DownloadAttachment');
				$Path = $Attachment->Path;
				$this->SaveAsDialogue($Path, $Attachment->Name);
			} else {
				die();
			}
		}

		function SaveAsDialogue($FolderPath, $FileName, $DeleteFile = '0') {
			$DeleteFile = ForceBool($DeleteFile, 0);

			header('Pragma: public');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Content-Type: application/force-download');
			header('Content-Type: application/octet-stream');
			header('Content-Type: application/download');
			header('Content-Disposition: attachment; filename="'.iconv('utf-8','gbk',$FileName).'"');
			header('Content-Transfer-Encoding: binary');
			readfile($FolderPath);
			if ($DeleteFile) @unlink($FolderPath);
			die();
		}

		function Render_Attachments() {
			$this->DelegateParameters['Comment'] = &$this->Comment;
			$this->CallDelegate('PreRender_Attachments');
			$imageArray = array('gif','png','jpg','bmp');
			if( $this->Comment ) {
				if( isset( $this->Attachments[$this->Comment->CommentID] )) {
					$AttachmentBody = "";
					foreach( $this->Attachments[$this->Comment->CommentID] as $Attachment) {
						$Attachment->FormatPropertiesForDisplay();
						$this->DelegateParameters['Attachment'] = &$Attachment;
						$this->DelegateParameters['AttachmentBody'] = &$AttachmentBody;
						$this->CallDelegate('PreRender_Attachment');
						if( $Attachment ) {
							$AttachmentBody .= '
								<div class="Attachment '.$Attachment->Extension.'">';
							if (in_array (strtolower($Attachment->Extension), $imageArray)) {
								$AttachmentBody .= '<a href="'. $this->Context->Configuration['BASE_URL'] . str_replace($this->Context->Configuration['APPLICATION_PATH'], '', $Attachment->Path) .'" target="_blank"><img src="'. $this->Context->Configuration['BASE_URL'] . str_replace($this->Context->Configuration['APPLICATION_PATH'], '', $Attachment->Path) .'" border="0" ></a>';
							} else {
								$AttachmentBody .= '<a href="'. $Attachment->Url .'">'. $Attachment->Title .'</a>&nbsp;&nbsp;<span style="color:#ADADAD;">'.FormatFileSize($Attachment->Size).'</span>&nbsp;&nbsp;<span style="color:#ADADAD;">'.date('Y-m-d', $Attachment->DateCreated).'</span>';

							}
							$AttachmentBody .= '</div>';
						}				
						$this->CallDelegate('PostRender_Attachment');
					}
					if( $AttachmentBody !== "" ) {
						$AttachmentBody = '<div class="Attachments" id="Attachments_'.$this->Comment->CommentID.'"><div class="AttachmentTop">'. $this->Context->GetDefinition('Attachment') .':</div>' . $AttachmentBody;
						$AttachmentBody .= '</div>';
					}
					$this->Comment->Body .= $AttachmentBody;
				}
			}
			$this->CallDelegate('PostRender_Attachments');
		}

		function Render_AttachmentForm() {
			$thisAttachmentslist = $this->GetAttachmentsList($this->CommentID);
			$maxUploadFiles = $this->Context->Configuration['ATTACHMENTS_MAXIMUM_UPLOADFILES'];
			$maxUploadFiles = (is_numeric($maxUploadFiles) && $maxUploadFiles > 0) ? $maxUploadFiles : 1;
			$AttachmentForm = '
				<ul><li>'.($thisAttachmentslist ? '<label for="Attachments">'.$this->Context->GetDefinition("DeleteAttachments").'</label>
				'.$thisAttachmentslist : '') . '</li>		
				<label for="Attachments">'.$this->Context->GetDefinition("Attachments").'</label>
				<input id="AttachmentFile" type="file" name="file" class="AttachmentInput" size="43" />
				<table style="margin-top:12px;"><tbody id="files_list"></tbody></table>
				</li></ul>
				<script type="text/javascript" language="javascript">
					var f = document.getElementById(\''. $this->FormName .'\');
					f.encoding = \'multipart/form-data\';
					var multi_selector = new MultiSelector(document.getElementById(\'files_list\' ), '.$maxUploadFiles.');
					multi_selector.addElement(document.getElementById(\'AttachmentFile\'));
				</script>
			';
			$this->DelegateParameters['AttachmentForm'] = &$AttachmentForm;
			$this->CallDelegate('PreRender_AttachmentForm');
			echo $AttachmentForm;
			$this->CallDelegate('PostRender_AttachmentForm');
		}

		function GetAttachmentsList($CommentID) {
			if( $CommentID > 0 ) {
				$AttachmentList = '';

				$this->DelegateParameters['AttachmentList'] = &$AttachmentList;
				$this->CallDelegate('PreGetAttachmentsList');
				
				$s = $this->GetAttachmentBuilder();
				$s->AddWhere('a', 'CommentID', '', $CommentID, '=');
				$Attachment = false;
				$ResultSet = $this->Context->Database->Select($s, $this->Name, 'GetAttachmentsList', 'An error occurred while retrieving attachments.');
				
				$Attachment_num = 1;
				while ($rows = $this->Context->Database->GetRow($ResultSet)) {
					if( !$Attachment ) $Attachment = $this->Context->ObjectFactory->NewObject($this->Context, 'Attachment');
					$Attachment->Clear();
					$Attachment->GetPropertiesFromDataSet($this->Context->Configuration, $rows);
					$Attachment->FormatPropertiesForDisplay();

					$this->DelegateParameters['Attachment'] = &$Attachment;
					$this->DelegateParameters['AttachmentList'] = &$AttachmentList;
					$this->CallDelegate('AttachmentsListItem');

					if( $Attachment ) {
						$AttachmentList .= '<li id="Attachment_'.$Attachment->AttachmentID.'">'. $this->Context->GetDefinition('Attachment')  .$Attachment_num .' -> '. $Attachment->Name .'&nbsp;&nbsp;';
						if( $Attachment->UserID == $this->Context->Session->UserID || $this->Context->Session->User->Permission('PERMISSION_MANAGE_ATTACHMENTS') ) {
							$AttachmentList .= '<a href="./" onclick="if (confirm(\''.$this->Context->GetDefinition('ConfirmDeleteAttachment').'\')) DeleteAttachment(\''. $this->Context->Configuration['WEB_ROOT'] . "extensions/Attachments/ajax.php" .'\', \''. $Attachment->AttachmentID .'\'); return false;">'. $this->Context->GetDefinition('DeleteAttachment') .'</a>';
						}
						$AttachmentList .= '</li>';
					}

					$Attachment_num ++ ;
				}

				if ($AttachmentList  != ''){
				   $AttachmentList = '<ul class="AttachmentList">' . $AttachmentList . '</ul>';
				}
				
				$this->CallDelegate('PostGetAttachmentsList');
				return $AttachmentList;
			}
		}

		function GetFilesFound() {
			$FilesFound = 0;
			foreach( $_FILES as $Key => $File ) {
				if( substr($Key, 0, strlen($this->FileIdentifier)) == $this->FileIdentifier && strlen(basename($File['name'])) !== 0 )
					$FilesFound++;
			}
			return $FilesFound;
		}

		function mkdir_recursive($path, $mode = 0777) {
			if (!file_exists($path)) {
				$this->mkdir_recursive(dirname($path), $mode);
				if( @mkdir($path, $mode) ) @chmod($path, $mode);
			}
		}

		function CreateAttachmentFolder() {
			$TargetPath = str_replace(
				array('%day%', '%month%', '%year%', '%userid%'),
				array(date("d"), date("m"), date("Y"), $this->Context->Session->UserID),
				$this->Context->Configuration['ATTACHMENTS_UPLOAD_PATH']
			);
			$this->mkdir_recursive($TargetPath);
			return (is_dir($TargetPath) && is_readable($TargetPath)) ? $TargetPath : "";
		}
	}

	if ($Context->SelfUrl == "settings.php" && $Context->Session->User->Permission('PERMISSION_MANAGE_ATTACHMENTS')) {

		class AttachmentsForm extends PostBackControl {
			var $ConfigurationManager;

			function AttachmentsForm(&$Context) {
				$this->Name = 'AttachmentsForm';
				$this->ValidActions = array('Attachments', 'ProcessAttachments');
				$this->Constructor($Context);
				if (!$this->Context->Session->User->Permission('PERMISSION_MANAGE_ATTACHMENTS')) {
					$this->IsPostBack = 0;
				} elseif( $this->IsPostBack ) {
					$SettingsFile = $this->Context->Configuration['APPLICATION_PATH'].'conf/settings.php';
					$this->ConfigurationManager = $this->Context->ObjectFactory->NewContextObject($this->Context, 'ConfigurationManager');
					if ($this->PostBackAction == 'ProcessAttachments') {
						$this->ConfigurationManager->GetSettingsFromForm($SettingsFile);
						// Checkboxes aren't posted back if unchecked, so make sure that they are saved properly
						$this->DelegateParameters['ConfigurationManager'] = &$this->ConfigurationManager;
						$this->CallDelegate('DefineCheckboxes');

						// And save everything
						if ($this->ConfigurationManager->SaveSettingsToFile($SettingsFile)) {
							header('location: '.GetUrl($this->Context->Configuration, 'settings.php', '', '', '', '', 'PostBackAction=Attachments&Success=1'));
						} else {
							$this->PostBackAction = 'Attachments';
						}

					}
				}
				$this->CallDelegate('Constructor');
			}

			function Render() {
				if ($this->IsPostBack) {
					$this->CallDelegate('PreRender');
					$this->PostBackParams->Clear();
					if ($this->PostBackAction == "Attachments") {
						$FileTypes = $this->Context->Configuration['ATTACHMENTS_ALLOWED_FILETYPES'];
						$this->PostBackParams->Set('PostBackAction', 'ProcessAttachments');
						$this->PostBackParams->Set('LabelValuePairCount', (count($FileTypes) > 0 ? count($FileTypes) : 1), 1, 'LabelValuePairCount');
						echo '
						<div id="Form" class="Account AttachmentSettings">';
						if (ForceIncomingInt('Success', 0)) echo '<div id="Success">'.$this->Context->GetDefinition('ChangesSaved').'</div>';
						echo '
						<fieldset>
							<legend>'.$this->Context->GetDefinition("AttachmentSettings").'</legend>
							'.$this->Get_Warnings().'
							'.$this->Get_PostBackForm('frmAttachments').'
							<h2>'.$this->Context->GetDefinition("AttachmentUploadSettings").'</h2>
							<p>'.$this->Context->GetDefinition("AttachmentUploadSettingsInfo").'</p>
							<ul>
								<li>
									<label for="txtUploadPath">'.$this->Context->GetDefinition("UploadPath").'</label>
									<input type="text" name="ATTACHMENTS_UPLOAD_PATH" id="txtUploadPath"  value="'.$this->ConfigurationManager->GetSetting('ATTACHMENTS_UPLOAD_PATH').'" maxlength="200" class="SmallInput" style="width: 500px;" />
								</li>
								<li>
									<label for="txtMaximumFilesize">'.$this->Context->GetDefinition("MaximumFilesize").'</label>
									<input type="text" name="ATTACHMENTS_MAXIMUM_FILESIZE" id="txtMaximumFilesize"  value="'.$this->ConfigurationManager->GetSetting('ATTACHMENTS_MAXIMUM_FILESIZE').'" maxlength="200" class="SmallInput" />
								</li>
								<li>
									<label for="txtMaximumUploadFiles">'.$this->Context->GetDefinition("MaximumUploadFiles").'</label>
									<input type="text" name="ATTACHMENTS_MAXIMUM_UPLOADFILES" id="txtMaximumUploadFiles"  value="'.$this->ConfigurationManager->GetSetting('ATTACHMENTS_MAXIMUM_UPLOADFILES').'" maxlength="200" class="SmallInput" />
								</li>
							</ul>
							';
						$this->CallDelegate('PreButtonsRender');
						echo '
							<div class="Submit">
								<input type="submit" name="btnSave" value="'.$this->Context->GetDefinition('Save').'" class="Button SubmitButton" />
								<a href="'.GetUrl($this->Context->Configuration, $this->Context->SelfUrl).'" class="CancelButton">'.$this->Context->GetDefinition('Cancel').'</a>
							</div>
						';
						$this->CallDelegate('PostButtonsRender');
						echo '
							</form>
						</fieldset>
						</div>';

					}
				}
				$this->CallDelegate('PostRender');
			}
		}

		$AttachmentsForm = $Context->ObjectFactory->NewContextObject($Context, 'AttachmentsForm');
		$Page->AddRenderControl($AttachmentsForm, $Configuration["CONTROL_POSITION_BODY_ITEM"] + 1);
		$Panel->AddListItem($Context->GetDefinition('AdministrativeOptions'), $Context->GetDefinition("AttachmentSettings"), GetUrl($Context->Configuration, $Context->SelfUrl, '', '', '', '', 'PostBackAction=Attachments'), '', '', 102);

	}

	if (in_array($Context->SelfUrl, array('comments.php', 'post.php')) ) {

		$Head->AddStyleSheet('extensions/Attachments/style.css');
		$Head->AddScript('extensions/Attachments/functions.js');

		// Init AttachmentManager for the discussion form
		function DiscussionForm_InitAttachmentManager(&$DiscussionForm) {
			$AttachmentManager = $DiscussionForm->Context->ObjectFactory->NewContextObject($DiscussionForm->Context, 'AttachmentManager');
			$DiscussionForm->DelegateParameters['AttachmentManager'] = &$AttachmentManager;
		}

		// Init AttachmentManager for the comment grid
		function CommentGrid_InitAttachmentManager(&$Control) {
			$AttachmentManager = $Control->Context->ObjectFactory->NewContextObject($Control->Context, 'AttachmentManager');
			$Control->DelegateParameters['AttachmentManager'] = &$AttachmentManager;
			$AttachmentManager->RetrieveAttachments();
		}

		// Add attachment control to the comment form
		function CommentForm_AddAttachmentForm(&$CommentForm) {
			$AttachmentManager = &$CommentForm->DelegateParameters['AttachmentManager'];
			$AttachmentManager->FormName = 'frmPostComment';
			$AttachmentManager->CommentID = &$CommentForm->Comment->CommentID;
			$AttachmentManager->Render_Attachments();
			$AttachmentManager->Render_AttachmentForm();
		}

		// Add attachment control to the discussion form
		function DiscussionForm_AddAttachmentForm(&$DiscussionForm) {
			$AttachmentManager = &$DiscussionForm->DelegateParameters['AttachmentManager'];
			$AttachmentManager->FormName = 'frmPostDiscussion';
			$AttachmentManager->CommentID = &$DiscussionForm->Comment->CommentID;
			$AttachmentManager->Render_Attachments();
			$AttachmentManager->Render_AttachmentForm();
		}

		// Render Attachments
		function CommentGrid_RenderAttachments(&$CommentGrid) {
			$AttachmentManager = &$CommentGrid->DelegateParameters['AttachmentManager'];
			$AttachmentManager->Comment = &$CommentGrid->DelegateParameters['Comment'];
			$AttachmentManager->Render_Attachments();
		}

		// Upload Attachments
		function DiscussionForm_UploadAttachments(&$DiscussionForm) {
			$AttachmentManager = &$DiscussionForm->DelegateParameters['AttachmentManager'];
			$AttachmentManager->UploadAttachments();
		}

		// Save Attachments
		function DiscussionForm_SaveCommentAttachments(&$DiscussionForm) {
			$Comment = &$DiscussionForm->DelegateParameters['ResultComment'];
			$AttachmentManager = &$DiscussionForm->DelegateParameters['AttachmentManager'];
			$AttachmentManager->Comment = &$Comment;
			$AttachmentManager->SaveAttachments();
		}

		// Save Attachments
		function DiscussionForm_SaveDiscussionAttachments(&$DiscussionForm) {
			$Discussion = &$DiscussionForm->DelegateParameters['ResultDiscussion'];
			$AttachmentManager = &$DiscussionForm->DelegateParameters['AttachmentManager'];
			$AttachmentManager->DiscussionID = $Discussion->DiscussionID;
			$AttachmentManager->Comment = &$Discussion->Comment;
			$AttachmentManager->SaveAttachments();
		}

		// Init AttachmentManager for discussion form
		$Context->AddToDelegate("DiscussionForm",
								"PreLoadData",
								"DiscussionForm_InitAttachmentManager");

		// Init AttachmentManager for comment grid
		$Context->AddToDelegate("CommentGrid",
								"Constructor",
								"CommentGrid_InitAttachmentManager");

		// Display attachments at comments	
		$Context->AddToDelegate("CommentGrid",
								"PreCommentOptionsRender",
								"CommentGrid_RenderAttachments");

		if( $Context->Session->User->Permission('PERMISSION_ADD_ATTACHMENTS') || 
			$Context->Session->User->Permission('PERMISSION_MANAGE_ATTACHMENTS') ) {

			// Add control to discussion form
			$Context->AddToDelegate("DiscussionForm",
									"DiscussionForm_PreButtonsRender",
									"DiscussionForm_AddAttachmentForm");

			// Add control to comment form
			$Context->AddToDelegate("DiscussionForm",
									"CommentForm_PreButtonsRender",
									"CommentForm_AddAttachmentForm");

			// Upload files on PreSaveComment
			$Context->AddToDelegate("DiscussionForm",
									"PreSaveComment",
									"DiscussionForm_UploadAttachments");

			// Upload files on PreSaveDiscussion
			$Context->AddToDelegate("DiscussionForm",
									"PreSaveDiscussion",
									"DiscussionForm_UploadAttachments");

			// Save files on PostSaveComment
			$Context->AddToDelegate("DiscussionForm",
									"PostSaveComment",
									"DiscussionForm_SaveCommentAttachments");

			// Save files on PostSaveDiscussion
			$Context->AddToDelegate("DiscussionForm",
									"PostSaveDiscussion",
									"DiscussionForm_SaveDiscussionAttachments");
		}
	}

	// Handle downloads
	if( ForceIncomingString('PostBackAction', '') == 'Download' ) {
		$AttachmentID = ForceIncomingInt('AttachmentID', 0);
		$AttachmentManager = $Context->ObjectFactory->NewContextObject($Context, 'AttachmentManager');
		$AttachmentManager->DownloadAttachment($AttachmentID);
	}

	// Remind user to set permissions
	if ($Context->SelfUrl == 'index.php' && !array_key_exists('ATTACHMENTS_NOTICE', $Configuration)) {
		if ($Context->Session->User && $Context->Session->User->Permission('PERMISSION_MANAGE_EXTENSIONS')) {
			$HideNotice = ForceIncomingBool('TurnOffAttachmentsNotice', 0);
			if ($HideNotice) {
				AddConfigurationSetting($Context, 'ATTACHMENTS_NOTICE', '1');
			} else {
				$NoticeCollector->AddNotice('<span><a href="'.GetUrl($Configuration, 'index.php', '', '', '', '', 'TurnOffAttachmentsNotice=1').'">'.$Context->GetDefinition('RemoveThisNotice').'</a></span>
					'.$Context->GetDefinition('RememberToSetAttachmentsPermissions'));
			}
		}
	}

}
?>