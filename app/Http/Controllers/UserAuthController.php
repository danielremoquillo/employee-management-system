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
        $user = User::where('id', '=', Session::get('loginID'))->first();

        //Checks if thereis already logged in and checks the role of the logged user
        if (Session::has('loginID') && $user->role_id == 1) {
            return redirect("admin/dashboard");
        } else if (Session::has('loginID') && $user->role_id == 2) {
            return redirect('employee/dashboard');
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

                //Check if admin or not
                if (Session::has('loginID') && $user->role_id == '1') {
                    return redirect('admin/dashboard');
                } else if (Session::has('loginID') && $user->role_id == '2') {
                    return redirect('employee/dashboard');
                }
            } else {
                return back()->with('Error', 'Password does not matched.');
            }
        } else {
            return back()->with('Error', 'This email is not registered');
        }
    }
}
