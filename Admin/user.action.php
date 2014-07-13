<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */  
 require '../include/common.inc.php';
 $getpremmis_id=$CONFIG["function"]["user"];
 require ROOT.'/include/login.inc.php';
 require ROOT.'/classes/datamgr/user.cls.php';
 
 $action=$_REQUEST["action"];
 
 if($action=="search")
 {
 	$rs=$userMgr->searchUser($_REQUEST["user_name"],$_REQUEST["email"],$_REQUEST["status"]);	
 	
 	
 	$smarty->assign("result",$rs);
 	$smarty->display(ROOT.'/templates/Admin/user_result.tpl');
 	
 }
 else if($action=="save")
 {
 	$rt=$userMgr->save($_REQUEST["user_id"]
					 	,$_REQUEST["login_id"]
					 	,md5($CONFIG["user"]["default_password"])
					 	,$_REQUEST["user_name"]
					 	,$_REQUEST["email"]
					 	,$_REQUEST["status"]
					 	,$_REQUEST["remarks"]
					 	,$_REQUEST["access_right"]
					 	,$_SESSION["sysUser"]["user_id"]);
					 	
	echo $rt;
 	
 }
 else if($action=="delete")
 {
 	$rt=$userMgr->delete($_REQUEST["user_list"]
					 	,$_SESSION["sysUser"]["user_id"]);
					 	
	echo "success";
 	
 }
 else if($action=="reset_password")
 {
 	$rt=$userMgr->resetPassword($_REQUEST["user_id"],md5($CONFIG["user"]["default_password"])
					 	,$_SESSION["sysUser"]["user_id"]);
					 	
	echo "success";
 	
 }
 
?>