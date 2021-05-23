<?php namespace App\Models;

use CodeIgniter\Model;

class Orders_Model extends Model{
    //Definições
    protected $DBGroup = 'default';
    protected $table      = 'orders';
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

	public function listing($where = array(), $limit = array()){
		$this->select("list_orders.*");
		$this->from("list_orders");
		//$this->orderBy("{$this->table}.name"	, 'ASC');
        $this->where($where);
		return $this->findAll($limit['limit'],$limit['start']);
	}

	public function getCategories(){
        $this->select("{$this->table}.id,{$this->table}.name", FALSE);
        $this->where("{$this->table}.active"	, 'Y');
        //$this->orderBy("{$this->table}.name"	, 'ASC');
        return $this->findAll();
    }

	public function countPaginate($where = array()){
        $this->select("list_orders.id");
        $this->from("list_orders");
        //$this->orderBy("{$this->table}.name"	, 'ASC');
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