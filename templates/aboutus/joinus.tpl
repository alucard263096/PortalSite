<{include file="$smarty_root/header.tpl" }>
<link rel="stylesheet" type="text/css" href="<{$rootpath}>/themes/site_themes/LandMover/apps/cms/default/css/alone/about_company_info_contact.css?1856470724" media="screen" />


<div class="page case-relative clearfix">
 
<div class="sub-nav-box mt10 clearfix">
	<h3 class="fl">
		<em class="ft28 clr3 ftheiti">加入我们</em>
	</h3>
</div>
 
<div class="focus pos_r overh ks-focus">
	<!--焦点模块--> 
	<ul class="focus-con J_focus overh ks-focus">
		<li class="style-1">
			<p class="l">
				<span>雷德睦华诚邀您的加盟！</span>
			  	<em>公司拥有稳定成熟的产品销售市场，经营的产品为同领域中的优秀产品，公司负责德国骨水泥产品在大陆地区的渠道销售管理及市场技术支持服务。</em>
			</p>
			<p class="r">
				<img alt="公司拥有稳定成熟的产品销售市场，经营的产品为同领域中的优秀产品，公司负责德国骨水泥产品在大陆地区的渠道销售管理及市场技术支持服务。" src="<{$rootpath}>/themes/site_themes/LandMover/images/partner.jpg" data-bd-imgshare-binded="1">
			</p>
		</li>
	</ul>
	<!--控制点-->
    <span class="J_contro_dot pos_a ks-contro" id="contro-dot"></span>
	<script language="javascript">
	$(function(){
		<!--焦点图-->
	  $('.J_focus').cycle({ 
			fx:'scrollLeft',
			pager:'.J_contro_dot',
			timeout: 10000,
			speed: 300,
			pauseOnPagerHover: false
	   });
	});
	</script>
</div>
<link href="<{$rootpath}>/themes/site_themes/LandMover/apps/cms/default/css/ks.css?3344487978" rel="stylesheet" type="text/css" media="screen">
<!--加盟申请-->
<div class="application col2-set pt25 overh bg-t">
  <div class="col-1 table">
  	<p class="tip">请您准确填写下列加盟信息，以便我们能及时与您联系，达成合作！</p>
    <div class="form">
  	<form id="applicationForm">
      <dl>
        <dt class="str">您的个人信息:</dt>
        <dd></dd>
      </dl>
      <dl>
        <dt>姓名:</dt>
        <dd>
	        <input name="name" class="text1" id="name" onfocus="changeb(this)" onblur="reb(this)" type="text">
	        <big>请输入您的真实姓名</big>
        </dd>
      </dl>
      <dl>
        <dt>职务:</dt>
        <dd><input name="position" class="text1" onfocus="changeb(this)" onblur="reb(this)" type="text"></dd>
      </dl>
      <dl>
        <dt>E-mail:</dt>
        <dd>
	        <input name="email" class="text1" id="email" onfocus="changeb(this)" onblur="reb(this)" type="text">
	        <big>请输入您的邮箱地址</big>
        </dd>
      </dl>
      <dl>
        <dt>手机:</dt>
        <dd>
	        <input name="phone" class="text1" id="phone" onfocus="changeb(this)" onblur="reb(this)" type="text">
	        <big>请输入您的联系方式</big>
        </dd>
      </dl>
      <dl>
        <dt>QQ:</dt>
        <dd>
	        <input name="phone" class="text1" id="phone" onfocus="changeb(this)" onblur="reb(this)" type="text">
	        <big>请输入您的QQ号码</big>
        </dd>
      </dl>
      <dl>
        <dt class="str">您的公司信息:</dt>
        <dd></dd>
      </dl>
      <dl>
        <dt>公司名称:</dt>
        <dd>
	        <input name="companyName" class="text1" id="companyName" onfocus="changeb(this)" onblur="reb(this)" type="text">
	        <big>请输入你所在的企业名称</big>
        </dd>
      </dl>
      <dl>
        <dt>公司所在地:</dt>
        <dd><input name="companyLocation" class="text1" onfocus="changeb(this)" onblur="reb(this)" type="text"></dd>
      </dl>
      <dl>
        <dt>公司电话:</dt>
        <dd><input name="companyTelephone" class="text1" onfocus="changeb(this)" onblur="reb(this)" type="text"></dd>
      </dl>
      <dl>
        <dt>公司网址:</dt>
        <dd><input name="companyWebsite" class="text1" onfocus="changeb(this)" onblur="reb(this)" type="text"></dd>
      </dl>
      <dl>
        <dt>公司地址:</dt>
        <dd><input name="companyAddress" class="text1" onfocus="changeb(this)" onblur="reb(this)" type="text"></dd>
      </dl>
      <dl>
        <dt class="str">您的加盟信息:</dt>
        <dd></dd>
      </dl>
      <dl>
        <dt>您是否已初步了解<br>合作方式?</dt>
        <dd>
	        <input name="understandPartner" type="radio" checked="" value="是"><span>是</span>
	        <input name="understandPartner" type="radio" value="否"><span>否</span>
        </dd>
      </dl>
      <dl>
        <dt>您初步决定加盟的渠道合作伙伴<br>类型是</dt>
        <dd><input name="partnerType" class="text1" onfocus="changeb(this)" onblur="reb(this)" type="text"></dd>
      </dl>
      <dl>
        <dt>您希望进一步了解的信息是</dt>
        <dd><input name="wantKnow" class="text1" onfocus="changeb(this)" onblur="reb(this)" type="text"></dd>
      </dl>
      <dl>
        <dt>&nbsp;</dt>
        <dd>
	        <input class="subBtn submit btns" type="button" value="提交" ftype="application">
	        <input class="reset btnr" type="reset" value="重置">
        </dd>
      </dl>
      </form>
    </div>
  </div>
  <div class="col-2 thanksword">
   <span>感谢您选择加盟雷德睦华！除在线申请外您还可以通过如下方式联系我们或了解相关信息：</span>
    <p><a href="<{$rootpath}>/aboutus/contactus.php" target="_blank">联系当地机构 &gt;</a></p>
    <p><a href="<{$rootpath}>/aboutus/contactus.php">微信关注我们 &gt;</a></p>
    <p><a href="<{$rootpath}>/product/index.php" target="_blank">在线了解产品 &gt;</a></p>
  </div>
</div>
<!--加盟申请 结束--> 
<link href="<{$rootpath}>/themes/site_themes/LandMover/apps/cms/default/css/alone/partner_application.css?3793055854" rel="stylesheet" type="text/css" media="screen">


</div>


<{include file="$smarty_root/footer.tpl" }>
