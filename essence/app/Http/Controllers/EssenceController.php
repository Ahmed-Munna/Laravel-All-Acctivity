<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EssenceController extends Controller
{
    public function index() {

        return view('home.contents.shop');
    }
    public function singleProduct() {

        return view('home.contents.single-product');
    }
}
