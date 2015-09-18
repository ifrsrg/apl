var moneyUniqueID = 0;
(function($) {
		  
	$.fn.money = function(options) {
		var opts = $.extend({}, $.fn.money.defaults, options);		
		if($(this).val()*1==0){
			$(this).val($.numberFormat("0",opts));
		}
		else{
			if(!opts.float_value){
				$(this).val($.numberFormat($(this).val(),opts,true));
			}
			$(this).val($.numberFormat($(this).val(),opts));
		}
		if(opts.float_value){
			moneyUniqueID++;
			
			var hiddenAux = '<input class="hiddenaux" type="hidden" name="'+$(this).attr("name")+'" value="'+$.numberFormat($(this).val(),opts,true)+'"';
			$(this).attr("name","CpMoney"+$(this).attr("name"));
			$(this).addClass("money");
			if(($(this).attr("id")==undefined)||($(this).attr("id")=="")){
				$(this).attr("id","moneyUniqueID"+moneyUniqueID);
			}
			hiddenAux += ' lang="'+$(this).attr("id")+'" />';
			$(this).parent().append(hiddenAux);
		}
		
		$(this).focus(function(){
			aux = $(this).val().substr(0,$(this).val().length-1);
			car = $(this).val().substr($(this).val().length-1,1);
			$(this).val(aux);
			$(this).val(aux+car);
		});
		
		$(this).click(function(){
			$(this).focus();
		});
		
		$(this).keydown(function(e) {
			var v = $.numberFormat($(this).val(),opts,true);
			if(e==undefined) return true;
			var code = e.keyCode;
			var aux = v.split(".");
			if(code==8){
				if(aux[0].length==1){
					v = v/10;
				}
				else{
					v = aux[0].substr(0,aux[0].length-1)+"."+aux[0].substr(aux[0].length-1)+aux[1].substr(0,opts.decimals);
				}
			}
			else if (((code>=48)&&(code<=57))||((code>=96)&&(code<=105))){
				var deducao = ((code>=48)&&(code<=57))?48:96;
				if(aux[0].length>1){
					v = aux[0]+aux[1].charAt(0)+"."+aux[1].substr(1)+(code-deducao);
				}
				else{
					v = (aux[0]+aux[1].charAt(0)+"."+aux[1].substr(1)+(code-deducao))*1;
				}
			}
			
			else if((code==40)||(code==38)||(code<32)||((code>115)&&(code<119))||(code==99)||(code==120)||(code==46)||((code>32)&&(code<37))){
				return true;
			}
			$(this).val($.numberFormat(v,opts));
			return false;
		});
		
		if(opts.float_value){
			$(this).keyup(function(event) {
				$("input[lang="+$(this).attr("id")+"]").val($(this).moneyFloatVal(undefined,opts));
			});
		}
		
	};
	
	$.fn.moneyFloatVal = function(val, options) {
		var opts = $.extend({}, $.fn.money.defaults, options);
		if(val!=undefined){
			$(this).val($.numberFormat(val,opts));
			$("input[lang="+$(this).attr("id")+"]").val($(this).moneyFloatVal(undefined,opts));
		}
		else{
			val = $.numberFormat($(this).val(),opts,true);
		}
		return val;
	};
	
	$.fn.money.defaults = {
		decimals: 2,
		decimal_point: ',',
		thousands_sep: '.',
		float_value: true,
		live: false
	};
	
	$.numberFormat = function(val, options, remove) {
	   var opts = $.extend({}, $.fn.money.defaults, options);		
	   if((remove!=undefined)&&(remove)){
		   while(val.indexOf(opts.thousands_sep)>0) {
			val = val.replace(opts.thousands_sep,'');
		   }
		   return val.replace(opts.decimal_point,".");
	   }
	   else{
		   val+="";
		   var aux = val.split(".");
		   var inte = aux[0];
		   var cent = "";
		   if(aux[1]!=undefined) cent = aux[1].substr(0,opts.decimals);
		   while(cent.length<opts.decimals) {
			  cent+="0";
		   }
		   var mil = '';
		   while(inte.length>3){
			  mil = opts.thousands_sep+inte.substr(inte.length-3)+mil;
			  inte = inte.substr(0,inte.length-3);
		   }
		   return inte+mil+opts.decimal_point+cent;
		}
	};
	
})(jQuery);