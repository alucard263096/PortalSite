<?php
/*
 * Created on 2012-6-30
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
  require '../include/common.inc.php';
  require ROOT.'/classes/datamgr/requisition.cls.php';
   $action=$_REQUEST["action"];
 
 if($action=="submit")
 {
  return $requisitionMgr->submitRequisition($_REQUEST["name"],$_REQUEST["position"],$_REQUEST["email"],$_REQUEST["phone"],$_REQUEST["qq"],
  $_REQUEST["company_name"],$_REQUEST["company_city"],$_REQUEST["company_address"],$_REQUEST["company_phone"],$_REQUEST["company_website"],
  $_REQUEST["knew"],$_REQUEST["message"],$_REQUEST["question"]);
 }
 else if($action=="isexist")
 {
 	$rt=$requisitionMgr->checkHasRequisition($_REQUEST["qq"],$_REQUEST["phone"],$_REQUEST["companyname"]);
	echo $rt;
 }
?>
