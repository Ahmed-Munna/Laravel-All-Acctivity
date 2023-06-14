<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $data = Category::all();
        return view('admin.categorys.category.index',compact('data'));
    }

    // category create

    public function create(Request $request) {

            if ($request->method() == "POST") {

                $validated = $request->validate(['category' => 'required']);

                if (Category::where('category_name', $request->category)->exists()) {
                    return redirect()->back()->with('Try another');
                } else {
                    Category::insert([
                        'category_name' => $request->category,
                        'category_slug' => Str::slug($request->category, '-'),
                    ]);
                }
            } 
            
        return redirect()->back()->with('Category Add Successfull');
    }

    // update category

    public function updateView($id) {
        $info = Category::find($id);
        return $info;
    }
    
    public function update(Request $request) {
        $validated = $request->validate(['category' => 'required']);
        $info = Category::where('id', $request->id);
        
        if($info) {
            $info->update([
                'category_name' => $request->category,
                'category_slug' => Str::slug($request->category, '-'),
            ]);

            return redirect()->back()->with("Update successfull");
        }
    }
    // category delete

    public function delete($id) {
        $hasId = Category::findOrFail($id);
        if ($hasId) {
            $hasId->delete();
            return redirect()->back()->with('Delete Successfull');
        }
    }
}
