<?php


namespace app\controllers;

use app\core\Application;
use app\core\Request;

class ContactController extends Controller
{

    public function contact() {

        return $this->render('contact');
    }


}