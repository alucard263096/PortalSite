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
  if($action=="login"||1==1)
  {
  	$loginname=$_REQUEST["loginname"];
  	$password=$_REQUEST["password"];
  	
  	//$loginname="admin";
  	//$password="abcd1234";
  	
  	
  	$rs=$userMgr->getUserByName($loginname);
  	if(count($rs)>0)
  	{
  		if($rs[0]["password"]==md5($password))
  		{
  			if($rs[0]["status"]=="A")
  			{
  				$menu=$userMgr->getUserFunction($rs[0]["user_id"]);
  				/*
  				$m=$menu[count($menu)-1]["sub_function"][0];
  				$m["function_name"]="连锁店管理";
  				$m["function_link"]="#";
  				$menu[count($menu)-1]["sub_function"][]=$m;
  				*/
  				//print_r($menu);
  				
  				$_SESSION["sysMenu"]=$menu;
  				
  				$_SESSION["sysUser"]=$rs[0];
  				
  				
  				echo "success";
  			}
  			else
  			{
  				echo "not_active";
  			}
  		}
  		else
  		{
  			echo "invalid_password";
  		}
  	}
  	else
  	{
  		echo "not_exists";
  	}
  }
?>