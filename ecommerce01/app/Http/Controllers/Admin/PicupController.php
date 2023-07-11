<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Picup;
use DataTables;

class PicupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function picupIndex(Request $request) {
        if($request->ajax()) {

            $data = Picup::get();

            return DataTables::of($data)
                                ->addIndexColumn()
                                ->addColumn('action', function($row) {
                                    $actionbtn = '<a href="'.route('picup.point.delete', $row->id).'" class="btn btn-danger picupPointDelete">Delete</a>
                                    <a data-url="'.route('picup.point.updateView', $row->id).'" class="btn btn-primary" id="updatePicupBtn" data-toggle="modal" data-target="#updatePicup">Update</a>';
                                    return $actionbtn;})
                                ->rawColumns(['action'])
                                ->make(true);
        }

        return view('admin.picup.index');
    }

    public function picupCreate(Request $request) {
        if ($request->method() == "POST") {

            $validated = $request->validate([
                'picup_point_name' => 'required',
                'picup_point_address' => 'required',
                'picup_point_phone' => 'required',
            ]);
            Picup::insert([
                'picup_point_name' => $request->picup_point_name,
                'picup_point_address' => $request->picup_point_address,
                'picup_point_phone' => $request->picup_point_phone,
                'picup_point_aphone' => $request->picup_point_aphone,
            ]);
            
         return redirect()->back()->with('Add Successfull');
        } 
    }

    public function picupUpdateView($id) {
        $data = Picup::findOrFail($id);

        return $data;
    }

    public function picupUpdate(Request $request) {
        if ($request->method() == "POST") {
            $info = Picup::findOrFail($request->id);

            $validated = $request->validate([
                'picup_point_name' => 'required',
                'picup_point_address' => 'required',
                'picup_point_phone' => 'required',
            ]);
            $info->update([
                'picup_point_name' => $request->picup_point_name,
                'picup_point_address' => $request->picup_point_address,
                'picup_point_phone' => $request->picup_point_phone,
                'picup_point_aphone' => $request->picup_point_aphone,
            ]);
            
         return redirect()->back()->with('Update Successfull');
        } 
    }

    public function picupDelete($id) {
        $hasId = Picup::findOrFail($id);
        if ($hasId) {
            $hasId->delete();
            return redirect()->back()->with('Delete Successfull');
        }
    }


}
