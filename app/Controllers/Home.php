<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'menu' => 'home'
        ];
        return view('home', $data);
    }
}
