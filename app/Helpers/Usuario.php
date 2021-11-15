<?php
namespace Com\Daw2\Helpers;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author rafa
 */
class Usuario {
    private $username;
    private $rol;
    //Tener en cuenta que si se almacenan como decimal en la BBDD volverán como strings
    private $salarioBruto;
    private $retencionIRPF;
    
    public function __construct(){}        
    
    public function __get($key){
        if(isset($this->values[ $key ])){
            return $this->values[ $key ];
        }
        else{
            throw new \Exception("Propiedad no válida");
        }
    }
    
    public function getSalarioNeto(){
        return $this->salarioBruto * ( 1 - $this->retencionIRPF / 100);
    }
}
