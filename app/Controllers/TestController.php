<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Com\Daw2\Controllers;

/**
 * Description of TestController
 *
 * @author rafa
 */
class TestController extends \Com\Daw2\Core\BaseController{
   
    public function index()
    {                                 
        $_vars = array('titulo' => 'Test',
                      'data' => array(1,2,3,4,5));
        $model = new \Com\Daw2\Models\TestModel();
        $_vars['usuarios'] = $model->getUsuarios();
        $this->view->showViews(array('templates/header.view.php', 'test.view.php', 'templates/footer.view.php'), $_vars);      
    }
   
    public function testEmulated(){
        $options = array();
        $options[\PDO::ATTR_EMULATE_PREPARES] = true;
        $_vars = array('titulo' => 'Test',
                      'data' => array(1,2,3,4,5));
        $model = new \Com\Daw2\Models\TestModel();
        $_vars['usuarios'] = $model->getUsuarios($options);
        $this->view->showViews(array('templates/header.view.php', 'test.view.php', 'templates/footer.view.php'), $_vars); 
    }
}
