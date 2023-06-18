<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageCreation;
use Illuminate\Support\Str;
use DataTables;


class PageCreationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        if ($request->ajax()) {

            $data = PageCreation::all();

            return DataTables::of($data)
                                    ->addIndexColumn()
                                    ->addColumn('action', function($row) {
                                        $btnaction = '<a href="'.route('page.delete', $row->id).'" class="btn btn-danger deletePage">Delete</a>
                                        <a href="'.route('page.updateView', $row->id).'" class="btn btn-primary" id="updatePage" data-toggle="modal" data-target="#update_page">Update</a>';

                                        return $btnaction; })
                                    ->rawColumns(['action'])
                                    ->make(true);

                                    
        }


        return view('admin.settings.page_management');
    }

    // new page creation

    public function create(Request $request) {
        if ($request->method() == 'POST') {
            PageCreation::insert([
                'page_position' => $request->page_position,
                'page_name' => $request->page_name,
                'page_title' => $request->page_title,
                'page_slug'  => Str::slug($request->page_name, '-'),
                'page_discription' => $request->page_discription,
            ]);

            return redirect()->back()->with('page create successfull');
        }
    }


    // update 

    public function updateView($id) {
        $data = PageCreation::findOrFail($id);
        return $data;
    }
    
    public function update(Request $request) {

        $data = PageCreation::findOrFail($request->id);

        $data->update([
            'page_position' => $request->update_page_position,
            'page_name' => $request->update_page_name,
            'page_title' => $request->update_page_title,
            'page_slug'  => Str::slug($request->update_page_name, '-'),
            'page_discription' => $request->update_page_discription,
        ]);

        return redirect()->back()->with('page update successfull');
    }

    public function delete($id) {
        $data = PageCreation::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('page delete successfull');
    }

}
