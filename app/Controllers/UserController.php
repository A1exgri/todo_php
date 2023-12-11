<?php

namespace App\Controllers;

use App\Request;
use App\Models\User;

class UserController
{
    public function login()
    {
        return view('login');
    }

    public function auth()
    {
        try {
            $bool = (new User)->auth(Request::values());

            if ($bool === true) {
                return redirect('');
            } else {
                return redirect('login');
            }

        } catch(\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function logout()
    {
        if (Request::values()['logout'] == 'true') {
            session_start();
            session_unset();
            session_destroy();
            return redirect('');
        }
    }
}
