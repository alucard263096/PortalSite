-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	6.0.11-alpha-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO,ANSI_QUOTES,MYSQL323' */;


USE portalsite_lm;

--
-- Dumping data for table "portalsite_lm"."tb_access_right"
--

/*!40000 ALTER TABLE "tb_access_right" DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO "portalsite_lm"."tb_access_right" ("right_id","name","seq") VALUES 
  (2,'Edit',2);
INSERT INTO "portalsite_lm"."tb_access_right" ("right_id","name","seq") VALUES 
  (3,'Delete',3);
COMMIT;
/*!40000 ALTER TABLE "tb_access_right" ENABLE KEYS */;


--
-- Dumping data for table "portalsite_lm"."tb_function"
--

/*!40000 ALTER TABLE "tb_function" DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO "portalsite_lm"."tb_function" ("function_id","function_name","function_link","parent_id","function_type","function_group","seq","status") VALUES 
  (1,'内容管理','#',1,1,1,1,'A');
INSERT INTO "portalsite_lm"."tb_function" ("function_id","function_name","function_link","parent_id","function_type","function_group","seq","status") VALUES 
  (2,'关于我们','about_us.php',1,9,1,11,'A');
INSERT INTO "portalsite_lm"."tb_function" ("function_id","function_name","function_link","parent_id","function_type","function_group","seq","status") VALUES 
  (3,'联系我们','contact_us.php',1,9,1,12,'A');
INSERT INTO "portalsite_lm"."tb_function" ("function_id","function_name","function_link","parent_id","function_type","function_group","seq","status") VALUES 
  (4,'招聘信息','employee.php',1,9,1,13,'A');
INSERT INTO "portalsite_lm"."tb_function" ("function_id","function_name","function_link","parent_id","function_type","function_group","seq","status") VALUES 
  (5,'合作伙伴','partner.php',1,9,1,14,'A');
INSERT INTO "portalsite_lm"."tb_function" ("function_id","function_name","function_link","parent_id","function_type","function_group","seq","status") VALUES 
  (6,'产品管理','product_list.php',1,9,1,15,'A');
INSERT INTO "portalsite_lm"."tb_function" ("function_id","function_name","function_link","parent_id","function_type","function_group","seq","status") VALUES 
  (7,'日常管理','#',7,1,2,2,'A');
INSERT INTO "portalsite_lm"."tb_function" ("function_id","function_name","function_link","parent_id","function_type","function_group","seq","status") VALUES 
  (8,'用户管理','user.php',7,9,7,71,'A');
COMMIT;
/*!40000 ALTER TABLE "tb_function" ENABLE KEYS */;


--
-- Dumping data for table "portalsite_lm"."tb_function_right"
--

/*!40000 ALTER TABLE "tb_function_right" DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO "portalsite_lm"."tb_function_right" ("function_id","right_id","id") VALUES 
  (2,2,1);
INSERT INTO "portalsite_lm"."tb_function_right" ("function_id","right_id","id") VALUES 
  (2,3,2);
INSERT INTO "portalsite_lm"."tb_function_right" ("function_id","right_id","id") VALUES 
  (3,2,3);
INSERT INTO "portalsite_lm"."tb_function_right" ("function_id","right_id","id") VALUES 
  (3,3,4);
INSERT INTO "portalsite_lm"."tb_function_right" ("function_id","right_id","id") VALUES 
  (4,2,5);
INSERT INTO "portalsite_lm"."tb_function_right" ("function_id","right_id","id") VALUES 
  (4,3,6);
INSERT INTO "portalsite_lm"."tb_function_right" ("function_id","right_id","id") VALUES 
  (5,2,7);
INSERT INTO "portalsite_lm"."tb_function_right" ("function_id","right_id","id") VALUES 
  (5,3,8);
INSERT INTO "portalsite_lm"."tb_function_right" ("function_id","right_id","id") VALUES 
  (6,2,9);
INSERT INTO "portalsite_lm"."tb_function_right" ("function_id","right_id","id") VALUES 
  (6,3,10);
INSERT INTO "portalsite_lm"."tb_function_right" ("function_id","right_id","id") VALUES 
  (8,1,14);
INSERT INTO "portalsite_lm"."tb_function_right" ("function_id","right_id","id") VALUES 
  (8,2,15);
INSERT INTO "portalsite_lm"."tb_function_right" ("function_id","right_id","id") VALUES 
  (8,3,16);
COMMIT;
/*!40000 ALTER TABLE "tb_function_right" ENABLE KEYS */;


