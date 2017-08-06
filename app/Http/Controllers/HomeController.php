<?php

namespace App\Http\Controllers;


use App\AdminUser;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;

class HomeController
{


    public function index ()
    {
        return view('Home.index');
    }

    public function vip ()
    {
        return view('Home.list');
    }

    public function publicVideo ()
    {
        return view('Home.public');
    }

    public function view ()
    {
        return view('Home.view');
    }

    public function login ()
    {
        return view('Home.login');
    }

    public function register (Request $request)
    {
        $request->cookie('tokenIdAuth');
        return view('Home.login');
    }

    public function member ()
    {
        return view('Home.member');
    }

    public function logout ()
    {
        Session::flush();
        //Cookie::forget('tokenIdAuth');
        Cookie::queue('tokenIdAuth',null,-1);
        return redirect('/login');
    }


}