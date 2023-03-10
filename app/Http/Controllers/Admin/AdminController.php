<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function admin()
    {
        return view('admin.home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.login');
    }

    public function adminPasswordChange()
    {
        return view('admin.profile.password_change');
    }

    public function adminPasswordUpdate(Request $request)
    {
        $validated = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $current_password = Auth::user()->password;

        $old_password = $request->old_password;
        $password = $request->password;

        if (Hash::check($old_password, $current_password)) {
            $user = User::findOrFail(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('admin.login');
        }
        else{
            return redirect()->back();
        }
    }
}
