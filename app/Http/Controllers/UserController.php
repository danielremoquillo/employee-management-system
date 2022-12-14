<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::join('roles', 'roles.id', '=', 'users.role_id')
            ->join('employees', 'employees.id', '=', 'users.employee_id')
            ->get(['users.*', 'roles.name as role_name', 'employees.employee_name']);

        if ($request->ajax()) {
            $data = User::join('roles', 'roles.id', '=', 'users.role_id')
                ->join('employees', 'employees.id', '=', 'users.employee_id')
                ->get(['users.*', 'roles.name as role_name', 'employees.employee_name']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn  btn-sm editUser">
                    <span class="material-symbols-outlined">
                        edit
                    </span></a>';

                    $btn = $btn . ' <a data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="delete btn  btn-sm deleteUser">
                    <span class="material-symbols-outlined">
                        delete
                    </span></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/users', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        User::updateOrCreate(

            ['id' => $request->user_id],
            [
                'employee_id' => $request->employee_id,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'password' => Hash::make($request->password)
            ]
        );


        return response()->json(['success' => 'User saved successfully.']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return response()->json(['success' => 'User deleted successfully.']);
    }
}
