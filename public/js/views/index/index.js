function autenticar(){
	$("#msgAutenticacao").text("").hide();
	
	var baseUrl = new Helper().baseUrl();
	
	var usuario = $("#usuario").val();
	var senha = $("#senha").val();
	var retorno = new CustomAjax().simple(baseUrl+"/auth/autenticar", "usuario="+usuario+"&senha="+senha);	
	if(retorno == 1){
		window.location = baseUrl+'/pendrive/privado';
	}else{
		$("#msgAutenticacao").text(retorno).show();
	}
	
}