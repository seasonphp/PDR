<?php
class Application_Model_Table_Diretorio extends Zend_Db_Table_Abstract{
	
	protected $_name = 'dir_diretorio';
	protected $_primary = 'dir_id';
	
	protected $_referenceMap = array(
			'Application_Model_Table_TipoDiretorio' => array(	'columns'    	=> array('tdi_id'),
            							'refTableClass' => 'Application_Model_Table_TipoDiretorio',
            							'refColumns'    => array('tdi_id'))
	);
}