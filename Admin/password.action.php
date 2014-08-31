<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */  
 require '../include/common.inc.php';
 require ROOT.'/classes/datamgr/user.cls.php';
 
 $action=$_REQUEST["action"];
 
 if($action=="change_password")
 {
 	$rs=$userMgr->changsePassword($_SESSION["sysUser"]["user_id"],md5($_REQUEST["current_password"]),md5($_REQUEST["new_password"]));	
 	
 	echo $rs;
 	
 }
?>