<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;

class EmployeePageController extends Controller
{
    public function index()
    {
        $user = User::where('id', '=', Session::get('loginID'))->first();

        //check the current user if admin or not
        if (Session::has('loginID') && $user->role_id == 2) {
            return redirect('employee/dashboard');
        } else if (Session::has('loginID') && $user->role_id == 1) {
            return redirect('admin/dashboard');
        } else {
            return redirect('login');
        }
    }
    public function dashboard()
    {
        $user = User::where('id', '=', Session::get('loginID'))->first();

        if (Session::has('loginID') && $user->role_id == 2) {
            return redirect('employee/dashboard');
        } else if (Session::has('loginID') && $user->role_id == 1) {
            return redirect('admin/dashboard');
        } else {
            return redirect('login');
        }
    }
}
