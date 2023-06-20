<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $data = Warehouse::first();

        return view('admin.settings.warehouse', compact('data'));
    }

    public function update(Request $request) {
        $data = Warehouse::first();

        $data->update([
            'warehouse_name' => $request->name,
            'warehouse_address' => $request->address,
            'warehouse_phone' => $request->phone,
        ]);

        return redirect()->back()->with('done');
    }
}
