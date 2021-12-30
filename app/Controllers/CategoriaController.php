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
class CategoriaController extends \Com\Daw2\Core\BaseController{
   
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
    
    public function insertCategoria(){
        if(isset($_GET['id_padre'])){
            $idPadre = filter_var($_GET['id_padre'], FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
            if(!is_null($idPadre) && $idPadre <= 0){
                $idPadre = NULL;
            }               
        }
        else{
            $idPadre = NULL;
        }
        if(!isset($_GET['nombre']) ||empty($_GET['nombre'])){            
            throw new \Exception("Se debe insertar el nombre de la categoría");
        }        
        else{
            $_vars = array('titulo' => 'Insertar categoría');
            $nombre = filter_var($_GET['nombre'], FILTER_SANITIZE_STRING);
            $_vars['nombre'] = $nombre;
            
            $model = new \Com\Daw2\Models\CategoriaModel();
            $_vars['id'] = $model->insertCategoria($nombre, $idPadre);            
            
            $this->view->showViews(array('templates/header.view.php', 'categoria.insert.view.php', 'templates/footer.view.php'), $_vars);
        }        
        
    }    
    
    public function insertCategoriaObject(){
        if(isset($_GET['id_padre'])){
            $idPadre = filter_var($_GET['id_padre'], FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
            if(!is_null($idPadre) && $idPadre <= 0){
                $idPadre = NULL;
            }               
        }
        else{
            $idPadre = NULL;
        }
        if(!isset($_GET['nombre']) ||empty($_GET['nombre'])){            
            throw new \Exception("Se debe insertar el nombre de la categoría");
        }        
        else{
            $_vars = array('titulo' => 'Insertar categoría Object');
            $nombre = filter_var($_GET['nombre'], FILTER_SANITIZE_STRING);
            $_vars['nombre'] = $nombre;
            
            $model = new \Com\Daw2\Models\CategoriaModel();
            $categoria = new \Com\Daw2\Helpers\Categoria(NULL, is_null($idPadre) ? NULL : $model->loadCategoria($idPadre), $nombre);
                        
            $_vars['categoria'] = $model->insertCategoriaObject($categoria);            
            
            $this->view->showViews(array('templates/header.view.php', 'categoria.insert.view.php', 'templates/footer.view.php'), $_vars);
        }        
        
    }
    
    public function edit(){
        $idCategoria = filter_var($_GET['id_categoria'], FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
        if(!is_null($idCategoria)){
            $model = new \Com\Daw2\Models\CategoriaModel();
            $categoria = $model->loadCategoria($idCategoria);
            $categoriasList = $model->getAllCategorias();
            //var_dump($categoriasList);
            $_vars = array(
                'titulo' => 'Editar categoría', 
                'categoria' => $categoria,
                'idPadre' => !is_null($categoria->padre) ? $categoria->padre->id : NULL,
                'categoriasList' => $categoriasList,
                'breadcumb' => array(
                    'Inicio' => array('url' => '#', 'active' => false),
                    'Categoria' => array('url' => '?controller=categoria','active' => false),
                    'Editar' => array('url' => '#', 'active' => true))
                );
            $this->view->showViews(array('templates/header.view.php', 'categoria.edit.view.php', 'templates/footer.view.php'), $_vars);
        }
    }
}
