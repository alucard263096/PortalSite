<?php
/*
Extension Name: 数据库维护
Extension Url: http://www.weentech.com/bbs/
Description: 此插件允许对论坛数据库进行优化, 备份和恢复管理, 启用后需要设置相关用户组具有数据库维护权限.
Version: 2.0
Author: 闻泰网络
Author Url: http://www.weentech.com/
Extension Key: DatabaseMaintain
*/
$Context->Dictionary['PERMISSION_DATABASEMAINTAIN'] = '允许数据库维护';

$Context->Configuration['PERMISSION_DATABASEMAINTAIN'] = '0';

if ($Context->SelfUrl == "settings.php" && $Context->Session->User->Permission('PERMISSION_DATABASEMAINTAIN')) {
	// Default permissions

	// Language dictionary
	$Context->Dictionary['DatabaseMaintain'] = '数据库维护';
	$Context->Dictionary['DatabaseBackup'] = '备份数据库';
	$Context->Dictionary['DatabaseOptimize'] = '优化数据库';
	$Context->Dictionary['DatabaseRepair'] = '修复数据库';
	$Context->Dictionary['DeleteBackupFiles'] = '删除备份文件';
	$Context->Dictionary['DatabaseMaintainTitle'] = '数据库备份与优化';
	$Context->Dictionary['DeleteBackupTitle'] = '备份文件恢复与删除';
	$Context->Dictionary['DatabaseMaintainDescription'] = '此数据库维护插件仅对论坛相关的数据库表进行维护操作, 不会对数据库中其它表进行操作.';
	$Context->Dictionary['DeleteBackupDescription'] = '备份的论坛数据库文件保存在backup/目录下, 为确保安全请将备份文件下载保存.';
	$Context->Dictionary['ErrCreateBackupFolder'] = '无法创建数据库备份文件夹./backup/, 或文件夹不可写!';
	$Context->Dictionary['DatabaseBackupFinished'] = '论坛数据库备份成功.';
	$Context->Dictionary['DatabaseOptimizeFinished'] = '优化论坛数据库已完成.';
	$Context->Dictionary['DatabaseRepairFinished'] = '修复论坛数据库已完成.';
	$Context->Dictionary['DatabaseResumeFinished'] = '论坛数据库恢复成功.';
	$Context->Dictionary['DeleteBackupFilesFinished'] = '数据备份文件删除成功.';
	$Context->Dictionary['NoBackupFiles'] = '暂无任何数据备份文件...';

	class DatabaseMaintainForm extends PostBackControl {

		function CreateBackupFolder() {
			$TargetPath = $this->Context->Configuration['APPLICATION_PATH'] .'backup/';

			if (!file_exists($TargetPath)) {
				if(@mkdir($TargetPath, 0777)) @chmod($path, 0777);
			}

			if(!is_dir($TargetPath) && !is_writable($TargetPath)) {
				$this->Context->WarningCollector->Add($this->Context->GetDefinition('ErrCreateBackupFolder'));
				return false;
			}else{
				return true;
			}

		}

		function openFileRead($filename)
		{
			if(function_exists('gzopen'))
			{
				$handle = gzopen($filename, "r");
			}
			else
			{
				$handle = fopen($filename, "r");
			}
			return $handle;
		}

		function eof($handle)
		{
			if(function_exists('gzeof'))
			{
				return gzeof($handle);
			}
			else
			{
				return feof($handle);
			}
		}

		function openFileWrite($filename)
		{
			if(function_exists('gzopen'))
			{
				$filename .= '.gz';
				$handle = gzopen($filename, "w9");
			}
			else
			{
				$handle = fopen($filename, "w");
			}
			return $handle;
		}

		function readFileData($handle, $size)
		{
			if(function_exists('gzread'))
			{
				$data = gzread($handle, $size);
			}
			else
			{
				$data = fread($handle, $size);
			}
			return $data;
		}

		function closeFile($handle)
		{
			if(function_exists('gzclose'))
			{
				gzclose($handle);
			}
			else
			{
				fclose($handle);
			}
		}

		function writeFileData($handle, $data)
		{
			if(function_exists('gzwrite'))
			{
				gzwrite($handle, $data);
			}
			else
			{
				fwrite($handle, $data);
			}
		}

		function ParseQueries($sql, $delimiter)
		{
			$matches = array();
				$output = array();

			$queries = explode($delimiter, $sql);
				$sql = '';

				$query_count = count($queries);
				for ($i = 0; $i < $query_count; $i++)
				{
						if (($i != ($query_count - 1)) || (strlen($queries[$i] > 0)))
						{
								$total_quotes = preg_match_all("/'/", $queries[$i], $matches);
								$escaped_quotes = preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/", $queries[$i], $matches);
								$unescaped_quotes = $total_quotes - $escaped_quotes;

								if (($unescaped_quotes % 2) == 0)
								{
										$output[] = $queries[$i];
										$queries[$i] = "";
								}
								else
								{
										$temp = $queries[$i] . $delimiter;
										$queries[$i] = "";

										$complete_stmt = false;

										for ($j = $i + 1; (!$complete_stmt && ($j < $query_count)); $j++)
										{
												$total_quotes = preg_match_all("/'/", $queries[$j], $matches);
												$escaped_quotes = preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/", $queries[$j], $matches);
												$unescaped_quotes = $total_quotes - $escaped_quotes;

												if (($unescaped_quotes % 2) == 1)
												{
														$output[] = $temp . $queries[$j];

														$queries[$j] = "";
														$temp = "";

														$complete_stmt = true;
														$i = $j;
												}
												else
												{
														$temp .= $queries[$j] . $delimiter;
														$queries[$j] = "";
												}
										}
								}
						}
				}

				return $output;
		}

		function GetAllTables()
		{
			$GetAllTables = $this->Context->Database->Execute("SHOW TABLES FROM `" . $this->Context->Configuration['DATABASE_NAME'] . "` LIKE '" . substr($this->Context->Configuration['DATABASE_TABLE_PREFIX'], 0, -1) ."\_%'", '', '', 'An error occured while attempting to retrieve all DataBase tables');
			return $GetAllTables;
		}

		function BatchTableOperation($OP)
		{
			$GetAllTables = $this->GetAllTables();

			$msg = '';
			while ($GetAllTablesinfo = $this->Context->Database->GetRow($GetAllTables)) {

				$tableinfos = $this->Context->Database->Execute("SHOW TABLE STATUS LIKE '" . $GetAllTablesinfo[0] . "'");
				$tableinfo = $this->Context->Database->GetRow($tableinfos);
				$tablename = $tableinfo['Name'];
				$this->Context->Database->Execute("$OP TABLE `$tablename`", '', '', 
				'An error occured while attempting to '.$OP.' Database table');
			}

			return true;
		}

		function RestoreBackup($filename)
		{
			$backupDir = $this->Context->Configuration['APPLICATION_PATH'] .'backup/';
			$query = '';

			// Read the file into memory and then execute it
			$fp = $this->openFileRead($backupDir . $filename);

			while (!($this->eof($fp)))
			{
				$query .= $this->readFileData($fp, 10000);
			}

			$this->closeFile($fp);

			// Split into discrete statements
			$queries = $this->ParseQueries($query, ';');

			for($i = 0; $i < count($queries); $i++)
			{
				$sql = trim($queries[$i]);

				if(!empty($sql))
				{
					$this->Context->Database->Execute($sql, '', '', 'An error occured while attempting to resume DataBase');
				}
			}
		}

		function BackupTable($tablename, $fp) {

			// Get the SQL to create the table
			$createTables = $this->Context->Database->Execute("SHOW CREATE TABLE `$tablename`", '', '', 'An error occured while attempting to retrieve DataBase table');
			$createTable = $this->Context->Database->GetRow($createTables);	
			
			// Drop if it exists
			$tableDump = "DROP TABLE IF EXISTS `$tablename`;\n" . $createTable['Create Table'] . ";\n\n";

			$this->writeFileData($fp, $tableDump);

			// get data
			$getRows = $this->Context->Database->Execute("SELECT * FROM `$tablename`");
			while ($row = $this->Context->Database->GetRow($getRows))
			{
					$tableDump = "INSERT INTO `$tablename` VALUES(";
					$fieldCount = count($row)/2;
					$fieldcounter = -1;
					$firstfield = 1;

					// get each field's data
					while (++$fieldcounter < $fieldCount)
					{
							if (!$firstfield)
							{
									$tableDump .= ', ';
							}
							else
							{
									$firstfield = 0;
							}

							if (!isset($row["$fieldcounter"]))
							{
									$tableDump .= 'NULL';
							} elseif ($row["$fieldcounter"] != '')
							{
									$tableDump .= '\'' . addslashes($row["$fieldcounter"]) . '\'';
							}
							else
							{
									$tableDump .= '\'\'';
							}
					}

					$tableDump .= ");\n";

					$this->writeFileData($fp, $tableDump);
			}

			$this->writeFileData($fp, "\n\n\n");
		}

		function BatchBackupTable() {
			$backupDir = $this->Context->Configuration['APPLICATION_PATH'] .'backup/';

			$GetAllTables = $this->GetAllTables();

			$theverifycode = substr(md5(rand(0,9999)), 6, 12);

			$path = $backupDir . APPLICATION . APPLICATION_VERSION .'_'. $theverifycode . '_' . date("ymd") . '.sql';

			$fp = $this->openFileWrite($path);

			if($fp)
			{
				while ($GetAllTablesinfo = $this->Context->Database->GetRow($GetAllTables)) {

					$tableinfos = $this->Context->Database->Execute("SHOW TABLE STATUS LIKE '" . $GetAllTablesinfo[0] . "'");
					$tableinfo = $this->Context->Database->GetRow($tableinfos);

					$this->BackupTable($tableinfo['Name'], $fp);
				}

				$this->closeFile($fp);

				return true;
			} else {

				$this->Context->WarningCollector->Add($this->Context->GetDefinition('ErrCreateBackupFolder'));

				return false;
			}
		}

		function DisplayReadableFilesize($filesize)
		{
			$kb = 1024;         // Kilobyte
			$mb = 1048576;      // Megabyte

			if($filesize < $kb)
			{
				$size = $filesize . ' B';
			}
			else if($filesize < $mb)
			{
				$size = round($filesize/$kb,2) . ' KB';
			}
			else
			{
				$size = round($filesize/$mb,2) . ' MB';
			}

			return (isset($size) AND $size != ' B') ? $size : '';
		}

		function DisplayBackups()
		{
			$backupDir = $this->Context->Configuration['APPLICATION_PATH'] .'backup/';
			$backupUrl = $this->Context->Configuration['BASE_URL'] .'backup/';
	  
			if (is_dir($backupDir)) {
				$dir = opendir($backupDir);
				$BackupList = '';
				while (false !== ($file = readdir($dir))) {
					if(strpos(strtolower($file),'.sql') > 0)
					{
						$stats = stat($backupDir . $file);

						$BackupList .= '<li class="Enabled"><h3>'.GetDynamicCheckBox('BackupFiles[]', $backupDir.$file, 0, '' , $file).'<span style="color:#00CC00;">'.$this->DisplayReadableFilesize($stats['size']).'</span><span style="color:#0066FF;">'.show_time($stats['mtime'], 'Y-m-d H:i:s').'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="settings.php?PostBackAction=ProcessDatabase&filename='.$file.'&btnSubmit=resume" style="text-decoration:underline; font-weight:bold;" onclick="return confirm(\'确定恢复此备份文件的数据吗?\n\n注: 论坛现有数据将被删除.\');">恢复</a></span><span><a href="' . $backupUrl . $file . '" style="text-decoration:underline; font-weight:bold;">下载</a></span></h3></li>';
					}

				}

				echo '<div class="Extensions Applicants"><ul>';
				if ($BackupList) {
					echo '<li class="CheckController"><p>'."<a href=\"./\" onclick=\"CheckAll('BackupFiles'); return false;\">".$this->Context->GetDefinition('All').'</a>&nbsp;&nbsp;&nbsp;'
	." <a href=\"./\" onclick=\"CheckNone('BackupFiles'); return false;\">".$this->Context->GetDefinition('None').'</a></p></li>';

					echo $BackupList;
				} else {
					echo '<li class="NoApplicants"><p>'.$this->Context->GetDefinition('NoBackupFiles').'</p></li>';
				}
				echo '</ul><BR>';
				if ($BackupList) { 
					echo '<div class="Submit"><input type="submit" name="btnSubmit" value="'.$this->Context->GetDefinition('DeleteBackupFiles').'" class="Button SubmitButton" /><a href="'.GetUrl($this->Context->Configuration, $this->Context->SelfUrl).'" class="CancelButton">'.$this->Context->GetDefinition('Cancel').'</a></div>';
				}
				echo '</div>';

		   }

		}

		function DatabaseMaintainForm(&$Context) {
			$this->Name = 'DatabaseMaintainForm';
			$this->ValidActions = array('Database', 'ProcessDatabase');
			$this->Constructor($Context);
			if (!$this->Context->Session->User->Permission('PERMISSION_DATABASEMAINTAIN')) {
				$this->IsPostBack = 0;
			} elseif( $this->IsPostBack ) {

				$ProcessDatabaseStatus = 0;
				if ($this->PostBackAction == 'ProcessDatabase') {
					$Action = ForceIncomingString('btnSubmit', '');
					// Compare to language dictionary to figure out exactly what should be done
					if ($Action != '') {
						switch($Action)
						{
							case $this->Context->GetDefinition('DatabaseBackup') : 
								if($this->CreateBackupFolder()){
									if($this->BatchBackupTable()) $ProcessDatabaseStatus = 1;
								}
								break;


							case $this->Context->GetDefinition('DatabaseOptimize') : 
								if($this->BatchTableOperation('OPTIMIZE')) $ProcessDatabaseStatus = 2;
								break;

							case $this->Context->GetDefinition('DeleteBackupFiles') : 
								$DeleteBackupFiles = ForceIncomingArray('BackupFiles', array());
								if (is_array($DeleteBackupFiles) && count($DeleteBackupFiles) > 0) {
									for ($i = 0; $i < count($DeleteBackupFiles); $i++) {
										@unlink($DeleteBackupFiles[$i]);
									}

									$ProcessDatabaseStatus = 3;
								}
								break;

							case $this->Context->GetDefinition('DatabaseRepair') : 
								if($this->BatchTableOperation('REPAIR')) $ProcessDatabaseStatus = 4;
								break;

							case 'resume' : 

								$backupfilename = ForceIncomingString('filename', '');
								$this->RestoreBackup($backupfilename);	
								$ProcessDatabaseStatus = 5;

								break;
						}

					}


					// And save everything
					if ($ProcessDatabaseStatus) {
						header('location: '.GetUrl($this->Context->Configuration, 'settings.php', '', '', '', '', 'PostBackAction=Database&Success='.$ProcessDatabaseStatus));
					} else {
						$this->PostBackAction = 'Database';
					}

				}
			}
			$this->CallDelegate('Constructor');
		}

		function Render() {
			if ($this->IsPostBack) {
				$this->CallDelegate('PreRender');
				$this->PostBackParams->Clear();
				if ($this->PostBackAction == "Database") {

					$ProcessDatabaseStatus = ForceIncomingInt('Success', 0);
					$this->PostBackParams->Set('PostBackAction', 'ProcessDatabase');
					echo '
					<div id="Form" class="Account DatabaseMaintain">';

					if ($ProcessDatabaseStatus) {
						echo '<div id="Success">';
						switch($ProcessDatabaseStatus)
						{
							case 1 : echo $this->Context->GetDefinition('DatabaseBackupFinished') ; break;
							case 2 : echo $this->Context->GetDefinition('DatabaseOptimizeFinished') ; break;
							case 3 : echo $this->Context->GetDefinition('DeleteBackupFilesFinished') ; break;
							case 4 : echo $this->Context->GetDefinition('DatabaseRepairFinished') ; break;
							case 5 : echo $this->Context->GetDefinition('DatabaseResumeFinished') ; break;
						}
						echo '</div>';
					}
					echo '
					<fieldset>
						<legend>'.$this->Context->GetDefinition("DatabaseMaintain").'</legend>
						'.$this->Get_Warnings().'
						'.$this->Get_PostBackForm('frmDatabaseMaintain').'
						<h2>'.$this->Context->GetDefinition("DatabaseMaintainTitle").'</h2>
						<p>'.$this->Context->GetDefinition("DatabaseMaintainDescription").'</p>	';

					$this->CallDelegate('PreButtonsRender');
					echo '<div class="Submit">
							<input type="submit" name="btnSubmit" value="'.$this->Context->GetDefinition('DatabaseBackup').'" class="Button SubmitButton" />
							<input type="submit" name="btnSubmit" value="'.$this->Context->GetDefinition('DatabaseOptimize').'" class="Button SubmitButton" />
							<input type="submit" name="btnSubmit" value="'.$this->Context->GetDefinition('DatabaseRepair').'" class="Button SubmitButton" />
							<a href="'.GetUrl($this->Context->Configuration, $this->Context->SelfUrl).'" class="CancelButton">'.$this->Context->GetDefinition('Cancel').'</a>
						</div><BR><BR>
						<h2>'.$this->Context->GetDefinition("DeleteBackupTitle").'</h2>
						<p>'.$this->Context->GetDefinition("DeleteBackupDescription").'</p>';

					$this->DisplayBackups();

					$this->CallDelegate('PostButtonsRender');

					echo '</form>
					</fieldset>
					</div>';

				}
			}
			$this->CallDelegate('PostRender');
		}
	}

	$DatabaseMaintainForm = $Context->ObjectFactory->NewContextObject($Context, 'DatabaseMaintainForm');
	$Page->AddRenderControl($DatabaseMaintainForm, $Configuration["CONTROL_POSITION_BODY_ITEM"] + 1);
	$Panel->AddListItem($Context->GetDefinition('AdministrativeOptions'), $Context->GetDefinition("DatabaseMaintain"), GetUrl($Context->Configuration, $Context->SelfUrl, '', '', '', '', 'PostBackAction=Database'), '', '', 103);

}


?>