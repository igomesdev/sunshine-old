<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function guides()
    {
        return view('footer/guides');
    }

    public function aboutUs()
    {
        return view('footer/about-us');
    }

    public function contactUs()
    {
        return view('footer/contact-us');
    }
}
