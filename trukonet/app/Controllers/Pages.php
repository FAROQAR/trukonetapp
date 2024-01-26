<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index($page)
    {
//        return view('welcome_message');
        return view("pages/$page");
    }
}
