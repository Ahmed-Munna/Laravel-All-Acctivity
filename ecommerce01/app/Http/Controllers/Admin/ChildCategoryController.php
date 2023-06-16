<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use Illuminate\Support\Str;
use DataTables;
class ChildCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        if ($request->ajax()) {
            $data = ChildCategory::join('categories', 'child_categories.category_id', 'categories.id')
            ->join('sub_categories', 'child_categories.subcategory_id', 'sub_categories.id')
            ->select('child_categories.*', 'categories.category_name', 'sub_categories.subcategory_name')
            ->get();
            
            return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row) {
                            $actionbtn = '<a data-url="'.route('childcategory.delete', $row->id).'" class="btn btn-danger delete">Delete</a>
                            <a data-url="'.route('childcategory.updateView', $row->id).'" class="btn btn-primary update" id="updateCategory" data-toggle="modal" data-target="#editChildCategory">Update</a>';
                            return $actionbtn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        $category = Category::all();
        $subcategory = SubCategory::all();
        return view('admin.categorys.childcategory.index', compact('category', 'subcategory'));
    }


    // create child category

    public function create(Request $request) {

        $validated = $request->validate([
            'childCategory' => 'required',
        ]);
        if ($request->method() == "POST") {
            $catid = SubCategory::where('id', $request->subcategoryId)->first()->category_id;

            ChildCategory::insert([
                'category_id' => $catid,
                'subcategory_id' => $request->subcategoryId,
                'childcategory_name' => $request->childCategory,
                'slug' => Str::slug($request->childCategory, '-')
            ]);
            return redirect()->back()->with('childCategory Added successfull');
        } else {
            return redirect()->back();
        }
    }

    // child category update

    public function updateView($id) {
        $data = ChildCategory::findOrFail($id);

        return $data;
    }

    public function update(Request $request) {

        $validated = $request->validate([
            'editchildCategory' => 'required',
        ]);

        if ($request->method() == "POST") {
            $data = ChildCategory::where('id', $request->editchildCategoryId);
            $data->update([
                'childcategory_name' => $request->editchildCategory,
                'slug' => Str::slug($request->editchildCategory, '-'),
            ]);
            return redirect()->back()->with('update successfull');
        } else {

            return redirect()->back();
        }
        
    }

    // delete child category

    public function delete($id) {
        $hasId = ChildCategory::findOrFail($id);

        if ($hasId) {
            $hasId->delete();
            return redirect()->back()->with('Delete Successfull');
        }
    }
}
