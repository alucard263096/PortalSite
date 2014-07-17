<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, maximum-scale=1.0"/>
<meta http-equiv="Cache-Control" content="no-transform" /><link rel="alternate" media="handheld" href="#" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="qc:admins" content="214437645065555546654" />
<meta name="keywords" content="私人医生,家庭医生,在线医生,医生在线咨询,全科医生,预约挂号,网上挂号" />
<meta name="description" content="薏米医生，是您及家人日常健康的“守门人”，为您提供移动问诊、健康资讯、贴心就医安排等个性化服务。让天下没有难找的医生，让市场重新为医生定价 服务热线：400-900-3333" />
<title>薏米网首页</title>
<link href="themes/site_themes/ememed/css/common.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="themes/site_themes/ememed/css/index.css" />
<link rel="stylesheet" type="text/css" href="themes/site_themes/ememed/css/validate.css" />
<link rel="stylesheet" type="text/css" href="themes/site_themes/ememed/css/doctor.css" />
<!--[if IE 6]>
<link href="themes/site_themes/ememed/css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript" src="themes/site_themes/ememed/js/jquery-1.6.min.js"></script>
<!--[if IE 6]>
<script language="javascript" src="themes/site_themes/ememed/js/DD_belatedPNG_0.0.8a-min.js"></script>
<script>
    DD_belatedPNG.fix('.fixpng, img');
</script>
<![endif]-->
<script language="javascript" src="themes/site_themes/ememed/js/jquery.validationEngine-zh_CN.js"></script>
<script language="javascript" src="themes/site_themes/ememed/js/jquery.validationEngine.js"></script>
<script language="javascript" src="themes/site_themes/ememed/js/jquery.passwordStrength.js"></script>
<script language="javascript" src="themes/site_themes/ememed/js/thickbox-compressed.js"></script>
<script language="javascript" src="themes/site_themes/ememed/js/public.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('#password1').passwordStrength({targetDiv : '#userPasswordStrength'});
    //jQuery('#password3').passwordStrength({targetDiv : '#doctorPasswordStrength'});
    jQuery("#loginform").validationEngine();
    jQuery("#userregister_form").validationEngine({scroll:true, validationEventTrigger: "blur", showOneMessage:true, autoHidePrompt:true, autoHideDelay:2000});
    jQuery("#doctorregister_form").validationEngine({scroll:true, validationEventTrigger: "blur", showOneMessage:true, autoHidePrompt:true, autoHideDelay:2000});
});

function showForm(objstr,s){
	if(objstr=='loginForm'){
		if(s){
			s--;
			$("#loginform :radio").eq(s).attr('checked','checked');
			$("#loginHeader").attr('src','themes/site_themes/ememed/images/web/loginHeader.jpg');
		}else{
			$("#loginform :radio").eq(0).attr('checked','checked');
			$("#loginHeader").attr('src','themes/site_themes/ememed/images/web/loginHeader2.jpg');
		}
	}
	
	//w = $("body").innerWidth();
	//h = $("body").innerHeight();
	w = $(document).width();
	h = $(document).height();
	//操作背景
	$(".bggray").css("display","block");
	$(".bggray").css("width",w);
	$(".bggray").css("height",h);
	$(".bggray").css("background-color","#000");
	$(".bggray").css("z-index","5");
	$(".bggray").css("opacity","0.5");
	//操作表单
	fh = $("."+objstr).innerHeight();
	fw = $("."+objstr).innerWidth();
	$("."+objstr).css("margin-left",(w-fw)/2);
	$("."+objstr).css("margin-top",'100px');
	$("."+objstr).css("display","block");
	
	
	
}

function closeForm(objstr){
	$(".bggray").css("display","none");
	$("."+objstr).css("display","none");
}

function showRegForm(num){
	/*
    if(num == 0) {
        reloadcode('user_captchaimg');
    } else {
        reloadcode('doctor_captchaimg');
    }
	*/
	
	$(".tb3 li").removeClass("a");
	$(".tb3 li:eq("+num+")").addClass("a");
	$(".regFormItem").css("display","none");
	$(".regFormItem:eq("+num+")").css("display","block");
}
function enterSubmit(e)
{
	if(window.event)
	{
	   keyPressed = e.keyCode; 
	}
	else
	{   
		keyPressed = e.which; 
	}  
	
	if(keyPressed==13)
	{ 
		$('#loginbutton').click();          
		return false;
	}
}


function showLoading(){	
	w = $("body").innerWidth();
	h = $("body").innerHeight();
	$(".bggray").css("display","block");
	$(".bggray").css("width",w);
	$(".bggray").css("height",h);
	$(".bggray").css("background-color","#000");
	$(".bggray").css("z-index","5");
	$(".bggray").css("opacity","0.5");
	fh = $(".loading").innerHeight();
	fw = $(".loading").innerWidth();
	$(".loading").css("margin-left",(w-fw)/2);
	$(".loading").css("margin-top",(h-fh)/2);
	$(".loading").css("display","block");
}
</script>

</head>

<body style="background-color:#01354b;">
<iframe id="i_frame" name="i_frame" style="display:none;"></iframe>
<!----登录背景----->
<div class="bggray absolute"></div>
<div class="loading absolute nodisplay"><img src="themes/site_themes/ememed/images/loading1.jpg" /></div>
<!----公共容器----->
<div id="pinfo" class="absolute" style="z-index:8;"></div>
<!----登录背景end----->
<!----登录表单----->
<div class="loginForm absolute nodisplay" style="z-index:8;">
	<div><img src="themes/site_themes/ememed/images/web/loginHeader.jpg" id="loginHeader" border="0" usemap="#Map" />
      <map name="Map" id="Map">
        <area shape="rect" coords="486,22,507,43" href="javascript:closeForm('loginForm');" />
      </map>
    </div>
  <div style="width:523px;" class="bgLogin">
    	<div class="PL40 PT20">
        <form id="loginform" name="loginform" action="http://www.ememed.net/member/postlogin.html" method="post" onkeydown="return enterSubmit(event);">
        	<ul class="PB20">
           	  <li class="size16"><input name="usertype" type="radio" value="user" />会员<input name="usertype" type="radio" value="doctor" class="ML20" />医生</li>
              <li class="MT10 size14"><input id="username" name="username" type="text" class="validate[required] pinput " style="width:300px;" tabindex="2" /> 
              <a href="javascript:;" onclick="closeForm('loginForm');showForm('regForm');showRegForm(1);" style="background-color:#DE3347
;padding:5px 10px;margin-left:2px;margin-right:2px;color:#fff;" tabindex="5">医生注册</a>  <a href="javascript:;" onclick="closeForm('loginForm');showForm('regForm');showRegForm(0);" style="background-color:#00A04A
;padding:5px 10px;color:#fff;" tabindex="5">会员注册</a></li>
                <li class="MT10 size14"><input id="password" name="password" type="password" class="validate[required] pinput" style="width:300px;" tabindex="3" /> 
                <a href="http://www.ememed.net/member/lostpasswd.html?width=847&height=330&modal=true" class="thickbox" tabindex="6">忘记密码？</a></li>
                <li class="MT10 size14"><input type="hidden" id="huodong130420content_login" name="huodong130420content_login" value="" />
									<input name="" id="loginbutton" type="image" src="themes/site_themes/ememed/images/web/btLogin.jpg" tabindex="4" />
				 </li>
            </ul>
        </form>
        </div>
    </div>
