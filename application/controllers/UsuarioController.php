<?php
class UsuarioController extends Zend_Controller_Action{

	private $request;
	private $dao;
	private $usu;
	
	
	public function init(){
		$this->request = $this->getRequest();
	}	
			
	public function testeAction(){		
			
		if(Zend_Auth::getInstance()->hasIdentity()){
			echo 'tem id';
		}else{
			echo 'nao tem id';			
		}		
		exit;
	}

	public function verificaapelidoAction(){		
		$apelido = $this->request->getParam("apelido");		
		$this->dao = new Application_Model_Dao_Usuario();
		$this->usu = $this->dao->buscarPorApelido($apelido);
		if($this->usu == null){
			echo 1;
		}else{
			echo "Usuário já cadastro";
		}
		exit;
	}

	public function verificaemailAction(){		
		$apelido = $this->request->getParam("email");		
		$this->dao = new Application_Model_Dao_Usuario();
		$this->usu = $this->dao->buscarPorEmail($apelido);
		if($this->usu == null){
			echo 1;
		}else{
			echo "Email já cadastrado";
		}
		exit;
	}

	public function autenticarAction(){		
		$apelido = $this->request->getParam("usuario");
		$senha = $this->request->getParam("senha");		
		$this->dao = new Application_Model_Dao_Usuario();
		$this->usu = $this->dao->buscarPorApelido($apelido);
		if($this->usu != null ){
			if($this->usu->getSenha() == $senha){
				//autenticou				                					
				echo 1;								
			}else{
				echo "Senha incorreta";
			}
		}else{
			echo "Conta não encontrada";
		}
		exit;
	}
}