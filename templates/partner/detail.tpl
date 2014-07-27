<{include file="$smarty_root/header.tpl" }>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=3GpApnIzrOQnwXVn99MmeeUE"></script>
<script type="text/javascript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>
<link rel="stylesheet" href="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />

	

    <div class="page case-relative clearfix">

      <div class="sub-nav-box mt10 clearfix">
        <h3 class="fl">
          <em class="ft28 clr3 ftheiti"><{$info.name}></em>
        </h3>
      </div>
      
      <div style="display:table;width:100%;">
      	<div style="float:left;">
      		<img alt="" width="300px" src="<{$rootpath}>/themes/site_themes/LandMover/images/building.jpg" />
      	</div>
      	<div style="float:right;width:640px;text-align:left;">
      			<table>
      				<tr>
      					<td width="50px"></td>
      					<td></td>
      				</tr>
      				<tr>
      					<td><strong>地址：</strong></td>
      					<td><{$info.address}></td>
      				</tr>
      				<tr>
      					<td><strong>电话：</strong></td>
      					<td><{$info.tel}></td>
      				</tr>
      				<tr>
      					<td><strong>传真：</strong></td>
      					<td><{$info.tel}></td>
      				</tr>
      				<tr>
      					<td><strong>手机：</strong></td>
      					<td><{$info.tel}></td>
      				</tr>
      				<tr>
      					<td><strong>简介：</strong></td>
      					<td><span style="color: #bbbbbb"><{$info.summary}></span></td>
      				</tr>
      			</table>
      	</div>
      </div>
      
     
      
	<div style="margin-top:20px;width:100%;">
	<hr />
	</div>
      
      
    <div style="display:table;width:100%;">
    	<div style="float:left;width:700px;">
    	以下内容是后台自由编辑输出的，请不要在意格式
    	
    	
    	
    	
    	<div class="content-4"><!-- content_start -->
<div class="container-4">



	
	<iframe name="iframe" width="664" height="300" id="iframe" src="http://shared.heraeus.com/zh/sharedcontent/heraeusmedical/konzernbereich_1/hm.aspx?color=#9BC353" frameborder="0" scrolling="no">
		Seite funktioniert nicht
	</iframe>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

</div>

<div class="img-4">


	
	
	<img title="" class="&#10;" alt="" src="http://webmedia.heraeus.com/media/heraeus/ofg_teaserelemente/GB_Bilder_HM_650x193_-_Kopie_res_650.jpg">
	

</div>
<a name="text_wopic__4_5_" id="text_wopic__4_5_"></a>


<div class="container-4">
<div class="txt-4">
	

		

			<div class="paragraph">骨质流失是外科医生面临的一项大挑战。在这里，骨外科使用可被身体吸收并能转换成体内组织的创新载体材料。我们的目标是完全修复骨头缺损。贺利氏目前正在临床试验里测试一种人造、可吸收的植骨材料Herafill®，它含有强效的抗生素。</div>
		

	
</div>
</div>

<!-- content_end -->
					</div>
    	
    	
    	
    	
    	
    	
    	
    	
    	
    	
    	
    	
    	
				
				
				
    	</div>
    	<div style="float:right;width:280px;">
    	  <div id="allmap" style="overflow:hidden;zoom:1;height:280px;">	
		    <div id="map" style="height:100%;-webkit-transition: all 0.5s ease-in-out;transition: all 0.5s ease-in-out;"></div>
		  </div>
    	</div>
    
    
    </div>
      
      
      
    </div>
    
<script type="text/javascript">

var map = null;
var searchInfoWindow = null; 

$(document).ready(function(){
	
	map = new BMap.Map('map');
    var point = new BMap.Point(<{$info.x}>,<{$info.y}>);
    map.centerAndZoom(point, 15);
    map.enableScrollWheelZoom();
    
    var marker = new BMap.Marker(point); //创建marker对象
    marker.addEventListener("click", function(e){
	    searchInfoWindow.open(marker);
    });

    var content = '<div style="wmargin:0;line-height:20px;padding:2px;">地址：' +
    '<{$info.address}><br/>电话：<{$info.tel}>' +
  '</div>';
	      
   searchInfoWindow = new BMapLib.SearchInfoWindow(map, content, {
  			title  : "<{$info.name}>",      //标题
  			width  : 290,             //宽度
  			height : 105,              //高度
  			enableAutoPan : true,     //自动平移
  			enableSendToPhone:false, 
  		    searchTypes :[
  		              ]
  		});
    
    map.addOverlay(marker); //在地图中添加marker
    
    marker.addEventListener("click", function(e){
	    searchInfoWindow.open(marker); //在marker上打开检索信息串口dow.open(marker);
    });

    
	//searchInfoWindow.open(marker); //在marker上打开检索信息串口dow.open(marker);


	
});
</script>
    
    
    
<{include file="$smarty_root/footer.tpl" }>
