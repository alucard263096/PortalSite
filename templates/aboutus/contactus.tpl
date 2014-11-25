<{include file="$smarty_root/header.tpl" }>


		<!-- Start page head -->
		<section class="page-head contain-head">
			<div class="container">
				<div class="row">
					<div class="span9 head-text">
						<h3><i class="icon-comments"></i>联系我们</h3>
						<p>
						如果你对我们的产品感到有兴趣，请立即联系我们！
						</p>
					</div>
					<div class="span3">
						<i class="icon icon-comments"></i>
					</div>
				</div>
			</div>			
		</section>
		<!-- End page head -->


<!-- Start contain -->
		<section class="page-contain">
			<div class="container">
			<div class="row">
						<div class="span7">
							<h4>雷德睦华医药科技（北京）有限公司北京总部</h4>
							<p>
							<strong><i class="icon-home"></i>地址 :</strong><br>
							北京市丰台区马家堡东路106号自然新天地写字楼606室<br>
							邮编：100068
							</p>
							<p>
							<strong><i class="icon-phone"></i>北京 联系电话 :</strong><br>
							010-58031636<br>
							010-58032661<br>
							传真：010-58031636 转 804
							</p>	
							<p>
							<strong><i class="icon-phone"></i>上海 联系电话 :</strong><br>
							021-60908582<br>
							传真：021-60908583
							</p>							
						</div>
						<div class="span5">
							<h4>&nbsp;</h4>
							<p>
							<strong><h6><i class="icon-globe"></i>微信关注</h6></strong>
							<img alt="微信" style="height:185px" src="<{$rootpath}>/themes/lm/images/qrcode.png" />
							</p>
						</div>
			</div>
			</div>
		</section>
		<hr />
<link rel="stylesheet" type="text/css" href="<{$rootpath}>/themes/lm/css/contact.css?1856470724" media="screen" />
<link rel="stylesheet" type="text/css" href="<{$rootpath}>/themes/lm/css/map.css?958646445" media="screen" />
	<section class="page">
		<div class="container">
			<div class="row">
				<div class="span12">
	    		<h5 >各区联系人</h5>
		    		<div class='contact_kd bg-t'>
		    		<{foreach from=$managerlist item=rs }>
				    <ul>
				        <li class="company_name provincelist"><{$rs.provinces}></li>
				        <li><{$rs.chname}> <{$rs.engname}></li>
				        <li>电话：<{$rs.tel}></li>
				    </ul>
				    <{if $rs.seq%5==0}>
				    <div class="line bg-b mb20"></div>
				    <{/if}>
				    <{/foreach}>
		    		</div>
		    		<{include file="$smarty_root/aboutus/map.tpl" }>
    
    <script>
    var arrprovince=new Array();
    <{foreach from=$provincelist item=prs}>
    arrprovince["<{$prs.spell}>"]="<{$prs.provinceName}>";
	<{/foreach}>
    $(document).ready(function(){


		
		$(".provincelist").each(function(){
			var provincestr=$(this).text();
			var arr=provincestr.split(",");
			var nstr="";
			var isFirst=true;
			for(var i=0;i<arr.length;i++){
				if($.trim(arr[i])!=""){
					if(isFirst==false){
						nstr=nstr+"、";
					}
					isFirst=false;
					nstr=nstr+arrprovince[arr[i]];
				}
			}
			$(this).text(nstr);
		});

    });
    
    
    </script>
		    		
		    		
		    	</div>
	    	</div>
    	</div>
    </section>


<!-- end contain -->

<{include file="$smarty_root/footer.tpl" }>
