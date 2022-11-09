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
}
