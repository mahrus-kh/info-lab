<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::select()->orderBy('status','ASC')->get();
        return view('pages.admin.index', compact('admin'));
    }

    public function store(Request $request)
    {
        return Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => bcrypt(12345678),
            'status' => $request->status
        ]);
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        return response()->json($admin);
    }

    public function update(Request $request, Admin $admin)
    {
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status
        ]);
    }

    public function setupAkun(Request $request, $id)
    {
        Admin::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => bcrypt($request->password)
        ]);
    }

    public function destroy($id)
    {
        return Admin::destroy($id);
    }
}
