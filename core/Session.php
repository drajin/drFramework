<?php


namespace app\core;


class Session
{
    protected const FLASH_KEY = 'flash_messages';

    public function __construct()
    {
        session_start();

        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => &$flashMessage) {
            //Mark the message to be removed
            $flashMessage['remove'] = true;
        }


         $_SESSION[self::FLASH_KEY] = $flashMessages;
//        echo '<pre>';
//        var_dump($_SESSION[self::FLASH_KEY]);
//        echo '</pre>';
//        exit;
    }

    public function setFlashMsg($key, $message)
    {
        $_SESSION[self::FLASH_KEY][$key] = [
            'remove' => 'false',
            'value' => $message
        ];


    }

    public function getFlashMsg($key)
    {

        return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;

    }



    public function isUserLoggedIn()
    {
        if(isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

//    public function __destruct()
//    {
//        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
//        foreach ($flashMessages as $key => &$flashMessage) {
//            if($flashMessage['remove']) {
//                unset($flashMessages[$key]);
//            }
//        }
//
//        $_SESSION[self::FLASH_KEY] = $flashMessages;
//    }

    public function destroyMsg()
    {
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => &$flashMessage) {
            if($flashMessage['remove']) {
                unset($flashMessages[$key]);
            }
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

}