</div>
<!----登录表单end----->
<!----注册表单----->
<div class="regForm absolute nodisplay" style="z-index:8; width:827px;">
	<div class="bgReg TR">
    	<ul class="Fleft tb3">
            <li class="a"><a href="javascript:;" onclick="showRegForm(0)">用户注册</a></li>
            <li><a href="javascript:;" onclick="showRegForm(1)">医生注册</a></li>
        </ul>
    	<ul class="Fright">
        	<li><img src="themes/site_themes/ememed/images/web/imgRegHeader.jpg" align="top" /><a href="javascript:;" onclick="closeForm('regForm')"><img src="themes/site_themes/ememed/images/web/cha2.jpg" align="top" style="margin:22px 21px 0px 32px; border:none;" /></a></li>
        </ul>
    </div>
    <div class="BG_e0f2f0">
    	<!----用户注册表单----->
    	<div class="PT20 regFormItem">
        <form id="userregister_form" name="userregister_form" action="http://www.ememed.net/member/userregister.html" method="post" target="i_frame">
        	<ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>用户名：</li>
                <li class="Fleft"><input id="user_username" name="username" type="text" class="validate[required,minSize[4],maxSize[16],custom[onlyLetterNumber],ajax[ajaxUserCall]] pinput" /></li>
                <li class="Fleft alertInfo">4~16位英文字母开头的英文字母或数字，不能用中文</li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>请创建一个密码：</li>
                <li class="Fleft"><input type="password" id="password1" name="password" maxlength="50" class="validate[required,minSize[4],maxSize[16]] pinput" /></li>
                <li class="Fleft alertInfo LH30">请用英文字母、数字，4－16位均可<span class="color7">（请注意您的密码强度!）</span></li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR">密码强度：</li>
                <li class="Fleft passwordstrength"><div id="userPasswordStrength" class="is0"></div></li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>请再次键入密码：</li>
                <li class="Fleft"><input type="password" id="password2" name="password2" maxlength="50" class="validate[required,minSize[4],maxSize[16],equals[password1]] pinput" /></li>
                <li class="Fleft alertInfo LH30">以确保密码正确输入</li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>语音密码：</li>
                <li class="Fleft"><input type="password" id="user_subpassword" name="subpassword" maxlength="6" class="validate[required,minSize[6],maxSize[6],custom[onlyNumberSp]] pinput" /></li>
                <li class="Fleft alertInfo LH30">6位数字语音密码，不能用英文和中文</li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>性别：</li>
                <li class="Fleft"><input type="radio" id="sex" name="sex" checked="checked" value="1" />男<input type="radio" id="sex" name="sex" value="0" />女</li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>我的邮箱：</li>
                <li class="Fleft"><input type="text" id="user_email" name="email" maxlength="60" class="validate[required,custom[email],ajax[ajaxEmailCall]] pinput" /></li>
                <li class="Fleft alertInfo LH30">认证和找回密码时使用，务必填写正确</li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>手机：</li>
                <li class="Fleft"><input type="text" id="user_mobile" name="mobile" maxlength="11" class="validate[required,minSize[11],maxSize[11],custom[onlyNumberSp],custom[mobile],ajax[ajaxMobileCall]] pinput" /></li>
                <li class="Fleft alertInfo LH30">用来确认您的身份，绝对不公开您的手机号。</li>
            </ul>
<ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>验 证 码：</li>
                <li class="Fleft"><input type="text" id="user_authcode" name="user_authcode" maxlength="10" class="validate[required] pinput" /></li>
                <li class="Fleft alertInfo LH30"><img src="/captcha.html" id="user_captchaimg" class="vm"> 看不清，<u><a href="javascript:;" class="color5" onclick="reloadcode('user_captchaimg');">换一张</a></u></li>
            </ul>
            <ul class="clear">
                <li class="Fleft TR">&nbsp;</li>
                <li class="Fleft"><a href="#TB_inline?height=500&width=700&inlineId=userProtocol&modal=true" class="thickbox"><input type="checkbox" id="usercheckis" name="user_checkis" value="1" class="validate[required]" checked="checked" />我已看过并同意 《薏米网服务条款》</a></li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR"><input type="hidden" id="huodong130420content_reg" name="huodong130420content_reg" value="" />&nbsp;</li>
				              <li class="Fleft"><a href="#" onclick="javascript:reg_loginbtn();" ><img name="userlogin_button" id="userlogin_button" src="themes/site_themes/ememed/images/web/btLogin1.jpg" style="border:none;position:relative;top:15px;top:12px\9;display:none;" /></a> <input name="userreg_submit" id="userreg_submit" type="image" src="themes/site_themes/ememed/images/web/btReg.jpg" align="absmiddle" class="MR10" style="width:101px;height:37px;border:none;" onclick="submit();return false;" /><span class="color7">*</span>为必填项</li>
			              </ul>
            <ul class="clear"></ul>
        </form>

            <div id="userProtocol" style="display:none">
                <div class="size16 PB5">《薏米网用户注册服务条款》</div>
                <div style="width:700px;height:430px;overflow:auto" class="c PB15 size14">
                    <p>温馨提醒： </p>
