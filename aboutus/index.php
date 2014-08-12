<?php
/*
 * Created on 2012-6-30
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
  require '../include/common.inc.php';
  require ROOT.'/classes/datamgr/general.cls.php';
  
  $content=$generalMgr->getKeyContent('company_descript');
  
  $smarty->assign('content',$content);
  $smarty->display(ROOT.'/templates/aboutus/index.tpl');
  
?>
