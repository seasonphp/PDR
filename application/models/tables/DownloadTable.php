<?php
class DownloadTable extends Zend_Db_Table_Abstract{
	
	protected $_name = 'dow_download';
	protected $_primary = 'dow_id';
	
	protected $_dependentTables = array('ArquivoTable');
	
	protected $_referenceMap = array(
					'Arquivo' => array(	'columns'    	=> array('arq_id'),
            							'refTableClass' => 'ArquivoTable',
            							'refColumns'    => array('arq_id'))
	);
}