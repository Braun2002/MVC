<?php
/**
 * Created by JetBrains PhpStorm.
 * User: i
 * Date: 26.01.15
 * Time: 20:48
 * To change this template use File | Settings | File Templates.
 */

class Route {
    static function start()
    {
        //контроллер и действие по-умолчанию
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        //получаем имя контроллера
        if( !empty($routes[1]) )
        {
            $controller_name = $routes[1];
        }

        //получаем имя экшена
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }

        //Добавляем префиксы
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        //подцепляем файл с классом модели ( файла может не быть )
        $model_file = strtolower($model_name).'.php';
        $model_path = 'application/models'.$model_file;
        if (file_exists($model_path))
        {
            include 'application/models/'.$model_file;
        }

        //подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = 'application/controllers/'.$controller_file;

        if (file_exists($controller_path))
        {
            include 'application/controllers/'.$controller_file;
        }
        else
        {
            //FIXME Здесь надо кинуть исключение, но пока что 404
            Route::ErrorPage404();
            //exit;
        }

        // Создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;

        if (method_exists($controller, $action))
        {
            $controller->$action();
        }
        else
        {
            //FIXME Тут тоже надо исключение
            Route::ErrorPage404();
            //exit;
        }
    }

    function ErrorPage404()
    {
        echo 'Нет такого!';
        exit;
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
//        header('HTTP/1.1 404 Not Found');
//        header("Status: 404 Not Found");
        header('Localhost:'.$host.'404');
    }
}