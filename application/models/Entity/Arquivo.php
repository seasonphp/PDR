<?php
class Application_Model_Entity_Arquivo{
	
	private $id;
	private $nome;
	private $criacao;
	
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getCriacao(){
		return $this->criacao;
	}
	public function setCricao($criacao){
		$this->cricao = $criacao;
	}
}