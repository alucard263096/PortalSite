<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */  
 require '../include/common.inc.php';
 
 $checkpremmis_id=$CONFIG["function"]["website"];
 require ROOT.'/include/login.inc.php';
 require ROOT.'/classes/datamgr/website.cls.php';
 
 $base=$websiteMgr->getWebsiteBase();
 $smarty->assign("base",$base);
 
 $smarty->display(ROOT.'/templates/Admin/website.tpl');
 
?>