<p>您成为薏米网会员之前，请仔细阅读本协议各项条款，在清楚了解您可享受的权利和应履行的义务后，自愿与薏米网签订协议，成为薏米网正式会员。 </p>
<p> </p>
<p>一、定义说明 </p>
<p>（一）注册用户：您在薏米网用真实、有效的个人资料注册一个帐号后成为注册用户。 </p>
<p>（二）签约会员：您在成为注册用户后，与薏米网签约，并通过薏米网各付费渠道支付会员月费后成为签约会员。 </p>
<p> </p>
<p>二、会员资格 </p>
<p>（一）您须是中国法律规定的具备完全民事权利能力和行为能力的自然人。 </p>
<p>（二）您须是薏米网的注册用户。 </p>
<p> </p>
<p>三、会员开通服务 </p>
<p>    您在薏米网上注册开通一个帐户，成为薏米网的注册用户后，与网站签约绑定您需要的医生，并通过以下途径开通会员服务功能： </p>
<p>（一）您在3天内通过网银在薏米帐户里充值多于一个月的会员月费。 </p>
<p>（二）您到薏米网合作银行柜台开通会员月费划扣帐户。 </p>
<p>四、会员资料 </p>
<p>（一）您在注册与办理开通帐户手续时，应向薏米网提供真实、准确、有效的个人资料，并对资料变更时及时更新到薏米网，以便薏米网可及时与您联系。 </p>
<p>（二）薏米网对您的资料依法保密，但为了双方良好沟通，提升对您的服务质量，薏米网在您的允许下可以使用您的个人资料。 </p>
<p>（三）会员帐号和密码是重要资料，您应及时修改初始密码并注意保密。您的密码遗失或被盗，应及时进行修改，或提交有效证件到薏米网申请协助。 </p>
<p> </p>
<p>五、服务内容 </p>
<p>（一）签约套餐服务：是指您与平台签约后享受的基本套餐服务。 </p>
<p>1、医生咨询：指网站签约会员通过互联网、呼叫中心、手机终端、录音、现场等多种渠道联系薏米网，提出疾病或健康方面的咨询，您的签约医生根据双方约定的时间和方式，提供解决问题的办法及建议。 </p>
<p>2、分诊转诊：由您所签约的私人医生推荐、经您同意后，把咨询话题转交给所签约医生关联列表内的另一个医生。在您选择的时间段内，由受托医生通过网站回拨您的电话，解答咨询。 </p>
<p>3、名医加号：指医生为您提供的紧急病情加号服务。您通过互联网、呼叫中心、手机客户端等途经提出加号申请，经薏米网和医生审核通过后，您凭手机短信等成功加号凭据在预约时间内到指定医院就诊。 </p>
<p>4、体检报告解读：指您把电子或纸质体检报告提交给薏米网转交至签约医生，医生就该报告作出客观专业的分析和保健建议。 </p>
<p>5、薏米沙龙：指医生在薏米网的同业见面会、联谊会、专业讲座、旅游等为增加会员与医生深度交流机会的活动。 </p>
<p>6、院内陪诊：覆盖各医院，给您提供预约、取号、看诊、交费、检查、取药、治疗、取读检查结果等一条龙院内陪诊服务，节省时间、流程顺畅。 </p>
<p>7、医生改签：为满足您在不同阶段对私人医生服务的个性化要求，薏米网为会员提供的医生改签服务。会员可在与签约医生服务至少三个月后，提出更换私人医生需求。具体改签费用规定见产品服务说明。 </p>
<p>8、轻松挂号：为您提供的医院挂号预约服务。您通过呼叫中心、互联网、手机终端、医院现场服务点等渠道预约，在约定时间内到医院服务点取号。 </p>
<p>9、薏米宝典：为您提供的短/彩信服务，有针对性地从衣食住行入手，提供您的签约医生的相关信息、公共健康信息、医院义诊、慢性病防治类的健康讲座等实用信息。 </p>
<p>10、薏米助理：是为您配置的秘书级人工健康助理服务，负责处理您的各类预约申请、会诊转诊安排、发布医生在线情况、协助您处理院内加号流程、并承担您平日的健康养生提醒等。 </p>
<p>11、健康档案：自您签约时起即建立的私密型个人健康档案，记录体检结果、最新健康状况、咨询内容、诊疗记录等，及时有效地为您保健提供最新、最准确的信息和依据，并提供多渠道方便快捷的登录查询和修改功能。 </p>
<p>（二）单次购买服务：是指您除签约套餐外付费购买的单次服务。 </p>
<p>12、住院直通车：指医生为薏米网签约会员提供的转院住院服务，您通过互联网、呼叫中心提出转院住院需求，经由医生依据其情况审阅同意后，负责协助联系和申请您需要的医院，并为您落实床位、主治医生等附加服务。 </p>
<p>13、预约上门：指您随时随地通过互联网、呼叫中心、手机终端、现场咨询等多种渠道联系医生或薏米助理，申请预约到家服务，由医生审核通过后，在约定时间和地点提供服务。 </p>
<p> </p>
<p>六、费用标准和费用交纳 </p>
<p>（一）薏米网按照确认的服务标准向会员收取费用，会员应及时、足额支付费用。 </p>
<p>（二）当会员的薏米网帐户余额不足以支付拟使用的服务费用时，应及时充值。 </p>
<p>（三）您选择银行托收、银行代扣等方式支付服务费用时，需到薏米网合作银行等托收机构办理相应手续。 </p>
<p>（四）您若欠费，应补交欠费才能享受次月的服务。 </p>
<p> </p>
<p>七、会员权利和义务 </p>
<p>（一）会员权利 </p>
<p>1、您有权自主选择薏米网业务。 </p>
<p>2、您有权享受基本套餐服务、以及购买单次服务，并享受由此带来的优质的健康管理服务。 </p>
<p>3、您有权通过薏米网结识您需要的医生并获得其针对性的健康管理指导。 </p>
<p>4、您有权通过薏米网结识与您有相同健康管理需求的用户的交流机会。 </p>
<p>5、您有权获得薏米网为您提供的薏米助理人工服务。 </p>
<p>6、您有权享受薏米网为您提供的第一个月无条件退款期服务。您在购买套餐服务后一个月内对服务有任何不满，均可提出退款申请。您在无使用任何服务情况下，薏米网将全额退款；您在已使用服务情况下，薏米网将根据您使用的服务具体情况，扣除已发生的实际成本后退回余额。 </p>
<p>（二）会员义务 </p>
<p>1、您应保证薏米帐户或您提供的银行代扣帐户中有可供划扣的费用。若余额不足以抵扣该月会员月费，请及时充值。 </p>
<p>2、您应提供真实、准确、完整及有效的本人注册信息和开通帐户所需信息，并对信息及时更新，保证薏米网可以及时与您联系。 </p>
<p>3、您在薏米网的签约会员资格属于您本人使用。如发现他人使用您的签约会员资格，为保障您的帐户安全，薏米网将暂视为您的帐户被盗用，冻结您的帐户及不再提供服务。您本人提交解冻申请，薏米网审核真实性并通过后，帐户自动解封。 </p>
<p>4、您应遵守诚实信用的原则，遵守所有使用网络服务的网络协议、规定、程序和惯例，不传输任何非法的、骚扰性的、中伤他人的、辱骂性的、恐吓性的、伤害性的、庸俗的，淫秽、教唆他人构成犯罪行为、助长国内不利条件和涉及国家安全的、任何不符合当地法规、国家法律和国际法律的资料。 </p>
<p> </p>
<p>八、薏米网权利和义务 </p>
<p>（一）薏米网权利 </p>
<p>1、薏米网有权每月从您薏米帐户或您提供的银行帐户中扣除您所选择的服务的费用。 </p>
<p>2、薏米网应对您在薏米网不当的言论与行为及时制止，情节严重的保留追究法律责任的权利。 </p>
<p>3、薏米网有合法利用网站数据的权利。 </p>
<p>（二）薏米网义务 </p>
<p>1、薏米网应制定网站的服务规范、具体管理规则、使用规则以及服务费用结算模式，保证网站的规范运营。 </p>
<p>2、薏米网应保护注册用户和签约会员的个人信息及隐私（签约时同意设定为对公众开放的信息除外）。 </p>
<p>3、薏米网应维护网络平台的稳定运行，保证注册用户和签约会员可以顺利从各个渠道享受服务。 </p>
<p>4、薏米网应维护网站的正常运作，如因系统维护或升级需暂停网络服务，甲方应事先以网站通告的方式通知注册用户和签约会员。 </p>
<p>5、薏米网有义务为签约会员配置薏米助理。 </p>
<p> </p>
<p>九、特别约定 </p>
<p>（一）薏米网的所有服务基于您提供的真实信息而产生，若因个人信息问题出现服务延误，本网不承担任何责任。 </p>
<p>（二）您的签约医生有权根据您的具体情况、预约情况等决定是否通过预约申请。 </p>
<p>（三）鉴于临床工作特殊性，您的医生遇到抢救、急诊等特殊事件，有可能延后甚至取消预约和咨询，薏米网会第一时间通知您。 </p>
<p>（四）若要取消服务订单，请您根据该项服务的规定提前通知薏米网，否则按爽约处理，爽约次数达到一定数量，薏米网将考虑不再为您提供服务。 </p>
<p>（五）薏米网的基本套餐费用不包括您的挂号费、就诊费、检查费、治疗费、药费、咨询通话费等除咨询服务费以外的其他费用。 </p>
<p>（六）注册成功后，您必须保护自己的帐号和密码，因本人泄露而造成的任何损失，由本人负责。 </p>
<p> </p>
<p>十、免责声明 </p>
<p>（一）预约挂号成功以薏米助理或通知短信通知为准。仅凭证短信作为预约挂号或加号凭证的预约，如因短信通道故障导致发送不成功和延迟发送，薏米网不承担相关责任。 </p>
<p>（二）您的医生会根据您提供的信息给予解答和指导，您的病情信息均需自行提供，并确保及时、准确，信息有误造成的后果薏米网和医生均不负任何责任。 </p>
<p>（三）薏米网医生咨询服务不能代替到医院就诊，医生审核预约及咨询解答可能因其临床特殊性而延迟。若病情严重、发生急性症状、化验结果严重异常等紧急情况下，需要尽快到正规医院就医，因等待咨询回复而造成的严重后果，薏米网不承担任何责任。 </p>
<p>（四）任何关于疾病建议均不能替代执业医师的面对面诊断。用户、会员、医生言论仅代表其个人观点，不代表薏米网同意其说法，不承担由此引起的法律责任。 </p>
<p>（五）薏米网不对用户所发布信息的删除或储存失败负责。 </p>
<p>（六）薏米网各种服务、市场推广、资讯服务、短信提醒服务、结算服务等技术和运营服务，均遵守《互联网信息服务管理办法》、《互联网电子公告服务管理规定》、《互联网医疗卫生信息服务管理办法》等国家有关卫生管理法律法规前提下开展，用户和会员完全知悉并理解国家对医疗行业的法律限制，亦完全知悉如下内容： </p>
<p>1、薏米网所提供的服务是国家法律法规规定的卫生信息服务，不属于网上诊疗。   </p>
<p>2、薏米网与其他第三方合作所开展的其他活动，包括但不限于药品信息服务，薏米网仅作为技术服务平台及信息提供方。 </p>
<p>（七）由于不可抗力，如战争、自然灾害等，导致本协议不能履行的，双方均不需承担违约责任。 </p>
<p> </p>
<p>十一、版权声明 </p>
<p>薏米网站平台定义内容包括：文字、软件、声音、相片、录像、图表、电子邮件、站内短信等全部内容、为用户提供的其他信息。以上信息均受版权、商标、标签和其他财产所有权法律保护。用户只能在薏米网授权下才能使用这些内容，不能擅自复制、再造或创造与这些内容有关的派生产品。薏米网所有内容版权归原文作者和薏米网共同所有，任何人需要转载均须获得授权。 </p>
<p> </p>
<p>十二、信息使用和披露 </p>
<p>（一）信息使用 </p>
<p>1、薏米网不会向任何人出售或出借您的个人信息，除非事先得到您的许可。 </p>
<p>2、为达到服务用户的目的，薏米网可使用您的个人信息向您提供服务，包括但不限于通过电话、邮箱等形式向您发出活动和服务信息等。 </p>
<p>（二）信息披露<br />
  您的个人信息将在下述情况下部分或全部被披露：<br />
  1、经您同意后向第三方披露。 </p>
