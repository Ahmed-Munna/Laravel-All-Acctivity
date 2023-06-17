<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin() {
        return view('admin.home');
    }

    public function profile() {

        return view('admin.profile.password_change');
    }

    public function changePass(Request $request) {
        
        $validate = $request->validate([
            'email' => 'required',
            'oldpassword' => 'required',
            'newpassword' => 'required',
        ]);

        if ($request->method() == "POST") {
            if ($request->email) {
                $user = User::where('email', $request->email)
                                ->select('users.*')
                                ->get();
                  $object;              
                 foreach ($user as $object) {
                //    $object->id;
                 }
                $pass = $object->password;

                
                if ($user && Hash::check($request->oldpassword, $pass)) {
                    if ($request->newpassword == $request->confirmpassword) {
    
                        $object->update([
                            'password' => Hash::make($request->newpassword),
                        ]);

                        return redirect()->back()->with('<script>console.log("Done")</script>');
                    } else {
                        return redirect()->back()->with('<script>console.log("confirm pass not matched")</script>');
                    } 
                } else {
                    return redirect()->back()->with('<script>console.log("old and pass problem")</script>');
                }
            }
            return redirect()->back();
        }
    }
}
