<?php
/*
 * Created on 2011-2-8
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 require '../include/common.inc.php';
 
 $getpremmis_id=$CONFIG["function"]["download"];
 require ROOT.'/include/login.inc.php';
 require ROOT.'/classes/datamgr/download.cls.php';
 
 $id=$_REQUEST["id"];
 
 if($id!='')
 {
 	$detail=$downloadMgr->getDownloadCategory($id);
  	$smarty->assign('detail',$detail);
  	$smarty->assign('data_status','edit');
 }
 else
 {
  	$smarty->assign('data_status','new');
 }
 
 $smarty->display(ROOT.'/templates/Admin/download_detail.tpl');
 
?>
