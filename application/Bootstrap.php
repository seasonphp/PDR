<?php


class Bootstrap extends Zend_Application_Bootstrap_Bootstrap{


	protected function _initDoctype()
	{
		$this->bootstrap('view');
		$view = $this->getResource('view');
		$view->doctype('XHTML1_STRICT');		 
		 
	}


	/**
	 * Função faz a conexão com o banco de dados e registra a variável $db para
	 * que ela esteja disponível em toda a aplicação.
	 */
	protected function _initConnection(){
		/**
		 * Obtém os resources(recursos).
		 */
		$options    = $this->getOption('resources');
		$db_adapter = $options['db']['adapter'];
		$params     = $options['db']['params'];

		try{	
			
			$db = Zend_Db_Table::getDefaultAdapter();
			
			// Registra a $db para que se torne acessível em toda app
			$registry = Zend_Registry::getInstance();
			$registry->set('db', $db);


		}catch( Zend_Exception $e){

			echo "Estamos sem conexão ao banco de dados neste momento. Tente mais tarde por favor.";

			exit;
		}

	}
}

