<?php
class PendriveController extends Zend_Controller_Action{
	
	private $usu;
	private $pen;
	private $dir;
	private $request;
	private $dao;	
	
	public function init(){
		$this->request = $this->getRequest();
	}
	
	public function novoAction(){		
				
		$this->usu = new Application_Model_Entity_Usuario();
		$this->usu->setNome($this->request->getParam('nome'));
		$this->usu->setEmail($this->request->getParam('email'));
		$this->usu->setApelido($this->request->getParam("apelido"));
		$this->usu->setSenha($this->request->getParam("senha"));
				
		$this->dao = new Application_Model_Dao_Usuario();		
		$this->pen = new Application_Model_Entity_Pendrive();
		
		$this->usu->setId($this->dao->inserir($this->usu));
		$this->pen->setUsuario($this->usu);	
			
		$this->setDaoNull();
				
		$this->dao = new Application_Model_Dao_Pendrive();
		$this->pen->setId($this->dao->criar($this->pen));	
			
		$this->dir = new Application_Model_Entity_Diretorio();
		$this->dir->setPendrive($this->pen);
		$this->dir->setTipoDiretorio(1);//diretório raiz
		
		$this->setDaoNull();
				
		$this->dao = new Application_Model_Dao_Diretorio();
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

	public function privadoAction(){
		echo "area restrita";
		exit;
	}
	
	
	private function setDaoNull(){		
		$this->dao = null;
	}
	
}