<?php


namespace app\controllers;


use app\core\Application;

class AboutController extends Controller
{
    public string $layout = 'about';

    public function about() {
        $params = [
            'about' => 'Here will be about page'
        ];

        return $this->render('about', $params);
    }


}