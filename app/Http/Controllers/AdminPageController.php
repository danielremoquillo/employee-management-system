<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Leave;
use App\Models\Project;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Support\Facades\Session;

class AdminPageController extends Controller
{
    public function index()
    {
        $data = array();
        $user = User::where('id', '=', Session::get('loginID'))->first();


        if (Session::has('loginID') && $user->role_id == 1) {
            $data = User::where('id', '=', Session::get('loginID'))->first();
            return redirect('admin/dashboard', compact('data'));
        } else if (Session::has('loginID') && $user->role_id == 2) {
            return redirect('employee/dashboard');
        } else {
            return redirect('login');
        }
    }
    public function dashboard()
    {
        $data = array();
        $user = User::where('id', '=', Session::get('loginID'))->first();

        $dashboard_data['User'] = User::all()->count();
        $dashboard_data['Employee'] = Employee::all()->count();
        $dashboard_data['Project'] = Project::all()->count();
        $dashboard_data['Leave'] = Leave::all()->count();

        if (Session::has('loginID') && $user->role_id == 1) {
            $data = User::where('id', '=', Session::get('loginID'))->first();
            return view('admin.dashboard', compact('data', 'dashboard_data'));
        } else if (Session::has('loginID') && $user->role_id == 2) {
            return redirect('employee/dashboard');
        } else {
            return redirect('login');
        }
    }


    public function projects()
    {
        $data = array();
        $employees = Employee::all();
        $user = User::where('id', '=', Session::get('loginID'))->first();
        //testing area

        if (Session::has('loginID') && $user->role_id == 1) {
            $data = User::where('id', '=', Session::get('loginID'))->first();
            return view('admin.projects', compact('data', 'employees'));
        } else if (Session::has('loginID') && $user->role_id == 2) {
            return redirect('employee/dashboard');
        } else {
            return redirect('login');
        }
    }
    public function employee()
    {
        $data = array();
        $positions = Position::all();
        $user = User::where('id', '=', Session::get('loginID'))->first();


        if (Session::has('loginID') && $user->role_id == 1) {
            $data = User::where('id', '=', Session::get('loginID'))->first();
            return view('admin.employee', compact('data', 'positions'));
        } else if (Session::has('loginID') && $user->role_id == 2) {
            return redirect('employee/dashboard');
        } else {
            return redirect('login');
        }
    }
    public function users()
    {
        $data = array();
        $roles = Role::all();
        $employees = Employee::all();
        $user = User::where('id', '=', Session::get('loginID'))->first();


        if (Session::has('loginID') && $user->role_id == 1) {
            $data = User::where('id', '=', Session::get('loginID'))->first();
            return view('admin.users', compact('data', 'roles', 'employees'));
        } else if (Session::has('loginID') && $user->role_id == 2) {
            return redirect('employee/dashboard');
        } else {
            return redirect('login');
        }
    }
    public function salary()
    {
        $data = array();
        $user = User::where('id', '=', Session::get('loginID'))->first();

        if (Session::has('loginID') && $user->role_id == 1) {
            $data = User::where('id', '=', Session::get('loginID'))->first();
            return view('admin.salary', compact('data'));
        } else if (Session::has('loginID') && $user->role_id == 2) {
            return redirect('employee/dashboard');
        } else {
            return redirect('login');
        }
    }
    public function leaves()
    {
        $data = array();
        $user = User::where('id', '=', Session::get('loginID'))->first();

        if ((Session::has('loginID') && $user->role_id == 1)) {
            $data = User::where('id', '=', Session::get('loginID'))->first();
            return view('admin.leaves', compact('data'));
        } else if (Session::has('loginID') && $user->role_id == 2) {
            return redirect('employee/dashboard');
        } else {
            return redirect('login');
        }
    }
}
