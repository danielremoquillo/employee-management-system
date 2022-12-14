<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $leave = Leave::join('employees', 'employees.id', '=', 'leaves.employee_id')
            ->get(['leaves.*', 'employees.employee_name', 'employees.id']);
        if ($request->ajax()) {
            $data  = Leave::join('employees', 'employees.id', '=', 'leaves.employee_id')
                ->get(['leaves.*', 'employees.employee_name', 'employees.id', DB::raw("DATEDIFF('leaves.leave_start',leaves.leave_end)AS Days")]);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Approve" class="edit btn btn-sm editProject">  
                    <span class="material-symbols-outlined">
                        done
                    </span></a>';

                    $btn = $btn . ' <a data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Decline" class="delete btn btn-sm deleteProject"><span class="material-symbols-outlined">
                    close
                    </span></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin/leaves', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
