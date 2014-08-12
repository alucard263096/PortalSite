<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */  
 require '../include/common.inc.php';
 $getpremmis_id=$CONFIG["function"]["general"];
 require ROOT.'/include/login.inc.php';
 require ROOT.'/classes/datamgr/general.cls.php';
 
 $action=$_REQUEST["action"];
 
 if($action=="search")
 {
 	$rs=$generalMgr->searchGeneral($_REQUEST["name"]);	
 	
 	
 	$smarty->assign("result",$rs);
 	$smarty->display(ROOT.'/templates/Admin/general_result.tpl');
 	
 }
 else if($action=="save")
 {
 	$rt=$generalMgr->save($_REQUEST["id"]
					 	,stripslashes($_REQUEST["content"])
					 	,$_SESSION["sysUser"]["user_id"]);
					 	
	echo $rt;
 	
 }
 
?>