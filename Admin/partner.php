<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */  
 require '../include/common.inc.php';
 
 $checkpremmis_id=$CONFIG["function"]["partner"];
 require ROOT.'/include/login.inc.php';
 require ROOT.'/classes/datamgr/partner.cls.php';
 
 $partnertype=$partnerMgr->getPartnerType();	
 //print_r($partnertype);
 $smarty->assign("partnertype",$partnertype);
 $smarty->display(ROOT.'/templates/Admin/partner.tpl');
 
?>