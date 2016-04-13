// JavaScript Document
var intchat, cerrccchat 
var urlchat = 'https://www.mexicuga.com/chatax/';
//urlchat = 'http://localhost:8888/mexicuga/VERSION5/chatax/';


//CHAT
var myChatTime;
var initime = 2000;
var secontime = 10000;
var tertime = 30000;
var cuartime = 60000;
var intento = 0;


function openChatDelay(){
	setTimeout(abreAyudaEnLinea, 5000);
}

function cerrarChatDelay(){
	if($("#chatmultiuser").css("bottom")=="-60px"){
		subechat();
	}else{
		setTimeout(cerrarChat, 300);
	}
}



var CHATUSER = new Array();
var chatin = '';
var mensajenow = '';
var dataUserChat = new Array();
var enviante = '';
var chatactual = -1;


function init_count_avai(seg){
	window.clearInterval(myChatTime);
	switch (seg){
		case 2:
			console.log(2);
			myChatTime=setInterval(function () {check_availability_chat()}, secontime);
		break;
		case 3:
			console.log(3);
			myChatTime=setInterval(function () {check_availability_chat()}, tertime);
		break;
		case 4:
			console.log(4);
			myChatTime=setInterval(function () {check_availability_chat()}, cuartime);
		break;
		case 5:
			console.log(5);
		break;
		default:
			myChatTime=setInterval(function () {check_availability_chat()}, initime);
	}
	
}
function check_availability_chat(){  
		
		var asesorDispo = "";
//        $.post(urlchat +"chekasaway.php",
        $.post(urlchat +"chatax.php", {opt:'chekasaway'}, 
            function(result){ 
				console.log(result);
				if(result =="No hay asesores disponibles"){
					$('#operators').html(result); 
					$('#waitchat').html('<p class="rojo">Fuera de l&iacute;nea, d&eacute;janos tu mensaje y enseguida te atendemos</p>');
					$('#inichat').css('display', 'none');
				}else{
					$('#operators').html(result); 
					$('#waitchat').html('<p>'+result+'</p>');
					$('#inichat').css('display', 'block');				
				}
			}
        )
		.fail(function(error){
			if(error.readyState==0 && intento==3){
				intento = 4
				init_count_avai(5);
			}
			if(error.readyState==0 && intento==2){
				intento = 3
				init_count_avai(4);
			}
			if(error.readyState==0 && intento==1){
				intento = 2
				init_count_avai(3);
			}
			if(error.readyState==0 && intento==0){
				intento = 1;
				init_count_avai(2);
			}
		});  
}  

var _elIdAsesor, _elIdReal, _elNombre, _elAvatar;
function init_check_ase(idAsesor, idreal, nombre, avatar){
	_elIdAsesor = idAsesor;
	_elIdReal = idreal;
	_elNombre = nombre;
	_elAvatar = avatar
	window.clearInterval(intchat);
	window.clearInterval(myChatTime);
	myChatTime=setInterval(function () {check_asesor(idAsesor, idreal, nombre, avatar)}, initime);
}
function check_asesor(idases, idreal, nombre, avatar){  
        //use ajax to run the check  
		var asesorDispo = "";
        $.post(urlchat +"chatax.php", {opt:'checkasesochat', idases:idases, idreal:idreal, nombre:nombre, avatar:avatar},
            function(result){ 
			console.log(result);
			if(result =="No hay usuarios disponibles"){
				$('#chatasesor').html(result); 
				$('#inputchat').hide();
			}else{
				$('#inputchat').show();
				CHATUSER = result.split("_*+_");
	//			dataUserChat[0] = CHATUSER;
				/*
					$nvoArr[0] = $arrchatnvo[0];	//OperadorID
					$nvoArr[1] = $arrchatnvo[1]; //Mexicuga Real ID
					$nvoArr[2] = $arrchatnvo[2]; //Nombre fictisio
					$nvoArr[3] = $arrchatnvo[3]; //Avatar
					$nvoArr[4] = $lastid;		//ID usuario
					$nvoArr[5] = $res->nombre; //Nombre de usuario
					$nvoArr[6] = $res->mail; //Nombre de usuario
					$nvoArr[7] = $res->telefono; //Nombre de usuario
				var chatin= '<p class="comercialnombre"><b>'+dataUserChat[2]+'</b> <span class="tiempo">'+fechita+'</span><br></p><p class="comercial">'+mensajenow;
				*/
				window.clearInterval(myChatTime);
				dataUserChat = CHATUSER;

				conversa_chat_from_ase()
			}
        });  
}  


