<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */  
 require '../include/common.inc.php';
 $getpremmis_id=$CONFIG["function"]["product"];
 require ROOT.'/include/login.inc.php';
 require ROOT.'/classes/datamgr/product.cls.php';
 
 $action=$_REQUEST["action"];
 
 if($action=="search")
 {
 	$rs=$productMgr->search($_REQUEST["category_id"],$_REQUEST["name"],$_REQUEST["status"]);	
 	$smarty->assign("result",$rs);
 	$smarty->display(ROOT.'/templates/Admin/product_result.tpl');
 	
 }
 else if($action=="save")
 {
 //print_r($_REQUEST);
 	$rt=$productMgr->save($_REQUEST["id"]
					 	,$_REQUEST["category_id"]
					 	,$_REQUEST["name"]
					 	,$_REQUEST["seq"]
					 	,$_REQUEST["summary"]
					 	,$_REQUEST["content"]
					 	,$_REQUEST["status"]
					 	,$_SESSION["sysUser"]["user_id"]);
					 	
	echo $rt;
 	
 }
 else if($action=="delete")
 {
 	$rt=$productMgr->delete($_REQUEST["list"]
					 	,$_SESSION["sysUser"]["user_id"]);
					 	
	echo "success";
 	
 }
 
?>