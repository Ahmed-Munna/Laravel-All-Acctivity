<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Brands;
use DataTables;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        if($request->ajax()){
            $data = Brands::all();

            return DataTables::of($data)
                                ->addIndexColumn()
                                ->addColumn('action', function($row) {
                                    $actionbtn = '<a href="'.route('brand.delete', $row->id).'" class="btn btn-danger deleteBrand">Delete</a>
                                    <a href="'.route('brand.updateView', $row->id).'" class="btn btn-primary" id="updateBrand" data-toggle="modal" data-target="#editbrand">Update</a>';

                                    return $actionbtn;
                                })
                                ->rawColumns(['action'])
                                ->make(true);
        }

        return view('admin.categorys.brands.index');
    }

    //create brand

    public function create(Request $request) {

        if ($request->method() == "POST") {

            $validated = $request->validate([
                'brand' => 'required',
                'brandLogo' => 'required',
            ]);

            $logo = $request->brand;
            $slug = Str::slug($logo, '-');
            $logoNewName = $slug.'.'.$request->brandLogo->extension();

            $request->brandLogo->move('backend/dist/admin/brand/', $logoNewName);

                Brands::insert([
                    'brand_name' => $request->brand,
                    'slug' => Str::slug($request->brand, '-'),
                    'brand_image' => 'backend/dist/admin/brand/'.$logoNewName,
                ]);
            

            return redirect()->back()->with('Brand add successfull');
        } else {
            return redirect()->back();
        }
    }

    // update brand

    public function updateView($id) {
        $data = Brands::findOrFail($id);
        if ($data) {
            return $data;
        }
    }

    public function update(Request $request) {
        $validated = $request->validate([
            'brandName2' => 'required',
        ]);

        $data = Brands::findOrFail($request->brandId);

        if ($request->editbrandLogo) {

            if(Storage::exists($data->brand_image)){
            
                unlink($data->brand_image);
            }
            $logoNewName = Str::slug($request->brandName2, '-').'.'.$request->editbrandLogo->extension();
            $request->editbrandLogo->move('backend/dist/admin/brand/', $logoNewName);

            $data->update([
                'brand_name' => $request->brandName2,
                'slug' => Str::slug($request->brandName2),
                'brand_image' => 'backend/dist/admin/brand/'.$logoNewName,
            ]);

            return redirect()->back()->with('Update successfull');
           
        } else {

            $data->update([
                'brand_name' => $request->brandName2,
                'slug' => Str::slug($request->brandName2),
                'brand_image' => $request->oldimg,
            ]);

            return redirect()->backe()->with('Update successfull');
        }
    }

    // delete brand

    public function delete($id) {
            $hasId = Brands::findOrFail($id);

            if ($hasId) {

                unlink($hasId->brand_image);
                $hasId->delete();
                return redirect()->back()->with('Delete Successfull');
            }
    }
}
