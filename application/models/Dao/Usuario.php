<?php
class Application_Model_Dao_Usuario{
	
	private $table;
	private $result;
	private $usu;
	private $data;
	private $adapter;
	
	
	public function inserir(Application_Model_Entity_Usuario $usu){
		try{
			$this->data = $this->convertObjArray($usu);		
			$this->table = new Application_Model_Table_Usuario();
			return $this->table->insert($this->data);
		}catch(Zend_Exception $e){
			echo 'Não foi possível realizar a inserção de usuário';
			$e->getMessage();
		}	
	}
	
	
	public function buscarPorApelido($apelido,$senha){		
		
		//$this->dbadapter;		
		
		$this->table = new Application_Model_Table_Usuario();
		$this->result = $this->table->fetchAll("usu_apelido = '".$apelido."'");
		
		if($this->result->current() != null){
			$row = $this->result->current();
			
			$this->usu = new Application_Model_Entity_Usuario();
			$this->usu->setApelido($row->usu_apelido);
			$this->usu->setId($row->usu_id);
			$this->usu->setSenha($row->usu_senha);
			$this->usu->setNome($row->usu_nome);
			$this->usu->setEmail($row->usu_email);
		}
		return $this->usu;
	}
	public function buscarPorEmail($email){		
		
		$this->table = new Application_Model_Table_Usuario();
		$this->result = $this->table->fetchAll("usu_email = '".$email."'");
		
		if($this->result->current() != null){
			$row = $this->result->current();
			
			$this->usu = new Application_Model_Entity_Usuario();
			$this->usu->setApelido($row->usu_apelido);
			$this->usu->setId($row->usu_id);
			$this->usu->setSenha($row->usu_senha);
			$this->usu->setNome($row->usu_nome);
			$this->usu->setEmail($row->usu_email);
		}
		return $this->usu;
	}
	
	
	
	private function convertObjArray(Application_Model_Entity_Usuario $usu){
		return array(	'usu_apelido'	=> $usu->getApelido(),
						'usu_senha' 	=> $usu->getSenha(),
						'usu_email'		=> $usu->getEmail(),
						'usu_nome'		=> $usu->getNome()	);
	}
}
