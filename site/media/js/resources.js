
// ============================================================================
// INICIO DE CODIGO PREFEITURA SP
// ============================================================================

var yql = 'http://query.yahooapis.com/v1/public/yql?q=';
var urlJsonP = '&format=json&diagnostics=true&callback=';    
var tempo = new Date().getTime();
var loader = '<div class="loader-point"></div>';
var badKeys = ['alter','mudan'];
var Publi = 0;

var MsgLog = '';

var Msgs = function(tipo, foo, msg){    
    if(tipo === 'loading'){    
        MsgLog = msg +' carregando'; 
    } else if(tipo === 'error'){    
        MsgLog = 'Erro: Impossível carregar '+ msg; 
    } else if(tipo === 'timeout'){    
    	MsgLog = 'Erro: O serviço de '+ msg; 
    }
};


/****************/
   /* Fila de ajax */
   /****************/
   
var ajaxCompletos = (function() {
    var aCarregar,
            aCompletar,
            callBacks,
            singleCallBack;

    return function(options) {
        if (!options)
            options = {};

        aCarregar = options.Requests || 0;
        aCompletar = options.aCompletar || 0;
        callBacks = [];
        var ativaCallbacks = function() {
            for (var i = 0; i < callBacks.length; i++)
                callBacks[i]();
        };
        if (options.callbackUnico)
            callBacks.push(options.callbackUnico);

        this.addCallFila = function(pronto, callback) {
            if (pronto)
                aCompletar++;
            if (callback)
                callBacks.push(callback);
            if (aCompletar == aCarregar)
                ativaCallbacks();
        };
        this.rqCompleto = function(pronto) {
            if (pronto)
                aCompletar++;
            if (aCompletar == aCarregar)
                ativaCallbacks();
        };
        this.setCallback = function(callback) {
            callBacks.push(callBack);
        };
    };
})();

   /****************/
   /*    Objeto    */
   /****************/

    var dash = {
        'hora': new Date().getHours(),
    
        'clima': {
            'call': 'Clima',
            'query': 'select * from html where url="http://www.climatempo.com.br/previsao-do-tempo/cidade/558/saopaulo-sp" and xpath=\'/html/body/div[6]/div/div[2]/div\'',
            'status': 'waiting',
            'resultados': {
                'classe':null,
                'max': null,
                'min': null,
                'chuva': null,
                'sunshine': null,
                'sunset': null, 
                'status': null,
                'mm': null,
                'vento': null,
                'kmh': null
            }
        },
        'aero': {
            'call': 'Aero',
            'query': 'select * from html where url="http://www.infraero.gov.br/situacaoaeroporto/" and xpath=\'//*[@id="mapa"]\'', 
            'status': 'waiting',
            'resultados': []
        },
        'transito': {
            'call': 'Trans',
            'query': 'select * from html where url="http://cetsp1.cetsp.com.br/monitransmapa/agora/" and xpath="/html/body/center/div"',
            'status': 'waiting',
            'resultados': {
                'total': null,
                'status': null,
                'centro': null,
                'leste': null,
                'oeste': null,
                'norte': null,
                'sul': null

            }
        },
        'rodizio': {
            'call': 'Rodizio',
            'query': 'select * from html where url="http://cetsp1.cetsp.com.br/institucional/rodizio/default.asp" and xpath=\'/html/body/table/tr[3]\'',
            'status': 'waiting',
            'resultados': {
                'placa1': null,
                'placa2': null,
                'evento': null,
                'status': null
            }

        },
        'publico': {
            'call': ['METRO', 'CPTM', 'SPTRANS'],
            'query': [
                'select * from html where url="http://www.metro.sp.gov.br/servicos/ocorrencias/teocorrencias.asp" and  xpath=\'/html/body/div/table[2]\'', 
                'select * from html where url="http://www.cptm.sp.gov.br/e_atendimento/altcirc.asp" and xpath=\'html/body/table/tr[2]/td/table/tr[4]/td/table/tr/td/table[2]\'', 
                'select * from html where url="http://www.sptrans.com.br" and xpath=\'//*[@id="listaNoticias"]\''
                ],
            'status': 'waiting',
            'resultados': {
                'onibus': [],
                'metro': [],
                'cptm': []
            }
        }
    };


/*********/
/* ajax  */
/*********/

   // $('.e-abrir').click(function() {
        
        var requestCallback = new ajaxCompletos({
            Requests: 6,
            callbackUnico: function() {
                //alert('100%');
                
            }
        });
        

    $.ajax({
            url: yql + dash.publico.query[0] + urlJsonP + 'METRO',
            dataType: 'jsonp',
            jsonp: 'callback',
            jsonpCallback: dash.publico.call[0],
            timeout: 9000,
            beforeSend: function() {
                Msgs('loading', Dash[3], 'Transporte Público');
            },
            success: function(data) {
                requestCallback.rqCompleto(true);
                Publi++;
                dash.publico.status = Publi;
                MT(data);
            },
            complete: function(){
                dashPublico();
             }
        }); 
      
    $.ajax({
            url: yql + dash.publico.query[1] + urlJsonP + 'CPTM',
            dataType: 'jsonp',
            jsonp: 'callback',
            jsonpCallback: dash.publico.call[1],
            timeout: 9000,
            success: function(data) {   
                    requestCallback.rqCompleto(true);
                    Publi++;
                    dash.publico.status = Publi;
                CP(data);
            },
            complete: function(){        
                //if (dash.publico.status === 3){dashPublico();}
                dashPublico();
             }
                     
        });
       
        
            $.ajax({
            url: yql + dash.publico.query[2] + urlJsonP + 'SPTRANS',
            dataType: 'jsonp',
            jsonp: 'callback',
            jsonpCallback: dash.publico.call[2],
            timeout: 9000,
            success: function(data) {   
                    requestCallback.rqCompleto(true);
                    Publi++;
                    dash.publico.status = Publi;
                SP(data);
            },
            complete: function(){        
                if (dash.publico.status === 3){dashPublico();}
                
             }
                     
        }); 
    