<p>2、如您是符合资格的知识产权投诉人并已提起投诉，应被投诉人要求向被投诉人披露，以配合双方处理纠纷。<br />
      3、根据法律有关规定或行政司法机构要求，向第三方或者行政司法机构披露。<br />
      4、您有违反中国有关法律或网站政策情况，需要向第三方披露。<br />
      5、为提供你所要求的产品和服务时和第三方分享您的个人信息。<br />
      6、其他根据法律或者网站政策认为合适的披露。 </p>
<p> </p>
<p>十三、协议组成和解释 </p>
<p>（一）本服务协议各个条款之间效力独立，如遇国家法律法规、政府指令或司法实践的任何变化，导致本服务协议的任何条款成为非法、无效或者失去强制执行性的，本服务协议其他任何条款的合法性、有效性和强制性不受影响。 </p>
<p>（二）薏米网保留在不事先通知的情况下不定时修改本协议的权利。如本协议签署时发生修改的，用户和会员可以选择自行注销或申请删除用户名和密码，则薏米网与用户之间的合同法律关系同时终止。如用户和会员在本协议修改后继续使用原有用户名和密码登陆薏米网或享受薏米网服务的，则视为用户和会员认同和接受该等修改。 </p>
<p>（三）凡因解释或执行服务协议所发生的或与本服务协议有关的一切争议均应适用中国法律。<br />
</p>
<p>十四、违约赔偿 </p>
<p>    在合作过程中，如因任一方违反有关法律、法规或本协议条款项下的任何条款，而给对方或任何第三方造成损失的，须承担由此造成的损害赔偿责任。 </p>
<p> </p>
<p>十五、法律管辖<br />
      （一）本协议条款的订立、执行和解释及争议的解决均适用中国法律。 </p>
<p>（二）如双方就本协议条款内容在执行过程中发生任何争议，双方应尽量友好协商解决；协商不成时，任何一方均可向所在地人民法院提起诉讼。 </p>
<p> </p>
<p>十六、附则 </p>
<p>（一）薏米网保留因技术进步或国家政策变动等原因对薏米网服务的服务功能、操作方法等做出调整的权利，但调整时应提前告知用户和会员并提供相应解决方案。 </p>
<p>（二）您点击&ldquo;同意&rdquo;键即视为您自愿签署本协议。本协议自您签署之时起生效，有效期至您申请注销或网站注销用户名为止。</p>
                </div>
                <div style="text-align:center">
                <button onclick="$('#usercheckis')[0].checked = true;tb_remove();" class="byBtn2 MR5"><span>同意</span></button>  
                <button onclick="$('#usercheckis')[0].checked = false;tb_remove();" class="byBtn2"><span>不同意</span></button>
                </div>
            </div>
        
        </div>
        <!----用户注册表单end----->
        <!----医生注册表单----->
        <div class="PT20 regFormItem nodisplay">
        <form id="doctorregister_form" name="doctorregister_form" action="http://www.ememed.net/member/doctorregister.html" method="post" enctype="multipart/form-data" target="i_frame">
		<div style="margin:auto;background-color:#FFD778;width:740px;padding:10px 30px;display:none;">
		<img src="themes/site_themes/ememed/images/web/lastest_ad.jpg" /><br />
		<span style="color:#ff0000;font-size:18px;">医生注册即送话费大礼！</span><br />
		<span style="color:#3B3B3B;">活动期间，医生注册并审核通过成为“薏米医生”的，即可获得话费赠送。<br />
		话费按职称赠送：主任医师：150元；副主任医师：100元；主治医师：50元，主治级以下：30元。</span>
		</div>
        	<!--<ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>用户名：</li>
                <li class="Fleft"><input type="text" id="doctor_username" name="username" class="validate[required,minSize[4],maxSize[16],custom[onlyLetterNumber],ajax[ajaxUserCall]] pinput" /></li>
                <li class="Fleft alertInfo">4~16位英文字母开头的英文字母或数字，不能用中文</li>
            </ul>-->
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>专业属性：</li>
                <li class="Fleft"><input type="radio" name="allowfreeconsult" value="1"/>全科医生<input type="radio" name="allowfreeconsult" value="0"/>专科医生</li>
            </ul>
            <ul class="clear" style="padding-top:0px;">
            	<li class="Fleft TR">&nbsp;</li>
                <li class="Fleft"><span style="font-size:12px;font-weight:bolder;">如您就职医院的级别是<span style="color:red;">二级甲等以下</span>建议注册为全科医生，<br>就职医院的级别是<span style="color:red;">二级甲等以上（包括二级甲等）</span>建议注册为专科医生。          
                </li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>真实姓名：</li>
                <li class="Fleft"><input type="text" id="realname" name="realname" class="validate[required,minSize[2],maxSize[20]] pinput" /></li>
                <li class="Fleft alertInfo">医生身份核实请基于真实姓名</li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>性别：</li>
                <li class="Fleft"><input type="radio" id="sex" name="sex" checked="checked" value="1" />男<input type="radio" id="sex" name="sex" value="0" />女</li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>请创建一个密码：</li>
                <li class="Fleft"><input type="password" id="password3" name="password" maxlength="50" class="validate[required,minSize[4],maxSize[16]] pinput" /></li>
                <li class="Fleft alertInfo LH30">请输入6－20位的英文字母或数字</li>
            </ul>
            
			<!--
            <ul class="clear">
            	<li class="Fleft TR">密码强度：</li>
                <li class="Fleft passwordstrength"><div id="doctorPasswordStrength" class="is0"></div></li>
            </ul>-->
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>请再次键入密码：</li>
                <li class="Fleft"><input type="password" id="password4" name="password2" maxlength="50" class="validate[required,minSize[4],maxSize[16],equals[password3]] pinput" /></li>
                <li class="Fleft alertInfo LH30">以确保密码正确输入</li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>手机：</li>
                <li class="Fleft"><input type="text" id="doctor_mobile" name="mobile" maxlength="11" class="validate[required,custom[onlyNumberSp],custom[mobile],ajax[ajaxMobileCall]] pinput" /></li>
                <li class="Fleft alertInfo LH30"><u><a href="javascript:;" class="color5" onclick="send_validcode('doctor_mobile');">获取短信验证码</a></u></li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR">&nbsp;</li>
                <li class="Fleft"><span style="color:red;font-size:14px;font-weight:bolder;">手机号即薏米医生登录帐号</span></li>
                <li class="Fleft alertInfo LH30"></li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>短信验证码：</li>
                <li class="Fleft"><input type="text" id="doctor_authcode" name="doctor_authcode" maxlength="10" class="validate[required] pinput" /></li>
                <li class="Fleft alertInfo LH30"></li>
            </ul>
			<!--
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>语音密码：</li>
                <li class="Fleft"><input type="password" id="doctor_subpassword" name="subpassword" maxlength="6" class="validate[required,minSize[6],maxSize[6],custom[onlyNumberSp]] pinput" /></li>
                <li class="Fleft alertInfo LH30">6位数字语音密码，不能用英文和中文</li>
            </ul>-->
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>我的邮箱：</li>
                <li class="Fleft"><input type="text" id="doctor_email" name="email" maxlength="60" class="validate[required,custom[email],ajax[ajaxEmailCall]] pinput" /></li>
                <li class="Fleft alertInfo LH30"><span style="color:red;font-size:14px;font-weight:bolder;">需要进行验证，请正确填写</span></li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>证件类型：</li>
                <li class="Fleft">
					<select id="cardtype" name="cardtype" class="pinput">
						<option value="01" >居民身份证</option>
						<option value="02" >港澳台居民身份证</option>
						<option value="03" >居民户口簿</option>
						<option value="04" >护照</option>
						<option value="05" >军（警）官证</option>
						<option value="06" >文职干部证</option>
						<option value="07" >士兵证</option>
						<option value="08" >驾驶执照</option>
						<option value="09" >残疾证</option>
						<option value="10" >出生证明</option>
						<option value="11" >其他</option>
					</select>
				</li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>证件号码：</li>
                <li class="Fleft"><input type="text" id="cardnumber" name="cardnumber" maxlength="18" class="validate[required,custom[cardidType]] pinput" /></li>
                <li class="Fleft alertInfo LH30">用来确认您的身份。</li>
            </ul>
			<!--
            <ul class="clear">
            	<li class="Fleft TR">证件图片：</li>
                <li class="Fleft"><input type="file" id="cardfile" name="cardfile" class="pinput" /></li>
                <li class="Fleft alertInfo LH30"></li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR">医生执业证书编号：</li>
                <li class="Fleft"><input type="text" id="certificatenum" name="certificatenum" maxlength="100" class="pinput" /></li>
                <li class="Fleft alertInfo LH30">用来确认您的身份。</li>
            </ul>-->
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>医师执业证书图片：</li>
                <li class="Fleft"><input type="file" id="certificate" name="certificate" class="pinput" /></li>
                <li class="Fleft alertInfo LH30"></li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>所在医院：</li>
                <li class="Fleft"><input type="text" id="hospitalname" name="hospitalname" class="validate[required,minSize[2],maxSize[20]] pinput" /></li>
                <li class="Fleft alertInfo"></li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>所在科室：</li>
                <li class="Fleft"><input type="text" id="roomname" name="roomname" class="validate[required,minSize[2],maxSize[20]] pinput" /></li>
                <li class="Fleft alertInfo"></li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR"><span class="color7">*</span>职称：</li>
                <li class="Fleft"><input type="text" id="professional" name="professional" class="validate[required,minSize[2],maxSize[20]] pinput" /></li>
                <li class="Fleft alertInfo"></li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR">&nbsp;</li>
                <li class="Fleft"><a href="#TB_inline?height=500&width=700&inlineId=doctorProtocol&modal=true" class="thickbox"><input type="checkbox" id="doctorcheckis" name="doctor_checkis" value="1" class="validate[required]" checked="checked" />我已看过并同意 《薏米网服务条款》</a></li>
            </ul>
            <ul class="clear">
            	<li class="Fleft TR">&nbsp;</li>
				              <li class="Fleft"><input type="image" src="themes/site_themes/ememed/images/web/btreg.png" align="absmiddle" class="MR10" /><span class="color7">*</span>为必填项</li>
			              </ul>
            <ul class="clear"></ul>
        </form>
        
                <div id="doctorProtocol" style="display:none">
                    <div class="size16 PB5">《薏米网医生注册服务条款》</div>
                    <div style="width:700px;height:430px;overflow:auto" class="c PB15 size14">
                        <p>温馨提醒： </p>
