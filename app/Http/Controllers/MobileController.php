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

    public function register ()
    {
        return view('Mobile.reg');
    }


    public function login ()
    {
        return view('Mobile.login');
    }

    public function member ()
    {
        return view('Mobile.member');
    }

    public function vip ()
    {
        return view('Mobile.vip');
    }

}