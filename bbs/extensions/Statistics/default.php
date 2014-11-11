<?php
/*
Extension Name: 论坛统计
Extension Url: http://www.weentech.com/bbs/
Description: 此插件启用后, 将在首页显示论坛统计数据.
Version: 2.0
Author: 闻泰网络
Author Url: http://www.weentech.com/
Extension Key: Statistics
*/

$Context->SetDefinition("Statistics",                            "论坛统计:");
$Context->SetDefinition("StatisticsSetting",                            "论坛统计设置");
$Context->SetDefinition("ResetStatistics",                            "重设论坛统计设置");
$Context->SetDefinition("StatisticsReset",                       " 重设 ");
$Context->SetDefinition("Statistic_categories",                  "版块数");
$Context->SetDefinition("Statistic_discussions",                 "主题数");
$Context->SetDefinition("Statistic_comments",                    "帖子数");
$Context->SetDefinition("Statistic_users",                       "会员数");
$Context->SetDefinition("Statistic_most_active_users",           "最活跃会员");
$Context->SetDefinition("Statistic_most_active_users_2",         "访问次数: ");
$Context->SetDefinition("Statistic_most_active_users_3",         "");
$Context->SetDefinition("Statistic_newest_user",                 "最新注册");
$Context->SetDefinition("Statistic_top_posting_user",            "发帖最多会员");
$Context->SetDefinition("Statistic_top_posting_user_2",          "共 ");
$Context->SetDefinition("Statistic_top_posting_user_3",          " 个帖子");
$Context->SetDefinition("Statistic_top_discussion_starter",      "主题最多会员");
$Context->SetDefinition("Statistic_top_discussion_starter_2",    "共 ");
$Context->SetDefinition("Statistic_top_discussion_starter_3",    " 个主题");
$Context->SetDefinition("Statistic_posts_in_the_last_24_hours",  "最近24小时发帖数");
$Context->SetDefinition("StatisticInformation",                  "当论坛数据发生变化后, 最新统计结果将在5分钟后更新. 每次设置后将立即更新统计数据.");
$Context->SetDefinition("Statistic_ResetCaption",                "重设后, 论坛统计设置将恢复到初始状态, 且立即更新统计数据.");
$Context->SetDefinition("Statistic_GlobalOptions_0",             "所有用户组均可见");
$Context->SetDefinition("Statistic_GlobalOptions_1",             "所有用户组均不可见");
$Context->SetDefinition("Statistic_GlobalOptions_2",             "仅注册会员可见");
$Context->SetDefinition("Statistic_Notice_1",                    "统计设置重设成功");
$Context->SetDefinition("Statistic_Notice_2",                    "统计设置保存更新成功");
$Context->SetDefinition("Statistic_NumberOfRows",               "显示行数:");



$TheseArePeople = Array('newest_user', 'top_posting_user', 'top_discussion_starter', 'most_active_users');
$GlobalKey = ' => ';

include("Framework.Functions.php");

class Statistics extends PostBackControl {
  var $Statistics = Array();
  var $StatisticsFile;
  var $StatisticsSQL = Array();
  var $StatisticDisplay;
  var $Now;
  var $BackColour;
  var $Reset = false;
  var $CacheTime;
  var $GlobalOptions;
  var $UserID;
  var $Notice;


  function GetStatistics() {
    global $GlobalKey;

    $this->StatisticsFile    = file($this->Context->Configuration['EXTENSIONS_PATH']."Statistics/options.inc");
    $this->StatisticsFile[0] = explode($GlobalKey, $this->StatisticsFile[0]);
    $this->CacheTime         = $this->StatisticsFile[0][0];
    $this->GlobalOptions     = strval($this->StatisticsFile[0][1]);
    unset($this->StatisticsFile[0]);

    foreach($this->StatisticsFile AS $data) {
	  $data = explode($GlobalKey, $data);
	  $this->Statistics[$data[0]] = Array();
	  foreach($data AS $extraData) {
	    if($extraData != $data[0]) $this->Statistics[$data[0]][] = $extraData;
	  }
	}
	unset($this->StatisticsFile);
  }

