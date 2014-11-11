<?php
/*
Extension Name: 删除帖子
Extension Url: http://www.weentech.com/bbs/
Description: 此插件允许会员或管理员彻底删除主题或回复, 启用后需要设置会员或管理员用户组具有相应的删除权限.
Version: 2.0
Author: 闻泰网络
Author Url: http://www.weentech.com/
Extension Key: CommentRemoval
*/

if(!isset($Head)) return;

if(!$Context->Session->UserID) return;

if($Context->SelfUrl == 'comments.php') $Head->AddScript('extensions/CommentRemoval/comment_removal.js');

$Configuration['PERMISSION_REMOVE_COMMENTS'] = '0';
$Configuration['PERMISSION_REMOVE_OWN_COMMENTS'] = '0';
$Context->Dictionary['PERMISSION_REMOVE_COMMENTS'] = '允许删除所有主题或回复';
$Context->Dictionary['PERMISSION_REMOVE_OWN_COMMENTS'] = '允许删除自己的回复或未回复的主题';

$Context->AddToDelegate('CommentGrid', 'PostCommentOptionsRender', 'CommentOptions_AddDeleteButton');

$Context->Dictionary['VerifyCommentRemoval'] = '确定删除此回复吗?';
$Context->Dictionary['VerifyDiscussionRemoval'] = '确定删除此主题吗?';
$Context->Dictionary['remove'] = '删除';

function CommentOptions_AddDeleteButton(&$Form)
{
	$D = &$GLOBALS['CommentGrid']->Discussion;
	$C = &$Form->DelegateParameters['Comment'];
	
	if(!( 
		$Form->Context->Session->User->Permission('PERMISSION_REMOVE_COMMENTS') || 
		(
			$C->AuthUserID == $Form->Context->Session->User->UserID && !$D->Closed && 
			($D->FirstCommentID != $C->CommentID || $D->CountComments == 1) && 
			$Form->Context->Session->User->Permission('PERMISSION_REMOVE_OWN_COMMENTS')
		)
	)) return;
	
	$Form->DelegateParameters['CommentList'] .= 
		'<a href="./" id="RmComment_'.$C->CommentID.'" onclick="if(confirm(\''.
		$Form->Context->GetDefinition($D->FirstCommentID != $C->CommentID 
		? 'VerifyCommentRemoval' : 'VerifyDiscussionRemoval').
		'\')) removecomment(\''.$GLOBALS['Context']->Configuration['WEB_ROOT'].'\', '.
		$C->CommentID.', '.($C->CommentID == $D->FirstCommentID ? '1' : '0').
		'); return false;">'.$Form->Context->GetDefinition('remove').'</a>';
}

?>