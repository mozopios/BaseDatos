<?php
namespace Com\Daw2\Controllers;

class CsvController extends \Com\Daw2\Core\BaseController
{
   
   public function index ()
   {                                 
        $_vars = array('titulo' => 'Datos población Pontevedra',
                      'breadcumb' => array('Inicio' => array('url' => '#', 'active' => false)),
                      'csv_div_titulo' => 'Por año y sexo',
                      'js' => array('plugins/datatables/jquery.dataTables.min.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.min.js', 'assets/js/pages/csv.view.js')
            );
                  
        $csvModel = new \Com\Daw2\Models\CSVModel(\Com\Daw2\Core\Config::getInstance()->get('DATA_FOLDER').'poblacion_pontevedra.csv');
        $_vars["data"] = $csvModel->getPoblacionPontevedra();        
        $this->view->showViews(array('templates/header.view.php', 'csv.view.php', 'templates/footer.view.php'), $_vars);      
   }
   
   public function pontevedra2020()
   {                                 
        $_vars = array('titulo' => 'Población Pontevedra 2020',
                      'breadcumb' => array('Inicio' => array('url' => '#', 'active' => false)),
                      'csv_div_titulo' => 'Datos del fichero',
                      'columnasMostrar' => array(0, 3),
                      'js' => array('plugins/datatables/jquery.dataTables.min.js', 'plugins/datatables-bs4/js/dataTables.bootstrap4.min.js', 'assets/js/pages/csv.view.js')
            );
                  
        $csvModel = new \Com\Daw2\Models\CSVModel(\Com\Daw2\Core\Config::getInstance()->get('DATA_FOLDER').'poblacion_pontevedra_2020_totales.csv');
        $_vars["data"] = $csvModel->getPoblacionPontevedra();        
        $this->view->showViews(array('templates/header.view.php', 'csv_personalizado.view.php', 'templates/footer.view.php'), $_vars);      
   }
}