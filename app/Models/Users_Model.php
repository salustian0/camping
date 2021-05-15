<?php namespace App\Models;

use CodeIgniter\Model;

class Users_Model extends Model{
    //Definições
    protected $DBGroup = 'default';
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';

	//Disabled protect
	//protected $allowedFields = [];




	public function record($data = array()){
		$this->protect(false);
        $status =  $this->insert($data);
		$this->protect(true);
        return $this->getInsertID();
    }

	public function change($data = array(),$id = 0){
		$this->protect(false);
		$status =  $this->set($data)->update($id);
		$this->protect(true);
		return $status;
	}

	public function remove($where = array()){
		return $this->where($where)->delete();
	}
	public function already_exists($where = array()){
		return $this->where($where)->first();
	}




	public function listing($where = array(), $limit = array()){

		$this->select("{$this->table}.*,
						DATE_FORMAT({$this->table}.dtRegister, '%d/%m/%Y \à\s %H\hr(s)') AS dtRegister,
						DATE_FORMAT({$this->table}.dtUpdate, '%d/%m/%Y \à\s %H\hr(s)') AS dtUpdate,
						(select count(companions.id) from companions where companions.active= 'Y' and companions.idUserFk = {$this->table}.id limit 1) as count_companions
						", FALSE);
		$this->where("{$this->table}.active"	, 'Y');
		$this->where($where);
		$this->orderBy("{$this->table}.dtRegister"	, 'DESC');
		return $this->findAll($limit['limit'],$limit['start']);
	}

	public function countPaginate($where = array()){
		$this->select("{$this->table}.id")	;
		$this->where("{$this->table}.active"	, 'Y');
		$this->where($where);
		return $this->countAllResults();
	}

	public function getRow($idRows){
		$this->select("{$this->table}.*");
		$this->where("{$this->table}.active"		, 'Y');
		$this->where("{$this->table}.{$this->primaryKey}", (int)$idRows);
		$this->limit(1);
		return $this->first();
	}



}