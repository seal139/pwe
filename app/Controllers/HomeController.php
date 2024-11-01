<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index(): string
    {
        return view('template');
    }

    public function on404(): string 
    {
        return view('error');
    }
}