--
-- Dumping data for table "portalsite_lm"."tb_seq"
--

/*!40000 ALTER TABLE "tb_seq" DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO "portalsite_lm"."tb_seq" ("table_name","curval") VALUES 
  ('tb_user',42);
INSERT INTO "portalsite_lm"."tb_seq" ("table_name","curval") VALUES 
  ('tb_usera',1);
COMMIT;
/*!40000 ALTER TABLE "tb_seq" ENABLE KEYS */;


--
-- Dumping data for table "portalsite_lm"."tb_user"
--

/*!40000 ALTER TABLE "tb_user" DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (1,'admin','e19d5cd5af0378da05f63f891c7467af','System Administrator','info@i4deas.com','','A',1,'2011-02-07 17:26:55',1,'2014-07-06 21:23:12');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (19,'a','e19d5cd5af0378da05f63f891c7467af','a','aasdasd','a','D',1,'2011-02-09 02:58:06',1,'2011-02-09 20:14:11');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (20,'vvv','e19d5cd5af0378da05f63f891c7467af','','','','D',1,'2011-02-09 03:00:53',1,'2011-02-09 20:11:30');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (26,'aaa','e19d5cd5af0378da05f63f891c7467af','','','','D',1,'2011-02-09 03:04:09',1,'2011-02-09 20:11:30');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (32,'aaaa','e19d5cd5af0378da05f63f891c7467af','','','','D',1,'2011-02-09 03:04:53',1,'2011-02-09 20:13:09');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (39,'z','e19d5cd5af0378da05f63f891c7467af','','','','D',1,'2011-02-09 03:06:52',1,'2011-02-09 03:06:52');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (43,'zz','e19d5cd5af0378da05f63f891c7467af','','','','D',1,'2011-02-09 03:09:31',1,'2011-02-09 03:19:31');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (44,'vvvvv','e19d5cd5af0378da05f63f891c7467af','','','','D',1,'2011-02-09 03:22:42',1,'2011-02-09 03:22:42');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (45,'asdasd','e19d5cd5af0378da05f63f891c7467af','asdasd','asdasd','','D',1,'2011-02-09 03:51:42',1,'2011-02-09 20:13:09');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (46,'asdasdasd','e19d5cd5af0378da05f63f891c7467af','asdasd','asdasd','','D',1,'2011-02-09 03:52:13',1,'2011-02-09 20:11:43');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (47,'cccc','e19d5cd5af0378da05f63f891c7467af','','','','D',1,'2011-02-09 03:52:33',1,'2011-02-09 20:11:43');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (48,'zzz','e19d5cd5af0378da05f63f891c7467af','','','','D',1,'2011-02-09 03:53:51',1,'2011-02-09 20:11:43');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (49,'xxxx','e19d5cd5af0378da05f63f891c7467af','','','bbbbbbbbbbbb','D',1,'2011-02-09 03:54:04',1,'2011-02-09 20:11:43');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (50,'xxxxx','e19d5cd5af0378da05f63f891c7467af','','','','D',1,'2011-02-09 03:55:45',1,'2011-02-09 20:11:43');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (51,'xxxxxxxxxxx','e19d5cd5af0378da05f63f891c7467af','','','','D',1,'2011-02-09 03:55:54',1,'2011-02-09 20:12:54');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (52,'xxxxxx','e19d5cd5af0378da05f63f891c7467af','','','','D',1,'2011-02-09 03:56:32',1,'2011-02-09 20:14:08');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (53,'xxxxxxx','e19d5cd5af0378da05f63f891c7467af','','','','D',1,'2011-02-09 03:57:25',1,'2011-02-09 20:13:03');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (54,'ccccc','e19d5cd5af0378da05f63f891c7467af','','','','D',1,'2011-02-09 03:57:31',1,'2011-02-09 20:14:01');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (55,'cccccccccc','e19d5cd5af0378da05f63f891c7467af','','','','D',1,'2011-02-09 20:13:28',1,'2011-02-09 20:13:35');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (56,'c111','e19d5cd5af0378da05f63f891c7467af','System User','info@i4deas.com','','A',1,'2011-02-15 23:00:55',1,'2011-02-25 17:33:45');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (57,'casasd','e19d5cd5af0378da05f63f891c7467af','','asdasd','asdasdasd','A',1,'2011-02-15 23:01:50',1,'2011-02-15 23:01:50');
INSERT INTO "portalsite_lm"."tb_user" ("user_id","login_id","password","user_name","email","remarks","status","created_user","created_date","updated_user","updated_date") VALUES 
  (58,'Ã¦Âµâ€¹Ã¨Â¯â','e19d5cd5af0378da05f63f891c7467af','','','','A',1,'2011-04-10 11:15:24',1,'2011-04-10 11:15:24');
COMMIT;
/*!40000 ALTER TABLE "tb_user" ENABLE KEYS */;


