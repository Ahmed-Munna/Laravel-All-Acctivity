<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Smtp;


class SmtpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $data = Smtp::first();

        return view('admin.settings.smtp', compact('data'));
    }

    public function update(Request $request) {
        if ($request->method() == "POST") {
            $data = Smtp::findOrFail($request->id);

            $data->update([
                'mailer' => $request->mailer,
                'host' => $request->host,
                'port' => $request->port,
                'user_name' => $request->username,
                'password' => $request->password,
            ]);

            return redirect()->back()->with('Successfull');
        }
    }
}
