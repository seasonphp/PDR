<?php
class Application_Model_Table_CodigoAcesso extends Zend_Db_Table_Abstract{
	
	protected $_name = 'cac_codigoacesso';
	protected $_primary = 'cac_id';
	
	protected $_dependentTables = array('Application_Model_Table_Diretorio','Application_Model_Table_Arquivo');
}