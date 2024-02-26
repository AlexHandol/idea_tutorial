<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageNavigationController extends Controller
{
    public function termsNav()
    {
        return view('terms');
    }
    public function exploreNav()
    {
        return view('explore');
    }
}
