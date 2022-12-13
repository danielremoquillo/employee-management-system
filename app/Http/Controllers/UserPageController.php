<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Leave;
use App\Models\Project;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserPageController extends Controller
{
    public function index()
    {
        $data = array();
        if (Session::has('loginID')) {
            $data = User::where('id', '=', Session::get('loginID'))->first();
            return redirect('user/dashboard', compact('data'));
        } else {
            return redirect('login');
        }
    }
    public function dashboard()
    {
        $data = array();

        $dashboard_data['User'] = User::all()->count();
        $dashboard_data['Employee'] = Employee::all()->count();
        $dashboard_data['Project'] = Project::all()->count();
        $dashboard_data['Leave'] = Leave::all()->count();

        if (Session::has('loginID')) {
            $data = User::where('id', '=', Session::get('loginID'))->first();
            return view('user.dashboard', compact('data', 'dashboard_data'));
        } else {
            return redirect('login');
        }
    }
    public function projects()
    {
        $data = array();
        $employees = Employee::all();
        //testing area

        if (Session::has('loginID')) {
            $data = User::where('id', '=', Session::get('loginID'))->first();
            return view('user.projects', compact('data', 'employees'));
        } else {
            return redirect('login');
        }
    }
    public function employee()
    {
        $data = array();
        $positions = Position::all();


        if (Session::has('loginID')) {
            $data = User::where('id', '=', Session::get('loginID'))->first();
            return view('user.employee', compact('data', 'positions'));
        } else {
            return redirect('login');
        }
    }
    public function users()
    {
        $data = array();
        $roles = Role::all();
        $employees = Employee::all();


        if (Session::has('loginID')) {
            $data = User::where('id', '=', Session::get('loginID'))->first();
            return view('user.users', compact('data', 'roles', 'employees'));
        } else {
            return redirect('login');
        }
    }
    public function salary()
    {
        $data = array();
        if (Session::has('loginID')) {
            $data = User::where('id', '=', Session::get('loginID'))->first();
            return view('user.salary', compact('data'));
        } else {
            return redirect('login');
        }
    }
    public function leaves()
    {
        $data = array();
        if (Session::has('loginID')) {
            $data = User::where('id', '=', Session::get('loginID'))->first();
            return view('user.leaves', compact('data'));
        } else {
            return redirect('login');
        }
    }
}
