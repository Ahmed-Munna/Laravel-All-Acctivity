<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Picup;
use App\Models\Brands;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\MarazzoProduct;

use DataTables;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function productIndex() {
        $cat = Category::all();
        $subCat = SubCategory::all();
        $childCat = ChildCategory::all();
        $brand = Brands::all();
        $picup = Picup::all();

        return view('admin.product.product', compact('cat', 'subCat', 'childCat', 'brand', 'picup'));
    }

    public function create(Request $request) {

    }

    public function manageIndex() {

    }

}
