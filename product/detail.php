<?php
/*
 * Created on 2012-6-30
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require '../include/common.inc.php';



$info = array(
    "id" => "1",
    "name" => "PALACOS®R",
    "desc" => "原装进口 德国制造",
    "image" => "product_r.png",
    "kangshengsu" => "无",
    "niandu"=> "高粘度",
    "butoushexianxing"=>"二氧化锆",
	"shiyingxing"=>"髋及膝关节置换术",
    "caozuojianyi"=>"使用真空搅拌系统时，骨水泥需预冷",
    "chichunbaozhuang"=>"1 X 40<br/>2 X 40",
	"PDF"=>base64_encode("PALACOS_R_IFU_CN.pdf")
);

$array[]=$info;

$info = array(
    "id" => "2",
    "name" => "PALACOS®R+G",
    "desc" => "原装进口 德国制造",
    "image" => "product_r.png",
    "kangshengsu" => "庆大霉素",
    "niandu"=> "高粘度",
    "butoushexianxing"=>"二氧化锆",
	"shiyingxing"=>"髋及膝关节置换术",
    "caozuojianyi"=>"使用真空搅拌系统时，骨水泥需预冷",
    "chichunbaozhuang"=>"2 X 10<br />1 X 20<br />2 X 20<br />1 X 40<br />2 X 40<br />1 X 60",
	"PDF"=>base64_encode("PALACOS_RG_IFU_CN.pdf")
);
$array[]=$info;

$info = array(
    "id" => "3",
    "name" => "PALACOS®MV",
    "desc" => "适合真空混合",
    "image" => "product_m.png",
    "kangshengsu" => "无",
    "niandu"=> "中粘度",
    "butoushexianxing"=>"二氧化锆",
	"shiyingxing"=>"髋及膝关节置换术",
    "caozuojianyi"=>"使用真空搅拌系统时， 骨水泥无需预冷",
    "chichunbaozhuang"=>"1 X 40<br/>2 X 40",
	"PDF"=>base64_encode("PALACOS_MV_IFU_CN.pdf")
);
$array[]=$info;


$info = array(
    "id" => "4",
    "name" => "PALACOS®MV+G",
    "desc" => "适合真空混合",
    "image" => "product_m.png",
    "kangshengsu" => "庆大霉素",
    "niandu"=> "中粘度",
    "butoushexianxing"=>"二氧化锆",
	"shiyingxing"=>"髋及膝关节置换术",
    "caozuojianyi"=>"使用真空搅拌系统时， 骨水泥无需预冷",
    "chichunbaozhuang"=>"1 X 40<br/>2 X 40",
	"PDF"=>base64_encode("PALACOS_MV_IFU_CN.pdf")
);
$array[]=$info;

$info = array(
    "id" => "5",
    "name" => "PALACOS®LV",
    "desc" => "灵活触动即可完成艰巨任务",
    "image" => "product_l.png",
    "kangshengsu" => "无",
    "niandu"=> "低粘度",
    "butoushexianxing"=>"二氧化锆",
	"shiyingxing"=>"小关节如肩或肘关节",
    "caozuojianyi"=>"使用真空搅拌系统时， 骨水泥无需预冷",
    "chichunbaozhuang"=>"1 X 40<br/>2 X 40",
	"PDF"=>base64_encode("PALACOS_R_IFU_CN.pdf")
);
$array[]=$info;

$info = array(
    "id" => "6",
    "name" => "PALACOS®LV+G",
    "desc" => "灵活触动即可完成艰巨任务",
    "image" => "product_l.png",
    "kangshengsu" => "无",
    "niandu"=> "低粘度",
    "butoushexianxing"=>"二氧化锆",
	"shiyingxing"=>"小关节如肩或肘关节",
    "caozuojianyi"=>"使用真空搅拌系统时， 骨水泥无需预冷",
    "chichunbaozhuang"=>"2 X 10<br />1 X 20<br />2 X 20<br />1 X 40<br />2 X 40<br />1 X 60",
	"PDF"=>base64_encode("PALACOS_R_IFU_CN.pdf")
);
$array[]=$info;


$id=$_REQUEST["id"];
$vinfo=null;
 foreach($array as $v){
 	if($v["id"]==$id){
 		$vinfo=$v;	
 		break;
 	}	
 }
if($vinfo==null){
	echo "system error";
	exit;
}


$smarty->assign('info',$vinfo);


$smarty->display(ROOT.'/templates/product/detail.tpl');



?>