<?php


namespace framework\controllers;

use framework\core\Application;
use framework\core\Request;

class ContactController extends Controller
{

    public function contact() {

        return $this->render('contact');
    }



}