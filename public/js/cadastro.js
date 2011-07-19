$(document).ready(function(){
	$("#formNovoPendrive").validate({
		rules:{
			nome:{
				required:true
			},
			email:{
				required:true,
				email:true
			},
			apelido:{
				required:true,
				minlength:5
			},
			senha:{
				required:true,
				minlength:5
			},
			confirSenha:{
				required: true,
				equalTo: "#senha"
			}
		},
		messages:{
			nome:{
				required:"Nome requerido"
			},
			email:{
				required:"Email requerido",
				email:"Email inválido"
			},
			apelido:{
				required:"Apelido requerido",
				minlength:"Mínimo 5 caracteres"
			},
			senha:{
				required:"Senha requerida",
				minlength:"Mínimo de 5 caracteres"
			},
			confirSenha:{
				required: "Confirmação de senha requerida",
				equalTo: "Confirmação não consiste com senha digitada"
			}
			
		},
		submitHandler:function(){
			$("#formNovoPendrive").attr("action","/public/pendrive/novo");
			var ajax = new CustomAjax();
			$("#formNovoPendrive").slideUp();
			$("#msgFormNovoPendrive").text("Aguarde enquanto  seu Pendrive é criado...").show();
			var retorno = ajax.slack($("#formNovoPendrive"));
			if(retorno == 1){
				window.location = "http://locahost/public/pendrive/restrito";
			}else{
				$("#msgFormNovoPendrive").text("Não foi possível realizar a conclusão da requisição, por favor tente mais tarde");
			}
		}
	});
});



function checkApelido(input){
	$("#criar").hide();
	apelido = $(input).val();
	if(apelido.length >= 5 && !$(input).hasClass("erro")){
		var ajax = new CustomAjax();
		var data = "apelido="+apelido;
		var action = "http://localhost/public/usuario/verificaapelido";
		$("#loadApelido").show();
		var retorno = ajax.simple(action, data);
		if(retorno == 1){
			$("#loadApelido").attr("src","http://localhost/public/imagens/tick.png");
			$("#criar").show();
		}else{
			$("#loadApelido").attr("src","http://localhost/public/imagens/cross.png");
			
		}
	}
}
function checkEmail(input){
	
	$("#criar").hide();
	email = $(input).val();
	if(email.length >= 5 && !$(input).hasClass("erro")){
		var ajax = new CustomAjax();
		var data = "email="+email;
		var action = "http://localhost/public/usuario/verificaemail";
		$("#loadEmail").show();
		var retorno = ajax.simple(action, data);
		if(retorno == 1){
			$("#loadEmail").attr("src","http://localhost/public/imagens/tick.png");
			$("#criar").show();
		}else{
			$("#loadEmail").attr("src","http://localhost/public/imagens/cross.png");
			
		}
	}	
}
function limpaImg(input){
	$(input).next().hide();
}