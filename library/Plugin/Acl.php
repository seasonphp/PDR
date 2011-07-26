<?php
class Plugin_Acl{
	
 
    protected $_acl;

    public function __construct()
    {
        $this->_acl = new Zend_Acl();
        $this->_inicializar();
    }

    protected function _inicializar()
    {
        $this->_configTipoAcesso();
        $this->_configRecursos();
        $this->_configPrivilegios();
        $this->_saveAcl();
    }

    protected function _configTipoAcesso()
    {
        $this->_acl->addRole( new Zend_Acl_Role('visitante') );       
        $this->_acl->addRole( new Zend_Acl_Role('membro'), 'visitante' );        
    }

    protected function _configRecursos()
    {
        $this->_acl->addResource( new Zend_Acl_Resource('pendrive') );
        $this->_acl->addResource( new Zend_Acl_Resource('error') );
        $this->_acl->addResource( new Zend_Acl_Resource('index') );
        $this->_acl->addResource( new Zend_Acl_Resource('usuario') );
        $this->_acl->addResource( new Zend_Acl_Resource('auth') );
    }

    protected function _configPrivilegios()
    {
        $this->_acl->allow( 'visitante', 'index', 'index' )
                   ->allow( 'visitante', 'error', 'error' )
                   ->allow( 'visitante', 'usuario', array('teste','verificaemail','verificaapelido'))
                   ->allow( 'visitante', 'auth', array('autenticar','terminarsessao') )
                   ->allow( 'visitante', 'pendrive', array('cadastro','novo'));        
        $this->_acl->allow('membro','pendrive','privado')
        			->allow('membro','index','teste');
    }

    protected function _saveAcl() {
        $registry = Zend_Registry::getInstance();
        $registry->set('acl', $this->_acl);
    }
}