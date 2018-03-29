<?php

namespace App\Controllers;

use \App\Core\App;

class UsersController
{
    public function index()
    {
        return view('users');
    }
    public function store()
    {
        $error = App::get('users')->insertUser('users');
        if ($error) {
            return redirect("users?error=$error");
        } else {
            $this->verify();
        }
    }

    public function login()
    {
        return view('login');
    }

    public function verify()
    {
        $error = App::get('users')->verifyLogin();
        if ($error) {
            return redirect("login?error=$error");
        } else {
            return redirect("");
        }
    }
    public function logout()
    {
        session_start();
        session_destroy();
        return redirect('');
    }
}
