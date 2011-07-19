<?php
class DiretorioTable extends Zend_Db_Table_Abstract{
	
	protected $_name = 'dir_diretorio';
	protected $_primary = 'dir_id';
	
	protected $_referenceMap = array(
			'TipoDiretorio' => array(	'columns'    	=> array('tdi_id'),
            							'refTableClass' => 'TipoDiretorioTable',
            							'refColumns'    => array('tdi_id'))
	);
}