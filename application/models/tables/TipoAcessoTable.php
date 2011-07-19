<?php
class TipoAcessoTable extends Zend_Db_Table_Abstract{
	
	protected $_name = 'tac_tipoacesso';
	protected $_primary = 'tac_id';
	
	protected $_dependentTables = array('DiretorioTable','ArquivoTable');
}