<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */  
 require '../include/common.inc.php';
 
 $checkpremmis_id=$CONFIG["function"]["product_category"];
 require ROOT.'/include/login.inc.php';
 
 $smarty->display(ROOT.'/templates/Admin/product_category.tpl');
 
?>