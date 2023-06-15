<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Str;
use DB;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    // subcategory index view

    public function index() {
        $data = SubCategory::join('categories', 'sub_categories.category_id', 'categories.id')
                     ->select('sub_categories.*', 'categories.category_name')
                     ->get();
        $category = Category::all();
        return view('admin.categorys.subcategory.index', compact('data','category'));
    }

    // subcategory create

    public function create(Request $request) {
        

        if ($request->method() == "POST") {

                $validated = $request->validate([
                    'categoryId' => 'required',
                    'subCategory' => 'required'
                ]);

                $isExixt = SubCategory::where([
                        'subcategory_name' => $request->subCategory,
                        'category_id' => $request->categoryId
                ])->exists();

                if ($isExixt) {

                    return redirect()->back()->with('Try another');

                } else {
                    SubCategory::insert([
                        'category_id' => $request->categoryId,
                        'subcategory_name' => $request->subCategory,
                        'subcategory_slug' => Str::slug($request->subCategory, '-'),
                    ]);
                }   

            return redirect()
                      ->back()
                      ->with("Subcategory added successfully");
        } else {
            return redirect()->back();
        }
        
    }

    // update category

    public function updateView($id) {
        $data = SubCategory::findOrFail($id);
        return $data;
    }

    public function update(Request $request) {
        if ($request->method() == 'POST') {
            $validated = $request->validate([
                'editsubCategory' => 'required'
            ]);
    
            $data = SubCategory::where('id', $request->editSubCategoryId);
            if ($data) {
               
                $data->update([
                    'subcategory_name' => $request->editsubCategory,
                    'subcategory_slug' => Str::slug($request->editsubCategory, '-'),
                ]);
    
                return redirect()->back()->with('update successfull');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
    // delete sub category

    public function delete($id) {
        $hasId = SubCategory::findOrFail($id);
        if ($hasId) {
            $hasId->delete();
            return redirect()->back()->with('Delete successfull');
        }
    }

}
