<?php
/*
 * Created on 2011-2-8
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 require '../include/common.inc.php';
 
 $getpremmis_id=$CONFIG["function"]["product"];
 require ROOT.'/include/login.inc.php';
 require ROOT.'/classes/datamgr/product.cls.php';
 require ROOT.'/classes/datamgr/product_category.cls.php';
 
 $id=$_REQUEST["id"];
 
 if($id!='')
 {
 	$detail=$productMgr->getProduct($id);
  	$detail["name"]=htmlspecialchars($detail["name"]);
  	$detail["content"]=htmlspecialchars($detail["content"]);
  	$smarty->assign('detail',$detail);
  	$smarty->assign('data_status','edit');
 }
 else
 {
  	$smarty->assign('data_status','new');
 }
 
 $pclist=$productCategoryMgr->getCategoryList();	
 $smarty->assign("categoryList",$pclist);
 
 $smarty->display(ROOT.'/templates/Admin/product_detail.tpl');
 
?>
