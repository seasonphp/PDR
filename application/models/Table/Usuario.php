<?php
class Application_Model_Table_Usuario extends Zend_Db_Table_Abstract{
	
	protected  $_name = 'usu_usuario';
	protected  $_primary = 'usu_id';
	
	protected $_dependentTables = array('Application_Model_Table_Pendrive');
}