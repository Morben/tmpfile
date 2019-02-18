
var e="<i class='fa fa-times-circle'></i>&nbsp;";

$.validator.setDefaults({
	highlight:function(e){
		$(e).closest(".form-group").removeClass("has-success").addClass("has-error")
	},
	success:function(e){
		e.closest(".form-group").removeClass("has-error");//.addClass("has-success")
		//e.closest(".help-block").html("<i class='fa fa-check-circle'></i>");
	},
	errorElement:"span",
	errorPlacement:function(e,r){
		e.appendTo(r.is(":radio")||r.is(":checkbox")?r.parent().parent().parent():r.parent())
	},
	errorClass:"help-block m-b-none",
	validClass:"help-block m-b-none"});

//验证手机号
jQuery.validator.addMethod("isMobile", function(value, element) { 
	  var length = value.length; 
	  var mobile = /^1[345789]\d{9}$/; 
	  return this.optional(element) || (length == 11 && mobile.test(value)); 
	}, e+"请正确填写的手机号码"); 

//验证手机号或邮箱
jQuery.validator.addMethod("isMobileOrMail", function(value, element) { 
	  var length = value.length; 
	  var mobile = /^1[345789]\d{9}$/; 
	  var mail = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
	  return   (length == 11 && mobile.test(value)) || mail.test(value); 
	}, e+"请正确填写手机号码或者邮箱地址作为账号"); 

//验证数字和字母
jQuery.validator.addMethod("isLetter&Number", function(value, element) { 
	  var length = value.length; 
	  var letter = /^[0-9a-zA-Z]*$/g;
	  return  this.optional(element) ||(letter.test(value)); 
	}, e+"请正确填写营业执照号"); 

//验证数字和字母
jQuery.validator.addMethod("isLetterAndNumber", function(value, element) { 
	  var length = value.length; 
	  var letter = /^[0-9a-zA-Z]*$/g;
	  return  this.optional(element) ||(letter.test(value)); 
	}, e+"请正确填写营业执照号"); 

//验证数字
jQuery.validator.addMethod("isNumber", function(value, element) { 
	  var length = value.length; 
	  var letter = /^[0-9]*$/g;
	  return  this.optional(element) ||(letter.test(value)); 
	}, e+"请正确填写银行卡号"); 

//判断浮点数value是否大于0
jQuery.validator.addMethod("isFloatGtZero", function(value, element) { 
     value=parseFloat(value);      
     return this.optional(element) || value>=0;       
}, e+"浮点数必须大于0"); 

//验证身份证号长度是否正确
jQuery.validator.addMethod("isCardNo", function(value, element) { 
	var pattern = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/; 
	 return this.optional(element) || pattern.test(value); 
}, e+"请正确填写您的身份证号"); 

//验证是否中文
jQuery.validator.addMethod("isChn", function(value, element) { 
	var pattern =/^[\u4E00-\u9FA5]+$/; 
	 return this.optional(element) || pattern.test(value); 
}, e+"请正确填写中文"); 

jQuery.validator.addMethod("isCardNoFormat", function(value, element) { 
	var pattern = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/; 
	if(!(this.optional(element) || pattern.test(value))){
		 return false;
	 }
	
	var idCard=value;
	if (value.length == 18) {  
        var idCardWi = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2); //将前17位加权因子保存在数组里  
        var idCardY = new Array(1, 0, 10, 9, 8, 7, 6, 5, 4, 3, 2); //这是除以11后，可能产生的11位余数、验证码，也保存成数组  
        var idCardWiSum = 0; //用来保存前17位各自乖以加权因子后的总和  
        for (var i = 0; i < 17; i++) {  
            idCardWiSum += idCard.substring(i, i + 1) * idCardWi[i];  
        }  

        var idCardMod = idCardWiSum % 11;//计算出校验码所在数组的位置  
        var idCardLast = idCard.substring(17);//得到最后一位身份证号码  
        //如果等于2，则说明校验码是10，身份证号码最后一位应该是X  
        if (idCardMod == 2) {  
            if (idCardLast == "X" || idCardLast == "x") {  
                return true;  
                //alert("恭喜通过验证啦！");  
            } else {  
                return false;  
                //alert("身份证号码错误！");  
            }  
        } else {  
            //用计算出的验证码与最后一位身份证号码匹配，如果一致，说明通过，否则是无效的身份证号码  
            if (idCardLast == idCardY[idCardMod]) {  
                //alert("恭喜通过验证啦！");  
                return true;  
            } else {  
                return false;  
                //alert("身份证号码错误！");  
            }  
        }  
    } 
	return true;
}, e+"身份证号格式非法"); 


	function isCardNoFormat(value){
		var pattern = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/; 
		if(!pattern.test(value)){
			 return false;
		 }
		
		var idCard=value;
		if (value.length == 18) {  
	        var idCardWi = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2); //将前17位加权因子保存在数组里  
	        var idCardY = new Array(1, 0, 10, 9, 8, 7, 6, 5, 4, 3, 2); //这是除以11后，可能产生的11位余数、验证码，也保存成数组  
	        var idCardWiSum = 0; //用来保存前17位各自乖以加权因子后的总和  
	        for (var i = 0; i < 17; i++) {  
	            idCardWiSum += idCard.substring(i, i + 1) * idCardWi[i];  
	        }  
	
	        var idCardMod = idCardWiSum % 11;//计算出校验码所在数组的位置  
	        var idCardLast = idCard.substring(17);//得到最后一位身份证号码  
	        //如果等于2，则说明校验码是10，身份证号码最后一位应该是X  
	        if (idCardMod == 2) {  
	            if (idCardLast == "X" || idCardLast == "x") {  
	                return true;  
	                //alert("恭喜通过验证啦！");  
	            } else {  
	                return false;  
	                //alert("身份证号码错误！");  
	            }  
	        } else {  
	            //用计算出的验证码与最后一位身份证号码匹配，如果一致，说明通过，否则是无效的身份证号码  
	            if (idCardLast == idCardY[idCardMod]) {  
	                //alert("恭喜通过验证啦！");  
	                return true;  
	            } else {  
	                return false;  
	                //alert("身份证号码错误！");  
	            }  
	        }  
	    } 
		return true;
	}
