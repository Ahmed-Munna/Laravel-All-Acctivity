<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Category;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // category index view

    public function index() {

        $categoryes = Category::latest()->get();
        return view('admin.categorys.all-category', compact('categoryes'));
    }

    public function addCategory() {
        return view('admin.categorys.add-category');
    }
    
    // Store category

    public function storeCategory(Request $request){

        $request->validate([
            'CategoryName' => [
                    'required',
                    'unique:categories,category_name',
                    'max:255'],
        ]);

        Category::insert([
            'category_name' => $request->CategoryName,
            'category_slug' => Str::of($request->CategoryName)->slug('-'),
        ]);

        return back()->with('massege', 'Category Added Successful');

    }

    // Edit / Update category

    public function editCategory($id) {
        $data = Category::find($id);
        return view('admin.categorys.update-category', compact('data'));
    }

    public function updateCategory(Request $request) {
        $request->validate([
            'CategoryName' => [
                'required',
                'unique:categories,category_name',
                'max:255'
            ]
        ]);

        Category::find($request->ctgid)->update([
            'category_name' => $request->CategoryName,
            'category_slug' => Str::of($request->CategoryName)->slug('-'),
            'updated_at'    => Carbon::now(),
        ]);

        return redirect()->route('all-category')->with('success', 'Updated Successful');
    }
    
    // Delete category

    public function deleteCategory($id){
        Category::find($id)->delete();
        return back();
    }
}
