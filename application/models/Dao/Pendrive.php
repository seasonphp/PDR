<?php
class Application_Model_Dao_Pendrive{
	
	private $data;
	private $table;
	
	public function criar(Application_Model_Entity_Pendrive $pen){
		$this->data = $this->convertObjArray($pen);		
		$this->table = new Application_Model_Table_Pendrive();
		return $this->table->insert($this->data);		
	}
	private function convertObjArray(Application_Model_Entity_Pendrive $pen){
		return array(	'pen_nome'		=>	$pen->getNome(),
						'pen_criacao'	=>	$pen->getCriacao(),
						'usu_id'		=>	$pen->getUsuario()->getId());
	}
}