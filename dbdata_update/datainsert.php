<?php
/*
 * Created on 2011-4-10
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
  require '../include/common.inc.php';
  /*
  $query=$dbmgr->query("select function_id,function_name from tb_function");
  $result = $dbmgr->fetch_array_all($query); 
  print_r($result);
 */

 
 
 $sql="
 delete from tb_access_right ;
delete from tb_city ;
delete from tb_download_category ;
delete from tb_download_file ;
delete from tb_function ;
delete from tb_function_right ;
delete from tb_manager ;
delete from tb_partner ;
delete from tb_partner_type ;
delete from tb_province ;
delete from tb_seq ;
delete from tb_user ;
delete from tb_user_access_right ;
delete from tb_user_function ;
delete from tb_website_base ;
 
insert into `tb_access_right` (`right_id`,`name`,`seq` ) values ('2','Edit','2' );

insert into `tb_access_right` (`right_id`,`name`,`seq` ) values ('3','Delete','3' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('1','001001001','北京','001001','1','中国/北京','市','3','dc','beijing','010','100010' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('19','001003001','石家庄','001003','3','中国/河北/石家庄','市','3','sjz','shijiazhuan','0311','050011' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('20','001003002','唐山','001003','3','中国/河北/唐山','市','3','ts','tangshan','0315','063006' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('21','001003003','秦皇岛','001003','3','中国/河北/秦皇岛','市','3','qhd','qinhuangdao','0335','066000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('22','001003004','邯郸','001003','3','中国/河北/邯郸','市','3','hd','handan','0310','056002' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('23','001003005','邢台','001003','3','中国/河北/邢台','市','3','xt','xingtai','0319','054001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('24','001003006','保定','001003','3','中国/河北/保定','市','3','bd','baoding','0312','071052' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('25','001003007','张家口','001003','3','中国/河北/张家口','市','3','zjk','zhangjiakou','0313','075061' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('26','001003008','承德','001003','3','中国/河北/承德','市','3','cd','chengde','0314','067000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('27','001003009','沧州','001003','3','中国/河北/沧州','市','3','cz','cangzhou','0317','061001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('28','001003010','廊坊','001003','3','中国/河北/廊坊','市','3','lf','langfang','0316','065000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('29','001003011','衡水','001003','3','中国/河北/衡水','市','3','hs','hengshui','0318','053000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('30','001004001','太原','001004','4','中国/山西/太原','市','3','ty','taiyuan','0351','030082' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('31','001004002','大同','001004','4','中国/山西/大同','市','3','dt','datong','0352','037008' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('32','001004003','阳泉','001004','4','中国/山西/阳泉','市','3','yq','yangquan','0353','045000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('33','001004004','长治','001004','4','中国/山西/长治','市','3','cz','changzhi','0355','046000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('34','001004005','晋城','001004','4','中国/山西/晋城','市','3','jc','jincheng','0356','048000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('35','001004006','朔州','001004','4','中国/山西/朔州','市','3','sz','shuozhou','0349','036000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('36','001004007','晋中','001004','4','中国/山西/晋中','市','3','jz','jinzhong','0354','030600' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('37','001004008','运城','001004','4','中国/山西/运城','市','3','yc','yuncheng','0359','044000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('38','001004009','忻州','001004','4','中国/山西/忻州','市','3','xz','xinzhou','0350','034000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('39','001004010','临汾','001004','4','中国/山西/临汾','市','3','lf','linfen','0357','041000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('40','001004011','吕梁地','001004','4','中国/山西/吕梁地','区','3','lld','lvliangdi','0358','033000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('41','001005001','呼和浩特','001005','5','中国/内蒙古/呼和浩特','市','3','hhht','huhehaote','0471','010020' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('42','001005002','包头','001005','5','中国/内蒙古/包头','市','3','bt','baotou','0472','014025' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('43','001005003','乌海','001005','5','中国/内蒙古/乌海','市','3','wh','wuhai','0473','016000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('44','001005004','赤峰','001005','5','中国/内蒙古/赤峰','市','3','cf','chifeng','0476','024000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('45','001005005','通辽','001005','5','中国/内蒙古/通辽','市','3','tl','tongliao','0475','028000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('46','001005006','鄂尔多斯','001005','5','中国/内蒙古/鄂尔多斯','市','3','eeds','eerduosi','0477','017004' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('47','001005007','呼伦贝尔','001005','5','中国/内蒙古/呼伦贝尔','市','3','hlbe','hulunbeier','0470','021008' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('48','001005008','乌兰察布','001005','5','中国/内蒙古/乌兰察布','盟','3','wlcbm','wulanchabum','0474','012000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('49','001005009','锡林郭勒','001005','5','中国/内蒙古/锡林郭勒','盟','3','xlglm','xilinguolem','0479','026021' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('50','001005010','巴彦淖尔','001005','5','中国/内蒙古/巴彦淖尔','盟','3','bynem','bayannaoerm','0478','015001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('51','001005011','阿拉善','001005','5','中国/内蒙古/阿拉善','盟','3','alsm','alashanmeng','0483','750306' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('52','001005012','兴安','001005','5','中国/内蒙古/兴安','盟','3','xam','xinganmeng','0482','137401' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('53','001006001','沈阳','001006','6','中国/辽宁/沈阳','市','3','sy','shenyang','024','110013' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('54','001006002','大连','001006','6','中国/辽宁/大连','市','3','dl','dalian','0411','116011' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('55','001006003','鞍山','001006','6','中国/辽宁/鞍山','市','3','as','anshan','0412','114001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('56','001006004','抚顺','001006','6','中国/辽宁/抚顺','市','3','fs','fushun','0413','113008' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('57','001006005','本溪','001006','6','中国/辽宁/本溪','市','3','bx','benxi','0414','117000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('58','001006006','丹东','001006','6','中国/辽宁/丹东','市','3','dd','dandong','0415','118000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('59','001006007','锦州','001006','6','中国/辽宁/锦州','市','3','jz','jinzhou','0416','121000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('60','001006008','葫芦岛','001006','6','中国/辽宁/葫芦岛','市','3','hld','huludao','0429','125000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('61','001006009','营口','001006','6','中国/辽宁/营口','市','3','yk','yingkou','0417','115003' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('62','001006010','盘锦','001006','6','中国/辽宁/盘锦','市','3','pj','panjin','0427','124010' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('63','001006011','阜新','001006','6','中国/辽宁/阜新','市','3','fx','fuxin','0418','123000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('64','001006012','辽阳','001006','6','中国/辽宁/辽阳','市','3','ly','liaoyang','0419','111000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('65','001006013','铁岭','001006','6','中国/辽宁/铁岭','市','3','tl','tieling','0410','112000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('66','001006014','朝阳','001006','6','中国/辽宁/朝阳','市','3','cy','chaoyang','0421','122000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('67','001007001','长春','001007','7','中国/吉林/长春','市','3','cc','changchun','0431','130061' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('68','001007002','吉林','001007','7','中国/吉林/吉林','市','3','jl','jilin','0432','132011' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('69','001007003','四平','001007','7','中国/吉林/四平','市','3','sp','siping','0434','136000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('70','001007004','辽源','001007','7','中国/吉林/辽源','市','3','ly','liaoyuan','0437','136200' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('71','001007005','通化','001007','7','中国/吉林/通化','市','3','th','tonghua','0435','134001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('72','001007006','白山','001007','7','中国/吉林/白山','市','3','bs','baishan','0439','134300' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('73','001007007','松原','001007','7','中国/吉林/松原','市','3','sy','songyuan','0438','138000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('74','001007008','白城','001007','7','中国/吉林/白城','市','3','bc','baicheng','0436','137000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('75','001007009','延边','001007','7','中国/吉林/延边','州','3','yb','yanbian','0433','133000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('76','001008001','哈尔滨','001008','8','中国/黑龙江/哈尔滨','市','3','heb','haerbin','0451','150010' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('77','001008002','齐齐哈尔','001008','8','中国/黑龙江/齐齐哈尔','市','3','qqhe','qiqihaer','0452','161005' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('78','001008003','鹤岗','001008','8','中国/黑龙江/鹤岗','市','3','hg','hegang','0468','154100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('79','001008004','双鸭山','001008','8','中国/黑龙江/双鸭山','市','3','sys','shuangyasha','0469','155100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('80','001008005','鸡西','001008','8','中国/黑龙江/鸡西','市','3','jx','jixi','0467','158100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('81','001008006','大庆','001008','8','中国/黑龙江/大庆','市','3','dq','daqing','0459','163311' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('82','001008007','伊春','001008','8','中国/黑龙江/伊春','市','3','yc','yichun','0458','153000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('83','001008008','牡丹江','001008','8','中国/黑龙江/牡丹江','市','3','mdj','mudanjiang','0453','157000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('84','001008009','佳木斯','001008','8','中国/黑龙江/佳木斯','市','3','jms','jiamusi','0454','154002' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('85','001008010','七台河','001008','8','中国/黑龙江/七台河','市','3','qth','qitaihe','0464','154600' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('86','001008011','黑河','001008','8','中国/黑龙江/黑河','市','3','hh','heihe','0456','164300' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('87','001008012','绥化','001008','8','中国/黑龙江/绥化','市','3','sh','suihua','0455','152000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('88','001008013','大兴安岭','001008','8','中国/黑龙江/大兴安岭','地区','3','dxald','daxinganlin','0457','165000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('89','001010001','南京','001010','10','中国/江苏/南京','市','3','nj','nanjing','025','210008' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('90','001010002','徐州','001010','10','中国/江苏/徐州','市','3','xz','xuzhou','0516','221003' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('91','001010003','连云港','001010','10','中国/江苏/连云港','市','3','lyg','lianyungang','0518','222002' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('92','001010004','淮安','001010','10','中国/江苏/淮安','市','3','ha','huaian','0517','223001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('93','001010005','宿迁','001010','10','中国/江苏/宿迁','市','3','sq','suqian','0527','223800' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('94','001010006','盐城','001010','10','中国/江苏/盐城','市','3','yc','yancheng','0515','224005' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('95','001010007','扬州','001010','10','中国/江苏/扬州','市','3','yz','yangzhou','0514','225002' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('96','001010008','泰州','001010','10','中国/江苏/泰州','市','3','tz','taizhou','0523','225300' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('97','001010009','南通','001010','10','中国/江苏/南通','市','3','nt','nantong','0513','226001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('98','001010010','镇江','001010','10','中国/江苏/镇江','市','3','zj','zhenjiang','0511','212001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('99','001010011','常州','001010','10','中国/江苏/常州','市','3','cz','changzhou','0519','213003' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('100','001010012','无锡','001010','10','中国/江苏/无锡','市','3','wx','wuxi','0510','214001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('101','001010013','苏州','001010','10','中国/江苏/苏州','市','3','sz','suzhou','0512','215002' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('102','001011001','杭州','001011','11','中国/浙江/杭州','市','3','hz','hangzhou','0571','310026' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('103','001011002','宁波','001011','11','中国/浙江/宁波','市','3','nb','ningbo','0574','315000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('104','001011003','温州','001011','11','中国/浙江/温州','市','3','wz','wenzhou','0577','325000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('105','001011004','嘉兴','001011','11','中国/浙江/嘉兴','市','3','jx','jiaxing','0573','314000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('106','001011005','湖州','001011','11','中国/浙江/湖州','市','3','hz','huzhou','0572','313000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('107','001011006','绍兴','001011','11','中国/浙江/绍兴','市','3','sx','shaoxing','0575','312000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('108','001011007','金华','001011','11','中国/浙江/金华','市','3','jh','jinhua','0579','321000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('109','001011008','衢州','001011','11','中国/浙江/衢州','市','3','xz','xuzhou','0570','324002' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('110','001011009','舟山','001011','11','中国/浙江/舟山','市','3','zs','zhoushan','0580','316000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('111','001011010','台州','001011','11','中国/浙江/台州','市','3','tz','taizhou','0576','318000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('112','001011011','丽水','001011','11','中国/浙江/丽水','市','3','ls','lishui','0578','323000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('113','001012001','合肥','001012','12','中国/安徽/合肥','市','3','hf','hefei','0551','230001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('114','001012002','芜湖','001012','12','中国/安徽/芜湖','市','3','wh','wuhu','0553','241000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('115','001012003','蚌埠','001012','12','中国/安徽/蚌埠','市','3','bb','bangbu','0552','233000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('116','001012004','淮南','001012','12','中国/安徽/淮南','市','3','hn','huainan','0554','232000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('117','001012005','马鞍山','001012','12','中国/安徽/马鞍山','市','3','mas','maanshan','0555','243000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('118','001012006','淮北','001012','12','中国/安徽/淮北','市','3','hb','huaibei','0561','235000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('119','001012007','铜陵','001012','12','中国/安徽/铜陵','市','3','tl','tongling','0562','244000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('120','001012008','安庆','001012','12','中国/安徽/安庆','市','3','aq','anqing','0556','246001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('121','001012009','黄山','001012','12','中国/安徽/黄山','市','3','hs','huangshan','0559','245000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('122','001012010','滁州','001012','12','中国/安徽/滁州','市','3','cz','chuzhou','0550','239001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('123','001012011','阜阳','001012','12','中国/安徽/阜阳','市','3','fy','fuyang','0558','236033' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('124','001012012','宿州','001012','12','中国/安徽/宿州','市','3','sz','suzhou','0557','234000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('125','001012013','巢湖','001012','12','中国/安徽/巢湖','市','3','ch','chaohu','0565','238000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('126','001012014','六安','001012','12','中国/安徽/六安','市','3','la','liuan','0564','237002' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('127','001012015','亳州','001012','12','中国/安徽/亳州','市','3','hz','haozhou','0558','236802' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('128','001012016','池州','001012','12','中国/安徽/池州','市','3','cz','chizhou','0566','247100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('129','001012017','宣城','001012','12','中国/安徽/宣城','市','3','xc','xuancheng','0563','242000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('130','001013001','福州','001013','13','中国/福建/福州','市','3','fz','fuzhou','0591','350001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('131','001013002','厦门','001013','13','中国/福建/厦门','市','3','xm','xiamen','0592','361012' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('132','001013003','三明','001013','13','中国/福建/三明','市','3','sm','sanming','0598','365000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('133','001013004','莆田','001013','13','中国/福建/莆田','市','3','pt','putian','0594','351100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('134','001013005','泉州','001013','13','中国/福建/泉州','市','3','qz','quanzhou','0595','362000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('135','001013006','漳州','001013','13','中国/福建/漳州','市','3','zz','zhangzhou','0596','363000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('136','001013007','南平','001013','13','中国/福建/南平','市','3','np','nanping','0599','353000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('137','001013008','龙岩','001013','13','中国/福建/龙岩','市','3','ly','longyan','0597','364000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('138','001013009','宁德','001013','13','中国/福建/宁德','市','3','nd','ningde','0593','352100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('139','001014001','南昌','001014','14','中国/江西/南昌','市','3','nc','nanchang','0791','330008' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('140','001014002','景德镇','001014','14','中国/江西/景德镇','市','3','jdz','jingdezhen','0798','333000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('141','001014003','萍乡','001014','14','中国/江西/萍乡','市','3','px','pingxiang','0799','337002' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('142','001014004','九江','001014','14','中国/江西/九江','市','3','jj','jiujiang','0792','332000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('143','001014005','新余','001014','14','中国/江西/新余','市','3','xy','xinyu','0790','336525' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('144','001014006','鹰潭','001014','14','中国/江西/鹰潭','市','3','yt','yingtan','0701','335001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('145','001014007','赣州','001014','14','中国/江西/赣州','市','3','gz','ganzhou','0797','341000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('146','001014008','吉安','001014','14','中国/江西/吉安','市','3','ja','jian','0796','343000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('147','001014009','宜春','001014','14','中国/江西/宜春','市','3','yc','yichun','0795','336000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('148','001014010','抚州','001014','14','中国/江西/抚州','市','3','fz','fuzhou','0794','344000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('149','001014011','上饶','001014','14','中国/江西/上饶','市','3','sr','shangrao','0793','334000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('150','001015001','济南','001015','15','中国/山东/济南','市','3','jn','jinan','0531','250001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('151','001015002','青岛','001015','15','中国/山东/青岛','市','3','qd','qingdao','0532','266001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('152','001015003','淄博','001015','15','中国/山东/淄博','市','3','zb','zibo','0533','255039' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('153','001015004','枣庄','001015','15','中国/山东/枣庄','市','3','zz','zaozhuang','0632','277101' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('154','001015005','东营','001015','15','中国/山东/东营','市','3','dy','dongying','0546','257093' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('155','001015006','潍坊','001015','15','中国/山东/潍坊','市','3','wf','weifang','0536','261041' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('156','001015007','烟台','001015','15','中国/山东/烟台','市','3','yt','yantai','0535','264001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('157','001015008','威海','001015','15','中国/山东/威海','市','3','wh','weihai','0631','264200' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('158','001015009','济宁','001015','15','中国/山东/济宁','市','3','jn','jining','0537','272119' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('159','001015010','泰安','001015','15','中国/山东/泰安','市','3','ta','taian','0538','271000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('160','001015011','日照','001015','15','中国/山东/日照','市','3','rz','rizhao','0633','276800' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('161','001015012','莱芜','001015','15','中国/山东/莱芜','市','3','lw','laiwu','0634','271100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('162','001015013','临沂','001015','15','中国/山东/临沂','市','3','ly','linyi','0539','276001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('163','001015014','德州','001015','15','中国/山东/德州','市','3','dz','dezhou','0534','253012' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('164','001015015','聊城','001015','15','中国/山东/聊城','市','3','lc','liaocheng','0635','252052' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('165','001015016','滨州','001015','15','中国/山东/滨州','市','3','bz','binzhou','0543','256619' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('166','001015017','菏泽','001015','15','中国/山东/菏泽','市','3','hz','heze','0530','274020' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('167','001016001','郑州','001016','16','中国/河南/郑州','市','3','zz','zhengzhou','0371','450006' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('168','001016002','开封','001016','16','中国/河南/开封','市','3','kf','kaifeng','0378','475001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('169','001016003','洛阳','001016','16','中国/河南/洛阳','市','3','ly','luoyang','0379','471000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('170','001016004','平顶山','001016','16','中国/河南/平顶山','市','3','pds','pingdingsha','0375','467000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('171','001016005','焦作','001016','16','中国/河南/焦作','市','3','jz','jiaozuo','0391','454002' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('172','001016006','鹤壁','001016','16','中国/河南/鹤壁','市','3','hb','hebi','0392','458030' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('173','001016007','新乡','001016','16','中国/河南/新乡','市','3','xx','xinxiang','0373','453000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('174','001016008','安阳','001016','16','中国/河南/安阳','市','3','ay','anyang','0372','455000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('175','001016009','濮阳','001016','16','中国/河南/濮阳','市','3','y','yang','0393','457000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('176','001016010','许昌','001016','16','中国/河南/许昌','市','3','xc','xuchang','0374','461000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('177','001016011','漯河','001016','16','中国/河南/漯河','市','3','h','he','0395','462000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('178','001016012','三门峡','001016','16','中国/河南/三门峡','市','3','smx','sanmenxia','0398','472000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('179','001016013','南阳','001016','16','中国/河南/南阳','市','3','ny','nanyang','0377','473002' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('180','001016014','商丘','001016','16','中国/河南/商丘','市','3','sq','shangqiu','0370','476000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('181','001016015','信阳','001016','16','中国/河南/信阳','市','3','xy','xinyang','0376','464000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('182','001016016','周口','001016','16','中国/河南/周口','市','3','zk','zhoukou','0394','466000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('183','001016017','驻马店','001016','16','中国/河南/驻马店','市','3','zmd','zhumadian','0396','463000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('184','001016018','直辖行政单位','001016','16','中国/河南/直辖行政单位','null','3','zxxzdw','zhixiaxingz','0391		','454650' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('185','001017001','武汉','001017','17','中国/湖北/武汉','市','3','wh','wuhan','027','430014' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('186','001017002','黄石','001017','17','中国/湖北/黄石','市','3','hs','huangshi','0714','435003' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('187','001017003','襄樊','001017','17','中国/湖北/襄樊','市','3','xf','xiangfan','0710','441021' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('188','001017004','十堰','001017','17','中国/湖北/十堰','市','3','sy','shiyan','0719','442000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('189','001017005','荆州','001017','17','中国/湖北/荆州','市','3','jz','jingzhou','0716','434000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('190','001017006','宜昌','001017','17','中国/湖北/宜昌','市','3','yc','yichang','0717','443000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('191','001017007','荆门','001017','17','中国/湖北/荆门','市','3','jm','jingmen','0724','448000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('192','001017008','鄂州','001017','17','中国/湖北/鄂州','市','3','ez','ezhou','0711','436000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('193','001017009','孝感','001017','17','中国/湖北/孝感','市','3','xg','xiaogan','0712','432100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('194','001017010','黄冈','001017','17','中国/湖北/黄冈','市','3','hg','huanggang','0713','438000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('195','001017011','咸宁','001017','17','中国/湖北/咸宁','市','3','xn','xianning','0715','437000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('196','001017012','随州','001017','17','中国/湖北/随州','市','3','sz','suizhou','0722','441300' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('197','001017013','恩施','001017','17','中国/湖北/恩施','州','3','es','enshi','0718','445000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('198','001017014','直辖行政单位','001017','17','中国/湖北/直辖行政单位','null','3','zxxzdw','zhixiaxingz','0719','442400' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('199','001018001','长沙','001018','18','中国/湖南/长沙','市','3','cs','changsha','0731','410005' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('200','001018002','株洲','001018','18','中国/湖南/株洲','市','3','zz','zhuzhou','0733','412000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('201','001018003','湘潭','001018','18','中国/湖南/湘潭','市','3','xt','xiangtan','0732','411100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('202','001018004','衡阳','001018','18','中国/湖南/衡阳','市','3','hy','hengyang','0734','421001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('203','001018005','邵阳','001018','18','中国/湖南/邵阳','市','3','sy','shaoyang','0739','422000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('204','001018006','岳阳','001018','18','中国/湖南/岳阳','市','3','yy','yueyang','0730','414000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('205','001018007','常德','001018','18','中国/湖南/常德','市','3','cd','changde','0736','415000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('206','001018008','张家界','001018','18','中国/湖南/张家界','市','3','zjj','zhangjiajie','0744','427000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('207','001018009','益阳','001018','18','中国/湖南/益阳','市','3','yy','yiyang','0737','413000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('208','001018010','郴州','001018','18','中国/湖南/郴州','市','3','cz','chenzhou','0735','423000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('209','001018011','永州','001018','18','中国/湖南/永州','市','3','yz','yongzhou','0746','425000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('210','001018012','怀化','001018','18','中国/湖南/怀化','市','3','hh','huaihua','0745','418000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('211','001018013','娄底','001018','18','中国/湖南/娄底','市','3','ld','loudi','0738','417000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('212','001018014','湘西','001018','18','中国/湖南/湘西','州','3','xx','xiangxi','0743','416000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('213','001019001','广州','001019','19','中国/广东/广州','市','3','gz','guangzhou','020','510130' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('214','001019002','深圳','001019','19','中国/广东/深圳','市','3','sz','shenzhen','0755','518027' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('215','001019003','珠海','001019','19','中国/广东/珠海','市','3','zh','zhuhai','0756','519000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('216','001019004','汕头','001019','19','中国/广东/汕头','市','3','st','shantou','0754','515031' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('217','001019005','韶关','001019','19','中国/广东/韶关','市','3','sg','shaoguan','0751','512000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('218','001019006','河源','001019','19','中国/广东/河源','市','3','hy','heyuan','0762','517001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('219','001019007','梅州','001019','19','中国/广东/梅州','市','3','mz','meizhou','0753','514021' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('220','001019008','惠州','001019','19','中国/广东/惠州','市','3','hz','huizhou','0752','516001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('221','001019009','汕尾','001019','19','中国/广东/汕尾','市','3','sw','shanwei','0660','516601' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('222','001019010','东莞','001019','19','中国/广东/东莞','市','3','d','dongwan','0769','523003' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('223','001019011','中山','001019','19','中国/广东/中山','市','3','zs','zhongshan','0760','528403' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('224','001019012','江门','001019','19','中国/广东/江门','市','3','jm','jiangmen','0750','529020' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('225','001019013','佛山','001019','19','中国/广东/佛山','市','3','fs','foshan','0757','528000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('226','001019014','阳江','001019','19','中国/广东/阳江','市','3','yj','yangjiang','0662','529525' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('227','001019015','湛江','001019','19','中国/广东/湛江','市','3','zj','zhanjiang','0759','524038' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('228','001019016','茂名','001019','19','中国/广东/茂名','市','3','mm','maoming','0668','525011' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('229','001019017','肇庆','001019','19','中国/广东/肇庆','市','3','zq','zhaoqing','0758','526060' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('230','001019018','清远','001019','19','中国/广东/清远','市','3','qy','qingyuan','0763','511500' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('231','001019019','潮州','001019','19','中国/广东/潮州','市','3','cz','chaozhou','0768','521000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('232','001019020','揭阳','001019','19','中国/广东/揭阳','市','3','jy','jieyang','0663','522000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('233','001019021','云浮','001019','19','中国/广东/云浮','市','3','yf','yunfu','0766','527300' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('234','001020001','南宁','001020','20','中国/广西/南宁','市','3','nn','nanning','0771','530012' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('235','001020002','柳州','001020','20','中国/广西/柳州','市','3','lz','liuzhou','0772','545001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('236','001020003','桂林','001020','20','中国/广西/桂林','市','3','gl','guilin','0773','541002' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('237','001020004','梧州','001020','20','中国/广西/梧州','市','3','wz','wuzhou','0774','543000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('238','001020005','北海','001020','20','中国/广西/北海','市','3','bh','beihai','0779','536000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('239','001020006','防城港','001020','20','中国/广西/防城港','市','3','fcg','fangchengga','0770','538001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('240','001020007','钦州','001020','20','中国/广西/钦州','市','3','qz','qinzhou','0777','535000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('241','001020008','贵港','001020','20','中国/广西/贵港','市','3','gg','guigang','0775','537100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('242','001020009','玉林','001020','20','中国/广西/玉林','市','3','yl','yulin','0775','537000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('243','001020010','百色','001020','20','中国/广西/百色','市','3','bs','baise','0776','533000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('244','001020011','贺州','001020','20','中国/广西/贺州','市','3','hz','hezhou','0774','542800' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('245','001020012','河池','001020','20','中国/广西/河池','市','3','hc','hechi','0778','547000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('246','001020013','来宾','001020','20','中国/广西/来宾','市','3','lb','laibin','0772','null' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('247','001020014','崇左','001020','20','中国/广西/崇左','市','3','cz','chongzuo','null','null' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('248','001021001','海口','001021','21','中国/海南/海口','市','3','hk','haikou','0898','570102' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('249','001021002','三亚','001021','21','中国/海南/三亚','市','3','sy','sanya','0898','572002' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('250','001021003','省直辖行政单位','001021','21','中国/海南/省直辖行政单位','null','3','zxxzdw','zhixiaxingz','0898','571800' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('251','001023001','成都','001023','23','中国/四川/成都','市','3','cd','chengdu','028','610015' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('252','001023002','自贡','001023','23','中国/四川/自贡','市','3','zg','zigong','0813','643000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('253','001023003','攀枝花','001023','23','中国/四川/攀枝花','市','3','pzh','panzhihua','0812','617000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('254','001023004','泸州','001023','23','中国/四川/泸州','市','3','lz','luzhou','0830','646000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('255','001023005','德阳','001023','23','中国/四川/德阳','市','3','dy','deyang','0838','618000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('256','001023006','绵阳','001023','23','中国/四川/绵阳','市','3','my','mianyang','0816','621000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('257','001023007','广元','001023','23','中国/四川/广元','市','3','gy','guangyuan','0839','628017' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('258','001023008','遂宁','001023','23','中国/四川/遂宁','市','3','sn','suining','0825','629000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('259','001023009','内江','001023','23','中国/四川/内江','市','3','nj','neijiang','0832','641000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('260','001023010','乐山','001023','23','中国/四川/乐山','市','3','ls','leshan','0833','614000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('261','001023011','南充','001023','23','中国/四川/南充','市','3','nc','nanchong','0817','637000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('262','001023012','宜宾','001023','23','中国/四川/宜宾','市','3','yb','yibin','0831','644000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('263','001023013','广安','001023','23','中国/四川/广安','市','3','ga','guangan','0826','638500' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('264','001023014','达州','001023','23','中国/四川/达州','市','3','dz','dazhou','0818','635000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('265','001023015','眉山','001023','23','中国/四川/眉山','市','3','ms','meishan','0833','620010' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('266','001023016','雅安','001023','23','中国/四川/雅安','市','3','ya','yaan','0835','625000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('267','001023017','巴中','001023','23','中国/四川/巴中','市','3','bz','bazhong','0827','636600' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('268','001023018','资阳','001023','23','中国/四川/资阳','市','3','zy','ziyang','0832','641300' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('269','001023019','阿坝','001023','23','中国/四川/阿坝','州','3','ab','aba','0837','624000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('270','001023020','甘孜','001023','23','中国/四川/甘孜','州','3','gz','ganzi','0836','626000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('271','001023021','凉山','001023','23','中国/四川/凉山','州','3','ls','liangshan','0834','615000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('272','001024001','贵阳','001024','24','中国/贵州/贵阳','市','3','gy','guiyang','0851','550003' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('273','001024002','六盘水','001024','24','中国/贵州/六盘水','市','3','lps','liupanshui','0858','553001' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('274','001024003','遵义','001024','24','中国/贵州/遵义','市','3','zy','zunyi','0852','563000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('275','001024004','安顺','001024','24','中国/贵州/安顺','市','3','as','anshun','0853','561000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('276','001024005','铜仁地','001024','24','中国/贵州/铜仁地','区','3','trd','tongrendi','0856','554300' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('277','001024006','毕节地','001024','24','中国/贵州/毕节地','区','3','bjd','bijiedi','0857','551700' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('278','001024007','黔西南','001024','24','中国/贵州/黔西南','州','3','qxn','qianxinan','0859','562400' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('279','001024008','黔东南','001024','24','中国/贵州/黔东南','州','3','qdn','qiandongnan','0855','556000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('280','001024009','黔南','001024','24','中国/贵州/黔南','州','3','qn','qiannan','0854','558000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('281','001025001','昆明','001025','25','中国/云南/昆明','市','3','km','kunming','0871','650011' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('282','001025002','曲靖','001025','25','中国/云南/曲靖','市','3','qj','qujing','0874','655000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('283','001025003','玉溪','001025','25','中国/云南/玉溪','市','3','yx','yuxi','0877','653100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('284','001025004','保山','001025','25','中国/云南/保山','市','3','bs','baoshan','0875','678000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('285','001025005','昭通','001025','25','中国/云南/昭通','市','3','zt','zhaotong','0870','657000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('286','001025006','思茅','001025','25','中国/云南/思茅','地区','3','smd','simaodi','0879','665000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('287','001025007','临沧','001025','25','中国/云南/临沧','地区','3','lcd','lincangdi','0883','677000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('288','001025008','丽江','001025','25','中国/云南/丽江','市','3','lj','lijiang','0888','674100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('289','001025009','文山','001025','25','中国/云南/文山','州','3','ws','wenshan','0876','663000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('290','001025010','红河','001025','25','中国/云南/红河','州','3','hh','honghe','0873','661400' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('291','001025011','西双版纳','001025','25','中国/云南/西双版纳','州','3','xsbn','xishuangban','0691','666100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('292','001025012','楚雄','001025','25','中国/云南/楚雄','州','3','cx','chuxiong','0878','675000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('293','001025013','大理','001025','25','中国/云南/大理','州','3','dl','dali','0872','671000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('294','001025014','德宏','001025','25','中国/云南/德宏','州','3','dh','dehong','0692','678400' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('295','001025015','怒江','001025','25','中国/云南/怒江','州','3','nj','nujiang','0886','673100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('296','001025016','迪庆','001025','25','中国/云南/迪庆','州','3','dq','diqing','0887','674400' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('297','001026001','拉萨','001026','26','中国/西藏/拉萨','市','3','ls','lasa','0891','850012' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('298','001026002','那曲','001026','26','中国/西藏/那曲','地区','3','nqd','naqudi','0896','852000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('299','001026003','昌都','001026','26','中国/西藏/昌都','地区','3','cdd','changdudi','0895','854000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('300','001026004','山南','001026','26','中国/西藏/山南','地区','3','snd','shannandi','0893','856000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('301','001026005','日喀则','001026','26','中国/西藏/日喀则','地区','3','rkzd','rikazedi','0892','857000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('302','001026006','阿里','001026','26','中国/西藏/阿里','地区','3','ald','alidi','0897','859000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('303','001026007','林芝','001026','26','中国/西藏/林芝','地区','3','lzd','linzhidi','0894','860000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('304','001027001','西安','001027','27','中国/陕西/西安','市','3','xa','xian','029','710003' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('305','001027002','铜川','001027','27','中国/陕西/铜川','市','3','tc','tongchuan','0919','727000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('306','001027003','宝鸡','001027','27','中国/陕西/宝鸡','市','3','bj','baoji','0917','721000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('307','001027004','咸阳','001027','27','中国/陕西/咸阳','市','3','xy','xianyang','0910','712000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('308','001027005','渭南','001027','27','中国/陕西/渭南','市','3','wn','weinan','0913','714000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('309','001027006','延安','001027','27','中国/陕西/延安','市','3','ya','yanan','0911','716000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('310','001027007','汉中','001027','27','中国/陕西/汉中','市','3','hz','hanzhong','0916','723000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('311','001027008','榆林','001027','27','中国/陕西/榆林','市','3','yl','yulin','0912','719000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('312','001027009','安康','001027','27','中国/陕西/安康','市','3','ak','ankang','0915','725000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('313','001027010','商洛','001027','27','中国/陕西/商洛','市','3','sl','shangluo','0914','726000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('314','001028001','兰州','001028','28','中国/甘肃/兰州','市','3','lz','lanzhou','0931','730030' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('315','001028002','金昌','001028','28','中国/甘肃/金昌','市','3','jc','jinchang','0935','737100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('316','001028003','白银','001028','28','中国/甘肃/白银','市','3','by','baiyin','0943','730900' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('317','001028004','天水','001028','28','中国/甘肃/天水','市','3','ts','tianshui','0938','741000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('318','001028005','嘉峪关','001028','28','中国/甘肃/嘉峪关','市','3','jyg','jiayuguan','0937','735100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('319','001028006','武威','001028','28','中国/甘肃/武威','市','3','ww','wuwei','0935','733000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('320','001028007','张掖','001028','28','中国/甘肃/张掖','市','3','zy','zhangye','0936','734000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('321','001028008','平凉','001028','28','中国/甘肃/平凉','市','3','pl','pingliang','0933','744000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('322','001028009','酒泉','001028','28','中国/甘肃/酒泉','市','3','jq','jiuquan','0937','735000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('323','001028010','庆阳','001028','28','中国/甘肃/庆阳','市','3','qy','qingyang','0934','745000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('324','001028011','定西','001028','28','中国/甘肃/定西','地区','3','dxd','dingxidi','0932','743000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('325','001028012','陇南','001028','28','中国/甘肃/陇南','地区','3','lnd','longnandi','0935','742500' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('326','001028013','甘南','001028','28','中国/甘肃/甘南','州','3','gn','gannan','0941','747004' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('327','001028014','临夏','001028','28','中国/甘肃/临夏','州','3','lx','linxia','0930','731100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('328','001029001','西宁','001029','29','中国/青海/西宁','市','3','xn','xining','0971','810000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('329','001029002','海东','001029','29','中国/青海/海东','地区','3','hdd','haidongdi','0972','810600' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('330','001029003','海北','001029','29','中国/青海/海北','州','3','hb','haibei','0970','812200' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('331','001029004','黄南','001029','29','中国/青海/黄南','州','3','hn','huangnan','0973','811300' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('332','001029005','海南','001029','29','中国/青海/海南','州','3','hn','hainan','0974','813000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('333','001029006','果洛','001029','29','中国/青海/果洛','州','3','gl','guoluo','0975','814000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('334','001029007','玉树','001029','29','中国/青海/玉树','州','3','ys','yushu','0976','815000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('335','001029008','海西','001029','29','中国/青海/海西','州','3','hx','haixi','0977','817000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('336','001030001','银川','001030','30','中国/宁夏/银川','市','3','yc','yinchuan','0951','750004' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('337','001030002','石嘴山','001030','30','中国/宁夏/石嘴山','市','3','szs','shizuishan','0952','753000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('338','001030003','吴忠','001030','30','中国/宁夏/吴忠','市','3','wz','wuzhong','0953','751100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('339','001030004','固原','001030','30','中国/宁夏/固原','市','3','gy','guyuan','0954','756000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('340','001031001','乌鲁木齐','001031','31','中国/新疆/乌鲁木齐','市','3','wlmq','wulumuqi','0991','830002' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('341','001031002','克拉玛依','001031','31','中国/新疆/克拉玛依','市','3','klmy','kelamayi','0990','834000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('342','001031003','直辖行政单位','001031','31','中国/新疆/直辖行政单位','null','3','zxxzdw','zhixiaxingz','0993','832000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('343','001031004','吐鲁番','001031','31','中国/新疆/吐鲁番','地区','3','tlfd','tulufandi','0995','838000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('344','001031005','哈密','001031','31','中国/新疆/哈密','地区','3','hmd','hamidi','0902','839000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('345','001031006','和田','001031','31','中国/新疆/和田','地区','3','htd','hetiandi','0903','848000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('346','001031007','阿克苏','001031','31','中国/新疆/阿克苏','地区','3','aksd','akesudi','0997','843000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('347','001031008','喀什','001031','31','中国/新疆/喀什','地区','3','ksd','kashidi','0998','844000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('348','001031009','克孜勒苏','001031','31','中国/新疆/克孜勒苏','州','3','kzls','kezilesu','0908','845350' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('349','001031010','巴音郭楞','001031','31','中国/新疆/巴音郭楞','州','3','bygl','bayinguolen','0996','841000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('350','001031011','昌吉','001031','31','中国/新疆/昌吉','州','3','cj','changji','0994','831100' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('351','001031012','博尔塔拉','001031','31','中国/新疆/博尔塔拉','州','3','betl','boertala','0909','833400' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('352','001031013','伊犁','001031','31','中国/新疆/伊犁','州','3','yl','yili','0999','835000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('353','001031014','塔城','001031','31','中国/新疆/塔城','地区','3','tcd','tachengdi','0901','834700' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('354','001031015','阿勒泰','001031','31','中国/新疆/阿勒泰','地区','3','altd','aletaidi','0906','836500' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('355','001009001','上海','001009','9','中国/上海/市辖区','null','3','null','null','020','200000' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('358','001022002','重庆','001022','22','中国/重庆/市','null','3','null','null','null','null' );

insert into `tb_city` (`serialId`,`cityId`,`cityName`,`cityUpId`,`cityUpIdNum`,`cityPath`,`cityType`,`cityTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('360','001002001','天津','001002','2','中国/天津/市','null','3','null','null','null','null' );

insert into `tb_download_category` (`id`,`name`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('1','aaaa','2','D','1','2014-08-12 21:26:18','1','2014-08-17 12:53:02' );

insert into `tb_download_category` (`id`,`name`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('2','PALACOS','1','D','1','2014-08-13 00:39:46','1','2014-08-13 00:43:58' );

insert into `tb_download_category` (`id`,`name`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('3','aaa','0','D','1','2014-08-13 23:10:55','1','2014-08-17 12:29:32' );

insert into `tb_download_category` (`id`,`name`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('4','Palacos Family','1','A','1','2014-08-17 12:42:57','1','2014-08-17 12:42:57' );

insert into `tb_download_category` (`id`,`name`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('5','Osteopal V 脊柱骨水泥','2','A','1','2014-08-17 12:44:51','1','2014-08-17 12:58:33' );

insert into `tb_download_category` (`id`,`name`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('6','骨水泥真空混合系统','3','A','1','2014-08-17 12:46:16','1','2014-08-17 12:58:38' );

insert into `tb_download_category` (`id`,`name`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('7','MAST膜','4','A','1','2014-08-17 12:46:59','1','2014-08-17 13:07:45' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('1','-1','','','0','0','D','1','2014-08-12 02:28:29','1','2014-08-13 00:37:21' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('2','-1','','','0','0','A','1','2014-08-12 02:29:12','1','2014-08-12 02:29:12' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('3','-1','','','0','0','A','1','2014-08-12 21:12:55','1','2014-08-12 21:12:55' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('4','-1','','','0','0','A','1','2014-08-12 21:15:49','1','2014-08-12 21:15:49' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('5','-1','','','0','0','A','1','2014-08-12 21:17:29','1','2014-08-12 21:17:29' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('6','-1','aaaa','14081300023banner1.png','6682','1','A','1','2014-08-12 21:26:13','1','2014-08-13 00:34:39' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('7','-1','','','0','0','A','1','2014-08-12 21:44:12','1','2014-08-12 21:44:12' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('8','-1','','','0','0','A','1','2014-08-12 21:44:13','1','2014-08-12 21:44:13' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('9','-1','','','0','0','A','1','2014-08-12 21:44:13','1','2014-08-12 21:44:13' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('10','-1','','','0','0','A','1','2014-08-12 21:44:14','1','2014-08-12 21:44:14' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('11','-1','','','0','0','A','1','2014-08-12 21:46:43','1','2014-08-12 21:46:43' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('12','-1','','','0','0','A','1','2014-08-12 21:46:45','1','2014-08-12 21:46:45' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('13','-1','','','0','0','A','1','2014-08-12 21:46:47','1','2014-08-12 21:46:47' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('14','-1','','','0','0','A','1','2014-08-12 21:46:48','1','2014-08-12 21:46:48' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('15','-1','','','0','0','A','1','2014-08-12 21:58:00','1','2014-08-12 21:58:00' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('16','-1','','','0','0','A','1','2014-08-12 22:02:30','1','2014-08-12 22:02:30' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('17','-1','','','0','0','A','1','2014-08-12 22:02:30','1','2014-08-12 22:02:30' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('18','-1','','','0','0','A','1','2014-08-12 22:02:46','1','2014-08-12 22:02:46' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('19','-1','','','0','0','A','1','2014-08-12 22:06:25','1','2014-08-12 22:06:25' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('20','-1','','','0','0','A','1','2014-08-12 22:38:34','1','2014-08-12 22:38:34' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('21','-1','','','0','0','A','1','2014-08-12 22:43:00','1','2014-08-12 22:43:00' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('22','-1','','','0','0','A','1','2014-08-12 22:51:58','1','2014-08-12 22:51:58' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('23','-1','','','0','0','A','1','2014-08-12 23:16:24','1','2014-08-12 23:16:24' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('24','-1','','','0','0','A','1','2014-08-12 23:41:18','1','2014-08-12 23:41:18' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('25','-1','','','0','0','A','1','2014-08-13 00:04:52','1','2014-08-13 00:04:52' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('26','-1','','','0','0','A','1','2014-08-13 00:04:52','1','2014-08-13 00:04:52' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('27','-1','','','0','0','A','1','2014-08-13 00:04:53','1','2014-08-13 00:04:53' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('28','-1','','','0','0','A','1','2014-08-13 00:04:53','1','2014-08-13 00:04:53' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('29','-1','','','0','0','A','1','2014-08-13 00:08:00','1','2014-08-13 00:08:00' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('30','-1','','','0','0','A','1','2014-08-13 00:08:01','1','2014-08-13 00:08:01' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('31','-1','','','0','0','A','1','2014-08-13 00:08:02','1','2014-08-13 00:08:02' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('32','-1','','','0','0','A','1','2014-08-13 00:08:02','1','2014-08-13 00:08:02' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('33','-1','','','0','0','A','1','2014-08-13 00:08:23','1','2014-08-13 00:08:23' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('34','-1','','','0','0','A','1','2014-08-13 00:08:24','1','2014-08-13 00:08:24' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('35','-1','','','0','0','A','1','2014-08-13 00:08:24','1','2014-08-13 00:08:24' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('36','-1','','','0','0','A','1','2014-08-13 00:08:25','1','2014-08-13 00:08:25' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('37','-1','','','0','0','A','1','2014-08-13 00:12:37','1','2014-08-13 00:12:37' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('38','-1','','','0','0','A','1','2014-08-13 00:13:13','1','2014-08-13 00:13:13' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('39','-1','','','0','0','A','1','2014-08-13 00:20:44','1','2014-08-13 00:20:44' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('40','-1','','','0','0','A','1','2014-08-13 00:20:45','1','2014-08-13 00:20:45' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('41','-1','','','0','0','A','1','2014-08-13 00:20:45','1','2014-08-13 00:20:45' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('42','-1','','','0','0','A','1','2014-08-13 00:20:46','1','2014-08-13 00:20:46' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('43','-1','','','0','0','A','1','2014-08-13 00:21:15','1','2014-08-13 00:21:15' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('44','-1','','','0','0','A','1','2014-08-13 00:23:18','1','2014-08-13 00:23:18' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('45','-1','','','0','0','A','1','2014-08-13 00:23:33','1','2014-08-13 00:23:33' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('46','-1','','','0','0','A','1','2014-08-13 00:26:55','1','2014-08-13 00:26:55' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('47','-1','eee','14081300003banner1.png','6682','0','A','1','2014-08-13 00:27:01','1','2014-08-13 00:34:39' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('48','-1','ccc','14081300011logo1.png','4380','0','I','1','2014-08-13 00:27:07','1','2014-08-13 00:34:39' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('49','-1','aaa','14081300018banner2.png','8772','0','A','1','2014-08-13 00:27:14','1','2014-08-13 00:34:39' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('50','-1','','','0','0','A','1','2014-08-13 00:38:58','1','2014-08-13 00:38:58' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('51','-1','aaa','14081300024banner1.png','6682','0','A','1','2014-08-13 00:39:20','1','2014-08-13 00:43:38' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('52','-1','bbb','14081300034banner2.png','8772','0','A','1','2014-08-13 00:39:27','1','2014-08-13 00:43:38' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('53','-1','ccc','14081300042ico.png','818','0','A','1','2014-08-13 00:39:38','1','2014-08-13 00:43:38' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('54','3','aa','0','0','0','A','1','2014-08-13 23:10:51','1','2014-08-13 23:10:55' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('55','3','ee','0','0','0','A','1','2014-08-13 23:10:52','1','2014-08-13 23:10:55' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('56','3','cc','0','0','0','A','1','2014-08-13 23:10:54','1','2014-08-13 23:10:55' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('57','4','使用手册','14081712036PALACOS_Family_Folder.pdf','7173027','0','A','1','2014-08-17 12:30:12','1','2014-08-17 12:42:57' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('58','4','Palacos LV 简介','14081712020PALACOS_LV_IFU_CN.pdf','1856772','0','A','1','2014-08-17 12:33:18','1','2014-08-17 12:42:57' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('59','4','Palacos LVG 简介','14081712024PALACOS_LVG_IFU_CN.pdf','1913394','0','A','1','2014-08-17 12:40:04','1','2014-08-17 12:42:57' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('60','4','Palacos MV 简介','14081712002PALACOS_MV_IFU_CN.pdf','2975578','0','A','1','2014-08-17 12:40:44','1','2014-08-17 12:42:57' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('61','4','Palacos MVG 简介','14081712017PALACOS_MVG_IFU_CN.pdf','3043303','0','A','1','2014-08-17 12:41:10','1','2014-08-17 12:42:57' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('62','4','Palacos R 简介','14081712036PALACOS_R_IFU_CN.pdf','3014546','0','A','1','2014-08-17 12:41:25','1','2014-08-17 12:42:57' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('63','4','Palacos RG 简介','14081712003PALACOS_RG_IFU_CN.pdf','1885597','0','A','1','2014-08-17 12:41:40','1','2014-08-17 12:42:57' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('64','4','Palacos 附件','14081712024PALACOS_Primary_Accessories_Folder_UK.pdf','2007346','0','A','1','2014-08-17 12:42:07','1','2014-08-17 12:42:57' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('65','-1','','','0','0','A','1','2014-08-17 12:42:33','1','2014-08-17 12:42:33' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('66','1','Osteopal V 简介','14081712042PRINT_Osteopal.pdf','10503819','0','A','1','2014-08-17 12:44:02','1','2014-08-17 12:52:31' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('67','6','PALAMIX 简介','14081712022PALAMIX_Folder_CN.pdf','9809571','0','A','1','2014-08-17 12:45:04','1','2014-08-17 12:58:38' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('68','6','PALAMIX 使用说明书','14081712059PALAMIX_Guideline_CN_PRINT.pdf','10285096','0','A','1','2014-08-17 12:45:32','1','2014-08-17 12:58:38' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('69','-7','','0','0','0','A','1','2014-08-17 12:46:56','1','2014-08-17 12:58:47' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('70','5','Osteopal V 简介','14081712012PRINT_Osteopal.pdf','10503819','0','A','1','2014-08-17 12:58:07','1','2014-08-17 12:58:34' );

insert into `tb_download_file` (`id`,`category_id`,`name`,`filename`,`length`,`seq`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('71','-1','','','0','0','A','1','2014-08-24 14:39:57','1','2014-08-24 14:39:57' );

insert into `tb_function` (`function_id`,`function_name`,`function_link`,`parent_id`,`function_type`,`function_group`,`seq`,`status` ) values ('1','内容管理','#','1','1','1','1','A' );

insert into `tb_function` (`function_id`,`function_name`,`function_link`,`parent_id`,`function_type`,`function_group`,`seq`,`status` ) values ('2','一般内容','general.php','1','9','1','11','A' );

insert into `tb_function` (`function_id`,`function_name`,`function_link`,`parent_id`,`function_type`,`function_group`,`seq`,`status` ) values ('3','下载中心','download.php','1','9','1','12','A' );

insert into `tb_function` (`function_id`,`function_name`,`function_link`,`parent_id`,`function_type`,`function_group`,`seq`,`status` ) values ('4','新闻中心','news.php','1','9','1','13','A' );

insert into `tb_function` (`function_id`,`function_name`,`function_link`,`parent_id`,`function_type`,`function_group`,`seq`,`status` ) values ('5','伙伴管理','#','5','1','1','14','A' );

insert into `tb_function` (`function_id`,`function_name`,`function_link`,`parent_id`,`function_type`,`function_group`,`seq`,`status` ) values ('6','分区经理','manager.php','5','9','1','15','A' );

insert into `tb_function` (`function_id`,`function_name`,`function_link`,`parent_id`,`function_type`,`function_group`,`seq`,`status` ) values ('7','日常管理','#','7','1','2','2','A' );

insert into `tb_function` (`function_id`,`function_name`,`function_link`,`parent_id`,`function_type`,`function_group`,`seq`,`status` ) values ('8','用户管理','user.php','7','9','7','71','A' );

insert into `tb_function` (`function_id`,`function_name`,`function_link`,`parent_id`,`function_type`,`function_group`,`seq`,`status` ) values ('9','网站管理','website.php','7','9','7','72','A' );

insert into `tb_function` (`function_id`,`function_name`,`function_link`,`parent_id`,`function_type`,`function_group`,`seq`,`status` ) values ('10','供应商管理','partner.php','5','9','1','15','A' );

insert into `tb_function_right` (`function_id`,`right_id`,`id` ) values ('2','2','1' );

insert into `tb_function_right` (`function_id`,`right_id`,`id` ) values ('3','2','2' );

insert into `tb_function_right` (`function_id`,`right_id`,`id` ) values ('3','3','3' );

insert into `tb_function_right` (`function_id`,`right_id`,`id` ) values ('4','2','4' );

insert into `tb_function_right` (`function_id`,`right_id`,`id` ) values ('4','3','5' );

insert into `tb_function_right` (`function_id`,`right_id`,`id` ) values ('10','2','6' );

insert into `tb_function_right` (`function_id`,`right_id`,`id` ) values ('10','3','7' );

insert into `tb_function_right` (`function_id`,`right_id`,`id` ) values ('6','2','8' );

insert into `tb_function_right` (`function_id`,`right_id`,`id` ) values ('6','3','9' );

insert into `tb_function_right` (`function_id`,`right_id`,`id` ) values ('8','2','10' );

insert into `tb_function_right` (`function_id`,`right_id`,`id` ) values ('9','2','11' );

insert into `tb_function_right` (`function_id`,`right_id`,`id` ) values ('9','3','12' );

insert into `tb_manager` (`id`,`chname`,`engname`,`position`,`tel`,`qq`,`email`,`address`,`provinces`,`description`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('1','蔡笋','steve','开发','13751082562','359304951','alucard263096@126.com','广东省深圳市龙岗区怡龙枫景园1栋A座201','Hubei,Guangdong','','','D','1','2014-08-16 12:18:03','1','2014-08-16 12:29:08' );

insert into `tb_manager` (`id`,`chname`,`engname`,`position`,`tel`,`qq`,`email`,`address`,`provinces`,`description`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('2','啊啊啊','','开','1111','','','','Beijing,Tianjin,Hebei,Shaanxi,Mongol,Liaoning,Jilin,Heilongjian,Shanghai,Jiangsu,Zhejiang,Shandong,Henan,Hubei,Hunan,Guangdong,Guangxi,Hainan,Chongqing,Sichuan,Guizhou,Yunnan,Xizang,Qinghai,Ningxia,Xinjiang,Xianggang,Aomen,Taiwan','','','D','1','2014-08-16 12:28:54','1','2014-08-16 12:29:08' );

insert into `tb_manager` (`id`,`chname`,`engname`,`position`,`tel`,`qq`,`email`,`address`,`provinces`,`description`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('3','vvvvv','','aaaaa','1123','','','','Xianggang','','','D','1','2014-08-16 13:22:23','1','2014-08-17 14:30:07' );

insert into `tb_manager` (`id`,`chname`,`engname`,`position`,`tel`,`qq`,`email`,`address`,`provinces`,`description`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('4','周凯歌','Joseph','','18802131899','','','上海市虹口区新市路242号113室','Shanghai,Jiangsu','','','A','1','2014-08-17 14:29:52','1','2014-08-17 14:29:52' );

insert into `tb_manager` (`id`,`chname`,`engname`,`position`,`tel`,`qq`,`email`,`address`,`provinces`,`description`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('5','李春娟','Julie','','13607447390','','','湖南省长沙市湘江世纪城瑞江苑3栋2单元1306室','Hunan','','','A','1','2014-08-17 14:30:50','1','2014-08-17 14:31:01' );

insert into `tb_manager` (`id`,`chname`,`engname`,`position`,`tel`,`qq`,`email`,`address`,`provinces`,`description`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('6','周瑞卿','Ricky','','13707145916','','','武汉市武昌区张之洞路280号欣隆紫苑A-1005室','Jiangxi,Hubei','','','A','1','2014-08-17 14:31:48','1','2014-08-17 14:31:48' );

insert into `tb_manager` (`id`,`chname`,`engname`,`position`,`tel`,`qq`,`email`,`address`,`provinces`,`description`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('7','袁源宏','Kathy','','13980806340','','','四川省成都市成华区建设路53号国光一环大厦1808室','Chongqing,Sichuan','','','A','1','2014-08-17 14:32:29','1','2014-08-17 14:37:46' );

insert into `tb_manager` (`id`,`chname`,`engname`,`position`,`tel`,`qq`,`email`,`address`,`provinces`,`description`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('8','胡慧霞','Angel','','13639929520','','','新疆乌鲁木齐市高新区桂林路92号万泰怡郡小区2号楼17H','Xinjiang','','','A','1','2014-08-17 14:33:00','1','2014-08-17 14:33:00' );

insert into `tb_manager` (`id`,`chname`,`engname`,`position`,`tel`,`qq`,`email`,`address`,`provinces`,`description`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('9','张孝杰','Mark','','18603701235','','','河南省郑州市商城路与英协路交叉口西200米滨河绿苑5号楼3单元10层1001室 ','Hebei,Shaanxi,Henan,Shanxi','','','A','1','2014-08-17 14:33:54','1','2014-08-17 14:33:54' );

insert into `tb_manager` (`id`,`chname`,`engname`,`position`,`tel`,`qq`,`email`,`address`,`provinces`,`description`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('10','赵绍嵩','','','13837145808','','','石家庄市桥东区中山路与休门街汇翠家园2号楼3单元2001室','Hebei','','','A','1','2014-08-17 14:34:11','1','2014-08-17 14:38:04' );

insert into `tb_manager` (`id`,`chname`,`engname`,`position`,`tel`,`qq`,`email`,`address`,`provinces`,`description`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('11','侯彦杰','','','13991845726','','','西安市雁塔区电子正街凯悦华庭1602室','Shanxi','','','A','1','2014-08-17 14:34:43','1','2014-08-17 14:34:43' );

insert into `tb_manager` (`id`,`chname`,`engname`,`position`,`tel`,`qq`,`email`,`address`,`provinces`,`description`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('12','张敬','Jessica','','18660795600','','','山东省济南市天桥区重汽翡翠郡北区7号楼1单元201室','Shandong','','','A','1','2014-08-17 14:35:20','1','2014-08-17 14:35:20' );

insert into `tb_manager` (`id`,`chname`,`engname`,`position`,`tel`,`qq`,`email`,`address`,`provinces`,`description`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('13','饶小平','','','18870071616','','','江西省南昌市青山湖区学院路156号学院名都2栋3单元702室','Jiangxi','','','A','1','2014-08-17 14:35:45','1','2014-08-17 14:35:45' );

insert into `tb_manager` (`id`,`chname`,`engname`,`position`,`tel`,`qq`,`email`,`address`,`provinces`,`description`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('14','黄逸','','','13922160737','','','广州市番禺区大石洛溪新城洛涛居7幢之一308室','Guangdong,Guizhou,Yunnan','','','A','1','2014-08-17 14:36:34','1','2014-08-17 14:36:34' );

insert into `tb_manager` (`id`,`chname`,`engname`,`position`,`tel`,`qq`,`email`,`address`,`provinces`,`description`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('15','张婷','Tina','','15331988207','','','哈尔滨市南岗区宣化街、理治街，天马大厦（金丰·优豪斯）1单元2402室','Liaoning,Jilin,Heilongjiang','','','A','1','2014-08-17 14:37:02','1','2014-08-17 15:37:23' );

insert into `tb_partner` (`id`,`type`,`name`,`logo_file`,`tel`,`fax`,`mobile`,`contacter`,`address`,`city_id`,`coordinate`,`website`,`weixin`,`summary`,`content`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('0','H','1','14081617037ico.png','2','4','3','5','6','1','7','8','9','10','11','12','D','1','2014-08-16 17:09:31','1','2014-08-16 19:17:42' );

insert into `tb_partner` (`id`,`type`,`name`,`logo_file`,`tel`,`fax`,`mobile`,`contacter`,`address`,`city_id`,`coordinate`,`website`,`weixin`,`summary`,`content`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('1','H','雷德睦华医院（上海）','','137111014','','','aaa','上海市人民大道200号','355','121.480285,31.236221','http://','','','非常不错','','D','1','2014-08-16 19:22:54','1','2014-08-16 19:23:59' );

insert into `tb_partner` (`id`,`type`,`name`,`logo_file`,`tel`,`fax`,`mobile`,`contacter`,`address`,`city_id`,`coordinate`,`website`,`weixin`,`summary`,`content`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('2','S','雷德睦华总代理（北京）','14081716012logo1.png','010-58032661 ','010-58032661 ','010-58032661 ','陈先生','北京市丰台区马家堡东路106号自然新天地写字楼606室','1','116.393463,39.847131','http://','','','暂无详情','','A','1','2014-08-17 16:10:02','1','2014-08-17 16:10:02' );

insert into `tb_partner` (`id`,`type`,`name`,`logo_file`,`tel`,`fax`,`mobile`,`contacter`,`address`,`city_id`,`coordinate`,`website`,`weixin`,`summary`,`content`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('3','H','雷德睦华医院（上海）','14081716011logo1.png','020-5002200','020-5002200','020-5002200','林先生','上海市人民大道200号','355','121.480262,31.236238','http://','','','暂无详情','','A','1','2014-08-17 16:10:54','1','2014-08-17 16:13:56' );

insert into `tb_partner` (`id`,`type`,`name`,`logo_file`,`tel`,`fax`,`mobile`,`contacter`,`address`,`city_id`,`coordinate`,`website`,`weixin`,`summary`,`content`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('4','D','雷德睦华医生（深圳）','','0755-25578945','0755-25578945','0755-25578945','蔡先生','深圳市罗湖区文锦中路1008号罗湖管理中心大厦','214','114.138108,22.554558','','','','暂无详情','','A','1','2014-08-17 16:12:13','1','2014-08-17 16:12:13' );

insert into `tb_partner` (`id`,`type`,`name`,`logo_file`,`tel`,`fax`,`mobile`,`contacter`,`address`,`city_id`,`coordinate`,`website`,`weixin`,`summary`,`content`,`remark`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('5','S','雷德睦华代理（长沙）','14081716025logo1.png','0731-889999176','0731-889999176','0731-889999176','王小姐','长沙市芙蓉区人民东路189号','199','113.002354,28.191841','','','','暂无详情','','A','1','2014-08-17 16:13:13','1','2014-08-17 16:13:13' );

insert into `tb_partner_type` (`code`,`name`,`status` ) values ('D','医生','A' );

insert into `tb_partner_type` (`code`,`name`,`status` ) values ('H','医疗机构','A' );

insert into `tb_partner_type` (`code`,`name`,`status` ) values ('S','供应商','A' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('1','001001','北京市','001','0','中国/北京','市','2','bj','Beijing','010','100000' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('2','001002','天津市','001','0','中国/天津','市','2','tj','Tianjin','022','300000' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('3','001003','河北省','001','0','中国/河北','省','2','hb','Hebei','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('4','001004','山西省','001','0','中国/山西','省','2','sx','Shaanxi','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('5','001005','内蒙古自治区','001','0','中国/内蒙古','自治区','2','nmg','Mongol','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('6','001006','辽宁省','001','0','中国/辽宁','省','2','ln','Liaoning','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('7','001007','吉林省','001','0','中国/吉林','省','2','jl','Jilin','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('8','001008','黑龙江省','001','0','中国/黑龙江','省','2','hlj','Heilongjiang','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('9','001009','上海市','001','0','中国/上海','市','2','sh','Shanghai','021','200000' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('10','001010','江苏省','001','0','中国/江苏','省','2','js','Jiangsu','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('11','001011','浙江省','001','0','中国/浙江','省','2','zj','Zhejiang','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('12','001012','安徽省','001','0','中国/安徽','省','2','ah','Anhui','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('13','001013','福建省','001','0','中国/福建','省','2','fj','Fujian','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('14','001014','江西省','001','0','中国/江西','省','2','jx','Jiangxi','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('15','001015','山东省','001','0','中国/山东','省','2','sd','Shandong','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('16','001016','河南省','001','0','中国/河南','省','2','hn','Henan','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('17','001017','湖北省','001','0','中国/湖北','省','2','hb','Hubei','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('18','001018','湖南省','001','0','中国/湖南','省','2','hn','Hunan','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('19','001019','广东省','001','0','中国/广东','省','2','gd','Guangdong','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('20','001020','广西省','001','0','中国/广西','壮族自治区','2','gx','Guangxi','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('21','001021','海南省','001','0','中国/海南','省','2','hn','Hainan','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('22','001022','重庆市','001','0','中国/重庆','市','2','cq','Chongqing','023','400000' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('23','001023','四川省','001','0','中国/四川','省','2','sc','Sichuan','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('24','001024','贵州省','001','0','中国/贵州','省','2','gz','Guizhou','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('25','001025','云南省','001','0','中国/云南','省','2','yn','Yunnan','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('26','001026','西藏自治区','001','0','中国/西藏','自治区','2','xc','Xizang','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('27','001027','陕西省','001','0','中国/陕西','省','2','sx','Shanxi','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('28','001028','甘肃省','001','0','中国/甘肃','省','2','gs','Gansu','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('29','001029','青海省','001','0','中国/青海','省','2','qh','Qinghai','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('30','001030','宁夏回族自治区','001','0','中国/宁夏','回族自治区','2','nx','Ningxia','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('31','001031','新疆维吾尔自治区','001','0','中国/新疆','维吾尔自治区','2','xj','Xinjiang','null','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('32','001032','香港特别行政区','001','0','中国/香港','特别行政区','2','xg','Xianggang','852','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('33','001033','澳门特别行政区','001','0','中国/澳门','特别行政区','2','am','Aomen','853','null' );

insert into `tb_province` (`serialId`,`provinceId`,`provinceName`,`provinceUpId`,`provinceUpIdNum`,`provincePath`,`provinceType`,`provinceTypeNum`,`shortName`,`spell`,`areaId`,`postCode` ) values ('34','001034','台湾省','001','0','中国/台湾','省','2','tw','Taiwan','886','null' );

insert into `tb_seq` (`table_name`,`curval` ) values ('tb_user','42' );

insert into `tb_seq` (`table_name`,`curval` ) values ('tb_download_category','1' );

insert into `tb_seq` (`table_name`,`curval` ) values ('tb_download_file','2' );

insert into `tb_user` (`user_id`,`login_id`,`password`,`user_name`,`email`,`remarks`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('1','admin','e19d5cd5af0378da05f63f891c7467af','System Administrator','info@i4deas.com','','A','1','2011-02-07 17:26:55','1','2014-07-06 21:23:12' );

insert into `tb_user` (`user_id`,`login_id`,`password`,`user_name`,`email`,`remarks`,`status`,`created_user`,`created_date`,`updated_user`,`updated_date` ) values ('2','jessy.lin','d41d8cd98f00b204e9800998ecf8427e','林汉婷','jessy.lin@ldmhgp.com','','A','1','2014-08-09 10:28:31','1','2014-08-24 14:37:01' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('1','2','2','1','2014-07-06 21:23:12' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('1','3','2','1','2014-07-06 21:23:12' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('1','3','3','1','2014-07-06 21:23:12' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('1','4','2','1','2014-07-06 21:23:12' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('1','4','3','1','2014-07-06 21:23:12' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('1','10','2','1','2014-07-06 21:23:12' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('1','10','3','1','2014-07-06 21:23:12' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('1','6','2','1','2014-07-06 21:23:12' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('1','6','3','1','2014-07-06 21:23:12' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('1','8','2','1','2014-07-06 21:23:12' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('1','8','3','1','2014-07-06 21:23:12' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('1','9','2','1','2014-07-06 21:23:12' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('2','2','2','1','2014-08-09 10:54:08' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('2','3','2','1','2014-08-09 10:54:08' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('2','3','3','1','2014-08-09 10:54:08' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('2','4','2','1','2014-08-09 10:54:08' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('2','4','3','1','2014-08-09 10:54:08' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('2','10','2','1','2014-08-09 10:54:08' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('2','10','3','1','2014-08-09 10:54:08' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('2','6','2','1','2014-08-09 10:54:08' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('2','6','3','1','2014-08-09 10:54:08' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('2','8','2','1','2014-08-09 10:54:08' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('2','9','2','1','2014-08-09 10:54:08' );

insert into `tb_user_access_right` (`user_id`,`function_id`,`right_id`,`created_user`,`created_date` ) values ('2','9','3','1','2014-08-09 10:54:08' );

insert into `tb_user_function` (`user_id`,`function_id`,`status`,`created_user`,`created_date` ) values ('1','2','A','1','2014-07-06 21:23:12' );

insert into `tb_user_function` (`user_id`,`function_id`,`status`,`created_user`,`created_date` ) values ('1','3','A','1','2014-07-06 21:23:12' );

insert into `tb_user_function` (`user_id`,`function_id`,`status`,`created_user`,`created_date` ) values ('1','4','A','1','2014-07-06 21:23:12' );

insert into `tb_user_function` (`user_id`,`function_id`,`status`,`created_user`,`created_date` ) values ('1','10','A','1','2014-07-06 21:23:12' );

insert into `tb_user_function` (`user_id`,`function_id`,`status`,`created_user`,`created_date` ) values ('1','6','A','1','2014-07-06 21:23:12' );

insert into `tb_user_function` (`user_id`,`function_id`,`status`,`created_user`,`created_date` ) values ('1','8','A','1','2014-07-06 21:23:12' );

insert into `tb_user_function` (`user_id`,`function_id`,`status`,`created_user`,`created_date` ) values ('1','9','A','1','2014-07-06 21:23:12' );

insert into `tb_user_function` (`user_id`,`function_id`,`status`,`created_user`,`created_date` ) values ('2','2','A','1','2014-08-09 10:54:08' );

insert into `tb_user_function` (`user_id`,`function_id`,`status`,`created_user`,`created_date` ) values ('2','3','A','1','2014-08-09 10:54:08' );

insert into `tb_user_function` (`user_id`,`function_id`,`status`,`created_user`,`created_date` ) values ('2','4','A','1','2014-08-09 10:54:08' );

insert into `tb_user_function` (`user_id`,`function_id`,`status`,`created_user`,`created_date` ) values ('2','10','A','1','2014-08-09 10:54:08' );

insert into `tb_user_function` (`user_id`,`function_id`,`status`,`created_user`,`created_date` ) values ('2','6','A','1','2014-08-09 10:54:08' );

insert into `tb_user_function` (`user_id`,`function_id`,`status`,`created_user`,`created_date` ) values ('2','8','A','1','2014-08-09 10:54:08' );

insert into `tb_user_function` (`user_id`,`function_id`,`status`,`created_user`,`created_date` ) values ('2','9','A','1','2014-08-09 10:54:08' );

insert into `tb_website_base` (`website_name`,`favfile`,`contacter`,`qq`,`email`,`mobile`,`phone`,`address`,`seo_title`,`seo_keywords`,`seo_description` ) values ('','favicon.ico','Jerry Li','','','','','','','','' );

 
";
 
 
 $sa=explode(";",$sql);
 $dbmgr->begin_trans();
 foreach ($sa as $value){
 	if(trim($value)!=""){
 		$query=$dbmgr->query($value);
 	}
 }
 $dbmgr->commit_trans();
 
// for($i=0;$i<count($array);$i++)
// {
// 	$id=$array[$i]["id"];
// 	$name=$array[$i]["name"];
// 	$position=$array[$i]["position"];
// 
// 	$sql="update tb_general set name='$name',position='$position'" .
// 			" where id=$id";
// 
//    
// 
// }
// 
 
 
?>