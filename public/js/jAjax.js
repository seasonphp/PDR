
/**
*	@author	Pedro Ribeiro - 	pcelta
*		Data:		23/05/2011
*
*
*	"Classe" responsável por efetuar requisições ajax
*
*	Métodos disponíveis
*
*	slack(form)
*		- recebe o formulario como paramêtro
*		- o formulario deve estar com o atributo action declarado
* 
*
	sigle(url)
		- recebe a url alvo
		

*	simple(newAction, newData)
*			-recebe apenas os parametros necessários para efetuar a requisição
*			-param 1 = dados serializados que serão enviados pela requisição
*			-param 2 = metodo de envio GET/POST, por padrão é enviado via POST
*			
*
*	advanced(newAction, newData, newMethod)
*			-recebe todos os parametros editáveis para efetuar a requisição
*			-param 1 = url que será requisitada
*			-param 2 = dados serializados que serão enviados pela requisição
*			-param 3 = metodo de envio GET/POST, por padrão é enviado via POST
*
*
*	TODOS ESTES MÉTODOS RETORNAM DATA
*/


function CustomAjax(){


	/*ATRIBUTOS PRIVADOS*/
	var method 	= "POST";
	var action		= "";
	var data		= "param=false";
	var async		= false;


	/*METODO PRIVADO QUE EFETUA A REQUISIÇÃO AJAX*/
	doAjax = function(){
		var retorno = null;
		retorno = $.ajax({
			type:	method,
			url:	action,
			data:	data,
			async:	async		
		}).responseText;
		return retorno;
	}

	/*METODOS PUBLICOS QUE SERÃO CHAMADOS PELO OBJETOS*/
	
	
	/***	@param formulario
	 * 		@returns data
	 */
	this.slack = function(form){
		action	= $(form).attr("action");
		data 	= $(form).serialize();
		return doAjax();
	}
	
	
	/***	@param url, dadosSerializados
	 * 		@returns data
	 */
	this.simple = function(newAction, newData){
		setAction(newAction);
		setData(newData);
		return doAjax();
	}
	
	
	/***	@param url
	 * 		@returns data
	 */
	this.single = function(newAction){
		setAction(newAction);		
		return doAjax();
	}

	
	/***	@param url, dadosSerializados, method = POST/GET
	 * 		@returns data
	 */
	this.advanced = function(newAction, newData, newMethod){
		setAction(newAction);
		setMethod(newMethod);
		setData(newData);
		return doAjax();		
	}




	/* METODOS GETS / SETS PRIVADOS, SÓ SÃO UTILIZADOS INTERNAMENTE */
	
	setMethod = function(newMethod){
		if(newData != "" || newData != null){
			method = newMethod;
		}		
	}
	getMethod = function(){
		return method;	
	}
	setAction = function(newAction){
		action = newAction;
	}
	getAction = function(){
		return action;
	}
	setData = function(newData){
		data = newData;
	}
	getData = function(){
		return data;
	}

}





