function checkspaces(){
	if(valfields('nomchat')==0){
			$('#elerror').html('<p><b>Tu nombre es incorrecto</b></p>')
			$('#nomchat').focus();
		return;
	}
	if( !isValidEmailAddress( $('#mailchat').val() ) ){
			$('#elerror').html('<p><b>Tu correo es incorrecto</b></p>')
			$('#mailchat').focus();
		return;
	}
	if(valfields('txtchatsend')==0){
			$('#elerror').html('<p><b>Ingresa un mensaje para iniciar</b></p>')
			$('#txtchatsend').focus();
		return;
	}

	initiachat();
}

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};

function valfields(valin){
	var str = $("#"+valin).val();
	if (str.match(/^\s*$/)) {
		return 0;
	} else {
		return 1;
	}
}
function valiNume() {
    var currency = document.getElementById("msjchat").value;
      var pattern = /^[1-9]\d*(?:\.\d{0,2})?$/ ;
    if (pattern.test(currency)) {
        return 1;
    } 
        return 0;
}

function initiachat(){
	var nombrechat = $('#nomchat').val();
	var mailchat = $('#mailchat').val();
	var msjchat = $('#txtchatsend').val();
	init_chat_ase(nombrechat, mailchat, msjchat);
}
function init_chat_ase(nombrechat, mailchat, msjchat){
	console.log(nombrechat, mailchat, msjchat);
        $.post(urlchat +"chatax.php", {opt:'init', nom:nombrechat, mail:mailchat, msj:msjchat},
            function(result){ 
			if(result !=  new Array()){
				CHATUSER = result.split("-*-*-");
				obten_id_chat(msjchat);
			}else{
			}
        });  
}  

function obten_id_chat(msjinicial){
	var usuarios = CHATUSER.join('-*-*-');;
        $.post(urlchat +"chatax.php", {opt:'idchat', users:usuarios},
            function(result){ 
			if(result !=  new Array()){
				console.log("id chat ");
				console.log(result);
				console.log("-----");
				CHATUSER = result.split("-*-*-");
				dataUserChat = CHATUSER;
				/*
					$nvoArr[0] = $arrchatnvo[0];	//OperadorID
					$nvoArr[1] = $arrchatnvo[1]; //Mexicuga Real ID
					$nvoArr[2] = $arrchatnvo[2]; //Nombre fictisio
					$nvoArr[3] = $arrchatnvo[3]; //Avatar
					$nvoArr[4] = $lastid;		//ID usuario
					$nvoArr[5] = $res->nombre; //Nombre de usuario
					$nvoArr[6] = $res->mail; //Nombre de usuario
					$nvoArr[7] = $res->telefono; //Nombre de usuario
				*/
				var dat = new Date();
				 var fechita = putcero(dat.getDate())+"/"+putcero((dat.getMonth()+1))+"/"+dat.getFullYear();
				 //+"  " + putcero(dat.getHours()) +":"+ putcero(dat.getMinutes());				
				 mensajenow = msjinicial;
				chatin = '<p class="comercialnombre"><b>'+dataUserChat[2]+'</b> <span class="tiempo">'+fechita+'</span><br></p><p class="comercial">'+mensajenow;			
				$('#campores').html(chatin); 
				$('#campores').css('display', 'block');
				$('#inputchat').css('display', 'block');
				$('#datoschat').css('display', 'none');
				conversa_chat_from_user("user", mensajenow);
				window.clearInterval(myChatTime);
			}
        });  
}

