﻿<{include file="$smarty_root/header.tpl" }>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=3GpApnIzrOQnwXVn99MmeeUE"></script>

<script type="text/javascript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>
<link rel="stylesheet" href="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />


  <link rel="stylesheet" type="text/css" href="<{$rootpath}>/themes/site_themes/LandMover/css/plist.css" />

    <div class="page case-relative clearfix">

      <div class="sub-nav-box mt10 clearfix">
        <h3 class="fl">
          <em class="ft28 clr3 ftheiti">合作伙伴</em>
        </h3>
      </div>

      <div class="m" id="select"  >
        <div class="mt">
          <h1>
            <strong>筛选条件</strong>
          </h1>
        </div>
        <div class="mc attrs" >
          <div id="selected_div" class="selected-c" style="display:none;">
            <div class="attr">
              <div class="a-key">已选条件：</div>
              <div class="a-values">
                <div class="v-fold">
                  <ul class="f-list">
                  </ul>
                </div>
                <div class="v-option">
                  <a href="#">
                    <span id="all-revocation">全部撤消</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="prop-attrs">
            <div class="attr">
              <div class="a-key">类型：</div>
              <div class="a-values">
                <div class="v-fold">
                  <ul class="f-list">
                    <li>
                      <a  href="#" remove="type" class="remove_condition_type">所有</a>
                    </li>
                    <li>
                      <a  href="#" class="condition" id="type_1">供应商</a>
                    </li>
                    <li>
                      <a  href="#" class="condition" id="type_2">医疗机构</a>
                    </li>
                    <li>
                      <a  href="#" class="condition"  id="type_3">医生</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="prop-attrs">
            <div class="attr" >
              <div class="a-key">城市：</div>
              <div class="a-values">
                <div class="v-fold">
                  <ul class="f-list"  >
                    <li>
                      <a  href="#"  remove="city" class="remove_condition_type">所有</a>
                    </li>
                    <li>
                      <a  href="#" id="selectcity">添加城市+</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      <div style="margin-top: 20px;">
      <div class="m"  id="result"  style="float:left;" >
        <div class="mt">
          <div style="display:none;float:left;">
            <input type="checkbox"  style="margin-top:7px;float:left;" /><span>&nbsp;全选</span>
          </div>
          <div  style="float:right;">
            <span>关键字：</span><input type="text" id="textsearch"  />
          </div>
        </div>
        <{foreach from=$partnerlist item=rs}>
        <div type="<{$rs.type}>" city="<{$rs.cityid}>" class="mc attrs  resulattr"  >
          <div class="prop-attrs">
            <div class="attr" style="width:498px;">
            <div style="float:left;width:20px;">[<{$rs.seq}>]</div>
            <div style="width:478px;float:right;">
              <h3 class="name"><{$rs.name}></h4>
              <p class="address">地址：<{$rs.address}></p>
              <span class="tel">电话：<{$rs.tel}></span>
              <a href="<{$rootpath}>/partner/detail.php?id=<{$rs.id}>"><b>查看详情</b></a>
              </div>
              <input type="hidden" class="seq" value="<{$rs.seq}>" />
              <input type="hidden" class="id" value="<{$rs.id}>" />
              <input type="hidden" class="point_x" value="<{$rs.x}>" />
              <input type="hidden" class="point_y" value="<{$rs.y}>" />
            </div>
          </div>
        </div>
        <{/foreach}>
      </div>
      <div  style="float:right;width:480px;height:500px;" >
	      <div id="allmap" style="overflow:hidden;zoom:1;height:480px;">	
		    <div id="map" style="height:100%;-webkit-transition: all 0.5s ease-in-out;transition: all 0.5s ease-in-out;"></div>
		  </div>
      </div>
      </div>
      
      <script type="text/javascript">

      var pointList=new Array();
      var map = null;
      var searchInfoWindow = null; 
      
      $(document).ready(function(){
          map = new BMap.Map('map');
          var midinchine = new BMap.Point(116.743722,34.362871);
          map.centerAndZoom(midinchine, 5);
          map.enableScrollWheelZoom();
          
		  var i=0;
          $(".resulattr").each(function(){
            var seq=Number($(this).find(".seq").val());
        	var point = new BMap.Point($(this).find(".point_x").val(),$(this).find(".point_y").val());
        	var marker = new BMap.Marker(point); //创建marker对象
			var info={
				"seq":seq,
				"id":$(this).find(".id").val(),
				"name":$(this).find(".name").text(),
				"address":$(this).find(".address").text(),
				"tel":$(this).find(".tel").text(),
				"result":$(this)
			};
        	marker.info=info;
			pointList[i++]=marker;
			var label = new BMap.Label(""+seq,{"offset":new BMap.Size(5,2)});
			label.setStyle({backgroundColor:"transparent",color:"#ffffff",border:"0px"});
			marker.setLabel(label);
      	    map.addOverlay(marker);


    	    marker.addEventListener("click", function(e){
    		    var vmarker=this;
    		    $(".resulattr").removeClass("hover");
				vmarker.info.result.addClass("hover");
				var seq=Number($(this).find(".seq").val());
				showPointInfo(vmarker);
    	    })
			
          });
          refreshMap();

          
          
      });

      function closeAllPointInfo(){
    	  $.each(pointList,function(i,val){
    		  val.hide();
    	  });if(searchInfoWindow!=null){
    		  searchInfoWindow.close();
    	  }
      }

      function refreshMap(){
    	  //map.clearOverlays();
    	  closeAllPointInfo();
    	  
    	  $.each(pointList,function(i,val){
    		var marker=val;
      	    var result=val.info.result;
      	    if(result.hasClass("hide")==false){
      	    	marker.show(); //在地图中添加marker
      	      if(result.hasClass("hover")==true){

      	    	showPointInfo(marker);
      	    	
      	      }
      	    }
    	  });
      }

      function showPointInfo(marker){
    	  var content = '<div style="wmargin:0;line-height:20px;padding:2px;">' +
          marker.info.address+'<br/>'+marker.info.tel +
        '</div>';
    	      
	     searchInfoWindow = new BMapLib.SearchInfoWindow(map, content, {
	    			title  : marker.info.name,      //标题
	    			width  : 290,             //宽度
	    			height : 105,              //高度
	    			enableAutoPan : true,     //自动平移
	    			enableSendToPhone:false, 
	    		    searchTypes :[
	    		              ]
	    		});
	     searchInfoWindow.open(marker); //在marker上打开检索信息串口dow.open(marker);
      }
      
      </script>
      
      
      <script type="text/javascript">
      $(document).ready(function(){

			$(".resulattr").hover(function(){
				$(".resulattr").removeClass("hover");
				$(this).addClass("hover");
				var seq=Number($(this).find(".seq").val());
				showPointInfo(pointList[seq-1]);
			},function(){
				//$(this).removeClass("hover");
			});
          
      });
      $("#textsearch").bind('input propertychange',function(){
    	  filter();
      });

      function filter(){
		var typearr=new Array();
		var cityarr=new Array();
		var textarr=$.trim($("#textsearch").val()).split(" ");
		$(".selected-c .f-list li a").each(function(){
			var idstr=$(this).attr("id").split("_");
			if(idstr[1]=="type"){
				typearr[typearr.length]=idstr[2];
			}else{
				cityarr[cityarr.length]=idstr[2];
			}
		});
		$(".resulattr").removeClass("hide");
		$(".resulattr").removeClass("hover");
			$(".resulattr").each(function(){
				var type=$(this).attr("type");
				var city=$(this).attr("city");
				var text=$(this).text();
				var intype=inlst(type,typearr);
				var incity=inlst(city,cityarr);
				var insearch=insrt(text,textarr);
				if(intype==false
						||incity==false
						||insearch==false){
					$(this).addClass("hide");
				}
			});
			
			refreshMap();
		
		
      }
      function insrt(dval,arr){
			var onlyempty=true;;
    	  $.each(arr,function(i,val){
				if($.trim(val)!=""){
					onlyempty=false;
					return;
				}
    	  });        	  
    	  if(onlyempty==true){
			return true;
    	  }
    	  if(arr.length==0){
			return true;
    	  }else{
        	  var have=false;
    		$.each(arr,function(i,val){
				if(dval.indexOf(val)>=0){
					have=true;
				}
			});
			return have;
    	  }
      }

      function inlst(dval,arr){
    	  if(arr.length==0){
			return true;
    	  }else{
        	  var have=false;
    		$.each(arr,function(i,val){
				if(dval==val){
					have=true;
				}
			});
			return have;
    	  }
      }
      
      </script>
      

    </div>
    <script>
      $(document).ready(function(){

      

    	    var provincejson=
    	        [{name:"北京",id:1}
    	        ,{name:"上海",id:2}
    	        ,{name:"深圳",id:3}
    	        ,{name:"长沙",id:4}
    	        ];


      $.each( provincejson, function(index, content)
      {
      var id=content.id;
      var name=content.name;
      var listr="<li><a href='#none' id='city_"+id+"' class='condition'  >"+name+"</a></li>";
      $('#citylist').append(listr);
      });

      $(".condition").click(function(){
      var id=$(this).attr("id");
      var name=$(this).text();
      $("#store-selector").hide();
      AddToCondition(id,name);
      });





      $('#store-selector div.text').bind('mouseover',function(){
      $('#store-selector').addClass('hover');
      });

      $("#store-selector").hide();
      $("#selectcity").click(function(){
      $("#store-selector").css("top", $("#selectcity").offset().top-5 );
      $("#store-selector").css("left", $("#selectcity").offset().left+30 );
      $("#store-selector").show();
      });

      $("#close_city_selector").click(function(){
      $("#store-selector").hide();
      });

      $(".remove_condition_type").click(function(){
      var type=$(this).attr("remove");
      $(".selected-c .f-list li.condition_"+type).remove();
      checkIfCloseConditionSelected();
      filter();
      });

      $("#all-revocation").click(function(){
      $(".selected-c .f-list li").remove();
      checkIfCloseConditionSelected();
      filter();
      });
      
      
     

      });



      $(window).resize(function () {
      $("#store-selector").css("top", $("#selectcity").offset().top-5 );
      $("#store-selector").css("left", $("#selectcity").offset().left+30 );
      });
      
      function AddToCondition(id,name){

      if($(".selected-c .f-list li a[id='c_"+id+"']").length>0){
      return;
      }
      var condition_type=id.split("_")[0];
      var condition=condition_type=="type"?"类型":"城市";
      var listr="<li id='cc_"+id+"' onclick='$(this).remove();checkIfCloseConditionSelected();filter();'><a href='#' id='c_"+id+"'>"+condition+"：<strong>"+name+"</strong><b></b></a></li>";

      $('.selected-c .f-list').append(listr);

      checkIfCloseConditionSelected();
      filter();
      }



      function checkIfCloseConditionSelected(){
      if($(".selected-c .f-list li").length>0){
      $("#selected_div").show();
      }else{
      $("#selected_div").hide();
      }
      }


    </script>

    <dl class="store" id="citys" >
      <dd  id="store-selector" style="display:none;">
        <div class="content">
          <div id="JD-stock" data-widget="tabs" class="m JD-stock">
            <div class="mt">
              <ul class="tab">
                <li  data-widget="tab-item" class="curr">
                  <a href="#none">
                    <em>请选择</em>
                    <i></i>
                  </a>
                </li>
              </ul>
              <div class="stock-line"></div>
            </div>
            <div  data-area="0" data-widget="tab-content" class="mc" >
              <ul id="citylist" class="area-list">
              </ul>
            </div>
            <div >
              <button id="close_city_selector">关闭</button>
            </div>
          </div>
        </div>
      </dd>
    </dl>

    <{include file="$smarty_root/footer.tpl" }>
