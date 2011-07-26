<?php

class AuthController extends Zend_Controller_Action{

	private $usu;
	private $request;
	private $auth;
	private $zendAuth;
	
	
	
	public function init(){
		$this->request = $this->getRequest();		
	}

	public function autenticarAction(){
		$apelido = $this->request->getParam("usuario");
		$senha = $this->request->getParam("senha");		
		$this->dao = new Application_Model_Dao_Usuario();
		$this->usu = $this->dao->buscarPorApelido($apelido);
		if($this->usu != null ){
			
			if($this->usu->getSenha() == $senha){
				//autenticou
				$this->usu = new Application_Model_Entity_Usuario();
				$this->usu->setApelido($this->request->getParam('usuario'));
				$this->usu->setSenha($this->request->getParam('senha'));		
			
				$this->auth = new Plugin_Helper();
				$this->auth->setDados($this->usu);
				$result = $this->auth->authenticate();		
				if(!$result->isValid()){
					foreach ($result->getMessages() as $message){
						echo "$message\n";
					}
				}else{
					$this->zendAuth = Zend_Auth::getInstance();
					//Armazena os dados do usuário em sessão, apenas desconsiderando
					//a senha do usuário
					$info = $this->auth->getResultRowObject(null, 'senha');
					
					$this->usu->setEmail($info->usu_email);
					$this->usu->setNome($info->usu_nome);
					$this->usu->setId($info->usu_id);			
					
					$storage = $this->zendAuth->getStorage();
					$storage->write($this->usu);				
				}				                					
				echo 1;								
			}else{
				echo "Senha incorreta";
			}
		}else{
			echo "Conta não encontrada";
		}
		exit;		
		
	}
	
	public function terminarsessaoAction(){
		$this->zendAuth = Zend_Auth::getInstance();
		$this->zendAuth->clearIdentity();
		$this->_redirector->redirectAndExit();
		return;	
	}
	
	
}	