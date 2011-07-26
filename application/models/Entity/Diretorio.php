<?php

class Application_Model_Entity_Diretorio{
	
	private $id;
	private $parent;
	private $criacao;
	private $nome;
	private $pendrive;
	private $tipoAcesso;
	private $tipoDiretorio;
	
	public function __construct(){
		$this->tipoAcesso = 3;//default privado
		$this->criacao = date('Y-m-d H:i:s');
	}
	
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}
	public function getParent(){
		return $this->parent;
	}
	public function setParent($parent){
		$this->parent = $parent;
	}
	public function getCriacao(){
		return $this->criacao;
	}
	public function setCriacao($criacao){
		$this->criacao = $criacao;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome = 'dir_'.$nome;
	}
	public function getPendrive(){
		return $this->pendrive;
	}	
	public function setPendrive(Application_Model_Entity_Pendrive $pen){
		$this->pendrive = $pen;		
		if($this->getNome() == null || $this->getNome() == ''){
			$this->setNome($this->pendrive->getId());
			$this->setTipoAcesso(1);//publico, pois será o diretório raiz
		}
	}
	public function getTipoAcesso(){
		return $this->tipoAcesso;
	}
	public function setTipoAcesso($idTipoAcesso){
		$this->tipoAcesso = $idTipoAcesso;
	}
	public function getTipoDiretorio(){
		return $this->tipoDiretorio;
	}
	public function setTipoDiretorio($idTipoDiretorio){
		$this->tipoDiretorio = $idTipoDiretorio;		
	}
}