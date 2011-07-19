<?php
class CodigoAcessoTable extends Zend_Db_Table_Abstract{
	
	protected $_name = 'cac_codigoacesso';
	protected $_primary = 'cac_id';
	
	protected $_dependentTables = array('DiretorioTable','ArquivoTable');
}