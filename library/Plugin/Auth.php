<?php
class Plugin_Auth extends Zend_Controller_Plugin_Abstract{
	
 	
    protected $_auth = null;    
    protected $_acl = null;
   
    
    protected $_erro = array(
        'controller' => 'index',
        'action'     => 'index',
        'module'     => 'default'
    );

    public function __construct(){
        $this->_auth = Zend_Auth::getInstance();
        $this->_acl = Zend_Registry::get('acl');
    }

    public function preDispatch(Zend_Controller_Request_Abstract $request){
    	$controller = "";
    	$action     = "";
    	$module     = "";

    	if ( !$this->_isAuthorized($request->getControllerName(),$request->getActionName()) ) {
    		$controller = $this->_erro['controller'];
    		$action     = $this->_erro['action'];
    		$module     = $this->_erro['module'];
    	}else{
    		$controller = $request->getControllerName();
    		$action     = $request->getActionName();
    		$module     = $request->getModuleName();
    	}
    	$request->setControllerName($controller);
    	$request->setActionName($action);
    	$request->setModuleName($module);
    }
   

    protected function _isAuthorized($controller, $action){
        $this->_acl = Zend_Registry::get('acl');
        if($this->_auth->hasIdentity()){
        	//$user = 'membro';
        	$user = $this->_auth->getIdentity();
        }else{
        	$user = 'visitante';
        }	       
        if ( !$this->_acl->has( $controller ) || !$this->_acl->isAllowed( $user, $controller, $action ) )
            return false;
        return true;
    }
}