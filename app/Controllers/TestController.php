<?php

/* 
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
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
        $_vars = array('titulo' => 'Test');
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
        $_vars = array('titulo' => 'Test Emulated');
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
    
    public function testSearchActive(){
        if(isset($_GET['active'])){
            $aux = filter_var($_GET['active'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
            if(!is_null($aux)){
                $active = $aux;
            }   
            else{
                $active = true;
            }            
        }
        else{
            $active = true;
        }
        $_vars = array('titulo' => 'Test Active: ' . ($active ? 'true' : 'false'));
        $model = new \Com\Daw2\Models\TestModel();
        $_vars['usuarios'] = $model->getUsuariosByActive($active);
        $this->view->showViews(array('templates/header.view.php', 'test.view.php', 'templates/footer.view.php'), $_vars);
    }
    
    public function rellenarAleatorio(){
        $_vars = array('titulo' => 'Test Limit Bind');
        $model = new \Com\Daw2\Models\TestModel();
        $_vars['usuarios'] = $model->rellenarAleatorio();
        $this->view->showViews(array('templates/header.view.php', 'test.view.php', 'templates/footer.view.php'), $_vars);
    }
}
