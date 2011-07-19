<?php
class PendriveDAO{
	
	private $data;
	private $table;
	
	public function criar(Pendrive $pen){
		$this->data = $this->convertObjArray($pen);
		Zend_Loader::loadClass("PendriveTable",APPLICATION_PATH."/models/tables");
		$this->table = new PendriveTable();
		return $this->table->insert($this->data);		
	}
	private function convertObjArray(Pendrive $pen){
		return array(	'pen_nome'		=>	$pen->getNome(),
						'pen_criacao'	=>	$pen->getCriacao(),
						'usu_id'		=>	$pen->getUsuario()->getId());
	}
}