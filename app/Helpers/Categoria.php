<?php


namespace Com\Daw2\Helpers;
/*
 * IES Pazo da MercÃ©
 * Desenvolvemento Web Contorno Servidor
 */

/**
 * Description of Categoria
 *
 * @author profesor
 */
class Categoria {
        
    private $id;
    private $nombre;
    private $padre;
    
    const SEPARADOR = ">";
    
    public function __construct(?int $id, ?Categoria $p, string $n) {
        $this->id = $id;
        $this->padre = $p;
        $this->nombre = $n; 
    }
    
    public function getFullName() : string{
        $res = $this->nombre;
        $actual = $this->padre;
        while($actual != NULL){
            $res = $actual->nombre . " ".self::SEPARADOR." ". $res;
            $actual = $actual->padre;
        }
        return $res;
    }
    
    
    public function __get($name){
        if (property_exists(get_class($this), $name)) {
            return $this->$name;
        }
        else{
            return null;
        }
    }
    
    public function __set(string $name, $value){
        if (property_exists(get_class($this), $name)) {
            if($name == "nombre"){
                if(!is_string($value)){
                    throw new ArgumentoNoValidoException("El nombre debe ser una string");
                }
                $this->$name = $value;
            }
            elseif($name == "padre"){
                if(!is_null($value) && !is_a($value, 'Categoria' )){
                    throw new ArgumentoNoValidoException("El padre debe ser del tipo Categoria o NULL");
                }
                $this->$name = $value;
            }
            else{
                throw new \Exception("No se puede establecer el valor del id");
            }
        }
        else{
            throw new \Exception("No puede establecer el valor del parámetro $name");
        }
    }        
    
}
