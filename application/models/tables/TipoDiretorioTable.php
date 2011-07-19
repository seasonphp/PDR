<?php
class TipoDiretorioTable extends Zend_Db_Table_Abstract{
	
	protected $_name = 'tdi_tipodiretorio';
	protected $_primary = 'tdi_id';
	
	protected $_dependentTables = array('DiretorioTable');
}