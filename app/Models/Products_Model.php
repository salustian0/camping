<?php namespace App\Models;

use CodeIgniter\Model;

class Products_Model extends Model{
    //Definições
    protected $DBGroup = 'default';
    protected $table      = 'product';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';

	//Disabled protect
	//protected $allowedFields = [];

	public function record($data = array()){
		$this->protect(false);
        $this->insert($data);
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
		return $this->where('active','Y')->where($where)->first();
	}
    public function getCompanionsByUser($idUserFk = 0){
        $this->select("{$this->table}.*", FALSE);
        $this->where("{$this->table}.active"	, 'Y');
        $this->join("users", "users.id = {$this->table}.idUserFk");
        $this->where("{$this->table}.idUserFk", $idUserFk);
        //$this->orderBy("{$this->table}.name"	, 'ASC');
        return $this->findAll();
    }


	public function listing($where = array(), $limit = array()){
		$this->select("{$this->table}.*,
						DATE_FORMAT({$this->table}.dtRegister, '%d/%m/%Y \à\s %H\hr(s)') AS dtRegister,
						DATE_FORMAT({$this->table}.dtUpdate, '%d/%m/%Y \à\s %H\hr(s)') AS dtUpdate,
						category.name as category", FALSE);
		$this->whereIn("{$this->table}.active"	, array('Y','L'));
		$this->join('category',"category.id = {$this->table}.idCategoryFk", "LEFT");
		$this->where($where);
		//$this->orderBy("{$this->table}.name"	, 'ASC');
		return $this->findAll($limit['limit'],$limit['start']);
	}

	public function countPaginate($where = array()){
		$this->select("{$this->table}.id")	;
        $this->whereIn("{$this->table}.active"	, array('Y','L'));
        $this->join('category',"category.id = {$this->table}.idCategoryFk", "LEFT");
        $this->where($where);
		return $this->countAllResults();
	}

	public function getRow($idRows){
		$this->select("{$this->table}.*");
        $this->whereIn("{$this->table}.active"	, array('Y','L'));
		$this->where("{$this->table}.{$this->primaryKey}", (int)$idRows);
		$this->limit(1);
		return $this->first();
	}



}