  function SaveStatistics($Update = false) {
    global $GlobalKey;

    if($this->Reset == true) {
	  $this->StatisticsFile = "0".$GlobalKey."0\ncategories".$GlobalKey."1".$GlobalKey."0".$GlobalKey."0\ndiscussions".$GlobalKey."1".$GlobalKey."0".$GlobalKey."0\ncomments".$GlobalKey."1".$GlobalKey."0".$GlobalKey."0\nusers".$GlobalKey."1".$GlobalKey."0".$GlobalKey."0\nnewest_user".$GlobalKey."1".$GlobalKey."0".$GlobalKey."0\nposts_in_the_last_24_hours".$GlobalKey."1".$GlobalKey."0".$GlobalKey."0\ntop_posting_user".$GlobalKey."1".$GlobalKey."1".$GlobalKey."0\ntop_discussion_starter".$GlobalKey."1".$GlobalKey."2".$GlobalKey."0\nmost_active_users".$GlobalKey."1".$GlobalKey."3".$GlobalKey."0";
    } else {
      if($Update == true) $this->GlobalOptions = ForceIncomingString("GlobalOptions", "");
	  $this->StatisticsFile = str_replace("\n", "", ($Update ? $this->Now: ($this->Now+300)).$GlobalKey.$this->GlobalOptions)."\n";
      foreach($this->Statistics AS $key => $data) {
        if($Update == true) {
		  $data[0] = (ForceIncomingString("chkStatistic_".$key, "") == 0) ? "0" : "1";
		  $txt = ForceIncomingString("txtStatistic_".$key."_rows", "");
		  $data[1] = ($txt == 0 || !is_numeric($txt)) ? "0" : $txt;
		}
        if($data != $this->CacheTime && is_Array($data)) $this->StatisticsFile .= str_replace("\n", "", $key.$GlobalKey.implode($GlobalKey, $data))."\n";
	  }
	}
	if(file_exists($this->Context->Configuration['EXTENSIONS_PATH']."Statistics/options.inc")) @unlink($this->Context->Configuration['EXTENSIONS_PATH']."Statistics/options.inc");
    if($link = @fopen($this->Context->Configuration['EXTENSIONS_PATH']."Statistics/options.inc", "w")) {
      fwrite($link, $this->StatisticsFile);
      fclose($link);
      @chmod($this->Context->Configuration['EXTENSIONS_PATH']."Statistics/options.inc", 0666);
    }
    unset($this->StatisticsFile);
  }