<p>您在成为薏米网合作伙伴之前，敬请仔细阅读本协议各项条款，在清楚了解您可享受的权利和应履行的义务后，自愿与薏米网签订协议，成为薏米网正式合作伙伴。 </p>
<p> </p>
<p>一、 主体 </p>
<p>甲方：广州薏生网络科技有限公司<br />
  乙方：合作伙伴<br />
  合作内容：通过甲方服务平台向甲方签约用户提供各项服务，包括医生咨询、体检报告解读、住院直通车、预约上门、个人健康季评、薏米沙龙等，您可根据自身情况灵活选择。 </p>
<p> </p>
<p>二、 合作方式 </p>
<p>（一） 合作内容 </p>
<p>具体合作内容详见附件一。 </p>
<p>（二）双方权利义务 </p>
<p>1、甲方权利 </p>
<p>（1）甲方的签约会员可享受乙方为其提供的合作内容中的服务。 </p>
<p>（2）甲方可审核乙方资质及其真实性，乙方通过医师资质审核后成为甲方合作伙伴。 </p>
<p>（3）甲方有合法利用乙方在服务过程中网站平台上产生的用户行为数据的权利。 </p>
<p>2、甲方义务 </p>
<p>（1）甲方制定网站的服务规范、具体管理规则、使用规则以及服务费用的分配规则。 </p>
<p>（2）甲方保护乙方的个人信息及隐私（签约时乙方同意设定为对公众开放的除外）。 </p>
<p>（3）甲方维护网络平台的稳定运行，保证乙方可以顺利以在线方式提供服务。 </p>
<p>（4）甲方为乙方对自身的宣传和推广提供必要的便利。 </p>
<p>（5）甲方按约定结算方式向乙方定期支付劳务费用，并根据乙方提供服务的质量对乙方进行考核，根据考核结果进行奖励（具体标准见附件二）。 </p>
<p>（6）甲方维护网站的正常运作，如因系统维护或升级需暂停网络服务，甲方应事先以公告等方式告知乙方。 </p>
<p>（7）甲方有为乙方配置人工助理的义务。 </p>
<p>3、乙方权利 </p>
<p>（1）乙方可享受甲方平台提供的客户资源、行业资源。 </p>
<p>（2）乙方可利用甲方平台提供的服务数据进行学术研究，及应用于论文写作中的数据支持等，但不得侵犯甲方的商业秘密以及用户的个人隐私。 </p>
<p>（3）乙方可参加甲方组织的行业论坛、学者讲座等活动，获取最新行业资讯以及与权威学者交流的机会， </p>
<p>（4）乙方可享受甲方为提高乙方服务质量、减轻乙方工作负担而提供的人工助理服务。 </p>
<p>（5）乙方可依据本协议的结算规则条款获得相应的服务报酬。 </p>
<p>4、乙方义务 </p>
<p>（1）乙方应按协议要求向网站提供个人真实资料并确保其合法性，并应在向签约会员提供服务时公开本人真实姓名、工作单位、职称、执业简历、技术专长等资料。 </p>
<p>（2）乙方向甲方签约用户提供本协议&ldquo;二、合作方式&rdquo;的服务内容时应保证服务质量，保证所有行为均遵守国家法律、法规及双方约定的相关规则（具体规则见附件三）。 </p>
<p>（3）乙方在服务过程中如有违法或严重不当行为导致与用户发生纠纷或监管部门处罚时，应当承担相应责任。 </p>
<p> </p>
<p>三、协议的变更、解除和终止<br />
  （一）双方达成一致意见时，可以补充协议的方式对本协议内容进行变更或终止；该变更或终止不影响甲方与其他合作伙伴签订的合作协议的权利义务关系。 </p>
