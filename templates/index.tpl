<{include file="$smarty_root/header.tpl" }>



  <!-- #高度容器 -->

  <!-- 轮播海报-->

  <div class="posters page">

    <span class="J_contro_dot pos_a contro-dot"></span>

    <ul class="J_posters">

      <li>
        <img src="<{$rootpath}>/themes/site_themes/LandMover/images/palacosbanner.jpg" />
      </li>

      <li>
        <img src="<{$rootpath}>/themes/site_themes/LandMover/images/ovbanner.jpg" />
      </li>

      <li>
        <img src="<{$rootpath}>/themes/site_themes/LandMover/images/banner-0704.jpg" />
      </li>

    </ul>

  </div>

  <!-- 轮播海报End-->



<div class="active-news aboutme" id="t3">
<div class="page clearfix">
    <div class="active">
      <h4 class="ftyahei mb20">关注我们</h4>
				<ul>
					<li>·<a class='ft14' title="贺利氏被誉为顶尖的创新者" href="#" >贺利氏被誉为顶尖的创新者</a></li>
					<li>·<a class='ft14' title="银灰蝶属Univero™ i60诊断盒在德国营销" href="#" >银灰蝶属Univero™ i60诊断盒在德国营销</a></li>
					<li>·<a class='ft14' title="银灰蝶属和贺利氏医疗合作研制unyvero™盒" href="#" >银灰蝶属和贺利氏医疗合作研制unyvero™盒</a></li>
					<li>·<a class='ft14' title="南非：Palacos®销售和营销活动正在进行" href="#" >南非：Palacos®销售和营销活动正在进行</a></li>
					<li>·<a class='ft14' title="局新型抗生素载骨替代结合肌皮瓣pedicular密封" href="#" >局新型抗生素载骨替代结合肌皮瓣pedicular密封</a></li>
					<li>·<a class='ft14' title="南非：Palacos®销售和营销活动正在进行" href="#" >南非：Palacos®销售和营销活动正在进行</a></li>
					<li>·<a class='ft14' title="局新型抗生素载骨替代结合肌皮瓣pedicular密封" href="#" >局新型抗生素载骨替代结合肌皮瓣pedicular密封</a></li>
					<li>·<a class='ft14' title="局新型抗生素载骨替代结合肌皮瓣pedicular密封" href="#" >局新型抗生素载骨替代结合肌皮瓣pedicular密封</a></li>
				</ul>
     
    </div>
    <div class="active weibo mobile">
    <h4 class="ftyahei mb20">联系我们</h4>
    <p class=" ft14 ftyahei mb10">销售热线：<span class="tel">010-58031636</span></p>
    <p class="ft14 ftyahei mb5">服务热线：<span class="tel">010-58031636</span></p>
	<p class="ft14 ftyahei mb5">咨询热线：<span class="tel">010-58031636</span></p>
    <div class="join clearfix"><span>伙伴加盟：</span><a href="<{$rootpath}>/aboutus/joinus.php">在线申请</a></div>
    <p class="pr20">地址：<br>北京市丰台区马家堡东路106号自然新天地写字楼606室</p>
    </div>
    <div class="active weibo">
    <h4 class="ftyahei mb20">告诉我们您的需求</h4>
    <form id="index-from" method="post">
	    <div class="table">
	     <div class="clearfix mb5"><span class="l fl">姓名：</span><span class="r fl"><input name="customer" class="input_text" id="i-customer" style="width: 150px;" type="text"> <input name="gender" type="radio" checked="" value="男">先生 <input name="gender" type="radio" value="女">女士</span></div>
	     <div class="clearfix mb5"><span class="l fl">电话：</span><span class="r fl"><input name="mobile" class="input_text" id="i-mobile" type="text"></span></div>
	     <div class="clearfix mb5"><span class="l fl">邮箱：</span><span class="r fl"><input name="company" class="input_text" id="i-company" type="text"></span></div>
	     <div class="clearfix mb20"><span class="l fl">需求：</span><span class="r fl"><textarea name="purpose" class="input_text" id="i-purpose" style="height: 80px;"></textarea></span></div>
	     <div class="clearfix"><span class="l fl" style="width: 200px;">感谢您对我们工作的支持与信赖！</span><span class="r fr submit"><input onclick="submitform2()" type="button" value="提交需求"></span></div>
	    </div>
    </form>
    <script>
    
var form_submit=0;
function submitform2(){
	if(form_submit){
		alert('您已经提交，请不要重复提交');
		return false;
	}
		var name = $("#i-customer").val();
		var handy = $("#i-mobile").val();
		var email = $("#i-company").val();
		var desc = $("#i-purpose").val();
		
		var nameReg = new RegExp(/^[A-z|\u4e00-\u9fa5]{1,12}$/);
		var handyReg = new RegExp(/^(?:1\d\d|15[89])-?\d{5}(\d{3}|\*{3})$/);
		var compNameReg = new RegExp(/.+/);
		var emailReg = new RegExp(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/);
		var ok = true;

		if(!nameReg.test(name)){
			alert("请填写正确的姓名");
			ok = ok && false;
			return false;
			}

		if(!handyReg.test(handy)){
			alert("请填写正确的电话");
			ok = ok && false;
			return false;
		}

		if(!emailReg.test(email)){
			alert("请填写正确的邮箱");
			ok = ok && false;
			return false;
			}
		
		if(!ok){
	
			return false;
			} else {
				// start
				var json = {};
				// 组成json数据提交,数据的name必须与当前页面的name一直
				$($('#index-from').serializeArray()).each(function(){
					json[this.name] = $.trim(this.value);
				});
				$.post("/customer/customer!save.action",{
					"fromPage" : "首页",
					"type" : "purpose",
					"content" : $.toJSON(json)
				},function(s){
					if(s == "success"){
						alert("提交成功.");
						form_submit =1;
					}else{
						alert("提交失败.");
					}
				});
		}			 
}
    </script>
    </div>
</div>

</div>


  <{include file="$smarty_root/footer.tpl" }>
