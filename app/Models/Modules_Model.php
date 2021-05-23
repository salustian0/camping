<?php namespace App\Models;

use CodeIgniter\Model;

class Modules_Model extends Model{
    //Definições
    protected $DBGroup = 'default';
    protected $table      = 'modules';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
	protected $allowedFields = ['idDad','title','icon','route','order','active','dtRegister'];

	public function record($data = array()){
        return $this->insert($data);
    }
	public function remove($where = array()){
		return $this->where($where)->delete();
	}

    public function getModulesDadByAdm(int $administratorId = 0){
		$this->select("{$this->table}.id,{$this->table}.idDad,{$this->table}.icon,{$this->table}.route,{$this->table}.title,{$this->table}.controller,
        IF(modules_rel_administrators.idAdministratorFk = '$administratorId', 'checked', null) AS checked", FALSE);
        $this->join("modules_rel_administrators","modules_rel_administrators.idModuleFk = {$this->table}.id");
        $this->where("modules_rel_administrators.idAdministratorFk", $administratorId);
        $this->where("{$this->table}.active"	, 'Y');
        $this->where("{$this->table}.idDad"	, null);
		$this->orderBy("{$this->table}.order"	, 'ASC');
		return $this->findAll();    
    }
    public function getModulesChilds(int $module_id = 0, int $administratorId = 0,  $ignoreAdm = false){
		$this->select("{$this->table}.id,{$this->table}.idDad,{$this->table}.icon,{$this->table}.route,{$this->table}.title,{$this->table}.controller,
        IF(modules_rel_administrators.idAdministratorFk = '$administratorId', 'checked', null) AS checked", FALSE);
        $this->join("modules_rel_administrators","modules_rel_administrators.idModuleFk = {$this->table}.id");
        $this->where("modules_rel_administrators.idAdministratorFk", $administratorId);
        $this->where("{$this->table}.active"	, 'Y');
        $this->where("{$this->table}.idDad"	, (int)$module_id);
		$this->orderBy("{$this->table}.order"	, 'ASC');
		return $this->findAll();    
    }

    public function getAllModulesDad(int $administratorId = 0){
		$this->select("{$this->table}.id,{$this->table}.idDad,{$this->table}.icon,{$this->table}.route,{$this->table}.title,{$this->table}.controller,
        IF(modules_rel_administrators.idAdministratorFk = '$administratorId', 'checked', null) AS checked", FALSE);
        $this->join("modules_rel_administrators","modules_rel_administrators.idModuleFk = {$this->table}.id and modules_rel_administrators.idAdministratorFk = '{$administratorId}'", "LEFT");
        $this->where("{$this->table}.active"	, 'Y');
        $this->where("{$this->table}.idDad"	, null);
		$this->orderBy("{$this->table}.order"	, 'ASC');
		return $this->findAll();    
    }
    public function getAllModulesChilds(int $module_id = 0, int $administratorId = 0){
		$this->select("{$this->table}.id,{$this->table}.idDad,{$this->table}.icon,{$this->table}.route,{$this->table}.title,{$this->table}.controller,
        IF(modules_rel_administrators.idAdministratorFk = '$administratorId', 'checked', null) AS checked", FALSE);
        $this->join("modules_rel_administrators","modules_rel_administrators.idModuleFk = {$this->table}.id and modules_rel_administrators.idAdministratorFk = '{$administratorId}'","LEFT");
        $this->where("{$this->table}.active"	, 'Y');
        $this->where("{$this->table}.idDad"	, (int)$module_id);
		$this->orderBy("{$this->table}.order"	, 'ASC');
		return $this->findAll();    
    }


}