  function DefineSQL() {
    // These definitions have been made because of a very strange error...
    $USER_TABLE = (isset($this->Context->DatabaseTables['User'])) ? $this->Context->DatabaseTables['User'] : $Context->DatabaseTables['User'];
    $USERID = (isset($this->Context->DatabaseColumns['User']['UserID'])) ? $this->Context->DatabaseColumns['User']['UserID'] : $Context->DatabaseColumns['CategoryBlock']['UserID'];
    $USERNAME = (isset($this->Context->DatabaseColumns['User']['Name'])) ? $this->Context->DatabaseColumns['User']['Name'] : $Context->DatabaseColumns['User']['Name'];
    $this->StatisticsSQL['categories']             = "SELECT count(".$this->Context->Configuration['DATABASE_TABLE_PREFIX'].$this->Context->DatabaseTables['Category'].".".$this->Context->DatabaseColumns['Category']['CategoryID'].") AS categories FROM `".$this->Context->Configuration['DATABASE_TABLE_PREFIX'].$this->Context->DatabaseTables['Category']."`;";
    $this->StatisticsSQL['discussions']            = "SELECT count(".$this->Context->Configuration['DATABASE_TABLE_PREFIX'].$this->Context->DatabaseTables['Discussion'].".".$this->Context->DatabaseColumns['Comment']['DiscussionID'].") AS discussions FROM `".$this->Context->Configuration['DATABASE_TABLE_PREFIX'].$this->Context->DatabaseTables['Discussion']."`;";
    $this->StatisticsSQL['comments']               = "SELECT count(".$this->Context->Configuration['DATABASE_TABLE_PREFIX'].$this->Context->DatabaseTables['Comment'].".".$this->Context->DatabaseColumns['Comment']['CommentID'].") AS comments FROM `".$this->Context->Configuration['DATABASE_TABLE_PREFIX'].$this->Context->DatabaseTables['Comment']."`;";
    $this->StatisticsSQL['users']                  = "SELECT count(".$this->Context->DatabaseTables['User'].".".$this->Context->DatabaseColumns['CategoryBlock']['UserID'].") AS users FROM `".$this->Context->DatabaseTables['User']."`;";
    $this->StatisticsSQL['newest_user']            = "SELECT ".$USER_TABLE.".".$USERNAME." FROM `".$USER_TABLE."` ORDER BY ".$USERID." DESC LIMIT 0 , 1";
    $this->StatisticsSQL['top_posting_user']       = "SELECT ".$this->Context->DatabaseTables['User'].".".$this->Context->DatabaseColumns['User']['Name'].", (".$this->Context->DatabaseTables['User'].".".$this->Context->DatabaseColumns['User']['CountComments']." + ".$this->Context->DatabaseTables['User'].".".$this->Context->DatabaseColumns['User']['CountDiscussions'].") FROM `".$this->Context->DatabaseTables['User']."` ORDER BY (".$this->Context->DatabaseTables['User'].".".$this->Context->DatabaseColumns['User']['CountComments']." + ".$this->Context->DatabaseTables['User'].".".$this->Context->DatabaseColumns['User']['CountDiscussions'].") DESC LIMIT ".$this->Statistics['top_posting_user'][1].";";
    $this->StatisticsSQL['top_discussion_starter'] = "SELECT ".$this->Context->DatabaseTables['User'].".".$this->Context->DatabaseColumns['User']['Name'].", ".$this->Context->DatabaseTables['User'].".".$this->Context->DatabaseColumns['User']['CountDiscussions']." FROM `".$this->Context->DatabaseTables['User']."` ORDER BY ".$this->Context->DatabaseTables['User'].".".$this->Context->DatabaseColumns['User']['CountDiscussions']." DESC LIMIT ".$this->Statistics['top_discussion_starter'][1].";";
    $this->StatisticsSQL['posts_in_the_last_24_hours'] = "SELECT count(*) FROM `".$this->Context->Configuration['DATABASE_TABLE_PREFIX'].$this->Context->DatabaseTables['Comment']."` WHERE DATE_SUB(NOW(),INTERVAL 1 DAY) <= ".$this->Context->Configuration['DATABASE_TABLE_PREFIX'].$this->Context->DatabaseTables['Comment'].".".$this->Context->DatabaseColumns['Comment']['DateCreated'].";";
    $this->StatisticsSQL['most_active_users']      = "SELECT ".$USER_TABLE.".".$USERNAME.", ".$USER_TABLE.".".$this->Context->DatabaseColumns['User']['CountVisit']." FROM `".$USER_TABLE."` ORDER BY ".$USER_TABLE.".".$this->Context->DatabaseColumns['User']['CountVisit']." DESC LIMIT ".$this->Statistics['most_active_users'][1].";";
  }

  function ExcecuteSQL() {
    foreach($this->StatisticsSQL AS $data => $value) {
      if(isset($this->Statistics[$data][0]) && $this->Statistics[$data][0] == 1) {
          $tmpData = $this->Context->Database->Execute($value, '', '', '', '');
          $tmpNum = @mysql_num_rows($tmpData);
          $i=2;
          while($tmpNum != 0) {
            $Row = mysql_fetch_assoc($tmpData);
            foreach($Row AS $RowData) {
	          $this->Statistics[$data][$i] = $RowData;
	          $i++;
	        }
	        $tmpNum--;
	      }
	  } else if(isset($this->Statistics[$data])) {
	    $Num = count($this->Statistics[$data])-1;
	    for($i=1;$i<$Num;$i++) {
		  $this->Statistics[$data][$i] = "0";
		}
	  }
	}
  }

