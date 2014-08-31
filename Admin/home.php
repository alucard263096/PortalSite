<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
  require '../include/common.inc.php';
  require ROOT.'/include/login.inc.php';
  
  
 
  $smarty->assign("Subtitle","主页");
  $smarty->display(ROOT.'/templates/Admin/home.tpl');
 
?>
