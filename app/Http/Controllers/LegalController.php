<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function cookiePolicy()
    {
        return view('/legal/cookie-policy');
    }

    public function termsAndConditions()
    {
        return view('/legal/terms-and-conditions');
    }

    public function privacy()
    {
        return view('legal/privacy-policy');
    }
}
