<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */  
 require '../include/common.inc.php';
 $getpremmis_id=$CONFIG["function"]["download"];
 require ROOT.'/include/login.inc.php';
 require ROOT.'/classes/datamgr/download.cls.php';
 
 $action=$_REQUEST["action"];
 
 if($action=="search")
 {
 	$rs=$downloadMgr->searchDownloadCategory($_REQUEST["filename"],$_REQUEST["status"]);	
 	
 	$smarty->assign("result",$rs);
 	$smarty->display(ROOT.'/templates/Admin/download_result.tpl');
 	
 }
 else if($action=="save")
 {
 //print_r($_REQUEST);
 	$fileidlist=$_REQUEST["fileidlist"];
 	$pieces = explode(",", $fileidlist);
 	$filelist=array();
 	$sum=count($pieces);
 	for ($i = 0; $i < $sum; $i++) {
 		$a=array();
 		$fid=$pieces[$i];
 		$a["id"]=$fid;
 		$a["seq"]=$_REQUEST["fseq_".$fid];
 		$a["name"]=$_REQUEST["fname_".$fid];
 		$a["status"]=$_REQUEST["fstatus_".$fid];
 		$a["filename"]=$_REQUEST["ffilename_".$fid];
 		$a["length"]=$_REQUEST["flength_".$fid];
 		$a["extlink"]=$_REQUEST["fextlink_".$fid];
 		
 		$filelist[]=$a;
 	}
 	
 	
 	
 	
 	$rt=$downloadMgr->save($_REQUEST["id"]
					 	,$_REQUEST["name"]
					 	,$_REQUEST["seq"]
					 	,$_REQUEST["status"]
					 	,$filelist
					 	,$_SESSION["sysUser"]["user_id"]);
					 	
	echo $rt;
 	
 }
 else if($action=="newfile")
 {
 	$rt=$downloadMgr->newFile($_SESSION["sysUser"]["user_id"]);
					 	
	echo $rt;
 	
 }
 else if($action=="delete")
 {
 	$rt=$downloadMgr->delete($_REQUEST["list"]
					 	,$_SESSION["sysUser"]["user_id"]);
					 	
	echo "success";
 	
 }else if($action=="upload"){
 	
 require ROOT.'/classes/obj/upload.php';
 $fid=$_REQUEST["fid"];
 $file=$_FILES["ffile_".$fid];
 $filename=date('ymdHIs').$file["name"];
 $file=new Upload($file,$filename,ROOT."/upload/download/",true);
 echo $file->safetyUpload();
 echo $file->getSize()."|~~|".$filename;
 }
 
?>