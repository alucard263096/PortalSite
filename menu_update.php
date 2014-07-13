<?php
/*
 * Created on 2011-4-10
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
  require 'include/common.inc.php';
  /*
  $query=$dbmgr->query("select function_id,function_name from tb_function");
  $result = $dbmgr->fetch_array_all($query); 
  print_r($result);
 */
 
 
 $array=array();
 
 
 $a=array();
 $a["function_id"]=1;
 $a["function_name"]='内容管理';
 $array[]=$a;
 
 $a=array();
 $a["function_id"]=2;
 /*$a["function_name"]='日常操作';*/
 $a["function_name"]='关于我们';
 $array[]=$a;
 
 $a=array();
 $a["function_id"]=3;
 $a["function_name"]='联系我们';
 $array[]=$a;
 
 $a=array();
 $a["function_id"]=4;
 $a["function_name"]='招聘信息';
 $array[]=$a;
 
 $a=array();
 $a["function_id"]=5;
 $a["function_name"]='合作伙伴';
 $array[]=$a;
 
 $a=array();
 $a["function_id"]=6;
 $a["function_name"]='产品管理';
 $array[]=$a;
 
 $a=array();
 $a["function_id"]=7;
 $a["function_name"]='日常管理';
 $array[]=$a;
 
 $a=array();
 $a["function_id"]=8;
 $a["function_name"]='用户管理';
 $array[]=$a;
 
 for($i=0;$i<count($array);$i++)
 {
 	$id=$array[$i]["function_id"];
 	$name=$array[$i]["function_name"];
 
 	$sql="update tb_function set function_name='$name'" .
 			" where function_id=$id";
 
    $query=$dbmgr->query($sql);
 
 }
 
 
 
?>