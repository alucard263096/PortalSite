<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
  require '../include/common.inc.php';
  
  
  $smarty->assign('Subtitle',"登录界面");
  $smarty->display(ROOT.'/templates/Admin/login.tpl');
  
?>
