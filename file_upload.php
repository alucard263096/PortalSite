<?php
/*
 * Created on 2011-1-22
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
  require 'include/common.inc.php';
  require ROOT.'/classes/datamgr/db_example.php';
  require ROOT.'/classes/obj/upload.php';
 echo "a";
 $file=$_FILES["file"];
 
 print_r($file);
 $file=new Upload($file,$file["name"],"",false);
 echo $file->getSize();
 echo $file->safetyUpload();
 
?>


<form action="file_upload.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>