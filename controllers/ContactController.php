<?php


namespace app\controllers;

use app\core\Application;
use app\core\Request;

class ContactController extends Controller
{

    public function contact() {
        $params = [
            'Future' => 'You will send your shit here!'
        ];

        return $this->render('index', $params);
    }

}