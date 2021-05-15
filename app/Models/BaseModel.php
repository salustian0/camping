<?php namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model{
    public function record($data = array()){
        return $this->insert($data);
    }
    public function alter($data = array(), int $id = 0){

    }
    public function drop(){}
}