<p>（二）如发生以下情况，如一方发生以下情况，对方有权解除本协议： </p>
<p>1、乙方受到行政处罚或刑事处罚。 </p>
<p>2、乙方丧失相关资质。 </p>
<p>3、乙方所提供的服务致使甲方遭受严重损失或引致政府主管部门的处罚。 </p>
<p>4、乙方在合作过程中严重违反本协议及双方约定的相关规则。 </p>
<p>5、甲方未能按本协议相关条款提供平台以供乙方为签约会员服务。 </p>
<p>6、甲方未能按本协议相关条款按时向乙方支付相关劳务费用。<br />
  （三）本协议解除或终止后，甲方保留以下权利：<br />
      1、甲方有权保留乙方在甲方网站签约帐号下的所有数据。 </p>
<p>2、合作过程中因乙方原因给甲方或甲方客户造成损失，甲方保留追偿的权利。 </p>
<p> </p>
<p>四、违约赔偿 </p>
<p>    在合作过程中，如因任一方违反有关法律、法规或本协议条款项下的任何条款，而给对方或任何第三方造成损失的，须承担由此造成的损害赔偿责任。<br />
  <br />
  五、法律管辖<br />
      （一）本协议条款的订立、执行和解释及争议的解决均适用中国法律。 </p>
<p>（二）如双方就本协议条款内容在执行过程中发生任何争议，双方应尽量友好协商解决；协商不成时，任何一方可提起诉讼，由甲方所在地人民法院管辖。 </p>
<p> </p>
<p>六、特别约定 </p>
<p>（一）如本协议中的任何条款因任何原因完全或部分无效或不具有执行力，其余条款仍有效且具有约束力。 </p>
<p>（二）乙方在提供服务过程中，应本着勤勉尽责的工作原则为签约会员服务。 </p>
<p>（三）乙方有责任明确告知签约会员，咨询所获得的回答只能作为参考，不应作为诊断和治疗的依据，不能代替正式的诊疗结果。 </p>
<p>（四）乙方不得在甲方网站上发布可能涉及医疗纠纷的问题及咨询意见。 </p>
<br clear="all" />
<p>  </p>
<p>附件一：合作内容 </p>
<p>一、基本合作内容 </p>
<p>指乙方应为签约会员提供的基本套餐服务。双方正式合作后，网站系统自动默认乙方可为签约会员提供以下基本服务。 </p>
<p>（一）医生咨询服务：指网站签约会员通过互联网、呼叫中心、手机终端、录音、现场等多种渠道联系乙方，提出疾病或健康方面的咨询，乙方根据双方约定的时间和方式，提供解决问题的办法及建议。 </p>
<p>（二）体检报告解读服务：指网站签约会员把电子或纸质体检报告上传至其个人网上健康档案内，乙方就该报告作出客观专业的分析和保健建议。 </p>
<p>（三）名医加号服务：指乙方为签约会员提供的紧急病情加号服务，签约会员通过互联网、呼叫中心、手机客户端等途经提出加号申请，经网站或乙方审核通过后，会员凭手机短信等成功加号凭据在预约时间内到指定医院就诊。 </p>
<p>（四）薏米沙龙服务：指乙方参加甲方组织的同业见面会、联谊会、专业讲座、旅游等为增加会员与合作伙伴深度交流机会的活动。 </p>
<p>（五）个人健康季评服务：指每季度向签约会员发送的健康评估电子刊物，乙方为签约会员提供季度健康评估和建议。 </p>
<p> </p>
<p>二、可选合作内容 </p>
<p>（一）乙方自愿为签约会员提供的单次计费服务。双方正式合作后，乙方可通过网站个人空间勾选可为签约会员提供的个性化服务： </p>
<p>1、住院直通车服务：指乙方为网站签约会员提供的转院住院服务，会员通过互联网、呼叫中心提出转院住院需求，经由乙方依据其情况审阅同意后，负责协助联系和申请会员需要的医院，并为会员落实床位、主治医生等附加服务。 </p>
<p>2、预约上门服务：指签约会员随时随地通过互联网、呼叫中心、手机终端、现场咨询等多种渠道联系乙方或薏米助理，申请预约到家服务，由乙方审核通过后，在约定时间和地点提供服务。 </p>
<p>（二）营销体验服务：指经双方协商同意后，一方可自愿为配合另一方为双方合作平台市场推广而实施的营销措施，包括但不限于基本套餐服务免费（或折扣）体验。 </p>
<p> </p>
<p> </p>
<p>附件三：特别约定 </p>
<p>一、服务规则约定 </p>
<p>（一）网站合作伙伴在为签约会员提供服务活动的过程中享有下列权利：<br />
  　　1、从事相关专业的研究、学术交流，参加专业学术团体；<br />
  　　2、参加专业培训，接受继续教育；<br />
  　　3、在提供服务的过程中，人格尊严、人身安全不受侵犯；<br />
  　　4、自主决定签约、获取报酬、就网站运营提供合理化建议、享受网站提供的各类助理服务。 </p>
<p>5、任何一方提前30天通知对方，即可解除合同。<br />
  （二）网站合作伙伴在为签约会员提供服务过程中应履行下列义务：<br />
  　　1、遵守法律、法规，遵守技术操作规范；<br />
  　　2、树立敬业精神，遵守职业道德，履行职责，尽职尽责为会员服务；<br />
  　　3、关心、爱护、尊重会员，保护会员的隐私；<br />
  　　4、努力钻研业务，更新知识，提高专业技术水平；<br />
  　　5、宣传卫生保健知识，对会员进行健康教育。<br />
  　　6、在提供服务的过程中，应按照网站及专业技术要求填写服务记录，不应隐匿、伪造或者销毁相关文书及有关资料。不应出具与自己专业领域及执业范围无关或者与执业类别不相符的证明文件。<br />
  　　7、对于情况危急的会员，应当在咨询工作中建议其立即到正式医疗机构（包括自身所执业的医院）接受常规诊治，并应同时在网站内进行报备；无论何种情形下，均不应对出现危急情况的会员采取网上诊治或其他应当在医院接受的诊疗处理。 </p>
<p>8、咨询回复工作中，如涉及药械产品知识，应当建议会员使用经国家有关部门批准使用的药品、消毒药剂和医疗器械。不得建议会员使用麻醉药品、医疗用毒性药品、精神药品和放射性药品。 </p>
<p>9、应当根据会员提供的相关情况或检查报告，在自身专业执业允许范围内，如实为会员解答相关疾病及健康咨询问题。<br />
  　　10、可以利用平台做学术统计及调查，但在任何情况下均不应通过网站平台进行任何涉及网站经营范围之外的医学类试验。 </p>
<p>11、除网站正常业务外，不应利用提供服务之便，索取、非法收受会员财物或者牟取其他不正当利益。<br />
  　　12、发现自然灾害、传染病流行、突发重大伤亡事故及其他严重威胁人民生命健康的紧急情况时，应当及时向网站报备并提请网站向国家有关管理部门上报。<br />
  　　13、发现或疑现传染病疫情时，应当及时向网站报备并按照有关规定及时向所在机构或者卫生行政主管部门报告。<br />
  　　14、发现或怀疑会员涉嫌伤害事件或者非正常死亡时，应当及时向网站报备并按照有关规定向有关部门报告。 </p>
<p>15、乙方避免以任何形式转让或授权他人使用签约时获得的网站个人空间用户名及密码，避免给甲方造成声誉或经济损失。 </p>
<p> </p>
<p>二、隐私声明<br />
  （一）适用范围<br />
      1、签约时乙方根据甲方要求所提供的个人专业信息及必要的其他相关信息。<br />
      2、乙方提供服务时，网站服务器自动接收并记录的相关数据，包括但不限于IP地址、网站Cookie中的资料及相关网页记录。<br />
      3、甲方通过合法途径获取的用户资料。 </p>
