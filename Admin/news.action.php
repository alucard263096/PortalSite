<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */  
 require '../include/common.inc.php';
 $getpremmis_id=$CONFIG["function"]["news"];
 require ROOT.'/include/login.inc.php';
 require ROOT.'/classes/datamgr/news.cls.php';
 
 $action=$_REQUEST["action"];
 
 if($action=="search")
 {
 	$rs=$newsMgr->search($_REQUEST["title"],$_REQUEST["summary"],$_REQUEST["from"],$_REQUEST["to"],$_REQUEST["status"]);	
 	
 	$smarty->assign("result",$rs);
 	$smarty->display(ROOT.'/templates/Admin/news_result.tpl');
 	
 }
 else if($action=="save")
 {
 //print_r($_REQUEST);
 	
 	
 	
 	$rt=$newsMgr->save($_REQUEST["id"]
					 	,$_REQUEST["title"]
					 	,$_REQUEST["summary"]
					 	,$_REQUEST["published_date"]
					 	,$_REQUEST["content"]
					 	,$_REQUEST["status"]
					 	,$_SESSION["sysUser"]["user_id"]);
					 	
	echo $rt;
 	
 }
 else if($action=="delete")
 {
 	$rt=$newsMgr->delete($_REQUEST["list"]
					 	,$_SESSION["sysUser"]["user_id"]);
					 	
	echo "success";
 	
 }
 
?>