--
-- Dumping data for table "portalsite_lm"."tb_user_access_right"
--

/*!40000 ALTER TABLE "tb_user_access_right" DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO "portalsite_lm"."tb_user_access_right" ("user_id","function_id","right_id","created_user","created_date") VALUES 
  (1,2,2,1,'2014-07-06 21:23:12');
INSERT INTO "portalsite_lm"."tb_user_access_right" ("user_id","function_id","right_id","created_user","created_date") VALUES 
  (1,2,3,1,'2014-07-06 21:23:12');
INSERT INTO "portalsite_lm"."tb_user_access_right" ("user_id","function_id","right_id","created_user","created_date") VALUES 
  (1,3,2,1,'2014-07-06 21:23:12');
INSERT INTO "portalsite_lm"."tb_user_access_right" ("user_id","function_id","right_id","created_user","created_date") VALUES 
  (1,3,3,1,'2014-07-06 21:23:12');
INSERT INTO "portalsite_lm"."tb_user_access_right" ("user_id","function_id","right_id","created_user","created_date") VALUES 
  (1,4,2,1,'2014-07-06 21:23:12');
INSERT INTO "portalsite_lm"."tb_user_access_right" ("user_id","function_id","right_id","created_user","created_date") VALUES 
  (1,4,3,1,'2014-07-06 21:23:12');
INSERT INTO "portalsite_lm"."tb_user_access_right" ("user_id","function_id","right_id","created_user","created_date") VALUES 
  (1,5,2,1,'2014-07-06 21:23:12');
INSERT INTO "portalsite_lm"."tb_user_access_right" ("user_id","function_id","right_id","created_user","created_date") VALUES 
  (1,5,3,1,'2014-07-06 21:23:12');
INSERT INTO "portalsite_lm"."tb_user_access_right" ("user_id","function_id","right_id","created_user","created_date") VALUES 
  (1,6,2,1,'2014-07-06 21:23:12');
INSERT INTO "portalsite_lm"."tb_user_access_right" ("user_id","function_id","right_id","created_user","created_date") VALUES 
  (1,6,3,1,'2014-07-06 21:23:12');
INSERT INTO "portalsite_lm"."tb_user_access_right" ("user_id","function_id","right_id","created_user","created_date") VALUES 
  (1,8,2,1,'2014-07-06 21:23:12');
INSERT INTO "portalsite_lm"."tb_user_access_right" ("user_id","function_id","right_id","created_user","created_date") VALUES 
  (1,8,3,1,'2014-07-06 21:23:12');
COMMIT;
/*!40000 ALTER TABLE "tb_user_access_right" ENABLE KEYS */;


--
-- Dumping data for table "portalsite_lm"."tb_user_function"
--

/*!40000 ALTER TABLE "tb_user_function" DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO "portalsite_lm"."tb_user_function" ("user_id","function_id","status","created_user","created_date") VALUES 
  (1,2,'A',1,'2014-07-06 21:23:12');
INSERT INTO "portalsite_lm"."tb_user_function" ("user_id","function_id","status","created_user","created_date") VALUES 
  (1,3,'A',1,'2014-07-06 21:23:12');
INSERT INTO "portalsite_lm"."tb_user_function" ("user_id","function_id","status","created_user","created_date") VALUES 
  (1,4,'A',1,'2014-07-06 21:23:12');
INSERT INTO "portalsite_lm"."tb_user_function" ("user_id","function_id","status","created_user","created_date") VALUES 
  (1,5,'A',1,'2014-07-06 21:23:12');
INSERT INTO "portalsite_lm"."tb_user_function" ("user_id","function_id","status","created_user","created_date") VALUES 
  (1,6,'A',1,'2014-07-06 21:23:12');
INSERT INTO "portalsite_lm"."tb_user_function" ("user_id","function_id","status","created_user","created_date") VALUES 
  (1,8,'A',1,'2014-07-06 21:23:12');
COMMIT;
/*!40000 ALTER TABLE "tb_user_function" ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
