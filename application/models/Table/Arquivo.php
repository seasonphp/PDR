<?php
class Application_Model_Table_Arquivo extends Zend_Db_Table_Abstract{
	
	protected $_name = 'arq_arquivo';
	protected $_primary = 'arq_id';
	
	protected $_referenceMap = 
			array(	'Application_Model_Table_TipoAcesso' => array(	'columns'    	=> array('tac_id'),
            								'refTableClass' => 'Application_Model_Table_TipoAcesso',
            								'refColumns'    => array('tac_id')),
					'Application_Model_Table_CodigoAcesso'=>array(	'columns'    	=> array('cac_id'),
            								'refTableClass' => 'Application_Model_Table_CodigoAcesso',
            								'refColumns'    => array('cac_id')),
					'Application_Model_Table_Diretorio'	=>array(	'columns'    	=> array('dir_id'),
            								'refTableClass' => 'Application_Model_Table_Diretorio',
            								'refColumns'    => array('dir_id'))
	);
	
	protected $_dependentTables = array('Application_Model_Table_Download');
}