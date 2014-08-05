<{include file="$smarty_root/header.tpl" }>
<link rel="stylesheet" type="text/css" href="<{$rootpath}>/themes/site_themes/LandMover/apps/cms/default/css/alone/about_news.css?2342795671" media="screen" />

<div class="page case-relative clearfix" style="height:500px;">
 
<div class="sub-nav-box mt10 clearfix">
	<h3 class="fl">
		<em class="ft28 clr3 ftheiti">新闻中心</em>
	</h3>
</div>
 
<div class="new_box bg-t col2-set clearfix pt20">
	<div class="news_list col-1">
	<div id="listContent" cid="248">
<div class="newslist">
	<{foreach from=$newslist item=rs}>
	<dl>
		<h4><a href="<{$rootpath}>/news/detail.php?id=<{$rs.id}>" target="_blank"><{$rs.title}></a></h4>
		<p><{$rs.summary}></p>
		<span><i><{$rs.publishedDate}></i><em>浏览（<{$rs.viewcount}>）</em></span>
	</dl>
	<{/foreach}>
</div>
<div class="changepage_box">
<div class="pages-container changepage mb25">
<div class="pages2">
	 <span class="fbj disabled">上一页</span>
	<span class="current">1</span>
	<a class="fb" href="#">2</a>
	<a class="fb" href="#">3</a>
	<a class="fb" href="#">4</a>
	<a class="fb" href="#">5</a>
	<a class="fb" href="#">6</a>
	<a class="fb" href="#">7</a>
	<a class="fb" href="#">8</a>
	<a class="fb" href="#">9</a>
	<a class="fb" href="#">10</a>
	<a class="fb" href="#">31</a>
	<a class="bbj" href="#">下一页 </a>
</div>
</div>
</div>
	</div>
</div>
<div class="focusnews col-2">
		<div class="active">
	  	<h3 class="h3-l" style="color:red">热点新闻</h3>
	  	<{foreach from=$hotlist item=rs}>
	  	<dl>
	    	<dd><a href="<{$rootpath}>/news/detail.php?id=<{$rs.id}>" target="_blank"><{$rs.title}></a><p><{$rs.summary}></p></dd>
	  	</dl>
		<{/foreach}>
	</div>
    
</div></div>
    
    

</div>


<{include file="$smarty_root/footer.tpl" }>
