function autenticar(){
	$("#msgAutenticacao").text("").slideUp();
	var apelido = $("#autenticacao").find("#usuario").val();
	var senha = $("#autenticacao").find("#senha").val();
	if(apelido.length >= 5 && senha.length >= 5){		
		$("#imgLoadAutenticacao").show();
		var ajax = new CustomAjax();
		var data = "apelido="+apelido+"&senha="+senha;		
		var retorno = ajax.simple("http://localhost/public/usuario/autenticar", data);
		if(retorno == 1){
			window.location = "http://locahost/public/pendrive/privado";
		}else{
			$("#erroAutenticacao").text(retorno).slideDown();
		}
		$("#imgLoadAutenticacao").hide();
	}else{
		$("#erroAutenticacao").text("Os campos devem conter no mínimo 5 caracteres!").slideDown();
	}
}