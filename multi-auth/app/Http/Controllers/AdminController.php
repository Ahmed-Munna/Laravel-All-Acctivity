<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Auth;

class AdminController extends Controller
{
    
    public function showReg() {
        return view('admin.register');
    }
    public function showDash() {
        return view('admin.dashboard');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $Pass = $request->password;
        $conPas = $request->password_confirmation;
        if($Pass != $conPas) {
            return redirect()->route('admin-reg')->with('massege', 'shuuua daw');
        }else{
            Admin::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('admin-dashboard');
        }
    }

    public function loginView() {
        return view('admin.login');
    }
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('admin-dashboard');
        }else{
            Session::flash('err', 'shauuua');;
        }
    }
}
