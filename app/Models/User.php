<?php

namespace App\Models;

class User
{
    public function auth ($data)
    {

        if ($data['login'] === 'admin' && $data['password'] === '123') {
            session_start();
            $_SESSION['auth'] = true;
            return true;
        } else {
            return false;
        }
    }
}
