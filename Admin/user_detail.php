<?php
/*
 * Created on 2011-2-8
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 require '../include/common.inc.php';
 
 $getpremmis_id=$CONFIG["function"]["user"];
 require ROOT.'/include/login.inc.php';
 require ROOT.'/classes/datamgr/user.cls.php';
 
 $user_id=$_REQUEST["user_id"];
 
 $user=array();
 $access_right=array();
 
 if($user_id!='')
 {
 	$user=$userMgr->getUser($user_id);
  	$smarty->assign('user',$user);
 	$access_right=$userMgr->getFunctionWithUser($user_id);
  	$smarty->assign('data_status','edit');
 }
 else
 {
 	$access_right=$userMgr->getFunctionWithUser(0);
  	$smarty->assign('data_status','new');
 }

 $smarty->assign('access_right',$access_right);
 
 $smarty->display(ROOT.'/templates/Admin/user_detail.tpl');
 
?>
