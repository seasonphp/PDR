<?php
class Application_Model_Table_Download extends Zend_Db_Table_Abstract{
	
	protected $_name = 'dow_download';
	protected $_primary = 'dow_id';	
	
	protected $_referenceMap = array(
					'Application_Model_Table_Arquivo' => array(	'columns'    	=> array('arq_id'),
            							'refTableClass' => 'Application_Model_Table_Arquivo',
            							'refColumns'    => array('arq_id'))
	);
}