  function BackColour() {
    $this->BackColour = ($this->BackColour == "Legend UnblockedCategory") ? "Legend BlockedCategory" : "Legend UnblockedCategory";
    return $this->BackColour;
  }

  function MakePanel() {
    global $TheseArePeople;

    $this->StatisticDisplay = "<h2>".$this->Context->GetDefinition("Statistics")."</h2>
		<ul id=\"Statistics\">";

    foreach($this->Statistics AS $Name => $Values) {
      if(is_Array($Values) && $Values[0] == 1) {
	    $this->StatisticDisplay .= "<li class=\"".$this->backColour()."\">".ucfirst($this->Context->GetDefinition("Statistic_".$Name)).": ";
        $PostingCount = 1;
        $count = count($Values);
        $UseName = (in_array($Name, $TheseArePeople) ? true : false);
		for($i=2;$i<$count;$i++) {
		  if(is_numeric($Values[1]) && $Values[1] > 0 && $count > 3) {
		    $Start =
            $this->StatisticDisplay .= "<br />\n".$PostingCount.".<b>".($UseName == true ? $this->GetUserLink($Values[$i]) : $Values[$i])."</b><br />\n".$this->Context->GetDefinition('Statistic_'.$Name.'_2')."<b>".$Values[($i+1)]."</b>".$this->Context->GetDefinition('Statistic_'.$Name.'_3');
            $PostingCount++;
            $i++;
          } else if($i <= 2) {
            $this->StatisticDisplay .= ($i != 1 && $this->Context->GetDefinition("Statistic_".$Name."_".$i) != "Statistic_".$Name."_".$i) ? $this->Context->GetDefinition("Statistic_".$Name."_".$i)."<b>".($UseName == true ? $this->GetUserLink($Values[$i]) : $Values[$i])."</b>" : "<b>".($UseName == true ? $this->GetUserLink($Values[$i]) : $Values[$i])."</b>";
	        $this->StatisticDisplay .= (isset($Values[$i])) ? "<br />" : "";
          }
	    }
	  }
	  $this->StatisticDisplay .= "</li>";
    }
    $this->StatisticDisplay .= "</ul>";
  }

  function GetUserLink($Username) {
    $USER_TABLE = (isset($this->Context->DatabaseTables['User'])) ? $this->Context->DatabaseTables['User'] : $Context->DatabaseTables['User'];

    $Query = "SELECT UserID FROM `".$USER_TABLE."` WHERE ".$USER_TABLE.".".$this->Context->DatabaseColumns['User']['Name']." = '".trim($Username)."';";
	$tmpData = $this->Context->Database->Execute($Query, '', '', '', '');
    $data = mysql_fetch_assoc($tmpData);

    return "<a href='".GetUrl($this->Context->Configuration, 'account.php', '', 'u', $data['UserID'])."'>".$Username."</a>";
  }

  function MakeCheckboxes() {
    foreach($this->Statistics AS $Name => $Values) {
      if($Name != "0" && $Name != "") {
	    echo "\n".GetDynamicCheckBox('chkStatistic_'.$Name, 1, $Values[0],'',$this->format_link($this->Context->GetDefinition("Statistic_".$Name)));
        echo ($Values[1] > 0) ? $this->Context->GetDefinition("Statistic_NumberOfRows")." <input type='text' name='txtStatistic_".$Name."_rows' value='".$Values[1]."' style='width:38px' /><br /><br />" : "<br />";
      }
	}
  }

  function MakeGlobalOptions() {
    $End = false;
    $i = 0;
    do {
      if($this->Context->GetDefinition("Statistic_GlobalOptions_".$i) == "Statistic_GlobalOptions_".$i) {
	    $End = true;
	  } else {
  	    echo "\n".GetDynamicRadio("GlobalOptions", $i, ($this->GlobalOptions == $i ? true : false), '', $this->format_link($this->Context->GetDefinition("Statistic_GlobalOptions_".$i)), '', "GlobalOptions_".$i);
	  }
	  $i++;
	} while($End == false);
  }

