<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // show home page

    public function home() {
        return view('home.contents.home-content');
    }

}