<p>（二）信息使用 </p>
<p>1、甲乙双方不得向任何第三人或团体泄露网站签约会员的个人信息，以下情况除外： </p>
<p>（1）为提供签约会员所要求的服务，征得签约会员同意后而与第三方信息交流所引用的内容。 </p>
<p>（2）根据法律法规有关规定，或行政、司法机构的相关要求，而向行政、司法机构披露的内容。 </p>
<p>（3）其它根据法律或网站政策适合引用的信息。 </p>
<p>2、甲方可公开、编辑、出版、发行与服务相关的问题及答案，未征得乙方和签约会员同意时，须避免泄露乙方和签约会员的姓名、单位、地址等隐私信息。 </p>
<p><br />
  三、免责声明 </p>
<p>（一）乙方在提供咨询答案时，应依据会员提供的相关情况，给予&ldquo;咨询意见&rdquo;，该意见不作为&ldquo;正式诊断结论&rdquo;；如乙方擅自出具诊断意见而给会员造成相关损失的，甲方不承担任何责任。<br />
      （二）对于因不可抗力或甲方不能控制的原因造成的网络服务中断或其它缺陷，甲方不承担任何责任。<br />
      （三）乙方违反相关规则，私下与会员接触，造成相关损害情况的，甲方不承担任何责任。 </p>
<p>（四）乙方伪造相关材料，骗取甲方给予乙方的专业身份认定，造成双方客户相关损害情况的，甲方不承担任何责任。<br />
      （五）乙方应充分建议会员如需正式诊断，应到医院就诊，且此之后若发生一切医疗行为均与甲方无关，若由此继发乙方及客户的损失，甲方不承担任何责任。</p>
                    </div>
                    <div style="text-align:center">
                    <button onclick="$('#doctorcheckis')[0].checked = true;tb_remove();" class="byBtn2 MR5"><span>同意</span></button>  
                    <button onclick="$('#doctorcheckis')[0].checked = false;tb_remove();" class="byBtn2"><span>不同意</span></button>
                    </div>
                </div>
        
        </div>
        <!----医生注册表单end----->
    </div>
</div>
<!----注册表单end-----><script language="javascript">
$(document).ready(function(){
<!--首页无限制推送-->
	
if(screen.availWidth < 1050)
{
	$('.width1280').hide();
	$('#smallIndex').show();
}
})

function show_cities(id){
	$('#'+id).show();
}

function hide_cities(id){
	$('#'+id).hide();
}

function set_current_city(id){
	$('#cities').hide();
	var cities = new Array();
	cities[289] = '广州市';
	cities[291] = '深圳市';
	cities[175] = '杭州市';
	$('#current_city1').text(cities[id]);
	$('#current_city').text(cities[id]);
	$.ajax({
        type: "GET",
        url: "/index_ajax/set_current_city/"+id+".html",
        cache : false,
        success: function(msg){
			//alert(msg);
        }
    });
}


function logout(){
	var yn = confirm('退出登录将无法享受薏米网提供的三项免费服务，您确定要退出吗？');
	if(yn){
		document.location = '/member/logout.html';
	}
}
</script>
<div class="hotnews">
	<div class="title">
		关注薏米网微信  立送30元现金<br />
        <span class="time">2014-07-08</span><br />
        <span class="desc">为感谢广大医生的支持，活动期间关注薏米网微信公众号（emidoc）即送30元现金！​【活动时间】2014年7月6日至8月6日【活动对象】全体薏米医生</span>
    </div>
	
	<div class="img"><img width="120" src="/uploads/news/201407/news_1404806022.JPG" /></div>
	    <a class="viewdetail" href="http://mp.weixin.qq.com/s?__biz=MzA3MzU0ODgxMw==&mid=200534241&idx=1&sn=f7befbe66b22e0ffedf18230117cd2a0#rd"></a>
	    <a class="closenews" href="javascript:closeForm('hotnews')"></a>
</div>

<div id="smallIndex" style="width:800px;height:600px;background:url('themes/site_themes/ememed/images/web/800x600/bgLogo.jpg') no-repeat scroll left top #01354B;display:none;">
	<div style="padding:35px 36px 0px 200px;" >
	
    	<div class="TR color1" >
		<div>
		
		<div style="height:0px;">
		<div id="cities" style="position:relative;top:40px;left:-150px;display:none;"><span style="cursor:pointer;" onclick="set_current_city(289)">广州市</span> <span style="cursor:pointer;" onclick="set_current_city(291)">深圳市</span> <span style="cursor:pointer;" onclick="set_current_city(175)">杭州市</span> </div></div>
		<!--<span id="current_city1">广州市</span> [<a href="javascript:show_cities('cities1');">切换城市</a>] -->
				<a href="javascript:;" onclick="showForm('loginForm')" class="color1" style="background-color:#00A04A
;padding:6px 12px;margin-right:10px;">登录</a><a href="javascript:;" onclick="showForm('regForm');showRegForm(1);" class="color1" style="background-color:#DE3347;padding:6px 12px;margin-right:10px;">医生注册</a><a href="javascript:;" onclick="showForm('regForm');showRegForm(0);" class="color1" style="background-color:#00ACE3;padding:6px 12px;margin-right:10px;">会员注册</a><img src="themes/site_themes/ememed/images/web/photo.jpg" align="absmiddle" class='ML10' />
				</div>
		<div style="margin-top:10px;">热线电话：4009003333</div>
		
		</div>
        <div id="smallIndex" style="padding-top:50px; height:232px;">
        	<div class="absolute"><a href="http://www.ememed.net/find_doctor.html"><img src="themes/site_themes/ememed/images/web/800x600/menu1.jpg" /></a></div>
            <div class="absolute" style="margin:0px 0px 0px 157px;"><a href="javascript:;" onclick="showpinfo('index_memberspace')"><img src="themes/site_themes/ememed/images/web/800x600/menu2.jpg" border="0" /></a></div>
            <div class="absolute" style="margin:0px 0px 0px 350px;"><a href="javascript:;" onclick="showpinfo('index_doctorspot')"><img src="themes/site_themes/ememed/images/web/800x600/menu3.jpg" border="0" /></a></div>
            <div class="absolute" style="margin:80px 0px 0px 0px;"><a href="javascript:;" onclick="showpinfo('index_barleyservice')"><img src="themes/site_themes/ememed/images/web/800x600/menu4.jpg" border="0" /></a></div>
            <div class="absolute" style="margin:80px 0px 0px 157px;"><a href="javascript:;" onclick="showpinfo('index_mydoctor')"><img src="themes/site_themes/ememed/images/web/800x600/menu5.jpg" border="0" /></a></div>
            <div class="absolute" style="margin:80px 0px 0px 350px;"><a href="javascript:;" onclick="showpinfo('index_doctorwork')"><img src="themes/site_themes/ememed/images/web/800x600/menu6.jpg" border="0" /></a></div>
            <div class="absolute" style="margin:160px 0px 0px 0px;"><a href="http://www.ememed.net/news/index.html"><img src="themes/site_themes/ememed/images/web/800x600/menu7.jpg" /></a></div>
            <div class="absolute" style="margin:160px 0px 0px 77px;"><a href="javascript:;" onclick="showpinfo('index_barleyassistant')"><img src="themes/site_themes/ememed/images/web/800x600/menu8.jpg" /></a></div>
            <div class="absolute" style="margin:160px 0px 0px 157px;"><a href="http://www.ememed.net/huodong/index.html"><img src="themes/site_themes/ememed/images/web/800x600/menu_activities.jpg" border="0" /></a></div>
            <!--<div class="absolute" style="margin:160px 0px 0px 350px;"><a href="http://www.ememed.net/huodong/register_invite.html"><img src="themes/site_themes/ememed/images/web/800x600/menu10.jpg" border="0" /></a></div>-->
        </div>
        <div class="TR" style="padding-top:60px;">
        	<ul>
            	<li class="c_b3c3c9 size14 footnav"> <a href="http://live.mini189.cn/" target="_blank">互联网生活馆</a> <a class="ML20" href="/profile/about.html" target="_blank">关于薏米</a> <a href="/profile/nopress.html" target="_blank" class="ML20">免责声明</a> <a href="/profile/copyright.html" target="_blank" class="ML20">版权声明</a> <!--a href="/profile/website.html" target="_blank" class="ML20">网站地图</a--> <a href="/news/index.html?tid=82" target="_blank" class="ML20">媒体报道</a> <a href="/profile/mobileclient.html" target="_blank" class="ML20">手机客户端</a><a href="javascript:;" onclick="setIsinvited();kf_icons[1].wopen('&amp;style=1&amp;language=cn&amp;lytype=0&amp;charset=GBK&amp;kflist=off&amp;kf=&amp;zdkf_type=1&amp;referer=http%3A%2F%2F183.60.177.178%3A8000%2F&amp;keyword=&amp;tfrom=1&amp;tpl=crystal_blue')" target="_blank" class="ML20">联系我们</a></li>
                <li class="size12 LH18 c_456c7c PT10">Copyright 2014 薏米网<sup>TM</sup> Version 1.3.0 . All Rights Reserved<br />
