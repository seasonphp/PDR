<?php
class Plugin_Helper extends Zend_Auth_Adapter_DbTable{
	
	public function __construct(){		
		$this	->_setDbAdapter($this->_adapter)
				->setTableName("usu_usuario")
				->setIdentityColumn("usu_apelido")
				->setCredentialColumn("usu_senha");
		return $this;		
	}
	
	public function setDados(Application_Model_Entity_Usuario $usu){
		$this	->setIdentity($usu->getApelido())
				->setCredential($usu->getSenha());
		return $this;		
	}
}