<?php
class ArquivoTable extends Zend_Db_Table_Abstract{
	
	protected $_name = 'arq_arquivo';
	protected $_primary = 'arq_id';
	
	protected $_referenceMap = 
			array(	'TipoAcesso' => array(	'columns'    	=> array('tac_id'),
            								'refTableClass' => 'TipoAcessoTable',
            								'refColumns'    => array('tac_id')),
					'CodigoAcesso'=>array(	'columns'    	=> array('cac_id'),
            								'refTableClass' => 'CodigoAcessoTable',
            								'refColumns'    => array('cac_id')),
					'Diretorio'	=>array(	'columns'    	=> array('dir_id'),
            								'refTableClass' => 'DiretorioTable',
            								'refColumns'    => array('dir_id'))
	);
	
	protected $_dependentTables = array('DownloadTable');
}