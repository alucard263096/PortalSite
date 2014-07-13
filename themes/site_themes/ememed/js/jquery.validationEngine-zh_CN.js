(function($){
    $.fn.validationEngineLanguage = function(){
    };
    $.validationEngineLanguage = {
        newLang: function(){
            $.validationEngineLanguage.allRules = {
                "required": { // Add your regex rules here, you can take telephone as an example
                    "regex": "none",
                    "alertText": "* 此处不可空白",
                    "alertTextCheckboxMultiple": "* 请选择一个项目",
                    "alertTextCheckboxe": "* 您必须钩选此栏",
                    "alertTextDateRange": "* 日期范围不可空白"
                },
                "requiredInFunction": { 
                    "func": function(field, rules, i, options){
                        return (field.val() == "test") ? true : false;
                    },
                    "alertText": "* Field must equal test"
                },
                "dateRange": {
                    "regex": "none",
                    "alertText": "* 无效的 ",
                    "alertText2": " 日期范围"
                },
                "dateTimeRange": {
                    "regex": "none",
                    "alertText": "* 无效的 ",
                    "alertText2": " 时间范围"
                },
                "minSize": {
                    "regex": "none",
                    "alertText": "* 最少 ",
                    "alertText2": " 个字符"
                },
                "maxSize": {
                    "regex": "none",
                    "alertText": "* 最多 ",
                    "alertText2": " 个字符"
                },
				"groupRequired": {
                    "regex": "none",
                    "alertText": "* 你必需选填其中一个栏位"
                },
                "min": {
                    "regex": "none",
                    "alertText": "* 最小值为 "
                },
                "max": {
                    "regex": "none",
                    "alertText": "* 最大值为 "
                },
                "past": {
                    "regex": "none",
                    "alertText": "* 日期必需早于 "
                },
                "future": {
                    "regex": "none",
                    "alertText": "* 日期必需晚于 "
                },	
                "maxCheckbox": {
                    "regex": "none",
                    "alertText": "* 最多选取 ",
                    "alertText2": " 个项目"
                },
                "minCheckbox": {
                    "regex": "none",
                    "alertText": "* 请选择 ",
                    "alertText2": " 个项目"
                },
                "equals": {
                    "regex": "none",
                    "alertText": "* 请输入与上面相同的密码"
                },
                "creditCard": {
                    "regex": "none",
                    "alertText": "* 无效的信用卡号码"
                },
                "phone": {
                    // credit: jquery.h5validate.js / orefalo
                    "regex": /^([\+][0-9]{1,3}[ \.\-])?([\(]{1}[0-9]{2,6}[\)])?([0-9 \.\-\/]{3,20})((x|ext|extension)[ ]?[0-9]{1,4})?$/,
                    "alertText": "* 无效的电话号码"
                },
                "email": {
                    // Shamelessly lifted from Scott Gonzalez via the Bassistance Validation plugin http://projects.scottsplayground.com/email_address_validation/
                    "regex": /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i,
                    "alertText": "* 邮件地址无效"
                },
                "integer": {
                    "regex": /^[\-\+]?\d+$/,
                    "alertText": "* 不是有效的整数"
                },
                "number": {
                    // Number, including positive, negative, and floating decimal. credit: orefalo
                    "regex": /^[\-\+]?(([0-9]+)([\.,]([0-9]+))?|([\.,]([0-9]+))?)$/,
                    "alertText": "* 无效的数字"
                },
                "money": {
                    // Money /^[+]?\d*\.{0,1}\d{0,2}$/
                    "regex": /^(([0-9]+)(\.([0-9]{0,2}))?)$/,
                    "alertText": "* 金额必须为整数或小数，小数点后不超过2位。"
                },
                "cardlen": {
                    "regex": /^\d{17}(\d|x)$/i,
                    "alertText": "* 身份证长度或格式错误。"
                },
                "cardid": {
					/*
                    "regex": /^\d{17}(\d|x)$/i,
					*/
                    "alertText": "* 身份证长度或格式错误。",
                    "func": function(field, rules, i, options){
                        var iscardid = isCardID(field.val());
						if(iscardid == "true") {
							return true;
						} else {
							return false;
						}
                    }
                },
                "date": {
                    "regex": /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/,
                    "alertText": "* 无效的日期，格式必需为 YYYY-MM-DD"
                },
                "ipv4": {
                    "regex": /^((([01]?[0-9]{1,2})|(2[0-4][0-9])|(25[0-5]))[.]){3}(([0-1]?[0-9]{1,2})|(2[0-4][0-9])|(25[0-5]))$/,
                    "alertText": "* 无效的 IP 地址"
                },
                "url": {
                    "regex": /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i,
                    "alertText": "* 无效的HTTP地址"
                },
                "onlyNumberSp": {
                    "regex": /^[0-9\ ]+$/,
                    "alertText": "* 只能填数字"
                },
                "onlyLetterSp": {
                    "regex": /^[a-zA-Z\ \']+$/,
                    "alertText": "* 只接受英文字母大小写"
                },
				"mobile":{
					"regex": /^1[3|4|5|8][0-9]\d{8}$/,
                    "alertText": "* 手机号码格式不对"
                    /*"func": function(field, rules, i, options){
						var temp = '';
						if(field.val().length != 11){
							temp = confirm("您的手机号码位数与中国大陆号码不一致，使用该号码将不能收到网站发送的短信息，请确认是否输入？");
						}
						if(!temp){
							//document.getElementById('doctor_mobile').value = '';
							document.getElementById('doctor_mobile').focus();
						}
                        return temp;
                    }*/
				},
                "onlyLetterNumber": {
                    "regex": /^[0-9a-zA-Z]+$/,
                    "alertText": "* 不接受特殊字符"
                },
				"onlyLetterNumberSplit": {
                    "regex": /^[,0-9a-zA-Z]+$/,
                    "alertText": "* 不接受除,外的特殊字符"
                },
                "cardidType": { 
                    /*"regex": /^\d{17}(\d|x)$/i,
					*/
                    "alertText": "* 身份证长度或格式错误。",
					
                    "func": function(field, rules, i, options){
                        var cardtype = document.getElementById('cardtype').value;
                        if(cardtype == '01') {
                            var iscardid = isCardID(field.val());							
                            if(iscardid == "true") {
                                return true;
                            } else {
                                return false;
                            }
                        }
                        return true;
                    }
                },
                "notSpecialchar": {
                    "regex": /^[\u0391-\uFFE5\w]+$/,
                    "alertText": "* 只能包含中文字、英文字母、数字和下划线"
                },
                // --- CUSTOM RULES -- Those are specific to the demos, they can be removed or changed to your likings
                "ajaxUserCall": {
                    "url": "/member/ajaxvalidate.html",
                    "alertText": "* 此名称已被其他人使用",
                    "alertTextLoad": "* 正在确认名称是否有其他人使用，请稍等。"
                },
				"ajaxUserCallPhp": {
                    "url": "phpajax/ajaxValidateFieldUser.php",
                    // you may want to pass extra data on the ajax call
                    "extraData": "name=eric",
                    // if you provide an "alertTextOk", it will show as a green prompt when the field validates
                    "alertTextOk": "* 此帐号名称可以使用",
                    "alertText": "* 此名称已被其他人使用",
                    "alertTextLoad": "* 正在确认帐号名称是否有其他人使用，请稍等。"
                },
                "ajaxEmailCall": {
                    "url": "/member/ajaxvalidate.html",
                    "alertText": "* 此邮箱已被其他人使用",
                    "alertTextLoad": "* 正在确认邮箱是否有其他人使用，请稍等。"
                },
                "ajaxMobileCall": {
                    "url": "/member/ajaxvalidate.html",
                    "alertText": "* 此手机已被其他人使用",
                    "alertTextLoad": "* 正在确认手机是否有其他人使用，请稍等。"
                },
                "ajaxNameCall": {
                    // remote json service location
                    "url": "ajaxValidateFieldName",
                    // error
                    "alertText": "* 此名称可以使用",
                    // if you provide an "alertTextOk", it will show as a green prompt when the field validates
                    "alertTextOk": "* 此名称已被其他人使用",
                    // speaks by itself
                    "alertTextLoad": "* 正在确认名称是否有其他人使用，请稍等。"
                },
				 "ajaxNameCallPhp": {
	                    // remote json service location
	                    "url": "phpajax/ajaxValidateFieldName.php",
	                    // error
	                    "alertText": "* 此名称已被其他人使用",
	                    // speaks by itself
	                    "alertTextLoad": "* 正在确认名称是否有其他人使用，请稍等。"
	                },
                "validate2fields": {
                    "alertText": "* 请输入 HELLO"
                },
	            //tls warning:homegrown not fielded 
                "dateFormat":{
                    "regex": /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$|^(?:(?:(?:0?[13578]|1[02])(\/|-)31)|(?:(?:0?[1,3-9]|1[0-2])(\/|-)(?:29|30)))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^(?:(?:0?[1-9]|1[0-2])(\/|-)(?:0?[1-9]|1\d|2[0-8]))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^(0?2(\/|-)29)(\/|-)(?:(?:0[48]00|[13579][26]00|[2468][048]00)|(?:\d\d)?(?:0[48]|[2468][048]|[13579][26]))$/,
                    "alertText": "* 无效的日期格式"
                },
                //tls warning:homegrown not fielded 
				"dateTimeFormat": {
	                "regex": /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])\s+(1[012]|0?[1-9]){1}:(0?[1-5]|[0-6][0-9]){1}:(0?[0-6]|[0-6][0-9]){1}\s+(am|pm|AM|PM){1}$|^(?:(?:(?:0?[13578]|1[02])(\/|-)31)|(?:(?:0?[1,3-9]|1[0-2])(\/|-)(?:29|30)))(\/|-)(?:[1-9]\d\d\d|\d[1-9]\d\d|\d\d[1-9]\d|\d\d\d[1-9])$|^((1[012]|0?[1-9]){1}\/(0?[1-9]|[12][0-9]|3[01]){1}\/\d{2,4}\s+(1[012]|0?[1-9]){1}:(0?[1-5]|[0-6][0-9]){1}:(0?[0-6]|[0-6][0-9]){1}\s+(am|pm|AM|PM){1})$/,
                    "alertText": "* 无效的日期或时间格式",
                    "alertText2": "可接受的格式： ",
                    "alertText3": "mm/dd/yyyy hh:mm:ss AM|PM 或 ", 
                    "alertText4": "yyyy-mm-dd hh:mm:ss AM|PM"
	            },
                "endTime": { 
                    /*"regex": /^\d{17}(\d|x)$/i,
					*/
                    "alertText": "* 结束时间不能小于开始时间",
					
                    "func": function(field, rules, i, options){
                        var startTime = document.getElementById('starttime').value;
                        if(startTime.length > 4 ) {
                            if(Date.parse(startTime.replace(/-/g,   "/")) > Date.parse(field.val().replace(/-/g,   "/"))){
                                return false;
                            } else {
                                return true;
                            }
                        }
                        return true;
                    }
                },
                "endTime2": { 
                    /*"regex": /^\d{17}(\d|x)$/i,
					*/
                    "alertText": "* 结束时间不能小于开始时间",
					
                    "func": function(field, rules, i, options){
                        var startTime = document.getElementById('hopetime').value;
						
						if(Date.parse(startTime.replace(/-/g,   "/")) > Date.parse(field.val().replace(/-/g,   "/"))){
							return false;
						} else {
							return true;
						}
                    }
                },
                "endTime3": { 
                    /*"regex": /^\d{17}(\d|x)$/i,
					*/
                    "alertText": "* 结束时间不能小于开始时间",
					
                    "func": function(field, rules, i, options){
                        var startTime = document.getElementById('workstarttime').value;
						
						if(Date.parse(startTime.replace(/-/g,   "/")) > Date.parse(field.val().replace(/-/g,   "/"))){
							return false;
						} else {
							return true;
						}
                    }
                },
                "beforeToday": { 
                    /*"regex": /^\d{17}(\d|x)$/i,
					*/
                    "alertText": "* 日期时间必须不大于今天",
					
                    "func": function(field, rules, i, options){
						Date.prototype.format = function(format){ 
							var o = { 
								"M+" : this.getMonth()+1, //month 
								"d+" : this.getDate(), //day 
								"h+" : this.getHours(), //hour 
								"m+" : this.getMinutes(), //minute 
								"s+" : this.getSeconds(), //second 
								"q+" : Math.floor((this.getMonth()+3)/3), //quarter 
								"S" : this.getMilliseconds() //millisecond 
							} 

							if(/(y+)/.test(format)) { 
								format = format.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length)); 
							} 

							for(var k in o) { 
								if(new RegExp("("+ k +")").test(format)) { 
									format = format.replace(RegExp.$1, RegExp.$1.length==1 ? o[k] : ("00"+ o[k]).substr((""+ o[k]).length)); 
								} 
							} 
							return format; 
						} 
						var now = new Date(); 
						if(Date.parse(now.format("yyyy/MM/dd")) < Date.parse(field.val().replace(/-/g,   "/"))){
							return false;
						} else {
							return true;
						}
                    }
                },
                "afterToday": { 
                    /*"regex": /^\d{17}(\d|x)$/i,
					*/
                    "alertText": "* 日期时间必须大于今天",
					
                    "func": function(field, rules, i, options){
						Date.prototype.format = function(format){ 
							var o = { 
								"M+" : this.getMonth()+1, //month 
								"d+" : this.getDate(), //day 
								"h+" : this.getHours(), //hour 
								"m+" : this.getMinutes(), //minute 
								"s+" : this.getSeconds(), //second 
								"q+" : Math.floor((this.getMonth()+3)/3), //quarter 
								"S" : this.getMilliseconds() //millisecond 
							} 

							if(/(y+)/.test(format)) { 
								format = format.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length)); 
							} 

							for(var k in o) { 
								if(new RegExp("("+ k +")").test(format)) { 
									format = format.replace(RegExp.$1, RegExp.$1.length==1 ? o[k] : ("00"+ o[k]).substr((""+ o[k]).length)); 
								} 
							} 
							return format; 
						} 
                        var now = new Date(); 
						if(Date.parse(now.format("yyyy/MM/dd")) > Date.parse(field.val().replace(/-/g,   "/"))){
							return false;
						} else {
							return true;
						}
                    }
                },
                "serviceSetTime": { 
                    /*"regex": /^\d{17}(\d|x)$/i,
					*/
                    "alertText": "* 结束时间必须大于开始时间",
					
                    "func": function(field, rules, i, options){
						var startHour = parseInt(document.getElementById('select_time_start_hour').value);
						var startMin = parseInt(document.getElementById('select_time_start_min').value);
						var endHour = parseInt(document.getElementById('select_time_end_hour').value);
						var endMin = parseInt(field.val());
						
						if(startHour > endHour){
							return false;
						} else if(startHour < endHour) {
							return true;
						} else {
							if( startMin < endMin){
								return true;
							}else{
								return false;
							}
						}
                    }
                },
				"inviteMobile":{
					//"regex": /^1[3|4|5|8][0-9]\d{8}$/,
                    "alertText": "* 联系电话必须填写",
                    "func": function(field, rules, i, options){
						if(field.val() == '联系电话'){
							return false;
						}
                        return true;
                    }
				},
				"inviteDoctorName":{
					//"regex": /^1[3|4|5|8][0-9]\d{8}$/,
                    "alertText": "* 医生姓名必须填写",
                    "func": function(field, rules, i, options){
						if(field.val() == '医生姓名'){
							return false;
						}
                        return true;
                    }
				},
				"inviteEmail":{
					//"regex": /^1[3|4|5|8][0-9]\d{8}$/,
                    "alertText": "* 邮箱地址格式错误",
                    "func": function(field, rules, i, options){
						var re = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;
						var email = field.val();
						if( email != '电子邮箱（选填项）'){
							if(re.test(email)){
								return true;
							}else{
								return false;
							}
						}
                        return true;
                    }
				}
            };
            
        }
    };
    $.validationEngineLanguage.newLang();
})(jQuery);
