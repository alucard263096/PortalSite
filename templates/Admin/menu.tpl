<{if $menu_direction =='H'}>
<div id="header">
	<table border="0" width='100%' cellpadding="0" cellspacing="0">
	  <tr class="menubar" >
	    <td>
	      <ul id="nav">
	      	<{foreach from=$sysMenu item=rs}>
	      		<li class="root"><a href="#" class="root_link"><span class="down"><{$rs.function_name}></span></a>
		      		<ul class="sub" style="overflow:visible;">
		      		<{foreach from=$rs.sub_function item=rss}>
		      			<li><a href="<{if $rss.function_link neq '#' }><{$rootpath}>/Admin/<{/if}><{$rss.function_link}>"><{$rss.function_name}></a></li>
		      		<{/foreach}>
		      		</ul>
	      		</li>
			<{/foreach}>
	      		<li class="root"><a href="#" class="root_link"><span class="down">系统</span></a>
		      		<ul class="sub" style="overflow:visible;">
		      			<li><a href="<{$rootpath}>/Admin/password.php">修改密码</a></li>
		      			<li><a href="<{$rootpath}>/Admin/logout.php">退出系统</a></li>
		      		</ul>
	      		</li>
	        </ul>
	    </td>
	  </tr>
	</table>
  </div>
  <{else}>
  	
	<!--<script type="text/javascript" src="<{$rootpath}>/js/dropdownmenu.js"></script>-->
	<link type="text/css" href="<{$rootpath}>/css/ddlmenustyle.css" media="screen" rel="stylesheet" />
  
  
  	  <dl id="sfqclick">
  	  	<{foreach from=$sysMenu item=rs}>
			<dt class="leftIco"><{$rs.function_name}></dt>
			<dd style="display:block;">
				<{foreach from=$rs.sub_function item=rss}>
			 		<a href="<{if $rss.function_link neq '#' }><{$rootpath}>/<{/if}><{$rss.function_link}>"><{$rss.function_name}></a>
				<{/foreach}>
			</dd>
  	  	<{/foreach}>
		<dt class="leftIco">系统</dt>
		<dd style="display:block;">
			<a href="<{$rootpath}>/Admin/user.php">用户</a>
			<a href="<{$rootpath}>/password.php">修改密码</a>
			<a href="<{$rootpath}>/logout.php">退出系统</a>
		</dd>
	  </dl>
  <{/if}>