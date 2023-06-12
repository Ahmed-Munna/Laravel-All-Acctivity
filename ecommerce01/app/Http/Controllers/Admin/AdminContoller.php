<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin() {
        return view('admin.home');
    }
}