function send_text_chat(){
	mensajenow = $('#txtchatsend').val();
	$('#txtchatsend').val('');
	if($('#txtchatsend').val()!=undefined){
		mensajenow = $('#txtchatsend_now').val();
		$('#txtchatsend_now').val('');
	}
	$('#txtchatsend').val('');
	conversa_chat_from_user('user', mensajenow);
}
function ans_text_chat(datosssuuss){
	mensajenow = $('#txtchatsend').val();
	$('#txtchatsend').val('');
	conversa_chat_from_ase();
	datosus = datosssuuss;
}

function conversa_chat_from_user(ho, inicial){
		var dedonde = (ho=="agente") ? 'agente' : 'user';
		var datosus = dataUserChat.join("-*-*-");
		console.log("  datosus  " + datosus);
		mensajenow= (inicial=='') ? mensajenow : inicial;
		console.log("msj: " +mensajenow);
		console.log("who: " +dedonde);
		console.log("datos: " +datosus);
        $.post(urlchat +"chatax.php", {opt:'conversa', mensaje:mensajenow, datos:datosus, who:dedonde},
	    function(result){ 
		console.log("  -------  " + result);
		if(result > -1){
			enviante = "user";
				chatactual = result;
				putChat(chatactual, "user");
			}else{
				console.log("else");
			}
        });  
}
function getchatuser(cadena){
	CHATUSER = cadena.split("_*+_");	
	dataUserChat = CHATUSER;
	chatactual = dataUserChat[4];
	putChat(chatactual, "user");
	subechat();
	/*
					$nvoArr[0] = $arrchatnvo[0];	//OperadorID
					$nvoArr[1] = $arrchatnvo[1]; //Mexicuga Real ID
					$nvoArr[2] = $arrchatnvo[2]; //Nombre fictisio
					$nvoArr[3] = $arrchatnvo[3]; //Avatar
					$nvoArr[4] = $lastid;		//ID usuario
					$nvoArr[5] = $res->nombre; //Nombre de usuario
					$nvoArr[6] = $res->mail; //Nombre de usuario
					$nvoArr[7] = $res->telefono; //Nombre de usuario
				var chatin= '<p class="comercialnombre"><b>'+dataUserChat[2]+'</b> <span class="tiempo">'+fechita+'</span><br></p><p class="comercial">'+mensajenow;
				*/
}
function conversa_chat_from_ase(){
		//var dedonde = (ho=="agente") ? 'agente' : 'user';
		var dedonde = 'agente';
		var datosus = dataUserChat.join("-*-*-");

        $.post(urlchat +"chatax.php", {opt:'conversa', mensaje:mensajenow, datos:datosus, who:dedonde},
	    function(result){ 
		console.log("  result  " + result +"  "+ dataUserChat[4])
		if(result > -1){
			enviante = "agente";
				chatactual = result;
				putChat(chatactual, "agente");
			}else{
				console.log("else");
			}
        });  
}


var chaant = '';
function putChat(idchat, tipo){
		console.log(" entre a putchat " + idchat +"  " + tipo);
		window.clearInterval(intchat);
		console.log(tipo)
		var posteo = urlchat +"chatax.php";
        $.post(posteo, {opt:'getchat', idchat:idchat},
            function(result){ 
			if(result){
				var cha = result.split("*:;*");
				var chatotal = '';
					for(var a=0; a<cha.length; a++){
							var excha = cha[a].split("_*+_");
		//					var fechita = putcero(dat.getDate())+"/"+putcero((dat.getMonth()+1))+"/"+dat.getFullYear()+"  " + putcero(dat.getHours()) +":"+ putcero(dat.getMinutes());
						if(excha[2]!=""){
							excha[2] = excha[2].replace('*+_+*', '<br>');
							dias = excha[5].split(" ");
							dias = dias[0];
							if (dataUserChat[0]==excha[3]){
								chatotal += '<p class="comercialnombre"><b>'+dataUserChat[2]+'</b> <span class="tiempo">'+dias+'</span><br></p><p class="comercial">'+excha[2];
							}else{
								chatotal += '<p class="usuarionombre"><b>' + dataUserChat[5] + '</b> <span class="tiempo">'+dias+'</span><br></p><p class="usuario">'+excha[2]+'</p>';
							}
						}
					}
					
				
				if(tipo=="agente"){

						$('#chatasesor').html(chatotal);	
						if(chaant != chatotal){
							//PlaySound();
							$("#chatasesor").scrollTop($("#chatasesor")[0].scrollHeight);
						}
						chaant = chatotal;
	
				}else{
	
						$('#campores').html(chatotal); 
						$('#campores').css('display', 'block');
						$('#inputchat').css('display', 'block');
						$('#datoschat').css('display', 'none');
						if(chaant != chatotal){
							//PlaySound();
							$("#campores").scrollTop($("#campores")[0].scrollHeight);
						}
						chaant = chatotal;

				}
				retIntChat();
			}else{
						chaant += '<p class="comercialnombre"><br><b>EL USUARIO HA ABANDONADO EL CHAT</b><br>Se reiniciar&aacute; tu sesi&oacute;n en 10 segundos...</p>';

						$('#chatasesor').html(chaant);	

						$('#inputchat').css('display', 'none');

							$("#chatasesor").scrollTop($("#chatasesor")[0].scrollHeight);
						chaant = '';

				reinitAllChat();

			}
        });
		
		
}

