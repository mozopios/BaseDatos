<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Com\Daw2\Models;

use \PDO;
/**
 * Description of TestModel
 *
 * @author rafa
 */
class TestModel extends \Com\Daw2\Core\BaseModel{
    
    public function getUsuariosClass(array $options = array()) : array{
        foreach($options as $key => $value){
            $this->db->setAttribute($key, $value);
        }
        $query = $this->db->query("Select * FROM usuarios");        
        $query->setFetchMode(PDO::FETCH_CLASS, '\Com\Daw2\Helpers\Usuario');
        return $query->fetchAll();
    }
    
    /**
     * No da errores porque tenemos emulation mode en off, si lo ponemos en on daría error
     * @param int $from
     * @param int $to
     * @return array
     */
    public function getUsuariosLimit(int $from, int $to) : array{        
        $query = $this->db->prepare("Select * FROM usuarios LIMIT :from, :to");        
        $query->setFetchMode(PDO::FETCH_CLASS, '\Com\Daw2\Helpers\Usuario');
        $query->execute(['from' => $from, 'to' => $to]);
        return $query->fetchAll();
    }
    
    /**
     * Este método funciona siempre da igual como tengamos el emulation mode
     * @param int $page
     * @param int $entries
     * @return array
     */
    public function getUsuariosLimitBind(int $page, int $entries) : array{   
        $query = $this->db->prepare("Select * FROM usuarios ORDER BY username LIMIT :page, :entries");        
        $query->setFetchMode(PDO::FETCH_CLASS, '\Com\Daw2\Helpers\Usuario');
        $query->bindValue(':page', (int)$page, PDO::PARAM_INT);
        $query->bindValue(':entries', (int)$entries, PDO::PARAM_INT); 
        $query->execute();
        return $query->fetchAll();
    }
    
    public function rellenarAleatorio() : int{
        $nombre = ["Carlos", "Miguel", "Iván", "Benjamín", "Francisco", "Erik", "Alexis Jose", "Marcos", "Cristopher", "Mauricio", "Jose Simon", "Nuria Maria"];
        $apellido1 = ["Alvarez", "Candeira", "Casas", "Dominguez", "Fernandez", "Ferreira", "Giraldez", "Gonzalez", "Juncal", "Montes", "Sanchez", "da Silva", "Suarez"];
        $apellido2 = ["Sanchez", "Carrera", "Cerqueira", "Fernandez", "Araujo", "Oset", "Groba", "Pereira", "Abeledo", "Iglesias", "Gonzalez", "Vilas"];
        $insertado = 0;
        for($i = 0; $i < 100; $i++){
            $query = $this->db->prepare("INSERT INTO usuarios (username, rol, salarioBruto, retencionIRPF) values (:username, 'standard', :bruto, :irpf)");
            $username = $nombre[random_int(0, count($nombre) -1)].'_'.$apellido1[random_int(0, count($apellido1) -1)].'_'.$apellido2[random_int(0, count($apellido2) -1)];
            $username = preg_replace("/[^A-Za-z_]/", "_", $username);
            $salario = random_int(1000, 5000);
            if($salario < 3000){
                $irpf = 18;
            }
            elseif($salario < 4000){
                $irpf = 20;
            }
            else{
                $irpf = 30;
            }
            try{
                $query->execute(
                        [
                            'username'  => $username,
                            'bruto'     => $salario,
                            'irpf'      => $irpf
                        ]
                );
                $insertado++;
            }
            catch(\PDOException $ex){
                //Estamos metiendo una entrada duplicada
            }
            
        }
        return $insertado;
    }
}
