<?php
class Application_Model_Entity_Usuario implements Zend_Acl_Role_Interface{
	
	private $id;
	private $apelido;
	private $senha;
	private $nome;
	private $email;
	
	
	public function getRoleId(){
		return "membro";
	}	
	
	
	public function getEmail(){
		return $this->email;
	}	
	public function setEmail($email){
		$this->email = $email;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}
	public function getApelido(){
		return $this->apelido;
	}
	public function setApelido($apelido){
		$this->apelido = $apelido;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}
	 
}
?>