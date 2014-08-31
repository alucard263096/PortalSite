<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */  
 require '../include/common.inc.php';
 $getpremmis_id=$CONFIG["function"]["partner"];
 require ROOT.'/include/login.inc.php';
 require ROOT.'/classes/datamgr/partner.cls.php';
 require ROOT.'/classes/datamgr/city.cls.php';
 
 $action=$_REQUEST["action"];
 
 if($action=="search")
 {
 	$rs=$partnerMgr->search($_REQUEST["name"],$_REQUEST["type"],$_REQUEST["tel"],$_REQUEST["address"],$_REQUEST["status"]);	
 	$smarty->assign("result",$rs);
 	$smarty->display(ROOT.'/templates/Admin/partner_result.tpl');
 	
 }
 else if($action=="save")
 {
 //print_r($_REQUEST);
 	
 	$rt=$partnerMgr->save($_REQUEST["id"]
					 	,$_REQUEST["type"]
					 	,$_REQUEST["name"]
					 	,$_REQUEST["logo_file"]
					 	,$_REQUEST["tel"]
					 	,$_REQUEST["fax"]
					 	,$_REQUEST["mobile"]
					 	,$_REQUEST["contacter"]
					 	,$_REQUEST["address"]
					 	,$_REQUEST["city_id"]
					 	,$_REQUEST["coordinate"]
					 	,$_REQUEST["website"]
					 	,$_REQUEST["weixin"]
					 	,$_REQUEST["summary"]
					 	,$_REQUEST["content"]
					 	,$_REQUEST["remark"]
					 	,$_REQUEST["status"]
					 	,$_SESSION["sysUser"]["user_id"]);
	echo $rt;
 	
 }
 else if($action=="delete")
 {
 	$rt=$partnerMgr->delete($_REQUEST["list"]
					 	,$_SESSION["sysUser"]["user_id"]);
	echo "success";
 }
 else if($action=="getcitylist")
 {
 	$rs=$cityMgr->getCityList($_REQUEST["province_id"]);	
 	$smarty->assign("result",$rs);
 	$smarty->display(ROOT.'/templates/Admin/city_option_list.tpl');
 }
 else if($action=="uploadlogo"){
 require ROOT.'/classes/obj/upload.php';
 $file=$_FILES["file"];
 $filename=date('ymdHIs').$file["name"];
 $file=new Upload($file,$filename,ROOT."/upload/partner/",true);
 echo $file->safetyUpload();
 echo $file->getSize()."|~~|".$filename;
 }
 
?>