<?php
class Application_Model_Table_TipoAcesso extends Zend_Db_Table_Abstract{
	
	protected $_name = 'tac_tipoacesso';
	protected $_primary = 'tac_id';
	
	protected $_dependentTables = array('Application_Model_Table_Diretorio','Application_Model_Table_Arquivo');
}