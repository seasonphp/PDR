<?php
class UsuarioController extends Zend_Controller_Action{

	private $request;
	private $dao;
	private $usu;

	public function verificaapelidoAction(){
		$this->request = $this->getRequest();
		$apelido = $this->request->getParam("apelido");
		Zend_Loader::loadClass('UsuarioDAO',APPLICATION_PATH.'/models/DAOs');
		$this->dao = new UsuarioDAO();
		$this->usu = $this->dao->buscarPorApelido($apelido);
		if($this->usu == null){
			echo 1;
		}else{
			echo 0;
		}
		exit;
	}

	public function verificaemailAction(){
		$this->request = $this->getRequest();
		$apelido = $this->request->getParam("email");
		Zend_Loader::loadClass('UsuarioDAO',APPLICATION_PATH.'/models/DAOs');
		$this->dao = new UsuarioDAO();
		$this->usu = $this->dao->buscarPorEmail($apelido);
		if($this->usu == null){
			echo 1;
		}else{
			echo 0;
		}
		exit;
	}

	public function autenticarAction(){

		$this->request = $this->getRequest();
		$apelido = $this->request->getParam("apelido");
		$senha = $this->request->getParam("senha");

		Zend_Loader::loadClass('UsuarioDAO',APPLICATION_PATH.'/models/DAOs');
		$this->dao = new UsuarioDAO();
		$this->usu = $this->dao->buscarPorApelido($apelido);
		if($this->usu != null ){
			if($this->usu->getSenha() == $senha){
				//autenticou
				
				/*SÓ EXECUTA O ZEND_AUTH QUANDO O USUÁRIO JÁ FOI VERIFICADO NO BD*/
				$aut = new Zend_Auth_Adapter_DbTable($this->_adapter);
				$aut->setTableName("usu_usuario")
					->setIdentityColumn("usu_apelido")
					->setCredentialColumn("usu_senha");

				$aut->setIdentity($this->usu->getApelido())->setCredential($this->usu->getSenha());
				$result = $aut->authenticate();
				if(!$result->isValid()){
					foreach ($result->getMessages() as $message){
						echo "$message\n";
					}
				}else{
					echo 1;
				}				
			}else{
				echo "Senha incorreta";
			}
		}else{
			echo "Conta não encontrada";
		}
		exit;

	}
}