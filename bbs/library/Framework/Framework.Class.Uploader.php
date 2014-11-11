<?php

// +---------------------------------------------+
// |     Copyright 2010 - 2018 GuaGua BBS        |
// |     http://www.weentech.com                 |
// |     This file may not be redistributed.     |
// +---------------------------------------------+


 /**
 * Handles uploaded files
 * @package Framework
 */
class Uploader extends Delegation {
	var $OverwriteExistingFile;
	var $MaximumFileSize;
	var $AllowedFileTypes;
	var $WarningCollector;
	var $CurrentFileSize;

	function Uploader(&$Context) {
		$this->Name = "Uploader";
		$this->Delegation($Context);
		$this->Clear();
	}

	function Clear() {
		$this->MaximumFileSize = '1024000';
		$this->AllowedFileTypes = array (
			'image/gif' => array('gif'),
			'image/jpeg' => array('jpg'),
			'image/pjpeg' => array('jpg'),
			'application/zip' => array('zip'),
			'application/octet-stream' => array('rar'),
			'text/plain' => array('txt'),
			'application/x-gzip' => array('gz', 'tar.gz')
		);
		$this->CurrentFileSize = 0;
	}

	// Uploads a file from an input to the specified destination and returns the name to the file
	function Upload($InputName, $DestinationFolder, $DestinationName = '', $TimeStampName = '0', $OverwriteExistingFile = '0') {
		$Return = "";
		if (array_key_exists($InputName, $_FILES)) {
			$FileName = basename($_FILES[$InputName]['name']);
			$FilePieces = explode('.', $FileName);
			$FileExtension = $FilePieces[count($FilePieces)-1];
			if ($FileExtension == 'gz' && $FilePieces[count($FilePieces)-2] == 'tar') {
				$FileExtension = 'tar.gz';
			}
			if ($FileName != '') {
				// Define file properties
				if ($DestinationName == '') $DestinationName = $FileName;
				$TempFileName = $_FILES[$InputName]['tmp_name'];
				$FileType = $_FILES[$InputName]['type'];
				$this->CurrentFileSize = $_FILES[$InputName]['size'];

				// Ensure the file is not empty
				if($this->CurrentFileSize == 0) $this->Context->WarningCollector->Add('尝试上传的文件是空文件: '.$FileName);

				// Ensure that the file's type is allowed
				if (!array_key_exists($FileType, $this->AllowedFileTypes)) {
					$this->Context->WarningCollector->Add('不允许上传的文件类型: '.$FileName);
				} else {
					// Now make sure that the file type has the proper extension
					if (!in_array(strtoupper($FileExtension), explode(',', strtoupper(join(',', $this->AllowedFileTypes[$FileType]))))) {
						$Message = '';
						for ($i = 0; $i < count($this->AllowedFileTypes[$FileType]); $i++) {
							if ($Message != '') $Message .= ', ';
							$Message .= $this->AllowedFileTypes[$FileType][$i];
						}
						$Message = '不允许上传的文件类型: '.$FileName;
						$this->Context->WarningCollector->Add($Message);
					}
				}

				// Ensure that the file is not beyond the maximum allowable size
				if($this->CurrentFileSize > $this->MaximumFileSize) $this->Context->WarningCollector->Add('允许上传的文件大小限: '.FormatFileSize($this->MaximumFileSize));

				if ($this->Context->WarningCollector->Count() == 0) {

					// Redefine new file to include proper file extension
					$DestinationNameOnly = substr($DestinationName, 0, strpos($DestinationName, '.'.$FileExtension));
					if ($TimeStampName) {
						$DestinationNameOnly .= date('-Y-m-d', time());
						$DestinationName = $DestinationNameOnly.'.'.$FileExtension;
					}
					//$Return = $DestinationName;
					$NewFilePath = ConcatenatePath($DestinationFolder, md5($DestinationNameOnly).'.'.$FileExtension);
					if (!$OverwriteExistingFile) {
						$Loop = 2;
						while (file_exists($NewFilePath)) {
							$DestinationName = $DestinationNameOnly.$Loop.'.'.$FileExtension;
							$NewFilePath = ConcatenatePath($DestinationFolder, md5($DestinationNameOnly.$Loop).'.'.$FileExtension);
							$Loop++;
						}
					}
					if (!move_uploaded_file(
							$_FILES[$InputName]['tmp_name'],
							$NewFilePath
						)
					) {$this->Context->WarningCollector->Add('上传文件失败: '.$FileName);}

					$Return = $DestinationName;
				}
			} else {
				$this->Context->WarningCollector->Add('必须选择需要上传的文件.');
			}
		} else {
			$this->Context->WarningCollector->Add('未找到需要上传的文件.');
		}
		return $Return;
	}
}
?>