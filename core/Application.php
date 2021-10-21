<?php


namespace framework\core;


class Application
{
    public static string $ROOT_PATH;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public Session $session;
    public static Application $app;

    public function __construct($rootPath, array $config)
    {
        self::$ROOT_PATH = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']);


    }

    public function run()
    {
        echo $this->router->resolve();
    }


}