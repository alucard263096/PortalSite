<?php
/*
 * Created on 2012-6-30
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
require '../include/common.inc.php';


$array = array(
    "seq" => "1",
    "id" => "1",
    "name" => "雷德睦华总代理（北京）",
    "address" => "北京市丰台区马家堡东路106号自然新天地写字楼606室",
    "tel" => "010-58032661",
    "type"=> "1",
    "cityid"=>"1"
);
$result[]=$array;

$array = array(
    "seq" => "2",
    "id" => "2",
    "name" => "雷德睦华医院（上海）",
    "address" => "上海市人民大道200号",
    "tel" => "020-5002200",
    "type"=> "2",
    "cityid"=>"2"
);
$result[]=$array;

$array = array(
    "seq" => "3",
    "id" => "3",
    "name" => "雷德睦华医生（深圳）",
    "address" => "深圳市罗湖区文锦中路1008号罗湖管理中心大厦",
    "tel" => "0755-25578945",
    "type"=> "3",
    "cityid"=>"3"
);
$result[]=$array;

$array = array(
    "seq" => "4",
    "id" => "4",
    "name" => "雷德睦华代理（长沙）",
    "address" => "长沙市芙蓉区人民东路189号",
    "tel" => "0731-889999176",
    "type"=> "1",
    "cityid"=>"4"
);
$result[]=$array;
//print_r($result);

$smarty->assign('partnerlist',$result);
$smarty->display(ROOT.'/templates/partner/index.tpl');



?>