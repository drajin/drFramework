<?php

namespace framework\core;


class Router
{
    public Request $request;
    public Response $response;

    //public string $layout = 'main';
    protected array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    //ovde
    public function get($url, $callback)
    {
        $this->routes['get'][$url] = $callback;
    }

    public function post($url, $callback)
    {
        $this->routes['post'][$url] = $callback;
    }

    //Determines what is the current path and current method
    public function resolve()
    {
        $url = $this->request->getUrl();
        $method = $this->request->getMethod(); //get or post
        $callback = $this->routes[$method][$url] ?? false;
//            echo '<pre>';
//            var_dump($callback);
//            echo '</pre>';
//            exit;
        if($callback === false) {
            $this->response->setStatusCode(404);
            //return 'not found';
            $layout = 'main';
            return $this->renderView('not_found');
            exit;
        }

        if(is_string($callback)){
            return $this->renderView($callback);
        }

        // 1:05 Nije mi jasno
        if(is_array($callback)) {
            $callback[0] = new $callback[0]();
        }
        return  call_user_func($callback, $this->request);
    }


    public function renderView($views, $params = [], $layout='main')
    {
        $mainLayout = $this->renderMainLayout($layout);
        $viewContent = $this->renderViewContent($views ,$params);
        return str_replace('{{content}}', $viewContent, $mainLayout);

    }

    protected function renderMainLayout($layout)
    {
        ob_start(); //starts output cashing
        //include_once Application::$ROOT_PATH."/views/layouts/$layout.php";
        include_once Application::$ROOT_PATH."/views/layouts/$layout.php";
        return ob_get_clean(); //returns buffered values
    }

    protected function renderViewContent($views, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
//        echo '<pre>';    Check sta je poslato
//        var_dump($params);
//        echo '</pre>';

        ob_start(); //starts output cashing
        include_once Application::$ROOT_PATH."/views/$views.view.php";
        return ob_get_clean(); //returns buffered values

    }





//    public static function load($file)
//    {
//        $router = new static;
//
//        require $file;
//
//        return $router;
//    }
//
//    public function define($routes)
//    {
//        $this->routes = $routes;
//    }
//
//    public function direct($uri)
//    {
//        if (array_key_exists($uri, $this->routes)) {
//            return $this->routes[$uri];
//        }
//
//        throw new Exception('No route defined for this URI.');
//    }
}