/////////////// Outros ajax

        $.ajax({
            url: yql + dash.clima.query + urlJsonP + 'Clima',
            dataType: 'jsonp',
            jsonp: 'callback',
            jsonpCallback: dash.clima.call,
            timeout: 9000,
            beforeSend: function() {
                Msgs('loading', 'ex-clima', 'Previsão do tempo');
            },
            error: function(x, t, m) {
                
            },
            success: function(data) { 
                    CL(data);
            },
            complete: function(){        
                var q = dash.clima.resultados;
                dashClima();
                
             }
                     
        });        
       
        $.ajax({
            url: yql + dash.aero.query + urlJsonP + 'Aero',
            dataType: 'jsonp',
            jsonp: 'callback',
            jsonpCallback: dash.aero.call,
            timeout: 9000,
            beforeSend: function() {
                Msgs('loading', Dash[2], ' Informação sobre Aeroportos ');
            },
            error: function(x, t, m) {
                if(t==="timeout") {
                    Msgs('timeout', Dash[2], 'Informação sobre Aeroportos está indisponível');
                } else {
                    Msgs('error', Dash[2], 'Informação sobre Aeroportos');
                }
            },
            success: function(data) {   
                    requestCallback.rqCompleto(true);
                    dash.aero.status = 'completo';
                    AE(data);
            },
            complete: function(){        
                if(dash.aero.status === 'completo'){
                    var q = dash.aero.resultados;               
                    dashAero();
                } else { Msgs('timeout', Dash[2], 'Informação sobre Aeroportos está indisponível'); }
             }
             
});
    

        $.ajax({
            url: yql + dash.transito.query + urlJsonP + 'Trans',
            dataType: 'jsonp',
            jsonp: 'callback',
            jsonpCallback:  dash.transito.call,
            timeout: 9000,
            beforeSend: function() {
                Msgs('loading', 'TR', 'Trânsito');
            },
            error: function(x, t, m) {
                if(t==="timeout") {
                    Msgs('timeout', Dash[4], 'Trânsito está indisponível');
                } else {
                    Msgs('error', Dash[4], 'Trânsito');
                }
            },
            success: function(data) {
                requestCallback.rqCompleto(true);
                TR(data);
                dash.transito.status = 'completo';
            },
            complete: function() {        
                if(dash.transito.status === 'completo'){
                    var q = dash.transito.resultados;               
                    dashTrans();
                } else { Msgs('timeout', Dash[4], 'Trânsito está indisponível'); }
             }
            
        });
        
        /* exceção para o rodízio
         * Este if  vai parar de rodar no dia 12 de janeiro
         * */  
                var Calendario = new Date();
                var MES = Calendario.getUTCMonth() + 1;
                var DIA = Calendario.getUTCDate();


                if(MES === 1 && DIA < 13 || MES === 12 && DIA > 25){
                	
                	var template = '<span class="sprite-verao rodz-pq"></span><strong class="em12 rodz">Rodízio</strong>'
     				   + '<div class="txt-left">'
     				   +     '<span>Suspenso até 13/01</span>'
     				   + '</div>';

            $('#RO').html(template);
                   
                } else {

        $.ajax({
            url: yql + dash.rodizio.query + urlJsonP + 'Rodizio',
            dataType: 'jsonp',
            jsonp: 'callback',
            jsonpCallback:  dash.rodizio.call,
            timeout: 9000,
            beforeSend: function() {
                Msgs('loading', Dash[5], 'Rodízio');
            },
            error: function(x, t, m) {
                if(t==="timeout") {
                    Msgs('timeout', Dash[5], 'Rodízio está indisponível');
                } else {
                    Msgs('error', Dash[5], 'Rodízio');
                }
            },
            success: function(data) {
                requestCallback.rqCompleto(true);
                RZ(data);
                dash.rodizio.status = 'completo';
            },
            complete: function(){        
                if(dash.rodizio.status === 'completo'){
                    //var q = dash.rodizio.resultados;               
                    dashRodizio();
                } else { Msgs('timeout', Dash[5], 'Rodízio está indisponível'); }
             }
            
        });
        
       }; //fecha exceção
        
        $.ajax({
			url         : context + '/controleDashboard/find',
			type        : 'GET',
			dataType    : 'json',
			success     : function(response){
				$('#qtdSemaforos').append(response.quantidadeSemaforos);
				$('#qtdArvores').append(response.quantidadeArvores);
				$('#qtdBuracos').append(response.quantidadeBuracos);
			}
		});


// ============================================================================
// FIM DE CODIGO PREFEITURA SP
// ============================================================================




$(document).ready(function() {

});