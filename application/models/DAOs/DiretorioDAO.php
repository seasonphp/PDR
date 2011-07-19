<?php
class DiretorioDAO{
	
	private $table;
	private $data;
	
	public function criar(Diretorio $dir){
		$this->data = $this->convertObjArray($dir);
		Zend_Loader::loadClass("DiretorioTable",APPLICATION_PATH."/models/tables");
		$this->table = new DiretorioTable();
		return $this->table->insert($this->data);			
	}
	
	
	
	private function convertObjArray(Diretorio $dir){
		return array(	'dir_nome'		=>$dir->getNome(),
						'dir_criacao'	=>$dir->getCriacao(),
						'tac_id'		=>$dir->getTipoAcesso(),
						'pen_id'		=>$dir->getPendrive()->getId(),
						'tdi_id'		=>$dir->getTipoDiretorio());
	}
}