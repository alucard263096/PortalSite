<?php
/*
 * Created on 2011-2-7
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */  
 require '../include/common.inc.php';
 $getpremmis_id=$CONFIG["function"]["website"];
 require ROOT.'/include/login.inc.php';
 
 $action=$_REQUEST["action"];
 
 if($action=="savebase")
 {
 //print_r($_REQUEST);
	
 	$rt=$websiteMgr->updateWebsiteBase($_REQUEST["website_name"]
					 	,$_REQUEST["favfile"]
					 	,$_REQUEST["contacter"]
					 	,$_REQUEST["qq"]
					 	,$_REQUEST["email"]
					 	,$_REQUEST["mobile"]
					 	,$_REQUEST["phone"]
					 	,$_REQUEST["address"]
					 	,$_REQUEST["seo_title"]
					 	,$_REQUEST["seo_keywords"]
					 	,$_REQUEST["seo_description"]);
	echo $rt;
 }
 else if($action=="uploadfav")
 {
 	require ROOT.'/classes/obj/upload.php';
	 $file=$_FILES["favfile"];
	 $filename=date('ymdHIs').$file["name"];
	 $file=new Upload($file,$filename,ROOT."/upload/fav/",true);
	 echo $file->safetyUpload();
	 echo $filename;
 }
 else if($action=="bannerlist")
 {
 	$rt=$websiteMgr->getIndexBannerList();
 	$smarty->assign("result",$rt);
 	$smarty->display(ROOT.'/templates/Admin/website_banner_result.tpl');
 }
 else if($action=="uploadbanner")
 {
 	require ROOT.'/classes/obj/upload.php';
	 $file=$_FILES["banner_upload_file"];
	 $filename=date('ymdHIs').$file["name"];
	 $file=new Upload($file,$filename,ROOT."/upload/index/",true);
	 echo $file->safetyUpload();
	 echo $filename;
 }
 else if($action=="editBanner"){
	 $id=$_REQUEST["id"];
	 if($id!='')
	 {
	 	$detail=$websiteMgr->getBanner($id);
	 	//print_r( $detail);
  		$detail["slogan"]=htmlspecialchars($detail["slogan"]);
  		$detail["title"]=htmlspecialchars($detail["title"]);
  		$detail["label"]=htmlspecialchars($detail["label"]);
  		//$detail["cont"]=htmlspecialchars($detail["cont"]);
	  	$smarty->assign('detail',$detail);
	  	$smarty->assign('data_status','edit');
	 }
	 else
	 {
	  	$smarty->assign('data_status','new');
	 }
 	$smarty->display(ROOT.'/templates/Admin/website_banner_detail.tpl');
 }
 else if($action=="savebanner")
 {
 	//print_r($_REQUEST);
 	$rt=$websiteMgr->updateBanner($_REQUEST["id"]
					 	,$_REQUEST["slogan"]
					 	,$_REQUEST["label"]
					 	,$_REQUEST["title"]
					 	,$_REQUEST["cont"]
					 	,$_REQUEST["seq"]
					 	,$_REQUEST["pic"]
					 	,$_REQUEST["link"]
					 	,$_REQUEST["status"]);
	echo $rt;
 }
 else if($action=="deletebanner")
 {
 	$rt=$websiteMgr->deleteBanner($_REQUEST["list"]);
					 	
	echo "success";
 	
 }
 
?>