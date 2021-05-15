<?php namespace App\Models;

use CodeIgniter\Model;

class Administrators_Model extends Model{
    //Definições
    protected $DBGroup = 'default';
    protected $table      = 'administrators';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
	protected $allowedFields = ['name','email','mobileNumber','whatsappNumber','perfil','password','dtUpdate', 'dtRegister','active'];


	public function record($data = array()){
        	   $this->insert($data);
		return $this->getInsertID(); 
    }

	public function change($data = array(),$id = 0){
		return $this->set($data)->update($id);
	}

	public function remove($where = array()){
		return $this->where($where)->delete();
	}
	public function already_exists($where = array()){
		return $this->where($where)->first();
	}




	public function listing($where = array(), $limit = array()){
		$this->select("{$this->table}.{$this->primaryKey}, {$this->table}.name, {$this->table}.email, 
						(SELECT DATE_FORMAT(log_actions.dtRegister, '%d/%m/%Y \à\s %H\hr(s)')
							FROM log_actions WHERE log_actions.activity = 'LOGIN' AND log_actions.idAdministratorFk = {$this->table}.id 
							ORDER BY log_actions.id DESC 
							LIMIT 1
						)  AS lastAccess,
						DATE_FORMAT({$this->table}.dtRegister, '%d/%m/%Y \à\s %H\hr(s)') AS dtRegister,
						DATE_FORMAT({$this->table}.dtUpdate, '%d/%m/%Y \à\s %H\hr(s)') AS dtUpdate", FALSE);
		$this->where("{$this->table}.active"	, 'Y');
		$this->where("{$this->table}.display"		, 'Y');
		$this->where($where);
		//$this->orderBy("{$this->table}.name"	, 'ASC');
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

	public function getByLogin($data = array()){
		$this->select("{$this->table}.id, {$this->table}.name, {$this->table}.email, {$this->table}.perfil");
		$this->where("{$this->table}.active"	, 'Y');
		$this->where("{$this->table}.email"		, (string)$data['email']);
		$this->where("{$this->table}.password"	, (string)$data['password']);
		$this->limit(1);
		return $this->first();
	}
	public function validExists($idRows = 0, $email = null){
		$this->select("{$this->table}.email");
		$this->where("{$this->table}.active"			, 'Y');
		$this->where("{$this->table}.{$this->primaryKey} !="	, (int)$idRows);
		$this->where("{$this->table}.email"				, (string)$email);
		return $this->first();
	}

	public function getByEmail($email = null){

		$this->select("{$this->table}.id, {$this->table}.name, {$this->table}.email, {$this->table}.perfil");
		$this->from($this->table);
		$this->where("{$this->table}.active"			, 'Y');
		$this->where("{$this->table}.email"				, (string)$email);

		return $this->first();
	}
//-----------------------------------------------------------------------------------------------

    public function getUserById(int $id = 0){
        return $this->find($id);
    }

    public function getPasswordByUsername(string $username = ''){
        $this->select("{$this->primaryKey},password");
        $this->where('email',$username);
        $this->where("{$this->table}.active","Y");
        return $this->first();
    }


}