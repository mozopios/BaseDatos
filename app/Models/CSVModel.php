<?php
namespace Com\Daw2\Models;

class CSVModel{
    private $filename;
    
    public function __construct(string $filename){
        $this->filename = $filename;
    }
    
    public function getPoblacionPontevedra(){
        $csvFile = file($this->filename);
        $data = [];
        foreach ($csvFile as $line) {
            $data[] = str_getcsv($line, ';');
        }
        return $data;
    }
}