<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserAuthController extends Controller
{

    public function login()
    {
        if (Session::has('loginID')) {
            return redirect("user/dashboard");
        }
        return view("auth.login");
    }

    public function logout()
    {
        if (Session::has('loginID')) {
            Session::pull('loginID');
            return redirect("login");
        }
    }


    public function loginUser(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginID', $user->id);

                return redirect('user/dashboard');
            } else {
                return back()->with('Error', 'Password does not matched.');
            }
        } else {
            return back()->with('Error', 'This email is not registered');
        }
    }
}
