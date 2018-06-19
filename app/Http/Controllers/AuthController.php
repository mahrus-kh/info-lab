<?php

namespace App\Http\Controllers;

use App\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('pages.auth.login');
    }

    public function doLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

        if ($auth = auth('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])){
            Admin::find(auth('admin')->user()->id)->update(['last_login' => Carbon::now()]);
            return response()->json($auth);
        }

        return response()->json($auth);
    }

    public function doLogout()
    {
        auth('admin')->logout();
        return redirect()->route('login');
    }
}
