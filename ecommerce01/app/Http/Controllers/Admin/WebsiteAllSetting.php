<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;
use Carbon\Carbon;

class WebsiteAllSetting extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $data = WebsiteSetting::first();

        return view('admin.settings.website-setting', compact('data'));
    }

    public function update(Request $request) {

        $data = WebsiteSetting::first();

        // dd($request->logo);

        // if ($request->logo != null|| $request->fevicon != null) {

        //     $data->update([
        //         'currency' => $request->currency,
        //         'phone_one' => $request->phone_one,
        //         'phone_two' => $request->phone_two,
        //         'main_email' => $request->main_email,
        //         'support_email' => $request->support_email,
        //         'address' => $request->address,
        //         'twitter_link' => $request->twitter_link,
        //         'linkedin' => $request->linkedin,
        //     ]);

        //     return redirect()->back()->with('done');


        // } else {
            // $logoNewName;
            // if ($request->logo) {
            //     $logoNewName = 'marazzo'.Carbon::now().'.' . $request->logo->extension();

            //     $request->logo->move('backend/dist/admin/brand/', $logoNewName);

            // } 
            
            // $faviconNewName;

                
            // if ($request->favicon) {
            //     $faviconNewName = 'marazzo-fav'.Carbon::now().'.' . $request->favicon->extension();
            //     $request->favicon->move('backend/dist/admin/brand/', $faviconNewName);
            // }
            
            

            $data->update([
                'currency' => $request->currency,
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'main_email' => $request->main_email,
                'support_email' => $request->support_email,
                'address' => $request->address,
                'twitter_link' => $request->twitter_link,
                'linkedin' => $request->linkedin,
                // 'logo' => 'backend/dist/admin/brand/'. ($request->logo) ? $request->$logoNewName : $data->logo,
                // 'favicon' => 'backend/dist/admin/brand/'. ($request->favicon) ? $request->$faviconNewName : $data->favicon,
            ]);

            return redirect()->back()->with('done');
        // }

    }
}
