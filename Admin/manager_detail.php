<?php
/*
 * Created on 2011-2-8
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 require '../include/common.inc.php';
 
 $getpremmis_id=$CONFIG["function"]["manager"];
 require ROOT.'/include/login.inc.php';
 require ROOT.'/classes/datamgr/manager.cls.php';
 require ROOT.'/classes/datamgr/city.cls.php';
 
 $id=$_REQUEST["id"];
 
 $hisposition=$managerMgr->getPositionHistory();
  	$smarty->assign('hisposition',$hisposition);
 
 	$provincelist=$cityMgr->getAllProvince();	
  	$smarty->assign('provincelist',$provincelist);
 if($id!='')
 {
 	$detail=$managerMgr->getManager($id);
  	$smarty->assign('detail',$detail);
  	$smarty->assign('data_status','edit');
 }
 else
 {
  	$smarty->assign('today',date('Y-m-d'));
  	$smarty->assign('data_status','new');
 }
 
 $smarty->display(ROOT.'/templates/Admin/manager_detail.tpl');
 
?>
