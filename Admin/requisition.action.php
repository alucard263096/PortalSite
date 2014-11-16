<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */  
 require '../include/common.inc.php';
 $getpremmis_id=$CONFIG["function"]["requisition"];
 require ROOT.'/include/login.inc.php';
 require ROOT.'/classes/datamgr/requisition.cls.php';
 
 $action=$_REQUEST["action"];
 
 if($action=="search")
 {
 	$rs=$requisitionMgr->search($_REQUEST["name"],$_REQUEST["phone"],$_REQUEST["qq"],
                                    $_REQUEST["company_name"],$_REQUEST["company_phone"],
                                    $_REQUEST["from"],$_REQUEST["to"],$_REQUEST["status"]);
 	$smarty->assign("result",$rs);
 	$smarty->display(ROOT.'/templates/Admin/requisition_result.tpl');
 	
 }
 else if($action=="save")
 {
 	$rt=$requisitionMgr->editStatus($_REQUEST["id"],$_REQUEST["status"],$_REQUEST["remarks"]
					 	,$_SESSION["sysUser"]["user_id"]);
					 	
	echo $rt;
 	
 }else if($action=="getprocesscount")
 {
 	$rt=$requisitionMgr->getUnprocessCount();
					 	
	echo $rt;
 	
 }
 
?>