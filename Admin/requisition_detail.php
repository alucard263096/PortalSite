<?php
/*
 * Created on 2011-2-8
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 require '../include/common.inc.php';
 
 $getpremmis_id=$CONFIG["function"]["requisition"];
 require ROOT.'/include/login.inc.php';
 require ROOT.'/classes/datamgr/requisition.cls.php';
 
 is_numeric( $_REQUEST["id"] ) or die('提供的参数不是数字');
 
 $id=$_REQUEST["id"];
 if($id!='')
 {
 	  $detail=$requisitionMgr->getRequisition($id);
  	$smarty->assign('detail',$detail);
  	$smarty->assign('data_status','edit');
 }
 
 $smarty->display(ROOT.'/templates/Admin/requisition_detail.tpl');
 
?>
