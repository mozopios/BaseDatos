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
   
    /**
     * Sin emulado obtenemos que los números se reciben como float
     */
    public function index()
    {                                 
        $_vars = array('titulo' => 'Test',
                      'data' => array(1,2,3,4,5));
        $model = new \Com\Daw2\Models\TestModel();
        $_vars['usuarios'] = $model->getUsuariosClass();
        $this->view->showViews(array('templates/header.view.php', 'test.view.php', 'templates/footer.view.php'), $_vars);      
    }
   
    /**
     * Lo probamos en modo emulado y obtenemos que los números se reciben como string
     */
    public function testEmulated(){
        $options = array();
        $options[\PDO::ATTR_EMULATE_PREPARES] = true;
        $_vars = array('titulo' => 'Test Emulated',
                      'data' => array(1,2,3,4,5));
        $model = new \Com\Daw2\Models\TestModel();
        $_vars['usuarios'] = $model->getUsuariosClass($options);
        $this->view->showViews(array('templates/header.view.php', 'test.view.php', 'templates/footer.view.php'), $_vars); 
    }
    
    public function testLimit(){
        $_vars = array('titulo' => 'Test Limit en execute');
        $model = new \Com\Daw2\Models\TestModel();
        $_vars['usuarios'] = $model->getUsuariosLimit(0, 5);
        $this->view->showViews(array('templates/header.view.php', 'test.view.php', 'templates/footer.view.php'), $_vars);
    }
    
    public function testLimitBind(){
        $_vars = array('titulo' => 'Test Limit Bind');
        $model = new \Com\Daw2\Models\TestModel();
        $_vars['usuarios'] = $model->getUsuariosLimitBind(0, 5);
        $this->view->showViews(array('templates/header.view.php', 'test.view.php', 'templates/footer.view.php'), $_vars);
    }
    
    public function rellenarAleatorio(){
        $_vars = array('titulo' => 'Test Limit Bind');
        $model = new \Com\Daw2\Models\TestModel();
        $_vars['usuarios'] = $model->rellenarAleatorio();
        $this->view->showViews(array('templates/header.view.php', 'test.view.php', 'templates/footer.view.php'), $_vars);
    }
}
