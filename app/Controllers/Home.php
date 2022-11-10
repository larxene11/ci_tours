<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('user/paket');
    }

    public function detail()
    {
        return view('user/paket_detail');
    }

    public function about()
    {
        return view('user/about');
    }
    public function contact()
    {
        return view('user/contact');
    }
    public function testimony()
    {
        return view('user/testimony');
    }
}
