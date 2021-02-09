<?php

namespace app\core;

class Request
{
    public function getUrl()
    {
        $url = $_SERVER['REQUEST_URI'] ?? '/';
        $positionQuestionMark = strpos($url, '?'); //searches for ? returns number index
        if($positionQuestionMark === false) { //if there is no ?
            return $url;

        }
        return substr($url, 0, $positionQuestionMark); // returns string everything before ?

    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet()
    {
        return $this->getMethod() === 'get';
    }

    public function isPost()
    {
        return $this->getMethod() === 'post';
    }

    public function getBody()
    {
        $body = [];

        if($this->getMethod() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if($this->getMethod() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;


    }


}