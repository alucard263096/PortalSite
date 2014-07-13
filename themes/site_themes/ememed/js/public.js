function setStar(name,num){
    $("."+name).attr("src","images/blueStar.jpg");
    for(i=0;i<num;i++){
        $("."+name+":eq("+i+")").attr("src","images/redStar.jpg");
        $("#"+name+"Value").attr("value",(i+1));
    }
}

function swapStack(num){
    num--;
    $(".bgStack li").removeClass("bgStackv");
    $(".bgStack a").addClass("color4");
    $(".bgStack li:eq("+num+")").addClass("bgStackv");
}

function showpinfo(urlname){
    w = $("body").innerWidth();
    h = $("body").innerHeight();
    //操作背景
    $(".bggray").css("display","block");
    $(".bggray").css("width",w);
    $(".bggray").css("height",h);
    $(".bggray").css("background-color","#000");
    $(".bggray").css("z-index","5");
    $(".bggray").css("opacity","0.5");
    $.ajax({
        type: "GET",
        url: "/index_ajax/"+urlname+".html",
        cache : false,
        success: function(msg){
            $("#pinfo").html(msg);
            //操作表单
            fh = $("#pinfo").innerHeight();
            fw = $("#pinfo").innerWidth();
            $("#pinfo").css("margin-left",(w-fw)/2);
            //$("#pinfo").css("margin-top",(h-fh)/2);
            $("#pinfo").css("margin-top","200px");
            $("#pinfo").css("display","block");
        }
    });
}

function closepinfo(){
    $("#pinfo").css("display","none");
    $(".bggray").css("display","none");
}

function showtips(left,top,hopetime,doctorid){
    if(left){
        $(".bgTips3").css('margin-left',left+'px');
        $(".bgTips3").css('margin-top',top+'px');
        $(".bgTips3").css('display','block');
        $(".hopetime").attr('href','/clinic/relaxedreg/step2/'+doctorid+"/"+hopetime);
    }else{
        $(".bgTips3").css('display','block');
    }
}

function closetips(){
    $(".bgTips3").hide();
}

function showtips2(objstr){
    $("#"+objstr).css('display','block');
}

function closetips2(objstr){
    $("#"+objstr).hide();
}

function showServiceItem(type){
    if(type != 2) {
        type = '';
    }
    $ds = $(".bgServiceItem2").css("display");
    if($ds=="block"){
        $("#btServiceItem").attr("src","/static/images/web/btServiceItem" + type + ".jpg");
        $(".bgServiceItem2").slideUp('normal');
    }else{
        $("#btServiceItem").attr("src","/static/images/web/btServiceItemUp" + type + ".jpg");
        $(".bgServiceItem2").slideDown('normal');
    }
}

function delayShow(obj, id, type) {
    var tip = $("#tip_" + type + "_" + id);
    var tip_c = $("#tip_" + type + "_" + id + " .tip_c");
    if($("#tip_" + type + "_" + id + " .tip_m").length > 0) {
        $("#append_parent .tip").each(function(){
            $(this).hide();
        });
        $(".iconDoctor a").removeClass("a");
        $(obj).addClass("a");
        tip.show();
    } else {
        var url = "/index_ajax/tip_" + type + "/" + id + ".html";
        tip_c.load(url, function(){
            $("#append_parent .tip").hide();
            $(".iconDoctor a").removeClass("a");
            $(obj).addClass("a");
            tip.show();
        });
    }

    tip.hover(
      function () {
        tip.show();
      },
      function () {
        tip.hide();
        $(obj).removeClass("a");
      }
    );

    $(".iconDoctor li:not(.icon5)").hover(
        function(){
        },
        function(){
            tip.hide();
        }
    );

}

function collection(doctorid){
    tb_show('收藏医生', '/index_ajax/collection/' + doctorid + '.html?inajax=1&width=538&height=350&modal=true');
}

function getArea(type,parent){
    $.ajax({
        type: "POST",
        url: "/clinic/consultation/getarea",
        data: "type="+type+"&parent="+parent,
        success: function(msg){
            data = eval(msg);
            if(type==2){
                $("#city option").remove();
                $("#city").append("<option value=''>城市</option>");
                for(i=0;i<data.length;i++){
                    $("#city").append("<option value='"+data[i]['ID']+"'>"+data[i]['AREANAME']+"</option>");
                }
            }else if(type==3){
                $("#town option").remove();
                for(i=0;i<data.length;i++){
                    $("#town").append("<option value='"+data[i]['ID']+"'>"+data[i]['AREANAME']+"</option>");
                }
            }
        }
    });
}

