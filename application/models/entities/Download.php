<?php
class Download{
	
	private $id;
	private $datahora;
	
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}
	public function getDataHora(){
		return $this->datahora;
	}
	public function setDataHora($datahora){
		$this->datahora = $datahora;
	}
}