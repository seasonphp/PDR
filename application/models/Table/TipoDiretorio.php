<?php
class Application_Model_Table_TipoDiretorio extends Zend_Db_Table_Abstract{
	
	protected $_name = 'tdi_tipodiretorio';
	protected $_primary = 'tdi_id';
	
	protected $_dependentTables = array('Application_Model_Table_Diretorio');
}