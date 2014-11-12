<?php
/*
 * Created on 2012-6-30
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
  require '../include/common.inc.php';
  require ROOT.'/include/front.inc.php';
  
  $name=$_REQUEST["name"];
  $phone=$_REQUEST["phone"];
  $company_name=$_REQUEST["company_name"];
  $company_address=$_REQUEST["company_address"];
  $remarks=$_REQUEST["remarks"];
  
  
  $smarty->assign('name',$name);
  $smarty->assign('phone',$phone);
  $smarty->assign('company_name',$company_name);
  $smarty->assign('company_address',$company_address);
  $smarty->assign('remarks',$remarks);
  
  $smarty->assign('module',"aboutus");
  $smarty->display(ROOT.'/templates/aboutus/joinus.tpl');
  
?>