<a href='/profile/certificate.html'>互联网医疗保健信息服务审核同意书【粤卫网审（2012）439号】</a> 粤ICP证【粤B2-20130429】<!--<a href='/profile/certificate1.html'></a>--> 粤ICP备12059183号-1<br />
</li>
            </ul>
        </div>
    </div>
	<span style="position:absolute;top:170px;left:50px;">
	<a href="/profile/mobileclient.html" target="_blank"><img src="themes/site_themes/ememed/images/homedownload.jpg" /></a>
	</span>	
</div>


<div class="width1280 height800 bgLogo" style="overflow:hidden;">

	<div style="padding:50px 150px 0px 326px;">
    	<div class="TR color1">
		<div><!--/member/logout.html-->
		<div style="height:0px;">
		<div id="cities" style="position:relative;top:40px;left:-150px;display:none;"><span style="cursor:pointer;" onclick="set_current_city(289)">广州市</span> <span style="cursor:pointer;" onclick="set_current_city(291)">深圳市</span> <span style="cursor:pointer;" onclick="set_current_city(175)">杭州市</span> </div></div>
		<!--<span id="current_city">广州市</span> [<a href="javascript:show_cities('cities');">切换城市</a>] -->
				<a href="javascript:;" onclick="showForm('loginForm')" class="color1" style="background-color:#00A04A
;padding:6px 12px;margin-right:5px;font-size:14px;">登录</a><a href="javascript:;" onclick="showForm('regForm');showRegForm(1);" class="color1" style="background-color:#DE3347;padding:6px 12px;margin-right:5px;font-size:14px;">医生注册</a><a href="javascript:;" onclick="showForm('regForm');showRegForm(0);" class="color1" style="background-color:#00ACE3;padding:6px 12px;margin-right:5px;font-size:14px;">会员注册</a><img src="themes/site_themes/ememed/images/web/photo.jpg" align="absmiddle" class='ML10' />
			
		</div>
		<div style="margin-top:10px;">热线电话：4009003333</div>
		
		</div>
        <div style="padding-top:80px; height:376px;">
        	<div class="absolute"><a href="http://www.ememed.net/find_doctor.html"><img src="themes/site_themes/ememed/images/web/menu1.jpg" /></a></div>
            <div class="absolute" style="margin:0px 0px 0px 256px;"><a href="javascript:;" onclick="showpinfo('index_memberspace')"><img src="themes/site_themes/ememed/images/web/menu2.jpg" border="0" /></a></div>
            <div class="absolute" style="margin:0px 0px 0px 553px;"><a href="javascript:;" onclick="showpinfo('index_doctorspot')"><img src="themes/site_themes/ememed/images/web/menu3.jpg" border="0" /></a></div>
            <div class="absolute" style="margin:128px 0px 0px 0px;"><a href="javascript:;" onclick="showpinfo('index_barleyservice')"><img src="themes/site_themes/ememed/images/web/menu4.jpg" border="0" /></a></div>
            <div class="absolute" style="margin:128px 0px 0px 256px;"><a href="javascript:;" onclick="showpinfo('index_mydoctor')"><img src="themes/site_themes/ememed/images/web/menu5.jpg" border="0" /></a></div>
            <div class="absolute" style="margin:128px 0px 0px 553px;"><a href="javascript:;" onclick="showpinfo('index_doctorwork')"><img src="themes/site_themes/ememed/images/web/menu6.jpg" border="0" /></a></div>
            <div class="absolute" style="margin:256px 0px 0px 0px;"><a href="http://www.ememed.net/news/index.html"><img src="themes/site_themes/ememed/images/web/menu7.jpg" /></a></div>
            <div class="absolute" style="margin:256px 0px 0px 128px;"><a href="javascript:;" onclick="showpinfo('index_barleyassistant')"><img src="themes/site_themes/ememed/images/web/menu8.jpg" /></a></div>
            <div class="absolute" style="margin:256px 0px 0px 256px;"><a href="http://www.ememed.net/huodong/index.html"><img src="themes/site_themes/ememed/images/web/menu_activities.jpg" border="0" /></a></div>
            <!--<div class="absolute" style="margin:256px 0px 0px 553px;"><a href="http://www.ememed.net/huodong/register_invite.html"  ><img src="themes/site_themes/ememed/images/web/menu10.jpg" border="0" /></a></div>-->
        </div>
        <div class="TR" style="padding-top:20px;">
        	<ul>
            	<li class="c_b3c3c9 size14 footnav"> <a href="http://live.mini189.cn/" target="_blank">互联网生活馆</a> <a class="ML20" href="/profile/about.html" target="_blank">关于薏米</a> <a href="/profile/nopress.html" target="_blank" class="ML20">免责声明</a> <a href="/profile/copyright.html" target="_blank" class="ML20">版权声明</a> <!--a href="/profile/website.html" target="_blank" class="ML20">网站地图</a--> <a href="/news/index.html?tid=82" target="_blank" class="ML20">媒体报道</a> <a href="/profile/mobileclient.html" target="_blank" class="ML20">手机客户端</a><a href="javascript:;" onclick="setIsinvited();kf_icons[1].wopen('&amp;style=1&amp;language=cn&amp;lytype=0&amp;charset=GBK&amp;kflist=off&amp;kf=&amp;zdkf_type=1&amp;referer=http%3A%2F%2F183.60.177.178%3A8000%2F&amp;keyword=&amp;tfrom=1&amp;tpl=crystal_blue')" target="_blank" class="ML20">联系我们</a></li>
                <li class="size12 LH18 c_456c7c PT10">Copyright 2014 薏米网<sup>TM</sup> Version 1.3.0 . All Rights Reserved<br />
<a href='/profile/certificate.html'>互联网医疗保健信息服务审核同意书【粤卫网审（2012）439号】</a> 粤ICP证【粤B2-20130429】<!--<a href='/profile/certificate1.html'></a>--> 粤ICP备12059183号
<!--<a href='/profile/certificate.html'>粤B2-20120135</a>--></li>
            </ul>
        </div>
    </div>
	<span style="position:absolute;top:215px;left:145px;">
	<a href="/profile/mobileclient.html" target="_blank"><img src="themes/site_themes/ememed/images/homedownload.jpg" /></a>
	</span>
</div>
<script type="text/javascript">
var jiathis_config = {
	shareImg:{
	"showType":"MARK",
	"bgColor":"",
	"txtColor":"",
	"text":"",
	"services":"",
	"position":"",
	"imgwidth":"",
	 "imgheight":""
	}
}
</script>
<script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js" charset="utf-8"></script>
<script type='text/javascript' src='http://chat.53kf.com/kf.php?arg=uimed&style=1'></script>
<div style="display:none;">
<script src="http://s17.cnzz.com/stat.php?id=5168420&web_id=5168420&show=pic" language="JavaScript"></script>
</div>
</body>
</html>