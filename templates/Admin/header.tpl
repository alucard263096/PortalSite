<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<{$charset}>" />
<TITLE><{$Title}> <{$Subtitle}></TITLE>
    <link rel="stylesheet" href="<{$rootpath}>/css/template.css" type="text/css" />
    <script language="javascript" src="<{$rootpath}>/js/jquery.js"></script>
	<script type="text/javascript" src="<{$rootpath}>/js/ui/jquery-ui.min.js"></script>
    <script language="javascript" src="<{$rootpath}>/js/ui-alert.js"></script>
	<script type="text/javascript" src="<{$rootpath}>/js/jquery.cookie.js"></script>
	<link type="text/css" href="<{$rootpath}>/js/ui/jquery-ui.min.css" media="screen" rel="stylesheet" />
	<link type="text/css" href="<{$rootpath}>/themes/blue/style.css" media="screen" rel="stylesheet" />
	<link type="text/css" href="<{$rootpath}>/css/demos.css" media="screen" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<{$rootpath}>/css/pro_dropdown_2/pro_dropdown_2.css" />
<script>
var oLanguage = {
					"sProcessing": "处理中...",
					"sLengthMenu": "显示 _MENU_ 条记录",
					"sZeroRecords": "没有找到任何记录",
					"sInfo": "显示 _START_ 至 _END_ 的 _TOTAL_ 条记录",
					"sInfoEmpty": "显示 0 至 0 的 0 条记录",
					"sInfoFiltered": "(过滤 从 _MAX_共 条记录)",
					"sInfoPostFix": "",
					"sSearch": "查找:",
					"sUrl": "",
					"oPaginate": {
						"sFirst":    "第一页",
						"sPrevious": "上一页",
						"sNext":     "下一页",
						"sLast":     "最后一页"
						}
					};
</script>
</head>
<body>
	<table style="width:100%;text-align:left;" border="0" cellpadding="1" cellspacing="0">
		<tr>
			<td <{if $menu_direction =='V'}>colspan='2' <{/if}>>
				<table width="100%">
					<tr>
						<td align='left'><span class='bigtitle'><{$Subtitle}></span></td>
						<td align='right'>
							<table>
								<tr><td><{$sysUserName}></td></tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td <{if $menu_direction =='V'}>colspan='2' <{/if}>>
			<{if $menu_direction =='H'}>
				<{include file="$smarty_root/Admin/menu.tpl" }>
			<{else}>
				<hr />
			<{/if}>
			</td>
		</tr>
		<tr valign='top'>
			<{if $menu_direction =='V'}>
			<td width='200px'>
				<{include file="$smarty_root/Admin/menu.tpl" }>
			</td>
			<{/if}>
			<td >
			
			
			
			
			
			
			

