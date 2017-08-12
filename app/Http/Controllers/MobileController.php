<?php

namespace App\Http\Controllers;


class MobileController
{
    public function index ()
    {
        return view('Mobile.index');
    }

    public function listPublic ()
    {
        return view('Mobile.public');
    }
    public function view ()
    {
        return view('Mobile.view');
    }
}