function reloadcode(id) {
    var obj = document.getElementById(id);
    obj.src='/captcha.html?'+Math.floor(Math.random() *100);
}

function send_validcode(id) {
    var obj = document.getElementById(id);
	if(obj.value.length < 11){
		alert("请正确输入手机号码。");
	}else{
		$.ajax({
			type: "GET",
			url: "/member/send_validcode.html",
			data: "mobile="+obj.value,
			success: function(msg){
				alert(msg);
			}
		});
	}
}

/* 上传病例 */
function uploadAttach(type) {
    tb_show("上传我的病历资料", '/clinic/attach.html?other=' + type + '&width=600&height=450');
}

function showAttachList() {
    var add_attach_ids = $("#add_attach_ids").val();
    tb_show('选择我的病历资料', '/clinic/attach/history/' + add_attach_ids + '.html?width=600&height=450');
}

function innerAttach(innerid, page, attachid) {
    var add_attach_ids = $("#add_attach_ids").val();
    add_attach_ids = (add_attach_ids != '') ? add_attach_ids + '-' + attachid : attachid;
    $("#" + innerid).html('病历资料载入中，请稍候... <img src="/static/images/loadingAnimation.gif" alt="" />');
    $.get('/clinic/attach/lists/' + page + '_' + add_attach_ids + '.html', function(data) {
        $("#" + innerid).show();
        $("#" + innerid).html(data);
    });
}

function showCollectionDoctor() {
    tb_show('选择我的收藏医生', '/user/collection/ajax_doctor.html?width=396&height=460');
}

var aCity={11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏",33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",52:"贵州",53:"云南",54:"西藏",61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"}

function isCardID(sId){
    var iSum=0 ;
    var info="" ;
    if(!/^\d{17}(\d|x)$/i.test(sId)) return "身份证长度或格式错误";
    sId=sId.replace(/x$/i,"a");
    if(aCity[parseInt(sId.substr(0,2))]==null) return "身份证地区非法";
    sBirthday=sId.substr(6,4)+"-"+Number(sId.substr(10,2))+"-"+Number(sId.substr(12,2));
    var d=new Date(sBirthday.replace(/-/g,"/")) ;
    if(sBirthday!=(d.getFullYear()+"-"+ (d.getMonth()+1) + "-" + d.getDate()))return "身份证上的出生日期非法";
    for(var i = 17;i>=0;i --) iSum += (Math.pow(2,i) % 11) * parseInt(sId.charAt(17 - i),11) ;
    if(iSum%11!=1) return "身份证号非法";
    return "true";
}

function freeexp_card(doctorid) {
	$.post('/index_ajax/use_freeexp_card.html',{},function(data){
		if(data==1){
			tb_show('', '/index_ajax/freeexp_card/' + doctorid + '.html?inajax=1&width=523&height=318&modal=true');
		}else if(data==2){
			window.location = '/index_ajax/jump/lessID.html';
		}else{
			window.location = '/index_ajax/use_freeexp_card.html';
		}
	});
    
}

function freemonth_card(doctorid) {
	$.post('/index_ajax/use_freemonth_card.html',{},function(data){
		if(data==1){
			tb_show('', '/index_ajax/freemonth_card/' + doctorid + '.html?inajax=1&width=523&height=318&modal=true');
		}else if(data==2){
			window.location = '/index_ajax/jump/lessID.html';
		}else{
			window.location = '/index_ajax/use_freemonth_card.html';
		}
	});
    
}

function e_card(doctorid) {
	$.post('/index_ajax/use_e_card.html',{},function(data){
		if(data==1){
			tb_show('', '/index_ajax/e_card/' + doctorid + '.html?inajax=1&width=523&height=318&modal=true');
		}else if(data==2){
			window.location = '/index_ajax/jump/lessID.html';
		}else{
			window.location = '/index_ajax/use_e_card.html';
		}
	});
    
}