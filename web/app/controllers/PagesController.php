<?php

namespace App\Controllers;

use \App\Core\App;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class PagesController
{
    public function home()
    {
        if (isset($_SESSION['loggedIn'])) {
            $pitches = App::get('pitches')->selectAllLoggedIn($_SESSION['user']);
            return view('index', compact('pitches'));
        } else {
            $pitches = App::get('pitches')->selectAll();
            return view('index', compact('pitches'));
        }
    }
    public function about()
    {
        return view('about');
    }
}
