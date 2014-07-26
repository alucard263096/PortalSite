<{include file="$smarty_root/header.tpl" }>


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
      
      
      
      <div class="m"  id="result"  >
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
              <h3><{$rs.name}></h4>
              <p>地址：<{$rs.address}></p>
              <span>电话：<{$rs.tel}></span>
              <a href="<{$rootpath}>/partner/detail.php?id=<{$rs.id}>">查看详情</a>
              </div>
            </div>
          </div>
        </div>
        <{/foreach}>
      </div>
      
      <script type="text/javascript">
      $(document).ready(function(){

			$(".resulattr").hover(function(){
				$(this).addClass("hover");
			},function(){
				$(this).removeClass("hover");
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
