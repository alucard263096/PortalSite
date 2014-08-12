<?php
/*
 * Created on 2012-6-30
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
  require '../include/common.inc.php';
  
  $array = array(
    "name" => "PALACOS®R使用说明书",
    "filename" => base64_encode("PALACOS_R_IFU_CN.pdf")
	);
$palacos[]=$array;
  $array = array(
    "name" => "PALACOS®R+G使用说明书",
    "filename" => base64_encode("PALACOS_RG_IFU_CN.pdf")
	);
$palacos[]=$array;
  $array = array(
    "name" => "PALACOS®MV使用说明书",
    "filename" => base64_encode("PALACOS_MV_IFU_CN.pdf")
	);
$palacos[]=$array;
  $array = array(
    "name" => "PALACOS®MV+G使用说明书",
    "filename" => base64_encode("PALACOS_MVG_IFU_CN.pdf")
	);
$palacos[]=$array;
  $array = array(
    "name" => "PALACOS®LV使用说明书",
    "filename" => base64_encode("PALACOS_LV_IFU_CN.pdf")
	);
$palacos[]=$array;
  $array = array(
    "name" => "PALACOS®LV+G使用说明书",
    "filename" => base64_encode("PALACOS_LVG_IFU_CN.pdf")
	);
$palacos[]=$array;
  $array = array(
    "name" => "PALACOS® Family",
    "filename" => base64_encode("PALACOS_Family_Folder.pdf")
	);
$palacos[]=$array;

  $array = array(
    "name" => "PALACOS®主要附件",
    "filename" => base64_encode("PALACOS_Primary_Accessories_Folder_UK.pdf")
	);
$palacos[]=$array;

$acrr=array(
"seq"=>"1",
"name"=>"Palacos Family",
"downloadlist"=>$palacos
);
$list[]=$acrr;

  $array = array(
    "name" => "Osteopal-V小册子",
    "filename" => base64_encode("PRINT_Osteopal.pdf")
	);
$ov[]=$array;

$acrr=array(
"seq"=>"2",
"name"=>"Osteopal V 脊柱骨水泥",
"downloadlist"=>$ov
);
$list[]=$acrr;

  

  $array = array(
    "name" => "PALAMIX使用说明书",
    "filename" => base64_encode("PALAMIX_Guideline_CN_PRINT.pdf")
	);
$pm[]=$array;

  $array = array(
    "name" => "PALAMIX小册子",
    "filename" => base64_encode("PALAMIX_Folder_CN.pdf")
	);
$pm[]=$array;

$acrr=array(
"seq"=>"3",
"name"=>"骨水泥真空混合系统",
"downloadlist"=>$pm
);
$list[]=$acrr;

$ms=array();

$acrr=array(
"seq"=>"4",
"name"=>"MAST膜",
"downloadlist"=>$ms
);
$list[]=$acrr;
  
  
$smarty->assign('list',$list);
  
  $smarty->display(ROOT.'/templates/download/index.tpl');
  
?>
