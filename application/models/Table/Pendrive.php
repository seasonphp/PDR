<?php
class Application_Model_Table_Pendrive extends Zend_Db_Table_Abstract{
	
	protected $_name = 'pen_pendrive';
	protected $_primary = 'pen_id';
	
	protected $_dependentTables = array('Application_Model_Table_Diretorio');
}