  function Init_Statistics() {
    $this->Now = time();
    $this->BackColour = "Legend BlockedCategory";
  }

  function format_link($link) {
    $link = explode("_",$link);
    $new_link = "";
    foreach($link AS $word) {
      $new_link .= ucfirst($word)." ";
    }
    return trim($new_link);
  }

  function Render() {
    $Action = ForceIncomingString('SaveStatistics', '');
    if($Action == 'Save') {
      $this->CacheTime = 0;
      $this->GetStatistics();
      $this->DefineSQL();
      $this->ExcecuteSQL();
      $this->SaveStatistics(true);
      $this->Notice = 2;
	} else if($Action == 'Reset') {
	  $this->Reset = true;
	  $this->GetStatistics();
	  $this->DefineSQL();
      $this->ExcecuteSQL();
      $this->SaveStatistics();
      $this->Notice = 1;
	}

    if($this->PostBackAction == "Statistics") {
        $this->GetStatistics();
		echo '<div id="Form" class="StartDiscussion">';

		if($this->Notice){
			echo '<div id="Success">'.$this->Context->GetDefinition("Statistic_Notice_".$this->Notice).'</div>';
		}

		echo '<fieldset>
		<legend>'.$this->Context->GetDefinition("StatisticsSetting").'</legend>
		<form name="StatisticsForm" method="post" action="settings.php?PostBackAction=Statistics">
		'.$this->Context->GetDefinition("StatisticInformation") . '<hr size="1" noshade="noshade" />'.$this->Context->GetDefinition("Statistics");
		$this->MakeGlobalOptions();
		echo '<br /><hr size="1" noshade="noshade" />';
		$this->MakeCheckboxes();
     	echo '<input type="hidden" name="SaveStatistics" value="Save" /><input type="submit" name="StatSave" value="'.$this->Context->GetDefinition('Save').'" onClick="document.StatisticsForm.StatisticsNotice.value=\'2\'" class="Button SubmitButton StartDiscussionButton" /><br /><br /></form><br />
		<legend>'.$this->Context->GetDefinition("ResetStatistics").'</legend>
		<form name="StatisticsForm" method="post" action="settings.php?PostBackAction=Statistics">'
		.$this->Context->GetDefinition("Statistic_ResetCaption").
     	'<br /><br /><input type="hidden" name="SaveStatistics" value="Reset" /><input type="submit" name="StatSave" value="'.$this->Context->GetDefinition("StatisticsReset").'" onClick="document.StatisticsForm.StatisticsNotice.value=\'1\'" class="Button SubmitButton StartDiscussionButton" /><br /><br /></form></fieldset></div>';
    }
  }

  function Enabled() {
    switch($this->GlobalOptions) {
	  case 1:
	    // Completely Disabled
	    return false;

	  case 2:
	    // If Logged in, enable it
	    if($this->Context->Session->UserID == 0) return false;

	  case 0:
	  default:
	    // By Default allow
	    return true;

	}
	return true;
  }

}

$Statistics = $Context->ObjectFactory->NewContextObject($Context, 'Statistics');
$Statistics->Init_Statistics();
if ($Context->SelfUrl == "index.php") {
  $Statistics->GetStatistics();
  if($Statistics->Enabled() == true) {
    if(intval($Statistics->CacheTime) < $Statistics->Now) {
      $Statistics->DefineSQL();
      $Statistics->ExcecuteSQL();
      $Statistics->SaveStatistics();
    }
    $Head->AddStyleSheet("extensions/Statistics/style.css");
    $Statistics->MakePanel();
    $Panel->AddString($Statistics->StatisticDisplay, 100);
  }
} else if($Context->SelfUrl == "settings.php") {
  $Page->AddRenderControl($Statistics, $Configuration['CONTROL_POSITION_BODY_ITEM'] + 80);
  $Panel->AddListItem($Context->GetDefinition('AdministrativeOptions'), $Context->GetDefinition("StatisticsSetting"), GetUrl($Context->Configuration, $Context->SelfUrl, '', '', '', '', 'PostBackAction=Statistics'), '', '', 101);
}

?>
