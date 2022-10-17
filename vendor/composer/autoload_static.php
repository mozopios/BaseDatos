<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6b281cd11a3e32fa4d426c8b7b5338df
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Com\\Daw2\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Com\\Daw2\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Steampixel' => 
            array (
                0 => __DIR__ . '/..' . '/steampixel/simple-php-router/src',
            ),
        ),
    );

    public static $classMap = array (
        'Com\\Daw2\\Controllers\\CategoriaController' => __DIR__ . '/../..' . '/app/Controllers/CategoriaController.php',
        'Com\\Daw2\\Controllers\\CsvController' => __DIR__ . '/../..' . '/app/Controllers/CsvController.php',
        'Com\\Daw2\\Controllers\\InicioController' => __DIR__ . '/../..' . '/app/Controllers/InicioController.php',
        'Com\\Daw2\\Controllers\\TestController' => __DIR__ . '/../..' . '/app/Controllers/TestController.php',
        'Com\\Daw2\\Core\\BaseController' => __DIR__ . '/../..' . '/app/Core/BaseController.php',
        'Com\\Daw2\\Core\\BaseModel' => __DIR__ . '/../..' . '/app/Core/BaseModel.php',
        'Com\\Daw2\\Core\\Config' => __DIR__ . '/../..' . '/app/Core/Config.php',
        'Com\\Daw2\\Core\\DBManager' => __DIR__ . '/../..' . '/app/Core/DBManager.php',
        'Com\\Daw2\\Core\\FrontController' => __DIR__ . '/../..' . '/app/Core/FrontController.php',
        'Com\\Daw2\\Core\\View' => __DIR__ . '/../..' . '/app/Core/View.php',
        'Com\\Daw2\\Helpers\\ArgumentoNoValidoException' => __DIR__ . '/../..' . '/app/Helpers/ArgumentoNoValidoException.php',
        'Com\\Daw2\\Helpers\\Categoria' => __DIR__ . '/../..' . '/app/Helpers/Categoria.php',
        'Com\\Daw2\\Helpers\\Log' => __DIR__ . '/../..' . '/app/Helpers/Log.php',
        'Com\\Daw2\\Helpers\\Mensaje' => __DIR__ . '/../..' . '/app/Helpers/Mensaje.php',
        'Com\\Daw2\\Helpers\\Usuario' => __DIR__ . '/../..' . '/app/Helpers/Usuario.php',
        'Com\\Daw2\\Models\\CSVModel' => __DIR__ . '/../..' . '/app/Models/CSVModel.php',
        'Com\\Daw2\\Models\\CategoriaModel' => __DIR__ . '/../..' . '/app/Models/CategoriaModel.php',
        'Com\\Daw2\\Models\\TestModel' => __DIR__ . '/../..' . '/app/Models/TestModel.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Steampixel\\Route' => __DIR__ . '/..' . '/steampixel/simple-php-router/src/Steampixel/Route.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6b281cd11a3e32fa4d426c8b7b5338df::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6b281cd11a3e32fa4d426c8b7b5338df::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit6b281cd11a3e32fa4d426c8b7b5338df::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit6b281cd11a3e32fa4d426c8b7b5338df::$classMap;

        }, null, ClassLoader::class);
    }
}