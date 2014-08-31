<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */  
 require '../include/common.inc.php';
 
 $checkpremmis_id=$CONFIG["function"]["manager"];
 require ROOT.'/include/login.inc.php';
 require ROOT.'/classes/datamgr/manager.cls.php';
 
 $positionlist=$managerMgr->getPositionHistory();	
 $smarty->assign("positionlist",$positionlist);
 $smarty->display(ROOT.'/templates/Admin/manager.tpl');
 
?>