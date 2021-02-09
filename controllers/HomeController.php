<?php

    namespace app\controllers;

    use app\core\Application;
    use app\core\Request;

    class HomeController extends Controller
    {

        public function index() {
            $params = [
                'name' => 'Dejan',
                'last name' => 'Rajin'
            ];

            return $this->render('index', $params);
            //return 'Hellou!';
        }

    }