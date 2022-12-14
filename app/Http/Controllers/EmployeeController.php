<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $employee = Employee::all();

        if ($request->ajax()) {


            $data = Employee::all();


            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-sm editEmployee">  
                    <span class="material-symbols-outlined">
                        edit
                    </span></a>';

                    $btn = $btn . ' <a data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="delete btn btn-sm deleteEmployee"><span class="material-symbols-outlined">
                    delete
                    </span></a>';


                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/employee', compact('employee'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Employee::updateOrCreate(
            ['id' => $request->employee_id],
            [
                'employee_name' => $request->employee_name,
                'employee_email' => $request->employee_email,
                'employee_bday' => $request->employee_bday,
                'employee_gender' => $request->employee_gender,
                'employee_address' => $request->employee_address,
                'employee_degree' => $request->employee_degree,
                'position_id' => $request->position_id,
            ]
        );

        return response()->json(['success' => 'Employee saved successfully.']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return response()->json($employee);
    }

    public function destroy($id)
    {
        Employee::find($id)->delete();

        return response()->json(['success' => 'Employee deleted successfully.']);
    }
}
