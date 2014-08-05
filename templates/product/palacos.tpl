<{include file="$smarty_root/header.tpl" }>

    <link rel="stylesheet" type="text/css" href="<{$rootpath}>/js/ui/jquery-ui.min.css" media="screen" />
    <script type="text/javascript" src="<{$rootpath}>/js/ui/jquery-ui.min.js"></script>
<link href="<{$rootpath}>/themes/site_themes/LandMover/apps/cms/default/css/alone/products_eas.css?225327392" rel="stylesheet" type="text/css" media="screen">
    
<link rel="stylesheet" type="text/css" href="<{$rootpath}>/themes/site_themes/LandMover/apps/cms/default/css/alone/palacos.css?1856470724" media="screen" />
 
 <div class="page clearfix">
<div class="sub-nav-box mt10 clearfix">
        <h3 class="fl">
          <em class="ft28 clr3 ftheiti">Palacos Family</em>
        </h3>
      </div>

<div class="show-list overh fl">
  	<dl class="style-1 bg">
    	<dt class="l">
        	<span class="clear2">
        		<img class="icon-img f-l" height="85px" src="<{$rootpath}>/themes/site_themes/LandMover/images/icon1.png" data-bd-imgshare-binded="1">
        		<span class="til f-l">PALACOS®R/PALACOS®R+G 原装进口 德国制造</span>
        	</span>
            <p>PALACOS®R是一款高粘度骨水泥，50多年来，PALACOS®骨水泥秉承一贯的高品质原料和成熟的配方，为外科手术的成功做出了积极贡献。</p>
      <p>所有PALACOS®骨水泥均可添加庆大霉素。抗生素的局部释放可将植入物的风险降至最低，并减少全身符合。</p>
            <ul>
            	<li >
            	<div class="tip_button bluea product_detail" productid="1">PALACOS®R</div>
				</li>
            	<li >
            	<div class="tip_button greena product_detail" productid="2">PALACOS®R+G</div>
				</li>
            </ul>
        </dt>
        <dd class="r"><img src="<{$rootpath}>/themes/site_themes/LandMover/images/product_r_r.png" data-bd-imgshare-binded="1"></dd>
    </dl>
    <dl class="style-2 bg-t" >
    	<dd class="l"><img src="<{$rootpath}>/themes/site_themes/LandMover/images/product_m.png" data-bd-imgshare-binded="1"></dd>
    	<dt class="r">
        	<span class="clear2">
	        	<img class="icon-img f-l" height="85px" src="<{$rootpath}>/themes/site_themes/LandMover/images/icon2.png" data-bd-imgshare-binded="1">
				<span class="til f-l">PALACOS®MV/PALACOS®MV+G 适合真空混合</span>
			</span>
		      <p>
		      PALACOS®MV是一款中等粘度骨水泥。其原料与PALACOS@R相同，具备卓越的机械特性。PALACOS®MV尤其适合与真空混合系统搭配使用。
		      </p>
		      <p>该骨水泥也提供含庆大霉素的版本，PALACOS®MV+G，以实现抗生素预防。
		      </p>
            <ul>
            	<li >
            	<div class="tip_button orangea product_detail" productid="3">PALACOS®MV</div>
				</li>
            	<li >
            	<div class="tip_button bluea product_detail" productid="4">PALACOS®MV+G</div>
				</li>
            </ul>
        </dt>
    </dl>
  	<dl class="style-1 bg" >
    	<dt class="l">
        	<span class="clear2">
        		<img class="icon-img f-l" height="85px" src="<{$rootpath}>/themes/site_themes/LandMover/images/icon3.png" data-bd-imgshare-binded="1">
        		<span class="til f-l" style="font-size:26px">PALACOS®LV/PALACOS®LV+G 灵活触动即可完成艰巨任务</span>
        	</span>
		      <p>
		      PALACOS®LV是一款低粘度骨水泥。由于粘度较低，PALACOS®LV即使通过细小的喷嘴亦可精确灌注，是肩肘等中小型关节的理想之选。PALACOS®LV能够更好地渗透到细小的骨结构中，并提供良好的锚定性能。
		      </p>
		      <p>该骨水泥也提供含庆大霉素的版本，PALACOS®LV+G，以实现抗生素预防。
		      </p>
            <ul>
            	<li >
            	<div class="tip_button greena product_detail" productid="5">PALACOS®LV</div>
				</li>
            	<li >
            	<div class="tip_button bluea product_detail" productid="6">PALACOS®LV+G</div>
				</li>
            </ul>
        </dt>
        <dd class="r"><img src="<{$rootpath}>/themes/site_themes/LandMover/images/product_l_r.png" data-bd-imgshare-binded="1"></dd>
    </dl>
<script language="javascript">
		$(function(){
		   /*淡隐淡出效果*/					
	       $.kingdee.fade({obj:".tip_button",init:0.7,over:1,out:0.7});
        })
</script> 
			</div>
			
	
		<!--焦点模块--> 
		<ul class="focus-con J_focus overh ks-focus">
			<li class="style-1">
					<div class="kingdee_bn">
						<img src="<{$rootpath}>/themes/site_themes/LandMover/images/palacos.jpg" data-bd-imgshare-binded="1">
						<ul>
							<p class="title"></p>
	              		</ul>
	              	</div>
			</li>
		</ul>
			
			
			
 </div>
 <style>
.ui-widget-header{
border:0px;
background:none;
}
</style>
	
	<script type="text/javascript">
	$(document).ready(function(){

		$(".product_detail").click(function(){

			var productid=$(this).attr("productid");
			var title=$(this).attr("title");
			$( "#dialog-content" ).load("<{$rootpath}>/product/detail.php",{id:productid},
					function(data){
				$( "#dialog-content" ).dialog({
					  closeText:"hide",
					  height:600,
					  width:800,
				      modal: true,
				      title:" ",
				      draggable:false,
				      closeOnEscape:true,
				      resizable:false,
				      show: { effect: "blind", duration: 800 }
				    });
			});
		});

		$(".showtips").click(function(){
			var id=$(this).attr("ref");
			var width=Number($("#"+id).attr("w"));
			var height=Number($("#"+id).attr("h"));
			$("#"+id).dialog({
				  height:height,
				  width:width,
			      modal: true,
			      draggable:false,
			      closeOnEscape:true,
			      resizable:false,
			      title:" ",
			      show: { effect: "blind", duration: 800 }
			});
		});
		
	});
	</script>
	
	<div id="dialog-content" title="Download complete"  style="display:none;">
	  
	</div>
	
 
 
	
</div>
	
  <{include file="$smarty_root/footer.tpl" }>
