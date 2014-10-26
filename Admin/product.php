<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */  
 require '../include/common.inc.php';
 
 $checkpremmis_id=$CONFIG["function"]["product"];
 require ROOT.'/include/login.inc.php';
 require ROOT.'/classes/datamgr/product_category.cls.php';
 
 $pclist=$productCategoryMgr->getCategoryList();	
 
 $smarty->assign("categoryList",$pclist);
 $smarty->assign("cate_id",$_REQUEST["category_id"]);
 
 $smarty->display(ROOT.'/templates/Admin/product.tpl');
 
?>