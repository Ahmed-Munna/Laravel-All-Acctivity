<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use DataTables;
class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function couponIndex(Request $request) {
        
        if ($request->ajax()) {
            $data = Coupon::all();

            return DataTables::of($data)
                                ->addIndexColumn()
                                ->addColumn('action', function($row) {
                                    $actionbtn = '<a data-url="'.route('coupon.delete', $row->id).'" class="btn btn-danger deleteCoupon">Delete</a>
                                    <a data-url="'.route('coupon.updateView', $row->id).'" class="btn btn-primary " id="updateCoupon" data-toggle="modal" data-target="#updateCoupon">Update</a>';

                                    return $actionbtn;
                                })
                                ->rawColumn(['action'])
                                ->make(true);
        }


        return view('admin.offer.coupon');
    }
}
