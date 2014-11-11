<?php
/*
Extension Name: 版块选择器
Extension Url: http://www.weentech.com/bbs/
Description: 此插件启用后, 在控制面板栏添加一个论坛版块快捷下拉选择框.
Version: 2.0
Author: 闻泰网络
Author Url: http://www.weentech.com/
Extension Key: CategoryJumper
*/

function GetCategoryJumper(&$Context) {
   $CategoryManager = $Context->ObjectFactory->NewContextObject($Context, 'CategoryManager');
   $CategoryData = $CategoryManager->GetCategories(0, 1);
   if (!$CategoryData) {
      return '';      
   } else {
      $Select = $Context->ObjectFactory->NewObject($Context, 'Select');
      $Select->Name = 'CategoryID';
      $Select->SelectedValue = ForceInt($GLOBALS['CurrentCategoryID'], 0);
      if ($Context->Configuration['URL_BUILDING_METHOD']) {
         $Select->Attributes = "onchange=\"document.location='".$Context->Configuration['WEB_ROOT']."'+(this.options[this.selectedIndex].value > 0 ? this.options[this.selectedIndex].value+'.html' : 'index.html');\"";
      } else {
         $Select->Attributes = "onchange=\"document.location='".$Context->Configuration['WEB_ROOT']."'+(this.options[this.selectedIndex].value > 0 ? '?CategoryID='+this.options[this.selectedIndex].value : '');\"";
      }
      $Select->Attributes .= " id='CategoryJumper'";
      
      $Select->AddOption(0, $Context->GetDefinition('AllCategories'));         
      $LastBlocked = -1;
      $cat = $Context->ObjectFactory->NewObject($Context, 'Category');
      while ($Row = $Context->Database->GetRow($CategoryData)) {
         $cat->Clear();
         $cat->GetPropertiesFromDataSet($Row);
         if ($cat->Blocked != $LastBlocked && $LastBlocked != -1) {
            $Select->AddOption('-1', '---', " disabled=\"disabled\"");
         }
         $Select->AddOption($cat->CategoryID, $cat->Name);
         $LastBlocked = $cat->Blocked;
      }         
      return '<h2>'.$Context->GetDefinition('CategoryManagement').'</h2>'
         .$Select->Get();
   }
}

if (in_array($Context->SelfUrl, array('index.php','comments.php','categories.php','search.php','account.php','extension.php')) && $Configuration['USE_CATEGORIES']) {
   $Panel->AddString(GetCategoryJumper($Context), 5);
}
?>