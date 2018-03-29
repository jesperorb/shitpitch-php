<?php

namespace App\Controllers;

use \App\Core\App;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class PitchController
{
    public function index()
    {
        return view('pitch');
    }
    public function store()
    {
        if (isset($_POST['id'])) {
            $this->delete();
        } else {
            $this->insert();
        }
    }
    private function delete()
    {
        App::get('pitches')->deletePitch();
    }
    private function insert()
    {
        App::get('pitches')->insertPitch();
        return redirect('');
    }
    public function getPitch()
    {
        $pitch = App::get('pitches')->getPitch();
        return view('edit', compact('pitch'));
    }
    public function editPitch()
    {
        App::get('pitches')->editPitch();
        return redirect('');
    }
    public function like()
    {
        App::get('pitches')->likePitch();
    }
}
