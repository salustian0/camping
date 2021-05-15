<?php namespace App\Models;

use CodeIgniter\Model;

class ModulesRelAdministrators_Model extends Model{
    //Definições
    protected $DBGroup = 'default';
    protected $table      = 'modules_rel_administrators';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
	protected $allowedFields = ['idAdministratorFk','idModuleFk','dtRegister'];

	public function record($data = array()){
        return $this->insert($data);
    }
	public function remove($where = array()){
		return $this->where($where)->delete();
	}



}