function cerrarChat(){
	window.clearInterval(intchat);
	if($('#datoschat').is(":visible")){
		cierraAyudaEnLinea();
		reinitChat()
	}else{
		$('#cierrachat').show();
	}
}
function justclose(){
	closeChatAsesor(0);
}
function closeandsend(){
	sendchat();
	closeChatAsesor(1);
}
function cancelclose(){
	$('#cierrachat').hide();
}
function closeChatAsesor(envia){
        $.post(urlchat +"chatax.php", {opt:'cierra', idchat:chatactual},
	    function(result){ 
		if(result=='1'){
				if(envia==1){
				}else{
					cancelclose();
					cierraAyudaEnLinea();
					reinitVarsChat();
				}
			}else{
				console.log("nocerro");
			}
        }); 
		
		reinitChat();
}

function cierraAyudaEnLinea(){
	$('#chatmultiuser').animate({bottom:-60});
	reinitChat();
}
function abreAyudaEnLinea(){
	reinitChat();
	subechat();
}
function subechat(){
	//FER
	//$('#chatmultiuser').animate({bottom:195});
	$('#chatmultiuser').animate({bottom:30});
}

function reinitChat(){
	$('#campores').html(''); 
	$('#nomchat').val(''); 
	$('#mailchat').val(''); 
	$('#msjchat').val(''); 
	
	$('#datoschat').css('display', 'block');
	$('#campores').css('display', 'none');
	$('#inputchat').css('display', 'none');
	$('#cierrachat').css('display', 'none');
}


function sendchat(){
		$('#intenta').html('<p><br><b>Enviando...</b></p>');
		var datos = dataUserChat.join("+*_*+");
        $.post(urlchat +"chatax.php", {opt:'sendchat', idchat:chatactual, users:datos},
            function(result){ 
			if(result=='1'){
				$('#intenta').html('');
				reinitVarsChat();
				cierraAyudaEnLinea();
				cancelclose();
			}else{
				intentadenuevo();
				console.log("no se envio chat");
			}
        });
}

function intentadenuevo(){
	$('.intenta').html('<p><br><b>Int&eacute;ntalo nuevamente</b></p>');
}

function reinitVarsChat(){
	CHATUSER = new Array();
	chatin = '';
	mensajenow = '';
	dataUserChat = new Array();
	enviante = '';
	chatactual = -1;
	reinitChat();
}



function chechchatsase(idase){
}



function retIntChat(){
	intchat = setInterval(function (){tiempoCheckChat()}, initime*2);
}
function reinitAllChat(){
	//init_check_ase(<?=$stringusuario[0].",".$stringusuario[1].",'".$stringusuario[2]."','".$stringusuario[3]."'"?>);
	
	intchat = setInterval(function (){init_check_ase(_elIdAsesor, _elIdReal, _elNombre, _elAvatar)}, initime*4);
}
function tiempoCheckChat(){
	putChat(chatactual, enviante);
}


function putcero(st){
	return (String(st).length==1) ? "0" +st : String(st);
}

function PlaySound() {
	var snd = new Audio("beep.mp3");
	snd.play();
}