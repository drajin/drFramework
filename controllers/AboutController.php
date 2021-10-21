<?php


namespace framework\controllers;


use framework\core\Application;

class AboutController extends Controller
{
    public function about() {

        return $this->render('about');
    }


}