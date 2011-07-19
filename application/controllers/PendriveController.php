<?php
class PendriveController extends Zend_Controller_Action{
	
	private $usu;
	private $pen;
	private $dir;
	private $request;
	private $dao;	
	
	public function novoAction(){
		$this->request = $this->getRequest();
		
		Zend_Loader::loadClass("Usuario",APPLICATION_PATH."/models/entities");		
		$this->usu = new Usuario();
		$this->usu->setNome($this->request->getParam('nome'));
		$this->usu->setEmail($this->request->getParam('email'));
		$this->usu->setApelido($this->request->getParam("apelido"));
		$this->usu->setSenha($this->request->getParam("senha"));
				
		Zend_Loader::loadClass("UsuarioDAO",APPLICATION_PATH."/models/DAOs");
		$this->dao = new UsuarioDAO();
		Zend_Loader::loadClass("Pendrive",APPLICATION_PATH."/models/entities");
		$this->pen = new Pendrive();
		$this->usu->setId($this->dao->inserir($this->usu));
		$this->pen->setUsuario($this->usu);		
		$this->setDaoNull();
		
		Zend_Loader::loadClass("PendriveDAO",APPLICATION_PATH."/models/DAOs");
		$this->dao = new PendriveDAO();
		$this->pen->setId($this->dao->criar($this->pen));
		
		Zend_Loader::loadClass("Diretorio",APPLICATION_PATH."/models/entities");
		$this->dir = new Diretorio();
		$this->dir->setPendrive($this->pen);
		$this->dir->setTipoDiretorio(1);//diretório raiz
		$this->setDaoNull();
		
		Zend_Loader::loadClass("DiretorioDAO",APPLICATION_PATH."/models/DAOs");
		$this->dao = new DiretorioDAO();
		$check = $this->dao->criar($this->dir);
		
		if($check != 0 && $check != null){
			echo 1;
		}
		exit;
		
		
	}
	public function cadastroAction(){
		
	}
	public function publicoAction(){
		
		echo $this->getRequest()->getParam("user");
		exit;
	}
	
	
	
	
	private function setDaoNull(){
		$this->dao = null;
	}
	
}