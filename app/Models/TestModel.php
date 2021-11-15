<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Com\Daw2\Models;

use \Com\Daw2\Helpers\Usuario;
use \PDO;
/**
 * Description of TestModel
 *
 * @author rafa
 */
class TestModel extends \Com\Daw2\Core\BaseModel{
    
    public function getUsuarios(array $options = array()){
        foreach($options as $key => $value){
            $this->db->setAttribute($key, $value);
        }
        $query = $this->db->query("Select * FROM usuarios");        
        $query->setFetchMode(PDO::FETCH_CLASS, '\Com\Daw2\Helpers\Usuario');
        return $query->fetchAll();
    }
}
