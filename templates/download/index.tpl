<{include file="$smarty_root/header.tpl" }>
<link rel="stylesheet" type="text/css" href="<{$rootpath}>/themes/site_themes/LandMover/apps/cms/default/css/alone/about_company_info_contact.css?1856470724" media="screen" />

<div class="page case-relative clearfix" style="height:500px;">
 
<div class="sub-nav-box mt10 clearfix">
	<h3 class="fl">
		<em class="ft28 clr3 ftheiti">下载中心</em>
	</h3>
</div>
 <style>
 .style-1 .l span{
 padding-bottom:0px;
 
 }
 
 .style-1 .l a{
 padding-top:0px;
 
 }
 
 </style>

<div class="show-list overh fl">
<{foreach from=$list item=rs}>
  	<dl class="style-1 <{if $rs.seq%2 == 1}>bg<{else}>bg-t<{/if}>">
    	<dt class="l">
        	<span class="clear2">
        		<span class="til f-l"><{$rs.name}></span>
        	</span>
        	
            	<{if count($rs.downloadlist) ==0 }>
            	<p>暂无下载</p>
            	<{else}>
            <ul>
            	<{foreach from=$rs.downloadlist item=info}>
            	<li >
            	<a href="<{$rootpath}>/download.php?filename=<{$info.filename}>"><{$info.name}></a>
				</li>
				<{/foreach}>
            </ul>
            <{/if}>
        </dt>
    </dl>
<{/foreach}>
</div>

    
    
    

</div>


<{include file="$smarty_root/footer.tpl" }>
