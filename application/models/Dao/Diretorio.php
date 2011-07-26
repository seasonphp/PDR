<?php
class Application_Model_Dao_Diretorio{
	
	private $table;
	private $data;
	
	public function criar(Application_Model_Entity_Diretorio $dir){
		$this->data = $this->convertObjArray($dir);		
		$this->table = new Application_Model_Table_Diretorio();
		return $this->table->insert($this->data);			
	}
	
	
	
	private function convertObjArray(Application_Model_Entity_Diretorio $dir){
		return array(	'dir_nome'		=>$dir->getNome(),
						'dir_criacao'	=>$dir->getCriacao(),
						'tac_id'		=>$dir->getTipoAcesso(),
						'pen_id'		=>$dir->getPendrive()->getId(),
						'tdi_id'		=>$dir->getTipoDiretorio());
	}
}