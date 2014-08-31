<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */  
 require '../include/common.inc.php';
 $getpremmis_id=$CONFIG["function"]["manager"];
 require ROOT.'/include/login.inc.php';
 require ROOT.'/classes/datamgr/manager.cls.php';
 require ROOT.'/classes/datamgr/city.cls.php';
 
 $action=$_REQUEST["action"];
 
 if($action=="search")
 {
 	$rs=$managerMgr->search($_REQUEST["chname"],$_REQUEST["engname"],$_REQUEST["position"],$_REQUEST["tel"],$_REQUEST["qq"],$_REQUEST["status"]);	
 	$provincelist=$cityMgr->getAllProvince();
 	$smarty->assign("result",$rs);
 	$smarty->assign("provincelist",$provincelist);
 	$smarty->display(ROOT.'/templates/Admin/manager_result.tpl');
 	
 }
 else if($action=="save")
 {
 //print_r($_REQUEST);
 	
 	$rt=$managerMgr->save($_REQUEST["id"]
					 	,$_REQUEST["chname"]
					 	,$_REQUEST["engname"]
					 	,$_REQUEST["position"]
					 	,$_REQUEST["tel"]
					 	,$_REQUEST["qq"]
					 	,$_REQUEST["email"]
					 	,$_REQUEST["address"]
					 	,$_REQUEST["provinces"]
					 	,$_REQUEST["description"]
					 	,$_REQUEST["remark"]
					 	,$_REQUEST["status"]
					 	,$_SESSION["sysUser"]["user_id"]);
					 	
	echo $rt;
 	
 }
 else if($action=="delete")
 {
 	$rt=$managerMgr->delete($_REQUEST["list"]
					 	,$_SESSION["sysUser"]["user_id"]);
					 	
	echo "success";
 	
 }
 
?>