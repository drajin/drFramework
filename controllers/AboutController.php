<?php


namespace app\controllers;


use app\core\Application;

class AboutController extends Controller
{
    public function about() {

        return $this->render('about');
    }

    public function twitter() {

        return $this->render('twitter');
    }


}