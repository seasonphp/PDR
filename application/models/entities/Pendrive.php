<?php
class Pendrive{
	
	private $id;
	private $nome;
	private $criacao;
	private $usuario;
	
	
	public function __construct(){
		$this->criacao = date('Y-m-d H:i:s');
	}
	
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
	public function setCriacao($criacao){
		$this->criacao = $criacao;
	}
	public function getUsuario(){
		return $this->usuario;
	}
	public function setUsuario(Usuario $usu){
		$this->usuario = $usu;
		$this->nome = $this->usuario->getApelido();
	}
}