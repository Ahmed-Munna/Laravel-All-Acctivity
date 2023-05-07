<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index() {
        $subCategorys = SubCategory::latest()->get();
        $categorys = Category::all();
        return view('admin.categorys.all-sub-category', compact('subCategorys', 'categorys'));
    }

    public function addSubCategory() {
        $categorys = Category::latest()->get();
        return view('admin.categorys.add-sub-category', compact('categorys'));
    }

    // Store from the subcategory from and show all sub category pages

    public function storeSubCategory(Request $request) {
        $request->validate([
            'SubCategoryName' => 'required|unique:sub_categories,subcategory_name|max:255',
            'CategoryId' => 'required|integer',
        ]);

        SubCategory::insert([
            'subcategory_name' => $request->SubCategoryName,
            'category_id' => $request->CategoryId,
            'subcategory_slug' => Str::of($request->SubCategoryName)->slug('-'),
        ]);

        Category::where('id', $request->CategoryId)->increment('subcategory_count');

        return back()->with('massege', 'Sub-Category Added Successful');

    }

    public function editSubCategory($id) {
        $data = SubCategory::find($id);
        return view('admin.categorys.update-sub-category', compact('data'));
    }

    public function updateSubCategory(Request $request) {
        $request->validate([
            'SubCategoryName' => 'required|unique:sub_categories,subcategory_name|max:255',
        ]);
        SubCategory::find($request->id)->update([
            'subcategory_name' => $request->SubCategoryName,
            'subcategory_slug' => Str::of($request->SubCategoryName)->slug('-'),
        ]);
        return redirect()->route('all-sub-category')->with('massege', 'Sub-Category Updated Successful');
    }

    public function deleteSubCategory($id){
        $subid = SubCategory::where('id', $id)->value('category_id');
        Category::where('id', $subid)->decrement('subcategory_count',1);
        SubCategory::find($id)->delete();
        return back();
    }
}
