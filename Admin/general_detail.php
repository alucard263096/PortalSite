<?php
/*
 * Created on 2011-2-8
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 require '../include/common.inc.php';
 
 $getpremmis_id=$CONFIG["function"]["general"];
 require ROOT.'/include/login.inc.php';
 require ROOT.'/classes/datamgr/general.cls.php';
 
 $id=$_REQUEST["id"];
 
 
 if($id=='')
 {
 	echo "system error";
 	exit;
 }
 
 	$info=$generalMgr->getGeneral($id);
  	$info["content"]=htmlspecialchars($info["content"]);
  	$smarty->assign('info',$info);
  	$smarty->assign('data_status','edit');
 

 
 $smarty->display(ROOT.'/templates/Admin/general_detail.tpl');
 
?>
