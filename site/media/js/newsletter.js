/**
*
*  Base64 encode / decode
*  http://www.webtoolkit.info/
*
**/
var Base64 = {

// private property
_keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

// public method for encoding
encode : function (input) {
    var output = "";
    var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
    var i = 0;

    input = Base64._utf8_encode(input);

    while (i < input.length) {

        chr1 = input.charCodeAt(i++);
        chr2 = input.charCodeAt(i++);
        chr3 = input.charCodeAt(i++);

        enc1 = chr1 >> 2;
        enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
        enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
        enc4 = chr3 & 63;

        if (isNaN(chr2)) {
            enc3 = enc4 = 64;
        } else if (isNaN(chr3)) {
            enc4 = 64;
        }

        output = output +
        this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
        this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

    }

    return output;
},

// public method for decoding
decode : function (input) {
    var output = "";
    var chr1, chr2, chr3;
    var enc1, enc2, enc3, enc4;
    var i = 0;

    input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

    while (i < input.length) {

        enc1 = this._keyStr.indexOf(input.charAt(i++));
        enc2 = this._keyStr.indexOf(input.charAt(i++));
        enc3 = this._keyStr.indexOf(input.charAt(i++));
        enc4 = this._keyStr.indexOf(input.charAt(i++));

        chr1 = (enc1 << 2) | (enc2 >> 4);
        chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
        chr3 = ((enc3 & 3) << 6) | enc4;

        output = output + String.fromCharCode(chr1);

        if (enc3 != 64) {
            output = output + String.fromCharCode(chr2);
        }
        if (enc4 != 64) {
            output = output + String.fromCharCode(chr3);
        }

    }

    output = Base64._utf8_decode(output);

    return output;

},

// private method for UTF-8 encoding
_utf8_encode : function (string) {
    string = string.replace(/\r\n/g,"\n");
    var utftext = "";

    for (var n = 0; n < string.length; n++) {

        var c = string.charCodeAt(n);

        if (c < 128) {
            utftext += String.fromCharCode(c);
        }
        else if((c > 127) && (c < 2048)) {
            utftext += String.fromCharCode((c >> 6) | 192);
            utftext += String.fromCharCode((c & 63) | 128);
        }
        else {
            utftext += String.fromCharCode((c >> 12) | 224);
            utftext += String.fromCharCode(((c >> 6) & 63) | 128);
            utftext += String.fromCharCode((c & 63) | 128);
        }

    }

    return utftext;
},

// private method for UTF-8 decoding
_utf8_decode : function (utftext) {
    var string = "";
    var i = 0;
    var c = c1 = c2 = 0;

    while ( i < utftext.length ) {

        c = utftext.charCodeAt(i);

        if (c < 128) {
            string += String.fromCharCode(c);
            i++;
        }
        else if((c > 191) && (c < 224)) {
            c2 = utftext.charCodeAt(i+1);
            string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
            i += 2;
        }
        else {
            c2 = utftext.charCodeAt(i+1);
            c3 = utftext.charCodeAt(i+2);
            string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
            i += 3;
        }

    }

    return string;
}

};

function getData(){
	var n = [],
	e = [];
	
	$('[name="noticias[]"]:checked').each(function(){
		n.push($(this).val());
	});
	
	$('[name="eventos[]"]:checked').each(function(){
		e.push($(this).val());
	});
	
	
	var data = {noticia:n,evento:e};
	return Base64.encode(JSON.stringify(data));
}

function getRawData(){
	var n = [],
	e = [],
	u = [],
	em = [],
	as = [],
	fo = [];
	
	$('[name="noticias[]"]:checked').each(function(){
		n.push($(this).val());
	});
	
	$('[name="eventos[]"]:checked').each(function(){
		e.push($(this).val());
	});
	
	$('[name="usuarios[]"]:checked').each(function(){
		u.push($(this).val());
	});
	
	$('[name="emails[]"]:checked').each(function(){
		em.push($(this).val());
	});
	
	$('[name="associados[]"]:checked').each(function(){
		as.push($(this).val());
	});
	
	$('[name="fornecedores[]"]:checked').each(function(){
		fo.push($(this).val());
	});
	
	
	var data = {noticias:n,eventos:e,usuarios:u,emails:em,associados:as,fornecedores:fo};
	return data;
}

function showNews(path) {
	window.open(path+"?data="+getData(),"visualizer","width=800,height=600,scrollbars=yes");
}

function showNewsFromElement(id) {
	var w = window.open("about:blank","visualizer","width=800,height=600,scrollbars=yes,location=no");
	w.document.write("<ht"+"ml>"+"<bo"+"dy>"+Base64.decode($("#"+id).val())+"</ht"+"ml>"+"</bo"+"dy>");
	w.document.close();
}

function salvarNewsletter() {
	var e = getRawData();
	$('#bt-submit').hide();
	
	$(".loader-bar").css("width","0%");
	$('.total').text(e.usuarios.length+e.emails.length+e.associados.length+e.fornecedores.length);
	$('.envios').text("0");
	$(".loader-container").show();
	$(".loader-counter").show();
	
	$.ajax({
		url:__live+"/admin/newsletter/acao/salvar",
		data: e,
		type: "POST",
		success: function(data) {
			
			processarEnvios(data, e.usuarios.length+e.emails.length+e.associados.length+e.fornecedores.length);
			
		}
	});
}

function processarEnvios(id, total) {
	var envios = 0;
	while(envios < total) {
		$.ajax({
			url:__live+"/admin/newsletter/acao/enviarnews",
			data:{id_newsletter:id},
			type:"POST",
			async: false,
			success: function(data) {
				envios = parseInt(data);
				$('.envios').text(envios);
				$(".loader-bar").css("width",parseInt(envios)*100/parseInt(total)+"%");
			}
		});
	}
	setTimeout(gotoLista,1000);
}

function gotoLista() {
	window.location = __live+"/admin/newsletter";
}

function makeSortString(s) {
  if(!makeSortString.translate_re) makeSortString.translate_re = /[öäüÖÄÜ]/g;
  var translate = {
    "ä": "a", "ö": "o", "ü": "u",
    "Ä": "A", "Ö": "O", "Ü": "U"   // probably more to come
  };
  return ( s.replace(makeSortString.translate_re, function(match) { 
    return translate[match]; 
  }) );
}

$(document).ready(function() {
	$('.unselect-all').click(function(e){
		e.preventDefault();
		var fields = $(this).attr("data-input");
		$('[filtro="'+fields+'"]:visible').each(function() {
			$(this).attr("checked",false);
		});
	});
	
	$('.select-all').click(function(e){
		e.preventDefault();
		var fields = $(this).attr("data-input");
		$('[filtro="'+fields+'"]:visible').each(function() {
			$(this).attr("checked",true);
		});
	});
	
	var timeout;
	$('.filtro').keyup(function(e){
		var valueFilter = $(this).val();
		var clearValue = makeSortString(valueFilter).toLowerCase();
		var fields = $(this).attr("data-input");
		if(timeout)
			clearTimeout(timeout);
		
		callback = function(){
			$('[filtro="'+fields+'"]').each(function() {
				var input = $(this);
				var linha = $(input.parents(".selection-list tr")[0]);
				
				if(clearValue) {
					var value = $($('td', linha)[2]).text() || $($('td', linha)[1]).text();
					value = makeSortString(value);
					if(value.toLowerCase().toString().indexOf(clearValue) !== -1) {
						linha.show();
					} else {
						linha.hide();
					}
				} else {
					linha.show();
				}
			});
		};
		
		timeout = setTimeout(callback, 200);
	});
});



