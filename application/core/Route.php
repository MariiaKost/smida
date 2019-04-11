<?php
class Route
{
    static function start(&$db)
    {
        // контроллер и действие по умолчанию
        $controller_name = 'main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

            // получаем имя контроллера
            if ( !empty($routes[1]) )
            {
               $controller_name = mb_strtolower($routes[1], "UTF-8");
            }

            // получаем имя экшена
            if ( !empty($routes[2]) )
            {
               $action_name = mb_strtolower($routes[2]);
            }

        if (empty($id))
        {
            // получаем id, если есть
            if ( !empty($routes[3]) )
            {
                $id = $routes[3];
            }
        }


        // добавляем префиксы
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        // подцепляем файл с классом модели (файла модели может и не быть)

        //$model_file = strtolower($model_name).'.php';
        $model_file = $model_name.'.php';
        $model_path = "application/models/".$model_file;
        if(file_exists($model_path))
        {
            include "application/models/".$model_file;
        }

        // подцепляем файл с классом контроллера
       // $controller_file = strtolower($controller_name).'.php';
        $controller_file = $controller_name.'.php';
        $controller_path = "application/controllers/".$controller_file;

        if(file_exists($controller_path))
        {
            include "application/controllers/".$controller_file;
        }
        else
        {
            //print $controller_path;
            Route::ErrorPage404();
        }
        // создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action))
        {
            // вызываем действие контроллера

            if (!empty($id))
            {
                $controller->$action($db, $id);
            }
            else
            {
                $controller->$action($db);
            }
        }
        else
        {
            //print $action;
            Route::ErrorPage404();
        }


    }

    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}
