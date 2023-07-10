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
        
        $data = Coupon::all();

        return view('admin.offer.coupon', compact('data'));
    }

    public function couponCreate(Request $request) {
        if ($request->isMethod('POST')) {

            $validate = $request->validate([
                'coupon_code' => 'required',
                'coupon_amount' => 'required',
                'valid_date' => 'required',
                'coupon_type' => 'required',
                'coupon_status' => 'required',
            ]);

            Coupon::insert([
                'coupon_code' => $request->coupon_code,
                'coupon_amount' => $request->coupon_amount,
                'valid_date' => $request->valid_date,
                'coupon_type' => $request->coupon_type,
                'status' => $request->coupon_status,
            ]);

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function couponUpdateView($id) {
        $data = Coupon::findOrFail($id);

        return $data;
    }

    public function couponUpdate(Request $request) {
        $info = Coupon::where('id', $request->id);
        
        if($request->valid_date != null) {
            $info->update([
                'coupon_code' => $request->coupon_code,
                'coupon_amount' => $request->coupon_amount,
                'valid_date' => $request->valid_date,
                'coupon_type' => $request->coupon_type,
                'status' => $request->coupon_status,
            ]);

            return redirect()->back()->with("Update successfull");
        } else {
            $info->update([
                'coupon_code' => $request->coupon_code,
                'coupon_amount' => $request->coupon_amount,
                'valid_date' => $request->oldDate,
                'coupon_type' => $request->coupon_type,
                'status' => $request->coupon_status,
            ]);

            return redirect()->back()->with("Update successfull");
        }
    }

    public function couponDelete($id) {
        $data = Coupon::findOrFail($id);
        $data->delete();

        return redirect()->back();
    }
}
